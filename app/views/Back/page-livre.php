<?php 
@session_start();
if (!isset($_SESSION["user"])) {
    header("Location: indexAdmin.php?action=connexion");
    exit;
}
ob_start();
?>

<section>
    <article>
        <h1><?= strip_tags($livre["title"]); ?></h1> 
        écrit par : <h2><?= strip_tags($livre["author"]); ?></h2>
        <h3>Synopsys : </h3>
        <p><?= strip_tags($livre["content"]); ?></p>
        <h5>catégorie : <?= strip_tags($livre["category"]) ?></h5>
    </article>
</section>
<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>