$(document).ready(function (){
//Pour les variables associées aux champs à remplir
    let $pseudo = $('#pseudo'),
        $password = $('#password'),
        $name = $('#name_user'),
        $mail = $('#mail'),
        $category = $('#category')
        $champs =$('.champs');;
    //Pour vérifier le nombre de caractère
        $champs.keyup(function(){
        if($(this).val().length < 5){
            //Le cadre devient vert a partir de 5 caractères
            $(this).css({
                borderColor : '#800000'
            });
        }
        else{
            // le cadre devient rouge tant qu'il n'y a pas 5 caractères
            $(this).css({
                borderColor : '#2a623d'
            });
        }
    });

})