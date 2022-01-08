<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($myxml = simplexml_load_file ('locutores.xml')) {
   foreach ($myxml as $foto) {
      echo 'cod: ' . $foto->cod . '<br />';
      echo 'titulo: ' .utf8_decode($foto->titulo). '<br /><br />';
   }
}
else { echo 'Erro ao ler ficheiro XML'; }
?>
</body>
</html>
