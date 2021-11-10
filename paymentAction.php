<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$PAYMENT_name = $_POST['PAYMENT_name'];
$PAYMENT_phone = $_POST['PAYMENT_phone'];
$PAYMENT_add1 = $_POST['PAYMENT_add1'];
$PAYMENT_add2 = $_POST['PAYMENT_add2'];
$PAYMENT_add3 = $_POST['PAYMENT_add3'];
$PAYMENT_memo = $_POST['PAYMENT_memo'];
$radioch = $_POST['radioch'];
$orderchk = $_POST['orderchk'];
$payproduct1 = $_POST['payproduct1'];
$payproduct2 = $_POST['payproduct2'];
$payproduct3 = $_POST['payproduct3'];
$payproduct4 = $_POST['payproduct4'];
$payproduct5 = $_POST['payproduct5'];
$payproduct6 = $_POST['payproduct6'];
$basket_cnt1 = $_POST['basket_cnt1'];
$basket_cnt2 = $_POST['basket_cnt2'];
$basket_cnt3 = $_POST['basket_cnt3'];
$basket_cnt4 = $_POST['basket_cnt4'];
$basket_cnt5 = $_POST['basket_cnt5'];
$basket_cnt6 = $_POST['basket_cnt6'];
$PAYMENT_state = '결제완료';
$now = date("ymdHis"); //오늘의 날짜 년월일시분초
$rand1 = strtoupper(substr(md5(uniqid(time())),0,6)); //임의의난수발생 앞6자리
$rand2 = strtoupper(substr(md5(uniqid(time())),0,6)); //임의의난수발생 앞6자리
$rand3 = strtoupper(substr(md5(uniqid(time())),0,6)); //임의의난수발생 앞6자리
$rand4 = strtoupper(substr(md5(uniqid(time())),0,6)); //임의의난수발생 앞6자리
$rand5 = strtoupper(substr(md5(uniqid(time())),0,6)); //임의의난수발생 앞6자리
$rand6 = strtoupper(substr(md5(uniqid(time())),0,6)); //임의의난수발생 앞6자리
$PAYMENT_num1 = $now.$rand1;
$PAYMENT_num2 = $now.$rand2;
$PAYMENT_num3 = $now.$rand3;
$PAYMENT_num4 = $now.$rand4;
$PAYMENT_num5 = $now.$rand5;
$PAYMENT_num6 = $now.$rand6;



