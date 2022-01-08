<?php require_once('../Connections/conexao.php'); ?>
<?php require_once('inc/inc_admin.php'); ?>

<?php 

$titulo=$_POST["titulo"];
$foto=$_POST["foto"];
$link=$_POST["link"];
$idnoticia=$_POST["grupo"];
$resumo=$_POST["resumo"];
$dest=$_POST["dest"];
$id=$_POST["id"];

$query=UPDDESTAQUE($titulo,$foto,$link,$idnoticia,$resumo,$dest,$id) ;

echo "<script> document.location.href='ok.php?var=1'; 
</script>";

?>