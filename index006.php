<?php

    $origen = imagecreatefromjpeg('muestraalta.jpg');
    
    $resoluciones = [64,128,256,512];
    foreach($resoluciones as $resolucion){
        $destino = imagecreatetruecolor($resolucion, $resolucion);
        $destinobaja = imagecreatetruecolor(32,32);
        mkdir("bloquesalta/".$resolucion);
        mkdir("bloquesbaja/".$resolucion);
        for($x = 0;$x<2048;$x+=$resolucion){
            for($y = 0;$y<2048;$y+=$resolucion){
                imagecopy(
                    $destino, 
                    $origen, 
                    0, 
                    0, 
                    $x, 
                    $y, 
                    $resolucion, 
                    $resolucion);
                imagejpeg($destino,"bloquesalta/".$resolucion."/destino-".$x."-".$y.".jpg"); 
                
                imagecopyresized(
                    $destinobaja, 
                    $destino, 
                    0, 
                    0, 
                    0, 
                    0, 
                    32, 
                    32, 
                    $resolucion, 
                    $resolucion);
                imagejpeg($destinobaja,"bloquesbaja/".$resolucion."/destino-".$x."-".$y.".jpg");
            } 
        }
    }
    
?>
