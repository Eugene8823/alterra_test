<?
$id = intval($_GET['id']);

$sql = "DELETE FROM notebook WHERE id = '" . $id . "'";
if (!mysqli_query($db, $sql)) {
?>
	<p>Ошибка удаления</p>
<?
}
?>
