
    <div class="container-fluid py-4">
      <?php if(!empty($organization)) {?>
      <div class="row">
        <?php foreach($organization as $orgs){ ?>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href = "<?= base_url('databliss/organization/verify/'.$orgs->organization_id)?>">
            <div class="card" style="margin-top: 5%;">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <!-- <p class="text-sm mb-0 text-capitalize font-weight-bold">Role</p> -->
                      <h5 class="font-weight-bolder mb-0">
                        
                        <?=$orgs->organization_name?>
                        <span class="text-success text-sm font-weight-bolder"></span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                      <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
        </a>
            </div>
        </div>
        <?php } ?>
        
      </div>
      <br>
      <hr>
      <?php } ?>
      
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="<?= base_url("databliss/organization_make/") ?>">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                    <h5 class="font-weight-bolder mb-0">
                      Create Organization
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                    <i class="ni ni-fat-add text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div></a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="<?= base_url("databliss/search_organization/") ?>">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    
                    <h5 class="font-weight-bolder mb-0">
                      Search Organization
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
      
 
    </div>

  