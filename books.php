<?php
include 'db_connection.php';

$sql="SELECT * FROM `Books`";
if($r=mysqli_query($connection,$sql)){
    while ($books=mysqli_fetch_object($r))
    {
        print_r($books);

    }
//    // Free result set
    mysqli_free_result($r);
}

?>