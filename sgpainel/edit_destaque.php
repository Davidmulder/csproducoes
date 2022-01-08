<?php require_once('../Connections/conexao.php'); ?>
<?php
$colname_destaque = "-1";
if (isset($_GET['id'])) {
  $colname_destaque = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_destaque = sprintf("SELECT * FROM destaque WHERE id = %s", $colname_destaque);
$destaque = mysql_query($query_destaque, $conexao) or die(mysql_error());
$row_destaque = mysql_fetch_assoc($destaque);
$totalRows_destaque = mysql_num_rows($destaque);

mysql_select_db($database_conexao, $conexao);
$query_grupos = "SELECT * FROM grupo";
$grupos = mysql_query($query_grupos, $conexao) or die(mysql_error());
$row_grupos = mysql_fetch_assoc($grupos);
$totalRows_grupos = mysql_num_rows($grupos);
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
		  <h2 class="ico_mug">Destaque</h2>
		</div>
		<form action="edit_destaque_res.php" method="POST" name="weboptions" id="weboptions" accept-charset="iso-8859-1">
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
                <td bgcolor="#eaeaea">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#eaeaea">Grupos</td>
              </tr>
              <tr>
                <td><select name="grupo" id="grupo">
                  <?php
do {  
?>
                  <option value="<?php echo $row_grupos['id']?>"<?php if (!(strcmp($row_grupos['id'], $row_destaque['id_news']))) {echo "selected=\"selected\"";} ?>><?php echo $row_grupos['grupo']?></option>
                  <?php
} while ($row_grupos = mysql_fetch_assoc($grupos));
  $rows = mysql_num_rows($grupos);
  if($rows > 0) {
      mysql_data_seek($grupos, 0);
	  $row_grupos = mysql_fetch_assoc($grupos);
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
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td><input <?php if (!(strcmp($row_destaque['tipo'],"1"))) {echo "checked=\"checked\"";} ?> name="dest" type="radio" value="1" />
Principal
  <input <?php if (!(strcmp($row_destaque['tipo'],"2"))) {echo "checked=\"checked\"";} ?> name="dest" type="radio" value="2" />
Segundario
<input <?php if (!(strcmp($row_destaque['tipo'],"3"))) {echo "checked=\"checked\"";} ?> name="dest" type="radio" value="3" />
Terceario </td>
              </tr>
              <tr>
                <td><input name="id" type="hidden" id="id" value="<?php echo $row_destaque['id']; ?>" /></td>
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
mysql_free_result($destaque);

mysql_free_result($grupos);
?>
