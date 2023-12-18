<?php

namespace models;

class Book
{

    private $title;
    private $author;
    private $genre;
    private $description;
    private $publication_year;
    private $total_copies;
    private $available_copies;

    /**
     * @param $title
     * @param $author
     * @param $genre
     * @param $description
     * @param $publication_year
     * @param $total_copies
     * @param $available_copies
     */
    
    public function __construct($title, $author, $genre, $description, $publication_year, $total_copies, $available_copies)
    {
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->description = $description;
        $this->publication_year = $publication_year;
        $this->total_copies = $total_copies;
        $this->available_copies = $available_copies;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPublicationYear()
    {
        return $this->publication_year;
    }

    /**
     * @param mixed $publication_year
     */
    public function setPublicationYear($publication_year)
    {
        $this->publication_year = $publication_year;
    }

    /**
     * @return mixed
     */
    public function getTotalCopies()
    {
        return $this->total_copies;
    }

    /**
     * @param mixed $total_copies
     */
    public function setTotalCopies($total_copies)
    {
        $this->total_copies = $total_copies;
    }

    /**
     * @return mixed
     */
    public function getAvailableCopies()
    {
        return $this->available_copies;
    }

    /**
     * @param mixed $available_copies
     */
    public function setAvailableCopies($available_copies)
    {
        $this->available_copies = $available_copies;
    }





}