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

function anti_injection($sql, $formUse = true)   
{   
// remove palavras que contenham sintaxe sql   
$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i","",$sql);   
$sql = trim($sql);//limpa espaços vazio   
$sql = strip_tags($sql);//tira tags html e php   
if(!$formUse || !get_magic_quotes_gpc())   
$sql = addslashes($sql);//Adiciona barras invertidas a uma string   
return $sql;   
} 



// lista pacotes
function LISTAPACOTES($vinscricao) {
$conexao=MyCONN();
$query_busca = "select clipa.id,clipa.valor,clipa.liberar,clipa.dataini,clipa.datafim, 
cliente.nome as cliente,produto.titulo as pacote,clipa.datapag,clipa.forma,clipa.obs
from clientepacote clipa
inner join cliente on (cliente.id=clipa.id_cliente)
inner join produto on (produto.id=clipa.id_pacote)
where cliente.id ='$vinscricao' and ( DATE(dataini) <= DATE(NOW()) and (datafim) >= DATE(NOW()) ) and liberar = '1'
order by clipa.id desc
 ";
$pacotes= mysql_query($query_busca, $conexao) or die(mysql_error());
return $pacotes;
$totalRows_pacotes = mysql_num_rows($pacotes);
$row_pacotes = mysql_fetch_assoc($pacotes);
return $row_pacotes;

}


// ver pacote
function VERPACOTES($pacote) {
$conexao=MyCONN();
$query_busca = "select clipa.id,clipa.valor,clipa.liberar,clipa.dataini,clipa.datafim, 
cliente.nome as cliente,produto.titulo as pacote,clipa.datapag,clipa.forma,clipa.obs
from clientepacote clipa
inner join cliente on (cliente.id=clipa.id_cliente)
inner join produto on (produto.id=clipa.id_pacote)
where clipa.id ='$pacote' and ( DATE(dataini) <= DATE(NOW()) and (datafim) >= DATE(NOW()) ) and liberar = '1'
order by clipa.id desc
 ";
$pacotes= mysql_query($query_busca, $conexao) or die(mysql_error());
return $pacotes;
$totalRows_pacotes = mysql_num_rows($pacotes);
$row_pacotes = mysql_fetch_assoc($pacotes);
return $row_pacotes;

}


// lista pacotes
function LISTAAUDIO($audio) {
$conexao=MyCONN();
$query_busca = "SELECT clienteaudio.id,cliente.nome as cliente,audio.nome,audio.arquivo,news.titulo as locutor FROM clienteaudio inner join cliente on (cliente.id=clienteaudio.id_cliente) inner join audio on (audio.id = clienteaudio.id_audio) inner join news on (news.id = audio.id_locutor) where clienteaudio.id_cliepacote = '$audio'  ORDER BY clienteaudio.id
 ";
$pacotes= mysql_query($query_busca, $conexao) or die(mysql_error());
return $pacotes;
$totalRows_pacotes = mysql_num_rows($pacotes);
$row_pacotes = mysql_fetch_assoc($pacotes);
return $row_pacotes;

}



// esquecia a senha 

function LEMBRASENHA($email) {
$conexao=MyCONN();
$query_busca = "select * from cliente where email = '$email'  ";
$logins= mysql_query($query_busca, $conexao) or die(mysql_error());
return $logins;
$totalRows_logins = mysql_num_rows($logins);
$row_logins = mysql_fetch_assoc($logins);
return $row_logins;

}


// cadastro de cliente

function INSECLIENTE($codigo,$nome,$login,$senha,$email,$tel,$cel,$uf) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query = "insert into cliente ";
$query .= "(id,nome,login,senha,email,tel,cel,uf,acesso,data) values ";
$query .= " ('$codigo','$nome','$login','$senha','$email','$tel','$cel','$uf','0','$vdata') ";
$conn_aluno = mysql_query($query, $conexao) or die(mysql_error());
return $conn_aluno;
$row_busca = mysql_fetch_assoc ($conn_aluno);
return $row_busca;
$totalRows_busca = mysql_num_rows($conn_aluno);
return $totalRows_busca;
}


