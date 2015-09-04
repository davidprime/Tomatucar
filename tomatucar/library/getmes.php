<?php
$month = array("","enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
$data=array("ok"=>"0");
$anio = isset($_GET['y'])?$_GET['y']:date('Y');
$mes = isset($_GET['m'])?$_GET['m']:date('m');

$data["mes"]=array();
$data["nomes"]=array();
$data["anio"]=array();
$data["days"]=array();
//$data["dia"]=isset($_GET['t'])?$_GET['t']:date('d');
$data["firstday"]=date('N',strtotime($anio."/".$mes."/1"));
for($i=1;$i<=6;$i++){
	$data["mes"][]=$month[intval($mes)];
	$data["nomes"][]=intval($mes);
	$data["anio"][]=$anio;
	$data["days"][]=cal_days_in_month(CAL_GREGORIAN,$mes,$anio);
	$mes++;
	if($mes>12){
		$mes=1;
		$anio++;
	}
}

$data["ok"]=1;
//$data["idt"]=isset($_GET['idt'])?$_GET['idt']:0;
echo json_encode($data);
?>