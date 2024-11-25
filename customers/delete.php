<?php 
include("functions.php");

if (!isset($_SESSION)) session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
    $_SESSION['type'] = "danger";
    header("Location: " . BASEURL . "index.php");
    exit; // Garante que o script pare após o redirecionamento
}

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    try {
        // Exclui o registro pelo ID
        if (delete($_GET['id'])) {
            $_SESSION['message'] = "Customer excluído com sucesso.";
            $_SESSION['type'] = "success";
        } else {
            throw new Exception("Erro ao excluir o customer.");
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Operação não permitida: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }
} else {
    $_SESSION['message'] = "ID do customer não definido.";
    $_SESSION['type'] = "danger";
}

// Redireciona para a página de listagem ou outra apropriada
header("Location: customers.php");
exit;
?>
