<?php
require_once("../../Libraries/phpGrid_Lite/conf.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test</title>
    <style type="text/css">
        .altrowClass { background-color: gray; background-image: none }
    </style>
</head>
<body>

<?php

/*
$dg = new C_DataGrid("select * from employees", array("employeeNumber"), "employees");
$dg -> enable_edit("INLINE", "CRUD");
$dg -> set_col_hidden('employeeNumber',true)->enable_rownumbers(true);

$dg -> set_col_edittype("isActive", "checkbox","1:0");
//$dg -> set_col_edittype("officeCode", "select", "1:San Francisco;2:Boston;3:NYC;4:Paris;5:Tokyo;6:Sydney;7:London");
$dg -> set_col_edittype("officeCode", "select", "Select officeCode,city from offices",false);

$dg->enable_search(true);

$dg -> enable_edit("INLINE", "CRUD");
$dg -> set_col_hidden('employeeNumber',true)->enable_rownumbers(true);

$dg -> set_col_edittype("isActive", "checkbox","1:0");
//$dg -> set_col_edittype("officeCode", "select", "1:San Francisco;2:Boston;3:NYC;4:Paris;5:Tokyo;6:Sydney;7:London");
$dg -> set_col_edittype("officeCode", "select", "Select officeCode,city from offices",false);

$dg->enable_search(true);

$dg->set_grid_property(array("altclass" => "altrowClass"));
//$dg->add_event("jqGridLoadComplete", 'function() {$("tr.jqgrow:odd").css("background", "#DDDDDC").css("background-image", "none");}');

$dg -> display();
*/
/*
$dg = new C_DataGrid("SELECT * FROM orders", array("orderNumber", "customerNumber"), "orders");

// second grid as detail grid. Notice it is just another regular phpGrid with properites.
$sdg = new C_DataGrid("SELECT orderNumber,productCode,quantityOrdered,priceEach FROM orderdetails", "productCode", "orderdetails");

// enable CRUD for detail grid
$sdg->enable_edit("INLINE", "CRUD");

$dg->set_masterdetail($sdg, 'orderNumber');

$dg->display();

*/




/*

$dg = new C_DataGrid("SELECT * FROM Produkter", "PID", "Produkter");

// Tema
$dg -> set_theme("smoothness");

// Titler på kolonner
$dg -> set_col_title("ProduktNavn", "Produktnavn");
$dg -> set_col_title("RunningMonths", "Md.");
$dg -> set_col_title("Price", "Pris");
$dg -> set_col_title("HTML", "HTML/Banner");
$dg -> set_col_title("AktivForAlle", "Åbn");
$dg -> set_col_title("KuponKode", "Kuponkode");

$dg -> set_col_width("ProduktNavn", 500);
$dg -> set_col_width("RunningMonths", 50);
$dg -> set_col_width("AktivForAlle", 50);



$dg -> set_col_required("ProduktNavn, RunningMonths, Price");


// Sorter efter: DESC / ASC
$dg -> set_sortname('Sortering', 'ASC');

// hide a column
//$dg -> set_col_hidden("PID", false);

// Sæt en kolonne som typen: Currency (col_name, prefix, suffix, tusindeseperator, decimalseperator,antaldecimaler,defaultvalue)
$dg -> set_col_currency("Price", "", " DKK", ".", ",", 2, "0,00");


// Load mere data ved scroll
$dg -> set_scroll(true);

$dg->set_conditional_value("AktivForAlle", "==0", array(
    "TCellValue"=>"<img src='images/1371499783_bullet_red.png' />",
    "FCellValue"=>"<img src='images/1371499812_bullet_green.png' />"));
*/

/*
// Condition Farver
// http://phpgrid.com/documentation/set_conditional_format/
$dg->set_conditional_format("AktivForAlle","ROW",array(    "condition"=>"eq","value"=>"0","css"=> array("color"=>"black","background-color"=>"#d8b90e")));

// Overskrift på siden
$dg -> set_caption("Video undervisning i phpgrid.com / Demo Video 1");

// display dynamic url. e.g.http://www.example.com/?productCode=101&foo=bar
// I dette tilfælde KuponKode
$dg -> set_col_dynalink("KuponKode", "http://demodemo.danielbahl.dk/sendmail.php", array("KuponKode","PID"), '&ref=Int','_blank');

// set export type

$dg -> set_col_edittype("AktivForAlle", "checkbox","1:0");
$dg -> set_col_edittype("officeCode", "select", "1:San Francisco;2:Boston;3:NYC;4:Paris;5:Tokyo;6:Sydney;7:London");

$dg -> enable_export('EXCEL');

// set height and weight of datagrid
$dg -> set_dimension(1167, 300);

// Dimensioner for edit popup vindue
$dg -> set_form_dimension(450, 400);

// Aktiver søgefunktioner

$dg -> enable_search(true);



$dg -> enable_edit("FORM", "CRUD");
//$dg->cust_prop_jsonstr = 'toppager:true,';

//$dg->before_script_end = '$("#list").jqGrid("navGrid", "#pager", {cloneToTop: true});';
$dg -> display();



*/











?>

<!-- h2>Loading from Amazon RDS MSSQL instance</h2> -->

<?php
// MSSQL Experiment
//$connect = mssql_connect(PHPGRID_DB_HOSTNAME, PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD); // working

// putenv("FREETDSCONF=/usr/local/Cellar/freetds/0.91/etc/freetds.conf");
//putenv("ODBCINSTINI=/usr/local/Cellar/unixodbc/2.3.1/etc/odbcinst.ini");
//putenv("ODBCINI=/usr/local/Cellar/unixodbc/2.3.1/etc/odbc.ini"); //odbc.ini contains your DSNs.

// $connect = odbc_connect('phpgridmssql', PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD);

/*
$dsn="phpgridmssql";
$user=PHPGRID_DB_USERNAME;
$password=PHPGRID_DB_PASSWORD;


$sql="SELECT * FROM names";

// directly execute mode
if ($conn_id=odbc_connect($dsn,$user,$password)) {
    echo "connected to DSN: $dsn";
    if($result=odbc_do($conn_id, $sql)) {
        echo "executing '$sql'";
        echo "Results: ";
        odbc_result_all($result);
        echo "freeing result";
        odbc_free_result($result);
    }else{
        echo "can not execute '$sql' ";
    }
    echo "closing connection $conn_id";
    odbc_close($conn_id);
}
else{
    echo "can not connect to DSN: $dsn ";
}
*/


//$dg = new C_DataGrid("SELECT * FROM names", "id", 'names');
//$dg->enable_edit("FORM", "CRUD");
//$dg->display();


// $dg = new C_DataGrid("SELECT * FROM STUDENT", "STUDENT_ID", "STUDENT");
// $dg->enable_edit('FORM', 'CRUD');
// $dg->enable_kb_nav(true);
// $dg->display();
// //
//$srvr = oci_connect('oracleuser','chen1234','oracle-rds.cudqhzknumaa.us-east-1.rds.amazonaws.com/sampledb');
//$qstring = "select * from STUDENT";
//$q = oci_parse($srvr,$qstring);
//oci_execute($q);
//$data = oci_fetch_assoc($q);
//print_r($data)

// $dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
//
//// change column titles
//$dg -> set_col_title("orderNumber", "Order No.");
//$dg -> set_col_title("orderDate", "Order Date");
//$dg -> set_col_title("shippedDate", "Shipped Date");
//$dg -> set_col_title("customerNumber",  "Customer No.");
//
//// hide a column
//$dg -> set_col_hidden("requiredDate");
//
//// change default caption
//$dg -> set_caption("Orders List");
//
//// set export type
//$dg -> enable_export('EXCEL');
//
//// enable integrated search
//$dg -> enable_search(true);
//
//$dg->ud_params = 'recreateFilter:true,';
//$dg->enable_advanced_search(true);

//
//$dg->cust_prop_jsonstr = 'postData: {filters:
                           // \'{"groupOp":"AND","rules":[{"field":"status","op":"eq","data":"Open"}]}\'},';
//$dg->set_grid_property(array('search'=>true));


//$dg -> display();
?>



<?php
$dg = new C_DataGrid("select * from employees", array("employeeNumber", "lastName"), "employees");
$dg -> enable_edit("FORM", "CRU");
//$dg -> set_col_hidden('employeeNumber',true);
$dg->enable_kb_nav(true);
/*
 * $dg -> set_col_edittype("isActive", "checkbox","1:0");
//$dg -> set_col_edittype("officeCode", "select", "1:San Francisco;2:Boston;3:NYC;4:Paris;5:Tokyo;6:Sydney;7:London");
$dg -> set_col_edittype("officeCode", "select", "Select officeCode,city from offices",false);
$dg -> set_col_edittype("reportsTo", "select", "Select employeeNumber, lastName from employees",false);
$dg -> set_row_color('lightyellow', 'yellow', '#F1F7F9');
$dg->enable_search(true);
$dg->enable_advanced_search(true);
//$dg->set_selectnetsted('officeCode', 'reportsTo');

$dg->enable_columnchooser();
*/
$dg->enable_debug(true);
$dg -> display();
 ?>



    </body>
</html>
