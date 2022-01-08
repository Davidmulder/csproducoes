<?php require_once('../Connections/conexao.php'); ?>
<?php
$colname_parceiros = "-1";
if (isset($_GET['id'])) {
  $colname_parceiros = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_parceiros = sprintf("SELECT * FROM news WHERE id = %s", $colname_parceiros);
$parceiros = mysql_query($query_parceiros, $conexao) or die(mysql_error());
$row_parceiros = mysql_fetch_assoc($parceiros);
$totalRows_parceiros = mysql_num_rows($parceiros);
?>
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
  $updateSQL = sprintf("UPDATE news SET titulo=%s, resumo=%s, foto=%s, `data`=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['resumo'], "text"),
                       GetSQLValueString($_POST['foto'], "text"),
                       GetSQLValueString($_POST['data'], "date"),
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
?>
<?php require_once('inc/inc_admin.php'); ?>
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
		  <h2 class="ico_mug">Publicidade</h2>
		</div>
		<form action="<?php echo $editFormAction; ?>" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span> registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php 
			//ADD LOG
			$area="ADD REGISTRO";
			$acao="ADD PARCEIROS";
			$usuario=$vusu;
			$query=LOGN($area,$acao,$usuario);
			?>
			<?php }?>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td colspan="3" >&nbsp;</td>
                    </tr>
                    <tr >
                      <td colspan="3" >Nome</td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="nome" type="text" class="form2" id="nome" value="<?php echo $row_parceiros['titulo']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3">Banner</td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="foto" type="text" class="form2" id="foto" value="<?php echo $row_parceiros['foto']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">207 x 57 px </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="155"><span class="ico_success"><a href="#" onclick="window.open('galeria.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Inserir Foto </a></span></td>
                      <td width="156"><span class="ico_success"><a href="#" onclick="window.open('arquivo_todos.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Inserir Arquivo</a></span></td>
                      <td width="171" class="ico_success"><a href="#" onclick="window.open('galeria_todos.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Banco de Imagens </a></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="data" type="hidden" id="data" value="<?php echo $vdata=date("y/m/d")." ".date("h:i:s"); ?>" /></td>
                      <td >&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td colspan="2">Links</td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="resumo" type="text" class="form2" id="resumo" value="<?php echo $row_parceiros['resumo']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="vid" type="hidden" id="vid" value="<?php echo $row_parceiros['id']; ?>" /></td>
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
mysql_free_result($parceiros);
?>