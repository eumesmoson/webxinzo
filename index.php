<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Xinzo de Limia</title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/bootstrap-datepicker.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="scripts/bootstrap-datepicker-1.5.1-dist/js/bootstrap-datepicker.min.js"></script>
<script src="scripts/bootstrap-datepicker-1.5.1-dist/locales/bootstrap-datepicker.gl.min.js"></script>
</head>
<body>
<div class="container-fluid">
<header>
<nav class="navbar navbar-default fondoheader" id="menu"  >
<div class="container-fluid" >
<div class="navbar-header" >
<img src="imaxes/escudob.png" alt="escudo menu" title="escudo menu" class="navbar-toggle colorp redondo"  data-toggle="collapse" data-target="#enpri">
</div>
<div class="collapse navbar-collapse"  id="enpri" >
<ul class="nav navbar-nav">
<li class="colorx" id="tabindex"><a href="#" class="efectotexto"><span class="btn-lg texto">Xeral</span></a></li>
<li class="colorp" id="tabpoboa"><a href="poboacion.php" class="efectotexto"><span  class="btn-lg texto">Poboación</span></a></li>
<li class="colore" id="tabecono"><a href="economia.php" class="efectotexto"><span  class="btn-lg texto">Economía</span></a></li>
<li class="colort" id="tabtempo"><a href="tempo.php" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm" id="tabmapas"><a href="mapas.php" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori" id="tabimaxe"><a href="#" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
<!--<a class="navbar-brand" href="#"><button class="iconarr"><img src="imaxes/escudo.ico"></button></a>-->
</ul>
</div>
</div>
</nav>
</header>
<article>
<div class="row colorxf margenarriba" id="mostrar">
<div class="col-md-8 col-lg-9 col-sm-8" id="xeraltexto">
<hr>
<h1 class="efectotexto">Xinzo de Limia</h1>
<hr>
<p class="parrafos">
O concello de Xinzo de Limia esta situado no sur da provincia de Ourense ten 
unha extensión de 132,67 Km cadrados. 
Forman parte do concello as seguintes parroquias:
</p>
<p>
<ol class="listas">
<li><a href="#" data-toggle="popover" data-trigger="focus" id="sanpedro" data-placement="top"
onclick="enlaces(this.id,'San Pedro'),verfestas('29-7'),colapsa('pboado')">Boado</a></li>
<ul id="pboado" class="collapse"><li class="nolista"><a href="#" id="portoalto" 
onclick="enlaces(this.id,'Portoalto'),verfestas('29-7')">Porto Alto</a></li></ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="cimariveira">Cima de Ribeira</a></li>
<li>Damil (Virxe do Carme)</li>
<li>Faramontaos (San Salvador)</li>
<li>Ganade (Santa Isabel)(San Bartolomé)</li>
<li>Xinzo de Limia (Santa Mariña)</li>
<li>Gudín (Santa Bárbara)</li>
<li>Guntimil (San Xoán)</li>
<li>Lamas (Santa Cruz)(San Roque)</li>
<li>Laroá (San Blás)</li>
<li>Moreiras (Nosa Señora das Dores)</li>
<li>Morgade (Santo Tomás)</li>
<li>Mosteiro de Ribeira (San Gregorio)</li>
<li>Novás (San Nicolás)</li>
<li>Parada de Ribeira (Inmaculada Concepción)</li>
<li>A Pena(San Pedro)</li>
<li>Piñeira Seca (San Andrés)</li>
<li>San Pedro de Laroá (San Pedro)</li>
<li>Seoane de Oleiros (San Xoán)</li>
<li>Solbeira de Limia (San Pedro)</li>
</ol>
</p>
<hr>
</div>
<div class="col-md-4 col-lg-3 col-sm-4"> 
<div id="calendario" ><hr></div>
<div id="fecha">
<?php
$arrayMeses = array('Xaneiro', 'Febreiro', 'Marzo', 'Abril', 'Maio', 'Xuño','Xullo', 'Agosto', 'Septembro', 'Outubro', 'Novembro', 'Decembro');
$arrayDias = array( 'Domingo', 'Luns', 'Martes','Mercores', 'Xoves', 'Vernes', 'Sábado');
//echo "<hr><p class='text-center'><span class='textop   efectotexto '>".$arrayDias[date('w')].", ".date('j')." de ".$arrayMeses[date('m')-1]." de ".date('Y')."</span></p><hr>";
?>
<div id="contidodereita" >
<hr>
<ul class="nav nav-tabs" id="listwigtempo" style="margin-top:5px">
    <li><a data-toggle="tab" class="colorx" href="#concello" onclick="">ANUNCIOS CONCELLO</a></li>
    <li><a data-toggle="tab" class="colorx" href="#dendealimia" onclick="">NOVAS</a></li>
   
</ul>
<div class="tab-content" >
<div id="concello" class="tab-pane fade in active over" style="height:400px">

<?php

include "simple_html_dom.php";

$html=file_get_html("http://www.xinzodelimia.es/seccion/anuncios");

$datos=$html->find('div[class="data"]');
echo "<hr>";
for($i=0;$i<count($datos);$i++)
{
echo $datos[$i]."<hr>";
}

?>


</div>
<div id="dendealimia" class="tab-pane">



</div>


</div>

</div>

