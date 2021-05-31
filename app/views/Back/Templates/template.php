<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="une application pour avoir en poche les livres dont on dispose à la maison">
    <meta name="keywords" content="Livres application">
    <title>My Library - <?= $titre ?? "Mon tableau de bord" ?></title>
    <link rel="stylesheet" href="/app/public/Front/css/style.css" />

</head>

<body>
    <header class="container-fluid">
        <div class="row">
            <div class="logo">
                <a href="index.php"><img src="/app/public/Front/images/Logo.png" alt=" My library- Mes livres a portée de Main"></a>
            </div>
            <div id="searchBar" class="searchBar">

            </div>
            <nav class="btnAdmin">
                <ul>
                    <?php if ($_SESSION["user"]['pseudo'] == null) : ?>
                        <div class="deconTemp">
                            <li><a href="indexAdmin.php?action=inscription">M'inscrire</a></li>
                        </div>
                        <div class="deconTemp">
                            <li><a href="indexAdmin.php?action=connexion">Me connecter</a></li>
                        </div>
                    <?php else : ?>
                        <div class="deconTemp">
                            <li><a href="indexAdmin.php?action=tdb">Retour au tableau de bord</a></li>
                        </div>
                        <div class="deconTemp">
                            <li><a href="indexAdmin.php?action=deconnexion">Déconnexion</a></li>
                        </div>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Insertion de la page demandée -->
    <?= $content ?>

    <!-- Emplacement des scripts si besoin -->


</body>

</html>