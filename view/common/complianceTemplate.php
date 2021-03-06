<?php require_once __DIR__.'/../header.php';
      require_once __DIR__.'/../../php/compliance/complianceManager.php'; 
      $manager=new complianceManager();
      $uploadedFiles=$manager->getAllUploadedFiles($_SESSION['company']);
      error_log("all uploaded Files".print_r($uploadedFiles,true));
      $delim="_";
      ?>
<head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshgrc</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
                     
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

<link href="assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />

<link href="assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
 <script type="text/javascript" src="js/compliance/importLibrary.js"></script>
    </head>
    <?php 
    include '../siteHeader.php';
      ?>
  <body>
   <div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-16%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="kt-portlet">
<div class="kt-portlet__head">
<div class="kt-portlet__head-label" style="text-align: center;  margin-top: 50px; margin-left: 30%;">
<h3 class="kt-portlet__head-title" >
LIBRARY
 <ul class="nav nav-tabs">
                        <li>
                          <a href="#tab_1_1" data-toggle="tab">Download</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;
                        <li>
                          <a href="#tab_1_2" data-toggle="tab">Template</a>
                        </li>                                                                          
                      </ul>
</h3>

</div>
</div>

<div class="kt-portlet__body">
 <div class="form-group row ">
                
                    
                    </div>
                    <div class="kt-portlet">
                      <div class="tab-content">                         
                        <div class="tab-pane" id="tab_1_1">
                          <form role="form" action="#">
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>"> 
                              <input type="hidden" name="action" id="action">                                         
                            </div>
                            <table class="table">
                              <thead>
                                <tr>
                                  <td>
                                   <b>File</b>
                                  </td>
                                  <td>
                                    <b>Action</b>
                                  </td>
                                </tr>
                              </thead>
                              <tbody>
                                <?php for($i=0;$i<count($uploadedFiles);$i++){ ?>
                                <tr>
                                  <td><?php echo $uploadedFiles[$i]['imported_file_name'] ?></td>
                                  <td><a href="/freshgrc/uploadedFiles/compliance/success/<?php echo $uploadedFiles[$i]['id'].$delim.$uploadedFiles[$i]['imported_file_name']?>" download>Download</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </form>
                        </div>                            
                        <div class="tab-pane active" id="tab_1_2">                          
                           <form action="#" role="form" style="margin:5px;">
                            <div class="form-group" style="margin-left: 27%;">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="uploadedFiles/auditeeFiles/template.jpg" onclick="window.location.href='assets/template.xlsx'" alt="avatar" id="" style="width: 250px;height: 150px;" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div><br>
                                <div> 
                                <label for="complianceCsv" aria-hidden="true">
                                <i class="btn btn-danger btn-block fa fa-file-excel-o">  Import Library</i>
                                <input type="file" accept=".csv" style="display:none" onchange= "importCsv()" id="complianceCsv"/>
                                </label>                                 
                                </div>
                              </div>
                               
                              
                              <div class="clearfix margin-top-10">
                                <span class="label label-danger"><b>NOTE!</b> </span>
                                <span>Please Click the excel image to download template and please upload the filled library in csv format</span>
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
<?php 
  include '../audit/sidemenu.php';
?>
<!-- end:: Page -->


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
<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

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
<script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>

 <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
 <script src="assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

<script src="assets/js/demo3/pages/dashboard.js" type="text/javascript"></script>
                      
            </body>
    <!-- end::Body -->
</html>
