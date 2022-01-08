<?php 





if ($_FILES['img1']['name']!= "") {      



$d=$_SERVER['DOCUMENT_ROOT'];

$dir= "bd/";

//$dir="$DOCUMENT_ROOT/tuchauafinal/admin/fotos/";



       // @copy("$img1" ,"/home/lmdigita/public_html/arguivo/$img1_name")              

       @copy($_FILES['img1']['tmp_name'] ,$dir.$_FILES['img1']['name'])

		//move_uploaded_file($file,"$dir"."/"."$img1_name"); 





               or die("Caminho do Arquivo Invalido.");   

							



//mudança de nome

header("location:ler_coop.php") ; //OK	



} else {





       die("Sem Arquivo de Imagem");





}



?>

