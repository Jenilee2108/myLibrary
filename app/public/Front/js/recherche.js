$(document).ready(function(){
    // // gestion de la frappe
    // $('#searchBar').addEventListener('keyup',(function(){
    //     // récupération de ce qui est tapé en barre de recherche
    //     let recherche = $(this).val();
    //     // on commence à partir de 3 caractères
    //     if(recherche <= 3) {
    //     // 
    //         $.ajax({
    //             type:'GET',
    //             url: 'function',
    //             data: 'search='+encodeURIComponent(recherche),

    //         })
    //     }
    //     // console.log(recherche);
    // })
    // )
// not exactly vanilla as there is one lodash function

var allCheckboxes = document.querySelectorAll('input[type=checkbox]');
var allLivres = Array.from(document.querySelectorAll('.card-livre'));
var checked = {};
getChecked('author');
getChecked('category');

Array.prototype.forEach.call(allCheckboxes, function (el) {
    el.addEventListener('change', toggleCheckbox);
});

console.log(checked);
function toggleCheckbox(e) {
    getChecked(e.target.name);
  setVisibility();
}

function getChecked(name) {
    checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
        return el.value;
  });
}

function setVisibility() {
  allLivres.map(function (el) {
      var author = checked.author.length ? _.intersection(Array.from(el.classList), checked.author).length : true;
      var category = checked.category.length ? _.intersection(Array.from(el.classList), checked.category).length : true;

      console.log(author);
      console.log(category);
      
      if (author && category) {
          el.style.display = 'block';
        } else {
            el.style.display = 'none';
        }
    });
}})