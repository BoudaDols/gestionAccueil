<!-- Dark table -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
	    <div class="header-body">
    	    <div class="row">
            <div class="alert alert-danger alert-dismissable" <?=$warning_state;?> >
              <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
              Echec. Reéssayer!!
            </div>
    	    </div>
    	</div>
    </div>
</div>

<div class="container-fluid mt--7">
  <div class="row mt-5">
    <div class="col">
      <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h2 class="mb-0">Client</h2>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form role="form" method="post" action="adding">
              <div class="col-8">
                <h3 class="mb-0">Informations du client</h3>
              </div>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nom</label>
                      <input type="text" id="nom" name="nom" class="form-control form-control-alternative" placeholder="Nom" required>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Prénom(s)</label>
                      <input type="text" id="prenom" name="prenom" class="form-control form-control-alternative" placeholder="Prénom(s)" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Date de naissance</label>
                      <input type="date" id="naissance" name="naissance" class="form-control form-control-alternative" placeholder="Date de naissance" required>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Lieu de naissance</label>
                      <input type="text" id="lieu" name="lieu" class="form-control form-control-alternative" placeholder="lieu" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Résidence</label>
                      <input type="text" id="residence" name="residence" class="form-control form-control-alternative" placeholder="Résidence" required>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4" style="color: black">Contacts</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Numéro de téléphone</label>
                      <input id="numero" name="numero" class="form-control form-control-alternative" placeholder="00 00 00 00" type="number" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Numéro Whatsapp</label>
                      <input type="number" id="numeroW" name="numeroW" class="form-control form-control-alternative" placeholder="Numéro Whatsapp" required>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4" />
              <!-- Occupation -->
              <h6 class="heading-small text-muted mb-4" style="color: black">Occupation</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Profession/Qualification</label>
                      <input type="text" id="profession" name="profession" class="form-control form-control-alternative" placeholder="Profession/Qualification" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Avez-vous rendez-vous</label>
                      <fieldset>
                        <input type="radio" name="rdv" value="non" checked>Non<br>
                        <input type="radio" name="rdv" value="oui">Oui<br>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Avez-vous une assurance</label>
                      <fieldset>
                        <input type="radio" name="assur" value="non" checked>Non<br>
                        <input type="radio" name="assur" value="oui">Oui<br>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Compagnie qui vous assure</label>
                      <input type="text" id="assurance" name="assurance" class="form-control form-control-alternative" placeholder="Nom de la compagnie qui vous assure">
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4" />
              <!-- Motif -->
              <h6 class="heading-small text-muted mb-4" style="color: black">Objet de visite</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Objet</label>
                      <select class="form-control" name="objet" id="objet" required>
                          <?php
                            foreach ($motifs as $motif) {
                          ?>
                          <option value="<?=$motif->libelle?>"><?=$motif->libelle?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary my-4">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>