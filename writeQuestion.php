<?php
	header('Content-Type:text/html; charset=utf-8');
    $title=$_POST['title'];
    $content=$_POST['content'];
    $now = date("Y-m-d h:i:s");

	$connect=mysqli_connect("localhost", "developer3", "qwas2468!", "developer3");
	mysqli_query($connect, "set names utf8");
	$sql="insert into question(title, content, writeDate) value('$title', '$content', '$now')";
	$result=mysqli_query($connect, $sql);
	if($result) include './question.html';
	else echo "저장 실패하였습니다.";
	mysqli_close($connect);
?>