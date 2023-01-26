<?php
$dir    = 'fotos';
$archivos = scandir($dir);

foreach($archivos as $archivo){
    echo $archivo."<br>";
}
?>