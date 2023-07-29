<?php

namespace AdamRollinson\Cloudwatch\Logging\LogStreams;

class DefaultLogStream extends LogStream
{
    public string $logGroup = 'default';

    public string $logStream = 'default';
}
