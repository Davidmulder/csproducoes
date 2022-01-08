<?php require_once('../../Connections/conexao.php'); ?>
<?php 

$query= "select * from news  ";
$list = mysql_query($query, $conexao) or die(mysql_error());
$row_list = mysql_fetch_assoc($list);
$totalRows_list = mysql_num_rows($list);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Teste de paginacao</title>

<script language="JavaScript" type="text/javascript" src="js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.ingrid.js"></script>
<link rel="stylesheet" href="css/ingrid.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.cookie.js"></script>

<script type="text/javascript">
$(document).ready(
	function() {
		$("#table1").ingrid({ 
			url: 'php/remote2.php ',
			height: 350,			
			initialLoad: true,
			rowClasses: ['grid-row-style1','grid-row-style1','grid-row-style2','grid-row-style1','grid-row-style1','grid-row-style3'],
			sorting: false,
			paging: true,
			extraParams: {sessid : 'some_session_token_here'},
			totalRecords: <?php echo $totalRows_list; ?>

		});
	}
); 
</script>

</head>

<body>




<table id="table1" >
 <thead>
  <tr>
   <th>Data</th>
   <th>titulo</th>
   <th>resumo</th>
   <th>Açoes</th>
    
  </tr>
 </thead>
 <tbody>

   
			  

 </tbody>
</table>
</body>
</html>
