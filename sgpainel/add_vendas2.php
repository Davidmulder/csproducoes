<?php require_once('Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_vendas = "SELECT id FROM clientepacote order by id desc limit 1";
$vendas = mysql_query($query_vendas, $conexao) or die(mysql_error());
$row_vendas = mysql_fetch_assoc($vendas);
$totalRows_vendas = mysql_num_rows($vendas);
?>
<?php require_once('topo.php'); ?>

	    <div id="content" >
	       <?php require_once('menu.php'); ?>
		<div id="content_main" class="clearfix">
		  <!-- end #sidebar -->

		<!-- end #content_main -->
		<!-- end #postedit -->
		<!-- end #tabledata -->
<div class="section">
			
		<div>
		  <h2 class="ico_mug">Vendas</h2>
		</div>
		<form action="post" method="post" accept-charset="utf-8">
			<fieldset>
				<legend><br />
		    </legend>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="odd">
                    <tr class="approved" >
                      <td colspan="2" align="center" class="bbcode" >Deseja Adicionar os Audios se ultimo registro? </td>
                    </tr>
                    <tr >
                      <td colspan="2" >&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="181" align="center">
					  <a href="cookie_vendas.php?id=<?php echo $row_vendas['id']; ?>" style="font-weight: bold">SIM</a></td>
                      <td width="202" align="center"><a href="Vendas.php" style="font-weight: bold" >N&Atilde;O</a></td>
                    </tr>
                  </table>
			  <br />
			  <br />
			</fieldset>
			
		</form>
		  </div>
<!-- end #section -->
		
		<div id="panels" class="clearfix">
		  <!-- end #photo --><!-- end #todo -->
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
mysql_free_result($vendas);
?>
