<?php

namespace AdamRollinson\Cloudwatch\Logging\LogStreams;

class DefaultLogStream extends LogStream
{
    protected string $logGroup = 'default';

    protected string $logStream = 'default';
}
