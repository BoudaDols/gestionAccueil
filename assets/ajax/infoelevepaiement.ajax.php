<?php
	require_once('../php/fonctions.php');
	if(isset($_POST['idMat']) and isset($_POST['idinsc']))
	{
		$idMat = $_POST['idMat'];
        $idinsc = $_POST['idinsc'];
		$bdd = new DB();
        $sqleleves = "SELECT * FROM eleve WHERE matriculeE = '$idMat'";
        $eleves = SQLSelect($sqleleves);
        foreach ($eleves as $eleve):
    ?>
 <div class="col-lg-8">
    <div class="panel panel-info">
        <div class="panel-heading">
            Informations élèves
        </div>
        <div class="panel-body">
        	<div class="form-group col-lg-4">
                <label>Numero Recu :</label>
                <input class="form-control" value="<?=date('siHdmy')?>" name="NumRecu" readonly>
            </div>
            <div class="form-group col-lg-4">
                <label>Matricule :</label>
                <input class="form-control" value="<?=$eleve->matriculeE?>" name="ChampMatricule" readonly>
            </div>
            <div class="form-group col-lg-4">
                <label>Numéro d'inscription :</label>
                <input class="form-control" value="<?=$idinsc?>" name="numInscription" readonly>
            </div>
            <div class="form-group col-lg-4">
    <?php
        $sqlclasse = "SELECT c.libeleC, c.refNiveau, c.refAnnee FROM classe c, inscription i
                     WHERE c.id=i.idClasse and i.numI='$idinsc'";
        $classes = SQLSelect($sqlclasse);
        $refNiveau = "";
        $refannee = "";
        foreach ($classes as $classe):
            $refNiveau = $classe->refNiveau;
            $refannee = $classe->refAnnee;
    ?>
                <label>Classe :</label>
                <input class="form-control" value="<?=$classe->libeleC?>" readonly>
            </div>
    <?php
       endforeach;
    ?>
            <div class="form-group col-lg-4">
                <label>Nom :</label>
                <input class="form-control" value="<?=$eleve->nomE?>" readonly>
            </div>
            <div class="form-group col-lg-4">
                <label>Prénom (s) :</label>
                <input class="form-control" value="<?=$eleve->prenomE?>" readonly>
            </div>
            <div class="form-group col-lg-4">
     <?php
        $sqlclasse = "SELECT i.statutI FROM classe c, inscription i
                     WHERE c.id=i.idClasse and i.numI='$idinsc'";
        $stat = "";
        $statuts = SQLSelect($sqlclasse);
        foreach ($statuts as $statut):
            $stat=$statut->statutI;
    ?>
                <label>Statut :</label>
                <input class="form-control" value="<?=$statut->statutI?>" readonly>
            </div>
    <?php
       endforeach;
    ?>
            <div class="form-group col-lg-4">
                <label>Montant encaisser :</label>
                <input type="Number" class="form-control" name="Montant">
            </div>
            <div class="form-group col-lg-4">
                <label>Type de paiement :</label>
                 <select class="form-control" name="typePaie" id="typePaie" required="required">
                     <option value="Espèce">Espèce</option>
                      <option value="Chèque">Chèque</option>
                 </select>
            </div>
    <?php
        endforeach;
    ?>
       
        </div>
    </div>
</div>
 <div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Informations Paiements
        </div>
        <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
 <?php
        $sqlVers = "SELECT * FROM versement
                     WHERE numeroIV='$idinsc'";
        $totalPayer =0;
        $i=1;
        $verserments = SQLSelect($sqlVers);
        if (empty($verserments)) {
?>
                                <tr>
                                    <td colspan="3"> Aucun versement </td>
                                </tr>
<?php
        }else {
        foreach ($verserments as $verserment):
            $totalPayer += $verserment->montantV;
    ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$verserment->dateV?></td>
                <td><?=$verserment->montantV?></td>
            </tr> 
    <?php
       endforeach;
   }
    ?>
                               
                            </tbody>
                        </table>

<?php
        //determination du montant total de la scolarité
        $sqltot = "SELECT * FROM fraisannexe
                     WHERE idAnnee='$refannee'";
        $annexe=0;
        $reste=0;
        $scolarites = SQLSelect($sqltot);
        foreach ($scolarites as $scolarite):
            switch ($stat) {
                case "Externe":
                    $annexe=$scolarite->assurance+$scolarite->fraisApe;
                 break;

                case "Demi-pension":
                    $annexe=$scolarite->assurance+$scolarite->fraisApe+$scolarite->fraisDemiPension;
                break;

                case "Interne":
                    $annexe=$scolarite->assurance+$scolarite->fraisApe+$scolarite->fraisInternat;
                break;
            }
        endforeach;
        //determination du la scolarité total
        $sqlscos = "SELECT * FROM fraisscolarite
                     WHERE refAnnee='$refannee' and refNiveau='$refNiveau'";
        $sco=0;
        $scols = SQLSelect($sqlscos);
        foreach ($scols as $scol):
            $sco=$scol->montant;
        endforeach;
?>
   
                        <div style="text-align: center;">
                        <div class="form-group col-lg-6">
                            <label>Total (CFA) :</label>
                            <input type="text" class="form-control" name="tot" value="<?=$annexe+$sco?>" readonly>
                        </div> 
                        <div class="form-group col-lg-6">
                            <label>Reste (CFA) :</label>
                            <input type="text" class="form-control" name="reste" value="<?=$annexe+$sco-$totalPayer?>" readonly>
                        </div> 
                            <!--b>Total : <?=$annexe+$sco?> fr CFA   |   Reste :  <?=$annexe+$sco-$totalPayer?>  fr CFA</b-->
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php
	}
?>