// arquivos dos clientes
function LOGINCLIENTE($login,$senha) {
$conexao=MyCONN();
$query_busca = "select * from cliente where login = '$login' and senha = '$senha'  ";
$logins= mysql_query($query_busca, $conexao) or die(mysql_error());
return $logins;
$totalRows_logins = mysql_num_rows($logins);
$row_logins = mysql_fetch_assoc($logins);
return $row_logins;

}

//..................................................................................

// inserir no carrinho 

function INSERIRCARRINHO($carrinho,$cliente,$pacote,$valor) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "INSERT INTO carrinho (carrinho,id_cliente,pacote,valor,data) 
                values
                ('$carrinho','$cliente','$pacote','$valor','$vdata')";
$conn_carr = mysql_query($query_busca, $conexao) or die(mysql_error());
return $conn_carr;
$row_busca = mysql_fetch_assoc ($conn_carr);
return $row_busca;
$totalRows_busca = mysql_num_rows($conn_carr);
return $totalRows_busca;
}

/// lista carrinho

function LISTACARRINHO($codcarrinho) {
$conexao=MyCONN();
$query_busca = "select * from carrinho where carrinho ='$codcarrinho' ";
$conn_aluno = mysql_query($query_busca, $conexao) or die(mysql_error());
return $conn_aluno;
$row_busca = mysql_fetch_assoc ($conn_aluno);
return $row_busca;
$totalRows_busca = mysql_num_rows($conn_aluno);
return $totalRows_busca;
}










// update de acessos

function UPDATECLIENTE($vinscricao,$vdata,$v) {
$conexao=MyCONN();
$query_busca = " update cliente
        set data = '$vdata',acesso = '$v'
        where id = '$vinscricao' ";
$logins2= mysql_query($query_busca, $conexao) or die(mysql_error());
return $logins2;
$totalRows_logins2 = mysql_num_rows($logins2);
$row_logins2 = mysql_fetch_assoc($logins2);
return $row_logins2;

}


//................................................................................................


// ver se cliente ja e cadastrado
function VERCLIE($cpf) {
$conexao=MyCONN();
$query_busca = "select * from cliente where cpf='$cpf' and tipo = '0' order by id asc";
$cli= mysql_query($query_busca, $conexao) or die(mysql_error());
return $cli;
$totalRows_cli = mysql_num_rows($cli);
$row_cli = mysql_fetch_assoc($cli);
return $row_cli;

}

// login do cliente area restrita

function VERCLIE3($codigo) {
$conexao=MyCONN();
$query_busca = "select * from cliente where codigo='$codigo' and tipo = '1' order by id asc";
$cli= mysql_query($query_busca, $conexao) or die(mysql_error());
return $cli;
$totalRows_cli = mysql_num_rows($cli);
$row_cli = mysql_fetch_assoc($cli);
return $row_cli;

}



// login do cliente

function VERCLIE2($codigo) {
$conexao=MyCONN();
$query_busca = "select * from cliente where codigo='$codigo' and tipo = '0' order by id asc";
$cli= mysql_query($query_busca, $conexao) or die(mysql_error());
return $cli;
$totalRows_cli = mysql_num_rows($cli);
$row_cli = mysql_fetch_assoc($cli);
return $row_cli;

}




// ver se cliente NA AREA RETRITA
function VERCLIEAREA($login,$senha) {
$conexao=MyCONN();
$query_busca = "select * from cliente where login='$login' and senha = '$senha' order by id asc";
$cli= mysql_query($query_busca, $conexao) or die(mysql_error());
return $cli;
$totalRows_cli = mysql_num_rows($cli);
$row_cli = mysql_fetch_assoc($cli);
return $row_cli;

}



//.................................................................................................


