<?php 
    include("../config.php");
    try{
        session_start();
        session_destroy();
        header("Location: " . BASEURL . "index.php");
    } catch (Exception $e){
        $_SESSION['message']="ocorreu um erro: " . $e->GetMessage();
        $_SESSION['type']="danger";
    }
?>