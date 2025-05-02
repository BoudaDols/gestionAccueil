<?php
	require_once('../php/fonctions.php');
	if(isset($_POST['idannee']))
	{
		$idannee = $_POST['idannee'];
		$bdd = new DB();
        $sql = "SELECT i.*, e.*, c.* FROM inscription i, eleve e, classe c
                Where i.matriculeI=e.matriculeE and i.idClasse=c.id and i.idAnnee='$idannee'";
        $listes = SQLSelect($sql);
    ?>
    <label>Liste des inscrits (matricule/nom)</label>
    <input class="form-control" type="text" style="width:400px" name="eleveI" id="eleveI" required list="urleleve" autocomplete="off"  onchange="afficherInfosEleve()"/>
        <datalist id="urleleve">
            <select class="form-control" type="text" style="width:400px">
                <?php foreach ($listes as $liste):?>
                    <option value="<?= $liste->matriculeE;?>">
                        <?= $liste->nomE;?>  <?= $liste->prenomE;?> - <?= $liste->libeleC;?>
                    </option>
                <?php endforeach;}?>
            </select>
        </datalist>