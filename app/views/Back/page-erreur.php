<?php ob_start(); ?>
<h2 class="gold">Erreur</h2>


    <p>Désolée, vous ne pouvez acceder à cette page.
    Merci de retourner à la <a href="accueil">page d'accueil</a></p>
<?php $content = ob_get_clean(); ?>
<?php require 'Templates/template.php'; ?>