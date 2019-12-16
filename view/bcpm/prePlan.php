<?php
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
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

        <title>FreshGRC Admin</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
       
       
        <!--begin:: Global Mandatory Vendors -->
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />

<link href="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
<link href="metronic/theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css"/>
    <!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->
        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->
       <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
</head>

    
<?php 
   include '../siteHeader.php';
?>
 <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
 

<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<h3 class="kt-portlet__head-title" style="color: white;">
CREATE PLAN
</h3>
</div>
</div>
          <div class="kt-portlet__body">
          <form id="form1">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                  <input type="hidden" class="form-control" id="bcpmId">
                  <input type="hidden" class="form-control" id="action" value="create">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" value="<?php echo $companyId?>" id="company">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" >
                   <div class="form-group" >
                      <label class="control-label" >Date:</label>
                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width: 100% !important;">
                        <input type="text" id="date" class="form-control datepickerClass  notranslate" name="from" class="" autocomplete="off">
                      </div>
                    </div>
                 
                </div>
              <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                     <div class="panel-heading"><b>Distribution List:</b></div>
                    <div class="panel-body">
                      <div class="col-md-4" >
                        <div class="form-group " >
                            <label for="auditTitle">Version No:</label>
                            <input  type="text" class="form-control" id="version_no" required autocomplete="off">
                          </div>        
                      </div>
                      <div class="col-md-4" >
                       <div class="form-group">
                            <?php include '../common/bcpmimplementby.php';?>
                          </div>        
                      </div>                    
                      <div class="col-md-4" >
                        <div class="form-group" >
                          <label class="control-label" >Review Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width: 100% !important;">
                          <input type="text" id="review_date" class="form-control datepickerClass  notranslate" autocomplete="off" name="from" class="">
                        </div>
                          </div>        
                      </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <?php include '../common/bcpmapprovedby.php';?>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label" >Approval Date:</label>
                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd"  style="width: 100% !important;">
                        <input type="text" id="approved_date" class="form-control datepickerClass  notranslate" name="from" class="" autocomplete="off">
                       </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <label for="auditTitle" >Reason for Update:</label>
                      <input  type="text" class="form-control" id="reason_for_update" required autocomplete="off">
                      </div>          
                    </div>
                    </div>        
                  </div>
                </div>
              </div>
              <div class="kt-container">
                 <div class="row">
                   <div class="col-md-6" >
                    <div class="form-group " >
                      <label for="auditTitle" >Confidentiality Statement:</label>
                      <input  type="text" class="form-control" id="confidentiality_statement" required autocomplete="off">
                    </div>          
                  </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <?php include '../common/bcpmfooter.php';?>
                    </div>
                   </div>
                 </div>
               </div>
                <div class="row">
                 <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                   <div class="panel-heading"><b>Update List:</b></div>
                  <div class="panel-body">
                    <div class="col-md-4" >
                    <div class="form-group " >
                      <label for="auditTitle" >Name:</label>
                      <input  type="text" class="form-control" id="update_name" required autocomplete="off">
                    </div>          
                  </div>
<!--                     <div class="col-md-4" >
                    <div class="form-group " >
                      <label for="auditTitle" >Phone:</label>
                   

                       <input type="number" class="form-control form-control" >  -->
                        <!-- <script>
                          function contactno(){
                        var contact=/^\d{10}$/;
                        if (document.getElementById("update_phone").value.match(contact)) {
                           
                        }
                        else
                             swal({
                               title:  'Phone number should be 10 digits',
                               confirmButtonColor: '#3085d6',
                               confirmButtonText:'ok',
                            });
                          }

                      </script> -->
<!--                     </div>          
                  </div> -->
                   
                     <div class="col-md-4" >
                    <div class="form-group " >
                      <label for="auditTitle" >Office Location:</label>
                      <input  type="text" class="form-control" id="update_office_location" required autocomplete="off">
                    </div>          
                  </div>
                     <div class="col-md-4">
                      <div class="form-group">
                     
                        <label class="control-label" >Date Issue:</label>
                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width: 100% !important;">
                        <input type="text" id="update_date_issue" class="form-control datepickerClass  notranslate" name="from" class="" autocomplete="off">
                      </div>
                     </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                        <label >Date Update:</label>
                         <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width: 100% !important;">
                        <input type="text" id="update_date_update" class="form-control datepickerClass  notranslate" name="from" class="" autocomplete="off">
                        </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <?php include '../common/bcpmupdatename.php';?>
                      </div>
                    </div>
                </div>
               </div>
               </div>
               </div>
             </div>
               </form>
              <div class="modal-footer">
                <button type="button" id="manageButton" onclick="manageModal();" data-dismiss="modal" class="btn btn-primary" style="float: right;">plan</button>
              </div>
             
          </div>
        </div>
        </div>
        </div>
        </div>
        </div>  
        </div>
        </body>  
<?php
        include '../audit/sidemenu.php';
        $currentMenu = 'auditorAdmin';
        $userRole = $_SESSION['user_role'];
    ?>


 <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>

<script src="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
               
             <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
             <script src="js/bcpm/bcpmPlanManagement.js"></script>
        <!--end::Global Theme Bundle -->

       
                    <!--begin::Page Scripts(used by this page) -->

                        <!--end::Page Scripts -->
</body>
 
</html>

<script type="text/javascript">
    function logout(){
                debugger
                 $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: "/freshgrc/logout.php"
                         });
                 window.location="/freshgrc/logout.php";
            }
</script>
<script type="text/javascript">
     $(function() {
        $(".datepickerClass").datepicker();
        $('.ui-datepicker').addClass('notranslate');
    });
</script>
<style type="text/css">
  .ui-datepicker-title {
    border: 1px solid #1c94c4;
    background: #ffffff !important url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x;
     color: black !important;
    font-weight: bold;
};
    .ui-datepicker-header  {
    border: 1px solid #e78f08;
    background: #ffffff !important url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x;
    font-weight: bold;
}
.ui-datepicker .ui-datepicker-header {
    position: relative;
    padding: .2em 0;
    background: #1c94c4;
}
</style>