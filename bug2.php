<?php
	header('Content-Type:text/html; charset=utf-8');
	$connect=mysqli_connect("localhost", "developer3", "qwas2468!", "developer3");
    mysqli_query($connect, "set names utf8");
    
    $No = $_GET['No'];
    $title;
    $writeDate;
    $type;
    $occurDate;
    $content;
    $count;

	$sql="select title, type, content, occurDate, writeDate, count from bug where No=$No";
	$result=mysqli_query($connect, $sql);
	$rowCount=mysqli_num_rows($result);
    
	for($i=0;$i<$rowCount;$i++){
	    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	    if($i==0){
	    	foreach ($row as $key => $value) {
                if($key=="title"){
                    $title=$value;
                }
                if($key=="type"){
                    $type=$value;
                }
                if($key=="content"){
                    $content=$value;
                }
                if($key=="occurDate"){
                    $occurDate=$value;
                }
                if($key=="writeDate"){
                    $writeDate=$value;
                }
                if($key=="count"){
                    $count=$value+1;
                }
	    	}
	    }
	}
    echo "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>TAK's app</title>
    
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
        
            <style>
                header ul{width: 100%;}
                header li{text-align: center;}
                
                section{border: 1px solid black; padding: 10px;}
                section>p{border-bottom: 1px solid black;}
                #writeDate{float: right;}
                #content{background-color: wheat; margin: auto; width: 95%; min-height: 300px;}
                section table{width: 100%;}
                section table,td{border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 10px;}
                section tr>td:last-child{background-color: white;}
                section tr:last-child>td:last-child{height: 250px;}
    
                footer{margin-top: 10px;}
                footer>ul{list-style: none;}
                footer>ul>li:first-child{margin-top: auto; margin-bottom: auto; font-size: 25px;}
                footer>ul>li:nth-child(2){margin-top: auto; margin-bottom: auto;}
                footer>ul>li:last-child{text-align: right;}
            </style>
    
            <script>
                $(document).ready(function(){
                    $('#target').load('http://developer3.dothome.co.kr/WebProject/bug.php');
                });
                function profile(){
                    window.open('http://developer3.dothome.co.kr/WebProject/profile.html', 'new_win', 'width=355, height=510, left='+(screen.availWidth/2-177)+', top='+(screen.availHeight/2-255)+', toolbars=no, menubars=no, scrollbars=no, resizable=no');
                }
            </script>
    
        </head>
        <body>
            <header class='container bg-dark'>
                <h1 class='text-light text-center'>TAK's app</h1>
                <img class='img-fluid mx-auto d-block' src='./image/android image.png' alt='android'>
                <nav class='navbar navbar-expand-sm navbar-dark justify-content-center'>
                    <button class='navbar-toggler' data-toggle='collapse' data-target='#navMenu'><span class='navbar-toggler-icon'></span></button>
                    <div class='collapse navbar-collapse' id='navMenu'>
                        <ul class='nav nav-tabs'>
                            <li class='nav-item col'><a href='http://developer3.dothome.co.kr/WebProject/introduce.html' class='nav-link'>앱 소개</a></li>
                            <li class='nav-item col'><a href='http://developer3.dothome.co.kr/WebProject/bug.html' class='nav-link active'>버그 신고</a></li>
                            <li class='nav-item col'><a href='http://developer3.dothome.co.kr/WebProject/suggest.html' class='nav-link'>건의 및 제안</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
    
            <section class='container'>
                <p>
                    <label id='title'><strong>$title</strong></label>
                    <label id='writeDate'>$writeDate</label>
                </p>
                <div id='content'>
                    <table>
                        <colgroup>
                            <col width='100'>
                            <col >
                        </colgroup>
                        <tr>
                            <td>기종</td>
                            <td>$type</td>
                        </tr>
                        <tr>
                            <td>발생시간</td>
                            <td>$occurDate</td>
                        </tr>
                        <tr>
                            <td>내용</td>
                            <td>$content</td>
                        </tr>
                    </table>
                </div>
            </section>
    
            <footer name='footer' class='container'>
                <ul class='row bg-dark text-light'>
                    <li class='col font-weight-bold'>Tak's app</li>
                    <li class='col'><a href='#footer' onclick='profile()'>개발자 정보</a></li>
                    <li class='col'><sub>Copyright 2019. hyungtak. all rights reserved.</sub></li>
                </ul>
            </footer>
        </body>
    </html>";
    echo "<br>";
    $sql="update bug set count='$count' where No='$No'";
    $result=mysqli_query($connect, $sql);
	
	mysqli_close($connect);

 ?>