// pacotes de inscrição
function IDPACOTES($pacote) {
$conexao=MyCONN();
$query_busca = "select * from produto where id = '$pacote' order by id asc";
$pact= mysql_query($query_busca, $conexao) or die(mysql_error());
return $pact;
$totalRows_pact = mysql_num_rows($pact);
$row_pact = mysql_fetch_assoc($pact);
return $row_pact;

}




// lista pacotes de inscrição
function PACOTES() {
$conexao=MyCONN();
$query_busca = "select * from produto  order by id asc";
$pact= mysql_query($query_busca, $conexao) or die(mysql_error());
return $pact;
$totalRows_pact = mysql_num_rows($pact);
$row_pact = mysql_fetch_assoc($pact);
return $row_pact;

}


// visualizar area musical
function AREAMUSICA($area) {
$conexao=MyCONN();
$query_busca = "select  id,titulo,data,texto,foto,resumo from news  where id_area = '$area' and resumo > '0'  order by id desc   ";
$varea= mysql_query($query_busca, $conexao) or die(mysql_error());
return $varea;
$totalRows_varea = mysql_num_rows($varea);
$row_varea = mysql_fetch_assoc($varea);
return $row_varea;

}




// lista as ultimas noticias
function VOZES($tipo) {
$conexao=MyCONN();
$query_busca = "select  * from news  where tipo = '$tipo' and id_area <> '7' and resumo > '0' order by titulo desc ";
$empred= mysql_query($query_busca, $conexao) or die(mysql_error());
return $empred;
$totalRows_empred = mysql_num_rows($empred);
$row_empred = mysql_fetch_assoc($empred);
return $row_empred;

}








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
function VEMAIL() {
$conexao=MyCONN();
$query_busca = "SELECT * FROM email where id = '7' order by id desc  ";
$vemail= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vemail;
$totalRows_vemail = mysql_num_rows($vemail);
$row_vemail = mysql_fetch_assoc($vemail);
return $row_vemail;

}






// destaque
function HOME() {
$conexao=MyCONN();
$query_busca = "select dest.data,dest.titulo,dest.resumo,dest.foto,dest.id from destaque dest
				where dest.tipo = '1'
				order by id desc  ";
$home= mysql_query($query_busca, $conexao) or die(mysql_error());
return $home;
$totalRows_home = mysql_num_rows($home);
$row_home = mysql_fetch_assoc($home);
return $row_home;

}



// subdestaques
function SUBHOME() {
$conexao=MyCONN();
$query_busca = "select dest.id,dest.tipo,noti.titulo,noti.foto,noti.resumo as audio,noti.texto from destaque dest 
left join news noti on (noti.id = dest.id_news)
where dest.tipo = '2' 
order by noti.titulo  ";
$sub= mysql_query($query_busca, $conexao) or die(mysql_error());
return $sub;
$totalRows_sub = mysql_num_rows($sub);
$row_sub = mysql_fetch_assoc($sub);
return $row_sub;

}


// subdestaques
function TECEARIO() {
$conexao=MyCONN();
$query_busca = "select dest.data,dest.titulo,dest.resumo,dest.foto,dest.link  from destaque dest
				where dest.tipo = '3'
				order by id desc  ";
$terc= mysql_query($query_busca, $conexao) or die(mysql_error());
return $terc;
$totalRows_terc = mysql_num_rows($terc);
$row_terc = mysql_fetch_assoc($terc);
return $row_terc;

}







// adicionar newlleter
function NEWLETTER($email) {
$conexao=MyCONN();
$vdata=date("y/m/d")." ".date("h:i:s");
$query_busca = "insert into letter
				(email)
				values
				('$email')";
$letter= mysql_query($query_busca, $conexao) or die(mysql_error());
return $letter;
$totalRows_letter = mysql_num_rows($letter);
$row_letter = mysql_fetch_assoc($letter);
return $row_letter;

}




