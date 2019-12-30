<?php require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
?>
<!DOCTYPE html>
<html lang="en" >
 <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Freshgrc</title>
        <meta name="description" content="Base form control examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->
        <!--begin:: Global Mandatory Vendors -->
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
</head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

</head>
<style type="text/css">
  #classicScoring
  {
    display: none;
  }
  #cvssScoring{
    display: none;
  }
   #owaspScoring
  {
    display: none;
  }
   #customScoring
  {
    display: none;
  }
  #dreadScoring
  {
    display: none;
  }
  #Qualitative
  {
    display: none;
  }
  @media only screen and (max-width: 600px) {
  label {
    text-align: left;
  }
}
@media only screen and (min-width: 992px) {
  label {
    text-align: right;
  }
}
</style>
   
    <!-- end::Head -->

    <!-- begin::Body -->
    <?php 
      include "../siteHeader.php";
    ?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">



<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper"style="margin-top: -10%">

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
CREATE PLAN
</h3>
</div>
</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
    
<div class="form-group">
 <div class="row">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                          <input type="hidden" class="form-control" id="riskId">
                          <input type="hidden" class="form-control" id="action" value="Create">
                          <input type="hidden" value="<?php echo $companyId?>" id="company">
                          <input type="hidden" value="0" id="incident">
                        </div>
                      </div>
                  <form id="form1">
                  <div class="form-group row">
                    <label class="col-lg-1 col-form-label">Subject: </label>
                    <div class="col-lg-11">
                  <input type="text" class="form-control" id="riskSubject">
                </div>
               </div>
<div class="form-group row">
        <div class="col-md-6">
        <?php include '../risk/riskScenarioDropDown.php';?>
        </div>

        <div class="col-md-6">
          <?php include '../common/riskSourceDropDown.php';?>
        </div> 
</div>
<div class="form-group row">
  <div class="col-md-6">
   <?php include '../common/categoryDropDown.php';?>
  </div>
  <div class="col-md-6">
    <div class="form-group" id="subCategoryDrop">
      <?php include '../risk/riskSubCategory.php';?>
    </div>
  </div>
</div>
  <div class="form-group row">
    <div class="col-md-6">
      <div class="form-group">
        <?php include"../common/assetGroup.php"; ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group" id="assetId">
        <?php include"../common/assetsDropDown.php";?>  
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <div class="form-group">
       <?php include '../common/regulationDropDown.php';?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group"  id="controlDrop">
        <?php include '../common/controlsDropDown.php';?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleSelect1" class="col-lg-3 col-form-label">Location: </label>
        <?php include '../common/locationDropDown.php';?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <?php include '../common/teamDropDown.php';?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <div class="form-group">
       <?php include '../common/technologyDropDown.php';?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
       <?php include '../common/ownerDropdown.php';?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <div class="form-group">
       <?php include '../common/mitigatorDropdown.php';?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
       <?php include '../common/riskRoleDropDown.php';?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <div class="form-group">
          <label for="riskAssessment" class="col-lg-3 col-form-label">Risk Assessment:</label>
          <div class="col-lg-9">
          <textarea type="text" class="form-control" placeholder="Enter Your Assessment" maxlength="5000" rows="3" id="riskAssessment" required></textarea>
        </div>
       </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
          <label for="riskAssessment" class="col-lg-3 col-form-label">Additional Notes:</label>
          <div class="col-lg-9">
          <textarea type="text" class="form-control" placeholder="Enter Your Notes" maxlength="5000" rows="3" id="additionalNotes" required></textarea>
        </div>
       </div>
     </div>
  </div>
  <div class="form-group row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <?php include '../common/riskScoringDropDown.php'; ?>
    </div>
    <div class="col-md-3"></div>
  </div>

  

<!-- classic scoring -->
<div id="parent">
<div id="classicScoring" class="collapse panel" data-parent="#parent">
    
      <form id="form1">
                <div class="panel panel-default" >
               
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Classic Scoring</h4>
                  
                    <div class="modal-body">
                      <div class="row">
                         <div class="col-md-6">                        
                        <div class="form-group">
                          <?php include '../common/likelihoodDropDown.php';?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <?php include '../common/impactDropDown.php';?>
                        </div>            
                        </div>
                        </div>               
                   </div>
                      
                  </div>
                </form>
             
            </div>
         
       
                    <!-- <div class="kt-portlet__foot" style="float: right;"> -->
