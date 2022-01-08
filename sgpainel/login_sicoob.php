<?php require_once('../Connections/conexao.php'); ?>
<?php require_once('inc/inc_admin.php'); ?>
<?php 
$vlogin= $_POST["login"];
$vsenha = $_POST["senha"]; 
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
setcookie("vnivel","1");
//USUARIO PRIMEIRA VEZ
$update="update login
        set data = '$vdata',acesso = '$v'
        where id = '$vcod_usu' ";
$conn_update=mysql_db_query($database_conexao,$update,$conexao);
header("location:inicial.php") ; //adminitradores
 }else{
//Dados do aluno
//log de usuario
$area="ACESSONEGADO";
$acao="Acesso ao Sistema";
$usuario="ANONIMO";
$query=LOGN($area,$acao,$usuario);
header("location:index.php?mens=1") ; //erro
}?>

