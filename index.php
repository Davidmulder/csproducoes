<?php require_once('inc/inc_csc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta property="og:image" content="http://www.csproducoes.hospedagemdesites.ws/images/logo.jpg"/>
<link rel="shortcut icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />

<title>CS Produ&ccedil;&otilde;es Publicidade e Eventos LTDA.</title>

<style type="text/css">

<!--

.style1 {color: #FFFFFF}

.style3 {

	color: #FFFFFF;

	font-size: 20px;

	font-weight: bold;

}

-->

</style>

<style type="text/css">

#dhtmltooltip{
position: absolute;
left: -300px;
width: 150px;
border: 1px solid black;
padding: 2px;
background-color: #efefef;
visibility: hidden;
z-index: 100;
color: #666666; font-size: 12px; font-family: arial;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}

#dhtmlpointer{
position:absolute;
left: -300px;
z-index: 101;
visibility: hidden;
}

</style>

<script type="text/javascript">



var offsetfromcursorX=12 //Customize x offset of tooltip
var offsetfromcursorY=10 //Customize y offset of tooltip

var offsetdivfrompointerX=10 //Customize x offset of tooltip DIV relative to pointer image
var offsetdivfrompointerY=14 //Customize y offset of tooltip DIV relative to pointer image. Tip: Set it to (height_of_pointer_image-1).

document.write('<div id="dhtmltooltip"></div>') //write out tooltip DIV
document.write('<img id="dhtmlpointer" src="arrow2.gif">') //write out pointer image

var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

var pointerobj=document.all? document.all["dhtmlpointer"] : document.getElementById? document.getElementById("dhtmlpointer") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thewidth, thecolor){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var nondefaultpos=false
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var winwidth=ie&&!window.opera? ietruebody().clientWidth : window.innerWidth-20
var winheight=ie&&!window.opera? ietruebody().clientHeight : window.innerHeight-20

var rightedge=ie&&!window.opera? winwidth-event.clientX-offsetfromcursorX : winwidth-e.clientX-offsetfromcursorX
var bottomedge=ie&&!window.opera? winheight-event.clientY-offsetfromcursorY : winheight-e.clientY-offsetfromcursorY

var leftedge=(offsetfromcursorX<0)? offsetfromcursorX*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth){
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=curX-tipobj.offsetWidth+"px"
nondefaultpos=true
}
else if (curX<leftedge)
tipobj.style.left="5px"
else{
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetfromcursorX-offsetdivfrompointerX+"px"
pointerobj.style.left=curX+offsetfromcursorX+"px"
}

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight){
tipobj.style.top=curY-tipobj.offsetHeight-offsetfromcursorY+"px"
nondefaultpos=true
}
else{
tipobj.style.top=curY+offsetfromcursorY+offsetdivfrompointerY+"px"
pointerobj.style.top=curY+offsetfromcursorY+"px"
}
tipobj.style.visibility="visible"
if (!nondefaultpos)
pointerobj.style.visibility="visible"
else
pointerobj.style.visibility="hidden"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
pointerobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>



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

            <td width="666" align="center">&nbsp;</td>
          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><img src="images/title01.jpg" width="445" height="34" /></td>

          </tr>
<?php 
 
							$query2=TECEARIO() ;

	         $row_terc = mysql_fetch_assoc($query2);

             $totalRows_terc = mysql_num_rows($query2);
			 
			

?>
          <tr>

            <td align="left"><p>
			<?php echo $row_terc["foto"]; ?>
			
			</p></td>

          </tr>

          <tr>

            <td align="center">&nbsp;</td>

          </tr>

          <tr>

            <td><img src="images/locutores.jpg" width="680" height="43" /></td>

          </tr>

          <tr>

            <td height="144"><table width="675" border="0" cellpadding="0" cellspacing="0">

                <tr>
                  <td width="456"><table width="660" border="0" cellspacing="2" cellpadding="2">
                    <tr>
				

					<?php 
			  if ($myxml = simplexml_load_file ('include/locutores.xml')) {
			  
			  $d=1;
			  
              foreach ($myxml as $foto) {
			  ?>
                      <td width="652"><table width="165" height="229" border="0" cellpadding="2" cellspacing="2">
                        <tr>
                          <td width="157" height="133" align="center" bgcolor="#FFFFFF"><img src="<?php echo $foto->imagem; ?>" width="148" height="119" /></td>
                        </tr>
                        <tr>
                          <td height="27" align="center" bgcolor="#CCCCCC"><span class="destaquelocutor"><?php echo utf8_decode($foto->titulo); ?></span></td>
                        </tr>
                        <tr>
                          <td height="31" align="center" bgcolor="#cecece">
						  
						 
							
							<object width="148" height="24" data="swf/dewplayer-vol.swf?mp3=http://www.csproducoes.hospedagemdesites.ws/sgpainel/arquivo/<?php echo $foto->audio; ?>&amp;bgcolor=FFFFFF&amp;showtime=1" 
type="application/x-shockwave-flash">
<param value="swf/dewplayer-vol.swf?mp3=http://www.csproducoes.hospedagemdesites.ws/sgpainel/arquivo/<?php echo $foto->audio; ?>&amp;bgcolor=FFFFFF&amp;showtime=1" name="movie"/>
<param name="wmode" value="transparent" />
</object>
							
							
							</td>
                        </tr>
                        <tr>
                          <td height="28" align="center" bgcolor="#CCCCCC"><a href="http://www.csproducoes.hospedagemdesites.ws/sgpainel/arquivo/<?php echo $foto->audio; ?>" id="destaquelocutor">Baixar  &gt;&gt;</a></td>
                        </tr>
                      </table></td>
					  
					  <?php 
				if($d == "4"){
        echo "</tr>" ;
		$d=0;
        }


 $d=$d+1;
				
				?>
                    <?php 
				
				 }
}
else { echo 'Erro ao ler ficheiro XML'; }
				
				?>
                    </tr>
                  </table></td>
                  <td>&nbsp;</td>
                </tr>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="678" border="0">

                <tr>

                  <td height="280" valign="top" background="images/jingles.jpg"><table width="657" border="0">

                      <tr>

                        <td height="93" colspan="2">&nbsp;</td>

                      </tr>

                      <tr>

                        <td colspan="2">&nbsp;</td>

                      </tr>

                      <tr>

                        <td height="113" colspan="2" align="right" valign="top"><table width="320" border="0">

                            <tr>

                              <td align="left"><span class="style1">FA&Ccedil;A AQUI NA CS PRODU&Ccedil;&Otilde;ES O SEU JINGLE COMERCIAL COM ALTA <br />

                                QUALIDADE E PRE&Ccedil;OS ESPECIAIS!</span></td>

                            </tr>

                        </table></td>

                      </tr>

                      <tr>

                        <td width="535">&nbsp;</td>

                        <td width="112"><a href="jingles.php" target="_self"><img src="images/saibamais.jpg" width="80" height="29" border="0" /></a></td>

                      </tr>

                  </table></td>

                </tr>

            </table></td>

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

