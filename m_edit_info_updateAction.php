<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$sql = "SELECT * FROM user WHERE USER_id='".$_SESSION['USER_id']."'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$db_pw = $row["USER_pw"];

$USER_name = $_POST['USER_name'];
$present_pw = $_POST['present_pw'];
$new_pw = $_POST['new_pw'];
$new_pwck = $_POST['new_pwck'];
$USER_birthyy = $_POST['USER_birthyy'];
$USER_birthmm = $_POST['USER_birthmm'];
$USER_birthdd = $_POST['USER_birthdd'];
$USER_phonenum = $_POST['USER_phonenum'];
$USER_add1 = $_POST['USER_add1'];
$USER_add2 = $_POST['USER_add2'];

if($present_pw != null || $new_pw != null || $new_pwck != null){
  if($present_pw != $db_pw){
    echo "<script> alert('현재 비밀번호가 일치하지 않습니다.'); history.back(); </script>";
  }else if($new_pw == null){
    echo "<script> alert('새 비밀번호를 입력해주세요.'); history.back(); </script>";
  }else if($new_pwck == null){
    echo "<script> alert('새 비밀번호 확인을 입력해주세요.'); history.back(); </script>";
  }else if(!preg_match('/^.*(?=^.{8,20}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/', $new_pw)){
    echo "<script> alert('비밀번호 형식이 맞지 않습니다. \\n영문, 숫자, 특수문자 모두 포함 8~20자리'); history.back(); </script>";
  }else if($new_pw != $new_pwck){
    echo "<script> alert('새 비밀번호가 일치하지 않습니다.'); history.back(); </script>";
  }else{
    $sql_update = "UPDATE user
                  SET USER_name = '".$USER_name."', USER_pw = '".$new_pw."', USER_birthyy = '".$USER_birthyy."', USER_birthmm = '".$USER_birthmm."',
                  USER_birthdd = '".$USER_birthdd."', USER_phonenum = '".$USER_phonenum."', USER_add1 = '".$USER_add1."', USER_add2 = '".$USER_add2."'
                  WHERE USER_id ='".$_SESSION['USER_id']."'";
    $update_result = mysqli_query($con, $sql_update);

    if($update_result){
      echo "<script> alert('회원정보 수정 성공!'); location.href = 'm_edit_info.php'; </script>";
    }else{
      echo "<script> alert('회원정보 수정 실패!'); history.back(); </script>";
    }
  }
}else{
  $sql_update = "UPDATE user
                SET
                USER_name = '".$USER_name."', USER_birthyy = '".$USER_birthyy."', USER_birthmm = '".$USER_birthmm."',
                USER_birthdd = '".$USER_birthdd."', USER_phonenum = '".$USER_phonenum."',
                USER_add1 = '".$USER_add1."', USER_add2 = '".$USER_add2."'
                WHERE USER_id ='".$_SESSION['USER_id']."'";
  $update_result = mysqli_query($con, $sql_update);

  if($update_result){
    echo "<script> alert('회원정보 수정 성공!'); location.href = 'm_edit_info.php'; </script>";
  }else{
    echo "<script> alert('회원정보 수정 실패!'); history.back(); </script>";
  }
}
?>
