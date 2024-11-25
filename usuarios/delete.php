<?php 
require_once("functions.php");

if (!isset($_SESSION)) session_start();

// Verifica se o usuário está logado e se é administrador
if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin") {
    $_SESSION['message'] = "Você precisa estar logado e ser um administrador para acessar esse recurso.";
    $_SESSION['type'] = "danger";
    header("Location:" . BASEURL . "index.php");
    exit;
}

if (isset($_GET['id'])) {
    try {
        $usuario = find("usuarios", $_GET['id']);

        if (!$usuario) {
            throw new Exception("Usuário não encontrado.");
        }

        // Proteção adicional para evitar exclusão de usuários específicos, como o admin principal
        if ($usuario['user'] === "admin") {
            throw new Exception("Você não pode excluir o administrador principal.");
        }

        // Exclua o usuário
        delete($_GET['id']);

        // Exclua a foto, se existir
        if (!empty($usuario['foto']) && file_exists("fotos/" . $usuario['foto'])) {
            unlink("fotos/" . $usuario['foto']);
        }

        $_SESSION['message'] = "Usuário excluído com sucesso.";
        $_SESSION['type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Operação não permitida: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }

    header("Location: index.php");
    exit;
}
?>
