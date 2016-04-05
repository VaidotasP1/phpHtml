<?php

/**
 * Created by PhpStorm.
 * User: vaidotas
 * Date: 16.4.5
 * Time: 17.22
 */
class Book
{
    const SQL_HOST='localhost';
    const SQL_DB='Books';
    const SQL_USER='root';
    const SQL_PASSWORD='root';

    protected $title=NULL;
    protected $year=NULL;
    protected $genre=NULL;
    protected $bookId=NULL;
    protected $author=NULL;

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param null $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return null
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param null $genreId
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return null
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param null $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @return null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param null $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function load($id){
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

}
?>