<?php

$USER_id = $_POST['USER_id'];
$USER_name = $_POST['USER_name'];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/main.css" />
    <link rel = "preconnect"href = "https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <!-- <script src="./javascript/submit.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Black+And+White+Picture&family=Black+Han+Sans&family=Cute+Font&family=Do+Hyeon&family=Dokdo&family=East+Sea+Dokdo&family=Gaegu&family=Gamja+Flower&family=Gothic+A1&family=Gugi&family=Hi+Melody&family=Jua&family=Kirang+Haerang&family=Nanum+Brush+Script&family=Nanum+Gothic&family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Nanum+Pen+Script&family=Noto+Sans+KR&family=Noto+Serif+KR&family=Poor+Story&family=Single+Day&family=Song+Myung&family=Stylish&family=Sunflower:wght@300&family=Yeon+Sung&display=swap" rel="stylesheet">
<!-- <style>
    .img_pore {position: relative;}
    .poab_btn {position: absolute; bottom: 20%; right: 10%;}
    .arrowkeys_btn {display: flex; flex-direction: column; align-items: center; position: absolute; bottom: 10%; left: 10%;}
    .arrowkey_lr {display: flex; align-items: center;}
    .arrow_key_bg {width: 20px; height: 20px; padding: 10px; text-align: center; color: #fff; background: #a5d2b2; border-radius: 50%;}
    .mr_3rem {margin-right: 3rem;}
     transform: translate(-50%, -50%);
</style> -->

</head>
<body>
    <div class="img_pore">
        <img src="http://223.194.167.245:8888/?action=stream" class="media2_img_size">

        <div class="arrowkeys_btn">
            <div class="arrow_key_bg">
              <!-- up button -->

                <div id = "up"><i  onclick = "buttonUp()" class="fas fa-chevron-up"></i></div>

            </div>
            <div class="arrowkey_lr">
              <!-- left button -->

                <div id = "left" class="arrow_key_bg mr_3rem"><i onclick = "buttonLeft()" class="fas fa-chevron-left"></i></div>

              <!-- right button -->

                <div id = "right" class="arrow_key_bg"><i onclick = "buttonRight()" class="fas fa-chevron-right"></i></div>

            </div>
            <div class="arrow_key_bg">
              <!-- down button -->

                <div id = "down"><i onclick = "buttonDown()" class="fas fa-chevron-down"></i></div>

            </div>
        </div>
        <div class="poab_btn">

          <!-- push button -->
          <form method="post" name="frm" action="ticket_use.php">
            <input type="hidden" value="<?php echo $USER_id ?>" name="USER_id">
            <input type="hidden" value="<?php echo $USER_name ?>" name="USER_name">
            <button id="pick" onclick="buttonPick()" class="pick_btn">pick</button>
          </form>
            <!-- out button -->

          <div id="out"><button onclick="buttonOut()" class="put_btn">put</button></div>

        </div>
    </div>

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

            // var form = document.frm;
            // form.submit();
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
