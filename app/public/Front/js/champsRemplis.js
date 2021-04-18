$(document).ready(function(){
//Pour les variables associées aux champs à remplir
    let $pseudo = $('#pseudo'),
        $password = $('#password'),
        $name = $('#name'),
        $mail = $('#mail'),
        $category = $('#category');
        $searchBar = $('#searchBar');

//Pour vérifier le nombre de caractère
    $champs.keyup(function(){
        
        if($(this).val().length < 5){
            $(this).css({
                borderColor : '#800000'
            });
        }
        else{
            $(this).css({
                borderColor : '#2a623d'
            });
        }
    });

})