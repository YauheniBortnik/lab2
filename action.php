<?php
include('classes/ReadyData.php');
$makingData = new ReadyData();
$filmArray = $makingData->GetFilmArray();
include('form.php');

