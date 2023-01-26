<?php

    $origen = imagecreatefromjpeg('muestraalta.jpg');
    $destino = imagecreatetruecolor(64, 64);
    for($x = 0;$x<2048;$x+=16){
        for($y = 0;$y<2048;$y+=16){
            imagecopy($destino, $origen, 0, 0, $x, $y, 64, 64);
            imagejpeg($destino,"bloquesalta/destino-".$x."-".$y.".jpg");  
        } 
    }
    
?>
