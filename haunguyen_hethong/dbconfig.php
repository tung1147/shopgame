<?php 
//
//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');    // DB username
//define('DB_PASSWORD', '');    // DB password
//define('DB_DATABASE', 'gameshop');      // DB name
//$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
//$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
//mysql_query("set names 'utf8'",$connection);
//
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'rlraigan_tungtd');    // DB username
define('DB_PASSWORD', 'Zokykaka1');    // DB password
define('DB_DATABASE', 'rlraigan_gameshop');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
mysql_query("set names 'utf8'",$connection);


?>