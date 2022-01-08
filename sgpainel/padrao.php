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
		  <h2 class="ico_mug">Usuario</h2>
		</div>
		<form action="post" method="post" accept-charset="utf-8">
			<fieldset>
				<legend><span>Adicionar registro </span>  
				  <br />
				  </legend>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Nome</td>
                    </tr>
                    <tr>
                      <td><input name="nome" type="text" class="form2" id="nome" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Login</td>
                    </tr>
                    <tr>
                      <td><input name="login" type="text" class="form2" id="login" size="50" maxlength="20" /></td>
                    </tr>
                    <tr>
                      <td>Senha</td>
                    </tr>
                    <tr>
                      <td><input name="senha" type="password" class="form2" id="senha" size="50" maxlength="10" /></td>
                    </tr>
                    <tr>
                      <td><input name="acesso" type="hidden" id="acesso" value="0" /></td>
                    </tr>
                  </table>
			  <br /> 
			      <input type="submit" value="Gravar" />
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
