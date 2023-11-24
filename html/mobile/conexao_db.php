<?php

// Abre uma conexao com o BD.

$host        = "host = silly.db.elephantsql.com;";
$dbname      = "dbname = pooicvjw;";
$dbuser 	 = "pooicvjw";
$dbpassword	 = "N6d1EaH1tQzgx8kQ5m_G_7uJYrZqT6Cq";
// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('pgsql:' . $host . $dbname, $dbuser, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>