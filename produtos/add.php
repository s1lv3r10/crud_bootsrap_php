<?php 
	include("functions.php"); 
	add();
	include(HEADER_TEMPLATE); 
?>

<h2 class="mt-2">Novo Produto</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <!-- área de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="codigo">Código</label>
      <input type="number" class="form-control" name="codigo" required>
    </div>

    <div class="form-group col-md-4">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" name="marca" required>
    </div>

    <div class="form-group col-md-5">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" name="modelo" required>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-3">
      <label for="tamanho">Tamanho</label>
      <input type="number" step="0.1" class="form-control" name="tamanho" required>
    </div>

    <div class="form-group col-md-3">
      <label for="data">Data da compra</label>
      <input type="date" class="form-control" name="data" required>
    </div>

    <div class="form-group col-md-6">
      <label for="imagem">Imagem</label>
      <input type="file" class="form-control" name="imagem" required>
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
