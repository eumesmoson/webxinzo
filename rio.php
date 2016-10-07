<?php
include "simple_html_dom.php";
$request = array(
'http' => array(
    'method' => 'POST',
    'content' => http_build_query(array(
    	'Accept'=>'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Encoding'=>'gzip, deflate, sdch',
        'Accept-Language'=>'es-ES,es;q=0.8',
        'Connection'=>'keep-alive',
        'Cookie'=>'PHPSESSID=25b34f29c62ffed078fec9db77a7a0aa',
        'Host'=>'saih.chminosil.es',
        'User-Agent'=>'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36'
    )),
)
);
$context = stream_context_create($request);
try{
$html=file_get_contents("http://saih.chminosil.es/index.php?url=/datos/ficha/estacion:A043/area:HID",false,$context);
var_dump($http_response_header);

//$datos=$html->find('div[class="texto_mapas"]');
echo "<hr>".$html."<hr>";
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
?>