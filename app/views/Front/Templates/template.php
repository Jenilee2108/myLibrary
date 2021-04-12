<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>My Library - Ma bibliothèque à portée de main</title>
    <link rel="stylesheet" href="./app/public/Front/css/style.css"/>

</head>
<body>
    <header>
    <!-- Mise en place du header en 3 blocs-->
    <div class="row">
        <!-- Mise en place du logo -->
            <div class="logo">
                <a href="myLibrary/index.php"><img src="/app/public/Front/images/Logo.png" alt=" My library- Mes livres a portée de Main"></a>
            </div>
        <!-- Mise en place de la Searchbar -->
            <div class="searchBar">
                <label for="searchBar" class="none"></label>
                    <input type="search" name="searchBar" id="searchBar">
            </div>
        <!-- Mise en place du menu -->
        <nav class="flex container">
            <ul id="menuAccueil">
                <li><a href="#">My library</a></li>
                <li id="monCompte"><a href="#">Mon Compte</a></li>
            </ul>
        </nav>
    </div>
    </header>    
    
    <main class="container">        
        <?= $content; ?>
    </main>

    <footer>
        <div class="row flex">
            
        </div>
           <script type="text/javascript" src="./dist/app.js"></script>
        
        
    </footer>
</body>
</html>
