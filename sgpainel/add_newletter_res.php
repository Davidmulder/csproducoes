<?php require_once('../inc/inc_contabil.php'); ?>

<?php 
//email 
$titulo=$_POST["titulo"];
$msg = "<font face=�Verdana� size=�2'><b>Titulo</b> \t $_POST[titulo]</font><br>";
$msg .= "$_POST[editor]";

 $query=ENVIAR();
$row_letter2= mysql_fetch_assoc($query);
  $totalRows_letter2 = mysql_num_rows($query);

do {

$de=$row_letter2["email"];

$destino.=$de.";";

} while ($row_letter2= mysql_fetch_assoc($query));

$mensagem = "$msg";
$remetente = "contato@contabil.com.br";
$destinatario = "$destino";
$assunto = "$titulo";
$headers = "From: ".$remetente."\nContent-type: text/html"; # o �text/html� � o tipo mime da mensagem
if(!mail($destinatario,$assunto,$mensagem,$headers)){
//print "Falha no envio da mensagem";

} else {
//print "Formul�rio enviado com sucesso!";
} 






echo "<script> document.location.href='add_newletter.php?var=1'; 
</script>";

?>