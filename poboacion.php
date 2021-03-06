<!DOCTYPE html>
<html lang="gl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="xinzo de limia poboación" />
<meta name="keywords" content="xinzo de limia poboación,xinzo de limia población, xinzo de limia habitantes, ginzo de limia población, ginzo de limia habitantes" />
<title>Poboación <?php require_once('configuracion.php'); echo $nomeMunicipio;?></title>
<link rel="icon" href="imaxes/escudob.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="estilos/estilo.css">
<link rel="stylesheet" href="estilos/c3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="scripts/c3.js"></script>
<script src="scripts/scripts.js"></script>
<noscript><p><img src="//xinzodelimia.esy.es/visitas/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
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
<li class="colorp" id="tabpoboa"><a href="#" class="efectotexto"><span  class="btn-lg texto">Poboación</span></a></li>
<li class="colore" id="tabecono"><a href="economia.php" class="efectotexto"><span  class="btn-lg texto">Economía</span></a></li>
<li class="colort" id="tabtempo"><a href="tempo.php" class="efectotexto"><span  class="btn-lg texto">O Tempo</span></a></li>
<li class="colorm" id="tabmapas"><a href="mapas.php" class="efectotexto"><span  class="btn-lg texto">Mapas</span></a></li>
<li class="colori" id="tabimaxe"><a href="imaxes.php" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
<li class="colormed" id="tabnatur"><a href="medio.php" class="efectotexto"><span  class="btn-lg texto">Medio</span></a></li>
</ul>
</div>
</div>
</nav>
</header>
<article>
<div class="row colorpf margenarriba" id="mostrar">
<div class="col-md-8 col-lg-9 col-sm-8">
<hr>
<div id="taboa" class="over" >
<div id="datosmostrar" class="over">
<?php 
//header('Content-type: text/html; charset=UTF-8');
$url="http://www.ige.eu/igebdt/igeapi/datos/100/0:2015,9915:".$codIGE;
$filtro='/[A-Z]|[a-z]|"|'.$codIGE.'/';
$datos=explode(',',preg_replace($filtro,' ', file_get_contents($url)));

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

