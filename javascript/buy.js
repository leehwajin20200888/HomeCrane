/*뽑기권 결제 페이지 이동*/
$(document).ready(function() {
    $('#tikbuyf').click(function(){ //id값불러온 후 클릭
        location.href="./ticket_payment.php"; //페이지 이동
    });

    $('#tikbuys').click(function(){ //id값불러온 후 클릭
        location.href="./ticket_payment.php"; //페이지 이동
    });

    $('#tikbuyt').click(function(){ //id값불러온 후 클릭
        location.href="./ticket_payment.php"; //페이지 이동
    });

    $('#tikbuyfo').click(function(){ //id값불러온 후 클릭
        location.href="./ticket_payment.php"; //페이지 이동
    });

});

function paycheck(){
  if($('input[type=checkbox]:checked').is(':checked')) {
    alert("주문내용을 한번더 확인해주세요!");
  }
}

// function f_click(){
//     alert("안농");
// }

/*뽑기권 구매 결제하기 클릭*/
// function tpayclick() {
//
//     if ($('input[name=radio_ch]:checked').is(':checked')) { //radio버튼 선택 여부
//
//         if ($('input[name=order_chk]:checked').is(':checked')) {
//             alert("결제되었습니다.");
//             location.href = "./ticket_buy.html"; //"yes" 선택 시 메인화면으로 이동
//             return true;
//         }
//       else {
//         alert("동의하기를 선택해주세요");
//         return false;
//       }
//     }
//
//     else { //radio 버튼 선택 안 했을 경우
//       alert("결제수단을 선택해주세요.");
//     }
//   }
