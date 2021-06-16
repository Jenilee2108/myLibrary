<?php ob_start();
$titre = "Les Livres de MyLibrary"; ?>

<!-- Mise en place de la zone de filtre -->
<section id="filtre-library" class="container center pagewidth">
    <h1 class="h2"><span class="gold">Nos</span> livres en Library</h1>
    <!-- Mise en place d'un formulaire pour choisir le type de livres que l'on souhaite -->
    <form class="filtre-library container" action="" method="post">
        <!-- Champs du filtre  -->
        <fieldset class="filtre">
            <legend>
                <h2 class="filtre">Filtres</h2>
            </legend>
            <!-- mise en place des onglets associés au type de filtre -->
            <section id="onglets">
                <h3>Catégories</h3>
                <div>
                    <?php foreach ($categories as $category) : ?>
                        <input type="checkbox" name="category" id="filtreCategory" class="filtre" value="<?= $category['category']; ?>">
                        <label for="category"><?= $category['category']; ?></label>
                    <?php endforeach; ?>
                </div>
                <h3>Auteurs</h3>
                <div>
                    <?php foreach ($authors as $auteur) : ?>
                        <input type="checkbox" name="author" id="filtreAuthor" class="filtre" value="<?= $auteur['name_author']; ?>">
                        <label for="author"><?= $auteur['name_author']; ?></label>
                    <?php endforeach; ?>
                </div>
            </section>
        </fieldset>
    </form>
</section>

<!-- Mise en place de la bibliothèque générale -->
<section id="library" class="container pagewidth allLibrary">
    <!-- Boucle pour chaque livre -->
    <?php
        foreach ($allLivres as $livre) :
    ?>
        <article class="card-livre container">
            <!-- Image d'illustration -->
            <figure class="card-img">
                <img class="img-livre" src="app/Public/Front/images/DefautPhoto1.jpg" alt="<?= strip_tags($livre["title"]) ?? "Livre présent dans My Library"; ?>">
            </figure>
            <!-- Espace titre et content -->
            <h2 class="card-title green">
                <a href="livre&id=<?= $livre['id']; ?>"><?= strip_tags($livre["title"]); ?></a>
                <?php if (!is_null($livre['tome'])) :
                    echo "<span class='gold bold'>-TOME " . strip_tags($livre["tome"]) . "</span>"; ?>
                <?php endif; ?>
            </h2>
            <div class="card-corps">
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
                            <p class='noteLivre'>" . $livre['noteMoyenne'] . "</p>";
                        endif; ?>
                    </div>
                    <div class="contenu-card-livre">
                        <h6 class="gold label-article ">Synopsis: </h6>
                        <p class="synopsis-text" disable="true">
                            <?= strip_tags($livre["content"]); ?>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</section>
<?php $content = ob_get_clean(); ?>
<script>

</script>
<?php require 'Templates/template.php'; ?>