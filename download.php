<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

require_once "vendor/autoload.php";


// POSTリクエストからパラメータを取得
$count = $_POST["count"] ?? 5;
$format = $_POST["format"] ?? "html";

$count = (int) $count;

if (is_null($count) || is_null($format)) {
    exit('Missing parameters.');
}

if (!is_numeric($count) || $count < 1 || $count > 100) {
    exit('Invalid count. Must be a number between 1 and 100.');
}

$allowedFormats = ['json', 'txt', 'html', 'md'];
if (!in_array($format, $allowedFormats)) {
    exit('Invalid type. Must be one of: ' . implode(', ', $allowedFormats));
}

// ユーザーを生成
$users = Helpers\RandomGenerator::generateArray("user", $count, $count);

foreach ($users as $user) {
    $user->toHTML();
}


if ($format == "markdown") {
    header("Content-Type: text/markdown");
    header("Content-Disposition: attachment; filename=user.md");
    foreach ($users as $user) {
        echo $user->toMarkdown();
    }
} else if ($format == "json") {
    header("Content-Type: text/json");
    header("Content-Disposition: attachment; filename=user.json");
    $usersArray = array_map(fn ($user) => $user->toArray(), $users);
    echo json_encode($usersArray);
} else if ($format == "text") {
    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=user.txt");
    foreach ($users as $user) {
        echo $user->toString();
    }
} else {
    header("Content-Type: text/html");
    foreach ($users as $user) {
        echo $user->toHTML();
    }
}
