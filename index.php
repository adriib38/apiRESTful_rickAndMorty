<?php

    $endpoint = 'https://rickandmortyapi.com/api/character/?name='.$_GET['personaje'].'';
    $data = file_get_contents($endpoint);
    $data = json_decode($data);
    $data = $data->results;
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El blog del Squancheador</title>
    <link rel="stylesheet" href="style/style.css">
</head>
    <body>
        <?php include('inc/cabecera.inc.php'); ?>

        <div id="cards-projects">
            <?php foreach($data as $character){ ?>

                <div id="<?=$character->name ?>" class="project-card" data-aos="flip-up">
                    <img src="<?=$character->image ?>" title="EcoMapsValència" width="270px">
                    <div class="card-body">
                        <h5><?=$character->name ?></h5>
                    </div>
                    <a href='personaje.php?id=<?=$character->id ?>' target="_blank" title=''>
                        Ver más
                    </a>
                </div>

      
            <?php } ?>
        </div>
    </body>
</html>