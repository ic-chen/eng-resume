<?php
include_once "db_info.php";

if(!empty($_FILES) AND $_FILES['img']['error']==0) {
    $id=$_SESSION['id'];

    $sql="SELECT * FROM `user` WHERE `id`='$id'";
    $data=$pdo->query($sql)->fetch();

    $filename=$_FILES['img']['name'];
    $acct=$data['acct'];
    $name=$_POST['name'];
    $url=$_POST['url'];

    $sql="INSERT INTO `eng_work`(`acct`,`filename`,`name`,`url`) 
    VALUES ('$acct','$filename','$name','$url')";

    echo $sql;
    $pdo->exec($sql);
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
}

header("location:../admin.php?p=wo");

?>