<?php

  session_start();

    // DBに接続
  require('dbconnect.php');


  // likeボタンが押されたとき
  if (isset($_GET["like_tweet_id"])){

   like($_GET["like_tweet_id"],$_SESSION["id"]);
 
    // like情報をlikesテーブルに登録
    // $sql = "INSERT INTO `likes` (`tweet_id`, `member_id`) VALUES ( ".$_GET["like_tweet_id"].", ".$_SESSION["id"].");";

    // // SQL文実行
    //     $stmt = $dbh->prepare($sql);
    //     $stmt->execute($data);

    //     // 一覧ページに戻る
    //     header("Location: index.php");
  }

  // unlikeボタンが押されたとき
  if (isset($_GET["unlike_tweet_id"])){

   unlike($_GET["unlike_tweet_id"],$_SESSION["id"]);

    // 登録されているlike情報をlikesテーブルから削除
    $sql = "DELETE FROM `likes` WHERE tweet_id=".$_GET["unlike_tweet_id"]." AND member_id=".$_SESSION["id"];

    // SQL文実行
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        // 一覧ページに戻る
        header("Location: index.php");

  }

  // like関数
  // 引数 like_tweet_id,login_member_id
  function like($like_tweet_id,$login_member_id){
  // DBに接続
  require('dbconnect.php');

    $sql = "INSERT INTO `likes` (`tweet_id`, `member_id`) VALUES ( ".$like_tweet_id.", ".$login_member_id.");";

    // SQL文実行
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        // 一覧ページに戻る
        header("Location: index.php");
  }


  // unlike関数
  // 引数 unlike_tweet_id,login_member_id
  function unlike($unlike_tweet_id,$login_member_id){
  // DBに接続
  require('dbconnect.php');

    // 登録されているlike情報をlikesテーブルから削除
    $sql = "DELETE FROM `likes` WHERE tweet_id=".$unlike_tweet_id." AND member_id=".$login_member_id;

    // SQL文実行
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        // 一覧ページに戻る
        header("Location: index.php");

  }

?>