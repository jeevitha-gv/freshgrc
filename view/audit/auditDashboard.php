<?php require_once __DIR__.'/../header.php';
$complianceWiseStatusGraph=false;
require_once __DIR__.'/../../php/common/dashboard.php';
$manager=new dashboard();
$noOfAudits=$manager->noOfAudits($_SESSION['company']);
$noOfAuditsPublished=$manager->noOfAuditsPublished($_SESSION['company']);
$noOfAuditsDue=$manager->noOfAuditsDue($_SESSION['company']);
$noOfAuditsDueauditee=$manager->noOfAuditsDueauditee($_SESSION['company']);
$noOfAuditsDelayed=$manager->noOfAuditsDelayed($_SESSION['company']);
$noOfAuditsDelayedauditee=$manager->noOfAuditsDelayedauditee($_SESSION['company']);   
?>
<!DOCTYPE html>
<html>

<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AuditDashboard</title>
  <base href="/freshgrc/">
  <script src="https://code.highcharts.com/highcharts.js"></script> 
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
  <script src="https://www.amcharts.com/lib/3/pie.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
  <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>      
  <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css" />    
  <script src="js/audit/auditManagement.js"></script> 
  <script src="js/audit/auditByCompliance.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/treemap.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
                    
   <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="assets/media/logos/fixnix.png"/>

  </head>

    <style>


    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

/* Style the close button */
.topright {
    float: right;
    cursor: pointer;
    font-size: 28px;
}

.topright:hover {color: red;}
    .highcharts-credits{
      visibility: hidden;
    }
    .jqstooltip { 
      position: absolute;
      left: 0px;
      top: 0px;
      visibility: hidden;
      background: rgb(0, 0, 0) transparent;
      background-color: rgba(0,0,0,0.6);
      filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;
    }
     .jqsfield { 
        color: white;
        font: 10px arial, san serif;
        text-align: left;
      }
      .desc {
        padding-top: 25px;
      }
      #chartdiv1 {
        background-color: white;
       height: 350px;     
      }
      #chartdiv2 {
        height: 350px;
        background-color: white;
      }
      #chartdiv3{
        background-color: white;
        height: 620px;      
      }
       #chart_4 {
        height: 620px;
        background-color: white;
      }
      #chart_7
      {
        height: 620px;
        background-color: white; 
      }      
      #chartdiv1 a, #chartdiv2 a, #chartdiv3 a, #chart_4 a{
      position: absolute;
      text-decoration: none;
      color: rgb(0, 0, 0);
      font-family: Verdana;
      font-size: 11px;
      opacity: 0.7;
      display: none !important;
      left: 5px;
      top: 5px;    
    }
    
      </style>
     <?php 
       include '../siteHeader.php';
     ?>
       <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"style="margin-top:-2%;">
       <div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
  <div class="col-md-12">   
              <a href="view/audit/auditConfigurableDashboard.php"  style="float: right;"><button type="button" class="btn btn-success">Dashboard Configuration</button></a>        
            </div> 
          </div><br>
