<?php
require_once ('./assets/php/fonctions.php');

function getAllMotifs(){
	$bdd = new DB();

	$sql='SELECT * FROM `motif`';
	$reponse=SQLSelect($sql);

	return $reponse;
}