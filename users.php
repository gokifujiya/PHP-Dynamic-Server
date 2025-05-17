<?php
require_once __DIR__ . '/vendor/autoload.php';

use Helpers\RandomGenerator;

$users = RandomGenerator::users(3, 7);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Cards</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .user-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 12px;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <h1>Generated Users</h1>

    <?php foreach ($users as $user): ?>
        <?= $user->toHTML(); ?>
        <hr>
    <?php endforeach; ?>
</body>
</html>
