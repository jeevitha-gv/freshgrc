<?php require_once __DIR__.'/../header.php';
$complianceWiseStatusGraph=false;
require_once '../../php/common/dashboard.php';
$manager=new dashboard();
 $totalRisks=$manager->getTotalNoOfRisks();
 $totalCreatedRisks=$manager->getNoOfCreatedRisk();
 $totalMitigatedRisks=$manager->getNoOfMitigatedRisk();
 $totalReviewedRisks=$manager->getNoOfReviewedRisk();

?>
<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RiskDashboard</title>
    <base href="/freshgrc/">
     <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
     <script src="https://code.highcharts.com/modules/heatmap.js"></script>
     <script src="https://code.highcharts.com/modules/treemap.js"></script>
     <script src="https://code.highcharts.com/modules/data.js"></script>
     <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>      
    <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css" />    
      <script src="https://cdn.anychart.com/releases/8.1.0/js/anychart-base.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.1.0/js/anychart-ui.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.1.0/js/anychart-exports.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.1.0/js/anychart-heatmap.min.js"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

  </head>

     <style>
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
        height: 345px;      
      }
      #chartdiv2 {
        height: 344px;
        background-color: white;
      }
      #chartdiv3{
        background-color: white;
        height: 485px;      
      }
       #chartdiv4 {
        height: 485px;
        background-color: white;
      }
       #chartdiv5{
        background-color: white;
        height: 345px;      
      }
      #chartdiv6{
        height: 345px;
      }
      #chartdiv1 a, #chartdiv2 a, #chartdiv3 a, #chartdiv4 a, #chartdiv5 a{
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
  #notify{
      width: 50px;
      height: 50px;
      float: left;
      margin-right: 130px;"
    }
  
      </style>
     
<?php 
   include '../siteHeader.php';
?>
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"style="margin-top:-2%;">
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper"style="margin-top:-13%;">
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<!--Begin::Dashboard 3-->
<!--Begin::Row-->
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
                                                   Risk
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
                                                            <span class="kt-widget17__subtitle">
                                                                NO OF Risk
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                             <?php echo $totalRisks[0]['total_records'];?>
                                                            </span>
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
                                                            <span class="kt-widget17__subtitle">
                                                                PENDING
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                             <?php echo $totalCreatedRisks[0]['count'];?>
                                                            </span>
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
                                                            <span class="kt-widget17__subtitle">
                                                                MITIGATED
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                             <?php echo $totalMitigatedRisks[0]['count'];?>
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
                                                            <span class="kt-widget17__subtitle">
                                                                 REVIEWED
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                             <?php echo $totalReviewedRisks[0]['count'];?>
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
   RISK STATUS
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
     RISK SCORE
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
      RISK LOCATION
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
RISK TEAM
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv4" style="display: block;height: 350px;">
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
     HEAT MAPS
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div id="chartdiv5" class="display-none" style="display: block;height: 350px;"></div>
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
    MEASURE OF RISK
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv6" class="display-none" style="display: block;height: 350px;">
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
    MEASURE OF RISK
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv7" class="display-none" style="display: block;height: 350px;">
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
  <div class="row">
     <div class="col-md-6">
        <!--begin:: Widgets/Trends-->
<div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__head--noborder">
<div class="kt-portlet__head-label">
  <h3 class="kt-portlet__head-title">
   KRI MAPS
      </h3>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" >
