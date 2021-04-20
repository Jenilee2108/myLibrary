<?php ob_start();
?> <!-- Fonction pour injecter le header -->


<section class="gestion_info container">
    <h1>Tableau de bord de <?= $_SESSION['pseudo']; ?></h1>
        <h3>Mes infos</h3>
           
            <label for="mail">E- mail : </label>
                <input class="input" type="email" name="mail" id="mail" value="<?= $_SESSION['mail']?>">   
           
            <label for="password">Prénom : </label>
                <input class="input" type="password" name="password" id="password" value="<?= $_SESSION['password'] ?>">
            
        <h6><a href="indexAdmin.php?action=infos" class="btn-menu">Gérer mes infos</a></h6>
</section>
<section class="container ">
    <h2>Tous les livres de votre bibliothèque A CHANGER AVEC LA TABLE BI</h2>
    <section class="article_about">
        <?php foreach($allComms as $comm){ ?>
            <article class="article">            
                <h4><?= htmlspecialchars($comm['title']); ?>  de <?= htmlspecialchars($comm['name_author']); ?> </h4>
                <h6 class="center">ajouté par: <?= htmlspecialchars($comm['pseudo']); ?> le <?= htmlspecialchars($comm['date_ajout']);?></h6>
                    <?= '<p>'. htmlspecialchars($comm['sujet']);  '</p>'?>
                    <?= '<p>'. htmlspecialchars($comm['content']); '</p>' ?>
            </article>
        <?php }; ?> 
    </section> 
        <h3><a href="indexAdmin.php?action=mesComms&pseudo=<?= $_SESSION['pseudo'];?>">Les comms de <?= $_SESSION['pseudo'];?></a></h3>
        <h3><a href="indexAdmin.php?action=mesLivres&pseudo=<?= $_SESSION['pseudo'];?>">Les livres de la bibliothèque de <?= $_SESSION['pseudo'];?></a></h3>
        <!-- <a href="indexAdmin.php?action=modifLivres">Gérer mes livres</a> -->          
</section>
<section class="container">
    <h2>Derniers Livres ajoutés</h2>
    <section class="article_about">
        <?php foreach($allLivres as $livre){ ?>
            <article class="article">
                <h4><?= htmlspecialchars($livre['title']); ?> de <?= htmlspecialchars($livre['name_author']); ?></h4>
                    <?= '<p>'.htmlspecialchars($livre["content"]);'</p>'; ?>
            </article>
        <?php }; ?>                             
    </section>        
        <h3><a href="indexAdmin.php?action=mesLivres&pseudo=<?= $_SESSION['pseudo'];?>">Les livres de la bibliothèque de <?= $_SESSION['pseudo'];?></a></h3>
        <!-- <a href="indexAdmin.php?action=modifLivres">Gérer mes livres</a> -->                 
</section>


<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>