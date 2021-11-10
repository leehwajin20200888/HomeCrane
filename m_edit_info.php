<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
header("Cache-Control: no cache");

// 유저 정보
$sql_user_info = "SELECT *
                FROM user
                WHERE USER_id ='".$_SESSION['USER_id']."'";
$user_info = mysqli_query($con, $sql_user_info);
$user_info_row = mysqli_fetch_array($user_info);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  <link rel="stylesheet" href="./css/m_style.css">
  <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./javascript/mypage.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="./img/icon.png" />
  <title>회원정보 수정</title>
</head>

<body id="body-pd">
  <header>
    <div class="header_menu_sort">
      <div class="header_logo">
        <a href="./m_index.php">
          <img class="logo" src="./img/logo.png" alt="logo">
        </a>
      </div>

      <div class="search-box">
        <input type="text" class="search-txt" name="" placeholder="search">
        <a class="search-btn" href="#">
          <i class="fas fa-search fa-2x"></i>
        </a>
      </div>
    </div>

  </header>
  <div class="l-navbar" id="navbar">
    <nav class="nav">
      <div class="sidebar_sort">
        <div class="nav__brand">
          <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
          <a href="#" class="nav__logo">menu</a>
        </div>
        <div class="nav__list">
          <a href="./m_index.php" class="nav__link">
            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">dashboard</span>
          </a>
          <a href="m_user_info.php" class="nav__link">
            <ion-icon name="person-add-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">회원정보</span>
          </a>
          <!--folder-outline-->
          <div class="nav__link collapse">
            <ion-icon name="ticket-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">뽑기권</span>
            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

            <ul class="collapse__menu">
              <li> <a href="./m_buy_list.php" class="collapse__sublink">구매내역</a></li>
              <li> <a href="./m_use_list.php" class="collapse__sublink">사용내역</a></li>
            </ul>
          </div>

          <a href="./m_draw_list.php" class="nav__link">
            <ion-icon name="game-controller-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">뽑기현황</span>
          </a>

          <a href="./m_delivery.php" class="nav__link">
            <ion-icon name="reader-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">주문내역</span>
          </a>

          <a href="./m_sales.php" class="nav__link">
            <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">판매현황</span>
          </a>

          <a href="./m_edit_info.php" class="nav__link collapse active">
            <ion-icon name="person-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">회원정보수정</span>
          </a>

          <a href="logoutAction.php" class="nav__link">
            <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">Log out</span>
          </a>
        </div>
    </nav>
  </div>
  <div class="m_container">
    <div class="mp_ord_bg_sort">
      <div class="m_usin_title">
        <p>회원정보</p>
      </div>
      <form method="post" action="userinfo_deleteAction.php">
      <table class="edit_user_tb">
        <tr class="edit_userinfo_input">
          <th>이름</th>
          <td><input type="text" name="USER_name" value= <?php echo $user_info_row['USER_name'] ?> ></td>
        </tr>
        <tr class="edit_userinfo_input">
          <th>아이디</th>
          <td><p><?php echo $user_info_row['USER_id'] ?></p></td>
        </tr>
        <tr class="edit_userinfo_input">
          <th>현재 비밀번호</th>
          <td><input type="password" name="present_pw" placeholder="현재 비밀번호"></td>
        </tr>
        <tr class="edit_userinfo_input">
          <th>변경 비밀번호</th>
          <td><input type="password" name="new_pw" placeholder="변경 비밀번호"></td>
        </tr>
        <tr class="edit_userinfo_input">
          <th>변경 비밀번호 확인</th>
          <td><input type="password" name="new_pwck" placeholder="비밀번호 확인"></td>
        </tr>
        <tr class="edit_date_input">
          <th>생년월일</th>
          <td>
            <input type="text" name="USER_birthyy"value= <?php echo $user_info_row['USER_birthyy'] ?> >
            <select name="USER_birthmm" id="">
              <option value = <?php echo $user_info_row['USER_birthmm'] ?> ><?php echo $user_info_row['USER_birthmm'] ?>월</option>
              <option value="1">1월</option>
              <option value="2">2월</option>
              <option value="3">3월</option>
              <option value="4">4월</option>
              <option value="5">5월</option>
              <option value="6">6월</option>
              <option value="7">7월</option>
              <option value="8">8월</option>
              <option value="9">9월</option>
              <option value="10">10월</option>
              <option value="11">11월</option>
              <option value="12">12월</option>
            </select>
            <input type="text" name="USER_birthdd" value= <?php echo $user_info_row['USER_birthdd'] ?> >
          </td>
        </tr>

        <tr class="edit_userinfo_input">
          <th>전화번호</th>
          <td>
            <input type="text" name="USER_phonenum" value= <?php echo $user_info_row['USER_phonenum'] ?> >
          </td>
        </tr>

        <tr class="edit_addinfo_input">
          <th>주소</th>
          <td>
            <input type="text" name="USER_add1" value= <?php echo $user_info_row['USER_add1'] ?> >
            <input type="text" name="USER_add2" value= <?php echo $user_info_row['USER_add2'] ?> >
          </td>
        </tr>

      </table>
        <input type="hidden" id="delete" name="delete" value="default">
      <div class="edit_user_btn">
        <button type="submit" value="update" onclick="javascript: form.action='m_edit_info_updateAction.php';">수정</button>
        <button type="submit" value="delete" onclick="info_delete()">탈퇴</button>
      </div>
    </form>
    </div>

  </div>


  <!-- IONICONS -->
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <!-- JS -->
  <script src="./javascript/script.js"></script>
</body>

</html>
