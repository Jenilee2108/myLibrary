$(document).ready(function(){

var allCheckboxes = document.querySelectorAll('input[type=checkbox]');
var allLivres = Array.from(document.querySelectorAll('.card-livre'));
var checked = {};
getChecked('author');
getChecked('category');

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


function setVisibility() {
    allLivres.map(function (el) {
        var author = checked.author.length ? intersection(Array.from(el.classList), checked.author).length : true;
        var category = checked.category.length ? _.intersection(Array.from(el.classList), checked.category).length : true;
        console.log(author);
      
      if (author && category) {
          array.forEach(el => {
              el.style.display = 'block';
          });
          
        } else {
            el.style.display = 'none';
        }
    });
}
});