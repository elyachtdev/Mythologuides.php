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
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="https://img2.freepng.fr/20180510/hie/kisspng-medusa-perseus-gorgon-greek-mythology-zeus-5af3da614c23d0.0900227115259305933119.jpg" />
</head>
<body>
    <?php 
    $title = "Connexion";
    $desc = "Connectez vous pour prendre place au Panthéon !";
    include './header.php';
    ?>
    <form action="connexion.php" class="requires-validation container formConnex" method="POST">
        <div class="col-md-12">
            <input class="form-control" type="text" name="pseudo" placeholder="Pseudonyme" required>
        </div>
        <?php 
            if (!empty($error) && $error == "dontExist") {
        ?> 
        <small class="text-danger">Utilisateur inexistant</small>
        <?php
			}
        ?>
        <div class="col-md-12">
            <input class="form-control" type="password" name="password" placeholder="Mot de passe" required>
        </div>
        <?php 
            if (!empty($error) && $error == "password") {
        ?> 
        <small class="text-danger">Mot de passe incorrect</small>
        <?php
            }
        ?>
        <div class="row mb-4">
			<div class="col d-flex justify-content-center">
				<!-- Checkbox -->
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="ok" id="remember" name="remember" checked />
					<label class="form-check-label" for="remember" name="remember"> Se souvenir de moi </label>
				</div>
			</div>
		</div>
        <div class="form-button mt-3">
            <button id="submit" type="submit" class="btn btn-primary">Se connecter</button>
            <?php
                if (!empty($error) && $error == "allField") {
            ?> <small class="text-danger">Vous n'avez pas rentré tous les champs</small>
            <?php
            }
            ?>
        </div>
    </form>
    <?php include './footer.php';?>
    <!-- cookie toujours présent après deconnexion -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>