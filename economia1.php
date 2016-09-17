<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Xinzo de Limia</title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="estilos/estilo.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="scripts/Donut3D.js"></script>
</head>
<body>
<div class="container">
<header>
<nav class="navbar navbar-default fondoheader">
<div class="container-fluid">
<div class="navbar-header">
<img src="imaxes/escudob.png" alt="escudo menu" title="escudo menu" class="navbar-toggle colorp" data-toggle="collapse" data-target="#enpri">
</div>
<div class="collapse navbar-collapse" id="enpri">
<ul class="nav navbar-nav">
<li class="colorx"><a href="index.php" class="efectotexto"><span class="btn-lg texto">Xeral</span></a></li>
<li class="colorp"><a href="poboacion.php" class="efectotexto"><span  class="btn-lg texto">Poboación</span></a></li>
<li class="colore"><a href="#" class="efectotexto"><span  class="btn-lg texto">Economía</span></a></li>
<li class="colort"><a href="#" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm"><a href="#" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori"><a href="#" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
</ul>
</div>
</div>
</nav>
</header>

<article>
<div class="row coloref margenarriba">
<div class="col-sm-8">
<hr>
<ul class="nav nav-tabs">
    <li><a data-toggle="tab" class="colore" href="#des" onclick="grafiparo()">Desemprego</a></li>
    <li><a data-toggle="tab" class="colore" href="#afil" onclick="grafafil()">Afiliación S.S.</a></li>
    <li><a data-toggle="tab" class="colore" href="#deb">Débeda</a></li>
    <li><a data-toggle="tab" class="colore" href="#debp">Débeda Pública</a></li>
</ul>
<div class="tab-content">
<div id="des" class="tab-pane fade in active">
<div id="taboa">
<?php 
header('Content-type: text/html; charset=UTF-8');
$ano=date('Y');
$mes=date('m');
$dia=date('d');
if($dia<10 && $mes>1){$mes=$mes-1;}//para que os datos esten sempre actualizados
if($mes==1) {$ano=$ano-1;$mes=12;}
$urlp="http://www.ige.eu/igebdt/igeapi/datos/742/0:".$ano.$mes.",9915:32032";
$urle="http://www.ige.eu/igebdt/igeapi/datos/744/4:".$ano.$mes.",9915:32032";
$urle1="http://www.ige.eu/igebdt/igeapi/datos/7133/0:201509,9915:32032";
$datosp=explode(',',eregi_replace('"|32032',"",file_get_contents($urlp)));
$datose=explode(',',eregi_replace('"|32032',"",file_get_contents($urle)));
$datose1=explode(',',eregi_replace('"|32032',"",file_get_contents($urle1)));

/*for($i=0;$i<count($datose1);$i++)
{
echo $i."  ".$datose1[$i]."<br>";
}*/


