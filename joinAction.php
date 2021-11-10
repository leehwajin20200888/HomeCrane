<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');

$USER_id = $_POST['USER_id'];
$USER_pw = $_POST['USER_pw'];
$USER_pwck = $_POST['USER_pwck'];
$USER_name = $_POST['USER_name'];
$USER_birthyy = $_POST['USER_birthyy'];
$USER_birthmm = $_POST['USER_birthmm'];
$USER_birthdd = $_POST['USER_birthdd'];
$USER_phonenum = $_POST['USER_phonenum'];
$USER_add1 = $_POST['USER_add1'];
$USER_add2 = $_POST['USER_add2'];
$consent = $_POST['consent'];

if($USER_id == null || $USER_pw == null || $USER_pwck == null || $USER_name == null || $USER_birthyy == null || $USER_birthmm == null ||
   $USER_birthdd == null || $USER_phonenum == null || $USER_add1 == null || $USER_add2 == null){
  echo "<script>alert('입력이 안 된 사항이 있습니다.'); history.back(); </script>";
}else if($USER_pwck != $USER_pw){
  echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back(); </script>";
}else if($consent == null){
  echo "<script>alert('개인정보 동의를 해주세요.'); history.back(); </script>";
}else if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $USER_id)){
  echo "<script>alert('이메일 형식이 아닙니다.'); history.back(); </script>";
}else if(!preg_match('/^.*(?=^.{8,20}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/', $USER_pw)){
  echo "<script>alert('비밀번호 형식이 맞지 않습니다. \\n영문, 숫자, 특수문자 모두 포함 8~20자리'); history.back(); </script>";
}else{

  $sql_same = "SELECT USER_id FROM user WHERE USER_id='".$_POST['USER_id']."'";
  $order = mysqli_query($con, $sql_same);

  if(mysqli_num_rows($order) > 0){
    echo "<script>alert('중복된 아이디 입니다.'); history.back(); </script>";
  }else{
    $sql_save = "INSERT INTO user(USER_name, USER_id, USER_pw, USER_birthyy, USER_birthmm, USER_birthdd, USER_phonenum, USER_add1, USER_add2)
    VALUES('$USER_name', '$USER_id', '$USER_pw', '$USER_birthyy' ,'$USER_birthmm', '$USER_birthdd', '$USER_phonenum', '$USER_add1', '$USER_add2')";
    $result = mysqli_query($con, $sql_save);

    if($result){
      echo "<script>alert('회원가입 성공!'); location.href = 'login.html'; </script>";
    }else{
      echo "<script>alert('회원가입 실패!'); history.back(); </script>";
    }
  }
}

?>
