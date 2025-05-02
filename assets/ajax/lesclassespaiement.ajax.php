<?php
	require_once('../php/fonctions.php');
	if(isset($_POST['idMat']))
	{
		$idMat = $_POST['idMat'];
		$bdd = new DB();
        $sqleleves = "SELECT * FROM eleve WHERE matriculeE = '$idMat'";
        $eleves = SQLSelect($sqleleves);
        foreach ($eleves as $eleve):
    ?>
        	<div class="form-group col-lg-5">
                <label>Matricule</label>
                <input class="form-control" value="<?=$eleve->matriculeE?>" name="ChampMatricule" readonly>
            </div>
            <div class="form-group col-lg-5">
                <label>Numéro de téléphone</label>
                <input class="form-control" value="<?=$eleve->contactE?>" readonly>
            </div>
            <div class="form-group col-lg-5">
                <label>Nom</label>
                <input class="form-control" value="<?=$eleve->nomE?>" readonly>
            </div>
            <div class="form-group col-lg-5">
                <label>Prénom(s)</label>
                <input class="form-control" value="<?=$eleve->prenomE?>" readonly>
            </div>
            <div class="form-group col-lg-5">
                <label>Date de naissance</label>
                <input class="form-control" value="<?=$eleve->dteNaissE?>" readonly>
            </div>
            <div class="form-group col-lg-5">
                <label>Sexe</label>
                <input class="form-control" value="<?=$eleve->sexeE?>" readonly>
            </div>
    <?php
        endforeach;
    ?>
    </select>
    <?php
	}
?>
