<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/asset/assetManager.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$assetId = $_GET['assetId'];
$user = new AssetManager();
$lastname = $user->getAlluser();
$custodian =$user->Custodian();
$reviewer = $user->reviewer();
$classification = $user->getClassfication();
$asset_group = $user->getAssetGroup();


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
<link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />    
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

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top: -14%">



<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Create New Asset
</h3>
</div>

</div>
<input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
    <input type="hidden" class="form-control" id="assetId">
    <input type="hidden" class="form-control" id="action" value="create">
    <input type="hidden" value="<?php echo $companyId?>" id="company">&nbsp;
          <form name="userForm" class="col-sm-12">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">General</div>
                    <div class="panel-body">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label for="usr">Name:</label>
                        <input name="name" id="name" required type="text" class="form-control" style="text-transform: capitalize;">
                      </div>
                    </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label for="comment">Description:</label>
                        <input name="Description" id="description" class="form-control" style="text-transform: capitalize;">
                      </div>
                      </div>
                      <div class="col-md-4" id="complianceDrop">
                        <div class="form-group">
                        <label>Compliance:</label>
                        <?php include '../compliance/complianceDropDown.php';?>
                      </div>
                      </div>
                    </div>
                  </div>                    
                </div>
              </div>              
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group clearfix">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                     <div class="panel-heading">General</div>
                      <div class="panel-body">
                        <div class="col-md-4">
                          <label for="usr">Start Date:</label>
                          <input  type="date" class="form-control input" id="start_date" name="Start_Date" required >
                        </div>
                        <div class="col-md-4">
                          <label for="usr">End Date:</label>
                          <input  type="date" class="form-control input" id="end_date" name="End_Date" required>
                        </div>
                         <div class="col-md-4">
                          <label for="usr">Review Date:</label>
                          <input  type="date" class="form-control input" id="review_date" name="Review_Date" required >
                        </div>
                      </div>
                    </div>                    
                  </div>                  
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">Asset Properties</div>
                    <div class="panel-body">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="usr">Retention Period(In Years):</label>
                        <input name="retention_period" type="number" required class="form-control" id="retention_period">
                      </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label>Asset Value:</label>  
                        <select id="asset_value" class="form-control">
                          <option value="1">Very Low</option>
                          <option value="2">Low</option>
                          <option value="3">Medium</option>
                          <option value="4">High</option>
                          <option value="5">Very High</option>
                        </select>
                      </div>
                      </div>    
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">Current Level of Protection</div>
                    <div class="panel-body">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="usr">At Origin:</label>
                        <input name="orgin" type="text" class="form-control" required special-char id="at_origin">
                      </div>
                      </div>                        
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="usr">Info Moved:</label>
                        <input name="Moved" type="text"  class="form-control" required id="info_moved" >
                      </div>
                      </div>                          
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group clearfix">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center">CIA/Security Properties</div>
                        <div class="panel-body">
                          <div class="form-group row">
                          <div class="col-sm-4">
                            <label for="sel1"> Confidentiality:</label>
                            <select name="confidentiality" class="form-control"  required id="confidentiality"  >
                              <option value="0">Low</option>
                              <option value="1" >Medium</option>
                              <option value="2" >High</option>    
                            </select>
                          </div>
                          <div class="col-sm-4 media2 ">
                            <label for="sel1">Integrity:</label>
                            <select name="integrity" class="form-control" required id="integrity">
                            <option value="0">Low</option>
                              <option value="1" >Medium</option>
                              <option value="2" >High</option>    
                            </select>
                          </div>
                          <div class="col-sm-4 media2">
                            <label for="sel1">Availability:</label>
                            <select name="availability" class="form-control"  required id="availability" >
                             <option value="0">Low</option>
                              <option value="1" >Medium</option>
                              <option value="2" >High</option>          
                            </select>
                          </div>
                        </div>
                          <div class="form-group row">
                          <div class="col-sm-4 cols">
                            <label for="sel1">Classification:</label>
                            <select name="classification" class="form-control" required id="classification" >
                              <?php
                            foreach ($classification as $key => $classifications) {
                              $name = $classifications['classification'];
                              ?>
                             <option value="<?php echo $classifications['id'] ?>"><?php echo $name;?></option> 
                             <?php
                            }
                            ?>               
                            </select>
                          </div>
                          <div class="col-sm-3 cols">
                            <label for="usr">Personal Data:</label>                                       
                            <div class="col-3">
                              <span class="kt-switch kt-switch--sm kt-switch--icon">
                              <label>
                              <input type="checkbox" data-toggle="toggle" data-on="" id="personal_data" data-off="" value="0">
                              <span></span>
                              </label>
                              </span>
                            </div>
                          </div>
                          <div class="col-sm-3 col-form-label">
                            <label for="usr">Sensitive Data:</label>
                            <div class="col-3">
                              <span class="kt-switch kt-switch--sm kt-switch--icon">
                              <label>
                              <input type="checkbox"  data-toggle="toggle" data-on="" id="sensitive_data" data-off="" value="0">
                              <span></span>
                              </label>
                              </span>
                            </div>
                          </div>
                          <div class="col-sm-2 cols">
                            <label for="usr">Customer Data:</label>
                            <div class="col-3">
                              <span class="kt-switch kt-switch--sm kt-switch--icon">
                              <label>
                              <input type="checkbox" data-toggle="toggle" data-on="" id="customer_data" data-off="" value="0">
                              <span></span>
                              </label>
                              </span>
                            </div>
                          </div>  
                        </div>
                          <div class="form-group row">
                          <div class="col-md-4">
                            <?php include '../common/asset_custodian.php';?>
                          </div>                            
                          <div class="col-md-4">
                            <?php include '../common/asset_reviwer.php';?>
                          </div>
                          <div class="col-md-4">
                            <label for="sel1"> Asset Group:</label>
                            <select name="asset_group" class="form-control"  required id="asset_group" onchange="asset_groups(this)">
                             <option></option>
                             <?php
                            foreach ($asset_group as $key => $asset_groups) {
                              $name = $asset_groups['name'];
                              ?>
                             <option value="<?php echo $asset_groups['id'] ?>"><?php echo $name;?></option> 
                             <?php
                            }
                            ?>
                            </select>
                          </div>
                       </div>
                       <div class="form-group row">

                        <div class="col-md-4">
                           <label>Location:</label> 

                            <?php include '../common/auditlocationDropdown.php';?> 
                        </div>
                            <div class="col-md-4">
                            <div class="form-group" id="departmentDrop" >
                              <label>Department:</label>
                            <?php include '../common/departmentDropDown.php';?>
                          </div>
                        </div>
                      </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-sm-12 text-center">
                              <button type="button" onclick="manageModal()" class="btn btn-primary" style="float: right;">Create Asset</button>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="visibility: hidden;">
                            <div class="form-group clearfix" >
                              <div class="col-sm-12">
                                <label for="sel1"> </label> 
                                <select style="visibility: hidden;" name="owner" class="form-control"  required id="asset_owner">
                                <?php
                                foreach ($lastname as $key => $last) {
                                  $name = $last['last_name'];
                                  ?>
                                 <option value="<?php echo $last['id'] ?>"><?php echo htmlspecialchars($name);?></option> 
                                 <?php
                                }
                                ?>
                                 </select>
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
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>

    
            <div class="modal" id="DigitalAsset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" id="myModalLabel" style="background-color: #2a5aa8; color: #fff;">Digital Asset</h4>
                  <div class="modal-body">
                    <form id="form1">
                    <label for="damagepotential">Users</label> 
                     <div class="form-group">
                      <div class="input-group">
                       <?php include '../common/userDropdown.php'; ?>
                      </div>
                     </div>                            
                      <div class="form-group">
                        <label for="customvalue">Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Storage Details</label>
                         <input  type="text" class="form-control" id="storage_details" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Classification</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Life Cycle</label>
                         <input  type="text" class="form-control" id="life_cycle" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Disposal Method</label>
                         <input  type="text" class="form-control" id="disposal_methods" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue"> Confidentiality Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Integrity Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>     
                      <div class="form-group">
                        <label for="customvalue">Availability Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>    
                      <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>                                      
                    </form>
                  </div>                    
                </div>
              </div>
            </div> 
              <div class="modal" id="BusinessDatabases" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8;color: #fff;" id="myModalLabel">Business Databases</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                     <label for="damagepotential">Users</label>
                     <div class="form-group">
                  <div class="input-group">
                     <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                            
                      <div class="form-group">
                        <label for="customvalue">Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Sys Admin</label>
                         <input  type="text" class="form-control" id="sys_admin" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Life Cycle</label>
                         <input  type="text" class="form-control" id="life_cycle" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Technical Contact [SA/NA/DBA]</label>
                         <input  type="text" class="form-control" id="technical_contact" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Vendor</label>
                         <input  type="text" class="form-control" id="vendor" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Purpose / Service / Role</label>
                         <input  type="text" class="form-control" id="purpose" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue"> Confidentiality Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Integrity Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>     
                      <div class="form-group">
                        <label for="customvalue">Availability Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>   
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>                                               
                    </form>
                  </div>                    
                </div>
              </div>
            </div>
                <div class="modal" id="SourceCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Source Code</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                     <label for="damagepotential">Users</label>
                     <div class="form-group">
                     <div class="input-group">
                        <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                            
                      <div class="form-group">
                        <label for="customvalue">Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Project Manager</label>
                         <input  type="text" class="form-control" id="name" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Life Cycle</label>
                         <input  type="text" class="form-control" id="life_cycle" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Technical Contact [SA/NA/DBA]</label>
                         <input  type="text" class="form-control" id="technical_contact" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Version Number</label>
                         <input  type="text" class="form-control" id="version_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Purpose / Service / Role</label>
                         <input  type="text" class="form-control" id="purpose" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue"> Confidentiality Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Integrity Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>     
                      <div class="form-group">
                        <label for="customvalue">Availability Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>                                                
                    </form>
                  </div>                    
                </div>
              </div>
            </div>
              <div class="modal" id="software" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">software</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                     <div class="form-group">
                  <div class="input-group">
                     <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                            
                       <div class="form-group">
                        <label for="customvalue">Asset ID</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Type</label>
                         <input  type="text" class="form-control" id="type" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Location [Server / Desktop ID]</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Version</label>
                         <input  type="text" class="form-control" id="version_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">License Details</label>
                         <input  type="text" class="form-control" id="license_datails" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">No. Of Licenses</label>
                         <input  type="text" class="form-control" id="no_of_licenses" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Technical Contact [SA/NA/DBA]</label>
                         <input  type="text" class="form-control" id="technical_contact" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Vendor</label>
                         <input  type="text" class="form-control" id="vendor" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Purpose / Service / Role</label>
                         <input  type="text" class="form-control" id="purpose" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue"> Confidentiality Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Integrity Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>     
                      <div class="form-group">
                        <label for="customvalue">Availability Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>                                                  
                    </form>
                  </div>                    
                </div>
              </div>
            </div>

            <div class="modal" id="nonDigitalAsset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Non Digital Asset</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                     <div class="form-group">
                  <div class="input-group">
                    <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                            
                      <div class="form-group">
                        <label for="customvalue">Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Storage Details</label>
                         <input  type="text" class="form-control" id="storage_details" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Life Cycle</label>
                         <input  type="text" class="form-control" id="life_cycle" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Disposal Method</label>
                         <input  type="text" class="form-control" id="disposal_methods" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Backup Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue"> Confidentiality Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Integrity Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>     
                      <div class="form-group">
                        <label for="customvalue">Availability Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div> 
                        <div class="modal-footer">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>                                                 
                    </form>
                  </div>                    
                </div>
              </div>
            </div>
              <div class="modal" id="peopleAssets" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8;color: #fff;" id="myModalLabel">People Assets</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <div class="form-group">
                        <label for="customvalue">Department</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Reporting to</label>
                         <input  type="text" class="form-control" id="reporting_to" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Access to High Value Info. Assets</label>
                         <input  type="text" class="form-control" id="access" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Alternate Role</label>
                         <input  type="text" class="form-control" id="alternate_role" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">NDA Requirements</label>
                         <input  type="text" class="form-control" id="nda" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">KRA</label>
                         <input  type="text" class="form-control" id="kra" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Min. Required Capabilites</label>
                         <input  type="text" class="form-control" id="min_req_capabilities" required>                     
                      </div>
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div> 
                    </form>
                  </div>                    
                </div>
              </div>
            </div>

            <div class="modal" id="Servers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Servers</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                        <div class="form-group">
                  <div class="input-group">
                    <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                 
                      <!-- </div> -->
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">IP Address</label>
                         <input  type="text" class="form-control" id="ip_address" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Rack Number</label>
                         <input  type="text" class="form-control" id="rack_number" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Slot Number</label>
                         <input  type="text" class="form-control" id="slot_number" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Host Name</label>
                         <input  type="text" class="form-control" id="name" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">OS</label>
                         <input  type="text" class="form-control" id="os" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Service Packs Required</label>
                         <input  type="text" class="form-control" id="service_packs_req" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Software/Application Details</label>
                         <input  type="text" class="form-control" id="software" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Technical Contact [SA/NA/DBA]</label>
                         <input  type="text" class="form-control" id="technical_contact" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Vendor</label>
                         <input  type="text" class="form-control" id="vendor" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">SLA </label>
                         <input  type="text" class="form-control" id="sla" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">OLA</label>
                         <input  type="text" class="form-control" id="ola" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Make / Model</label>
                         <input  type="text" class="form-control" id="model" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">CPU</label>
                         <input  type="text" class="form-control" id="cpu" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">RAM</label>
                         <input  type="text" class="form-control" id="ram" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">HDD(Hard disk drive)</label>
                         <input  type="text" class="form-control" id="hdd" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Purpose / Service / Role</label>
                         <input  type="text" class="form-control" id="purpose" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Stored Information Assets</label>
                         <input  type="text" class="form-control" id="stored_information_assets" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>  
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>   
                   </form>
                  </div>                    
                </div>
              </div>
            </div>
              <div class="modal" id="NetworkDevices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Network Devices</h4>
                  <div class="modal-body">
                    <form id="form1">
                    <label for="damagepotential">Users</label> 
                  <div class="form-group">
                  <div class="input-group">
                    <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                 
                      <!-- </div> -->
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">IP Address</label>
                         <input  type="text" class="form-control" id="ip_address" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Netted IP</label>
                         <input  type="text" class="form-control" id="netted_ip" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Host Name</label>
                         <input  type="text" class="form-control" id="name" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">IOS</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Technical Contact [SA/NA/DBA]</label>
                         <input  type="text" class="form-control" id="technical_contact" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Vendor</label>
                         <input  type="text" class="form-control" id="vendor" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">SLA </label>
                         <input  type="text" class="form-control" id="sla" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">OLA</label>
                         <input  type="text" class="form-control" id="ola" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Make / Model</label>
                         <input  type="text" class="form-control" id="model" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">CPU</label>
                         <input  type="text" class="form-control" id="cpu" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">RAM</label>
                         <input  type="text" class="form-control" id="ram" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">HDD(Hard disk drive)</label>
                         <input  type="text" class="form-control" id="hdd" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Purpose / Service / Role</label>
                         <input  type="text" class="form-control" id="purpose" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Features</label>
                         <input  type="text" class="form-control" id="features" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Configuration Backup</label>
                         <input  type="text" class="form-control" id="configuration_backup" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue"> Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div> 
                      <div class="form-group">
                        <label for="customvalue">Backup Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="name" required>                     
                      </div> 
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>    
                   </form>
                  </div>                    
                </div>
              </div>
            </div>
            <div class="modal" id="Desktops" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8;margin-top: 0px;color: #fff;" id="myModalLabel">Desktops</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                  <div class="form-group">
                  <div class="input-group">
                     <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                 
                      <!-- </div> -->
                      <div class="form-group">
                        <label for="customvalue">Asset Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">IP Address</label>
                         <input  type="text" class="form-control" id="ip_address" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Machine Name</label>
                         <input  type="text" class="form-control" id="name" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Sharing</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Shared Drives / Folders</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Vendor</label>
                         <input  type="text" class="form-control" id="vendor" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                     <div class="form-group">
                        <label for="customvalue">OLA</label>
                         <input  type="text" class="form-control" id="ola" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Make / Model</label>
                         <input  type="text" class="form-control" id="model" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">CPU</label>
                         <input  type="text" class="form-control" id="cpu" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">RAM</label>
                         <input  type="text" class="form-control" id="ram" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">HDD(Hard disk drive)</label>
                         <input  type="text" class="form-control" id="hdd" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Anti Virus Updation</label>
                         <input  type="text" class="form-control" id="antivirus_updation" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue"> Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Stored Information Assets</label>
                         <input  type="text" class="form-control" id="stored_information_assets" required>                     
                      </div> 
                       <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>
                     </form>
                  </div>                    
                </div>
              </div>
            </div>
                 <div class="modal" id="Laptops" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Laptops</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                        <div class="form-group">
                  <div class="input-group">
                    <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                 
                      <!-- </div> -->
                      <div class="form-group">
                        <label for="customvalue">Asset Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">IP Address</label>
                         <input  type="text" class="form-control" id="ip_address" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Machine Name</label>
                         <input  type="text" class="form-control" id="name" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Sharing</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Shared Drives / Folders</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Vendor</label>
                         <input  type="text" class="form-control" id="vendor" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expected Life</label>
                         <input  type="text" class="form-control" id="expected_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Expired Life</label>
                         <input  type="text" class="form-control" id="expired_life" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Maintenance Status</label>
                         <input  type="text" class="form-control" id="maintainance_status" required>                     
                      </div>
                     <div class="form-group">
                        <label for="customvalue">OLA</label>
                         <input  type="text" class="form-control" id="ola" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Make / Model</label>
                         <input  type="text" class="form-control" id="model" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">CPU</label>
                         <input  type="text" class="form-control" id="cpu" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">RAM</label>
                         <input  type="text" class="form-control" id="ram" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">HDD(Hard disk drive)</label>
                         <input  type="text" class="form-control" id="hdd" required>                     
                      </div>
                         <div class="form-group">
                        <label for="customvalue">Whether used out of premises</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Anti Virus Updation</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue"> Backup Details</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue"> Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Stored Information Assets</label>
                         <input  type="text" class="form-control" id="stored_information_assets" required>                     
                      </div> 
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>
                     </form>
                  </div>                    
                </div>
              </div>
            </div>
             <div class="modal" id="Media" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Media</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                        <div class="form-group">
                  <div class="input-group">
                    <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                 
                      <!-- </div> -->
                      <div class="form-group">
                        <label for="customvalue">Asset Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Make / Model</label>
                         <input  type="text" class="form-control" id="model" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Capacity</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Whether used out of premises</label>
                         <input  type="text" class="form-control" id="used_out_of_premises" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Restoration Check Schedule</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue"> Backup Schedule</label>
                         <input  type="text" class="form-control" id="backup_schedule" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Dependency</label>
                         <input  type="text" class="form-control" id="dependency" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Stored Information Assets</label>
                         <input  type="text" class="form-control" id="stored_information_assets" required>                     
                      </div>
                        <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div> 
                     </form>
                  </div>                    
                </div>
              </div>
            </div>
                 <div class="modal" id="Supportutilities" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #2a5aa8;">      
                  <h4 class="panel-heading text-center" style=" background-color: #2a5aa8; color: #fff;" id="myModalLabel">Support Utilities</h4>
                  <div class="modal-body">
                    <form id="form1"> 
                      <label for="damagepotential">Users</label>
                        <div class="form-group">
                  <div class="input-group">
                    <?php include '../common/userDropdown.php'; ?>
                  </div>
                </div>                 
                      <!-- </div> -->
                      <div class="form-group">
                        <label for="customvalue">Asset Location</label>
                         <input  type="text" class="form-control" id="backup_location" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">Serial Number</label>
                         <input  type="text" class="form-control" id="serial_no" required>                     
                      </div>
                      <div class="form-group">
                        <label for="customvalue">Application / Business Specific requirements</label>
                         <input  type="text" class="form-control" id="business_specific_requrements" required>                     
                      </div>
                       <div class="form-group">
                        <label for="customvalue">SLA</label>
                         <input  type="text" class="form-control" id="sla" required>                     
                      </div>
                     <div class="form-group">
                        <label for="customvalue">OLA</label>
                         <input  type="text" class="form-control" id="ola" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue">Make / Model</label>
                         <input  type="text" class="form-control" id="model" required>                     
                      </div>
                        <div class="form-group">
                        <label for="customvalue"> Capacity</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                     <div class="form-group">
                        <label for="customvalue">Redundency Requirements</label>
                         <input  type="text" class="form-control" id="overview" required>                     
                      </div>
                       <div class="kt-portlet__foot">
                       <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Submit</button>
                      </div>
                     </form>
                  </div>                    
                </div>
              </div>
            </div>

<?php 
        include '../audit/sidemenu.php';
   ?>
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
<script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
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
<script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>  

<!--end:: Global Optional Vendors -->
<!--begin::Global Theme Bundle(used by all pages) -->
<script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<script src="js/asset/assetManagement.js"></script>
<!--end::Global Theme Bundle -->
                    <!--begin::Page Vendors(used by this page) -->
                            <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->      
                    <!--begin::Page Scripts(used by this page) -->

                        <!--end::Page Scripts -->
    </body>
    
</html>