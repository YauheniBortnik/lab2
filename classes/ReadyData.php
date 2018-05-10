<?php
include_once('Films.php');
include('AcquisitionData.php');
include('GettingData.php');


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
        $a = new GettingData();
        $a->getFilms();
        $this->films = json_decode(file_get_contents('cache/file.txt'), true);
        $this->result = $this->films['results'];
        return $this->result;
        //print_r($this->result);
    }

    public function acquisitionGenres()
    {
        $b = new GettingData();
        $b->getGenres();
        $this->filmsGenres = json_decode(file_get_contents('cache/file1.txt'), true);
        $this->result1 = $this->filmsGenres['genres'];
        return $this->result1;
    }
}



