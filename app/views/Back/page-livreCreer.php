<?php ob_start(); ?>

<section class="article center">   
        <form action="indexAdmin.php?action=creatLivre" method="POST">
            <div>
                <label for="title">Titre du livre: </label>
                <input class="title" name="title" value="">
            </div> 
            <div>
                <label for="category">Catégorie: </label>
                <input class="category" name="category" value="">
            </div> 
            <div>
                <label for="content">Synopsys: </label>
                <input class="content" name="content" value="">
            </div>


            <div class="subBtn">
                <button type="submit" class="btn bt-secondary" data-dismiss="modal">Ajouter</button>
            </div>
        </form>      
</section>

<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>
