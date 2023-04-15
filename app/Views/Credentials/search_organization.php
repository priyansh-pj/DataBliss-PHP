<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-12 mb-12">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row align-items-justify">
                        <div class="col-1 text-start" style=" padding-right: 0px; padding-left: 20px;">
                            <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                                <h3 class="font-weight-bolder mb-0" style="display: inline-block;">
                                    Search Organization
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </h3>
                            </div>
                            <br><br>

                            
                            <form method="post" action="<?= base_url('databliss/request_send') ?>">
                                <select class="form-control" name="organization_id" id="organization_id">
                                    <option value="">Select Organization Name</option>
                                    <?php foreach ($organizations as $org): ?>
                                        <option value="<?= $org->organization_id ?>"><?= $org->organization_id ?>.) <?= $org->organization_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br><br>
                                <div class="col-12 ml-1 text-end">
                                    <button class="btn bg-gradient-secondary btn-lg" type="submit">Send Request to Organization</button>
                                </div> 
                            </form>
                            <!-- <?php if (isset($message)): ?>
                                <div class="alert alert-success"><?= $message ?></div>
                                <?php endif; ?> -->
                            </div>                            
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
 
</script>

