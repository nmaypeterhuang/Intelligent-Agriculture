<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE{"passed"};
	
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.htm
  if ($passed != "TRUE")
  {
    header("location:index.htm");
    exit();
  }
	
  //如果 cookie 中的 passed 變數等於 TRUE
  //表示已經登入網站，取得使用者資料	
  else
  {
    require_once("dbtools.inc.php");
		
    $id = $_COOKIE{"id"};
		
    //建立資料連接
    $link = create_connection();
				
    //執行 SELECT 陳述式取得使用者資料
    $sql = "SELECT * FROM users Where id = $id";
    $result = execute_sql($link, "member", $sql);
		
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>申請會員</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
    
    <meta charset="utf-8" />
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.password.value.length == 0)
        {
          alert("「使用者密碼」一定要填寫哦...");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("「使用者密碼」不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("「密碼確認」欄位忘了填哦...");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("您一定要留下真實姓名哦！");
          return false;
        }	
        if (document.myForm.year.value.length == 0)
        {
          alert("您忘了填「出生年」欄位了...");
          return false;
        }
        if (document.myForm.month.value.length == 0)
        {
          alert("您忘了填「出生月」欄位了...");
          return false;
        }	
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1)
        {
          alert("「出生月」應該介於 1-12 之間哦！");
          return false;
        }
        if (document.myForm.day.value.length == 0)
        {
          alert("您忘了填「出生日」欄位了...");
          return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29)
        {
          alert("二月只有 28 天，最多 29 天");
          return false;
        }	
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6
          | document.myForm.month.value == 9 | document.myForm.month.value == 11)
        {
          if (document.myForm.day.value > 30)
          {
            alert("4 月、6 月、9 月、11 月只有 30 天哦！");
            return false;					
          }
        }	
        else
        {
          if (document.myForm.day.value > 31)
          {
            alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
            return false;					
          }				
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1)
        {
          alert("出生日應該在 1-31 之間");
          return false;
        }	
        myForm.submit();					
      }
    </script>			
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
    <form action="update.php" method="post" name="myForm" id="myForm" >
      <table border="2" align="center" bordercolor="#6666FF">
        <tr> 
          <td colspan="2" bgcolor="#6666FF" align="center"> 
            <font color="#FFFFFF">請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*使用者帳號：</td>
          <td><?php echo $row{"account"} ?></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*使用者密碼：</td>
          <td> 
            <input type="password" name="password" size="15" value="<?php echo $row{"password"} ?>" />
            (請使用英文或數字鍵，勿使用特殊字元)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*密碼確認：</td>
          <td>
            <input type="password" name="re_password" size="15" value="<?php echo $row{"password"} ?>" />
            (再輸入一次密碼，並記下您的使用者名稱與密碼)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*姓名：</td>
          <td><input type="text" name="name" size="8" value="<?php echo $row{"name"} ?>" /></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*性別：</td>
          <td> 
            <input type="radio" name="sex" value="男" checked="checked" />男 
            <input type="radio" name="sex" value="女" />女
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*生日：</td>
          <td>民國 
            <input type="text" name="year" size="2" value="<?php echo $row{"year"} ?>" />年 
            <input type="text" name="month" size="2" value="<?php echo $row{"month"} ?>" />月 
            <input type="text" name="day" size="2" value="<?php echo $row{"day"} ?>" />日
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">電話：</td>
          <td> 
            <input type="text" name="telephone" size="20" value="<?php echo $row{"telephone"} ?>" />
            (依照 (02) 2311-3836 格式 or (04) 657-4587)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">行動電話：</td>
          <td> 
            <input type="text" name="cellphone" size="20" value="<?php echo $row{"cellphone"} ?>" />
            (依照 (0922) 302-228 格式)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">地址：</td>
          <td><input type="text" name="address" size="45" value="<?php echo $row{"address"} ?>" /></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">E-mail 帳號：</td>
          <td><input type="text" name="email" size="30" value="<?php echo $row{"email"} ?>" /></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">個人網站：</td>
          <td><input type="text" name="url" size="40" value="<?php echo $row{"url"} ?>" /></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">備註：</td>
          <td><textarea name="comment" rows="4" cols="45"><?php echo $row{"comment"} ?></textarea></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td colspan="2" align="center"> 
            <input type="button" value="修改資料" onclick="check_data()" />
            <input type="reset" value="重新填寫" />
          </td>
        </tr>
      </table>
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
<?php
    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
  }
?>