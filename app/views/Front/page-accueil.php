<?php ob_start();
$titre= "accueil"; ?>

    <!-- Mise en place de la présentation de l'application -->
    <section id="apropos" class=" pagewidth container bloc-accueil">
        <article class="container-card card" id="quoi">
         <!-- Image d'illustration -->
            <figure class="img-accueil center card-img">
                <img  src="app/public/Front/images/accueil.jpg" alt="MyLibrary vous souhaite la bienvenue dans votre bibliothèque de poche">
            </figure>
         <!-- Titre h1 en majuscules mais à la taille h2 -->
               <h1 class="card-title green"><span class="gold">MY</span>Library qu'est ce que c'est <span class="gold">?</span></h1>
         
         <!-- Mise en place d'une div pour faire le fond vert du text -->
            <div class="card-corps">
                <p class="text-accueil">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum expedita nisi itaque accusantium, ipsum ullam magnam quis! Magni sit repellat quaerat necessitatibus ullam blanditiis cum ipsa minus tempora. Necessitatibus, illum.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio in numquam repellat recusandae quam neque ut, vel libero ipsam illo, exercitationem modi eos fugit? Quos quo reprehenderit deleniti cum sint.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae dolores molestiae esse unde magnam sapiente cum reiciendis non dolor ut. Ratione vel sapiente at. Cumque, atque autem libero esse impedit magni ut voluptates qui saepe? Distinctio delectus quaerat ratione illo in repellat, impedit rerum sed. Possimus, perspiciatis alias impedit, sit, commodi perferendis distinctio temporibus facilis aperiam ea magni optio! Tempora nisi, vero non explicabo dolore nostrum, nihil ab similique eaque amet vitae perferendis. Ullam nisi corporis nam voluptas odio error, deserunt praesentium ipsa alias quibusdam! Mollitia molestias, ratione, cupiditate tempora ipsa illo magni quae eligendi omnis inventore, quas iure iusto?
                </p>
            </div>
        </article>
    </section>
    <!-- Mise en place des icones pour le fonctionnement de l'appli qui disparait quand on est connecté -->
    <section id="fonctionnement" class="bloc-accueil icone-accueil">
        <h2 class="card-title green"> comment cela fonctionne <span class="gold">?</span></h2>
     <!-- Mise en place d'une div contenant les icones avec mise en place de span entre les li pour mettre en place les chevrons en mode desktop -->
        <ol class="center">
            <li class="icone"><a href="index.php?action=inscription"><img src="app/public/Front/images/newCompte.png" alt="Je crée mon compte" class="icone"></a>
            <p class="icone-text">Je crée mon compte</p></li>
                <span class="transition"></span>
            <li class="icone"><img src="app/public/Front/images/ajoutLivre.png" alt="J'ajoute mes livres" class="icone">
            <p class="icone-text">J'ajoute mes livres</p></li>
                <span class="transition"></span>
            <li class="icone"><img src="app/public/Front/images/blocMemo.png" alt="J'ajoute des memos" class="icone">
            <p class="icone-text">J'ajoute des memos</p></li>
                <span class="transition"></span>
            <li class="icone"><a href="index.php?action=library"><img src="app/public/Front/images/loupe.png" alt="J'ajoute des memos" class="icone"></a>
            <p class="icone-text">Je consulte MyLibrary</p></li>
            <span class="transition"></span>
        </ol>
    </section>

<?php $content =ob_get_clean(); ?>
<?php require 'Templates/template.php';?>