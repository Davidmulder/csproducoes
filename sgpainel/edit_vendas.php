<?php require_once('Connections/conexao.php'); ?>
<?php
mysql_select_db($database_conexao, $conexao);
$query_cliente = "SELECT id, nome FROM cliente";
$cliente = mysql_query($query_cliente, $conexao) or die(mysql_error());
$row_cliente = mysql_fetch_assoc($cliente);
$totalRows_cliente = mysql_num_rows($cliente);

mysql_select_db($database_conexao, $conexao);
$query_pacotes = "SELECT id, titulo FROM produto";
$pacotes = mysql_query($query_pacotes, $conexao) or die(mysql_error());
$row_pacotes = mysql_fetch_assoc($pacotes);
$totalRows_pacotes = mysql_num_rows($pacotes);

$colname_vendas = "-1";
if (isset($_COOKIE['vcod_vendas'])) {
  $colname_vendas = (get_magic_quotes_gpc()) ? $_COOKIE['vcod_vendas'] : addslashes($_COOKIE['vcod_vendas']);
}
mysql_select_db($database_conexao, $conexao);
$query_vendas = sprintf("SELECT * FROM clientepacote WHERE id = %s", $colname_vendas);
$vendas = mysql_query($query_vendas, $conexao) or die(mysql_error());
$row_vendas = mysql_fetch_assoc($vendas);
$totalRows_vendas = mysql_num_rows($vendas);

mysql_select_db($database_conexao, $conexao);
$query_audio = "select audio.id,audio.nome from audio
inner join news  on (news.id = audio.id_locutor)
order by audio.id desc";
$audio = mysql_query($query_audio, $conexao) or die(mysql_error());
$row_audio = mysql_fetch_assoc($audio);
$totalRows_audio = mysql_num_rows($audio);

mysql_select_db($database_conexao, $conexao);
$query_listamp3 = "SELECT clienteaudio.id,cliente.nome as cliente,audio.nome,audio.arquivo,news.titulo as locutor FROM clienteaudio inner join cliente on (cliente.id=clienteaudio.id_cliente) inner join audio on (audio.id = clienteaudio.id_audio) inner join news on (news.id = audio.id_locutor) where clienteaudio.id_cliepacote = '$_COOKIE[vcod_vendas]' ORDER BY clienteaudio.id";
$listamp3 = mysql_query($query_listamp3, $conexao) or die(mysql_error());
$row_listamp3 = mysql_fetch_assoc($listamp3);
$totalRows_listamp3 = mysql_num_rows($listamp3);
?>
<?php require_once('topo.php'); ?>
<script type="text/javascript" src="date-picker-v4/js/datepicker.js"></script>

        <link href="date-picker-v4/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cal_data.js"></script>
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
		<form action="edit_vendas_res.php" method="post" accept-charset="utf-8">
			<fieldset>
				<legend><span>Adicionar registro </span>  
				  <br />
		    </legend>
				  <table width="400" border="0" cellpadding="2" cellspacing="4" class="texto_formulario">
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Cliente</td>
                    </tr>
                    <tr>
                      <td><select name="clientes" id="clientes">
                        <option selected="selected" value="" <?php if (!(strcmp("", $row_vendas['id_cliente']))) {echo "selected=\"selected\"";} ?>>---</option>
                        <?php
do {  
?><option value="<?php echo $row_cliente['id']?>"<?php if (!(strcmp($row_cliente['id'], $row_vendas['id_cliente']))) {echo "selected=\"selected\"";} ?>><?php echo $row_cliente['nome']?></option>
                        <?php
} while ($row_cliente = mysql_fetch_assoc($cliente));
  $rows = mysql_num_rows($cliente);
  if($rows > 0) {
      mysql_data_seek($cliente, 0);
	  $row_cliente = mysql_fetch_assoc($cliente);
  }
?>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Pacote</td>
                    </tr>
                    <tr>
                      <td><select name="pacotes" id="pacotes">
                        <option selected="selected" value="" <?php if (!(strcmp("", $row_vendas['id_pacote']))) {echo "selected=\"selected\"";} ?>>---</option>
                        <?php
do {  
?><option value="<?php echo $row_pacotes['id']?>"<?php if (!(strcmp($row_pacotes['id'], $row_vendas['id_pacote']))) {echo "selected=\"selected\"";} ?>><?php echo $row_pacotes['titulo']?></option>
                        <?php
} while ($row_pacotes = mysql_fetch_assoc($pacotes));
  $rows = mysql_num_rows($pacotes);
  if($rows > 0) {
      mysql_data_seek($pacotes, 0);
	  $row_pacotes = mysql_fetch_assoc($pacotes);
  }
