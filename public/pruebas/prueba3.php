<?php
include('app/config/config.php');

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
$query = $pdo->prepare("SELECT * FROM tb_ubicacion");
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $usuario['id'] . '" ';
    echo 'name="' . parseToXML($usuario['id_motoquero']) . '" ';
   // echo 'address="' . parseToXML($usuario['address']) . '" ';
    echo 'lat="' . $usuario['latitud'] . '" ';
    echo 'lng="' . $usuario['longitud'] . '" ';
    echo 'type="' . $usuario['estado_delivery'] . '" ';
    echo '/>';
    $ind = $ind + 1;
}

// End XML file
echo '</markers>';

?>