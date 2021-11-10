<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soulmate</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/main1.css" />
    <link rel = "preconnect"href = "https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <script src="./javascript/main5.js?var11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Black+And+White+Picture&family=Black+Han+Sans&family=Cute+Font&family=Do+Hyeon&family=Dokdo&family=East+Sea+Dokdo&family=Gaegu&family=Gamja+Flower&family=Gothic+A1&family=Gugi&family=Hi+Melody&family=Jua&family=Kirang+Haerang&family=Nanum+Brush+Script&family=Nanum+Gothic&family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Nanum+Pen+Script&family=Noto+Sans+KR&family=Noto+Serif+KR&family=Poor+Story&family=Single+Day&family=Song+Myung&family=Stylish&family=Sunflower:wght@300&family=Yeon+Sung&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div id="header"> <!--메뉴창-->
            <a id="logo">
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
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade img1" >
                <img class="main1" src="./img/m1.png" alt="인형뽑기">
                <a href="pro_info.php"><img class="btn" src="./img/btn.png" alt="버튼"></a>
            </div>

            <div class="mySlides fade img2">
                <div class="mtest">상품 500g 이상 묶음 배송 시<br>무료뽑기권 1개를 드립니다!</div>
                <img class="main2" src="./img/m2.png" alt="이벤트">
                <div class="text">상세보기</div>
            </div>



            <!-- Next and previous buttons -->
            <a class="prev" onclick="moveSlides(-1)">&#10094;</a>
            <a class="next" onclick="moveSlides(1)">&#10095;</a>
          </div>
          <br/>

          <!-- The dots/circles -->
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
          </div>
    </section>
    <footer class="footer">
        <div>&copy; 2021.soulmate.All rights reserved.</div>
    </footer>
</head>
<body>

</body>
</html>
