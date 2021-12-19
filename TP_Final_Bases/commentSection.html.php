<div class="comSpace">
    <?php if(isset($_COOKIE['id']) || isset($_SESSION['id'])){ ?>
        <form action="commentCreation.php?id=<?=htmlspecialchars($value->article_id)?>" method="POST" class="requires-validation container com">
            <h3>Répondre à '<?= htmlspecialchars($value->article_title) ?>' :</h3>
            <!-- Juste un ajout visuel pour le moment, ajouter une colonne com_rating dans commentaires et mettre à jour le dbManager.php, mettre à jour affichage commentaires, lier à l'article pour créer une moyenne de notes -->
            <div class="rating">
                <input type="radio" name="rating" id="r1">
                <label for="r1"></label>
                <input type="radio" name="rating" id="r2">
                <label for="r2"></label>
                <input type="radio" name="rating" id="r3">
                <label for="r3"></label>
                <input type="radio" name="rating" id="r4">
                <label for="r4"></label>
                <input type="radio" name="rating" id="r5">
                <label for="r5"></label>
            </div>
            <textarea name="comText" id="comText"></textarea>
            <input type="submit">
        </form>
        <?php 
        }
        ?>
        <div class="commentSection">
            <h3>Commentaires sur l'article '<?= htmlspecialchars($value->article_title) ?>' :</h3>
        <?php foreach ($dataComment as $value) {?>
            <div class="card p-4 com">
                <div class="text-start">
                    <!-- LA SUPPRESSION DE COMMENTAIRES NE MARCHE PAS CORRECTEMENT, je n'arrive pas à envoyer le bon id à cause du modal semble t'il, si je l'enlève et que passe par une alert() ça marche, à essayer avec un modal ne provenant pas de bootstrap -->
                    <?php
                    if(isset($_COOKIE['id']) || isset($_SESSION['id'])) {
                        if(htmlspecialchars($value->user_id) == $_SESSION['id'] || $_SESSION['role'] == 1) {
                            // $path = "deleteComment.php";
                            // $delete = htmlspecialchars($value->com_id);
                            // $delQuote = "Êtes vous sûr de vouloir supprimer ce commentaire définitivement ?";
                    ?>
                    <div class="badge bg-dark text-white position-absolute del" style="top: .5rem; right: .5rem">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#comModal">
                            <span class="delP">Suppression</span>
                            &#x274C;
                        </a>
                    </div>
                    <?php 
                        } 
                    }
                    ?>
                    <?= "<h5 class='fw-bolder'>" . htmlspecialchars(ucfirst($value->user_pseudo)) . " a répondu :</h5>"?>
                    <?= "<p>" . htmlspecialchars($value->com_text) . "</p>"?>
                    <?= "<p>Le " . htmlspecialchars($value->com_date) . "</p>"?>
                </div>
            </div>
        <?php 
        }
        ?>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="articleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous sûr de vouloir supprimer cet article définitivement ?</p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</a>
                <a type="button" href="delete.php?delete=<?= htmlspecialchars($value->article_id) ?>" class="btn btn-primary del">Supprimer</a>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="comModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes vous sûr de vouloir supprimer ce commentaire définitivement ?</p>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</a>
                <a type="button" href="deleteComment.php?delete=<?= htmlspecialchars($value->com_id) ?>" class="btn btn-primary del">Supprimer</a>
            </div>
        </div>
    </div>
</div>