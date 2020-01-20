<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `eng_reqs` WHERE `acct`='$acct'";

$reqs=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$num=0;
foreach($reqs as $value){
$checked=($value['see']==1)?"checked":"";
$reqs_posit=$value['reqs_posit'];
$reqs_jd=$value['reqs_jd'];
$reqs_time=$value['reqs_time'];
$reqs_place=$value['reqs_place'];
$reqs_type=$value['reqs_type'];
$reqs_pay=$value['reqs_pay'];
$reqs_id=$value['id'];
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
        <label for="inputReqs_posit">期望職務</label>
        <input type="text" class="form-control" value="<?=$reqs_posit;?>">
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputReqs_jd">工作描述</label>
        <textarea class="form-control" name="reqs_jd" rows="3"><?=$reqs_jd;?></textarea>
    </div>
</div>

<!-- 第四列 -->
<div class="form-row">
  <div class="form-group col-md-12" id="reqs_t<?=$num;?>">
    <label for="inputReqs_t<?=$num;?>">可上班時間</label>
    <select id="inputReqs_t<?=$num;?>" class="inputReqs_t1 form-control">
    <option <?=($reqs_time=="Any")?"selected":"";?>>Any</option>
    <option <?=($reqs_time=="1 week")?"selected":"";?>>1 week</option>
    <option <?=($reqs_time=="2 weeks")?"selected":"";?>>2 weeks</option>
    <option <?=($reqs_time=="3 weeks")?"selected":"";?>>3 weeks</option>
    <option <?=($reqs_time=="1 month")?"selected":"";?>>1 month</option>
    <option>Other</option>
    </select>
  </div>
<!-- 選「其他」後顯示，預設隱藏 -->
  <div class="form-group col-md-12" id="reqs_t0<?=$num;?>" style="display:none;">
    <label for="inputReqs_t0<?=$num;?>">可上班時間</label>
    <input type="text" id="inputReqs_t0<?=$num;?>" class="inputReqs_t2 form-control">
  </div>
</div>

<!-- 第五列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputReqs_place">期望工作地點</label>
        <input type="text" class="form-control" value="<?=$reqs_place;?>">
    </div>
</div>

<!-- 第六列 -->
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputReqs_type<?=$num;?>">期望工作性質</label>
        <select id="inputReqs_type<?=$num;?>" class="form-control">
        <option <?=($reqs_type=="Full-time")?"selected":"";?>>Full-time</option>
        <option <?=($reqs_type=="Part-time")?"selected":"";?>>Part-time</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="inputReqs_pay">期望薪資</label>
        <input type="text" class="form-control" value="<?=$reqs_pay;?>">
    </div>
</div>

<!-- 按鈕列 -->
    <input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$reqs_id;?>">
    <input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>
<?php
}
?>