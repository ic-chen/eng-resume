<?php
include_once "db_info.php";

$see=($_POST['upt_chked']=="true")?1:0;
$cat=$_POST['cat'];
$skill=$_POST['skill'];
$level=$_POST['level'];
$des=$_POST['des'];
$id=$_POST['upt_id'];

$sql="UPDATE `eng_skill` SET `see`='$see',`cat`='$cat',`skill`='$skill',`level`='$level',`des`='$des' WHERE `id`='$id'";

echo $sql;

$pdo->exec($sql);
?>