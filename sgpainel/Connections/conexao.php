<?php

# FileName="Connection_php_mysql.htm"

# Type="MYSQL"

# HTTP="true"

$hostname_conexao = "mysql.db2.net2.com.br";

$database_conexao = "restaurantebra2";

$username_conexao = "restaurantebra2";

$password_conexao = "brasuca102030";




//$conexao=mysql_connect ($hostname_conexao, $username_conexao, $password_conexao) or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ($database_conexao);


 $conexao=mysql_connect ($hostname_conexao, $username_conexao, $password_conexao) or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ($database_conexao);


//if(!($conexao = mysql_pconnect($hostname_conexao, $username_conexao, $password_conexao))){

 //echo "<meta http-equiv=refresh content=0;URL=>";

//exit;}

?>