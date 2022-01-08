<?php require_once('../Connections/conexao.php'); ?>

<?php 
if(empty($_GET["p"])){
$page="1";
}else{
$page=$_GET["p"];

}
//Limito a busqueda
$TAMANHO_PAGINA = 30;

//examino a página a mostrar e o inicio do registo a mostrar
$pagina = $page;
if (!$pagina) {
   $inicio = 0;
   $pagina=1;
}
else {
   $inicio = ($pagina - 1) * $TAMANHO_PAGINA;
} 

?>

<?php
mysql_select_db($database_conexao, $conexao);
$query_usuario = "select sub.id,sub.codsub,sub.subgrupo,gru.grupo from subgrupo sub
inner join grupo gru on (gru.id = sub.id_grupo) where sub.codsub > '0'
order by sub.subgrupo LIMIT $inicio, $TAMANHO_PAGINA";
$usuario = mysql_query($query_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);



$query_total = "select sub.id,sub.subgrupo,gru.grupo from subgrupo sub
inner join grupo gru on (gru.id = sub.id_grupo)
order by sub.subgrupo ";
$total = mysql_query($query_total, $conexao) or die(mysql_error());
$row_total = mysql_fetch_assoc($total);
$totalRows_total = mysql_num_rows($total);
?>
<?php $paginacao=ceil($totalRows_total/$TAMANHO_PAGINA); ?>


<?php require_once('topo.php'); ?>
<link href="paginacaodigg/global.css" rel="stylesheet" type="text/css">
	    <div id="content" >
	    
		   <?php require_once('menu.php'); ?>
		   
		<div id="content_main" class="clearfix">
<div id="tabledata" class="section">
			<h2 class="ico_mug">Grupos</h2>
			Total:<?php echo $totalRows_total; ?>
			<table width="447" id="table">
			<thead>
			<tr>
				<th width="50">&nbsp;</th>
				<th width="134">ID</th>
				<th width="226">Subgrupo</th>
				<th width="273">Grupo</th>
				<th width="213">Actions</th>
			  </tr>
			</thead>
			<tbody>
			  <?php do { ?>
		      <tr>
			      <td class="table_check">&nbsp;</td>
			      <td class="table_date"><?php echo $row_usuario['codsub']; ?></td>
			      <td class="table_title" style="font-weight: bold"><?php echo $row_usuario['subgrupo']; ?> </td>
			      <td class="table_title" style="font-weight: bold"><?php echo $row_usuario['grupo']; ?> </td>
			      <td><a href="deletar.php?del=12&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_subgrupo.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
		      </tr>
			    <?php } while ($row_usuario = mysql_fetch_assoc($usuario)); ?>
			</tbody>
		</table>
		
		
		
	     <table width="400" border="0" cellspacing="1" cellpadding="0">
           <tr>
             <td><?php require_once('paginacaodigg/paginate.php'); ?>
         <?php echo paginate($page, $paginacao, $format_pg); ?></td>
           </tr>
         </table>
</div>
<!-- end #tabledata -->
		<!-- end #section -->
<div id="panels" class="clearfix"><!-- end #photo --><!-- end #todo -->
          <!-- end #calendar -->
</div>
		<!-- end #panels -->
		<!-- end #dialog [if you don't want this, delete whole div and 6th line i custom.js -->
        </div>
	    <!-- end #content -->
	    <!-- end #footer -->
</div>
<!-- end container -->
</div>
</body>
</html>
<?php
mysql_free_result($usuario);

mysql_free_result($total);
?>
