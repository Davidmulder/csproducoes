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
  $updateSQL = sprintf("UPDATE arquivo SET id_prof=%s, nome=%s, texto=%s, arquivo=%s WHERE id=%s",
                       GetSQLValueString($_POST['cliente'], "int"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['texto'], "text"),
                       GetSQLValueString($_POST['arquivo'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());

  $updateGoTo = "ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_conexao, $conexao);
$query_clientes = "SELECT id, nome FROM professores ORDER BY nome ASC";
$clientes = mysql_query($query_clientes, $conexao) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

$colname_arquivo = "-1";
if (isset($_GET['id'])) {
  $colname_arquivo = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_arquivo = sprintf("SELECT * FROM arquivo WHERE id = %s", $colname_arquivo);
$arquivo = mysql_query($query_arquivo, $conexao) or die(mysql_error());
$row_arquivo = mysql_fetch_assoc($arquivo);
$totalRows_arquivo = mysql_num_rows($arquivo);
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
		  <h2 class="ico_mug">Arquivo</h2>
		</div>
		<form action="<?php echo $editFormAction; ?>" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span>Adicionar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php }?>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td colspan="2" >&nbsp;</td>
                    </tr>
                    <tr >
                      <td colspan="2" >Nome</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="nome" type="text" class="form2" id="nome" value="<?php echo $row_arquivo['nome']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td colspan="2">Professor</td>
                    </tr>
                    <tr>
                      <td colspan="2"><select name="cliente" class="form2" id="cliente">
                        <?php
do {  
?>
                        <option value="<?php echo $row_clientes['id']?>"<?php if (!(strcmp($row_clientes['id'], $row_arquivo['id_cliente']))) {echo "selected=\"selected\"";} ?>><?php echo $row_clientes['nome']?></option>
                        <?php
} while ($row_clientes = mysql_fetch_assoc($clientes));
  $rows = mysql_num_rows($clientes);
  if($rows > 0) {
      mysql_data_seek($clientes, 0);
	  $row_clientes = mysql_fetch_assoc($clientes);
  }
?>
                      </select></td>
                    </tr>
                    <tr>
                      <td width="246">Arquivo</td>
                      <td width="137" class="ico_success"><a href="#" onclick="window.open('arquivo_todos.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Inserir Arquivo</a></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="arquivo" type="text" class="form2" id="arquivo" value="<?php echo $row_arquivo['arquivo']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td colspan="2">Descri&ccedil;&atilde;o</td>
                    </tr>
                    <tr>
                      <td colspan="2"><textarea name="texto" cols="50" class="form2" id="texto"><?php echo $row_arquivo['texto']; ?></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $row_arquivo['id']; ?>" /></td>
                    </tr>
                  </table>
			  <br /> 
			      <input type="submit" value="Gravar" />
			  <br />
			</fieldset>
			
		    <input type="hidden" name="MM_insert" value="form">
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
mysql_free_result($clientes);

mysql_free_result($arquivo);
?>
