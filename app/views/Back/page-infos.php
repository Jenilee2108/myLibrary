<?php
ob_start();
/** si on n'a pas d'utilisateur connecté on va sur la page de connexion **/
if (!isset($_SESSION["user"])) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}
$titre = "Mes informations";
?>

<h1>Mes infos de <?= $pseudo; ?></h1>

<section class="container card-corps">
    <!-- Formulaire de mise à jour des infos utilisateur -->
    <form action="indexAdmin.php?action=updateInfo" method="POST" class="article_commente container">
        <label for="mail">E-mail : </label>
        <input type="email" name="mail" value="<?= htmlspecialchars($mesInfos['mail']) ?>">

        <label for="password">Password : </label>
        <input type="password" name="password" value="">

        <div class="subBtn">
            <button type="submit" class="btn">Mettre a jour</button>
            <button class="btn"><a class="btn_delet" href="indexAdmin.php?action=deleteUser&pseudo=<?= htmlspecialchars($pseudo); ?>">Supprimer mon compte</button>
        </div><!-- Fin de la div.subBtn -->
    </form><!-- Fin du formulaire -->
</section>

<?php $content = ob_get_clean() ?>
<!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php' ?>