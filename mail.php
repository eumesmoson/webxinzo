<?php
$correo=$_POST["correo"];
$asunto=$_POST["asunto"];
$mensaje=$_POST["mensaje"];
$msg="";
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
mail('@gmail.com',$asunto,$mensaje,"MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\nFrom: Web xinzo <".$correo.">")
$msg="<span class='label label-success'>Mensaxe enviado correctamente :)</span>";
}
catch(Exception $e){
$msg="<span class='label label-danger'>Produciuse un erro no envío :(</span>)";}
}
else{
$msg="<span class='label label-warning'>Revise os datos introducidos :(</span>)<";
}

?>
<!DOCTYPE html>
<html lang="gl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xinzo de limia correo" />
<title>Coctacto: <?php require_once('configuracion.php'); echo $nomeMunicipio;?></title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="estilos/estilo.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="scripts/scripts.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="modal fade" id="modalcorreo" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Gracias pola mensaxe</h4>
</div>
<div class="modal-body">
<p><?php echo $correo ;?></p>
<p><?php echo $msg ;?></p>
<hr>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="window.location='http://xinzodelimia.esy.es/index.php'">Cerrar<button>
</div>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
$('#modalcorreo').modal('show');
</script>
</html>




