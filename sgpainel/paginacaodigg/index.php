

<?php require_once('../inc/inc_amazen.php'); ?><head>
<link href="global.css" rel="stylesheet" type="text/css" />
</head>

  


<?php 

if(empty($_GET["p"])){
$page=1;
}else{
$page=$_GET["p"];
}
$query=DGRUPO2($page);
$row_noticia2= mysql_fetch_assoc($query);
$totalRows_noticia2 = mysql_num_rows($query);


?>



<br />
    <?php	
do { ?>
<a href="?id=<?php echo $row_noticia2["id"]; ?>">
<span class="texto_news"><?php echo $row_noticia2["descricao"]; ?>
</span></a> <br />
                  <?php } while ($row_noticia2 = mysql_fetch_assoc($query)); ?>
				  
	<?php

include('paginate.php');


echo paginate($page, $totalRows_noticia2, $format_pg);
  ?>