<!-- <div class="kt-form__actions">
   <button type="button" class="btn" data-dismiss="toggle" style="background: #32c5d2; color: #fff">Submit</button>
</div> -->
<!-- div class="kt-form__actions">
  <button type="reset" class="btn btn-secondary" style="float:right;" >Cancel</button>
</div> -->
<!-- </div> -->



<!-- CVSS scoring               -->
<div id="cvssScoring" class="collapse panel" data-parent="#parent">
  
      <form id="form1">
                <div class="panel panel-default" >      
                    
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Cvss Scoring</h4>
                  <div class="modal-body">
                    <form id="form1">                             
                      <div class="form-group">
                        <?php include '../common/cvssDropDown.php';?>
                      </div>  
                      </form>
                      </div>
                                   
                </div>
                </form>
               
              </div>


<!-- DREAD scoring -->
<div id="dreadScoring" class="collapse panel" data-parent="#parent">
    <div>
      <form id="form1">
                <div class="panel panel-default">      
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Dread Scoring</h4>

                  <div class="modal-body">
                    <form id="form1"> 
                    <div class="row"> 
                    <div class="col-md-6">                           
                      <div class="form-group">
                        <label for="damagepotential">Damage Potential</label>
                        <div class="input-group select2-bootstrap-prepend">
                          <select id="damagepotential" name="damagepotentialDropDown" class="form-control">
                            <option value=""></option>
                            <option value="1">1</option>                          
                            <option value="2">2</option>
                            <option value="3">3</option>                          
                            <option value="4">4</option>
                            <option value="5">5</option>                          
                            <option value="6">6</option>
                            <option value="7">7</option>                          
                            <option value="8">8</option>
                            <option value="9">9</option>                          
                            <option value="10">10</option>        
                          </select>
                          </div>
                        </div>
                      </div> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="reproducibility">Reproducibility</label>
                          <div class="input-group select2-bootstrap-prepend">
                            <select id="reproducibility" name="reproducibilityDropDown" class="form-control">
                              <option value=""></option>
                              <option value="1">1</option>                          
                              <option value="2">2</option>
                              <option value="3">3</option>                          
                              <option value="4">4</option>
                              <option value="5">5</option>                          
                              <option value="6">6</option>
                              <option value="7">7</option>                          
                              <option value="8">8</option>
                              <option value="9">9</option>                          
                              <option value="10">10</option>        
                            </select>
                           </div>
                          </div>
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exploitability">Exploitability</label>
                            <div class="input-group select2-bootstrap-prepend">
                            <select id="dredexploitability" name="exploitabilityDropDown" class="form-control">
                              <option value=""></option>
                              <option value="1">1</option>                          
                              <option value="2">2</option>
                              <option value="3">3</option>                          
                              <option value="4">4</option>
                              <option value="5">5</option>                          
                              <option value="6">6</option>
                              <option value="7">7</option>                          
                              <option value="8">8</option>
                              <option value="9">9</option>                          
                              <option value="10">10</option>        
                            </select>
                              </div>
                            </div>
                        </div>  
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="affectedusers  ">Affected Users</label>
                            <div class="input-group select2-bootstrap-prepend">
                            <select id="affectedusers" name="affectedusersDropDown" class="form-control">
                              <option value=""></option>
                              <option value="1">1</option>                          
                              <option value="2">2</option>
                              <option value="3">3</option>                          
                              <option value="4">4</option>
                              <option value="5">5</option>                          
                              <option value="6">6</option>
                              <option value="7">7</option>                          
                              <option value="8">8</option>
                              <option value="9">9</option>                          
                              <option value="10">10</option>        
                            </select>
                            </div>
                          </div>
                        </div> 
                        </div> 
                        <div class="row">
                          <div class="col-md-6">
                        <div class="form-group">
                          <label for="discoverability">Discoverability</label>
                            <div class="input-group select2-bootstrap-prepend">
                            <select id="discoverability" name="discoverabilityDropDown" class="form-control">
                              <option value=""></option>
                              <option value="1">1</option>                          
                              <option value="2">2</option>
                              <option value="3">3</option>                          
                              <option value="4">4</option>
                              <option value="5">5</option>                          
                              <option value="6">6</option>
                              <option value="7">7</option>                          
                              <option value="8">8</option>
                              <option value="9">9</option>                          
                              <option value="10">10</option>        
                            </select>
                           
                          </div>
                        </div> 
                        </div>
                        </div>                                                 
                      </form>
                     <!--  <div class="modal-footer">
                       <button type="button" class="btn" data-dismiss="modal" style="background: #32c5d2;color: #fff">Submit</button>
                      </div>  -->
                   
                    </div>                    
                  </div>
                </form>
                </div>
              </div>
            

