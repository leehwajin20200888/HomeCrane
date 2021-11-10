<?php
header("Content-Type: text/html;charset=UTF-8");

$USER_name=$_POST['USER_name'];
$USER_phonenum=$_POST['USER_phonenum'];
$USER_birthyy=$_POST['USER_birthyy'];
$USER_birthmm=$_POST['USER_birthmm'];
$USER_birthdd=$_POST['USER_birthdd'];

if($USER_name == null || $USER_phonenum == null || $USER_birthyy == null || $USER_birthmm == null || $USER_birthdd == null){
  echo "<script>alert('입력이 안 된 사항이 있습니다.'); history.back(); </script>";
}else{
    $con = mysql_connect("211.218.150.109","ci2021soulmate","2021soulmate");
    $db = mysql_select_db("ci2021soulmate", $con) or die(error($con));
    $sql = "select USER_id from user where USER_name='$USER_name' and USER_phonenum='$USER_phonenum' and USER_birthyy='$USER_birthyy'
                                    and USER_birthmm='$USER_birthmm' and USER_birthdd='$USER_birthdd'";
    $rs = mysql_query($sql, $con);
    $row = mysql_fetch_array($rs);
      if(!$row){
        echo "<script>alert('회원정보를 찾을 수 없습니다.'); history.back(); </script>";
      }else{
        echo "<script>alert('회원님의 ID는 ".$row[USER_id]." 입니다.');history.back();</script>";
      }
}

?>
