<?php
spl_autoload_extensions(".php");
spl_autoload_register(function($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) include($file);
});

require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

$min = isset($_GET['min']) ? (int)$_GET['min'] : 5;
$max = isset($_GET['max']) ? (int)$_GET['max'] : 10;

$users = RandomGenerator::users($min, $max);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generated Users</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Generated Users</h1>
    <?php foreach ($users as $user): ?>
        <?= $user->toHTML(); ?>
    <?php endforeach; ?>
</body>
</html>