<!-- OWASP scoring -->
<div id="owaspScoring" class="collapse" data-parent="#parent">
    <div class="">
      <form id="form1">
                <div class="panel panel-default">      
      
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">OwaspScoring</h4>
                    <div class="modal-body">
                      <form id="form1"> 
                        <h5>Threat Agent Factors</h5>
                        <div class="row">
                          <div class="col-md-6">                            
                            <div class="form-group">
                              <label for="skilllevel">Skill Level</label>
                                <div class="input-group select2-bootstrap-prepend">
                                <select id="skilllevel" name="skilllevelDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                              
                              </div>
                            </div> 
                            <div class="form-group">
                              <label for="motive">Motive</label>
                                <div class="input-group select2-bootstrap-prepend">
                                <select id="motive" name="motiveDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                               
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">       
                            <div class="form-group">
                              <label for="opportunity">Opportunity</label>
                              <div class="input-group select2-bootstrap-prepend">
                                <select id="opportunity" name="opportunityDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                                
                              </div>
                            </div>  
                            <div class="form-group">
                              <label for="size">Size</label>
                              <div class="input-group select2-bootstrap-prepend">
                                <select id="size" name="sizeDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                                
                              </div>
                            </div>
                          </div>
                        </div> 
                        <h5>Vulnerability Factors</h5>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="easeofdiscovery">Ease of Discovery</label>
                              <div class="input-group select2-bootstrap-prepend">
                                <select id="easeofdiscovery" name="easeofdiscoveryDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="easeofexploit">Ease of Exploit</label>
                              <div class="input-group select2-bootstrap-prepend">
                              <select id="easeofexploit" name="easeofexploitDropDown" class="form-control">
                                <option value=""></option>
                                <option value="1">1</option>                          
                                <option value="2">2</option>
                                <option value="3">3</option>                          
                                <option value="4">4</option>
                                <option value="5">5</option>                          
                                <option value="6">6</option>
                                <option value="7">7</option>                          
                                <option value="8">8</option>
                                <option value="9">9</option>                          
                                <option value="10">10</option>        
                              </select>
                              
                            </div>
                            </div> 
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="awareness">Awareness</label>
                              <div class="input-group select2-bootstrap-prepend">
                                <select id="awareness" name="awarenessDropDown" class="form-control ">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                               
                              </div>
                            </div> 
                            <div class="form-group">
                              <label for="intrusiondetection">Intrusion Detection</label>
                              <div class="input-group select2-bootstrap-prepend">
                                <select id="intrusiondetection" name="intrusiondetectionDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                               
                              </div>
                            </div>
                          </div>   
                        </div>
                        <h5>Technical Impact</h5>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="lossofconfidentiality">Loss of Confidentiality</label>
                                <div class="input-group select2-bootstrap-prepend">
                                  <select id="lossofconfidentiality" name="lossofconfidentialityDropDown" class="form-control">
                                    <option value=""></option>
                                    <option value="1">1</option>                          
                                    <option value="2">2</option>
                                    <option value="3">3</option>                          
                                    <option value="4">4</option>
                                    <option value="5">5</option>                          
                                    <option value="6">6</option>
                                    <option value="7">7</option>                          
                                    <option value="8">8</option>
                                    <option value="9">9</option>                          
                                    <option value="10">10</option>        
                                  </select>
                                  
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="lossofintegrity">Loss of Integrity</label>
                                <div class="input-group select2-bootstrap-prepend">
                                  <select id="lossofintegrity" name="lossofintegrityDropDown" class="form-control">
                                    <option value=""></option>
                                    <option value="1">1</option>                          
                                    <option value="2">2</option>
                                    <option value="3">3</option>                          
                                    <option value="4">4</option>
                                    <option value="5">5</option>                          
                                    <option value="6">6</option>
                                    <option value="7">7</option>                          
                                    <option value="8">8</option>
                                    <option value="9">9</option>                          
                                    <option value="10">10</option>        
                                  </select>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6"> 
                              <div class="form-group">
                                <label for="lossofavailability">Loss of Availability</label>
                                <div class="input-group select2-bootstrap-prepend">
                                  <select id="lossofavailability" name="lossofavailabilityDropDown" class="form-control">
                                    <option value=""></option>
                                    <option value="1">1</option>                          
                                    <option value="2">2</option>
                                    <option value="3">3</option>                          
                                    <option value="4">4</option>
                                    <option value="5">5</option>                          
                                    <option value="6">6</option>
                                    <option value="7">7</option>                          
                                    <option value="8">8</option>
                                    <option value="9">9</option>                          
                                    <option value="10">10</option>        
                                  </select>
                                  
                                </div>
                              </div> 
                              <div class="form-group">
                                <label for="lossofaccountability">Loss of Accountability</label>
                                <div class="input-group select2-bootstrap-prepend">
                                  <select id="lossofaccountability" name="lossofaccountabilityDropDown" class="form-control">
                                    <option value=""></option>
                                    <option value="1">1</option>                          
                                    <option value="2">2</option>
                                    <option value="3">3</option>                          
                                    <option value="4">4</option>
                                    <option value="5">5</option>                          
                                    <option value="6">6</option>
                                    <option value="7">7</option>                          
                                    <option value="8">8</option>
                                    <option value="9">9</option>                          
                                    <option value="10">10</option>        
                                  </select>
                                  
                                </div>
                              </div>
                            </div>
                          </div> 
                          <h5>Business Impact</h5>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="financialdamage">Financial Damage</label>
                                  <div class="input-group select2-bootstrap-prepend">
                                    <select id="financialdamage" name="financialdamageDropDown" class="form-control">
                                      <option value=""></option>
                                      <option value="1">1</option>                          
                                      <option value="2">2</option>
                                      <option value="3">3</option>                          
                                      <option value="4">4</option>
                                      <option value="5">5</option>                          
                                      <option value="6">6</option>
                                      <option value="7">7</option>                          
                                      <option value="8">8</option>
                                      <option value="9">9</option>                          
                                      <option value="10">10</option>        
                                    </select>
                                    
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label for="reputationdamage">Reputation Damage</label>
                                  <div class="input-group select2-bootstrap-prepend">
                                    <select id="reputationdamage" name="reputationdamageDropDown" class="form-control">
                                      <option value=""></option>
                                      <option value="1">1</option>                          
                                      <option value="2">2</option>
                                      <option value="3">3</option>                          
                                      <option value="4">4</option>
                                      <option value="5">5</option>                          
                                      <option value="6">6</option>
                                      <option value="7">7</option>                          
                                      <option value="8">8</option>
                                      <option value="9">9</option>                          
                                      <option value="10">10</option>        
                                    </select>
                                   
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6"> 
                                <div class="form-group">
                                  <label for="noncompliance">Non-Compliance</label>
                                  <div class="input-group select2-bootstrap-prepend">
                                    <select id="noncompliance" name="noncomplianceDropDown" class="form-control">
                                      <option value=""></option>
                                      <option value="1">1</option>                          
                                      <option value="2">2</option>
                                      <option value="3">3</option>                          
                                      <option value="4">4</option>
                                      <option value="5">5</option>                          
                                      <option value="6">6</option>
                                      <option value="7">7</option>                          
                                      <option value="8">8</option>
                                      <option value="9">9</option>                          
                                      <option value="10">10</option>        
                                    </select>
                                   
                                  </div> 
                                </div>
                                  <div class="form-group">
                                    <label for="privacyviolation">Privacy Violation</label>
                                    <div class="input-group select2-bootstrap-prepend">
                                      <select id="privacyviolation" name="privacyviolationDropDown" class="form-control">
                                        <option value=""></option>
                                        <option value="1">1</option>                          
                                        <option value="2">2</option>
                                        <option value="3">3</option>                          
                                        <option value="4">4</option>
                                        <option value="5">5</option>                          
                                        <option value="6">6</option>
                                        <option value="7">7</option>                          
                                        <option value="8">8</option>
                                        <option value="9">9</option>                          
                                        <option value="10">10</option>        
                                      </select>
                                    
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </form>
                          <!-- <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" style="background: #32c5d2;color: #fff">Submit</button>
                          </div> -->
                        </div> 
                                          
                      </div>
                </form>
                </div>
              </div>


