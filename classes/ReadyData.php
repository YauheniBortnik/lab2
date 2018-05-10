<?php
include('Films.php');
include ('AcquisitionData.php');
include ('GettingData.php');


class ReadyData implements AcquisitionData
{
    public $result;
    public $result1;
    public $films;
    public $filmsGenres;
    public $filmArray = [];
    public $genreArray = [];



    public function acquisitionFilms()
    {
        $a=new GettingData();
        $a->getFilms();
        $this->films = json_decode(file_get_contents('cache/file.txt'), true);
        $this->result = $this->films['results'];
        return $this->result;
    }

    public function acquisitionGenres()
    {
        $b=new GettingData();
        $b->getGenres();
        $this->filmsGenres = json_decode(file_get_contents('cache/file1.txt'), true);
        $this->result1 = $this->filmsGenres['genres'];
        return $this->result1;
    }

    public function getFilmArray()
    {
        $this->acquisitionFilms();
        $this->acquisitionGenres();
        for ($i = 0; $i < count($this->result); $i++) {
            array_push($this->filmArray, new Films($this->result[$i]['id'], $this->result[$i]['title'], $this->result[$i]['original_title'], $this->result[$i]['poster_path'], $this->result[$i]['overview'], $this->result[$i]['release_date'], $this->result[$i]['genre_ids']));
            $this->filmArray[$i]->setFilmGenre($this->result1);
        }
        return $this->filmArray;
    }
}



