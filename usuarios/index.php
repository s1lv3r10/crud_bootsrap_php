<?php
	require('functions.php');
	if(!isset($_SESSION)) session_start();
	if(isset($_SESSION['user'])){
		if($_SESSION['user']!="admin"){
			$_SESSION['message']="Você precisa ser um adm para ver essa página";
			$_SESSION['type']="danger";
			}
		} else {
			$_SESSION['message']="Você precisa estar logado e ser adm para acessar esse recurso";
			$_SESSION['type']="danger";
		}
	index();
	include(HEADER_TEMPLATE);
?>

			<header class="mt-3">
				<div class="row">
					<div class="col-sm-6">
						<h2>Usuários</h2>
					</div>
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
					<div class="col-sm-6 text-right h2">
						<a class="btn btn-secondary" href="add.php"><i class="fa fa-person-circle-plus"></i> Novo Usuário</a>
						<a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
					</div>
				</div>
			</header>
			
			<form name="filtro" action="index.php" method="post">
				<div>
					<div class="row">
						<div class="form-group col-mb-4">
							<div class="input-group mb-3">
								<input type="text" class="form-control" maxlength="50" name="users" required>
								<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			

			<hr>

			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th width="30%">Nome</th>
						<th>Usuário</th>
						<th>Foto</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
				<?php if ($usuarios) : ?>
				<?php foreach ($usuarios as $usuario) : ?>
					<tr>
						<td><?php echo $usuario['id']; ?></td>
						<td><?php echo $usuario['nome']; ?></td>
						<td><?php echo $usuario['user']; ?></td>
						<td><?php 
								if (!empty($usuario['foto'])){
									echo "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"100px\">";
								} else {
									echo "<img src=\"fotos/SemImagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"100px\">";
								}
							?>

						</td>
						<td class="actions text-right">
							<a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
							<a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i> Editar</a>
							<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal-user" data-usuario="<?php echo $usuario['id']; ?>">
								<i class="fa fa-trash"></i> Excluir
							</a>

						</td>
					</tr>
				<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="6">Nenhum registro encontrado.</td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>

			<?php include("modal.php"); ?>
			
			<?php endif; ?>

			<?php include(FOOTER_TEMPLATE); ?>