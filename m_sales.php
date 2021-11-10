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
  <title>판매현황</title>
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
          <a href="./m_delivery.php" class="nav__link">
            <ion-icon name="reader-outline" class="nav__icon"></ion-icon>
            <span class="nav_name ">주문내역</span>
          </a>

          <a href="./m_sales.php" class="nav__link  active">
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
      <p>뽑기권 판매현황</p>
    </div>
    <div class="sale_chat_canvas" >
        <canvas id="myChart"></canvas>
      </div>
  </div>
  </div>

  <!-- IONICONS -->
  <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  <!-- JS -->
  <script src="./javascript/script.js"></script>
  <script>
  $.ajax({
        url : './chart_data.php',
        type: 'POST',
        dataType: "json",
        success:function(data){
            chart_view(data)
        },
        error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
    });
        function chart_view(data){
          var date_data = []; //아래 월별 time
          var ticket_data = []; // 왼쪽 티켓개수 level date
          $.each(data, function (index, item) {
            date_data.push(item.buy_date + '월'); // 시간 데이터 넣어줌
            ticket_data.push(item.buy_cnt); //티켓 수 데이터 넣어줌
          });

          var color = Chart.helpers.color;
          var ChartData = {
              labels: date_data,
              datasets: [{
                  label: '판매현황',
                  borderColor: '#acd7b1',
                  borderWidth: 4,
                  data: ticket_data,
                  fill: false
              }]
          };

          var context = document.getElementById('myChart').getContext('2d');
          window.myChart = new Chart(context, {
            type: 'line', // 차트의 형태
            data: ChartData,
            options: {
              legend: {display:false},
              scales: {
                yAxes: [{
                  ticks: {
                    min:0,
                    stepSize:50,
                    beginAtZero: true
                  }
                }]
              }
            }
          });
        }
  </script>
</body>
</html>
