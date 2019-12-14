<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/incident/incidentManager.php';


$userRole = $_SESSION['user_role'];
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
$IncidentId = $_GET['IncidentId'];
// echo $IncidentId;
$metaData=new IncidentManager();
$allCategory = $metaData->getRiskCategory();


$assignee=$metaData->getIncidentRole(31);

?>
   
<!DOCTYPE html>
<html lang="en" >
 <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Perform Diagnosis</title>


        <meta name="description" content="Base form control examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->
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
<script type="text/javascript" src="js/incident/incidentManagements.js"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    
                    <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                      
       
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

        <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
    </head>
    <!-- end::Head -->
<?php
include "../siteHeader.php";
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
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Diagnosis
</h3>
</div>
</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
 <div class="form-group row ">
                    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                  <input type="hidden" class="form-control" id="auditId">
                  <input type="hidden" class="form-control" id="action" value="managed">
                  <input type="hidden" class="form-control" id="file_id" value="<?php echo $file_id?>">
                  <input type="hidden" value="<?php echo $IncidentId;?>" id="IncidentId">
</div>
<div class="form-group row ">
  <div class="col-md-12" style="border: 1px solid #b2abab;">

   <div class="kt-portlet kt-portlet--mobile ">
      <div class="kt-portlet__head ">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
         Users
          </h3>
        </div>
      </div>
    </div>

  <div id="kt_repeater_1">
                    <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                

                                <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Assignee:</label>
                                        </div>
                                        <div class="kt-form__control">
                                           <select id="assignee" class="form-control"  required >
                                <option></option>                                    
                                 <option value="<?php echo $assignee[0]['userId'] ?>"><?php echo $assignee[0]['lastName'] ?></option>       
                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>


                                  <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Escalation Users:</label>
                                        </div>
                                        <div class="kt-form__control">
                                          <select id="escalation_users" class="form-control select2" multiple="multiple">
                                            <option></option>
                                            <option>Level 01</option>
                                            <option>Level 02</option>
                                            <option>Level 03</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                 
                               
                            </div>                            
                        </div>                 
                     </div>
                     
                </div>






 <!--   <?php// include'../compliance/complianceDropDown.php'; ?> -->
</div>
</div>
<div class="form-group row ">
  <div class="col-md-12" style="border: 1px solid #b2abab;">

   <div class="kt-portlet kt-portlet--mobile ">
      <div class="kt-portlet__head ">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
         Risk Category 1
          </h3>
        </div>
      </div>
    </div>

  <div id="kt_repeater_1">
                    <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                

                                <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                          <div class="form-group">
                            <label >Category</label>
                            <div class="input-group">
                              <select  id="category" name="categoryDropDown" class="form-control" onchange="SubCategory();" >
                                <option></option>    
                                <?php foreach($allCategory as $category){ ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php } ?>
                              </select> 
                            </div>
                          </div>
                        <script>
                             function SubCategory(){
                              var modalDetails= {'id':$('#category').val()};
                               $.ajax({
                              type: "POST",
                              url: "/freshgrc/view/incident/subCategoryDropDown.php",
                              data: modalDetails,
                              success:function(data){
                                  $('#subCategoryDropDown').html(data);
                              
                              }
                          });
                          }
                        </script>

                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>


                                  <div class="col-md-6">
                                    <div class="form-group" id="subCategoryDropDown">
                                      <?php include '../incident/subCategoryDropDown.php'; ?>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                            </div>                            
                        </div>                 
                     </div>
                </div>
              </div>
            </div>
<div class="form-group row ">
  <div class="col-md-12" style="border: 1px solid #b2abab;">

   <div class="kt-portlet kt-portlet--mobile ">
      <div class="kt-portlet__head ">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
         Risk Category 2
          </h3>
        </div>
      </div>
    </div>

  <div id="kt_repeater_1">
                    <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                

                                <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Category:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <select  id="category2" name="categoryDropDown2" class="form-control ">
                                <option></option>    
                                <option value="Financial">Financial</option>
                                <option value="Reputational">Reputational</option>
                                <option value="Compliance">Compliance</option>
                              </select> 
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>


                               
                            </div>                            
                        </div>                 
                     </div>
                     
                </div>






 <!--   <?php// include'../compliance/complianceDropDown.php'; ?> -->
</div>
</div>

