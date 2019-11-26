// Initialisation des variables
var min = 1;
var max = 10;
var number = random(min, max);
var userNumber;
var maxuserTry = 5;
var userTry = 0;

// Affichage des total d'essais
document.getElementById("remainingTry").innerHTML = maxuserTry;

/**
 * game
 * Logique du jeu, executé lors du click sur le bouton
 */
function game() {
    // On récupère le numéro de l'utilisateur
    userNumber = document.getElementById("trial").value;

    // On vérifie si l'entrée est un chiffre et que ça n'est pas vide
    if(isNaN(userNumber) || userNumber > max || userNumber < min) {
        alert('Veuillez entrer un nombre valide !');
    } else {
        // On incrémente le compteur d'essais de l'utilisateur
        userTry++;
	
        if(userNumber == number){
	    // Si le chiffre à deviner est le même que le chiffre à deviner
            document.getElementById("game").style.display = "none";
            document.getElementById("finish").style.display = "block";
            document.getElementById("finishMsg").innerHTML = "Vous avez trouvé !<br>En " + userTry + " essais";

        } else if(userNumber > number){
            // Si le chiffre à deviner est plus petit que le chiffre entré
            alert('Plus petit !');

        } else if(userNumber < number){
            // Si le chiffre à deviner est plus grand que le chiffre entré
            alert('Plus grand !');

        }

        // On vide le champ
        document.getElementById("trial").value = ''

        // On met à jour les nombres d'essais
        document.getElementById("remainingTry").innerHTML = (maxuserTry - userTry);

        // Si l'utilisateur n'a plus d'essais
        if (userTry == maxuserTry){
            document.getElementById("game").style.display = "none";
            document.getElementById("finish").style.display = "block";
            document.getElementById("finishMsg").innerHTML = "Vous avez perdu !";
            return;
        }
    }
};



/**
 * random
 * @param min
 * @param max
 * @return int
 */
function random(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
