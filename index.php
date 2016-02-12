<?php

/*use \Classes\Vehicule;
use \Classes\Camion;
use \Classes\MonTrait;*/
use MonApp\Classes\Vehicule;
use MonApp\Classes\VehiculeManager;
use MonApp\Classes\Camion;
use MonApp\Tools\Autoloader;




/*require "Classes/MonTrait.class.php";
require "Classes/Vehicule.class.php";
require "Classes/Camion.class.php";*/

//Chargement des classes
require 'Tools/Autoloader.class.php'; 
Autoloader::register();

//Connexion à la BDD
$db = new \PDO('mysql:host=localhost;dbname=ecvdigital', 'root', '');


$vehicule = new Vehicule();
$camion = new Camion();
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


/*
$classeVehicule = new \ReflectionClass('Vehicule');

var_dump($classeVehicule->getProperties());

$vehicule->hello();
$camion->hello();

$moto= new Moto();
$moto->hello();*/