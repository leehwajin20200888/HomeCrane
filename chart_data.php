<?php

$con = mysqli_connect("211.218.150.109", "ci2021soulmate", '2021soulmate', 'ci2021soulmate');

$sql_query =  "SELECT MONTH(`TICKETBUY_day`) AS buy_date,
                SUM(`TICKETBUY_cnt`) AS buy_cnt
              FROM ticket_buy
              GROUP BY buy_date";
$query_result = mysqli_query($con, $sql_query);

$list = array();

while($data = mysqli_fetch_array($query_result)) {
    array_push($list, $data);
}

echo json_encode($list);
?>
