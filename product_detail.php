<?php require_once('header.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <title>野菜を採るなら大原♪｜商品詳細</title>
    <link rel="stylesheet" href="css/product_detail.css">
    <link rel="stylesheet" href="css/commonSytle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
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
  border-radius: 2px;
}

.product-detail {
  display: flex;
}

.product-img {
  max-width: 300px;
  max-height: 200px;
}

.product-name {
  margin-top: 15px;
  margin-bottom: 15px;
  font-family: "Noto Serif JP",serif;
  font-weight: 600;
  font-style: normal;
  font-size: 21px;
  line-height: 1.3;
  color: #333;
}



/* スライド */
img {
  max-width: 650px;
  height   : 405px;
  margin: 0 auto;
  border-radius: 2px;
}

.slide {
  margin: 0 auto;
  width: 650px;
  /* background-color: red; */
}

.slider-for {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 300px;
  background: #fff;
}
.slider-for figure img {
  max-width: 100%;
}

.slider-nav {
  margin-top: 115px;
}
.slider-nav figure img {
  width: 100px;
  height: 82px;
  margin: 0 auto;
}


/* 詳細情報 */
.description {
  display: flex;
  width: 100%;
  margin-top: 20px;
  padding: 24px;
  background: #f4f4f4;
}

.description-left img {
  width: 296px;
  height: 296px;
}

.description-right {
  margin-left: 24px;
}

.farm-name {
  font-family: serif;
  color: #333;
  line-height: 157%;
  text-decoration: none;
  font-size: 16px;
  margin-left: 3px;
  vertical-align: middle;
}
.farm-logo-icon {
  font-size: 1.8rem;
}

.flex {
  display: flex;
}

.ship-price-link{
  margin-bottom: 12px;
  font-weight: 700;
  font-family: sans-serif;
  text-decoration: underline;
  color: #383838;
}

.ship-price-link:hover{
  color: rgb(163,131,75);
}

.badge {
margin-top: 12px;
}

.badge img{
  width: 80px;
  height: 28px;
}
.amount {
  margin-top: 15px;
  font-size: 1.625rem;
  font-weight: bold;
}
.price-unit {
  font-size: 0.88em;
}
.attention{
  font-size: 0.68em;
}
.ship-info {
  margin-top: 20px;
  padding: 16px;
  color: #333;
  font-family: -apple-system,BlinkMacSystemFont,Noto Sans JP,sans-serif;
  font-size: 14px;
  font-weight: 500;
  line-height: 1.8;
  border-radius: 3px;
  border: 1px solid #333;
}
.ship-info p {
  font-size: 98%;
}

.buy-button {
  /* background-color: rgb(117, 163, 91); */
  display: block;
  width: 100%;
  height: 50px;
  margin: 16px auto 14px;
  text-align: center;
  font-size: 16px;
  font-weight: bold;
  color: white;
  background-color: #a98948;
  border-radius: 2%;
}
.favorite-button {
  /* background-color: rgb(117, 163, 91); */
  display: block;
  width: 100%;
  height: 50px;
  margin: 16px auto 14px;
  text-align: center;
  font-size: 16px;
  font-weight: bold;
  color: white;
  border-radius: 2%;
  background-color: darkgreen;
  opacity: 0.8;
}
.favorite-button:hover {
  background-color: darkgreen;
  opacity: 1;
}

.buy-button:hover {
  background-color: #926d22;
  box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
  border-color: rgba(223,225,229,0);
}


/* セレクトボックス */
.cp_ipselect {
	overflow: hidden;
	width: 25%;
	margin: 15px 0;
	text-align: center;
}
.cp_ipselect select {
	width: 100%;
	padding-right: 1em;
	cursor: pointer;
	text-indent: 0.01px;
	text-overflow: ellipsis;
	border: none;
	outline: none;
	background: transparent;
	background-image: none;
	box-shadow: none;
	-webkit-appearance: none;
	appearance: none;
}
.cp_ipselect select::-ms-expand {
    display: none;
}
.cp_ipselect.cp_sl04 {
	position: relative;
	border-radius: 2px;
	border: 2px solid #333;
  border-radius: 50px;
	background: #ffffff;
}
.cp_ipselect.cp_sl04::before {
	position: absolute;
	top: 0.8em;
	right: 0.8em;
	width: 0;
	height: 0;
	padding: 0;
	content: '';
	border-left: 6px solid transparent;
	border-right: 6px solid transparent;
	border-top: 6px solid #333;
	pointer-events: none;
}
.cp_ipselect.cp_sl04 select {
	padding: 8px 38px 8px 8px;
	color: #333;
}


