<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpGrid Virtual Column (Calculated Column)</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");$dg->enable_edit('INLINE');

// creating a virtual column
$col_formatter = <<<COLFORMATTER
function(cellvalue, options, rowObject){
	var n1 = parseInt(rowObject[0],10), 
		n2 = parseInt(rowObject[6],10);
	return n1+n2;
}
COLFORMATTER;

$dg->add_column('total', array('name'=>'total', 'index'=>'total', 'width'=>'360', 'align'=>'right', 
	'formatter'=>$col_formatter), 
		'Total (Virtual)');
$dg->display();
?>

Virtual Column
<ul>
<li>The col_name cannot contain space and must begin with a letter
<li>Use "formatter" column property to hook up javascript function
<li>The virtual column always adds to the end of the grid in the order of virtual column is created.
<li>Text must be surrounded with single quote
<li>Virtual column is not sortable.
</ul>