<!-- Custom scoring -->
<div id="customScoring" class="collapse" data-parent="#parent">
    <div>
      <form id="form1">
                <div class="panel panel-default">      
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Custom Scoring</h4>
                        <div class="modal-body">
                          <form id="form1">  
                          <div class="row">
                          <div class="col-md-6">                           
                            <div class="form-group">
                              <label for="customvalue">Custom Value</label>
                              <div class="input-group select2-bootstrap-prepend">
                                <select id="customvalue" name="customvalueDropDown" class="form-control">
                                  <option value=""></option>
                                  <option value="1">1</option>                          
                                  <option value="2">2</option>
                                  <option value="3">3</option>                          
                                  <option value="4">4</option>
                                  <option value="5">5</option>                          
                                  <option value="6">6</option>
                                  <option value="7">7</option>                          
                                  <option value="8">8</option>
                                  <option value="9">9</option>                          
                                  <option value="10">10</option>        
                                </select>
                                </div>
                              </div> 
                            </div>
                          </div>
                          </form>
                         <!--  <div class="modal-footer">
                           <button type="button" class="btn" data-dismiss="modal" style="background: #32c5d2; color: #fff">Submit</button>
                          </div>  -->
                        </div>                   
                      </div>
                </form>
                </div>
              </div>

<!--Asset Scoring -->
<div id="assetscoring" class="collapse" data-parent="#parent">
        
                    <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Asset Based Scoring</h4>
                  <div class="modal-body">
                    <form id="form1">                             
                      <div class="form-group">
