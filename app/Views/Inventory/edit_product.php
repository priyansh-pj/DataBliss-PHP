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
                  Edit Product Details
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h3>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <br>
            <br>
              <form class="form mt-1" action="<?= base_url('databliss/Inventory/update_product')?>" method="post">
                <div class="row">
                <div class="col-md-6">  
                    <input type="hidden" value="<?= $product->id?>" name="id">
                    <div class="form-group">
                      <label for="tel-input" class="form-control-label" style="font-size:1em;">Product Name<span style="color:red;"> * </span> : </label>
                      <input class="form-control" name="product_name" type="text" placeholder="Product Name" value="<?= $product->product_name?>" id="customer_phone" required="required">
                    </div>
                  </div>
                  <div class="col-md-3">  
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">SKU Code<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="sku_code" type="text" placeholder="SKU Code" value = "<?= $product->sku_code?>" id="sku_code" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">HSN Code : </label>
                      <input class="form-control" name="hsn" type="text" placeholder="HSN Code" value = "<?= $product->hsn?>" id="hsn">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="email-input" class="form-control-label" style="font-size:1em;">Description : </label>
                      <textarea class="form-control" name="description"  placeholder="Description" id="description" value = "<?= $product->description?>" row="2"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">Quantity<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="quantity" type="number" placeholder="Quantity" id="quantity" value = "<?= $product->quantity?>" required="required">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">GST<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="gst" type="number" placeholder="GST" id="gst" value = "<?= $product->gst?>" required="required">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="number-input" class="form-control-label" style="font-size:1em;">Price<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="price" type="number" placeholder="Price" id="price" value = "<?= $product->price?>" required="required">
                    </div>
                  </div>
                </div>
                


                <br>
                <div class="col-12 ml-1 text-end">
                  <input type="submit" class="btn btn-info bg-gradient-secondary btn-lg"/>
                </div>
              </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>