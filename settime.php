<?php
    $link = mysqli_connect('localhost','root','angel30216','member');//連結伺服器&資料庫
    mysqli_query($link,'set names utf8');//以utf8讀取資料，讓資料可以讀取中文
    $data = mysqli_query($link,'select * from alarm')or die('123'); 
	date_default_timezone_set('Asia/Taipei');
	
	$sql = "SELECT * FROM `alarm` ORDER BY `week`, `alarm`";
    $result = mysqli_query($link,$sql);
	$week = (int)date("w");
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
				//echo $strtotalsec;
				$flag = 1;
				break;
			}
		}
		else if($sqlw > $week)
		{
			//echo $strtotalsec;
			$flag = 1;
			break;
		}
	}
	
	if ($flag == 0)
	{
		$sql = "SELECT * FROM `alarm` ORDER BY `week`, `alarm`";
		$result = mysqli_query($link,$sql);
		$rs = mysqli_fetch_row($result);
		$strtotalsec = rtrim(rtrim($rs[2], '0'), '.');
		//echo $strtotalsec;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
  <link rel=stylesheet type="text/css" href="mycss.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>專題</title>
  <!-- webduino -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://webduino.io/components/webduino-js/dist/webduino-all.min.js"></script>
  <script src="https://blockly.webduino.io/webduino-blockly.js"></script>
  <script src="https://blockly.webduino.io/lib/firebase.js"></script>
  <script src="https://blockly.webduino.io/lib/runtime.min.js"></script>
  <script type="text/javascript">
  function TestF(i){     //取得該列的id
  //var Row = i;
  //var Col = 0;
  var Table = document.getElementById("myTable"); 
  //var delindex = Table.rows[Row].cells[Col].firstChild.data;
  document.getElementById("testtxt").value = i;
  }  
  
  function refreshalarm()
  {
	var nalarmweek = "<?php echo $sqlw;?>";
	var nalarmtime = "<?php echo $strtotalsec;?>";
	document.getElementById("newalarmweek").value = nalarmweek;
	document.getElementById("newalarmtime").value = nalarmtime;
  }

      function submit_deletetime() //跳轉到刪除成功頁面
      {
        deletealarm.submit();					
      }
	  
      function submit_data() //跳轉到新增成功頁面
      {
		alarm = sethr + ":" + setmin + ":" + setsec;
		document.wateringschedule.alarmweek.value = setwk ;
		document.wateringschedule.alarmtime.value = alarm ;
		refreshalarm();
        wateringschedule.submit();
      }
	  
	  function myrefresh()
	  {
		  //if (($totalsec >= $nowttime+10) || ($totalsec < $nowttime))
		  refreshalarm();
	      setInterval('myrefresh()',300000); //指定300秒刷新一次
	  }
	  setInterval('myrefresh()',300000); //指定300秒刷新一次
	  
	  function myrefresh2()
	  {
		  alarm = document.getElementById("newalarmtime").value;
		  document.getElementById("showAlarmtime").innerHTML = ['排程時間:', alarm].join('');
		  setInterval('myrefresh2()',250); //指定0.25秒刷新一次
	  }
	  setInterval('myrefresh2()',1000); //指定1秒刷新一次
	  
	  function tab()
	  {
		  document.getElementById('Image10').style.display='';
		  document.getElementById('chdt').style.display='';
	  }
	  
	    var setwk = 0, sethr = 0, setmin = 0, setsec = 0;
		function setw (menu) {
			if (menu.selectedIndex > 0)
				setwk = menu.options[menu.selectedIndex].value;
		}
		function seth (menu) {
			if (menu.selectedIndex > 0)
				sethr = menu.options[menu.selectedIndex].value;
		}
		function setm (menu) {
			if (menu.selectedIndex > 0)
				setmin = menu.options[menu.selectedIndex].value;
		}
		function sets (menu) {
			if (menu.selectedIndex > 0)
				setsec = menu.options[menu.selectedIndex].value;
		}
    </script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body background="image/5372533847_eb3cf5815e_m.jpg" onload="MM_preloadImages('image/buttons/ss.PNG','image/buttons/tt.PNG','image/buttons/mm.PNG')">
<div align="center">
  <table width="1288" border="0" cellspacing="1" cellpadding="15">
    <tr>
      <td colspan="2" align="center"><p><img src="image/1.png" width="1200" height="300" /></p>
      <p><img src="image/root.png" width="1200" height="50" /></p></td>
    </tr>
    <tr>
      <td width="253" height="351" valign="top"><p><a href="situation.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('s','','image/buttons/ss.PNG',1)"><img src="image/buttons/s.PNG" width="427" height="137" id="s" /></a></p>
      <p><a href="settime.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('t','','image/buttons/tt.PNG',1)"><img src="image/buttons/t.PNG" width="428" height="137" id="t" /></a></p>
      <p><a href="stream.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('v','','image/buttons/vv.PNG',0)"><img src="image/buttons/v.PNG" width="428" height="136" id="v" /></a></p>
      <p><a href="hand.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('m','','image/buttons/mm.PNG',1)"><img src="image/buttons/m.PNG" width="427" height="136" id="m" /></a></p></td>
      <td width="972"><!-- InstanceBeginEditable name="EditRegion1" -->
      <SCRIPT language=JavaScript src="w.js"></SCRIPT>
  <button id="btnWatering" class="db5" style="display:none">澆水按鈕</button>
  <br>
  <span class="mycss" id="showNowtime" style="display:none">(現在時間)</span>
  <span class="mycss"><br>
  <span id="showAirhumidity" style="display:none">(空氣溫溼度)</span></span>
  <span class="mycss" id="showSoilhumidity" style="display:none">(土壤濕度)</span>
  <span class="mycss" id="showIfsoil" style="display:none">(自動澆水)</span>
  <span class="mycss" id="showIfmanully" style="display:none">(手動澆水)</span>
  <span class="mycss" id="showIfschedule" style="display:none">(定時澆水)</span>
  <span class="mycss" id="showIfalarm">(排程澆水)</span>
  <span class="mycss"><br>
  <span class="mycss" id="showAlarmtime" name="showAlarmtime">(排程時間)</span><br>
  
    <form name="wateringschedule" id="wateringschedule" action="weblogin/b1.php" METHOD="POST">
	 <p><div id="calltab" onmousedown="tab()"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','image/buttons/s011.PNG',1)"><img src="image/buttons/s01.PNG" width="226" height="99" id="Image9" /></a></div>
	 <span class="mycss">
	 </p>
     </span>
	 <p>
	   <span class="mycss">
	     <input type="text" size="5" name="alarmweek" id="alarmweek" readonly style="display:none">
	     <input type="text" size="5" name="alarmtime" id="alarmtime" readonly style="display:none">
	     <input type="text" size="5" name="newalarmweek" id="newalarmweek" readonly style="display:none">
	     <input type="text" size="5" name="newalarmtime" id="newalarmtime" value="<?php echo $strtotalsec;?>" readonly style="display:none">
	     </span></p>
     <span class="mycss">
     <input type="hidden" size="5" name="alarmtime" id="alarmtime" readonly>
     <br>
  <input type ="button" onclick="window.open('child.htm','CHILD',config='height=450,width=450,toolbar=no');" value="選擇時間" style="display:none"></input>
  <input type ="button" id="setScheduletime" value="確認排程時間" style="display:none"></input>
  
     </span>
     <p>
	    <div id = "chdt" style="display:none">
		星期
	    <select name="wateringw" onchange="setw(this);">
		<option value="0">日</option><option value="1">一</option><option value="2">二</option><option value="3">三</option><option value="4">四</option><option value="5">五</option><option value="6">六</option>
		</select>
		<br>
		<br>
		開始時間：
		<select name="wateringh" onchange="seth(this);">
		<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
		</select>
		: 
		<select name="wateringm" onchange="setm(this);">
		<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
		</select>
		: 
		<select name="waterings" onchange="sets(this);">
		<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
		</select>
		</div>
		<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','image/buttons/s022.PNG',1)"><img src="image/buttons/s02.PNG" width="226" height="98" id="Image10" onclick="submit_data()" style="display:none"/></a>
	</p>
    </form>
   
 <table border="1" cellpadding="3" id="myTable" style="border:3px #64A600 dashed;">
   <tr>
    <td class="mycss" >編號</td>
	<td class="mycss" >星期</td>
    <td class="mycss" >排程時間</td>
	<td class="mycss" >刪除</td>
  </tr>
  <?php
        $sql = "SELECT * FROM `alarm` ORDER BY `week`, `alarm`";
        $result = mysqli_query($link,$sql);
        while($rs = mysqli_fetch_row($result))
        {
?>
  <tr>
    <td class="mycss"><?php echo $rs[0]?></td>
	<td>
      <span class="mycss">
      <script type="text/javascript">
      var value = "<?php echo $rs[1]?>";
      switch (value)
	  {
	    case '0':
		       document.write("Sunday");
			   break;
	    case '1':
		       document.write("Monday");
			   break;
	    case '2':
		       document.write("Tuesday");
			   break;
	    case '3':
		       document.write("Wednesday");
			   break;
	    case '4':
		       document.write("Thursday");
			   break;
	    case '5':
		       document.write("Friday");
			   break;
	    case '6':
		       document.write("Saturday");
			   break;
	  }
      </script>
      </span></td>
    <td class="mycss"><?php echo rtrim(rtrim($rs[2], '0'), '.');?></td>
	<td class="mycss"><img src="image/buttons/d3.PNG" width="79" height="45" onclick="TestF(<?php echo $rs[0]?>);" /></td>
  </tr>
  
  <?php
}
?>
</table>
 <form name="deletealarm" id="deletealarm" action="weblogin/deletetime.php" METHOD="POST">
   <span class="mycss">
	          確定要刪除第
              <input type="text" size="5" name="testtxt" id="testtxt">
			  筆排程?<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image16','','image/buttons/d5.PNG',1)"><img src="image/buttons/d4.PNG" width="167" height="45" id="Image16" onclick="submit_deletetime()" /></a>
		 
               
   </span>
 </form>
  
      <!-- InstanceEndEditable --></td>
    </tr>
    <tr>
      <td height="138" colspan="2"><div align="center">
         <p align="center">
      <a href="weblogin/modify.php">修改會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="weblogin/logout.php">登出網站</a>
    </p>
        <p>Copyright© 2016 NTUE
        </p>
        <p>資訊科學系 智慧農莊研發團隊</p>
      </div></td>
    </tr>
  </table>
</div>
<div align="center"></div>
<div align="center"></div>
<p align="center">&nbsp;</p>
</body>
<!-- InstanceEnd --></html>
