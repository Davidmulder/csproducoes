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
  $updateSQL = sprintf("UPDATE ph_questao SET id_simu=%s, disc=%s, titulo=%s, foto=%s, A=%s, B=%s, C=%s, D=%s, E=%s, certo=%s, n=%s WHERE id=%s",
                       GetSQLValueString($_POST['simulado'], "int"),
                       GetSQLValueString($_POST['disc'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['foto'], "text"),
                       GetSQLValueString($_POST['a'], "text"),
                       GetSQLValueString($_POST['b'], "text"),
                       GetSQLValueString($_POST['c'], "text"),
                       GetSQLValueString($_POST['d'], "text"),
                       GetSQLValueString($_POST['e'], "text"),
                       GetSQLValueString($_POST['certa'], "text"),
                       GetSQLValueString($_POST['n'], "int"),
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

<?php
mysql_select_db($database_conexao, $conexao);
$query_simulados = "SELECT * FROM ph_simulado WHERE tipo = 1";
$simulados = mysql_query($query_simulados, $conexao) or die(mysql_error());
$row_simulados = mysql_fetch_assoc($simulados);
$totalRows_simulados = mysql_num_rows($simulados);

mysql_select_db($database_conexao, $conexao);
$query_disciplina = "SELECT * FROM ph_diciplina ORDER BY nome ASC";
$disciplina = mysql_query($query_disciplina, $conexao) or die(mysql_error());
$row_disciplina = mysql_fetch_assoc($disciplina);
$totalRows_disciplina = mysql_num_rows($disciplina);

$colname_editquest = "-1";
if (isset($_GET['id'])) {
  $colname_editquest = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conexao, $conexao);
$query_editquest = sprintf("SELECT * FROM ph_questao WHERE id = %s", $colname_editquest);
$editquest = mysql_query($query_editquest, $conexao) or die(mysql_error());
$row_editquest = mysql_fetch_assoc($editquest);
$totalRows_editquest = mysql_num_rows($editquest);
?>
<?php require_once('topo.php'); ?>
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
		  <h2 class="ico_mug">Simulados quest </h2>
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
                      <td >N&ordm;</td>
                    </tr>
                    <tr >
                      <td ><input name="n" type="text" id="n" value="<?php echo $row_editquest['n']; ?>" size="10" /></td>
                    </tr>
                    <tr >
                      <td >Simulados</td>
                    </tr>
                    <tr >
                      <td ><select name="simulado" id="simulado">
                       
                        <?php
do {  
?><option value="<?php echo $row_simulados['id']?>"<?php if (!(strcmp($row_simulados['id'], $row_editquest['id_simu']))) {echo "selected=\"selected\"";} ?>><?php echo $row_simulados['titulo']?></option>
                        <?php
} while ($row_simulados = mysql_fetch_assoc($simulados));
  $rows = mysql_num_rows($simulados);
  if($rows > 0) {
      mysql_data_seek($simulados, 0);
	  $row_simulados = mysql_fetch_assoc($simulados);
  }
?>
                      </select></td>
                    </tr>
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Disciplina</td>
                    </tr>
                    <tr >
                      <td ><select name="disc" id="disc">
                        
                        <?php
do {  
?><option value="<?php echo $row_disciplina['id']?>"<?php if (!(strcmp($row_disciplina['id'], $row_editquest['disc']))) {echo "selected=\"selected\"";} ?>><?php echo $row_disciplina['nome']?></option>
                        <?php
} while ($row_disciplina = mysql_fetch_assoc($disciplina));
  $rows = mysql_num_rows($disciplina);
  if($rows > 0) {
      mysql_data_seek($disciplina, 0);
	  $row_disciplina = mysql_fetch_assoc($disciplina);
  }
?>
                                            </select></td>
                    </tr>
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >Quest</td>
                    </tr>
                    <tr>
                      <td><input name="titulo" type="text" class="form2" id="titulo" value="<?php echo $row_editquest['titulo']; ?>" size="70" /></td>
                    </tr>
                    <tr>
                      <td align="left">Foto</td>
                    </tr>
                    <tr>
                      <td align="left"><input name="foto" type="text" id="foto" value="<?php echo $row_editquest['foto']; ?>" size="50" /></td>
                    </tr>
                    <tr>
                      <td align="right"><a href="#" onclick="window.open('galeria.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Inserir Imagem</a> </td>
                    </tr>
                    <tr>
                      <td align="left">Op&ccedil;&otilde;es</td>
                    </tr>
                    <tr>
                      <td>A)</td>
                    </tr>
                    <tr>
                      <td valign="top">
					    <textarea id="textarea1" name="a" class="form" style="height: 80px; width: 500px;"><?php echo $row_editquest['A']; ?></textarea>
             <script language="javascript1.2">
             generate_wysiwyg('textarea1');
             </script>					  </td>
                    </tr>
                    <tr>
                      <td>B)</td>
                    </tr>
                    <tr>
                      <td>   <textarea id="textarea2" name="b" class="form" style="height: 80px; width: 500px;"><?php echo $row_editquest['B']; ?></textarea>
             <script language="javascript1.2">
             generate_wysiwyg('textarea2');
             </script>	</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>C)</td>
                    </tr>
                    <tr>
                      <td>   <textarea id="textarea3" name="c" class="form" style="height: 80px; width: 500px;"><?php echo $row_editquest['C']; ?></textarea>
             <script language="javascript1.2">
             generate_wysiwyg('textarea3');
             </script>	</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>D)</td>
                    </tr>
                    <tr>
                      <td>   <textarea id="textarea4" name="d" class="form" style="height: 80px; width: 500px;"><?php echo $row_editquest['D']; ?></textarea>
             <script language="javascript1.2">
             generate_wysiwyg('textarea4');
             </script>	</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>E)</td>
                    </tr>
                    <tr>
                      <td>   <textarea id="textarea5" name="e" class="form" style="height: 80px; width: 500px;"><?php echo $row_editquest['E']; ?></textarea>
             <script language="javascript1.2">
             generate_wysiwyg('textarea5');
             </script>	</td>
                    </tr>
                    <tr>
                      <td>Alternativa Certa </td>
                    </tr>
                    <tr>
                      <td><input name="certa" type="text" id="certa" value="<?php echo $row_editquest['certo']; ?>" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><input name="vid" type="hidden" id="vid" value="<?php echo $row_editquest['id']; ?>" /></td>
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
mysql_free_result($simulados);

mysql_free_result($disciplina);

mysql_free_result($editquest);
?>
