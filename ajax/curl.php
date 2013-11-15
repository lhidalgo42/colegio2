<?php

$curl = curl_init("http://ufdeldia.com/");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10');

//Asignamos los datos obtenidos a la variable $html
$html = curl_exec($curl);
//Cerramos la operacion cUrl
curl_close($curl);

//Creamos un nuevo DOMDocument
$dom = new DOMDocument();

//Cargamos en él los datos obtenidos con cUrl ($html)
@$dom->loadHTML($html);

//Usamos XPath para parsear el objeto DOM obtenido
$xpath = new DOMXPath( $dom );

//Hacemos las consultas XPath
//Coge todos los  y <a href="mailto:..."> de la página
$bs = $xpath->query( '//center | //center ');

//Recorremos todos los datos obtenidos con la consulta Xpath
$data=array();
$c=0;
foreach ( $bs as $b ) {
$val =$b->firstChild->nodeValue;
    //&nbsp;UF = $23.225,04
    //Comprobamos si el  obtenido está formado por 8 números
    if(preg_match('/^[,.$0-9]{5,}/',$b->firstChild->nodeValue)){

        //Si es así asignamos a la variable $codigo, dicho contenido
        $uf=$b->firstChild->nodeValue;

        //Con esto, le quitamos los 2 últimos caracteres, ya que en este caso, no nos sirven

        //Sacamos el valor por pantalla
        $data[$c]=$uf;
        $c++;
    }

}
echo substr($data[3], 1);
//http://www.avisa2.com/2012/05/extraer-datos-de-una-pagina-web-parsear.html
?>