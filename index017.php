<?php
$dir    = 'fotos';
$archivos = scandir($dir);
$contador = 0;
foreach($archivos as $archivo){
    if($contador > 2){
    echo $archivo."<br>";
    $origen = imagecreatefromjpeg('fotos/'.$archivo.'');
    $nombre = explode(".",$archivo)[0];
    $resoluciones = [16,32,64,128,256,512,1024];
    $fp = fopen('data.csv', 'a');//opens file in append mode
    foreach($resoluciones as $resolucion){
        $destino = imagecreatetruecolor($resolucion, $resolucion);
        $destinobaja = imagecreatetruecolor(16,16);
        mkdir("bloquesalta/".$resolucion);
        mkdir("bloquesbaja/".$resolucion);
        for($x = 0;$x<4096;$x+=$resolucion){
            for($y = 0;$y<4096;$y+=$resolucion){
                imagecopy(
                    $destino, 
                    $origen, 
                    0, 
                    0, 
                    $x, 
                    $y, 
                    $resolucion, 
                    $resolucion);
                imagejpeg($destino,"bloquesalta/".$resolucion."/destino-".$nombre."-".$x."-".$y.".jpg"); 
                
                imagecopyresized(
                    $destinobaja, 
                    $destino, 
                    0, 
                    0, 
                    0, 
                    0, 
                    16, 
                    16, 
                    $resolucion, 
                    $resolucion);
                
                imagejpeg($destinobaja,"bloquesbaja/".$resolucion."/destino-".$nombre."-".$x."-".$y.".jpg");
                $cadena = "";
                for($x2=0;$x2<16;$x2++){
                    for($y2=0;$y2<16;$y2++){
                        $rgb = imagecolorat($destinobaja, $x2, $y2);
                        $r = ($rgb >> 16) & 0xFF;
                        $g = ($rgb >> 8) & 0xFF;
                        $b = $rgb & 0xFF;
                        $cadena .= ";".$r.",".$g.",".$b;
                    }
                } 
                fwrite($fp, $resolucion."/destino-".$nombre."-".$x."-".$y.".jpg|".$cadena."\n");  
                
            } 
        }
       
    }

}
    $contador++;
}
?>