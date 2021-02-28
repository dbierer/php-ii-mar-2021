<?php
/**
 * General Config
 */
return [
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=phpcourse',
        'username' => 'vagrant',
        'password' => 'vagrant',
        'options'  => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ],

    'services' => [
        'order-defaults' => [
            'order-by' => 'id',
            'order-num-filter' => null,
            'status-filter' => null,
        ],
        'order-codes' => [
            'order #',
            'date',
            'status',
            'amount',
            'customer',
        ],
        'status-codes' => [
            'all',
            'open',
            'cancelled',
            'held',
            'invoiced',
            'complete',
            'something else'
        ],
        'static-orders' => [
            ['id' => 1,
                'order_status' => 'complete',
                'amount' => 560,
                'description' => 'Printer',
                'customer_name' => 'Susan Chu',
                'formatted_date' => 'Dec 10, 2012'
            ],
            ['id' => 2,
                'order_status' => 'invoiced',
                'amount' => 9800,
                'description' => 'Networking',
                'customer_name' => 'Jason Flores',
                'formatted_date' => 'Jan 24, 2013'
            ],
            ['id' => 3,
                'order_status' => 'held',
                'amount' => 300,
                'description' => 'pencils',
                'customer_name' => 'Janet Levitz',
                'formatted_date' => 'Jan 12, 2013',
            ],
            'total' => 10660,
        ],
        'domain' =>[
            'name' => 'My Cool Site',
        ],
    ],
];