echo ("<h1 class='texto centro efectotexto'> Poboación de".$nomeMunicipio." ".$datos[7]."</h1><hr>");
echo("<div class='table-responsive'>          
  <table class='table'>
    <thead >
      <tr class='textotati'>
        <th class='textota centro'>IDADE</th>
        <th class='textota centro'>HOMES</th>
        <th class='textota centro'>%</th>
        <th class='textota centro'>MULLERES</th>
        <th class='textota centro'>%</th>
        <th class='textota centro'>TOTAL</th>
      </tr>
    </thead>
    <tbody>");
    $id=17;
    $h=153;
    $t=20;
    $m=286;
    for ($i=0;$i<18;$i++){
      echo("<tr class='textota'>
        <td id='i".$i."' class='textota' onmouseover=colora('uno".$i."',1),colora('dos".$i."',1),colora(this.id,1)  
        onmouseout=colora('uno".$i."',2),colora('dos".$i."',2),colora(this.id,3) >".$datos[$id]."</td>
        <td id='h".$i."' class='textota' onmouseover=colora('uno".$i."',1),colora(this.id,1)  onmouseout=colora('uno".$i."',2),colora(this.id,3)>".$datos[$h]."</td>
        <td id='ph".$i."'class='textota' onmouseover=colora('uno".$i."',1),colora(this.id,1)  onmouseout=colora('uno".$i."',2),colora(this.id,3)>".round(($datos[$h]/$datos[$t])*100,2)."</td>
        <td id='m".$i."' class='textota' onmouseover=colora('dos".$i."',1),colora(this.id,1)  onmouseout=colora('dos".$i."',2),colora(this.id,3) >".$datos[$m]."</td>
        <td id='pm".$i."'class='textota' onmouseover=colora('dos".$i."',1),colora(this.id,1)  onmouseout=colora('dos".$i."',2),colora(this.id,3)>".round(($datos[$m]/$datos[$t])*100,2)."</td>
        <td id='t".$i."' class='textota' onmouseover=colora('uno".$i."',1),colora('dos".$i."',1),colora(this.id,1) 
         onmouseout=colora('uno".$i."',2),colora('dos".$i."',2),colora(this.id,3) >".$datos[$t]."</td></tr>");
        $id=$id+7;$h=$h+7;$t=$t+7;$m=$m+7;
      }
    echo("<tfoot>
      <tr class='textotati'>
        <th class='textota centro'>TOTAIS:</th>
        <th class='textota centro'>".$datos[146]."</th>
        <th class='textota centro'>".round(($datos[146]/$datos[13])*100,2)."</th>
        <th class='textota centro'>".$datos[279]."</th>
        <th class='textota centro'>".round(($datos[279]/$datos[13])*100,2)."</th>
        <th class='textota centro'>".$datos[13]."</th>
      </tr>
    </tfoot>");
echo("</tbody></table></div><div class='form-group text-right'>
 <label for='sele'>Seleccione ano para ver os datos:</label><select id='sele' name='sele' class='selectpicker' id='selano'>");
for($i=1998;$i<(date('Y'));$i++)
{
echo("<option>".$i."</option>");
}
echo ("</select><button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' onclick=enviamos(sele.value,'datosmostrar','datosmostrar'),enviamos(sele.value,'piramide_poboacion','grafica')>Ver</button></div>");
?>
</div>
 <button type="submit" class="btn btn-primary btn-sm" id="botongraf" style="margin:-30px auto auto 45%;" onclick="" >Ver Gráfica</button>
<div  id="chart" class="grafilineas oculto"></div>
<br>
&nbsp;
<br>
</div>
</div>
<div id="piramide_poboacion" class="col-md-4 col-lg-3 col-sm-4" >  
<hr>
<div id="grafica_poboacion" class="contgraf" >
<div id="piramide" class="piram">
<center><span class="titulopiram">PIRAMIDE POBOACION:&nbsp;&nbsp;
<?php echo (date('Y')-1)?></span></center>
<div id="izquierda" class="sinborde">
<div id="tituloizq" class="titulos">HOMES</div>
<div id="uno17"  onmouseover="colora(this.id,1),colora('h17',1),colora('ph17',1)" onmouseout="colora(this.id,2),colora('h17',3),colora('ph17',3)" class="esquerda" style="width:<?php echo round($datos[272],0)/3?>px" title="<?php echo round($datos[272],0)?>" ></div>
<div id="uno16"  onmouseover="colora(this.id,1),colora('h16',1),colora('ph16',1)" onmouseout="colora(this.id,2),colora('h16',3),colora('ph16',3)" class="esquerda" style="width:<?php echo round($datos[265],0)/3?>px" title="<?php echo round($datos[265],0)?>" ></div>
<div id="uno15"  onmouseover="colora(this.id,1),colora('h15',1),colora('ph15',1)" onmouseout="colora(this.id,2),colora('h15',3),colora('ph15',3)" class="esquerda" style="width:<?php echo round($datos[258],0)/3?>px" title="<?php echo round($datos[258],0)?>" ></div>
<div id="uno14"  onmouseover="colora(this.id,1),colora('h14',1),colora('ph14',1)" onmouseout="colora(this.id,2),colora('h14',3),colora('ph14',3)" class="esquerda" style="width:<?php echo round($datos[251],0)/3?>px" title="<?php echo round($datos[251],0)?>" ></div>
<div id="uno13"  onmouseover="colora(this.id,1),colora('h13',1),colora('ph13',1)" onmouseout="colora(this.id,2),colora('h13',3),colora('ph13',3)" class="esquerda" style="width:<?php echo round($datos[244],0)/3?>px" title="<?php echo round($datos[244],0)?>" ></div>
<div id="uno12"  onmouseover="colora(this.id,1),colora('h12',1),colora('ph12',1)" onmouseout="colora(this.id,2),colora('h12',3),colora('ph12',3)" class="esquerda" style="width:<?php echo round($datos[237],0)/3?>px" title="<?php echo round($datos[237],0)?>" ></div>
<div id="uno11"  onmouseover="colora(this.id,1),colora('h11',1),colora('ph11',1)" onmouseout="colora(this.id,2),colora('h11',3),colora('ph11',3)" class="esquerda" style="width:<?php echo round($datos[230],0)/3?>px" title="<?php echo round($datos[230],0)?>" ></div>
<div id="uno10"  onmouseover="colora(this.id,1),colora('h10',1),colora('ph10',1)" onmouseout="colora(this.id,2),colora('h10',3),colora('ph10',3)" class="esquerda" style="width:<?php echo round($datos[223],0)/3?>px" title="<?php echo round($datos[223],0)?>" ></div>
<div id="uno9"  onmouseover="colora(this.id,1),colora('h9',1),colora('ph9',1)"   onmouseout="colora(this.id,2),colora('h9',3),colora('ph9',3)"  class="esquerda" style="width:<?php echo round($datos[216],0)/3?>px" title="<?php echo round($datos[216],0)?>" ></div>
<div id="uno8"  onmouseover="colora(this.id,1),colora('h8',1),colora('ph8',1)"   onmouseout="colora(this.id,2),colora('h8',3),colora('ph8',3)"  class="esquerda" style="width:<?php echo round($datos[209],0)/3?>px" title="<?php echo round($datos[209],0)?>" ></div>
<div id="uno7" onmouseover="colora(this.id,1),colora('h7',1),colora('ph7',1)"   onmouseout="colora(this.id,2),colora('h7',3),colora('ph7',3)"  class="esquerda" style="width:<?php echo round($datos[202],0)/3?>px" title="<?php echo round($datos[202],0)?>" ></div>
<div id="uno6" onmouseover="colora(this.id,1),colora('h6',1),colora('ph6',1)"   onmouseout="colora(this.id,2),colora('h6',3),colora('ph6',3)"  class="esquerda" style="width:<?php echo round($datos[195],0)/3?>px" title="<?php echo round($datos[195],0)?>" ></div>
<div id="uno5" onmouseover="colora(this.id,1),colora('h5',1),colora('ph5',1)"   onmouseout="colora(this.id,2),colora('h5',3),colora('ph5',3)"  class="esquerda" style="width:<?php echo round($datos[188],0)/3?>px" title="<?php echo round($datos[188],0)?>" ></div>
<div id="uno4" onmouseover="colora(this.id,1),colora('h4',1),colora('ph4',1)"   onmouseout="colora(this.id,2),colora('h4',3),colora('ph4',3)"  class="esquerda" style="width:<?php echo round($datos[181],0)/3?>px" title="<?php echo round($datos[181],0)?>" ></div>
<div id="uno3" onmouseover="colora(this.id,1),colora('h3',1),colora('ph3',1)"   onmouseout="colora(this.id,2),colora('h3',3),colora('ph3',3)"  class="esquerda" style="width:<?php echo round($datos[174],0)/3?>px" title="<?php echo round($datos[174],0)?>" ></div>
<div id="uno2" onmouseover="colora(this.id,1),colora('h2',1),colora('ph2',1)"   onmouseout="colora(this.id,2),colora('h2',3),colora('ph2',3)"  class="esquerda" style="width:<?php echo round($datos[167],0)/3?>px" title="<?php echo round($datos[167],0)?>" ></div>
<div id="uno1" onmouseover="colora(this.id,1),colora('h1',1),colora('ph1',1)"   onmouseout="colora(this.id,2),colora('h1',3),colora('ph1',3)"  class="esquerda" style="width:<?php echo round($datos[160],0)/3?>px" title="<?php echo round($datos[160],0)?>" ></div>
<div id="uno0" onmouseover="colora(this.id,1),colora('h0',1),colora('ph0',1)"   onmouseout="colora(this.id,2),colora('h0',3),colora('ph0',3)"  class="esquerda" style="width:<?php echo round($datos[153],0)/3?>px" title="<?php echo round($datos[153],0)?>" ></div>
</div>
<div id="centro" class="centrograf">
<div id="titulocentro" class="titulos2">--IDADE--</div>
<div id="cero2" class="titulos1 verben" >>=85</div>
<div id="cero3" class="titulos1 verben" >80-84</div>
<div id="cero4" class="titulos1 verben" >75-79</div>
<div id="cero5" class="titulos1 verben" >70-74</div>
<div id="cero6" class="titulos1 verben" >65-69</div>
<div id="cero7" class="titulos1 verben" >60-64</div>
<div id="cero8" class="titulos1 verben" >55-59</div>
<div id="cero9" class="titulos1 verben" >50-54</div>
<div id="cero10" class="titulos1 verben" >45-49</div>
<div id="cero11" class="titulos1 verben" >40-44</div>
<div id="cero12" class="titulos1 verben" >35-39</div>
<div id="cero13" class="titulos1 verben" >30-34</div>
<div id="cero14" class="titulos1 verben" >25-29</div>
<div id="cero15" class="titulos1 verben" >20-24</div>
<div id="cero16" class="titulos1 verben" >15-19</div>
<div id="cero17" class="titulos1 verben" >10-14</div>
<div id="cero18" class="titulos1 verben" >5-9</div>
<div id="cero19" class="titulos1 verben" >0-4</div>
</div>
<div id="derecha" class="sinbordeder" >
<div id="tituloder" class="titulos">MULLERES</div>
<div id="dos17"  onmouseover="colora(this.id,1),colora('m17',1),colora('pm17',1)" onmouseout="colora(this.id,2),colora('m17',3),colora('pm17',3)" class="dereita" style="width:<?php echo round($datos[405],0)/3?>px"  title="<?php echo round($datos[405],0)?>"></div>
<div id="dos16"  onmouseover="colora(this.id,1),colora('m16',1),colora('pm16',1)" onmouseout="colora(this.id,2),colora('m16',3),colora('pm16',3)" class="dereita" style="width:<?php echo round($datos[398],0)/3?>px"  title="<?php echo round($datos[398],0)?>"></div>
<div id="dos15"  onmouseover="colora(this.id,1),colora('m15',1),colora('pm15',1)" onmouseout="colora(this.id,2),colora('m15',3),colora('pm15',3)" class="dereita" style="width:<?php echo round($datos[391],0)/3?>px"  title="<?php echo round($datos[391],0)?>"></div>
<div id="dos14"  onmouseover="colora(this.id,1),colora('m14',1),colora('pm14',1)" onmouseout="colora(this.id,2),colora('m14',3),colora('pm14',3)" class="dereita" style="width:<?php echo round($datos[384],0)/3?>px"  title="<?php echo round($datos[384],0)?>"></div>
<div id="dos13"  onmouseover="colora(this.id,1),colora('m13',1),colora('pm13',1)" onmouseout="colora(this.id,2),colora('m13',3),colora('pm13',3)" class="dereita" style="width:<?php echo round($datos[377],0)/3?>px"  title="<?php echo round($datos[377],0)?>"></div>
<div id="dos12"  onmouseover="colora(this.id,1),colora('m12',1),colora('pm12',1)" onmouseout="colora(this.id,2),colora('m12',3),colora('pm12',3)" class="dereita" style="width:<?php echo round($datos[371],0)/3?>px"  title="<?php echo round($datos[371],0)?>"></div>
<div id="dos11"  onmouseover="colora(this.id,1),colora('m11',1),colora('pm11',1)" onmouseout="colora(this.id,2),colora('m11',3),colora('pm11',3)" class="dereita" style="width:<?php echo round($datos[364],0)/3?>px"  title="<?php echo round($datos[364],0)?>"></div>
<div id="dos10"  onmouseover="colora(this.id,1),colora('m10',1),colora('pm10',1)" onmouseout="colora(this.id,2),colora('m10',3),colora('pm10',3)" class="dereita" style="width:<?php echo round($datos[357],0)/3?>px"  title="<?php echo round($datos[357],0)?>"></div>
<div id="dos9"  onmouseover="colora(this.id,1),colora('m9',1),colora('pm9',1)"   onmouseout="colora(this.id,2),colora('m9',3),colora('pm9',3)" class="dereita" style="width:<?php echo round($datos[350],0)/3?>px"  title="<?php echo round($datos[350],0)?>"></div>
<div id="dos8"  onmouseover="colora(this.id,1),colora('m8',1),colora('pm8',1)"   onmouseout="colora(this.id,2),colora('m8',3),colora('pm8',3)" class="dereita" style="width:<?php echo round($datos[343],0)/3?>px"  title="<?php echo round($datos[343],0)?>"></div>
<div id="dos7" onmouseover="colora(this.id,1),colora('m7',1),colora('pm7',1)"   onmouseout="colora(this.id,2),colora('m7',3),colora('pm7',3)" class="dereita" style="width:<?php echo round($datos[336],0)/3?>px"  title="<?php echo round($datos[336],0)?>"></div>
<div id="dos6" onmouseover="colora(this.id,1),colora('m6',1),colora('pm6',1)"   onmouseout="colora(this.id,2),colora('m6',3),colora('pm6',3)" class="dereita" style="width:<?php echo round($datos[329],0)/3?>px"  title="<?php echo round($datos[329],0)?>"></div>
<div id="dos5" onmouseover="colora(this.id,1),colora('m5',1),colora('pm5',1)"   onmouseout="colora(this.id,2),colora('m5',3),colora('pm5',3)" class="dereita" style="width:<?php echo round($datos[322],0)/3?>px"  title="<?php echo round($datos[322],0)?>"></div>
<div id="dos4" onmouseover="colora(this.id,1),colora('m4',1),colora('pm4',1)"   onmouseout="colora(this.id,2),colora('m4',3),colora('pm4',3)" class="dereita" style="width:<?php echo round($datos[315],0)/3?>px"  title="<?php echo round($datos[315],0)?>"></div>
<div id="dos3" onmouseover="colora(this.id,1),colora('m3',1),colora('pm3',1)"   onmouseout="colora(this.id,2),colora('m3',3),colora('pm3',3)" class="dereita" style="width:<?php echo round($datos[308],0)/3?>px"  title="<?php echo round($datos[308],0)?>"></div>
<div id="dos2" onmouseover="colora(this.id,1),colora('m2',1),colora('pm2',1)"   onmouseout="colora(this.id,2),colora('m2',3),colora('pm2',3)" class="dereita" style="width:<?php echo round($datos[301],0)/3?>px"  title="<?php echo round($datos[301],0)?>"></div>
<div id="dos1" onmouseover="colora(this.id,1),colora('m1',1),colora('pm1',1)"   onmouseout="colora(this.id,2),colora('m1',3),colora('pm1',3)" class="dereita" style="width:<?php echo round($datos[294],0)/3?>px"  title="<?php echo round($datos[294],0)?>"></div>
<div id="dos0" onmouseover="colora(this.id,1),colora('m0',1),colora('pm0',1)"   onmouseout="colora(this.id,2),colora('m0',3),colora('pm0',3)" class="dereita" style="width:<?php echo round($datos[287],0)/3?>px"  title="<?php echo round($datos[287],0)?>"></div>
</div>
</div>
</div>
<div>
<?php $urlwid="http://www.ige.eu/web/servlet/widgdat?i=29;12;13;14;15;16;17;21;20;18;19;22;23&l=gl&e=".$codIGE;?>
<iframe class="conwipoboa" frameborder="1" scrolling="no" src=<?php echo "'".$urlwid."'"; ?>>
</iframe>
<p style="text-align:center">
<a style="text-decoration: none; border: 0;" target="_blank" href="http://www.ige.eu"><img border="0" src="http://www.ige.eu/web/imgs/operacion.gif"/></a>
<a href="http://www.ige.eu">Instituto Galego de Estatística</a>
</p>
<hr>
<?php include ("creativecommons.html"); ?>
</div>

</div>

</article>  

</div>
<?php include ("contacto.html"); ?>
</body>
<script type="text/javascript">
//alert($(window).height()-40);
$("#tabpoboa").removeClass("colorp");
$("#tabpoboa").css({background:'#3B71B5',BorderTopRightRadius: 10,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabpoboa").css("border-bottom","4px #3B71B5 solid");

$("#botongraf").click(function(){
        $("#chart").slideToggle("slow");
        $('#taboa').animate({
                scrollTop: $(this).offset().top
            }, 2000);
        if($(this).text()=="Ver Gráfica"){$(this).text('Ocultar Gráfica');}
        else if($(this).text()=="Ocultar Gráfica"){$(this).text('Ver Gráfica');}

    });

function enviamos(a,capa,tipo){
//alert(a+capa+tipo);
$.ajax({
        type:  'POST',
        url:   'datospoboacion.php',
        data:  { "ano":a,"tipo":tipo }
         }).done(function(msg) {
         $("#"+capa).html(msg);
         }).fail(function (jqXHR, textStatus, errorThrown){
          alert("Erro :( -> "+ textStatus +" "+ errorThrown);
        });

}
function colora(a,b)
{
//alert(a+"  "+b);
var color;
if (b == 1) {color="linear-gradient(#D8214E 0%, #555555 100%)";}
else if (b == 2) {color="linear-gradient(#3974C0 0%, #555555 100%)";}
else {color="transparent"}
//alert(color);
$("#"+a).css({"background": color}); 
}
function colord(a)
{
//alert(a);
$("#"+a).css({"background": "linear-gradient(#3974C0 0%, #555555 100%)"}); 
}

<?php
$url="http://www.ige.eu/igebdt/igeapi/datos/1558/9915:".$codIGE;
$datos=explode(',',preg_replace('/"|[a-zA-Z]/',' ',file_get_contents($url)));

$anos="";
$xente="";

    $a=6;
    $num=9;
  
    for ($i=0;$i<(count($datos)/5)-2;$i++){
   
    $anos=$anos."'".trim($datos[$a])."-12-31',";
    $xente=$xente.$datos[$num].",";
    $a=$a+5;$num=$num+5;   
    }

 
 //echo ("<hr>".$json."<hr>"); 
$anos="['x','1842-12-31','1877-12-31','1887-12-31','1897-12-31','1900-12-31','1910-12-31','1920-12-31','1930-12-31','1940-12-31','1950-12-31','1960-12-31','1970-12-31',".trim($anos, ',')."]";
$xente="['HABITANTES',4070,5417,5522,5594,5717,6476,7081,9105,9466,10358,10031,10925,".substr($xente,0,-1)."]";

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
         <?php echo $anos;?>,
         <?php echo $xente;?>,
       ]
    },
    color: {
        pattern: ['#3B71B5']
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

function adapan(){

if($(window).width()<=760)
{
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  $("#taboa").css("overflow", "auto");
  $("#chart").removeClass("oculto");
  $("#botongraf").css("visibility","hidden");
  //alert($(window).width());
  normal();
  
}

if($(window).width()>760)
  {
  $("#menu").removeClass("navbar-fixed-top");
  $("#menu").addClass("navbar-default");
  $("#mostrar").removeClass("altura");
  //$("#mostrar").height($(window).height()*0.93);
  $("#taboa").height($(window).height()*0.88); 
  $("#chart").addClass("oculto");
  //$("#chart").css("display","none");
  $("#botongraf").css("visibility","visible");
  }
if($(window).width() < 1100 && $(window).width() >760) {acortar();}
if($(window).width() > 1100) {normal();}
}
$(window).resize(function() {
adapan();
});
adapan();
grafica();

</script>
</html>
