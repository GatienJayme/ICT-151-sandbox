<?php
/*  Program: sandbox
    Author: Gatien Jayme
    Date: 06.02.2020
    Version: 1.0
*/

try {
    $user = 'ICT-151';
    $password = 'eh bah non';
    $dbh = new PDO('mysql:host=localhost;dbname=mcu', $user, $password);
    foreach ($dbh->query('SELECT * from actors') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>