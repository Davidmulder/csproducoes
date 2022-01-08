<?php 


if ($_FILES['img1']['name']!= "") {      

$d=$_SERVER['DOCUMENT_ROOT'];
$dir= "$d/sgpainel/fotos/";
//echo $dir;

//$dir="$DOCUMENT_ROOT/tuchauafinal/admin/fotos/";

       // @copy("$img1" ,"/home/lmdigita/public_html/arguivo/$img1_name")              
       @copy($_FILES['img1']['tmp_name'] ,$dir.$_FILES['img1']['name'])
		//move_uploaded_file($file,"$dir"."/"."$img1_name"); 


               or die("Caminho do Arquivo Invalido.");
			   
							

//mudança de nome
$sopinha = "12alrmcuellgilewrwegfhyha345678965413351541";

srand((double)microtime()*1000000);

for($i=0;$i<6;$i++){

$nov_img.=$sopinha[rand()%strlen($sopinha)];}

				
$img1_name2=$nov_img.".jpg";
rename($dir.$_FILES['img1']['name'], $dir.$img1_name2);
header("location:galeria.php?foto=".$img1_name2) ; //OK	
//rename("C:\Arquivos de programas\EasyPHP\www\adepoul\sgade\fotos\img_prg\$img1_name", "C:\Arquivos de programas\EasyPHP\www\adepoul\sgade\fotos\img_prg\$img1_name2");				
//$img1_name=$img1_name2;		



} else {


       die("Sem Arquivo de Imagem");


}

?>
