<?php require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/common/dashboard.php';
require_once __DIR__.'../../../php/ethics/ethicsManager.php';

$complianceWiseStatusGraph=false;

$manager=new dashboard(); 
 $policyProcedureTypes=$manager->policyProcedure();
 $manager=new ethics;
 $ManagementReject=$manager->ManagementReject();
 $Approved=$manager->Approved();
 $Rejected=$manager->Rejected();
 $REQUESTS=$manager->REQUESTS();
?>


<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ethics</title>
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
    <script src="js/audit/auditByCompliance.js"></script>
    <link href="assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="assets/img/favicon.png" rel="icon" type="image/png">
    <link href="assets/img/favicon.ico" rel="shortcut icon">
    <link href="metronic/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="metronic/theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="metronic/theme/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="metronic/theme/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="metronic/theme/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="metronic/theme/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/lib/font-awesome/font-awesome.min.css">      
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />    
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
      #popover {
        cursor:pointer;
      }
      #popover:focus {
        outline:none;
      }
      #chartdiv1 {
        background-color: white;
        height:390px;
        text-transform: capitalize;      
      }
      #chartdiv2 {
        height:390px;
        background-color: white;
        text-transform: capitalize;      
      }
      #chartdiv3{
        background-color: white;
        height:390px;
        text-transform: capitalize;      
      }
       #chartdiv4 {
        height:390px;
        background-color: white;
        text-transform: capitalize;      
      }
       #chartdiv5 {
        height:390px;
        background-color: white;
        text-transform: capitalize;      
      }
      #chartdiv6
      {
        height:390px;
        background-color: white;
        text-transform: capitalize;   
      }
      #chartdiv1 a, #chartdiv2 a, #chartdiv3 a, #chartdiv4 a,#chartdiv5 a,#chartdiv6 a{
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
   /* #notify{
      width: 50px;
      height: 50px;
      float: left;
      margin-right: 130px;"
    }*/
      </style>
  </head>

<?php 
include '../siteHeader.php';
?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<!--Begin::Dashboard 3-->
<!--Begin::Row-->
<div class="row">
     <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
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
                Ethics
            </a>
            
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="kt-widget17">
            <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                <div class="kt-widget17__chart" style="height:320px;">
                    <canvas id="kt_chart_activities"></canvas>
                </div>
            </div>
            <div class="kt-widget17__stats">
                <div class="kt-widget17__items">
                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"/>
        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
    </g>
</svg>                      </span> 
                        <span class="kt-widget17__subtitle">
                            
                            POLICIES
                        </span> 
                        <span class="kt-widget17__desc">
                            <span data-counter="counterup" data-value="<?php echo $Totalpolicy[0]['count'];?>"><?php echo $Totalpolicy[0]['count'];?></span>
                        </span>  
                    </div>

                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"/>
    </g>
</svg>                      </span>  
                        <span class="kt-widget17__subtitle">
                            IDENTIFIED
                        </span> 
                        <span class="kt-widget17__desc">
                            <span data-counter="counterup" data-value="<?php echo $totalPolicyIdentified[0]['count'];?>"><?php echo $totalPolicyIdentified[0]['count'];?></span>
                        </span>  
                    </div>                  
                </div>
                <div class="kt-widget17__items">
                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
        <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" id="Combined-Shape" fill="#000000"/>
    </g>
</svg>                      </span>  
                        <span class="kt-widget17__subtitle">
                            PUBLISHED
                        </span> 
                        <span class="kt-widget17__desc">
                            <span data-counter="counterup" data-value="><?php echo $totalPolicyPublished[0]['count'];?>"><?php echo $totalPolicyPublished[0]['count'];?></span>
                        </span>  
                    </div>  

                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"/>
    </g>
</svg>                      </span>  
                        <span class="kt-widget17__subtitle">
                           EXPIRED
                        </span> 
                        <span class="kt-widget17__desc">
                            <span data-counter="counterup" data-value="><?php echo $totalPolicyExpired[0]['count'];?>"><?php echo $expiredCount[0]["count"];?></span>
                        </span>  
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>
<!--end:: Widgets/Activity-->   </div>     
    
<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
    
        <!--begin:: Widgets/Profit Share-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
              Policy Procedure
            </h3>
           
        </div>  
        <div class="portlet-body">                  
             <div id="chartdiv1" class="display-none" style="display: block;">                   
            </div>
         </div> 
    </div>
