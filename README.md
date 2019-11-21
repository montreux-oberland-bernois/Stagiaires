# Stage Informatique MOB 2019

Solutions des exercices réalisés lors du stage au MOB.

## Jeu du Plus ou Moins (HTML/CSS + JS)

-	L’application doit générer aléatoirement un chiffre entre 1 et 10.
-	L’application nous retournera si le chiffre à deviner est plus grand ou plus petit.
-	L’utilisateur aura une limite d’essais.
-	L’application vérifie que l’utilisateur entre un chiffre valide.

## Formulaire PHP + Implémentation de SQL

Cet exercice a pour but de créer un formulaire HTML permettant à un utilisateur de s’inscrire sur le site. L’objectif est de valider les données saisies par l’utilisateur puis de les réafficher dans les champs en indiquant si l’opération a réussie.

## Exercice Bonus: Clé de contrôle des véhicules ferroviaires 

En principe, chaque véhicule ferroviaire dispose d’un numéro d’identification unique le distinguant de tout autre véhicule ferroviaire. Chaque loc, chaque automotrice et chaque voiture est identifiée par un numéro à douze chiffres.

Les codes suivants indiquent:
-	le type de véhicule et indication de l’aptitude à l’interopérabilité  (97 = Engin électrique de manœuvre),
-	le pays (85 = Suisse),
-	le type et le genre de véhicule (1 923),
-	ainsi que le numéro de série (002).
-	Le chiffre 0 situé après le tiret est un chiffre d’autocontrôle pour la vérification informatique.

C’est ce dernier qui nous intéresse. Elle se calcule en multipliant alternativement par 2 et par 1, de la droite à la gauche, tous les chiffres du numéro de wagon. Ensuite, on calcule la somme de tous les chiffres obtenus, en considérant individuellement chacun des chiffres même ceux formant un nombre égal ou supérieur à 10. Le complément de ce total à la dizaine supérieure donne l'autocontrôle. Celui-ci s'écrit à la suite du numéro de wagon, séparé de ce dernier par un trait d'union.
