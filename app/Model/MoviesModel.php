<?php

namespace App\Model;

use Core\Database;

class MoviesModel
{
    private $id;
    private $movie;
    private $date;
    private $census;
    private $hall;
    private $time;


    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCensus()
    {
        return $this->census;
    }

    /**
     * @param mixed $census
     */
    public function setCensus($census)
    {
        $this->census = $census;
    }

    /**
     * @return mixed
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @param mixed $hall
     */
    public function setHall($hall)
    {
        $this->hall = $hall;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @param mixed $id
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    public function __construct()
    {
        $this->db = new Database();
    }

    public static function show()
    {
        $db = new Database();
        $db->select()->from('movies');

        return $db->getAll();
    }

    public function save()
    {
        $fields = 'movie, date, census, hall, time';
        $values = "'" .$this->movie. "','" .$this->date. "','" .$this->census. "','" .$this->hall."' ,'" .$this->time. "'";
        $this->db = new Database();
        $this->db->insert('movies', $fields, $values);
        return $this->db->get();
    }
}
