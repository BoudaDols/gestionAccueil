<?php
	require_once('../php/fonctions.php');
	if(isset($_POST['idannee']))
	{
		$idannee = $_POST['idannee'];
		$bdd = new DB();
        $sqlannees = "SELECT * FROM classe WHERE refAnnee = '$idannee'";
        $classes = SQLSelect($sqlannees);
    ?>
     	<label>Classe</label>
        <select class="form-control" id="classe" name="classe" required="required">
        	<option value=""></option>
    <?php
        foreach ($classes as $classe):
    ?>
        	<option value="<?=$classe->id?>"><?=$classe->libeleC?></option>
    <?php
        endforeach;
    ?>
    </select>
    <?php
	}
?>