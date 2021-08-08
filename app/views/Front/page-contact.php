<?php

use Dotenv\Repository\Adapter\EnvConstAdapter;

ob_start();
$titre = "Contactez-nous";
?>
<section class="container">
    <h1 class='center green'>Contacter <span class="gold bold"> My </span> library</h1>
    <article class="card container-livre card-livre center card-corps">
        <!-- Formulaire de contact -->
        <div class="card-corps">
            <table class="card container-livre card-livre center card-content">    
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article">
                        <label for="mailContact">Votre e-mail :
                    <!--</td>
                    <td class="input-formulaire">-->
                        <input type="email" id="mailContact" name="user_mail" placeholder="Entrez votre adresse e-mail" title="Entrez votre adresse e-mail">
                    </label></td>
                </tr><!-- Fin de la ligne de mail -->

                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article">
                        <label for="nomContact">Votre nom: </label>
                    </td>
                    <td class="input-formulaire">
                        <input type="text" id="nomContact" name="nom" class="categorieLivre" placeholder="Entrez votre nom" title="Entrez votre nom">
                    </td>
                </tr><!-- Fin de la ligne de nom -->

                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article">
                        <label for="demandeContact">Votre demande: </label>
                    </td>
                    <td class="input-formulaire">
                        <textarea id="demandeContact" name="demande" class="demande" placeholder="Entrez votre message" title="Entrez votre message"></textarea>
                    </td>
                </tr>
                <tr class="formulaire center">
                    <td></td>
                    <td class="input center">
                        <button class="btn center" id="suggerer">Envoyer</button>
                    </td>
                </tr><!-- Fin de la ligne de demande -->
            </table>
        </div>
    </article>
</section>
<!-- pour l'envoi du message en messagerie -->
<script type="text/javascript">
    document.getElementById("suggerer").addEventListener("click", () => {
        // on récupère les données
        let email = document.getElementById("mailContact").value;

        let nom = document.getElementById("nomContact").value;
        let demande = document.getElementById("demandeContact").value;


        // on crée le message envoyé par le bot
        let message = `Nouveau Message de ${nom}\n pour dire: ${demande}\n son adresse mail pour une éventuelle remarque est ${email}`;
        //On utilise l'API slack pour envoyer le message vers l'application
        fetch("https://slack.com/api/chat.postMessage", {
                method: "POST",
                headers: new Headers({
                    "Authorization": "Bearer " + "<?= $_ENV['CHATTOK'] ?>",
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
