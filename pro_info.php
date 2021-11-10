<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
$sql_ticket = "SELECT *
                FROM user_ticket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$ticket = mysqli_query($con, $sql_ticket);
$ticketcnt = $_POST['ticketcnt'];
$row = mysqli_fetch_array($ticket)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>상품정보</title>
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/info.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/main.css" />
  <link rel="shortcut icon" type="image/x-icon" href="./img/icon.png"/>
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

  <div class="side_bar">
    <div class="side_bar_sort">
      <div class="side_menu" id="doll">
        <img src="./img/toys.png" alt="인형">인형
      </div>
      <div class="side_menu" id="res">
        <img src="./img/responsive.png" alt="전자기기">전자기기
      </div>
      <div class="side_menu" id="chip">
        <img src="./img/potato-chips.png"alt="간식">간식
      </div>
      <div class="side_menu" id="random">
        <img src="./img/dice.png" alt="">랜덤
      </div>
    </div>
  </div>
  <div class="animated">
    <div>
      <div class="tik_sort">
        <img src="./img/ticket.png" alt="뽑기권">
        X<p id="ticket_cnt">
          <?php
            if($row == null){
          ?>
            0
          <?php
            }else{
          ?>
            <?php echo $row['USER_ticketcnt'] ?>
          <?php
          }
          ?>
      </p>
      </div>


    </div>
    <div class="pro_info_sort">

      <div class="pro_bg" onClick="location.href='media.php'">
        <div class="pro_info">
          <img src="./img/kuromi.png" alt="쿠로미" id="kurimg">
        </div>
        <div class="pro_dall_name" id="kurtext">쿠로미</div>
      </div>
      <div class="pro_bg" onClick="location.href='media.php'">
        <div class="pro_info">
          <img src="./img/mymelody.png" alt="마이멜로디" id="melodyimg">
        </div>
        <div class="pro_dall_name" id="melodytext">마이멜로디</div>
      </div>
      <div class="pro_bg" onClick="location.href='media.php'">
        <div class="pro_info">
          <img src="./img/Cinnamoroll.png" alt="시나모롤" id="cinnimg">
        </div>
        <div class="pro_dall_name" id="cinntext">시나모롤</div>
      </div>
    </div>
    <div class="pro_info_sort ">
      <div class="pro_bg" onClick="location.href='media.php'">
        <div class="pro_info">
          <img src="./img/pompompurine.png" alt="폼폼푸린" id="pomimg">
        </div>
        <div class="pro_dall_name" id="pomtext">폼폼푸린</div>
      </div>
      <div class="pro_bg" onClick="location.href='media.php'">
        <div class="pro_info">
          <img src="./img/ompang.png" alt="옴팡이" id="omimg">
        </div>
        <div class="pro_dall_name" id="omtext">옴팡이</div>
      </div>
      <div class="pro_bg" onClick="location.href='media.php'">
        <div class="pro_info">
          <img src="./img/Olaf.png" alt="울라프" id="olafimg">
        </div>
        <div class="pro_dall_name" id="olaftext">울라프</div>
      </div>
    </div>
  </div>
</body>

</html>
