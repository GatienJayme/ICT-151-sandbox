
<?php
/*  Program: test crud
    Author: Gatien Jayme
    Date: 27.02.2020
    Version: 1.0
*/
require ("crud.php");

function testCreate() {
    echo"Test Create :";
    if($filmMakers['firstname'] == 'Joe') {
        ['firstname' = 'Joe',
            'lastname' = 'Dalton'];
    }
    echo"Test Create: OK \n";
}

function testGetAll() {
    echo"Test GetAll: OK \n";
}

function testGetOne() {
    echo"Test GetOne: OK \n";
}

function testUpdate() {
    echo"Test Update: OK \n";
}

function testDelete() {
    echo"Test Delete: OK \n";
}

testCreate();
testGetAll();
testGetOne();
testUpdate();
testDelete();
?>