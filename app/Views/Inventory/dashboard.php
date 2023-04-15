<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-xl-12 mb-12">
        <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:2%;">Product ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:30%;">Product </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width:30%;">Product Description</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"style="width:10%;">Quantity</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"style="width:20%;">GST</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:5%;">Price</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 opacity-7" style="width:5%; margin-right:1%">Edit</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:5%; margin-right:1%">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($details as $products){ ?>
                <tr>
                    <td style="text-align:center; padding-top: 0%; font-weight:bold;"><?=$products->id?></td>
                    <td style="padding-top: 0px;">
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-s"><?=$products->product_name?> </h6>
                            <p class="text-s text-secondary mb-0">( SKU : <?=$products->sku_code?>, HSN : <?=$products->hsn?>) </p>
                        </div>
                        </div>
                    </td>
                    <td style="padding-top: 0px;">
                        <p class="text-s font-weight-bold mb-0"><?=$products->description?></p>                    
                    </td>
                    <td class="align-middle text-center text-md" style="padding-top: 0px;">
                        <?=$products->quantity?>
                    </td>
                    <td class="align-middle text-center" style="padding-top: 0px;">
                        <span class="text-secondary text-md font-weight-bold"><?=$products->gst?></span>
                    </td>
                    <td class="align-middle text-center" style="padding-top: 0px;">
                        <span class="text-secondary text-md font-weight-bold"><?=$products->price?></span>
                    </td>
                    <td class="align-middle" >
                        <a href="<?= base_url("databliss/Inventory/product_edit/".$products->id); ?>" class="btn bg-gradient-warning" >
                        Edit
                        </a>
                    </td>
                    <td class="align-middle" >
                        <a href="<?= base_url("databliss/Inventory/product_delete/".$products->id); ?>" class="btn bg-gradient-danger" >
                        Delete
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
