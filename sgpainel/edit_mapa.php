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
  $updateSQL = sprintf("UPDATE mapa SET id_area=%s, titulo=%s, link=%s WHERE id=%s",
                       GetSQLValueString($_POST['area'], "int"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['link'], "text"),
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
$query_area = "SELECT * FROM areas ";
$area = mysql_query($query_area, $conexao) or die(mysql_error());
$row_area = mysql_fetch_assoc($area);
$totalRows_area = mysql_num_rows($area);

$colname_menuarea = "-1";
if (isset($_GET['id'])) {
  $colname_menuarea = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_menuarea = sprintf("SELECT * FROM mapa WHERE id = %s", $colname_menuarea);
$menuarea = mysql_query($query_menuarea, $conexao) or die(mysql_error());
$row_menuarea = mysql_fetch_assoc($menuarea);
$totalRows_menuarea = mysql_num_rows($menuarea);
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
		  <h2 class="ico_mug">Mapa do site </h2>
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
                      <td >Area</td>
                    </tr>
                    <tr >
                      <td ><label>
                        <select name="area" id="area">
                          <?php
do {  
?>
                          <option value="<?php echo $row_area['id']?>"<?php if (!(strcmp($row_area['id'], $row_menuarea['id_area']))) {echo "selected=\"selected\"";} ?>><?php echo $row_area['titulo']?></option>
                          <?php
} while ($row_area = mysql_fetch_assoc($area));
  $rows = mysql_num_rows($area);
  if($rows > 0) {
      mysql_data_seek($area, 0);
	  $row_area = mysql_fetch_assoc($area);
  }
?>
                        </select>
                      </label></td>
                    </tr>
                    <tr >
                      <td >Titulo</td>
                    </tr>
                    <tr>
                      <td><input name="titulo" type="text" class="form2" id="titulo" value="<?php echo $row_menuarea['titulo']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td align="left">Links</td>
                    </tr>
                    <tr>
                      <td align="left"><input name="link" type="text" class="form2" id="link" value="<?php echo $row_menuarea['link']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td align="right"><a href="#" onclick="window.open('galeria.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')"></a></td>
                    </tr>
                    <tr>
                      <td><input name="id" type="hidden" id="id" value="<?php echo $row_menuarea['id']; ?>" /></td>
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
mysql_free_result($area);

mysql_free_result($menuarea);
?>
