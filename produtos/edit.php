<?php 
	include("functions.php"); 
	edit();
	include(HEADER_TEMPLATE); 
?>

<h2 class="mt-2">Atualizar Produto</h2>

<form action="edit.php?id=<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data">
  <!-- área de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="codigo">Código</label>
      <input type="number" class="form-control" name="product['codigo']" value="<?php echo $product['codigo']; ?>" required>
    </div>

    <div class="form-group col-md-4">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="product['marca']" value="<?php echo $product['marca']; ?>" required>
    </div>

    <div class="form-group col-md-5">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="product['modelo']" value="<?php echo $product['modelo']; ?>" required>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="tamanho">Tamanho</label>
      <input type="number" step="0.1" class="form-control" name="product['tamanho']" value="<?php echo $product['tamanho']; ?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="data">Data</label>
      <input type="date" class="form-control" name="product['data']" value="<?php echo $product['data']; ?>" required>
    </div>

    <div class="form-group col-md-6">
      <label for="imagem">Imagem</label>
      <input type="file" class="form-control" name="product['imagem']">
      <p>Arquivo atual: <?php echo $product['imagem']; ?></p>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="modificado">Última Modificação</label>
      <input type="text" class="form-control" name="product['modificado']" value="<?php echo $product['modificado']; ?>" disabled>
    </div>
  </div>

  <div id="actions" class="row">
    <div class="col-md-12 mt-2">
      <button type="submit" class="btn btn-secondary"> <i class="fa-solid fa-sd-card"></i> Salvar</button>
      <a href="index.php" class="btn btn-light"> <i class="fa-solid fa-ban"></i> Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
