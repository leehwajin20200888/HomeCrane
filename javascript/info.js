$(function(){
    
    $('#doll').click(function(){
        $("#kurimg").attr("src", "./img/kuromi.png");
        $("#kurtext").text("쿠로미");
        $("#melodyimg").attr("src", "./img/mymelody.png");
        $("#melodytext").text("마이멜로디");
        $("#cinnimg").attr("src", "./img/Cinnamoroll.png");
        $("#cinntext").text("시나모롤");
        $("#pomimg").attr("src", "./img/pompompurine.png");
        $("#pomtext").text("폼폼푸린");
        $("#omimg").attr("src", "./img/ompang.png");
        $("#omtext").text("옴팡이");
        $("#olafimg").attr("src", "./img/Olaf.png");
        $("#olaftext").text("울라프");
        
    })

    $('#res').click(function(){
        $("#kurimg").attr("src", "./img/earphone.png");
        $("#kurtext").text("이어폰");
        $("#melodyimg").attr("src", "./img/switch.png");
        $("#melodytext").text("닌텐도 스위치");
        $("#cinnimg").attr("src", "./img/headset.png");
        $("#cinntext").text("헤드셋");
        $("#pomimg").attr("src", "./img/mic.png");
        $("#pomtext").text("무선 마이크");
        $("#omimg").attr("src", "./img/AirPods.png");
        $("#omtext").text("에어팟프로");
        $("#olafimg").attr("src", "./img/battery.png");
        $("#olaftext").text("보조배터리");
        
    })

    $('#chip').click(function()
    {
        $("#kurimg").attr("src", "./img/chocolate.png");
        $("#kurtext").text("초콜릿");
        $("#melodyimg").attr("src", "./img/mtdongsan.png");
        $("#melodytext").text("맛동산");
        $("#cinnimg").attr("src", "./img/oreo.png");
        $("#cinntext").text("오레오");
        $("#pomimg").attr("src", "./img/pepsi.png");
        $("#pomtext").text("팹시");
        $("#omimg").attr("src", "./img/Chocobi.png");
        $("#omtext").text("초코비");
        $("#olafimg").attr("src", "./img/pocachip.png");
        $("#olaftext").text("포카칩");
    })
    $('#random').click(function(){
        $("#kurimg").attr("src", "./img/random.png");
        $("#kurtext").text("랜덤");
        $("#melodyimg").attr("src", "./img/random.png");
        $("#melodytext").text("랜덤");
        $("#cinnimg").attr("src", "./img/random.png");
        $("#cinntext").text("랜덤");
        $("#pomimg").attr("src", "./img/random.png");
        $("#pomtext").text("랜덤");
        $("#omimg").attr("src", "./img/random.png");
        $("#omtext").text("랜덤");
        $("#olafimg").attr("src", "./img/random.png");
        $("#olaftext").text("랜덤");
    //   $('#ch_pay').html(' <div id="ch_pay">계좌이체</div>');


    })

  })
