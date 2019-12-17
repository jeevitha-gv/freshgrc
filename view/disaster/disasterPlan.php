<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once '../../php/common/dashboard.php';


$userRole = $_SESSION['user_role'];



$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];





$manager = new dashboard();
$allUsers = $manager->getAllUsersForTicket();


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
<link href="assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
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


<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    
                    <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>

    <?php 
            include '../siteHeader.php';
  ?>
 <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

       

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<!--begin::Portlet-->
<div class="kt-portlet">
<div class="kt-portlet__head" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<h3 class="kt-portlet__head-title" style="color: white;">
CREATE PLAN
</h3>
</div>
</div>
          <div class="kt-portlet__body">
          <div class="form-group row ">
                    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                    <input type="hidden" class="form-control" id="auditId">
                    <input type="hidden" class="form-control" id="action" value="create">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" value="<?php echo $companyId?>" id="company">
                  </div>
                </div>
               </div>
                <div class="row">
                  <div class="form-group col-md-4" >
                      <label for="auditTitle" >Scope</label>
                        <input type="text" class="form-control" id="scope" style="text-transform: capitalize;">
                  </div>
                  <div class="form-group col-md-4" >
                      <label for="auditTitle" >Purpose</label>
                        <input type="text" id="purpose" class="form-control" style="text-transform: capitalize;">
                  </div>
                  <div class="form-group col-md-4" >
                      <label for="auditTitle" >Disaster Definition</label>
                        <input type="text" id="disaster_definition" class="form-control" style="text-transform: capitalize;">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                      <label for="auditDesc">Summary</label>
                      <textarea class="form-control" maxlength="5000" rows="1" id="summary" required style="text-transform: capitalize;"></textarea>
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="auditDesc">Assumption</label>
                      <textarea class="form-control" maxlength="5000" rows="1" id="assumption" required style="text-transform: capitalize;"></textarea>
                  </div>
                </div>
                <span style="font-size: 13px;"><b>Contractual Agreement</b></span><br>
                <div class="row">
                  <div class="form-group col-md-4" >
                      <label for="auditTitle" >Company Name</label>
                        <input type="text" id="company_name" class="form-control" style="text-transform: capitalize;">
                    </div>          
                  <div class="col-md-4 form-group" >
                      <label for="auditTitle" >Contracter Name</label>
                        <input type="text" id="contracted_name" class="form-control" style="text-transform: capitalize;">
                      </div>
                  <div class="form-group col-md-4" >
                      <label for="auditTitle" >Covered System Name</label>
                        <input type="text" id="covered_system_name" class="form-control" style="text-transform: capitalize;">
                  </div>
                </div>
                <!-- /////////////////////////////////////////// -->
                <span style="font-size: 15px;"><b>POC</b></span><br>
                <div class="portlet light portlet-fit portlet-datatable bordered">
                
                  <div class="portlet-body">
                      <div class="tabbable-line">
                          <ul class="nav nav-tabs nav-tabs-lg">
                              <li class="active">
                                  <a href="#tab_1" data-toggle="tab" aria-expanded="false">Internal Contact </a>
                              </li>
                              <li class="">
                                  <a href="#tab_2" data-toggle="tab" aria-expanded="false">External Contact
                                  </a>
                              </li>

                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                  <div class="col-md-4" >
                                    <label for="assignedto" style="font-weight: normal;">Name</label>

                                      <select id="internal_name" name="assignedtoDropDown" class="form-control" >
                                      <option>--Select User--</option>    
                                      <?php foreach($allUsers as $users){ ?>
                                      <option value="<?php echo $users['id'] ?>"><?php echo $users['last_name'] ?></option>
                                      <?php } ?>
                                  </select>
                                  </div> 
                                  <div class="form-group col-md-4" >
                                      <label>Email Address</label>
                                          <input type="text" id="internal_email" class="form-control" > 
                                  </div>
                                  <div class="col-md-4 form-group" >
                                      <label>Phone</label>
                                          <input type="number" id="internal_phone" class="form-control" > 
                                  </div>
                                  </div>
                                  <div class="row">
                                  <div class="col-md-6 form-group">
                                      <label for="auditDesc">System</label>
                                      <textarea class="form-control" id="internal_system" maxlength="5000" rows="1" style="text-transform: capitalize;"></textarea>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="auditDesc">Role Description</label>
                                      <textarea class="form-control" maxlength="5000" rows="1" id="internal_role_description" style="text-transform: capitalize;"></textarea>
                                  </div>    
                              </div>
                            </div>
                              <div class="tab-pane" id="tab_2">
                                <div class="table-container" style="">
                                  <div class="row">
                                  <div class="col-md-4" >
                                   <label for="assignedto" style="font-weight: normal;">Name</label>
                                    <input id="external_name" name="assignedtoDropDown" class="form-control" style="text-transform: capitalize;">
                                  </div> 
                                  <div class="form-group col-md-4" >
                                      <label>Email Address</label>
                                          <input type="text" id="external_email" class="form-control"> 
                                  </div>
                                  <div class="form-group col-md-4" >
                                      <label>Phone</label>
                                          <input type="number" id="external_phone" class="form-control" > 
                                  </div>
                                  </div>
                                  <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="auditDesc">System</label>
                                      <textarea id="external_system" class="form-control" maxlength="5000" rows="1" style="text-transform: capitalize;"></textarea>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="auditDesc">Role Description</label>
                                      <textarea class="form-control" id="external_role_description" maxlength="5000" rows="1" style="text-transform: capitalize;"></textarea>
                                  </div>    
                              </div>
                                </div>                                           
                         </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- ////////////////////////////////////////////////////// -->
               <span style="font-size: 15px;"><b>POC</b></span><br>
                <div class="portlet light portlet-fit portlet-datatable bordered">
                
                  <div class="portlet-body">
                      <div class="tabbable-line">
                          <ul class="nav nav-tabs nav-tabs-lg">
                              <li class="active">
                                  <a href="#Tab_1" data-toggle="tab" aria-expanded="false">System (Asset)</a>
                              </li>
                              <li class="">
                                  <a href="#Tab_2" data-toggle="tab" aria-expanded="false">Description Impact
                                  </a>
                              </li>
                               <li class="">
                                  <a href="#Tab_3" data-toggle="tab" aria-expanded="false">Recovery Priority
                                  </a>
                              </li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="Tab_1">
                              <div class="row" >
                                  <div class="col-md-3">
                                    <label style="font-weight: normal;">Category</label>
                                     <div class ="col-md-12">
                                         <div class="input-group select2-bootstrap-append">
                                            <select id="system_category" class="form-control select2-selection arrow" onchange="getDepartment()">
                                                <option>...select...</option>
                                                <option>Hardware</option>
                                                <option>Software</option>
                                                <?php foreach($allLocations as $location){ ?>
                                               <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                              <?php } ?>
                                            </select>
                                         </div>
                                        </div>
                                  </div>

                                  <div class="col-md-3" >
                                    <div class="form-group " >
                                      <label for="auditTitle"  >Resource Type</label>
                                      <input  type="text" class="form-control" id="system_resource_type" required style="text-transform: capitalize;">
                                    </div>   
                                  </div>       
                                  <div class="col-md-3" >
                                    <div class="form-group " >
                                      <label for="auditTitle" >Resource Name</label>
                                      <input  type="text" class="form-control" id="system_resource_name" required style="text-transform: capitalize;">
                                    </div>          
                                  </div>
                                  <div class="col-md-3" >
                                    <div class="form-group " >
                                      <label for="auditTitle" >Resource Description</label>
                                      <input  type="text" class="form-control" id="system_resource_description" required style="text-transform: capitalize;">
                                    </div>          
                                  </div> 
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Areawide Disasters</label>
                                            <input type="text" class="form-control" id="areawide_disaster" style="text-transform: capitalize;">
                                      </div>
                                    </div> 
                                    <div class="col-md-4" >
                                          <div class="form-group" >
                                            <label>Critical Contract</label>
                                            <div class ="col-md-12">
                                           <div class="input-group select2-bootstrap-append">
                                              <select id="critical_contract" class="form-control select2-selection arrow"  onchange="getDepartment()">
                                                  <option>...select...</option>
                                                  <option>Hardware</option>
                                                  <option>Software</option>
                                                  <?php foreach($allLocations as $location){ ?>
                                                 <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                                <?php } ?>
                                              </select>
                                             </div>
                                          </div>
                                          </div>
                                      </div> 
                                      <div class="col-md-4" >
                                          <div class="form-group" >
                                            <label>Critical Resources</label>
                                            <div class ="col-md-12">
                                           <div class="input-group select2-bootstrap-append">
                                              <select id="critical_resources" class="form-control select2-selection arrow"   onchange="getDepartment()">
                                                  <option>...select...</option>
                                                  <option>Hardware</option>
                                                  <option>Software</option>
                                                  <?php foreach($allLocations as $location){ ?>
                                                 <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                                <?php } ?>
                                              </select>
                                           </div>
                                        </div>
                                        </div>
                                    </div> 
                              </div>
                            </div>
                            <div class="tab-pane" id="Tab_2">
                                <div class="row">
                                  <div class="col-md-3">
                                    <label style="font-weight: normal;">Resource</label>
                                    <div class ="col-md-12">
                                         <div class="input-group select2-bootstrap-append">
                                            <select id="impact_resource" class="form-control select2-selection arrow" onchange="getDepartment()">
                                                <option>...select...</option>
                                                <option>Hardware</option>
                                                <option>Software</option>
                                                <?php foreach($allLocations as $location){ ?>
                                               <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                              <?php } ?>
                                            </select>
                                           </div>
                                        </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Outage Impact</label>
                                          <input type="text" class="form-control" id="impact_outage_impact" style="text-transform: capitalize;">
                                    </div>
                                  </div>        
                                  <div class="col-md-3" >
                                    <div class="form-group " >
                                      <label for="auditTitle" >Resource Name</label>
                                      <input  type="text" class="form-control" id="impact_resource_name" required style="text-transform: capitalize;">
                                    </div>          
                                  </div>
                                  <div class="col-md-3" >
                                    <div class="form-group " >
                                      <label for="auditTitle" >Allowable Outage</label>
                                      <input  type="text" class="form-control" id="impact_allowable_outage" required style="text-transform: capitalize;">
                                    </div>          
                                  </div>  
                              </div>
                                                                           
                            </div>
                            <div class="tab-pane" id="Tab_3">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="btn btn-group">
                                      <label for="exampleInputPassword1" style="font-weight: normal;">Business Impact Scale</label> 
                                      <button type="button" id="priorityLow30" class="btn btn-dark" onclick="setPriority(30,'low')" style="background-color: rgb(122, 137, 148);">L</button>
                                      <button type="button" id="priorityMedium30" class="btn btn-dark" onclick="setPriority(30,'medium')" style="background-color: rgb(122, 137, 148);">M</button>
                                      <button type="button" id="priorityHigh30" class="btn btn-dark" onclick="setPriority(30,'high')" style="background-color: rgb(255, 0, 0);">H</button>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Resource</label>
                                        <input type="text" class="form-control" id="recovery_resource" style="text-transform: capitalize;">
                                        
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Comments</label>
                                        <input type="text" class="form-control" id="recovery_comments" style="text-transform: capitalize;">
                                  </div>
                                </div>                                               
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            <!-- ////////////////////////////////////////////////////// -->
              <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                <button type="button" class="btn btn-primary" style="float: right;" onclick="manageModal4();">Save Plan</button>
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
        include '../audit/sidemenu.php';
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

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
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
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
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
      <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script src="js/disaster/disasterManagement.js"></script>
     
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                            <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
                            <script src="assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="assets/js/demo3/pages/dashboard.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
</body>
 
</html>

