<?php
require_once "../../php/common/config.php";
require_once 'functions/boardfunctions.php';
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>publish report</title>
    <base href="/freshgrc/">
    
        <link href="metronic/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="metronic/theme/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="metronic/theme/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="metronic/theme/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="metronic/theme/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="metronic/theme/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
       <!-- <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" /> -->
        <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>   
        <script type="text/javascript" src="assets/DataTables/DataTables-1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
        <script type="text/javascript" src="assets/DataTables/pdfmake.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>

          <script type="text/javascript" src="assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="assets/sweetalert2/core.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2/sweetalert2.min.css">

<script src="metronic/theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="metronic/theme/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="metronic/theme/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
             <script src="metronic/theme/assets/pages/scripts/table-datatables-responsive.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="metronic/theme/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="metronic/theme/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
       <script type="text/javascript" src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>


     
</head>
<body>
	<img src="fixnix.png" style="height: 80px; width:70px;margin-top:20px;">
	<div>
 <!--  <button class="glyphicon glyphicon-file" data-toggle="tooltip" title="PDF" id="cmd" style="margin-left: 88%;margin-top: 1%;margin-bottom: -1%;border-color: #8E44AD;color: #8E44AD;background: 0 0;border: 1px solid #8E44AD !important;width:50px;height: 40px;"></button> -->
<!--  <button class="btn" style="margin-top:1%;color: #fff;background-color: #DD359B;margin-top: 1%;margin-bottom: -4%;margin-left: 1%;" onclick="goBack()">Go Back</button> -->
<input type="submit" value="Go Back" class="btn btn-primary" style="background-color:#3570DD;margin-bottom: -6%;margin-left:87%;" onclick="goBack()">
 <img src="pdfimage.png" class="responsive" id="cmd" style="width:90px;height: 45px;margin-left: 93%;margin-top:1%;margin-bottom: 1%;">
 <script>

      function goBack() {
    window.close();
        }
      </script>

    <div id="element-to-print">
	       <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                               </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <div class="table-responsive">  
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"  cellspacing="0" width="100%" >
                                        <thead>
                                            <tr>
                                            
                                            <th>Meeting Title</th>
                                            <th>Date</th>
                                            <th>Purpose</th>
                                            <th>Responsibility</th>
                                            <th>Output</th>
                                            <th>Members</th>
                                            <th>Admin</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                            <tr>
                                               
                                               
                                            </tr>
                                           
                                          
                                        </tbody>
                                    </table>
                                   </div> 
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>

	    <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                <!--     <i class="fa fa-globe"></i> -->Controls</div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                 <div class="table-responsive">  
                                    <table class="table table-bordered">
                                       <thead>
                                        <tr>
                                       <th>Author</th>
                                       <th>Agenda</th>
                                       <th>Synopsis</th>
                                       <th>ActioNItems</th>
                                       <th>Owner</th>
                                       <th>Deadline</th>
                                       <th>Summary</th>

                                            
                                           
                                          
                                        </tr>
                                     </thead>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         </body>
         </html>
         <script>
         	 $('#cmd').click(function() {
var element = document.getElementById('element-to-print');
html2pdf(element, {
  margin:       0,
  filename:     'MeetingReport.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
});
});

</script>
