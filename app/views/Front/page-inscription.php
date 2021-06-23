<?php ob_start();
/** Titre de la page **/
$titre = "inscritpion";
?>
<div id="pageInscription" class="container">
    <section id="connexion" class="container">
        <h1 class='center green'>Connecter à mon espace <span class="gold bold"> My</span>library</h1>
        <article class="card container-livre card-livre center">
            <!-- Formulaire de connexion -->
            <form action="indexAdmin.php?action=meconnecter" method="POST" class="card-corps">
                <table class="card container-livre card-livre center card-content">
                    <tr class="bg-gold green">
                        <td class="label-formulaire green label-article">
                            <label for="pseudo">Pseudo : </label>
                        </td>
                        <td class="input-formulaire">
                            <input type="text" name="pseudo" title="Votre pseudo" plalecholder="Votre pseudo">
                        </td>
                    </tr><!-- Fin de ligne pseudo-->
                    <tr class="bg-gold green">
                        <td class="label-formulaire green label-article">
                            <label for="password">Mot de passe : </label>
                        </td>
                        <td class="input-formulaire">
                            <input type="password" name="password" title="Votre mot de passe" plalecholder="Votre mot de passe">
                        </td>
                    </tr><!-- Fin de ligne password-->
                    <tr class="formulaire center">
                        <td></td>
                        <td class="input center">
                            <input class="center" type="submit" value="Me Connecter">
                        </td>
                    </tr><!-- Fin de ligne bouton submit-->
                </table>
            </form><!-- Fin du formulaire de connexion -->
        </article><!-- Fin de l'article de connexion -->
    </section>
    <section id="inscription" class="container">
        <h2 class="center green">Creer <span class="gold bold">Mon</span> Compte <span class="gold bold"> My</span>library</h2>
        <article class="card container-livre card-livre center">
            <!-- Espace contenu texte -->
            <form action="indexAdmin.php?action=createUser" method="POST" class="card-corps">
                <table class="card container-livre card-livre center card-content">
                    <tr class="bg-gold green">
                        <td class="label-formulaire green label-article">
                            <label for="pseudo">Pseudo : </label>
                        </td>
                        <td class="input-formulaire">
                            <input type="text" class="champs" id="pseudo" name="pseudo" title="Votre pseudo doit contenir au moins 5 caractères" plalecholder="Votre pseudo">
                        </td>
                    </tr><!-- Fin de ligne pseudo-->
                    <tr class="bg-gold green">
                        <td class="label-formulaire green label-article">
                            <label for="name_user" class="green label-article">Votre Prénom : </label>
                        </td>
                        <td class="input-formulaire">
                            <input type="text" class="champs" id="name_user" name="name_user" title="Votre nom d'utilisateur doit contenir au moins 5 caractères">
                        </td>
                    </tr><!-- Fin de ligne user_name-->
                    <tr class="bg-gold green">
                        <td class="label-formulaire green label-article">
                            <label for="mail" class="green label-article">Email : </label>
                        </td>
                        <td class="input-formulaire">
                            <input type="email" class="champs" id="mail" name="mail" title="Votre mail">
                        </td>
                    </tr><!-- Fin de ligne email-->
                    <tr class="bg-gold green">
                        <td class="label-formulaire green label-article">
                            <label for="password">Mot de passe : </label>
                        </td>
                        <td class="input-formulaire">
                            <input type="password" class="champs" id="password" name="password" title="Votre mot de passe doit contenir au moins 5 caractères" plalecholder="Votre mot de passe">
                        </td>
                    </tr><!-- Fin de ligne password-->
                    <tr class="formulaire center">
                        <td></td>
                        <td class="input center">
                            <input class="center" type="submit" value="Créer mon compte">
                        </td>
                    </tr><!-- Fin de ligne bouton submit-->
                </table>
            </form><!-- Fin du formulaire d'inscription -->
        </article><!-- Fin de l'article #inscription -->
    </section>
</div>
<!-- Fonction opur vérifier la longueur de ce qui est ecrit -->
<script src="app/public/Front/js/champsRemplis.js" type="text/javascript" defer></script>
<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>