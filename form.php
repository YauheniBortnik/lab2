<?php
include('header.php');
$count = count($filmArray);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div id="form_block">
    <form id="main_form" method="POST" action="action.php">
        Показать фильмы с датой выхода не более 7 дней?
        <input type="checkbox" name="validDate" value="Yes"/>
        <input type="submit" value="List" name="list_btn" class="btn">
    </form>
    <form id="query_form" method="POST" action="query.php">
        <input type="submit" value="Query" name="query_btn" class="btn">
    </form>
</div>
<table cellpadding="5" cellspacing="0" border="1" align="center" id="main_table">
    <tr bgcolor="aqua">
        <td class="headline" width="200px">Название фильма</td>
        <td class="headline">Оригинальное название фильма</td>
        <td class="headline">Постер</td>
        <td class="headline" width="600px">Обзор</td>
        <td class="headline">Продолжительность фильма</td>
        <td class="headline">Дата релиза</td>
        <td class="headline">Жанр</td>
    </tr>
    <?php if (isset($_POST['validDate']) && $_POST['validDate'] == 'Yes') {
        for ($i = 0; $i < $count; $i++) {
            $todayDate = date_create();
            $filmRelease = date_create($filmArray[$i]->releaseDate);
            $week = date_diff($todayDate, $filmRelease);
            if ($week->m == 0 && $week->d <= 7) {
                ?>
                <tr>
                <td class="headline" bgcolor="#7fffd4" width="200px"><?php echo $filmArray[$i]->title; ?></td>
                <td class="headline" bgcolor="#ff7f50"><?php echo $filmArray[$i]->origTitle; ?></td>
                <td bgcolor="#a9a9a9"><img src='<?php echo "pictures/img$i.jpg"; ?>'></td>
                <td bgcolor="#fffaf0" width="600px"><?php echo $filmArray[$i]->overview; ?></td>
                <td class="headline" bgcolor="olive"><?php echo $filmArray[$i]->runTime; ?></td>
                <td class="headline" bgcolor="#da70d6"><?php echo $filmArray[$i]->releaseDate; ?></td>
                <td class="headline" bgcolor="yellow"><?php echo $filmArray[$i]->genre; ?></td></tr><?php
            }
        }
    } else {
        for ($i = 0; $i < $count; $i++) {
            ?>
            <tr>
            <td class="headline" bgcolor="#7fffd4" width="200px"><?php echo $filmArray[$i]->title; ?></td>
            <td class="headline" bgcolor="#ff7f50"><?php echo $filmArray[$i]->origTitle; ?></td>
            <td bgcolor="#a9a9a9"><img src='<?php echo "pictures/img$i.jpg"; ?>'></td>
            <td bgcolor="#fffaf0" width="600px"><?php echo $filmArray[$i]->overview; ?></td>
            <td class="headline" bgcolor="olive"><?php echo $filmArray[$i]->runTime; ?></td>
            <td class="headline" bgcolor="#da70d6"><?php echo $filmArray[$i]->releaseDate; ?></td>
            <td class="headline" bgcolor="yellow"><?php echo $filmArray[$i]->genre; ?></td></tr><?php
        }
    } ?>
</table>
</body>

