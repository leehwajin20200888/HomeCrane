<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$delete = $_POST['delete'];

if($delete == 'YES'){
  $sql_user_delete = "DELETE FROM user WHERE USER_id ='".$_SESSION['USER_id']."'";
  $sql_basket_delete = "DELETE FROM basket WHERE USER_id ='".$_SESSION['USER_id']."'";
  $sql_payment_delete = "DELETE FROM payment WHERE USER_id ='".$_SESSION['USER_id']."'";
  $sql_ticket_buy_delete = "DELETE FROM ticket_buy WHERE USER_id ='".$_SESSION['USER_id']."'";
  $sql_user_ticket_delete = "DELETE FROM user_ticket WHERE USER_id ='".$_SESSION['USER_id']."'";
  $delete_user_result = mysqli_query($con, $sql_user_delete);
  $delete_basket_result = mysqli_query($con, $sql_basket_delete);
  $delete_payment_result = mysqli_query($con, $sql_payment_delete);
  $delete_ticket_buy_result = mysqli_query($con, $sql_ticket_buy_delete);
  $delete_user_ticket_result = mysqli_query($con, $sql_user_ticket_delete);

  if($delete_user_result && $delete_basket_result && $delete_payment_result && $delete_ticket_buy_result && $delete_user_ticket_result){
    session_unset();
    session_destroy();
    echo "<script> alert('회원 탈퇴 성공!'); location.href = 'main.php'; </script>";
    exit();
  }else{
    echo "<script> alert('회원 탈퇴 실패!'); history.back(); </script>";
  }
}else{
  echo "<script> history.back(); </script>";
}



?>
