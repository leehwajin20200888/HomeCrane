<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
$sql_basket = "SELECT *
              FROM basket, product
              WHERE basket.PRODUCT_id = product.PRODUCT_id AND USER_id ='".$_SESSION['USER_id']."'";
$basket = mysqli_query($con, $sql_basket);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>장바구니</title>
  <link rel="stylesheet" type="text/css" media="screen" href="./css/main.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/main5.js?ver=10"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Black+And+White+Picture&family=Black+Han+Sans&family=Cute+Font&family=Do+Hyeon&family=Dokdo&family=East+Sea+Dokdo&family=Gaegu&family=Gamja+Flower&family=Gothic+A1&family=Gugi&family=Hi+Melody&family=Jua&family=Kirang+Haerang&family=Nanum+Brush+Script&family=Nanum+Gothic&family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Nanum+Pen+Script&family=Noto+Sans+KR&family=Noto+Serif+KR&family=Poor+Story&family=Single+Day&family=Song+Myung&family=Stylish&family=Sunflower:wght@300&family=Yeon+Sung&display=swap"
    rel="stylesheet">
</head>

<body>
  <header>
    <div id="header">
      <!--메뉴창-->
      <a id="logo" href="./main.php">
        <img src="./img/logo.png">
      </a>
      <ul id="menu">
        <!--상단 메뉴바-->
        <?php
          if($USER_id == 'soulmate'){
        ?>
            <a href="m_index.php"><li>admin</li></a>
        <?php
          }
        ?>

        <?php
          if(!$USER_id){
        ?>
            <a href="login.html"><li>login</li></a>
        <?php
          }else{
        ?>
            <a href="logoutAction.php"><li>logout</li></a>
        <?php
          }
        ?>

        <?php
          if(!$USER_id){
        ?>
        <a href="login.html"><li><i class="fas fa-user-circle fa-1x"></i></li></a>
        <?php
          }else{
        ?>
          <a href="mypage.php"><li><i class="fas fa-user-circle fa-1x"></i></li></a>
        <?php
          }
        ?>

        <?php
          if(!$USER_id){
        ?>
        <a href="login.html"><li><i class="fas fa-shopping-cart"></i></li></a>
        <?php
          }else{
        ?>
          <a href="basket.php"><li><i class="fas fa-shopping-cart"></i></li></a>
        <?php
          }
        ?>

      </ul>
    </div>
  </header>
  <form name="frm" method="post" action="payment.php" onsubmit="return buy_btn();">
  <div class="ba_container">
    <div class="ba_bar">
      <div class="ba_title">장바구니</div>
      <ul>
        <li class="on">장바구니</li>
        <li>></li>
        <li>주문/결제</li>
        <li>></li>
        <li>완료</li>
      </ul>
    </div>
    <table>
      <colgroup>
        <col width="5%">
        <col width="20%">
        <col width="20%">
        <col width="30%">
        <col width="25%">
      </colgroup>
      <thead>
        <tr>
          <td><input type="checkbox" name="checkAll" id="th_checkAll"></td>
          <td colspan="2">상품정보</td>
          <td>수량</td>
          <td>사이즈</td>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($basket)){
        ?>
        <tr id="chackTr">
          <?php
            if($row['PRODUCT_id'] == 1){
          ?>
              <td id="ord_chk"> <input type="checkbox" name="checkRow[]" class="checkA" id="checkA" value="1"> </td>
              <td id="doll_img"> <img src="./img/ompang.png"> </td>
              <td id="doll_id"> <?php echo $row['PRODUCT_name']?> <input type=hidden value= <?php echo $row['PRODUCT_name'] ?> name="PRODUCT_name1"> </td>
              <td id="doll_cnt"> <?php echo $row['BASKET_cnt']?> <input type=hidden value= <?php echo $row['BASKET_cnt'] ?> name="basket_cnt1"> </td>
              <td id="doll_size"> <?php echo $row['PRODUCT_size']?> </td>
          <?php
        }else if($row['PRODUCT_id'] == 2){
          ?>
              <td id="ord_chk"> <input type="checkbox" name="checkRow[]" class="checkA" id="checkB" value="2"> </td>
              <td id="doll_img"> <img src="./img/Olaf.png"> </td>
              <td id="doll_id"> <?php echo $row['PRODUCT_name']?> <input type=hidden value= <?php echo $row['PRODUCT_name'] ?> name="PRODUCT_name2"> </td>
              <td id="doll_cnt"> <?php echo $row['BASKET_cnt']?> <input type=hidden value= <?php echo $row['BASKET_cnt'] ?> name="basket_cnt2"> </td>
              <td id="doll_size"> <?php echo $row['PRODUCT_size']?> </td>
          <?php
        }else if($row['PRODUCT_id'] == 3){
          ?>
              <td id="ord_chk"> <input type="checkbox" name="checkRow[]" class="checkA" id="checkC" value="3"> </td>
              <td id="doll_img"> <img src="./img/kuromi.png"> </td>
              <td id="doll_id"> <?php echo $row['PRODUCT_name']?> <input type=hidden value= <?php echo $row['PRODUCT_name'] ?> name="PRODUCT_name3"> </td>
              <td id="doll_cnt"> <?php echo $row['BASKET_cnt']?> <input type=hidden value= <?php echo $row['BASKET_cnt'] ?> name="basket_cnt3"> </td>
              <td id="doll_size"> <?php echo $row['PRODUCT_size']?> </td>
          <?php
        }else if($row['PRODUCT_id'] == 4){
          ?>
              <td id="ord_chk"> <input type="checkbox" name="checkRow[]" class="checkA" id="checkD" value="4"> </td>
              <td id="doll_img"> <img src="./img/mymelody.png"> </td>
              <td id="doll_id"> <?php echo $row['PRODUCT_name']?> <input type=hidden value= <?php echo $row['PRODUCT_name'] ?> name="PRODUCT_name4"> </td>
              <td id="doll_cnt"> <?php echo $row['BASKET_cnt']?> <input type=hidden value= <?php echo $row['BASKET_cnt'] ?> name="basket_cnt4"> </td>
              <td id="doll_size"> <?php echo $row['PRODUCT_size']?> </td>
          <?php
        }else if($row['PRODUCT_id'] == 5){
          ?>
              <td id="ord_chk"> <input type="checkbox" name="checkRow[]" class="checkA" id="checkE" value="5"> </td>
              <td id="doll_img"> <img src="./img/pompompurine.png"> </td>
              <td id="doll_id"> <?php echo $row['PRODUCT_name']?> <input type=hidden value= <?php echo $row['PRODUCT_name'] ?> name="PRODUCT_name5"> </td>
              <td id="doll_cnt"> <?php echo $row['BASKET_cnt']?> <input type=hidden value= <?php echo $row['BASKET_cnt'] ?> name="basket_cnt5"> </td>
              <td id="doll_size"> <?php echo $row['PRODUCT_size']?> </td>
          <?php
        }else if($row['PRODUCT_id'] == 6){
          ?>
              <td id="ord_chk"> <input type="checkbox" name="checkRow[]" class="checkA" id="checkF" value="6"> </td>
              <td id="doll_img"> <img src="./img/Cinnamoroll.png"> </td>
              <td id="doll_id"> <?php echo $row['PRODUCT_name']?> <input type=hidden value= <?php echo $row['PRODUCT_name'] ?> name="PRODUCT_name6"> </td>
              <td id="doll_cnt"> <?php echo $row['BASKET_cnt']?> <input type=hidden value= <?php echo $row['BASKET_cnt'] ?> name="basket_cnt6"> </td>
              <td id="doll_size"> <?php echo $row['PRODUCT_size']?> </td>
          <?php
            }
          ?>
        </tr>
        <?php
      }
        ?>
      </tbody>
    </table>

    <div class="ba_btn_sort">
      <div class="ba_del">
        <button type="button">선택상품 삭제</button>
        <button type="button">전체 삭제</button>
      </div>
      <div class="total_cost">총 배송비 <span id="de_price">2500</span>원</div>
    </div>
    <div class="ba_move">
      <button type="button" onclick="location.href = 'pro_info.php'">계속 게임하기</button>
      <button type="submit">구매하기</button>
    </div>
  </div>
  <!-- <footer class="fo">
    &copy; 2021.soulmate.All rights reserved.
  </footer> -->
</form>
</body>

</html>
