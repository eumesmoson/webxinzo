<?php 
$correo=$_POST["correo"];
$asunto=$_POST["asunto"];
$mensaje=$_POST["mensaje"];
function validamail($dato)
{
$val=false;
if(preg_match("/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/",$dato))
{
$val=true;
}
else
{
$val=false;
}
return $val;
}

if(validamail($correo)==true && $correo!=" " && $mensaje!=" ")
{ 	
try{

mail('direeccion@mail.algo',$asunto,$mensaje,"MIME-Version: 1.0
From: Web xinzo <".$correo.">");
echo("<html><head><title></title></head><body onload='window.history.back()'></body></html>");
}
catch(Exception $e) {
echo("<html><head><title></title></head><body onload='alert(".$e->getMessage()."),window.history.back()'></body></html>");
}
}
else{
$msg="Revise os datos";
echo("<html><head><title></title></head><body onload='alert(".$msg.")window.history.back()'></body></html>");
}
?>



