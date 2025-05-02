<?php
require_once ('./assets/php/fonctions.php');


function getConnexion($userName,$password){
	$bdd = new DB();
	$date= getdate();
	$sql='SELECT * FROM user WHERE username="'.$userName.'"';
	$reponse=SQLSelect($sql);

	if(count($reponse)>0){
	    foreach($reponse as $donnees):
	        if(md5($password)==$donnees->password){
	            /*$setTentativeZero=$bdd->db->PREPARE("UPDATE utilisateur SET tentative_echec=0 WHERE userName='".$userName."'");
	            $setTentativeZero->EXECUTE();
	            $accesSys=fopen('accesSys.txt','a');
	            fputs($accesSys, "accès accordé: ".$donnees->noms." ".$date['mday']."/".$date['mon']."/".$date['year']."/".$date['hours'].":".$date['minutes'].":".$date['seconds']."\n");
	            fclose($accesSys);*/
	            return $donnees;
	        }
	        
	        
	        else{
	            /*$getTentative=$bdd->db->PREPARE("SELECT tentative_echec FROM utilisateur WHERE userName='".$userName."'");
	            $getTentative->EXECUTE();
	            $tentavtive=$getTentative->fetch();
	            if($tentavtive['tentative_echec']<=3){
	                $tentative=$tentavtive['tentative_echec']+1;
	                $setTentative=$bdd->db->PREPARE("UPDATE utilisateur SET tentative_echec=".$tentative." WHERE userName='".$userName."'");
	                $setTentative->EXECUTE();
	                $accesSys=fopen('accesSys.txt','a');
	                fputs($accesSys, "accès refusé, mot de passe incorrect: ".$userName." ".$date['mday']."/".$date['mon']."/".$date['year']."/".$date['hours'].":".$date['minutes'].":".$date['seconds']."\n");*/
	                return "echec";
	                
	                //fclose($accesSys);
	            /*}
	            else{
	                $setBlocked=$bdd->db->PREPARE("UPDATE utilisateur SET isBlocked=1 WHERE userName='".$userName."'");
	                $setBlocked->EXECUTE();
	                return "blocked";
	            }*/
	        }
	    endforeach;
	}

	elseif(count($reponse)==0){
	    return "notFound";
	}
}

function deconnect($userName){
	$bdd = new DB();
	$date= getdate();
	$userDec=$bdd->db->PREPARE("UPDATE user SET last_conn_date=CURRENT_TIMESTAMP WHERE userName='".$userName."'");
	$userDec->EXECUTE();
	$accesSys=fopen('accesSys.txt','a');
	fputs($accesSys, "Deconnexion: ".$donnees->noms." ".$date['mday']."/".$date['mon']."/".$date['year']."/".$date['hours'].":".$date['minutes'].":".$date['seconds']."\n");
	fclose($accesSys);
}

function getInfoUsers(){
	$bdd = new DB();
	$sql='SELECT * FROM user';
	$reponse=SQLSelect($sql);

	return $reponse;
}

function addUser($nom, $prenom, $userName, $droit){
	$bdd = new DB();
	$noms = $nom.' '.$prenom;
	$ePassword = md5("password");

	$verifSql = 'SELECT * FROM user WHERE noms="'.$noms.'" OR username="'.$userName.'"';
	$verifResult = SQLSelect($verifSql);

	if(empty($verifResult)){
		$sql =$bdd->db->PREPARE('INSERT INTO `user`(`id`, `noms`, `username`, `password`, `agence`, `status`) VALUES (Default, :nom, :userName, :ePassword, "Default", :droit)');
		$sql->EXECUTE(array(
			"nom" => $noms ,
			"username" => $userName ,
			"password" => $ePassword ,
			"droit" => $droit 
		));

		return true;
	}
	else
		return false;
}

function deleteOldUser($id){
	$bdd = new DB();
	$sql=$bdd->db->PREPARE('DELETE FROM `utilisateur` WHERE `idUtilisateur`=:id');
	$sql->EXECUTE(array(
		'id'=> $id
	));

	return true;
}

function getInfoUser($id){
	$bdd = new DB();
	$sql='SELECT * FROM utilisateur WHERE `idUtilisateur`='.$id;
	$reponses=SQLSelect($sql);

	foreach($reponses as $reponse):
		return $reponse;
	endforeach;
}

function modifyUser($nom, $prenom, $userName, $droit, $id){
	$bdd = new DB();

	$sql =$bdd->db->PREPARE("UPDATE `utilisateur` SET `noms`=:nom, `userName`=:userName, `droit`=:droit WHERE `idUtilisateur`=:id");
		$sql->EXECUTE(array(
			'nom' => $nom, 
			'userName' => $prenom,
			'droit' => $droit,
			'id' => $id
		));

	if($sql)
		return true;
	else
		return false;
}

function initUser($id){
	$bdd = new DB();

	$sql =$bdd->db->PREPARE("UPDATE `utilisateur` SET `isBlocked`= Default, `tentative_echec`=0 WHERE `idUtilisateur`=:id");
		$sql->EXECUTE(array(
			'id' => $id
		));

	if($sql)
		return true;
	else
		return false;
}

function modifyMe($userName, $password, $id){
	$bdd = new DB();

	$sql = $bdd->db->PREPARE('UPDATE `utilisateur` SET `userName`=:userName,`ePassword`=:password WHERE `idUtilisateur`=:id');
	$sql->EXECUTE(array(
		'userName'=>$userName,
		'password'=>$password,
		'id'=>$id,
	));

	if($sql)
		return true;
	else
		return false;
}