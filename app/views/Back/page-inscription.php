<?php ob_start(); ?>
<section  class="container">
     <!-- Boucle pour chaque livre -->
    <article id="inscription" class="card container-livre card-livre center">   
        <!-- Image d'illustration -->
        <figure class="card-img" ><img class="img-livre " src="/app/public/Front/images/DefautPhoto1.jpg" alt="Titre du livre"></figure>
    <!-- Espace titre -->        
        <h2 class="card-title green"><span class="gold bold">Mon</span> Compte</h2>
            <!-- Espace contenu texte -->
        <form action="indexAdmin.php?action=inscription" method="POST" class="card-corps">        
            <table class="card-content">
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article" ><label for="pseudo">Pseudo : </label></td>
                    <td class="input-formulaire"><input type="text" name="pseudo" id="pseudo" plalecholder="Votre pseudo"></td>
                </tr>
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article"><label for="name" class="green label-article">Nom : </label></td>
                    <td class="input-formulaire"><input type="text" name="name" id="name"></td>
                </tr>
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article"><label for="mail" class="green label-article">Email: </label></td>
                    <td class="input-formulaire"><input type="mail" name="mail" id="mail"></td>
                </tr>
                <tr class="bg-gold green">
                    <td class="label-formulaire green label-article"><label for="password">Mot de passe: </label></td>
                    <td class="input-formulaire"><input type="password" name="password" id="password" plalecholder="Votre mot de passe"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br><input type="submit" value="M'inscrire"></td>
                </tr>
            </table>                
        </form>
    </article>        
</section>


<?php $content =ob_get_clean(); ?>
<?php require 'Templates/template.php';?>