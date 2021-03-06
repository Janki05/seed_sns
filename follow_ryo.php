<?php
  session_start();
    // DBに接続
  require('dbconnect.php');

// ログインしている人のプロフィールペ情報をmembersテーブルから取得
        $sql = "SELECT * FROM `members` WHERE `member_id`=".$_SESSION["id"];

        // sql分実行
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $profile_member = $stmt->fetch(PDO::FETCH_ASSOC);

        // follower = $stmt->fetch(PDO::FETCH_ASSOC);
        $sql="INSERT INTO `follows` (`id`, `member_id`, `follower_id`, `created`) VALUES (NULL, '12', '17', CURRENT_TIMESTAMP)";

// フォロー処理
// profile.php?follow_id=7　というリンクが押された＝フォローボタンが押された
        if (isset($_GET["follow_id"])){
          // follow情報を記録するSQL
        $sql="INSERT INTO `follows` (`member_id`, `follower_id`) VALUES (?, ?);";
        
        $data = array($_SESSION["id"],$_GET["follow_id"]);  
        $fl_stmt = $dbh->prepare($sql);
        $fl_stmt->execute($data);
        }

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeedSNS</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"><span class="strong-title"><i class="fa fa-twitter-square"></i> Seed SNS</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">ログアウト</a></li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-3 content-margin-top">
        <img src="picture_path/<?php echo $profile_member["picture_path"]; ?>" width="250" height="250">
        <h3><?php echo $profile_member["nick_name"]; ?></h3>
        <?php if($_SESSION["id"] != $profile_member["member_id"]){ ?>
        <a href="profile.php?member_id=<?php echo $profile_member["member_id"]; ?>&follow_id=<?php echo $profile_member["member_id"]; ?>">
        <button class="btn btn-block btn-default">フォロー</button></a>
        <?php } ?>
        <br>
        <a href="index.php">&laquo;&nbsp;一覧へ戻る</a>
      </div>
      <div class="col-md-9 content-margin-top">
        <div class="msg">
          <img src="http://c85c7a.medialib.glogster.com/taniaarca/media/71/71c8671f98761a43f6f50a282e20f0b82bdb1f8c/blog-images-1349202732-fondo-steve-jobs-ipad.jpg" width="100" height="100">
          <p>投稿者 : <span class="name"> Seed kun </span></p>
          <p>
            つぶやき : <br>
            つぶやき４つぶやき４つぶやき４
          </p>
          <p class="day">
            2016-01-28 18:04
            [<a href="#" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <img src="http://c85c7a.medialib.glogster.com/taniaarca/media/71/71c8671f98761a43f6f50a282e20f0b82bdb1f8c/blog-images-1349202732-fondo-steve-jobs-ipad.jpg" width="100" height="100">
          <p>投稿者 : <span class="name"> Seed kun </span></p>
          <p>
            つぶやき : <br>
            つぶやき４つぶやき４つぶやき４
          </p>
          <p class="day">
          
            [<a href="#" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <img src="http://c85c7a.medialib.glogster.com/taniaarca/media/71/71c8671f98761a43f6f50a282e20f0b82bdb1f8c/blog-images-1349202732-fondo-steve-jobs-ipad.jpg" width="100" height="100">
          <p>投稿者 : <span class="name"> Seed kun </span></p>
          <p>
            つぶやき : <br>
            つぶやき４つぶやき４つぶやき４
          </p>
          <p class="day">
            2016-01-28 18:04
            [<a href="#" style="color: #F33;">削除</a>]
          </p>
        </div>
        <div class="msg">
          <img src="http://c85c7a.medialib.glogster.com/taniaarca/media/71/71c8671f98761a43f6f50a282e20f0b82bdb1f8c/blog-images-1349202732-fondo-steve-jobs-ipad.jpg" width="100" height="100">
          <p>投稿者 : <span class="name"> Seed kun </span></p>
          <p>
            つぶやき : <br>
            つぶやき４つぶやき４つぶやき４
          </p>
          <p class="day">
            2016-01-28 18:04
            [<a href="#" style="color: #F33;">削除</a>]
          </p>
        </div>
          
        
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-3.1.1.js"></script>
    <script src="assets/js/jquery-migrate-1.4.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
