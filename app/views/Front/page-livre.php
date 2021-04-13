<?php ob_start(); ?>
<?php $livre = $editLivre->fetch(); ?>

<section id="livre">
    <form action="index.php?action=updateLivre&id=<?= $livres['id']; ?>">
    <h2><?= htmlspecialchars($livre['title']) ?><?php if(!empty($livre['tome'])): echo " - ". htmlspecialchars($livre['tome']); ?><?php endif; ?></h2>
                
                <h6 class="gold label-article">Auteur: </h6> <p class="auteurLivre"><?= htmlspecialchars($livre['author']) ?></p>
                <h6 class="gold label-article">Catégorie: </h6> <p class="categorieLivre"><?= htmlspecialchars($livre['category']) ?></p>
                <h6 class="gold label-article">Note Moyenne: </h6> <p class="noteLivre"><?= htmlspecialchars($livre['note']) ?></p>
                <h6 class="gold label-article">Synopsis: </h6>
                    <p><?= htmlspecialchars($livre['resume']) ?></p>
    </form>
</section>

<?php $content =ob_get_clean(); ?>
<?php require 'Templates/template.php';?>