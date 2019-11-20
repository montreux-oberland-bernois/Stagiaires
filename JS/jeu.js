// Initialisation des variables
 var min = 1;
 var max = 10;
 var number = random(min, max);
 var usernumber;
 var maxusertry = 5;
 var usertry = 0;

 // On le fait tant qu'il lui reste des essais
 do {
    // On demande un numéro à l'utilisateur
    usernumber = parseInt(prompt(
	'Entrez un nombre entre 1 et 10\nVous avez ' + (maxusertry - usertry) 
		+ ' essai(s)'), 10);

    // On vérifie si l'entrée est un chiffre et que ça n'est pas vide
    if(isNaN(usernumber) || usernumber > max || usernumber < min) {
       alert('Veuillez entrer un nombre valide !');
      
    } else {
       // On incrémente le compteur d'essais de l'utilisateur
       usertry++;
      
       if(usernumber == number){
          // Si le chiffre à deviner est le même que le chiffre à deviner
          alert('Vous avez trouvé !\nEn ' + usertry + ' essais');
         
          // On sort de la boucle
          break;
         
       } else if(usernumber > number){
          // Si le chiffre à deviner est plus petit que le chiffre entré
          alert('Plus petit !');
         
       } else if(usernumber < number){
          // Si le chiffre à deviner est plus grand que le chiffre entré
          alert('Plus grand !');
         
       }
    }
 } while(usertry < maxusertry);
 
 // Si l'utilisateur n'a plus d'essais
 if(usertry == maxusertry){
    alert('Vous avez malheusement utilisé tous vos essais');
 }


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
