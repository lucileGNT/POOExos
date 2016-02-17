<?php

/*use \Classes\Vehicule;
use \Classes\Camion;
use \Classes\MonTrait;*/
use MonApp\Classes\Vehicule;
use MonApp\Classes\VehiculeManager;
use MonApp\Classes\Voiture;
use MonApp\Classes\Camion;
use MonApp\Classes\Moto;
use MonApp\Interfaces\MoyensDeTransport;
use MonApp\Tools\Autoloader;




/*require "Classes/MonTrait.class.php";
require "Classes/Vehicule.class.php";
require "Classes/Camion.class.php";*/

//Chargement des classes
require 'Tools/Autoloader.class.php'; 
Autoloader::register();

//Connexion à la BDD
$db = new \PDO('mysql:host=localhost;dbname=ecvdigital', 'root', '');


$vehicule = new Voiture();
$camion = new Camion();
$moto = new Moto();
$vehiculeManager = new VehiculeManager($db);

//Test méthode magique;
echo "<div><strong>Test méthode magique</strong></div>";
$vehicule->couleur = 'noir';


//Test VehiculeManager
echo "<div><strong>Test VehiculeManager</strong></div>";

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

echo "<div><strong>Test Héritage</strong></div>";

$vehicule->setVitesse(130);
$camion->setVitesse(130);
$moto->setVitesse(130);

$vehicule->accelerer();
$camion->accelerer();
$moto->accelerer();

echo "<div>-->Vitesse de la voiture : ".$vehicule->getVitesse()."</div>";
echo "<div>-->Vitesse de la voiture : ".$camion->getVitesse()."</div>";
echo "<div>-->Vitesse de la voiture : ".$moto->getVitesse()."</div>";

echo "<div><strong>Test Exceptions</strong></div>";

try{
	$vehicule->setVitesse(-10);
}catch(Exception $e){
	echo $e->getMessage();
}

echo "<div><strong>Test Reflexivité</strong></div>";

$classeVehicule = new \ReflectionClass('MonApp\Classes\Vehicule');

echo "<div>-->Est-ce que Vehicule implémente MoyensDeTransport ? </div>";
echo $classeVehicule->implementsInterface('MonApp\Interfaces\MoyensDeTransport') ? 'oui' : 'non';
echo "<div>-->Récupération de tous les attributs statiques de Véhicule</div>";
var_dump($classeVehicule->getStaticProperties());
echo "<div>-->Sommes nous dans le namespace MonApp\Classes\Vehicule ?</div>";
echo $classeVehicule->getNamespaceName(); 
echo "<div>-->Est-ce que l'attribut vitesse est publique ?</div>";
$propertyVitesseVehicule = new \ReflectionProperty('MonApp\Classes\Vehicule','vitesse');
echo $propertyVitesseVehicule->isPublic() ? 'oui' : 'non';
echo "<div>-->Est-ce que la méthode accélérer est un constructeur ?</div>";
$methodAccelererVehicule = new \ReflectionMethod('MonApp\Classes\Vehicule','accelerer');
echo $methodAccelererVehicule->isConstructor() ? 'oui' : 'non';


echo "<div><strong>Test Traits</strong></div>";
echo "<div>".$vehicule->hello()."<div>";
echo "<div>".$camion->hello()."<div>";
echo "<div>".$moto->hello()."<div>";

echo "<div>".$vehicule->getPrixFormate()."<div>";
echo "<div>".$moto->getPrixFormate()."<div>";