<?php
/*  Program: sandbox
    Author: Gatien Jayme
    Date: 06.02.2020
    Version: 1.0
*/

// Recharger la base de données pour être sûr à 100% des données de test

require '.const.php';
$cmd = "mysql -u $user -p$password < Restore-MCU-PO-Final.sql";
exec($cmd);

function getPDO()
{
    require '.const.php';
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $password);
    return $dbh;
}

function getAllItems()
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM actors';
        $statement = $dbh->prepare($query); // prepare query
        $statement->execute(); // execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC); // prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return null;
    }
}

// Test unitaire de la fonction getAllItems
/*$items = getAllItems();
if (count($items) == 11) {
    echo "Réussi !!!!";
} else {
    echo "BUG !!!!!!";
}
*/
// fonction qui nous redonne un personnage précis en fonction de son nom ou son id
/*function getItem($id)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM actors where id = $id';
        $statement = $dbh->prepare($query); // prepare query
        $statement->execute(); // execute query
        $queryResult = $statement->fetch(); // prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return null;
    }
}*/
/*
// Test unitaire de la fonction geItem
$id = getItem($id);
if (getItem($id)[$id] == getItem($id)[$user]) {
    echo "OK !!!";
} else {
    echo "PAS OK !!!";
} */

function getFilmMakerByName($name)
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM filmmakers where lastname = $name";
        $statement = $dbh->prepare($query);
        $statement->execute();
        $dbh = null;
        //return $;
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage() . "<br/>";
    }
}

function getFilmMaker($id, $filmMaker)
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM filmmakers where id = $id";
        $statement = $dbh->prepare($query);
        $statement = $dbh->execute($filmMaker);
        //return $;
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage() . "<br/>";
    }
}

function updateFilmMaker($item)
{
    try {
        $dbh = getPDO();
        $query = "update filmmakers SET
    filmmakersnumber =: filmmakersnumber,
    firstname =: firstname,
    latsname =: lastname,
    birthname =: birthname,
    nationality =: nationality
    where id =: id";
        $statement = $dbh->prepare($query);
        $statement->execute($item);
        $dbh = null;
        return true;
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage() . "<br/>";
    }
}

echo "Test unitaire de la fonction updateFilmMaker : ";
$item = getFilmMakerByName('Chamblon');
var_dump($item);
$id = $item['id']; // se souvenir de l'id pour comparer
$item['firstname'] = 'Gérard';
$item['lastname'] = 'Menfain';
updateFilmMaker($item);
$readback = getFilmMaker($id);
if (($readback['firstname'] == 'Gérard') && ($readback['lastname'] == 'Menfain')) {
    echo 'OK !!!';
} else {
    echo '### BUG ###';
}
echo "\n";
?>