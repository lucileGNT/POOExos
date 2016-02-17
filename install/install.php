<?php

/*
 * Install the database
 */
require_once '../config/config.php';

//HTML
include(DIR_PATH.'html/header.html');

echo "<h1>Installation</h1>";

try {
    $dbh = new PDO('mysql:host='.SERVER_NAME.';dbname='.DB_NAME, DB_USR, DB_PWD);

    $dbCreationQuery='';
    $dbCreationQuery=file_get_contents ("ecvdigital.sql");
    $stmt = $dbh->prepare($dbCreationQuery);
    if ($stmt){
        $res = $stmt->execute();
        echo "<div>-->La base a correctement été installée</div>";
    }else{
        echo "<div>-->Erreur lors de l'installation de la base</div>";
        die;
    }
    
    $dataInsertionQuery=file_get_contents ("datatest.sql");

    $stmt = $dbh->prepare($dataInsertionQuery);
    if ($stmt){
        $res = $stmt->execute();
        echo "<div>-->Les données de test ont été correctement insérées</div>";
    }else{
        echo "<div>-->Erreur lors de l'insertion des données de test</div>";
        die;
    }

}catch (PDOException $e){
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}



include(DIR_PATH.'/html/footer.html');
?>
