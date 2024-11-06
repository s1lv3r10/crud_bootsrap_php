<?php 
include 'config.php';
include DBAPI;
include(HEADER_TEMPLATE);
$db = open_database(); 
?>

			<h1>Notebooks</h1>
			<hr/>
			<?php if ($db) : ?>
			<div class="row">
				<div class="col-xs-6 col-sm-3 col-md-2">
					<a href="customers/add.php" class="btn btn-secondary">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-user-plus fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Novo Cliente</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-2">
					<a href="customers" class="btn btn-light">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-users fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Clientes</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-xs-6 col-sm-3 col-md-2">
					<a href="produtos/add.php" class="btn btn-secondary">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-laptop-medical fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Novo Produto</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-2">
					<a href="produtos" class="btn btn-light">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-laptop fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Produtos</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-xs-6 col-sm-3 col-md-2">
					<a href="usuarios/add.php" class="btn btn-secondary">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-person-circle-plus fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Novo Usuário</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-2">
					<a href="usuarios" class="btn btn-light">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-people-line fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Usuários</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<?php else : ?>
				<div class="alert alert-danger" role="alert">
					<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
				</div>

			<?php endif; ?>
<?php include(FOOTER_TEMPLATE); ?>