<?php


class Films
{
    public $filmid;
    public $title;
    public $origTitle;
    public $poster;
    public $overview;
    public $releaseDate;
    public $genreid;
    public $genre;

    public function __construct($id, $title, $original_title, $poster_path, $overview, $release_date, $genre_ids)
    {
        $this->filmid = $id;
        $this->title = $title;
        $this->origTitle = $original_title;
        $this->poster = $poster_path;
        $this->overview = $overview;
        $this->releaseDate = $release_date;
        $this->genreid = $genre_ids;
    }

    public function setFilmGenre($film_Genre)
    {
        $filmGenre = [];
        foreach ($this->genreid as $id) {
            foreach ($film_Genre as $val) {
                if ($val['id'] == $id) {
                    array_push($filmGenre, $val['name']);
                }
            }
        }
        $this->genre = implode(', ', $filmGenre);
    }

}