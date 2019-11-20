<?php
/**
 * Exercice effectué durant le stage d'infomaticien
 *
 * getControlNumber
 * Return control UIC number
 *
 * @param null $uic
 * @return bool|float|int
 */
function getControlNumber($uic = null)
{
    // On vérifie que le numéro donné fait 11 caractères
    if(strlen($uic) != 11) {
        return false;
    }

    // On découpe le numéro en tableau
    $numbers = str_split($uic);

    // On initialise le tableau
    $controlNumber = [];

    // On itère sur chaque chiffre du numéro
    foreach($numbers as $key => $number) {
        // On regarde si on doit le multiplier par 2 ou par 1
        if(($key+1)%2 == 0) {
            $controlNumber[] = $number;
        } else {
            $number = $number*2;
            // Si le résultat est plus grand que 9 (deux caractères et plus)
            // il sera découpé le en deux et ajouté au tableau
            foreach (str_split($number) as $nbsplit) {
                $controlNumber[] = $nbsplit;
            }
        }
    }
    // Somme
    $sum = array_sum($controlNumber);
    // Somme arrondi à dix
    $sumRounded = round($sum/10)*10;

    // On retourne le somme arrondi moins la somme
    return $sumRounded-$sum;
}

var_dump(getControlNumber(97851923002));
