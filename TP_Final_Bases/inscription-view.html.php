<?php
session_start();
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="icon" type="image/x-icon" href="https://img2.freepng.fr/20180510/hie/kisspng-medusa-perseus-gorgon-greek-mythology-zeus-5af3da614c23d0.0900227115259305933119.jpg" />
</head>
<body>
    <?php 
    $title = "Inscription";
    $desc = "Créez vous un compte pour être au courant de toute l'actualité des Dieux.";
    include './header.php';
    ?>
    <form action="inscription.php" class="requires-validation container formInscr" method="POST">
        <div class="col-md-12">
            <input class="form-control" type="text" name="pseudo" placeholder="Pseudonyme" required>
            <div class="valid-feedback">Username field is valid!</div>
            <div class="invalid-feedback">Username field cannot be blank!</div>
        </div>
        <div class="col-md-12">
            <input class="form-control" type="email" name="mail" placeholder="Adresse E-mail" required>
            <div class="valid-feedback">Email field is valid!</div>
            <div class="invalid-feedback">Email field cannot be blank!</div>
            <?php
            if (!empty($error) && $error == "alreadyExist") {
            ?> <small class="text-danger">Utilisateur déjà existant</small>
            <?php
            }
            ?>
        </div>
        <div class="col-md-12">
            <select class="form-select mt-3">
                <option selected disabled value="">Quel Dieu êtes vous ?</option>
                <option value="zeus">Zeus</option>
                <option value="hades">Hadès</option>
                <option value="hepha">Héphaïstos</option>
            </select>
            <div class="valid-feedback">You selected a position!</div>
            <div class="invalid-feedback">Please select a position!</div>
        </div>
        <div class="col-md-12">
            <input class="form-control" type="password" name="password" placeholder="Mot de passe" required>
            <div class="valid-feedback">Password field is valid!</div>
            <div class="invalid-feedback">Password field cannot be blank!</div>
        </div>
        <div class="col-md-12">
            <input class="form-control" type="password" name="password2" placeholder="Confirmation du mot de passe" required>
            <?php
            if (!empty($error) && $error == "notSamePass") {
            ?> <small class="text-danger">Vous avez rentré deux mots de passes différents</small>
            <?php
            }
            ?>
        </div>
        <div class="col-md-12 mt-3">
            <label class="mb-3 mr-1" for="gender">Genre: </label>

            <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>
            <label class="btn btn-sm btn-outline-secondary" for="male">Homme</label>

            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
            <label class="btn btn-sm btn-outline-secondary" for="female">Femme</label>

            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>
            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
            <div class="valid-feedback mv-up">You selected a gender!</div>
            <div class="invalid-feedback mv-up">Please select a gender!</div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label">Je confirme que ces informations sont correctes.</label>
            <div class="invalid-feedback">Veuillez confirmer les données rentrées ci dessus.</div>
        </div>
        <div class="form-button mt-3">
            <button id="submit" type="submit" class="btn btn-primary">S'inscrire</button>
            <?php
                if (!empty($error) && $error == "allField") {
            ?> <small class="text-danger">Vous n'avez pas rentré tous les champs</small>
            <?php
            }
            ?>
        </div>
    </form>
    <?php if (!empty($error) && $error == "dbError") {
    ?>
        <div class="alert alert-danger" role="alert">
            <p>Echec de la création de compte</p>
        </div>
    <?php
    }
    ?>
    <?php include './footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>