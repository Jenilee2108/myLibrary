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
        <!-- <a href="indexAdmin.php?action=infos">Gérer mes infos</a> -->
    </div>
    
    <div class="container ">            
        <section class="article_about">
            <div class="all_articles"><h2>Tous les Memos</h2>
            <div class="article">
  
           <?php foreach($allMemos as $memo){ ?>
                        <h4><?= htmlspecialchars($memo['title']); ?> de <?= htmlspecialchars($memo['author']); ?> </h4>
                            <p>                    
                                <?= htmlspecialchars($memo['sujet']); ?>
                            <br>
                                <?= htmlspecialchars($memo['content']); ?>
                            <br>
                                <h6>ajouté par: <?= htmlspecialchars($memo['user_pseudo']); ?> le <?= htmlspecialchars($memo['date_ajout']);?></h6>
                            </p> 
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