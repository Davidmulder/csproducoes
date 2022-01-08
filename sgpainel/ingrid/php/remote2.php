<?php require_once('../../../Connections/conexao.php'); ?>

<?php 
$TAMANHO_PAGINA =30;
$pagina = $_GET["page"];
if (!$pagina) {
  $inicio = 0;
  $pagina=1;
}
else {
  $inicio = ($pagina - 1) * $TAMANHO_PAGINA;
}



$query= "select * from news limit $TAMANHO_PAGINA offset $inicio ";
$list = mysql_query($query, $conexao) or die(mysql_error());
$row_list = mysql_fetch_assoc($list);
$totalRows_list = mysql_num_rows($list);

?>

<?php
$rows = 3;
$cols = 5;

$page = isset($_GET['page'])?$_GET['page']:-1;
$sort = isset($_GET['sort'])?$_GET['sort']:-1;

?>


<table>
<tbody>
<?php do {?>

  <tr>
   <td><?php echo $row_list["data"]; ?></td>

   <td><?php echo $row_list["titulo"] ?></td>
   <td><?php echo $row_list["resumo"] ?></td>
   <td><a href="<?php echo $row_list["id"] ?>">Deletar</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $row_list["id"] ?>">Editar</a></td>
       
  </tr>
 <?php } while ($row_list= mysql_fetch_assoc($list));?>
</tbody>
</table>
