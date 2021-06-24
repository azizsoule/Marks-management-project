<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'notes' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=notes',
                    'user'       => 'root',
                    'password'   => '',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'notes',
            'connections' => ['notes']
        ],
        'generator' => [
            'defaultConnection' => 'notes',
            'connections' => ['notes']
        ]
    ]
];