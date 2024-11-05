<?php 
	include("functions.php"); 
	add();
	include(HEADER_TEMPLATE); 
?>

<h2 class="mt-2">Novo Cliente</h2>

<form action="add.php" method="post">
  <!-- área de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" class="form-control" maxlength="50" name="usuario[nome]" required>
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Login</label>
      <input type="text" class="form-control" maxlength="50" name="usuario[user]" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Senha</label>
      <input type="password" class="form-control" maxlength="50" name="usuario[password]" required>
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
