<!DOCTYPE html>
<html lang="gl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php require_once('configuracion.php'); echo $nomeMunicipio;?></title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/c3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="scripts/c3.js"></script>
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
<li class="colort" id="tabtempo"><a href="#" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm" id="tabmapas"><a href="mapas.php" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori" id="tabimaxe"><a href="#" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
</ul>
</div>
</div>
</nav>
</header>
<article>

<div class="row colortf margenarriba" id="mostrar">
<div class="col-md-8 col-lg-9 col-sm-8" id="datostempo">
<hr>
<?php
$ano=intval(date("Y"));
$mes=intval(date("n"));
$dia=intval(date("d"));
$valor=($dia-1)."/".$mes."/".$ano."&data2=".$dia."/".$mes."/".$ano;
//header('Content-type: text/html; charset=UTF-8');
$url=htmlentities("http://www2.meteogalicia.es/galego/observacion/estacions/contidos/
  DatosHistoricosXML_diario.asp?est=19027&param=83,84,85,86,9991,10004,10005,10018,10021,10022,10056,10063,10006,10013,10106,81,10003,10015,%2010124,10001,10117,10129,9990&data1=".$valor."&idprov=2&red=".$redMetereo);
$ul=utf8_encode("http://www2.meteogalicia.es/galego/observacion/estacions/contidos/DatosHistoricosXML_diario.asp?est=".$estMetereo."&");
$up=utf8_encode("param=83,84,85,86,9991,10004,10005,10018,10021,10022,10056,10063,10006,10013,10106,81,10003,10015,%2010124,10001,10117,10129,9990&");
$uf=utf8_encode("data1=".$valor."&idprov=2&red=102109");
$ut=$ul.$up.$uf;
//$urll=preg_replace('[\s+]','',str_replace('%','',$url));
$meses=array("Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo","Agosto","Septembro","Outubro","Novembro","Decembro");
$dias = array( 'Domingo', 'Luns', 'Martes','Mercores', 'Xoves', 'Vernes', 'Sábado');

$urld="http://www2.meteogalicia.gal/galego/observacion/estacions/contidos/DatosHistoricosXML_diario.asp?est=".$estMetereo."&param=83,84,85,86,9991,10004,10005,10018,10021,10022,10056,10063,10006,10013,10106,81,10003,10015,10124,10001,10117,10129,9990&data1=6/9/2016&data2=7/9/2016&idprov=2&red=".$redMetereo;

echo ("<div id='titulop'><h5 class='texto centro efectotexto'>Medición en ".$nomeMunicipio." o ".($dia-1)." de ".$meses[$mes-1]." do ".$ano."  </h5><hr></div>");?>
<div id="contidotaboas" class="tab-content" >
<div class="table-responsive">
<div id="taboa">
<?php 
try {
$medicions=simplexml_load_file($ut);
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
/*for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}*/
//echo "<hr>".file_get_contents($url)."<hr>".$url."<hr>";
//var_dump($medicions);

echo("<div class='table-responsive metade' id='t1'>          
  <table class='table' id='taboavalores'>
    <thead >
      <tr class='textotatt'>
        <th class='textott centro'>MEDIDA</th>
        <th class='textott centro'>VALOR</th>
        <th class='textott centro'>UNIDADE</th>
      </tr>
    </thead>
    <tbody>");
    
    $dato="";
    /*foreach ($medicions->Valores->Medida as $med) 
     {
      $datos=$med->attributes();
      $i++;
      if($datos['Codigo_validacion']==1){$dato=$datos['Valor'];}
      else{ $dato="";}
      echo("<tr class='textott'>
        <td id='des".$i."' class='textota'>".$i." ".htmlspecialchars($datos['Variable'])."</td>
        <td id='val".$i."' class='textota'>".$dato."</td>
        <td id='uni".$i."' class='textota'>".htmlspecialchars($datos['Unidades'])."</td></tr>");
      }*/
for($i=0;$i<12;$i++) 
     {
      if($medicions->Valores->Medida[$i]['Codigo_validacion']==1){$dato=$medicions->Valores->Medida[$i]['Valor'];}
      else{ $dato="";}
      
      echo("<tr class='textott'>
        <td id='des".$j."' class='textota iz'>".$j." ".htmlspecialchars($medicions->Valores->Medida[$i]['Variable'])."</td>
        <td id='val".$j."' class='textota'>".$dato."</td>
        <td id='uni".$j."' class='textota'>".htmlspecialchars($medicions->Valores->Medida[$i]['Unidades'])."</td></tr>");
      }

echo("</tbody></table></div>");
echo("<div class='table-responsive metade' id='t2' >          
  <table class='table' id='taboavalores'>
    <thead  id='head2'>
      <tr class='textotatt'>
        <th class='textott centro'>MEDIDA</th>
        <th class='textott centro'>VALOR</th>
        <th class='textott centro'>UNIDADE</th>
      </tr>
    </thead>
    <tbody>");
    $j=0;
   for($j=12;$j<=22;$j++) 
     {
      if($medicions->Valores->Medida[$j]['Codigo_validacion']==1){$dato=$medicions->Valores->Medida[$j]['Valor'];}
      else{ $dato="";}
      
      echo("<tr class='textott'>
        <td id='des".$j."' class='textota iz'>".htmlspecialchars($medicions->Valores->Medida[$j]['Variable'])."</td>
        <td id='val".$j."' class='textota'>".$dato."</td>
        <td id='uni".$j."' class='textota'>".htmlspecialchars($medicions->Valores->Medida[$j]['Unidades'])."</td></tr>");
      }

echo("<tr class='textott' >
  <td id='opc".$j."' class='textota der'><button type='submit'  class='botontempo' onclick='grafica()'>Graf Temperatura</button>
  <button type='submit'  class='botontempo' onclick='graficachu()'>Graf Choivas</button></td>
  <td colspan='2'><input type='text' id='datepicker' size='20' placeholder='Elixa data para consulta' class='oscuro centro' readonly>
  <button type='submit' id='enviarfecha' class='botontempo' style='width:auto;'>Ver</button></td></tr>
  </tbody></table></div>");

?>



</div>

</div>
<div  id="chart" class="grafilineas"></div>
</div>

</div>
<div id="dereita" class="col-md-4 col-lg-3 col-sm-4"  >  
<hr>
<div id="contidodereita" style="overflow:auto;">
<ul class="nav nav-tabs" id="listwigtempo">
    <li><a data-toggle="tab" class="textotatt" href="#esta" onclick="">Medición</a></li>
    <li><a data-toggle="tab" class="textotatt" href="#pred" onclick="">Predicción</a></li>
    <li><a data-toggle="tab" class="textotatt" href="#mapt" onclick="">Mapas</a></li>
    <li><a data-toggle="tab" class="textotatt" href="#lua" onclick="">Lua</a></li>
</ul>
<div class="tab-content" >
<div id="esta" class="tab-pane fade in active">
<?php echo "<iframe class='wigtempo' id='framesta' style='height:620px' 
src='http://servizos.meteogalicia.gal/widget/html/widget_estacions.html?codigo=".$estMetereo."&language=gl&formato=normal&temperatura=true&viento=true&choiva=true&sol=true&refacho=true&tempmin=true&tempmax=true&tendencia=true&fondo=FFFFFF'>
</iframe>";?>

</div>
<div id="pred" class="tab-pane">
<?php echo "<iframe class='wigtempo' id='framepre' style='height:808px' 
 src='http://servizos.meteogalicia.gal/widget/html/widget_concellos.html?codigo=".$codIGE."&language=gl&formato=normal&dia=0&temperatura=true&viento=true&choiva=true&fondo=FFFFF'></iframe>";?>

</div>

<div id="mapt" class="tab-pane">
<div id="mapa" >
<hr>
<div id="mapa_temp"></div>
<hr>
<marquee  onmouseout="this.start()" onmouseover="this.stop()" id="martempo" class='texto centro efectotexto' scrollamount="3"></marquee>
<hr>


</div>

</div>
<div id="lua" class="tab-pane">
<hr>
<div style="margin:auto;width:180px;">
<a target="blank" style="text-decoration:none;" href="http://www.calendrier-lunaire.net/">
<img  src="http://www.calendrier-lunaire.net/module/LYmFzaWMtMjUxLXYxLTE0NzMzNjcyMDUuMTc5Mi0jMDAwMDAwLTE4MC0jMDAwMDAwLTE0NzMzNjcyMDUtMS04.png" alt="La Lune" title="La Lune" />
</a>
</div>
<hr>
<?php 
echo "<p class='text-center'><span class='textop   efectotexto '>".$dias[date('w')].", ".date('j')." de ".$meses[date('m')-1]." de ".date('Y')."</span></p>" ?>
<hr>
<div id="CalendarioLunarTutiempo" class="wigtempo" ></div>
<script type="text/javascript">
/* Ancho: 412; Alto: 482 */
var DatosCalendarioTutiempo = '0;0;1;1;1;10;N;000000;FFFFFF;FFFFFF';
</script>
<script type="text/javascript" src="http://www.tutiempo.net/TTapi/cal/fases_0_0"></script>
</div>
</div>

</div>
</div>
</div>
</article>  
</div>
<script type="text/javascript">
$("#tabtempo").removeClass("colort");
$("#tabtempo").css({background:'#9537CF',BorderTopRightRadius: 10,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabtempo").css("border-bottom","4px #9537CF solid");
var fecha=new Date();
var mes=fecha.getMonth();
var ano=fecha.getFullYear();
var hora=fecha.getHours();
var diase=fecha.getDay();
var diames=fecha.getDate();
var mesano=new Array('Decembro', 'Xaneiro', 'Febreiro', 'Marzo', 'Abril', 'Maio', 'Xuño','Xullo','Agosto', 'Septembro','Outubro','Novembro');
var diasem=new Array('Domingo','Luns','Martes','Mércores','Xoves','Venres','Sábado');
function getFecha()
  {
    return diasem[diase]+' '+diames+' de '+mesano[mes+1]+' do '+ano;
  }

function tempomapa()
{
var partedia;
if (hora>=6 && hora<14)
{
partedia="M";document.getElementById('martempo').innerHTML='Mapa coa predicción das 07:00 as 14:00 horas do '+getFecha();
}
else if (hora>=14 && hora<21)
{
partedia="T";document.getElementById('martempo').innerHTML='Mapa coa predicción das 14:00 as 20:00 horas do '+getFecha();
}
 else if (hora>=21 || hora<6)
{
partedia="N";
if(hora<=23){
document.getElementById('martempo').innerHTML='Mapa coa predicción das 20:00 horas do '+getFecha()+' as 07:00 do '+diasem[(diase+1)]+' de '+mesano[mes+1]+' do '+ano;
}
else{
document.getElementById('martempo').innerHTML='Mapa coa predicción ata as 07:00 do '+getFecha();
}

}
else
{
partedia="N";
}
var enlace="http://www.meteogalicia.es/web/predicion/cprazo/getImaxe"+partedia+".action?dia=0";
document.getElementById("mapa_temp").innerHTML="<img  border='3' id='mapatempo' name='mapatempo' alt='mapa_tempo' style='width:100%;height:auto;border-color:purple;border-style:groove;overflow:hidden' src="+enlace+" >";
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
$( "#datepicker" ).datepicker({maxDate: "+0d"}).datepicker("setDate", new Date());
}
function recfecha(){

$.datepicker.setDefaults($.datepicker.regional['gl']);
$( "#datepicker" ).datepicker({maxDate: "+0d"});
}
<?php
try {
$medicions=simplexml_load_file("dahimeteo.xml");
}
catch (Exception $e) {
   
}
$datas="";
$tmedias="";
$tmaximas="";
$tminimas="";
$choiva="";
 
for($i=0;$i<count($medicions->Valores);$i++) 
  {
      
      for($j=0;$j<count($medicions->Valores[$i]->Medida);$j+=6){
      if($medicions->Valores[$i]->Medida[$j]['Codigo_validacion']==1)
      {
      $datas=$datas."'".date("Y-m-d",strtotime(str_replace("/","-", $medicions->Valores[$i]['Data'])))."',";
      $tmedias=$tmedias.str_replace(",",".",$medicions->Valores[$i]->Medida[$j]['Valor']).",";
      }
      if($medicions->Valores[$i]->Medida[$j+1]['Codigo_validacion']==1)
      {
      $tmaximas=$tmaximas.str_replace(",",".",$medicions->Valores[$i]->Medida[($j+1)]['Valor']).",";
      }
      if($medicions->Valores[$i]->Medida[$j+2]['Codigo_validacion']==1)
      {
      $tminimas=$tminimas.str_replace(",",".",$medicions->Valores[$i]->Medida[($j+2)]['Valor']).",";
      }
      if($medicions->Valores[$i]->Medida[$j+3]['Codigo_validacion']==1)
      $choiva=$choiva.str_replace(",",".",$medicions->Valores[$i]->Medida[($j+3)]['Valor']).",";
      }
      
  }
  $dat="['x',".trim($datas, ',')."]";
  $tmed="['TEMPERATURAS MEDIAS  ºC',".substr($tmedias,0,-1)."]";
  $tmax="['TEMPERATURAS MAXIMAS ºC',".substr($tmaximas,0,-1)."]";
  $tmin="['TEMPERATURAS MINIMAS ºC',".substr($tminimas,0,-1)."]";
  $choi="['CHUVIAS l/m2',".substr($choiva,0,-1)."]";
  echo ("var ex=".$dat.";\n");;
  echo ("var tmed=".$tmed.";\n");;
  echo ("var tmax=".$tmax.";\n");;
  echo ("var tmim=".$tmin.";\n");;
  echo ("var choi=".$choi.";\n");;

  echo ("var coltem=[".$tmed.",\n".$tmax.",\n".$tmin."];");
  echo ("var colchoi=[".$choi."];");

?>
//alert(coltem[0].length);
function grafica(){
    var chart= c3.generate({
    padding: {
        top: 5,
        right: 40,
        bottom: 5,
        left: 55,
    },
    data: {
        x: 'x',
        columns:[
         ex,
         coltem[0],
         coltem[1],
         coltem[2]
       ]
    },
    color: {
        pattern: ['#19FF00', '#BC3D2D','#3194B3']
    },
  
    grid: {
        x: {
            show: true
        },
        y: {
            show: true
        }
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '%m-%Y'
            }
        
        },
        y: {
            padding: {left:0}

        }
        
}});
}
function graficachu(){
    var chart= c3.generate({
    padding: {
        top: 5,
        right: 40,
        bottom: 5,
        left: 55,
    },
    data: {
        x: 'x',
        columns:[
         ex,
         colchoi[0]
       ]
    },
    color: {
        pattern: ['#03D0E2']
    },
  
    grid: {
        x: {
            show: true
        },
        y: {
            show: true
        }
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '%m-%Y'
            }
        
        },
        y: {
            padding: {left:0}

        }
        
}});
}
function actboton(){
$("#enviarfecha").click(function(){
  var val=$("#datepicker").val();
    if(val!=="" ){
     enviamos($("#datepicker").val(),'taboa',2);
     enviamos($("#datepicker").val(),'titulop',1);
  }
});
}
function enviamos(a,capa,opc){
//alert(a+capa+tipo);
$.ajax({
        type:  'POST',
        url:   'datostempo.php',
        data:  { "data":a,"opc":opc }
         }).done(function( msg ) {
         $("#"+capa).html(msg);
         }).fail(function (jqXHR, textStatus, errorThrown){
          alert("Erro :( -> "+ textStatus +" "+ errorThrown);
        });

}

function colocaTaboas(){if($("#t1").hasClass("metade")==false){$("#t1").addClass("metade");$("#t2").addClass("metade");}}
function descolocaTaboas(){if($("#t1").hasClass("metade")==true){$("#t1").removeClass("metade");$("#t2").removeClass("metade");}}
//function altframes(){ $("#framesta").height(500);$("#frameprea").height(600);}


function adapan(){
if($(window).width()<760){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");

  descolocaTaboas();
}
if($(window).width()>760)
{$("#menu").removeClass("navbar-fixed-top");
$("#menu").addClass("navbar-default");
$("#mostrar").removeClass("altura");
$("#mostrar").height($(window).height()*0.93);
$("#contidotaboas").height($(window).height()*0.80);
descolocaTaboas();
}
if($(window).width()>1250){colocaTaboas()}
}
$(window).resize(function() {
adapan();
});

adapan();
grafica();
actfecha();
actboton();
//altframes();
tempomapa();
//alert("fecha:   "+(diase+1));


</script>
</body>
</html>

