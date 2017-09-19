<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpGrid Custom Validation (via Javascript)</title>
</head>
<body> 
<script lang="javascript">
// validation (FORM and INLINE)
function price_validation1(value, colname) {
	if(value < 0){
	   return [false,colname + " must be zero a positive integer."];
	}
    return [true, ""];
}

// validation (INLINE only)
function price_validation2(value, colname) {
    var rowId = jQuery("#products").jqGrid('getGridParam','selrow');
    if(parseFloat(jQuery('#' + rowId + '_' + 'buyPrice').val()) >  parseFloat(jQuery('#' + rowId + '_' + 'MSRP').val()))
        return [false,"buyPrice must be equal or less than MSRP."];
    else
        return [true,""];
}

// validation (FORM only)
function price_validation3(value, colname) {
    if(parseFloat(jQuery('#buyPrice').val()) >  parseFloat(jQuery('#MSRP').val()))
        return [false,"buyPrice must be equal or less than MSRP."];
    else
        return [true,""];
}

</script>
<?php
$dg = new C_DataGrid("SELECT * FROM products", "productCode", "products");
$dg->enable_edit('FORM');
$dg->set_col_customrule('quantityInStock', 'price_validation1');
$dg->set_col_customrule('buyPrice', 'price_validation3');
$dg->display();
?>