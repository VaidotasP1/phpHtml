<?php
include 'db_connection.php';
$bookId = null;

if (isset($_GET['bookId']) && $_GET['bookId'] !== false) {
    $bookId = (integer) $_GET['bookId'];
}
$sql="SELECT `Books`.`bookId`,`Books`.`title`,`BooksGenres`.`genre`,`Books`.`year`, GROUP_CONCAT(`Authors`.`name`) AS `bookAuthors` "
    ." FROM `Books` "
    ."JOIN `BooksMap` ON `BooksMap`.`bookId`=`Books`.`bookId` "
    ."JOIN `Authors` ON `Authors`.`authorId`=`BooksMap`.`authorId` "
    ."LEFT JOIN `BooksGenres` ON `BooksGenres`.`genreId`=`Books`.`genreId` ";
    if($bookId)
        $sql.="WHERE `Books`.`bookId`=$bookId ";
$sql.="GROUP BY `BooksMap`.`bookId`";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Book</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div align="center">
    <h2>Information about book.</h2>
</div>
<table style="font-size: 20px;">
    <?php
    if($r=mysqli_query($connection,$sql)){
        while ($books=mysqli_fetch_object($r))
        {
            ?>
            <tr>
                <td align="right" width="180">Book name:</td>
                <td align="left"><?php echo $books->title; ?></td>
            </tr>
            <tr>
                <td align="right">Book authors:</td>
                <td align="left"><?php echo $books->bookAuthors; ?></td>
            </tr>
            <tr>
                <td align="right">Book genre:</td>
                <td align="left"><?php echo $books->genre; ?></td>
            </tr>
            <tr>
                <td align="right">Rekease year:</td>
                <td align="left"><?php echo $books->year; ?>y.</td>
            </tr>
            <?php
        }
//    // Free result set
        mysqli_free_result($r);
    }
    ?>
</table>
</body>
</html>
