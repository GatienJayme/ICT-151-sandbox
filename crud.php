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
        $query = 'INSERT INTO filmmakers (filmmakersnumber, lastname, firstname, birthname, nationality)
                    VALUES (:filmmakersnumber, :lastname, :firstname, :birthname, :nationality)';
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
    try {
        $dbh = getPDO();
        $query = 'SELECT * FROM filmmakers WHERE id=:id';
        $statement = $dbh->prepare($query); // prepare query
        $statement->execute(['id' => $id]); // execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC); // prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return null;
    }
}

//
function getFilmMakers()
{

}

//
function getFilmMakerByName($name)
{
    try {
        $dbh = getPDO();
        $query = 'Select * from WHERE lastname =:name';
        $statement = $dbh->prepare($query); // prepare query
        $statement->execute(['lastname' => $name]); // execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC); // prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        return null;
    }
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
        $query = 'DELETE FROM filmmakers
                    WHERE id = :id';
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