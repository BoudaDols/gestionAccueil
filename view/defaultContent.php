          <!-- Card stats -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <!--<div class="col-xl-8 mb-5 mb-xl-0">
          
        </div>-->
        <div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <div class="card bg-default shadow">
                    <!---<div class="card-header bg-transparent border-0">
                      <h3 class="text-white mb-0">Visites
                    </div>
                    <div class="table-responsive">
                      <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nom et Prénom(s)</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Téléphone whatsapp</th>
                            <th scope="col">Objet de visite</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if(empty($clients)){
                              ?>
                                <tr>
                                  <td>
                                    Aucun Client
                                  </td>
                                </tr>
                              <?php
                            }
                            else{
                              ?>
                              <tr>
                                <?php
                                  foreach($clients as $client):
                                ?>
                                <th scope="row">
                                  <div class="media align-items-center">
                                    <div class="media-body">
                                      <span class="mb-0 text-sm"><?=$client->noms;?></span>
                                    </div>
                                  </div>
                                </th>
                                <td>
                                  <?=$client->tel;?>
                                </td>

                                <td>
                                  <?=$client->whatsapp;?>
                                </td>
                                
                                <td>
                                  <?=$client->objet;?>
                                </td>
                              </tr>
                              <?php
                                endforeach;
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            
          </div>
        </div>
      </div>
    </div>