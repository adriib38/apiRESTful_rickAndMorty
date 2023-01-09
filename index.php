<?php
    $pagina = 1;
    if(!isset($_GET['page'])){
        $pagina = 1;
    }else{
        $pagina = $_GET['page'];
    } 

    if(isset($_GET['name'])){
        $endpoint = 'https://rickandmortyapi.com/api/character/?name='.$_GET['name'].'&page='.$pagina.'';
    }else{
        $endpoint = 'https://rickandmortyapi.com/api/character';
    }

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

        <div>
            <?php 
            if(isset($_GET['page'])){
                $pagina = $_GET['page'] + 1;
            }else{
                $pagina = 1;
            }

            echo '<a href="/apiRestFul_rym_AdrianBenitez/index.php?name='.$_GET['name'].'&page='.$pagina.'">Siguiente página</a>';
            
            ?>
        </div>

        <div>
            <?php 
            if(isset($_GET['page'])){
                if($pagina >= 2){
                    $pagina = $_GET['page'] - 1;
                }  
            }else{
                $pagina = 0;
            }
                echo '<a href="/apiRestFul_rym_AdrianBenitez/index.php?name='.$_GET['name'].'&page='.$pagina.'">Anterior página</a>';
            ?>
        </div>

        <div id="cards-projects">
            <?php foreach($data as $character){ ?>

                <div id="<?=$character->name ?>" class="project-card" data-aos="flip-up">
                    <img src="<?=$character->image ?>" width="270px">
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