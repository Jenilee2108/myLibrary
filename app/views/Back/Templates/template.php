<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mon espace de gestion administrateur</title>

    <link rel="stylesheet" href="app\public\Back\css\style.css" >
 
</head>
<body>
<header class="container-fluid">
        <div class="row">
            <div class="logo">
                <a href="myLibrary/index.php"> <img src="assets\images\Logo.png" alt="Logo My library- livres a portée de Main"></a>
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