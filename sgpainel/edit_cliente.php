<?php require_once('../Connections/conexao.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE cliente SET nome=%s, razao=%s, contato=%s, senha=%s, cpf=%s, cnpj=%s, email=%s, `end`=%s, numero=%s, cidade=%s, bairro=%s, tel=%s, cel=%s, uf=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['razao'], "text"),
                       GetSQLValueString($_POST['contato'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['cnpj'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['numero'], "text"),
                       GetSQLValueString($_POST['end'], "text"),
                       GetSQLValueString($_POST['cidade'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['cel'], "text"),
                       GetSQLValueString($_POST['vid'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_cliente = "-1";
if (isset($_GET['id'])) {
  $colname_cliente = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_cliente = sprintf("SELECT * FROM cliente WHERE id = %s", $colname_cliente);
$cliente = mysql_query($query_cliente, $conexao) or die(mysql_error());
$row_cliente = mysql_fetch_assoc($cliente);
$totalRows_cliente = mysql_num_rows($cliente);
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
		  <h2 class="ico_mug">Cliente</h2>
		</div>
		<form action="<?php echo $editFormAction; ?>" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span>Editar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php }?>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Acessos : <?php echo $row_cliente['acesso']; ?></td>
                    </tr>
                    <tr >
                      <td >Ultimo acesso : <?php echo $row_cliente['data']; ?></td>
                    </tr>
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Nome</td>
                    </tr>
                    <tr>
                      <td><input name="nome" type="text" class="form2" id="nome" value="<?php echo $row_cliente['nome']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Razao</td>
                    </tr>
                    <tr>
                      <td><input name="razao" type="text" class="form2" id="razao" value="<?php echo $row_cliente['razao']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>CPF</td>
                    </tr>
                    <tr>
                      <td><input name="cpf" type="text" class="form2" id="cpf" value="<?php echo $row_cliente['cpf']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>CNPJ</td>
                    </tr>
                    <tr>
                      <td><input name="cnpj" type="text" class="form2" id="cnpj" value="<?php echo $row_cliente['cnpj']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Contato</td>
                    </tr>
                    <tr>
                      <td><input name="contato" type="text" class="form2" id="contato" value="<?php echo $row_cliente['contato']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Senha</td>
                    </tr>
                    <tr>
                      <td><input name="senha" type="text" class="form2" id="senha" value="<?php echo $row_cliente['senha']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>E-mail</td>
                    </tr>
                    <tr>
                      <td><input name="email" type="text" class="form2" id="email" value="<?php echo $row_cliente['email']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>End</td>
                    </tr>
                    <tr>
                      <td><textarea name="end" cols="50" class="form2" id="end"><?php echo $row_cliente['end']; ?></textarea></td>
                    </tr>
                    <tr>
                      <td>Cep</td>
                    </tr>
                    <tr>
                      <td><input name="numero" type="text" class="form2" id="numero" value="<?php echo $row_cliente['numero']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Cidade</td>
                    </tr>
                    <tr>
                      <td><input name="cidade" type="text" class="form2" id="cidade" value="<?php echo $row_cliente['cidade']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Bairro</td>
                    </tr>
                    <tr>
                      <td><input name="bairro" type="text" class="form2" id="bairro" value="<?php echo $row_cliente['bairro']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>UF</td>
                    </tr>
                    <tr>
                      <td><input name="uf" type="text" class="form2" id="uf" value="<?php echo $row_cliente['uf']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Telefone</td>
                    </tr>
                    <tr>
                      <td><input name="tel" type="text" class="form2" id="tel" value="<?php echo $row_cliente['tel']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Celular</td>
                    </tr>
                    <tr>
                      <td><input name="cel" type="text" class="form2" id="cel" value="<?php echo $row_cliente['cel']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td><input name="vid" type="hidden" id="vid" value="<?php echo $row_cliente['id']; ?>" /></td>
                    </tr>
                  </table>
			  <br /> 
			      <input type="submit" value="Gravar" />
			  <br />
		  </fieldset>
			
		    
		    <input type="hidden" name="MM_update" value="form">
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
mysql_free_result($cliente);
?>
