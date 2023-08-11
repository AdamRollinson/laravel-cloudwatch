<?php

return [
    'logging' => [
        'logGroups' => [
            'default' => [
                'retention' => env('CLOUDWATCH_LOG_RETENTION', 14),
                'logStreams' => [
                    'default' => [
                        'class' => AdamRollinson\Cloudwatch\Logging\LogStreams\DefaultLogStream::class,
                        'model' => AdamRollinson\Cloudwatch\Logging\Models\BaseLogModel::class,
                        'custom_fields' => [
                            'environment',
                            'level',
                            'data'
                        ],
                    ],
                ],
            ],
        ],
    ],
];
