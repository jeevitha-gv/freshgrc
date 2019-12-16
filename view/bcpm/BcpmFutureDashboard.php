<?php require_once __DIR__.'/../header.php';
$complianceWiseStatusGraph=false;

?>
<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fresh GRC Admin</title>
    <base href="/freshgrc/">
      
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
    <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />    

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
        height: 345px;      
      }
       #chartdiv4 {
        height: 344px;
        background-color: white;
      }
       #chartdiv5 {
        background-color: white;
        height: 345px;      
      }
      #chartdiv6 {
        height: 344px;
        background-color: white;
      }
      #chartdiv7{
        background-color: white;
        height: 345px;      
      }
       #chartdiv8 {
        height: 344px;
        background-color: white;
      }
       #chartdiv9 {
        background-color: white;
        height: 345px;      
      }
      #chartdiv10 {
        height: 344px;
        background-color: white;
      }
      #chartdiv11{
        background-color: white;
        height: 345px;      
      }
       #chartdiv12 {
        height: 344px;
        background-color: white;
      }
      #chartdiv13{
        background-color: white;
        height: 345px;      
      }
       #chartdiv14 {
        height: 344px;
        background-color: white;
      }
      #chartdiv15{
        background-color: white;
        height: 345px;      
      }
      #chartdiv1 a, #chartdiv2 a, #chartdiv3 a, #chartdiv4 a,
      #chartdiv5 a, #chartdiv6 a, #chartdiv7 a, #chartdiv8 a,
      #chartdiv9 a, #chartdiv10 a, #chartdiv11 a, #chartdiv12 a, 
      #chartdiv13 a, #chartdiv14 a, #chartdiv15 a{
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
  </head>
  <body style="font-family: sans-serif !important;">
    <body>
      <?php 
        include '../siteHeader.php';
        $currentMenu = 'auditDashboard';
        include '../common/leftMenu.php';
        $userRole = $_SESSION['user_role'];
      ?>
      <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">       
        <div class="page-content-wrapper">          
          <div class="page-content">            
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                  <div class="visual">
                    <i class="fa fa-search"></i>
                  </div>
                  <div class="details">
                    <div class="desc">NO of EXERCISE CONDUCTED</div>
                    <div class="number">
                      <span data-counter="counterup" data-value="1">1</span>
                    </div>                  
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                  <div class="visual">
                    <i class="fa fa-align-center"></i>
                  </div>
                  <div class="details">
                    <div class="desc"> NO of TRAININGS CONDUCTED </div>
                    <div class="number">
                      <span data-counter="counterup" data-value="3">3</span></div>                  
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                  <div class="visual">
                    <i class="fa fa-circle-o-notch"></i>
                  </div>
                  <div class="details">
                    <div class="desc"> RTO</div>
                    <div class="number">                    
                      <span data-counter="counterup" data-value="5">5</span>
                    </div>                  
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                  <div class="visual">
                    <i class="fa fa-check-circle"></i>
                  </div>
                  <div class="details">
                    <div class="desc">DAILY LOSS</div>
                    <div class="number"> 
                      <span data-counter="counterup" data-value="2">2</span></div>                  
                  </div>
                </a>
              </div>
            </div>           
            <div class="clearfix"></div>     
            <div class="row">
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-bar-chart font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Bcpm Future Footer</span>   
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv1" class="display-none" style="display: block;">                   
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future Exercise</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv2" class="display-none" style="display: block;">           
                    </div>                  
                  </div>
                </div>                
              </div>
            </div>       
            <div class="row">   
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-bar-chart font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future Location</span>  
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv3" class="display-none" style="display: block;">                   
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future Control</span>               
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv4" class="display-none" style="display: block;">          
                    </div>                  
                  </div>
                </div>                
              </div>             
            </div>
            <div class="row">   
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-bar-chart font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future BusinessImpact</span>  
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv5" class="display-none" style="display: block;">                   
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future ProbabilityImpact</span>               
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv6" class="display-none" style="display: block;">          
                    </div>                  
                  </div>
                </div>                
              </div>             
            </div>
            <div class="row">   
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-bar-chart font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future Rto</span>  
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv7" class="display-none" style="display: block;">                   
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Future DailyLoss</span>               
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv8" class="display-none" style="display: block;">          
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
      url: "php/bcpm/bcpmFutureFooter.php",
      data: "",
      success: bcpmFutureFooter
    });
  
     $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureLocation.php",
      data: "",
      success: bcpmFutureLocation
    });
    $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureControl.php",
      data: "",
      success: bcpmFutureControl
    }); 
    $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureExercise.php",
      data: "",
      success: bcpmFutureExercise
    });
    $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureBusinessImpact.php",
      data: "",
      success: bcpmFutureBusinessImpact
    }); 
    $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureProbabilityImpact.php",
      data: "",
      success: bcpmFutureProbabilityImpact
    }); 
     $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureRto.php",
      data: "",
      success: bcpmFutureRto
    });  
     $.ajax({
      dataType: "json",
      url: "php/bcpm/bcpmFutureDailyLoss.php",
      data: "",
      success: bcpmFutureDailyLoss
    }); 
     
    });
    

    function bcpmFutureFooter(data){
   
      var chart = AmCharts.makeChart( "chartdiv1", {
      "type": "pie",
      "theme": "light",
      "titles": [ {
        "text": "",
        "size": 16
      } ],
      "dataProvider": data,
      "valueField": "count",
      "titleField": "name",
      "outlineAlpha": 0.4,
      "depth3D": 15,
      "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
      "angle": 30,
      "export": {
        "enabled": true
      }
    } );

    }
    function bcpmFutureLocation(data){

 var chart = AmCharts.makeChart( "chartdiv3", {
  "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "",
    "size": 16
  } ],
  "dataProvider": data,
  "valueField": "count",
  "titleField": "name",
  "startEffect": "elastic",
  "startDuration": 2,
  "labelRadius": 15,
  "innerRadius": "50%",
  "depth3D": 10,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 15,
  "export": {
    "enabled": true
  }
} );
}
 function bcpmFutureControl(data){

  var chart = AmCharts.makeChart( "chartdiv4", {
    
 "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "",
    "size": 16
  } ],
  "dataProvider": data,
  "valueField": "count",
  "titleField": "control_scale",
   "balloon":{
   "fixedPosition":true
  },
 
} );
}

    function bcpmFutureExercise(data){      
var chart = AmCharts.makeChart("chartdiv2", {
    "theme": "light",
    "type": "serial",
    "titles": [ {
    "text": "",
    "size": 16
  } ],
    "dataProvider":data,
    "valueAxes": [{
        "stackType": "3d",
        "unit": "%",
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
    "categoryField": "erercise_type",
    "categoryAxis": {
        "gridPosition": "start"
    },
    
});
}
 function bcpmFutureBusinessImpact(data){ 
var chart = AmCharts.makeChart("chartdiv5", {
   
    "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "",
    "size": 16
  } ],
  "dataProvider": data,
  "valueField": "count",
  "titleField": "business_impact_scale",
  "startEffect": "elastic",
  "startDuration": 2,
  "labelRadius": 15,
  "innerRadius": "50%",
  "depth3D": 10,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 15,
  "export": {
    "enabled": true
  
}
});
}
function bcpmFutureProbabilityImpact(data){
      debugger
 var chart = AmCharts.makeChart( "chartdiv6", {
  "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "",
    "size": 16
  } ],
  "dataProvider": data,
  "valueField": "count",
  "titleField": "probabilty_scale",
  "startEffect": "elastic",
  "startDuration": 2,
  "labelRadius": 15,
  "innerRadius": "50%",
  "depth3D": 10,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 15,
  "export": {
    "enabled": true
  }
} );
}
function bcpmFutureRto(data){
 
  var chart = AmCharts.makeChart( "chartdiv7", {
    
 "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "",
    "size": 16
  } ],
  "dataProvider": data,
  "valueField": "count",
  "titleField": "bia",
   "balloon":{
   "fixedPosition":true
  },
 
} );
}

   function bcpmFutureDailyLoss(data){
      debugger
 var chart = AmCharts.makeChart( "chartdiv8", {
  "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "",
    "size": 16
  } ],
  "dataProvider": data,
  "valueField": "count",
  "titleField": "bia",
  "startEffect": "elastic",
  "startDuration": 2,
  "labelRadius": 15,
  "innerRadius": "50%",
  "depth3D": 10,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 15,
  "export": {
    "enabled": true
  }
} );

jQuery('.chart-input').off().on('input change',function() {
  var property  = jQuery(this).data('property');
  var target    = chart;
  chart.startDuration = 0;

  if ( property == 'topRadius') {
    target = chart.graphs[0];
        if ( this.value == 0 ) {
          this.value = undefined;
        }
  }

  target[property] = this.value;
  chart.validateNow();
});
}


  </script> 
    
      </body>
    </body>
  </body>
</html>