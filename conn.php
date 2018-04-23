<?php

try {
    
    $strConnection ='mysql:host=localhost; dbname=underground';
    $pdo = new PDO ($strConnection, 'root', "");
    
} catch(PDOException $e){
    $msg= 'Erreur de connnection'.$e->getMesssage();
    die($msg);
    
}


?>