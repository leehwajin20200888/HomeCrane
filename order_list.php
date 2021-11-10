<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
header("Cache-Control: no cache");

$search = $_POST['date1'];

// 유저 이름
$sql_user = "SELECT *
                FROM user
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user = mysqli_query($con, $sql_user);
$user_row = mysqli_fetch_array($user);

// 유저 티켓 수량
$sql_ticket = "SELECT *
                FROM user_ticket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_ticket = mysqli_query($con, $sql_ticket);
$ticket_row = mysqli_fetch_array($user_ticket);

// 장바구니 수량
$sql_basket = "SELECT *
                FROM basket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$basket_cnt = mysqli_query($con, $sql_basket);
$basket_row_cnt = mysqli_num_rows($basket_cnt);

//주문내역 페이징
$payment_listno = 6; //한페이지 출력할 리스트수
$payment_pageno = 10; // 페이징에 디스플레이되는 수

//레코드 수량
  $sql_payment_info = "SELECT * FROM payment WHERE USER_id ='".$_SESSION['USER_id']."'";
  $sql_payment_info_cnt = mysqli_query($con, $sql_payment_info);
  $payment_total = mysqli_num_rows($sql_payment_info_cnt);

if(empty($payment_start) || $payment_start <= 0) $payment_start = 1;

$payment_total_page = ceil($payment_total / $payment_listno) ; /* 총페이지수(Total Page) : 총게시물수 / 페이지당 리스트수  */
$payment_current_block = ceil($payment_start / $payment_pageno); /* 현재블록(Current Block) : 현재페이지 / 표시되는 페이지 수 */
$payment_start_page = ($payment_current_block - 1) * $payment_pageno + 1; /* 블록의 처음 페이지(Start Page) 구하기 */
$payment_end_page = ($payment_current_block * $payment_pageno); /*블록의 마지막 페이지(End Page) : 현재 블록 * 표시되는 페이지수 */
$payment_total_block = ceil($payment_total_page / $payment_pageno); /* 총블록수(Total Block) : 총페이지수 / 표시되는 페이지 수 */
$payment_startno = ($payment_start - 1) * $payment_listno; //첫번째로 읽어올 번호


// 결제내역
if($search){
  $sql_payment = "SELECT *
                  FROM payment, product
                  WHERE payment.PRODUCT_id = product.PRODUCT_id
                  AND USER_id ='".$_SESSION['USER_id']."'
                  AND DATE( PAYMENT_day ) BETWEEN '".$_POST['date1']."' AND '".$_POST['date2']."'
                  ORDER BY PAYMENT_day DESC LIMIT $payment_startno, $payment_listno";
}else{
  $sql_payment = "SELECT *
                  FROM payment, product
                  WHERE payment.PRODUCT_id = product.PRODUCT_id
                  AND USER_id ='".$_SESSION['USER_id']."'
                  AND DATE( PAYMENT_day ) BETWEEN DATE_ADD(NOW(), INTERVAL -1 WEEK ) AND NOW()
                  ORDER BY PAYMENT_day DESC LIMIT $payment_startno, $payment_listno";
}
$payment_info = mysqli_query($con, $sql_payment);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주문내역</title>
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/mypage.js?var2"></script>
  <link rel="stylesheet" type="text/css" href="./css/main.css" />
  <link rel="stylesheet" href="./css/paging.css">
  <link rel="shortcut icon" type="image/x-icon" href="./img/icon.png" />
