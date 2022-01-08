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
		<form action="add_vendas_res.php" method="post" accept-charset="utf-8">
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
					  <option selected="selected">---</option>
                        <?php
do {  
?>
                        <option value="<?php echo $row_cliente['id']?>"><?php echo $row_cliente['nome']?></option>
                        <?php
} while ($row_cliente = mysql_fetch_assoc($cliente));
  $rows = mysql_num_rows($cliente);
  if($rows > 0) {
      mysql_data_seek($cliente, 0);
	  $row_cliente = mysql_fetch_assoc($cliente);
  }
?>
                      </select>                      </td>
                    </tr>
                    <tr>
                      <td>Pacote</td>
                    </tr>
                    <tr>
                      <td><select name="pacotes" id="pacotes">
					  <option selected="selected">---</option>
                        <?php
do {  
?>
                        <option value="<?php echo $row_pacotes['id']?>"><?php echo $row_pacotes['titulo']?></option>
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
					    <input type="text" class="w16em dateformat-d-sl-m-sl-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y highlight-days-67 range-low-5-week range-high-1-year" id="dataini" name="dataini" value="" />					  </td>
                    </tr>
                    <tr>
                      <td>Data Fim </td>
                    </tr>
                    <tr>
                      <td><input type="text" class="w16em dateformat-d-sl-m-sl-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y highlight-days-67 range-low-5-week range-high-1-year" id="datafim" name="datafim" value="" /></td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                    </tr>
                    <tr>
                      <td><input name="valor" type="text" id="valor" /></td>
                    </tr>
                    <tr>
                      <td>Data De Pagamento </td>
                    </tr>
                    <tr>
                      <td><input type="text" class="w16em dateformat-d-sl-m-sl-Y show-weeks statusformat-l-cc-sp-d-sp-F-sp-Y highlight-days-67 range-low-5-week range-high-1-year" id="datapag" name="datapag" value="" /></td>
                    </tr>
                    <tr>
                      <td>Forma de Pagamento </td>
                    </tr>
                    <tr>
                      <td><label>
                        <select name="forma" id="forma">
						<option selected="selected">---</option>
                          <option value="Deposito">Deposito</option>
                          <option value="Transferencia">Transferencia</option>
                          <option value="Cartao">Cartão</option>
                        </select>
                      </label></td>
                    </tr>
                    <tr>
                      <td>Obs</td>
                    </tr>
                    <tr>
                      <td><textarea name="obs" cols="40" rows="4" class="form2" id="obs"></textarea></td>
                    </tr>
                    <tr>
                      <td><input name="data" type="hidden" id="data" value="<?php echo $vdata=date("y/m/d")." ".date("h:i:s"); ?>" /></td>
                    </tr>
            </table>
			  <br /> 
			      <input type="submit" value="Gravar" />
			  <br />
			</fieldset>
		</form>
		
		
		<br />
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
mysql_free_result($cliente);

mysql_free_result($pacotes);
?>