//echo $ano."  ".$mes."  ".$dia."<hr>";
$meses=array("Xaneiro","Febreiro","Marzo","Abril","Maio","Xuño","Xullo",
"Agosto","Septembro","Outubro","Novembro","Decembro");
echo("<div class='table-responsive' >      
  <table class='table'>
    <thead>
      <tr class='textotate'><th colspan='5' class='texto centro' id='lenda'>Desemprego por réxime mes de "
      .substr($datosp[8],strpos($datosp[8],"/")+1,strlen($datosp[8]))." do "
      .substr($datosp[8],0,strpos($datosp[8],"/"))."</th><th>
      <a href='#'><img src='imaxes/pie_chart.png' alt='gráfica' title='gráfica' onclick='grafiparo()'></a></th></tr><tr><th colspan='6'></th></tr>
      <tr class='textotate'>
        <th class='textote centro'>REXIME</th>
        <th class='textote centro'>HOMES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>MULLERES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>TOTAL</th>
      </tr>
    </thead>
    <tbody>
    <tr class='textote' id='ag' onmouseover=colora(this.id,'3366CC') onmouseout=sincolor(this.id)>
        <td id='ra'   class='textota2'>".$datosp[30]."</td>
        <td id='ha'   class='textote'>".$datosp[41]."</td>
        <td id='pha'  class='textote'>".round(($datosp[41]/$datosp[34])*100,2)."</td>
        <td id='ma'   class='textote'>".$datosp[48]."</td>
        <td id='pma'  class='textote'>".round(($datosp[48]/$datosp[34])*100,2)."</td>
        <td id='at'   class='textote'>".$datosp[34]."</td>
        </tr><tr class='textote' id='ig' onmouseover=colora(this.id,'DC3912') onmouseout=sincolor(this.id)>
        <td id='ri'   class='textota2'>".$datosp[51]."</td>
        <td id='hi'   class='textote'>".$datosp[62]."</td>
        <td id='ph'  class='textote'>".round(($datosp[62]/$datosp[55])*100,2)."</td>
        <td id='mi'   class='textote'>".$datosp[69]."</td>
        <td id='pmi'  class='textote'>".round(($datosp[69]/$datosp[55])*100,2)."</td>
        <td id='it'   class='textote'>".$datosp[55]."</td>
        </tr><tr class='textote' id='cg' onmouseover=colora(this.id,'FF9900') onmouseout=sincolor(this.id)>
        <td id='rc'   class='textota2'>Construcción</td>
        <td id='hc'   class='textote'>".$datosp[83]."</td>
        <td id='phc'  class='textote'>".round(($datosp[83]/$datosp[76])*100,2)."</td>
        <td id='mc'   class='textote'>".$datosp[90]."</td>
        <td id='pmc'  class='textote'>".round(($datosp[90]/$datosp[76])*100,2)."</td>
        <td id='ct'   class='textote'>".$datosp[76]."</td>
        </tr><tr class='textote' id='sg' onmouseover=colora(this.id,'109618') onmouseout=sincolor(this.id)>
        <td id='rs'   class='textota2'>".$datosp[100]."</td>
        <td id='hs'   class='textote'>".$datosp[104]."</td>
        <td id='phs'  class='textote'>".round(($datosp[104]/$datosp[97])*100,2)."</td>
        <td id='ms'   class='textote'>".$datosp[111]."</td>
        <td id='pms'  class='textote'>".round(($datosp[111]/$datosp[97])*100,2)."</td>
        <td id='st'   class='textote'>".$datosp[97]."</td>
        </tr><tr class='textote' id='eg' onmouseover=colora(this.id,'EFE836') onmouseout=sincolor(this.id)>
        <td id='re'   class='textota2'>".$datosp[121]."</td>
        <td id='he'   class='textote'>".$datosp[125]."</td>
        <td id='phe'  class='textote'>".round(($datosp[125]/$datosp[118])*100,2)."</td>
        <td id='me'   class='textote'>".$datosp[132]."</td>
        <td id='pme'  class='textote'>".round(($datosp[132]/$datosp[118])*100,2)."</td>
        <td id='et'   class='textote'>".$datosp[118]."</td>
        </tr>
        </tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textote centro'>TOTAIS:</th>
        <th class='textote centro'>".$datosp[20]."</th>
        <th class='textote centro'>".round(($datosp[20]/$datosp[13])*100,2)."</th>
        <th class='textote centro'>".$datosp[27]."</th>
        <th class='textote centro'>".round(($datosp[27]/$datosp[13])*100,2)."</th>
        <th class='textote centro'>".$datosp[13]."</th>
      </tr>
    </tfoot>
</table></div>
<div class='table-responsive'>      
  <table class='table'>
    <thead>
     <tr class='textotate'><th colspan='4' class='texto centro'>Taxa de desemprego "
      .substr($datose[10],strpos($datose[10],"/")+1,strlen($datose[10]))." do "
      .substr($datose[10],0,strpos($datose[10],"/"))."</th>
      <th colspan='2' class='texto centro'>".round(($datosp[13]/($datosp[13]+$datose1[13])*100),2)." %</th><thead></table></div>

<div class='table-responsive'>      
  <table class='table'>
    <thead>
     <tr class='textotate'><th colspan='5' class='texto centro' id='lenda1'>Desemprego por idades mes de "
      .substr($datose[10],strpos($datose[10],"/")+1,strlen($datose[10]))." do "
      .substr($datose[10],0,strpos($datose[10],"/"))."</th>
      <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafidades()' alt='gráfica' title='gráfica'></a></th></tr><tr><th colspan='6'></th></tr>
      <tr class='textotate'>
        <th class='textote centro'>IDADES</th>
        <th class='textote centro'>HOMES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>MULLERES</th>
        <th class='textote centro'>%</th>
        <th class='textote centro'>TOTAL</th>
      </tr>
    </thead>
    <tbody>
    <tr class='textote' id='me25g' onmouseover=colora(this.id,'DC3912') onmouseout=sincolor(this.id)>
        <td id='men'   class='textota2'>".$datose[15]."</td>
        <td id='hme'   class='textote'>".$datose[41]."</td>
        <td id='phme'  class='textote'>".round(($datose[41]/$datose[20])*100,2)."</td>
        <td id='mme'   class='textote'>".$datose[62]."</td>
        <td id='pme'  class='textote'>".round(($datose[62]/$datose[20])*100,2)."</td>
        <td id='met'   class='textote'>".$datose[20]."</td>
        </tr><tr class='textote' id='ma25g' onmouseover=colora(this.id,'109618') onmouseout=sincolor(this.id)>
        <td id='mai'   class='textota2'>Maiores de 25 anos</td>
        <td id='hma'   class='textote'>".$datose[48]."</td>
        <td id='phma'  class='textote'>".round(($datose[48]/$datose[27])*100,2)."</td>
        <td id='mma'   class='textote'>".$datose[69]."</td>
        <td id='pmma'  class='textote'>".round(($datose[69]/$datose[27])*100,2)."</td>
        <td id='mat'   class='textote'>".$datose[27]."</td>
        </tr>
        </tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textota centro'>TOTAIS:</th>
        <th class='textota centro'>".$datose[34]."</th>
        <th class='textota centro'>".round(($datose[34]/$datose[13])*100,2)."</th>
        <th class='textota centro'>".$datose[55]."</th>
        <th class='textota centro'>".round(($datose[55]/$datose[13])*100,2)."</th>
        <th class='textota centro'>".$datose[13]."</th>
      </tr>
    </tfoot>
</table></div>
<div class='form-group text-right'>
<label for='sele'>Seleccione ano:</label><select id='sele' name='sele' class='selectpicker' id='selano'>");
for($i=2008;$i<(date('Y'));$i++)
{
echo("<option>".$i."</option>");
}
echo ("</select><label for='sele1'> e mes:</label><select id='sele1' name='sele1' class='selectpicker' id='selemes'>");
for ($i=1;$i<=count($meses);$i++)
{
echo ("<option value='".$i."'>".$meses[$i-1]."</option>");
}
echo ("</select><label>para ver os datos.</label>
    <button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' 
    onclick=cargar(sele1.value,sele.value,'taboa','taboa')>Ver</button></div>");
?>

</div>
    </div>
    <div id="afil" class="tab-pane fade">

    <?php
/*for($i=0;$i<count($datose1);$i++)
{
echo $i."  ".$datose1[$i]."<br>";
} */
    echo("
    <div class='table-responsive'><table class='table'>
    <thead>
    <tr class='textotate'><th colspan='5' class='texto centro' id='lenda2'>Afiliación por idades mes de "
    .substr($datose1[8],strpos($datose1[8],"/")+1,strlen($datose1[8]))." do "
    .substr($datose1[8],0,strpos($datose1[8],"/"))."</th>
    <th><a href='#'><img src='imaxes/pie_chart.png' onclick='grafidades()' alt='gráfica' title='gráfica'></a></th></tr><tr><th colspan='6'></th></tr>
    <tr class='textotate'>
    <th class='textote centro'>IDADES</th>
    <th class='textote centro'>HOMES</th>
    <th class='textote centro'>%</th>
    <th class='textote centro'>MULLERES</th>
    <th class='textote centro'>%</th>
    <th class='textote centro'>TOTAL</th>
    </tr>
    </thead>");
    $id=17;
    $h=97;
    $t=20;
    $m=174;
    
    for ($i=0;$i<10;$i++){
      echo("
        <tbody><tr class='textote'>
        <td id='i".$i."'  class='textote'>".$datose1[$id]."</td>
        <td id='h".$i."'  class='textote'>".$datose1[$h]."</td>
        <td id='ph".$i."' class='textote'>".round(($datose1[$h]/$datose1[$t])*100,2)."</td>
        <td id='m".$i."'  class='textote'>".$datose1[$m]."</td>
        <td id='pm".$i."' class='textote'>".round(($datose1[$m]/$datose1[$t])*100,2)."</td>
        <td id='t".$i."'  class='textote'>".$datose1[$t]."</td></tr>");
        $id=$id+7;$h=$h+7;$t=$t+7;$m=$m+7;
      }
    echo("</tbody>
        <tfoot>
        <tr class='textotate'>
        <th class='textota centro'>TOTAIS:</th>
        <th class='textota centro'>".$datose1[90]."</th>
        <th class='textota centro'>".round(($datose1[90]/$datose1[13])*100,2)."</th>
        <th class='textota centro'>".$datose1[167]."</th>
        <th class='textota centro'>".round(($datose1[167]/$datose1[13])*100,2)."</th>
        <th class='textota centro'>".$datose1[13]."</th>
      </tr>
    </tfoot>
        </table></div>");
    ?>
    </div>
    <div id="deb" class="tab-pane fade">
     debeda
    </div>
    <div id="debpu" class="tab-pane fade">
    debeda publica
    </div>
  </div>
<div id="taboa">
<?php 
header('Content-type: text/html; charset=UTF-8');
$url="http://www.ige.eu/igebdt/igeapi/datos/100/0:2014,9915:32032";
$datos=explode(',',eregi_replace('[a-z]|"|32032',"",file_get_contents($url)));

for($i=0;$i<count($datos);$i++)
{
if (empty($datos[$i]))
{
array_splice($datos, $i,1);
}
}
/*for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}*/

?>
</div>
<hr>
</div>

<div id="quesito" class="col-sm-4">
<hr>
<div id="tituloquesito" class="titulografica">

</div>
</div>
<div class="col-sm-4" id="igeeco"> 
<script language="javascript" src="http://www.ige.eu/web/servlet/widgmarco?i=24;25;30;31;32;33;26;27;28&e=32032&l=gl&bg=E2CF85;000000&w=305"></script>
<noscript><a href="http://www.ige.eu">Instituto Galego de Estatística</a></noscript>

</div>
</article>	
</div>
<script type="text/javascript">
var datos, salesData;

    //alert(datos [0]);
function actualizaDatos()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[
    {label:"Agricultura/Pesca", color:"#3366CC",count:$("#at").html()},
    {label:"Industria", color:"#DC3912",count:$("#it").html()},
    {label:"Construcción", color:"#FF9900",count:$("#ct").html()},
    {label:"Servizos", color:"#109618",count:$("#st").html()},
    {label:"Sen emprego anterior", color:"#EFE836",count:$("#et").html()}];
}
function grafidades()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"Menores de 25", color:"#DC3912",count:$("#met").html()},
    {label:"Maiores de 25", color:"#109618",count:$("#mat").html()}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda1").html());    
}
function grafafil()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
salesData=[
    {label:"< 20", color:"#3366CC",count:$("#t0").html()},
    {label:"20-24", color:"#DC3912",count:$("#t1").html()},
    {label:"25-29", color:"#FF9900",count:$("#t2").html()},
    {label:"30-34", color:"#109618",count:$("#t3").html()},
    {label:"35-39", color:"#EFE836",count:$("#t4").html()},
    {label:"40-44", color:"#9F1CE4",count:$("#t5").html()},
    {label:"45-49", color:"#1CE2E4",count:$("#t6").html()},
    {label:"50-54", color:"#57E41C",count:$("#t7").html()},
    {label:"55-59", color:"#ED8876",count:$("#t8").html()},
    {label:"> 60",  color:"#373A70",count:$("#t9").html()}];
//alert($("#lenda1").html());
borraGrafica();
dibujaGrafica();
grafica($("#lenda2").html());    
}
function grafiparo()
{
//datos=[$("#at").html(),$("#it").html(),$("#ct").html(),$("#st").html(),$("#et").html()];
salesData=[];
actualizaDatos();
borraGrafica();
dibujaGrafica();
grafica($("#lenda").html());    
}        

function dibujaGrafica()
{
var svg = d3.select("#quesito").append("svg").attr("width",'9%').attr("height",300);

//svg.append("g").attr("id","salesDonut");
svg.append("g").attr("id","quotesDonut");
//Donut3D.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);
//Donut3D.draw("quotesDonut", randomData(), 150, 130, 130, 100, 30, 0);

$("#tituloquesito").html($("#lenda").html());

function randomData(){
    return salesData.map(function(d){ 
        return {label:d.label, value:d.count, color:d.color};});
}
}
function borraGrafica()
{
$("svg").remove();
}
function cargar(mes,ano,capa){
    //alert(mes+" "+ano+" "+capa+" "+opc);
    $.ajax({
        type:  'POST',
        url:   'datoseconomia.php',
        data:  {"mes":mes,"ano":ano},
         }).done(function( msg ) {
          $(document).ajaxSuccess(function(){
           $("#"+capa).html(msg);
           //actualizaDatos(); 
         });
         }).fail(function (jqXHR, textStatus, errorThrown){
          $("#"+capa).html("Produciuse un erro: "+ textStatus +" "+ errorThrown);
        });
$(document).ajaxComplete(function(){
    
    grafiparo();  
    
}); 

}

function grafica(titulo){
    
    $("#tituloquesito").html(titulo);
    //actualizaDatos();     
    
    //alert(datos[3]);
    function Data(){

    return salesData.map(function(d){ 
        return {label:d.label, value:d.count, color:d.color};});
    }

   
    Donut3D.transition("quotesDonut",Data(), 130, 100, 30, 0);
    //Donut3D.draw("quotesDonut", randomData(), 150, 130, 130, 100, 30, 0);
      
    
}


function colora(a,b)
{
//alert(a+"  "+b);
var color;
color="linear-gradient(#"+b+" 30%, #F2F2F2 100%)";
//alert(color);
$("#"+a).css({"background": color}); 
}
function sincolor(a)
{
//alert(a);
$("#"+a).css({"background": "transparent"}); 
}

actualizaDatos();
dibujaGrafica($("#lenda").html());
  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('quesito'));
        chart.draw(data, options);
      }
</script>

</body>

</html>