<!DOCTYPE html>
<html lang="gl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xinzo de limia informacion" />
<meta name="keywords" content="xinzo de limia pobos, limia, xinzo de limia parroquias, xinzo de limia noticias, xinzo de limia feira, xinzo de limia festas, xinzo de limia fiestas, ginzo , ginzo de limia " />
<title><?php require_once('configuracion.php'); echo $nomeMunicipio;?></title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/bootstrap-datepicker.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="scripts/bootstrap-datepicker-1.5.1-dist/js/bootstrap-datepicker.min.js"></script>
<script src="scripts/bootstrap-datepicker-1.5.1-dist/locales/bootstrap-datepicker.gl.min.js"></script>
<script src="scripts/scripts.js"></script>
<noscript><p><img src="//xinzodelimia.esy.es/visitas/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</head>
<body onload="alert(new Date().getMonth()+1)">
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
<li class="colori" id="tabimaxe"><a href="imaxes.php" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
<li class="colormed" id="tabnatur"><a href="medio.php" class="efectotexto"><span  class="btn-lg texto">Medio</span></a></li>
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
<h1 class="efectotexto" style="font-size:25px;"><?php echo $nomeMunicipio;?></h1>
<hr>
<p class="parrafos">
O concello de Xinzo de Limia esta situado no sur da provincia de Ourense ten 
unha extensión de 132,67 Km cadrados. 
Forman parte do concello as seguintes parroquias:
</p>
<p>
<ol class="listas">
<li><a href="#" data-toggle="popover" data-trigger="focus" id="sanpedro"
onclick="enlaces(this.id,'Boado',42.067086,-7.683081,'San Pedro','29-7','32631',[]),colapsa('pboado')">Boado</a></li>
<ul id="pboado" class="collapse"><li class="nolista"><a href="#" id="portoalto" 
onclick="enlaces(this.id,'Porto Alto',42.061225,-7.690190,'San Pedro','29-7','32631',[])">Porto Alto</a></li></ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="cimariveira"
onclick="enlaces(this.id,'Cima de Ribeira',42.003961,-7.780864,'San Miguel','29-9','32635',[]),colapsa('psoutelo')">Cima de Ribeira</a></li>
<ul id="psoutelo" class="collapse"><li class="nolista"><a href="#" id="soutelo" 
onclick="enlaces(this.id,'Soutelo de Ribeira',42.001362,-7.768390,'San Miguel','29-9','32635',[])">Soutelo de Ribeira</a></li></ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="damil"
onclick="enlaces(this.id,'Damil',42.037424, -7.709613,'Virxe do Carme','5-9','32635',[])">Damil</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="faramontaos"
onclick="enlaces(this.id,'Faramontaos',42.020800,-7.833997,'San Salvador','6-8','32643',[])">Faramontaos</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="ganade" 
onclick="enlaces(this.id,'Ganade',42.026972, -7.7879361,'Santa Isabel','8-7','32640',[['San Bartolomé','23-8','Festa']]),colapsa('psiostganade')">Ganade</a></li>
<ul id="psiostganade" class="collapse">
<li class="nolista"><a href="#" id="agorgoloza" 
onclick="enlaces(this.id,'A Gorgoloza',42.018352,-7.775386,'San Bartolomé','23-8','32640',[])">A Gorgoloza</a></li>
<li class="nolista"><a href="#" id="sanvitoiro" 
onclick="enlaces(this.id,'San Vitoiro',42.043487,-7.794176,'San Bartolomé','23-8','32640',[])">San Vitoiro</a></li>
</ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="xinzo"
onclick="enlaces(this.id,'Xinzo de Limia',42.062985,-7.726132,'Santa Mariña','18-6','32630',
[['San Sebastián','20-1','Festa'],['Fareleiro','5-2-2017','Entroido'],['Corredoiro','12-2-2017','Entroido'],
['Oleiro','19-2-2017','Entroido'],['Domingo de Entroido','26-2-2017','Entroido'],['Martes de Entroido','28-2-2017','Entroido'],['Esquecemento','20-8-2017','Festa'],['San Xoán','24-6','Festa (Poligono)'],
['Magostos','11-11','Festa (Praza de Oriente)'],['1ª Feira do mes','14-'+new Date().getMonth()+1,'Feira'],['2ª Feira do mes','27-'+new Date().getMonth()+1,'Feira']]),colapsa('pbaronzas')">Xinzo de Limia</a></li>
<ul id="pbaronzas" class="collapse"><li class="nolista"><a href="#" id="baronzas" 
onclick="enlaces(this.id,'Baronzás',42.070085,-7.712692,'San Andrés','20-6','32636',[])">Baronzás</a></li></ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="gudin"
onclick="enlaces(this.id,'Gudín',41.968683,-7.645437,'Santa Bárbara','30-5','32637',[])">Gudín</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="guntimil"
onclick="enlaces(this.id,'Guntimil',42.020657,-7.755429,'San Xoán','24-6','32635',[])">Guntimil</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="lamas"
onclick="enlaces(this.id,'Lamas',42.044702,-7.754894,'San Roque','8-9','32635',[['Santa Cruz','3-5','Festa']])">Lamas</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="laroa"
onclick="enlaces(this.id,'Laroá',42.008079,-7.699079,'San Blás','3-2','32632',[]),colapsa('pfiestras')">Laroá</li>
<ul id="pfiestras" class="collapse"><li class="nolista"><a href="#" id="fiestras" 
onclick="enlaces(this.id,'Fiestras',41.998566,-7.691704,'Santa Marta','29-7','32632',[])">Fiestras</a></li></ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="moreiras"
onclick="enlaces(this.id,'Moreiras',42.018949,-7.672073,'Nosa Señora das Dores','15-9','32637',[])">Moreiras</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="morgade"
onclick="enlaces(this.id,'Morgade',42.077750,-7.697425,'Santo Tomás','25-6','32636',[])">Morgade</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="mosteiro"
onclick="enlaces(this.id,'Mosteiro de Ribeira',42.019189,-7.768669,'San Gregorio','9-5','32635',[])">Mosteiro de Ribeira</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="novas" 
onclick="enlaces(this.id,'Novás',41.986189,-7.643965,'San Nicolás','25-6','32637',[['Os Remedios','9-9','Festa']]),colapsa('psitiosnovas')">Novás</a></li>
<ul id="psitiosnovas" class="collapse">
<li class="nolista"><a href="#" id="mosteiro" 
onclick="enlaces(this.id,'Mosteiro de Novás',41.980700,-7.641948,'Os Remedios','9-9','32637',[])">Mosteiro de Novás</a></li>
<li class="nolista"><a href="#" id="queirugas" 
onclick="enlaces(this.id,'As Queirugás',41.995506,-7.640309,'Corpus Christi','22-6','32637',[])">As Queirugás</a></li>
</ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="paradaribeira"
onclick="enlaces(this.id,'Parada de Ribeira',42.026130,-7.728072,'Inmaculada Concepción','13-6','32635',[])">Parada de Ribeira</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="pena" 
onclick="enlaces(this.id,'Pena',42.086122,-7.679996,'San Pedro','29-7','32636',[]),colapsa('psitiospena')">Pena</a></li>
<ul id="psitiospena" class="collapse">
<li class="nolista"><a href="#" id="soutelop" 
onclick="enlaces(this.id,'Soutelo de Pena',42.094218,-7.667231,'San Pedro','29-7','32636',[])">Soutelo de Pena</a></li>
<li class="nolista"><a href="#" id="trandeiras" 
onclick="enlaces(this.id,'Trandeiras',42.094134,-7.667242,'Festa das Flores','5-6','32636',[])">Trandeiras</a></li>
</ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="pineiraseca"
onclick="enlaces(this.id,'Piñeira Seca',42.088758,-7.632570,'San Andrés','20-6','32631',[])">Piñeira Seca</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="splaroa" 
onclick="enlaces(this.id,'San Pedro de Laroá',42.025992,-7.696814,'San Pedro','29-7','32632',[]),colapsa('psitiossplaroa')">San Pedro de Laroá</a></li>
<ul id="psitiossplaroa" class="collapse">
<li class="nolista"><a href="#" id="paredes" 
onclick="enlaces(this.id,'Paredes',42.037282,-7.681713,'San Ciriaco','7-8','32637',[])">Paredes</a></li>
<li class="nolista"><a href="#" id="rebordecha" 
onclick="enlaces(this.id,'Rebordechá',42.037516, -7.694471,'Festa das Flores','5-6','32637',[])">Rebordechá</a></li>
</ul>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="seoane"
onclick="enlaces(this.id,'Seoane de Oleiros',41.997334,-7.669444,'San Xoán','24-6','32637',[])">Seoane de Oleiros</a></li>
<li><a href="#" data-toggle="popover" data-trigger="focus" id="solveira"
onclick="enlaces(this.id,'Solveira',42.086845,-7.650952,'San Pedro','29-7','32631',[]),colapsa('psolveira')">Solveira</a></li>
<ul id="psolveira" class="collapse"><li class="nolista"><a href="#" id="pidre" 
onclick="enlaces(this.id,'Pidre',42.075569,-7.669782,'Santa Bárbara','30-5','32631',[])">Pidre</a></li></ul>
</ol>
</p>
<hr>
<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
</div>
<div class="col-md-4 col-lg-3 col-sm-4"> 
<div id="calendario" ><hr></div>
<div id="fecha">
<?php
$arrayMeses = array('Xaneiro', 'Febreiro', 'Marzo', 'Abril', 'Maio', 'Xuño','Xullo', 'Agosto', 'Septembro', 'Outubro', 'Novembro', 'Decembro');
$arrayDias = array( 'Domingo', 'Luns', 'Martes','Mercores', 'Xoves', 'Vernes', 'Sábado');
//echo "<hr><p class='text-center'><span class='textop   efectotexto '>".$arrayDias[date('w')].", ".date('j')." de ".$arrayMeses[date('m')-1]." de ".date('Y')."</span></p><hr>";

