<?php
    $link = mysqli_connect('localhost','root','angel30216','member');//連結伺服器&資料庫
    mysqli_query($link,'set names utf8');//以utf8讀取資料，讓資料可以讀取中文
    $data = mysqli_query($link,'select * from alarm')or die('123'); 
	date_default_timezone_set('Asia/Taipei');
	
    $sql = "SELECT * FROM `alarm` ORDER BY `week`, `alarm`";
    $result = mysqli_query($link,$sql);
	$week = 6;//(int)date("w");
	$nowttimeh = (int)date("G");
	$nowttimem = (int)date("i");
	$nowttimes = (int)date("s");
	$nowttime = 3600*$nowttimeh + 60*$nowttimem + $nowttimes;
	//echo $nowttime;
	$flag = 0;
	
    while($rs = mysqli_fetch_row($result))
    {
		$sqlw = $rs[1];
		$strtotalsec = rtrim(rtrim($rs[2], '0'), '.');
		//echo $strtotalsec;
		$strtotalsech = (int)substr($strtotalsec, 0, -6);
		$strtotalsecm = (int)substr($strtotalsec, 3, -3);
		$strtotalsecs = (int)substr($strtotalsec, -2);
		$totalsec = 3600*$strtotalsech + 60*$strtotalsecm + $strtotalsecs;
		//echo $totalsec;
		if($sqlw == $week)
		{
			if ($totalsec >= $nowttime)
			{
				echo $strtotalsec;
				$flag = 1;
				break;
			}
		}
		else if($sqlw > $week)
		{
			echo $strtotalsec;
			$flag = 1;
			break;
		}
	}
	
	if ($flag == 0)
	{
		$sql = "SELECT * FROM `alarm` ORDER BY `week`, `alarm`";
		$result = mysqli_query($link,$sql);
		$rs = mysqli_fetch_row($result);
		echo rtrim(rtrim($rs[2], '0'), '.');
	}
?>