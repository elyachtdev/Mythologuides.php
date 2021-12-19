<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['role'] == 1){
    include './dbLauncher.php';
    include './dbManager.php';
    if (!empty($_GET['error'])) {
        $error = explode("-", $_GET['error']);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créez votre article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="https://img2.freepng.fr/20180510/hie/kisspng-medusa-perseus-gorgon-greek-mythology-zeus-5af3da614c23d0.0900227115259305933119.jpg" />
    <script src="https://cdn.tiny.cloud/1/i9vg90bomoznyt4eicko1poif0ypctg6m1ts5d5tumwiwlmf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="./assets/js/articlesCreationTiny.js"></script>
</head>
<body>
    <?php 
    $title = "Création d'articles";
    $desc = "Créez de toutes pièces un article sur vos récits mythologiques.";
    include './header.php'; 
    ?>
    <form action="articlesCreation.php" class="requires-validation container formConnex" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
            <input class="form-control" type="text" name="title" placeholder="Titre de votre article" required>
        </div>
        <div class="col-md-12">
            <input class="form-control" type="text" name="description" placeholder="Description de votre article" required>
        </div>
        <div class="col-md-12">
            <textarea id="text" class="form-control" type="text" name="text" placeholder="Texte (possibiltié d'agrandir la zone d'écriture)"></textarea>
        </div>
        <div class="form-group">
            <label class="imgLabel" for="image">Image de l'article (format jpg/png)</label>
            <input type="file" class="form-control" required name="image">
        </div>
        <div class="form-button mt-3">
            <button id="submit" type="submit" class="btn btn-primary">Publier</button>
        </div>
    </form>
    <?php
    if (!empty($error)) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo "<p>";
            foreach ($error as $error) {
                if ($error == "format") {
                    echo " La photo doit être au format jpg ou png. </br> ";
                    exit;
                } else if ($error == "size") {
                    echo " Le fichier ne doit pas dépasser les 3 Mo. </br> ";
                }
                else if ($error == "exist") {
                    echo " L'article que vous voulez publier existe déjà.";
                }
                else if ($error == "specialC") {
                    echo " Caractères spéciaux interdit sur le nom de l'article.";
                }
            }
            echo "</p>";
            ?>
        </div>
    <?php
    } else if (!empty($_GET['add'])) {
    ?>
        <div class="alert alert-success" role="alert">
            <p>Article publié avec succès</p>
        </div>
    <?php
    }
    ?>
    <?php include './footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}?>