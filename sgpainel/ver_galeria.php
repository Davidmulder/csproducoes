<?php require_once('topo.php'); ?>

	    <div id="content" >
	       <?php require_once('menu.php'); ?>
		<div id="content_main" class="clearfix">
		  <!-- end #sidebar -->

		<!-- end #content_main -->
		<!-- end #postedit -->
		<!-- end #tabledata -->
<div class="section">
			
		<div>
		  <h2 class="ico_mug">Fotos</h2>
		</div>
		<form action="post" method="post" accept-charset="utf-8">
			<fieldset>
				<legend><span>visualizar</span>  
				  <br />
		    </legend>
				  <table width="840" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr >
                      <td >&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="50">
					  <?php 
					  $foto=$_GET["foto"];
					  //$foto="teste";
					  ?>
					  <?
//definimos o path de acesso
$d=$_SERVER['DOCUMENT_ROOT'];
$path = "$d/galeria/".$foto."/p/";

//echo $path;


//abrimos o direct&oacute;rio
$dir = opendir($path);
//Mostramos as informa&ccedil;&otilde;es
$h="0";

?>
					  <table width="834" border="0" cellspacing="1" cellpadding="0">
                        <tr>
					
                          <td width="832" align="left">
						  	<?php 
	while ($elemento = readdir($dir)){

  if (($elemento != ".") && ($elemento !=".."))   {
  list($width, $height, $type, $attr) = getimagesize("$path/$elemento");
							
							?>
						  <table width="298" border="0" cellspacing="5" cellpadding="2">
                            <tr>
							
                              <td width="48" align="left">
							  <img src="thumbs.php?maxsize=112&src=../galeria/<?php  echo $foto."/p/".$elemento; ?>" border="0"  />							  </td>
							 
							  
							  
                            
                              <td width="227" align="right"><img src="thumbs.php?maxsize=112&src=../galeria/<?php  echo $foto."/g/".$elemento; ?>" border="0"  />	</td>
                            </table>
						  <br /> <?php }}
//Fechamos o direct&oacute;rio
closedir($dir);?></td> 
                        </tr>
                      </table>					 				  </td>
                    </tr>
            </table>
			  <br />
			  <br />
			</fieldset>
			
		</form>
		  </div>
<!-- end #section -->
		
		<div id="panels" class="clearfix">
		  <!-- end #photo --><!-- end #todo -->
          <!-- end #calendar -->
</div>
		<!-- end #panels -->
		<!-- end #dialog [if you don't want this, delete whole div and 6th line i custom.js -->
        </div>
	    <!-- end #content -->
	    <!-- end #footer -->
</div>
<!-- end container -->
</div>
</body>
</html>
