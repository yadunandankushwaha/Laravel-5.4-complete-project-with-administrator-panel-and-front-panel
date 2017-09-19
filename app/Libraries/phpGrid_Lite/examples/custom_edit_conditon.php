<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>phpGrid Custom Edit Condition withou using set_edit_condition</title>
</head>
<body>

<?php
// note this should not replace database role-based or user-based permissions.
$onGridLoadComplete = <<<ONGRIDLOADCOMPLETE
function(status, rowid)
{
    console.log(status);
    console.log(rowid);

    var ids = jQuery("#orders").jqGrid('getDataIDs');
    for (var i = 0; i < ids.length; i++)
    {
        var rowId = ids[i];
        var rowData = jQuery('#orders').jqGrid ('getRowData', rowId);

        console.log(rowData);
        console.log(rowId);

        if($("#orders").jqGrid("getCell", rowId, "status") == "Shipped"){
            $("#orders").jqGrid("setCell", rowId, "actions", " zzz ", {"display":"none"}); // not possible to set value for virtual column
        }
    }

}
ONGRIDLOADCOMPLETE;


$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->set_col_hidden('comments');

$dg->add_column("actions", array('name'=>'actions',
    'index'=>'actions',
    'width'=>'80',
    'formatter'=>'actions',
    'formatoptions'=>array('keys'=>true)),'Actions');
$dg->set_grid_property(array('onSelectRow'=>''));
$dg->add_event("jqGridLoadComplete", $onGridLoadComplete);
$dg->enable_edit('INLINE', 'CRUD');

$dg -> display();

?>

        </body>
    </html>
