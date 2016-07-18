<?php

include __DIR__ . "/vendor/autoload.php";

$items = [
    [
        'name' => 'apples',
        'price' => '1.99',
    ],
    [
        'name' => 'oranges',
        'price' => '2.99',
    ],
    [
        'name' => 'pears',
        'price' => '1.50',
    ],
];

$super_market = new RoomMiniBar();

$super_market->showCart($items);
