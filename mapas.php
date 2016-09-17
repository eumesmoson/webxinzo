<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Xinzo de Limia</title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/c3.css">
<link href='http://fonts.googleapis.com/css?family=Share+Tech|Sonsie+One' rel='stylesheet'  type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="scripts/c3.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="scripts/gmaps.js"></script>
</head>
<body>
<div class="container-fluid">
<header>
<nav class="navbar navbar-default fondoheader" id="menu" >
<div class="container-fluid">
<div class="navbar-header" >
<img src="imaxes/escudob.png" alt="escudo menu" title="escudo menu" class="navbar-toggle colorp redondo" data-toggle="collapse" data-target="#enpri">
</div>
<div class="collapse navbar-collapse" id="enpri">
<ul class="nav navbar-nav">
<li class="colorx" id="tabindex"><a href="index.php" class="efectotexto"><span class="btn-lg texto">Xeral</span></a></li>
<li class="colorp" id="tabpoboa"><a href="poboacion.php" class="efectotexto"><span  class="btn-lg texto">Poboación</span></a></li>
<li class="colore" id="tabecono"><a href="economia.php" class="efectotexto"><span  class="btn-lg texto">Economía</span></a></li>
<li class="colort" id="tabtempo"><a href="tempo.php" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm" id="tabmapas"><a href="#" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori" id="tabimaxe"><a href="#" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
</ul>
</div>
</div>
</nav>
</header>
<article>

<div class="row colormf margenarriba" id="mostrar">
<div class="col-md-8 col-lg-9 col-sm-8" id="mapas">
<div id="map" style="border:1px yellow inset;width:102%;height:740px;z-index:1;margin:5px;margin-left:-10px;padding:0px;border-radius:10px;"></div>
</div>

<div id="dereita" class="col-md-4 col-lg-3 col-sm-4"  >  
<div id="contidodereita" >
<ul class="nav nav-tabs" id="listwigtempo" style="margin-top:5px">
    <li><a data-toggle="tab" class="colorm" href="#interese" onclick="">LUGARES INTERESE</a></li>
    <li><a data-toggle="tab" class="colorm" href="#buscar" onclick="">BUSCAR</a></li>
   
</ul>
<div class="tab-content" >
<div id="interese" class="tab-pane fade in active" >
<div id="datoslugar" class="over" style="height:650px">
<hr>
<?php

