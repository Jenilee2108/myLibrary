<?php 
@session_start();

var_dump($_SESSION);
if($_SESSION['user']['pseudo'] == null) {
    header("Location = indexAdmin.php?action=connexion");
    exit;
}
$pseudo = $_SESSION['user']['pseudo'];
// var_dump($_SESSION);
var_dump($pseudo);
// $user = $_SESSION;
$allLivres = $allLivres->fetchAll();
// var_dump($allLivres);
$allComms = $allComms->fetchAll();
// var_dump($allComms);
$titre = "Mon tableau de bord";
ob_start();

?> <!-- Fonction pour injecter le header -->

<!-- Partie des informations de l'utilisateur -->
<section class="gestion_info container">
    <h1>Tableau de bord de <?= $pseudo ?></h1>
        <h3>Mes infos</h3>           
            <legend for="mail">Mon E- mail de contact: </legend>
                <form method="POST" action="indexAdmin.php?action=updateInfo&pseudo=<?= htmlspecialchars($pseudo); ?>" >
                    <div> 
                    <label for="mail">Pour changer votre adresse mail <?= $_SESSION['user']['mail']?></label>
                    <input type="email" name="mail" value="<?= $_SESSION['user']['mail']?>"> 
                    </div>
                    <div>
                    <label for="password">Pour changer votre password</label>
                    <input type="password" name="password">   
                    </div>     
                    <button type="submit">Envoyer</button>
                </form>
        <h6><a href="indexAdmin.php?action=mesInfos&pseudo=<?= $pseudo ?>" class="btn-menu">Gérer mes infos</a></h6>
</section>



<!-- Affichage des derniers livres ajoutés -->
<section class="container">
<h2>Derniers Livres ajoutés</h2>
    <section class="article_about">
        <?php foreach($allLivres as $livre){ ?>
            <article class="article">
                <h4>
                    <?= htmlspecialchars($livre['title']); ?> de <?= htmlspecialchars($livre['name_author']); ?> 
                        - <a href="indexAdmin.php?action=deleteLivre&id=<?= $livre['id']; ?> ">x</a>
                        - <a href="indexAdmin.php?action=modifLivres&id=<?= $livre['id']; ?>">Modifier</a>
                         -<a href="indexAdmin.php?action=modifLivres&id=<?= $livre['id']; ?>">Ajouter a mes livres</a>
                 </h4>
                    <?= '<p>'.htmlspecialchars($livre["content"]);'</p>'; ?>
            </article>
        <?php }; ?>                             
    </section>      
<button><a href="indexAdmin.php?action=newLivre">Ajouter un livre</a></button>
        <!--  -->                 
</section>





<!-- Les livres associés au commentaire -->
<section class="container ">
    <h2>Retrouvez ici les livres que vous avez commentez </h2>
    <section class="article_about">
        <?php foreach($allComms as $comm){ ?>
            <article class="article">            
                <h4><?= htmlspecialchars($comm['title']); ?>  de <?= htmlspecialchars($comm['name_author']); ?> </h4>
                <h6 class="center">ajouté par: <?= htmlspecialchars($comm['pseudo']); ?> le <?= htmlspecialchars($comm['date_ajout']);?></h6>
                    <?= '<p> Votre note est de :'. htmlspecialchars($comm['note']).  '/20</p>' ?>
                    <?php if(!empty($comm['content'])) {
                        echo '<p>Votre Commentaire :'. $comm['content']. '</p>';
                    }           
                    ?>
            </article>
        <?php }; ?> 
    </section> 
     
        <h3><a href="indexAdmin.php?action=mesLivres&pseudo=<?= $pseudo;?>">Les livres de la bibliothèque de <?= $pseudo;?></a></h3>
        <!-- <a href="indexAdmin.php?action=modifLivres">Gérer mes livres</a> -->          
</section>



<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>