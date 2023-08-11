<?php

namespace AdamRollinson\Cloudwatch\Logging\Models;

use AdamRollinson\Cloudwatch\Logging\LogStreams\LogStream;
use AdamRollinson\Cloudwatch\Models\BaseModel;
use Illuminate\Support\Arr;

class BaseLogModel extends BaseModel
{
    public string $logGroup = 'default';
    public string $logStream = 'default';

    public function stream(): LogStream
    {
        return app(
            LogStream::class, [
                'logGroup' => $this->logGroup,
                'logStream' => $this->logStream,
            ]
        );
    }

    private function streamConfig(): array
    {
        return config(
            sprintf('cloudwatch.logging.logGroups.%s.logStreams.%s', $this->logGroup, $this->logStream)
        );
    }
}
