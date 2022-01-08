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
          <td width="54%" rowspan="2" align="center">
		  <img src="thumbs.php?maxsize=112&src=fotos/<?php  echo $_GET["foto"]; ?>" border="0"  />		  </td>
        </tr>
        <tr>
          <td class="texto">&nbsp;</td>
          <td><input name="Submit" type="submit" class="botao" value="::Adicionar Foto::" /></td>
          </tr>
        <tr>
          <td class="texto">&nbsp;</td>
          <td align="center" class="texto_sis"><a href="galeria_todos.php"><span class="texto_sis">Ver Banco de Imagens </span></a></td>
          <td align="center" class="pequeno">
		  <?php 
		  $http="http://www.restaurantebrasuca.com.br/sgpainel/fotos/";
		  if($_GET["foto"] > "0"){
		  echo $http.$_GET["foto"];
		  }
		  ?></td>
        </tr>
        <tr>
          <td class="texto">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td>
    </td>
  </tr>
</table>
</body>
</html>
