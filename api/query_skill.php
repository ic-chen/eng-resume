<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `eng_skill` WHERE `acct`='$acct'";

$ability=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$num=0;
foreach($ability as $value){
$skill_id=$value['id'];
$checked=($value['see']==1)?"checked":"";
$cat=$value['cat'];
$skill=$value['skill'];
$level=$value['level'];
$des=$value['des'];
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
        <label for="inputCat">類別</label>
        <select id="inputCat" class="form-control">
            <option <?=($cat=="Finance/Accounting")?"selected":"";?>>Finance/Accounting</option>
            <option <?=($cat=="HR/Admin/Legal")?"selected":"";?>>HR/Admin/Legal</option>
            <option <?=($cat=="Management")?"selected":"";?>>Management</option>
            <option <?=($cat=="Banking/Insurance")?"selected":"";?>>Banking/Insurance</option>
            <option <?=($cat=="Marketing/Plan")?"selected":"";?>>Marketing/Plan</option>
            <option <?=($cat=="Service/Sales/Trade")?"selected":"";?>>Service/Sales/Trade</option>
            <option <?=($cat=="Cosmetology/Hairdressing")?"selected":"";?>>Cosmetology/Hairdressing</option>
            <option <?=($cat=="Catering/Tourism")?"selected":"";?>>Catering/Tourism</option>
            <option <?=($cat=="IT/Network")?"selected":"";?>>IT/Network</option>
            <option <?=($cat=="Electronic/Electrical")?"selected":"";?>>Electronic/Electrical</option>
            <option <?=($cat=="Chemical/Medical")?"selected":"";?>>Chemical/Medical</option>
            <option <?=($cat=="Transportation")?"selected":"";?>>Transportation</option>
            <option <?=($cat=="Manufacturing")?"selected":"";?>>Manufacturing</option>
            <option <?=($cat=="Design/Art")?"selected":"";?>>Design/Art</option>
            <option <?=($cat=="Language")?"selected":"";?>>Language</option>
        </select>
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputSkill">技能</label>
        <input type="text" class="form-control" value="<?=$skill;?>">
    </div>
</div>

<!-- 第四列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="customRange0<?=$num;?>">程度</label>
        <input type="range" class="custom-range" id="customRange0<?=$num;?>" min="0" max="100" step="1" value="<?=str_replace("%","",$level);?>">
        <input type="text" name="level" class="level form-control" value="<?=$level;?>">
        <small class="form-text text-primary">請使用滑桿調整，或直接輸入百分比數值。</small>
    </div>
</div>

<!-- 第五列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputDes">說明</label>
        <input type="text" name="des" class="form-control" value="<?=$des;?>">
    </div>
</div>

<!-- 按鈕列 -->
    <input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$skill_id;?>">
    <input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>
<?php
}
?>