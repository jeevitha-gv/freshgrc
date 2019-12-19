<?php
require_once "../../php/common/config.php";
require_once 'functions/boardfunctions.php';
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>

 <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshgrc</title>
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
<script src="js/audit/auditCreateManagement.js"></script>
<link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
<script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
 <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
<script type="text/javascript" src="../../assets/DataTables/pdfmake.min.js"></script>
 <script type="text/javascript" src="../../assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script><script src="js/audit/auditCreateManagement.js"></script>
<link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
    </head>
   
 <?php 
   include '../siteHeader.php';
?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >

<div class="kt-grid kt-grid--hor kt-grid--root" > 
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg"style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
<?php echo $auditTitle ?>
</h3>
</div>

</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable">
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
                                              <?php $var=$_GET['userid'];
                                              // echo $var;

                                                $sql = "SELECT * from boardindex WHERE m_no =$var LIMIT 1";

                                                    $result = mysqli_query($link, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      while($row = mysqli_fetch_array($result))
                                                    {?><td><?php echo $row['title'];?></td>
                                                  <!-- <input type="text" value="<?php echo $row['date'];?>"> -->
                                                  <td><?php echo $row['date'];?></td>
                                                  <td><?php echo $row['purpose'];?></td>
                                                  <td><?php echo $row['responsibities'];?></td>
                                                  <td><?php echo $row['output'];?></td>
                                                  <td><?php $array = explode(',',$row['user']);
                                                            foreach ($array as $user){
                                                            $username=getusernamefromid($user);
                                                            echo $username . ", ";
                                                          }?></td>
                                                  <td><?php $array = explode(',',$row['admin']);
                                                            foreach ($array as $member){
                                                            $membername=getadminnamefromid($member);
                                                            echo $membername;
                                                          }?></td>
                                               <?php } } ?>
                                            </tr>
                                           
                                          
                                        </tbody>
                                    </table>
                                   </div> 
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg"style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
<?php echo $auditTitle ?>
</h3>
</div>

</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                       <thead>
                                        <tr>
                                       <th>Author</th>
                                       <th>Agenda</th>
                                       <th>Synopsis</th>
                                       <th>Action_Items</th>
                                       <th>Owner</th>
                                       <th>Deadline</th>
                                       <th>Summary</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                               <?php 
                                               $var=$_GET['userid'];
$sql = "SELECT bi.user as Author, bm.action_item as Action_Item,bm.owner as Owner,bm.deadline as Deadline,ba.topic as Agenda,ba.synopsis as Synopsis,bp.summary as Summary FROM boardminutes as bm,boardindex as bi,boardagenda as ba,boardpublish as bp WHERE bm.m_no=ba.m_no AND bi.m_no=bp.m_no AND bm.m_no=bp.m_no AND ba.m_no=bp.m_no AND bm.m_no=$var LIMIT 1";
                                                    $result = mysqli_query($link, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      while($row = mysqli_fetch_array($result))
                                                    {?><td><?php echo $row['Author'];?></td>
                                                  <td><?php echo $row['Agenda'];?></td>
                                                  <td><?php echo $row['Synopsis'];?></td>
                                                  <td><?php echo $row['Action_Item'];?></td>
                                                  <td><?php $array = explode(',',$row['Owner']);
                                                            foreach ($array as $user){
                                                            $username=getusernamefromid($user);
                                                            echo $username;
                                                          }?></td>
                                                  <td><?php echo $row['Deadline'];?></td>
                                                  <td><?php echo $row['Summary'];?></td>
                                               <?php } } ?>
                                            </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
  </body>
         <?php

        include '../audit/sidemenu.php';
        ?>

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
                            

