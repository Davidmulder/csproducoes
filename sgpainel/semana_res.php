<?php require_once('../Connections/conexao.php'); ?>
<?php 
$produto=$_POST["produto"];
mysql_select_db($database_conexao, $conexao);
$query_semanas = "insert into semana
(id_produto,semana)
values
('$_POST[produto]','$_POST[semana]')
 ";
$semanas = mysql_query($query_semanas, $conexao) or die(mysql_error());


echo "<script> document.location.href='semana.php?id=$produto'; 
</script>"; 


?>