<?php
setcookie("vusu","",time()-3600);
setcookie("vnivel","",time()-3600);
setcookie("vcod_usu","",time()-3600);
setcookie("vdata","",time()-3600);
setcookie("vacesso","",time()-3600);
//log de usuario
$area="LOGOUT";
$acao="Sair do Sistemas";
$usuario="$vusu";
header("location:index.php") ; //erro
?>