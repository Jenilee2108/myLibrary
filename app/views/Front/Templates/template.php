<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="une application pour avoir en poche les livres dont on dispose à la maison">
    <meta name="keywords" content="Livres application">
    <title>My Library - <?= $titre ?? "Ma bibliothèque à portée de main" ?></title>
    <!-- Feuilles de style -->
    <link rel="stylesheet" href="app/public/Front/css/style.css" />
    <!-- Scripts -->
    <script src="app/public/Front/js/jquery-3.5.1.js" defer></script>
        <!-- Script du filtre -->
    <script type="text/javascript" src="app/public/Front/js/onglet.js" defer></script>
        <!-- Scripts de la barre de recherche -->
    <script type="text/javascript" src="app/public/Front/js/filtre.js" defer></script>
        <!-- pour l'envoi du message en messagerie -->
    <script type="text/javascript" src="app/public/Front/js/contact.js" defer></script>

</head>

<body>
    <div class="pagewidth container">
        <header>
            <!-- Mise en place du header en 3 blocs-->
            <div class="menuheader center container">
                <!-- Mise en place du logo -->
                <div class="logo">
                    <a href="index.php"><img src="app/public/Front/images/Logo.png" alt=" My library- Mes livres a portée de Main"></a>
                </div>
                <!-- Mise en place de la Searchbar -->
                <form role="search" action="index.php?action=search" class="recherche center" method="POST">
                    <button type="submit" class="labelSearch">Rechercher un livre</button>
                    <input type="search" id="searchBar" name="q" class="searchBar" minlength="3" title="Votre recherche doit contenir au moins 3 caractères">
                </form>
                <!-- Mise en place du menu -->
                <nav class="navheader center">
                    <ul id="menuAccueil">
                        <li><a href="index.php?action=library" class="green">My library</a></li>
                        <li id="monCompte"><a href="index.php?action=moncompte" class="green">Mon Compte</a></li>
                        <li id="meContacter"><a href="index.php?action=contact" class="green">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- insertion du contenue de la page appelée -->
        <main class="container">
            <?= $content ?>
        </main>
    </div>

    <footer>
        <div class="footer row container">
            <nav>
                <ul>
                    <li><a href="CGU">Mentions Légales</a></li>
                    <li>&#169;Tout Droit Réservé 2021</li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>