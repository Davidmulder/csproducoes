<?php require_once('../Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_usuario = "select * from ph_simulado order by id desc";
$usuario = mysql_query($query_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
?>



<?php require_once('topo.php'); ?>

	    <div id="content" >
	    
		   <?php require_once('menu.php'); ?>
		   
		<div id="content_main" class="clearfix">
<div id="tabledata" class="section">
			<h2 class="ico_mug">Simulados</h2>
			
			<table width="363" height="19" border="0" cellpadding="0" cellspacing="1">
              <tr>
                <td width="224" class="ico_success"> <a href="add_simulado.php">Novo Registro </a></td>
                <td width="136" class="ico_success"> <a href="simulados_quest.php">Questoes </a></td>
              </tr>
        </table>
		<table id="table">
			<thead>
			<tr>
				<th width="95">Data</th>
				<th width="108">ID</th>
				<th width="247">Titulo</th>
				<th width="94">Status</th>
				<th width="256">Actions</th>
			  </tr>
			</thead>
			<tbody>
              <?php do { ?>
              <tr>
                  <td class="table_check"><?php echo $row_usuario['data']; ?></td>
                  <td class="table_date"><?php echo $row_usuario['id']; ?></td>
                  <td class="table_title" style="font-weight: bold"><span class="table_title" style="font-weight: bold"><?php echo $row_usuario['titulo']; ?> </span></td>
                  <td class="table_title" style="font-weight: bold"><?php 
				  $status= $row_usuario['tipo']; 
				  if($status=='1'){
				  echo "Ativado";
				  }else{
				  echo "Desativado";
				  }
				  
				  
				  ?></td>
                  <td><a href="deletar.php?del=21&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_simulado.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
              </tr>
                <?php } while ($row_usuario = mysql_fetch_assoc($usuario)); ?>
			</tbody>
		</table>
	    <br />
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
?>
