<?php
	header('Content-Type:text/html; charset=utf-8');
	$connect=mysqli_connect("localhost", "developer3", "qwas2468!", "developer3");
	mysqli_query($connect, "set names utf8");
	$sql="select nickname, stage1, stage2, stage3, stage4, stage5, stage6, stage7, stage8, stage9, stage10, stage11, stage12, stage13, stage14, stage15, stage16, stage17, stage18, stage19, stage20, stage21, stage22, stage23, stage24, stage25, stage26, stage27, stage28, stage29, stage30, stage31, stage32, stage33, stage34, stage35, stage36, stage37, stage38, stage39, stage40, stage41, stage42, stage43, stage44, stage45, stage46, stage47, stage48, stage49, stage50, stage51 from MAZEescape";
	$result=mysqli_query($connect, $sql);
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