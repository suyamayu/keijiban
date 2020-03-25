<?php
mb_internal_encoding("utf-8");

//セッションスタート
session_start();

//DB 接続・try catch文
try{
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
}catch(PODExeption $e){
  die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>
      しばらくしてから再度ログインをして下さい。</p>
      <a href='http://localhost/mypage/mypage.php'>ログイン画面へ</a>"
    );
}

//preparedステートメント(update)でSQLをセット
$stmt = $pdo->prepare("update login_mypage set name=?, mail=?, password=?, comments=? where id=?");
//bindValueメソッドでパラメーターっをセット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

//executeでクエリを実行
$stmt->execute();

//selectする　＊で全てのデータを取ってくるという意味
//プリペアードステートメントでSQLの型を作る(DBとpostデータを照合させる。select文とwhere句を使用。)
$stmt = $pdo->prepare("select * from login_mypage");

//executeでクエリを実行
$stmt->execute();

//データベースを切断
$pdo = NULL;

//fetch・while文でデータ取得し、sessionに代入
while($row = $stmt->fetch()){
  $_SESSION['name'] = $row['name'];
  $_SESSION['mail'] = $row['mail'];
  $_SESSION['password'] = $row['password'];
  $_SESSION['comments'] = $row['comments'];
  $_SESSION['id'] = $row['id'];
}

//mapage.phpへリダイレクト
header('Location:mypage.php');

?>