// noticias atual
function NEWS($id) {
$conexao=MyCONN();
if($id > "0") {
$query_busca = "select  id,titulo,data,texto,foto,resumo  from news  where id = '$id' order by id desc  ";
}else{
$query_busca = "select  id,titulo,data,resumo  from news where id_area = '1' order by id desc limit 1 ";
}
$news= mysql_query($query_busca, $conexao) or die(mysql_error());
return $news;
$totalRows_news = mysql_num_rows($news);
$row_news = mysql_fetch_assoc($news);
return $row_news;

}




// visualizar links
function AREA($area) {
$conexao=MyCONN();
$query_busca = "select  id,titulo,data,texto,foto,resumo from news  where id_area = '$area' order by id desc   ";
$varea= mysql_query($query_busca, $conexao) or die(mysql_error());
return $varea;
$totalRows_varea = mysql_num_rows($varea);
$row_varea = mysql_fetch_assoc($varea);
return $row_varea;

}


// visualizar contatos especificos
function CONTATO($idemail) {
$conexao=MyCONN();
$query_busca = "select id,titulo,email from email where id = '$idemail'  order by id desc   ";
$vemail= mysql_query($query_busca, $conexao) or die(mysql_error());
return $vemail;
$totalRows_vemail = mysql_num_rows($vemail);
$row_vemail = mysql_fetch_assoc($vemail);
return $row_vemail;

}



// funcao de valores monetarios

function VERVALOR($valor) {
$number=number_format($valor,2,',','.');
echo "R$ ".$number;
}


// funcao data e hora

function VERDATA($vdata) {
$hora=substr($vdata,10,18);
 $day=substr($vdata,8,2);
$mes=substr($vdata,5,2);
$ano=substr($vdata,0,4);
echo $day."/".$mes."/".$ano ;
}

function GETDATA($data) {
$hora=substr($vdata,10,18);
 $day=substr($vdata,8,2);
$mes=substr($vdata,5,2);
$ano=substr($vdata,0,4);
$DATA=$day."/".$mes."/".$ano ;
}

function NORMALDATA($data) {
 $exp= explode("-",$data); 
$day=$exp[2];
$mes=$exp[1];
$ano=$exp[0];
$DATANORMAL=$day."/".$mes."/".$ano;
echo $DATANORMAL;
}

function DIFERENCADATA($dataini,$datafim) {

$databd1 = $dataini;

$databd2 = $datafim;



$data1 = explode("-", $databd1);

$data2 = explode("-", $databd2);



$ano = $data2[0] - $data1[0];

$mes = $data2[1] - $data1[1];

$dia = $data2[2] - $data1[2];

if($mes < 0)

{

	$ano--;

	$mes = 12 + $mes;

}

if($dia < 0)

{

	$mes--;

	$dia = 30 + $dia;

}



if($ano > 0) $str_ano  = $ano . " ano";

if($ano > 1) $str_ano .= 's';



if($mes > 0) $str_mes  = $mes . " mes";

if($mes > 1) {if($ano > 0)$str_ano .= ' e '; $str_mes .= 'es'; }



if($dia > 0) $str_dia  = $dia . " dia";

if($dia > 1) {if($mes > 0)$str_mes .= ' e '; $str_dia .= 's'; }



echo " $str_dia";

}

function GETSEMANA($diasemana) {
switch($diasemana) {
		case"0": $diasemana = "Domingo";       break;
		case"1": $diasemana = "Segunda-Feira"; break;
		case"2": $diasemana = "Terça-Feira";   break;
		case"3": $diasemana = "Quarta-Feira";  break;
		case"4": $diasemana = "Quinta-Feira";  break;
		case"5": $diasemana = "Sexta-Feira";   break;
		case"6": $diasemana = "Sábado";        break;
	}

echo "$diasemana";

}

function GETVALOR($preco) {
$number=number_format($preco,2,',','.');
echo $number;
}


?>