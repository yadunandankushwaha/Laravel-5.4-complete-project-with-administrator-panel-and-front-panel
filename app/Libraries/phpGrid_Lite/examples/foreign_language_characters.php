<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data grid Foreign Lanugage Display</title>
</head>
<body> 

<?php
//set database name parameter
$dg1 = new C_DataGrid("SELECT * FROM names", "id", "names");

$dg1->enable_edit("INLINE","CRUD"); 
$dg1 -> display();
?>

</body>
</html>