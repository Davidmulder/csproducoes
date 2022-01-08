<?php
$vnivel=$_COOKIE["vnivel"];
if($vnivel != "5" ){
header("location:index.php?mens=1");
exit;
}

// funcao data e hora

function VERDATA($vdata) {
$hora=substr($vdata,10,18);
 $day=substr($vdata,8,2);
$mes=substr($vdata,5,2);
$ano=substr($vdata,0,4);
echo $day."/".$mes."/".$ano ;
}
function VERHORA($vdata) {
$hora=substr($vdata,10,18);
 $day=substr($vdata,8,2);
$mes=substr($vdata,5,2);
$ano=substr($vdata,0,4);
echo $day."/".$mes."/".$ano . $hora ;
}
?>
