<?php 
global $MySQL; //Torna a vari�vel acess�vel em todas as fun��es
function MyCONN(){ //faz a conex�o com o servidor 
	$hostname_conexao = "localhost";

$database_conexao = "sicoob_site";

$username_conexao = "sicoob_siteadm";

$password_conexao = "sicoob102030";

 $conexao=mysql_connect ($hostname_conexao, $username_conexao, $password_conexao) or die (' N�o Conectado' . mysql_error());
mysql_select_db ($database_conexao);
return $conexao;
};

// visualizar email do adminstrador
function LOGN($area,$acao,$usuario) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "insert into log
				(area,acao,usuario,data)
				values
				('$area','$acao','$usuario','$vdata') ";
$vlog= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysql_num_rows($vlog);
$row_vlog = mysql_fetch_assoc($vlog);
return $row_vlog;

}




?>