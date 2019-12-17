<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
require_once __DIR__.'/../../php/disaster/disasterManager.php';



$userRole = $_SESSION['user_role'];



$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];


    $disasterManager = new DisasterManager();

    $id = $_REQUEST['id'];
    $allData = $disasterManager->getAllData($id);

    $scope = $allData[0]['scope'];
    $summary= $allData[0]['summary'];
    $purpose= $allData[0]['purpose'];
    $company_name= $allData[0]['company_name'];
    $contracted_name= $allData[0]['contracted_name'];
    $covered_system_name= $allData[0]['covered_system_name'];
    $disaster_definition = $allData[0]['disaster_definition'];
    $assumption = $allData[0]['assumption'];
    $internal_name = $allData[0]['internal_name'];
    $internal_email = $allData[0]['internal_email'];
    $internal_system = $allData[0]['internal_system'];
    $internal_phone= $allData[0]['internal_phone'];
    $internal_role_description = $allData[0]['internal_role_description'];
    $external_name = $allData[0]['external_name'];
    $external_phone= $allData[0]['external_phone'];
    $external_email = $allData[0]['external_email'];
    $external_system = $allData[0]['external_system'];
    $external_role_description = $allData[0]['external_role_description'];
    $system_category = $allData[0]['system_category'];
    $impact_resource= $allData[0]['outage'];
    $system_resource_type = $allData[0]['system_resource_type'];
    $system_resource_name = $allData[0]['system_resource_name'];
    $system_resource_description =$allData[0]['system_resource_description'];
    $areawide_disaster = $allData[0]['areawide_disaster'];
    $critical_contract = $allData[0]['critical_contract'];
    $critical_resources = $allData[0]['critical_resources'];
    $impact_resource= $allData[0]['impact_resource'];
    $impact_outage_impact = $allData[0]['impact_outage_impact'];
    $impact_resource_name =$allData[0]['impact_resource_name'];
    $impact_allowable_outage = $allData[0]['impact_allowable_outage'];
    $business_impact_scale= $allData[0]['business_impact_scale'];
    $recovery_resource = $allData[0]['recovery_resource'];
    $recovery_comments = $allData[0]['recovery_comments'];
    $status = $allData[0]['status'];
    $company_id = $allData[0]['company_id'];
    $updated_by =$allData[0]['updated_by'];
    $updated_time = $allData[0]['updated_time'];
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
<link href="assets/toggleButton/bootstrap-toggle.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css"/>
<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />

<link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
<script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
<script src="js/disaster/disasterTest.js"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    
                    <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

</head>
    <?php 
       include '../siteHeader.php';
    ?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >

       
    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

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
Create Plan
</h3>
</div>

