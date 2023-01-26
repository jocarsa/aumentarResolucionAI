<?php

    $origen = imagecreatefromjpeg('muestraalta.jpg');
    $destino = imagecreatetruecolor(256, 256);

    imagecopy($destino, $origen, 0, 0, 0, 0, 256, 256);
    
    imagejpeg($destino,"destino.jpg");


?>
