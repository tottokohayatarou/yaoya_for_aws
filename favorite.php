<?php
  session_start();

  // ログインしていない場合はログインを促す
  if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = 'お気に入りを表示するにはログインしてください。';
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_input_email.php';

    // リダイレクト
    header("Location:" . $url);
    exit();
  }
  
  require 'db_connect.php';
  $sql = "select * from favorite, product where user_id = :user_id and product_id = id";
  $stm = $pdo->prepare($sql);
  $stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_STR);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
  if (empty($result)) {
    $_SESSION['message'] = 'お気に入りに商品が登録されていません。';
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  
    // リダイレクト
    header("Location:" . $url);
    exit();
  }
  
?>
<?php require_once('header.php') ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="css/commonSytle.css">
    <link rel="stylesheet" href="css/favorite.css">
    <style>
      @charset "UTF-8";


h1 {
  font-family: serif;
  margin-bottom: 20px;
}
.container {
  display: flex;
}

main {
  margin-left: 31px;
  width: 986px;
  padding: 15px;
  background-color: #f1f0ec;
  border-radius: 2px;
}
.align-center {
  text-align: center;
}

.flex-dir-col{
  flex-direction: column;
}

.course-name {
  /* background-color: rgb(244,242, 238); */
  background: #dbd9cf;

  border-bottom: 1px solid rgb(225, 225, 225);
}
.course-name h2 {
  /* color: rgb(87, 186, 255);色つけてーーーーーーーーーーーーーーーー */
  font-family: serif;
  padding: 4px 10px;
  font-size: 20px;
  font-weight: bold;
}

.course-image{
  height: 100%;
  /* height: 180px; */
  width : 270px;
  border-radius: 2px;
}

.cont1 {
  margin: 0 auto 15px auto;
  border: 1px solid rgb(225, 225, 225);
}

.cont2 {
  justify-content: space-between;
  padding: 8px 10px;
  /* background-color: rgb(242, 242, 242); */
  background-color: white;

}

.item2 {
  width: 430px;
  padding: 26px;
  padding-top: 0;
}

.border-bottom{
  border-bottom: 1px solid rgb(225, 225, 225);
}
.button {
  background-color: darkgreen;
  opacity: 0.8;
  color: #fff;
  height: 45px;
  width: 250px;
  border-radius: 7px;
}

.button:hover {
  background-color: darkgreen;
  opacity: 1;
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
}
.delete-button {
  margin-top: 20px;
  background-color: #a98948;
  opacity: 0.8;
  color: #fff;
  height: 45px;
  width: 250px;
  border-radius: 7px;
}

.delete-button:hover {
  background-color: #a98948;
  opacity: 1;
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
}

.price-number {
  font-size: 26px;
  font-weight: bold;
  color: red;
}
.price-unit{
  font-size: 16px;
  color: red;
}
.price-tax {
  font-size: 12px;
  color: red;
}

.product-name {
    font-weight: bold;
    font-size: 18px;
}

.product-name:hover {
  color: rgb(163,131,75);
}
    </style>
    <title>野菜を採るなら大原♪｜お気に入り</title>
  </head>
  <body>
    <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
        <h1>お気に入り</h1>
<?php
          foreach ($result as $row) {
?>
            <!-- <div class="container"> -->
              <div class="container flex-dir-col cont1">
                <div class="course-name">
                  <a href="#"><h2><?= $row['name'] ?></h2></a>
                </div>
        
        
                <div class="container cont2">
                  <div class="item1">
                    <a href="product_detail.php?id=<?= $row['id'] ?>">
                      <img class="course-image" src="images/<?= $row['image_name'] ?>" style="height: 200px;> </img>
                    </a>
                  </div>
        
                  <div class="item2 flex-dir-col">
                    <a href="product_detail.php?id=<?= $row['id'] ?>" class="product-name border-bottom"><?= $row['name'] ?></a>
                    <p class="">最短翌日出荷</p>
                    
                    
                    <div class="price-space">
                      <span class="price-number"><?= number_format($row['price']) ?></span>
                      <span class="price-unit">円</span>
                      <span class="price-tax">／１パッケージ</span>
                    </div>
                  </div>
        
                  <div class="item3">
                    <form action="cart_insert.php" method="post">
                      <button class="button">カートに入れる</button>
                      <input type="hidden" name="count" value="1">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <input type="hidden" name="name" value="<?= $row['name'] ?>">
                      <input type="hidden" name="price" value="<?= $row['price'] ?>">
                      <input type="hidden" name="image_name" value="<?= $row['image_name'] ?>">
                    </form>
                    <a href="favorite_delete.php?id=<?= $row['id'] ?>">
                      <button class="delete-button">削除</button>
                    </a>
                  </div>
                </div>
            </div>
<?php
          }
?>
      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
