<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


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
                  Generate Invoice
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h3>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <br>
            <center>
            <div class="alert alert-info col-8 mt-3" role="alert" style="opacity: 1; transition: opacity 0.5s ease-in-out;">
              <span style="color:white;">
              <strong>Info!</strong> Enter Customer Contact No. If Customer exist data will be fetched  
              </span>
            </div>
            <div class="alert alert-info col-8 mt-3" role="alert" style="opacity: 1; transition: opacity 0.5s ease-in-out;">
              <span style="color:white;">
              <strong>Info!</strong> Enter Pincode State and City Will be updated automatically
              </span>
            </div>
            </center>
              <form class="form mt-1" action="<?= base_url('databliss/Billing/invoice_data')?>" method="post">
                <div class="row">
                <div class="col-md-6">  
                    <div class="form-group">
                      <label for="tel-input" class="form-control-label" style="font-size:1em;">Customer Contact No.<span style="color:red;"> * </span> : </label>
                      <input class="form-control" name="customer_phone" type="tel" placeholder="9999999999" id="customer_phone" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">Customer Name<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="customer_name" type="text" placeholder="Customer Name" id="customer_name" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">Customer GSTIN : </label>
                      <input class="form-control" name="customer_gstin" type="text" placeholder="Customer GSTIN" id="customer_gstin">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email-input" class="form-control-label" style="font-size:1em;">Customer Email : </label>
                      <input class="form-control" name="customer_email" type="email" placeholder="customer@mail.com" id="customer_email" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">City<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="customer_city" type="text" placeholder="Customer Address" id="customer_city" required="required" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">State<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="customer_state" type="text" placeholder="Customer State" id="customer_state" required="required" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="number-input" class="form-control-label" style="font-size:1em;">Pincode<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="customer_pincode" type="number" placeholder="Customer Pincode" id="customer_pincode" required="required">
                    </div>
                  </div>
                </div>
                
                <hr>
                <div class="card">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-secondary text-sm " style="font-size:1em; width:1%"></th>
                          <th class="text-secondary text-sm center" style="font-size:1em; width:1%">S No.</th>
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder" style="font-size:1em; width:47%;">Product</th>
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder " style="font-size:1em; width:8%;">HSN</th>
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder " style="font-size:1em; width:8%;">Qty</th>
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder " style="font-size:1em; width:8%;">Discount</th>
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder " style="font-size:1em; width:11%;">Rate</th> 
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder " style="font-size:1em; width:10%;">GST</th>  
                          <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder " style="font-size:1em; width:13%;">total</th>  

                          <th class="text-secondary text-sm " style="font-size:1em; width:1%"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class = "items">
                        <td style="text-align:center; padding-top: 0.8%;"><button type="button" class="btn btn-danger"><i class="ni ni-fat-delete"></i></button></td>
                        <td class="sno" style="text-align:center; padding-top: 0%; font-weight:bold;">1</td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <select class="form-select product" id="product" name="product[]">
                            </select>
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <input class="form-control hsn" type="text" value="0" id="hsn" name="hsn[]">
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <input class="form-control quantity" type="number" value="1" id="quantity" name="quantity[]" min="1">
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <input class="form-control discount" type="number" value="0" id="discount" name="discount[]" min="0" max="100">
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <input class="form-control price" type="number" value="0" id="price" name="price[]">
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <input class="form-control gst" type="number" value="0" min='0' max='100' id="gst" name="gst[]">
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;">
                          <div class="form-group">
                            <input class="form-control total" type="number" value="0" id="total" name="total[]" readonly>
                          </div>
                        </td>
                        <td style="text-align:center; padding-top: 0.8%;"><button type="button" class="btn btn-success"><i class="ni ni-fat-add"></i></button></td>
                      </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <!-- <div class="card col-md-6 offset-md-6">
                  <div class="table-responsive">
                    <table class="table mb-0 ">
                      <tbody>
                        <tr>
                          <th>Discount Amount</th>
                          <td>
                            <div class="form-group">
                              <input class="form-control" type="number" value="0" id="final_discount" name="final_discount" readonly>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>Sub Total</th>
                          <td>
                            <div class="form-group">
                              <input class="form-control" type="number" value="0" id="sub_total" name="sub_total" readonly>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>Taxable Amount</th>
                          <td>
                            <div class="form-group">
                              <input class="form-control" type="number" value="0" id="total_tax" name="total_tax" readonly>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td>
                            <div class="form-group">
                            <input class="form-control" type="number" value="0" id="final_total" name="final_total" readonly>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> -->
                <div class="row m-1">
                  <div class="card col-md-5">
                    <div class="table-responsive">
                      <table class="table mb-0">
                        <tbody>
                          <tr>
                            <th style="width:50%">Payment Mode</th>
                            <td>
                              <div class="form-group">
                                <select class="form-control" id="payment_mode" name="payment_mode">
                                  <option value="Cash" default>CASH</option>
                                  <option value="UPI">UPI</option>
                                  <option value="Bank Transfer">Bank Transfer (RTGS/NEFT)</option>
                                  <option value="Credit">Credit</option>
                                  <option value="Debit">Debit</option>
                                  <option value="Exchange">Exchange</option>
                                </select>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th style="width:50%">Transportation</th>
                            <td>
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="transportation" >
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th style="width:50%">Transproter Name</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter Transproter Name" id="transport_name" name="transport_name"  >
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th style="width:50%">Transproter Number</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="text"  placeholder="Enter Transproter Number" id="transport_number" name="transport_number" >
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th style="width:50%">Vehical Number</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="text"  placeholder="Enter Vehical Number" id="vehical_number" name="vehical_number" >
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card col-md-4 offset-md-3">
                    <div class="table-responsive">
                      <table class="table mb-0">
                        <tbody>
                          <tr>
                            <th>Discount Amount</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="number" value="0" id="final_discount" name="final_discount" readonly>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th>Sub Total</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="number" value="0" id="sub_total" name="sub_total" readonly>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th>Taxable Amount</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="number" value="0" id="total_tax" name="total_tax" readonly>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <th>Total</th>
                            <td>
                              <div class="form-group">
                                <input class="form-control" type="number" value="0" id="final_total" name="final_total" readonly>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>

  // Get the div element
