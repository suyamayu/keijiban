
<?php
mb_internal_encoding("utf-8");

//DB接続
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

//プリペアードステートメントでSQLの型を作る
$stmt = $pdo->prepare("select * from login_mypage where mail=? && password=?");

//bindValueを使用し、実際にwhere句に何をinsertするかを記述
$stmt ->bindValue(1,$_POST['mail']);
$stmt ->bindValue(2,$_POST['password']);

//executeでクエリを実行
$stmt ->execute();
$pdo = NULL;

while ($row = $stmt->fetch()){
  echo $row['mail'];
  echo $row['password'];
}

?>
