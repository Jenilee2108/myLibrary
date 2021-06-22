<?php
ob_start();
/** si on n'a pas d'utilisateur connecté on va sur la page de connexion **/
if (!isset($_SESSION["user"])) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}
var_dump($livre);
$titre = "Ajouter mon commentaire";
?>

<section id="newLivre" class="livre">
    <!-- Récupération du titre du livre -->
    <article class="livre">
        <h1 class='card-title'><?= htmlspecialchars($livre['title']); ?> <span class="gold"> de </span> <?= htmlspecialchars($livre['name_author']);  ?></h1>
    </article>
    <!-- Formulire de mise a jour des commentaires -->
    <form action="indexAdmin.php?action=commenter&idLivre=<?= $livre['id']; ?>" method="POST" class="card-corps livre">
        <label for="note" class="title-label"> Votre note :</label>
        <input type="number" name="note" min="0" max="20" title="votre note sur 20"> /20

        <label for="content" class="title-label"> Votre commentaire :</label>
        <textarea type="text" name="content" id="content" cols="30" rows="10" title="Un commentaire pour se rappeler où vous en êtes"></textarea>
        <div class="subBtn">
            <div type="submit" class="btn title-label">Commenter</div>
        </div>
    </form>
</section>

<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'Templates/template.php' ?>