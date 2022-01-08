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
  $updateSQL = sprintf("UPDATE tabela_valor SET valor=%s, `1x`=%s, `12x`=%s, `24x`=%s, `36x`=%s, `48x`=%s, `60x`=%s, `72x`=%s WHERE id=%s",
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['1x'], "double"),
                       GetSQLValueString($_POST['12x'], "double"),
                       GetSQLValueString($_POST['24x'], "double"),
                       GetSQLValueString($_POST['36x'], "double"),
                       GetSQLValueString($_POST['48x'], "double"),
                       GetSQLValueString($_POST['60x'], "double"),
                       GetSQLValueString($_POST['72x'], "double"),
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

$colname_valor = "-1";
if (isset($_GET['id'])) {
  $colname_valor = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_valor = sprintf("SELECT * FROM tabela_valor WHERE id = %s", $colname_valor);
$valor = mysql_query($query_valor, $conexao) or die(mysql_error());
$row_valor = mysql_fetch_assoc($valor);
$totalRows_valor = mysql_num_rows($valor);
?>

<?php require_once('topo.php'); ?>
<!-- Load jQuery -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1.3");
</script>

<!-- Load TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/jquery.tinymce.js"></script>

<script type="text/javascript" src="editor.js"></script>

	    <div id="content" >
	       <?php require_once('menu.php'); ?>
		<div id="content_main" class="clearfix">
		  <!-- end #sidebar -->

		<!-- end #content_main -->
		<!-- end #postedit -->
		<!-- end #tabledata -->
<div class="section">
			
		<div>
		  <h2 class="ico_mug">Tabela</h2>
		</div>
		<form action="<?php echo $editFormAction; ?>" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span>Editar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">MENSAGEM ENVIADA </span></div>
			<br />
			<?php }?>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td colspan="2" >&nbsp;</td>
                    </tr>
                    <tr >
                      <td colspan="2" >Valor</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="valor" type="text" class="form2" id="valor" value="<?php echo $row_valor['valor']; ?>" size="50" />
                      (0,0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">1x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="1x" type="text" class="form2" id="1x" value="<?php echo $row_valor['1x']; ?>" size="30" />
                      (0.0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">12x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="12x" type="text" class="form2" id="12x" value="<?php echo $row_valor['12x']; ?>" size="30" />
(0.0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">24x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="24x" type="text" class="form2" id="24x" value="<?php echo $row_valor['24x']; ?>" size="30" />
(0.0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">36x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="36x" type="text" class="form2" id="36x" value="<?php echo $row_valor['36x']; ?>" size="30" />
(0.0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">48x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="48x" type="text" class="form2" id="48x" value="<?php echo $row_valor['48x']; ?>" size="30" />
(0.0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">60x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="60x" type="text" class="form2" id="60x" value="<?php echo $row_valor['60x']; ?>" size="30" />
(0.0)</td>
                    </tr>
                    <tr>
                      <td colspan="2">72x</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="72x" type="text" class="form2" id="72x" value="<?php echo $row_valor['72x']; ?>" size="30" />
(0.0)</td>
                    </tr>
                    <tr>
                      <td width="314"><input name="id" type="hidden" id="id" value="<?php echo $row_valor['id']; ?>" /></td>
                      <td width="171">&nbsp;</td>
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
mysql_free_result($valor);
?>
