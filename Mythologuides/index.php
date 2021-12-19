<?php
session_start();
include './dbLauncher.php';
include './dbManager.php';
$data=allArticle($db);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mythologuides</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="icon" type="image/x-icon" href="https://img2.freepng.fr/20180510/hie/kisspng-medusa-perseus-gorgon-greek-mythology-zeus-5af3da614c23d0.0900227115259305933119.jpg" />
    </head>
    <body>
        <?php 
        $title = "Ma Mythologie";
        $desc = "Retrouvez tous vos articles préférés.";
        include './header.php';
        ?>
        <?php include './articlesList.php'?>
        <?php include './footer.php'?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>