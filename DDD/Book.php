<?php

/**
 * Created by PhpStorm.
 * User: vaidotas
 * Date: 16.4.5
 * Time: 17.23
 */
class Book
{
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

}
?>