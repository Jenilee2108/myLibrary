<?php 
    ob_start();
    /** Titre de la page **/
    $titre = "inscritpion";
?>
<section  class="container">
    <article id="inscription" class="card container-livre card-livre center">
        <h2 class="card-title green"><span class="gold bold">Mon</span> Compte</h2>
            <!-- Espace contenu texte -->
        <form action="indexAdmin.php?action=createUser" method="POST" class="card-corps">        
            <table class="card-content">
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article" ><label for="pseudo">Pseudo : </label></td>
                    <td class="input-formulaire"><input type="text" name="pseudo" id="pseudo" plalecholder="Votre pseudo"></td>
                </tr><!-- Fin de ligne pseudo-->
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article"><label for="name_user" class="green label-article">Votre Prénom : </label></td>
                    <td class="input-formulaire"><input type="text" name="name_user" id="name_user"></td>
                </tr><!-- Fin de ligne user_name-->
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article"><label for="mail" class="green label-article">Email : </label></td>
                    <td class="input-formulaire"><input type="email" name="mail" id="mail"></td>
                </tr><!-- Fin de ligne email-->
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article"><label for="password">Mot de passe : </label></td>
                    <td class="input-formulaire"><input type="password" name="password" id="password" plalecholder="Votre mot de passe"></td>
                </tr><!-- Fin de ligne password-->
                <tr>
                    <td></td>
                    <td><br><input type="submit" value="Créer mon compte"></td>
                </tr><!-- Fin de ligne bouton submit-->
            </table>
        </form><!-- Fin du formulaire d'inscription -->
    </article><!-- Fin de l'article #inscription -->
</section>


<?php $content =ob_get_clean(); ?>
<script src="app/Public/Front/js/champsRemplis.php"></script>
<?php require 'Templates/template.php';?>