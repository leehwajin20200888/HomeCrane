<?php
session_cache_limiter('private');
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
$ticketcnt = $_POST['ticketcnt'];
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>뽑기권주문/결제</title>
  <link rel="stylesheet" type="text/css" href="./css/main.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/buy.js?var2"></script>
  <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
  <linkhref="https://fonts.googleapis.com/css2?family=Black+And+White+Picture&family=Black+Han+Sans&family=Cute+Font&family=Do+Hyeon&family=Dokdo&family=East+Sea+Dokdo&family=Gaegu&family=Gamja+Flower&family=Gothic+A1&family=Gugi&family=Hi+Melody&family=Jua&family=Kirang+Haerang&family=Nanum+Brush+Script&family=Nanum+Gothic&family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Nanum+Pen+Script&family=Noto+Sans+KR&family=Noto+Serif+KR&family=Poor+Story&family=Single+Day&family=Song+Myung&family=Stylish&family=Sunflower:wght@300&family=Yeon+Sung&display=swap" rel="stylesheet">
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

    <form method="post" action="ticket_paymentAction.php">
  <div class="pay_container">
    <div class="pay_bar">
      <div class="pay_title">주문/결제</div>
      <ul>
        <li class="on">주문/결제</li>
        <li>></li>
        <li>완료</li>
      </ul>
    </div>
    <table class="tick_table_img_size mt2">
      <colgroup>
        <col width="30%">
        <col width="20%">
        <col width="25%">
        <col width="25%">
      </colgroup>
      <thead>
        <tr>
          <td>상품</td>
          <td>종류</td>
          <td>수량</td>
          <td>판매자</td>
        </tr>
      </thead>
      <tbody>

        <input type=hidden value=<?php echo $ticketcnt ?> name="user_ticketcnt">

        <?php
          if($ticketcnt == 1){
        ?>
          <td id="ticket_img"><img src="./img/ticket.png" alt=""></td>
          <td id="belong">뽑기권</td>
          <td id="ticket_cnt">1개</td>
          <td id="doll_size">soulmate</td>
        <?php
        }else if($ticketcnt == 10){
          ?>
            <td id="ticket_img"><img src="./img/ticket.png" alt=""></td>
            <td id="belong">뽑기권</td>
            <td id="ticket_cnt">10개</td>
            <td id="doll_size">soulmate</td>
          <?php
        }else if($ticketcnt == 30){
          ?>
            <td id="ticket_img"><img src="./img/ticket.png" alt=""></td>
            <td id="belong">뽑기권</td>
            <td id="ticket_cnt">30개</td>
            <td id="doll_size">soulmate</td>
          <?php
        }else if($ticketcnt == 50){
          ?>
            <td id="ticket_img"><img src="./img/ticket.png" alt=""></td>
            <td id="belong">뽑기권</td>
            <td id="ticket_cnt">50개</td>
            <td id="doll_size">soulmate</td>
          <?php
        }
          ?>
      </tbody>
    </table>

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

      <?php
        if($ticketcnt == 1){
      ?>
        <div class="pa_da" id="pa_price">500</div>원
      <?php
    }else if($ticketcnt == 10){
        ?>
          <div class="pa_da" id="pa_price">4500</div>원
        <?php
      }else if($ticketcnt == 30){
        ?>
          <div class="pa_da" id="pa_price">13500</div>원
        <?php
      }else if($ticketcnt == 50){
        ?>
          <div class="pa_da" id="pa_price">21000</div>원
        <?php
      }
        ?>
    </div>
    <div class="payment_btn">
      <button onclick="submit">결제하기</button>
    </div>
  </div>
  </form>
  <div class="fo_ma"></div>
  <footer class="fo">&copy; 2021.soulmate.All rights reserved.</footer>
</body>

</html>
