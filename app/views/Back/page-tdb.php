<?php
ob_start();
/** On vérifie s'il y a bien une session ouverte **/
if (!isset($_SESSION)) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}
/** On appelle les données récupérées pour les utiliser **/
$allLivres = $allLivres->fetchAll();
$allComms = $allComms->fetchAll();

/** Fonction pour injecter le header **/
$titre = "Mon tableau de bord";
?>

<!-- gestion des informations mail et mdp utilisateur -->
<h1>Bienvenue sur votre tableau de bord <span class="gold"> <?= $_SESSION['user']['name_user'] ?></span> </h1>
<!-- Partie des informations de l'utilisateur -->
<section class="gestion_info container">
    <!-- on récupère le pseudo comme parametre -->
    <h2><span class='gold bold'>Mes</span> informations</h2>
    <p for="mail">Votre adresse mail de contact est <?= $_SESSION['user']['mail'] ?></p>
    <!-- Pour Modifier les informations utilisateur -->
    <div type="button" class="btn-tdb">
        <a href="indexAdmin.php?action=mesInfos&pseudo=<?= $pseudo ?>">Pour modifier mes informations</a>
    </div>
</section>


<!-- Gestion des commentaires utilisateurs -->
<h2>Les <span class='gold bold'>livres</span> que vous avez commentez </h2>

<!-- on boucle sur chaque commentaire associé au pseudo -->
<section class="container livreCommente">
    <!-- On affiche les données présentes en base de données -->
    <?php 
        var_dump($allComms);
        var_dump($pseudo);die;
    foreach ($allComms as $comm) : 
        ?>
        <div class="card-livre">
            <!-- titre du livre -->
            <h3 class='card-title'>
                <span class="gold">
                    <?= htmlspecialchars($comm['title']); ?>
                </span>de<span class="gold">
                    <?= htmlspecialchars($comm['name_author'])  ?>
                </span>
            </h3>
            <!-- Données relatives au commentaire -->
            <article id="mesComm" class="card-corps">
                <h4>
                    ajouté par: <?= htmlspecialchars($comm['pseudo']); ?> le <?= htmlspecialchars(date("d-m-Y à H:i", strtotime($comm['date_ajout']))); ?>
                </h4>
                <!-- Note et Contenu du commentaire -->
                <?= "<p> Votre note est de : " . htmlspecialchars($comm['note']) . "/20</p>";
                if (!empty($comm['content'])) :
                    echo "<p> Votre Commentaire : " . $comm['content'] . "</p>";
                endif;
                ?>
                <!-- On permet de modifier les commentaire -->
                <!-- formulliare de modification du commentaire -->
                <form action="indexAdmin.php?action=updateComm&idComm=<?= $comm['id']; ?>" method="POST" class="article_commente container">
                    <!-- Zone de texte -->
                    <label for="content" class="title-label">Modifiez votre commentaire: </label>
                    <textarea class="content" name="content" cols="30" rows="10"></textarea>
                    <!-- Note attribuée -->
                    <label for="note" class="title-label"> Modifiez votre note : /20 </label>
                    <input type="number" min="0" max="20" step="1" name="note">
                    <!-- bouton d'action -->
                    <div class="subBtn">
                        <button type="submit" class="btn title-label">Modifier</button>
                        <a href="indexAdmin.php?action=deleteComm&id=<?= $comm['id']; ?>" class=" btn title-label" title="Attention vous supprimez votre commentaire">Supprimer</a>
                    </div>
                </form><!-- fin du formulaire de commentaire -->
            </article><!-- Fin de la partie de commentaire -->
        </div>
    <?php endforeach; ?>
</section><!-- Fin de -->



<!-- Affichage des derniers livres ajoutés -->
<h2 class="gold bold">Derniers <span class='green'>Livres</span> ajoutés</h2>
<!-- Liste des derniers livres ajoutés en bdd -->
<section class="derniers-livres">
    <!-- On boucle pour récupérer les 6 derniers livres -->
    <?php foreach ($allLivres as $livre) : ?>
        <div class="card-livre">
            <!-- Titre du livre -->
            <h3 class="card-title green">
                <?= strip_tags($livre["title"]); ?>
                <?php if (!is_null($livre['tome'])) :
                    echo "<span class='gold bold'>-TOME " . strip_tags($livre["tome"]) . "</span>"; ?>
                <?php endif; ?>
            </h3>
            <!-- Livre -->
            <article class="card-corps">
                <div class="card-content">
                    <div class="contenu-card-livre">
                        <h6 class="title-label label-article">Auteur: </h6>
                        <p class="auteurLivre"><?= strip_tags($livre["name_author"]); ?></p>
                    </div>
                    <div class="contenu-card-livre">
                        <h6 class="title-label label-article">Catégorie: </h6>
                        <p class="categorieLivre"><?= strip_tags($livre["category"]); ?></p>
                    </div>
                    <div class="contenu-card-livre">
                        <?php if (!is_null($livre['noteMoyenne'])) :
                            echo "<h6 class='title-label label-article'>Note Moyenne: </h6>
                            <p class='noteLivre'>" . $livre['noteMoyenne'] . " pour " . $livre['votes'] . " votants </p>";
                        endif; ?>
                    </div>
                    <div class="contenu-card-livre synopsis">
                        <h6 class="title-label label-article">Synopsis: </h6>
                        <p class="synopsis-text" disable="true">
                            <?= strip_tags($livre["content"]); ?>
                        </p>
                    </div>
                    <div class="subBtn">
                        <a href="indexAdmin.php?action=addComm&livre=<?= $livre['id']; ?>" class="btn title-label">Ajouter un commentaire</a>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</section>


<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php @require 'Templates/template.php' ?>