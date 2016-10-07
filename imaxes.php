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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<li class="colori" id="tabimaxe"><a href="#" class="efectotexto"><span  class="btn-lg texto">Imaxes</span></a></li>
<li class="colormed" id="tabnatur"><a href="medio.php" class="efectotexto"><span  class="btn-lg texto">Medio</span></a></li>
<!--<a class="navbar-brand" href="#"><button class="iconarr"><img src="imaxes/escudo.ico"></button></a>-->
</ul>
</div>
</div>
</nav>
</header>
<article>
<div class="row colorif margenarriba" id="mostrar">
<div class="col-md-8 col-lg-9 col-sm-8" id="xeralimaxes" >
<hr>
<div id="myCarousel" class="carousel slide" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0"  class="active" ><img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/Casa_do_concello%2C_Xinzo_de_Limia%2C_Ourense_12.JPG" alt="Casa do concello" class="imgprev" ></li>
    <li data-target="#myCarousel" data-slide-to="1" ><img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Casa_da_cultura_e_xuventude%2C_Xinzo_de_Limia%2C_Ourense_03.JPG" alt="Casa da cultura e xuventude" class="imgprev"></li>
    <li data-target="#myCarousel" data-slide-to="2"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Igrexa_de_Santa_Mari%C3%B1a_de_Xinzo_de_Limia.jpg" alt="Igrexa de Santa Mariña" class="imgprev"></li>
    <li data-target="#myCarousel" data-slide-to="3"><img src="https://contosdorio.files.wordpress.com/2012/05/p1050933.jpg" alt="Panorámica" class="imgprev" title="https://contosdorio.wordpress.com/las-rutas-del-limia"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" >
    <div class="item active">
      <img src="" alt="Casa do concello" title="By Elisardojm (Own work) [CC BY-SA 4.0 (http://creativecommons.org/licenses/by-sa/4.0)], via Wikimedia Commons" id="img0" onclick="grande(this.id)"  >
      <div class="carousel-caption">
        <h3>Casa do concello</h3>
      </div>
    </div>

    <div class="item">
      <img src="" alt="Casa da cultura e xuventude" title="By Elisardojm (Own work) [CC BY-SA 4.0 (http://creativecommons.org/licenses/by-sa/4.0)], via Wikimedia Commons" id="img1" onclick="grande(this.id)">
      <div class="carousel-caption">
        <h3>Casa da cultura e xuventude</h3>
      </div>
    </div>

    <div class="item">
      <img src="" alt="Igrexa de Santa Mariña" title="By José Antonio Gil Martínez [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" id="img2" onclick="grande(this.id)">
      <div class="carousel-caption">
        <h3>Igrexa de Santa Mariña</h3>
      </div>
    </div>

    <div class="item">

      <div class="carousel-caption">
        <h3>Panorámica</h3>
      </div>
            <img src="" alt="Panorámica" title="https://contosdorio.wordpress.com/las-rutas-del-limia" id="img3" onclick="grande(this.id)">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<hr>