<div class="form-group row ">
  <div class="col-md-12" style="border: 1px solid #b2abab;">

   <div class="kt-portlet kt-portlet--mobile ">
      <div class="kt-portlet__head ">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
        Loss Occured
          </h3>
        </div>
      </div>
    </div>

  <div id="kt_repeater_1">
                    <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                

                                <div class="col-md-4">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Quantified loss:</label>
                                        </div>
                                        <div class="kt-form__control">
                                         <select  id="quantified_loss" name="quantified_loss" class="form-control ">
                                <option></option>    
                                <option value="Direct">Direct</option>
                                <option value="Indirect">Indirect</option>
                                
                              </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>


                                  <div class="col-md-4">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Currency:</label>
                                        </div>
                                        <div class="kt-form__control">
                                       <select class="form-control " id="currency" name="currency">
                                          <option></option>
                                          <option value="$">$</option>
                                          <option value="£">£</option>
                                          <option value="₹">₹</option>
                                          <option value="€">€</option>
                                          <option value="¢">¢</option>
                                          <option value="¥">¥</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>

                                  <div class="col-md-4">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Realised Loss:</label>
                                        </div>
                                        <div class="kt-form__control">
                                         <input type="number" name="realised_loss" id="realised_loss" class="form-control">
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                 
                               
                            </div>                            
                        </div>                 
                     </div>
                     
                </div>






 <!--   <?php// include'../compliance/complianceDropDown.php'; ?> -->
</div>
</div>
<div class="form-group row ">
  <div class="col-md-12" style="border: 1px solid #b2abab;">

   <div class="kt-portlet kt-portlet--mobile ">
      <div class="kt-portlet__head ">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
         Impact
          </h3>
        </div>
      </div>
    </div>

  <div id="kt_repeater_1">
                    <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                

                                <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Policies Impacted Count:</label>
                                        </div>
                                        <div class="kt-form__control">
                                        <input type="number" name="policies_impacted" id="policies_impacted" class="form-control">
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>


                               
                            </div>                            
                        </div>                 
                     </div>
                     
                </div>






 <!--   <?php// include'../compliance/complianceDropDown.php'; ?> -->
</div>
</div>

<div class="form-group row">
  <div class="col-md-12" style="border: 1px solid #b2abab;">
     <div class="kt-portlet kt-portlet--mobile ">
      <div class="kt-portlet__head ">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
        Scoring Matrix
          </h3>
        </div>
      </div>
    </div>
<!-- <label for="exampleSelect1" style="font-weight: bold">Scoring Matrix</label> -->
  <div id="kt_repeater_1">
                    <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Urgency:</label>
                                        </div>
                                         <div class="kt-form__control">
                                          <?php include'../common/incidentDiagnosisUrg.php'; ?>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>

                                  <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Impact:</label>
                                        </div>
                                        <div class="kt-form__control">
                                             <?php include'../common/incidentDiagnosisImpt.php'; ?>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                              
                               
                            </div>                            
                        </div>                 
                     </div>

 <div class="form-group form-group-last row" id="kt_repeater_1">
                        <!-- <label  class="col-lg-2 col-form-label">Contacts:</label> -->
                        <div data-repeater-list="" class="col-lg-12">
                            <div data-repeater-item class="form-group row align-items-center">     
                                <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Priority:</label>
                                        </div>
                                          <div class="kt-form__control">
                                           <select class="form-control" id="manager_priority" name="assignedtoDropDown">
                                              <option></option>
                                          <option>P1</option>
                                           <option>P2</option>
                                          <option>P3</option>
                                          <option>P4</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>

                             


                                  <div class="col-md-6">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Incident Response Team:</label>
                                        </div>
                                        <div class="kt-form__control">
                                           <select class="form-control" id="manager_sla" name="assignedtoDropDown">
                                              <option></option>
                                              <option>L1</option>
                                              <option>L2</option>
                                              <option>L3</option>
                                           </select>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                              
                               
                            </div>                            
                        </div>                 
                     </div>                   
                </div>
              </div>

<div class="kt-portlet__foot">
  <button type="button" class="btn btn-primary" onclick="savediagnosis(<?php echo $IncidentId;?>)" style="float: right;">Save</button>
</div>
</div>


<input type="hidden" class="form-control" id="auditCapaCheck" value="<?php echo $GLOBALS['capa'] ?>">
<input type="hidden" class="form-control" id="parentAudit" value=0>
              </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
<?php 
include "../audit/sidemenu.php";


 ?>
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
      <script src="js/incident/incidentManagement.js"></script>
         <script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>  

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
  <script type="text/javascript">
     $(function() {
        $(".datepickerforrep").datepicker();
        $('.ui-datepicker').addClass('notranslate');
    });
</script>