<div class="row">
<div class="col-md-6">
                                    <!--begin:: Widgets/Activity-->
                                    <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                                        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">
                                                    Activity
                                                </h3>
                                            </div>
                                            <div class="kt-portlet__head-toolbar">
                                                <a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
                                                   Audit
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="kt-portlet__body kt-portlet__body--fit">
                                            <div class="kt-widget17">
                                                <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                                                    <div class="kt-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                        <canvas id="kt_chart_activities" width="914" height="448" class="chartjs-render-monitor" style="display: block; width: 457px; height: 224px;"></canvas>
                                                    </div>
                                                </div>
                                                <div class="kt-widget17__stats">
                                                    <div class="kt-widget17__items">
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"></path>
                                                                        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                                    </g>
                                                                </svg> </span>
                                                                <a href="view/audit/auditlist.php">
                                                            <span class="kt-widget17__subtitle">
                                                                NO OF AUDIT
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                             <?php echo $noOfAudits[0]['count'] ?>
                                                            </span></a>
                                                        </div>
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                                                    </g>
                                                                </svg> </span>
                                                                <a href="view/audit/auditPublished.php">
                                                            <span class="kt-widget17__subtitle">
                                                                PUBLISHED
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                              <?php echo $noOfAuditsPublished[0]['count'] ?>
                                                            </span></a>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget17__items">
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                                        <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                                        <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" id="Combined-Shape" fill="#000000"></path>
                                                                    </g>
                                                                </svg> </span>
                                                                <a href="view/audit/auditduelist.php">
                                                            <span class="kt-widget17__subtitle">
                                                                DUE
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                              <?php echo $noOfAuditsdue[0]['count'] ?>
                                                            </span>
                                                          </a>
                                   
                                                            </span>
                                                        </div>
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"></path>
                                                                    </g>
                                                                </svg> </span>
                                                                <a href="view/audit/auditdelayedlist.php">
                                                            <span class="kt-widget17__subtitle">
                                                                DELAYED
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                            </span></a>
                                                              <div class="number"> 
                      <?php if($_SESSION['user_role']=='auditor'){ ?>  
                      <span data-counter="counterup" data-value="<?php echo $noOfAuditsDelayed[0]['count'] ?>"><?php echo $noOfAuditsDelayed[0]['count'] ?></span>
                    <?php }?>
                    <?php if($_SESSION['user_role']=='auditee'){ ?>  
                      <span data-counter="counterup" data-value="<?php echo $noOfAuditsDelayedauditee[0]['count'] ?>"><?php echo $noOfAuditsDelayedauditee[0]['count'] ?></span>
                    <?php }?></div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Activity-->
                                
                                </div>

    <div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
       Audit Frequency
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv1" style="display: block;height: 350px;">
</div>
<div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
<div class="kt-widget4__item">
</div>
</div>  
</div>
</div>
</div>
</div>
</div>
</div>
<!--END ROW -->
<div class="row">
  <div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
      STATUS
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv2" style="display: block;height: 350px;">
</div>
<div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
<div class="kt-widget4__item">
</div>
</div>  
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
       COMPLIANCE
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv3" style="display: block;height: 350px;">
</div>
<div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
<div class="kt-widget4__item">
</div>
</div>  
</div>
</div>
</div>
</div>
</div>
  </div>
<!--END-->
<div class="row">
  <div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
   OVERALL REPORT
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="col-lg-6 col-xs-12 col-sm-6">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Overall Report</span>  
                    </div>

                  </div>
                 
                  <div class="portlet-body">
                  <div class="modal-body" >
                                
                                <button class="tablinks" onclick="openCity(event, 'Month-wise')">Month-wise</button>
                                <button class="tablinks" onclick="openCity(event, 'Department-wise')">Department-wise</button>
                                <button class="tablinks" onclick="openCity(event, 'Location-wise')">Location-wise</button>
                              <div class="row" style="margin-left: -10px;">  
                                <div id="Month-wise" class="tabcontent">
                                  <div id="chartdivMonth" class="display-none" style="display: block;">                   
                                   </div>
                                </div>

                                <div id="Department-wise" class="tabcontent">
                                  <div id="chartdivDepartment" class="display-none" style="display: block; " >                   
                                  </div>
                                </div>

                                <div id="Location-wise" class="tabcontent">
                                  <div id="chartdivLocation" class="display-none" style="display: block;">                   
                                  </div> </div> </div>
                                </div>
                              
                            </div>
                  <!-- <div class="tab">
  <button class="tablinks" id="default" onclick="openCity(event, 'Month-wise')">Month-wise</button>
  <button class="tablinks" onclick="openCity(event, 'Department-wise')">Department-wise</button>
  <button class="tablinks"onclick="openCity(event, 'Location-wise')">Location-wise</button>
</div>

 -->

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
/*    evt.currentTarget.className += " active";
*/
    /*document.getElementById("defaultOpen").click();*/
}
</script>                
                    
                    <input type="hidden" id="company" value="<?php echo $_SESSION['company'] ?>">                                  
                  </div>
                </div> 
<div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
<div class="kt-widget4__item">
</div>
</div>  
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
      PENDING AUDIT FOR THE WEEK
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div id="chart_5" class="display-none" style="display: block;height: 350px;"></div>
<div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
<div class="kt-widget4__item">
</div>
</div>  
</div>
</div>
</div>
</div>
</div>
  </div>
  <!--end-->
  <div class="row">
  <div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
     AUDITS BEYOND DUE DATE
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chart_6" class="display-none" style="display: block;height: 350px;">
</div>
<div class="kt-widget4__items kt-widget4__items--bottom kt-portlet__space-x kt-margin-b-20">
<div class="kt-widget4__item">
</div>
</div>  
</div>
</div>
</div>
</div>
</div>

  </div>
  <!--end-->
  
