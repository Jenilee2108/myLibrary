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
<h1 class="green">Tableau de bord de <span class="gold"><?= $_SESSION['user']['name_user'] ?></span></h1>
<!-- Partie des informations de l'utilisateur -->
<section class="gestion_info container">
    <!-- Pour Modifier les informations utilisateur -->
    <h2 class="green"><span class='gold bold'>Mes</span> informations</h2>
    <p for="mail">Votre adresse mail de contact est <?= $_SESSION['user']['mail'] ?></p>
    <!-- on récupère le pseudo comme parametre -->
    <h4><a href="indexAdmin.php?action=mesInfos&pseudo=<?= $pseudo ?>" class="subBtn btn-menu">Pour modifier mes informations</a></h4>
</section>


<!-- Gestion des commentaires utilisateurs -->
<section class="container ">
    <h2 class="green">Les <span class='gold bold'>livres</span> que vous avez commentez </h2>
    <!-- on boucle sur chaque commentaire associé au pseudo -->
    <?php foreach ($allComms as $comm) : ?>
    <section class="container livreCommente">
        <!-- On affiche les données présentes en base de données -->
            <article class="card-content container">
                <!-- titre du livre -->
                <h3 class='card-title gold'><?=  htmlspecialchars($comm['title']); ?> de <?= htmlspecialchars($comm['name_author'])  ?></h3>
                <!-- Données relatives au commentaire -->
                <h4 class="center">ajouté par: <?= htmlspecialchars($comm['pseudo']); ?> le <?= htmlspecialchars(date("d-m-Y à H:i", strtotime($comm['date_ajout']))); ?></h4>
                <!-- Note et Contenu du commentaire -->
                <?= "<p class='center'> Votre note est de : " . htmlspecialchars($comm['note']) . "/20</p>";
                if (!empty($comm['content'])) {
                    echo "<p class='center'> Votre Commentaire : " . $comm['content'] . "</p>";
                }; ?>
            </article>
            <!-- On permet de modifier les commentaire -->
            <article class="container card-corps">
                <!-- formulliare de modification du commentaire -->
                <form action="indexAdmin.php?action=updateComm&idComm=<?= $comm['id']; ?>" method="POST" class="article_commente container">
                    <!-- Zone de texte -->
                    <label for="content">Modifiez votre commentaire: </label>
                    <textarea class="content" name="content" cols="30" rows="10"></textarea>
                    <!-- Note attribuée -->
                    <label for="note"> Modifiez votre note : /20 </label>
                    <input type="number" min="0" max="20" step="1" name="note"> 
                    <!-- bouton d'action -->
                    <div class="subBtn">
                        <button type="submit" class="subBtn btn">Modifier</button>
                        <button class="subBtn btn"><a href="indexAdmin.php?action=deleteComm&id=<?= $comm['id']; ?> ">Supprimer</a></button>
                    </div>
                </form><!-- fin du formulaire de commentaire -->
            </article><!-- Fin de la partie de commentaire -->
    </section><!-- Fin de -->
    <?php endforeach; ?>
</section>

<!-- Affichage des derniers livres ajoutés -->
<section class="container">
    <h2 class="gold bold">Derniers <span class='green'>Livres</span> ajoutés</h2>
    <!-- Liste des derniers livres ajoutés en bdd -->
    <section class="derniers-livres">
        <!-- On boucle pour récupérer les 6 derniers livres -->
        <?php foreach ($allLivres as $livre) { ?>
            <div class="card-livre container">
                <!-- Titre du livre -->
                <h2 class="card-title green">
                    <?= strip_tags($livre["title"]); ?>
                    <?php if (!is_null($livre['tome'])) :
                        echo "<span class='gold bold'>-TOME " . strip_tags($livre["tome"]) . "</span>"; ?>
                    <?php endif; ?>
                </h2>
                <!-- Livre -->
                <article class="card-corps">
                    <div class="card-content">
                        <div class="contenu-card-livre">
                            <h6 class="gold label-article">Auteur: </h6>
                            <p class="auteurLivre"><?= strip_tags($livre["name_author"]); ?></p>
                        </div>
                        <div class="contenu-card-livre">
                            <h6 class="gold label-article">Catégorie: </h6>
                            <p class="categorieLivre"><?= strip_tags($livre["category"]); ?></p>
                        </div>
                        <div class="contenu-card-livre">
                            <?php if (!is_null($livre['noteMoyenne'])) :
                                echo "<h6 class='gold label-article'>Note Moyenne: </h6>
                            <p class='noteLivre'>" . $livre['noteMoyenne'] . " pour " . $livre['votes'] . " votants </p>";
                            endif; ?>
                        </div>
                        <div class="contenu-card-livre">
                            <h6 class="gold label-article">Synopsis: </h6>
                            <p class="synopsis-text" disable="true">
                                <?= strip_tags($livre["content"]); ?>
                            </p>
                        </div>
                        <button class="subBtn btn">
                            <a href="indexAdmin.php?action=addComm&livre=<?= $livre['id']; ?>">Ajouter un commentaire</a>
                        </button>
                    </div>
                </article>
            </div>
        <?php }; ?>
    </section>
</section>

<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php' ?>