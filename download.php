<?php
// コードベースのファイルのオートロード

use Helpers\GenerateFiles;

use function PHPSTORM_META\type;

spl_autoload_extensions(".php");
spl_autoload_register();

require_once "vendor/autoload.php";


// POSTリクエストからパラメータを取得
$employee = (int)($_POST["employee"] ?? 5);
$location = (int)($_POST["location"] ?? 5);
$salary_min = (int)($_POST["salary_min"] ?? 100);
$salary_max  = (int)($_POST["salary_max"] ?? 1000);
$postcode_min = isset($_POST["postcode_min"]) ? $_POST["postcode_min"] : "123-4567";
$postcode_max = isset($_POST["postcode_max"]) ? $_POST["postcode_max"] : "456-7891";
$format = $_POST["format"] ?? "html";


// echo gettype($employee) .  ": " . $employee . PHP_EOL;
// echo gettype($location) .  ": " . $location . PHP_EOL;
// echo gettype($postcode_max) . ": " . $postcode_max . " " .  gettype($postcode_min) . ": " . $postcode_min . PHP_EOL;
// echo "min_salary : " . $salary_min . " " . "max_salary: " . $salary_max . PHP_EOL;
// echo gettype($format) . ": " . $format . PHP_EOL;

if (
    is_null($employee) || is_null($location) || is_null($salary_min) || is_null($salary_max) ||
    is_null($postcode_min) || is_null($postcode_max) || is_null($format)
) {
    exit('Missing parameters.');
}

if ($salary_max == 0) {
    $salary_max = 1000;
}

if (!is_numeric($employee) || $employee < 1 || $employee > 100) {
    exit('Invalid employee. Must be a number between 1 and 100.');
}

if (!is_numeric($location) || $location < 1 || $location > 10) {
    exit('Invalid employee. Must be a number between 1 and 10.');
}

$allowedFormats = ['json', 'text', 'html', 'md'];
if (!in_array($format, $allowedFormats)) {
    exit('Invalid type. Must be one of: ' . implode(', ', $allowedFormats));
}

// // ユーザーを生成
$restrauntChains = Helpers\RandomGenerator::restaurantChains(
    $location,
    $employee,
    $salary_min,
    $salary_max,
    $postcode_min,
    $postcode_max
);


if ($format == "md") {
    header("Content-Type: text/markdown");
    header("Content-Disposition: attachment; filename=user.md");

    GenerateFiles::generateMarkDown($restrauntChains);
} else if ($format == "json") {
    header("Content-Type: text/json");
    header("Content-Disposition: attachment; filename=user.json");
    GenerateFiles::generateJson($restrauntChains);
} else if ($format == "text") {
    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=user.txt");
    GenerateFiles::generateText($restrauntChains);
} else {
    header("Content-Type: text/html");
    include "HTML.php";
}
