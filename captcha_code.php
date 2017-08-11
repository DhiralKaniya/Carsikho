<?php

/* this code is made by Dhiral Kaniya */
session_start();
$_SESSION['code']=rand(1000,9999);
$im=imagecreatetruecolor(37,25);
$bg=imagecolorallocate($im, 63,132,181);
$fg=imagecolorallocate($im, 255,255,255);
imagefill($im,0,0, $bg);
imagestring($im, 12, 0, 0, $_SESSION['code'], $fg);
header("cache-control:no-cache,must-revalidate");
header('content-type:image/png');
imagepng($im);
imagedestroy($im);
?>
