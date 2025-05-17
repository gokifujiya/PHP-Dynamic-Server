<?php
require_once __DIR__ . '/vendor/autoload.php';

use Helpers\RandomGenerator;

// Generate and display 3–5 random users
$users = RandomGenerator::users(3, 5);

foreach ($users as $user) {
    echo $user->toString() . PHP_EOL;
    echo str_repeat('-', 40) . PHP_EOL;
}
