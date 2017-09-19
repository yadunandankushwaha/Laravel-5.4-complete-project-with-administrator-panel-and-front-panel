<?php
require_once("phpGrid/conf.php");
require_once("phpChart/conf.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpGrid phpChart Integration Example</title>
</head>
<body>
<STYLE>
.msrp_bg {
	background-color: #4BB2C5 !important;
}
.buyprice_bg {
	background-color: #F8C05B !important;
}
</STYLE>

<p>Try do a quick search or do a sort. Observe the graph updates in real-time.</p>

<table><tr><td>
<?php
// first phpChart with one series
$pc = new C_PhpChartX(array(array(null)), 'Graph');
$pc->set_axes(array(
		'xaxis'=> array('label'=>'Buy Price'),
		'yaxis'=> array('label'=>'$')
	));
$pc->draw(600,300);
?>
</td>
<td>
<?php
// second phpChart with two series
$pc2 = new C_PhpChartX(array(array(null), array(null)), 'Graph2');
$pc2->add_plugins(array('CanvasTextRenderer','CanvasAxisTickRenderer'));
$pc2->set_series_default(array(
    'renderer'=>'plugin::BarRenderer',
    'rendererOptions'=>array('barWidth'=>10, 'shadowOffset'=>3),
    'shadow'=>true
    ));
$pc2->set_axes(array(
		'xaxis'=> array(
			'label'=>'Buy Price/MSRP (by Product Code)'),
		'yaxis'=> array('label'=>'$')
	));
$pc2->set_animate(true);
$pc2->set_legend(array('show'=>true,'location'=>'nw'));
$pc2->draw(600,300);
?>
</td></tr></table>

<?php
$dg = new C_DataGrid("SELECT * FROM products", "productCode", "products");
$dg->enable_edit('FORM');

$onGridLoadComplete = <<<ONGRIDLOADCOMPLETE
function(status, rowid)
{
	var GraphData1 = [];
	var GraphData2 = [];

	d1 = $('#products').jqGrid('getCol', 'buyPrice', false);
	d2 = $('#products').jqGrid('getCol', 'MSRP', false);
	npoints = d1.length;
	for(var i=0; i < npoints; i++){
		GraphData1[i] = [i+1, parseInt(d1[i])];
	}
    _Graph.series[0].data = GraphData1;
    _Graph.replot({resetAxes:true});

    for(var i=0; i < npoints; i++){
            GraphData1[i] = [i+1, parseInt(d1[i])];
            GraphData2[i] = [i+1, parseInt(d2[i])];
    }
    _Graph2.series[0].data = GraphData1;
    _Graph2.series[1].data = GraphData2;
    _Graph2.replot({resetAxes:true});
}
ONGRIDLOADCOMPLETE;

$dg->add_event("jqGridLoadComplete", $onGridLoadComplete);
$dg->set_col_property('MSRP', array('classes'=>'msrp_bg'));
$dg->set_col_property('buyPrice', array('classes'=>'buyprice_bg'));
$dg->enable_search(true);
$dg->display();
?>
</body>
</html>
