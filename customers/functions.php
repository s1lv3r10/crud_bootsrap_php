<?php

	include("../config.php");
	include(DBAPI);

	$customers = null;
	$customer = null;

	/**
	 *  Listagem de Clientes
	 */
	function index() {
		global $customers;
		$customers = find_all('customers');
		if(!empty($_POST['clientes'])){
			$products=filter("custormers","marca like '%".$_POST['clientes']."%'");
		} else {
			$products=find_all("customers");
		}
	}
	
	/**
	 *  Cadastro de Clientes
	 */
	function add() {
		if (!empty($_POST['customer'])) {
			$today = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));

			$customer = $_POST['customer'];
			$customer['created'] = $today->format("Y-m-d H:i:s");

			// Certifique-se de que a função save() esteja correta e insira os dados no banco
			if (save("customers", $customer)) {
				// Mensagem de sucesso (opcional)
				$_SESSION['message'] = "Cliente adicionado com sucesso!";
				$_SESSION['type'] = "success";
			} else {
				// Mensagem de erro (opcional)
				$_SESSION['message'] = "Erro ao adicionar cliente!";
				$_SESSION['type'] = "danger";
			}

			header("location: index.php");
			exit;
		}
	}
	function formatarCpfCnpj($numero) {
		// Remove qualquer caractere não numérico
		$numero = preg_replace('/\D/', '', $numero);

		// Verifica se é CPF ou CNPJ
		if (strlen($numero) === 11) {
			// Formata como CPF: XXX.XXX.XXX-XX
			return substr($numero, 0,3).'.'.substr($numero, 3,3).'.'.substr($numero, 6,3).'-'.substr($numero, 9,2);
		} elseif (strlen($numero) === 14) {
			// Formata como CNPJ: XX.XXX.XXX/XXXX-XX
			return substr($numero, 0,2).'.'.substr($numero, 2,3).'.'.substr($numero, 5,3).'/'.substr($numero, 8,4).'-'.substr($numero,12,2);
		} else {
			return 'Número inválido';
		}
	}

	function edit() {

		$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

		if (isset($_GET['id'])) {

			$id = $_GET['id'];

			if (isset($_POST['customer'])) {

				$customer = $_POST['customer'];
				$customer['modified'] = $now->format("Y-m-d H:i:s");

				update('customers', $id, $customer);
				header('location: index.php');
			} else {

				global $customer;
				$customer = find('customers', $id);
			} 
		} else {
			header('location: index.php');
		}
	}

/**
		*  Exclusão de um Cliente
		*/
	function delete($id = null) {
		
		global $customer;
		$customer = remove('customers', $id);

		header('location: index.php');
	}

	/**
	 *  Visualização de um Cliente
	 */
	function view($id = null) {
		
	  global $customer;
	  $customer = find('customers', $id);
	}
	function formatadata($data, $formato = 'd/m/Y') {
		$date = date_create($data); 
		return $date ? date_format($date, $formato) : 'Data inválida';
	}
	function telefone($numero) {
		// Remove caracteres não numéricos
		$numero = preg_replace('/\D/', '', $numero);
		
		// Verifica se o número tem 10 ou 11 dígitos
		if (strlen($numero) === 10) {
			// Formato: (XX) XXXX-XXXX
			return '(' . substr($numero, 0, 2) . ') ' . substr($numero, 2, 4) . '-' . substr($numero, 6, 4);
		} elseif (strlen($numero) === 11) {
			// Formato: (XX) XXXXX-XXXX
			return '(' . substr($numero, 0, 2) . ') ' . substr($numero, 2, 5) . '-' . substr($numero, 7, 4);
		} else {
			return 'Número inválido';
		}
	 	
	}
	function formatacep($cep) {
		return substr($cep, 0,5).'-'.substr($cep,5,3);
	}
?>