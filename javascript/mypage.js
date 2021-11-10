//오늘 날짜
var nowDate = new Date();
var nowYear = nowDate.getFullYear();
var nowMonth = nowDate.getMonth() + 1;
var nowDay = nowDate.getDate();

if(nowMonth < 10){ nowMonth = "0" + nowMonth; }
if(nowDay < 10){ nowDay = "0" + nowDay; }

var todayDate = nowYear + "-" + nowMonth + "-" + nowDay;

// 1주일 전
var nowDate = new Date();
var weekDate = nowDate.getTime() - (7 * 24 * 60 * 60 * 1000);
nowDate.setTime(weekDate);

var weekYear = nowDate.getFullYear();
var weekMonth = nowDate.getMonth() + 1;
var weekDay = nowDate.getDate();

if(weekMonth < 10){ weekMonth = "0" + weekMonth; }
if(weekDay < 10){ weekDay = "0" + weekDay; }

var resultDate = weekYear + "-" + weekMonth + "-" + weekDay;

// 1달 전
var nowDate = new Date();
var oneDate = nowDate.getTime() - (30 * 24 * 60 * 60 * 1000);
nowDate.setTime(oneDate);

var oneYear = nowDate.getFullYear();
var oneMonth = nowDate.getMonth() + 1;
var oneDay = nowDate.getDate();

if(oneMonth < 10){ oneMonth = "0" + oneMonth; }
if(oneDay < 10){ oneDay = "0" + oneDay; }

var oneDate = oneYear + "-" + oneMonth + "-" + oneDay;

// 3달 전
var nowDate = new Date();
var threeDate = nowDate.getTime() - (90 * 24 * 60 * 60 * 1000);
nowDate.setTime(threeDate);

var threeYear = nowDate.getFullYear();
var threeMonth = nowDate.getMonth() + 1;
var threeDay = nowDate.getDate();

if(threeMonth < 10){ threeMonth = "0" + threeMonth; }
if(threeDay < 10){ threeDay = "0" + threeDay; }

var threeDate = threeYear + "-" + threeMonth + "-" + threeDay;

// 6달 전
var nowDate = new Date();
var sixDate = nowDate.getTime() - (180 * 24 * 60 * 60 * 1000);
nowDate.setTime(sixDate);

var sixYear = nowDate.getFullYear();
var sixMonth = nowDate.getMonth() + 1;
var sixDay = nowDate.getDate();

if(sixMonth < 10){ sixMonth = "0" + sixMonth; }
if(sixDay < 10){ sixDay = "0" + sixDay; }

var sixDate = sixYear + "-" + sixMonth + "-" + sixDay;

// 1년 전
var nowDate = new Date();
var yearDate = nowDate.getTime() - (365 * 24 * 60 * 60 * 1000);
nowDate.setTime(yearDate);

var yearYear = nowDate.getFullYear();
var yearMonth = nowDate.getMonth() + 1;
var yearDay = nowDate.getDate();

if(yearMonth < 10){ yearMonth = "0" + yearMonth; }
if(yearDay < 10){ yearDay = "0" + yearDay; }

var yearDate = yearYear + "-" + yearMonth + "-" + yearDay;

// 주문 조회 실행
function inquiry(){
  var form = document.frm;
  form.submit();
}

function info_delete(){
  var result = confirm("회원에서 탈퇴 하시겠습니까?");
  if(result){
    document.getElementById("delete").value = "YES";
  }else{
    document.getElementById("delete").value = "NO";
  }
}

$(document).ready(function() {
   $('#dateTo').val(todayDate);
});

$(document).ready(function() {
   $('#dateFrom').val(resultDate);
});

function month1(){
    $('#dateFrom').val(oneDate);
}

function month3(){
    $('#dateFrom').val(threeDate);
}

function month6(){
    $('#dateFrom').val(sixDate);
}

function year1(){
    $('#dateFrom').val(yearDate);
}
