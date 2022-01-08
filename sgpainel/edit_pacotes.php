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
  $updateSQL = sprintf("UPDATE pacotes SET titulo=%s, `local`=%s, foto=%s, resumo=%s, texto=%s, valor=%s, parcela1=%s, parcela2=%s, parcela3=%s, `data`=%s WHERE id=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['local'], "text"),
                       GetSQLValueString($_POST['foto'], "text"),
                       GetSQLValueString($_POST['resumo'], "text"),
                       GetSQLValueString($_POST['editor'], "text"),
                       GetSQLValueString($_POST['valor'], "double"),
                       GetSQLValueString($_POST['pacela1'], "text"),
                       GetSQLValueString($_POST['pacela2'], "text"),
                       GetSQLValueString($_POST['pacela3'], "text"),
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

$colname_pacotes = "-1";
if (isset($_GET['id'])) {
  $colname_pacotes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_pacotes = sprintf("SELECT * FROM pacotes WHERE id = %s", $colname_pacotes);
$pacotes = mysql_query($query_pacotes, $conexao) or die(mysql_error());
$row_pacotes = mysql_fetch_assoc($pacotes);
$totalRows_pacotes = mysql_num_rows($pacotes);
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
		  <h2 class="ico_mug">Pacotes Turisticos </h2>
		</div>
		<form action="<?php echo $editFormAction; ?>" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span>Adicionar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php 
			//ADD LOG
			$area="ADD REGISTRO";
			$acao="ADD NEWS";
			$usuario=$vusu;
			$query=LOGN($area,$acao,$usuario);
			?>
			<?php }?>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td colspan="3" >&nbsp;</td>
                    </tr>
                    <tr >
                      <td colspan="3" >Titulo</td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="titulo" type="text" class="form2" id="titulo" value="<?php echo $row_pacotes['titulo']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3">Local</td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="local" type="text" class="form2" id="local" value="<?php echo $row_pacotes['local']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3">Foto</td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="foto" type="text" class="form2" id="foto" value="<?php echo $row_pacotes['foto']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">(320 x 229 px) </td>
                    </tr>
                    <tr>
                      <td colspan="3">Resumo</td>
                    </tr>
                    <tr>
                      <td colspan="3"><textarea name="resumo" cols="70" rows="4" class="form2" id="resumo"><?php echo $row_pacotes['resumo']; ?></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3">Valor Avista </td>
                    </tr>
                    <tr>
                      <td colspan="3">R$ 
                        <input name="valor" type="text" class="form2" id="valor" value="<?php echo $row_pacotes['valor']; ?>" size="10" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3">Planos</td>
                    </tr>
                    <tr>
                      <td colspan="3">1&ordm; 
                        <input name="pacela1" type="text" class="form2" id="pacela1" value="<?php echo $row_pacotes['parcela1']; ?>" size="30" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">2&ordm;
                      <input name="pacela2" type="text" class="form2" id="pacela2" value="<?php echo $row_pacotes['parcela2']; ?>" size="30" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">3&ordm;
                      <input name="pacela3" type="text" class="form2" id="pacela3" value="<?php echo $row_pacotes['parcela3']; ?>" size="30" /></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
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
                      <td colspan="2">Roteiro de Viagem </td>
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3">
					  <textarea id="nourlconvert"  name="editor" rows="15" cols="80" style="width: 80%; height:450px" class="tinymce"><?php echo $row_pacotes['texto']; ?></textarea>					  </td>
                    </tr>
                    <tr>
                      <td colspan="3"><input name="vid" type="hidden" id="vid" value="<?php echo $row_pacotes['id']; ?>" /></td>
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
mysql_free_result($pacotes);
?>
