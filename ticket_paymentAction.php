<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$user_ticketcnt = $_POST['user_ticketcnt'];
$radioch = $_POST['radioch'];
$orderchk = $_POST['orderchk'];
$now = date("ymdHis"); //오늘의 날짜 년월일시분초
$rand = strtoupper(substr(md5(uniqid(time())),0,4)) ; //임의의난수발생 앞6자리
$TICKETBUY_num = $now . $rand;

if($radioch == null){
  echo "<script> alert('결제수단을 선택해주세요.'); history.back(); </script>";
}else if($orderchk == null){
  echo "<script> alert('주문내용 확인 및 결제 동의를 해주세요.'); history.back(); </script>";
}else{

  $sql_same = "SELECT USER_id FROM user_ticket WHERE USER_id='".$_SESSION['USER_id']."'";
  $order = mysqli_query($con, $sql_same);
  if(mysqli_num_rows($order) > 0){

    $sql_update = "UPDATE user_ticket SET USER_ticketcnt = USER_ticketcnt + $user_ticketcnt WHERE USER_id ='".$_SESSION['USER_id']."'";
    $sql_save2 = "INSERT INTO ticket_buy(USER_id, USER_name, TICKETBUY_num, TICKETBUY_cnt)
    VALUES('$USER_id', '$USER_name', '$TICKETBUY_num', '$user_ticketcnt')";

    $update_result = mysqli_query($con, $sql_update);
    $save2_result = mysqli_query($con, $sql_save2);

  }else{

    $sql_save1 = "INSERT INTO user_ticket(USER_id, USER_ticketcnt)
    VALUES('$USER_id', '$user_ticketcnt')";
    $sql_save2 = "INSERT INTO ticket_buy(USER_id, USER_name, TICKETBUY_num, TICKETBUY_cnt)
    VALUES('$USER_id','$USER_name', '$TICKETBUY_num', '$user_ticketcnt')";

    $save1_result = mysqli_query($con, $sql_save1);
    $save2_result = mysqli_query($con, $sql_save2);
  }

  if($save1_result || $update_result && $save2_result){
    echo "<script> alert('결제 되었습니다.'); location.href = 'f_ticket_buy.php'; </script>";
  }else{
    echo "<script> alert('결제에 실패하였습니다.'); history.back(); </script>";
  }
}
?>
