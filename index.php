<?php
session_start();
require('./controller/controller.php');

$url='';
$page_content='';
$title = '';
$incorrectPassword = false;
$blocked = false;
$notFound = false;
$connected = false;
$warning_state1 = 'hidden';
$warning_state2 = 'hidden';
$warning_state="hidden";
$notSamePassword = 'hidden';
$changePassword = 'hidden';
//$users = [];

if(isset($_GET['url'])){
	$url = $_GET['url'];
}

//Connexion
if($url==''){
	if(!isset($_SESSION['status'])){
		$title='Connexion';
		require './view/login.php';
	}
	elseif(isset($_SESSION['status'])){
		$title = 'Accueil';
        /*if(is_null($_SESSION['lastConn']))
            $changePassword = '';*/
        $clients = getClients();
		$page_content='./view/defaultContent.php';
		require './view/accueil.php';
	}
}

else if($url=='add'){
	$title = 'Ajouter une visite';
	$motifs = getMotifs();
	$page_content='./view/add.php';
	require './view/accueil.php';
}

elseif($url=='adding'){
	$result = addNewClient();

	if($result){
		$clients = getClients();
		header('Location: /GestAccueil/');
        require('./view/accueil.php');
	}
	else{
		$warning_state1 = '';
		$title = 'Ajouter une visite';
		$motifs = getMotifs();
		$page_content='./view/add.php';
		require './view/accueil.php';
	}
}

elseif($url=='connexion'){
    $result = connect();

    if($result == null){
        $title = 'Connexion';
        require('./view/login.php');
    }
    elseif ($result == "blocked"){
        $title = 'Connexion';
        $blocked = true;
        require('./view/login.php');
    }
    elseif($result == "echec"){
        $title = 'Connexion';
        $incorrectPassword = true;
        require('./view/login.php');
    }
    elseif ($result == "notFound"){
        $title = 'Connexion';
        $notFound = true;
        require('./view/login.php');
    }
    elseif ($result == "User Already connected"){
        $title = 'Connexion';
        $connected = true;
        require('./view/login.php');
    }
    else{
        $_SESSION['status'] = $result->status;
        $_SESSION['id']=$result->id;
        $_SESSION['nom']=$result->noms;
        $_SESSION['username']=$result->username;
        $_SESSION['droit']=$result->status;
        /*if(is_null($result->lastConnDate))
            $changePassword = '';
        //header('Location: /ElaFacture/');
        //require();
        $title = 'Accueil';
        $organismes = getOrganismes();
        if(is_null($result->lastConnDate))
            $changePassword = '';*/
        $page_content='./view/defaultContent.php';
        require('./view/accueil.php');
    }
}

elseif($url=='deconnexion'){
    //disconnect($_SESSION['id'], $_SESSION['username']);
    session_destroy();
    $_SESSION['status']=null;
    $title='Connexion';
    header('Location: /GestAccueil/');
    require('./view/login.php');
}
/*
else if($url == "addUser"){
    //echo "addUser";
    if($_SESSION['droit']=="administrateur"){
        //$result = addNewUser();
        $title = 'Ajouter un utilisateur';
        $page_content='./view/ajoutUser.php';
        $users = getUsers();
        $agences = getAgences();
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

else if($url == "user"){
    //echo "addUser";
    if($_SESSION['droit']=="administrateur"){
        //$result = addNewUser();
        $title = 'Utilisateurs';
        $page_content='./view/user.php';
        $users = getUsers();
        $agences = getAgences();
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

else if ($url == "addingUser"){
    if($_SESSION['droit'] == "administrateur"){
        $result = addNewUser($_SESSION['nom']);
        if($result){
            $title = 'Ajouter un utilisateur';
            $page_content='./view/ajoutUser.php';
            $users = getUsers();
            $agences = getAgences();
            $warning_state2 = "";
            $warning_state1 = "hidden";
            require('./view/accueil.php');
        }
        else{
            $title = 'Ajouter un utilisateur';
            $page_content='./view/ajoutUser.php';
            $users = getUsers();
            $agences = getAgences();
            $warning_state1 = "";
            $warning_state2 = "hidden";
            require('./view/accueil.php');
        }
    }
}

elseif($url=='modifUser'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $title = 'Modifier les informations d\'un utilisateur';
        $infos = getUserInfo();
        $page_content='./view/modifUser.php';
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=="modifyingUser"){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $result = modifUser($_SESSION['nom']);
        if(!$result){
            $title = "Modifier les informations d'un utilisateur";
            $warning_state1 = '';
            $page_content = './view/modifUser.php';
            require('./view/accueil.php');
        }
        elseif($result){
            header('Location: /ElaFacture/user');
            require('./view/accueil.php');
        }
        else{
            echo "probleme";
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=='deletingUser'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $result = deleteUser($_SESSION['nom']);
        if($result){
            header('Location: /ElaFacture/user');
            require('./view/accueil.php');
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=='initUser'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $id  = explode("=", explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] )[1])[1];
        $title = 'Reinitialisation d\'un utilisateur';
        $result = initUserPass();
        if($result){
            header('Location: /ElaFacture/user');
            require('./view/accueil.php');
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}*/

