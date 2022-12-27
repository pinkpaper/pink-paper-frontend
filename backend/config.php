<?php 
// live server
// $servertype = "mysql"; // mysql, pgsql
// $servername = "localhost";
// $serverport = 3306; // mysql: 3306, pgsql: 5432
// $username = "pink_main";
// $password = "P7lPdzlLkUZY";
// $dbname = "pink_main";
// $tablename = "metamask_login";

// local server

$servertype = "mysql"; // mysql, pgsql
$servername = "localhost";
$serverport = 3306; // mysql: 3306, pgsql: 5432
$username = "root";
$password = "";
$dbname = "blog_cms_new";
$tablename = "metamask_login";

try {
        if ($servertype == "pgsql") {
                $dsn = "pgsql:host=$servername;port=$serverport;dbname=$dbname;";
        } elseif ($servertype == "mysql") {
                $dsn = "mysql:host=$servername;port=$serverport;dbname=$dbname;";
        } else {
                die ('DB config error');
        }
        $conn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
        die($e->getMessage());
}
