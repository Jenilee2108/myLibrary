<?php
ob_start();
/** On récupère le commentaire **/
$Com = $Comm->fetch();
/** Titre de la page **/
$titre = "Modifier mon commentaire";
?>

<section class="article center">
    <article class="article center">
        <h2><?= htmlspecialchars($Com['title']); ?></h2>
        <div class="form_article center">
        <!-- Affichage du commmentaire enregistré -->
            <p class="article_title"><?= htmlspecialchars($Com['content']); ?></p>
            <!-- Formulaire de Modification du commentaire -->
            <form action="indexAdmin.php?action=commenter&pseudo=<?= $pseudo; ?>" method="POST">
            <!-- Modification du commentaire -->
                <label for="content">Votre commentaireSSS: </label>
                    <textarea class="content" name="content" id="content" cols="30" rows="10"></textarea>
                <button type="submit" class="btn subbtn">editer</button>
            </form><!-- Fin du formulmaire -->
        </div><!--Fin de la form_article -->
    </article><!-- Fin de l'article -->
</section><!-- Fin de la section article -->

<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php' ?>