<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$sql = "SELECT * FROM user WHERE USER_id='".$_SESSION['USER_id']."'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$db_pw = $row["USER_pw"];

$USER_id = $_SESSION['USER_id'];
$present_pw = $_POST['present_pw'];
$new_pw = $_POST['new_pw'];
$new_pwck = $_POST['new_pwck'];

if($present_pw == null || $new_pw == null || $new_pwck == null){
  echo "<script> alert('입력이 안 된 사항이 있습니다.'); history.back(); </script>";
}else if($present_pw != $db_pw){
  echo "<script> alert('현재 비밀번호가 일치하지 않습니다.'); history.back(); </script>";
}else if(!preg_match('/^.*(?=^.{8,20}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/', $new_pw)){
  echo "<script> alert('비밀번호 형식이 맞지 않습니다. \\n영문, 숫자, 특수문자 모두 포함 8~20자리'); history.back(); </script>";
}else if($new_pw != $new_pwck){
  echo "<script> alert('새 비밀번호가 일치하지 않습니다.'); history.back(); </script>";
}else{
  $sql_update = "UPDATE user SET USER_pw = '".$new_pw."' WHERE USER_id ='".$_SESSION['USER_id']."'";
  $update_result = mysqli_query($con, $sql_update);

  if($update_result){
    echo "<script> alert('비밀번호 변경 성공!'); location.href = 'mypage.php'; </script>";
  }else{
    echo "<script> alert('비밀번호 변경 실패!'); history.back(); </script>";
  }
}
