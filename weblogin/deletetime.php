<?php
  require_once("dbtools.inc.php");
  
  //取得表單資料
  $id = $_POST["testtxt"];
  
  //建立資料連接
  $link = create_connection();
			
  
    //執行 SQL 命令，新增此帳號
    $sql = "DELETE FROM alarm Where id = $id";

    $result = execute_sql($link, "member", $sql);
  
	
  //關閉資料連接	
  mysqli_close($link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>刪除排程...</title>
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
  <p align="center">刪除完成 ! </p>
    <p align="center">(3秒後自動跳轉...)</p>
  <meta http-equiv="refresh" content="3;../settime.php" />
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