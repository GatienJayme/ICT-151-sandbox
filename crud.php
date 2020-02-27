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
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM filmmakers
INSERT INTO filmmakers (id, filmmakersnumber, lastname, firstname, birthname, nationality)
VALUES (4, 424, \'Luc-Franky\', \'Bernard\', \'1976-01-12\', \'Asiatique\')
SELECT * FROM filmmakers';
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

// Permet de modifier un film identifier par filmMaker
function updateFilmMaker($filmMaker)
{
    try {
        $dbh = getPDO();
        $query = "update filmmakers SET
    filmmakersnumber =: filmmakersnumber,
    firstname =: firstname,
    lastname =: lastname,
    birthname =: birthname,
    nationality =: nationality
    where id =: id";
        $statement = $dbh->prepare($query);
        $statement->execute($filmMaker);
        $dbh = null;
        return true;
    } catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage() . "<br/>";
    }
}

// Supprime un réalisateur de la base de donnée identifier par son id
function deleteFilmMaker($id)
{
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM filmmakers 
                DELETE FROM filmmakers 
                WHERE id = 4;';
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

?>