<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
header("Cache-Control: no cache");

// 유저 이름
$sql_user_name = "SELECT *
                FROM user
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_name = mysqli_query($con, $sql_user_name);
$user_name_row = mysqli_fetch_array($user_name);

// 유저 정보
$sql_user_info = "SELECT *
                FROM user
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_info = mysqli_query($con, $sql_user_info);
$user_info_row = mysqli_fetch_array($user_info);

// 유저 티켓 수량1
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
$basket_cnt = mysqli_num_rows($basket_cnt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원 정보 수정</title>
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/mypage.js"></script>
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
          <a href="adminpage.php"><li>admin</li></a>
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
      <div class="mypage_hd_bg">회원 정보</div>
      <div class="mypage_hd_bd">
        <div class="mypage_user_info flex_sort">
          <p><?php echo $user_name_row['USER_name']?> </td>님 </p>
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
          <p onclick="location.href='./f_ticket_buy.php'"><span class="to-right-underline">뽑기권 구매</span></p>
        </div>
        <div class="my_adside_info">
          <p>회원 정보</p>
          <p onclick="location.href='./edit_userinfo.php'"><span class="to-right-underline"
              style="background:linear-gradient(to top, #acd7b1 25%, transparent 25%)">회원정보수정</span></p>
        </div>
      </div>

      <div class="mp_ord_bg_sort">
        <div class="mp_ord_title">
          <p>회원정보</p>
        </div>
        <form method="post" action="userinfo_updateAction.php">
        <table class="edit_user_tb">
          <tr class="edit_userinfo_input">
            <th>이름</th>
            <td><p><?php echo $user_info_row['USER_name'] ?></p></td>
          </tr>
          <tr class="edit_userinfo_input">
            <th>아이디</th>
            <td><p><?php echo $user_info_row['USER_id'] ?></p></td>
          </tr>
          <tr class="edit_date_input">
            <th>생년월일</th>
            <td>
              <p><?php echo $user_info_row['USER_birthyy'] ?> -
              <?php echo $user_info_row['USER_birthmm'] ?> -
              <?php echo $user_info_row['USER_birthdd'] ?></p>
            </td>
          </tr>

          <tr class="edit_userinfo_input">
            <th>전화번호</th>
            <td>
              <p><?php echo $user_info_row['USER_phonenum'] ?></p>
              <!-- <input type="text" name="USER_phonenum" value= <?php echo $user_info_row['USER_phonenum'] ?> > -->
            </td>
          </tr>

          <tr class="edit_addinfo_input">
            <th>주소</th>
            <td>
              <p><?php echo $user_info_row['USER_add1'] ?>
              <?php echo $user_info_row['USER_add2'] ?></p>
              <!-- <input type="text" name="USER_add1" value= <?php echo $user_info_row['USER_add1'] ?> > -->
              <input type="text" name="USER_add2" value= <?php echo $user_info_row['USER_add2'] ?> >
            </td>
          </tr>

        </table>
        </form>

        <form method="post" action="userinfo_deleteAction.php">
          <div class="edit_user_btn">
          <button type="submit" onclick="delete()">탈퇴</button>
          </div>
        </form>



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
