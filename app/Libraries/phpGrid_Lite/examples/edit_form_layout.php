<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpGrid Edit Form Layout</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders"); 

// change column titles
$dg -> set_col_title("orderNumber", "Order No.");
$dg -> set_col_title("orderDate", "Order Date");
$dg -> set_col_title("shippedDate", "Shipped Date");
$dg -> set_col_title("customerNumber", "Customer No.");

// hide a column
$dg -> set_col_hidden("requiredDate");

// enable edit
$dg -> enable_edit("FORM", "CRUD"); 

$dg -> set_col_property("orderNumber", array("formoptions"=>array("rowpos"=>1,"colpos"=>1)));
$dg -> set_col_property("orderDate", array("formoptions"=>array("rowpos"=>1,"colpos"=>2)));
$dg -> set_col_property("requiredDate", array("formoptions"=>array("rowpos"=>2,"colpos"=>1)));
$dg -> set_col_property("shippedDate", array("formoptions"=>array("rowpos"=>2,"colpos"=>2)));
$dg -> set_col_property("status", array("formoptions"=>array("rowpos"=>3,"colpos"=>1)));
$dg -> set_col_property("customerNumber", array("formoptions"=>array("rowpos"=>3,"colpos"=>2)));
$dg -> set_col_property("comments", array("formoptions"=>array("rowpos"=>4,"colpos"=>1)));

$dg->set_form_dimension(700, 300);

$dg -> display();
?>

</body>
</html>