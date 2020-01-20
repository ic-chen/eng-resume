<?php
include_once "db_info.php";

$see=($_POST['upt_chked']=="true")?1:0; 
$alt=$_POST['upt_alt']; 
$id=$_POST['upt_id']; 

// var_dump($_FILES['file']);

if(!empty($_FILES) AND $_FILES['file']['error']==0) {
    $filename=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$filename);

    $sql="UPDATE `img` SET `see`='$see', `alt`='$alt', `filename`='$filename' WHERE `id`='$id'";
    $pdo->exec($sql);
}else{
    $sql="UPDATE `img` SET `see`='$see', `alt`='$alt' WHERE `id`='$id'";
    $pdo->exec($sql);
}

// echo $sql;


?>