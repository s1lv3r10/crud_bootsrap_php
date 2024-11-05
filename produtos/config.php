<?php

	include("../config.php");
	include(DBAPI);

	$products = null;
	$product = null;

	/**
	 *  Listagem de Produtos
	 */
	function index() {
		global $products;
		$products = find_all('tabeladados');
	}