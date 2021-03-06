<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `eng_edu` WHERE `acct`='$acct'";

$edu=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$num=0;
foreach($edu as $value){
$edu_id=$value['id'];
$grad_t=$value['grad_t'];
$checked=($value['see']==1)?"checked":"";
$sch=$value['sch'];
$dept=$value['dept'];
$grad_st=$value['grad_st'];
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
    <div class="form-group col-md-9">
        <label for="inputGrad_t">就讀時間</label>
        <input type="text" class="form-control" value="<?=$grad_t;?>">
    </div>
    <div class="form-group col-md-3">
        <label for="inputGrad_st">畢業狀態</label>
    <select id="inputGrad_st" class="form-control">
        <option <?=($grad_st=="Graduated")?"selected":"";?>>Graduated</option>
        <option <?=($grad_st=="Studied")?"selected":"";?>>Studied</option>
        <option <?=($grad_st=="Enrolled")?"selected":"";?>>Enrolled</option>
        <option <?=($grad_st=="Completed")?"selected":"";?>>Completed</option>
    </select>
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputSch">學校</label>
        <input type="text" class="form-control" value="<?=$sch;?>">
    </div>
</div>

<!-- 第四列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputDept">科系</label>
        <input type="text" class="form-control" value="<?=$dept;?>">
    </div>
</div>

<!-- 按鈕列 -->
<input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$edu_id;?>">
<input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>

<?php
}
?>