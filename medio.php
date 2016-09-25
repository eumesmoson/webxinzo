<!DOCTYPE html>
<html lang="gl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php require_once('configuracion.php'); echo $nomeMunicipio;?></title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="estilos/estilo.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="scripts/scripts.js"></script>
</head>
<body>
<div class="container-fluid">
<header>
<nav class="navbar navbar-default fondoheader" id="menu" >
<div class="container-fluid" >
<div class="navbar-header" >
<img src="imaxes/escudob.png" alt="escudo menu" title="escudo menu" class="navbar-toggle colorp redondo"  data-toggle="collapse" data-target="#enpri">
</div>
<div class="collapse navbar-collapse"  id="enpri" >
<ul class="nav navbar-nav">
<li class="colorx" id="tabindex"><a href="index.php" class="efectotexto"><span class="btn-lg texto">Xeral</span></a></li>
<li class="colorp" id="tabpoboa"><a href="poboacion.php" class="efectotexto"><span  class="btn-lg texto">Poboación</span></a></li>
<li class="colore" id="tabecono"><a href="economia.php" class="efectotexto"><span  class="btn-lg texto">Economía</span></a></li>
<li class="colort" id="tabtempo"><a href="tempo.php" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm" id="tabmapas"><a href="mapas.php" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori" id="tabimaxe"><a href="imaxes.php" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
<li class="colormed" id="tabnatur"><a href="#" class="efectotexto"><span  class="btn-lg texto">Medio</span></a></li>
<!--<a class="navbar-brand" href="#"><button class="iconarr"><img src="imaxes/escudo.ico"></button></a>-->
</ul>
</div>
</div>
</nav>
</header>
<article>
<div class="row colormed margenarriba" id="mostrar">
<div class="col-md-8 col-lg-9 col-sm-8" id="xeralimaxes">
<hr>

</div>
<div class="col-md-4 col-lg-3 col-sm-4"> 
<hr>
</div>
</div>
</body>
<script>
$("#tabnatur").removeClass("colormed");
$("#tabnatur").css({background:'#99BF4E',BorderTopRightRadius: 10,marginTop:2,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabnatur").css("border-bottom","4px #99BF4E solid");

function adapan(){
if($(window).width()<950){acortar();}

if($(window).width()<760){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  normal();
  
}
else if($(window).width()>760){$("#menu").removeClass("navbar-fixed-top");$("#menu").addClass("navbar-default");$("#mostrar").removeClass("altura");$("#mostrar").height($(window).height()*0.93);}
//$("#mostrar").height($(window).height()*0.95);   
}
$(window).resize(function() {
adapan();
});
adapan();

</script>
</html>
