<?php
//include('../../Glimpse/index.php');
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body>
<table>
<tr><td>
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->enable_edit();
$dg -> display();
?>
</td>
<td>
<?php
$dg2 = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg2->set_jq_gridName('order2');
$dg2->set_caption("order 2");
$dg2->enable_edit();
$dg2 -> display();
?>
</td></tr>
</table>



</body>
</html>