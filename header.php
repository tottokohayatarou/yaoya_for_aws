<?php if(!isset($_SESSION)){ session_start(); }; ?><!-- sessionが開始されていなければ開始する -->

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

