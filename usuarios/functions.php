<?php
	include("../config.php");
	include(DBAPI);
	$usuarios = null;
	$usuario = null;

	/*Listagem de Usuarios*/
	function index() {
		global $usuarios;
		$usuarios = find_all("usuarios");
		if(!empty($_POST['users'])){
			$usuarios=filter("usuarios","nome like '%".$_POST['users']."%'");
		} else {
			$usuarios=find_all("usuarios");
		}
	}

/*Função para criptografia de senha*/
function criptografia($senha){
    //Aplicando criptografia na senha
    $custo = "08";
    $salt = "CrIfllePaRk1BjomMOF6aJ";

    //Gera um hash baseado em bcrypt
    $hash = crypt($senha, "$2a$".$custo."$".$salt."$");
    return $hash; //retorna a senha criptografada
}

/*Função para upload de foto*/
function upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
    try {
        $nomearquivo = basename($arquivo_destino);
		$uploadOk= 1;

        // Verifica se a pasta destino é gravável
        if (!is_writable($pasta_destino)) {
            throw new Exception("A pasta $pasta_destino não é gravável.");
        }

        // Verifica se o arquivo é uma imagem
		if (isset($_POST["submit"])){
			$check = getimagesize($nome_temp);
			if ($check !== false) {
				$_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
				$_SESSION['type'] = "info";
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
				throw new Exception("O arquivo não é uma imagem válida.");
			}
		}

        // Verifica se o arquivo já existe
        if (file_exists($arquivo_destino)) {
			$uploadOk = 0;
            throw new Exception("O arquivo $nomearquivo já existe.");
        }

        // Verifica o tamanho do arquivo
        if ($tamanho_arquivo > 5000000) {
			$uploadOk = 0;
            throw new Exception("O arquivo é muito grande.");
        }

        // Permite certos tipos de arquivo
        if ($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg" 
            && $tipo_arquivo != "gif") {
            throw new Exception("Tipo de arquivo $tipo_arquivo não permitido.");
        }

        // Move o arquivo
        if ($uploadOk == 0) {
            throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
        } else {
            // Se tudo estiver OK, tentamos fazer o upload do arquivo
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {
                $_SESSION['message'] = "O arquivo " . htmlspecialchars($nomearquivo) . " foi armazenado.";
                $_SESSION['type'] = "success";
            } else {
                throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }
}



/* Cadastro de Usuarios*/
function add() {
    if (!empty($_POST['usuario'])) {
        try {
            $usuario = $_POST['usuario'];
            $nomearquivo = null; // Inicializa a variável

            if (!empty($_FILES["foto"]["name"])) {
                // Upload da foto
                $pasta_destino = "fotos/"; // pasta onde ficam as fotos
                $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]); // Caminho completo até o arquivo que será gravado
                $nomearquivo = basename($_FILES["foto"]["name"]); // nome do arquivo
                $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                $tamanho_arquivo = $_FILES["foto"]["size"]; // tamanho do arquivo em bytes
                $nome_temp = $_FILES["foto"]["tmp_name"]; // nome e caminho do arquivo no servidor
                $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION)); // extensão do arquivo

                // Adiciona mensagens de depuração
                echo "Pasta destino: " . $pasta_destino . "<br>";
                echo "Arquivo destino: " . $arquivo_destino . "<br>";
                echo "Nome arquivo: " . $nomearquivo . "<br>";
                echo "Nome temp: " . $nome_temp . "<br>";

                // Chamada da função upload para gravar a imagem
                upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                $usuario['foto'] = $nomearquivo;
            }

            // Criptografando a senha
            if (!empty($usuario['password'])) {
                $senha = criptografia($usuario['password']);
                $usuario['password'] = $senha;
            }

            if ($nomearquivo) {
                $usuario['foto'] = $nomearquivo;
            }

            save('usuarios', $usuario);
            header('Location: index.php');
        } catch (Exception $e) {
             $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
             $_SESSION['type'] = "danger";
        }
    }
}

	/*Edição de Usuários*/
	function edit() {
		try {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];

				if (isset($_POST['usuario'])) {
					$usuario = $_POST['usuario'];

					// Criptografando a senha
					if (!empty($usuario['password'])) {
						$senha = criptografia($usuario['password']);
						$usuario['password'] = $senha;
					}

					if (!empty($_FILES["foto"]["name"])) {
						// Upload da foto
						$pasta_destino = "fotos/"; // Pasta onde ficam as fotos
						$arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]); // Caminho completo até o arquivo que será gravado
						$nomearquivo = basename($_FILES["foto"]["name"]); // Nome do arquivo
						$tamanho_arquivo = $_FILES["foto"]["size"]; // Tamanho do arquivo em bytes
						$nome_temp = $_FILES["foto"]["tmp_name"]; // Nome e caminho do arquivo no servidor
						$tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION)); // Extensão do arquivo

						upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

						$usuario['foto'] = $nomearquivo;
					}

					update('usuarios', $id, $usuario);
					header('Location: index.php');
				} else {
					global $usuario;
					$usuario = find("usuarios", $id);
				}
			} else {
				header("Location: index.php");
			}
		} catch (Exception $e) {
			$_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
			$_SESSION['type'] = "danger";
		}
	}


	/* Exclusão de um Usuario*/
	function delete($id = null) {
		global $usuarios;
		remove("usuarios", $id);

		header("Location: index.php");
	}

	/*Visualização de um Usuario*/
	function view($id = null) {
		
	  global $usuario;
	  $usuario = find('usuarios', $id);
	}
?>