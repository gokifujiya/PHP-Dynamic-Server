<?php
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

// Retrieve and validate POST parameters
$count = $_POST['count'] ?? null;
$format = $_POST['format'] ?? null;

if (is_null($count) || is_null($format)) {
    http_response_code(412);
    exit('❌ Missing parameters.');
}

if (!is_numeric($count) || $count < 1 || $count > 100) {
    http_response_code(412);
    exit('❌ Invalid count. Must be a number between 1 and 100.');
}

$allowedFormats = ['json', 'txt', 'html', 'markdown'];
if (!in_array($format, $allowedFormats)) {
    http_response_code(412);
    exit('❌ Invalid format. Must be one of: ' . implode(', ', $allowedFormats));
}

$count = (int)$count;
$users = RandomGenerator::users(1, $count);

// Output by format
switch ($format) {
    case 'markdown':
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="users.md"');
        foreach ($users as $user) {
            echo $user->toMarkdown() . "\n\n";
        }
        break;

    case 'json':
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="users.json"');
        $data = array_map(fn($u) => $u->toArray(), $users);
        echo json_encode($data, JSON_PRETTY_PRINT);
        break;

    case 'txt':
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="users.txt"');
        foreach ($users as $user) {
            echo $user->toString() . "\n" . str_repeat('-', 40) . "\n";
        }
        break;

    case 'html':
    default:
        header('Content-Type: text/html');
        header('Content-Disposition: attachment; filename="users.html"');
        echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Users</title></head><body>";
        foreach ($users as $user) {
            echo $user->toHTML() . "<hr>";
        }
        echo "</body></html>";
        break;
}
