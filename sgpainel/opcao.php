<?php require_once('../Connections/conexao.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_usuario = 50;
$pageNum_usuario = 0;
if (isset($_GET['pageNum_usuario'])) {
  $pageNum_usuario = $_GET['pageNum_usuario'];
}
$startRow_usuario = $pageNum_usuario * $maxRows_usuario;

mysql_select_db($database_conexao, $conexao);
$query_usuario = " select id,id_quest as quest,opcao,n from opcao where id_quest = '$_GET[area]' order by id desc";
$query_limit_usuario = sprintf("%s LIMIT %d, %d", $query_usuario, $startRow_usuario, $maxRows_usuario);
$usuario = mysql_query($query_limit_usuario, $conexao) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);

if (isset($_GET['totalRows_usuario'])) {
  $totalRows_usuario = $_GET['totalRows_usuario'];
} else {
  $all_usuario = mysql_query($query_usuario);
  $totalRows_usuario = mysql_num_rows($all_usuario);
}
$totalPages_usuario = ceil($totalRows_usuario/$maxRows_usuario)-1;

$queryString_usuario = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_usuario") == false && 
        stristr($param, "totalRows_usuario") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_usuario = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_usuario = sprintf("&totalRows_usuario=%d%s", $totalRows_usuario, $queryString_usuario);
?>
<?php require_once('topo.php'); ?>

	    <div id="content" >
	    
		   <?php require_once('menu.php'); ?>
		   
		<div id="content_main" class="clearfix">
<div id="tabledata" class="section">
			<h2 class="ico_mug">Op&ccedil;&otilde;es de enquete </h2>
			
			<table width="200" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td class="ico_success"> <a href="add_opcoes.php?area=<?php echo $_GET["area"]; ?>">Novo Registro </a></td>
              </tr>
            </table>
		<table id="table">
			<thead>
			<tr>
				<th width="43">&nbsp;</th>
				<th width="167">ID</th>
				<th width="351">Op&ccedil;&otilde;es</th>
				<th width="202">N</th>
				<th width="133">Actions</th>
			  </tr>
			</thead>
			<tbody>
			  <?php do { ?>
		      <tr>
			      <td class="table_check">&nbsp;</td>
			      <td class="table_date"><?php echo $row_usuario['id']; ?></td>
			      <td class="table_title" style="font-weight: bold"><?php echo $row_usuario['opcao']; ?></td>
			      <td class="table_title" style="font-weight: bold"><span class="table_title" style="font-weight: bold"><?php echo $row_usuario['n']; ?> </span></td>
			      <td><a href="deletar.php?del=12&id=<?php echo $row_usuario['id']; ?>"><img src="img/cancel.jpg" alt="cancel" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_opcoes.php?id=<?php echo $row_usuario['id']; ?>"><img src="img/edit.jpg" alt="edit" border="0"/></a></td>
		      </tr>
			    <?php } while ($row_usuario = mysql_fetch_assoc($usuario)); ?>
			</tbody>
		</table>
	    <br />
	    <table width="400" border="0" cellspacing="3" cellpadding="2">
          <tr>
            <td width="150" align="right"><?php if ($pageNum_usuario > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_usuario=%d%s", $currentPage, max(0, $pageNum_usuario - 1), $queryString_usuario); ?>" style="font-weight: bold">&lt;&lt; Voltar</a>
                <?php } // Show if not first page ?></td>
            <td width="90">&nbsp;</td>
            <td width="148" align="left"><?php if ($pageNum_usuario < $totalPages_usuario) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_usuario=%d%s", $currentPage, min($totalPages_usuario, $pageNum_usuario + 1), $queryString_usuario); ?>" style="font-weight: bold">Avan&ccedil;ar &gt;&gt; </a>
                <?php } // Show if not last page ?> </td>
          </tr>
        </table>
		</div>
		
		
<!-- end #tabledata -->
		<!-- end #section -->
<div id="panels" class="clearfix"><!-- end #photo --><!-- end #todo -->
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
<?php
mysql_free_result($usuario);
?>
