<?php

	include("../config.php");
	include(DBAPI);

	$usuarios = null;
	$usuario = null;

	/**
	 *  Listagem de Usuarios
	 */
	function index() {
		global $usuarios;
		$usuarios = find_all("usuarios");
		if(!empty($_POST['users'])){
			$usuarios=filter("usuarios","nome like '%".$_POST['users']."%'");
		} else {
			$usuarios=find_all("usuarios");
		}
	}
	
	/*filtro TEM QUE FAZER*/
	/**
	 *  Cadastro de Usuarios
	 */
	function add() {

		if (!empty($_POST['usuario'])) {
			try {
				$usuario = $_POST['usuario'];
	
				/*if (!empty($_FILES["foto"]["name"])) {
					// Upload da foto
					$pasta_destino = "fotos/"; // pasta onde ficam as fotos
					$arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]); // Caminho completo até o arquivo que será gravado
					$nomearquivo = basename($_FILES["foto"]["name"]); // nome do arquivo
					$resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
					$tamanho_arquivo = $_FILES["foto"]["size"]; // tamanho do arquivo em bytes
					$nome_temp = $_FILES["foto"]["tmp_name"]; // nome e caminho do arquivo no servidor
					$tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION)); // extensão do arquivo
	
					// Chamada da da função upload para gravar a imagem
					upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);
	
					$usuario['foto'] = $nomearquivo;
				}*/
	
				// Criptografando a senha
				//if (!empty($usuario['password'])) {
					//$senha = criptografia($usuario['password']);
					//$usuario['password'] = $senha;
				//}
	
				//$usuario['foto'] = $nomearquivo;
	
				save('usuarios', $usuario);
				header('Location: index.php');
			} catch (Exception $e) {
				$_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
				$_SESSION['type'] = "danger";
			}
		}
	}

	function edit() {

		$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			if (isset($_POST['customer'])) {

				$customer = $_POST['customer'];
				$customer['modified'] = $now->format("Y-m-d H:i:s");

				update('customers', $id, $customer);
				header('location: index.php');
			} else {

				global $customer;
				$customer = find('customers', $id);
			} 
		} else {
			header('location: index.php');
		}
	}

/**
		*  Exclusão de um Usuario
		*/
	function delete($id = null) {
		
		global $usuario;
		$usuario = remove('usuarios', $id);

		header('location: index.php');
	}

	/**
	 *  Visualização de um Usuario
	 */
	function view($id = null) {
		
	  global $customer;
	  $customer = find('customers', $id);
	}
	function formatadata($data, $formato = 'd/m/Y') {
		$date = date_create($data); 
		return $date ? date_format($date, $formato) : 'Data inválida';
	}
	function telefone($numero) {
		// Remove caracteres não numéricos
		$numero = preg_replace('/\D/', '', $numero);
		
		// Verifica se o número tem 10 ou 11 dígitos
		if (strlen($numero) === 10) {
			// Formato: (XX) XXXX-XXXX
			return '(' . substr($numero, 0, 2) . ') ' . substr($numero, 2, 4) . '-' . substr($numero, 6, 4);
		} elseif (strlen($numero) === 11) {
			// Formato: (XX) XXXXX-XXXX
			return '(' . substr($numero, 0, 2) . ') ' . substr($numero, 2, 5) . '-' . substr($numero, 7, 4);
		} else {
			return 'Número inválido';
		}
	 	
	}
?>