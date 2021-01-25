<?php
  require_once("dbtools.inc.php");
  
  //取得表單資料
  $account = $_POST["account"];
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
			
  //檢查帳號是否有人申請
  $sql = "SELECT * FROM users Where account = '$account'";
  $result = execute_sql($link, "member", $sql);

  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
		
    //顯示訊息要求使用者更換帳號名稱
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號沒人使用
  else
  {
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //執行 SQL 命令，新增此帳號
    $sql = "INSERT INTO users (account, password, name, sex, 
            year, month, day, telephone, cellphone, address,
            email, url, comment) VALUES ('$account', '$password', 
            '$name', '$sex', $year, $month, $day, '$telephone', 
            '$cellphone', '$address', '$email', '$url', '$comment')";

    $result = execute_sql($link, "member", $sql);
  }
	
  //關閉資料連接	
  mysqli_close($link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>新增會員成功</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
    <meta charset="utf-8" />
    
  <!-- InstanceEndEditable -->
</head>

<body background="../image/5372533847_eb3cf5815e_m.jpg">
<div align="center">
  <table width="1288" border="0" cellspacing="1" cellpadding="15">
    <tr>
      <td colspan="2" align="center"><p><img src="../image/1.png" width="1200" height="300" /></p>
      <p><img src="../image/root.png" width="1200" height="50" /></p></td>
    </tr>
    <tr>
      <td width="253" height="351"><p><img src="../image/buttons/s.PNG" width="427" height="137" /></p>
        <p><img src="../image/buttons/t.PNG" width="428" height="137" /></p>
        <p><img src="../image/buttons/v.PNG" width="428" height="136" /></p>
      <p><img src="../image/buttons/m.PNG" width="427" height="136" /></p></td>
      <td width="972"><!-- InstanceBeginEditable name="EditRegion1" -->
  <p align="center">恭喜您已經註冊成功了，您的資料如下：（請勿按重新整理鈕）<br />
      帳號：<font color="#FF0000"><?php echo $account ?></font><br />
      密碼：<font color="#FF0000"><?php echo $password ?></font><br />       
      請記下您的帳號及密碼，然後<a href="index.htm">登入網站</a>。    </p>
  <!-- InstanceEndEditable --></td>
    </tr>
    <tr>
      <td height="138" colspan="2"><div align="center">Copyright© 2016 NTUE
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