<?php

namespace POOExos\Classes;

/**
 * Classe définissant un VehiculeManager
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */

class VehiculeManager
{
  private $_db; // Instance de \PDO


  /**
   * Constructeur de la classe
   *
   * @return VehiculeManager object
   */
  public function __construct($db)
  {
    $this->setDb($db);
  }

   public function setDb(\PDO $db)
  {

    $this->_db = $db;
  }
  

  /**
   * Ajoute un objet Vehicule en base
   *
   * @param Vehicule $vehicule l'objet Vehicule à insérer
   *
   * @return int l'id du Vehicule inséré
   */

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

  /**
   * Récupère un objet Vehicule en base
   *
   * @param int $id l'id du Vehicule à récupérer
   *
   * @return Vehicule un objet contenant le véhicule récupéré
   */

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, marque, modele, couleur, nb_roues, prix, vitesse FROM vehicule WHERE id = '.$id);
    $donnees = $q->fetch(\PDO::FETCH_ASSOC);
    $vehicule =  new Camion();
    if (!empty($donnees)){
      $vehicule->hydrate($donnees);
    }

    return $vehicule;

  }

  /**
   * Modifie un objet Vehicule en base
   *
   * @param Vehicule $vehicule l'objet Vehicule à modifier
   *
   * @return void
   */

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

  /**
   * Supprime un objet Vehicule en base
   *
   * @param Vehicule $vehicule l'objet Vehicule à suprimer
   *
   * @return void
   */
  public function delete(Vehicule $vehicule)
  {
    $this->_db->exec('DELETE FROM vehicule WHERE id = '.$vehicule->getId());
  }




}