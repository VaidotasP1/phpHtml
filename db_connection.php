<?php
// duomenu bazes nustatymai
define('SQL_HOST','localhost');
define('SQL_DB','Books');
define('SQL_USER','root');
define('SQL_PASSWORD','root');

$connection = mysqli_connect(SQL_HOST,SQL_USER,SQL_PASSWORD,SQL_DB);

if (!$connection)
{
die('Neprisijungta : ' . mysqli_connect_error());
}
mysqli_set_charset($connection,"utf8");

?>