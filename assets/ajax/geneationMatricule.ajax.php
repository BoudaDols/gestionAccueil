<?php
	require_once('../php/fonctions.php');
	if(isset($_POST['idsexe']))
	{
		$idmat = $_POST['idsexe'];
		$code = "";
		switch ($idmat) {
			case 'Masculin':
				$code = "M";
			break;
			case 'Feminin':
				$code = "F";
			break;
		}
		$matriculeeleve = genererMatriculeSainteAnne($code);
	}
?>

		 <label>Matricule :</label>
         <input type="text" class="form-control" name="Matricule" id="Matricule" value="<?=$matriculeeleve?>" onchange="onInput()" required="required" readonly>
