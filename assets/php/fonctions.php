<?php
	require 'connexion.php';
	function SQLSelect($sql)
	{		
		$bdd = new DB();
		
		$req = $bdd->db->prepare($sql);
		$req->execute();
		if($req)
			return $req->fetchAll(PDO::FETCH_OBJ);
		else
			return false;
	}

?>