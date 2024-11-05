<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CRUD com Bootstrap</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome.all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/x-icon" href="../imagens/icon.png">
	<style>
			body {
				padding-top: 50px;
				padding-bottom: 20px;
			}
			.btn-light {
				background-color: #999;
				color: #FFF;
				border-color: #999
			}
			.btn-light:hover {
				background-color: #777;
				color: #FFF;
				border-color: #777
			}
		</style>
</head>
<body>
<!-- Início do menu-->
	<nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house-chimney"></i> CRUD</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Clientes
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers"><i class="fa-solid fa-users"></i> Gerenciar Clientes</a></li>
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Produtos
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>produtos"><i class="fa-solid fa-laptop"></i> Gerenciar Produtos</a></li>
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>produtos/add.php"><i class="fa-solid fa-laptop-medical"></i> Novo Produto</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Usuários
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios"><i class="fa-solid fa-people-line"></i> Gerenciar Usuários</a></li>
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid fa-person-circle-plus"></i> Novo Usuário</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Fim do menu-->
	<main class="container">
		<!-- Seu conteúdo aqui -->

