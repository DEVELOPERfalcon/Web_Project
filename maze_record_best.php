<?php
	header('Content-Type:text/html; charset=utf-8'); //한글 지원
	$connect=mysqli_connect("localhost", "developer3", "qwas2468!", "developer3");  //MySQL DB 접속(연결)
	mysqli_query($connect, "set names utf8");   //저장시 한글 깨짐 방지
    //SQL 쿼리문 작성
    $sql="select MIN(stage1) as stage1, MIN(stage2) as stage2, MIN(stage3) as stage3, MIN(stage4) as stage4, MIN(stage5) as stage5, MIN(stage6) as stage6, MIN(stage7) as stage7, MIN(stage8) as stage8, MIN(stage9) as stage9, MIN(stage10) as stage10, MIN(stage11) as stage11, MIN(stage12) as stage12, MIN(stage13) as stage13, MIN(stage14) as stage14, MIN(stage15) as stage15, MIN(stage16) as stage16, MIN(stage17) as stage17, MIN(stage18) as stage18, MIN(stage19) as stage19, MIN(stage20) as stage20, MIN(stage21) as stage21, MIN(stage22) as stage22, MIN(stage23) as stage23, MIN(stage24) as stage24, MIN(stage25) as stage25, MIN(stage26) as stage26, MIN(stage27) as stage27, MIN(stage28) as stage28, MIN(stage29) as stage29, MIN(stage30) as stage30, MIN(stage31) as stage31, MIN(stage32) as stage32, MIN(stage33) as stage33, MIN(stage34) as stage34, MIN(stage35) as stage35, MIN(stage36) as stage36, MIN(stage37) as stage37, MIN(stage38) as stage38, MIN(stage39) as stage39, MIN(stage40) as stage40, MIN(stage41) as stage41, MIN(stage42) as stage42, MIN(stage43) as stage43, MIN(stage44) as stage44, MIN(stage45) as stage45, MIN(stage46) as stage46, MIN(stage47) as stage47, MIN(stage48) as stage48, MIN(stage49) as stage49, MIN(stage50) as stage50, MIN(stage51) as stage51 from MAZEescape";
    $result=mysqli_query($connect, $sql);   //쿼리문 결과
	$rowCount=mysqli_num_rows($result);

	$table="<table border=\"1\"><tr>";
	$firstLine="<tr>";

	for($i=0;$i<$rowCount;$i++){
	    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	    if($i==0){
	    	foreach ($row as $key => $value) {
	    		$table.="<td>".$key."</td>";
	    		$firstLine.="<td>".$value."</td>";
	    	}
	    	$table.="</tr>".$firstLine."</tr>";
	    }else{
	    	$table.="<tr>";
	    	foreach ($row as $key => $value) {
	    		$table.="<td>".$value."</td>";
	    	}
	    	$table.="</tr>";
	    }
	}
	$table.="</table>";
    echo $table;
    echo "<br>";
	
	mysqli_close($connect);

 ?>