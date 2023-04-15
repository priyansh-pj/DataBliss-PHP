<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- NAVIGATION Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('databliss/public/assets/img/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?= base_url('databliss/public/assets/img/favicon.png')?>">
  <!-- title -->
  <title>DataBliss</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('databliss/public/assets/css/nucleo-icons.css')?>" rel="stylesheet" />
  <link href="<?= base_url('databliss/public/assets/css/nucleo-svg.css')?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('databliss/public/assets/css/nucleo-svg.css')?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('databliss/public/assets/css/soft-ui-dashboard.css?v=1.0.3')?>" rel="stylesheet" />

</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <!-- SIDE BAR START-->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main" data-color="dark">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?= base_url('databliss/')?>" target="_blank">

        <img src="<?= base_url('databliss/public/assets/img/logo-ct.png')?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">DataBliss</span>
      </a>
    </div>

  <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main" style="height: auto; width: auto; max-height: 82vh !important;">
      <?php if($role===""){ ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <div class="nav-link active">
            <span class="text-center nav-link-text ms-1">UID : <?= $profile->uid?></span>
          </div>
        </li>
        <li class="nav-item">
          <div class="nav-link active">
            <span class="text-center nav-link-text ms-1">Username : <?= $profile->username?></span>
          </div>
        </li>
        <li class="nav-item">
          <div class="nav-link active">
            <span class="text-justify nav-link-text ms-1">Name : <br><?= $profile->first_name." ".$profile->last_name?></span>
          </div>
        </li>
        <li class="nav-item">
          <div class="nav-link active">
            <span class="text-justify nav-link-text ms-1">Email :<br> <?= $profile->email?></span>
          </div>
        </li>
        <li class="nav-item">
          <div class="nav-link active">
            <span class="text-center nav-link-text ms-1">Contact No : <?= $profile->contact_no?></span>
          </div>
        </li>
      </ul>
      <?php } ?>
        <!-- Owner Start -->
      <?php if($role=="OWNER"){?>
        <ul class="navbar-nav">
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Owner</h6>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee_management')?>">Employee</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/employee_list')?>">Employee List</a>
            </div>
          </li>
        </ul> 
      <?php }?>
        <!-- Owner end -->

        
        <!-- Accountant Start -->
      <?php if(strpos($role,"Accountant") || $role=="OWNER" ){?>
        <ul class="navbar-nav">
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Accountant</h6>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Billing')?>">Billing</a>
            </div>
          </li>
          <li class="nav-item">
          <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Inventory')?>">Inventory</a>
          </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">Expense</a>
            </div>
          </li>
        </ul>
      <?php }?>
        <!-- Accountant End -->


        <!-- Analyst Start -->
      <?php if(strpos($role,"Analyst") || $role=="OWNER"){?>
        <ul class="navbar-nav">
           <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Analyst</h6>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">Insights</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">EDA</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
              <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">Graphs</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
              <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">Prediction</a>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
              <a style="margin-left:28px;" href="<?=base_url('databliss/Inventory')?>">Inventory</a>
            </div>
          </li>
            <li class="nav-item">
            <div class="nav-link active">
              <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">Data</a>
            </div>
          </li>
        </ul>
      <?php }?>
        <!-- Analyst End -->
        
        <!-- Sales Start -->
      <?php if(strpos($role,"Sales") || $role=="OWNER"){?>
        <ul class="navbar-nav">
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Sales</h6>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Owner/employee')?>">Quotation</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
            <a style="margin-left:28px;" href="<?=base_url('databliss/Billing')?>">Transfer</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-link active">
              <a style="margin-left:28px;" href="<?=base_url('databliss/Billing')?>">Sales</a>
            </div>
          </li>
        </ul>
      <?php }?>
        <!-- Sales End -->

        
        
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="<?= base_url('databliss/profile')?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="<?= base_url('databliss/logout')?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
        
      </ul>
    </div>
   
  </aside>
  <!-- SIDE BAR END-->
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0"><?= $title?></h6>
        </nav>

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item d-flex ps-3  align-items-center">
              <a href="profile.html" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Profile</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->





