document.addEventListener('DOMContentLoaded', () => {
  const alertDivs = document.querySelectorAll('.alert');

  // Set a timeout to fade out and remove each alert div after 10 seconds
  alertDivs.forEach(alertDiv => {
    setTimeout(() => {
      if (alertDiv) {
        alertDiv.style.opacity = 0;
        setTimeout(() => {
          alertDiv.remove();
        }, 500); // wait for the fade-out animation to finish before removing the element
      }
    }, 5000);
  });
});
// Get the necessary elements
const transportationCheckbox = document.getElementById('transportation');
const transportNameField = document.getElementById('transport_name').parentNode.parentNode.parentNode;
const transportNumberField = document.getElementById('transport_number').parentNode.parentNode.parentNode;
const vehicalNumberField = document.getElementById('vehical_number').parentNode.parentNode.parentNode;

    transportNameField.style.display = 'none';
    transportNumberField.style.display = 'none';
    vehicalNumberField.style.display = 'none';

// Add event listener to the checkbox
transportationCheckbox.addEventListener('change', (event) => {
  if (event.target.checked) {
    // Show the transport name and number fields
    transportNameField.style.display = 'table-row';
    transportNumberField.style.display = 'table-row';
    vehicalNumberField.style.display = 'table-row';

  } else {
    // Hide the transport name and number fields
    transportNameField.style.display = 'none';
    transportNumberField.style.display = 'none';
    vehicalNumberField.style.display = 'none';

  }
});

  $(document).ready(function() {
    $('#customer_pincode').blur(function() { // When user loses focus from pincode input
      var pincode = $(this).val(); // Get the pincode entered by the user
      if (pincode.length == 6) { // If pincode is valid
        $.ajax({ // Make an AJAX call to fetch city and state from API
          url: 'https://api.postalpincode.in/pincode/' + pincode,
          type: 'GET',
          success: function(result) {
            if (result[0].Status == 'Success') { // If API returns successful response
              var city = result[0].PostOffice[0].District; // Get city from response
              var state = result[0].PostOffice[0].State; // Get state from response
              $('#customer_city').val(city); // Update city field in the form
              $('#customer_state').val(state); // Update state field in the form
            }
          }
        });
      }
    });
  });

//  customer data fetch
$(document).ready(function(){
    $('#customer_phone').on('change', function(){
        var customer_phone = $(this).val();
        $.ajax({
            url: '<?php echo base_url('databliss/Contact/fetch_data'); ?>',
            method: 'GET',
            data: {customer_phone: customer_phone},
            success: function(response){
                var data = response;
                $('#customer_name').val(data.contact_name);
                $('#customer_pincode').val(data.contact_pincode);
                $('#customer_email').val(data.contact_email);
                $('#customer_gstin').val(data.gst_number);
                var pincode = $('#customer_pincode').val(); // Get the pincode entered by the user
                if (pincode.length == 6) { // If pincode is valid
                    $.ajax({ // Make an AJAX call to fetch city and state from API
                        url: 'https://api.postalpincode.in/pincode/' + pincode,
                        type: 'GET',
                        success: function(result) {
                            if (result[0].Status == 'Success') { // If API returns successful response
                                var city = result[0].PostOffice[0].District; // Get city from response
                                var state = result[0].PostOffice[0].State; // Get state from response
                                $('#customer_city').val(city); // Update city field in the form
                                $('#customer_state').val(state); // Update state field in the form
                            }
                        }
                    });
                }
            }
        });
    });
});

