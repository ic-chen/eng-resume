<?php
include_once "./api/db_info.php";

// 取單筆資料
function search($table,...$arg){
    global $pdo;
    $sql="SELECT * FROM $table WHERE ";
    if(is_array($arg[0])){
      foreach($arg[0] as $key => $value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
      }
      $sql=$sql . implode(" && ",$tmp);
    }else{
      $sql=$sql . " `id`='".$arg[0]."'";
    }
    //echo $sql;
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
// 取全部資料
function searchAll($table,...$arg){
    global $pdo;
    $sql="SELECT * FROM $table";
      if(!empty($arg[0])){
        foreach($arg[0] as $key => $value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql . " WHERE " . implode(" && ",$tmp);
      }    
      if(!empty($arg[1])){
        $sql=$sql . $arg[1];
      }
    //echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resume</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/all.css">
    <style>
    body {
        /* font-size: 1.2em; */
        line-height: 2em;
    }
    .row {
        margin: 1em;
    }
    .work {
        margin-top: 0;
        margin-bottom: 0;
        margin-right: -15px;
        margin-left: -15px;
    }
    .table-reqs tr th {
        width: 30%;
    }
    .table-contact {
        word-break: break-all;
        word-wrap: break-word;
    }
    .skill-table tr th {
        border-bottom: 1px solid #dee2e6;
    }
    .skill-table tr th:nth-child(1) {
    width: 30%;
    }
    .skill-table tr th:nth-child(2) {
    width: 35%;
    }
    .skill-table tr th:nth-child(3) {
    width: 35%;
    }
    .skill-table td {
        border: none;
        word-break: break-all;
        word-wrap: break-word;
    }
    .portfolio {
        padding: 0.8rem;
    }
</style>
</head>
<body class="bg-light text-dark">

<div class="container-fluid">

<?php
// 找出使用者帳號
$page=$_GET['p'];
$data=search("eng_user",["page"=>"$page"]);
$acct=$data['acct'];
// 撈出求職條件
$reqs=searchAll("eng_reqs",["acct"=>"$acct", "see"=>"1"]);
foreach($reqs as $value){
?>
    <!-- 求職條件 -->
    <div class="reqs row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-8">
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                Job Expectations
                </div>
                <div class="card-body">
                    <table class="table-reqs table table-borderless table-sm">
                    <tbody>
                        <tr>
                        <th scope="row">Job</th>
                        <td><?=$value['reqs_posit'];?></td>
                        </tr>
                        <tr>
                        <th scope="row">Job Description</th>
                        <td><?=$value['reqs_jd'];?></td>
                        </tr>
                        <tr>
                        <th scope="row">Notice Period</th>
                        <td><?=$value['reqs_time'];?></td>
                        </tr>
                        <tr>
                        <th scope="row">Job Locations</th>
                        <td><?=$value['reqs_place'];?></td>
                        </tr>
                        <tr>
                        <th scope="row">Employment Type</th>
                        <td><?=$value['reqs_type'];?></td>
                        </tr>
                        <tr>
                        <th scope="row">Expected Salary</th>
                        <td><?=$value['reqs_pay'];?></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- 分隔線 -->
    <div class="reqs row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-8">
            <hr>
        </div>
    </div>
<?php
}
?>

<?php
// 撈出頭像圖片
$img=searchAll("eng_img",["acct"=>"$acct", "see"=>"1"]);
// 撈出自我介紹和自傳
$s_intro=searchAll("eng_s_intro",["acct"=>"$acct", "see"=>"1"]);
// 撈出社群資料
$social_m=searchAll("eng_social_m",["acct"=>"$acct", "see"=>"1"]);
// 撈出學歷資料
$edu=searchAll("eng_edu",["acct"=>"$acct", "see"=>"1"]," ORDER BY id DESC");
?>
    <div class="resume row justify-content-center">
        <!-- 履歷左欄 -->
        <div class="col-12 col-sm-10 col-md-5 col-lg-3">
            <!-- 頭像+姓名 -->
            <div class="name card border-secondary mb-4 text-center">
            <?php
            foreach($img as $value){
            ?>
            <img src="./img/<?=$value['filename'];?>" class="card-img-top" alt="<?=$value['alt'];?>" >
            <?php
            }
            ?>
                <div class="card-body">
                    <h5 class="card-title h2"><?=$data['name'];?></h5>
                    <?php
                    foreach($s_intro as $value){
                        if(!empty($value['s_intro'])) {
                    ?>
                    <p class="card-text"><?=$value['s_intro'];?></p>
                    <?php
                        }
                    }
                    if(!empty($data['addr'])) {
                    ?>
                    <p class="card-text"><small class="text-muted"><?=$data['addr'];?></small></p>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <!-- 聯絡資訊和社群資料 -->
            <?php
                foreach($social_m as $value) {
            ?>
            <div class="contact card border-secondary mb-4">
                <div class="card-header">
                Contact Me
                </div>
                <div class="card-body">
                    <table class="table-contact table table-borderless table-sm">
                    <tbody>
                <?php
                    if(!empty($data['email'])) {
                ?>
                    <tr>
                    <td><i class="far fa-envelope fa-lg"></i></th>
                    <td><a href="mailto:<?=$data['email'];?>"><?=$data['email'];?></td>
                    </tr>
                <?php
                }
                    if(!empty($value['fb'])) {
                ?>
                    <tr>
                    <td><i class="fab fa-facebook-f fa-lg"></i></td>
                    <td><a href="<?=$value['fb'];?>" target="_blank"><?=$value['fb'];?></a></td>
                    </tr>
                <?php
                    }
                    if(!empty($value['ig'])) {
                ?>
                    <tr>
                    <td><i class="fab fa-instagram fa-lg"></i></td>
                    <td><a href="<?=$value['ig'];?>" target="_blank"><?=$value['ig'];?></a></td>
                    </tr>
                <?php
                }
                if(!empty($value['linkedin'])) {
                ?>
                    <tr>
                    <td><i class="fab fa-linkedin-in fa-lg"></td>
                    <td><a href="<?=$value['linkedin'];?>" target="_blank"><?=$value['linkedin'];?></a></td>
                    </tr>
                <?php
                }
                if(!empty($value['github'])) {
                ?>
                    <tr>
                    <td><i class="fab fa-github fa-lg"></i></td>
                    <td><a href="<?=$value['github'];?>" target="_blank"><?=$value['github'];?></a></td>
                    </tr>
                <?php
                }
                if(!empty($value['youtube'])) {
                ?>
                    <tr>
                    <td><i class="fab fa-youtube fa-lg"></i></td>
                    <td><a href="<?=$value['youtube'];?>" target="_blank"><?=$value['youtube'];?></a></td>
                    </tr>
                <?php
                }
                if(!empty($value['twitter'])) {
                ?>
                    <tr>
                    <td><i class="fab fa-twitter fa-lg"></i></td>
                    <td><a href="<?=$value['twitter'];?>" target="_blank"><?=$value['twitter'];?></a></td>
                    </tr>
                <?php
                    }
                ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- 學歷資料 -->
            <div class="edu card border-secondary mb-4">
                <div class="card-header">
                Education
                </div>
                <div class="card-body">
                <?php
                foreach($edu as $value) {
                ?>
                    <p>
                <?php
                if(!empty($value['grad_t'])) {
                ?>
                    <?=$value['grad_t'];?>
                <?php
                }
                if(!empty($value['sch'])) {
                ?>
                    <br><?=$value['sch'];?>
                <?php
                }
                if(!empty($value['dept'])) {
                ?>
                    <br><?=$value['dept'];?>
                <?php
                }
                if(!empty($value['grad_st'])) {
                    ?>
                    （<?=$value['grad_st'];?>）
                    <?php
                }
                ?>
                    </p>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
        <!-- 履歷右欄 -->
        <div class="col-12 col-sm-10 col-md-7 col-lg-5">
            <!-- 自傳 -->
            <?php
            foreach($s_intro as $v) {
            ?>
            <div class="s_intro card border-secondary mb-4">
                <div class="card-header">
                Resume Objective
                </div>
                <div class="card-body">
                    <p><?=$v['bio'];?></p>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- 工作技能 -->
            <div class="skill card border-secondary mb-4">
                <div class="card-header">
                Skills
                </div>
                <div class="card-body">

                <?php
                // 撈出技能資料
                $skill=searchAll("eng_skill",["acct"=>"$acct", "see"=>"1"]);
                // 刪除重複的技能分類
                $cat=array_column($skill,"cat");
                $cat_unique=array_unique($cat);
                foreach($cat_unique as $category){
                ?>
                <table class="skill-table table table-sm">
                <thead>
                    <tr>
                    <th scope="col"><?=$category;?></th>
                    <th scope="col">Level</th>
                    <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($skill as $value) {
                    if($value['cat']==$category){
                ?>
                <tr>
                <td><?=$value['skill'];?></td>
                <td style="padding-top: 0.7em; padding-right: 1.5em;">
                    <div class="progress" style="height: 2em;">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: <?=$value['level'];?>;" aria-valuenow="<?=$value['level'];?>" aria-valuemin="0" aria-valuemax="100"><?=$value['level'];?></div>
                    </div>
                </td>
                <td><?=$value['des'];?></td>
                </tr>
                <?php
                    }
                }
                ?>
                </tbody>
                </table>
                <?php
                }
                ?>
                </div>
            </div>

            <!-- 工作經歷 -->
            <div class="exp card border-secondary">
                <div class="card-header">
                Work Experience
                </div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php
                    $exp=searchAll("eng_exp",["acct"=>"$acct", "see"=>"1"]," ORDER BY id DESC");
                    foreach($exp as $value) {
                    ?>
                    <li class="list-group-item">
                    <?php
                    if(!empty($value['posit'])) {
                        ?>
                        <span class="font-weight-bold"><?=$value['posit'];?></span>
                        <?php
                    }
                    if(!empty($value['corp'])) {
                        ?>
                            — <?=$value['corp'];?>
                        <?php
                        }
                    if(!empty($value['dur'])) {
                    ?>
                        <br><span class="text-muted"><?=$value['dur'];?></span>
                    <?php
                    }
                    if(!empty($value['jd'])) {
                    ?>
                        <br><i class="fas fa-caret-right fa-lg"></i> JD: <?=$value['jd'];?>
                    <?php
                    }
                    ?>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- 分隔線 -->
    <?php
    $count=$pdo->query("SELECT COUNT(*) FROM `eng_work` WHERE `acct`='$acct' && `see`='1'")->fetch();
    if($count[0][0]!=0){
    ?>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-8">
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-8">
            <div class="card text-white bg-secondary mb-2">
                <div class="portfolio card-body text-center">
                Portfolio
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- 作品集 -->
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-8">
            <div class="work row">
            <?php
            $work=searchAll("eng_work",["acct"=>"$acct", "see"=>"1"]);
            foreach($work as $value) {
            ?>
                <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card border-secondary">
                        <img src="./img/<?=$value['filename'];?>" class="card-img-top" alt="<?=$value['filename'];?>">
                        <div class="card-body">
                            <h6 class="card-title"><?=$value['name'];?></h6>
                            <a href="<?=$value['url'];?>" class="btn btn-outline-secondary" target="_blank">Check It Out</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    
    
</div>
</body>
</html>