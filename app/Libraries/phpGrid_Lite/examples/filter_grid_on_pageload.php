<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test</title>
</head>
<body>
<h1>Filter Datagrid on Page Load</h1>
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

// enable integrated search
$dg -> enable_search(true);

// use postData to filter grid during page load.
// Note that the filters must be passed as string to data.php via POST, so not possible to use set_grid_property function
$dg->cust_prop_jsonstr = 'postData: {filters:
                            \'{"groupOp":"AND","rules":[{"field":"status","op":"eq","data":"Shipped"}]}\'},';
$dg->set_grid_property(array('search'=>true));
$dg -> display();
?>

</body>
</html>
