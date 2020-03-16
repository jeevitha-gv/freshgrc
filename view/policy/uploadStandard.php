<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php'; 
      $manager=new complianceManager();
      $uploadedFiles=$manager->getAllUploadedFiles($_SESSION['company']);
      error_log("all uploaded Files".print_r($uploadedFiles,true));
      $delim="_";

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
     
                    <!--begin::Page Custom Styles(used by this page) -->
                             <link href="./assets/css/demo3/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Custom Styles -->
        
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
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    
                    <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

 <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
       
    </head>
  
<?php 
   include '../siteHeader.php';
?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >

 
   
    	<!-- begin:: Page -->

	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -13%;">
			
			 <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
											
				
					<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">
	<!--begin: Form Wizard Nav -->
	<div class="kt-wizard-v4__nav">
		<div class="kt-wizard-v4__nav-items row">
			<!--doc: Replace A tag with SPAN tag to disable the step link click -->
			<a class="kt-wizard-v4__nav-item col-md-4" data-ktwizard-type="step" data-ktwizard-state="current">
				<div class="kt-wizard-v4__nav-body">
					<div class="kt-wizard-v4__nav-number">
						1
					</div>
					<div class="kt-wizard-v4__nav-label">
						<div class="kt-wizard-v4__nav-label-title" style="font-size: 20px;">
							Template Download
						</div>
						<div class="kt-wizard-v4__nav-label-desc" style="font-size: 15px;" >
							Download the Custom Template
						</div>
					</div>
				</div>
			</a>
			<!-- <a class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
				<div class="kt-wizard-v4__nav-body">
					<div class="kt-wizard-v4__nav-number">
						2
					</div>
					<div class="kt-wizard-v4__nav-label">
						<div class="kt-wizard-v4__nav-label-title">
							Download
						</div>
						<div class="kt-wizard-v4__nav-label-desc">
							Download the recent csv file
						</div>
					</div>
				</div>
			</a> -->
			<a class="kt-wizard-v4__nav-item col-md-4" data-ktwizard-type="step">
				<div class="kt-wizard-v4__nav-body">
					<div class="kt-wizard-v4__nav-number">
						2
					</div>
					<div class="kt-wizard-v4__nav-label">
						<div class="kt-wizard-v4__nav-label-title" style="font-size: 20px;" >
							Upload Template
						</div>
						<div class="kt-wizard-v4__nav-label-desc" style="font-size: 15px;" >
							Upload your new Template
						</div>
					</div>
				</div>
			</a>
			
		<!-- 	<a class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
				<div class="kt-wizard-v4__nav-body">
					<div class="kt-wizard-v4__nav-number">
						3
					</div>
					<div class="kt-wizard-v4__nav-label">
						<div class="kt-wizard-v4__nav-label-title">
							Completed
						</div>
						<div class="kt-wizard-v4__nav-label-desc">
							Review and Submit
						</div>
					</div>
				</div>
			</a> -->
		</div>
	</div>
	<!--end: Form Wizard Nav -->

	<div class="kt-portlet">
		<div class="kt-portlet__body kt-portlet__body--fit">
			<div class="kt-grid">
				<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">
					<!--begin: Form Wizard Form-->
					<form class="kt-form" id="kt_form">
						<!--begin: Form Wizard Step 1-->
						<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
							<div class="fileinput-new thumbnail"> 
                                <img src="uploadedFiles/auditeeFiles/template.jpg" onclick="window.location.href='assets/template.xlsx'" alt="avatar" id="" style="width: 200px;height: 150px;margin-left: 300px;"><br><br>
                                <p style="margin-left: 50px;"><span style="color: red;">NOTE! </span>Please click the Excel image to download template and please upload the filled library in CSV format.</p>
                            </div>
						</div>
						<!--end: Form Wizard Step 1-->

						<!--begin: Form Wizard Step 2-->
						<!-- <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
								<div class="container">
								    <center>
									    <strong>
									       <a href=""  data-toggle="tab" style="font-size: 25px;">Download<img src="downlaod-icon.png" title="Download" width="35" height="35" ></a>
										</strong>
								    </center>
								</div>
								<div class="kt-portlet__body" >
 								<div class="form-group row ">
                
                    
                   
                    <div class="kt-portlet" style="background-color: #F2F3F8";>
                      

                            <div class="form-group">
                              <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>"> 
                              <input type="hidden" name="action" id="action">                                         
                            </div>
                            <table class="table">
                              <thead>
                                <tr>
                                 
                                  <td >
                                   <b1>File</b1>
                                  </td>
                                  <td>
                                    <b1>Action</b1>
                                  </td>
                                </tr>
                              </thead>
                              <tbody>
                                <?php for($i=0;$i<count($uploadedFiles);$i++){ ?>
                                <tr>
                                  <td><?php echo $uploadedFiles[$i]['imported_file_name'] ?></td>
                                  <td><a href="/freshgrc/uploadedFiles/compliance/success/<?php echo $uploadedFiles[$i]['id'].$delim.$uploadedFiles[$i]['imported_file_name']?>" download><img src="fileCsv.png" title="Download" width="35" height="35"></a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                        </div>                            
                    
                  </div>                     
                </div>
																
						</div> -->
						<!--end: Form Wizard Step 2-->

						<!--begin: Form Wizard Step 3-->
					<!-- 	<div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
							<div class="kt-heading kt-heading--md">Enter your Payment Details</div>
							<div class="kt-form__section kt-form__section--first">
								<div class="kt-wizard-v4__form">
									<div class="row">
										<div class="col-xl-6">
											<div class="form-group">
												<label>Name on Card</label>
												<input type="text" class="form-control" name="ccname" placeholder="Card Name" value="John Wick">
												<span class="form-text text-muted">Please enter your Card Name.</span>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<label>Card Number</label>
												<input type="text" class="form-control" name="ccnumber" placeholder="Card Number" value="4444 3333 2222 1111">
												<span class="form-text text-muted">Please enter your Address.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-4">
											<div class="form-group">
												<label>Card Expiry Month</label>
												<input type="number" class="form-control" name="ccmonth" placeholder="Card Expiry Month" value="01">
												<span class="form-text text-muted">Please enter your Card Expiry Month.</span>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="form-group">
												<label>Card Expiry Year</label>
												<input type="number" class="form-control" name="ccyear" placeholder="Card Expire Year" value="21">
												<span class="form-text text-muted">Please enter your Card Expiry Year.</span>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="form-group">
												<label>Card CVV Number</label>
												<input type="password" class="form-control" name="cccvv" placeholder="Card CVV Number" value="123">
												<span class="form-text text-muted">Please enter your Card CVV Number.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!--end: Form Wizard Step 3-->

						<!--begin: Form Wizard Step 4-->
						<div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
							<div class="container">
								    <center>
									    <strong>
									       <!-- <a href="#tab_1_1"  data-toggle="tab" style="font-size: 25px;">Download<img src="downlaod-icon.png" title="Download" width="35" height="35" ></a> -->
											<a href="#tab_1_2" data-toggle="tab" style="font-size: 25px;">Template<img src="temp.png" title="Template" width="35" height="35" ></a>
										</strong>
								    </center>
								</div>

							<style type="text/css">
                                	.csv{
                                		color: #2B39C1; font-size: 18px;
                                	}
                                	.csv:hover{
                                	color: #b6c111;
                                	font-style:italic;
                                	}
                                </style>


                                <div style="margin-top: 25px;" > 
                                	<center>
                                	            <div style="border-radius: 25px; border-color: #5b61a5;   border-style: dotted; width: 333px;" >
            	<center>
            <label for="complianceCsv" aria-hidden="true">
 				 <img src="csv.svg" title="ImportCsv File" width="35" height="35"> <span class="csv" > Click to select a file.</span>
              <input type="file" accept=".csv" style="display:none;" onchange= "importCsv()" id="complianceCsv"/>
                                </label>                                
                              </center>
                              </div>
                          </center>
                              
                            </div>  

						</div>
						<!--end: Form Wizard Step 4-->

						<!--begin: Form Actions -->
						<div class="kt-form__actions">
							<button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
								Previous
							</button>
							<button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
								Submit
							</button>
							<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
								Next Step
							</button>
						</div>
						<!--end: Form Actions -->
					</form>
					<!--end: Form Wizard Form-->
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
<!-- end:: Content -->				</div>				
				
						</div>
		</div>
	</div>
<?php 
include "../audit/sidemenu.php";
 ?>
   <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    	<!--begin:: Global Mandatory Vendors -->
<script type="text/javascript" src="js/compliance/importLibrary.js"></script>
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
				<!--end::Global Theme Bundle -->

        
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo3/pages/wizard/wizard-4.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
            </body>
    <!-- end::Body -->
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
