<?php

use POOExos\Classes\Vehicule;
use POOExos\Classes\VehiculeManager;
use POOExos\Classes\Voiture;
use POOExos\Classes\Camion;
use POOExos\Classes\Moto;
use POOExos\Interfaces\MoyensDeTransport;
use POOExos\Tools\Autoloader;


//Chargement des classes
require 'Tools/Autoloader.class.php'; 
Autoloader::register();

require 'config/config.php';

include(DIR_PATH.'html/header.html');

//Connexion à la BDD
$db = new \PDO('mysql:host=localhost;dbname=ecvdigital', 'root', '');


$vehicule = new Voiture();
$camion = new Camion();
$moto = new Moto();
$vehiculeManager = new VehiculeManager($db);

//Test méthode magique;
echo "<h3>Test méthode magique</h3>";
$vehicule->couleur = 'noir';


//Test VehiculeManager
echo "<h3>Test VehiculeManager</h3>";

echo "<div>-->Ajout</div>";
$vehicule->hydrate(array(
		'marque' => 'Opel',
		'modele' => 'Corsa',
		'couleur' => 'bleue',
		'nbRoues' => 4,
		'prix' => 20000,
		'vitesse' => 30
		)
	);

$id = $vehiculeManager->add($vehicule);
$vehicule->setId($id);

echo "<div>-->Lecture</div>";
$vehiculeAModifier = $vehiculeManager->get(5);

echo "<div>-->Modification</div>";
$vehiculeAModifier->accelerer();

$vehiculeManager->update($vehiculeAModifier);

echo "<div>-->Supression</div>";
$vehiculeManager->delete($vehicule);

//$camion->setNbRoues(8);
echo $camion->getNbRoues();

$vehicule->freiner();

echo "<h3>Test Héritage</h3>";

$vehicule->setVitesse(130);
$camion->setVitesse(130);
$moto->setVitesse(130);

$vehicule->accelerer();
$camion->accelerer();
$moto->accelerer();

echo "<div>-->Vitesse de la voiture : ".$vehicule->getVitesse()."</div>";
echo "<div>-->Vitesse de la voiture : ".$camion->getVitesse()."</div>";
echo "<div>-->Vitesse de la voiture : ".$moto->getVitesse()."</div>";

echo "<h3>Test Exceptions</h3>";

try{
	$vehicule->setVitesse(-10);
}catch(Exception $e){
	echo $e->getMessage();
}

echo "<h3>Test Reflexivité</h3>";

$classeVehicule = new \ReflectionClass('POOExos\Classes\Vehicule');

echo "<div>-->Est-ce que Vehicule implémente MoyensDeTransport ? </div>";
echo $classeVehicule->implementsInterface('POOExos\Interfaces\MoyensDeTransport') ? 'oui' : 'non';
echo "<div>-->Récupération de tous les attributs statiques de Véhicule</div>";
var_dump($classeVehicule->getStaticProperties());
echo "<div>-->Sommes nous dans le namespace POOExos\Classes\Vehicule ?</div>";
echo $classeVehicule->getNamespaceName(); 
echo "<div>-->Est-ce que l'attribut vitesse est publique ?</div>";
$propertyVitesseVehicule = new \ReflectionProperty('POOExos\Classes\Vehicule','vitesse');
echo $propertyVitesseVehicule->isPublic() ? 'oui' : 'non';
echo "<div>-->Est-ce que la méthode accélérer est un constructeur ?</div>";
$methodAccelererVehicule = new \ReflectionMethod('POOExos\Classes\Vehicule','accelerer');
echo $methodAccelererVehicule->isConstructor() ? 'oui' : 'non';


echo "<h3>Test Traits</h3>";
echo "<div>".$vehicule->hello()."<div>";
echo "<div>".$camion->hello()."<div>";
echo "<div>".$moto->hello()."<div>";

echo "<div>".$vehicule->getPrixFormate()."<div>";
echo "<div>".$moto->getPrixFormate()."<div>";


include(DIR_PATH.'/html/footer.html');