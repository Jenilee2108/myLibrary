$(document).ready(function(){

// on récupère les éléments des checkboxes
let allCheckboxes = document.querySelectorAll('input[type=checkbox]');
// on récupère les éléments container
let checked = {};
// On récupère les auteurs et catégories selectionnée
let checkedAuthor = getChecked('author');
let chekedCategory = getChecked('category');
// On récupère la valeur des acatégories et auteur livres 
let selectAuteurs = document.querySelectorAll('article[data-auteur]');
let selectCategories = document.querySelectorAll('article[data-category]');
// On récupère chaque article
let article = document.querySelector('article[class=livreTrie]');
Array.prototype.forEach.call(allCheckboxes, function (el) {
    el.addEventListener('change', toggleCheckbox);
});

function toggleCheckbox(e) {
    getChecked(e.target.name);
    console.log(e.target.name);
    setVisibility();
}

function getChecked(name) {
    checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
        return el.value;
    });
    console.log(checked[name]);
}
document.getElementsByClassName('filters').addEventListener('click', function(event) {

function filter() {
  if(checkedAuthor !== selectAuteurs && chekedCategory !== selectCategories) {
   article.attr("hidden","true")
  } else {
    article.attr("hidden","true")  
  }
}
})
});