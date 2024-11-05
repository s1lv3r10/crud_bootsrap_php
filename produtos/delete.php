<?php 
	include("../config.php");
	include(DBAPI);

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		if (remove('tabeladados', $id)) {
			$_SESSION['message'] = "Produto removido com sucesso.";
			$_SESSION['type'] = "success";
		} else {
			$_SESSION['message'] = "Erro ao remover o produto.";
			$_SESSION['type'] = "danger";
		}
		
		header("Location: index.php");
	} else {
		$_SESSION['message'] = "ID não definido.";
		$_SESSION['type'] = "danger";
		header("Location: index.php");
	}
?>

