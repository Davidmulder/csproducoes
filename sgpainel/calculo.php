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
$query_usuario = "select * from tabela_valor  LIMIT $inicio, $TAMANHO_PAGINA";
$usuario = mysql_query($query_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);



$query_total = "select * from tabela_valor ";
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
			<h2 class="ico_mug">Tabela de Emprestimo </h2>
			
			<table width="200" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td class="ico_success"> <a href="add_valor.php">Novo Registro </a></td>
              </tr>
            </table>
		<table width="557" id="table">
			<thead>
			<tr>
				<th width="30">ID</th>
				<th width="106">Valor</th>
				<th width="115"> 1 x</th>
				<th width="115">12 x </th>
				<th width="81">24 x </th>
				<th width="101">36 x </th>
				<th width="88">48 x </th>
				<th width="85">60 x </th>
				<th width="96">72 x </th>
				<th width="59">Actions</th>
			  </tr>
			</thead>
			<tbody>
			  <?php do { ?>
		      <tr>
			      <td class="table_check"><span class="table_date">
			        <?php 
				  
				$id= $row_usuario['id']; 
				 echo $id;
				  ?>
			      </span></td>
			      <td class="table_title" style="font-weight: bold">
				  R$ <?php 
				  $preco=$row_usuario['valor'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?>				   </td>
			      <td>R$ <?php 
				  $preco=$row_usuario['1x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td>R$
                  <?php 
				  $preco=$row_usuario['12x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td>R$
                  <?php 
				  $preco=$row_usuario['24x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td>R$
                  <?php 
				  $preco=$row_usuario['36x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td>R$
                  <?php 
				  $preco=$row_usuario['48x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td>R$
                  <?php 
				  $preco=$row_usuario['60x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td>R$
                  <?php 
				  $preco=$row_usuario['72x'];	
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
				  
				   ?></td>
			      <td><a href="deletar.php?del=13&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_valor.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
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
