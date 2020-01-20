<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `img` WHERE `acct`='$acct'";

$img=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$num=0;
foreach($img as $value){
$img_id=$value['id'];
$checked=($value['see']==1)?"checked":"";
$filename=$value['filename'];
$alt=$value['alt'];
$num++;
?>

<div class="card m-1">
<div class="card-body text-left">

<!-- 第一列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="form-check">
            <input class="form-check-input" name="see" type="radio" id="see<?=$num;?>" <?=$checked;?>>
            <label class="form-check-label" for="see<?=$num;?>">在履歷中顯示</label>
        </div>
    </div>
</div>

<!-- 第二列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <img src="./img/<?=$filename;?>" alt="$alt" class="img-thumbnail">
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="img<?=$num;?>">請選擇一張圖片</label>
        <input type="file" class="form-control-file" id="img<?=$num;?>" type="file" name="img">
    </div>
</div>

<!-- 第四列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputAlt">圖片說明</label>
        <input type="text" class="form-control" name="alt" value="<?=$alt;?>">
    </div>
</div>

<!-- 按鈕列 -->
<input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$img_id;?>">
<input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>
<?php
}
?>