<?php require_once('../Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_usuario = "select que.id,que.titulo,sim.titulo as simulado,que.n as ordem,que.certo,disc.nome as disci from ph_questao que
inner join ph_simulado sim on (sim.id = que.id_simu)
inner join ph_diciplina disc on (disc.id = que.disc)
where sim.tipo = '1' order by sim.id asc,que.id asc";
$usuario = mysql_query($query_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
?>



<?php require_once('topo.php'); ?>

	    <div id="content" >
	    
		   <?php require_once('menu.php'); ?>
		   
		<div id="content_main" class="clearfix">
<div id="tabledata" class="section">
			<h2 class="ico_mug">Simulados quest </h2>
			
			<table width="200" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td class="ico_success"> <a href="add_quest_simulado.php">Novo Registro </a></td>
              </tr>
            </table>
		<table id="table">
			<thead>
			<tr>
				<th width="52">Ordem</th>
				<th width="116">Simulado</th>
				<th width="349">Titulo</th>
				<th width="138">Disciplina</th>
				<th width="98">Resposta</th>
				<th width="139">Actions</th>
			  </tr>
			</thead>
			<tbody>
              <?php do { ?>
              <tr>
                  <td class="table_check"><span class="table_title" style="font-weight: bold"><?php 
				  $orderm=$row_usuario['ordem']; 
				  echo $orderm; ?></span></td>
                  <td class="table_date"><?php echo $row_usuario['simulado']; ?></td>
                  <td class="table_title" style="font-weight: bold"><span class="table_title" style="font-weight: bold"><?php echo $row_usuario['titulo']; ?> </span></td>
                  <td class="table_title" style="font-weight: bold"><?php echo $row_usuario['disci']; ?></td>
                  <td class="table_title" style="font-weight: bold"><?php echo $row_usuario['certo']; ?></td>
                  <td><a href="deletar.php?del=22&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_quest_simulado.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
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
