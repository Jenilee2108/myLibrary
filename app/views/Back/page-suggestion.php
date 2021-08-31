<?php ob_start();
use Dotenv\Repository\Adapter\EnvConstAdapter;
$titre = "Suggérez un livre"; ?>

<h1>Suggérez <span class="gold"> un livre</span></h1>

<section class="card-corps">
    <div class="container">
    <!-- on récupère le pseudo utilisateur -->
        <input type="hidden" id="pseudo" value="<?= $pseudo ?>">

        <label for="mail" class="title-label label-article">e-mail :</label>
        <input type="email" id="mail" name="user_mail" value="<?= $_SESSION["user"]['mail'] ?>">

        <label for="title" class="title-label label-article">Titre du livre: </label>
        <input type="text" id="title" name="title" class="categorieLivre" placeholder="Titre du lirvre">

        <label for="auteurLivre" class="title-label label-article">Auteur: </label>
        <div>
            <input type="text" id="name_author" name="name_author" class="auteurLivre" placeholder="Nom Auteur">
            <input type="text" id="firstname_author" name="firstname_author" class="auteurLivre" placeholder="Prénom Auteur">
        </div>
        <label for="category" class="title-label label-article">Catégorie: </label>
        <input type="text" id="category" name="category" class="categorieLivre" placeholder="Catégorie">

        <label for="content" class="title-label label-article">Synopsis: </label>
        <textarea type="text" id="synopsis" name="content" class="lightGray" placeholder="Résumé"></textarea>
    </div>
    <div class="subBtn">
        <button class="btn" id="suggerer">Envoyer</button>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>
