<?php
include('classes/ReadyData.php');
$makingData = new ReadyData();
$result1 = $makingData->acquisitionGenres();
$result = $makingData->acquisitionFilms();
$filmArray = [];
$genreArray = [];
for ($i = 0; $i < count($result); $i++) {
    array_push($filmArray, new Films($result[$i]['id'], $result[$i]['title'], $result[$i]['original_title'], $result[$i]['poster_path'], $result[$i]['overview'], $result[$i]['release_date'], $result[$i]['genre_ids']));
    $filmArray[$i]->setFilmGenre($result1);
}

















