<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CRUD com Bootstrap</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome.all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/x-icon" href="../imagens/icon.png">
	<style>
		body {
			background-color: #FFF;
			padding-top: 50px;
			padding-bottom: 20px;
		}
		.btn-light {
			background-color: #FF6D1F;
			color: #FFF;
			border-color: #f2661b;
		}
		.btn-light:hover {
			background-color: #f2661b;
			color: #FFF;
			border-color: #f2661b;
		}
		h1 {
			margin: 20px;
		}
	</style>
</head>
<body>
<!-- Início do menu -->
<nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASEURL; ?>">
            <i class="fa-solid fa-house-chimney"></i> <b>CRUD</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Clientes</b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers"><i class="fa-solid fa-users"></i> Gerenciar Clientes</a></li>
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Produtos</b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>produtos"><i class="fa-solid fa-laptop"></i> Gerenciar Produtos</a></li>
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>produtos/add.php"><i class="fa-solid fa-laptop-medical"></i> Novo Produto</a></li>
                    </ul>
                </li>
                <!-- Verifica se o usuário é Administrador -->
                <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>Usuários</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios"><i class="fa-solid fa-people-line"></i> Gerenciar Usuários</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid fa-user-plus"></i> Novo Usuário</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- Seção para Mostrar Usuário Logado -->
            <?php if (isset($_SESSION['user'])): ?>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fa-solid fa-user"></i> 
                            <b><?php echo $_SESSION['user']; ?></b>
                        </a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="<?php echo BASEURL; ?>inc/logout.php">
                            <i class="fa-solid fa-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    <li class="nav-item me-5">
                        <a class="nav-link" href="<?php echo BASEURL; ?>inc/login.php">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Fim do menu -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo BASEURL; ?>js/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="<?php echo BASEURL; ?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/awesome/all.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/main.js"></script>

	<main class="container">
		<!-- Conteúdo principal -->
		 
	

