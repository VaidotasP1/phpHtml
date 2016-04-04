<?php
require_once('settings.php');
$connection = mysqli_connect(SQL_HOST,SQL_USER,SQL_PASSWORD,SQL_DB);

if (!$connection)
{
die('Neprisijungta : ' . mysqli_connect_error());
}
mysqli_set_charset($connection,"utf8");

?>