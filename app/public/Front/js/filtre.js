$(document).ready(function(){

// on récupère les éléments des checkboxes
let allCheckboxes = document.querySelectorAll('input[type=checkbox]');
// on récupère les éléments container
let checked = {};
// On récupère la valeur des acatégories et auteur livres 
let selectAuteurs = document.querySelectorAll('article[data-auteur]');
let selectCategories = document.querySelectorAll('article[data-category]');
// On récupère chaque article
let article = document.querySelector('article[class=livreTrie]');

Array.prototype.forEach.call(allCheckboxes, function (el) {
    el.addEventListener('change', toggleCheckbox);
});

function toggleCheckbox(e) {
  //on récupère les catégories selectionnées
  let categories = getChecked(e.target.name);
  // On récupère les articles
  let allArticles = document.querySelectorAll("#library>article"); 
  console.log(allArticles);
  allArticles.forEach(article => article.classList.remove("hide"));
  
  if (categories.length > 0) {
    allArticles.forEach(article => article.classList.add("hide"));
    
    categories.forEach(category => {
    let showArticles = document.querySelectorAll("article[data-category="+category+"]");

      showArticles.forEach(article => {
        article.classList.remove('hide');
      });  
    });
  }
}

function getChecked(name) {
    checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
        return el.value;
    });
    console.log(checked[name]);
    return checked[name];
}
});