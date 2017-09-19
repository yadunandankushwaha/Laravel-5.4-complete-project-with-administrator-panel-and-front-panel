<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auto-resize PHP Datagrid Like Excel Spreadsheet</title>
</head>
<body>


<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->enable_autowidth(true)->enable_autoheight(true);
$dg->set_pagesize(100); // need to be a large number
$dg->set_scroll(true);
$dg->enable_kb_nav(true);
//$dg->set_col_hidden('comments');
//$dg->enable_edit('INLINE', 'CRUD');
$dg -> display();
?>
<style>
    /* optional. removes page margin */
    body{margin:0px;}
    /* optional. widen textbox width */
    .ui-jqgrid-bdiv input{width:100%;}
</style>

</body>
</html>