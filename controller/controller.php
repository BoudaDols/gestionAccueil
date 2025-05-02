<?php
require('./models/clientModel.php');
require('./models/motifModel.php');
require('./models/userModel.php');
/*require('./model/paiementModel.php');
require('./model/organismeModel.php');
require('./model/agenceModel.php');*/

function accueil(){
	require('./view/login.php');
}


function addNewClient(){
    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['naissance']) AND isset($_POST['lieu']) AND isset($_POST['numero']) AND isset($_POST['numeroW']) AND isset($_POST['employeur']) AND isset($_POST['profession']) AND isset($_POST['rdv']) AND isset($_POST['objet'])){

        $assur = false;
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $naissance = htmlspecialchars($_POST['naissance']);
        $residence = htmlspecialchars($_POST['residence']);
        $lieu = htmlspecialchars($_POST['lieu']);
        $numero = htmlspecialchars($_POST['numero']);
        $numeroW = htmlspecialchars($_POST['numeroW']);
        $employeur = htmlspecialchars($_POST['employeur']);
        $profession = htmlspecialchars($_POST['profession']);
        $assurance = htmlspecialchars($_POST['assurance']);
        $rdv = htmlspecialchars($_POST['rdv']);
        $objet = htmlspecialchars($_POST['objet']);

        if(empty($assurance))
            $assur = false;
        else
            $assur = true;

        $result = addClient($nom, $prenom, $naissance, $residence, $lieu, $numero, $numeroW, $employeur, $profession,$assur, $assurance, $rdv, $objet);

        if($result)
            return true;
        else
            return false;
    }
}


function getMotifs(){
    return getAllMotifs();
}



function getClients(){
    return getAllClients();
}



function connect(){
	if(isset($_POST['username']) AND isset($_POST['password'])){
		$userName=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);

		$result=getConnexion($userName,$password);
		
		if($result=="blocked"){
      		echo'<script type="text/javascript">alert("Compte bloqué, Contacter un administrateur")</script>';
			return "blocked";
		}
		
		elseif($result=='echec'){
			echo'<script type="text/javascript">alert("Mot de passe incorrect")</script>';
			return "echec";
		}
		
		elseif($result=='notFound'){
			echo'<script type="text/javascript">alert("Utilisateur introuvable")</script>';
			return "notFound";
		}

		else if($result=="User Already connected"){
			echo'<script type="text/javascript">alert("L\'utilisateur est déja connecté sur un autre poste")</script>';
		}
		
		else
			return $result;
	}


}


function addNewUser($adder){
    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['userName']) AND isset($_POST['droit'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $username = htmlspecialchars($_POST['userName']);
        $droit = htmlspecialchars($_POST['droit']);
        if($droit=="administrateur")
            $agence=1;
        else
            $agence = htmlspecialchars($_POST['agence']);

        $result = addUser($nom, $prenom, $username, $droit, $agence, $adder);

        if($result)
            return true;
        else
            return false;
    }
    else
        return false;
}
/*

function getUsers(){
    //$result = getUsers();
    return getUsersBdd();
}

function getUserInfo(){
    $id  = explode("=", explode("?", $_SERVER['REQUEST_URI'])[1] )[1];
    //echo $id;

    return getInfoUser($id);
}

function modifUser($modifyUser){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];

    if(isset($_POST['nom']) AND isset($_POST['username']) AND isset($_POST['droit'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $username = htmlspecialchars($_POST['username']);
        $droit = htmlspecialchars($_POST['droit']);

        $result = modifyUser($nom, $prenom, $username, $droit, $id, $modifyUser);

        if($result)
            return true;
        else
            return false;
    }
    else
        return false;
}

function deleteUser($deleter){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];
    $result = deleteOldUser($id, $deleter);

    if($result)
        return true;
    else
        return false;
}

function initUserPass(){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];
    return initUser($id);
}

function getOwnUserInfos($id){
    return getInfoUser($id);
}

function editMe($username){
    $action  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[0])[1];
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];

    //if($action=='edit')
    if(isset($_POST['password']) AND isset($_POST['passwordConfirmation'])){
        //echo $username;
        $password = htmlspecialchars($_POST['password']);
        $passwordConfirmation = htmlspecialchars($_POST['passwordConfirmation']);

        if($password==$passwordConfirmation) {
            $result = modifyMe($username, $password, $id);
            //echo $username;
            if($result)
                return true;
            else
                return false;
        }
        elseif($password!=$passwordConfirmation)
            return $result = 'ip';
    }
    else
        return false;
}


function getOrganismes(){
    //$result = getUsers();
    return getOrganismesBdd();
}

function addNewOrganisme($adder){
    if(isset($_POST['nom']) AND isset($_POST['compte']) AND isset($_POST['agence']) AND isset($_POST['cle'])){
        $nom = htmlspecialchars($_POST['nom']);
        $compte = htmlspecialchars($_POST['compte']);
        $agence = htmlspecialchars($_POST['agence']);
        $cle = htmlspecialchars($_POST['cle']);

        $result = addOrganisme($nom, $compte, $agence, $cle, $adder);

        if($result)
            return true;
        else
            return false;
    }
    else
        return false;
}

function deleteOrganisme($deleter){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];
    $result = deleteOldOrganisme($id, $deleter);

    if($result)
        return true;
    else
        return false;
}

function getOrganismeInfo(){
    $id  = explode("=", explode("?", $_SERVER['REQUEST_URI'])[1] )[1];
    //echo $id;

    return getOrganismeUser($id);
}

function modifOrganisme($modifOrganisme){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];

    if(isset($_POST['nom']) AND isset($_POST['compte']) AND isset($_POST['agence']) AND isset($_POST['cle'])){
        $nom = htmlspecialchars($_POST['nom']);
        $compte = htmlspecialchars($_POST['compte']);
        $agence = htmlspecialchars($_POST['agence']);
        $cle = htmlspecialchars($_POST['cle']);

        $result = modifyOrganisme($nom, $compte, $agence, $cle, $id, $modifOrganisme);

        if($result)
            return true;
        else
            return false;
    }
    else
        return false;
}

//Agence
function getAgences(){
    //$result = getUsers();
    return getAgencesBdd();
}

function addNewAgence($adder){
    if(isset($_POST['nom']) AND isset($_POST['code'])){
        $nom = htmlspecialchars($_POST['nom']);
        $code = htmlspecialchars($_POST['code']);

        $result = addAgence($nom, $code, $adder);

        if($result)
            return true;
        else
            return false;
    }
    else
        return false;
}

function deleteAgence($deleter){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];
    $result = deleteOldAgence($id, $deleter);

    if($result)
        return true;
    else
        return false;
}

function getAgenceInfo(){
    $id  = explode("=", explode("?", $_SERVER['REQUEST_URI'])[1] )[1];
    //echo $id;

    return getInfoAgence($id);
}

function modifAgence($modifOrganisme){
    $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];

    if(isset($_POST['nom']) AND isset($_POST['code'])){
        $nom = htmlspecialchars($_POST['nom']);
        $code = htmlspecialchars($_POST['code']);

        $result = modifyAgence($nom, $code, $id, $modifOrganisme);

        if($result)
            return true;
        else
            return false;
    }
    else
        return false;
}

function disconnect($id, $username){
    deconnect($id, $username);
	header('Location: /Elafacture/');
	require('./view/login.php');
}*/

