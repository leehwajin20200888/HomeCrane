<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');
session_start();

$temp_id = $_GET['value'];

if($temp_id == 49){
  $PRODUCT_id = 5;
}

$USER_id = $_GET["userid"];
$USER_name = $_GET["username"];

$PRODUCT_cnt = 1;

$sql_same = "SELECT * FROM basket WHERE PRODUCT_id = '".$PRODUCT_id."' AND USER_id = '".$USER_id."'";
$order = mysqli_query($con, $sql_same);

  if(mysqli_num_rows($order) > 0){
      $sql_basket_update = "UPDATE basket
                            SET BASKET_cnt = BASKET_cnt + $PRODUCT_cnt
                            WHERE PRODUCT_id = '".$PRODUCT_id."' AND USER_id = '".$USER_id."'";
      $sql_user_draw_list_insert = "INSERT INTO user_draw_list(USER_name, USER_id, PRODUCT_id, DRAWLIST_cnt)
                                    VALUES('$USER_name', '$USER_id', '$PRODUCT_id', '$PRODUCT_cnt')";

      $sql_basket_update_result = mysqli_query($con, $sql_basket_update);
      $sql_user_draw_list_result = mysqli_query($con, $sql_user_draw_list_insert);

  }else{
      $sql_basket_insert = "INSERT INTO basket(USER_id, PRODUCT_id, BASKET_cnt)
                            VALUES('$USER_id', '$PRODUCT_id', '$PRODUCT_cnt')";
      $sql_user_draw_list_insert = "INSERT INTO user_draw_list(USER_name, USER_id, PRODUCT_id, DRAWLIST_cnt)
                            VALUES('$USER_name', '$USER_id', '$PRODUCT_id', '$PRODUCT_cnt')";

      $sql_basket_result = mysqli_query($con, $sql_basket_insert);
      $sql_user_draw_list_result = mysqli_query($con, $sql_user_draw_list_insert);
  }



?>
