<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display Static Hyperlink</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("select * from products", "productCode", "productcode");
$dg -> set_col_title("productCode", "Product Code");
$dg -> set_col_title("productName", "Product Name");
$dg -> set_col_title("productLine", "Product Line");

// display static Url
$dg -> set_col_link("productUrl");                                             
                                                                                     
$dg -> display();
?>

</body>
</html>
