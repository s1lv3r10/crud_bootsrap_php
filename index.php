<<<<<<< HEAD
<?php 
include 'config.php';
include DBAPI;
if (!isset($_SESSION)) session_start();
include(HEADER_TEMPLATE);
$db = open_database(); 
?>

<h1>Notebooks</h1>
<hr/>
<?php if ($db) : ?>
    <div class="row">
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="<?php echo BASEURL;?>customers/add.php" class="btn btn-secondary">
                <div class="row">
                    <div class="col-xs-12 text-center mt-3">
                        <i class="fa-solid fa-user-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Novo Cliente</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="<?php echo BASEURL;?>customers" class="btn btn-light">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa-solid fa-users fa-5x mt-3"></i>
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
            <a href="<?php echo BASEURL;?>produtos/add.php" class="btn btn-secondary">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa-solid fa-laptop-medical fa-5x mt-3"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Novo Produto</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3 col-md-2">
            <a href="<?php echo BASEURL;?>produtos" class="btn btn-light">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="fa-solid fa-laptop fa-5x mt-3"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <p>Produtos</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php if (isset($_SESSION['user'])) : // verifica se existe usuário ?>
        <?php if ($_SESSION['user'] == "admin") : ?>
            <div class="row mt-3" id="actions"><!--Usuários-->
                <div class="col-xs-6 col-sm-3 col-md-2">
                    <a href="<?php echo BASEURL;?>usuarios/add.php" class="btn btn-secondary">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <i class="fa-solid fa-person-circle-plus fa-5x mt-3"></i>
                            </div>
                            <div class="col-xs-12 text-center">
                                <p>Novo Usuário</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-2">
                    <a href="<?php echo BASEURL;?>usuarios" class="btn btn-light">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <i class="fa-solid fa-people-line fa-5x mt-3"></i>
                            </div>
                            <div class="col-xs-12 text-center">
                                <p>Usuários</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else : ?>
    <!-- Mensagem de erro -->
    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
            <p><strong>ERRO:</strong> Não foi possível conectar ao banco de dados<br>
            <?php echo $_SESSION['message']; ?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php clear_messages(); ?>
    <?php endif; ?>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
=======
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
>>>>>>> 959a0039c56e0d773ea714e1e145db9a7d0c81e3
