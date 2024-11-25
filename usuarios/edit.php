<?php 
	include("functions.php");
	if(!isset($_SESSION)) session_start();
	if(isset($_SESSION['user'])){
		if($_SESSION['user']!="admin"){
			$_SESSION['message']="Você precisa ser um adm para ver essa página";
			$_SESSION['type']="danger";
			header("Location:" . BASEURL . "index.php");
			}
		} else {
			$_SESSION['message']="Você precisa estar logado e ser adm para acessar esse recurso";
			$_SESSION['type']="danger";
			header("Location:" . BASEURL . "index.php");
		}	
	edit();
	include(HEADER_TEMPLATE); ?>

			<h2 class="mt-3">Atualizar Usuário</h2>
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

			<form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data">
			  <!-- área de campos do form -->
			  <hr />
			  <div class="row">
				<div class="form-group col-md-7">
				  <label for="name">Nome</label>
				  <input type="text" class="form-control" maxlength="50" name="usuario[nome]" value="<?php echo $usuario['nome']; ?>">
				</div>

				<div class="form-group col-md-3">
				  <label for="campo2">Login</label>
				  <input type="text" class="form-control" maxlength="50" name="usuario[user]" value="<?php echo $usuario['user']; ?>">
				</div>

				<div class="form-group col-md-2">
				  <label for="campo3">Senha</label>
				  <input type="password" class="form-control" maxlength="50" name="usuario[password]"value="<?php echo $usuario['password']; ?>">
				</div>

				<div class="row">
					<?php 
						$foto = "";
						if (empty ($usuario['foto'])){
							$foto = "SemImagem.png";
						} else {
							$foto = $usuario['foto'];
						}
					?>
					<div class="form-group col-md-6">
					  <label for="foto">Imagem</label>
					  <input type="file" class="form-control" id="foto" name="foto" value="fotos/<?php echo $foto?>" enctype="multipart/form-data">
					</div>
					<div class="form-group col-md-12 mt-2">
						<label for="imgPreview">Pré-Vizualização:</label>
						<img src="fotos/<?php echo $foto?>" id="imgPreview" class="shadow p-1 mb-1 bg-body rounded" width="170px">
					</div>
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
		$("#foto").change(function () {
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