<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="une application pour avoir en poche les livres dont on dispose à la maison et en garder un commentaire">
    <meta name="keywords" content="application livre commentaire auteur memo notes">
    <title>My Library - <?= $titre ?? "Mon tableau de bord" ?></title>
    <!-- Feuille de style -->
    <link rel="stylesheet" href="app/public/Back/css/styleBack.css"/>
    <!-- Scripts -->
    <script src="app/public/Back/js/jquery-3.5.1.js" defer></script>
        <!-- pour l'envoi de la suggestion en messagerie -->
    <script type="text/javascript" src="app/public/Back/js/mesagerie.js" defer></script>
</head>

<body class="pagewidth container">
    <!-- Mise en place du header -->
    <header class="rowMenu">
        <!-- Partie logo -->
        <div class="logo">
            <a href="index.php"><img src="app/public/Front/images/Logo.png" alt="My library- Mes livres a portée de Main"></a>
        </div> <!--Fin de .logo -->
        <!-- Menu de navigation -->
        <nav class="navheader">
            <ul>
                <!-- Vérification qu'il y a un utilisateur connecté -->
                <?php if (@is_null($_SESSION["user"]) || $pseudo == null) : ?>
                    <!-- s'il n'y a pas d'utilisateur on s'inscrit ou se connecte -->
                    <li><a href="indexAdmin.php?action=inscription">M'inscrire</a></li>
                    <li><a href="indexAdmin.php?action=connexion">Me connecter</a></li>
                <?php else : ?>
                    <!-- S'i 'il y a un utilisateur il peut aller à son tdb ou se déconnecter -->
                    <li><a href="indexAdmin.php?action=suggestion">Suggestion de livre</a></li>
                    <li><a href="indexAdmin.php?action=tdb&pseudo=<?= $pseudo ??  $_SESSION['user']['pseudo']; ?>">Retour au tableau de bord</a></li>
                    <li><a href="indexAdmin.php?action=deconnexion">Déconnexion</a></li>
                <?php endif; ?>
            </ul>
        </nav><!-- Fin de la nav -->
    </header><!-- Fin du header -->
    <!-- Insertion de la page demandée -->
    <main>
        <?= $content ?>
    </main><!-- fin du main -->
</body><!-- fin du .pagewidth -->

</html>