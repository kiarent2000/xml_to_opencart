<html dir=ltr lang=ua>
<head>
<meta charset=UTF-8 />
</head>
<?php 
require_once('includes/config.php');
require_once('includes/connect.php');

#######################################Initial data#############################################################
$link = 'cristal_master.xml';
$start_tag ="<offer"; //start tag for item
$end_tag = "<\/offer>"; //end tag for item
#######################################Initial data#############################################################

######################################Get array with all items##################################################
$items= (new Parser($link))->getAllItems($start_tag, $end_tag);
######################################Get array with all items##################################################

foreach($items as $item)
{
	echo $item;
}




//echo $item;
//print_r( $item);
//print_r( $items);

//echo '<br>'.memory_get_usage();

function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

echo convert(memory_get_usage(true)); // 123 kb

