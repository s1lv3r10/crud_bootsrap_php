<?php 
	require_once('functions.php');
	if(!isset($_SESSION)) session_start();
	if(isset($_SESSION['user'])){
		if($_SESSION['user']!="admin"){
			$_SESSION['message']="Você precisa ser um adm para ver essa página";
			$_SESSION['type']="danger";
			sleep(10);
			}
		} else {
			$_SESSION['message']="Você precisa estar logado e ser adm para acessar esse recurso";
			$_SESSION['type']="danger";
		}
	view($_GET['id']); // Obtém as informações do usuário com base no ID
	include(HEADER_TEMPLATE);
?>

<h2 class="mt-3">Usuário <?php echo $usuario['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
					<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
						<?php echo $_SESSION['message']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<a href="../index.php">
						<button type="button" class="btn btn-secondary mb-2">Voltar ao Menu Inicial</button>
					</a>
					<?php clear_messages(); ?>
					<?php else : ?>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>">
		<?php echo $_SESSION['message'] . "\n"; ?>
	</div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $usuario['nome']; ?></dd>

	<dt>Usuário:</dt>
	<dd><?php echo $usuario['user']; ?></dd>

	<dt>Foto:</dt>
	<dd>
	<?php 
		if (!empty($usuario['foto'])){
			echo "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"200px\">";
		} else {
			echo "<img src=\"fotos/SemImagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"200px\">";
		}
    ?>

	</dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
		<?php if(empty($_SESSION['message'])) : ?>
	  		<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary">
	    		<i class="fa-solid fa-pen-to-square"></i> Editar
	  		</a>
	  	<?php endif; ?>
	  	<a href="index.php" class="btn btn-light">
	    	<i class="fa-solid fa-arrow-rotate-left"></i> Voltar
		</a>
	</div>
</div>
<?php clear_messages(); ?>
<?php endif; ?>
<?php include(FOOTER_TEMPLATE); ?>