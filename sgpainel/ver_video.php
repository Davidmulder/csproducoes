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
		  <h2 class="ico_mug">Video</h2>
		</div>
		<form action="post" method="post" accept-charset="utf-8">
			<fieldset>
				<legend><span>visualizar</span>  
				  <br />
		    </legend>
				  <table width="500" border="0" cellpadding="2" cellspacing="3" class="texto_formulario">
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
					   $video=$_GET["video"];
					  ?>
					  
					  
					  <DIV id=video></DIV>
<SCRIPT src="http://www.portalphysics.com.br/xtz01/videos/js/swfobject.js" type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
  var so = new SWFObject('http://www.portalphysics.com.br/xtz01/videos/js/player.swf','mpl','480','360','9');
  so.addParam('allowfullscreen','true');
  so.addParam('allowscriptaccess','always');
  so.addParam('wmode','opaque');
  so.addVariable('image','<?php echo $foto; ?>');
  so.addVariable('file','http://www.portalphysics.com.br/xtz01/videos/<?php echo $video; ?>');
  so.addVariable('backcolor','FFFFFF');
  so.addVariable('frontcolor','000000');
  so.addVariable('autostart','true');
  so.addVariable('bufferlength','1');
  so.addVariable('skin', 'http://www.portalphysics.com.br/xtz01/videos/js/whotube.zip');
  so.addVariable('stretching','exactfit');
  so.write('video');
</SCRIPT>
					  
					  </td>
                    </tr>
                    
                    <tr>
                      <td>Codigo Gerador</td>
                    </tr>
                    <tr>
                      <td><textarea name="area" cols="60" rows="20" id="area"><p id=video></p>					   
<SCRIPT src="http://www.portalphysics.com.br/xtz01/videos/js/swfobject.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>
  var so = new SWFObject('http://www.portalphysics.com.br/xtz01/videos/js/player.swf','mpl','480','360','9');
  so.addParam('allowfullscreen','true');
  so.addParam('allowscriptaccess','always');
  so.addParam('wmode','opaque');
  so.addVariable('image','<?php echo $foto; ?>');
  so.addVariable('file','http://www.portalphysics.com.br/xtz01/videos/<?php echo $video; ?>');
  so.addVariable('backcolor','FFFFFF');
  so.addVariable('frontcolor','000000');
  so.addVariable('autostart','false');
  so.addVariable('bufferlength','1');
  so.addVariable('skin', 'http://www.portalphysics.com.br/xtz01/videos/js/whotube.zip');
  so.addVariable('stretching','exactfit');
  so.write('video');
</SCRIPT>
					  </textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
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
