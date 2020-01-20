<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `eng_exp` WHERE `acct`='$acct'";

$exp=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$num=0;
foreach($exp as $value){
$exp_id=$value['id'];
$checked=($value['see']==1)?"checked":"";
$dur=$value['dur'];
$corp=$value['corp'];
$posit=$value['posit'];
$jd=$value['jd'];
$num++;
?>

<div class="card m-1">
<div class="card-body text-left">

<!-- 第一列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="see<?=$num;?>" <?=$checked;?>>
            <label class="form-check-label" for="see<?=$num;?>">在履歷中顯示</label>
        </div>
    </div>
</div>

<!-- 第二列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputDur">任職期間</label>
        <input type="text" class="form-control" value="<?=$dur;?>">
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-7">
        <label for="inputCorp">公司</label>
        <input type="text" class="form-control" value="<?=$corp;?>">
    </div>
    <div class="form-group col-md-5">
        <label for="inputPosit">職稱</label>
        <input type="text" class="form-control" value="<?=$posit;?>">
    </div>
</div>

<!-- 第四列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputJD">工作說明</label>
        <textarea class="form-control" name="jd" rows="5"><?=$jd;?></textarea>
    </div>
</div>

<!-- 按鈕列 -->
<input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$exp_id;?>">
<input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>
<?php
}
?>