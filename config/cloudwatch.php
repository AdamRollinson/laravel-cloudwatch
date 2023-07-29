<?php

return [
    'logging' => [
        'logGroups' => [
            'default' => [
                'retention' => env('CLOUDWATCH_LOG_RETENTION', 14),
                'logStreams' => [
                    'default' => [
                        'class' => AdamRollinson\Cloudwatch\Logging\LogStreams\DefaultLogStream::class,
                        'custom_fields' => [
                            'env',
                            'app',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
