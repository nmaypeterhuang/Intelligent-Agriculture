<?php
$link = mysqli_connect('localhost','root','angel30216','member');//連結伺服器&資料庫
mysqli_query($link,'set names utf8');//以utf8讀取資料，讓資料可以讀取中文
$data = mysqli_query($link,'select * from alarm')or die('123'); 
?>

<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>資料篩選</title>

<script language="JavaScript" type="text/javascript">
function TestF(i){
  var Row = i;
  var Col = 0;
  var Table = document.getElementById("myTable"); 
  var delindex = Table.rows[Row].cells[Col].firstChild.data;
  document.getElementById("testtxt").value = delindex;
  //alert(delindex);
}  

function submit_deletetime()
      {
        deletealarm.submit();					
      }
</script>

</head>

<table border='1' id="myTable">
   <tr>
    <td >id</td>
	 <td >week</td>
    <td >alarm</td>
	<td >delete</td>
  </tr>
  <?php
  for($i=1;$i<=mysqli_num_rows($data);$i++){
  $rs=mysqli_fetch_row($data);
  
?>
  <tr>
    <td><?php echo $rs[0]?></td>
	<td>
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
    </script>	</td>
    <td><?php echo $rs[2]?></td>
	<td><INPUT type="button" value="刪除" onclick="TestF(<?php echo $i?>);"></td>
  </tr>
  
  <?php
}
?>
</table>
<form name="deletealarm" id="deletealarm" action="deletetime.php" METHOD="POST">
              <input type="text" size="5" name="testtxt" id="testtxt">
			   <button id="btn" onclick="submit_deletetime()">按下以刪除</button>
   </form>
 
</body>
</html>