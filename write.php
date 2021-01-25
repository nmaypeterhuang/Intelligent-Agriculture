<?php
header("Content-Type:text/html; charset=utf-8");
$alarm=$_POST["alarmtime"];
$link=mysql_connect("localhost","root","angel30216") or die("連接失敗");
mysql_select_db("alarm");
mysql_query("SET NAMES utf8");
$sqlStr="insert into tb1 (alarm) ";
$sqlStr.="values('$alarm')";
echo $sqlStr."<br>";
mysql_query($sqlStr) or die("寫入失敗");
echo "資料寫入成功";
?>