<?php
session_start();
    include './assets/dB/dbManager.php';
    include './assets/dB/dbManager.php';
    $data=oneArticle($_GET['id'], $db);
    $dataPost=selectPostUser($_GET['id'], $db);
    $dataComment=selectComment($_GET['id'], $db);
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
        <link href="./assets/css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="https://img2.freepng.fr/20180510/hie/kisspng-medusa-perseus-gorgon-greek-mythology-zeus-5af3da614c23d0.0900227115259305933119.jpg" />
        <!-- <script src="./assets/js/ratingSystem.js"></script> -->
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "articleReading-view.html.php",
                    type: "POST",
                    cache: false,
                    success: function(dataResult){
                        $('#table').html(dataResult); 
                    }
                });
                $(document).on("click", ".delete", function() { 
                    var $ele = $(this).parent().parent();
                    $.ajax({
                        url: "deleteComment.php",
                        type: "POST",
                        cache: false,
                        data:{
                            id: $(this).attr("data-id")
                        },
                        success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                $ele.fadeOut().remove();
                            }
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php 
        $title = "Lecture d'article";
        $desc = "Prenez votre temps pour profiter de la littérature antique.";
        include './header.php';
        ?>
        <?php 
        if(isset($_GET['id'])) {
        ?>
        <?php foreach ($data as $value) {?>
            <div class="col mb-5 read">
                <div class="card h-100 read">
                    <div class="badge bg-dark text-white position-absolute read" style="top: .5rem; left: .5rem">À lire</div>
                    <?php if(isset($_SESSION['id']) && $_SESSION['role'] == 1){
                        // J'ai essayé ici de créer du dynamisme en php mais j'ai encore du mal à comprendre comment faire, le but étant d'avoir un seul modal pour les deux types de suppression avec une phrase et une path différente en fonction du bouton sur lequel on clique
                        // REVOIR CETTE PARTIE, ça ne marche pas parce que les variables ne sont pas au bon endroit à revérifier
                            // $path = "delete.php";
                            // $delete = htmlspecialchars($value->article_id);
                            // $delQuote = "Êtes vous sûr de vouloir supprimer cet article définitivement ?"
                        ?>
                        <div class="badge bg-dark text-white position-absolute del" style="top: .5rem; right: .5rem"><a type="button" data-bs-toggle="modal" data-bs-target="#articleModal"><span class="delP">Suppression</span>&#x274C;</a></div>
                    <?php 
                    }
                    ?>
                    <?= '<img class="card-img-top read" src="assets/img/' . htmlspecialchars($value->article_image) . '" alt="'. htmlspecialchars($value->article_image) . '"/>';
                    ?>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <?= "<h5 class='fw-bolder'>" . htmlspecialchars($value->article_title) . "</h5>"?>
                            <?= "<h6>" . htmlspecialchars($value->article_desc) . "</h5>"?>
                            <?= "<p>" . html_entity_decode(htmlspecialchars($value->article_text)) . "</p>"?>
                        </div>
                        <div class="flex text-end">
                            <?= "<h6>Écrit pour vous par " . htmlspecialchars($dataPost->user_pseudo) . "</h6>"?>
                            <?= "<p>Le " . htmlspecialchars($value->article_date) . "</p>"?>
                        </div>
                    </div>
                </div>
                <?php include './commentSection.html.php' ?>
        <?php 
        }
        ?>
        <?php
        }
        ?>
        <?php include './footer.php'?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>