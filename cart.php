<?php
session_start();

if (empty($_SESSION['product'])) {
  $_SESSION['message'] = 'カートに商品がありません。';
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header("Location:" . $url);
  exit();
}
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="css/cart.css" />
    <style>
      @charset "UTF-8";


.cart {
  background-color: #f1f0ec;
  min-height: 80vh;
  width: 1300px;
  margin: 55px auto 0;
  padding-top: 30px;
}

.cart-title {
  margin: 0 auto;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 0.8rem;
  padding: 0 1rem;
}

.cart-logo-icon {
  font-size: 2.8rem;
  color: green;
}

.cart-logo-name {
  padding-left: 4px;
  font-size: 18.8px;
  font-family: serif;
  font-weight: bold;
  color: #333;
  letter-spacing: 2px;
}

.cart-container {
  display: flex;
  justify-content: space-between;
  margin-top: 14px;
  padding-bottom: 20px;
}

.cart-detail {
  width: 836px;
  margin-left: 11px;
}

.cart-price-area {
  width: 403px;
  margin-right: 19px;
}

.cart-price-area-top {
  padding: 1rem;
  background: #dbd9cf;
}

.cart-table {
  border-collapse: collapse;
  width: 100%;
}

.cart-table th-tr {
  width: 820px;
  padding-top: 5px;
  margin: 0 auto;
  border: 1px solid #d4d4d4;
}

.cart-table tr {
  vertical-align: middle;
  border-bottom: 1px solid #d4d4d4;
}
.cart-table th {
  height: 36px;
  font-size: 0.85rem;
  font-weight: normal;
  background: #dbd9cf;
}

.cart-table td {
  text-align: center;
  font-size: 14px;
  background-color: white;
}

.cart-th1 {
  width: 409px;
}
.cart-th2 {
  width: 82px;
}
.cart-th3 {
  width: 123px;
}
.cart-th4 {
  width: 123px;
}
.cart-th5 {
  width: 82px;
}

.product-img-cell {
  display: flex;
  align-items: center;
}

.cart-table td a {
  line-height: 1.75;
  color: #383838;
  padding: 8px;
}

.cart-table td a:hover {
  color: rgb(163, 131, 75);
}

.cart-product-img {
  width: 82px;
  height: 82px;
  vertical-align: middle;
}

.trash-icon {
  font-size: 23px;
}

/* 注文内容欄 */
.cart-subtotal {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: nowrap;
  border-top: solid 1px #383838;
  padding: 0.8rem;
}

.text {
  font-size: 14.176px;
  line-height: 1.42;
}

.amount {
  font-size: 1.625rem;
  font-weight: bold;
}

.price {
  width: 70%;
  font-weight: bold;
  text-align: right;
}

.sub-amount {
  font-size: 1.1rem;
}

.fontsize-mini {
  font-weight: normal;
  font-size: 0.75rem;
}

.ship-price-link {
  padding: 0.9rem 0 0.8rem;
  font-size: 14px;
  text-decoration: underline;
}

.ship-price-link:hover {
  color: rgb(163, 131, 75);
}

.shipping-info {
  text-align: right;
  color: red;
  font-weight: bold;
  padding-top: 0.3rem;
  padding-right: 0.8rem;
}

.shipping-info-return {
  display: block;
  padding-right: 0.8rem;
  text-align: right;
  text-decoration: underline;
}

.buy-button {
  /* background-color: rgb(117, 163, 91); */
  display: block;
  width: 370px;
  height: 50px;
  margin: 16px auto 7px;
  text-align: center;
  font-size: 16px;
  font-weight: bold;
  color: white;
  background-color: darkgreen;
  opacity: 0.8;
  border-radius: 2%;
}

.buy-button:hover {
  background-color: darkgreen;
  opacity: 1;
}
.orange {
  color: orange;
  font-weight: initial;
}

.cart-shipping-price {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 0.8rem;
  margin-top: 2px;
  margin-bottom: 2px;
  flex-wrap: nowrap;
  border-top: solid 1px #383838;
  border-bottom: solid 1px #383838;
}

.cart-shipping-price text {
  padding-left: 0.8rem;
}

.cart-price-area-bottom {
  padding: 1rem 0 1rem;
}

.cart-price-area-bottom p {
  text-align: right;
}

.cart-price-area-bottom p a {
  text-decoration: underline;
}

