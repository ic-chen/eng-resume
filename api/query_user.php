<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` 
WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

echo json_encode($data);
?>