<?php 
	include('functions.php');
if (!isset($_SESSION)) session_start();
	if (isset($_SESSION['user'])){
	  }
	else {
	  $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
	  $_SESSION['type'] = "danger";
	}	
	view($_GET['id']);
	include(HEADER_TEMPLATE);
?>

<h2 class="mt-3">Produto <?php echo $product['id']; ?></h2>
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

<dl class="dl-horizontal">
	<dt>Código:</dt>
	<dd><?php echo $product['codigo']; ?></dd>

	<dt>Marca:</dt>
	<dd><?php echo $product['marca']; ?></dd>

	<dt>Modelo:</dt>
	<dd><?php echo $product['modelo']; ?></dd>

	<dt>Tamanho:</dt>
	<dd><?php echo $product['tamanho']; ?> cm</dd>

	<dt>Data de Cadastro:</dt>
	<dd><?php echo formatadata($product['data'], "d/m/Y"); ?></dd>
	
	<dt>Última Modificação:</dt>
	<dd><?php echo !empty($product['modificado']) ? formatadata($product['modificado'], "d/m/Y H:i:s") : 'Não alterado'; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Imagem:</dt>
	<dd>
		<?php if (!empty($product['imagem'])): ?>
			<img src="../imagens/<?php echo $product['imagem']; ?>" alt="Imagem do produto" style="max-width: 200px;">
		<?php else: ?>
			<p>Sem imagem disponível</p>
		<?php endif; ?>
	</dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">
	    <i class="fa-solid fa-pen-to-square"></i> Editar
	  </a>
	  <a href="index.php" class="btn btn-light">
	    <i class="fa-solid fa-arrow-rotate-left"></i> Voltar
	  </a>
	</div>
</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
