function movepage(page)
{
    var popOption = "width=460, height=350, resizable=no, scrollbars=no, status=no;";
    window.open(page,"",popOption);
    return;
}
/*
function checkForm(){
    f=document.writeForm;
    var chk1=document.writeForm.agree.checked;

    if(!chk1){
        alert("개인 정보 수집정책에 동의 해주세요");
        return;
    }
    f.submit();
}
*/
function cancleBtn(ck){
    alert("개인 정보 수집정책에 동의 해주세요");
}

function okBtn(){
   window.close();
   return;
}

function loginPage(){
    window.location.href = 'login.html'
}

function mainPage() {
    window.location.href = 'main.html'
}
