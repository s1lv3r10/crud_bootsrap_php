<<<<<<< HEAD
<?php

	/** O nome do banco de dados*/
	define('DB_NAME', 'banconote');

	/** Usuário do banco de dados MySQL */
	define('DB_USER', 'root');

	/** Senha do banco de dados MySQL */
	define('DB_PASSWORD', '');

	/** nome do host do MySQL */
	define('DB_HOST', '127.0.0.1');

	/** caminho absoluto para a pasta do sistema **/
	if ( !defined('ABSPATH') )
		define('ABSPATH', dirname(__FILE__) . '/');
		
	/** caminho no server para o sistema **/
	if ( !defined('BASEURL') )
		define('BASEURL', '/crud_bootstrap_php/');
		
	/** caminho do arquivo de banco de dados **/
	if ( !defined('DBAPI') )
		define('DBAPI', ABSPATH . 'inc/database.php');
	
	/** caminhos dos templates de header e footer **/
	define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
	define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
=======
<?php

	/** O nome do banco de dados*/
	define('DB_NAME', 'banconote');

	/** Usuário do banco de dados MySQL */
	define('DB_USER', 'root');

	/** Senha do banco de dados MySQL */
	define('DB_PASSWORD', '');

	/** nome do host do MySQL */
	define('DB_HOST', 'localhost');

	/** caminho absoluto para a pasta do sistema **/
	if ( !defined('ABSPATH') )
		define('ABSPATH', dirname(__FILE__) . '/');
		
	/** caminho no server para o sistema **/
	if ( !defined('BASEURL') )
		define('BASEURL', '/crud_bootstrap_php/');
		
	/** caminho do arquivo de banco de dados **/
	if ( !defined('DBAPI') )
		define('DBAPI', ABSPATH . 'inc/database.php');
	
	/** caminhos dos templates de header e footer **/
	define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
	define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
>>>>>>> 959a0039c56e0d773ea714e1e145db9a7d0c81e3
?>