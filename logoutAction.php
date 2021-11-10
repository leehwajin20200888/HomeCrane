<?php
header("Content-Type: text/html;charset=UTF-8");
session_start();

session_unset();

session_destroy();

echo "<script> alert('로그아웃이 되었습니다.'); location.href = 'main.php'; </script>";
exit();

?>
