<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Formatting</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("select * from products", "productCode", "productcode");
$dg -> set_col_title("productCode", "Product Code");
$dg -> set_col_title("productName", "Product Name");
$dg -> set_col_title("productLine", "Product Line");

// display static Url
$dg -> set_col_link("productUrl");                                             

// display dynamic url. e.g.http://www.example.com/?productCode=101&foo=bar
$dg -> set_col_dynalink("productCode", "http://www.example.com/", "productCode", '&foo=bar');                                                                   

// column format
$dg -> set_col_currency("buyPrice");
$dg -> set_col_format("quantityInStock", "integer", array("thousandsSeparator" => ",",
                                                          "defaultValue" => "0"));   
$dg -> set_col_format("MSRP", 'currency', array("prefix" => "$",
                                                "suffix" => '',
                                                "thousandsSeparator" => ",",
                                                "decimalSeparator" => ".",
                                                "decimalPlaces" => '2',
                                                "defaultValue" => '0.00'));

// the above line is equivalent to the following helper function                        
$dg -> set_col_currency("MSRP", "$", '', ",",".", "2", "0.00");    
                                                                                     
$dg -> display();
?>

</body>
</html>
