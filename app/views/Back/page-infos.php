<?php
ob_start();
/** si on n'a pas d'utilisateur connecté on va sur la page de connexion **/
if (!isset($_SESSION["user"])) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}
$titre = "Mes informations";
?>

<h1>Les <span class="gold"> infos</span> de <?= $pseudo; ?></h1>

<section class="card-corps">
    <!-- Formulaire de mise à jour des infos utilisateur -->
    <form action="indexAdmin.php?action=updateInfo" method="POST" class="article_commente container">
        <label for="mail" class="title-label" >E-mail : </label>
        <input type="email" name="mail" value="<?= htmlspecialchars($mesInfos['mail']) ?>">

        <label for="password" class="title-label" >Password : </label>
        <input type="password" name="password" value="">

        <div class="subBtn">
            <div type="submit" class="btn title-label">Mettre a jour</div>
            <a class=" btn title-label" href="indexAdmin.php?action=deleteUser&pseudo=<?= htmlspecialchars($pseudo); ?>">Supprimer mon compte</a>
        </div><!-- Fin de la div.subBtn avec les boutons-->
    </form><!-- Fin du formulaire -->
</section>
<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'Templates/template.php' ?>