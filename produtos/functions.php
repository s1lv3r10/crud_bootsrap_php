<?php

	include("../config.php");
	include(DBAPI);

	$products = null;
	$product = null;

	/**
	 *  Listagem de Produtos
	 */
	function index() {
		global $products;
		$products = find_all('tabeladados');
		if(!empty($_POST['produtos'])){
			$products=filter("tabeladados","marca like '%".$_POST['produtos']."%'");
		} else {
			$products=find_all("tabeladados");
		}
	}
	
	/**
	 *  Cadastro de Produtos
	 */
	function add() {
		if (!empty($_POST)) {
			$today = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));

			// Dados do produto
			$product = $_POST;
			$product['data'] = $today->format("Y-m-d");
			
			// Verificando e salvando a imagem
			if (!empty($_FILES['imagem']['name'])) {
				$image_name = $_FILES['imagem']['name'];
				$image_tmp = $_FILES['imagem']['tmp_name'];
				$upload_dir = '../imagens/';
				
				// Salvando o arquivo de imagem
				if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
					$product['imagem'] = $image_name; // Armazena o nome do arquivo
				} else {
					die("Erro ao enviar imagem.");
				}
			}

			save("tabeladados", $product); // Salva o produto no banco de dados
			header("location: index.php");
		}
	}
	
	/**
	 *  Edição de Produtos
	 */
	function edit() {
		$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			if (!empty($_POST['product'])) {
				$product = $_POST['product'];
				$product['modificado'] = $now->format("Y-m-d H:i:s");

				// Se houver uma nova imagem, faz upload
				if (!empty($_FILES['product']['name']['imagem'])) {
					$imagem = upload_image($_FILES['product']);
					if ($imagem) {
						$product['imagem'] = $imagem;
					}
				}

				update('tabeladados', $id, $product);
				header('location: index.php');
			} else {
				global $product;
				$product = find('tabeladados', $id);
			}
		} else {
			header('location: index.php');
		}
	}

	/**
	 *  Exclusão de um Produto
	 */
	function delete($id = null) {
		global $product;
		$product = remove('tabeladados', $id);
		header('location: index.php');
	}
	
	function remove1($table = null, $id = null) {
    try {
        if ($id) {
            $sql = "DELETE FROM " . $table . " WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    } catch (Exception $e) {
        return false;
    }
}

	/**
	 *  Visualização de um Produto
	 */
	function view($id = null) {
		global $product;
		$product = find('tabeladados', $id);
	}
	
	/**
	 * Formata uma data em um formato amigável.
	 */
	function formatadata($data, $formato = 'd/m/Y') {
		$date = date_create($data); 
		return $date ? date_format($date, $formato) : 'Data inválida';
	}

	/**
	 * Função para fazer upload de imagem
	 *
	 * @param array $file Dados do arquivo
	 * @return string Nome da imagem ou false se falhar
	 */
	function upload_image($file) {
		$target_dir = "../imagens/";
		$target_file = $target_dir . basename($file["name"]["imagem"]);
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Verifica se o arquivo é uma imagem
		$check = getimagesize($file["tmp_name"]["imagem"]);
		if ($check === false) {
			return false;
		}

		// Verifica se o arquivo já existe
		if (file_exists($target_file)) {
			return false;
		}

		// Verifica o tamanho do arquivo (limite de 2MB)
		if ($file["size"]["imagem"] > 2000000) {
			return false;
		}

		// Apenas permite alguns formatos de imagem
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			return false;
		}

		// Tenta fazer upload da imagem
		if (move_uploaded_file($file["tmp_name"]["imagem"], $target_file)) {
			return basename($file["name"]["imagem"]);
		}

		return false;
	}
?>
