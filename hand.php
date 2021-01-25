<?php
$link = mysqli_connect('localhost','root','angel30216','member');//連結伺服器&資料庫
mysqli_query($link,'set names utf8');//以utf8讀取資料，讓資料可以讀取中文
$data = mysqli_query($link,'select * from manually')or die('123'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
  <link rel=stylesheet type="text/css" href="mycss.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>手動澆水</title>
  <!-- webduino -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://webduino.io/components/webduino-js/dist/webduino-all.min.js"></script>
  <script src="https://blockly.webduino.io/webduino-blockly.js"></script>
  <script src="https://blockly.webduino.io/lib/firebase.js"></script>
  <script src="https://blockly.webduino.io/lib/runtime.min.js"></script>
   <script type="text/javascript">
      function submit_data()
      {
        sendmautime.submit();					
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

<body background="image/5372533847_eb3cf5815e_m.jpg" onload="MM_preloadImages('image/buttons/ss.PNG','image/buttons/tt.PNG','image/buttons/mm.PNG','image/buttons/s6.PNG')">
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
         <span class="mycss" id="showIfmanully">(手動澆水)</span>
  <form name="sendmautime" id="sendmautime" action="weblogin/sendmautime.php" METHOD="POST">
    <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','image/buttons/s6.PNG',1)"><img src="image/buttons/s5.PNG" width="226" height="100" onclick="submit_data()" id="Image17" /></a><br>
  </form>
  <span id="showNowtime" style=" display:none">(現在時間)</span>
  <span id="showAirhumidity" style="display:none">(空氣溫溼度)</span>
  
  <span id="showSoilhumidity" style="display:none">(土壤濕度)</span>
  
  <span id="showIfsoil" style="display:none">(自動澆水)</span>
  
 
  
  <span class="mycss" id="showIfschedule" style="display:none">(定時澆水)</span>
  
  <span class="mycss" id="showIfalarm" style="display:none">(排程澆水)</span> <br>
<form name="wateringschedule" id="wateringschedule" action="weblogin/b1.php" METHOD="POST">
    <span id="showAlarmtime" name="showAlarmtime" style="display:none">(排程時間)</span>
    </p>
	</form>
	
  <table border="1" cellpadding="2" style="border:3px #64A600 dashed;">
   <tr>
    <td class="mycss" >編號</td>
    <td ><span class="mycss">手動澆水時間</span></td>
    <td ><span class="mycss">日期</span></td>
  </tr>
  <?php
        $sql = "SELECT * FROM manually";
        $result = mysqli_query($link,$sql);
        while($rs = mysqli_fetch_row($result))
        {
?>
  <tr>
    <td><span class="mycss"><?php echo $rs[0]?></span></td>
    <td><span class="mycss"><?php echo rtrim(rtrim($rs[1], '0'), '.');?></span></td>
    <td><span class="mycss"><?php echo $rs[2]?></span></td>
  </tr>
  
  <?php
}
?>
</table>
    
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form style="display:none" name="wateringschedule" id="wateringschedule" action="main.html" METHOD="POST">
    <input type="hidden" size="5" name="alarmtime" id="alarmtime" readonly>
     <br>
  <input type ="button" onclick="window.open('child.htm','CHILD',config='height=450,width=450,toolbar=no');" value="選擇時間" style="display:none"></input>
  <input type ="button" id="setScheduletime" value="確認排程時間" style="display:none"></input>
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
