<?php
    
    $im = imagecreatefromjpeg("muestraalta.jpg");
    $rgb = imagecolorat($im, 10, 15);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;

    var_dump($r, $g, $b);
?>
