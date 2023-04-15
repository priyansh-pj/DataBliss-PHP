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
                  Create Organization
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h3>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <br>
            <center>
            <div class="alert alert-info col-4 mt-3" role="alert">
              <span style="color:white;">
              <strong>Info!</strong> Enter Pincode State and City Will be updated automatically
              </span>
            </div>
            </center>
              <form class="form mt-1" action="<?= base_url('databliss/organization_create')?>" method="post">
                <div class="row">
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">Organization Name<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="org_name" type="text" placeholder="Organization Name" id="text-input" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="email-input" class="form-control-label" style="font-size:1em;">Organization Email<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="org_email" type="email" placeholder="organization@mail.com" id="email-input" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">Organization GSTIN : </label>
                      <input class="form-control" name="org_gstin" type="text" placeholder="Organization GSTIN" id="org_gstin">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tel-input" class="form-control-label" style="font-size:1em;">Phone<span style="color:red;"> * </span> : </label>
                      <input class="form-control" name="org_phone" type="tel" placeholder="9999999999" id="org_phone" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="text-input" class="form-control-label" style="font-size:1em;">Address<span style="color:red;"> * </span> :</label>
                  <input class="form-control" name="org_address" type="text" placeholder="Organization Address" id="org_address" required="required">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">City<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="org_city" type="text" placeholder="Organization Address" id="org_city" required="required" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">State<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="org_state" type="text" placeholder="Organization State" id="org_state" required="required" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="number-input" class="form-control-label" style="font-size:1em;">Pincode<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="org_pincode" type="number" placeholder="Organization Pincode" id="org_pincode" required="required">
                    </div>
                  </div>
                </div>

                <div class="col-12 ml-1 text-end">
                  <input type="submit" class="btn bg-gradient-secondary btn-lg"/>
                </div>
              </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#org_pincode').blur(function() { // When user loses focus from pincode input
      var pincode = $(this).val(); // Get the pincode entered by the user
      if (pincode.length == 6) { // If pincode is valid
        $.ajax({ // Make an AJAX call to fetch city and state from API
          url: 'https://api.postalpincode.in/pincode/' + pincode,
          type: 'GET',
          success: function(result) {
            if (result[0].Status == 'Success') { // If API returns successful response
              var city = result[0].PostOffice[0].District; // Get city from response
              var state = result[0].PostOffice[0].State; // Get state from response
              $('#org_city').val(city); // Update city field in the form
              $('#org_state').val(state); // Update state field in the form
            }
          }
        });
      }
    });
  });
</script>

