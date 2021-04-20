<?php ob_start(); ?>

<section id="connexion">       
<h1 class='center'>Connexion à l'espace de gestion </h1>
        <form action="indexAdmin.php?action=meconnecter" method="POST">
            <table class="center formulaire">
                <tr class="formulaire center">
                    <td ><label for="pseudo">Votre pseudo:</label></td>
                    <td><input class="input" type="text" name="pseudo" id="pseudo" plalecholder="Votre pseudo "></td>
                </tr>
                <tr class="formulaire center">
                    <td ><label for="password">Votre mot de passe :</label></td>
                    <td><input class="input" type="password" name="password" id="password" plalecholder="Votre mot de passe"></td>
                </tr>
                <tr class="formulaire center">
                    <td></td>
                    <td class="input center"><input class="center" type="submit" value="Me Connecter"></td>
                </tr>
            </table>
        </form>
        <div class=" formulaire center input">
            <a href="indexAdmin.php" class="center">Créer mon profil</a>
        </div>
    </section>
  
<?php $content = ob_get_clean();
require "Templates/template.php" ?>