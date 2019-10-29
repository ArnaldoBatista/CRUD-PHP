<?php 
include_once('conn.php');
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$pdf = filter_input(INPUT_POST, 'arquivo', FILTER_SANITIZE_STRING);
$delete="DELETE FROM cadastro2 WHERE id = '".$id."'";
mysqli_query($conn, $delete);
print unlink("$url");
print unlink("$pdf");
print "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=logout.php'>";
?>
 
