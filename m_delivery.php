<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');

$search = $_GET['search'];

$listno = 10; //한페이지 출력할 리스트수
$pageno = 10; // 페이징에 디스플레이되는 수

//레코드 수량
if($search){
  $sql_payment_info = "SELECT * FROM payment WHERE USER_id = '".$_GET['search']."'";
  $sql_payment_info_cnt = mysqli_query($con, $sql_payment_info);
}else{
  $sql_payment_info = "SELECT * FROM payment";
  $sql_payment_info_cnt = mysqli_query($con, $sql_payment_info);
}
  $total = mysqli_num_rows($sql_payment_info_cnt);

if(empty($start) || $start <= 0) $start = 1;

$total_page = ceil($total / $listno) ; /* 총페이지수(Total Page) : 총게시물수 / 페이지당 리스트수  */
$current_block = ceil($start / $pageno); /* 현재블록(Current Block) : 현재페이지 / 표시되는 페이지 수 */
$start_page = ($current_block - 1) * $pageno + 1; /* 블록의 처음 페이지(Start Page) 구하기 */
$end_page = ($current_block * $pageno); /*블록의 마지막 페이지(End Page) : 현재 블록 * 표시되는 페이지수 */
$total_block = ceil($total_page / $pageno); /* 총블록수(Total Block) : 총페이지수 / 표시되는 페이지 수 */
$startno = ($start - 1) * $listno; //첫번째로 읽어올 번호

  if ($search) {
    $payment_info = "SELECT * FROM payment WHERE USER_id = '".$_GET['search']."' ORDER BY PAYMENT_day DESC LIMIT $startno, $listno";
  } else {
    $payment_info = "SELECT * FROM payment ORDER BY PAYMENT_day DESC LIMIT $startno, $listno";
  }
  $payment_info_result = mysqli_query($con, $payment_info);

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
  <link rel="shortcut icon" type="image/x-icon" href="./img/icon.png" />
  <title>주문내역</title>
</head>

<body id="body-pd">
  <header>
    <div class="header_menu_sort">
      <div class="header_logo">
        <a href="./m_index.php">
          <img class="logo" src="./img/logo.png" alt="logo">
        </a>
      </div>

      <form method="get" name="form" action=" <?php echo $_SERVER['PHP_SELF']; ?> ">
        <div class="search-box">
          <input type="text" class="search-txt" name="search" placeholder="search">
          <a class="search-btn" href="javascript:form.submit();">
            <i class="fas fa-search fa-2x"></i>
          </a>
        </div>
      </form>
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
          <a href="./m_user_info.php" class="nav__link">
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
          <a href="./m_delivery.php" class="nav__link active">
            <ion-icon name="reader-outline" class="nav__icon"></ion-icon>
            <span class="nav_name ">주문내역</span>
          </a>

          <a href="./m_sales.php" class="nav__link">
            <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">판매현황</span>
          </a>

          <a href="./m_edit_info.php" class="nav__link collapse">
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
    <div class="m_usin_title">
      <p>주문내역</p>
    </div>

    <form method="post" action="m_delivery_updateAction.php" >

    <table class="m_deuser_tb">
      <tr>
        <th>아이디</th>
        <th>주문번호</th>
        <th>상품명</th>
        <th>개수</th>
        <th>주문날짜</th>
        <th>이름</th>
        <th>전화번호</th>
        <th>주소</th>
        <th>주문상태</th>
      </tr>
      <?php
        if($USER_id == 'soulmate'){
            while($row = mysqli_fetch_array($payment_info_result)){
      ?>
              <tr>
                <td> <?php echo $row['USER_id'] ?> </td>
                <td> <?php echo $row['PAYMENT_num']?> </td>
                <input type="hidden" value="<?php echo $row['PAYMENT_num']?>" name="PAYMENT_num[]">

                <?php if($row['PRODUCT_id'] == 1){ ?>
                  <td> 옴팡이 </td>
                <?php }else if($row['PRODUCT_id'] == 2){ ?>
                  <td> 올라프 </td>
                <?php }else if($row['PRODUCT_id'] == 3){ ?>
                  <td> 쿠로미 </td>
                <?php }else if($row['PRODUCT_id'] == 4){ ?>
                  <td> 마이멜로디 </td>
                <?php }else if($row['PRODUCT_id'] == 5){ ?>
                  <td> 폼폼푸린 </td>
                <?php }else if($row['PRODUCT_id'] == 6){ ?>
                  <td> 시나모롤 </td>
                <?php } ?>

                <td> <?php echo $row['PRODUCT_cnt']?> </td>
                <td> <?php echo $row['PAYMENT_day'] ?> </td>
                <td> <?php echo $row['PAYMENT_name'] ?> </td>
                <td> <?php echo $row['PAYMENT_phone'] ?> </td>
                <td> (<?php echo $row['PAYMENT_add1'] ?>) <?php echo $row['PAYMENT_add2'] ?> <?php echo $row['PAYMENT_add3'] ?> </td>
                <td class="md_sel_box">
                  <select name="state[]" id="">
                      <option><?php echo $row['PAYMENT_state'] ?></option>
                      <option value="결제완료">결제완료</option>
                      <option value="주문접수">주문접수</option>
                      <option value="발송준비">발송준비</option>
                      <option value="상품발송">상품발송</option>
                      <option value="배송완료">배송완료</option>
                  </select>
                </td>
              </tr>
      <?php
            }
          }
      ?>
      <div class="m_de_btn">
        <button type="submit">상태변경</button> <button type="reset">취소하기</button>
      </div>
    </table>
  </form>

    <div class="page_wrap">
      <div class="page_nation">
        <?php
        if ( $current_block > 1 ) {
          echo "<a HREF='$PHP_SELF?start=$1&search=".$_GET['search']."'><img src='./img/page_pprev.png'></a>";
        }
        if ( $current_block > 1 ) {
          $PREV_PAGE = $start_page - 1;
          echo "<a HREF='$PHP_SELF?start=$PREV_PAGE&search=".$_GET['search']."'><img src='./img/page_prev.png'></a>";
        }


        /* LISTING NUMBER PART */
        for ($i = $start_page; $i <= $end_page && $i <= $total_page ; $i++) {
          if($start == $i){
            $NUMBER_SHAPE= "<p class='active2'>${i}</p>";
          }else $NUMBER_SHAPE = ${i};
            ECHO " <A HREF='$PHP_SELF?start=$i&search=".$_GET['search']."'>$NUMBER_SHAPE</a>";
        }

        /* NEXT or END PART */
        if ($current_block < $total_block) {
          $NEXT_PAGE = $end_page + 1;
          ECHO " <a HREF='$PHP_SELF?start=$NEXT_PAGE&search=".$_GET['search']."'><img src='./img/page_next.png'></a>";
        }
        if ($current_block < $total_block) {
          ECHO " <a HREF='$PHP_SELF?start=$total_page&search=".$_GET['search']."'><img src='./img/page_nnext.png'></a>";
        }
      ?>
      </div>
    </div>

  </div>


  <!-- IONICONS -->
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <!-- JS -->
  <script src="./javascript/script.js"></script>
</body>

</html>
