<?php
include 'Book.php';
/**
 * Created by PhpStorm.
 * User: vaidotas
 * Date: 16.4.5
 * Time: 17.47
 */
class BooksRepository extends Book
{
    const SQL_HOST='localhost';
    const SQL_DB='Books';
    const SQL_USER='root';
    const SQL_PASSWORD='root';

    public function getBookById($id){
        $connection = mysqli_connect(self::SQL_HOST,self::SQL_USER,self::SQL_PASSWORD,self::SQL_DB);

        if (!$connection)
        {
            die('Neprisijungta : ' . mysqli_connect_error());
        }
        mysqli_set_charset($connection,"utf8");

        $sql="SELECT `Books`.`bookId`,`Books`.`title`,`BooksGenres`.`genre`,`Books`.`year`, GROUP_CONCAT(`Authors`.`name`) AS `bookAuthors` "
            ." FROM `Books` "
            ."JOIN `BooksMap` ON `BooksMap`.`bookId`=`Books`.`bookId` "
            ."JOIN `Authors` ON `Authors`.`authorId`=`BooksMap`.`authorId` "
            ."LEFT JOIN `BooksGenres` ON `BooksGenres`.`genreId`=`Books`.`genreId` ";
        if($id)
            $sql.="WHERE `Books`.`bookId`=$id ";
        $sql.="GROUP BY `BooksMap`.`bookId`";
        if($r=mysqli_query($connection,$sql)){
            $books=mysqli_fetch_object($r);
            $this->setAuthor($books->bookAuthors);
            $this->setTitle($books->title);
            $this->setYear($books->year);
            $this->setBookId($books->bookId);
            $this->setGenre($books->genre);

        }
    }
    public function getBookList(){
        $connection = mysqli_connect(self::SQL_HOST,self::SQL_USER,self::SQL_PASSWORD,self::SQL_DB);
        $list=array();
        if (!$connection)
        {
            die('Neprisijungta : ' . mysqli_connect_error());
        }
        mysqli_set_charset($connection,"utf8");

        $sql="SELECT `Books`.`bookId`,`Books`.`title`,`BooksGenres`.`genre`,`Books`.`year`, GROUP_CONCAT(`Authors`.`name`) AS `bookAuthors` "
            ." FROM `Books` "
            ."JOIN `BooksMap` ON `BooksMap`.`bookId`=`Books`.`bookId` "
            ."JOIN `Authors` ON `Authors`.`authorId`=`BooksMap`.`authorId` "
            ."LEFT JOIN `BooksGenres` ON `BooksGenres`.`genreId`=`Books`.`genreId` "
            ."GROUP BY `BooksMap`.`bookId`";
        if($r=mysqli_query($connection,$sql)){
            while ($books=mysqli_fetch_object($r)) {
                $book=new Book();
                $book->setAuthor($books->bookAuthors);
                $book->setTitle($books->title);
                $book->setYear($books->year);
                $book->setBookId($books->bookId);
                $book->setGenre($books->genre);
                $list[]=$book;
            }
        }
        return (array)$list;
    }

}