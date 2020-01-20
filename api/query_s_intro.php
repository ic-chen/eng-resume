<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `eng_s_intro` WHERE `acct`='$acct'";

$s_intro=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$num=0;
foreach($s_intro as $value){
$s_intro_id=$value['id'];
$s_intro=$value['s_intro'];
$bio=$value['bio'];
$checked=($value['see']==1)?"checked":"";
$num++;
?>
<div class="card m-1">
<div class="card-body text-left">

<!-- 第一列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="form-check">
            <input class="form-check-input" name="see" type="radio" id="see<?=$num;?>" <?=$checked;?>>
            <label class="form-check-label" name="see" for="see<?=$num;?>">在履歷中顯示</label>
        </div>
    </div>
</div>

<!-- 第二列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="s_intro">自我介紹</label>
        <textarea class="form-control" name="s_intro" rows="5"><?=$s_intro;?></textarea>
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="bio">自傳</label>
        <textarea class="form-control" name="bio" rows="10"><?=$bio;?></textarea>
    </div>
</div>

<!-- 按鈕列 -->
    <input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$s_intro_id;?>">
    <input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>
<?php
}
?>