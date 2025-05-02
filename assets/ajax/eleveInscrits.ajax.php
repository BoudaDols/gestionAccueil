<?php
    require_once('../php/fonctions.php');
?>
<div class="table-responsive" id="afficherEleveInscrit">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom(s)</th>
                <th>Date de naissance</th>
                <th>Sexe</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $bdd = new DB();
            $sql = "SELECT * FROM eleve ";
            $eleves = SQLSelect($sql);
            $i=1;
            if(empty($eleves))
            {
        ?>
                <tr>
                    <td class="center"> - </td>
                    <td class="center"> - </td>
                    <td class="center">Aucune entrée</td>
                    <td class="center"> - </td>
                    <td class="center"> - </td>
                </tr>
        <?php
            }
            else
            {
                foreach($eleves as $eleve):
        ?>
                    <tr id="tr_<?php echo $i;?>" onclick="getTrValues(this.id)">
                        <td class="center"><?= $eleve->matriculeE; ?></td>
                        <td class="center"><?= $eleve->nomE; ?></td>
                        <td class="center"><?= $eleve->prenomE; ?></td>
                        <td class="center"><?= $eleve->dteNaissE; ?></td>
                        <td class="center"><?= $eleve->sexeE; ?></td>
                    </tr>
                    <?php $i++; ?>
        <?php
                endforeach;
            }
        ?>
        </tbody>
    </table>
</div>


<!-- Page-Level Plugin Scripts-->
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>