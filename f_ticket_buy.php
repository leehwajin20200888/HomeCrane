<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
header("Cache-Control: no cache");

// 유저 이름
$sql_user = "SELECT *
                FROM user
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user = mysqli_query($con, $sql_user);
$user_row = mysqli_fetch_array($user);

// 유저 티켓 수량1
$sql_ticket = "SELECT *
                FROM user_ticket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_ticket = mysqli_query($con, $sql_ticket);
$ticket_row = mysqli_fetch_array($user_ticket);

// 유저 티켓 수량2
$sql_ticket_re = "SELECT *
                FROM user_ticket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_ticket_re = mysqli_query($con, $sql_ticket_re);
$ticket_row_re = mysqli_fetch_array($user_ticket_re);

// 장바구니 수량
$sql_basket = "SELECT *
                FROM basket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$basket_cnt = mysqli_query($con, $sql_basket);
$basket_cnt = mysqli_num_rows($basket_cnt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>뽑기권 구매</title>
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/buy.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/main.css" />
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
        <div class="mypage_hd_bg">뽑기권 구매</div>
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
              <p> <?php echo $basket_cnt ?> 개</p>
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
            <p onclick="location.href='./order_list.php'"><span class="to-right-underline">주문내역</span></p>
          </div>

          <div class="my_adside_info">
            <p>뽑기권</p>
            <p onclick="location.href='./f_ticket_buy.php'"><span class="to-right-underline" style="background:linear-gradient(to top, #acd7b1 25%, transparent 25%)">뽑기권 구매</span></p>
          </div>
          <div class="my_adside_info">
            <p>회원 정보</p>
            <p onclick="location.href='./edit_userinfo.php'"><span class="to-right-underline">회원정보수정</span></p>
          </div>
        </div>

        <div class="mp_ord_bg_sort">

          <div class="mypage_list">
            <div class="ticket_title">뽑기권 구매</div>
            <div class="ticket_cnt_sort">
              <img src="./img/ticket.png" alt="뽑기권">
              <div class="cnt_libl">
                <?php
                  if($ticket_row_re == null){
                ?>
                  사용가능 뽑기권 : <p id="ticketcnt"> 0개</p>
                <?php
              }else{
                ?>
                  사용가능 뽑기권 : <p id="ticketcnt"> <?php echo $ticket_row_re['USER_ticketcnt'] ?>개</p>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <form method="post" action="ticket_payment.php">
          <div>
            <div class="align_sort">
            <div class="ti_box_sort">
              <div class="box_bd">
                <img src="./img/ticket.png" alt="">
                <div class="buy_cnt_sort">x1</div>
              </div>
              <div class="ti_info_cont">
                <div class="tik_info_mt">
                  <div class="ticket_m_cnt">
                    뽑기권 <p>1</p>개
                  </div>
                  <p>500원</p>
                </div>
                <button id="tikbuyf" name="ticketcnt" value="1">구매하기</button>
              </div>
            </div>

            <div class="ti_box_sort">
              <div class="box_bd">
                <img src="./img/ticket.png" alt="">
                <div class="buy_cnt_sort">x10</div>
              </div>
              <div class="ti_info_cont">
                <div class="tik_info_mt">
                  <div class="ticket_m_cnt">
                    뽑기권 <p>10</p>개
                  </div>
                  <p>4500원</p>
                </div>
                <button id="tikbuys" name="ticketcnt" value="10">구매하기</button>
              </div>
            </div>

          </div>
          <div class="align_sort">
            <div class="ti_box_sort">
              <div class="box_bd">
                <img src="./img/ticket.png" alt="">
                <div class="buy_cnt_sort">x30</div>
              </div>
              <div class="ti_info_cont">
                <div class="tik_info_mt">
                  <div class="ticket_m_cnt">
                    뽑기권 <p>30</p>개
                  </div>
                  <p>13500원</p>
                </div>
                <button id="tikbuyt" name="ticketcnt" value="30">구매하기</button>
              </div>
            </div>

            <div class="ti_box_sort">
              <div class="box_bd">
                <img src="./img/ticket.png" alt="">
                <div class="buy_cnt_sort">x50</div>
              </div>
              <div class="ti_info_cont">
                <div class="tik_info_mt">
                  <div class="ticket_m_cnt">
                    뽑기권 <p>50</p>개
                  </div>
                  <p>21000원</p>
                </div>
                <button id="tikbuyfo" name="ticketcnt" value="50">구매하기</button>
              </div>
            </div>

          </div>


          </div>


          </div> <!--mp_ord_bg_sort 닫음-->
        </div>
      </div>
    </div> <!--mp_container 닫음-->
  <div class="fo_ma"></div>
  <footer class="fo">&copy; 2021.soulmate.All rights reserved.</footer>
</body>

</html>
