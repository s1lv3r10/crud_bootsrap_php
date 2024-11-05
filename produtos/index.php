<?php
    include("functions.php");
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header class="mt-2">
    <div class="row">
        <div class="col-sm-6">
            <h2>Produtos</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-secondary" href="add.php"><i class="fa fa-laptop-medical"></i> Novo Produto</a>
            <a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php //clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
			<th>Foto</th>
            <th>Código</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Atualizado em</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($products) : ?>
    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
			<td>
				<?php if ($product['imagem'] != null) : ?>
					<img src="../imagens/<?php echo $product['imagem']; ?>" alt="Imagem do produto" class="shadow p-1 mb-1 bg-body rounded" width="100px">
				<?php else : ?>
					<img src="../imagens/SemImagem.png" class="shadow p-1 mb-1 bg-body rounded" width="100px">
				<?php endif; ?>
			</td>
            <td><?php echo $product['codigo']; ?></td>
            <td><?php echo $product['marca']; ?></td>
            <td><?php echo $product['modelo']; ?></td>         
            <?php 
                // Convertendo a data de modificação
                if (!empty($product['modificado'])) {
                    $modificado = new DateTime($product['modificado'], new DateTimeZone("America/Sao_Paulo"));
                    $modificado_formatado = $modificado->format("d/m/Y H:i");
                } else {
                    $modificado_formatado = 'Não disponível';
                }
            ?>
            <td><?php echo $modificado_formatado; ?></td>
            <td class="actions text-right">
                <a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
                <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i> Editar</a>
                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal-note" data-product="<?php echo $product['id']; ?>">
					<i class="fa fa-trash"></i> Excluir
				</a>    


            </td>
        </tr>
    <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="7">Nenhum registro encontrado.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php include("modal.php"); ?>

<?php include(FOOTER_TEMPLATE); ?>
