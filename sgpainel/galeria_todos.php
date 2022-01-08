<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Galeria de Imagens</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="../include/estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style23 {
	font-family: Arial, Helvetica, sans-serif;

	font-size: 12px;
}
.style28 {color: #000000}
-->
</style>
<link href="include/estilo.css" rel="stylesheet" type="text/css" />
<link href="estilo/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="627" border="0" cellspacing="3" class="borda">
  <tr>
    <td width="621"><img src="img/topo.jpg" width="621" height="109" /></td>
  </tr>
  <tr>
    <td><form action="galeria_res.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="100%" border="0" bgcolor="#f4f4f4">
        <tr>
          <td width="7%" class="texto">Foto</td>
          <td width="39%"><input name="img1" type="file" class="form2" id="img1" /></td>
          <td width="54%">&nbsp;</td>
        </tr>
        <tr>
          <td class="texto">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto">&nbsp;</td>
          <td><input name="Submit" type="submit" class="botao" value="::Adicionar Foto::" />          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><form id="form2" name="form2" method="post" action="">
      <table width="200" border="0">
        <tr>
          <?
//definimos o path de acesso
$d=$_SERVER['DOCUMENT_ROOT'];
$path = "$d/sgpainel/fotos/";
$HTTP="http://www.restaurantebrasuca.com.br/sgpainel/fotos/";
//echo $path;

if (!empty($_GET[del])) {
	unlink("fotos/".$_GET[del]);
	//unlink("nome_do_arquivo");

}

//abrimos o direct&oacute;rio
$dir = opendir($path);
//Mostramos as informa&ccedil;&otilde;es
$q="0";
while ($elemento = readdir($dir))
{
  if (($elemento != ".") && ($elemento !=".."))   {
  list($width, $height, $type, $attr) = getimagesize("fotos/$elemento");
?>
          <td width="61">&nbsp;</td>
          <td width="129"><table width="180" border="0" bgcolor="#f4f4f4" class="borda_escura">
              <tr>
                <td colspan="2" align="center">
				
				<img src="thumbs.php?maxsize=112&src=fotos/<?php  echo $elemento; ?>" border="0"  />
				</td>
              </tr>
              <tr class="texto">
                <td align="center"><?php echo $width."X". $height;  ?> px</td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr class="texto">
                <td align="center"><?php 
				
				echo $elemento; ?></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr class="texto">
                <td width="150" align="center">
				<input name="link" type="text" class="form2" id="link" value="<?php echo $HTTP .$elemento; ?>" size="20" />
                  </a></td>
                <td width="20" align="center"><a href="?del=<?php echo $elemento; ?>"><img src="img/cancel.png" width="16" height="16" border="0" /></a></td>
              </tr>
          </table></td>
          <?php 
		  }
		$q=$q+1;  
		//echo $q; 
		if($q == "3"){
        echo "</tr>" ;
		$q=0;
        }
}
//Fechamos o direct&oacute;rio
closedir($dir);?>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
