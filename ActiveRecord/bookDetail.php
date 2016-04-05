<?php
include 'Book.php';
$bookId = null;

if (isset($_GET['bookId']) && $_GET['bookId'] !== false) {
    $bookId = (integer) $_GET['bookId'];
}
$bookId=4;
$books=new Book();
$books->load($bookId);

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

            <tr>
                <td align="right" width="180">Book name:</td>
                <td align="left"><?php echo $books->getTitle(); ?></td>
            </tr>
            <tr>
                <td align="right">Book authors:</td>
                <td align="left"><?php echo $books->getAuthor(); ?></td>
            </tr>
            <tr>
                <td align="right">Book genre:</td>
                <td align="left"><?php echo $books->getGenre(); ?></td>
            </tr>
            <tr>
                <td align="right">Rekease year:</td>
                <td align="left"><?php echo $books->getYear(); ?>y.</td>
            </tr>
</table>
</body>
</html>
