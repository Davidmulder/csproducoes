<?php require_once('../Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_noticia = "SELECT id, grupo as titulo FROM grupo  ORDER BY id DESC ";
$noticia = mysql_query($query_noticia, $conexao) or die(mysql_error());
$row_noticia = mysql_fetch_assoc($noticia);
$totalRows_noticia = mysql_num_rows($noticia);
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
		  <h2 class="ico_mug">Destaques</h2>
		</div>
		<form action="add_destaque_res.php" method="POST" name="weboptions" id="weboptions" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span>Adicionar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php }?>
			<table width="469" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
              <tr>
                <td width="367">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#eaeaea">Grupo</td>
              </tr>
              <tr>
                <td bgcolor="#eaeaea"><select name="grupo" id="grupo">
				<option selected="selected" value="0"> Grupos </option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_noticia['id']?>"><?php echo $row_noticia['titulo']?></option>
                  <?php
} while ($row_noticia = mysql_fetch_assoc($noticia));
  $rows = mysql_num_rows($noticia);
  if($rows > 0) {
      mysql_data_seek($noticia, 0);
	  $row_noticia = mysql_fetch_assoc($noticia);
  }
?>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Home</td>
              </tr>
              <tr>
                <td><input name="dest" type="radio" value="1" />
                  Principal                  
                    <input name="dest" type="radio" value="2" />
Segundario 
<input name="dest" type="radio" value="3" />
Terceario </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input name="data" type="hidden" id="data" value="<?php echo $vdata=date("y/m/d")." ".date("h:i:s"); ?>" /></td>
              </tr>
            </table>
			<br /> 
			      <input type="submit" value="Gravar" /><br />
			     
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
mysql_free_result($noticia);
?>