<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Integrated Search</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

// change column titles
$dg -> set_col_title("orderNumber", "Order No.");
$dg -> set_col_title("orderDate", "Order Date");
$dg -> set_col_title("shippedDate", "Shipped Date");
$dg -> set_col_title("customerNumber",  "Customer No.");

// hide a column
$dg -> set_col_hidden("requiredDate");

// change default caption
$dg -> set_caption("Orders List");

// set export type
$dg -> enable_export('EXCEL');

// enable integrated search
$dg -> enable_search(true);

$dg->enable_edit('FORM', 'CRUD');
$dg->set_col_edittype('status', 'select', 'Open:Open;Shipped:Shipped;Cancelled:Cancelled;Disputed:Disputed;On Hold:On Hold');

$dg-> set_col_readonly("orderNumber"); 
$dg->enable_kb_nav(true);
$dg -> display();
?>

</body>
</html>