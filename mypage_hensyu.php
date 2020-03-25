<?php
mb_internal_encoding("utf8");
session_start();

//mypage.phpからの導線以外は「login_error.php」へリダイレクト
if(empty($_SESSION['id'])){
  header("Location:login_error.php");
}

?>



<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
  </head>

  <body>
    <header>
      <img src="4eachblog_logo.jpg">
      <div class="login"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
      <form action="mypage_update.php" method="post" enctype="multipart/form-data">

          <div class="box">

              <h2>会員情報</h2>

              <div class="profile_pic">
                  <img src="<?php echo $_SESSION['picture']; ?>">
              </div>

              <div class="user_prof">
                  <p>氏名：</p>
                    <input type="text" class="formbox" size="40" name="name" required
                          value="<?php echo $_SESSION['name']; ?>">
                  <p>メール：</p>
                    <input type="text" class="formbox" size="40" name="mail"
                            pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,3}$" required
                            value="<?php echo $_SESSION['mail']; ?>">
                  <p>パスワード：</p>
                    <input type="password" class="formbox" size="40" name="password"
                            pattern="^[a-zA-Z0-9]{6,}$" required
                            value="<?php echo $_SESSION['password']; ?>">
              </div>

              <div class="comments">
                  <textarea rows="5" cols="90" name="comments" ><?php echo $_SESSION['comments']; ?></textarea>
              </div>


          <div class="edit">
            <input type="submit" class="submit_button" size="35" value="この内容に変更する">
          </div>

         </div>

      </form>
    </main>


    <footer>
      ©️2018 InterNous.Inc. All rights reserved
    </footer>


  </body>
</html>
