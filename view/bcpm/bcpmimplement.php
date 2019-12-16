<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/audit/auditManager.php';
$bcpmId = $_GET['id'];
$companyId=$_SESSION['company'];
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
           
        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
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
BCPM Implement
</h3>
</div>

</div>
 <div class="row">
                        <div class="col-md-12">
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                              
                                <div class="portlet-body">
                                    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                                    <input type="hidden" class="form-control" id="bcpmId" value="<?php echo $bcpmId ?>">
                                    <input type="hidden" value="<?php echo $companyId?>" id="company">
                                      <input type="hidden" class="form-control" id="action" value="implemented">

                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav-tabs-lg">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab"> BIA</a>
                                            </li>
                                            <li class="active">
                                                <a href="#tab_2" data-toggle="tab"> Alternate Site </a>
                                            </li>
                                            <li class="active">
                                                <a href="#tab_3" data-toggle="tab"> Tasks & action </a>
                                            </li>
                                            <li class="active">
                                                <a href="#tab_4" data-toggle="tab"> Emergency Call List</a>
                                            </li>
                                          </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                           <div class="panel-heading text-center" style="font-size: 25px">IMPLEMENT</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="comment">BIA:</label>
                          <textarea class="form-control" rows="1" id="bia" style="text-transform: capitalize;"></textarea>
                        </div>
                    </div>
                </div>
                    <div class="panel panel-default">
                    <div class="panel-heading text-center" style="font-size: 16px;">Summary</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-lg-6">
                                <div class="form-group">
                                <label for="usr">Manager</label>
                                <input type="text" class="form-control" id="manager" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-6 col-lg-6">
                                <div class="form-group">
                                <label for="usr">Process</label>
                                <input type="text" class="form-control" id="process" style="text-transform: capitalize;">
                            </div>
                        </div>
                        </div>  
                         <div class="row">
                            <div class="col-md-4 col-sm-6 col-lg-6">
                                <div class="form-group">
                                <label for="usr">Recovery Time Objective</label>
                                <input type="text" class="form-control" id="rto" style="text-transform: capitalize;">
                                  <span>Note:* Number field is required</span>
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-6">
                                <div class="form-group">
                                <label for="usr">Daily Loss</label>
                                <input type="text" class="form-control" id="daily_loss" style="text-transform: capitalize;">
                                  <span>Note:* Number field is required</span>
                              </div>
                            </div>
                         </div><br>
                         <div class="row">
                            <div class="col-md-4 col-sm-6 col-lg-6">
                                <div class="form-group">
                                <label for="usr">Function</label>
                                <input type="text" class="form-control" id="function" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-6">
                                <div class="form-group">
                                <label for="usr">Risk</label>
                                <input type="text" class="form-control" id="risk" style="text-transform: capitalize;">
                            </div>
                            </div>
                         </div>                       
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group">
                        <label for="comment">Business Continuity Stratergy</label>
                        <textarea class="form-control" rows="1" id="business_continuity_stratergy" style="text-transform: capitalize;"></textarea>
                    </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                  <div class="panel-heading text-center">EOC Location / Contacts</div>
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <div class="form-group">
                                <label for="usr" style="font-size: 15px;">EOC Location</label>
                                <input type="text" class="form-control" id="eoc_location" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr" style="font-size: 15px;">EOC Point of contact</label>
                                <input type="text" class="form-control" id="eoc_point_of_location" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr" style="font-size: 15px;">Phone No</label>
                                <input name="Eocno" type="number" class="form-control" id="phone_no" maxlength="13" special-charnum>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
                     
                                              
                                            </div>
                                            <div class="tab-pane" id="tab_2">
                                                <div class="table-container">
                                                     <div class="panel-heading text-center" style="font-size: 25px">IMPLEMENT</div>
          <div class="panel-body">
            <div class="panel panel-default">
                      <div class="panel-heading text-center" style="font-size: 16px;">Alternate Site</div>
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="usr">Site Location</label>
                                    <input type="text" class="form-control" id="al_site_location" style="text-transform: capitalize;">
                                </div>
                            </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="form-group">
                                    <label for="usr">Point of contact</label>
                                    <input type="text" class="form-control" id="al_point_of_location" style="text-transform: capitalize;">
                                </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="form-group">
                                    <label for="usr">Phone No</label>
                                    <input name="sitePho" type="number" class="form-control" id="all_phone_no"  maxlength="13" >
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading text-center" style="font-size: 16px;">Offsite Storage</div>
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="usr">Location</label>
                                    <input type="text" class="form-control" id="of_site_location" style="text-transform: capitalize;">
                                </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="form-group">
                                    <label for="usr">Point of contact</label>
                                    <input type="text" class="form-control" id="of_point_of_contact" style="text-transform: capitalize;">
                                </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="form-group">
                                    <label for="usr">Phone No</label>
                                    <input type="number" class="form-control" id="of_phone_no"  maxlength="13" >
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                          <label for="comment">Organication Chart</label>
                          <textarea class="form-control" rows="1" id="organisation_chart" style="text-transform: capitalize;"></textarea>
                        </div>
                    </div>
                        <div class="col-md-6col-sm-6 col-lg-6">
                            <div class="form-group">
                          <label for="comment">Team Description Chart</label>
                          <textarea class="form-control" rows="1" id="team_desrcription_chart" style="text-transform: capitalize;"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="panel panel-default" style="margin-top: 20px;">
                      <div class="panel-heading text-center" style="font-size: 16px;">Team Call List</div>
                      <div class="panel-body" >
                        <div class="row">
                            <div class="col-md-4 col-sm-4  col-lg-4 ">
                                <div class="form-group">
                                <label for="usr">Name</label>
                                <input type="text" class="form-control" id="t_name" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Mobile No</label>
                                <input name="TeamCaa" type="number" class="form-control" id="t_mobile_no" >
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Work</label>
                                <input type="text" class="form-control" id="t_work" style="text-transform: capitalize;">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Phone</label>
                                <input type="number" class="form-control" id="t_phone" >
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Home Phone</label>
                                <input type="number" class="form-control" id="t_home" >
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Email</label>
                                <input type="email" class="form-control" id="t_email" >
                            </div>
                        </div>
                        </div> 
                        <div class="row" style="margin-top: 3px;">   
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Dept</label>
                                <input type="text" class="form-control" id="t_dept" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Home Address</label>
                                <input type="text" class="form-control" id="t_home_address" style="text-transform: capitalize;">
                            </div>
                        </div>
                        </div>
                          <!--   <div class="col-md-4 col-sm-4 col-lg-4">
                                <button type="button" class="btn btn-success"  style="margin-left: 120px;margin-top: 25px;">+</button>
                  <button class="btn btn-danger" onclick="vm.removeControlField()" style="margin-top: 25px;">-</button>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                  <h6><strong>*Note:</strong>Click Add button for Multiple</h6>
                  </div>
                            </div> -->
                       
                      </div>
                    </div>
          </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_3">
                                                <div class="table-container">
                                                  <div class="panel-heading text-center" style="font-size: 25px">IMPLEMENT</div>
          <div class="panel-body">
            <div class="panel panel-default">
                  <div class="panel-heading text-center" style="font-size: 16px;">Team Task List</div>
                  <div class="panel-body" >
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Task</label>
                                <input type="text" class="form-control" id="tl_task" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Assigned</label>
                                <input type="text" class="form-control" id="tl_assigned" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Frequency</label>
                                <input type="text" class="form-control" id="tl_frequency" style="text-transform: capitalize;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Method</label>
                                <input type="text" class="form-control" id="tl_method" style="text-transform: capitalize;">
                            </div>  
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Schedule</label>
                                <input type="text" class="form-control" id="tl_schedule" style="text-transform: capitalize;">
                            </div>
                            </div>
                    </div>       
                            <!-- <div class="col-md-4 col-sm-4 col-lg-4" style="padding: 20px;">
                                <button type="button" ng-show="$last" class="btn btn-success" ng-click="vm.addNewTaskField()">+</button>
                  <button class="btn btn-danger" ng-show="$last" ng-click="vm.removeTaskField()" >-</button>
                  <h6><strong>*Note:</strong>Click Add button for Multiple</h6>
                            </div> -->
                        
                  </div>
                </div>
                <div class="panel panel-default" style="margin-top: 20px;">
                  <div class="panel-heading text-center" style="font-size: 16px;">Team Action Plan</div>
                  <div class="panel-body" ng-repeat="task in vm.team_field">
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Name</label>
                                <input type="text" class="form-control" id="ta_name" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Mobile No</label>
                                <input name="Teamaction" type="number" class="form-control" id="ta_mobile">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Work Phone</label>
                                <input type="number" class="form-control" id="ta_work_phone" >
                            </div>
                            </div>
                    </div>
                     <div class="row" style="margin-top: 3px;">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Team/Department</label>
                                <input type="text" class="form-control" id="ta_team_or_dept" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Home Phone</label>
                                <input type="number" class="form-control" id="ta_home" >
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Email:</label>
                                <input type="email" class="form-control" id="ta_email" >
                            </div>
                        </div>
                     </div>
                     <div class="row" style="margin-top: 3px;">
                            <div class="col-md-4" >
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Address</label>
                                <input type="text" class="form-control" id="ta_address" style="text-transform: capitalize;">
                            </div>
                        </div>
                             <div class="col-md-4" >
                            </div>
                      </div>
                            <!-- <div class="col-md-4 col-sm-4 col-lg-4" style="padding: 20px;">
                                <button type="button" ng-show="$last" class="btn btn-success" ng-click="vm.addNewTeamField()">+</button>
                     <button class="btn btn-danger" ng-show="$last" ng-click="vm.removeTeamField()" >-</button>
                     <h6><strong>*Note:</strong>Click Add button for Multiple</h6>
                            </div> -->
                        
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <div class="form-group">
                          <label for="comment">Responsibilities</label>
                          <textarea class="form-control" rows="1" id="responsibilities" style="text-transform: capitalize;"></textarea>
                      </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                          <label for="comment">Tasks</label>
                          <textarea class="form-control" rows="1" id="tasks" style="text-transform: capitalize;"></textarea>
                      </div>
                        </div>
                </div>
          </div>
                                               </div>
                                            </div>
                                            <div class="tab-pane" id="tab_4">
                                                <div class="table-container">
                                                  <div class="panel-heading text-center" style="font-size: 25px">IMPLEMENT</div>
          <div class="panel-body">
            <div class="panel panel-default" style="margin-top: 20px;">
                  <div class="panel-heading text-center" style="font-size: 16px;">Team Customer List</div>
                  <div class="panel-body" ng-repeat="task in vm.team_field">
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Team/Department</label>
                                <input type="text" class="form-control" id="tcl_tea_or_dept" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Phone Number</label>
                                <input name="Teamcus" type="number" class="form-control" id="tcl_phone" >
                               </div>
                            </div>
                    </div>
                    <div class="row" style="margin-top: 3px;">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Email</label>
                                <input type="email" class="form-control" id="tcl_email" >
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Address</label>
                                <input type="text" class="form-control" id="tcl_address" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Product</label>
                                <input type="text" class="form-control" id="tcl_product" style="text-transform: capitalize;">
                            </div>
                        </div>
                    </div>
                       
                  </div>
                </div>
                <div class="panel panel-default" style="margin-top: 20px;">
                  <div class="panel-heading text-center" style="font-size: 16px;">Team Software List</div>
                  <div class="panel-body" ng-repeat="task in vm.team_field">
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Software Name</label>
                                <input type="text" class="form-control" id="tsl_software_name" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Version</label>
                                <input type="text" class="form-control" id="tsl_version" style="text-transform: capitalize;">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Team/Department</label>
                                <input type="text" class="form-control" id="tsl_team_or_dept" style="text-transform: capitalize;">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 3px;">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Purpose</label>
                                <input type="text" class="form-control" id="tsl_purpose" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">POC</label>
                                <input type="text" class="form-control" id="tsl_poc" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Phone/Email</label>
                                <input type="text" class="form-control" id="tsl_phone" >
                            </div>
                            </div>
                    </div>
                        
                  </div>
                </div>
                <div class="panel panel-default" style="margin-top: 20px;">
                  <div class="panel-heading text-center" style="font-size: 16px;">Team Supplies List</div>
                  <div class="panel-body" ng-repeat="task in vm.team_field">
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Item</label>
                                <input type="text" class="form-control" id="tsl_item" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Quantity</label>
                                <input type="text" class="form-control" id="tsl_quantity" >
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">SRC</label>
                                <input type="text" class="form-control" id="tsl_src" style="text-transform: capitalize;">
                            </div>
                            </div>
                    </div>
                     <div class="row" style="margin-top: 3px;">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Item No</label>
                                <input type="number" class="form-control" id="tsl_item_no" >
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Cost/Item</label>
                                <input type="text" class="form-control" id="tsl_cost" >
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Total</label>
                                <input type="text" class="form-control" id="tsl_total" >
                            </div>
                            </div>
                    </div>        
                        </div>
                </div>
                <div class="panel panel-default" style="margin-top: 20px;">
                  <div class="panel-heading text-center" style="font-size: 16px;">Vital Rec List</div>
                  <div class="panel-body" ng-repeat="task in vm.team_field">
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Rec Type</label>
                                <input type="text" class="form-control" id="vc_rec_type" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Rec Name</label>
                                <input type="text" class="form-control" id="vc_rec_name" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Team/Department</label>
                                <input type="text" class="form-control" id="vc_team_or_dept" style="text-transform: capitalize;">
                            </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Study State Location</label>
                                <input type="text" class="form-control" id="vc_study_state_location" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Backup</label>
                                <input type="text" class="form-control" id="vc_backup" style="text-transform: capitalize;">
                            </div>
                                    <!-- <md-switch ng-model="data.cb1" aria-label="Switch 1" style="margin: 0px;"></md-switch> -->
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">Backup Location</label>
                                <input type="text" class="form-control" id="vc_backup_location" style="text-transform: capitalize;">
                            </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4">
                            </div>

                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="form-group">
                                <label for="usr">POC</label>
                                <input type="text" class="form-control" id="vc_poc" style="text-transform: capitalize;">
                            </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                    </div>
                </div>
                      </div> 
          <div class="kt-footer">
         
             <button type="submit" class="btn btn-primary" onclick="manageModal2()" style="float: right;">Submit</button>
            </div>
    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End: life time stats -->
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


include '../audit/sidemenu.php';
 $userRole = $_SESSION['user_role'];
 ?>
<!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->
  <script src="js/bcpm/bcpmPlanManagement.js"></script>
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
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script src="js/bcpm/bcpmPlanManagement.js"></script>
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
    </body>
    
</html>