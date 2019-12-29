<?php
	header('Content-Type:text/html; charset=utf-8');
	$connect=mysqli_connect("localhost", "developer3", "qwas2468!", "developer3");
	mysqli_query($connect, "set names utf8");
	$sql="select No, title, writeDate, count from bug order by No desc";
	$result=mysqli_query($connect, $sql);
	$rowCount=mysqli_num_rows($result);
    
	$table="<table border=\"1\" style='width:100%; text-align: center;'><colgroup><col width=\"80\"px><col><col width=\"100\"px><col width=\"80\"px></colgroup><tr><td>No</td><td>제목</td><td>작성시간</td><td>조회</td>";
	$firstLine="<tr>";

	for($i=0;$i<$rowCount;$i++){
	    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	    if($i==0){
	    	foreach ($row as $key => $value) {
                if($key=="title"){
                    $firstLine.="<td style='text-align:left;'><a href='http://developer3.dothome.co.kr/WebProject/bug2.html'>".$value."</a></td>";
                }else{
                    $firstLine.="<td>".$value."</td>";
                }
	    	}
	    	$table.="</tr>".$firstLine."</tr>";
	    }else{
	    	$table.="<tr>";
	    	foreach ($row as $key => $value) {
	    		if($key=="title"){
                    $table.="<td style='text-align:left;'><a href='http://developer3.dothome.co.kr/WebProject/bug2.php'>".$value."</a></td>";
                }else{
                    $table.="<td>".$value."</td>";
                }
	    	}
	    	$table.="</tr>";
	    }
	}
	$table.="</table>";
    echo $table;
    echo "<br>";
	
	mysqli_close($connect);

 ?>