</div>      
</div>

</div>
<!--End::Row-->

<!--Begin::Row-->
<div class="row">
        
<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
    
        <!--begin:: Widgets/Profit Share-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
               Policy Status   
            </h3>
           
        </div>   
        <div class="portlet-body">                  
                    <div id="chartdiv2" class="display-none" style="display: block;">                     
                    </div>                  
                  </div>
    </div>
</div>      
<!--end:: Widgets/Profit Share-->  
</div>
       
<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
    
        <!--begin:: Widgets/Profit Share-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
            Policy Classification       
            </h3>
        </div>   
        <div class="portlet-body">                  
            <div id="chartdiv3" class="display-none" style="display: block;">                   
            </div>
       </div>
    </div>
</div>      
<!--end:: Widgets/Profit Share--> 

</div>



</div>
<!--End::Row-->

<!--Begin::Row-->
<div class="row">
    <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Finance Summary-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
            CATEGORY       
            </h3>
        </div>   
        <div class="portlet-body">                  
                    <div id="chartdiv4" class="display-none" style="display: block;">      
                    </div>
                    <input type="hidden" id="company" value="<?php echo $_SESSION['company'] ?>">                                  
                  </div>
    </div>
</div> 
<!--end:: Widgets/Finance Summary--> 
            </div>
                 
            <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Finance Summary-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
            Request By Department       
            </h3>
        </div>   
                  <div class="portlet-body">                  
                    <div id="chartdiv6" class="display-none" style="display: block;">      

                    </div>
                    <input type="hidden" id="company" value="<?php echo $_SESSION['company'] ?>">                                  
                  </div>
                </div>                
               


</div>
<!--End::Row-->
<!--Begin::Row-->

<!--End::Row-->

<!--End::Dashboard 3--> </div>
<!-- end:: Content -->  </div>  

</div>
</div>
</div>
</body>
</html>