try {
$lugares=simplexml_load_file("lugares.xml");
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
//var_dump($lugares);

echo("<div class='table-responsive' id='dato' >");
for($i=0;$i<count($lugares)-1;$i++){
echo("<table class='table' id='tab".$i."'><thead >");

foreach($lugares->LUGAR[$i]->children() as $d)
{
if($d->getName()=="NOME"){
echo "<tr class='colorm'><th class='centro' colspan='2' id='nom".$i."'>".$d."</th></tr></thead>"; 
}
else if($d->getName()=="DIRECCION"){
echo "<tr><td><img src='imaxes/homep.png' alt='dirección'></td><td id='dir".$i."'>".$d."</td></tr>";  
}
else if($d->getName()=="TELEFONO"){
echo "<tr><td><img src='imaxes/phonep.png' alt='teléfono'></td><td>".$d."</td></tr>";  
}
else if($d->getName()=="MOBIL"){
echo "<tr><td><img src='imaxes/mobilp.png' alt='mobil'></td><td>".$d."</td></tr>";  
}
else if($d->getName()=="WEB"){
echo "<tr><td><img src='imaxes/webp.png' alt='web'></td><td> <a href='".$d['URL']."' target='_blank'>".$d."</a></td></tr>";  
}
else if($d->getName()=="EMAIL"){
echo "<tr><td><img src='imaxes/emailp.png' alt='web'></td><td> <a href='mailto:".$d."'>".$d."</a></td></tr>";  
}
else if($d->getName()=="COORDENADAS"){
echo "<tr><td><img src='imaxes/earp.png' alt='coordenadas'></td><td><a href='#' id='coor".$i."' onclick=engadirMarcador(document.getElementById('coor".$i."').innerHTML,document.getElementById('nom".$i."').innerHTML,document.getElementById('dir".$i."').innerHTML)>".$d."</a></td></tr>";  
}
}
echo "</table>";
}

echo "</div>"
?>
<hr>
</div>
</div>

<div id="buscar" class="tab-pane">

<hr>
<div class="enlacesinfo">
<form class="navbar-form margent"  role="search" >
      <div class="form-group" style="margin-left:-15px"  >
        <input type="text" class="form-control"  placeholder="Buscar" style="width:226px;margin-bottom:3px;">
      </div>
      <button type="submit" class="btn btn-default" id="botbus" onclick="" style="width:226px;margin-left:-15px" ><span class="glyphicon glyphicon-search"></span></button>
    </form>
</div>
<hr>
<div class="margent" >
<input type='text' id='datepicker' size='10' placeholder='Elixa data para consulta' class="form-control centro" style="width:226px;margin-bottom:3px" readonly>

<button class="btn btn-default" style="width:226px" 
onclick="enviamos(document.getElementById('datepicker').value,322,'datbus')"><img src="imaxes/add.gif" style="margin-top:-5px" alt="icono farmacia" ><span class="verben" style="margin-left:4px">FARMACIA DE GARDA</span>
<img src="imaxes/add.gif" style="margin-top:-5px;" alt="icono farmacia"></button>
<button class="btn btn-default" style="width:226px" 
onclick="enviamos2('datbus')"><img src="imaxes/gasn.png" style="margin-top:-5px;margin-left:-13px" alt="icono gasolineira" ><span class="verben">PREZOS DA GASOLINA</span>
</button></div>
<hr>
<div id="datbus" class="over" style="height:450px"></div>
</div>
</div>
</div>
</div>
</article>  
</div>
<script type="text/javascript">
$("#tabmapas").removeClass("colorx");
$("#tabmapas").css({background:'#FFFF00',BorderTopRightRadius: 10,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabmapas").css("border-bottom","4px #FFFF00 solid");
var fecha=new Date();
var mes=fecha.getMonth();
var ano=fecha.getFullYear();
var hora=fecha.getHours();
var diase=fecha.getDay();
var diames=fecha.getDate();
var mesano=new Array('Decembro', 'Xaneiro', 'Febreiro', 'Marzo', 'Abril', 'Maio', 'Xuño','Xullo','Agosto', 'Septembro','Outubro','Novembro');
var diasem=new Array('Domingo','Luns','Martes','Mércores','Xoves','Venres','Sábado');
var map;
var tipomapa;
var markers = [];

function engadirMarcador(lat,t,m){
setMapOnAll(null);
var coor=lat.split(",");
var marker=map.addMarker({
  lat: coor[0],
  lng: coor[1],
  title: t,
  icon:'imaxes/flechaaover1.png',
  animation: google.maps.Animation.BOUNCE,
click: function(e) {
  if (this.getAnimation() !== null) {
    this.setAnimation(null);
  } 
  else {
    this.setAnimation(google.maps.Animation.BOUNCE);
  }
  },

  infoWindow: {
  content: '<strong>'+t+'</strong><hr>'+m+'<hr>'
},

});
markers.push(marker);
var center = new google.maps.LatLng(coor[0],coor[1]);
    map.panTo(center);
}
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}
function borrarMarcadores(){

setMapOnAll(null);

}
function cargaMapa()
{     
map = new GMaps({
  div: '#map',
  zoom:25,
  mapTypeId:google.maps.MapTypeId.HYBRID,
  lat: 42.063010,
  lng: -7.726178
  });
var marker=map.addMarker({
  lat: 42.063010,
  lng: -7.726178,
  title: 'Praza Maior',
  icon:'imaxes/flechaaover1.png',
  animation: google.maps.Animation.BOUNCE,
  infoWindow: {
  content: 'Praza do centro do pobo<hr><img src=imaxes/escudob.png>'
}
});
markers.push(marker);
} 
function geolocalizar(){
        GMaps.geolocate({
          success: function(position){
            lat = position.coords.latitude;  // guarda coords en lat y lng
            lng = position.coords.longitude;
            verMapa(lat,lng);
          },
          error: function(error) { alert('Error: '+error.message);verMapa(40.417441,-3.703047); },
          not_supported: function(){verMapa(40.417441,-3.703047);//si no autoriza o no soporta muestra coor
          
          },
        });
      }

function getFecha()
  {
    return diasem[diase]+' '+diames+' de '+mesano[mes+1]+' do '+ano;
  }

$.datepicker.regional['gl'] = {
 closeText: 'Pechar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoxe',
 monthNames: ['Xaneiro', 'Febreiro', 'Marzo', 'Abril', 'Maio', 'Xuño', 'Xullo', 'Agosto', 'Septembro', 'Outubro', 'Novembro', 'Decembro'],
 monthNamesShort: ['Xan','Feb','Mar','Abr', 'Mai','Xuñ','Xul','Ago','Sep', 'Out','Nov','Dec'],
 dayNames: ['Domingo', 'Luns', 'Martes', 'Mércores', 'Xoves', 'Venres', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mér','Xov','Ven','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Me','Xo','Ve','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };


function actfecha(){
 $.datepicker.setDefaults($.datepicker.regional['gl']);
 $("#datepicker").datepicker().datepicker("setDate", new Date());
}
function buscar(){


}
function borrar(){
  $("#indice0").empty();
  $("#indice1").empty();
 

}

function clonar(){
  //alert($("#indice0").text());
  var i0=$("#nome0:eq(0)").val();

  var i1=$("#nome1:eq(0)").val();
  //alert(i0);
 
  var t1=$("#tab"+i0+":eq(0)").clone().appendTo("#indice0");
  $("#tab"+i1+":eq(0)").clone().appendTo("#indice1");
  $("input:hidden").remove();
  //alert($("#indice").text());
}

function enviamos(f,n,capa){

//alert(f+n+capa);
var reg = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g;
if (reg.test(f) && n!='' && capa!='') 
{

$.ajax({
        type:  'POST',
        url:   'gardas.php',
        data:  { "DATA":f,"COD":n }
         }).done(function( msg ) {
         $("#"+capa).html(msg);
         }).fail(function (jqXHR, textStatus, errorThrown){
          alert("Erro :( -> "+ textStatus +" "+ errorThrown);
        });
borrar();
$(document).ajaxComplete(function(){clonar();}); 
}
else {
  $("#"+capa).html('Error o introducir datos :(');
  $("#datepicker").attr("placeholder", "dd/mm/aaaa");
}
}
function enviamos2(capa){
$.ajax({
        type:  'POST',
        url:   'combustible.php'
 
         }).done(function( msg ) {
         $("#"+capa).html(msg);
         }).fail(function (jqXHR, textStatus, errorThrown){
          alert("Erro :( -> "+ textStatus +" "+ errorThrown);
        });
borrar();
$(document).ajaxComplete(); 
}



function adapan(){
if($(window).width()<360){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  $("#map").height(200);
  $("#datoslugar").height(150);
  $("#datoslugar").css("overflow", "auto");
  $("#datbus").height(150);
  $("#datbus").css("overflow", "auto");

}
if($(window).width()<760){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  $("#map").height(300);
  $("#datoslugar").height(220);
  $("#datoslugar").css("overflow", "auto");
  $("#datbus").height(220);
  $("#datbus").css("overflow", "auto");
}
if($(window).width()>760)
{$("#menu").removeClass("navbar-fixed-top");
$("#menu").addClass("navbar-default");
$("#mostrar").removeClass("altura");
$("#mostrar").height($(window).height()*0.93);
$("#map").height($("#mostrar").height()-15);
}

}
$(window).resize(function() {
adapan();
});
adapan();
cargaMapa();
actfecha();

//alert($("#mostrar").height()-10);
</script>
</body>
</html>