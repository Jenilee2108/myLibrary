<?php

/** On vérifie s'il y a une session ouverte **/
// var_dump($_SESSION);
/** On vérifie s'il y a bien une session ouverte **/
if (!isset($_SESSION)) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}

// var_dump($_SESSION);
// var_dump($result);
// var_dump($allLivres);
// var_dump($allComms);
/** On appelle les données récupérées pour les utiliser **/
$pseudo = $_SESSION['user']['pseudo'];
$allLivres = $allLivres->fetchAll();
$allComms = $allComms->fetchAll();


/** Fonction pour injecter le header **/
ob_start();
$titre = "Mon tableau de bord";
?>

<h1>Tableau de bord de <?= $_SESSION['user']['name_user'] ?></h1>
<!-- Partie des informations de l'utilisateur -->
<section class="gestion_info container"> 
    <!-- Pour Modifier les informations utilisateur -->
    <h2>Mes informations</h2>
        <p for="mail">Votre adresse mail de contact est <?= $_SESSION['user']['mail'] ?></p>
    <h6><a href="indexAdmin.php?action=mesInfos&pseudo=<?= $pseudo ?>" class="btn-menu">Pour modifier mes informations</a></h6>
</section>


<!-- Gestion des commentaires utilisateurs -->
<section class="container ">
    <h2>Les livres que vous avez commentez </h2>
    <section class="article_about">
    <!-- on boucle sur chaque commentaire -->
        <?php foreach ($allComms as $comm) { ?>
            <article class="article">
                <h4><?= htmlspecialchars($comm['title']); ?> de <?= htmlspecialchars($comm['name_author']); ?></h4>

                <h5 class="center">ajouté par: <?= htmlspecialchars($comm['pseudo']); ?> le <?= htmlspecialchars($comm['date_ajout']); ?></h5>

                <?= '<p> Votre note est de : ' . htmlspecialchars($comm['note']) .  '/20</p>'; 
                if (!empty($comm['content'])) {
                    echo '<p> Votre Commentaire : ' . $comm['content'] . '</p>';
                }; ?>
            </article>
        <?php }; ?>
    </section>

    <h3><a href="indexAdmin.php?action=mesLivres&pseudo=<?= $pseudo; ?>">Les livres de la bibliothèque de <?= $pseudo; ?></a></h3>
    <!-- <a href="indexAdmin.php?action=modifLivres">Gérer mes livres</a> -->
</section>

<!-- Affichage des derniers livres ajoutés -->
<section class="container">
    <h2>Derniers Livres ajoutés</h2>
    <section class="article_about">
        <?php foreach ($allLivres as $livre) { ?>
            <article class="article">
            <div class="row">
                <h4><?= htmlspecialchars($livre['title']); ?> de <?= htmlspecialchars($livre['name_author']); ?></h4> 
                    - <a href="indexAdmin.php?action=deleteLivre&id=<?= $livre['id']; ?> ">x</a>
                    - <a href="indexAdmin.php?action=modifLivres&id=<?= $livre['id']; ?>">Modifier</a>
                    <!-- - <a href="indexAdmin.php?action=modifLivres&id=<?= $livre['id']; ?>">Ajouter a mes livres</a> -->
            </div>
                
                <?= 
                    '<p>' . htmlspecialchars($livre["content"]). '</p>'; 
                ?>
            </article>
        <?php }; ?>
    </section>
    <button><a href="indexAdmin.php?action=newLivre">Ajouter un livre</a></button>
    <!--  -->
</section>

<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php' ?>