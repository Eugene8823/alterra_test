<?
$set = [
	'host' => '127.0.0.1',
	'user' => 'root',
	'password' => '',
	'dbname' => 'alterra_test'
];

mysqli_report(MYSQLI_REPORT_ERROR);

$db = new mysqli($set['host'], $set['user'], $set['password'], $set['dbname']);

if ($db->connect_error) {
    die("<p>Ошибка: " . $db->connect_error . "</p>");
}

mysqli_set_charset($db, "utf8mb4");
?>
