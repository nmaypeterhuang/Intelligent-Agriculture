<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /* 如果 cookie 中的 passed 變數不等於 TRUE，
     表示尚未登入網站，將使用者導向首頁 index.htm */
  if ($passed != "TRUE")
  {
    header("location:index.htm");
    exit();
  }
	
  /* 如果 cookie 中的 passed 變數等於 TRUE，
     表示已經登入網站，則取得使用者資料 */
  else
  {
    require_once("dbtools.inc.php");
	
    //取得 modify.php 網頁的表單資料
    $id = $_COOKIE["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $telephone = $_POST["telephone"];
    $cellphone = $_POST["cellphone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $url = $_POST["url"];
    $comment = $_POST["comment"];
		
    //建立資料連接
    $link = create_connection();
				
    //執行 UPDATE 陳述式來更新使用者資料
    $sql = "UPDATE users SET password = '$password', name = '$name', 
            sex = '$sex', year = $year, month = $month, day = $day, 
            telephone = '$telephone', cellphone = '$cellphone', 
            address = '$address', email = '$email', url = '$url', 
            comment = '$comment' WHERE id = $id";
    $result = execute_sql($link, "member", $sql);
		
    //關閉資料連接
    mysqli_close($link);
  }		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>修改資料</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
    
    <meta charset="utf-8" />
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

<body background="../image/5372533847_eb3cf5815e_m.jpg" onload="MM_preloadImages('../image/buttons/ss.PNG','../image/buttons/tt.PNG','../image/buttons/mm.PNG')">
<div align="center">
  <table width="1288" border="0" cellspacing="1" cellpadding="15">
    <tr>
      <td colspan="2" align="center"><p><img src="../image/1.png" width="1200" height="300" /></p>
      <p><img src="../image/root.png" width="1200" height="50" /></p></td>
    </tr>
    <tr>
      <td width="253" height="351" valign="top"><p><a href="../situation.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('s','','../image/buttons/ss.PNG',1)"><img src="../image/buttons/s.PNG" width="427" height="137" id="s" /></a></p>
      <p><a href="../settime.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('t','','../image/buttons/tt.PNG',1)"><img src="../image/buttons/t.PNG" width="428" height="137" id="t" /></a></p>
      <p><a href="../stream.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('v','','../image/buttons/vv.PNG',0)"><img src="../image/buttons/v.PNG" width="428" height="136" id="v" /></a></p>
      <p><a href="../hand.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('m','','../image/buttons/mm.PNG',1)"><img src="../image/buttons/m.PNG" width="427" height="136" id="m" /></a></p></td>
      <td width="972"><!-- InstanceBeginEditable name="EditRegion1" -->
    <center>
      <?php echo $name ?>，恭喜您已經修改資料成功了
  <meta http-equiv="refresh" content="3;index.htm" />
    </center>        
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