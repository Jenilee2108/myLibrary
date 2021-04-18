<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="une application pour avoir en poche les livres dont on dispose à la maison">
    <meta name="keywords" content="Livres application">
    <title>My Library - Mon espace de gestion</title>
    <link rel="stylesheet" href="/app/public/Front/css/style.css"/>

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
                                <div class="deconTemp">
                    <button > <a href="indexAdmin.php?action=meconnecter">Me connecter</a> </button>
                </div>
                <div class="deconTemp">
                    <button > <a href="indexAdmin.php?action=deconnexion">Déconnexion</a> </button>
                </div>
            </nav>
        </div>
</header>
        <!-- Insertion de la page demandée -->
        <?= $content ?>
        
<!-- Emplacement des scripts si besoin -->
    
    
</body>
</html>