<?php 
include '../audit/sidemenu.php';

 ?>
   <script type="text/javascript">
    $(document).ready( function() {  
    //   $.ajax({
    //   dataType: "json",
    //   url: "php/policy/policyTypes.php",
    //   data: "",
    //   success: policyTypes
    // });
  
     $.ajax({
      dataType: "json",
      url: "php/policy/policyProcedure.php",
      data: "",
      success: policyProcedure
    });
    $.ajax({
      dataType: "json",
      url: "php/policy/policyClassification.php",
      data: "",
      success: policyClassification
    }); 
    $.ajax({
      dataType: "json",
      url: "php/policy/audienceClassification.php",
      data: "",
      success: audienceClassification
    });
    $.ajax({
      dataType: "json",
      url: "php/policy/policyStatus.php",
      data: "",
      success: policyStatus
    }); 

 $.ajax({
      dataType: "json",
      url: "php/ethics/getChartData.php",
      data: "",
      success:ethicsChartForLocation
    }); 
  $.ajax({
      dataType: "json",
      url: "php/ethics/getDepartmentdata.php",
      data: "",
      success:ethicsChartForDepartment
    });

    });
    function policyProcedure(data){

  // console.log(data);
  var chartData=[];
for(i=0;i<data.length;i++){
    chartData.push({"name":data[i].name,"y":parseInt(data[i].count)});
      } 
 Highcharts.chart('chartdiv1', {

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
        pointFormat: '{name}<b>{point.percentage:.1f}%</b>'
    },
plotOptions: {
        pie: {

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
    "series": [{
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
  function policyStatus(data){

  // console.log(data);
  var chartData=[];
for(i=0;i<data.length;i++){
    chartData.push({"name":data[i].status,"y":parseInt(data[i].count)});
      } 
 Highcharts.chart('chartdiv2', {

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
        pointFormat: '{name}<b>{point.percentage:.1f}%</b>'
    },
plotOptions: {
        pie: {

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
    "series": [{
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
function policyClassification(data){

var measures=Object.keys(data);
console.log(data[measures[0]].length);
var seriesData=[];
var chartData=[];
var t=[];
for(i=0;i<measures.length;i++)
     {
    chartData.push({"name":measures[i],"y":parseInt(data[measures[i]].length),"drilldown":measures[i]});
      } 
  for(i=0;i<measures.length;i++){
for(j=0;j<data[measures[i]].length;j++){
  // console.log(data[measures[i]][j].department_name);
   seriesData.push({"name":data[measures[i]][j].title,"y":data[measures[i]][j].count});

      } 
      t.push({"name":measures[i],"id":measures[i],"data":seriesData});
  seriesData=[];

}
Highcharts.chart('chartdiv3', {     
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
    "series": t,
}
});
}


 function audienceClassification(data){
 debugger
 var chart = AmCharts.makeChart("chartdiv4", {
    "theme": "light",
    "type": "serial",
    "titles": [ {
    "text": "",
    "size": 16
  } ],
    "dataProvider":data,
    "valueAxes": [{
        "stackType": "3d",
        "unit": "",
        "position": "left",
        "title": "",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": " [[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "count"
    
    }],
    "plotAreaFillAlphas": 0.1,
    "depth3D": 20,
    "angle": 30,
    "categoryField": "name",
    "categoryAxis": {
        "gridPosition": "start"
    },
    
});
}



function ethicsChartForLocation(data){
     var measures=Object.keys(data);
s=[];
seriesData=[];
emp=[];
r=[];
var t=[];
     for(i=0;i<measures.length;i++){
    s.push({"name":measures[i],"y":data[measures[i]].length,"drilldown":measures[i]});
    // console.log(s);
  }

  for(i=0;i<measures.length;i++){
for(j=0;j<data[measures[i]].length;j++){
   // console.log(data[measures[i]][j].department_name);
   seriesData.push({"name":data[measures[i]][j].department_name,"y":data[measures[i]][j].count,"drilldown":data[measures[i]][j].department_name});
   for(d=0;d<data[measures[i]][j].count;d++)
   {
    emp.push([data[measures[i]][j].employee[d].employeeID,1]);
   }
r.push({"name":data[measures[i]][j].department_name,"id":data[measures[i]][j].department_name,"data":emp});

emp=[];
      } 
      t.push({"name":measures[i],"id":measures[i],"data":seriesData});
  seriesData=[];
    console.log();

}



  
// Create the chart
// for(i=0;i<seriesData.length;i++){
//   seriesDat.push(seriesData[i]);
// }

// console.log(seriesDat);
Highcharts.chart('chartdiv5', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Location Based Drildown'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Location/department<br/>'
    },
    "series": [
        {
            "name": "Location",
            "colorByPoint": true,
            "data":s,
            drilldown:'name'
        }
    ],
     "drilldown": {
    "series": t,
}
});
}


function r(data){
  // console.log(data);
  var chartData=[];
  seriesData=[];
  var chartDrillData=[];
for(i=0;i<data.length;i++){
    chartData.push({"name":data[i].name,"y":parseInt(data[i].count),"drilldown":data[i].name});
  }
  for(i=0;i<data.length;i++){
for(j=0;j<data.length;j++){
   seriesData.push([data[j].department_name,1]);
      } 
      chartDrillData.push({"name":data[i].name,"id":data[i].name,"data":seriesData,"drilldown":data[i].department_name});
  seriesData=[];

}

  // console.log(chartData);
    
Highcharts.chart('chartdiv5', {
    chart: {
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
        text: '<a href="http://statcounter.com" target="_blank"></a>'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    "series": [{
        name:'name',
        colorByPoint: true,
        data:chartData,
        drilldown:'name'

    }],

    "drilldown": {
    "series": chartDrillData,

    }
});
}


function ethicsChartForDepartment(data){
  // console.log(data);
  var chartData=[];
  seriesData=[];
  var chartDrillData=[];
for(i=0;i<data.length;i++){
    chartData.push({"name":data[i].department_name,"y":parseInt(data[i].count),"drilldown":data[i].department_name});
  }
  for(i=0;i<data.length;i++){
for(j=0;j<data.length;j++){
   seriesData.push([data[j].employeeID,1]);
      } 
      chartDrillData.push({"name":data[i].department_name,"id":data[i].department_name,"data":seriesData,"drilldown":data[i].department_name});
  seriesData=[];

}

  // console.log(chartData);
    
Highcharts.chart('chartdiv6', {
    chart: {
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
        text: '<a href="http://statcounter.com" target="_blank"></a>'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    "series": [{
        name:'name',
        colorByPoint: true,
        data:chartData,
        drilldown:'name'

    }],

    "drilldown": {
    "series": chartDrillData,

    }
});
}

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


  </script> 
    