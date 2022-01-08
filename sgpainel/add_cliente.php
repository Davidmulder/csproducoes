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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO cliente (nome, login, senha, email, `end`, cidade, bairro, tel, cel, uf, acesso) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['end'], "text"),
                       GetSQLValueString($_POST['cidade'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['cel'], "text"),
                       GetSQLValueString($_POST['uf'], "text"),
                       GetSQLValueString($_POST['acesso'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "?var=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
				<legend><span>Adicionar registro </span>  
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
                      <td >Nome</td>
                    </tr>
                    <tr>
                      <td><input name="nome" type="text" class="form2" id="nome" size="50" /></td>
                    </tr>
                    <tr>
                      <td>E-mail</td>
                    </tr>
                    <tr>
                      <td><input name="email" type="text" class="form2" id="email" size="50" /></td>
                    </tr>
                    <tr>
                      <td>End</td>
                    </tr>
                    <tr>
                      <td><textarea name="end" cols="50" class="form2" id="end"></textarea></td>
                    </tr>
                    <tr>
                      <td>Cidade</td>
                    </tr>
                    <tr>
                      <td><input name="cidade" type="text" class="form2" id="cidade" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Bairro</td>
                    </tr>
                    <tr>
                      <td><input name="bairro" type="text" class="form2" id="bairro" size="50" /></td>
                    </tr>
                    <tr>
                      <td>UF</td>
                    </tr>
                    <tr>
                      <td><input name="uf" type="text" class="form2" id="uf" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Telefone</td>
                    </tr>
                    <tr>
                      <td><input name="tel" type="text" class="form2" id="tel" size="50" /></td>
                    </tr>
                    <tr>
                      <td>Celular</td>
                    </tr>
                    <tr>
                      <td><input name="cel" type="text" class="form2" id="cel" size="50" /></td>
                    </tr>
                    <tr>
                      <td><input name="acesso" type="hidden" id="acesso" value="0" /></td>
                    </tr>
                  </table>
			  <br /> 
			      <input type="submit" value="Gravar" />
			  <br />
		  </fieldset>
			
		    
		    <input type="hidden" name="MM_insert" value="form">
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