</div>
</div>
</div>
</div>
</div>

        <script type="text/javascript">
          
          function myFunction() {
             //location.href = "/freshgrc/view/audit/auditCreateAdmin.php";
          }
          var modalDetails={'company':$('#company').val()};
          $(document).ready( function() {
           
            
           $("#default").click();
            $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditfrequencydash.php",
              data:modalDetails,
              success: auditfrequency
            }); 
            $.ajax({
            dataType: "json",
            url: "php/audit/manageAuditDashboard.php",
            data: "",
            success: riskstatus
          });
            $.ajax({
            dataType: "json",
            url: "php/audit/delayedAudits.php",
            data: "",
            success: auditSeverity
          });
            $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/statuspie.php",
              data:modalDetails,
              success: statuspie
            }); 
             $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/compliancepie.php",
              data:modalDetails,
              success: compliancepie
            });
            $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/audit/auditLocationGraph.php",
              data:modalDetails,
              success:auditLocation
            });
            $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/audit/auditDepartmentGraph.php",
              data:modalDetails,
              success:auditDepartment
            });
            $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/audit/auditMonthChart.php",
              data:modalDetails,
              success:auditMonth
            });
            $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/audit/ganttchartdata.php",
              data:modalDetails,
              success:ganttchart
            });
 });
          
