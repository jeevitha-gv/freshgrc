<?php
 require_once __DIR__.'/../header.php';

// require_once __DIR__.'/../../php/audit/auditClauseManager.php';
// require_once __DIR__.'/../../php/compliance/complianceManager.php';
// require_once __DIR__.'/../../php/audit/auditManager.php';
session_start();
$companyId=$_SESSION['company'];
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
$user_role=$_SESSION['user_role'];
// $companyname=$_SESSION['companyname'];
// echo $companyId;
// echo $user_id;
// echo $user_name;
// echo $user_role;
// echo $companyname;
?>
<!DOCTYPE html>
<html>
    <head>
<base href="/freshgrc/">
        <meta charset="utf-8"/>

        <title>FreshGRC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
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
  <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
   

    </head>
<style type="text/css">
  #progressbar
  {
    width:100%;
 
  }
#bar
{
background-color: #32ACB5;
color: white;
font-size:12px;
}
 
</style>
<?php
    include '../siteHeader.php';

    ?>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #EEEEEE;">
<!-- <div class="conatiner">
<nav class="navbar navbar-dark bg-white" >

<h4>Getting started with FreshGRC</h4>

</nav>
</div> -->
<div class="container" style="background-color:white;width: 75%; ">
<h4>Welcome back, <strong><?php echo $user_name; ?></strong></h4>
<p style="color: #141f1f;">You're doing great.  Keep going!</p><br /><br />
<img src="sunny.svg" class="rounded float-right" width="100" height="100" alt="" style="margin-top: -50px;">
<div class="row">
 &nbsp; &nbsp; <progress id="myProgress" value="0" max="100" style="width:80%">
</progress>
 &nbsp; &nbsp; &nbsp; &nbsp;<h5 id="percent">0% complete</h5>
</div><br>
 
  <h5><strong>Learn about freshGRC</strong></h5><hr>

<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">View the slideshow to see what FreshGRC is all about.</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal1"><img src="Slideshow.png" title="View slideshow" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">Getting started with the Marketing FreshGRC
</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal2"><img src="video.png" title="watch video" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
 
<P style="color: #141f1f;">Read our FAQ
All the important stuff including what's free vs paid, how we secure your data, and which other tools FreshGRC works with.</P>
</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal3"><img src="FAQ.png" title="Read FAQ" width="40" height="40"> </a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">BCPM</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal4"><img src="video1.png" title="watch BCPM" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">Audit
</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal5"><img src="video6.png" title="watch Audit" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">Asset</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal6"><img src="video3.png" title="watch Asset" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">Regulatory Engine
</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal7"><img src="video4.png" title="watch Regulatory Engine" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">Blockchain</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal8"><img src="video5.png" title="watch Blockchain" width="40" height="40"></a>
</div>
</div><hr>
<div class="form-group row">
<div class="col-sm-10">
<p style="color: #141f1f;">Nix Privacy
</p>

</div>
<div class="col-sm-2">
<a href="#" data-toggle="modal" data-target="#myModal9"><img src="video7.png" title="watch Nix Privacy" width="40" height="40"></a>
</div>
</div><hr>
 
 
 
<div class="col-sm-10">
<p style="color: #141f1f;">Checklist
</p>

</div>
 
<div class="col-sm-12">
<!-- <button type="button" class="btn btn-success" style="float: right;">Read</button> -->
<div class="form-group">
                            <input type="hidden" class="form-control" id="action" value="in_draft">
                            <input type="hidden" class="form-control" id="company_id" value="<?php echo $companyId ?>">
                          </div>
 <div class="form-group text-center" style="margin-top: 2%;">
                     
  <?php include '../compliance/addstandarddropdown.php';?>
                       

  </div>
</div>
 

<hr>
 
 

 
</div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <iframe width="480" height="300" src="https://www.youtube.com/embed/GRrE1aZgCLk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button"  id="btn1"class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <iframe width="480" height="300" src="https://www.youtube.com/embed/GRrE1aZgCLk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn2"class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <iframe width="480" height="300" src="https://www.youtube.com/embed/GRrE1aZgCLk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn3" class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
         <iframe width="480" height="300" src="https://www.youtube.com/embed/HPE4W7s5Aug" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn4" class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
         <iframe width="480" height="300" src="https://www.youtube.com/embed/hQn7vJNz2mY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn5" class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
         <iframe width="480" height="300" src="https://www.youtube.com/embed/fgoY_cfWlYg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn6" class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
         <iframe width="480" height="300" src="https://www.youtube.com/embed/voeNGMZ7hqc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn7"class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
         <iframe width="480" height="300" src="https://www.youtube.com/embed/pgy2HcHDf_g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn8"class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
         <iframe width="480" height="300" src="https://www.youtube.com/embed/7Yg6zxLiT4Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn9" class="btn btn-default" onclick="second(this);">okay</button>
      </div>
    </div>
  </div>
</div>
 
 
 

 <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="js/compliance/complianceCreateManagement.js"></script>
 <script src="js/policy/ModuleManagement.js"></script>
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
 <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                            <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
                            <script src="./assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo3/pages/dashboard.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->












            </body>
 <script src="js/policy/ModuleManagement.js"></script>
 <?php
include '../audit/sidemenu.php';

 ?>

</html>
<!-- <script type="text/javascript">
$(document).ready(function()
{
  $("#start").click(function()
  {
    $("#bar").progressbar({
        value:20
  });
});
});
   
 
</script> -->
             
             <script type="text/javascript">
               function start()
               {
                var name=document.getElementById('email').value;
                var pass=document.getElementById('company').value;
                var first=document.getElementById('bar');
                var width=20;
                if(email=='' || pass=='')
                {
                  alert("please fill all the form fields");
                }
                else if (width>=100) {
                  clearInterval(id);

                }
                else
                {
                  width++;
                  first.style.width=width+'%';
                  first.innerHTML=width+9 +'%';

                }
           }
function second(btn) {
  var width=document.getElementById("myProgress").value ;
  if(width>=100)
            {
              clearInterval(id);
            }
  else(width<100)
  {
     width +=10;

  }
 
   
  document.getElementById("myProgress").value=width;
  document.getElementById("percent").innerHTML=width+'% completed';
 
    document.getElementById(btn.id).disabled = true;
}
         
  function second1()
           {
            var second=document.getElementById('myProgress');
            var width=second.value;

            if(width>=100)
            {
              clearInterval(id);
            }
            else
            {
             
              second.style.width=width+'%';
              second.innerHTML=width+10+'%';

            }
          }
 
           function create()
          {
       
            var create = document.getElementById('bar');
            var width=50;
           if(width>=100)
            {
              clearInterval(id);
            }
            else
              {
              width++;
              create.style.width=width + '%';
              create.innerHTML=width+49 +'%';
             
        }
      }
        </script>