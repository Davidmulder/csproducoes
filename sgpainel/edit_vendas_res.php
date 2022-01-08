<?php require_once('Connections/conexao.php'); ?>
<?php require_once('inc/inc_admin.php'); ?>

<?php 

$cliente=$_POST["clientes"];
$pacote=$_POST["pacotes"];
$dataini=$_POST["dataini"];
$datafim=$_POST["datafim"];
$datapag=$_POST["datapag"];
$forma=$_POST["forma"];
$obs=$_POST["obs"];
$valor=str_replace(",", ".", $_POST["valor"]);
$id=$_POST["vid"];

$dataini=GETDATA($dataini);
$datafim=GETDATA($datafim);
$datapag=GETDATA($datapag);

$query= UPDVENDAS($cliente,$pacote,$dataini,$datafim,$valor,$datapag,$forma,$obs,$liberar,$id) ;


echo "<script> document.location.href='edit_vendas.php'; 
</script>";

?>