<div  class="form-group">
  <h5 for Asset Value>Asset Value</h5>
  <input type="hidden" id="asset_value_from_asset" readonly>
<?php include "../../php/risk/Assetvalue.php"; ?>
</div>
<div class="row">
  <div class="col-md-4">
<label for="likelihood">Likelihood</label>
<div class="input-group select2-bootstrap-prepend">
    <select id="Assetlikelihood" name="likelihoodDropDown" class="form-control">
        <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>      
    </select>
</div>
</div>
<div class="col-md-4">
<label for="vulnerability value">Vulnerability</label>
<div class="input-group select2-bootstrap-prepend">
    <select id="Vulnerability" name="likelihoodDropDown" class="form-control">
        <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>      
    </select>
</div>
</div>
<div class="col-md-4">
<label for="vulnerability value">Threat</label>
<div class="input-group select2-bootstrap-prepend">
    <select id="threat" name="likelihoodDropDown" class="form-control">
        <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>      
    </select>
</div>
</div>
</div>
                      </div>                                                 
                    </form>
              
              </div>
            </div>
<div id="Quantitative" class="collapse" data-parent="#parent">
   <div>
      <form id="form1">
                <div class="panel panel-default">
                 
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Quantitative</h4>
               <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">Before Safeguard</div>
                    <div class="panel-body">
                    
                            <div class="col-md-2" >
                            <label>Exposure Factor (EF) <b>*</b></label>
                            <input type="number" class="form-control" id="Exposure_Asset_Before_Safeguard" onkeyup="SingleLossExpectancyBeforeSafeguard()" >
                          </div>       
                      
                          <div class="col-md-2" >
                                 <label>Asset Value (AV)</label>
                                 <input type="number"  class="form-control" id="Asset_Value_Before_Safeguard" onkeyup="SingleLossExpectancyBeforeSafeguard()" >
                              </div>         
                     
                           <div class="col-md-2" >
                               <label for="sale">Single Loss Expectancy (SLE)</label>
                               <input type="number" class="form-control" id="Single_Loss_Expectancy_Before_Safeguard" value="" readonly>
                              </div>         
                       
                         <div class="col-md-3" >
                               <label for="">Anualized Rate Of Occurence (ARO)</label>
                               <input type="number" class="form-control" id="Anulaized_Rate_Of_Ocurance_Before_Safeguard" onkeyup="AnulaizedlossExpectionPrior()">
                              </div>        
                         <div class="col-md-3" >
                                <label for="sale">Anualized Loss Expectancy (ALE)</label><input type="text" class="form-control"  id="Anualized_Loss_Expection_Before_Safeguard" value = ""   readonly >
                              </div>
                            </div>
                         
                  </div>
                </div>
                <p style="margin-left: 50px;"><strong>* Note:</strong><br>1. EF value in Percentage<br>2. ARO show, times of occurrences in a year </p>
              </div>
            
                                <input type="hidden" class="form-control" value=0  id="Exposure_Asset_After_Safeguard"  onblur="SingleLossExpectancy()">
                                  <input type="hidden" class="form-control" value=0 id="Anulaized_Rate_Of_Ocurance_After_Safeguard" onblur="AnualizedLossExpectionpost()">
                                 <input type="hidden" class="form-control" value=0 id="Single_Loss_Expectancy_After_Safeguard" value = ""  onblur="AnualizedLossExpectionpost()" readonly >
                                <input type="hidden" class="form-control" value=0  id="Anualized_Loss_Expection_After_Safeguard" value = ""   readonly >
                               <input type="hidden" class="form-control" value=0 id="Safeguard" onblur ="NetRiskReductionBenifit()" >
                                <input type="hidden" class="form-control" value=0 id="Net_Risk_Reduction_Benifit"  readonly>
                     <!-- <div class="modal-footer">
                     <button type="button" class="btn" data-dismiss="modal" style="background: #32c5d2; color: #fff">Submit</button>
                  </div> -->
                    </div>
                   </form>
                </div>
            </div>
           
