<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
    <link rel="stylesheet" href="css/login.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"><!-- フォントオーサム -->
    <style>
    @charset "UTF-8";


/* 共通設定 */
* {
  box-sizing: border-box;
}

body {
  color: #222;
}

a {
  text-decoration: none;
}


/* メインエリア */
.ao {
  color: rgb(83, 131, 236);
}
.aka {
  color: rgb(217, 81, 64);
}
.kiiro {
  color: rgb(242, 191, 66);
}
.midori {
  color: rgb(89, 166, 92);
}
span {
  font-size: 5rem;
}
.yon {
  font-size: 4rem;
}
.login-h1 {
  width: 262px;
  letter-spacing: 4px;
  padding: 0;
  margin: 150px auto 0;
}

.signup-h1 {
  width: 289px;
  letter-spacing: 4px;
  padding: 0;
  margin: 150px auto 0;
}

.search-window {
  border: 1px solid #dfe1e5;
  padding: 0 5px;
  border-radius: 20px;
  height: 2em;
  width: 584px;
  height: 46px;
  overflow: hidden;
  margin: 20px auto 0;
}

.search-window:hover {
  background-color: #fff;
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
  border-color: rgba(223, 225, 229, 0);
}

.text-area {
  width: 526px;
  height: 46px;
  padding-left: 20px;
}

.login-btn {
  width: 40px;
  height: 44px;
}

.login-btn i {
  color: rgb(83, 131, 236);
}


/* 移動リンクボタンエリア */
.link-area {
  width: 280px;
  /* width: 272px; */
  margin: 18px auto 0;
  display: flex;
  justify-content: center;
}

.link-area button {
    background-color: #f8f9fa;
    border: 1px solid #f8f9fa;
    border-radius: 4px;
    color: #3c4043;
    font-family: arial,sans-serif;
    font-size: 13.75px;
    margin: 11px 8px;
    padding: 0 16px;
    line-height: 27px;
    height: 36px;
    min-width: 54px;
    text-align: center;
    cursor: pointer;
    user-select: none;
}

.link-area button:hover {
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
  border-color: rgba(223, 225, 229, 0);
}

.link-area button a {
  color: #222;
}


/* フラッシュメッセージ */
.message{
  height: 42px;
  padding-top: 9px;
  font-weight: bold;
  text-align: center;
  color: white;
  background-color: orange;;
  /* margin-bottom: 10px; */
}

.none{
  display: none;
}
    </style>
    <title>野菜を採るなら大原♪｜ログイン</title>
  </head>
  <body>
<?php
    // フラッシュメッセージ
    if (isset($_SESSION['message'])) {
      echo '<div id="message" class="message">';
      echo $_SESSION['message'];
      echo '</div>';
      unset($_SESSION['message']);
    }
?>
    <!-- ログイン文字列 -->
    <h1 class="login-h1">
        <span class="ao esu">S</span><span class="aka yon">i</span><span class="kiiro yon">g</span><span class="ao yon">n</span> <span class="midori yon">i</span><span class="aka yon">n</span>
    </h1>

    <!-- 入力フォーム -->
    <div class="search-window">
      <form method="post" action="login_output.php" class="search_container">
        <input type="password" class="text-area" name="password" placeholder="Password">
        <button class="login-btn" type="submit" value=""><i class="signin-icon fas fa-sign-in-alt"></i></button>
      </form>
    </div>


    <!-- 移動リンクボタン -->
    <div class="link-area">
      <button class=""><a href="index.php">トップへ戻る</a></button>
      <button><a href="login_input_email.php">アドレスを変更</a></button>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/header.js"></script>
  </body>
</html>