/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('customer');
  
  var modal = $(this);
  modal.find('.modal-title').text("Excluir Cliente: " + id);
  modal.find('.modal-body').text("Deseja excluir este cliente? ("+ id + ")");
  modal.find('#confirm').attr("href", "delete.php?id=" + id);
});
/**
 * Passa os dados do usuário para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal-user').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('usuario');
  
  var modal = $(this);
  modal.find('.modal-title').text("Excluir Usuário: " + id);
  modal.find('.modal-body').text("Deseja excluir este usuário? ("+ id + ")");
  modal.find('#confirm').attr("href", "delete.php?id=" + id);
});

/**
 * Passa os dados do produto para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal-note').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('product');
  
  var modal = $(this);
  modal.find('.modal-title').text("Excluir Produto: " + id);
  modal.find('.modal-body').text("Deseja excluir este produto? ("+ id + ")");
  modal.find('#confirm').attr("href", "delete.php?id=" + id);
});