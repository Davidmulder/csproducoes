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
		  <h2 class="ico_mug">Registros</h2>
		</div>
		<form action="post" method="post" accept-charset="utf-8">
			<fieldset>
				<legend><br />
		    </legend>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="odd">
                    <tr class="approved" >
                      <td colspan="2" align="center" class="bbcode" >Deseja Deletar o Registro? </td>
                    </tr>
                    <tr >
                      <td colspan="2" >&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="181" align="center">
					  <a href="sql_del_especial.php?del=<?php echo $_GET["del"];?>&id=<?php echo $_GET["id"];?>" style="font-weight: bold">SIM</a></td>
                      <td width="202" align="center"><a href="#" style="font-weight: bold" onclick="history.back()">N&Atilde;O</a></td>
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
