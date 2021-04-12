<?php ob_start(); ?>

<h1 class="h2"><span class="gold">Nos</span> livres en library</h1>
<!-- Mise en place de la zone de filtre -->
<section id="filtre-biblio" class="filtre-biblio">
    <div class="container zone-filtre">
     <!-- Mise en place d'un formulaire pour choisir le type de livres que l'on souhaite -->
       <form action="" method="post">
        <fieldset>
        <legend></legend>
            <label for="filtre"><h2 class="title">Filtres</h2></label>
                <select name="filtre" id="filtre">
                    <option value="">--Choisissez une option--</option>
                    <option value="Catégorie">Catégorie</option>
                    <option value=""></option>
                </select>
        </fieldset>
       </form>
    </div>
</section>

<!-- Mise en place de la bibliothèque générale -->
<section id="biblio" class="allBiblio">
     <!-- Boucle pour chaque livre -->
    <article class="card card-article">
        <?php foreach($allLivres as $livre){ ?>
        <h2><span class="gold"><?= htmlspecialchars($livre['title']) ?> <?= htmlspecialchars($livre['author']) ?> </h2>
        </span>
        <
        <h6 class="gold label-article">Auteur: </h6> <p class="auteurLivre"><?= htmlspecialchars($livre['author']) ?></p>
        <h6 class="gold label-article">Catégorie: </h6> <p class="categorieLivre"><?= htmlspecialchars($livre['category']) ?></p>
        <h6 class="gold label-article">Note Moyenne: </h6> <p class="noteLivre"><?= htmlspecialchars($livre['note']) ?></p>
        <h6 class="gold label-article">Synopsis: </h6>
        <p><?= htmlspecialchars($livre['resume']) ?></p> 
        <?php }; ?>
    </article>
</section>
<?php $content =ob_get_clean(); ?>
<?php require 'Templates/template.php';?>