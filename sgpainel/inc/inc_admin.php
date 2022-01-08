<?php 
global $MySQL; //Torna a variável acessível em todas as funções
function MyCONN(){ //faz a conexão com o servidor 
	$hostname_conexao = "186.202.13.3";

$database_conexao = "csproducoes";

$username_conexao = "csproducoes";

$password_conexao = "csprodu102030";

 $conexao=mysql_connect ($hostname_conexao, $username_conexao, $password_conexao) or die (' Não Conectado' . mysql_error());
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






// visualizar email do adminstrador
function ADDDESTAQUE($titulo,$foto,$link,$idnoticia,$resumo,$dest) {



$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "insert into destaque
				(id_news,foto,tipo,data)
				values
				('$idnoticia','$foto','$dest','$vdata') ";
$vlog= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysql_num_rows($vlog);
$row_vlog = mysql_fetch_assoc($vlog);
return $row_vlog;

}


function UPDDESTAQUE($titulo,$foto,$link,$idnoticia,$resumo,$dest,$id) {


$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "update destaque set
                 id_news = '$idnoticia',foto = '$foto',tipo = '$dest'
				where id = '$id' ";
$vlog= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysql_num_rows($vlog);
$row_vlog = mysql_fetch_assoc($vlog);
return $row_vlog;

}

function ADDVENDAS($cliente,$pacote,$dataini,$datafim,$valor,$datapag,$forma,$obs) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "insert into clientepacote
				(id_cliente,id_pacote,dataini,datafim,valor,datapag,forma,obs,liberar,data)
				values
				('$cliente','$pacote','$dataini','$datafim','$valor','$datapag','$forma','$obs','0','$vdata') ";
$vlog= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysql_num_rows($vlog);
$row_vlog = mysql_fetch_assoc($vlog);
return $row_vlog;

}

function UPDVENDAS($cliente,$pacote,$dataini,$datafim,$valor,$datapag,$forma,$obs,$liberar,$id) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "update clientepacote set
                 id_cliente = '$cliente',id_pacote = '$pacote',dataini = '$dataini',datafim = '$datafim',valor = '$valor',datapag = '$datapag',forma = '$forma',
				 obs='$obs',liberar = '$liberar' ,data = '$vdata'
				where id = '$id' ";
$vlog= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysql_num_rows($vlog);
$row_vlog = mysql_fetch_assoc($vlog);
return $row_vlog;

}

function ADDVENDAUDIO($cliente,$venda,$audio) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "insert into clienteaudio
				(id_cliente,id_cliepacote,id_audio,data)
				values
				('$cliente','$venda','$audio','$vdata') ";
$vlog= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vlog;
$totalRows_vlog = mysql_num_rows($vlog);
$row_vlog = mysql_fetch_assoc($vlog);
return $row_vlog;

}



function GETDATA($data) {
 $exp= explode("/",$data); 
$day=$exp[0];
$mes=$exp[1];
$ano=$exp[2];
$DATA=$ano."/".$mes."/".$day ;
return $DATA;
}

function NORMALDATA($data) {
 $exp= explode("/",$data); 
$day=$exp[2];
$mes=$exp[1];
$ano=$exp[0];
$DATANORMAL=$day."/".$mes."/".$ano;
return $DATANORMAL;
}
?>