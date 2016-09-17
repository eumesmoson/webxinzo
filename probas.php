<?php
header('Content-type: text/html; charset=UTF-8');
$ano="2014";
$url="http://www.ige.eu/igebdt/igeapi/datos/100/0:".$ano.",9915:32032";
$datos=explode(',',eregi_replace('[a-z]|"|32032',"",file_get_contents($url)));
echo $url."<hr>";
for($i=0;$i<count($datos);$i++)
{
if (empty($datos[$i]))
{
array_splice($datos, $i,1);
}
}
echo ("<div id='grafica_poboacion' class='contgraf' >
<div id='piramide' class='piram'>
<center><span class='titulopiram'>PIRAMIDE POBOACION:&nbsp;&nbsp;
".$ano."</span></center>
<div id='izquierda' class='sinborde'>
<div id='tituloizq' class='titulos'>HOMES</div>
<div id='uno0'  onmouseover=colora(this.id,1),colora('h17',1),colora('ph17',1)  onmouseout='colora(this.id,2),colora('h17',3),colora('ph17',3)  class='esquerda' style='width:".(round($datos[192],0)/3)."px' title='".(round($datos[192],0))."'></div>
<div id='uno1'  onmouseover=colora(this.id,1),colora('h16',1),colora('ph16',1)  onmouseout='colora(this.id,2),colora('h16',3),colora('ph16',3)  class='esquerda' style='width:".(round($datos[187],0)/3)."px' title='".(round($datos[187],0))."'></div>
<div id='uno2'  onmouseover=colora(this.id,1),colora('h15',1),colora('ph15',1)  onmouseout='colora(this.id,2),colora('h15',3),colora('ph15',3)  class='esquerda' style='width:".(round($datos[182],0)/3)."px' title='".(round($datos[182],0))."'></div>
<div id='uno3'  onmouseover=colora(this.id,1),colora('h14',1),colora('ph14',1)  onmouseout='colora(this.id,2),colora('h14',3),colora('ph14',3)  class='esquerda' style='width:".(round($datos[177],0)/3)."px' title='".(round($datos[177],0))."'></div>
<div id='uno4'  onmouseover=colora(this.id,1),colora('h13',1),colora('ph13',1)  onmouseout='colora(this.id,2),colora('h13',3),colora('ph13',3)  class='esquerda' style='width:".(round($datos[172],0)/3)."px' title='".(round($datos[172],0))."'></div>
<div id='uno5'  onmouseover=colora(this.id,1),colora('h12',1),colora('ph12',1)  onmouseout='colora(this.id,2),colora('h12',3),colora('ph12',3)  class='esquerda' style='width:".(round($datos[167],0)/3)."px' title='".(round($datos[167],0))."'></div>
<div id='uno6'  onmouseover=colora(this.id,1),colora('h11',1),colora('ph11',1)  onmouseout='colora(this.id,2),colora('h11',3),colora('ph11',3)  class='esquerda' style='width:".(round($datos[162],0)/3)."px' title='".(round($datos[162],0))."'></div>
<div id='uno7'  onmouseover=colora(this.id,1),colora('h10',1),colora('ph10',1)  onmouseout='colora(this.id,2),colora('h10',3),colora('ph10',3)  class='esquerda' style='width:".(round($datos[157],0)/3)."px' title='".(round($datos[157],0))."'></div>
<div id='uno8'  onmouseover=colora(this.id,1),colora('h9',1),colora('ph9',1)    onmouseout='colora(this.id,2),colora('h9',3),colora('ph9',3)    class='esquerda' style='width:".(round($datos[152],0)/3)."px' title='".(round($datos[152],0))."'></div>
<div id='uno9'  onmouseover=colora(this.id,1),colora('h8',1),colora('ph8',1)    onmouseout='colora(this.id,2),colora('h8',3),colora('ph8',3)    class='esquerda' style='width:".(round($datos[147],0)/3)."px' title='".(round($datos[147],0))."'></div>
<div id='uno10' onmouseover=colora(this.id,1),colora('h7',1),colora('ph7',1)    onmouseout='colora(this.id,2),colora('h7',3),colora('ph7',3)    class='esquerda' style='width:".(round($datos[142],0)/3)."px' title='".(round($datos[142],0))."'></div>
<div id='uno11' onmouseover=colora(this.id,1),colora('h6',1),colora('ph6',1)    onmouseout='colora(this.id,2),colora('h6',3),colora('ph6',3)    class='esquerda' style='width:".(round($datos[137],0)/3)."px' title='".(round($datos[137],0))."'></div>
<div id='uno12' onmouseover=colora(this.id,1),colora('h5',1),colora('ph5',1)    onmouseout='colora(this.id,2),colora('h5',3),colora('ph5',3)    class='esquerda' style='width:".(round($datos[132],0)/3)."px' title='".(round($datos[132],0))."'></div>
<div id='uno13' onmouseover=colora(this.id,1),colora('h4',1),colora('ph4',1)    onmouseout='colora(this.id,2),colora('h4',3),colora('ph4',3)    class='esquerda' style='width:".(round($datos[127],0)/3)."px' title='".(round($datos[127],0))."'></div>
<div id='uno14' onmouseover=colora(this.id,1),colora('h3',1),colora('ph3',1)    onmouseout='colora(this.id,2),colora('h3',3),colora('ph3',3)    class='esquerda' style='width:".(round($datos[122],0)/3)."px' title='".(round($datos[122],0))."'></div>
<div id='uno15' onmouseover=colora(this.id,1),colora('h2',1),colora('ph2',1)    onmouseout='colora(this.id,2),colora('h2',3),colora('ph2',3)    class='esquerda' style='width:".(round($datos[117],0)/3)."px' title='".(round($datos[117],0))."'></div>
<div id='uno16' onmouseover=colora(this.id,1),colora('h1',1),colora('ph1',1)    onmouseout='colora(this.id,2),colora('h1',3),colora('ph1',3)    class='esquerda' style='width:".(round($datos[112],0)/3)."px' title='".(round($datos[112],0))."'></div>
<div id='uno17' onmouseover=colora(this.id,1),colora('h0',1),colora('ph0',1)    onmouseout='colora(this.id,2),colora('h0',3),colora('ph0',3)    class='esquerda' style='width:".(round($datos[107],0)/3)."px' title='".(round($datos[182],0))."'></div>
</div>
<div id='centro' class='centrograf'>
<div id='titulocentro' class='titulos2'>IDADE</div>
<div id='cero2' class='titulos1 verben' >>=85</div>
<div id='cero3' class='titulos1 verben' >80-84</div>
<div id='cero4' class='titulos1 verben' >75-79</div>
<div id='cero5' class='titulos1 verben' >70-74</div>
<div id='cero6' class='titulos1 verben' >65-69</div>
<div id='cero7' class='titulos1 verben' >60-64</div>
<div id='cero8' class='titulos1 verben' >55-59</div>
<div id='cero9' class='titulos1 verben' >50-54</div>
<div id='cero10' class='titulos1 verben' >45-49</div>
<div id='cero11' class='titulos1 verben' >40-44</div>
<div id='cero12' class='titulos1 verben' >35-39</div>
<div id='cero13' class='titulos1 verben' >30-34</div>
<div id='cero14' class='titulos1 verben' >25-29</div>
<div id='cero15' class='titulos1 verben' >20-24</div>
<div id='cero16' class='titulos1 verben' >15-19</div>
<div id='cero17' class='titulos1 verben' >10-14</div>
<div id='cero18' class='titulos1 verben' >5-9</div>
<div id='cero19' class='titulos1 verben' >0-4</div>
</div>
<div id='derecha' class='sinbordeder' >
<div id='tituloder' class='titulos'>MULLERES</div>
<div id='dos0'  onmouseover=colora(this.id,1),colora('m17',1),colora('pm17',1)  onmouseout=colora(this.id,2),colora('m17',3),colora('pm17',3)  class='dereita' style='width:".(round($datos[287],0)/3)."px'  title='".(round($datos[287],0))."'></div>
<div id='dos1'  onmouseover=colora(this.id,1),colora('m16',1),colora('pm16',1)  onmouseout=colora(this.id,2),colora('m16',3),colora('pm16',3)  class='dereita' style='width:".(round($datos[282],0)/3)."px'  title='".(round($datos[282],0))."'></div>
<div id='dos2'  onmouseover=colora(this.id,1),colora('m15',1),colora('pm15',1)  onmouseout=colora(this.id,2),colora('m15',3),colora('pm15',3)  class='dereita' style='width:".(round($datos[277],0)/3)."px'  title='".(round($datos[277],0))."'></div>
<div id='dos3'  onmouseover=colora(this.id,1),colora('m14',1),colora('pm14',1)  onmouseout=colora(this.id,2),colora('m14',3),colora('pm14',3)  class='dereita' style='width:".(round($datos[272],0)/3)."px'  title='".(round($datos[272],0))."'></div>
<div id='dos4'  onmouseover=colora(this.id,1),colora('m13',1),colora('pm13',1)  onmouseout=colora(this.id,2),colora('m13',3),colora('pm13',3)  class='dereita' style='width:".(round($datos[267],0)/3)."px'  title='".(round($datos[267],0))."'></div>
<div id='dos5'  onmouseover=colora(this.id,1),colora('m12',1),colora('pm12',1)  onmouseout=colora(this.id,2),colora('m12',3),colora('pm12',3)  class='dereita' style='width:".(round($datos[262],0)/3)."px'  title='".(round($datos[262],0))."'></div>
<div id='dos6'  onmouseover=colora(this.id,1),colora('m11',1),colora('pm11',1)  onmouseout=colora(this.id,2),colora('m11',3),colora('pm11',3)  class='dereita' style='width:".(round($datos[257],0)/3)."px'  title='".(round($datos[257],0))."'></div>
<div id='dos7'  onmouseover=colora(this.id,1),colora('m10',1),colora('pm10',1)  onmouseout=colora(this.id,2),colora('m10',3),colora('pm10',3)  class='dereita' style='width:".(round($datos[252],0)/3)."px'  title='".(round($datos[252],0))."'></div>
<div id='dos8'  onmouseover=colora(this.id,1),colora('m9',1),colora('pm9',1)    onmouseout=colora(this.id,2),colora('m9',3),colora('pm9',3)    class='dereita' style='width:".(round($datos[247],0)/3)."px'  title='".(round($datos[247],0))."'></div>
<div id='dos9'  onmouseover=colora(this.id,1),colora('m8',1),colora('pm8',1)    onmouseout=colora(this.id,2),colora('m8',3),colora('pm8',3)    class='dereita' style='width:".(round($datos[242],0)/3)."px'  title='".(round($datos[242],0))."'></div>
<div id='dos10' onmouseover=colora(this.id,1),colora('m7',1),colora('pm7',1)    onmouseout=colora(this.id,2),colora('m7',3),colora('pm7',3)    class='dereita' style='width:".(round($datos[237],0)/3)."px'  title='".(round($datos[237],0))."'></div>
<div id='dos11' onmouseover=colora(this.id,1),colora('m6',1),colora('pm6',1)    onmouseout=colora(this.id,2),colora('m6',3),colora('pm6',3)    class='dereita' style='width:".(round($datos[232],0)/3)."px'  title='".(round($datos[232],0))."'></div>
<div id='dos12' onmouseover=colora(this.id,1),colora('m5',1),colora('pm5',1)    onmouseout=colora(this.id,2),colora('m5',3),colora('pm5',3)    class='dereita' style='width:".(round($datos[227],0)/3)."px'  title='".(round($datos[227],0))."'></div>
<div id='dos13' onmouseover=colora(this.id,1),colora('m4',1),colora('pm4',1)    onmouseout=colora(this.id,2),colora('m4',3),colora('pm4',3)    class='dereita' style='width:".(round($datos[222],0)/3)."px'  title='".(round($datos[222],0))."'></div>
<div id='dos14' onmouseover=colora(this.id,1),colora('m3',1),colora('pm3',1)    onmouseout=colora(this.id,2),colora('m3',3),colora('pm3',3)    class='dereita' style='width:".(round($datos[217],0)/3)."px'  title='".(round($datos[217],0))."'></div>
<div id='dos15' onmouseover=colora(this.id,1),colora('m2',1),colora('pm2',1)    onmouseout=colora(this.id,2),colora('m2',3),colora('pm2',3)    class='dereita' style='width:".(round($datos[212],0)/3)."px'  title='".(round($datos[212],0))."'></div>
<div id='dos16' onmouseover=colora(this.id,1),colora('m1',1),colora('pm1',1)    onmouseout=colora(this.id,2),colora('m1',3),colora('pm1',3)    class='dereita' style='width:".(round($datos[207],0)/3)."px'  title='".(round($datos[207],0))."'></div>
<div id='dos17' onmouseover=colora(this.id,1),colora('m0',1),colora('pm0',1)    onmouseout=colora(this.id,2),colora('m0',3),colora('pm0',3)    class='dereita' style='width:".(round($datos[202],0)/3)."px'  title='".(round($datos[202],0))."'></div>
</div></div></div>");
?>