//DROP DOWN QUERY

function calculateTotal() {
  var total_sum = 0;
  var total_price= 0;
  var total_discount=0;
  var total_tax = 0;
  
  $('.items').each(function() {
  var quantity = parseFloat($(this).find('.quantity').val());
  var price = parseFloat($(this).find('.price').val());
  var current_total = quantity * price;
  total_discount += (current_total*((parseFloat($(this).find('.discount').val()))/100));
  total_price += (current_total*((100-(parseFloat($(this).find('.discount').val())))/100));
  total_sum += parseFloat($(this).find('.total').val());
  total_tax += ((current_total - (current_total*((parseFloat($(this).find('.discount').val()))/100))) * ((parseFloat($(this).find('.gst').val()))/100));
  });

  $('#final_discount').val(total_discount.toFixed(2));
  $('#sub_total').val(total_price.toFixed(2));
  $('#total_tax').val((total_tax.toFixed(2)));
  $('#final_total').val(total_sum.toFixed(2));
}


$(document).ready(function() {
  var $product = $('.product');

  $(document).on('change', '.product', function() {
    var $product = $(this);
    var $price = $product.closest('tr').find('.price');
    var $quantity = $product.closest('tr').find('.quantity');
    var $discount = $product.closest('tr').find('.discount');
    var $gst = $product.closest('tr').find('.gst');
    var $total = $product.closest('tr').find('.total');
    var $hsn = $product.closest('tr').find('.hsn');


    if ($product.val() == 'other') {
      $product.replaceWith('<input type="text" class="form-control product" name="product[]" placeholder="Enter product name">');
      $price.val(0);
      $gst.val(0);
      $total.val(0);
      $gst.prop('readonly',false);
      $quantity.removeAttr('max');
      $price.prop('readonly', false);
    } else {
      var selected_id = $product.val();
      $.ajax({
        url: '<?php echo base_url("databliss/Product/get_product_details"); ?>',
        type: 'GET',
        dataType: 'json',
        data: { product_id: selected_id },
        success: function(data) {
          var price = parseFloat(data.price);
          var quantity = parseInt($quantity.val());
          var gst = parseFloat(data.gst);
          var hsn = (data.hsn);
          var total = (price * quantity)*((100+gst)/100);
          $hsn.val(hsn)
          $hsn.prop('readonly',true)
          $gst.val(gst)
          $gst.prop('readonly',true)
          $price.val(price.toFixed(2));
          $quantity.attr('max', data.quantity).val(1);
          $total.val(total.toFixed(2));
          $price.prop('readonly', true);
          calculateTotal();
        },
      });
    }
    calculateTotal();
  });

  $.ajax({
  url: '<?php echo base_url("databliss/Product/fetch_products"); ?>',
  type: 'GET',
  dataType: 'json',
  success: function(data) {
    let options = '<option value="">Select a product</option>';
    data.forEach((value) => {
      options += `<option value="${value.id}">${value.id}. ${value.product_name} (${value.sku_code})</option>`;
    });
    options += '<option value="other">Enter Other Product</option>';
    $('.product').each(function() {
      $(this).html(options);
    });
  },
  });

  $(document).on('input', '.quantity, .price, .discount, .gst', function() {
    var $row = $(this).closest('tr');
    var price = parseFloat($row.find('.price').val());
    var quantity = parseInt($row.find('.quantity').val());
    var discount = parseInt($row.find('.discount').val());
    var gst = parseInt($row.find('.gst').val());
    var total = ((price * quantity) * (100 - discount) / 100) * ((100+gst)/100);
    $row.find('.total').val(total.toFixed(2));
    calculateTotal();
  });


  

  $(document).on('click', '.btn-success', function() {
    var $row = $(this).closest('tr');
    var $clone = $row.clone();
    var sno = parseInt($clone.find('.sno').text()) + 1;
    $clone.find('.sno').text(sno);
  $clone.find('.product').val(''); // clear the value of the product field in the new row
  $clone.find('.quantity').val('1'); // set default value of quantity to 1
  $clone.find('.discount').val('0'); // set default value of discount to 0
  $clone.find('.gst').val('0'); // set default value of gst to 0
  $clone.find('.gst').prop('readonly',false); // set default value of gst to 0
  $clone.find('.price').val('0'); // set default value of price to 0
  $clone.find('.price').prop('readonly',false); // set default value of gst to 0

  $clone.find('.total').val('0'); // set default value of total to 0
    $row.after($clone);
  });

  $(document).on('click', '.btn-danger', function() {
    $(this).closest('tr').remove();
  });
  
});



</script>

