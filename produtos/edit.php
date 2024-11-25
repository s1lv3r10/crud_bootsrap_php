<?php 
	include("functions.php"); 
	if (!isset($_SESSION)) session_start();
	if (isset($_SESSION['user'])){
	  }
	else {
	  $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
	  $_SESSION['type'] = "danger";
	}
	edit();
	include(HEADER_TEMPLATE); 
?>

<h2 class="mt-3">Atualizar Produto</h2>

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

<form action="edit.php?id=<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data">
  <!-- área de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="codigo">Código</label>
      <input type="number" class="form-control" name="product[codigo]" value="<?php echo $product['codigo']; ?>" required>
    </div>

    <div class="form-group col-md-4">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="product[marca]" value="<?php echo $product['marca']; ?>" required>
    </div>

    <div class="form-group col-md-5">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="product[modelo]" value="<?php echo $product['modelo']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="tamanho">Tamanho</label>
      <input type="number" step="0.1" class="form-control" name="product[tamanho]" value="<?php echo $product['tamanho']; ?>" required>
    </div>

    <div class="form-group col-md-2">
      <label for="data">Data</label>
      <input type="date" class="form-control" name="product[data]" value="<?php echo $product['data']; ?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="modificado">Última Modificação</label>
      <input type="text" class="form-control" name="product[modificado]" value="<?php echo $product['modificado']; ?>" disabled>
    </div>

    <div class="form-group col-md-5">
      <label for="imagem">Imagem</label>
      <input type="file" class="form-control" id="imagem" name="product[imagem]">
      <p>Arquivo atual: <?php echo $product['imagem']; ?></p>
    </div>
    <div class="form-group col-md-12 mt-2">
			<label for="imgPreview">Pré-Vizualização:</label>
			<img src="../imagens/SemImagem.png" id="imgPreview" class="shadow p-1 mb-1 bg-body rounded" width="170px">
		</div>
  </div>

  <div class="row">
    
  </div>

  <div id="actions" class="row">
    <div class="col-md-12 mt-2">
      <button type="submit" class="btn btn-secondary"> <i class="fa-solid fa-sd-card"></i> Salvar</button>
      <a href="index.php" class="btn btn-light"> <i class="fa-solid fa-ban"></i> Cancelar</a>
    </div>
  </div>
</form>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>
<script>
	$(document).ready(() => {
		$("#imagem").change(function () {
			const file = this.files[0];
			if (file) {
				let reader = new FileReader();
				reader.onload = function (event) {
					$("#imgPreview").attr("src", event.target.result);
				};
				reader.readAsDataURL(file);
			}
		});
	});
</script>
