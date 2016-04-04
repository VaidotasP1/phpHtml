<?php
include 'db_connection.php';
$i=1;
$sql="SELECT `Books`.`bookId`,`Books`.`title`,`BooksGenres`.`genre`,`Books`.`year`, GROUP_CONCAT(`Authors`.`name`) AS `bookAuthors` "
." FROM `Books`"
."JOIN `BooksMap` ON `BooksMap`.`bookId`=`Books`.`bookId`"
."JOIN `Authors` ON `Authors`.`authorId`=`BooksMap`.`authorId`"
."LEFT JOIN `BooksGenres` ON `BooksGenres`.`genreId`=`Books`.`genreId`"
."GROUP BY `BooksMap`.`bookId`";
?>
<!DOCTYPE html>
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
    if($r=mysqli_query($connection,$sql)){
        while ($books=mysqli_fetch_object($r))
        {
    ?>
    <tr>
        <td><?php echo $i; ?> </td>
        <td><a href="book.php?bookId=<?php echo $books->bookId; ?>"><?php echo $books->title; ?></a>  </td>
        <td><?php echo $books->bookAuthors; ?> </td>
        <td><?php echo $books->genre;  ?> </td>
        <td><?php echo $books->year;  ?> </td>
    </tr>
    <?php
            $i++;
        }
//    // Free result set
        mysqli_free_result($r);
    }
    ?>
</table>
</body>
</html>
