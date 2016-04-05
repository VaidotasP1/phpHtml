<?php
include 'Book.php';
$i=1;
$books = new Book();
$bookList=$books->getAllBooks();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Books list</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<table border="1" style="width:100%">
    <tr>
        <th>Num.</th>
        <th>Name</th>
        <th>Authors</th>
        <th>Genre</th>
        <th>Year</th>
    </tr>
    <?php
        foreach ($bookList as $book)
        {
            /* @var Book $book*/
            ?>
            <tr>
                <td><?php echo $i; ?> </td>
                <td><a href="bookDetail.php?bookId=<?php echo $book->getBookId(); ?>"><?php echo $book->getTitle(); ?></a>  </td>
                <td><?php echo $book->getAuthor(); ?> </td>
                <td><?php echo $book->getGenre();  ?> </td>
                <td><?php echo $book->getYear();  ?> </td>
            </tr>
            <?php
            $i++;
        }
    ?>
</table>
</body>
</html>
