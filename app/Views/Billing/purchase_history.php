<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-xl-12 mb-12">
        <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:2%;">Bill No.</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:30%;">Contact Details</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width:30%;">Amount</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"style="width:10%;">Payment Mode</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"style="width:20%;">Purchase Date</th>
                <th class="text-secondary opacity-7" style="width:5%;">Print</th>
                <th class="text-secondary opacity-7" style="width:5%; margin-right:1%">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($details as $data){ ?>
                <tr>
                    <td style="text-align:center; padding-top: 0%; font-weight:bold;"><?=$data->id?></td>
                    <td style="padding-top: 0px;">
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-s"><?=$data->contact_name?> (<?=$data->contact_phone?>) </h6>
                            <p class="text-s text-secondary mb-0"><?=$data->gst_number?></p>
                        </div>
                        </div>
                    </td>
                    <td style="padding-top: 0px;">
                        <p class="text-s font-weight-bold mb-0"><?=$data->amount?></p>
                        <p class="text-s text-secondary mb-0">Tax = <?=$data->taxable_amount?> , Discount = <?=$data->discount?></p>
                    </td>
                    <td class="align-middle text-center text-md" style="padding-top: 0px;">
                        <?=$data->payment_method?>
                    </td>
                    <td class="align-middle text-center" style="padding-top: 0px;">
                        <span class="text-secondary text-md font-weight-bold"><?=$data->purchase_date?></span>
                    </td>
                    <td class="align-middle" >
                        <a href="javascript:;" class="btn bg-gradient-info" >
                        Print
                        </a>
                    </td>
                    <td class="align-middle" >
                        
                        <a href="<?= base_url("databliss/Billing/purchase_delete/".$data->id); ?>" class="btn bg-gradient-danger" >
                        delete
                        </a>
                    </td>
                </tr>
                <?php }?>
                
            </tbody>
            </table>
        </div>
        </div>
    </div>
  </div>
</div>
