<?php   

$months = [
	"01" => "jan",
	"02" => "fév",
	"03" => "mar" ,
	"04" => "avr",
	"05" => "mai",
	"06" => "jun",
	"07" => "jul" ,
	"08" => "aoû",
	"09" => "sep",
	"10" => "oct",
	"11" => "nov" ,
	"12" => "dec",
];

$month = get_the_date('m');
echo $months[$month];
?>