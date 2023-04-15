<div class="container-fluid py-4"> 
    <!-- Invoicing -->
    <div class="card card-frame">
        <div class="card-body">
            <h5>Invoice</h5>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="<?= base_url("databliss/Billing/Generate_Invoice") ?>">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                        <h5 class="font-weight-bolder mb-0">Generate Invoice <span class="text-success text-sm font-weight-bolder"></span>
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
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="<?= base_url("databliss/Billing/Invoice_history") ?>">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <h5 class="font-weight-bolder mb-0">Invoice History <span class="text-success text-sm font-weight-bolder"></span>
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
    <!-- Purchasing -->
    <?php if(strpos($role,"Accountant") || $role=="OWNER" ){?>
    <br>
    <div class="card card-frame">
        <div class="card-body">
            <h5>Purchasing</h5>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="<?= base_url("databliss/Billing/Enter_purchase_invoice") ?>">
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold"></p>
                        <h5 class="font-weight-bolder mb-0">Enter Purchase Invoice <span class="text-success text-sm font-weight-bolder"></span>
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
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="<?= base_url("databliss/Billing/Purchase_history") ?>">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <h5 class="font-weight-bolder mb-0">Purchase History <span class="text-success text-sm font-weight-bolder"></span>
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
    <?php } ?>
</div>