<?php
header("Content-Type: text/html;charset=UTF-8");
session_start();
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
header("Cache-Control: no cache");

$USER_id = $_POST['USER_id'];
$USER_name = $_POST['USER_name'];



$sql_user_ticket = "SELECT * FROM user_ticket WHERE USER_id ='".$USER_id."'";
$user_ticket = mysqli_query($con, $sql_user_ticket);
$row = mysqli_fetch_array($user_ticket);


if($row == null || $row == 0){
  echo "<script> alert('뽑기권이 부족합니다.'); history.back(); </script>";
}else{
  $use_ticket = $row['USER_ticketcnt'] - 1;
  $TICKETUSE_use_cnt = 1;

  $sql_insert = "INSERT INTO ticket_use(USER_id, USER_name, TICKETUSE_use_cnt, TICKETUSE_remain_cnt)
                  VALUES('$USER_id', '$USER_name', '$TICKETUSE_use_cnt', '$use_ticket')";

  $sql_update = "UPDATE user_ticket
                SET USER_ticketcnt = '".$use_ticket."'
                WHERE USER_id ='".$USER_id."'";

  $insert_result = mysqli_query($con, $sql_insert);
  $update_result = mysqli_query($con, $sql_update);
}

if($update_result && $insert_result){
  echo "<script> history.back(); </script>";
}else{
  echo "<script> history.back(); </script>";
}

?>
