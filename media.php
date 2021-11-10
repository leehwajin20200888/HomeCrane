<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');

$sql_ticket = "SELECT *
                FROM user_ticket
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_ticket = mysqli_query($con, $sql_ticket);
$ticket_row = mysqli_fetch_array($user_ticket);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GAME</title>
  <link rel="stylesheet" type="text/css" media="screen" href="./css/style4.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Black+And+White+Picture&family=Black+Han+Sans&family=Cute+Font&family=Do+Hyeon&family=Dokdo&family=East+Sea+Dokdo&family=Gaegu&family=Gamja+Flower&family=Gothic+A1&family=Gugi&family=Hi+Melody&family=Jua&family=Kirang+Haerang&family=Nanum+Brush+Script&family=Nanum+Gothic&family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Nanum+Pen+Script&family=Noto+Sans+KR&family=Noto+Serif+KR&family=Poor+Story&family=Single+Day&family=Song+Myung&family=Stylish&family=Sunflower:wght@300&family=Yeon+Sung&display=swap" rel="stylesheet">
  <script src="./javascript/submit.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="./img/icon.png" />
</head>

<body>
  <header>
    <div id="header">
      <!--메뉴창-->
      <a id="logo" href="./main.php">
        <img src="./img/logo.png">
      </a>
      <ul id="menu"><!--상단 메뉴바-->
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
  <section>
    <div class="md_container">
      <div class="md_sort">
        <div class="outer">
          <img src="http://223.194.167.245:8888/?action=stream" style="background: #fff;">
        </div>

        <div class="arrow_keys_sort">
          <div class="arrow_keys">

            <!-- up button -->
            <?php if($ticket_row == null || $ticket_row == 0) { ?>
              <div class="pointer"><p onclick = "button_error()">▲</p></div>
            <?php }else{ ?>
              <div class="pointer"><p id = "up" onclick = "buttonUp()">▲</p></div>
            <?php } ?>

            <div class="arrow_keys_lr">
              <div class="mr_3">
              <!-- left button -->
              <?php if($ticket_row == null || $ticket_row == 0) { ?>
                <div class="pointer"><p onclick = "button_error()">◀</p></div>
              <?php }else{ ?>
                <div class="pointer"><p id = "left" onclick = "buttonLeft()">◀</p></div>
              <?php } ?>
            </div>

              <!-- right button -->
              <?php if($ticket_row == null || $ticket_row == 0) { ?>
                <div class="pointer"><p onclick = "button_error()">▶</p></div>
              <?php }else{ ?>
                <div class="pointer"><p id = "right" onclick = "buttonRight()">▶</p></div>
              <?php } ?>
            </div>

            <!-- down button -->
            <?php if($ticket_row == null || $ticket_row == 0) { ?>
              <div class="pointer"><p onclick = "button_error()">▼</p></div>
            <?php }else{ ?>
              <div class="pointer"><p id = "down" onclick = "buttonDown()">▼</p></div>
            <?php } ?>

          </div>

          <div class="md_Pro_confirm">
            <?php if($ticket_row == null){ ?>
              <p>남은 뽑기권 개수 : 0</p>
            <?php }else{ ?>
              <p>남은 뽑기권 개수 : <?php echo $ticket_row['USER_ticketcnt'] ?></p>
            <?php } ?>
          </div>
          <div class="md_btn pointer">
            <form method="post" name="frm" action="ticket_use.php">
              <input type="hidden" value="<?php echo $USER_id ?>" name="USER_id">
              <input type="hidden" value="<?php echo $USER_name ?>" name="USER_name">
              <p class="mr_36" id="pick" onclick="buttonPick()"><img src="./img/button.png"></p>
            </form>

            <!-- down button -->
            <?php if($ticket_row == null || $ticket_row == 0) { ?>
              <p onclick="button_error()"><img src="./img/button.png"></p>
            <?php }else{ ?>
              <p id="out" onclick="buttonOut()"><img src="./img/button.png"></p>
            <?php } ?>

          </div>
        </div>
      </div>
      </div>
  </section>

<script>
  const button_up = document.getElementById('up');
  const button_left = document.getElementById('left');
  const button_down = document.getElementById('down');
  const button_right = document.getElementById('right');
  const button_pick = document.getElementById("pick");
  const button_out = document.getElementById("out");

  const xhr = new XMLHttpRequest();

  function buttonUp(){
      button_up.addEventListener('click' , () => {
          // 비동기 방식으로 Request를 오픈한다
          xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=w');
          // Request를 전송한다
          xhr.send();
      });
    }

  function buttonLeft(){
    button_left.addEventListener('click' , () => {
        // 비동기 방식으로 Request를 오픈한다
        xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=a');
        // Request를 전송한다
        xhr.send();
    });
  }

  function buttonDown(){
    button_down.addEventListener('click' , () => {
        // 비동기 방식으로 Request를 오픈한다
        xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=s');
        // Request를 전송한다
        xhr.send();
    });
  }

  function buttonRight(){
    button_right.addEventListener('click' , () => {
        // 비동기 방식으로 Request를 오픈한다
        xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=d');
        // Request를 전송한다
        xhr.send();
    });
  }

  function buttonPick(){

    button_pick.addEventListener('click' , () => {
        // 비동기 방식으로 Request를 오픈한다
        xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=p&userid=<?php echo $USER_id ?>&username=<?php echo $USER_name ?>');
        // Request를 전송한다
        xhr.send();

        var form = document.frm;
        form.submit();
    });
  }

  function buttonOut(){
    button_out.addEventListener('click' , () => {
        // 비동기 방식으로 Request를 오픈한다
        xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=l');
        // Request를 전송한다
        xhr.send();
    });
  }
</script>

</body>

</html>
