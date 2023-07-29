<?php

use AdamRollinson\Cloudwatch\Logging\LogStreams\DefaultLogStream;
use AdamRollinson\Cloudwatch\Logging\LogStreams\LogStream;

beforeEach(function () {
    config([
        'cloudwatch.logging.logGroups.default.logStreams.default.class' => DefaultLogStream::class,
        'cloudwatch.logging.logGroups.default.logStreams.default.custom_fields' => [
            'env',
            'app',
        ],
    ]);

    $this->defaultLogStream = app(config('cloudwatch.logging.logGroups.default.logStreams.default.class'));
});

it('can be instance of LogStream', function () {
    expect($this->defaultLogStream)
        ->toBeInstanceOf(LogStream::class);
});

it('does have default log stream config', function () {

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

it('can set default log group retention', function () {
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

it('can have custom fields', function () {
    config([
        'cloudwatch.logging.logGroups.default.logStreams.default.custom_fields' => [
            'env',
            'app',
            'type',
            'data',
        ],
    ]);

    expect($this->defaultLogStream->streamConfig())
        ->toBeArray()
        ->toHaveKey('custom_fields')
        ->toMatchArray([
            'custom_fields' => [
                'env',
                'app',
                'type',
                'data',
            ],
        ]);
});

it('can have additional log streams', function () {

    $mockTestLogStream = Mockery::mock(LogStream::class, [
        'logGroup' => 'default',
        'logStream' => 'test',
    ]);

    $testLogStreamConfig = [
        'class' => get_class($mockTestLogStream),
        'custom_fields' => [
            'env',
            'app',
            'type',
            'data',
        ],
    ];

    config([
        'cloudwatch.logging.logGroups.default.logStreams.test' => $testLogStreamConfig,
    ]);

    expect(config('cloudwatch.logging.logGroups.default.logStreams'))
        ->toBeArray()
        ->toHaveKey('default')
        ->toHaveKey('test');
});

it('can have additional log groups', function () {
    $mockTestLogStream = Mockery::mock(DefaultLogStream::class, [
        'logGroup' => 'additional',
    ]);

    $additionalLogGroupConfig = [
        'retention' => 30,
        'logStreams' => [
            'default' => [
                'class' => get_class($mockTestLogStream),
                'custom_fields' => [
                    'env',
                    'app',
                ],
            ],
        ],
    ];

    config([
        'cloudwatch.logging.logGroups.additional' => $additionalLogGroupConfig,
    ]);

    expect(config('cloudwatch.logging.logGroups'))
        ->toBeArray()
        ->toHaveKey('default')
        ->toHaveKey('additional')
        ->toHaveKey('additional.retention')
        ->toHaveKey('additional.logStreams');
});