include "simple_html_dom.php";

$html=file_get_html("http://www.xinzodelimia.es/seccion/anuncios");

$datos=$html->find('div[class="widget"]');
//$datos1=$datos->find('div[class="widget-content"]');
?>
<div id="contidodereita" >
<hr>
<ul class="nav nav-tabs" id="listwigtempo" style="margin-top:5px">
    <li><a data-toggle="tab" class="tabxeral" href="#concello" >ANUNCIOS CONCELLO</span></a></li>
    <li><a data-toggle="tab" class="tabxeral" href="#noticias">NOVAS</a></li>
   
</ul>
<div class="tab-content" >
<div id="concello" class="tab-pane fade in active over" style="height:400px">

<?php
//echo "<hr>";
for($i=0;$i<count($datos)-2;$i++)
{
echo $datos[$i]."<hr>";
}
//echo "<hr>".count($datos)."</hr>";
?>

</div>
<div id="noticias" class="tab-pane">
<div style="margin:10px auto 146px auto;width:280px;border:1px white solid;border-radius:10px;">
<div class="bloque"><a href="http://www.dendealimia.com/" target="_blank"><button class="tabxeral bclx" type="button">DENDE A LIMIA</button></a></div>
<div class="bloque"><a href="http://www.laregion.es/blog/section/a-limia" target="_blank"><button class="tabxeral bclx" type="button">LA REGION</button></a></div>
<div class="bloque"><a href="http://www.ourensedixital.com/_limia/" target="_blank"><button class="tabxeral bclx" type="button">LIMIA DIXITAL</button></a></div>
<div class="bloque"><a href="http://www.lavozdegalicia.es/ourense/xinzo-de-limia/index.htm" target="_blank"><button class="tabxeral bclx" type="button">LA VOZ DE GALICIA</button></a></div>
<div class="bloque"><a href="http://www.farodevigo.es/galicia/ourense/xinzo/" target="_blank"><button class="tabxeral bclx" type="button">FARO DE VIGO</button></a></div>
</div>
</div>
</div>
</div>
</div>
<hr>
<?php include ("creativecommons.html"); ?>
</article>
<?php include ("contacto.html"); ?>
</body>
<script>
var xin="http://www.xinzodelimia.es";
$(".title>a").each(function(i){
      var url = xin.concat($(this).attr("href"));
      $(this).attr("href",url);
      //alert($(this).attr("href"));
   });

