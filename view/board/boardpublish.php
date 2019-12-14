<?php
require_once "../../php/common/config.php";
require_once 'functions/boardfunctions.php';
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>

  <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Meeting</title>
        <meta name="description" content="Buttons examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:500,500,600,700,800|Roboto:600,600,700,700,800">        <!--end::Fonts -->

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

   <script src="js/compliance/clauseManagement.js"></script>
    <script src="js/audit/auditClauseManagement.js"></script>
  
  
                    
   <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
           
        <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
    </head>
    
   <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #BCBFBC;">

       
    
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
<div class="kt-header-mobile__logo">
<a href="demo3/index.html">
<img alt="Logo" src="./assets/media/logos/logo-2-sm.png"/>
</a>
</div>
<div class="kt-header-mobile__toolbar">
<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>

<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
</div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>


<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " >
<!-- begin: Header Menu -->

<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-tab "  >

</div>
</div>
<!-- end: Header Menu -->   <!-- begin:: Header Topbar -->
<div class="kt-header__topbar">

   <div class="kt-header__topbar-item dropdown">
       <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
           <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
           <span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span>
       </div>
       <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">

       </div>
   </div>
<!--end: Notifications -->

<!--begin: Quick Actions -->
   

<div class="kt-header__topbar-item kt-header__topbar-item--langs">
   <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
       <span class="kt-header__topbar-icon">
<img class="" src="./assets/media/flags/012-uk.svg" alt="" />
</span>
   </div>
   <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
       <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
    <li class="kt-nav__item kt-nav__item--active">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="./assets/media/flags/020-flag.svg" alt="" /></span>
            <span class="kt-nav__link-text">English</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="./assets/media/flags/016-spain.svg" alt="" /></span>
            <span class="kt-nav__link-text">Spanish</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="./assets/media/flags/017-germany.svg" alt="" /></span>
            <span class="kt-nav__link-text">German</span>
        </a>
    </li>
</ul>      </div>
</div>
<div class="kt-header__topbar-item kt-header__topbar-item--langs">
   <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
     <span class="kt-header__topbar-icon" title="logout" onclick="logout();">
 <img src="./assets/media/icons/logout.svg" alt="" />
</span>
   </div>
</div>

</div>
<!-- end:: Header Topbar -->
</div>
</div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="row">
<div class="col-md-9" style="margin-left: 300px;margin-top: 100px;">
<!--begin::Portlet-->
<div class="kt-portlet">
<div class="kt-portlet__head" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<h3 class="kt-portlet__head-title" style="color: white;font-size: 20px;">
PUBLISH
</h3>
</div>
</div>

<div class="kt-portlet__body">
    
       
            <?php
$var=$_GET['userid'];
    $sql = "SELECT * from boardagenda as ba,boardminutes as bm,boardindex as bi WHERE ba.m_no=bm.m_no AND bm.m_no=bi.m_no AND ba.m_no=$var limit 1";
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
{
$m_no = $row['m_no']; 
  
?>
   
  
       <div class="kt-portlet" style="border:1px solid #BCBFBC  ;">
<div class="kt-portlet__head" style="background-color:#DBDEDB">
<div class="kt-portlet__head-label">
<h3 class="kt-portlet__head-title" style="color: black;">
TOR
</h3>
</div>
</div>
                      <div class="row">
                             <!-- <div class="col-md-12" > -->
 <div class="col-md-6" >
  <div class="form-group" >
  <label style="font-size: 15px;">Meeting Title</label><br>
 <input type="hidden" name="m_no" value="<?php echo $row['m_no'];?>">
 <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>" style="border: 1px solid #b2abab;" disabled>
</div>          
  </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label><br>
                               <input type="Date" class="form-control" id="date" name="date" value="<?php echo $row['date'];?>" style="border: 1px solid #b2abab;" disabled> 
                            </div>          
                            </div>  
                             </div>
         
        
                      <div class="row">
                      <div class="col-md-4">
                        <label for="usr">Purpose:</label>
                        <input type="text" class="form-control" value="<?php echo $row['purpose'];?>" style="border: 1px solid #b2abab;" disabled>
            </div>
             <div class="col-md-4">
                        <label for="usr">Responibities:</label>
                        <input class="form-control" value="<?php echo $row['responsibities'];?>" style="border: 1px solid #b2abab;" disabled> 
            </div>
             <div class="col-md-4">
                        <label for="usr">Output:</label>
                        <input class="form-control" value="<?php echo $row['output'];?>" style="border: 1px solid #b2abab;" disabled> 
            </div>
          </div>
          <div class="row">
             <div class="col-md-4">
                          <div class="form-group" id="user">
                            <div class="form-group">
        <label for="multi-append" class="control-label" style="font-size: 13px;">Members</label>        
       <div class="input-group select2-bootstrap-append col-md-12">
            
            <?php $array = explode(',',$row['user']);?>
            <input type="text" class="form-control" value=
            "<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . ", ";
            }
            ?>"
           style="border: 1px solid #b2abab;" disabled>
        </div>
        </div>
                          </div>
                        </div>
             <div class="col-md-4">
                          <div class="form-group" id="user">
                            <label>Admin</label>
                                                        
                            <?php $array = explode(',',$row['admin']);?>
            <input type="text" class="form-control" value=
            "<?php
            foreach ($array as $member){
              $membername=getadminnamefromid($member);
              echo $membername . ", ";
            }
            ?>"
           style="border: 1px solid #b2abab;" disabled>

                          </div>
                        </div>
                      </div>
                 </div>
               </div>
                  <div class="kt-portlet" style="border:1px solid #BCBFBC  ;">
