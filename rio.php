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
        'Cookie'=>'PHPSESSID=c7a7e471cae473e6e53d69eeab429b6c; lang=es; __utmt=1; __utmt_b=1; __utma=130851085.1909245054.1474634817.1474634817.1474634817.1; __utmb=130851085.10.10.1474634817; __utmc=130851085; __utmz=130851085.1474634817.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)',
        'Host'=>'saih.chminosil.es',
        'Referer'=>'http://saih.chminosil.es/index.php?url=/datos/mapas/mapa:H1/area:HID/acc:',
        'Upgrade-Insecure-Requests'=>1,
        'User-Agent'=>'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/52.0.2743.116 Chrome/52.0.2743.116 Safari/537.36'
    )),
)
);
$context = stream_context_create($request);
try{
$html=file_get_contents("http://saih.chminosil.es/index.php?url=/presentacion/notalegal/idioma:gl");

$datos=$html->find('div[class="texto_mapas"]');
echo "<hr>".$html."<hr>";
}
catch (Exception $e) {
    echo 'Produciuse un erro :('.$e->getMessage();
}
?>