?>
                                            </select></td>
                    </tr>
                    <tr>
                      <td>Data inicial </td>
                    </tr>
                    <tr>
                      <td>
					    <input type="text" class="w16em dateformat-d-sl-m-sl-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y highlight-days-67 range-low-5-week range-high-1-year" id="dataini" name="dataini" value="<?php echo $row_vendas['dataini']; ?>" />
					  
					  </td>
                    </tr>
                    <tr>
                      <td>Data Fim </td>
                    </tr>
                    <tr>
                      <td><input type="text" class="w16em dateformat-d-sl-m-sl-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y highlight-days-67 range-low-5-week range-high-1-year" id="datafim" name="datafim" value="<?php echo $row_vendas['datafim']; ?>" /></td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                    </tr>
                    <tr>
                      <td><input name="valor" type="text" id="valor" value="<?php echo $row_vendas['valor']; ?>" /></td>
                    </tr>
                    <tr>
                      <td>Data De Pagamento </td>
                    </tr>
                    <tr>
                      <td><input type="text" class="w16em dateformat-d-sl-m-sl-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y highlight-days-67 range-low-5-week range-high-1-year" id="datapag" name="datapag" value="<?php echo $row_vendas['datapag']; ?>" /></td>
                    </tr>
                    <tr>
                      <td>Forma de Pagamento </td>
                    </tr>
                    <tr>
                      <td><label>
                        <select name="forma" id="forma">
                          <option selected="selected" value="" <?php if (!(strcmp("", $row_vendas['forma']))) {echo "selected=\"selected\"";} ?>>---</option>
<option value="Deposito" <?php if (!(strcmp("Deposito", $row_vendas['forma']))) {echo "selected=\"selected\"";} ?>>Deposito</option>
                          <option value="Transferencia" <?php if (!(strcmp("Transferencia", $row_vendas['forma']))) {echo "selected=\"selected\"";} ?>>Transferencia</option>
<option value="Cartao" <?php if (!(strcmp("Cartao", $row_vendas['forma']))) {echo "selected=\"selected\"";} ?>>Cartão</option>
                      </select>
                      </label></td>
                    </tr>
                    <tr>
                      <td>Obs</td>
                    </tr>
                    <tr>
                      <td><textarea name="obs" cols="40" rows="4" class="form2" id="obs"><?php echo $row_vendas['obs']; ?></textarea></td>
                    </tr>
                    <tr>
                      <td>Liberar</td>
                    </tr>
                    <tr>
                      <td><input <?php if (!(strcmp($row_vendas['liberar'],"1"))) {echo "checked=\"checked\"";} ?> name="liberar" type="radio" value="1" />
                        Sim
                        <input <?php if (!(strcmp($row_vendas['liberar'],"0"))) {echo "checked=\"checked\"";} ?> name="liberar" type="radio" value="0" />
N&atilde;o</td>
                    </tr>
                    <tr>
                      <td><input name="data" type="hidden" id="data" value="<?php echo $vdata=date("y/m/d")." ".date("h:i:s"); ?>" />
                      <input name="vid" type="hidden" id="vid" value="<?php echo $row_vendas['id']; ?>" /></td>
                    </tr>
            </table>
			  <br /> 
			      <input type="submit" value="Gravar" />
			  <br />
			</fieldset>
		</form>
		
		
		<span class="texto_formulario">Audio		</span>
		<form id="form1" name="form1" method="post" action="edit_audio_res.php">
		  <table width="920" border="0" cellspacing="2" cellpadding="2">
            <tr>
              <td width="205"><select name="audio" class="form2" id="audio">
			  <option selected="selected"> ---</option>
                <?php
do {  
?>
                <option value="<?php echo $row_audio['id']?>"><?php echo $row_audio['nome']?></option>
                <?php
} while ($row_audio = mysql_fetch_assoc($audio));
  $rows = mysql_num_rows($audio);
  if($rows > 0) {
      mysql_data_seek($audio, 0);
	  $row_audio = mysql_fetch_assoc($audio);
  }
?>
              </select>
              <input name="venda" type="hidden" id="venda" value="<?php echo $row_vendas['id']; ?>" />              <input name="cliente" type="hidden" id="cliente" value="<?php echo $row_vendas['id_cliente']; ?>" /></td>
              <td width="554"><input type="submit" name="Submit" value="Gravar" /></td>
              <td width="141">&nbsp;</td>
            </tr>
          </table>
        </form>
				
				<br />
				<?php if ($totalRows_listamp3 > 0) { // Show if recordset not empty ?>
				  <table width="920" border="0" cellspacing="2" cellpadding="2">
				    <tr>
				      <td width="114" height="20" align="center" bgcolor="#D4D0C8" class="texto_sis">ID</td>
                      <td width="120" align="center" bgcolor="#D4D0C8" class="texto_sis">Tipo</td>
                      <td width="218" align="left" bgcolor="#D4D0C8" class="texto_sis">Audio</td>
                      <td width="225" align="left" bgcolor="#D4D0C8" class="texto_sis">Locutor</td>
                      <td colspan="2" align="left" bgcolor="#D4D0C8" class="texto_sis">MP3</td>
                    </tr>
				    <?php do { ?>
			        <tr class="texto_tabela">
			          <td height="30" align="center"><?php echo $row_listamp3['id']; ?></td>
			          <td align="center">Audio</td>
			          <td align="left"><?php echo $row_listamp3['nome']; ?></td>
			          <td align="left"><?php echo $row_listamp3['locutor']; ?></td>
			          <td width="185" align="left"><?php echo $row_listamp3['arquivo']; ?></td>
			          <td width="20"><a href="deletar.php?del=22&id=<?php echo $row_listamp3['id']; ?>"><img src="img/cancel.jpg" width="16" height="16" border="0" /></a></td>
			        </tr>
				      <?php } while ($row_listamp3 = mysql_fetch_assoc($listamp3)); ?>
				        </table>
				  <?php } // Show if recordset not empty ?></div>
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
mysql_free_result($cliente);

mysql_free_result($pacotes);

mysql_free_result($vendas);

mysql_free_result($audio);

mysql_free_result($listamp3);
?>
