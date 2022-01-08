<?php require_once('../Connections/conexao.php'); ?>
<?php

mysql_select_db($database_conexao, $conexao);
$query_cliente = sprintf("SELECT * FROM cliente WHERE id = '$_GET[cliente]' ", $colname_cliente);
$cliente = mysql_query($query_cliente, $conexao) or die(mysql_error());
$row_cliente = mysql_fetch_assoc($cliente);
$totalRows_cliente = mysql_num_rows($cliente);


mysql_select_db($database_conexao, $conexao);
$query_carrinho = sprintf("SELECT * FROM carrinho WHERE carrinho = '$_GET[carrinho]' ", $colname_carrinho);
$carrinho = mysql_query($query_carrinho, $conexao) or die(mysql_error());
$row_carrinho = mysql_fetch_assoc($carrinho);
$totalRows_carrinho = mysql_num_rows($carrinho);


mysql_select_db($database_conexao, $conexao);
$query_pedido = sprintf("SELECT * FROM pedidos WHERE id = '$_GET[id]' ", $colname_pedido);
$pedido = mysql_query($query_pedido, $conexao) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);

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
		  <h2 class="ico_mug">Pedidos</h2>
		</div>
		<form action="pedidos_res.php" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span>Editar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php }?>
				  <table width="869" border="0" cellpadding="3" cellspacing="4" class="texto_formulario">
                    <tr >
                      <td colspan="3" >&nbsp;</td>
                    </tr>
                    <tr >
                      <td class="ui-state-error-text">Pedido</td>
                      <td class="texto_tabela">&nbsp;</td>
                      <td class="texto_tabela">&nbsp;</td>
                    </tr>
                    <tr >
                      <td colspan="3" class="texto_tabela" ><?php echo $row_pedido['id']; ?></td>
                    </tr>
                    <tr >
                      <td class="ui-state-error-text">Nome</td>
                      <td >&nbsp;</td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="texto_tabela"><?php echo $row_cliente['nome']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="ui-state-error-text">E-mail</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="texto_tabela"><?php echo $row_cliente['email']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="ui-state-error-text">Endere&ccedil;o de Entrega </td>
                    </tr>
                    <tr>
                      <td colspan="3" class="texto_tabela"><?php echo $row_cliente['end']; ?></td>
                    </tr>
                    <tr>
                      <td width="326" class="ui-state-error-text">Cidade</td>
                      <td width="261" class="ui-state-error-text">Bairro</td>
                      <td width="262" class="ui-state-error-text">UF: <span class="texto_tabela"><?php echo $row_cliente['uf']; ?></span></td>
                    </tr>
                    <tr>
                      <td class="texto_tabela"><?php echo $row_cliente['cidade']; ?></td>
                      <td class="texto_tabela"><?php echo $row_cliente['bairro']; ?></td>
                      <td class="ui-state-error-text">CEP:<span class="texto_tabela"><?php echo $row_cliente['numero']; ?></span></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="ui-state-error-text">Telefone</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="texto_tabela"><?php echo $row_cliente['tel']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="ui-state-error-text">Celular</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="texto_tabela"><?php echo $row_cliente['cel']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3">Status do Pedido
                        <input <?php if (!(strcmp($row_pedido['fechar'],"1"))) {echo "checked=\"checked\"";} ?> name="fechado" type="radio" value="1" />
                        Fechado
                        <input <?php if (!(strcmp($row_pedido['fechar'],"0"))) {echo "checked=\"checked\"";} ?> name="fechado" type="radio" value="0" />
                        Aberto</td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3"><table width="863" border="0" cellspacing="3" cellpadding="0">
                        <tr>
                          <td width="72" class="ui-state-error">COD</td>
                          <td width="294" class="ui-state-error">Produto</td>
                          <td width="128" class="ui-state-error">Qtd</td>
                          <td width="181" class="ui-state-error">Valor Unitario </td>
                          <td width="182" class="ui-state-error">Subtotal</td>
                        </tr>
                        <?php do { ?>
                        <tr class="ui-state-focus">
                          <td class="odd"><?php echo $row_carrinho['cod_prod']; ?></td>
                          <td class="odd"><?php echo $row_carrinho['produto']; ?></td>
                          <td class="odd"><?php echo $row_carrinho['qtd']; ?></td>
                          <td class="odd">R$                            <?php 
						   
						  $preco=$row_carrinho['valor'];		
			 					$number=number_format($preco,2,',','.');
                    				echo $number;
						  ?></td>
                          <td class="odd">
						  R$ <?php 
			  $valor=($row_carrinho['valor'] * $row_carrinho['qtd']);
			  $number=number_format($valor,2,',','.');
			  $total=($total + $valor);
                    echo $number;
			
			  
			 ?>						  </td>
                        </tr>
                          <?php } while ($row_carrinho = mysql_fetch_assoc($carrinho)); ?>
                      </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td class="ui-state-error">Total</td>
                    </tr>
                    <tr>
                      <td><input name="id" type="hidden" id="id" value="<?php echo $row_pedido['id']; ?>" />
                      <input name="total" type="hidden" id="total" value="<?php echo $total; ?>" /></td>
                      <td>&nbsp;</td>
                      <td class="odd">
					  R$ <?php 
			  
			  $number=number_format($total,2,',','.');
			  echo $number;
			  ?>					  </td>
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
<?php
mysql_free_result($carrinho);

mysql_free_result($pedido);

mysql_free_result($cliente);
?>
