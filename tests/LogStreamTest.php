<?php

use AdamRollinson\Cloudwatch\Logging\LogStreams\DefaultLogStream;
use AdamRollinson\Cloudwatch\Logging\LogStreams\LogStream;

beforeEach(function () {
    $this->defaultLogStream = new DefaultLogStream();
});

it('default log stream is instance of log stream', function () {
    expect($this->defaultLogStream)
        ->toBeInstanceOf(LogStream::class);
});

it('default log stream config test', function () {
    expect($this->defaultLogStream->streamConfig())
        ->toBeArray()
        ->toHaveKey('class')
        ->toHaveKey('custom_fields')
        ->toMatchArray([
            'class' => DefaultLogStream::class,
            'custom_fields' => [
                'env',
                'app',
            ],
        ]);
});

it('can set default retention', function () {
    config([
        'cloudwatch.logging.logGroups.default.retention' => 30,
    ]);

    expect($this->defaultLogStream->groupConfig())
        ->toBeArray()
        ->toHaveKey('retention')
        ->toMatchArray([
            'retention' => 30,
        ]);
});
