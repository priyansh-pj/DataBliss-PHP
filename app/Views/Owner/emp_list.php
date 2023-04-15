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
                   Employee List
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h3>
              </div>
            </div>
          </div>
          <br><br>
          <div class="row align-items-center">
            <br>



					<table id="myTable" class="table table-bordered  table-hover">
					<thead>
						<tr> 
                            <th style="width: 5%; text-align: center;">S.No.</th>
							<th style="width: 5%; text-align: center;">EID</th>
							<th style="width: 10%; text-align: center;">Username</th>  
							<th style="width: 25%; text-align: center;"> Name</th>  
                            <th style="width: 15%; text-align: center;">Contact No</th>
							
                        </tr>
					</thead> 
					<tbody>  
					
                    <?php $sno=1; foreach ($emp_detail as $requests){ ?>

					<tr>

					<td style="text-align:center;"><?=$sno;?></td>
					<td style="text-align:center;"><?=$requests->employee_id ?></td>
					<td style="text-align:center;"><?=$requests->employee_username ?></td>
                    <td style="text-align:center;"><?= $requests->employee_name?></td>
					<td style="text-align:center;"><?=$requests->contact_no?></td>
          

					
					

					<?php $sno++; } ?>

						</tr>


					</tbody> </table>

            
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