/* 配送について */
.ship-discription-title {
  font-weight: 400;
  line-height: 1.3;
  margin: 0 0 8px;
  font-size: 16px;
  font-family: "Noto Serif JP",serif;
}
.ship-fee-link {
  display: block;
    padding-right: 0.8rem;
    text-decoration: underline;
}
.ship-info-text {
  margin: 10px 0 30px;
  line-height: 163%;
  letter-spacing: 2px;
  font-size: 14px;
}
  </style>
  </head>
  <body>
    <!-- slick slider用の記述 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 
    <script type="text/javascript">
    $(function() {
      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });  
      $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true,
      }); 
    }); 
  </script>



  <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
<?php
        require_once('db_connect.php');
        $sql = "select * from product where id = :id";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id',$_GET['id'],PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
?>
        <!-- 商品スライド -->
        <div class="slide">

          <div class="slider-for" style="margin-bottom: 10px;">
            <figure><img src="images/<?= $row['image_name'] ?>" /></figure>
            <figure><img src="images/retasu.jpg" /></figure>
            <figure><img src="images/onion.jpg" /></figure>
            <figure><img src="images/imo.jpg" /></figure>
            <figure><img src="images/papurika.jpg" /></figure>
            <figure><img src="images/ninhin.jpg" /></figure>
            <figure><img src="images/nasu.jpg" /></figure>
          </div>
          <div class="slider-nav">
            <figure><img src="images/<?= $row['image_name'] ?>" /></figure>
            <figure><img src="images/retasu.jpg" /></figure>
            <figure><img src="images/onion.jpg" /></figure>
            <figure><img src="images/imo.jpg" /></figure>
            <figure><img src="images/papurika.jpg" /></figure>
            <figure><img src="images/ninhin.jpg" /></figure>
            <figure><img src="images/nasu.jpg" /></figure>
          </div>
        </div>

        <!-- 商品情報 -->
        <div class="description">
          <div class="description-left">
            <img src="images/<?= $row['image_name'] ?>" alt="">
          </div>
          <div class="description-right">
            <div class="flex">
               <i class="farm-logo-icon orange fab fa-critical-role"></i>
               <p class="farm-name">るる自然農園
              </p>
            </div>
            <h1 class="product-name"><?= $row['name'] ?></h1>
            <a href="shipping_fee.php" class="ship-price-link"><i class="far fa-clone"></i> 東京都までの送料 660円〜</a>
            <p class="badge"><img src="images/badge.png"></p>
            <div class="amount"><?= number_format($row['price']) ?><span class="price-unit">円</span><span class="attention">(送料別)</span></div>
            
            <!-- カートへのフォーム -->
            <form action="cart_insert.php" method="post">
            <!-- セレクトボックス -->
            <div class="cp_ipselect cp_sl04">
              <select name="count"　required>
                <option value="" hidden>Choose</option>
<?php
                for ($i = 1; $i <= 10; $i++) {
?>
                  <option value="<?= $i ?>"><?= $i ?></option>
<?php
                }
?>
              </select>
            </div>

            <!-- 配送について -->
            <div class="ship-info">
              <p DD>古新聞・古段ボールでの発送になります。脱プラスチックにご協力をお願いいたします。</p>
            </div>
            <!-- ----------- -->

              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="name" value="<?= $row['name'] ?>">
              <input type="hidden" name="price" value="<?= $row['price'] ?>">
              <input type="hidden" name="image_name" value="<?= $row['image_name'] ?>">
              <button type="submit" class="buy-button">カートに追加 <i class="fas fa-angle-double-right"></i></button>
            </form>
            <!-- <a href="favorite.php"><button class="favorite-button">お気に入りに追加 <i class="fas fa-angle-double-right"></i></button></a> -->
            <a href="favorite_insert.php?id=<?= $row['id'] ?>"><button class="favorite-button">お気に入りに追加 <i class="fas fa-angle-double-right"></i></button></a>
            <h3 class="ship-discription-title">配送にいて</h3>
            <a href="shipping_fee.php" class="ship-fee-link">この地域の送料を見る</a>
            <p class="ship-info-text">
              この商品はるる自然農園が千葉県から発送します。<br>
              発送までの平均日数 :2日~4日<br>
              この商品は火曜日・木曜日・土曜日に出荷します。<br>
            </p>
            
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


