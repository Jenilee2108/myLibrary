<?php ob_start();
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


<!-- pour l'envoi de la suggestion en messagerie -->
<script type="text/javascript">
    document.getElementById("suggerer").addEventListener("click", () => {
        // on récupère les données
        let email = document.getElementById("mail").value;
        let nom = document.getElementById("pseudo").value;

        let categorie = document.getElementById("category").value;
        let nomAuteur = document.getElementById("name_author").value;
        let prenomAuteur = document.getElementById("firstname_author").value;
        let titre = document.getElementById("title").value;
        let resume = document.getElementById("synopsis").value;
        
        
        // on crée la suggestion envoyé par le bot
        let suggestion = `${nom} Propose le livre: ${titre}\n écrit par: ${nomAuteur} prénom: ${prenomAuteur}\n qui est dans la catégorie: ${categorie}\n dont le résumé est :${resume} \n son adresse mail pour une éventuelle remarque est ${email}`;
        //On utilise l'API slack pour envoyer la suggestion vers l'application
        fetch("https://slack.com/api/chat.postMessage", {
            method: "POST",
            headers: new Headers({
                "Authorization": "Bearer "+"Entrer le Token ici",
                "Content-type": "application/json"
            }),
            body: JSON.stringify({
                channel: "C025S0HC540",
                text: suggestion
            })
        })
        .then(function(response) {
            if (response.ok) {
                console.log("Suggestion bien envoyée");
            } else {
                console.log("Mauvaise réponse du réseau");
            }
        })
        .catch(function(error) {
            console.log("Probleme avec l'opération de fetch" + error.message);
        });
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>