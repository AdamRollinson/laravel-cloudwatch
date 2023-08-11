<?php

namespace AdamRollinson\Cloudwatch\Logging\LogStreams;

use AdamRollinson\Cloudwatch\Logging\Models\BaseLogModel;
use Illuminate\Support\Arr;

class LogStream
{
    public string $logGroup;

    public string $logStream;

    public function getModel(): BaseLogModel
    {
        return app(Arr::get($this->streamConfig(), 'model'));
    }

    public function groupConfig(): array
    {
        return config(
            sprintf('cloudwatch.logging.logGroups.%s', $this->logGroup)
        );
    }

    public function streamConfig(): array
    {
        return config(
            sprintf('cloudwatch.logging.logGroups.%s.logStreams.%s', $this->logGroup, $this->logStream)
        );
    }
}
