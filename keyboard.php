<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>조작 테스트</title>
        <style>
            * {
                margin : 0;
                padding : 0;
            }
            
            html,body {
                width : 100%;
                height : 100%;
            }

            table {
                position : absolute;
                width : 50%;
                height : 40%;
                top : 50%;
                left : 50%;
                transform : translate(-50% , -50%);
            }

            img {
                width : 300px;
                height : 300px;
            }
        </style>
    </head>
    <body>
        <table border="1" cellspacing="0">
            <tr>
                <td></td>
                <td id="up"><img src="./img/test/up.png"></td>
                <td></td>
            </tr>
            <tr>
                <td id="left"><img src="./img/test/left.png"></td>
                <td id="down"><img src="./img/test/down.png"></td>
                <td id="right"><img src="./img/test/right.png"></td>
            </tr>
        </table>
        <script>
            const button_up = document.getElementById('up');
            const button_left = document.getElementById('left');
            const button_down = document.getElementById('down');
            const button_right = document.getElementById('right');

            const xhr = new XMLHttpRequest();

            button_up.addEventListener('click' , () => {
                // 비동기 방식으로 Request를 오픈한다
                xhr.open('GET', 'http://223.194.167.245:8080/api/Keyboard?direction=l');
                // Request를 전송한다
                xhr.send();
            });

            button_left.addEventListener('click' , () => {
                // 비동기 방식으로 Request를 오픈한다
                xhr.open('GET', 'http://arduweb.gonetis.com:8080/api/Keyboard?direction=a');
                // Request를 전송한다
                xhr.send();
            });

            button_down.addEventListener('click' , () => {
                // 비동기 방식으로 Request를 오픈한다
                xhr.open('GET', 'http://arduweb.gonetis.com:8080/api/Keyboard?direction=s');
                // Request를 전송한다
                xhr.send();
            });

            button_right.addEventListener('click' , () => {
                // 비동기 방식으로 Request를 오픈한다
                xhr.open('GET', 'http://arduweb.gonetis.com:8080/api/Keyboard?direction=d');
                // Request를 전송한다
                xhr.send();
            }); 
        </script>
    </body>
</html>