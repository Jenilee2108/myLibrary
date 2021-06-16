<?php ob_start();
$titre = "Suggérez un livre"; ?>
<section>
    <form>
        <div>
            <label for="mail" class="gold label-article">e-mail :</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <div>
                <label for="title" class="gold label-article">Titre du livre: </label>
                <input type="text" id="title" name="title" class="categorieLivre" placeholder="Titre du lirvre">
            </div>
            <div>
                <label for="auteurLivre" class="gold label-article">Auteur: </label>
                <input type="text" id="name_author" name="name_author" class="auteurLivre" placeholder="Nom Auteur">
                <input type="text" id="firstname_author" name="firstname_author" class="auteurLivre" placeholder="Prénom Auteur">
            </div>
            <div>
                <label for="category" class="gold label-article">Catégorie: </label>
                <input type="text" id="category" name="category" class="categorieLivre" placeholder="Catégorie">
            </div>
        </div>
        <div class="synopsis-livre card-corps">
            <label for="content" class="gold label-article">Synopsis: </label>
            <input type="text" id="synopsis" name="content" class="lightGray" placeholder="Résumé ">

        </div>

        <button type="submit" class="btn">Envoyer</button>
    </form>
</section>
<!-- pour l'envoi de la suggestion -->
<script>
    document.getElementById("envoi").addEventListener("click", () => {
        let email = document.getElementById("mail").value;
        let nom = document.getElementById("nom").value;

        let categorie = document.getElementById("category").value;
        let nomAuteur = document.getElementById("name_author").value;
        let prenomAuteur = document.getElementById("firstname_author").value;
        let titre = document.getElementById("title").value;
        let resume = document.getElementById("synopsis").value;

        let suggestion = `:${nom} Propose le livre:\n  ${titre} écrit par: ${nomAuteur} ${prenomAuteur}\n qui est dans la catégorie: ${categorie}\n dont le résumé est :${resume} \n son adresse mail pour une éventuelle remarque est ${mail}`;
        console.log(message);
        console.log(texte);

        fetch("https://slack.com/api/chat.postMessage", {
            method: "POST",
            headers: new Headers({
                "Authorization": "Bearer xoxb-1652229429777-2184865386881-OC3vLwPld0ArosYowxxt4xym",
                "Content-type": "application/json"
            }),
            body: JSON.stringify({
                channel: "C025S0HC540",
                text: suggestion
            })
        });


    });
</script>
<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>