$("#tabindex").removeClass("colorx");
$("#tabindex").css({background:'#9D9F97',BorderTopRightRadius: 10,marginTop:2,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabindex").css("border-bottom","4px #9D9F97 solid");
$('#calendario').datepicker({
    format: "dd/mm/yyyy",
    language: "gl",
    daysOfWeekHighlighted: "0,6",
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
 });

function enlaces(capa,nome,lat,lon,p,f,cp,fes){
festas="";
var ano="";
var msgf="";
if(nome=='Xinzo de Limia' && new Date().getMonth()==10){
  fes[9]=['1ª Feira do mes','14-11','Feira'];
  fes[10]=['2ª Feira do mes','27-11','Feira'];
}
if(nome=='Xinzo de Limia' && new Date().getMonth()==11){
   fes[9]=['1ª Feira do mes','14-12','Feira'];
   fes[10]=['2ª Feira do mes','27-12','Feira'];
}
for(i=0;i<fes.length;i++){
//if(fes[i][1].length<6){fes[i][1]+="-"+new Date().getFullYear();}
//if(new Date(fes[i][1].replace(/-/gi,'/')).getDay()==0){alert("Son un domingo :)");}
if(fes[i][0]==="2ª Feira do mes"){msgf="<small>Se a feira coincide en domingo,<br>cámbiase o sábado.</small><br>"}
festas+=fes[i][2]+":<a href='#' onmouseover=verfestas('"+fes[i][1]+"') onmouseout=hoxe()>"+fes[i][0]+"</a><br>"+msgf;
}
$('#'+capa).popover({title: "<strong>"+nome+"</strong>&nbsp;<button type='button' id='close' class='close' style='margin:-6px -8px auto auto;width:18px;height:18px;padding:0.5px 2px;' onclick=ocultar('"+capa+"')>&times;</button>", 
content: "<br>Código Postal<b>:"+cp+"</b><br>Patron/a: <a href='#' onmouseover=verfestas('"+f+"') onmouseout=hoxe()>"+p+"</a><br>"+festas+"<b><a href='mapas.php?lat="+lat+"&lon="+lon+"&nom="+nome+"' style='padding-left:20px'>Ver no Mapa</a></b>",html:true});
$('#'+capa).popover('show');

}

function ocultar(capa){
$('#'+capa).popover('hide');
}
function hoxe(){
  $('#calendario').datepicker('setDate', new Date());
}
/*$('[data-toggle="popover"]').on('hidden.bs.popover', function(){
        $( "#calendario" ).datepicker({maxDate: "+0d"}).datepicker("setDate", new Date());
    });
/*$('#cimariveira').popover({title: "<a href='#'>San Miguel</a></strong>", 
        content: "<strong><a href='#'>Ver no Mapa</a></strong>",html: true,}); */
/*$("#xeraltexto").click(function(){
 $('[data-toggle="popover"]').popover('hide');
 //alert("hola :)");
});*/

function verfestas(data){
var ano="";

if(data.length<6){ano="-"+new Date().getFullYear();}
$('#calendario').datepicker("setDate", data+ano);
}
function colapsa(nome){
$("#"+nome).collapse('toggle');  
}
//alert($(window).height()-40);


function adapan(){
if($(window).width()<1100){acortar();}

if($(window).width()<760){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  normal();
  
}
else if($(window).width()>760){$("#menu").removeClass("navbar-fixed-top");$("#menu").addClass("navbar-default");$("#mostrar").removeClass("altura");}
if($(window).width()>1100){normal();} 
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
