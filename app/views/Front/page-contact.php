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
                    <!--</td>
                    <td class="input-formulaire">-->
                        <input type="text" id="nomContact" name="nom" class="categorieLivre" placeholder="Entrez votre nom" title="Entrez votre nom">
                    </td>
                </tr><!-- Fin de la ligne de nom -->

                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article">
                        <label for="demandeContact">Votre demande: </label>
                   <!--</td>
                    <td class="input-formulaire">-->
                        <textarea id="demandeContact" name="demande" class="demande" placeholder="Entrez votre message" title="Entrez votre message"></textarea>
                    </td>
                </tr>
                <tr class="formulaire center">
                    <!-- <td></td>-->
                    <td class="input center">
                        <button class="btn center" id="suggerer">Envoyer</button>
                    </td>
                </tr><!-- Fin de la ligne de demande -->
            </table>
        </div>
    </article>
</section>

<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>
