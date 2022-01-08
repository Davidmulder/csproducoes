<?php require_once('../inc/inc_csc.php'); ?>



<?php


 
// query de banco


//destaque topo


 $query=SUBHOME();
$row_sub= mysql_fetch_assoc($query);
$totalRows_sub= mysql_num_rows($query);

$xml = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n";
        $xml .= "<area> \n";
		
		do {
		
        
		
$cod=trim($row_sub["id"]);		
$titulo=trim($row_sub["titulo"]);
$foto=trim($row_sub["foto"]);
$audio=trim($row_sub["audio"]);
$texto=  utf8_encode($row_sub["texto"]);


		
           $xml .= "\t<foto>\n";
           $xml .= "\t\t<cod>$cod</cod>\n";
		   $xml .= "\t\t<titulo>$titulo</titulo>\n";
           $xml .= "\t\t<imagem>$foto</imagem>\n";
		   $xml .= "\t\t<audio>$audio</audio>\n";
           $xml .= "\t</foto>\n";
		   
       } while ($row_sub = mysql_fetch_assoc($query));
                $xml .= "</area>";
                
                $ponteiro = fopen('locutores.xml', 'w+'); //cria um arquivo com o nome backup.xml
                fwrite($ponteiro,$xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml
 
                $ponteiro = fclose($ponteiro); //fecha o arquivo


//.....................................................................

 $query2=HOME();
$row_home= mysql_fetch_assoc($query2);
$totalRows_home= mysql_num_rows($query2);

$xml = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n";
        $xml .= "<area> \n";
        do {
		
$link=trim($row_home["id"]);
$foto=trim($row_home["foto"]);
		
           $xml .= "\t<foto>\n";
           $xml .= "\t\t<cod>$link</cod>\n";
           $xml .= "\t\t<imagem>$foto</imagem>\n";
           $xml .= "\t</foto>\n";
      } while ($row_home = mysql_fetch_assoc($query2));
                $xml .= "</area>";
                
                $ponteiro = fopen('foto.xml', 'w'); //cria um arquivo com o nome backup.xml
                fwrite($ponteiro, $xml); // salva conteúdo da variável $xml dentro do arquivo backup.xml
 
                $ponteiro = fclose($ponteiro); //fecha o arquivo





 
echo"Gerador da home";


?>