elseif($url=='accueil'){
	//if(isset($_SESSION['status'])){
        $title='Accueil';
        $page_content='./view/defaultContent.php';
        require './view/accueil.php';
    //}
}

/*elseif($url=='profil'){
    if(isset($_SESSION['status'])){
        $title = 'Profil';
        $infos = getOwnUserInfos($_SESSION['id']);
        $page_content='./view/profil.php';
        require('./view/accueil.php');
    }
}

elseif($url=="editUser"){
    if(isset($_SESSION['status'])){
        $title = "Profil";
        $result = editMe($_SESSION['username']);
        //echo "editUser";
        if(!$result)
            $warning_state1 = '';
        elseif($result=='ip')
            $notSamePassword = '';

        echo "changed";
        $infos = getOwnUserInfos($_SESSION['id']);
        //$page_content='./view/profil.php';
        header('Location: /ElaFacture/');
        require('./view/accueil.php');
    }
}

else if($url == "organisme"){
    if($_SESSION['droit']=="administrateur"){
        $title = 'Organisme';
        $page_content='./view/organisme.php';
        $organismes = getOrganismes();
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

else if ($url == "addingOrganisme"){
    if($_SESSION['droit'] == "administrateur"){
        $result = addNewOrganisme($_SESSION['nom']);
        if($result){
            $title = 'Organisme';
            $page_content='./view/organisme.php';
            $organismes = getOrganismes();
            $warning_state2 = "";
            $warning_state1 = "hidden";
            require('./view/accueil.php');
        }
        else{
            $title = 'Organisme';
            $page_content='./view/organisme.php';
            $organismes = getOrganismes();
            $warning_state1 = "";
            $warning_state2 = "hidden";
            require('./view/accueil.php');
        }
    }
}

elseif($url=='deletingOrgan'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $result = deleteOrganisme($_SESSION['nom']);
        if($result){
            header('Location: /ElaFacture/organisme');
            require('./view/accueil.php');
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=='modifOrgan'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $title = 'Modifier les informations d\'un organisme';
        $infos = getOrganismeInfo();
        $page_content='./view/modifOrganisme.php';
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=="modifingOrgan"){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $result = modifOrganisme($_SESSION['nom']);
        if(!$result){
            $title = "Modifier les informations d'un organisme";
            $warning_state1 = '';
            $page_content = './view/modifOrganisme.php';
            require('./view/accueil.php');
        }
        elseif($result){
            header('Location: /ElaFacture/organisme');
            require('./view/accueil.php');
            //echo "ok";
        }
        else{
            echo "probleme";
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

//Agence
else if($url == "agence"){
    if($_SESSION['droit']=="administrateur"){
        $title = 'Agence';
        $page_content='./view/agence.php';
        $agences = getAgences();
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

else if ($url == "addingAgence"){
    if($_SESSION['droit'] == "administrateur"){
        $result = addNewAgence($_SESSION['nom']);
        if($result){
            $title = 'Agence';
            $page_content='./view/agence.php';
            $agences = getAgences();
            $warning_state2 = "";
            $warning_state1 = "hidden";
            require('./view/accueil.php');
        }
        else{
            $title = 'Agence';
            $page_content='./view/agence.php';
            $agences = getAgences();
            $warning_state1 = "";
            $warning_state2 = "hidden";
            require('./view/accueil.php');
        }
    }
}

elseif($url=='deletingAgence'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $result = deleteAgence($_SESSION['nom']);
        if($result){
            header('Location: /ElaFacture/agence');
            require('./view/accueil.php');
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=='modifAgence'){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $title = 'Modifier les informations d\'une agence';
        $infos = getAgenceInfo();
        $page_content='./view/modifAgence.php';
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}

elseif($url=="modifingAgence"){
    if(isset($_SESSION['droit']) AND $_SESSION['droit']=='administrateur'){
        $result = modifAgence($_SESSION['nom']);
        if(!$result){
            $title = "Modifier les informations d'un organisme";
            $warning_state1 = '';
            $page_content = './view/modifAgence.php';
            require('./view/accueil.php');
        }
        elseif($result){
            header('Location: /ElaFacture/agence');
            require('./view/accueil.php');
            //echo "ok";
        }
        else{
            echo "probleme";
        }
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}


elseif($url=="specialAgence"){
    if($_SESSION['droit']=="administrateur"){
        //$result = addNewUser();
        $title = 'Agences';
        $page_content='./view/sepcialAgence.php';
        $agences = getAgences();
        require('./view/accueil.php');
    }
    else{
        echo "Accès interdit. Contacter l'administrateur.";
    }
}*/