<div class="kt-portlet__head" style="background-color:#DBDEDB">
<div class="kt-portlet__head-label">
<h3 class="kt-portlet__head-title" style="color: black;">
Publish
</h3>
</div>
</div>
                                 
                      <div class="container">  
                      <div class="table-responsive">        
        <table class="table table-striped- table-bordered table-hover table-checkable" style="border:1px solid black;">
            <thead>
                <tr style="border:1px solid black;">
                    <th style="border:1px solid black;">Agenda</th> 
                    <th style="border:1px solid black;">Synopsis</th>
                    <th style="border:1px solid black;">Author</th>                       
                    <th style="border:1px solid black;width:300px;">Action Item</th>
                    <th style="border:1px solid black;">Owner</th>
                    <th style="border:1px solid black;">Deadline</th>
                    <th style="border:1px solid black;width: 17%;">Status</th>
                </tr>
            </thead>
            <tbody>
              <tr style="border:1px solid black;">
                <!-- <td style="border:1px solid black;"><?php $array = explode(',',$row['user']);?>
            <input type="text" class="form-control" value="<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " ";
            }
            ?>"
            disabled></td> -->
              <td style="border:1px solid black;"><input type="text" class="form-control" id="agenda" name="agenda" value="<?php echo $row['topic'];?>" disabled></td> 
                    <td style="border:1px solid black;"><input type="text" class="form-control" id="synopsis" name="synopsis" value="<?php echo $row['synopsis'];?>" disabled></td> 
                    <td style="border:1px solid black;"><?php $array = explode(',',$row['user']);?>
                      <input type="text" class="form-control" value="<?php
                      foreach ($array as $member){
                        $membername=getusernamefromid($member);
                        echo $membername . " ";
                      }
                      ?>"
                      disabled></td>                      
                    <td style="border:1px solid black;"><input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['action_item'];?>" disabled></td>
                    <td style="border:1px solid black;"><?php $array = explode(',',$row['owner']);?>
            <input type="text" class="form-control" value="<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " "; } ?>" disabled></td>
                    <td style="border:1px solid black;"><input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['deadline'];?>" disabled></td> 
                   <!--  <td style="border:1px solid black;"><button type="submit" class="btn btn-success">Close</button> -->
                      <!-- <button type="submit" class="btn btn-success">Postpone</button>
                      <button type="submit" class="btn btn-success">Not Possible</button></td> -->
                    <td style="border:1px solid black;"><select>
                      <option value="1" class="form-control" active>Open</option>
                      <option value="2" class="form-control">Close</option>
                    <option value="3" class="form-control">Postpone</option>
                  <option value="4" class="form-control">Not possible</option></select>
                  <a href="view/board/boardedit.php?userid=<?php echo $row['m_no']; ?>" target="_new"> <button class="btn btn-primary" style="background:#992065;width:10px;height:30px;margin-left: 10px;"><span class="glyphicon glyphicon-edit" style="margin-left: -7px;"></span></button></a><a href="view/board/index.php?userid=<?php echo $row['m_no']; ?>"><button class="btn btn-primary" style="background:#294BC9;width:10px;height:30px;margin-left: 10px;"><span class="glyphicon glyphicon-inbox" style="margin-left: -10px;"></span></button></a></td> 
                    
              </tr>
              <tr style="border:1px solid black;">
                <tr style="border:1px solid black;">
               <!--  <th><label>Artifacts</label>
                  <i class="fa fa-paperclip" type="file" name="files" title="Load File" aria-hidden="true" style="color: #337ab7; font-size: 25px; margin-top: 20px;"></i></th> -->
           
                  <td style="border:1px solid black;"><label>Artifacts</label><br>
                  <a href="view/board/boarduploads/<?php echo $row['attachment']; ?>" download><?php echo $row['attachment']; ?></a></td>
                  <td style="border:1px solid black;"><label>Comment:</label><input type="text" value="<?php echo $row['comment']; ?>"></textarea></td>
                  <td style="border:1px solid black;"><lable>Author</lable><?php $array = explode(',',$row['user']);?>
            <input type="text" class="form-control" value="<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " ";
            }
            ?>"
            disabled></td>
                  <td style="border:1px solid black;">
                  <label>Action Items</label>
                  <input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['action_item'];?>" disabled></td>

                    
                    <td style="border:1px solid black;"><label>Owner</label><?php $array = explode(',',$row['owner']);?>
            <input type="text" class="form-control" value="<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " "; } ?>" disabled></td>
                    <td style="border:1px solid black;"><label>Deadline</label><input type="text" class="form-control" id="Action_Items" name="Action_Items" value="<?php echo $row['deadline'];?>" disabled></td>
                        
                   <!--  <td style="border:1px solid black;"><button type="submit" class="btn btn-success">Close</button> -->

                    <td style="border:1px solid black;"><select>
                      <option value="1">Open</option>
                      <option value="2">Close</option>
                    <option value="3">Postpone</option>
                  <option value="4">Not possible</option></select>
                  <a href="view/board/boardedit.php?userid=<?php echo $row['m_no']; ?>"> <button type="button"class="btn btn-primary" data style="background:#992065;width:10px;height:30px;margin-left: 10px;"><span class="glyphicon glyphicon-edit" style="margin-left: -7px;"></span></button></a><a href="view/board/index.php?userid=<?php echo $row['m_no']; ?>"><button class="btn btn-primary" style="background:#294BC9;width:10px;height:30px;margin-left: 12px;"><span class="glyphicon glyphicon-inbox" style="margin-left: -10px;"></span></button></a></td>  
                 

                
                     
          </tr>
        </tr>
      </tbody>
    </table>
 </div>
 </div>

    <?php
    if($_POST['Approve'])
    {
      boardpublish();
    }
