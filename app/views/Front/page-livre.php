<?php ob_start();
$livre = $monLivre->fetch();
($livre);
$titre = $livre['title'] ?? "Livre"; ?>

<section id="livreSolo" class="container livreSolo">
    <!-- Boucle pour chaque livre -->
    <article class="content-livre center">
        <!-- Image d'illustration -->
        <figure class="card-img"><img class="img-livre " src="app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
        <div class="card-content">
            <!-- Espace titre -->
            <h2 class="card-title green">
                <a href="livre&id=idLivre"><?= $livre['title']; ?></a><span class="gold bold">- tome</span>
            </h2>
            <!-- Espace contenu texte -->
            <section class="card-corps">
                <div>
                    <h6 class="gold label-article">Auteur: </h6>
                    <?= "<p class='auteurLivre lightGray'>" . strip_tags($livre['name_author']) . "</p>" ?>
                </div>
                <div>
                    <h6 class="gold label-article">Catégorie: </h6>
                    <?= "<p class='categorieLivre lightGray'>" . strip_tags($livre['category']) . "</p>" ?>
                </div>
                <div class="synopsis-livre">
                    <?php if (!is_null($livre['content'])) :
                        echo '<h4 class="gold label-article"> Synopsis: </h4>
                        <p class="lightGray">' . utf8_encode($livre['content']) . '</p>';
                    endif; ?>
                </div>
            </section>
        </div>

    </article>

</section>
<!-- Formulaire en cas de connexion -->
<section id="commentaire" class="container livreSolo">
    <div class="content-livre bg-gold">
        <h4 class="green label-article">Mon Commentaire : </h4>
        <p class="lightGray">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!
        </p>
    </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>