<?php
ob_start();
/** si on n'a pas d'utilisateur connecté on va sur la page de connexion **/
if (!isset($_SESSION["user"])) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}
$titre = "Ajouter mon commentaire";
?>

<section id="newLivre" class="livre center">
    <!-- Récupération du titre du livre -->
    <article class="livre row">
        <h1 class='card-title'><?= htmlspecialchars($livre['title']); ?> de <?= htmlspecialchars($livre['name_author']);  ?></h1>
    </article>
    <!-- Formulire de mise a jour des commentaires -->
    <form action="indexAdmin.php?action=commenter&idLivre=<?= $livre['id']; ?>" method="POST" class="card-corps livre">
        <label for="note" class="gold"> Votre note :</label>
        <input type="number" name="note" min="0" max="20" title="votre note sur 20"> /20
        <label for="content" class="gold"> Votre commentaire :</label>
        <textarea type="text" name="content" id="commentaire" cols="30" rows="10" title="Un commentaire pour se rappeler où vous en êtes"></textarea>
        <button type="submit" class="btn">Commenter</button>
    </form>
</section>

<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php' ?>