function auditfrequency(data){
var measures=Object.keys(data);
var seriesData=[];
var chartData=[];
var s=[];
for(i=0;i<measures.length;i++)
     {
    chartData.push({"name":measures[i],"y":parseInt(data[measures[i]].length),"drilldown":measures[i]});
      } 
   for(i=0;i<measures.length;i++){
for(j=0;j<data[measures[i]].length;j++){ 

   seriesData.push({"name":data[measures[i]][j].title,"y":data[measures[i]][j].count});
      } 
      s.push({"name":measures[i],"id":measures[i],"data":seriesData});
  seriesData=[];
}
Highcharts.chart('chartdiv1', { 
 chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'   
    },
    credits:{
      enabled:false
    },
title: {
        text: ''
    },
  
 tooltip: {
        pointFormat: '{name}<b>{point.percentage:.1f}%</b>'
    },
plotOptions: {
        pie: {

            allowPointSelect: false,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b><span style="text-transform:capitalize;">{point.name}</span></b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },


    "series": [{
        'name':'name',
        'colorByPoint': true,
        'data':chartData,
        'drilldown':"name"
    }],
     "drilldown": {
    "series": s,
}
});
} 

            function riskstatus(data) {
               dataHigh=data.high;
               dataLow=data.low;
               dataMed=data.medium;
               datHigh=[];
               datLow=[];
               datMed=[];
              //console.log(data);
               datHighAuditClause=[];
               tempArray=[];
               seriesData=[];
   
               for(var i =0;i<dataHigh.length;i++){
                  datHigh.push({"name":dataHigh[i].title,"y":dataHigh[i].count,"drilldown":dataHigh[i].title+"high"});
                  for(var j=0;j<dataHigh[i].count;j++)
                    {
                        //console.log(dataHigh[i].auditClause[j].name);
                        tempArray[j]=[dataHigh[i].auditClause[j].name,1];
                        
                    }
                    datHighAuditClause.push(tempArray);
                    seriesData.push({"name":dataHigh[i].title,"id":dataHigh[i].title+"high","data":tempArray});
                    tempArray=[];
               }
               for(var i =0;i<dataMed.length;i++){
                  datMed.push({"name":dataMed[i].title,"y":dataMed[i].count,"drilldown":dataMed[i].title+"med"});
                   for(var j=0;j<dataMed[i].count;j++)
                    {
                        //console.log(dataHigh[i].auditClause[j].name);
                        tempArray[j]=[dataMed[i].auditClause[j].name,1];
                        
                    }
                  seriesData.push({"name":dataMed[i].title,"id":dataMed[i].title+"med","data":tempArray});
               }
               for(var i =0;i<dataLow.length;i++){
                  datLow.push({"name":dataLow[i].title,"y":dataLow[i].count,"drilldown":dataLow[i].title+"low"});
                  for(var j=0;j<dataLow[i].count;j++)
                    {
                        //console.log(dataHigh[i].auditClause[j].name);
                        tempArray[j]=[dataLow[i].auditClause[j].name,1];
                        
                    }
                  seriesData.push({"name":dataLow[i].title,"id":dataLow[i].title+"low","data":tempArray});
               }
               seriesDat=[{
                "name": "P1(Low Priority)",
                "id": "Low",
                "data": datLow
            },
            {
                "name": "P2(Medium Priority)",
                "id": "Medium",
                "data": datMed
            },
            {
                "name": "P3(High Priority)",
                "id": "High",
                "data": datHigh
            }];
   /*seriesData[0].data=datLow;
   seriesData[1].data=datMed;
   seriesData[2].data=datHigh;*/
  
// Create the chart
for(i=0;i<seriesData.length;i++){
  seriesDat.push(seriesData[i]);
}
//console.log(datMed);
Highcharts.chart('chart_5', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Audits To be completed in this week'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Audits/Audit Clauses<br/>'
    },

    "series": [
        {
            "name": "Audits",
            "colorByPoint": true,
            "data": [
                {
                    "name": "P1(Low Priority)",
                    "y":dataLow.length,
                    "drilldown": "Low",
                    "color":"green"
                },
                {
                    "name": "P2(Medium Priority)",
                    "y":dataMed.length,
                    "drilldown": "Medium",
                    "color":"#f3b358"
                },
                {
                    "name": "P3(High Priority)",
                    "y": dataHigh.length,
                    "drilldown": "High",
                    "color":"#ea7074"
                }
            ]
        }
    ],
    "drilldown": {
        "series":seriesDat,


    }
});

    }
    function auditSeverity(data) {
      //console.log(data);
   dataHigh=data.high;
   dataLow=data.low;
   dataMed=data.medium;
   datHigh=[];
   datLow=[];
   datMed=[];

   datHighAuditClause=[];
   tempArray=[];
   seriesData=[];
   
   for(var i =0;i<dataHigh.length;i++){
      datHigh.push({"name":dataHigh[i].title,"y":dataHigh[i].count,"drilldown":dataHigh[i].title});
      for(var j=0;j<dataHigh[i].count;j++)
        {
          if(dataHigh[i].auditClause[j].name!=null)
          {         
            tempArray[j]=[dataHigh[i].auditClause[j].name,1];
          }
            
        }
        datHighAuditClause.push(tempArray);
        seriesData.push({"name":dataHigh[i].title,"id":dataHigh[i].title,"data":tempArray});
        tempArray=[];
   }

  /*"name": "Low",
    "y":dataLow.length,
    "drilldown": "Low"*/
    /*"name": "Low",
      "id": "Low",
      "data": datLow*/


   for(var i =0;i<dataMed.length;i++){
      datMed.push({"name":dataMed[i].title,"y":dataMed[i].count,"drilldown":dataMed[i].title});
       for(var j=0;j<dataMed[i].count;j++)
        {
            if(dataMed[i].auditClause[j].name!=null)
            { 
            tempArray[j]=[dataMed[i].auditClause[j].name,1];
            }
        }
      seriesData.push({"name":dataMed[i].title,"id":dataMed[i].title,"data":tempArray});
   }
   for(var i =0;i<dataLow.length;i++){
      datLow.push({"name":dataLow[i].title,"y":dataLow[i].count,"drilldown":dataLow[i].title});
      for(var j=0;j<dataLow[i].count;j++)
        {
            if(dataLow[i].auditClause[j].name)
            {
            tempArray[j]=[dataLow[i].auditClause[j].name,1];
            }
        }
      seriesData.push({"name":dataLow[i].title,"id":dataLow[i].title,"data":tempArray});
   }
   seriesDat=[{
                "name": "Low",
                "id": "Low",
                "data": datLow
            },
            {
                "name": "Medium",
                "id": "Medium",
                "data": datMed
            },
            {
                "name": "High",
                "id": "High",
                "data": datHigh
            }];
   /*seriesData[0].data=datLow;
   seriesData[1].data=datMed;
   seriesData[2].data=datHigh;*/
  
// Create the chart
for(i=0;i<seriesData.length;i++){
  seriesDat.push(seriesData[i]);
}
//console.log(datMed);
Highcharts.chart('chart_6', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Audits To be completed in next week'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Audits/Audit Clauses<br/>'
    },

    "series": [
        {
            "name": "Audits",
            "colorByPoint": true,
            "data": [
                {
                    "name": "Low",
                    "y":dataLow.length,
                    "drilldown": "Low"
                },
                {
                    "name": "Medium",
                    "y":dataMed.length,
                    "drilldown": "Medium"
                },
                {
                    "name": "High",
                    "y": dataHigh.length,
                    "drilldown": "High"
                }
            ]
        }
    ],
    "drilldown": {
        "series":seriesDat,


    }
});

    }

