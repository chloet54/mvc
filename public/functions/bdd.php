<?php
    try{
        $bdd= new PDO('mysql:host=localhost; dbname=livre;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(Execption $e){
        die('Erreur : '.$e->getMessage());
    }
?>