</head>

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
<div class="mp_container">
  <div class="mp_container_sort">
    <div class="mypage_hd">
      <div class="mypage_hd_bg">주문내역</div>
      <div class="mypage_hd_bd">
        <div class="mypage_user_info flex_sort">
          <p><?php echo $user_row['USER_name']?> </td>님 </p>
          <p>안녕하세요.</p>
        </div>
        <div class="my_info_rsort">
          <div class="mypage_info">
            <p>뽑기권</p>
            <p><?php
              if($ticket_row == null){
            ?>
              0
            <?php
              }else{
            ?>
            <?php echo $ticket_row['USER_ticketcnt'] ?>
            <?php
            }
            ?>
            개
          </p>
          </div>

          <div class="mypage_info">
            <p>장바구니</p>
            <p> <?php echo $basket_row_cnt ?> 개</p>
          </div>

          <div class="mypage_info">
            <p>배송중</p>
            <p>0 개</p>
          </div>
        </div>

      </div>
    </div>
    <div class="con_info_sort">
      <div class="my_adside_sort">
        <div class="my_adside_info">
          <p>쇼핑내역</p>
          <p onclick="location.href='./basket.php'"><span class="to-right-underline">장바구니</span></p>
          <p onclick="location.href='./order_list.php'"><span class="to-right-underline" style="background:linear-gradient(to top, #acd7b1 25%, transparent 25%)">주문내역</span></p>
        </div>

        <div class="my_adside_info">
          <p>뽑기권</p>
          <p onclick="location.href='./f_ticket_buy.php'"><span class="to-right-underline">뽑기권 구매</span></p>
        </div>
        <div class="my_adside_info">
          <p>회원 정보</p>
          <p onclick="location.href='./edit_userinfo.php'"><span class="to-right-underline">회원정보수정</span></p>
        </div>
      </div>

      <div class="mp_ord_bg_sort">
        <div class="mp_ord_title">
          <p>주문내역</p>
        </div>
        <div class="da_hd_bg_g">
          <div class="mp_date_sort">
            <p onclick="month1()">1개월</p>
            <p onclick="month3()">3개월</p>
            <p onclick="month6()">6개월</p>
            <p onclick="year1()">1년</p>
          </div>
          <form method="post" name="frm" action=" <?php echo $_SERVER['PHP_SELF']; ?> ">
          <div class="date_cho_sort">
            <div class="date_cho_input_sort">
              <input type="date" id="dateFrom" name="date1"> - <input type="date" id="dateTo" name="date2" >
            </div>
             <p id="inquiry" onclick="inquiry()">조회</p>
          </div>
        </form>
        </div>
        <table class="mp_orlist_tb">
          <colgroup>
            <col width="10%">
            <col width="10%">
            <col width="20%">
            <col width="20%">
            <col width="10%">
            <col width="30%">
          </colgroup>
          <thead>
            <tr class="thead_bd">
              <td colspan="2">상품정보</td>
              <td>개수</td>
              <td>주문일자</td>
              <td>주문번호</td>
              <td>주문상태</td>
            </tr>
          </thead>
          <tbody>
            <?php
              while($payment_info_row = mysqli_fetch_array($payment_info)){
            ?>
            <tr>
                <?php
                  if($payment_info_row['PRODUCT_id'] == 1){
                ?>
                <td class="mpord_img"><img src="./img/ompang.png"> </td>
                <td> <?php echo $payment_info_row['PRODUCT_name'] ?> </td>
                <td> <?php echo $payment_info_row['PRODUCT_cnt'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_day'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_num'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_state'] ?> </td>
                <?php
                  }else if($payment_info_row['PRODUCT_id'] == 2){
                ?>
                <td class="mpord_img"><img src="./img/Olaf.png"> </td>
                <td> <?php echo $payment_info_row['PRODUCT_name'] ?> </td>
                <td> <?php echo $payment_info_row['PRODUCT_cnt'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_day'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_num'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_state'] ?> </td>
                <?php
                  }else if($payment_info_row['PRODUCT_id'] == 3){
                ?>
                <td class="mpord_img"><img src="./img/kuromi.png"> </td>
                <td> <?php echo $payment_info_row['PRODUCT_name'] ?> </td>
                <td> <?php echo $payment_info_row['PRODUCT_cnt'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_day'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_num'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_state'] ?> </td>
                <?php
                  }else if($payment_info_row['PRODUCT_id'] == 4){
                ?>
                <td class="mpord_img"><img src="./img/mymelody.png"> </td>
                <td> <?php echo $payment_info_row['PRODUCT_name'] ?> </td>
                <td> <?php echo $payment_info_row['PRODUCT_cnt'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_day'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_num'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_state'] ?> </td>
                <?php
                  }else if($payment_info_row['PRODUCT_id'] == 5){
                ?>
                <td class="mpord_img"><img src="./img/pompompurine.png"> </td>
                <td> <?php echo $payment_info_row['PRODUCT_name'] ?> </td>
                <td> <?php echo $payment_info_row['PRODUCT_cnt'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_day'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_num'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_state'] ?> </td>
                <?php
                  }else if($payment_info_row['PRODUCT_id'] == 6){
                ?>
                <td class="mpord_img"><img src="./img/Cinnamoroll.png"> </td>
                <td> <?php echo $payment_info_row['PRODUCT_name'] ?> </td>
                <td> <?php echo $payment_info_row['PRODUCT_cnt'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_day'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_num'] ?> </td>
                <td> <?php echo $payment_info_row['PAYMENT_state'] ?> </td>
                <?php
                  }
                }
                ?>
            </tr>
          </tbody>
        </table>

        <!-- <div class="page_wrap">
          <div class="page_nation">
            <?php
            if ( $payment_current_block > 1 ) {
              echo "<a HREF='$PHP_SELF?payment_start=$1'><img src='./img/page_pprev.png'></a>";
            }
            if ( $payment_current_block > 1 ) {
              $payment_PREV_PAGE = $payment_start_page - 1;
              echo "<a HREF='$PHP_SELF?payment_start=$payment_PREV_PAGE'><img src='./img/page_prev.png'></a>";
            }


            /* LISTING NUMBER PART */
            for ($i = $payment_start_page; $i <= $payment_end_page && $i <= $payment_total_page ; $i++) {
              if($payment_start == $i){
                $payment_NUMBER_SHAPE= "<p class='active2'>${i}</p>";
              }else $payment_NUMBER_SHAPE = ${i};
                ECHO " <A HREF='$PHP_SELF?payment_start=$i'>$payment_NUMBER_SHAPE</a>";
            }

            /* NEXT or END PART */
            if ($payment_current_block < $payment_total_block) {
              $payment_NEXT_PAGE = $payment_end_page + 1;
              ECHO " <a HREF='$PHP_SELF?payment_start=$payment_NEXT_PAGE'><img src='./img/page_next.png'></a>";
            }
            if ($payment_current_block < $payment_total_block) {
              ECHO " <a HREF='$PHP_SELF?payment_start=$payment_total_page'><img src='./img/page_nnext.png'></a>";
            }
          ?>
          </div>
        </div> -->
      </div>
      <!--mp_ord_bg_sort 닫음-->
    </div>
  </div>
</div>
<!--mp_container 닫음-->
<div class="fo_ma"></div>
<footer class="fo">&copy; 2021.soulmate.All rights reserved.</footer>
</body>

</html>
