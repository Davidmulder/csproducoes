<?php require_once('../Connections/conexao.php'); ?>
<?php
$query_usuario = sprintf("select * from feapa.news where id = '$_GET[id]'", $colname_usuario);
$conn_aluno = pg_exec($conexao, $query_usuario);
$row_usuario = pg_fetch_array ($conn_aluno);
$totalRows_usuario = pg_numrows ($conn_aluno);
?>
<?php
$query_areas = sprintf("select * from feapa.new_area where area > '0'  order by texto", $colname_usuario);
$conn_areas = pg_exec($conexao, $query_areas);
$row_areas = pg_fetch_array ($conn_areas);
$totalRows_usuario = pg_numrows ($conn_areas);
?>

<?php require_once('registro.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Adminstrador</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="include/estilo.css" rel="stylesheet" type="text/css">

<!-- Load jQuery -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1.3");
</script>

<!-- Load TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/jquery.tinymce.js"></script>

<script type="text/javascript" src="editor.js"></script>


</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php require_once('include/topo.php'); ?>


<table width="1000" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" class="borda">
<tr>
  <td width="140" valign="top" >
 
  
  <?php require_once('include/menu.php'); ?></td>
  <td width="645" height="400" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="3">
  <tr>
    <td height="400" valign="top" class="textmenu"><table width="300" border="0" bgcolor="#eaeaea" class="borda">
      <tr>
        <td height="15" class="texto_sis">:::edit registro </td>
      </tr>
    </table>
            
		  <br>
		  <form name="form1" method="post" action="edit_query.php">
		    <table width="400" border="0" cellspacing="2" class="texto">
              <tr>
                <td>area</td>
                <td colspan="3"><select name="varea" class="form" id="varea">
				  <option value="" <?php if (!(strcmp("", $_GET["area"]))) {echo "selected=\"selected\"";} ?>> --- </option>
				  <?php do { ?>
				  
				  <option value="<?php echo $row_areas["id"]?>" <?php if (!(strcmp($row_areas["id"], $_GET["area"]))) {echo "selected";} ?>><?php echo $row_areas["texto"]?></option>
				  
                  
				  
				  
				  
             <?php } while ($row_areas = pg_fetch_array($conn_areas)); ?>   
                   
					
                  </select></td>
              </tr>
              <tr>
                <td width="49">titulo</td>
                <td colspan="3"><input name="titulo" type="text" class="form" id="titulo" value="<?php echo $row_usuario["titulo"]; ?>" size="50"></td>
              </tr>
              <tr>
                <td>Subtitulo</td>
                <td colspan="2"><input name="subtitulo" type="text" class="form" id="subtitulo" value="<?php echo $row_usuario["subtitulo"]; ?>" size="50" /></td>
                <td width="8" align="center">&nbsp;</td>
              </tr>
              <tr>
                <td>Texto</td>
                <td width="427">&nbsp;</td>
                <td width="104"><a href="#" onclick="window.open('galeria.php', '', 'toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=0,width=658,height=500')">Arquivo de Fotos</a></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4">
				
				<textarea id="nourlconvert"  name="editor" rows="15" cols="80" style="width: 80%; height:450px" class="tinymce">				
<?php echo $row_usuario["texto"]; ?>				
			</textarea>				</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3"><input name="Submit" type="submit" class="botao" value="Gravar" />
                  <input name="area" type="hidden" id="area" value="3" />
                  <input name="id" type="hidden" id="id" value="<?php echo $row_usuario["id"]; ?>" /></td>
              </tr>
            </table>
            </form>
		  </td>
  </tr>
</table>
    <p>&nbsp;</p>
  <p></p></td>
</tr>
</table>
</body>
</html>

