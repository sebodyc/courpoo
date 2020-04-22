<?php



//require_once 'autoload.php';
//autoload de composer
require_once 'vendor/autoload.php';

//require_once 'src/http/Request.php';
//require_once 'src/entity/Order.php';

use Application\Http\Request;
//use permet de pas a avoir a ecrire $request=Application\Http\Request a chaque fois
// je peux aussi faire ca use Application\Http\Request as jojo du coup je pourrais faire $request = new Jojo
// c'est bien pour eviter les probleme de doublon 
$request = new Request;



// La page ne doit être accessible que en POST, pas en GET ou autre
if (!$request->isMethod('POST')) {
    die("Hey ho, t'essaierais pas de m'enfler toi ? 🤔");
}

// Récupération des données


$nom = $request->get('nom', FILTER_SANITIZE_STRING);

$email = $request->get('email', FILTER_VALIDATE_EMAIL);

$montantHT = $request->getNumber('montant');





// Validation des données reçues
if (!$nom || !$email || !$montantHT) {
    die("Un des champs n'a pas été rempli correctement 😭");
}


$order = new Application\Entity\Order($nom, $email, $montantHT);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Confirmation !</h1>
    <p>Merci cher(e) <?= strtoupper($order->getNom())  ?>, merci de votre commande. Vous recevrez une confirmation sur <?= $order->getEmail() ?> très bientôt.</p>

    <p>Montant HT : <?= $montantHT ?> &euro;</p>
    <p>Montant TVA : <?= $order->getTva() ?> &euro;</p>
    <p>Montant TTC : <?= $order->getTotal() ?> &euro;</p>
</body>

</html>