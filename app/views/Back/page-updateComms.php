<?php ob_start();
 
 $livres= $editLivre->fetch(); ?>

<section class="article center">
    <article class="article center">
        <h2><?= htmlspecialchars($livres['title']); ?> de <?= htmlspecialchars($livres['author']); ?></h4>
       
        <div class="form_article center">
            <p class="article_title">
                <?= htmlspecialchars($livres['content']); ?>
            </p>
            <form action="indexAdmin.php?action=updateLivre&id=<?= $livres['id']; ?>" method="POST">
                
                <label for="comContent">Modifiez votre commentaire: </label>
                <textarea class="comContent" name="comContent" id="comContent" cols="30" rows="10">
                    <?= htmlspecialchars($livres['comContent']); ?>
                </textarea>
                
                <div class="subBtn">
                    <button type="submit" class="btn bt-secondary" data-dismiss="modal">editer</button>
                </div>
            </form>
        </div>
    </article>
</section>

<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>