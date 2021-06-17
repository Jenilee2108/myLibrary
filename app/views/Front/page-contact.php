<?php ob_start();
$titre = "Contactez-nous"; ?>
<section>
    <div class="center container">

        <label for="mail" class="gold label-article">Votre e-mail :</label>
        <input type="email" id="mail" name="user_mail" placeholder="Entrez votre adresse e-mail" nom="Entrez votre adresse e-mail">

        <label for="nom" class="gold label-article">Votre nom: </label>
        <input type="text" id="nom" name="nom" class="categorieLivre" placeholder="Entrez votre nom" title="Entrez votre nom">

        <label for="demande" class="gold label-article">Votre demande: </label>
        <textarea type="text" id="demande" name="demande" class="demande" placeholder="Entrez votre message" title="Entrez votre message"></textarea>

    </div>
    <button class="btn center" id="suggerer">Envoyer</button>
</section>
<!-- pour l'envoi du message en messagerie -->
<script type="text/javascript">
    document.getElementById("suggerer").addEventListener("click", () => {
        // on récupère les données
        let email = document.getElementById("mail").value;

        let nom = document.getElementById("nom").value;
        let demande = document.getElementById("demande").value;


        // on crée le message envoyé par le bot
        let message = `Nouveau Message de ${nom}\n pour dire: ${demande}\n son adresse mail pour une éventuelle remarque est ${email}`;
        //On utilise l'API slack pour envoyer le message vers l'application
        fetch("https://slack.com/api/chat.postMessage", {
                method: "POST",
                headers: new Headers({
                    "Authorization": "Bearer "+"xoxb-1652229429777-1685440012003-3PLmsXMgah9tRAnJWdNWsqpc",
                    "Content-type": "application/json"
                }),
                body: JSON.stringify({
                    channel: "C01L23QCM29",
                    text: message
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