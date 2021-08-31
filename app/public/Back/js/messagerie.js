    document.getElementById("suggerer").addEventListener("click", () => {
        // on récupère les données
        let email = document.getElementById("mail").value;
        let nom = document.getElementById("pseudo").value;

        let categorie = document.getElementById("category").value;
        let nomAuteur = document.getElementById("name_author").value;
        let prenomAuteur = document.getElementById("firstname_author").value;
        let titre = document.getElementById("title").value;
        let resume = document.getElementById("synopsis").value;
        
        
        // on crée la suggestion envoyé par le bot
        let suggestion = `${nom} Propose le livre: ${titre}\n écrit par: ${nomAuteur} prénom: ${prenomAuteur}\n qui est dans la catégorie: ${categorie}\n dont le résumé est :${resume} \n son adresse mail pour une éventuelle remarque est ${email}`;
        //On utilise l'API slack pour envoyer la suggestion vers l'application
        fetch("https://slack.com/api/chat.postMessage", {
            method: "POST",
            headers: new Headers({
                "Authorization": "Bearer "+"<?= $_ENV['SUGGTOK']; ?>",
                "Content-type": "application/json"
            }),
            body: JSON.stringify({
                channel: "C025S0HC540",
                text: suggestion
            })
        })
        .then(function(response) {
            if (response.ok) {
                console.log("Suggestion bien envoyée");
            } else {
                console.log("Mauvaise réponse du réseau");
            }
        })
        .catch(function(error) {
            console.log("Probleme avec l'opération de fetch" + error.message);
        });
    });