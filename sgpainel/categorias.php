<?php require_once('../Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_usuario = "SELECT * FROM categoria ORDER BY tipo ASC";
$usuario = mysql_query($query_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
?>



<?php require_once('topo.php'); ?>

	    <div id="content" >
	    
		   <?php require_once('menu.php'); ?>
		   
		<div id="content_main" class="clearfix">
<div id="tabledata" class="section">
			<h2 class="ico_mug">Categorias</h2>
			
			<table width="200" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td class="ico_success"> <a href="add_categoria.php">Novo Registro </a></td>
              </tr>
            </table>
		<table id="table">
			<thead>
			<tr>
				<th width="45">&nbsp;</th>
				<th width="165">ID</th>
				<th width="358">Titulo</th>
				<th width="184">Actions</th>
			  </tr>
			</thead>
			<tbody>
              <?php do { ?>
              <tr>
                  <td class="table_check">&nbsp;</td>
                  <td class="table_date"><?php echo $row_usuario['id']; ?></td>
                  <td class="table_title" style="font-weight: bold"><span class="table_title" style="font-weight: bold"><?php echo $row_usuario['tipo']; ?> </span></td>
                  <td><a href="deletar.php?del=10&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_categoria.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
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
