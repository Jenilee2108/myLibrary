<?php ob_start(); ?>
<!-- Fonction pour injecter le header -->

<h1>Tableau de bord de <?=$_SESSION['pseudo']?></h1>
    
<section class="card_gestion">
   <div class="card"><h3>Mes infos</h3>            
        <div class="form_contact">        
            <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname']?> ">
            
            <label for="mail">E- mail : </label>
                <input type="email" name="mail" id="mail" value="<?= $_SESSION['mail']?>">   
        </div>        
       <a href="indexAdmin.php?action=infos">Gérer mes infos</a> 
    </div>
    <?php var_dump($allMemos)?>
    <div class="container ">            
        <section class="article_about">
            <div class="all_articles"><h2>Tous les livres associé a un auteur</h2>           <div class="article">
  
           <?php foreach($allMemos as $memo){ 
           ?>
                        <h4><?= htmlspecialchars($memo['title']); ?> qui a été écrir par cet auteur:  <?= htmlspecialchars($memo['name_author']); ?> </h4>
                           
                    <?php }; ?>
                </div>
            </div>
        
        <section class="article_about">
            <div class="all_articles"><h2>Tous les livres écris par un auteur</h2>           <div class="article">
            <?php var_dump($sesLivres); ?>
           <?php foreach($sesLivres as $sonLivre){ ?>
                <h4><?= htmlspecialchars($sonLivre['title']); ?> qui a été écrir par cet auteur:  </h4>
            <?php }; ?>    
                </div>
            </div>
        
            <div class="card"><h3>
                <a href="indexAdmin.php?action=mesMemos&pseudo=<?= $_SESSION['pseudo'];?>">Les memos de <?= $_SESSION['pseudo'];?></a></h3>
            </div>
        </section>




        <section class="article_about">            
            <div class="all_articles"><h2>Tous les Livres</h2>
            
                <div class="article">
                <?php foreach($allLivres as $livre){ ?>
                        <h4><?= htmlspecialchars($livre['title']); ?> de <?= htmlspecialchars($livre['category']); ?> </h4>
                            <p>                    
                                <?= htmlspecialchars($livre['content']); ?>                                
                            </p>
                    <?php }; ?>
                </div>
            </div>            
            </div>
            <div class="card">
                <h3><a href="indexAdmin.php?action=mesLivres&pseudo=<?= $_SESSION['pseudo'];?>">Les livres de la bibliothèque de <?= $_SESSION['pseudo'];?></a></h3>
                <!-- <a href="indexAdmin.php?action=modifLivres">Gérer mes livres</a> -->
            </div>        
        </section>            
    </div>
</section>

<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>