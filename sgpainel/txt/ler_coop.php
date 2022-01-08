<?php require_once('../inc/inc_admin.php'); ?>

<?php 
$arquivo = 'coop.txt';
 
$geral=0; // (1) Geral (0)  Total

// verificar se ele existe
$filename="bd/".$arquivo;

if(file_exists($filename)) { // vericar o arquivo

//if($arquivo == $bproduto) { // nome do arquivo está certo

// querys
$query=DELCOOP() ; // deletar registro antigos


// COD / NOME / 

// Abrir o arquivo que subiu 
$c=0;
$handle = fopen("bd/".$arquivo,'r');
while (!feof ($handle)) {
$buffer= fgets($handle, 4096);

$codigo  =(substr($buffer, 0, 10));
 $nome  = trim((string)substr($buffer, 10, 40));

$nome=ucwords(strtolower($nome));

$senha  =((int)substr($buffer, 0, 7));

$INSERT=ADDCOOP($codigo,$nome,$senha);



//echo $codigo." ....  ".$nome .$senha."<br>";
//echo $codigo." ".$nome." ............ ".$classe."  ".$grupo ."  ". $fabricante. "<br> ";
//echo $subgrupo." ".$fabricante." ".$ativo."<br>";
//$conteudo .= $codigo."     ".$classe." ";
$c=$c+1;
}
fclose ($handle);


			//ADD LOG
			$area="IMPORTAR DADOS";
			$acao="UPDATE REGISTRO";
			$usuario=$_COOKIE["vusu"];
			$query=LOGN($area,$acao,$usuario);
		

//} else { // nome do arquivo
//echo "Arquivo Invalido";
//exit;
//}

}else{  //existecia
echo "Arquivo inexistente";
exit;
}




?>
<link href="../include/css.css" rel="stylesheet" type="text/css">


<p class="texto">ATUALIZAÇÃO REALIZADA COM SUCESSO </p>
<p class="texto">REGISTRO <?php echo $c; ?></p>

