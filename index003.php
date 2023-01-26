<?php

    $origen = imagecreatefromjpeg('muestraalta.jpg');
    $destino = imagecreatetruecolor(256, 256);
    for($x = 0;$x<2048;$x+=256){
        for($y = 0;$y<2048;$y+=256){
            imagecopy($destino, $origen, 0, 0, $x, $y, 256, 256);
            imagejpeg($destino,"bloques/destino-".$x."-".$y.".jpg");  
        } 
    }
    
?>
