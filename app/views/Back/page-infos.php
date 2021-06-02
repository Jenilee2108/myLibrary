<?php
session_start();
var_dump($pseudo);
var_dump($_SESSION);
if (!isset($_SESSION["user"])) {
    header("Location: indexAdmin.php?action=tdb");
    exit;
}
ob_start();

$titre = "Mes informations";
?> <!-- Fonction pour injecter le header -->
    <?php 
        // $mesInfos = $mesInfos->fetchAll(); 
        // var_dump($_SESSION);
        // var_dump($_SESSION['user']);
        // var_dump($mesInfos);
    ?>   

<h1>Mes infos de <?= $pseudo; ?></h1>

<section class="form_contact">
   <form action="indexAdmin.php?action=updateInfo&pseudo=<?= htmlspecialchars($pseudo); ?>" method="POST">       
        <div>
            <label for="mail">E-mail : </label>
                <input type="email" name="mail" value="<?= htmlspecialchars($mesInfos['mail']) ?>">
        </div>
        <div>
            <label for="password">Password : </label>
                <input type="password" name="password" value="">
        </div>
        <div>
            <button type="submit">Mettre a jour</button>
        </div>    
    </form>        
        <div>
            <button class="delete-Btn"><a class="btn_delet" href="indexAdmin.php?action=deleteUser&pseudo=<?= htmlspecialchars($pseudo); ?>">Supprimer mon compte</button>
        </div>
</section>

<?php $content = ob_get_clean()?> <!-- Fontion php pour injecter le template -->
<?php require 'templates/template.php'?>