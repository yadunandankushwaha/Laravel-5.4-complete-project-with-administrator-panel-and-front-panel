<?php
//include('../../Glimpse/index.php');
require_once("../../Libraries/phpGrid_Lite/conf.php");      
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body> 
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

$onSelectRow = <<<ONSELECTROW
function(status, rowid)
{
	alert('event 1');
	console.log(rowid);
	console.log(status);
}
ONSELECTROW;

$onSelectRow2 = <<<ONSELECTROW2
function(status, rowid)
{
	alert('event 2');
	console.log("here");
}
ONSELECTROW2;

$rowattr = <<<ROWATTR
function (rowData, inputRowData) 
{
	return rowData.status === "OnHold" ? {style: "background-color:blue"} : {};
}
ROWATTR;

// post data another page after submit
$afterSubmit = <<<AFTERSUBMIT
function (event, status, postData)
{
	console.log(postData);
    alert('going to post customerNumber ' + postData.customerNumber + ' to another page through AJAX call');
    $.ajax({ url: '/my/site',
        data: {custNum: postData.customerNumber}, // replace customerNumber with your own field name
        type: 'post',
        success: function(output) {
                    alert(output);
                }
        });
}
AFTERSUBMIT;

$dg->add_event("jqGridSelectRow", $onSelectRow);
$dg->add_event("jqGridSelectRow", $onSelectRow2);
$dg->add_event("jqGridrowattr", $rowattr);
$dg->add_event("jqGridAddEditAfterSubmit", $afterSubmit);
$dg->enable_edit('FORM');
$dg -> display();
?>

</body>
</html>