<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HTML Edit Controls</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("select * from employees", "employeeNumber", "employees");
$dg -> set_col_title("employeeNumber", "Emp No.");
$dg -> set_col_title("lastName", "Last Name");
$dg -> set_col_title("firstName", "First Name");
$dg -> set_col_title("isActive", "Active?");
$dg -> set_col_format("email", "email");
$dg -> set_col_format("isActive", "checkbox");
$dg -> enable_edit("FORM", "CRUD");
$dg -> set_row_color("","");
$dg -> set_col_hidden('employeeNumber',true);

$dg -> set_col_edittype("isActive", "checkbox","1:0");
$dg -> set_col_edittype("reportsTo", "select", "Select employeeNumber, concat(firstName, ' ', lastName) from employees",false);
$dg -> set_col_edittype("officeCode", "autocomplete", "Select officeCode,city from offices",false);
// - or -
//$dg -> set_col_edittype("officeCode", "autocomplete", "1:San Francisco;2:Boston;3:NYC;4:Paris;5:Tokyo;6:Sydney;7:London");

$dg->enable_search(true);

$dg -> display();
?>

</body>
</html>