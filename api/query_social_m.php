<?php
include_once "db_info.php";

$id=$_SESSION['id'];

$sql="SELECT * FROM `eng_user` WHERE `id`='$id'";

$data=$pdo->query($sql)->fetch();

$acct=$data['acct'];

$sql="SELECT * FROM `eng_social_m` WHERE `acct`='$acct'";

$s_m=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// print_r($s_m);
$num=0;
foreach($s_m as $value){
$s_m_id=$value['id'];
$checked=($value['see']==1)?"checked":"";
$s_m_fb=$value['fb'];
$s_m_ig=$value['ig'];
$s_m_linkedin=$value['linkedin'];
$s_m_github=$value['github'];
$s_m_youtube=$value['youtube'];
$s_m_twitter=$value['twitter'];
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
        <label for="inputFB">FB</label>
        <input type="text" class="form-control" value="<?=$s_m_fb;?>">
    </div>
</div>

<!-- 第三列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputIG">IG</label>
        <input type="text" class="form-control" value="<?=$s_m_ig;?>">
    </div>
</div>

<!-- 第四列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputLinkedIn">LinkedIn</label>
        <input type="text" class="form-control" value="$<?=$s_m_linkedin;?>">
    </div>
</div>

<!-- 第五列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputGitHub">GitHub</label>
        <input type="text" class="form-control" value="<?=$s_m_github;?>">
    </div>
</div>

<!-- 第六列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputYoutube">Youtube</label>
        <input type="text" class="form-control" value="<?=$s_m_youtube;?>">
    </div>
</div>

<!-- 第七列 -->
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputTwitter">Twitter</label>
        <input type="text" class="form-control" value="<?=$s_m_twitter;?>">
    </div>
</div>

<!-- 按鈕列 -->
    <input type="button" value="更新" class="upt-btn btn btn-primary" id="<?=$s_m_id;?>">
    <input type="button" value="刪除" class="del-btn btn btn-primary">

<!-- 收尾標籤 -->
</div>
</div>
<?php
}
?>