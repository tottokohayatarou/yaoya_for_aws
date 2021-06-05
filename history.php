<?php require_once('header.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <title>野菜を採るなら大原♪｜購入履歴</title>
    <link rel="stylesheet" href="css/history.css">
    <style>
      @charset "UTF-8";


h1 {
  margin-bottom: 35px;
}

.container {
  display: flex;
}

main {
  margin-left: 31px;
  width: 986px;
  padding: 15px;
  background: #f4f4f4;
  border-radius: 2px;
}

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
}

.cart-detail {
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
  margin-bottom: 30px;
}

.cart-table th-tr {
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

.sub-total-tr {
  height: 40px;
}

.sub-total-tr td {
  font-size: 1.1rem;
  font-weight: bold;
}

.history-total {
  font-size: 1.1rem;
}
.cart-th1 {
  min-width: 270px;
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
  max-width: 150px;
  max-height: 100px;
  vertical-align: middle;
}

.trash-icon {
  font-size: 23px;
}

    </style>
  </head>
  <body>
  <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
        <h1>購入履歴</h1>
        
        <div class="cart-detail">
<?php 
          require_once('db_connect.php');
          if (isset($_SESSION['user'])) {
            $sql = "select * from purchase where user_id = :id";  // purchaseテーブルからuser_idがsession_idとなっているレコードを取り出すSQL文
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            krsort($result);  //最近購入したものから順に表示するために配列を逆順にソート
            foreach ($result as $row) {
              $sql2 = "
                select product.id as product_id, name, price, count, image_name
                from purchase_detail, product
                where purchase_id = :purchase_id and product_id = product.id
              ";
              $stm2 = $pdo->prepare($sql2);
              $stm2->bindValue(':purchase_id',$row['id'],PDO::PARAM_INT);
              $stm2->execute();
              $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC); 
              $total = 0;
?>
              <table class="cart-table">
                <tr class="th-tr">
                  <th class="cart-th1">ご注文商品</th>
                  <th class="cart-th2">価格(税込)</th>
                  <th class="cart-th3">注文数</th>
                  <th class="cart-th4">小計(税込)</th>
                  <!-- <th class="cart-th5">取消</th> -->
                </tr>
                
<?php              
                foreach ($result2 as $row2) {
                  $subTotal = $row2['price'] * $row2['count'];
                  $total += $subTotal; 
?>
                    <tr class="td-tr">
                      <td class="product-img-cell">
                        <a href="product_detail.php?id=<?= $row2['product_id'] ?>"><img class="cart-product-img" src="images/<?= $row2['image_name'] ?>" alt=""></a>
                        <a href="product_detail.php?id=<?= $row2['product_id'] ?>"><?= $row2['name'] ?></a>
                      </td>
                      <td><?= number_format($row2['price'])  ?></td>
                      <td><?= $row2['count'] ?></td>
                      <td><?= number_format($subTotal) ?></td>
                      <!-- <td><a href="#"><i class="trash-icon fas fa-trash-alt"></i></a></td> -->
                    </tr>
<?php
              }
?>
                    <tr class="sub-total-tr">
                      <td></td>
                      <td></td>
                      <td>合計</td>
                      <td class="history-total"><?= number_format($total) ?>円</td>
                      <!-- <td></td> -->
                    </tr>
<?php
            }
          } else {
            $_SESSION['message'] = '購入履歴を表示するにはログインしてください。';
          }
?>
        </div>
      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>