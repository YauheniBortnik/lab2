<?php
if (isset($argv) == true || $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($argv) == true || $_POST['query_btn']) {
        if (isset($argv) == true) {
            echo "update \n";
        }
        if (file_exists('file.txt') == true && file_exists('file1.txt') == true) {
            unlink('file.txt');
            unlink('file1.txt');
        }
        if (file_exists('./images/') == true) {
            foreach (glob('./pictures/*') as $document) {
                unlink($document);
            }
        }
        include "makingData.php";
        for ($i = 0; $i < count($filmArray); $i++) {
            if (!file_exists("./images/img" . $i . ".jpg") == true) {
                $pictures = file_get_contents('https://image.tmdb.org/t/p/w400' . $filmArray[$i]->poster);
                file_put_contents("./pictures/img" . $i . ".jpg", $pictures);
            }
        }
        if (isset($argv) === true) {
            echo "updated \n";
        } else {
            include "form.php";
        }
    }
}