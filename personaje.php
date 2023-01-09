<?php


    $endpoint = 'https://rickandmortyapi.com/api/character/'.$_GET['id'].'';
    $data = file_get_contents($endpoint);
    $data = json_decode($data);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje</title>
    <link rel="stylesheet" href="style/style.css">
</head>
    <body>
        <!--
            https://rickandmortyapi.com/api/character/?name=morty&page=2
        -->

        <?php include('inc/cabecera.inc.php'); ?>

        <?php
            $date = date("d-m-Y", strtotime($data->created));

            echo '<image src="'.$data->image.'">';
            echo '<h2>'.$data->name.'</h2>';
            echo '<p>'.$date.'</p>';
            echo '<p class="'.$data->status.'">Estado: '.$data->status.'<p>';

            echo '<p>Planeta: <a href="'.$data->origin->url.'">'.$data->origin->name.'</a></p>';
            echo '<p>Localidad: <a href="'.$data->location->url.'">'.$data->location->name.'</a></p>';

            echo '<h3>Episodios</h3>';
            echo '<table>';
            foreach($data->episode as $episode){
                
                echo '<tr>';
                echo '<td>'.$episode.'</td>';
                echo '</tr>';
            
            }
            echo '</table>';
        ?>
    
    </body>
</html>