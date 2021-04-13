<?php ob_start(); ?>

<h1 class="h2"><span class="gold">Nos</span> livres en Library</h1>
<!-- Mise en place de la zone de filtre -->
<section id="filtre-biblio" class="filtre-biblio">
    <div class="container zone-filtre">
     <!-- Mise en place d'un formulaire pour choisir le type de livres que l'on souhaite -->
       <form action="" method="post">
        <fieldset class="filtre">
        <legend><h2 class="title">Filtres</h2></legend>
           <section id="onglets">            
                <h3>Catégories</h3>
                <div>
                        <input type="checkbox" name="category" id="filtre" value="SF">
                    <label for="category">Sciences Fiction</label>
                        <input type="checkbox" name="category" id="filtre" value="polar">
                    <label for="category">Polar</label>
                        <input type="checkbox" name="category" id="filtre" value="Développement Personnel">
                    <label for="category">Développement Personnel</label>
                        <input type="checkbox" name="category" id="filtre" value="Recettes">
                    <label for="category">Recettes</label>
                </div>           
                <h3>Auteur</h3>
                <div>
                        <input type="checkbox" name="category" id="filtre" value="Recettes">
                    <label for="category">Recettes</label>
                        <input type="checkbox" name="category" id="filtre" value="SF">
                    <label for="category">Sciences Fiction</label>
                        <input type="checkbox" name="category" id="filtre" value="polar">
                    <label for="category">Polar</label>
                        <input type="checkbox" name="category" id="filtre" value="Développement Personnel">
                    <label for="category">Développement Personnel</label>
                </div>
                <h3></h3>
                <div>
                        <input type="checkbox" name="category" id="filtre" value="Développement Personnel">
                    <label for="category">Développement Personnel</label>
                        <input type="checkbox" name="category" id="filtre" value="SF">
                    <label for="category">Sciences Fiction</label>
                        <input type="checkbox" name="category" id="filtre" value="polar">
                    <label for="category">Polar</label>
                        <input type="checkbox" name="category" id="filtre" value="Recettes">
                    <label for="category">Recettes</label>
                </div>
           </section>
        </fieldset>
       </form>
    </div>
</section>

<!-- Mise en place de la bibliothèque générale -->
<section id="biblio" class="allBiblio">
     <!-- Boucle pour chaque livre -->
    <article class="card card-article">
        <?php foreach($allLivres as $livre){ ?>
        <h2><?= htmlspecialchars($livre['title']) ?><?php if(!empty($livre['tome'])): echo " - ". htmlspecialchars($livre['tome']); ?><?php endif; ?></h2>
                
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