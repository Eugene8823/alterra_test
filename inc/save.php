<?
if (isset($_POST['name'])) {
	$name = trim($_POST['name']);
}

if (isset($_POST['phone'])) {
	$phone = preg_replace("/[^\d]/", "", $_POST['phone']);
}


if (($name) && ($phone)) {
	$sql = "INSERT INTO notebook SET name = '" . mysqli_real_escape_string($db, $name) . "', phone = '" . $phone . "'";
	if (mysqli_query($db, $sql)) {
		//ok
		$name = "";
		$phone = "";
	} else {
?>
	<p>Ошибка записи в БД</p>
<?
	}

} else {
?>
	<p>Заполните поля формы</p>
<?
}
?>
