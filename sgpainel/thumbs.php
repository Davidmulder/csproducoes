<?

/*
Este script gera uma imagem jpeg com a dimensao maxima "maxsize"(em pixels) a partir de uma image jpeg "src"
A dimensao maxima e a maior dimensao que qualquer um dos lados da imagem pode ter
prototipo: <img src="thumbs.php?maxsize=200&src=teste.jpg">
*/

$maxsize = $_GET["maxsize"];
$src = $_GET["src"];
$width  = $maxsize;
$height = $maxsize;
header('Content-type: image/jpeg');
list($width_orig, $height_orig) = getimagesize($src);
$ratio_orig = $width_orig/$height_orig;
if($width/$height > $ratio_orig){
    $width = $height*$ratio_orig;
}
else{
    $height = $width/$ratio_orig;
}
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($src);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
imagejpeg($image_p, null, 100);
?> 