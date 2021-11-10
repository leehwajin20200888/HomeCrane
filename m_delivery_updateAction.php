<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$PAYMENT_state = $_POST['state'];
$PAYMENT_num = $_POST['PAYMENT_num'];

  for($i = 0; $i < count($PAYMENT_num); $i++){
    $sql_update = "UPDATE payment
                  SET PAYMENT_state = '".$PAYMENT_state[$i]."'
                   WHERE PAYMENT_num = '".$PAYMENT_num[$i]."'";

    $update_result = mysqli_query($con, $sql_update);
}


if($update_result){
  echo "<script> alert('배송정보 수정 성공!'); history.back(); </script>";
}else{
  echo "<script> alert('배송정보 수정 실패!'); history.back(); </script>";
}

?>
