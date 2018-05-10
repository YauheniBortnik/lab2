<?php
include('GetData.php');

class GettingData implements GetData
{
    public $filmData;
    public $filmss;
    public $genreData;
    public $genress;

    public function getFilms()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/now_playing?page=1&region=RU&language=ru-RU&api_key=d8398524e35e409bc8bbe910fb0ecdec",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if (!empty($err)) {
            echo "cURL Error #:" . $err;
        } else {
            $this->filmData = file_put_contents("cache/file.txt", $response);
        }
        $this->filmss = json_decode(file_get_contents('cache/file.txt'), true);
    }

    public function getGenres()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?api_key=d8398524e35e409bc8bbe910fb0ecdec&language=ru",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if (!empty($err)) {
            echo "cURL Error #:" . $err;
        } else {
            $this->genreData = file_put_contents("cache/file1.txt", $response);
        }
        $this->genress = json_decode(file_get_contents('cache/file1.txt'), true);
    }

}
