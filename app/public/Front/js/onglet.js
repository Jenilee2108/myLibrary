$(document).ready(function(){

//création des container
    $("#onglets").prepend("<article class='groupe'></article>");
    $("#onglets article").css("border-bottom","2px solid #2a623d");
//regroupement des onglets
    let $titres = $("#onglets :header");
    $titres.appendTo("#onglets article.groupe");
//Style des onglets
    $titres.css({
        "display":"inline-block",
        "padding":"0.2em 1em",
        "margin":"0 0.3em",
        "cursor":"pointer",
        "color":"#ccac00",
        "background":"#2a623d"
    });
//on affiche que le 1er choix
    $("#onglets div:gt(0)").hide();
//création d'une classe pour spécifique pour le 1er titre
    $titres.first().addClass("onglet-choisi");
//gestion du clic
    $titres.click(function(){
        //on cache toutes les div
        $("#onglets div").hide();
        //récupération de l'index courant pour afficher la div qui y correspond
        let i = $(this).index();
        $("#onglets div:eq("+i+")").show();
        //on retire la class du titre courant
        $titres.removeClass("onglet-choisi");
        $(this).addClass("onglet-choisi");
    });

})