<?php
require_once ('./assets/php/fonctions.php');

function addClient($nom, $prenom, $naissance, $residence, $lieu, $numero, $numeroW, $employeur, $profession, $assur, $assurance, $rdv, $objet){
	$bdd = new DB();

	$sql =$bdd->db->PREPARE('INSERT INTO `client`(`id`, `noms`, `naissance`, `lieu`, `tel`, `whatsapp`, `street`, `employeur`, `profession`, `rdv`, `assurance`, `objet`, `nomAssurance`) VALUES (Default, :noms, :naissance, :lieu, :tel, :whatsapp, :street, :employeur, :profession, :rdv, :assurance, :objet, :nomAssurance)');
        $sql->EXECUTE(array(
            "noms" => $nom." ".$prenom, 
            "naissance" => $naissance, 
            "lieu" => $lieu, 
            "tel" => $numero, 
            "whatsapp" => $numeroW, 
            "street" => $residence, 
            "employeur" => $employeur, 
            "profession" => $profession, 
            "rdv" => $rdv, 
            "assurance" => $assur, 
            "objet" => $objet, 
            "nomAssurance" => $assurance,
        ));
}


function getAllClients(){
	$bdd = new DB();

	$sql='SELECT * FROM `client` ORDER BY `id` DESC';
	$reponse=SQLSelect($sql);

	return $reponse;
}