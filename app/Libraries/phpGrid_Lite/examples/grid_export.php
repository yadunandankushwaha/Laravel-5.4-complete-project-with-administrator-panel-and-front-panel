<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Datagrid Export</title>
</head>
<body> 

<?php
echo '<h2>PDF Export</h2>';

$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
// change column titles
$dg->set_col_title("orderNumber", "Order No.");
$dg->set_col_title("orderDate", "Order Date");
$dg->set_col_title("shippedDate", "Shipped Date");
$dg->set_col_title("customerNumber", "Customer No.");
// hide a column
$dg->set_col_hidden("requiredDate");
// change default caption
$dg->set_caption("Orders List");
// EXCEL export
$dg->enable_export('PDF');
$dg->display();


echo '<h2>EXCEL Export</h2>';

$dg2 = new C_DataGrid("select * from customers", "customerNumber", "Customers");
// PDF export
$dg2->enable_export('EXCEL');
$dg2->display();


echo '<h2>Export Dropdown (PDF, EXCEL, HTML, CSV)</h2>';

$dg3 = new C_DataGrid("SELECT * FROM products", "productCode", "products");

$exportDropdown =<<< EXPORTDROPDOWN
$('#products_pager1_left').append ('<div style=padding-right: 16px;>Export:\
    <select onchange=document.location.href=this.options[this.selectedIndex].value;>\
        <option>---</option>\
        <option value=/phpGridx/export.php?gn=products&export_type=excel>Excel</option>\
        <option value=/phpGridx/export.php?gn=products&export_type=pdf>PDF</option>\
        <option value=/phpGridx/export.php?gn=products&export_type=html>HTML</option>\
        <option value=/phpGridx/export.php?gn=products&export_type=csv>CSV</option>\
    </select></div>');
EXPORTDROPDOWN;

$dg3->before_script_end = $exportDropdown;
$dg3->display();
?>
<script>
</script>
</body>
</html>