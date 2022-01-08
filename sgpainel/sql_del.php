<?php require_once('Connections/conexao.php'); ?>
<?php require_once('inc/inc_admin.php'); ?>
<?php 
$del=$_GET["del"];
$id=$_GET["id"];
switch($del){
case 1:
$tabela="login";
$pagina="usuario.php";
break;
case 2:
$tabela="news";
$pagina="news.php";
break;
case 3:
$tabela="email";
$pagina="email.php";
break;
case 4:
$tabela="destaque";
$pagina="destaques.php";
break;
case 5:
$tabela="cliente";
$pagina="clientes.php";
break;
case 7:
$tabela="arquivo";
$pagina="arquivo.php";
break;
case 8:
$tabela="links";
$pagina="links.php";
break;
case 9:
$tabela="letter";
$pagina="newletter.php";
break;
case 10:
$tabela="areas";
$pagina="areas.php";
break;
case 11:
$tabela="grupo";
$pagina="grupo.php";
break;
case 12:
$tabela="subgrupo";
$pagina="subgrupo.php";
break;
case 13:
$tabela="pedidos";
$pagina="pedidos.php";
break;
case 14:
$tabela="news";
$pagina="galeria_fotos.php";
break;
case 15:
$tabela="produto";
$pagina="produto.php";
break;
case 16:
$tabela="pacotes";
$pagina="pacotes_turisticos.php";
break;
case 17:
$tabela="news";
$pagina="parceiros.php";
break;
case 18:
$tabela="news";
$pagina="depoemento.php";
break;
case 19:
$tabela="news";
$pagina="Papel_parede.php";
break;
case 20:
$tabela="news";
$pagina="profissoes_guia.php";
break;
case 21:
$tabela="ph_simulado";
$pagina="simulados.php";
break;
case 22:
$tabela="ph_questao";
$pagina="simulados_quest.php";
break;
case 23:
$tabela="ph_aluno";
$pagina="alunos.php";
break;

}
$area="DELETAR REGISTRO";
$acao="TABELA".$tabela;
$usuario=$vusu;
$query=LOGN($area,$acao,$usuario);
if($del<>0) {
$sql_admin="delete from ".$tabela." where id = '$id'";
$conn_del=mysql_db_query($database_conexao,$sql_admin,$conexao);
header("location:".$pagina) ; //voltar
}
?>