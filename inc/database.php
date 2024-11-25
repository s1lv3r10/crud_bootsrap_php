<?php

	mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);

	// Função para abrir a conexão com o banco de dados
	function open_database() {
		try {
			$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$conn->set_charset("utf8");
			return $conn;
		} catch (Exception $e) {
			echo "<h2>Aconteceu um erro: <br>" . $e->getMessage() . "</h2>\n";
			return null;
		}
	}

	// Função para fechar a conexão com o banco de dados
	function close_database($conn) {
		try {
			$conn->close();
		} catch (Exception $e) {
			echo "<h2>Aconteceu um erro: <br>" . $e->getMessage() . "</h2>\n";
		}
	}

	/**
	 *  Pesquisa um registro pelo ID em qualquer tabela
	 */
	function find($table, $id = null) {
		$database = open_database();
		$found = null;

		try {
			if ($id) {
				$sql = "SELECT * FROM " . $table . " WHERE id = " . intval($id);
				$result = $database->query($sql);

				if ($result->num_rows > 0) {
					$found = $result->fetch_assoc();
				}
			} else {
				$sql = "SELECT * FROM " . $table;
				$result = $database->query($sql);

				if ($result->num_rows > 0) {
					$found = array();
					while ($row = $result->fetch_assoc()) {
						array_push($found, $row);
					} 
				}
			}
		} catch (Exception $e) {
			$_SESSION['message'] = $e->getMessage();
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
		return $found;
	}

	/**
	 *  Insere um registro em qualquer tabela
	 */
	function save($table, $data) {
		$database = open_database();

		$columns = null;
		$values = null;

		foreach ($data as $key => $value) {
			$columns .= "`" . trim($key) . "`,";
			$values .= "'" . $database->real_escape_string($value) . "',";
		}

		// Remove a última vírgula
		$columns = rtrim($columns, ',');
		$values = rtrim($values, ',');

		$sql = "INSERT INTO " . $table . " ($columns) VALUES ($values);";

		try {
			$database->query($sql);

			$_SESSION['message'] = 'Registro cadastrado com sucesso.';
			$_SESSION['type'] = 'success';

		} catch (Exception $e) { 
			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		} 

		close_database($database);
	}

	/**
	 *  Atualiza um registro em qualquer tabela pelo ID
	 */
	function update($table, $id, $data) {
		$database = open_database();
		$items = null;

		foreach ($data as $key => $value) {
			$items .= "`" . trim($key) . "` = '" . $database->real_escape_string($value) . "',";
		}

		// Remove a última vírgula
		$items = rtrim($items, ',');

		$sql  = "UPDATE " . $table;
		$sql .= " SET $items";
		$sql .= " WHERE id = " . intval($id) . ";";

		try {
			$database->query($sql);

			$_SESSION['message'] = 'Registro atualizado com sucesso.';
			$_SESSION['type'] = 'success';

		} catch (Exception $e) { 
			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		} 

		close_database($database);
	}

	/**
	 *  Remove um registro de qualquer tabela pelo ID
	 */
	function remove($table, $id) {
		$database = open_database();

		try {
			if ($id) {
				$sql = "DELETE FROM " . $table . " WHERE id = " . intval($id);
				$result = $database->query($sql);

				if ($result) {   	
					//$_SESSION['message'] = "Registro removido com sucesso.";
					//$_SESSION['type'] = 'success';
					header('Location: ' . BASEURL . 'index.php');
				}
			}
		} catch (Exception $e) { 
			$_SESSION['message'] = $e->getMessage();
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
	}

	/**
	 *  Pesquisa todos os registros de qualquer tabela
	 */
	function find_all($table) {
		return find($table);
	}
	
	/**
 * Pesquisa registros pelo parâmetro $p que foi passado
 */
function filter( $table = null, $p = null ) {
    $database = open_database();
    $found = null;

    try {
        if ($p) {
            $sql = "SELECT * FROM " . $table . " WHERE " . $p;
            $result = $database->query($sql);
            if ($result->num_rows > 0) {
                $found = array();
                while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                }
            } else {
                throw new Exception("Não foram encontrados registros de dados!");
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
        $_SESSION['type'] = "danger";
    }

    close_database($database);
    return $found;
}

//função para limpar mensagens
function clear_messages(){
	$_SESSION['message']=null;
	$_SESSION['type']=null;
}


?>
