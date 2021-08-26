<?php ob_start();
$titre = "Résultat de votre recherche"; ?>

<!-- Mise en place de la zone de filtre -->
<section id="filtre-library" class="container center pagewidth">
    <h1 class="h2"><span class="gold">Nos</span> résultats de livres en Library</h1>
    <!-- Mise en place d'un formulaire pour choisir le type de livres que l'on souhaite -->
    
</section>

<!-- Mise en place de la bibliothèque générale -->
<section id="library" class="container pagewidth allLibrary">
    <!-- Boucle pour chaque livre -->
    <?php
    foreach ($searches as $search) :
    ?>
        <article class="card-livre container">
            <!-- Image d'illustration -->

            <!-- Espace titre et content -->
            <h2 class="card-title green">
                <a class="green" href="livre&id=idLivre"><?= strip_tags($search["title"]); ?></a>
                <?php if (!is_null($search['tome'])) :
                    echo "<span class='gold bold'>-TOME " . strip_tags($search["tome"]) . "</span>"; ?>
                <?php endif; ?>
            </h2>
            <div class="card-corps">
                <div class="card-content">
                    <div class="contenu-card-livre">
                        <h3 class="gold label-article">Auteur: </h3>
                        <p class="auteurLivre"><?= strip_tags($search["name_author"]); ?></p>
                    </div>
                    <div class="contenu-card-livre">
                        <h3 class="gold label-article">Catégorie: </h3>
                        <p class="categorieLivre"><?= strip_tags($search["category"]); ?></p>
                    </div>
                    <div class="contenu-card-livre">
                        <?php if (!is_null($search['noteMoyenne'])) :
                            echo "<h3 class='gold label-article'>Note Moyenne: </h3>
                            <p class='noteLivre'>" . $search['noteMoyenne'] . "</p>";
                        endif; ?>
                    </div>
                    <div class="contenu-card-livre">
                        <h3 class="gold label-article ">Synopsis: </h3>
                        <p class="synopsis-text" disable="true">
                            <?= strip_tags($search["content"]); ?>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>