if($PAYMENT_name == null || $PAYMENT_phone == null || $PAYMENT_add1 == null || $PAYMENT_add2 == null || $PAYMENT_add3 == null){
  echo "<script> alert('입력이 안 된 사항이 있습니다.'); history.back(); </script>";
}else if($radioch == null){
  echo "<script> alert('결제수단을 선택해주세요.'); history.back(); </script>";
}else if($orderchk == null){
  echo "<script> alert('주문내용 확인 및 결제 동의를 해주세요.'); history.back(); </script>";
}else{

      if($payproduct1 != null){
        $sql_save1 = "INSERT INTO payment(USER_id, PAYMENT_num, PRODUCT_id, PRODUCT_cnt, PAYMENT_name, PAYMENT_phone, PAYMENT_add1, PAYMENT_add2, PAYMENT_add3, PAYMENT_memo, PAYMENT_state)
        VALUES('$USER_id', '$PAYMENT_num1', '$payproduct1', '$basket_cnt1', '$PAYMENT_name', '$PAYMENT_phone', '$PAYMENT_add1', '$PAYMENT_add2', '$PAYMENT_add3', '$PAYMENT_memo', '$PAYMENT_state')";

        $sql_delete1 = "DELETE FROM basket WHERE USER_id='".$_SESSION['USER_id']."' AND PRODUCT_id='".$payproduct1."'";
        $save_result1 = mysqli_query($con, $sql_save1);
        $delete_result1 = mysqli_query($con, $sql_delete1);
      }
      if($payproduct2 != null){
        $sql_save2 = "INSERT INTO payment(USER_id, PAYMENT_num, PRODUCT_id, PRODUCT_cnt, PAYMENT_name, PAYMENT_phone, PAYMENT_add1, PAYMENT_add2, PAYMENT_add3, PAYMENT_memo, PAYMENT_state)
        VALUES('$USER_id', '$PAYMENT_num2', '$payproduct2', '$basket_cnt2', '$PAYMENT_name', '$PAYMENT_phone', '$PAYMENT_add1', '$PAYMENT_add2', '$PAYMENT_add3', '$PAYMENT_memo', '$PAYMENT_state')";

        $sql_delete2 = "DELETE FROM basket WHERE USER_id='".$_SESSION['USER_id']."' AND PRODUCT_id='".$payproduct2."'";
        $save_result2 = mysqli_query($con, $sql_save2);
        $delete_result2 = mysqli_query($con, $sql_delete2);
      }
      if($payproduct3 != null){
        $sql_save3 = "INSERT INTO payment(USER_id, PAYMENT_num, PRODUCT_id, PRODUCT_cnt, PAYMENT_name, PAYMENT_phone, PAYMENT_add1, PAYMENT_add2, PAYMENT_add3, PAYMENT_memo, PAYMENT_state)
        VALUES('$USER_id', '$PAYMENT_num3', '$payproduct3', '$basket_cnt3', '$PAYMENT_name', '$PAYMENT_phone', '$PAYMENT_add1', '$PAYMENT_add2', '$PAYMENT_add3', '$PAYMENT_memo', '$PAYMENT_state')";

        $sql_delete3 = "DELETE FROM basket WHERE USER_id='".$_SESSION['USER_id']."' AND PRODUCT_id='".$payproduct3."'";
        $save_result3 = mysqli_query($con, $sql_save3);
        $delete_result3 = mysqli_query($con, $sql_delete3);
      }
      if($payproduct4 != null){
        $sql_save4 = "INSERT INTO payment(USER_id, PAYMENT_num, PRODUCT_id, PRODUCT_cnt, PAYMENT_name, PAYMENT_phone, PAYMENT_add1, PAYMENT_add2, PAYMENT_add3, PAYMENT_memo, PAYMENT_state)
        VALUES('$USER_id', '$PAYMENT_num4', '$payproduct4', '$basket_cnt4', '$PAYMENT_name', '$PAYMENT_phone', '$PAYMENT_add1', '$PAYMENT_add2', '$PAYMENT_add3', '$PAYMENT_memo', '$PAYMENT_state')";

        $sql_delete4 = "DELETE FROM basket WHERE USER_id='".$_SESSION['USER_id']."' AND PRODUCT_id='".$payproduct4."'";
        $save_result4 = mysqli_query($con, $sql_save4);
        $delete_result4 = mysqli_query($con, $sql_delete4);
      }
      if($payproduct5 != null){
        $sql_save5 = "INSERT INTO payment(USER_id, PAYMENT_num, PRODUCT_id, PRODUCT_cnt, PAYMENT_name, PAYMENT_phone, PAYMENT_add1, PAYMENT_add2, PAYMENT_add3, PAYMENT_memo, PAYMENT_state)
        VALUES('$USER_id', '$PAYMENT_num5', '$payproduct5', '$basket_cnt5', '$PAYMENT_name', '$PAYMENT_phone', '$PAYMENT_add1', '$PAYMENT_add2', '$PAYMENT_add3', '$PAYMENT_memo', '$PAYMENT_state')";

        $sql_delete5 = "DELETE FROM basket WHERE USER_id='".$_SESSION['USER_id']."' AND PRODUCT_id='".$payproduct5."'";
        $save_result5 = mysqli_query($con, $sql_save5);
        $delete_result5 = mysqli_query($con, $sql_delete5);
      }
      if($payproduct6 != null){
        $sql_save6 = "INSERT INTO payment(USER_id, PAYMENT_num, PRODUCT_id, PRODUCT_cnt, PAYMENT_name, PAYMENT_phone, PAYMENT_add1, PAYMENT_add2, PAYMENT_add3, PAYMENT_memo, PAYMENT_state)
        VALUES('$USER_id', '$PAYMENT_num6', '$payproduct6', '$basket_cnt6', '$PAYMENT_name', '$PAYMENT_phone', '$PAYMENT_add1', '$PAYMENT_add2', '$PAYMENT_add3', '$PAYMENT_memo', '$PAYMENT_state')";

        $sql_delete6 = "DELETE FROM basket WHERE USER_id='".$_SESSION['USER_id']."' AND PRODUCT_id='".$payproduct6."'";
        $save_result6 = mysqli_query($con, $sql_save6);
        $delete_result6 = mysqli_query($con, $sql_delete6);
    }


    if($save_result1 || $save_result2 || $save_result3 || $save_result4 || $save_result5 || $save_result6){
      echo "<script> alert('결제 되었습니다.'); location.href = 'basket.php'; </script>";
    }else{
      echo "<script> alert('결제에 실패하였습니다.'); history.back(); </script>";
    }
}
?>