.return-button {
  margin-top: 20px;
  padding: 0.65rem 1rem;
  background-color: rgb(131, 159, 163);
  color: white;
  border-radius: 2%;
}

.return-button:hover {
  background-color: #68878c;
}

    </style>
    <title>野菜を採るなら大原♪｜カート</title>
  </head>
  <body>
    <!-- タイトル -->
    <div class="cart">
      <div class="cart-title">
        <div class="cart-logo-icon"><i class=" orange fab fa-critical-role"></i></div>
        <div class="cart-logo-name">るる自然農園のショッピングカート</div>
      </div>
      
      <div class="cart-container">
<?php
?>
        <!-- 注文詳細 -->
        <div class="cart-detail">
          <table class="cart-table">
            
            <tr class="th-tr">
              <th class="cart-th1">ご注文商品</th>
              <th class="cart-th2">価格(税込)</th>
              <th class="cart-th3">注文数</th>
              <th class="cart-th4">小計(税込)</th>
              <th class="cart-th5">取消</th>
            </tr>
<?php
          $total = 0;
          foreach ($_SESSION['product'] as $id => $product) {
            if ($product['count'] === 0) {
              $product['count'] = 1;
            }
            $subtotal = $product['price'] * $product['count'];
            $total += $subtotal;
?>
            <tr>
              <td class="product-img-cell">
                <a href="product_detail.php?id=<?= $id ?>"><img class="cart-product-img" src="images/<?= $product['image_name'] ?>" alt=""></a>
                <a href="product_detail.php?id=<?= $id ?>"><?= $product['name'] ?></a>
              </td>
              <td><?= number_format($product['price']) ?></td>
              <td><?= $product['count'] ?></td>
              <td><?= number_format($subtotal) ?></td>
              <td><a href="cart_delete.php?id=<?= $id ?>"><i class="trash-icon fas fa-trash-alt"></i></a></td>
            </tr>
<?php
          }
?>
          </table>
        </div>
        
        
        <!-- 注文金額詳細 -->
        <div class="cart-price-area">
          <div class="cart-price-area-top">
            <!-- 注文内容枠に表示用の会社名 -->
            <div class="cart-title">
              <div class="cart-logo-icon"><i class=" orange fab fa-critical-role"></i></div>
              <div class="cart-logo-name">るる自然農園のご注文内容</div>
            </div>
            
            <!-- 合計金額を表示 -->
            <div class="cart-subtotal">
              <div class="text">商品合計(税込)</div>
              <div class="amount"><?= number_format($total) ?><span class="price-unit">円</span></div>
            </div>
            
            <!-- 送料の表示と送料一覧へのリンク -->
            <div class="cart-shipping-price">
              <div class="text">送料</div>
              <div class="price">
                <span class="sub-amount">660<span class="price-unit"><span class="price-unit">円</span>~
                  <div class="fontsize-mini">お届け先により変動</div>
                  <a href="shipping_fee.php" class="ship-price-link"><i class="far fa-clone"></i> 詳しい送料はこちら</a>
                </span>
              </div>
            </div>


            <!-- 合計額によって表示を分岐 -->
<?php
          $balance = 10000 - $total; 
          if ($balance > 0) {
?>
            <p class="shipping-info">あと<?= number_format($balance) ?><span class="price-unit">円</span>で送料無料</p>
            <a href="index.php" class="shipping-info-return link-hover">
              <span class="arrow-left">
                <i class="fas fa-angle-double-left"></i>
              </span>
              るる自然農園の商品を見る
            </a>
            <?php
          } else {
?>              
            <p class="shipping-info">送料無料！！</p>
            
<?php
          }
?>
            <!-- 購入ボタン -->
            <a href="purchase_input.php"><button class="buy-button">ご購入手続きにすすむ <i class="fas fa-angle-double-right"></i></button></a>
          </div>


          <!-- ログインリンクと買い物継続用の戻るリンク -->
          <div class="cart-price-area-bottom">
<?php 
            // ログインしていなければログインリンクを表示
            if (!isset($_SESSION['user']['id'])) {
?>
              <p>アカウントをお持ちの方は<a href="login_input_email.php" class="link-hover">こちらからログイン</a></p>
<?php 
          }
?>
            <a href="index.php"><button class="return-button"><i class="fas fa-caret-left"></i> 買い物を続ける</button></a>
          </div>
        </div>

      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>