</div>
<div class="col-md-4 col-lg-3 col-sm-4"> 
<hr>
<div id="contidodereita"  class="over" style="height:650px;">
<div class="colorider" onclick="verimaxes('imaxesxinzo')">Imaxes Xinzo</div>
<div id="imaxesxinzo" class="imaxesder">
<div id="imaxin">
<img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/Casa_do_concello%2C_Xinzo_de_Limia%2C_Ourense_12.JPG" alt="Casa do concello" title="By Elisardojm (Own work) [CC BY-SA 4.0 (http://creativecommons.org/licenses/by-sa/4.0)], via Wikimedia Commons" class="imgpeque" onclick="cargarimagenes('imaxin',0)">
<img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Casa_da_cultura_e_xuventude%2C_Xinzo_de_Limia%2C_Ourense_03.JPG" alt="Casa da cultura e xuventude" title="By Elisardojm (Own work) [CC BY-SA 4.0 (http://creativecommons.org/licenses/by-sa/4.0)], via Wikimedia Commons" class="imgpeque" onclick="cargarimagenes('imaxin',1)">
<img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Igrexa_de_Santa_Mari%C3%B1a_de_Xinzo_de_Limia.jpg" alt="Igrexa de Santa Mariña" title="By José Antonio Gil Martínez [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" class="imgpeque" onclick="cargarimagenes('imaxin',2)">
<img src="https://contosdorio.files.wordpress.com/2012/05/p1050933.jpg" alt="Panorámica" class="imgpeque" onclick="cargarimagenes('imaxin',3)">
</div>
</div>
<div class="colorider" onclick="verimaxes('imaxesentro')">Imaxes Entroido</div>
<div id="imaxesentro" class="imaxesder">
<div id="imaent">
<img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/As_pantallas_de_Xinzo_%283312263912%29.jpg" alt="As pantallas de Xinzo" class="imgpeque" title="By amaianos from Galicia (As pantallas de Xinzo  Uploaded by tm) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('imaent',0)">
<img src="https://upload.wikimedia.org/wikipedia/commons/e/e4/Antroido_%283311434193%29.jpg" alt="Antroido" class="imgpeque" title="By amaianos from Galicia (Antroido) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('imaent',1)">
</div>
</div>
<div class="colorider" onclick="verimaxes('imaxesesque')">Imaxes Esquecemento</div>
<div id="imaxesesque" class="imaxesder">
<div id="imaesq">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Festa_do_esquecemento._Xinzo_de_Limia.jpg/1280px-Festa_do_esquecemento._Xinzo_de_Limia.jpg" alt="Festa do esquecemento" class="imgpeque" title="By Álvaro Pérez Vilariño [CC BY-SA 2.0 (http://creativecommons.org/licenses/by-sa/2.0)], via Wikimedia Commons" onclick="cargarimagenes('imaesq',0)">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Escenificaci%C3%B3n_%22Os_castrexos_non_pagan_impostos%22_%286079713510%29.jpg/1280px-Escenificaci%C3%B3n_%22Os_castrexos_non_pagan_impostos%22_%286079713510%29.jpg" alt="Escenificación: Os castrexos non pagan impostos" class="imgpeque" title="By Álvaro Pérez Vilariño (Escenificación "Os castrexos non pagan impostos") [CC BY-SA 2.0 (http://creativecommons.org/licenses/by-sa/2.0)], via Wikimedia Commons" onclick="cargarimagenes('imaesq',1)">
</div>
</div>
<div class="colorider" onclick="verimaxes('imaxesmonumen')">Imaxes Monumentos</div>
<div id="imaxesmonumen" class="imaxesder">
<div id="monu" >
<img src="https://upload.wikimedia.org/wikipedia/commons/2/25/Torre_da_Pena_-_Porqueira.jpg" alt="Torre de Pena" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('monu',0)">
<img src="https://upload.wikimedia.org/wikipedia/commons/b/bd/Igrexa_de_San_Nicolao_de_Nov%C3%A1s%2C_Xinzo_de_Limia.jpg" alt="Igrexa de San Nicolao de Novás" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('monu',1)">
<img src="https://upload.wikimedia.org/wikipedia/commons/6/64/Iglesia_de_San_Pedro_de_Boado.jpg" alt="Igrexa de San Pedro de Boado" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('monu',2)">
<img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Igrexa_de_San_Tom%C3%A9_de_Morgade%2C_Xinzo_de_Limia.jpg" alt="Igrexa" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('monu',3)">
</div>
<div id="monu1" >
<img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Igrexa_de_San_Xo%C3%A1n_de_Seoane_de_Oleiros%2C_Xinzo_de_Limia.jpg" alt="Igrexa de San Xoán de Seoane de Oleiros" class="imgpeque"  title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons" onclick="cargarimagenes('monu1',0)">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Igrexa_de_Santa_Mar%C3%ADa_de_Laro%C3%A1%2C_Xinzo_de_Limia_4.jpg/1280px-Igrexa_de_Santa_Mar%C3%ADa_de_Laro%C3%A1%2C_Xinzo_de_Limia_4.jpg" alt="Igrexa de Santa María de Laroá" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons"  onclick="cargarimagenes('monu1',1)">
<img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Mosteiro_do_Bon_Xes%C3%BAs_de_Trandeiras%2C_A_Pena%2C_Xinzo_de_Limia.jpg" alt="Mosteiro Bon Xesús" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons"  onclick="cargarimagenes('monu1',2)">
<img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Mosteiro_do_Bon_Xes%C3%BAs_de_Trandeiras_-_Xinzo_de_Limia_-_Ourense.jpg" alt="Mosteiro Bon Xesús" class="imgpeque" title="By Jose Antonio Gil Martínez. FREECAT from Vigo (Flickr) [CC BY 2.0 (http://creativecommons.org/licenses/by/2.0)], via Wikimedia Commons"  onclick="cargarimagenes('monu1',3)">
</div>
</div>
<div class="colorider" onclick="verimaxes('imaxeshisto')">Imaxes Históricas</div>
<div id="imaxeshisto" class="imaxesder">
<div id="hist" >

</div>

</div>
<!-- The Modal -->
</div>
<hr>
<?php include ("creativecommons.html"); ?>
</div>
<hr>
</div>
</div>
<div id="myModal" class="modal1">
  <span class="closeg">×</span>
  <img class="moda1l-content" id="img01">
  <div id="caption1"></div>
</div>
<?php include ("contacto.html"); ?>
</body>
<script>
var modalImg=document.getElementById("img01");
var captionText=document.getElementById("caption1");
var modal=document.getElementById('myModal');
function grande(id){
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img=document.getElementById(id);
modal.style.display="block";
modalImg.src=img.src;
captionText.innerHTML="<hr><h3>"+img.alt+"</h3>"+img.title+"<hr>";
// Get the <span> element that closes the modal
var span=document.getElementsByClassName("closeg")[0];
// When the user clicks on <span> (x), close the modal
span.onclick=function() {
    modal.style.display = "none";
}
modalImg.onclick=function() {
    modal.style.display = "none";
}

}

$("#tabimaxe").removeClass("colori");
$("#tabimaxe").css({background:'#D8214E',BorderTopRightRadius: 10,marginTop:2,BorderTopLeftRadius: 10,marginBottom:-10,border:'3px white groove'});
$("#tabimaxe").css("border-bottom","4px #D8214E solid");

for (i=0;i<4;i++) {$(".carousel-inner > div > img:eq("+i+")").attr("src",$(".carousel-indicators > li > img:eq("+i+")").attr("src"));}


function verimaxes(cv){
$("#"+cv).slideToggle();
}
function cargarimagenes(capa,ind){
//alert(ind);
//alert($('#'+capa+" img:eq(1)").attr("alt"));
var activo="";
var num=$('#'+capa).find('img').length;
var cad="<hr><div id='myCarousel' class='carousel slide'><ol class='carousel-indicators'>";
$("#xeralimaxes").empty();
for(i=0;i<num;i++){
if(i===ind){activo="active";}else if(i!==ind){activo="";}

cad+="<li data-target='#myCarousel' data-slide-to='"+i+"'  class='"+activo+"' ><img src='"+$('#'+capa+" img:eq("+i+")").attr("src")+"' alt='"+$('#'+capa+" img:eq("+i+")").attr("alt")+"' class='imgprev'></li>";
}
cad+="</ol><div class='carousel-inner' role='listbox'>";

for(j=0;j<num;j++){
if(j===ind){activo="active";}else if(j!==ind){activo="";}
cad+="<div class='item "+activo+"'><img src='"+$('#'+capa+" img:eq("+j+")").attr("src")+"' alt='"+$('#'+capa+" img:eq("+j+")").attr("alt")+"' title='"+$('#'+capa+" img:eq("+j+")").attr("title")+"' id='img"+j+"' onclick='grande(this.id)'><div class='carousel-caption'><h3>"+$('#'+capa+" img:eq("+j+")").attr("alt")+"</h3></div></div>";
//alert($('#'+capa+" img:eq("+j+")").attr("title"));
}
cad+="</div><a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span><span class='sr-only'>Previous</span></a>";
cad+="<a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span class='sr-only'>Next</span></a></div><hr>";
$("#xeralimaxes").html(cad);
mirasepequeno();

/*$("#myCarousel").carousel();

// Enable Carousel Indicators
$(".item").click(function(){
    $("#myCarousel").carousel(1);
});

// Enable Carousel Controls
$(".left").click(function(){
    $("#myCarousel").carousel("prev");
});
//$('.carousel').carousel();
//alert($(".carousel-caption").html());*/
}

function mirasepequeno(){if($(window).width()<1430){$(".carousel-indicators > li > img").css("display","none");$(".carousel-indicators > li").css({width:'10px',marginLeft:'auto'});}}

function adapan(){
if($(window).width()<1430){mirasepequeno();}
if($(window).width()<1100){acortar();}

if($(window).width()<760){
  $("#menu").removeClass("navbar-default");
  $("#menu").addClass("navbar-fixed-top");
  $("#mostrar").addClass("altura");
  normal();  
}
if($(window).width()>760){$("#menu").removeClass("navbar-fixed-top");$("#menu").addClass("navbar-default");$("#mostrar").removeClass("altura");$("#mostrar").height($(window).height()*0.93);}
if($(window).width()>1100){normal();}
if($(window).width()>1430){$(".carousel-indicators > li > img").css("display","block");$(".carousel-indicators > li").css({width:'100px',marginLeft:'50px'});}

//$("#mostrar").height($(window).height()*0.95);   
}
$(window).resize(function() {
adapan();
});
adapan();

</script>
</html>
