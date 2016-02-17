<?php

namespace POOExos\Classes;

class VehiculeManager
{
  private $_db; // Instance de \PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

   public function setDb(\PDO $db)
  {

    $this->_db = $db;
  }
  

  //Create

  public function add(Vehicule $vehicule)
  {
    $q = $this->_db->prepare('INSERT INTO vehicule SET marque = :marque, modele = :modele, couleur = :couleur, nb_roues = :nb_roues, prix = :prix, vitesse = :vitesse');


    $marque = $vehicule->getMarque();
    $modele = $vehicule->getModele();
    $couleur = $vehicule->getCouleur();
    $nb_roues = $vehicule->getNbRoues();
    $prix = $vehicule->getPrix();
    $vitesse = $vehicule->getVitesse();

    $q->bindValue(':marque', $marque);
    $q->bindValue(':modele', $modele);
    $q->bindValue(':couleur', $couleur);
    $q->bindValue(':nb_roues', $nb_roues);
    $q->bindValue(':prix', $prix);
    $q->bindValue(':vitesse', $vitesse);

   	$q->execute();

   	return $this->_db->lastInsertId();


  }

  //Read

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, marque, modele, couleur, nb_roues, prix, vitesse FROM vehicule WHERE id = '.$id);
    $donnees = $q->fetch(\PDO::FETCH_ASSOC);
    $vehicule =  new Camion();
    $vehicule->hydrate($donnees);

    return $vehicule;

  }

  //Update

    public function update(Vehicule $vehicule)
  {
    $q = $this->_db->prepare('UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, nb_roues = :nb_roues, prix = :prix, vitesse = :vitesse WHERE id = :id');

    $id = $vehicule->getId();
    $marque = $vehicule->getMarque();
    $modele = $vehicule->getModele();
    $couleur = $vehicule->getCouleur();
    $nb_roues = $vehicule->getNbRoues();
    $prix = $vehicule->getPrix();
    $vitesse = $vehicule->getVitesse();

    $q->bindValue(':id', $id);
    $q->bindValue(':marque', $marque);
    $q->bindValue(':modele', $modele);
    $q->bindValue(':couleur', $couleur);
    $q->bindValue(':nb_roues', $nb_roues);
    $q->bindValue(':prix', $prix);
    $q->bindValue(':vitesse', $vitesse);

    $q->execute();
  }

  //Delete



  public function delete(Vehicule $vehicule)
  {
    $this->_db->exec('DELETE FROM vehicule WHERE id = '.$vehicule->getId());
  }




}