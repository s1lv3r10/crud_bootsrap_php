<?php 
include("../config.php");
include(DBAPI);

if (!isset($_SESSION)) session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
    $_SESSION['type'] = "danger";
    header("Location: " . BASEURL . "index.php");
    exit; // Interrompe a execução imediatamente
}

// Verifica se o ID está definido
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Tenta remover o registro
    if (remove('tabeladados', $id)) {
        $_SESSION['message'] = "Produto removido com sucesso.";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['message'] = "Erro ao remover o produto.";
        $_SESSION['type'] = "danger";
    }
} else {
    $_SESSION['message'] = "ID não definido.";
    $_SESSION['type'] = "danger";
}

// Redireciona para a página inicial
header("Location: index.php");
exit; // Interrompe a execução para evitar processamento adicional
?>
