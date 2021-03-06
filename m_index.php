<?php
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');

$payment_info = "SELECT * FROM payment ORDER BY PAYMENT_day DESC LIMIT 0, 5";
$payment_info_result = mysqli_query($con, $payment_info);

$sql_payment_info = "SELECT * FROM payment";
$sql_payment_info_cnt = mysqli_query($con, $sql_payment_info);
$payment_info_cnt = mysqli_num_rows($sql_payment_info_cnt);

$drawlist_info = "SELECT * FROM user_draw_list ORDER BY DRAWLIST_day DESC LIMIT 0, 5";
$drawlist_info_result = mysqli_query($con, $drawlist_info);

$sql_user_draw_list_info = "SELECT * FROM user_draw_list";
$sql_user_draw_list_info_cnt = mysqli_query($con, $sql_user_draw_list_info);
$user_draw_info_cnt = mysqli_num_rows($sql_user_draw_list_info_cnt);
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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  <title>Soulmate</title>
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
  <div class="l-navbar2" id="navbar">
    <nav class="nav">
      <div class="sidebar_sort">
        <div class="nav__brand">
          <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
          <a href="#" class="nav__logo">menu</a>
        </div>
        <div class="nav__list">
          <a href="./m_index.php" class="nav__link active">
            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">dashboard</span>
          </a>
          <a href="m_user_info.php" class="nav__link">
            <ion-icon name="person-add-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">????????????</span>
          </a>
          <!--folder-outline-->
          <div class="nav__link collapse">
            <ion-icon name="ticket-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">?????????</span>
            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

            <ul class="collapse__menu">
              <li> <a href="./m_buy_list.php" class="collapse__sublink">????????????</a></li>
              <li> <a href="./m_use_list.php" class="collapse__sublink">????????????</a></li>
            </ul>
          </div>

          <a href="./m_draw_list.php" class="nav__link">
            <ion-icon name="game-controller-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">????????????</span>
          </a>

          <a href="./m_delivery.php" class="nav__link">
            <ion-icon name="reader-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">????????????</span>
          </a>

          <a href="./m_sales.php" class="nav__link">
            <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">????????????</span>
          </a>

          <a href="./m_edit_info.php" class="nav__link collapse">
            <ion-icon name="person-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">??????????????????</span>
          </a>

          <a href="logoutAction.php" class="nav__link">
            <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
            <span class="nav_name">Log out</span>
          </a>

        </div>
    </nav>
  </div>
  <div class="m_container">
    <div class="dash_avg_list">
      <div class="dash_goods_cnt">
        <div class="dash_cnt_info">
          24???
        </div>
        <div>
          <div class="dash_icon_bg">
            <ion-icon name="newspaper-outline" class="icon_fs"></ion-icon>
          </div>
          <p class="dash_title_info">????????????</p>
        </div>
      </div>

      <div class="dash_order_cnt">
        <div class="dash_cnt_info">
          <?php echo $payment_info_cnt ?>???
        </div>
        <div>
          <div class="dash_icon_bg">
            <ion-icon name="cart-outline" class="icon_fs"></ion-icon>
          </div>
          <p class="dash_title_info">????????????</p>
        </div>
      </div>

      <div class="dash_draw_cnt">
        <div class="dash_cnt_info">
          <?php echo $user_draw_info_cnt ?>???
        </div>
        <div>
          <div class="dash_icon_bg">
            <ion-icon name="cart-outline" class="icon_fs"></ion-icon>
          </div>
          <p class="dash_title_info">????????????</p>
        </div>
      </div>

      <div class="dash_money_info">
        <div class="dash_cnt_info">
          500,000???
        </div>

        <div>
          <div class="dash_icon_bg">
            <ion-icon name="wallet-outline" class="icon_fs"></ion-icon>
          </div>
          <p class="dash_title_info">?????????</p>
        </div>
      </div>

    </div>

    <div class="dash_f_bord">
      <div class="dash_chart_cover">
        <p>????????? ??????</p>
        <div class="chat_canvas" >
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <div class="dash_h_rode_cover">
        <div class="m_vi_cnt">
          <p>??????</p>
          <div class="zt-skill-bar">
            <div data-width="88"></div>
          </div>
        </div>
        <div class="m_vi_cnt">
          <p>?????? ????????????</p>
          <div class="zt-skill-bar">
            <div data-width="30"></div>
          </div>
        </div>
        <div class="m_vi_cnt">
          <p>?????? ?????????</p>
          <div class="zt-skill-bar">
            <div data-width="62"></div>
          </div>
          <div class="m_vi_cnt">
            <p>?????? ????????????</p>
            <div class="zt-skill-bar">
              <div data-width="80"></div>
            </div>
          </div>
          <div class="m_vi_cnt">
            <p>?????? ?????? ?????????</p>
            <div class="zt-skill-bar">
              <div data-width="70"></div>
            </div>
          </div>
        </div>
      </div><!--dash_h_rode_cover ??????-->
    </div><!--dash_f_bord ??????-->
    <div class="dash_s_bord_cover">
      <div class="dash_s_bord">
        <p><a href="./m_delivery.php">????????????</a></p>
        <table>
          <tr>
            <th>?????????</th>
            <th>??????</th>
            <th>????????????</th>
            <th>????????????</th>
            <th>?????????</th>
            <th>??????</th>
          </tr>

          <?php
            if($USER_id == 'soulmate'){
                while($row = mysqli_fetch_array($payment_info_result)){
          ?>
          <tr>
            <td> <?php echo $row['USER_id'] ?> </td>
            <td> <?php echo $row['PAYMENT_name'] ?> </td>
            <td> <?php echo $row['PAYMENT_phone'] ?> </td>
            <td> <?php echo $row['PAYMENT_num']?> </td>
            <?php if($row['PRODUCT_id'] == 1){ ?>
              <td> ????????? </td>
            <?php }else if($row['PRODUCT_id'] == 2){ ?>
              <td> ????????? </td>
            <?php }else if($row['PRODUCT_id'] == 3){ ?>
              <td> ????????? </td>
            <?php }else if($row['PRODUCT_id'] == 4){ ?>
              <td> ??????????????? </td>
            <?php }else if($row['PRODUCT_id'] == 5){ ?>
              <td> ???????????? </td>
            <?php }else if($row['PRODUCT_id'] == 6){ ?>
              <td> ???????????? </td>
            <?php } ?>
            <td> <?php echo $row['PRODUCT_cnt']?> </td>
          </tr>

          <?php
                }
              }
          ?>

        </table>

      </div>
      <div class="dash_t_bord">
        <p><a href="./m_draw_list.php">????????????</a></p>
        <table>
          <tr>
            <th>?????????</th>
            <th>?????????</th>
            <th>??????</th>
            <th>??????</th>
          </tr>
          <?php
            if($USER_id == 'soulmate'){
                while($row = mysqli_fetch_array($drawlist_info_result)){
          ?>
          <tr>
            <td> <?php echo $row['USER_id'] ?> </td>

            <?php if($row['PRODUCT_id'] == 1){ ?>
              <td> ????????? </td>
            <?php }else if($row['PRODUCT_id'] == 2){ ?>
              <td> ????????? </td>
            <?php }else if($row['PRODUCT_id'] == 3){ ?>
              <td> ????????? </td>
            <?php }else if($row['PRODUCT_id'] == 4){ ?>
              <td> ??????????????? </td>
            <?php }else if($row['PRODUCT_id'] == 5){ ?>
              <td> ???????????? </td>
            <?php }else if($row['PRODUCT_id'] == 6){ ?>
              <td> ???????????? </td>
            <?php } ?>

            <td> <?php echo $row['DRAWLIST_cnt']?> </td>
            <td> <?php echo $row['DRAWLIST_day'] ?> </td>
          </tr>

          <?php
                }
              }
          ?>
        </table>
      </div>
    </div>

  </div>

  <!-- IONICONS -->
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <!-- JS -->
  <script src="./javascript/script.js"></script>
  <script>
    var context = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(context, {
      type: 'line', // ????????? ??????
      data: { // ????????? ????????? ?????????
        labels: [
          //x ???
          '6???', '7???', '8???', '9???', '10???', '11???'
        ],
        datasets: [{ //?????????
          label: '????????? ???', //?????? ??????
          fill: false, // line ????????? ???, ??? ????????? ???????????? ???????????????
          data: [
            21, 19, 25, 20, 23, 26 //x??? label??? ???????????? ????????? ???
          ],
          backgroundColor: '#acd7b1',
          borderColor: '#acd7b1',
          borderWidth: 1 //????????? ??????
        }]
      },
      options: {
        legend: {display:false},
        scales: {
          yAxes: [{
            ticks: {
              stepSize:10,
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>

</html>
