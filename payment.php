<?php
session_cache_limiter('private');
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
$sql_basket = "SELECT *
              FROM basket, product
              WHERE basket.PRODUCT_id = product.PRODUCT_id AND USER_id ='".$_SESSION['USER_id']."'";
$basket = mysqli_query($con, $sql_basket);
$row = mysqli_fetch_array($basket);
$checkRow = $_POST['checkRow'];
$basket_cnt1 = $_POST['basket_cnt1'];
$basket_cnt2 = $_POST['basket_cnt2'];
$basket_cnt3 = $_POST['basket_cnt3'];
$basket_cnt4 = $_POST['basket_cnt4'];
$basket_cnt5 = $_POST['basket_cnt5'];
$basket_cnt6 = $_POST['basket_cnt6'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주문/결제</title>
  <link rel="stylesheet" type="text/css" href="./css/main.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/main5.js?ver=1"></script>
  <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Black+And+White+Picture&family=Black+Han+Sans&family=Cute+Font&family=Do+Hyeon&family=Dokdo&family=East+Sea+Dokdo&family=Gaegu&family=Gamja+Flower&family=Gothic+A1&family=Gugi&family=Hi+Melody&family=Jua&family=Kirang+Haerang&family=Nanum+Brush+Script&family=Nanum+Gothic&family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Nanum+Pen+Script&family=Noto+Sans+KR&family=Noto+Serif+KR&family=Poor+Story&family=Single+Day&family=Song+Myung&family=Stylish&family=Sunflower:wght@300&family=Yeon+Sung&display=swap"rel="stylesheet">
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
  <form method="post" action="paymentAction.php">
    <div class="pay_container">
      <div class="pay_bar">
        <div class="pay_title">주문/결제</div>
        <ul>
          <li>장바구니</li>
          <li>></li>
          <li class="on">주문/결제</li>
          <li>></li>
          <li>완료</li>
        </ul>
      </div>
      <table class="table_img_size">
        <colgroup>
          <col width="15%">
          <col width="15%">
          <col width="20%">
          <col width="25%">
          <col width="25%">
        </colgroup>
        <thead>
          <tr>
            <td colspan="2">상품정보</td>
            <td>판매자</td>
            <td>수량</td>
            <td>사이즈</td>
          </tr>
        </thead>
        <tbody>
          <?php
          for($i=0; $i <= count($checkRow); $i++) {
          ?>
            <tr>
          <?php
            if($checkRow[$i] == 1){
          ?>
              <input type=hidden value="1" name="payproduct1">
              <td id="doll_img"> <img src="./img/ompang.png"> </td>
              <td id="doll_name"> 옴팡이 </td>
              <td id="belong"> soulmate </td>
              <td id="doll_cnt"> <?php echo $basket_cnt1 ?> <input type=hidden value= <?php echo $_POST['basket_cnt1'] ?> name="basket_cnt1"> </td>
              <td id="doll_size"> 15 × 15 </td>
          <?php
        }else if($checkRow[$i] == 2){
            ?>
              <input type=hidden value="2" name="payproduct2">
              <td id="doll_img"> <img src="./img/Olaf.png"> </td> </td>
              <td id="doll_name"> 올라프 </td>
              <td id="belong"> soulmate </td>
              <td id="doll_cnt"> <?php echo $basket_cnt2 ?> <input type=hidden value= <?php echo $_POST['basket_cnt2'] ?> name="basket_cnt2">  </td>
              <td id="doll_size"> 15 × 15 </td>
            <?php
          }else if($checkRow[$i] == 3){
            ?>
              <input type=hidden value="3" name="payproduct3">
              <td id="doll_img"> <img src="./img/kuromi.png"> </td> </td>
              <td id="doll_name"> 쿠로미 </td>
              <td id="belong"> soulmate </td>
              <td id="doll_cnt"> <?php echo $basket_cnt3 ?> <input type=hidden value= <?php echo $_POST['basket_cnt3'] ?> name="basket_cnt3">  </td>
              <td id="doll_size"> 15 × 15 </td>
            <?php
          }else if($checkRow[$i] == 4){
            ?>
              <input type=hidden value="4" name="payproduct4">
              <td id="doll_img"> <img src="./img/mymelody.png"> </td> </td>
              <td id="doll_name"> 마이멜로디 </td>
              <td id="belong"> soulmate </td>
              <td id="doll_cnt"> <?php echo $basket_cnt4 ?> <input type=hidden value= <?php echo $_POST['basket_cnt4'] ?> name="basket_cnt4">  </td>
              <td id="doll_size"> 15 × 15 </td>
            <?php
          }else if($checkRow[$i] == 5){
            ?>
              <input type=hidden value="5" name="payproduct5">
              <td id="doll_img"> <img src="./img/pompompurine.png"> </td> </td>
              <td id="doll_name"> 폼폼푸린 </td>
              <td id="belong"> soulmate </td>
              <td id="doll_cnt"> <?php echo $basket_cnt5 ?> <input type=hidden value= <?php echo $_POST['basket_cnt5'] ?> name="basket_cnt5">  </td>
              <td id="doll_size"> 15 × 15 </td>
            <?php
          }else if($checkRow[$i] == 6){
            ?>
              <input type=hidden value="6" name="payproduct6">
              <td id="doll_img"> <img src="./img/Cinnamoroll.png"> </td> </td>
              <td id="doll_name"> 시나모롤 </td>
              <td id="belong"> soulmate </td>
              <td id="doll_cnt"> <?php echo $basket_cnt6 ?> <input type=hidden value= <?php echo $_POST['basket_cnt6'] ?> name="basket_cnt6">  </td>
              <td id="doll_size"> 15 × 15 </td>
            <?php
              }
              ?>
            </tr>
            <?php
          }
          ?>
        </tbody>

      </table>
      <div class="ord_info">
        <div class="de_title">배송지정보</div>
        <form action="">
          <div>
            <div class="ord_info_sort">
              <p>이름</p>
              <div><input type="text" name="PAYMENT_name"></div>
            </div>
            <div class="ord_info_sort">
              <p>전화번호</p>
              <div><input type="text" name="PAYMENT_phone"></div>
            </div>
            <div class="ord_add_info_sort">
              <p>주소</p>
              <div class="zipcode_info">
                <input class="num_zipcode" id="address" type="text" placeholder="우편번호" size="5" name="PAYMENT_add1">
                <button type="button" onclick="openZipSearch()">우편번호 찾기</button>
                <div class="add_deinfo">
                  <input type="text" name="PAYMENT_add2" placeholder="주소를 입력하시오">
                  <input type="text" name="PAYMENT_add3" placeholder="상세주소를 입력하시오">
                </div>
              </div>
            </div>
            <div class="ord_info_sort ord_mrg">
              <p>배송메모</p>
              <div><input type="text" name="PAYMENT_memo" placeholder="요청사항을 입력해주세요."></div>
            </div>
          </div>

              </form>
      </div>
      <div class="pay_ch_info">
        <div class="pay_ch_title">결제수단</div>
        <div class="pay_ch_info_pad">
          <div class="pay_ch_info_sort">
            <input type="radio" name="radioch"><img src="./img/naver.png" alt="네이버페이">네이버페이
          </div>
          <div class="pay_ch_info_sort">
            <input type="radio" name="radioch"><img src="./img/kakao.png" alt="카카오페이">카카오페이
          </div>
          <div class="pay_ch_info_sort">
            <input type="radio" name="radioch"><img src="./img/card.png" alt="카드">카드
          </div>
          <div class="pay_ch_info_sort">
            <input type="radio" name="radioch"><img src="./img/account.png" alt="계좌이체">계좌이체
          </div>
        </div>

      </div>
      <div class="ord_agree">
        <input type="checkbox" id="order_chk" name="orderchk" onclick="paycheck()">주문내용 확인 및 결제 동의
      </div>
      <div class="re_pay">
        <div class="pay_font">결제금액</div>
        <div class="pa_da" id="pa_price">2500</div>원
      </div>
      <div class="payment_btn">
        <button type="submit">결제하기</button>
      </div>
    </div>
    <div class="fo_ma"></div>
  </form>
  <footer class="fo">&copy; 2021.soulmate.All rights reserved.</footer>
</body>

</html>
