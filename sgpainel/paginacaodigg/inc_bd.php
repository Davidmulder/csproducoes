<?php 
global $MySQL; //Torna a vari�vel acess�vel em todas as fun��es
function MyCONN(){ //faz a conex�o com o servidor MySQL
	$MySQL=array(
		'MyHOST'=>'localhost', //IP ou nome DNS do servidor MySQL
		'MyUSER'=>'root', //usu�rio MySQL
		'MyPWD'=>'', //senha do usu�rio MySQL
		'MyDB'=>'cesep' //banco de dados
	);


$conn=@mysql_connect($MySQL['MyHOST'],$MySQL['MyUSER'],$MySQL['MyPWD']);
	if(!$conn){ //se ocorrer erro no mysql_connect()
		erro('
			<p>Ocorreu um problema durante a conex�o com o servidor MySQL!</p>
			<p>O erro encontrado foi:</p>
			<p>'.mysql_error().'</p>
		'); //chama a fun��o erro()
	}else{ //se n�o ocorrer erro no mysql_connect()
		$selDB=@mysql_select_db($MySQL[MyDB],$conn); //seleciona o banco de dados
		if(!$selDB){ //se ocorre erro na sele��o
			erro('
			<p>Ocorreu um problema durante a sele��o do banco de dados MySQL!</p>
			<p>O erro encontrado foi:</p>
			<p>'.mysql_error().'</p>
		'); //chama a fun��o erro()
		}
	}
	return $conn;
}

function q($sql){ //executa a consulta ao MySQL
	$conn=MyCONN();
	$q=mysql_query($sql,$conn) or die(mysql_error());//executa a consulta ao banco de dados
	if($q==false){ //se ocorrer erro
		@mysql_close($conn); //fecha a conex�o com o servidor
		erro('
			<p>Ocorreu um problema durante a consulta ao banco de dados MySQL!</p>
			<p>O erro encontrado foi:</p>
			<p>'.mysql_error().'</p>
		'); //chama a fun��o erro()
	}else{ //se n�o ocorrer erro
		@mysql_close($conn); //fecha a conex�o com o servidor
		return $q; //retorna o resultado da pesquisa
	}
}

//$noticia = mysql_query($query_noticia, $conexao) or die(mysql_error());
//$row_noticia = mysql_fetch_assoc($noticia);
//$totalRows_noticia = mysql_num_rows($noticia);

function Query($sql){

$hostname_conexao = "localhost";
$database_conexao = "cesep";
$username_conexao = "root";
$password_conexao = "";

 $conexao=mysql_connect ($hostname_conexao, $username_conexao, $password_conexao) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($database_conexao);

mysql_select_db($database_conexao, $conexao);
$query_noticia=$sql;
$noticia = mysql_query($query_noticia, $conexao) or die(mysql_error());
//$row_noticia = mysql_fetch_assoc($noticia);
//$totalRows_noticia = mysql_num_rows($noticia);

return $noticia;
}

function news($id) {
$conexao=MyCONN();
$query_noticia="select id,titulo,data  from cesep_news where id = '$id' order by id limit 4";
$noticia = mysql_query($query_noticia, $conexao) or die(mysql_error());
return $noticia;
$row_noticia = mysql_fetch_assoc($noticia);
return $row_noticia;
}

function Fechaconexao(){
@mysql_close($conexao);

}

function Nome($nome){
if($nome == "David") {
print "Ola david";
}else{
print "Vai a merda";
}
}

?>