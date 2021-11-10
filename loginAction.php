<?php

header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');

session_start();

$USER_id = $_POST['USER_id'];
$USER_pw = $_POST['USER_pw'];

$sql = "SELECT * FROM user WHERE USER_id='$USER_id'";
$result = mysqli_query($con, $sql);

$num_match = mysqli_num_rows($result);

if($USER_id == null){
  echo "<script>alert('아이디를 입력해주세요!'); history.back(); </script>";
}else if($USER_pw == null){
  echo "<script>alert('비밀번호를 입력해주세요!'); history.back(); </script>";
}else if(!$num_match){
  echo "<script>alert('등록되지 않은 아이디입니다.'); history.back(); </script>";
}else{
  $row = mysqli_fetch_array($result);
  $db_pw = $row["USER_pw"];

  mysqli_close($con);

  if($USER_pw != $db_pw){
    echo "<script>alert('비밀번호가 틀렸습니다.'); history.back(); </script>";
    exit;
  }else{

    $_SESSION["USER_id"] = $row["USER_id"];
    $_SESSION["USER_name"] = $row["USER_name"];
    $_SESSION["USER_birthyy"] = $row["USER_birthyy"];
    $_SESSION["USER_birthmm"] = $row["USER_birthmm"];
    $_SESSION["USER_birthdd"] = $row["USER_birthdd"];
    $_SESSION["USER_phonenum"] = $row["USER_phonenum"];
    $_SESSION["USER_mailnum"] = $row["USER_mailnum"];
    $_SESSION["USER_add1"] = $row["USER_add1"];
    $_SESSION["USER_add2"] = $row["USER_add2"];

    if($USER_id == 'soulmate'){
      echo "<script> location.href = 'm_index.php'; </script>";
    }else{
      echo "<script> location.href = 'main.php'; </script>";
    }
  }
}
?>
