<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php require_once('Connections/inc_bd.php'); ?>

<?php 



//$nome="David";
//Nome($nome);

$query=news(3);
$row_noticia = mysql_fetch_assoc($query);
//$totalRows_noticia = mysql_num_rows($query);

do {


echo $row_noticia["titulo"]."<br>";

 } while ($row_noticia = mysql_fetch_assoc($query));

Fechaconexao();
?>

</body>
</html>
