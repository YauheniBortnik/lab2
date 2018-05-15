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
    public $runTime;

    public function __construct($id, $title, $original_title, $poster_path, $overview, $release_date, $genre_ids, $runTime)
    {
        $this->filmid = $id;
        $this->title = $title;
        $this->origTitle = $original_title;
        $this->poster = $poster_path;
        $this->overview = $overview;
        $this->releaseDate = $release_date;
        $this->genreid = $genre_ids;
        $this->runTime = $runTime;
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

    public function getRunTime()
    {
        $content = file_get_contents('https://api.themoviedb.org/3/movie/' . $this->filmid .'?api_key=d8398524e35e409bc8bbe910fb0ecdec&language=ru', 0, null, null);
        $runTime = json_decode($content, true);
        $result = $runTime['runtime'];
        $this->runTime = $result;
    }

}