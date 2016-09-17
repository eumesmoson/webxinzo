<?php
$url="http://www.ige.eu/igebdt/igeapi/datos/100/0:2015,9915:32032";

echo "hola que tal :) ".$url;
//$d=preg_replace_callback('/[a-z]|"|32032/',' ',file_get_contents($url));


echo '<br><hr>';
$datos=explode(',',preg_replace('/[A-Z]|[a-z]|"|32032/',' ', file_get_contents($url)));
print_r($datos);

$a=8;
echo $datos[$a]." **  ".$datos[$a];
if (empty($datos[$a])) {echo "teño algo :) ".strlen($datos[$a]);}
else                 {echo "non teño naaaa :( ".strlen($datos[$a]);}
echo '<br>';

for($i=0;$i<count($datos);$i++)
{
if (empty($datos[$i]))
{
array_splice($datos, $i,1);
}
}
for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}
echo '<br><hr>';


/*for($i=0;$i<count($datos);$i++)
{
if (empty($datos[$i]))
{
array_splice($datos, $i,1);
}
}
print_r(array_filter($datos));
$matriz = array(“”,2,0,”huelva”,””,);

print_r(array_filter($matriz));

echo "<hr>".$d."<hr>";
$datos=explode(',',$d);
print_r($datos);
echo '<br><br><hr>';
for($i=0;$i<count($datos);$i++)
{
if (empty($datos[$i]))
{
array_splice($datos, $i,1);
}
}/*
for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}*/


echo ("<h5 class='texto centro efectotexto'>Xinzo de Limia ".(date('Y')-1)." </h5><hr>");
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
        <td id='i".$i."' class='textota' 
        onmouseover=colora('uno".$i."',1),colora('dos".$i."',1),colora(this.id,1) 
        onmouseout=colora('uno".$i."',2),colora('dos".$i."',2),colora(this.id,3) >".$datos[$id]."</td>
        <td id='h".$i."' class='textota' onmouseover=colora('uno".$i."',1),colora(this.id,1)
        onmouseout=colora('uno".$i."',2),colora(this.id,3)>".$datos[$h]."</td>
        <td id='ph".$i."'class='textota' onmouseover=colora('uno".$i."',1),colora(this.id,1)
        onmouseout=colora('uno".$i."',2),colora(this.id,3)>".round(($datos[$h]/$datos[$t])*100,2)."</td>
        <td id='m".$i."' class='textota' onmouseover=colora('dos".$i."',1),colora(this.id,1)
        onmouseout=colora('dos".$i."',2),colora(this.id,3) >".$datos[$m]."</td>
        <td id='pm".$i."' class='textota' onmouseover=colora('dos".$i."',1),colora(this.id,1)
        onmouseout=colora('dos".$i."',2),colora(this.id,3)>".round(($datos[$m]/$datos[$t])*100,2)."</td>
        <td id='t".$i."' class='textota' 
        onmouseover=colora('uno".$i."',1),colora('dos".$i."',1),colora(this.id,1)
        onmouseout=colora('uno".$i."',2),colora('dos".$i."',2),colora(this.id,3)>".$datos[$t]."</td></tr>");
        $id=$id+7;$h=$h+7;$t=$t+7;$m=$m+7;
      }
    echo("<tfoot>
      <tr class='textotati'>
        <th class='textota centro'>TOTAIS:</th>
        <th class='textota centro'>".$datos[102]."</th>
        <th class='textota centro'>".round(($datos[102]/$datos[7])*100,2)."</th>
        <th class='textota centro'>".$datos[197]."</th>
        <th class='textota centro'>".round(($datos[197]/$datos[7])*100,2)."</th>
        <th class='textota centro'>".$datos[7]."</th>
      </tr>
    </tfoot>");
echo("</tbody></table></div><div class='form-group text-right'>
 <label for='sele'>Seleccione ano para ver os datos:</label><select id='sele' name='sele' class='selectpicker' id='selano'>");
for($i=1998;$i<(date('Y'));$i++)
{
echo("<option>".$i."</option>");
}
echo ("</select><button type='submit' class='btn btn-primary btn-sm' style='margin-top:-5px' onclick=enviamos(sele.value,'taboa','taboa','grafica'),enviamos(sele.value,'piramide_poboacion','grafica')>Ver</button></div>");
¡
?>
