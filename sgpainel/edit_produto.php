<?php require_once('Connections/conexao.php'); ?>
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
  $updateSQL = sprintf("UPDATE produto SET titulo=%s, foto=%s, texto=%s, valor=%s, `data`=%s WHERE id=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['foto'], "text"),
                       GetSQLValueString($_POST['texto'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['data'], "date"),
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

$colname_produto = "-1";
if (isset($_GET['id'])) {
  $colname_produto = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_produto = sprintf("SELECT * FROM produto WHERE id = %s", $colname_produto);
$produto = mysql_query($query_produto, $conexao) or die(mysql_error());
$row_produto = mysql_fetch_assoc($produto);
$totalRows_produto = mysql_num_rows($produto);
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
<script language="JavaScript" type="text/javascript" src="js/wysiwyg.js">
</script>
	    <div id="content" >
	       <?php require_once('menu.php'); ?>
		<div id="content_main" class="clearfix">
		  <!-- end #sidebar -->

		<!-- end #content_main -->
		<!-- end #postedit -->
		<!-- end #tabledata -->
<div class="section">
			
		<div>
		  <h2 class="ico_mug">Produto</h2>
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
                      <td colspan="2" >Titulo</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="titulo" type="text" class="form2" id="titulo" value="<?php echo $row_produto['titulo']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Foto</td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="foto" type="text" id="foto" value="<?php echo $row_produto['foto']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td width="314">&nbsp;</td>
                      <td width="171" class="ico_success"><a href="#" onclick="window.open('galeria.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Inserir Foto </a></td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td><span class="ico_success"><a href="#" onclick="window.open('galeria_todos.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Banco de Imagens </a></span></td>
                    </tr>
                    <tr>
                      <td>R$
                      <input name="valor" type="text" id="valor" value="<?php echo $row_produto['valor']; ?>" size="10" maxlength="10" />
                      (0.0)</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td ></td>
                    </tr>
                    <tr>
                      <td><input name="data" type="hidden" id="data" value="<?php echo $vdata=date("y/m/d")." ".date("h:i:s"); ?>" /></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Detalhes do Produto </td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">
					  
					   <textarea id="editor" name="texto" class="form" style="height: 450px; width: 100%;">
                     <?php echo $row_produto['texto']; ?>
               </textarea>
             <script language="javascript1.2">
             generate_wysiwyg('editor');
             </script>					  					  </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $row_produto['id']; ?>" /></td>
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
mysql_free_result($produto);
?>