function statuspie(data){
var measures=Object.keys(data);
var seriesData=[];
var chartData=[];
var b=[];
for(i=0;i<measures.length;i++)
     {
    chartData.push({"name":measures[i],"y":parseInt(data[measures[i]].length),"drilldown":measures[i]});
      } 
   for(i=0;i<measures.length;i++){
for(j=0;j<data[measures[i]].length;j++){ 

   seriesData.push({"name":data[measures[i]][j].title,"y":data[measures[i]][j].count});
      } 
      b.push({"name":measures[i],"id":measures[i],"data":seriesData});
  seriesData=[];
}
Highcharts.chart('chartdiv2', { 
 chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'   
    },
    credits:{
      enabled:false
    },
title: {
        text: ''
    },
  
 tooltip: {
        pointFormat: '{name}<b>{point.percentage:.1f}%</b>'
    },
plotOptions: {
        pie: {

            allowPointSelect: false,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b><span style="text-transform:capitalize;">{point.name}</span></b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },


    "series": [{
        'name':'name',
        'colorByPoint': true,
        'data':chartData,
        'drilldown':"name"
    }],
     "drilldown": {
    "series": b,
}
});
} 


function compliancepie(data){

  var chart = AmCharts.makeChart("chartdiv3", {
    "theme": "light",
    "type": "serial",
    "titles": [ {
    "text": "",
    "size": 16
  } ],
    "dataProvider":data,
    /*"valueAxes": [{
        "stackType": "3d",
        "unit": "%",
        "position": "left",
        "title": ""
    }],*/
    "startDuration": 1,
    "graphs": [{
        "balloonText": " [[category]]: <b>[[value]]</b>",
        "fillAlphas": 2,
        "lineAlpha": 0.3,
        "type": "column",
        "valueField": "count"
    
    }],
    "plotAreaFillAlphas": 0.1,
    "depth3D": 20,
    "angle": 40,
    "categoryField": "name",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation":40
    },
    
});
jQuery('.chart-input').off().on('input change',function() {
  var property  = jQuery(this).data('property');
  var target    = chart;
  chart.startDuration = 0;

  if ( property == 'topRadius') {
    target = chart.graphs[0];
        if ( this.value == 0 ) {
          this.value = name;
        }
  }

  target[property] = this.value;
  chart.validateNow();
});
}




          function auditLocation(data){
            var locations=Object.keys(data);
            var chartData=new Array();
            var seriesData=new Array();            
            for(i=0;i<locations.length;i++){
              chartData[i]={name:locations[i],y:data[locations[i]].length,drilldown:locations[i]};
              seriesData[i]={name:locations[i],id:locations[i]};
              seriesData[i].data=new Array();
              for(j=0;j<data[locations[i]].length;j++){
                if(data[locations[i]][j].status=="create"){
                  data[locations[i]][j].status="Created";
                }
                seriesData[i].data[j]=[data[locations[i]][j].title+" is "+data[locations[i]][j].status,1];  
              }
              
              
                
                
            }
                      Highcharts.chart('chartdivLocation', {
              chart: {
                  type: 'pie'
              },
              title: {
                  text: 'Location-wise Audit Status'
              },
              subtitle: {
                  text: 'Click the slices to view Audits Location Wise '
              },
              plotOptions: {
                  series: {
                      dataLabels: {
                          enabled: true,
                          format: '{point.name}: {point.y:.0f}'
                      }
                  }
              },

              tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Audits/Audit Clauses<br/>'
              },

              "series":[
              {
                     "name": "Location",
                     "colorByPoint": true,
                     "data":chartData
              }
              ],
              "drilldown": {
                  "series":seriesData,


              }
          });
            
          }
          function auditDepartment(data){
            var departments=Object.keys(data);
            var chartData=new Array();
            var seriesData=new Array();            
            for(i=0;i<departments.length;i++){
              chartData[i]={name:departments[i],y:data[departments[i]].length,drilldown:departments[i]};
              seriesData[i]={name:departments[i],id:departments[i]};
              seriesData[i].data=new Array();
              for(j=0;j<data[departments[i]].length;j++){
                if(data[departments[i]][j].status=="create"){
                  data[departments[i]][j].status="Created";
                }
                seriesData[i].data[j]=[data[departments[i]][j].title+" is "+data[departments[i]][j].status,1];  
              }
              
              
                
                
            }
                      Highcharts.chart('chartdivDepartment', {
              chart: {
                  type: 'pie'
              },
              title: {
                  text: 'Department-wise Audit Status'
              },
              subtitle: {
                  text: 'Click the slices to view Audit Statuses under each departments'
              },
              plotOptions: {
                  series: {
                      dataLabels: {
                          enabled: true,
                          format: '{point.name}: {point.y:.0f}'
                      }
                  }
              },

              tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Audits/Audit Clauses<br/>'
              },

              "series":[
              {
                     "name": "Department",
                     "colorByPoint": true,
                     "data":chartData
              }
              ],
              "drilldown": {
                  "series":seriesData,


              }
          });
          }
          function auditMonth(data){
            var departments=Object.keys(data);
            var chartData=new Array();
            var seriesData=new Array();            
            for(i=0;i<departments.length;i++){
              chartData[i]={name:departments[i],y:data[departments[i]].length,drilldown:departments[i]};
              seriesData[i]={name:departments[i],id:departments[i]};
              seriesData[i].data=new Array();
              for(j=0;j<data[departments[i]].length;j++){
                if(data[departments[i]][j].status=="create"){
                  data[departments[i]][j].status="Created";
                }
                seriesData[i].data[j]=[data[departments[i]][j].title+" is "+data[departments[i]][j].status,1];  
              }
              
              
                
                
            }
                      Highcharts.chart('chartdivMonth', {
              chart: {
                  type: 'pie'
              },
              title: {
                  text: 'Month-wise Audit Status'
              },
              subtitle: {
                  text: 'Click the slices to view Audit Statuses under each Month'
              },
              plotOptions: {
                  series: {
                      dataLabels: {
                          enabled: true,
                          format: '{point.name}: {point.y:.0f}'
                      }
                  }
              },

              tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Audits/Audit Clauses<br/>'
              },

              "series":[
              {
                     "name": "Months",
                     "colorByPoint": true,
                     "data":chartData
              }
              ],
              "drilldown": {
                  "series":seriesData,


              }
          });
          }
