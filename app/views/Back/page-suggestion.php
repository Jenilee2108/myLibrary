<?php ob_start();
$titre = "Suggérez un livre"; ?>
<section>
    <div class="center container">
        <input type="hidden" id="pseudo" value="<?= $pseudo ?>">

        <label for="mail" class="gold label-article">e-mail :</label>
        <input type="email" id="mail" name="user_mail" value="<?= $_SESSION["user"]['mail'] ?>">

        <label for="title" class="gold label-article">Titre du livre: </label>
        <input type="text" id="title" name="title" class="categorieLivre" placeholder="Titre du lirvre">

        <label for="auteurLivre" class="gold label-article">Auteur: </label>
        <div>
            <input type="text" id="name_author" name="name_author" class="auteurLivre" placeholder="Nom Auteur">
            <input type="text" id="firstname_author" name="firstname_author" class="auteurLivre" placeholder="Prénom Auteur">
        </div>
        <label for="category" class="gold label-article">Catégorie: </label>
        <input type="text" id="category" name="category" class="categorieLivre" placeholder="Catégorie">

    </div>
    <div class="synopsis-livre card-corps">
        <label for="content" class="gold label-article">Synopsis: </label>
        <textarea type="text" id="synopsis" name="content" class="lightGray" placeholder="Résumé"></textarea>
    </div>
    <button class="btn center" id="suggerer">Envoyer</button>
</section>
<!-- pour l'envoi de la suggestion en messagerie -->
<script type="text/javascript">
    document.getElementById("suggerer").addEventListener("click", () => {
        let email = document.getElementById("mail").value;
        let nom = document.getElementById("pseudo").value;

        let categorie = document.getElementById("category").value;
        let nomAuteur = document.getElementById("name_author").value;
        let prenomAuteur = document.getElementById("firstname_author").value;
        let titre = document.getElementById("title").value;
        let resume = document.getElementById("synopsis").value;

        let suggestion = `${nom} Propose le livre: ${titre}\n écrit par: ${nomAuteur} ${prenomAuteur}\n qui est dans la catégorie: ${categorie}\n dont le résumé est :${resume} \n son adresse mail pour une éventuelle remarque est ${email}`;

        fetch("https://slack.com/api/chat.postMessage", {
            method: "POST",
            headers: new Headers({
                "Authorization": "Bearer entrer ici votre TOKEN",
                "Content-type": "application/json"
            }),
            body: JSON.stringify({
                channel: "C025S0HC540",
                text: suggestion
            })
        })
        .then(function(response) {
            if (response.ok) {
                console.log("Message bien envoyé");
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