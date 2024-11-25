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

<h2 class="mt-3">Cliente <?php echo $customer['id']; ?></h2>
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
	<dt>Nome / Razão Social:</dt>
	<dd><?php echo $customer['name']; ?></dd>

	<dt>CPF / CNPJ:</dt>
	<dd><?php echo $customer['cpf_cnpj']; ?></dd>

	<dt>Data de Nascimento:</dt>
	<dd><?php echo formatadata($customer['birthdate'], "d/m/Y"); ?></dd>

	<dt>Endereço:</dt>
	<dd><?php echo $customer['address']; ?></dd>

	<dt>Bairro:</dt>
	<dd><?php echo $customer['hood']; ?></dd>

	<dt>CEP: </dt>
	<dd><?php echo formatacep($customer['zip_code']); ?></dd>

	<dt>Data de Cadastro:</dt>
	<dd><?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?></dd>
	
	<dt>Última Modificação:</dt>
    <dd><?php echo $customer['modified'] === '0000-00-00 00:00:00' ? 'Não alterado' : formatadata($customer['modified'], "d/m/Y H:i:s"); ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Cidade:</dt>
	<dd><?php echo $customer['city']; ?></dd>

	<dt>Telefone:</dt>
	<dd><?php echo telefone($customer['phone']); ?></dd>

	<dt>Celular:</dt>
	<dd><?php echo telefone($customer['mobile']); ?></dd>

	<dt>UF:</dt>
	<dd><?php echo $customer['state']; ?></dd>

	<dt>Inscrição Estadual:</dt>
	<dd><?php echo number_format($customer['ie'], 0,",","."); ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-secondary">
	    <i class="fa-solid fa-pen-to-square"></i> Editar
	  </a>
	  <a href="index.php" class="btn btn-light">
	    <i class="fa-solid fa-arrow-rotate-left"></i> Voltar
	  </a>
	</div>
</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
