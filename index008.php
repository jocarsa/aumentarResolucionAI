<?php
    $origen = imagecreatefromjpeg('test.jpg');
    $destino = imagecreatetruecolor(16,16);
    for($x = 0;$x<256;$x+=16){
        for($y = 0;$y<256;$y+=16){
            imagecopy(
                    $destino, 
                    $origen, 
                    0, 
                    0, 
                    $x, 
                    $y, 
                    16, 
                    16);
            $cadena = "";
                for($x2=0;$x2<16;$x2++){
                    for($y2=0;$y2<16;$y2++){
                        $rgb = imagecolorat($destino, $x2, $y2);
                        $r = ($rgb >> 16) & 0xFF;
                        $g = ($rgb >> 8) & 0xFF;
                        $b = $rgb & 0xFF;
                        $cadena .= ";".$r.",".$g.",".$b;
                    }
                } 
            echo $cadena."<hr>";
        }
    }

?>