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

<link href="estilo/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="627" border="0" cellspacing="3" class="borda">
  <tr>
    <td width="621" height="109" bgcolor="#224676" class="menu">ARQUIVOS DONWLOADS </td>
  </tr>
  <tr>
    <td><form action="arquivo_res.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="100%" border="0" bgcolor="#f4f4f4">
        <tr>
          <td width="7%" class="texto">Arquivo</td>
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
          <td><input name="Submit" type="submit" class="botao" value="::ADICIONAR ARQUIVO::" />          </td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><form id="form2" name="form2" method="post" action="">
      <table width="321" border="0">
        <tr>
          <?
//definimos o path de acesso
$d=$_SERVER['DOCUMENT_ROOT'];
$path = "$d/sgpainel/arquivo/";
$HTTP="http://www.restaurantebrasuca.com.br/sgpainel/arquivo/";
//echo $path;

if (!empty($_GET[del])) {
	unlink("arquivo/".$_GET[del]);
	//unlink("nome_do_arquivo");

}

//abrimos o direct&oacute;rio
$dir = opendir($path);
//Mostramos as informa&ccedil;&otilde;es
$q="0";
while ($elemento = readdir($dir))
{
  if (($elemento != ".") && ($elemento !=".."))   {
  list($width, $height, $type, $attr) = getimagesize("arquivo/$elemento");
?>
          <td width="10">&nbsp;</td>
          <td width="301"><table width="287" border="0" bgcolor="#f4f4f4" class="borda_escura">
              <tr class="texto">
                <td align="center"><?php 
				
				echo $elemento; ?></td>
                <td align="center">&nbsp;</td>
              </tr>
              <tr class="texto">
                <td width="150" align="center">
				  <textarea name="link" cols="50" class="form2" id="link"><?php echo $HTTP; ?><?php echo $elemento; ?></textarea>
                  </a></td>
                <td width="20" align="center"><a href="?del=<?php echo $elemento; ?>"><img src="img/cancel.png" width="16" height="16" border="0" /></a></td>
              </tr>
          </table></td>
          <?php 
		  }
		$q=$q+1;  
		//echo $q; 
		if($q == "1"){
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
