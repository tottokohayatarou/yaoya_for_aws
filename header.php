<?php if(!isset($_SESSION)){ session_start(); }; ?><!-- sessionが開始されていなければ開始する -->
<style>
@charset "UTF-8";


header {
  display: flex;
  align-items: center;
  padding: 8px 13px;
  height: 70px;
  font-family: serif;
  background-color: white;
  width: 1300px;
}
.head-area {
  margin: 0 auto;
  position: fixed;
  z-index: 10;
  left:calc(50% - 1274px/2);
}

.header-blank {
  height: 70px;
}

.main-nav {
  display: flex;
  align-items: center;
}

.cart-icon:hover {
  opacity: 0.7;
}

/* ロゴ */
.logo {
  display: flex;
  width: 254px;
  height: 48px;
  align-items: center;
}

.logo-icon {
  font-size: 3.4rem;
  color: rgb(108, 164, 100);
}

.logo-name {
  padding-left: 4px;
  font-size: 1.4rem;
  color: #333;
  letter-spacing: 2px;
}

/* 検索ウィンドウ */
.serch-field {
  padding-left: 31px;
}

.search-window {
  width: 570px;
  height: 34px;
  padding: 8px 12px;
  color: #333;
  font-size: 16px;
  line-height: 1;
  background: #efeee9;
}

.search-window:hover {
  background-color: #fff;
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
  border-color: rgba(223,225,229,0);
}

.search-button {
  width: 60px;
  height: 34px;
  color: white;
  background: #a98948;
}

.serch-button i {
  color: white;
}

.search-button:hover {
  background: rgb(135,98,39);
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
}

/* ヘッダーリンク */
.header-links {
  display: flex;
  align-items: center;
  padding-left: 23px;
}

.header-links li {
  background-color: white;
}

.header-links li a {
  padding: 8px;
  font-size: 14px;
  line-height: 1.8;
  letter-spacing: 2px;
  font-family: serif;
  font-weight: 400;
  font-style: normal;
  color: #333;
  cursor: pointer;
  white-space: nowrap;
}

.link-hover a:hover {
  color: rgb(163,131,75);
}

.header-links i {
  color: rgb(201, 105, 98);
  font-size: 32px;
}

.message{
  position: fixed;
  z-index: 10;
  top: 70px;
  left: 0;
  right: 0;
  height: 35px;
  padding-top: 7px;
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
  <!-- ヘッダー -->
  <div class="head-area">

    <header class="">
      <a href="index.php">
        <div class="logo">
          <div class="logo-icon"><i class="fab fa-canadian-maple-leaf"></i></div>
          <div class="logo-name">やさいのおおはら</div>
        </div>
      </a>
      
      <nav class="main-nav">
        <div class="serch-field">
          <form action="index.php" method="post">                                     <!--後でメソッドポストに変更する-->
          <input type="text"   class="search-window" name="keyword" placeholder="商品検索"><button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
      </div>
      
      <ul class="header-links link-hover">
        <?php 
        if (isset($_SESSION['user'])) {
          ?>
          <li><a href="logout.php">ログアウト</a></li>
          <li><a href="history.php">購入履歴</a></li>
          <?php
        } else {
          ?>
          <li><a href="login_input_email.php">ログイン</a></li>
          <li><a href="delete_signup_session.php">新規登録</a></li>
          <?php
        }
        ?>
          <li><a href="favorite.php">お気に入り</a></li>
          <li><a href="cart.php"><i class="cart-icon fas fa-shopping-cart"></i></a></li>
        </ul>
      </nav>
      
    </header>
    </div>
    <?php
      // フラッシュメッセージ
      if (isset($_SESSION['message'])) {
        echo '<div id="message" class="message">';
        echo $_SESSION['message'];
        echo '</div>';
        unset($_SESSION['message']);
      }
      ?>
    <div class="header-blank"></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/header.js"></script> 

