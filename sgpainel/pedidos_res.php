 
<?php require_once('../Connections/conexao.php'); ?>
<?php 
mysql_select_db($database_conexao, $conexao);
$query_semanas = "update pedidos set
total = '$_POST[total]', fechar = '$_POST[fechado]'
where id = '$_POST[id]'
 ";
$semanas = mysql_query($query_semanas, $conexao) or die(mysql_error());


echo "<script> document.location.href='ok.php'; 
</script>"; 


?>