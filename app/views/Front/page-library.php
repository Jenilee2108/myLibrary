<?php ob_start(); ?>

<!-- Mise en place de la zone de filtre -->
<section id="filtre-library" class="container center pagewidth">
<h1 class="h2"><span class="gold">Nos</span> livres en Library</h1>
     <!-- Mise en place d'un formulaire pour choisir le type de livres que l'on souhaite -->
       <form class="filtre-library container" action="" method="post">
       <!-- Champs du filtre  -->
        <fieldset class="filtre">
            <legend><h2 class="filtre">Filtres</h2></legend>
            <!-- mise en place des onglets associés au type de filtre -->
            <section id="onglets">            
                    <h3>Catégories</h3>
                    <div>
                            <input type="checkbox" name="SF" id="filtre" value="SF">
                        <label for="SF">Sciences Fiction</label>
                            <input type="checkbox" name="Roman" id="filtre" value="polar">
                        <label for="Roman">Roman</label>
                            <input type="checkbox" name="DPers" id="filtre" value="Développement Personnel">
                        <label for="DPers">Développement Personnel</label>
                            <input type="checkbox" name="recettes" id="filtre" value="Recettes">
                        <label for="recettes">Recettes</label>
                    </div>           
                    <h3>Auteurs</h3>
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
                   
            </section>
        </fieldset>
       </form>
</section>

<!-- Mise en place de la bibliothèque générale -->
<section id="library" class="container pagewidth allLibrary">
     <!-- Boucle pour chaque livre -->
    <article class="container-livre card-livre container">
        <!-- Image d'illustration -->
            <figure class="card-img"><img class="img-livre" src="/app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
        <!-- Espace titre et content -->
        
            <h2 class="card-title green">
                <a href="livre&id=idLivre"> titre du livre</a><span class="gold bold">- tome</span>
            </h2>
        <div class="card-corps">        
            <div class="card-content">
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Auteur: </h6><p class="auteurLivre">intilePrénom NomAuteur</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Catégorie: </h6><p class="categorieLivre">Catégorie</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Note Moyenne: </h6><p class="noteLivre">noteMoyenne</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article ">Synopsis: </h6>
                    <p class="synopsis-text" disable="true">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!
                    </p>
                </div>
            </div>
        </div>   
    </article>
    <article class="container-livre card-livre container">
        <!-- Image d'illustration -->
            <figure class="card-img" ><img class="img-livre" src="/app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
        <!-- Espace titre et content -->
        
            <h2 class="card-title green">
                <a href="livre&id=idLivre"> titre du livre</a><span class="gold bold">- tome</span>
            </h2>
        <div class="card-corps">        
            <div class="card-content">
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Auteur: </h6><p class="auteurLivre">intilePrénom NomAuteur</p>
                </div>
                <div >
                    <h6 class="gold label-article">Catégorie: </h6><p class="categorieLivre">Catégorie</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Note Moyenne: </h6><p class="noteLivre">noteMoyenne</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Synopsis: </h6>
                    <p class="synopsis-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!
                    </p>
                </div>
            </div>
        </div>   
    </article>
    <article class="container-livre card-livre container">
        <!-- Image d'illustration -->
            <figure class="card-img" ><img class="img-livre" src="/app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
        <!-- Espace titre et content -->
        
            <h2 class="card-title green">
                <a href="livre&id=idLivre"> titre du livre</a><span class="gold bold">- tome</span>
            </h2>
        <div class="card-corps">        
            <div class="card-content">
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Auteur: </h6><p class="auteurLivre">intilePrénom NomAuteur</p>
                </div>
                <div >
                    <h6 class="gold label-article">Catégorie: </h6><p class="categorieLivre">Catégorie</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Note Moyenne: </h6><p class="noteLivre">noteMoyenne</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Synopsis: </h6>
                    <p class="synopsis-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!
                    </p>
                </div>
            </div>
        </div>   
    </article>
    <article class="container-livre card-livre container">
        <!-- Image d'illustration -->
            <figure class="card-img" ><img class="img-livre" src="/app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
        <!-- Espace titre et content -->
        
            <h2 class="card-title green">
                <a href="livre&id=idLivre"> titre du livre</a><span class="gold bold">- tome</span>
            </h2>
        <div class="card-corps">        
            <div class="card-content">
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Auteur: </h6><p class="auteurLivre">intilePrénom NomAuteur</p>
                </div>
                <div >
                    <h6 class="gold label-article">Catégorie: </h6><p class="categorieLivre">Catégorie</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Note Moyenne: </h6><p class="noteLivre">noteMoyenne</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Synopsis: </h6>
                    <p class="synopsis-text disable">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!
                    </p>
                </div>
            </div>
        </div>   
    </article>
    <article class="container-livre card-livre container">
        <!-- Image d'illustration -->
            <figure class="card-img" ><img class="img-livre" src="/app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
        <!-- Espace titre et content -->
        
            <h2 class="card-title green">
                <a href="livre&id=idLivre"> titre du livre</a><span class="gold bold">- tome</span>
            </h2>
        <div class="card-corps">        
            <div class="card-content">
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Auteur: </h6><p class="auteurLivre">intilePrénom NomAuteur</p>
                </div>
                <div >
                    <h6 class="gold label-article">Catégorie: </h6><p class="categorieLivre">Catégorie</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Note Moyenne: </h6><p class="noteLivre">noteMoyenne</p>
                </div>
                <div class="contenu-card-livre">
                    <h6 class="gold label-article">Synopsis: </h6>
                    <p class="synopsis-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nobis eos omnis commodi mollitia adipisci quas? Eos obcaecati velit alias dignissimos consectetur enim recusandae excepturi tempore fugiat nemo quae ab explicabo modi illum quas dolore reprehenderit, itaque perferendis quisquam, ad impedit. Error velit nobis odit, voluptatem aliquid autem dolorum eius a culpa quae incidunt labore molestiae dolor quibusdam architecto qui assumenda aperiam? Nam, repudiandae. Quam veritatis, pariatur debitis laborum mollitia iure maxime atque in at totam adipisci laboriosam eligendi quo facilis libero nihil iste expedita hic. Voluptas porro aperiam pariatur, praesentium maxime error voluptates, laborum unde optio eum officia minima!
                    </p>
                </div>
            </div>
        </div>   
    </article>
</section>
<?php $content =ob_get_clean(); ?>
<?php require 'Templates/template.php';?>

