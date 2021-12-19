<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">MYTHOLOGUIDES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php
                if(isset($_SESSION['id']) && $_SESSION['role'] == 1) {
                ?>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="articlesCreation-view.html.php">CRÉER</a></li>
                <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">AUTHENTIFICATION</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if(!isset($_SESSION['id'])) {
                        ?>
                        <li><a class="dropdown-item" href="inscription-view.html.php">INSCRIPTION</a></li>
                        <?php
                        }
                        ?>
                        <li>
                            <!-- && pour pouvoir changer le bouton correctement, avec || ne marchait pas -->
                        <?php if(isset($_SESSION['id']) || isset($_COOKIE['id'])) {
                            echo '<a class="dropdown-item" href="deconnexion.php?dc=ok">DECONNEXION</a>';
                        } else {
                            echo '<a class="dropdown-item" href="connexion-view.html.php">CONNEXION</a>';
                        }
                        ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php if(isset($_SESSION['id']) || isset($_COOKIE['id'])) {
                echo "Connecté(e) à " . $_SESSION['pseudo'];
            }
            ?>
        </div>
    </div>
</nav>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder"><?=$title?></h1>
            <p class="lead fw-normal text-white-50 mb-0"><?=$desc?></p>
        </div>
    </div>
</header>