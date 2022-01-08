if (document.getElementById) {
	var tree = new WebFXTree(' MENU');
	tree.setBehavior('classic');
	var a1;a1 = new WebFXTreeItem(' SEGMENTOS');
	tree.add(a1);a1.add(new WebFXTreeItem(' Noticias','news.php',''));	
	a1.add(new WebFXTreeItem(' Aviso','aviso.php',''));
	a1.add(new WebFXTreeItem(' Enquete','enquete.php',''));
	a1.add(new WebFXTreeItem(' Galeria','galeria_home.php',''));	
	a1.add(new WebFXTreeItem(' Downloads','down.php',''));	
	a1.add(new WebFXTreeItem(' Professores','professores.php',''));
	a1.add(new WebFXTreeItem(' Disciplina','disciplina.php',''));
	a1.add(new WebFXTreeItem(' Segmentos','segmentos.php',''));
	a1.add(new WebFXTreeItem(' Recados','comentario.php',''));
	a1.add(new WebFXTreeItem(' Links','links.php',''));
	a1.add(new WebFXTreeItem(' Newsletter','newsletter.php',''));
	a1 = new WebFXTreeItem(' Simulado');
	a1.add(new WebFXTreeItem(' Alunos','alunos.php',''));	
	a1.add(new WebFXTreeItem(' Simulado','simulado.php',''));
	tree.add(a1);
	a1 = new WebFXTreeItem(' USUARIOS');
	tree.add(a1);
	a1.add(new WebFXTreeItem(' Add Uses','add_usuario.php',''));
	a1.add(new WebFXTreeItem(' ADMIN ','usuarios.php',''));
	document.write(tree);
}