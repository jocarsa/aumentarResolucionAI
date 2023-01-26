<?php
error_reporting(E_ERROR | E_PARSE);
    $origen = imagecreatefromjpeg('test.jpg');
    
    
    for($x = 0;$x<256;$x+=16){
        for($y = 0;$y<256;$y+=16){
            $destino = imagecreatetruecolor(16,16);
            //echo $x."-".$y."<br>";
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
            //echo $cadena."<br>";
            
            //mkdir("prueba");
            imagejpeg($destino,"prueba/destino-".$x."-".$y.".jpg");
            $handle = fopen("data.csv", "r");
            while (($linea = fgets($handle)) !== false) {
                $contenido = explode("|",$linea)[1];
                //echo $cadena."<br>";
                 //echo $contenido."<br>";
                //echo "<hr>";
                $contador = 0;
                $contenidoexplotado = explode(";",$contenido);
                $cadenaexplotada = explode(";",$cadena);
                for($i = 0;$i<count($contenidoexplotado);$i++){
                   // echo explode(",",$cadenaexplotada[$i])[1]."<br>";
                    
                    $contador += abs(
                        intval(explode(",",$contenidoexplotado[$i])[0])
                        -intval(explode(",",$cadenaexplotada[$i])[0])
                    );
                    $contador += abs(
                        intval(explode(",",$contenidoexplotado[$i])[1])
                        -intval(explode(",",$cadenaexplotada[$i])[1])
                    );
                    $contador += abs(
                        intval(explode(",",$contenidoexplotado[$i])[2])
                        -intval(explode(",",$cadenaexplotada[$i])[2])
                    );
                    
                }
                echo $contador."<br>";
                if($contenido == $cadena){
                    //echo "exito";
                }else{
                    //echo "fracaso";
                }
            }
            
        }
    }

?>