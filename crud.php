<?php
/*  Program: crud
    Author: Gatien Jayme
    Date: 27.02.2020
    Version: 1.0
*/


function getPDO()
{
    require '.const.php';
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $password);
    return $dbh;
}

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


// Permet de créer un réalisateur
function createFilmMaker($filmMaker)
{

}

//
function getFilmMaker($id)
{

}

//
function getFilmMakers()
{

}

//
function getFilmMakerByName($name)
{

}

// Permet de modifier un film identifier par son nom
function updateFilmMaker($filmMaker)
{

}

// Supprime un réalisateur de la base de donnée identifier par son id
function deleteFilmMaker($id)
{

}

?>