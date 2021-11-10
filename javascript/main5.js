var slideIndex = 0; //slide index

// HTML 로드가 끝난 후 동작
window.onload=function(){
  showSlides(slideIndex);

  // Auto Move Slide
  var sec = 3000;
  setInterval(function(){
    slideIndex++;
    showSlides(slideIndex);

  }, sec);
}


// Next/previous controls
function moveSlides(n) {
  slideIndex = slideIndex + n
  showSlides(slideIndex);
}

// Thumbnail image controls
function currentSlide(n) {
  slideIndex = n;
  showSlides(slideIndex);
}

function showSlides(n) {

  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  var size = slides.length;

  if ((n+1) > size) {
    slideIndex = 0; n = 0;
  }else if (n < 0) {
    slideIndex = (size-1);
    n = (size-1);
  }

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[n].style.display = "block";
  dots[n].className += " active";
}

/*---------------체크박스 선택----------------*/
$(document).ready(function() {
     $("[name=checkAll]").click(function() {
        checkAll();
    });
});



function checkAll() {
    var checkLength = $("input[name=checkAll]:checked").length

    if(checkLength==1) {
          $("#chackTr").parent().find("input[type=checkbox]").prop("checked",true);
        } else {
          $("#chackTr").parent().find("input[type=checkbox]").prop("checked",false);
        }
    // if(checkLength==1) {
    //    $('input:checkbox[id="checkA"]').prop("checked",true);
    // } else {
    //    $('input:checkbox[id="checkA"]').prop("checked",false);
    // }
}


/*-----------------우편번호 찾기----------------- */
function openZipSearch() {
	new daum.Postcode({
		oncomplete: function(data) {
			$('[name=PAYMENT_add1]').val(data.zonecode); // 우편번호 (5자리)
			$('[name=PAYMENT_add2]').val(data.address);
			$('[name=PAYMENT_add3]').val(data.buildingName);
		}
	}).open();
}

/*------장바구니 checkbox 선택 여부 ------*/
function buy_btn() {
  if($('.checkA').is(':checked')) {
 // if($('input:checkbox[id="checkA"]').is(':checked')) {
    location.href = "./payment.php"; // 체크가 true이면 결제 페이지로 이동
  }else{
    alert("상품을 선택해주세요.");
  return false;
  }
}


/*------결제전 checkbox 클릭시 ------*/
function paycheck(){
  if($('input[type=checkbox]:checked').is(':checked')) {
    alert("주문내용을 한번더 확인해주세요!");
  }
}