function ganttchart(data){
   // console.log(data);
  var category=[];
  var process1=[];
  var task=[];
 for(i=0;i<data.length;i++)
     {
    category.push({"label":data[i].startmonth,"start":data[i].start_date,"end":data[i].end_date});
     } 
 for(j=0;j<data.length;j++)
     {
    process1.push({"label":data[j].title});
     } 
     console.log(process1);
 for(k=0;k<data.length;k++)
     {
    task.push({"start":data[k].start_date,"end":data[k].end_date});
     } 
FusionCharts.ready(function() {
  var socialMediaPlan = new FusionCharts({
    type: 'gantt',
    renderAt: 'chart_7',
    width: '1250',
    height: '500',
    dataFormat: 'json',
    creditLabel:false,
    dataSource: {
      "chart": {
        // "palettecolors":"5d62b5,29c3be,f2726f",
        // "bgColor": "#FFFFFF",
        // "taskBarFillMix": "#0091AC",
        // "borderColor": "#666666",
        // "dateformat": "yyyy/mm/dd",
        // "caption": "",
        // "subcaption": "",
        // "theme": "fusion",
        // "canvasBorderAlpha": "40"
         "bgColor": "#FFFFFF",
        "taskBarFillMix": "#0091AC",
        "borderColor": "#666666",
        "dateformat": "mm/dd/yyyy",
        "theme": "fusion",
        "scrollShowButtons": "",
        "canvasBorderAlpha": "40",
        "ganttPaneDuration": "1",
        "ganttPaneDurationUnit": "m",
        "scrollColor": "#FFFFFF",
      },
      "categories": [{
         "category":category
       }],
      "processes": {
         "fontsize": "12",
         "isbold": "1",
        "align": "right",
         "process": process1
       },
       "tasks": {
         "task": task
       }

    }
  }).render();
});
} 

function getRiskList(status){
  if (status == 'all') {
    window.location="/freshgrc/view/audit/auditlist.php";
  }
  else if (status == 'create') {
    window.location="/freshgrc/view/audit/auditPublished.php";
  }
  else if(status == 'due'){
    window.location="/freshgrc/view/audit/auditduelist.php";
  }
  else if (status == 'delayed') {
    window.location="/freshgrc/view/audit/auditdelayedlist.php";
  }

}
</script> 

      </body>
    
</html>
 <?php 
       
        include 'sidemenu.php';
      ?>