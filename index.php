<?
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="ru-RU">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Книга контактов</title>
	<link href="/css/css.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="wrap1"><div id="wrap2">
<?
// DB connection
require(__DIR__ . "/inc/db.php");

$name = "";
$phone = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// SAVE to notebook
	require(__DIR__ . "/inc/save.php");
} elseif (isset($_GET['del'])) {
	// DELETE from notebook
	require(__DIR__ . "/inc/del.php");
}
?>
	<div id="add_form">
		<h2>Добавить контакт</h2>
		<form method="post">
			<div><input type="text" id="name" name="name" placeholder="Имя" value="<? echo htmlspecialchars($name); ?>" required></div>
			<div><input type="text" id="phone" name="phone" placeholder="Телефон" value="<? echo $phone; ?>" required></div>
			<div><input type="submit" value="Добавить"></div>
		</form>
	</div>
<?
		$sql = "SELECT * FROM notebook ORDER BY name, phone";
		$res = mysqli_query($db, $sql);

		if ($res) {
?>
	<div id="contact_list">
		<h2>Список контактов</h2>
<?
			if (mysqli_num_rows($res)) {
				while ($row = mysqli_fetch_assoc($res)) {
?>
		<div class="contact">
			<div class="name"><? echo $row['name']; ?><a href="/?del&id=<? echo $row['id']; ?>" class="del" onclick="if(!window.confirm('Удалить?')) return false;">&times;</a></div>
			<div class="phone"><? echo preg_replace("/([0-9]{1})([0-9]{3})?([0-9]{3})?([0-9]{2})?([0-9]{2})?/", "$1 $2 $3 $4 $5", $row['phone']); ?></div>


		</div>
<?
				}

			} else {
?>
		<div class="contact">
			<div>Пусто</div>
		</div>
<?
			}
?>
	</div>
<?
		}
?>

</div></div>

<script src="/js/jquery.js"></script>
<script src="/js/jquery.inputmask.min.js"></script>
<script src="/js/lib.js"></script>

</body>

</html>
