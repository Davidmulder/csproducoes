<?php require_once('../Connections/conexao.php'); ?>

<?php
mysql_select_db($database_conexao, $conexao);
$query_semana = "SELECT * FROM semana  where id_produto = '$_GET[id]' ORDER BY semana ";
$semana = mysql_query($query_semana, $conexao) or die(mysql_error());
$row_semana = mysql_fetch_assoc($semana);
$totalRows_semana = mysql_num_rows($semana);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#eaeaea">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="semana_res.php" method="POST" name="form1" id="form1">
      <select name="semana" id="semana">
	  <option selected="selected">--</option>
	  <option value="0">Domingo</option>
        <option value="1">Segunda_Feira</option>
		 <option value="2">Terça_Feira</option>
		  <option value="3">Quarta_Feira</option>
		   <option value="4">Quinta_Feira</option>
		    <option value="5">Sexta_Feira</option>
			 <option value="6">Sabado</option>
      </select>
        <input type="submit" name="Submit" value="OK" />
        <input name="produto" type="hidden" id="produto" value="<?php echo $_GET["id"]; ?>" />
    </form>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<?php do { ?>
    <?php if ($totalRows_semana > 0) { // Show if recordset not empty ?>
    <table width="300" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="25"><strong><a href="sql_del.php?del=12&id=<?php echo $row_semana['id']; ?>&produto=<?php echo $_GET['id']; ?>"><img src="img/cancel.jpg" width="16" height="16" border="0" /></a></strong></td>
        <td width="272"><strong><?php 
		$vsemanas= $row_semana['semana'];
		switch($vsemanas){
				  case 0:
				  echo "Domingo";
				 break;
				  case 1:
				  echo "Segunda_Feira";
				  break;
				  case 2:
				  echo "Terça_Feira";
				  break;
				  case 3:
				  echo "Quarta_Feira";
				  break;
				  case 4:
				  echo "Quinta_Feira";
				  break;
				  case 5:
				  echo "Sexta_Feira";
				  break;
				  case 6:
				  echo "Sabado";
				  break;
				  }
		
		 ?></strong></td>
      </tr>
                </table>
    <?php } // Show if recordset not empty ?>
    <?php } while ($row_semana = mysql_fetch_assoc($semana)); ?></body>
</html>
<?php
mysql_free_result($semana);
?>
