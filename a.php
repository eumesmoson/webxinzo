<?php 

/*$ano=2014;


header('Content-type: text/html; charset=UTF-8');
$url="http://www.ige.eu/igebdt/igeapi/datos/744/1:0,2:0,4:200505:200506:200507:200508:200509:200510:200511:200512:200601:200602:200603:200604:200605:200606:200607:200608:200609:200610:200611:200612:200701:200702:200703:200704:200705:200706:200707:200708:200709:200710:200711:200712:200801:200802:200803:200804:200805:200806:200807:200808:200809:200810:200811:200812:200901:200902:200903:200904:200905:200906:200907:200908:200909:200910:200911:200912:201001:201002:201003:201004:201005:201006:201007:201008:201009:201010:201011:201012:201101:201102:201103:201104:201105:201106:201107:201108:201109:201110:201111:201112:201201:201202:201203:201204:201205:201206:201207:201208:201209:201210:201211:201212:201301:201302:201303:201304:201305:201306:201307:201308:201309:201310:201311:201312:201401:201402:201403:201404:201405:201406:201407:201408:201409:201410:201411:201412:201501:201502:201503:201504:201505:201506:201507:201508:201509:201510:201511:201512:201601:201602:201603:201604:201605:201606:201607,9915:32032";
$datos=explode(',',preg_replace('/"|[a-zA-Z]/',' ',file_get_contents($url)));


/*for($i=0;$i<count($datos);$i++)
{
echo $i."  ".$datos[$i]."<br>";
}
$json="";
$datas="";
$desemp="";

    $d=23;
    $c=27;
  
    for ($i=0;$i<(count($datos)/7)-4;$i++){
   
    $datas=$datas."'".substr($datos[$d],0,4)."-".substr($datos[$d],4,strlen($datos[$d]))."',";
    $desemp=$desemp.$datos[$c].",";
    $d=$d+7;$c=$c+7;   
    }

 
 //echo ("<hr>".$json."<hr>"); 
$dat="['x',".trim($datas, ',')."]";
$des="['PARADOS',".substr($desemp,0,-1)."]";
echo ("<hr>".$dat."<hr>"); 
echo ("<hr>".$des."<hr>"); 
 //print json_encode(explode(' ',$json));*/
try {
$medicions=simplexml_load_file("dahimeteo.xml");
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
echo("<div class='table-responsive metade'>          
  <table class='table' id='taboavalores'>
    <thead >
      <tr class='textotatt'>
        <th class='textott centro'>DATA MEDICION</th>
        <th class='textott centro'>MEDIDA</th>
        <th class='textott centro'>VALOR</th>
        <th class='textott centro'>UNIDADE</th>

      </tr>
    </thead>
    <tbody>");
$dato="";
//$i=2;
//echo $medicions->Valores[1]->Medida[1]['Valor'];
$datas="";
$tmedias="";
$tmaximas="";
for($i=0;$i<4;$i++) 
  {
      
      for($j=0;$j<count($medicions->Valores[$i]->Medida);$j++){
      echo("<tr class='textott'>
        <td id='des".$i."' class='textota iz'>".htmlspecialchars($medicions->Valores[$i]['Data'])."</td>
        <td id='des".$i."' class='textota'>".htmlspecialchars($medicions->Valores[$i]->Medida[$j]['Variable'])."</td>
        <td id='val".$i."' class='textota'>".$medicions->Valores[$i]->Medida[$j]['Valor']."</td>
        <td id='uni".$i."' class='textota'>".htmlspecialchars($medicions[$i]->Valores->Medida[$j]['Unidades'])."</td></tr>");
      }
  }
  
  for($i=0;$i<count($medicions->Valores);$i++) 
  {
      
      for($j=0;$j<count($medicions->Valores[$i]->Medida);$j+=6){
      if($medicions->Valores[$i]->Medida[$j]['Codigo_validacion']==1){
      $datas=$datas."'".date("Y-m-d",strtotime(str_replace("/","-", $medicions->Valores[$i]['Data'])))."',";
      $tmedias=$tmedias.str_replace(",",".",$medicions->Valores[$i]->Medida[$j]['Valor']).",";
      $tmaximas=$tmaximas.str_replace(",",".",$medicions->Valores[$i]->Medida[($j+1)]['Valor']).",";
  }
      }
  }
  $dat="['x',".trim($datas, ',')."]";
  $tmed="['TEMPERATURAS MEDIAS',".substr($tmedias,0,-1)."]";
  $tmax="['TEMPERATURAS MAXIMAS',".substr($tmaximas,0,-1)."]";

  echo $dat."<hr>";
  echo $tmed."<hr>";
  echo $tmax."<hr>";


?>
