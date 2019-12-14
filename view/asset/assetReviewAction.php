
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
$assetDetails = $user->getAssetDetails1($assetId);
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

        <title>Fresh GRC Admin</title>
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
<link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
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
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  -->
      
    <!-- <script type="text/javascript" src="assets/DataTables/DataTables-1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
           <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
        <script type="text/javascript" src="../../assets/DataTables/pdfmake.min.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>  
  
                    
   <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
           
        <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
        <style type="text/css">
          td{ height: 50px; }
          td,th { padding: 15px; }
        </style>
</head>
<?php 
        include '../siteHeader.php';
?>

<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >

    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Action
</h3>
</div>

</div>
 <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
 <input type="hidden" class="form-control" value="<?php echo $assetId ?>" id="assetId">
 <input type="hidden" class="form-control" id="action" value="create">
 <input type="hidden" class="form-control" id="company" value="<?php echo $assetDetails[0]['complianceId']; ?>">
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
                <label for="usr" style="font-size: 14px !important;">Asset Group:</label>
                <p><?php echo $assetDetails[0]['assetGroup']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr" style="font-size: 14px !important;">Status:</label>
                <p><?php echo $assetDetails[0]['status']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr" style="font-size: 14px !important;">Compliance Name:</label>
                <p><?php echo $assetDetails[0]['complianceName']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table style="width: 100%;">
                  <tbody>
                    <tr>
                    <th colspan="6" class="asset-th" style=""><h5><b>Assignment / Security / CIA Information</b></h5></th>
                  </tr>
                  <tr>
                  <td style="background-color: #F2F3F8"><b>Owner: </b><?php echo $assetDetails[0]['ownerName']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Custodian: </b><?php echo $assetDetails[0]['custodianName']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Identifier: </b><?php echo $assetDetails[0]['ReviewerName']; ?></td>
                </tr>
                <tr>
                  <td style="background-color: #F2F3F8"><b>Evaluator/CIO: </b><?php echo $assetDetails[0]['description']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Location: </b><?php echo $assetDetails[0]['locationname']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Department: </b><?php echo $assetDetails[0]['departmentname']; ?></td>
                </tr>
                <tr>
                  <td style="background-color: #F2F3F8"><b>Confidentiality: </b><?php echo $assetDetails[0]['confidentiality']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Integrity: </b><?php echo $assetDetails[0]['integrity']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Availability: </b><?php echo $assetDetails[0]['availability']; ?></td>
                </tr>
                <tr>
                  <td style="background-color: #F2F3F8"><b>Personal Data: </b><?php echo $assetDetails[0]['personal_data']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Sensitive Data: </b><?php echo $assetDetails[0]['sensitive_data']; ?></td>
                  <td style="background-color: #F2F3F8"><b>Customer Data: </b><?php echo $assetDetails[0]['customer_data']; ?></td>
                </tr>
                  <tr>
                     <td style="background-color: #F2F3F8"><b>Classification: </b><?php echo $assetDetails[0]['name']; ?></td>
                     <td style="background-color: #F2F3F8"></td>
                    <td style="background-color: #F2F3F8"></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>&nbsp;
          <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="form-group clearfix">
              <div class="col-sm-12" style="background-color: #F2F3F8;font-weight:500;font-size:12px;color:#333;padding:5px">
                <label for="usr" style="font-size: 14px !important;">Assessment:</label>
                <span></span>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group clearfix">
              <div class="col-sm-12" style="background-color: #F2F3F8;font-weight:500;font-size:12px;color:#333;padding:5px">
                <label for="usr" style="font-size: 14px !important;">Conclusion:</label>
                <span></span>
              </div>
            </div>
          </div> -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table class="" style="width: 100%;">
                  <tbody><tr>
                    <th colspan="4" class="asset-th" style=""><h5><b>Information Asset Properties</b></h5></th>
                  </tr>
                  <tr>
                    <td style="background-color: #F2F3F8"><label>Current Level of Protection - When Information is in rest : </label>            
                        <span>
                          High
                        </span>              
                      <span>
                    </span></td>
                    <td style="background-color: #F2F3F8"><label>Current Level of Protection - When Information is moved : </label>
                      <span>
                        Low
                      </span>
                    </td>
                    <td style="background-color: #F2F3F8">
                      <label>Data Retention Period (in Years) :</label>
                      <span> <?php echo $assetDetails[0]['retentionPeriod'];?></span>
                    </td>
                  </tr>
                </tbody>
               </table>
              </div>
            </div>
          </div>
      </div><br>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-top">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-heading text-center"><h5><strong>Assessment Done</strong></h5></div>
                  <div class="panel-body">
                    <form name="userForm" id="assetActionForm" >
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr" style="font-size: 14px !important;">Control for Labelling</label>
                               <div class="form-group "  >
                              <?php include '../common/controldropdown.php';?> 
                           </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr" style="font-size: 14px !important;">Control for Disposal:</label>
                              <div class="form-group "  >
                              <?php include '../common/controldropdisposal.php';?> 
                           </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr" style="font-size: 14px !important;">Control for Storage:</label>
                               <div class="form-group " >
                                <?php include '../common/controlforStoragedropdown.php';?>
                                </div> 
                               </div>
                            </div>
                        </div>
                      <!-- </div> -->
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr" style="font-size: 14px !important;">Control for Transport or Transmission:</label>
                               <div class="form-group "  >
                                  <?php include '../common/controlfortransdropdown.php';?> 
                              </div>
                              </div>
                          </div>
                        </div>
                      <!-- </div> -->
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr" style="font-size: 14px !important;">Control for Addressing:</label>
                               <div class="form-group "  >
                              <?php include '../common/controlforaddressingdropdown.php';?> 
                            </div>
                            </div>
                        </div>
                      </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="comment" style="font-size: 14px !important;">Comment:</label>
                            <textarea name="description" class="form-control"  rows="1" id="comment" style="text-transform: capitalize;"></textarea>
                           </div>
                        </div>
                      </div>
                      <!-- </div> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" onclick="createAssetAction()" style="float: right;">ADD ACTION</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>
     </div>
    </div>
  </div>
