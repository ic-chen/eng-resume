<?php
include_once "db_info.php";

$see=($_POST['upt_chked']=="true")?1:0; 
$name=$_POST['upt_name']; 
$url=$_POST['upt_url']; 
$id=$_POST['upt_id']; 

if(!empty($_FILES) AND $_FILES['file']['error']==0) {
    $filename=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$filename);

    $sql="UPDATE `work` SET `see`='$see', `name`='$name', `url`='$url', `filename`='$filename' WHERE `id`='$id'";
    $pdo->exec($sql);
}else{
    $sql="UPDATE `work` SET `see`='$see', `name`='$name', `url`='$url' WHERE `id`='$id'";
    $pdo->exec($sql);
}

// echo $sql;

?>