</div>
           <div class="row">
              <div class="col-md-12">
                <form id="form1">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                    <input type="hidden" class="form-control" id="auditId">
                    <input type="hidden" class="form-control" id="action" value="tested">
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="hidden" value="<?php echo $companyId?>" id="company">
                    </div>
                  </div>
                  <div class="portlet light portlet-fit portlet-datatable bordered" style="padding: 2%;">
                    <div class="portlet-title">
                      <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Disaster Plan Details
                        </span>
                      </div>
                    </div>
                    <div class="portlet-body">
                      <div class="tabbable-line">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab" aria-expanded="false">Internal Contact </a>
                            </li>
                            <li class="">
                                <a href="#tab_2" data-toggle="tab" aria-expanded="false">External Contact </a>
                            </li>
                            <li class="">
                                <a href="#Tab_7" data-toggle="tab" aria-expanded="false">System (Asset)</a>
                            </li>
                            <li class="">
                                <a href="#Tab_8" data-toggle="tab" aria-expanded="false">Description Impact
                                </a>
                            </li>
                             <li class="">
                                <a href="#Tab_9" data-toggle="tab" aria-expanded="false">Recovery Priority
                                </a>
                            </li>
                             <li class="">
                                <a href="#tab_4" data-toggle="tab" aria-expanded="false">Disaster Detail </a>
                            </li>
                            <li class="">
                                <a href="#tab_5" data-toggle="tab" aria-expanded="false">contractual agreement </a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              <div class="row">
                                <div class="col-lg-4" >
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <div class="input-group">
                                     <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                     <input type="text" class="form-control" id="internal_name" value="<?php echo $internal_name ?>" readonly style="text-transform: capitalize;">
                                    </div>
                                  </div>
                                </div> 
                                <div class="col-md-4" >
                                  <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                      <input type="text" id="internal_email"  class="form-control" value="<?php echo $internal_email ?>" readonly>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4" >
                                  <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                      <input type="number" id="internal_phone" class="form-control" value="<?php echo $internal_phone ?>" readonly> 
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group" >
                                    <label for="auditDesc">System</label>
                                    <input type="text" class="form-control" id="internal_system"  id="auditDesc" value="<?php echo $internal_system ?>" readonly style="text-transform: capitalize;"  >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group" >
                                    <label for="auditDesc">Role Description</label>
                                    <input type="text" class="form-control" maxlength="5000" rows="1" id="internal_role_description"  value="<?php echo $internal_role_description ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>    
                              </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                              <div class="table-container" style="">
                                <div class="row">
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Name</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                        <input type="text" class="form-control" id="external_name"  value="<?php echo $external_name ?>" readonly style="text-transform: capitalize;">
                                      </div>
                                    </div>
                                  </div> 
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label>Email Address</label>
                                      <div class="input-group">
                                         <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                          <input type="text" id="external_email" class="form-control" value="<?php echo $external_email ?>" readonly> 
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                        <input type="number" id="external_phone" class="form-control" value="<?php echo $external_phone ?>" readonly> 
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group" >
                                      <label for="auditDesc">System</label>
                                      <input type="text" id="external_system" class="form-control"  value="<?php echo $external_system ?>" readonly style="text-transform: capitalize;">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group" >
                                      <label for="auditDesc">Role Description</label>
                                      <input type="text" class="form-control" id="external_role_description" value="<?php echo $external_role_description ?>" readonly style="text-transform: capitalize;">
                                    </div>
                                  </div>    
                                </div>
                              </div>                                           
                            </div>
                            <div class="tab-pane " id="Tab_7">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                  <label>Category</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                      <input type="text" id="system_category" class="form-control " value="<?php echo $system_category ?>" readonly>
                                     </div>
                                   </div>
                                </div>
                                <div class="col-md-3" >
                                  <div class="form-group ">
                                    <label for="auditTitle">Resource Type</label>
                                    <input  type="text" class="form-control" id="system_resource_type" value="<?php echo $system_resource_type ?>" readonly style="text-transform: capitalize;">
                                  </div>   
                                </div>       
                                <div class="col-md-3" >
                                  <div class="form-group">
                                    <label for="auditTitle">Resource Name</label>
                                    <input  type="text" class="form-control" id="system_resource_name" value="<?php echo $system_resource_name ?>"  readonly style="text-transform: capitalize;">
                                  </div>          
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="auditTitle" >Resource Description</label>
                                    <input  type="text" class="form-control" id="system_resource_description"  value="<?php echo $system_resource_description ?>" readonly style="text-transform: capitalize;">
                                  </div>          
                                </div>
                              </div>
                              <div class="row"> 
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Areawide Disasters</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-share-alt"></i></span></div>
                                      <input type="text" class="form-control" id="areawide_disaster"  value="<?php echo $areawide_disaster ?>" readonly style="text-transform: capitalize;">
                                    </div>
                                </div>
                              </div> 
                              <div class="col-md-4" >
                                <div class="form-group" >
                                  <label>Critical Contract</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend"><span class="input-group-text"><i class="la la-search"></i></span></div>
                                      <input type="text" id="critical_contract" class="form-control" value="<?php echo $critical_contract ?>"  readonly>
                                    </div>
                                </div>
                              </div> 
                              <div class="col-md-4" >
                                <div class="form-group" >
                                  <label>Critical Resources</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend"><span class="input-group-text"><i class="la la-search"></i></span></div>
                                      <input type="text" id="critical_resources" class="form-control" value="<?php echo $critical_resources ?>" readonly>
                                    </div>
                                </div>
                              </div> 
                           </div>
                          </div>
                          <div class="tab-pane" id="Tab_8">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                <label >Resource</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-search"></i></span></div>
                                    <input type="text" id="impact_resource" class="form-control" value="<?php echo $impact_resource ?>"  readonly>

                                </div>
                              </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Outage Impact</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-share-alt"></i></span></div>
                                      <input type="text" class="form-control" id="impact_outage_impact" value="<?php echo $impact_outage_impact ?>" readonly style="text-transform: capitalize;">
                                    
                                  </div>
                                </div>
                              </div>        
                              <div class="col-md-3" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Resource Name</label>
                                  <input  type="text" class="form-control" id="impact_resource_name" value="<?php echo $impact_resource_name ?>" readonly style="text-transform: capitalize;">
                                </div>          
                              </div>
                              <div class="col-md-3" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Allowable Outage</label>
                                  <input  type="text" class="form-control" id="impact_allowable_outage" value="<?php echo $impact_allowable_outage ?>"  readonly style="text-transform: capitalize;">
                                </div>          
                              </div>  
                            </div>                                    
                          </div>
                          <div class="tab-pane" id="Tab_9">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="btn btn-group" style="    margin-top: -15px;">
                                  <h5>Business Impact Scale</h5> 
                                  <button type="button" id="priorityLow30" class="btn btn-dark" onclick="setPriority(30,'low')" style="background-color: rgb(122, 137, 148);">L</button>
                                  <button type="button" id="priorityMedium30" class="btn btn-dark" onclick="setPriority(30,'medium')" style="background-color: rgb(122, 137, 148);">M</button>
                                  <button type="button" id="priorityHigh30" class="btn btn-darks" onclick="setPriority(30,'high')" style="background-color: rgb(255, 0, 0);">H</button>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Resource</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                    <input type="text" class="form-control" id="recovery_resource" value="<?php echo $recovery_resource ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Comments</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                      <input type="text" class="form-control" id="recovery_comments" value="<?php echo $recovery_comments ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>
                              </div>                                               
                            </div>
                          </div>
                          <div class="tab-pane " id="tab_4">
                            <div class="row">
                              <div class="col-md-4" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Scope</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                    <input type="text" class="form-control" id="scope" value="<?php echo $scope ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>          
                              </div>
                              <div class="col-md-4" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Purpose</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                    <input type="text" id="purpose" class="form-control" value="<?php echo $purpose ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>          
                              </div>
                              <div class="col-md-4" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Disaster Definition</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                    <input type="text" id="disaster_definition" class="form-control" value="<?php echo $disaster_definition ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>          
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" >
                                  <label for="auditDesc">Summary</label>
                                  <input type="text" class="form-control"  id="summary" required value="<?php echo $summary ?>" readonly style="text-transform: capitalize;">
                                  
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group" >
                                  <label for="auditDesc">Assumption</label>
                                  <input type="text"  class="form-control"  id="assumption" required value="<?php 
                                  echo $assumption ?>" readonly style="text-transform: capitalize;">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane " id="tab_5">
                            <div class="row">
                              <div class="col-md-4" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Company Name</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                    <input type="text" id="company_name" class="form-control" value="<?php echo $company_name ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>          
                              </div>
                              <div class="col-md-4" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Contracter Name</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                    <input type="text" id="contracted_name" class="form-control" value="<?php echo $contracted_name ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>          
                              </div>
                              <div class="col-md-4" >
                                <div class="form-group " >
                                  <label for="auditTitle" >Covered System Name</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                    <input type="text" id="covered_system_name" class="form-control" value="<?php echo $covered_system_name ?>" readonly style="text-transform: capitalize;">
                                  </div>
                                </div>          
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              <!-- </div> -->
              <div class="panel" style="padding: 2%;">
                <div class="caption" style="color: #32c5d2; font-size: 16px;"> <i class="fa fa-gift"></i>Strategy</div>
                <div class="row">
                  <div class="col-md-12">
                    <form id="form1" >
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="scope" value="<?php echo $scope?>">
                        <input type="hidden" class="form-control" id="auditId">
                        <input type="hidden" class="form-control" id="action" value="create">
                        <input type="hidden" class="form-control" id="disaster_plan_id" value="<?php echo $id?>">
                      </div>
                      <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase"> System Information
                            </span>
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="tabbable-line">
                            <ul class="nav nav-tabs nav-tabs-lg">
                              <li class="active">
                                  <a href="#tab_11" data-toggle="tab" aria-expanded="false">System Information </a>
                              </li>
                              <li class="">
                                <a href="#tab_12" data-toggle="tab" aria-expanded="false"> backup&Storage information </a>
                              </li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_11">
                                <div class="row">
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label for="exampleInputPassword1"> System Name</label>
                                      <div class="input-group">
                                         <div class="input-group-prepend"><span class="input-group-text"><i class="fa flaticon-computer"></i></span></div>
                                      <input type="text" class="form-control" id="system_name" style="text-transform: capitalize;">
                                    </div>
                                    </div>
                                  </div> 
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label>POC</label>
                                      <div class="input-group">
                                           <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                          <input type="text" class="form-control" id="poc" style="text-transform: capitalize;"> </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label>Organization</label>
                                      <input type="text" class="form-control" id="organisation" style="text-transform: capitalize;"> 
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4" >
                                    <div class="form-group">
                                      <label> Date</label>
                                      <div class="input-group date">
                                          
                                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-calendar-check-o"></i></span></div>
                                          <input type="text" id="date" class="form-control datepickerClass  notranslate" name="from" class="">
                                           
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group" >
                                      <label>System manager</label>
                                      <input type="text"  class="form-control" id="system_manager" required style="text-transform: capitalize;">
                                    </div>
                                  </div>  
                                  <div class="col-md-4">
                                    <div class="form-group" >
                                      <label >System Description</label>
                                      <input type="text"  class="form-control" id="system_description" required style="text-transform: capitalize;">
                                    </div>
                                  </div>    
                                </div>
                              </div>
                              <div class="tab-pane" id="tab_12">
                                <div class="table-container">
                                  <div class="row">
                                    <div class="col-md-4" >
                                    <div class="form-group">
                                      <label for="exampleInputPassword1"> System Name</label>
                                      <div class="input-group">
                                         <div class="input-group-prepend"><span class="input-group-text"><i class="fa flaticon-computer"></i></span></div>
                                      <input type="text" class="form-control" id="backup_system_name" style="text-transform: capitalize;">
                                    </div>
                                    </div>
                                  </div> 
                                    <div class="col-md-4" >
                                      <div class="form-group">
                                        <label>Back up</label>
                                        <div class="input-group">
                                             <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                            <input type="text" class="form-control" id="backup_backup" style="text-transform: capitalize;"> </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4" >
                                      <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" id="backup_company_name" style="text-transform: capitalize;">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group" >
                                        <label for="backup_offsite_location">Offsite location</label>
                                        <input type="text"    class="form-control" id="backup_offsite_location" required style="text-transform: capitalize;">
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group" >
                                        <label for="auditDesc"> Contractor Name</label>
                                        <input type="text"  class="form-control" id="backup_contractor_name" required style="text-transform: capitalize;">
                                      </div>
                                    </div>    
                                    <div class="col-md-3">
                                      <div class="form-group">
                                      <label>software& Hardware configuration</label>
                                      <input type="text" class="form-control" id="software_and_hardware_configuration" required style="text-transform: capitalize;">
                                    </div>
                                  </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                      <label> Alternate S/W & H/W configuration</label>
                                      <input type="text"  class="form-control"
                                      id="alternate_site_software_and_hardware_configuration" required style="text-transform: capitalize;">
                                    </div>
                                  </div>
                                  </div>
                                </div>                                           
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                          <div class="caption">
                              <i class="icon-settings font-dark"></i>
                              <span class="caption-subject font-dark sbold uppercase"> Testing
                              </span>
                          </div>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_5">
                            <div class="row">
                              <div class="col-md-4" >
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">No Of Test Completed</label>
                                    <input type="text" class="form-control" id="number_of_test_completed" style="text-transform: capitalize;">
                                  </div>
                                </div> 
                                <div class="col-md-4" >
                                  <div class="form-group">
                                    <label>Test Number </label>
                                    <div class="input-group">
                                       <div class="input-group-prepend"><span class="input-group-text"><i class="la la-envelope"></i></span></div>
                                      <input type="text" class="form-control" id="test_no" style="text-transform: capitalize;"> 
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4" >
                                  <div class="form-group">
                                    <label>Test Date</label>
                                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width:100%">
                                        
                                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd">
                                          <div class="input-group-prepend"><span class="input-group-text"><i class="la la-calendar-check-o"></i></span></div>
                                        <input type="text" id="test_date" class="form-control datepickerClass  notranslate" name="from" class="">
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group" >
                                  <label for="auditDesc">System to be tested</label>
                                  <input type="text" class="form-control" id="system_to_be_tested" required style="text-transform: capitalize;">
                                </div>
                              </div>  
                            </div>
                          </div>
                        </div>
                      </form>
                      </div>
                  </div>
              <div class="kt-portlet__foot">
                <button type="button" class="btn btn-primary" data-style="slide-downn" style="float: right;" onclick="manageModal()">Submit</button>
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
        $currentMenu = 'disaster_tester';
        include '../audit/sidemenu.php';
         $userRole = $_SESSION['user_role'];
    ?>
      <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
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
<script src="assets/vendors/custom/jquery-ui/jquery-ui.bundle.min.js" type="text/javascript"></script>
<link href="assets/vendors/custom/jquery-ui/jquery-ui.bundle.min.css">
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
          
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  
    

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
            </body>
    <!-- end::Body -->
</html>

<script type="text/javascript">
   $(function() {
      $(".datepickerClass").datepicker();
      $('.ui-datepicker').addClass('notranslate');
  });
</script>
