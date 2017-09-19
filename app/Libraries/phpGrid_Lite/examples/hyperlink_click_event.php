<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Click Event to Hyperlink</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("select * from products", "productCode", "products");
$dg -> set_col_title("productCode", "Product Code");
$dg -> set_col_title("productName", "Product Name");
$dg -> set_col_title("productLine", "Product Line");


$dg->set_col_format("productLine", "showlink", array("baseLinkUrl"=>"javascript:", 'target'=>'_self',
	"showAction"=>"myFunction(jQuery('#products'),'", 
	"addParam"=>"');"));                                                                                                                           

$dg->set_col_format("productName", "showlink", array("baseLinkUrl"=>"javascript:", 'target'=>'_self',	
	"showAction"=>"phpGridSiteAjaxSearch(jQuery('#products'),'", 
	"addParam"=>"');"));                                                                                                                           


$dg -> display();
?>

<script type="text/javascript">
myFunction = function (grid,param) {
    var ar = param.split('=');
    if (grid.length > 0 && ar.length === 2 && ar[0] === '?id') {
        var rowid = ar[1];
        var prodDesc = grid.getCell(rowid, 'productDescription');

		alert(prodDesc);
    }
};

phpGridSiteAjaxSearch = function (grid,param) {
    var ar = param.split('=');
    if (grid.length > 0 && ar.length === 2 && ar[0] === '?id') {
        var rowid = ar[1];
        var productName = grid.getCell(rowid, 'productName');

        jQuery.ajax({
            url: 'http://phpgrid.com',
            data: { s: productName },
            type: 'GET',
            dataType: 'text',
            success:function(data,status) {
				// your code goes here for a successul Ajax call .e.g open a new window
				alert(data);
            },
            error:function(data,status,err){
                alert(data + status);
            }
        });
    }
};
</script>

</body>
</html>