<div class="kt-widget4 kt-widget4--sticky">
<div class="kt-widget4__chart">
<div class="display:none;" id="chartdiv8" class="display-none" style="display: block;height: 350px;">
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
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
         
          $(document).ready( function() {

            $.ajax({
            dataType: "json",
            url: "php/common/manageRiskDashBoard.php",
            data: "",
            success: riskstatus
          });
        
           $.ajax({
            dataType: "json",
            url: "php/common/manageRiskScore.php",
            data: "",
            success: riskScore
          });
          $.ajax({
            dataType: "json",
            url: "php/common/manageRiskLocation.php",
            data: "",
            success: riskLocation
          }); 
          $.ajax({
            dataType: "json",
            url: "php/common/manageRiskTeam.php",
            data: "",
            success: riskTeam
          });
          $.ajax({
            dataType: "json",
            url: "php/common/manageRiskCalculatedStatus.php",
            data: "",
            success: riskCalculatedStatus
          });   

          $.ajax({
            dataType: "json",
            url: "php/common/manageMeasureofRisk.php",
            data: "",
            success: riskMeasure
          });  

               $.ajax({
            dataType: "json",
            url: "php/common/manageInherentRisk.php",
            data: "",
            success: InherentRisk
          }); 
           $.ajax({
            dataType: "json",
            url: "php/common/ganttchartrisk.php",
            data: "",
            success: ganttchartrisk
          });  
            $.ajax({
            dataType: "json",
            url: "php/common/managekririsk.php",
            data: "",
            success: manageKririsk
          });     
  
         });
    function riskstatus(data) {
   
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
                seriesData[i].data[j]=[data[departments[i]][j][0]+" inherent risk score is "+data[departments[i]][j][1],data[departments[i]][j][1]];  
              }
            }
  // console.log(chartData);
           // console.log(points);
            Highcharts.chart('chartdiv1', {
              chart: {
                  type: 'column'
              },
              credits:
              {
                enabled: false
              },
              title: {
                  text: 'Inherent Risk of all Statuses'
              },
              subtitle: {
                  text: 'Click the slices to view Inherent Risk of all statuses'
              },
              plotOptions: {
                  series: {
                      dataLabels: {
                          enabled:false,
                          format: '{point.name}: {point.y:.0f}'
                      },
                      point: {
                    events: {
                        click: function () {
                              (this.name);
                        }
                    }
                   }
                  }
                  
              },

              tooltip: {
                    
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> risks<br/>'
              },

              "series":[
              {
                     "name": "Statuses",
                     "colorByPoint": true,
                     "data":chartData
              }
              ],
              "drilldown": {
                  "series":seriesData,


              }
          });

    }


    function riskScore(data){

   var departments=Object.keys(data);
            var chartData=new Array();
            var seriesData=new Array();            
            for(i=0;i<departments.length;i++){
              chartData[i]={name:departments[i],y:data[departments[i]].length,drilldown:departments[i]};
              seriesData[i]={name:departments[i],id:departments[i]};
              seriesData[i].data=new Array();
              for(j=0;j<data[departments[i]].length;j++){
                if(data[departments[i]][j].name=="Classic"){

                  data[departments[i]][j].name="Classic";
                }
                seriesData[i].data[j]=[data[departments[i]][j][0]+" inherent risk score is "+data[departments[i]][j][1],data[departments[i]][j][1]];  
              }
            }
  console.log(chartData);
 Highcharts.chart('chartdiv2', {

  //  colors: ['#ADD8E6', '#E6ACD7', '#B2B2B2', '#D0D050', 'green', 'skyblue',
  //   '#FF9655', '#FFF263', '#6AF9C4'
  // ],     
 chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'column'   
    },
credits:
{
  enabled: false
},

title: {
        text: ''
    },
  
 plotOptions: {
                  series: {
                      dataLabels: {
                          enabled:false,
                          format: '{point.name}: {point.y:.0f}'
                      },
                      point: {
                    events: {
                        click: function () {
                              (this.name);
                        }
                    }
                   }
                  }

              },

              tooltip: {
                    
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> risks<br/>'
              },

              "series":[
              {
                     "name": "Statuses",
                     "colorByPoint": true,
                     "data":chartData
              }
              ],
              "drilldown": {
                  "series":seriesData,


              }
          });

    }
  function riskLocation(data){
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
                seriesData[i].data[j]=[data[locations[i]][j].subject+" is "+data[locations[i]][j].status,1];  
              }
              
              
                
                
            }
                      Highcharts.chart('chartdiv3', {
              chart: {
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false,
                  type: 'pie'
              },
              credits:
              {
                enabled: false
              },
              title: {
                  text: ''
              },
              subtitle: {
                  text: ''
              },
              plotOptions: {
                pie: {
            size: 210
             },
                  series: {
                      dataLabels: {
                          enabled: true,
                          format: '{point.name}: {point.y:.0f}'
                      }
                  }
           },
                 
              tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                  pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Risks/Risk Clauses<br/>'
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

//     function riskLocation(data){      
//  var chart = AmCharts.makeChart( "chartdiv3", {
//   "type": "pie",
//   "theme": "light",
//   "titles": [ {
//     "text": "",
//     "size": 16
//   } ],
//   "legend":{
//                        "position":"bottom",
//                         "marginRight":0,
//                         "marginLeft":0,
//                         "autoMargins":true,
//                         "labelWidth":100
                        
//                                     },
//   "labelsEnabled":false,
//   "radius":160,
//   "dataProvider": data,
//   "valueField": "count",
//   "titleField": "name",
//   "startEffect": "elastic",
//   "startDuration": 2,
//   "labelRadius": 15,
//   "innerRadius": "30%",
//   "depth3D": 10,
//   "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
//   "angle": 10,
//   "export": {
//     "enabled": true
//   }
// } );
// }
function riskTeam(data){

  // console.log(data);
  var chartData=[];
for(i=0;i<data.length;i++)
     {
    chartData.push({"name":data[i].name,"y":parseInt(data[i].count)});
      }

 Highcharts.chart('chartdiv4', {

  //  colors: ['#ADD8E6', '#E6ACD7', '#B2B2B2', '#D0D050', 'green', 'skyblue',
  //   '#FF9655', '#FFF263', '#6AF9C4'
  // ],     
 chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'   
    },
credits:
{
  enabled: false
},

title: {
        text: ''
    },
  
 tooltip: {
        pointFormat: '{name}<b>{count}</b>'
    },
plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: false,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
//     "series": [{
//         name:'name',
//         colorByPoint: true,
//         data:chartData,
//     }]
// });

   series: [
        {
            name: "Risk Team",
            colorByPoint: true,
            data: [
                {
                    name: "HR Team",
                    y: 25.3,
                    drilldown: "HR Team"
                },
                {
                    name: "Operational Team",
                    y: 18.8,
                    drilldown: "Operational Team"
                },
                {
                    name: "Finance Team",
                    y: 16.7,
                    drilldown: "Finance Team"
                },
                {
                    name: "IT Team",
                    y: 18.8,
                    drilldown: "IT Team"
                },
                {
                    name: "Marketing Team",
                    y: 10.2,
                    drilldown: "Marketing Team"
                },
                {
                    name: "Sales Team",
                    y: 9.1,
                    drilldown: "Sales Team"
                },
                {
                    name: "Physical Security Team",
                    y: 0.5,
                    drilldown: "Operational Team"
                }
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: "HR Team",
                id: "HR Team",
                data: [
                  [
                        "IT Risk",
                        11
                    ],
                    [
                        "Enterprice Risk",
                        22
                    ],
                    [
                        "IT filter Risk",
                        33
                    ],
                    [
                        "RBM Risk",
                        34
                    ],
                    [
                        "Liquidity Risk",
                        45
                    ],
                ] 
                    
               },
               {
                name: "Operational Team",
                id: "Operational Team",
                data: [
                  [
                        "Credit Risk",
                        9
                    ],
                    [
                        "Enterprice Risk",
                        22
                    ],
                    [
                        "Dilution Risk",
                        38
                    ],
                    [
                        "Residual Risk",
                        44
                    ],
                    [
                        "Liquidity Risk",
                        45
                    ],
                     [
                        "Security Risk",
                        52
                    ],
                ] 
                    
               },
               {
                name: "Finance Team",
                id: "Finance Team",
                data: [
                  [
                        "Financial Risk",
                        1
                    ],
                    [
                        "New Risk",
                        28
                    ],
                    [
                        "Credit Risk",
                        30
                    ],
                    [
                        "RBM Risk",
                        45
                    ],
                    [
                        "planing Risk",
                        52
                    ],
                ] 
                    
               },
               {
                name: "IT Team",
                id: "IT Team",
                data: [
                  [
                        "Banking Risk",
                        17
                    ],
                    [
                        "IOB Risk",
                        62
                    ],
                    [
                        "inherent Risk",
                        42
                    ],
                    [
                        "Credit Risk",
                        8
                    ],
                    [
                        "planing Risk",
                        27
                    ],
                ] 
                    
               },
               {
                name: "Marketing Team",
                id: "Marketing Team",
                data: [
                  [
                        "Stock Risk",
                        16
                    ],
                    [
                        "Environmental Risk",
                        22
                    ],
                    [
                        "Banking Risk",
                        12
                    ],
                    [
                        "Natural Risk",
                        7
                    ],
                    [
                        "planing Risk",
                        23
                    ],
                ] 
                    
               },
               {
                name: "Sales Team",
                id: "Sales Team",
                data: [
                  [
                        "Environmental Risk",
                        11
                    ],
                    [
                        "Consumer Risk",
                        45
                    ],
                    [
                        "Internal Risk",
                        9
                    ],
                    [
                        "Resource Risk",
                        86
                    ],
                    [
                        "Data breach Risk",
                        4
                    ],
                ] 
                    
               },
               {
                name: "Physical Security Team",
                id: "Physical Security Team",
                data: [
                  [
                        "Resource Risk",
                        23
                    ],
                    [
                        "Communication Risk",
                        65
                    ],
                    [
                        "Data breach Risk",
                        22
                    ],
                    [
                        "Cybersecurity Risk",
                        9
                    ],
                    [
                        "Dilution Risk",
                        43
                    ],
                ] 
                    
               }
                ]
      
    }
});
}
//  function riskTeam(data){
 
//   var chart = AmCharts.makeChart( "chartdiv4", {
    
//  "type": "pie",
//   "theme": "light",
//   "titles": [ {
//     "text": "",
//     "size": 16
//   } ],
//   "legend":{
//                        "position":"bottom",
//                         "marginRight":0,
//                         "marginLeft":0,
//                         "autoMargins":true,
//                         "labelWidth":100
                        
//                                     },
//   "labelsEnabled":false,
//   "radius":160,
//   "dataProvider": data,
//   "depth3D":10,
//    "angle":10,
//   "valueField": "count",
//   "titleField": "name",
//    "balloon":{
//    "fixedPosition":true

//   },
 
// } );
// }

//     function riskScore(data){      
// var chart = AmCharts.makeChart("chartdiv2", {
//     "theme": "light",
//     "type": "serial",
//     "titles": [ {
//     "text": "",
//     "size": 16
//   } ],

//     "dataProvider":data,
//     "valueAxes": [{
//         "stackType": "3d",
//         "unit": "%",
//         "position": "left",
//         "title": "",
//     }],
//     "startDuration": 1,
//     "graphs": [{
//         "balloonText": " [[category]]: <b>[[value]]</b>",
//         "fillAlphas": 0.9,
//         "lineAlpha": 0.2,
//         "title": "2004",
//         "type": "column",
//         "valueField": "count"
    
//     }],
//     "plotAreaFillAlphas": 0.1,
//     "depth3D": 20,
//     "angle": 30,
//     "categoryField": "name",
//     "categoryAxis": {
//         "gridPosition": "start"
//     },
    
// });
// jQuery('.chart-input').off().on('input change',function() {
//   var property  = jQuery(this).data('property');
//   var target    = chart;
//   chart.startDuration = 0;

//   if ( property == 'topRadius') {
//     target = chart.graphs[0];
//         if ( this.value == 0 ) {
//           this.value = undefined;
//         }
//   }

//   target[property] = this.value;
//   chart.validateNow();
// });
// }
function riskCalculatedStatus(data){ 
 likelihood = ["","Rare","Unlikely","Creditble","Likely","Almostcertain"];
 impact = ["","Insignificant","Minor","Moderate","Major","Extreme/catastropic"];
 for(var i=0;i<data.length;i++){
  if (data[i].heat <= 3) {
    data[i].fill = '#84b761';
    data[i].heat = '0';
  }
  else if(data[i].heat <= 7){
     data[i].fill = '#ffb74d';
     data[i].heat = '1';
  }
  else if (data[i].heat <= 14) {
     data[i].fill = '#ef6c00';
     data[i].heat = '2';
  }
  else if (data[i].heat <= 25) {
     data[i].fill = '#d84315';
     data[i].heat = '3';
  }
  data[i].x = likelihood[data[i].x];
  data[i].y = impact[data[i].y];
  
 } 
 data

anychart.onDocumentReady(function () {
        // Creates Heat Map
        var chart = anychart.heatMap(data);

        // Sets chart settings and hover chart settings
        chart.stroke('#fff');
        chart.hovered()
                .stroke('6 #fff')
                .fill('#545f69')
                .labels({'fontColor': '#fff'});

        // Sets selection mode for single selection
        chart.interactivity().selectionMode('none');

        // Sets title
        chart.title()
                .enabled(true)
                .text('')
                .padding([0, 0, 20, 0]);

        // variable with list of labels
        var namesList = ['', '', '', ''];
        // Sets adjust chart labels
        chart.labels()
                .enabled(true)
                .minFontSize(14)
                // Formats labels
                .format(function () {
                    // replace values with words for points heat
                   if(this.x=="Creditble"&& this.y=="Insignificant" )
                    return "3";
                   if(this.x=="Creditble"&& this.y=="Moderate" )
                    return "9"
                   if(this.x=="Likely"&& this.y=="Major" )
                    return "16";
                   if(this.x=="Unlikely"&& this.y=="Moderate")
                    return "6";
                   if(this.x=="Rare"&& this.y=="Insignificant" )
                    return "1";
                   if(this.x=="Rare" && this.y=="Extreme/catastropic")
                    return "5";
                   if(this.x=="Almostcertain"&& this.y=="Extreme/catastropic" )
                    return "25";
                    
                });

        // Sets Axes
        chart.yAxis().stroke(null);
        // chart.yAxis().labels().padding([0, 15, 0, 0]);
        chart.yAxis().ticks(false);
        chart.xAxis().stroke(null);
        chart.xAxis().ticks(false);

        // Sets Tooltip
        chart.tooltip().title().useHtml(true);
        chart.tooltip().useHtml(true)
                .titleFormat(function () {
                    return '<b>' + namesList[this.heat] + '</b> Residual Risk';
                })
                .format(function () {
                    return '<span style="color: #CECECE">Likelihood: </span>' + this.x + '<br/>' +
                            '<span style="color: #CECECE">Impact: </span>' + this.y;
                });

        // set container id for the chart
        chart.container('chartdiv5');
        // initiate chart drawing
        chart.draw();
    });
}

function riskMeasure(data) {
   
    var measures=Object.keys(data);
            var chartData=new Array();
            var seriesData=new Array();            
            for(i=0;i<data.acceptable.length;i++){
              chartData[i]=[data.acceptable[i].subject,data.acceptable[i].calculated_risk]
              }
              for(j=0;j<data.notacceptable.length;j++){
                seriesData[j]=[data.notacceptable[j].subject,data.notacceptable[i].calculated_risk]
              }

//   console.log(data);

Highcharts.chart('chartdiv6', {
  
    chart: {
        type: 'pie'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    credits:
{
  enabled: false
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
        headerFormat: '<span style="font-size:12px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Risk Score<br/>'
    },

    "series": [
        {
            "name": "Measure of Risk",
            "colorByPoint":true,
            "data": [
                {
                    "name": "Acceptable",
                    "y": data.acceptable.length,
                    "drilldown": "Acceptable"

                },  

                {
                    "name": "Non-Acceptable",
                    "y": data.notacceptable.length,
                    "drilldown": "Non-Acceptable"
                }
            ]
        }
    ],
    "drilldown": {
        "series": [
            {
                "name": "Acceptable",
                "id": "Acceptable",
                "data": chartData
            },
            {
                "name": "Non-Acceptable",
                "id": "Non-Acceptable",
                "data": seriesData  
            }
        ]
    }
});

}
function InherentRisk(data){

  // chartData=[];
  chartData=[];

      // el = document.getElementById("demo"),
      // html = '';
  
//   for (var i = 0; i < data.length; i++)
//   {
// html+=data[i].Risk + "<br>";
// }
//   document.getElementById("demo").innerHTML = html;

  for(i=0;i<data.length;i++)
  {
    if(data[i].heat<=9)
    {
    chartData.push({"x":data[i].x,"y":data[i].y,"z":Math.round(data[i].heat),"name":data[i].Risk,"color":"#FB3622"});
  
  }
if(data[i].heat>9&&data[i].heat<=99)
  {
  chartData.push({"x":data[i].x,"y":data[i].y,"z":Math.round(data[i].heat), "color":"#37D58D"});
  }
  if(data[i].heat==100)
  {
     chartData.push({"x":data[i].x,"y":data[i].y,"z":Math.round(data[i].heat), "color":"yellow"});
  }
 }
 // console.log(chartData);       
     
  Highcharts.chart('chartdiv7', {

      chart: {
          type: 'bubble',
          plotBorderWidth: 0,
          zoomType: 'xyz'
      },

      legend: {
          enabled: true
      },

      title: {
          text: ''
      },

      subtitle: {
          text: ''
      },
      credits:
{
  enabled: false
},

      xAxis: {
        startOnTick: true,
                endOnTick: true,
          gridLineWidth: 0,
          title: {
              text: 'Likelihood'
          },
          labels: {
              format: '',
          },
          plotLines: [{
              label: {
                  rotation: 0,
                  y: 0,
                  style: {
                      fontStyle: 'italic'
                  },
                  text: ''
              },
              zIndex: 0
          }]
      },

      yAxis: {
        startOnTick: true,
                endOnTick: true ,
          gridLineWidth: 0,

          title: {
              text: 'Impact'
          },
          labels: {
              format: ''
          },
          maxPadding: 0,
          plotLines: [{
              label: {
                  align: 'right',
                  style: {
                      fontStyle: 'italic'
                  },
                  text: '',
                  
              },
              zIndex: 0
          }]
      },

      tooltip: {
          useHTML: true,
          headerFormat: '<table>',
          pointFormat: '<tr><th>Likelihood:</th><td>{point.x}%</td></tr>'+'<tr><th>Impact:</th><td>{point.y}%</td></tr>'+'<tr><th>Inherent Risk Heat:</th><td>{point.z}%</td></tr>',
          footerFormat: '</table>',
          followPointer: true
      },

      plotOptions: {
          series: {
              dataLabels: {
                  enabled: true,
                   showInLegend: true,
                  format: '{point.z}'
              }
          }
      },

      series: [{
        colorByPoint:true,
          data:chartData 
     }]

  });
}
function ganttchartrisk(data){
   // console.log(data);
  var category=[];
  var process1=[];
  var task=[];
 for(i=0;i<data.length;i++)
     {
    category.push({"label":data[i].startmonth,"start":data[i].created_date,"end":data[i].updated_time});
     } 
 for(j=0;j<data.length;j++)
     {
    process1.push({"label":data[j].subject});
     } 
     // console.log(process1) for(k=0;k<data.length;k++)
     {
    task.push({"start":data[k].created_date,"end":data[k].updated_time});
     } 
FusionCharts.ready(function() {
  var socialMediaPlan = new FusionCharts({
    type: 'gantt',
    renderAt: '',
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

function manageKririsk(data){ 

  Highcharts.chart('chartdiv8', {

    chart: {
            type: 'heatmap',
            marginTop: 40,
            marginBottom: 40,


            events: {
                drilldown: function (e) {
                    console.log('I am here');
                    if (!e.seriesOptions) {

                        var chart = this;
                        var drilldownSeries = {
                            name: '',
                            borderWidth: 1,
                            data: [{
                                x: 0,
                                y: 0,
                                value: 'InherentRisk'
                            }, {
                                x: 0,
                                y: 1,
                                value: 'RBM Risk'
                            }, {
                                x: 0,
                                y: 2,
                                value: 'Enterprise Risk',
                            }, {
                                x: 0,
                                y: 3,
                                value: 'Credit Risk'
                            }, {
                                x: 0,
                                y: 4,
                                value: 'Security Risk'
                            }, {
                                x: 1,
                                y: 0,
                                value: 'RBM'
                            }, {
                                x: 1,
                                y: 1,
                                value: 'Cybersecurity Risk'
                            }, {
                                x: 1,
                                y: 2,
                                value: 'Strategic Risk'
                            }, {
                                x: 1,
                                y: 3,
                                value: 'Market Risk'
                            }, {
                                x: 1,
                                y: 4,
                                value: 'Interest Rate Risk'
                            }, {
                                x: 2,
                                y: 0,
                                value: 'Foreign Exchange Risk'
                            }, {
                                x: 2,
                                y: 1,
                                value: 'Operational Risk'
                            }, {
                                x: 2,
                                y: 2,
                                value: 'Legal Risk'
                            }, {
                                x: 2,
                                y: 3,
                                value: 'Counter Party'
                            }, {
                                x: 2,
                                y: 4,
                                value: 'Reputaional Risk'
                            }, {
                                x: 3,
                                y: 0,
                                value: 'Conflict'
                            }, {
                                x: 3,
                                y: 1,
                                value: 'Stock Risk'
                            }, {
                                x: 3,
                                y: 2,
                                value: 'Financial risk'
                            }, {
                                x: 3,
                                y: 3,
                                value: 'audit Risk'
                            }, {
                                x: 3,
                                y: 4,
                                value: 'Stock'
                            }],
                            dataLabels: {
                                enabled: true,
                                color: 'black',
                                style: {
                                    textShadow: 'none',
                                    HcTextStroke: null
                                }
                            }
                        };

                        // Show the loading label
                        chart.showLoading('');

                        setTimeout(function () {
                            chart.hideLoading();
                            chart.addSeriesAsDrilldown(e.point, drilldownSeries);
                        }, 1000);
                    }

                }
            }



        },

        plotOptions: {
            heatmap: {
                allowPointSelect: true
            }
        },

        title: {
            text: ''
        },

        xAxis: {
            categories: ['Extreme', 'High', 'Medium', 'Low', 'Negligible']
        },

        yAxis: {
            categories: ['Remote', 'Unlikely', 'Possible', 'Likely', 'Propable'],
            title: null
        },

        colorAxis: {
            min: 0,
            minColor: '#FFFFFF',
            maxColor: Highcharts.getOptions().colors[0]
        },

        legend: {
            align: 'right',
            layout: 'vertical',
            margin: 0,
            verticalAlign: 'top',
            y: 25,
            symbolHeight: 320
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> sold <br><b>' + this.point.value + '</b> items on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
            }
        },
   


        series: [{
            name: '',
            borderWidth: 1,
            drilldown: true,
            data: [{
                x: 0,
                y: 0,
                value: 5,
                color:'#64A0F2',
              
                drilldown: 'foo'
            }, {
                x: 0,
                y: 1,
                value: '',
                 color:'#64A0F2'
            }, {
                x: 0,
                y: 2,
                value: '',
                 color:'#6CC877'
                
            }, {
                x: 0,
                y: 3,
                value: '',
                 color:'#4CC25A'
                
            }, {
                x: 0,
                y: 4,
                value: 1,
                 color:'#4CC25A',
                drilldown: 'foo'
            }, {
                x: 1,
                y: 0,
                value: '' ,
                color:'#D9D153'
              
            }, {
                x: 1,
                y: 1,
                value: '',
                 color:'#64A0F2'
            }, {
                x: 1,
                y: 2,
                value: '',
                 color:'#64A0F2'
            }, {
                x: 1,
                y: 3,
                value: 8,
                 color:'#64A0F2',
                drilldown: 'foo'
            }, {
                x: 1,
                y: 4,
                value:'' ,
                color:'#6CC877'
            }, {
                x: 2,
                y: 0,
                value: '',
                color:'#F0635F'
            }, {
                x: 2,
                y: 1,
                value: '',
                color:'#D9D153'
            }, {
                x: 2,
                y: 2,
                value: 9,
                 color:'#D9D153',
                drilldown: 'foo'
            }, {
                x: 2,
                y: 3,
                value: '',
                 color:'#64A0F2'
            }, {
                x: 2,
                y: 4,
                value: '' ,
                color:'#6CC877'
            }, {
                x: 3,
                y: 0,
                value: '',
                color:'#F0635F'
            }, {
                x: 3,
                y: 1,
                value: '',
                 color:'#D9D153'
            }, {
                x: 3,
                y: 2,
                value: 2,
                 color:'#D9D153',
                drilldown: 'foo'
            }, {
                x: 3,
                y: 3,
                value: 19,
                 color:'#64A0F2',
                drilldown: 'foo'
            }, {
                x: 3,
                y: 4,
                value: '',
                 color:'#64A0F2'
            }, {
                x: 4,
                y: 0,
                value: 25,
                color:'#F0635F',
                drilldown: 'foo'
            }, {
                x: 4,
                y: 1,
                value: '',
                color:'#F0635F'
            }, {
                x: 4,
                y: 2,
                value: 8,
                color:'#F0635F',
                drilldown: 'foo'
            }, {
                x: 4,
                y: 3,
                value: '' ,
                 color:'#D9D153'
            }, {
                x: 4,
                y: 4,
                value: '',
                color:'#D9D153'
            }],
            dataLabels: {
                enabled: true,
                color: 'black',
                style: {
                    textShadow: 'none',
                    HcTextStroke: null
                }
            }
        }],

        drilldown: {
            series: []
        }

  
});
    
}


function getRiskList(status){
  if (status == 'all') {
    window.location="/freshgrc/view/risk/noofriskdashboard.php";
  }
  else if (status == 'create') {
    window.location="/freshgrc/view/risk/riskcreatedashboard.php";
  }
  else if(status == 'mitigate'){
    window.location="/freshgrc/view/risk/riskmitigatedlistdashboard.php";
  }
  else if (status == 'review') {
    window.location="/freshgrc/view/risk/riskreviewedlistdashboard.php";
  }

}


        </script> 
      </body>
      </html>
       <?php 
        include '../audit/sidemenu.php';
      ?>