?> 
 <form action="" method="POST">

     
   <div class="row">
                    <div class="container">
                    <div class="col-md-12">
                      <label>Summary</label>
                      <input type="hidden" value="<?php echo $row['m_no'];?>">
                      <textarea class="form-control" name="summary" style="border:1px solid black;width: 95%;" id="summary" required></textarea>
                    </div>
                 </div>
               </div><br />

        

   <div class="kt-portlet__foot" style="float: right;">
                      <div class="kt-form__actions">
<input type="submit" class="btn btn-success" name="Approve" value="Approve">
  


  <button type="button" class="btn btn-info" style="background-color: #1CA08A;" data-toggle="modal" data-target="#exampleModal" >Return
</button>
</div>
</div>

 <?php
    if($_POST['save'])
    {
      boardtopic();
    }
?> 

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason for Returning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="title" name="m_no" value="<?php echo $m_no;?>">
       <input type="text" name="topic" class="form-control" placeholder="Type topics here....">
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
       <!--  <button type="submit" class="btn btn-success" value="save" name="save"><a href="view/board/voteall.php?userid=<?php echo $row['m_no'];?>">Save</a></button> -->
       <input type="submit" name="save" class="btn tbn-success">
      </div>
    </div>
  </div>
</div>
   
 </form>


  <?php } } else { echo "0 results"; } ?>                
  </div>
</div>
</div>
</div>
</div>
</body>
</body>
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
          <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script> 
      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
   <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                
<script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
         <script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>  
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>         
            </body>
    <!-- end::Body -->
</html>


<script>
        var allClauses=<?php echo json_encode($GLOBALS['allClausesArray'])?>;
        

    </script> 
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
</html>
</html>
