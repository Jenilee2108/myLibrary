document.getElementById("suggerer").addEventListener("click", () => {
    // on récupère les données
    let email = document.getElementById("mailContact").value;

    let nom = document.getElementById("nomContact").value;
    let demande = document.getElementById("demandeContact").value;


    // on crée le message envoyé par le bot
    let message = `Nouveau Message de ${nom}\n pour dire: ${demande}\n son adresse mail pour une éventuelle remarque est ${email}`;
    //On utilise l'API slack pour envoyer le message vers l'application
    fetch("https://slack.com/api/chat.postMessage", {
            method: "POST",
            headers: new Headers({
                "Authorization": "Bearer " + "<?= $_ENV['CHATTOK'] ?>",
                "Content-type": "application/json"
            }),
            body: JSON.stringify({
                channel: "C01L23QCM29",
                text: message
            })
        })
        .then(function(response) {
            if (response.ok) {
                console.log("Message bien envoyé");
            } else {
                console.log("Mauvaise réponse du réseau");
            }
        })
        .catch(function(error) {
            console.log("Probleme avec l'opération de fetch" + error.message);
        });
});