<div id="Qualitative" class="collapse" data-parent="#parent">
                <div>
                <div class="panel panel-default">
                 <h4 class="panel-heading text-center" style=" background-color:#2a5aa8;color: #fff;">Qualitative Analysis</h4>
                <div class="modal-body">
                    <form id="form1">
                      <div class="row">
                        <div class="col-md-6">
              <div class="form-group">
                                  <label>Frequency of Occurence Without Control</label>
                                  <select class="form-control" id="Frequency_of_Occurence_Without_Control">
                                    <option></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Months</label>
                                  <select class="form-control" id="Months">
                                    <option></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                  </select>
                                </div>
                              </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Worst Case Likelihood</label>
                                    <select class="form-control" id="Worst_Case_Likelihood">
                                    <option></option>
                                    <option value="">Extreme</option>
                                    <option value="">High</option>
                                    <option value="">Medium</option>
                                    <option value="">Low</option>
                                  </select>
                                    
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Worst Case Description</label>
                                    <input type="text" class="form-control" id="Worst_Case_Description" >
                                   
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Worst Case Financial Exposure</label>
                                    
                                    <select class="form-control" id="Worst_Case_Financial_Exposure">
                                    <option></option>
                                    <option value="3">Extreme</option>
                                    <option value="2">High</option>
                                    <option value="1">Medium</option>
                                    <option value="0">Low</option>
                                  </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                   <?php include '../common/riskCatgories.php';?>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Other Risk</label>
                                    <input type="text" class="form-control" id="other_risk"> 
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Typical Case Description</label>
                                    <input type="text" class="form-control" id="Typical_Case_Description" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Frequency of Occurence Without Control</label>
                                    <input type="text" class="form-control" id="Frequency_of_Occurence_Without_Control_two" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Frequency of Occurence With Control</label>
                                    <input type="text" class="form-control" id="Frequency_of_Occurence_With_Control" >
                                  </div>   
                                  </div>
                                  <div class="col-md-6">                     
                                  <div class="form-group">
                                    <label for="usr">Typical Case Likelihood</label>
                                    <input type="text" class="form-control" id="Typical_Case_Likelihood" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="usr">Typical Case Financial Exposure</label>
                                    <input type="text" class="form-control" id="Typical_Case_Financial_Exposure"> 
                                  </div>
                                </div>
                             </div>
                     </form>
                </div> 
                </div>
                </div>   
             </div>   
             </div>  

<input type="hidden" class="form-control" id="auditCapaCheck" value="<?php echo $GLOBALS['capa'] ?>">
<input type="hidden" class="form-control" id="parentAudit" value="0">
  
</div>

<div class="kt-portlet__foot">
<div class="kt-form__actions">
  <button type="button" id="manageButton" onclick="saveRiskPlan()" data-dismiss="modal" class="btn btn-primary" style="float:right;">Plan</button>
</div>
</div>
</form>


<?php
include "../audit/sidemenu.php";
 ?>
 
 <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
 <script src="js/risk/riskManagement.js"></script>
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>

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

          <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script> 
      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
   <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                
<script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
         <script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>  
        
            </body>
    <!-- end::Body -->
</html>