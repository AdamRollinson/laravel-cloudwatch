<?php

namespace AdamRollinson\Cloudwatch\Logging\LogStreams;

class LogStream
{
    protected string $logGroup;

    protected string $logStream;

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
