<?php 
	include('functions.php'); 
	view($_GET['id']);
	include(HEADER_TEMPLATE);
?>

<h2 class="mt-2">Produto <?php echo $product['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>">
		<?php echo $_SESSION['message'] . "\n"; ?>
	</div>
<?php endif; ?>

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

<?php include(FOOTER_TEMPLATE); ?>
