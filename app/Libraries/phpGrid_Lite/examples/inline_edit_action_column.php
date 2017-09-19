<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editable Datagrid - Inline Edit Action Column</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

// change column titles
$dg -> set_col_title("orderNumber", "Order No.");
$dg -> set_col_title("orderDate", "Order Date");
$dg -> set_col_title("shippedDate", "Shipped Date");
$dg -> set_col_title("customerNumber", "Customer No.");

$dg->set_col_hidden('comments');

// enable edit
$dg -> enable_edit("INLINE", "CRUD");

$dg->add_column("actions", array('name'=>'actions',
    'index'=>'actions',
    'width'=>'70',
    'formatter'=>'actions',
    'formatoptions'=>array('keys'=>true)),'Actions');
$dg -> display();
?>

</body>
</html>