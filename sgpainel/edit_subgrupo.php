<?php require_once('../Connections/conexao.php'); ?>
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
  $updateSQL = sprintf("UPDATE subgrupo SET id_grupo=%s, codsub=%s, subgrupo=%s WHERE id=%s",
                       GetSQLValueString($_POST['grupo'], "int"),
                       GetSQLValueString($_POST['codsub'], "int"),
                       GetSQLValueString($_POST['subgrupo'], "text"),
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

$colname_editcategoria = "-1";
if (isset($_GET['id'])) {
  $colname_editcategoria = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_editcategoria = sprintf("SELECT * FROM subgrupo WHERE id = %s", $colname_editcategoria);
$editcategoria = mysql_query($query_editcategoria, $conexao) or die(mysql_error());
$row_editcategoria = mysql_fetch_assoc($editcategoria);
$totalRows_editcategoria = mysql_num_rows($editcategoria);

mysql_select_db($database_conexao, $conexao);
$query_grupo = "SELECT * FROM grupo";
$grupo = mysql_query($query_grupo, $conexao) or die(mysql_error());
$row_grupo = mysql_fetch_assoc($grupo);
$totalRows_grupo = mysql_num_rows($grupo);
?>
<?php require_once('../Connections/conexao.php'); ?>

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
		  <h2 class="ico_mug">SubGrupo</h2>
		</div>
		<form action="<?php echo $editFormAction; ?>" method="POST" name="form" id="form" accept-charset="iso-8859-1">
			<fieldset>
				<legend><span> Editar registro </span>  
				  <br />
		    </legend>
			<?php if ($_GET["var"] >"0"){ ?>
			<div id="success" class="info_div"><span class="ico_success">Registro Adicionado com Sucesso</span></div><br />
			<?php }?>
				  <table width="400" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td >Codigo</td>
                    </tr>
                    <tr >
                      <td ><input name="codsub" type="text" id="codsub" value="<?php echo $row_editcategoria['codsub']; ?>" /></td>
                    </tr>
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Grupo</td>
                    </tr>
                    <tr >
                      <td ><select name="grupo" id="grupo">
                        <?php
do {  
?>
                        <option value="<?php echo $row_grupo['id']?>"<?php if (!(strcmp($row_grupo['id'], $row_editcategoria['id_grupo']))) {echo "selected=\"selected\"";} ?>><?php echo $row_grupo['grupo']?></option>
                        <?php
} while ($row_grupo = mysql_fetch_assoc($grupo));
  $rows = mysql_num_rows($grupo);
  if($rows > 0) {
      mysql_data_seek($grupo, 0);
	  $row_grupo = mysql_fetch_assoc($grupo);
  }
?>
                      </select></td>
                    </tr>
                    <tr >
                      <td >Subgrupo</td>
                    </tr>
                    <tr>
                      <td><input name="subgrupo" type="text" class="form2" id="subgrupo" value="<?php echo $row_editcategoria['subgrupo']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td><input name="id" type="hidden" id="id" value="<?php echo $row_editcategoria['id']; ?>" /></td>
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
mysql_free_result($grupo);

mysql_free_result($editcategoria);
?>
