<?php 
header('Content-type: text/html; charset=UTF-8');
$ano=date("Y");
$mes=date("n");
$dia=date("d");
$imes=$mes;
$iano=$ano;
$auxmes;

if($dia<6 && $mes>1){$imes=$mes-1;} 

if(intval($dia)<6){$auxmes="0".(intval($mes)-2);} else{$auxmes="0".(intval($mes)-1);}


//if($mes==1) {$iano=$ano-1;$imes=12;}
if     ($mes>0  && $mes<3) {if($dia<30){$iano=$ano-1;$imes="09";}else{$imes="12";$iano=$ano-1;}}
else if($mes>=3 && $mes<6) {if($dia<25){$iano=$ano-1;$imes="12";}else{$imes="03";}}
else if($mes>=6 && $mes<=10) {if($mes==9 or $mes==10 ){$imes="06";}else{$imes="09";}}
else if($mes>10 && $mes<12){if($dia<30){$imes="06";}else{$imes="09";}}

echo "<hr>dia: ".$dia."  mes: ".$mes." ano:".$ano."<hr>imes: ".$imes." iano: ".$iano."<hr>";
?>