</div>
<hr>
<div id="enlacesinfo" >
<table  class="enlacesinfo">
<tr>
<td><img src="imaxes/info.png" data-toggle="modal" data-target="#informacion" alt="información" title="información"></td>
<td><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.gl">
<img alt="Licenza de Creative Commons"  src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png"></a>
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.gl"></a></td>
<td><img src="imaxes/email.png" data-toggle="modal" data-target="#contacto" alt="contacto" title="contacto"></td>
</tr>
</table>
</div>
</article>
<div class="modal fade" id="informacion" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Esta web conten información do concello de Xinzo de Limia.</h4>
</div>
<div class="modal-body">
<p >As fontes consultadas son as seguintes:</p>
<p>
<ol><li><a href="http://www.ige.eu">Instituto Galego Estadística</a></li>
<li><a href="http://www.ine.es/">Instituto Nacional Estadística</a></li>
<li><a href="http://www.minhap.gob.es">Ministerio de Hacienda</a></li>
<li><a href="http://www.meteogalicia.es">Meteogalicia</a></li>
<li><a href="http://es.wikipedia.org/wiki/Ginzo_de_Limia">Wikipedia</a></li>
<li><a href="http://www.eltiempo.es">eltiempo.es</a></li>
<li><a href="http://www.tutiempo.net">tutiempo.net</a></li>
</ol>
</p>
<p >Esta web utiliza compoñentes con licencia GPL ou ofrecidos por outros sitios para uso non comercial:
<ol><li><a href="http://www.dhtmlx.com/docs/products/licenses.shtml" >dhtmlXCalendar</a></li>
<li><a href="http://www.eltiempo.es/widget/" >eltiempo.es</a></li>
<li><a href="http://www.tutiempo.net" >tutiempo.net</a></li>
<li><a href="http://www.google.com/intl/gl_es/help/terms_maps.html" >googlemaps</a></li>
<li><a href="http://www.openstreetmap.org/copyright" >openstreetmap</a></li>
<li><a href="http://info.yahoo.com/legal/e1/yahoo/maps/globalmaps/atos.html" >yahoomapas</a></li>
<li><a href="http://signa.ign.es/ign/layoutIn/avisolegal.do" class="pequeno">signa</a></li>
</ol>
</p>
<p>Os datos que se presentan nesta web proceden de sitios oficiais de administracións públicas, colexios profesionais, etc.</p>
<table>
<tr><td><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.gl">
<img alt="Licenza de Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.gl"></a></td></tr>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="contacto" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Formulario de contacto.</h4>
</div>
<div class="modal-body">
<div class="form-group">
<form action="#" method="post">
<label for="usr">Correo:</label>
<input type="text" class="form-control" id="correo" placeholder="o teu correo" 
pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-error="erroneo" required>
<label for="usr">Asunto:</label>
<input type="text" class="form-control" id="asunto" placeholder="Asunto">
<label for="comment">Mensaxe:</label>
<div style="overflow:auto">
<textarea class="form-control" rows="5" id="texto" placeholder="Mensaxe" required></textarea>
</div>
<hr>
<div class="alindereita">
<button type="reset" class="btn btn-danger " >Borrar</button>
<button type="submit" class="btn btn-success " >Enviar</button>
</form>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
</div>
</body>
<script>
var xin="http://www.xinzodelimia.es";
$(".title>a").each(function(i){
      var url = xin.concat($(this).attr("href"));
      $(this).attr("href",url);
      //alert($(this).attr("href"));
   });

$("#tabindex").removeClass("colori");
$("#tabindex").css({background:'#99BF4E',BorderTopRightRadius: 10,marginTop:2,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabindex").css("border-bottom","4px #99BF4E solid");
$('#calendario').datepicker({
    format: "dd/mm/yyyy",
    language: "gl",
    daysOfWeekHighlighted: "0,6",
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
 });
function enlaces(capa,titulo){
$('#'+capa).popover({title: "<strong>"+titulo+"</strong>", 
    	content: "<strong><a href='#'>Ver no Mapa</a></strong>",html: true,}); 
}
/*$('#cimariveira').popover({title: "<a href='#'>San Miguel</a></strong>", 
        content: "<strong><a href='#'>Ver no Mapa</a></strong>",html: true,}); */

function verfestas(data){
$('#calendario').datepicker("setDate", data+"-" +(new Date).getFullYear());
}
function colapsa(nome){
$("#"+nome).collapse('toggle');  
}
//alert($(window).height()-40);

function adapan(){


if($(window).width()<760){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  
}
else if($(window).width()>760){$("#menu").removeClass("navbar-fixed-top");$("#menu").addClass("navbar-default");$("#mostrar").removeClass("altura");$("#mostrar").height($(window).height()*0.93);}
//$("#mostrar").height($(window).height()*0.95);   
}
$(window).resize(function() {
adapan();
});

adapan();

/*    $('#calendario').datepicker("setDate", "29-1-"+(new Date).getFullYear());
});

$('#cimariveira').click(function(){
    $('#calendario').datepicker("setDate", "29-9-"+(new Date).getFullYear());
});
/*$('body').click(function(){           navbar-fixed-top
    alert((new Date).getDay()+"-"+(new Date).getMonth()+"-"+(new Date).getFullYear());
});*/
</script>
</html>