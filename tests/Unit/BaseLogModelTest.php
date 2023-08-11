<?php

use AdamRollinson\Cloudwatch\Logging\LogStreams\DefaultLogStream;
use AdamRollinson\Cloudwatch\Logging\Models\BaseLogModel;

it('can create model', function () {
    $defaultModel = Mockery::mock(BaseLogModel::class, [
        'logGroup' => 'default',
        'logStream' => 'default',
    ])->makePartial();

    expect($defaultModel->stream())
        ->toBeInstanceOf(DefaultLogStream::class);
});

it('can access model from stream', function () {
    $defaultModel = Mockery::mock(BaseLogModel::class, [
        'logGroup' => 'default',
        'logStream' => 'default',
    ])->makePartial();

    expect($defaultModel->stream()->getModel())
        ->toBeInstanceOf(BaseLogModel::class);
});

it('can access stream config from model', function () {
    $defaultModel = Mockery::mock(BaseLogModel::class, [
        'logGroup' => 'default',
        'logStream' => 'default',
    ])->makePartial();

    expect($defaultModel->stream()->streamConfig())
        ->toBeArray();
});

it('can access group config from model', function () {
    $defaultModel = Mockery::mock(BaseLogModel::class, [
        'logGroup' => 'default',
        'logStream' => 'default',
    ])->makePartial();

    expect($defaultModel->stream()->groupConfig())
        ->toBeArray();
});

it('can access group config from stream', function () {
    $defaultModel = Mockery::mock(BaseLogModel::class, [
        'logGroup' => 'default',
        'logStream' => 'default',
    ])->makePartial();

    expect($defaultModel->stream()->groupConfig())
        ->toBeArray();
});

it('can access stream config from stream', function () {
    $defaultModel = Mockery::mock(BaseLogModel::class, [
        'logGroup' => 'default',
        'logStream' => 'default',
    ])->makePartial();

    expect($defaultModel->stream()->streamConfig())
        ->toBeArray();
});
