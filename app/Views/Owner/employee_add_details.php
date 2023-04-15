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
                  ADD Employee Details :
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h3>
              </div>
            </div>
          </div>
          <br><br>
          <div class="row align-items-center">
            <br>
           
              <form class="form mt-1" action="<?= base_url('databliss/Owner/insert_employee')?>" method="post">
                <input type='hidden' name = "uid" value="<?= $uid?>">
                <div class="row">
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="text-input" class="form-control-label" style="font-size:1em;">Employee Role<span style="color:red;"> *</span> : </label>
                        <select class="form-control" name="employee_role" id="employee_role" placeholder="Departure" required="required">
                            <option value="" selected=""></option>
                            <option value="Accountant">Accountant</option>
                            <option value="Analyst">Analyst</option>
                            <option value="Sales">Sales</option>
                            <option value="Analyst,Accountant">Analyst and Accountant</option>
                            <option value="Analyst,Sales">Analyst and Sales</option>
                            <option value="Accountant,Sales">Accountant and Sales</option>
                            <option value="Analyst,Accountant,Sales">Analyst, Accountant and Sales</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="number" class="form-control-label" style="font-size:1em;">Gov ID<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="gov_id" type="number" placeholder="gov id" id="text-input" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="number" class="form-control-label" style="font-size:1em;">Salary: </label>
                      <input class="form-control" name="salary" type="text" placeholder="Salary" id="salary" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="number" class="form-control-label" style="font-size:1em;">Address<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="address" type="text" placeholder="address" id="text-input" required="required">
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

