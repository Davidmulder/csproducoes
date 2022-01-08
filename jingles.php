<?php require_once('inc/inc_csc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta property="og:image" content="http://www.csproducoes.hospedagemdesites.ws/images/logo.jpg"/>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />

<title>Jingles e Vhts Cantadas - CS Produ&ccedil;&otilde;es Publicidade e Eventos LTDA.</title>

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

            <td colspan="4" align="left"><span class="Title">Jingles e Vhts Cantadas</span></td>
          </tr>

          <tr>

            <td colspan="4"><table width="665" border="0">

                <tr>

                  <td bgcolor="#B00002"><span class="style5">.</span></td>
                </tr>

            </table></td>
          </tr>

          <tr>

            <td colspan="4">&nbsp;</td>
          </tr>
 <?php 				
		  
 /// introdução
              $id=23;
			  $query=NEWS($id);

	         $row_news= mysql_fetch_assoc($query);

             $totalRows_news = mysql_num_rows($query);	  



			  ?>
          <tr>

            <td colspan="4"><?php echo  $row_news["texto"]; ?> </td>
          </tr>

          <tr>

            <td colspan="4">&nbsp;</td>
          </tr>

          <tr>

            <td height="36" colspan="4" align="left" background="images/locucaocaricata.jpg" class="titulobranco" style="background-repeat:no-repeat;">&nbsp;&nbsp;&nbsp;&nbsp;Modelos</td>
          </tr>

          <tr>

            <td height="12" colspan="4" align="left">&nbsp;</td>
          </tr>

          <tr>
            <td colspan="4" align="left"><table width="58%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <?php 
			  $area=7;
							$query2=AREAMUSICA($area);

	         $row_varea= mysql_fetch_assoc($query2);

             $totalRows_varea = mysql_num_rows($query2);	 
							
							$g=1;
						do {
							?>
                <td align="left"><table width="165" border="0" cellpadding="3" cellspacing="3">

                    <tr>
                      <td width="159" align="center" bgcolor="#CCCCCC"><span class="destaquelocutor"><?php echo $row_varea["titulo"]; ?></span></td>
                    </tr>
                    <tr>
                      <td align="center" bgcolor="#CCCCCC" class="textopeq"><?php echo $row_varea["texto"]; ?></td>
                    </tr>
                    <tr>
                      <td align="center" bgcolor="#CCCCCC">
					  
					        
						  
					<object width="148" height="24" data="swf/dewplayer-vol.swf?mp3=http://www.csproducoes.hospedagemdesites.ws/sgpainel/arquivo/<?php echo $row_varea["resumo"]; ?>&amp;bgcolor=FFFFFF&amp;showtime=1" 
type="application/x-shockwave-flash">
<param value="swf/dewplayer-vol.swf?mp3=http://www.csproducoes.hospedagemdesites.ws/sgpainel/arquivo/<?php echo $row_varea["resumo"]; ?>&amp;bgcolor=FFFFFF&amp;showtime=1" name="movie"/>
<param name="wmode" value="transparent" />
</object>	  
						  
						  
						              </td>
                    </tr>
                    <tr>
                      <td align="center" bgcolor="#CCCCCC"><a href="http://www.csproducoes.hospedagemdesites.ws/sgpainel/arquivo/<?php echo $row_varea["resumo"]; ?>" id="destaquelocutor">Baixar  &gt;&gt;</a></td>
                    </tr>
                </table></td>
                <?php 
			  if($g == "4"){
        echo "</tr>" ;
		$d=0;
        }?>
                <?php 
						 $g=$g+1;
						 } while ($row_varea = mysql_fetch_assoc($query2));?>
              </tr>
            </table></td>
            </tr>

          <tr>

            <td colspan="4" align="left">&nbsp;</td>
          </tr>

          <tr>

            <td width="165" align="left">&nbsp;</td>
            <td width="165" align="left">&nbsp;</td>
            <td width="165" align="left">&nbsp;</td>
            <td width="171" align="left">&nbsp;</td>
          </tr>

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

