
<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/asset/assetManager.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$assetId = $_GET['id'];
$user = new AssetManager();
$lastname = $user->getAlluser();
$classification = $user->getClassfication();
$asset_group = $user->getAssetGroup();
$assetDetails = $user->getAssetDetails($assetId);
$assetAssesmentDetails = $user->getAssetAssement($assetId);
$assetActionDetails = $user->getAssetAction($assetId);

// print_r($assetActionDetails);

$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
?>
<!DOCTYPE html>

<html lang="en" >
   <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshGRC</title>
        <meta name="description" content="Buttons examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
        
        
        <!--begin:: Global Mandatory Vendors -->
<link href="./assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="./assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />

<link href="./assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
<link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
  <style type="text/css">
    td{ height: 50px; }
    td,th { padding: 15px; }
  </style>
</head>
   <?php 
   include '../siteHeader.php';
?>
  <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

       
    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:-14%">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Review
</h3>
</div>

</div>
<input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
<input type="hidden" class="form-control" value="<?php echo $assetId ?>" id="assetId">
<input type="hidden" class="form-control" id="action" value="reviewed">
<div class="kt-portlet__body">

<form name="userForm">
          <div class="panel-body">
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr" style="font-size: 14px !important;">Display Name:</label>
                <p><?php echo $assetDetails[0]['name']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr" style="font-size: 14px;">Asset Group:</label>
                <p><?php echo $assetDetails[0]['assetGroup']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr" style="font-size: 14px;">Status:</label>
                <p><?php echo $assetDetails[0]['status']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr" style="font-size: 14px;">Compliance Name:</label>
                <p><?php echo $assetDetails[0]['complianceName']; ?></p>
              </div>
            </div>
          </div>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table style="width: 100%;">
                  <tbody><tr>
                    <th colspan="6" class="asset-th"><h5><b>Assignment / Security / CIA Information</b></h5></th>
                  </tr>
                  <tr>
                  <td style="background-color: #F2F3F8"><b>Owner : </b><?php echo $assetDetails[0]['ownerName']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Custodian : </b><?php echo $assetDetails[0]['custodianName']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Identifier : </b><?php echo $assetDetails[0]['ReviewerName']; ?></td>
                </tr>
                  
                 <tr>
                  <td style="background-color: #F2F3F8"><b>Evaluator/CIO : </b><?php echo $assetDetails[0]['description']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Location : </b><?php echo $assetDetails[0]['locationname']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Department : </b><?php echo $assetDetails[0]['departmentname']; ?></td>
                </tr>
                <tr>
                  <td style="background-color: #F2F3F8"><b>Confidentiality : </b><?php echo $assetDetails[0]['confidentiality']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Integrity : </b><?php echo $assetDetails[0]['integrity']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Availability : </b><?php echo $assetDetails[0]['availability']; ?></td>
                </tr>
                <tr>
                  <td style="background-color: #F2F3F8"><b>Personal Data : </b><?php echo $assetDetails[0]['personal_data']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Sensitive Data : </b><?php echo $assetDetails[0]['sensitive_data']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Customer Data : </b><?php echo $assetDetails[0]['customer_data']; ?></td>
                </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Classification : </b><?php echo $assetDetails[0]['name']; ?></td>
                     <td style="background-color: #F2F3F8"></td>
                    <td style="background-color: #F2F3F8"></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table style="width: 100%;">
                  <tbody><tr>
                    <th colspan="6" class="asset-th" ><h5><b>Dates</b></h5></th>
                  </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Start Date : </b><?php echo $assetDetails[0]['start_date']; ?></td>
                     <td style="background-color: #F2F3F8"><b>End Date : </b><?php echo $assetDetails[0]['end_date']; ?></td>
                    <td style="background-color: #F2F3F8"><b>Review Date : </b><?php echo $assetDetails[0]['review_date']; ?></td>
                    <td style="background-color: #F2F3F8"><b>Closure Date : </b><?php echo $assetAssesmentDetails[0]['closure_date']; ?></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table style="width: 100%;">
                  <tbody><tr>
                    <th colspan="6" class="asset-th"><h5><b>Assessments</b></h5></th>
                  </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Labelling : </b><?php echo $assetAssesmentDetails[0]['labelling']; ?></td>
                     <td style="background-color: #F2F3F8"><b>Disposal : </b><?php echo $assetAssesmentDetails[0]['disposal']; ?></td>
                    <td style="background-color: #F2F3F8"><b>Storage : </b><?php echo $assetAssesmentDetails[0]['storage']; ?></td>
                  </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Transport : </b><?php echo $assetAssesmentDetails[0]['transmission']; ?></td>
                     <td style="background-color: #F2F3F8"><b>Addressing : </b><?php echo $assetAssesmentDetails[0]['addressing']; ?></td>
                    <td style="background-color: #F2F3F8"><b>Assesments : </b><?php echo $assetAssesmentDetails[0]['assessment']; ?></td>
                  </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Conclusion : </b><?php echo $assetAssesmentDetails[0]['conclusion']; ?></td>
                     <td style="background-color: #F2F3F8"></td>
                     <td style="background-color: #F2F3F8"></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table style="width: 100%;">
                  <tbody><tr>
                    <th colspan="6" class="asset-th"><h5><b>Action</b></h5></th>
                  </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Control for Labelling : </b><?php echo $assetActionDetails[0]['control_for_labeling']; ?></td>
                     <td style="background-color: #F2F3F8"><b>Control for Disposal : </b><?php echo $assetActionDetails[0]['control_for_disposal']; ?></td>
                    <td style="background-color: #F2F3F8"><b>Control for Storage : </b><?php echo $assetActionDetails[0]['control_for_storage']; ?></td>
                  </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Control for Labelling : </b><?php echo $assetActionDetails[0]['control_for_transmission']; ?></td>
                     <td style="background-color: #F2F3F8"><b>Control for Disposal : </b><?php echo $assetActionDetails[0]['control_for_addressing']; ?></td>
                    <td style="background-color: #F2F3F8"></td>
                  </tr>
                </tbody>
               </table>
              </div>
            </div>
          </div>&nbsp;
          <form name="userForm">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-top">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-heading text-center"><h5><strong>Review</strong></h5></div>
                  <div class="panel-body">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="form-group clearfix">
                        <div class="col-sm-12">
                          <label for="usr" style="font-size: 14px;">Review Commets:</label>
                           <textarea name="comment" class="form-control"   rows="1" id="review_comments" style="text-transform: capitalize;"></textarea>
                           </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="form-group clearfix">
                        <div class="col-sm-12">
                          <label for="usr" style="font-size: 14px;">Next Review Date:</label>
                          <input class="form-control" name="review_date" type="date" id="next_review_date" />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="form-group clearfix">
                        <div class="col-sm-12">
                          <label for="sel1" style="font-size: 14px;">Asset Decision:</label>
                            <select class="form-control" id="asset_decision"  name=""  onchange="Reviewstage();">
                            <option></option>
                          <option value="Reviewed">Reviewed</option>
                          <option value="Access Return">Review Returned</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                      <div class="form-group clearfix">
                        <div class="col-sm-12 text-center">
                          <button type="button" class="btn btn-primary" onclick="manageModalReview()" style="float: right;">Submit Review</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>
          </form>
         </div>
        </form>
       </div>
      </div>         
     </div>
    </div>
   </div>
  </div>    
<div>
<?php
include '../audit/sidemenu.php';
 ?>

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
    
     
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

<script src="./assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>

<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>

<script src="./assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="./assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="./assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="js/asset/assetManagement.js"></script>

                  
<script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
