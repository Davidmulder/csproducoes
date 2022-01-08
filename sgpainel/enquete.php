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
$query_usuario = "select * from enquete 
order by id desc LIMIT $inicio, $TAMANHO_PAGINA";
$usuario = mysql_query($query_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);



$query_total = "select * from enquete ";
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
			<h2 class="ico_mug">Enquete</h2>
			
			<table width="200" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td class="ico_success"> <a href="add_enquete.php">Novo Registro </a></td>
              </tr>
            </table>
		<table width="832" id="table">
			<thead>
			<tr>
				<th width="38">&nbsp;</th>
				<th width="123">Data</th>
				<th width="123">ID</th>
				<th width="385">Enquete</th>
				<th width="105">Status</th>
				<th width="118">Actions</th>
			  </tr>
			</thead>
			<tbody>
			  <?php do { ?>
		      <tr>
			      <td class="table_check">&nbsp;</td>
			      <td class="table_date"><?php 
				  
				 $vdata= $row_usuario['data']; 
				  $data=VERHORA($vdata);
				  ?></td>
			      <td class="table_date"><?php echo $row_usuario['id']; ?></td>
			      <td class="table_title" style="font-weight: bold"><?php echo $row_usuario['titulo']; ?> </td>
			      <td>
				  <a style="font-weight: bold"><?php 
				  $ativo=$row_usuario['ativo'];
				 if($ativo ==1) {
				 echo "Ativo";
				 }else{
				 
				 echo "Inativo";
				 }
				   ?></a></td>
			      <td class="texto_tabela">
				  <span style="font-weight: bold"><a href="opcao.php?area=<?php echo $row_usuario['id']; ?>">Opções</a></span> &nbsp;&nbsp;
				  <a href="deletar.php?del=11&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_enquete.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
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
