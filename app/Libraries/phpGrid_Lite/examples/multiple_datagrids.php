<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiple Datagrids</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", 'orders');
$dg->enable_edit("FORM", "CRUD"); 
$dg->display();

$dg2 = new C_DataGrid("select * from employees", "employeeNumber", "employees");
$dg2->enable_edit("FORM", "CRUD"); 
$dg2->display();

$dg3 = new C_DataGrid("select * from offices", "officeCode", "offices");
$dg3->enable_edit("FORM", "CRUD"); 
$dg3->display();

$dg4 = new C_DataGrid("select * from productlines", "productLine", "productlines");
$dg4->enable_edit("FORM", "CRUD"); 
$dg4->display();

$dg5 = new C_DataGrid("select * from customers", "customerNumber", "customers");
$dg5->enable_edit("FORM", "CRUD"); 
$dg5->display();
?>

</body>
</html>