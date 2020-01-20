<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];
$cat=$_POST['cat'];
$skill=$_POST['skill'];
$level=$_POST['level'];
$des=$_POST['des'];

$sql="INSERT INTO `eng_skill`(`acct`, `cat`, `skill`, `des`, `level`) 
VALUES ('$acct','$cat','$skill','$des','$level')";

echo $sql;
$pdo->exec($sql);

header("location:../admin.php?p=sk");

?>