</div>
<?php 
        $currentMenu = 'auditorAdmin';
        include '../audit/sidemenu.php';
         $userRole = $_SESSION['user_role'];

    ?>
<!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
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
<script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="./assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="./assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="./assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="./assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="./assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="./assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
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
<script src="js/asset/assetManagement.js"></script>
  <!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
    </body>
    
</html>
<script type="text/javascript">
     $(function() {
        $(".datepickerClass").datepicker();
        $('.ui-datepicker').addClass('notranslate');
    });

       vm.downloadpdf = function(){    
    dmreportService.createreport($stateParams.id).then(function(response){
         var a = document.createElement("a");
         document.body.appendChild(a);
         var file = new Blob([response.data], {type: 'application/pdf'});
         var fileURL = URL.createObjectURL(file);
         a.href = fileURL;
         a.download = "dm_report.pdf";
         a.click();        
      });
   } ; 
   vm.downloadzip = function(){
      dmreportService.createreport($stateParams.id).then(function(response){
         var zip = new JSZip();
         zip.file("dm_report.pdf", response.data);
          zip.generateAsync({
              type: "base64"
          }).then(function(content) {        
            window.location.href = "data:application/zip;base64," + content;
          });        
      });
   };


   $path = BASE_URL."/pdf/"; 
$filename= $path.basename($_GET['download_file']);

header("Cache-Control: public");
header("Content-Description: File Transfer");
header('Content-disposition: attachment filename='.basename($filename)); 
header("Content-Type: application/pdf");
header("Content-Transfer-Encoding: binary");
header('Content-Length: '. filesize($filename));
readfile($filename);
exit;
</script>
  <script type="text/javascript">
$('#cmd').click(function() {
var element = document.getElementById('element-to-print');
html2pdf(element, {
  margin:       0,
  filename:     'DisasterReport.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
});
});
</script>  
