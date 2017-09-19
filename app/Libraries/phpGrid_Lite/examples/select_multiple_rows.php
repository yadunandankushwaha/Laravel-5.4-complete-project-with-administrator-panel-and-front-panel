<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Multiple Rows</title>
<script type="text/javascript">
    function ShowSelectedRows(){
        var rows = getSelRows();
        alert(rows);
    }
</script>
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
$dg -> enable_edit("INLINE", "CRUD"); 

// read only columns, one or more columns delimited by comma
$dg -> set_col_readonly("orderDate, customerNumber"); 

// required fields
$dg -> set_col_required("orderNumber, customerNumber");

// multiple select
$dg -> set_multiselect(true);

$dg -> display();

?>
<input type="button" id="bSelRow" value="Get Selected Rows" onclick="ShowSelectedRows()">
</body>
</html>