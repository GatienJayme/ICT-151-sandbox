<?php
/*  Program: sandbox
    Author: Gatien Jayme
    Date: 06.02.2020
    Version: 1.0
*/

function getAllItems()
{
    require '.const.php';
    try {
        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $password);
        $query = 'SELECT * FROM actors';
        $statement = $dbh->prepare($query); // prepare query
        $statement->execute(); // execute query
        $queryResult = $statement->fetchAll(); // prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return null;
    }
}

// Test unitaire de la fonction getAllItems
/*$items = getAllItems();
if(count($items) == 11) {
    echo"Réussi !!!!";
}
else {
    echo "BUG !!!!!!";
}*/
// fonction qui nous redonne un personnage précis en fonction de son nom ou son id
function getItem($id)
{
    require '.const.php';
    try {
        $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $password, $id);
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
}

// Test unitaire de la fonction geItem
$id = getItem($id);
if (getItem($id)[$id] == getItem($id)[$user]) {
    echo "OK !!!";
} else {
    echo "PAS OK !!!";
}
?>