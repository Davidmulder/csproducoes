<?php require_once('inc/inc_csc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta property="og:image" content="http://www.csproducoes.hospedagemdesites.ws/images/logo.jpg"/>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />

<?php 
$sopinha = "1231546478795410002154785632145";

srand((double)microtime()*1000000);

for($i=0;$i<9;$i++){

$codigo.=$sopinha[rand()%strlen($sopinha)];}



// criar area


setcookie("vcarrinho", $codigo, time()+3600);  /* expira em 1 hora */


?>


<title>Pacotes - CS Produ&ccedil;&otilde;es Publicidade e Eventos LTDA.</title>

<style type="text/css">

<!--

.style5 {

	font-size: 2px;

	color: #B00002;

}

-->

</style>

</head>



<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td height="153" colspan="2"><table width="235" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="235" align="right"><em><a href="index.php" target="_self"><img src="images/logo.jpg" width="147" height="145" border="0" /></a></em></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="47" colspan="2" align="center"><?php require_once('menu.php'); ?></td>

  </tr>

  <tr>

    <td height="361" colspan="2" align="center"><table width="841" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td height="320"><iframe src="demo/demo.php" name="slid" marginwidth="0" marginheight="0" id="slid" border="no" noresize="noresize" allowtransparency="yes" width="841px" frameborder="0" height="320px" scrolling="No">&lt;span class=&quot;style1&quot;&gt;&lt;/span&gt;</iframe></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="38" colspan="2">&nbsp;</td>

  </tr>

  <tr>

    <td colspan="2" valign="top" id="bglogo"><table width="1000" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="726" align="center" valign="top"><table width="666" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td width="666" align="left"><span class="Title">Pacotes</span></td>
          </tr>

          <tr>

            <td><table width="665" border="0">

                <tr>

                  <td bgcolor="#B00002"><span class="style5">.</span></td>
                </tr>

            </table></td>
          </tr>

          <tr>

            <td>&nbsp;</td>
          </tr>
<?php 				
		  
 /// introdução
              $id=108;
			  $query=NEWS($id);

	         $row_news= mysql_fetch_assoc($query);

             $totalRows_news = mysql_num_rows($query);	  



			  ?>
          <tr>

            <td><?php echo  $row_news["texto"]; ?> </p>
              <p><a href="C&cproducao.pdf" class="login" target="_blank"><img src="http://www.orm.com.br/projetos/tvliberal/img/midia_download_pdf.jpg" width="27" height="26" border="0" /><span class="destaquelocutor">Regulamento</span></a></p></td>
          </tr>

          <tr>

            <td>&nbsp;</td>
          </tr>

<?php 
 
							$query2=PACOTES();

	         $row_pact= mysql_fetch_assoc($query2);

             $totalRows_pact= mysql_num_rows($query2);
			 
			 do {

?>


          <tr background="images/locucaocaricata.jpg">

            <td height="34" align="left" class="titulobranco" style="background-repeat:no-repeat"> &nbsp;&nbsp;&nbsp;<?php echo $row_pact["titulo"]; ?> </td>
          </tr>

          <tr>

            <td height="12" align="left">&nbsp;</td>
          </tr>

          <tr>

            <td align="left" valign="top"><table width="477" border="0" cellpadding="3" cellspacing="3">

                <tr>

                  <td colspan="2" align="left"> <?php echo $row_pact["texto"]; ?> </td>
                </tr>

                <tr>

                  <td align="left">Dura&ccedil;&atilde;o: <?php echo $row_pact["detalhe"]; ?></td>
                  <td align="left"><a href="add_carrinho.php?pacote=<?php echo $row_pact["id"]; ?>"><img src="images/comprar_botao.jpg" width="85" height="23" border="0" /></a></td>
                </tr>

                <tr>

                  <td width="363" align="left">R$ <?php 
				  $valor=$row_pact["valor"];
				  $number=number_format($valor,2,',','.');
                    echo $number;
				  
				   ?></td>
                  <td width="93" align="left" bgcolor="#ededed">&nbsp;</td>
                </tr>

            </table></td>
            </tr>
			
			         <tr>

            <td align="left" class="linha">&nbsp;</td>
          </tr>
<?php  } while ($row_pact = mysql_fetch_assoc($query2)); ?>
        </table></td>

        <td width="274" valign="top"><?php require_once('lat.php'); ?></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td colspan="2" valign="top">&nbsp;</td>

  </tr>

</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td height="245" align="center" valign="top" id="rodape"><?php require_once('rodape.php'); ?></td>

  </tr>

</table>

</body>

</html>

