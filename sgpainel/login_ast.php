<?php require_once('Connections/conexao.php'); ?>
<?php require_once('inc/inc_admin.php'); ?>
<?php 

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

if(empty($_POST["login"]) or empty($_POST["senha"]) ) {
echo "<script>
document.location.href='index.php?mens=1';
</script>";

}

$vlogin= anti_injection($_POST["login"]);
$vsenha = anti_injection($_POST["senha"]); 

if($vsenha == "") {
$area="ACESSONEGADO";
$acao="Acesso ao Sistema";
$usuario="ANONIMO";
$query=LOGN($area,$acao,$usuario);
header("location:index.php?mens=1");
}
//busca o banco de dados
mysql_select_db($database_conexao, $conexao);
//select do banco
$sql_aluno="select * from login where login = '$vlogin' and senha = '$vsenha'  ";
#captura o resultado
$conn_aluno=mysql_db_query($database_conexao,$sql_aluno,$conexao); //usuario
$total_aluno = mysql_num_rows($conn_aluno);
$Rs = mysql_fetch_assoc($conn_aluno);
if($total_aluno<>0){ 
// descrui cookie
setcookie("vcod_usu");
setcookie("vusu");
setcookie("vnivel");
$vcod_usu=$Rs["id"];
$login=$Rs["login"];
$vdata=date("y/m/d")." ".date("h:i:s");
$vusu=$Rs["nome"];
$acesso=$Rs["acesso"];
$v=$acesso +1;
$adata=$Rs["data"];
//log de usuario
$area="LOGINSENHA";
$acao="Acesso ao Sistema";
$usuario=$vusu;
$query=LOGN($area,$acao,$usuario);

setcookie("vcod_usu","$vcod_usu");
setcookie("vusu","$vusu");
setcookie("vacesso","$v");
setcookie("vdata","$adata");
setcookie("vnivel","5");
//USUARIO PRIMEIRA VEZ
$update="update login
        set data = '$vdata',acesso = '$v'
        where id = '$vcod_usu' ";
$conn_update=mysql_db_query($database_conexao,$update,$conexao);
echo "<script>
document.location.href='inicial.php';
</script>";
 }else{
//Dados do aluno
//log de usuario
$area="ACESSONEGADO";
$acao="Acesso ao Sistema";
$usuario="ANONIMO";
$query=LOGN($area,$acao,$usuario);
echo "<script>
document.location.href='index.php?mens=1';
</script>";
}?>

