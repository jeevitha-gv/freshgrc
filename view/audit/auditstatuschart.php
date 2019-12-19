<?php require_once __DIR__.'/../header.php';

require_once __DIR__.'/../../php/common/dashboard.php';

?>
<!DOCTYPE html>
<html>

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
   <script src="js/audit/auditConfigurableDashboardManagement.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/treemap.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
                    
   <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="assets/media/logos/fixnix.png"/>

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
      #popover {
        cursor:pointer;
      }
      #popover:focus {
        outline:none;
      }
      
      </style>
<?php 
       include '../siteHeader.php';
       // include '../audit/sidemenu.php';
     ?>
        <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"style="margin-top:-2%;">
       <div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-25%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">     
        <div class="page-content-wrapper">          
          <div class="page-content">
      <i class="flaticon2-back" id="previous" onclick="previous()"></i>
          <div class="conainer text-center">
            <div class="row form-group text-center mx-auto">
              <input type="hidden" id="company" value="<?php echo $_SESSION['company'] ?>">
              <input type="hidden" id="user" value="<?php echo $_SESSION['user_id'] ?>">
         </div>
                     <div class="clearfix"></div>          
            <div class="row">
              <div class="col-lg-6 col-xs-12 col-sm-12" class="status" id="status">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-bar-chart font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Status</span>   
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv1">                   
                    </div>
                  </div>
                </div>                  
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12" class="freq" id="freq">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Frequency</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv2">                     
                    </div>                  
                  </div>
                </div>                
              </div>
               <div class="col-lg-6 col-xs-12 col-sm-12" class="location" id="location">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Location</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv3">                     
                    </div>                  
                  </div>
                </div>                
              </div>
               <div class="col-lg-6 col-xs-12 col-sm-12" class="department" id="department">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Department</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv4">                     
                    </div>                  
                  </div>
                </div>                
              </div>
               <div class="col-lg-6 col-xs-12 col-sm-12" class="compliance" id="compliance">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Compliance</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv5">                     
                    </div>                  
                  </div>
                </div>                
              </div>
               <div class="col-lg-6 col-xs-12 col-sm-12" class="audit" id="audit">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Audit</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv6">                     
                    </div>                  
                  </div>
                </div>                
              </div>
<!-- Bar
 -->
                <div class="col-lg-6 col-xs-12 col-sm-12" class="auditbar" id="auditbar">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Status</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv7" style="width: 100%; height: 400px;">                     
                    </div>                  
                  </div>
                </div>                
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12" class="frequencybar" id="frequencybar">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Frequency</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv8" style="width: 100%; height: 400px;">                     
                    </div>                  
                  </div>
                </div>                
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12" class="locationbar" id="locationbar">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Location</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv9" style="width: 100%; height: 400px;">                     
                    </div>                  
                  </div>
                </div>                
              </div>
             <div class="col-lg-6 col-xs-12 col-sm-12" class="departmentbar" id="departmentbar">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Department</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv10" style="width: 100%; height: 400px;">                     
                    </div>                  
                  </div>
                </div>                
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12" class="compliancebar" id="compliancebar">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Compliance</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv11" style="width: 100%; height: 400px;">                     
                    </div>                  
                  </div>
                </div>                
              </div>
              <div class="col-lg-6 col-xs-12 col-sm-12" class="audittypebar" id="audittypebar">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-share font-red-sunglo hide"></i>
                      <span class="caption-subject font-dark bold uppercase">Audit Type</span>         
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv12" style="width: 100%; height: 400px;">                     
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
  <?php include "../audit/sidemenu.php"; ?>
       </body>
       <script type="text/javascript">
    $(document).ready(function() {  
    var url = window.location.href;
    var id = url.substring(url.lastIndexOf('/') + 1);
if(id==1)
{
  $('#freq').hide();
  $('#location').hide();
  $('#department').hide();
  $('#compliance').hide();
  $('#audit').hide();
  $('#auditbar').hide();
  $('#frequencybar').hide();
  $('#locationbar').hide();
  $('#departmentbar').hide();
  $('#compliancebar').hide();
  $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditstatuschartdet.php",
              data:"",
              success: statuspie
            }); 
    }
    if(id==2)
    {
       $('#status').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditfrequencychartdet.php",
              data:"",
              success: auditfrequency
            }); 
    }
    if(id==3)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditLocationchartdet.php",
              data:"",
              success:auditLocation
            });
    }
    if(id==4)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditDepartmentchartdet.php",
              data:"",
              success:auditDepartment
            });
    }
    if(id==5)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/compliancepie.php",
              data:"",
              success:compliancepie
            });
    }
     if(id==6)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/audittypechart.php",
              data:"",
              success:audittype
            });
    }
    if(id==7)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
     $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditstatuschartdet.php",
              data:"",
              success: statusbar
            }); 
    }
    if(id==8)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditfrequencychartdet.php",
              data:"",
              success: frequencybar
            }); 
    }
    if(id==9)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditLocationchartdet.php",
              data:"",
              success:localbar
            });
    }
    if(id==10)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#compliancebar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/auditDepartmentchartdet.php",
              data:"",
              success:Departmentbar
            });
    }
    if(id==11)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#audittypebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/compliancepie.php",
              data:"",
              success:compliancebar
            });
    }
    if(id==12)
    {
       $('#status').hide();
       $('#freq').hide();
       $('#location').hide();
       $('#department').hide();
       $('#compliance').hide();
       $('#audit').hide();
       $('#auditbar').hide();
       $('#frequencybar').hide();
       $('#locationbar').hide();
       $('#departmentbar').hide();
       $('#compliancebar').hide();
      $.ajax({
              type:"POST",
              dataType: "json",
              url: "php/common/audittypechart.php",
              data:"",
              success:audittypebar
            });
    }
      function statuspie(data){
  var chartData=[];
for(i=0;i<data.length;i++)
     {
    chartData.push({"name":data[i].status,"y":parseInt(data[i].count)});
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
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
      function auditfrequency(data){
  var chartData=[];
for(i=0;i<data.length;i++)
     {
    chartData.push({"name":data[i].audit_freq,"y":parseInt(data[i].count)});
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
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
      function auditLocation(data){
  var chartData=[];
for(i=0;i<data.length;i++)
     {
    chartData.push({"name":data[i].name,"y":parseInt(data[i].count)});
      } 
Highcharts.chart('chartdiv3', {

  //  colors: ['#ADD8E6', '#E6ACD7', '#B2B2B2', '#D0D050', 'green', 'skyblue',
  //   '#FF9655', '#FFF263', '#6AF9C4'
  // ],     
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
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
      function auditDepartment(data){
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
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
      function compliancepie(data){
  var chartData=[];
for(i=0;i<data.length;i++)
     {
    chartData.push({"name":data[i].name,"y":parseInt(data[i].count)});
      } 
Highcharts.chart('chartdiv5', {

  //  colors: ['#ADD8E6', '#E6ACD7', '#B2B2B2', '#D0D050', 'green', 'skyblue',
  //   '#FF9655', '#FFF263', '#6AF9C4'
  // ],     
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
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}
function audittype(data){
  var chartData=[];
for(i=0;i<data.length;i++)
     {
    chartData.push({"name":data[i].audit_type,"y":parseInt(data[i].count)});
      } 
Highcharts.chart('chartdiv6', {

  //  colors: ['#ADD8E6', '#E6ACD7', '#B2B2B2', '#D0D050', 'green', 'skyblue',
  //   '#FF9655', '#FFF263', '#6AF9C4'
  // ],     
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
        name:'name',
        colorByPoint: true,
        data:chartData,
    }]
});
}





// // bar
function statusbar(data){
  var chart = AmCharts.makeChart( chartdiv7, {
  "type": "serial",
  "hideCredits":true,
  "theme": "light",
  "dataProvider":data,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "count"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "status",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 200
  },
  "categoryAxis":{
    "gridPosition" : "start",
    "labelRotation":15
  },

  "export": {
    "enabled": true
  }
});
}
function frequencybar(data){
  //console.log(data);
  var chart = AmCharts.makeChart( chartdiv8, {
  "type": "serial",
  "hideCredits":true,
  "theme": "light",
  "dataProvider":data,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "count"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "audit_freq",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 200
  },
  "categoryAxis":{
    "gridPosition" : "start",
    "labelRotation":15
  },

  "export": {
    "enabled": true
  }
});
}
function localbar(data){
  //console.log(data);
  var chart = AmCharts.makeChart( chartdiv9, {
  "type": "serial",
  "hideCredits":true,
  "theme": "light",
  "dataProvider":data,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "count"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "name",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 200
  },
  "categoryAxis":{
    "gridPosition" : "start",
    "labelRotation":15
  },

  "export": {
    "enabled": true
  }
});
}
function Departmentbar(data){
  //console.log(data);
  var chart = AmCharts.makeChart( chartdiv10, {
  "type": "serial",
  "hideCredits":true,
  "theme": "light",
  "dataProvider":data,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "count"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "name",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 200
  },
  "categoryAxis":{
    "gridPosition" : "start",
    "labelRotation":15
  },

  "export": {
    "enabled": true
  }
});
}



function compliancebar(data){
  var chart = AmCharts.makeChart( chartdiv11, {
  "type": "serial",
  "hideCredits":true,
  "theme": "light",
  "dataProvider":data,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "count"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "name",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 200
  },
  "categoryAxis":{
    "gridPosition" : "start",
    "labelRotation":15
  },

  "export": {
    "enabled": true
  }
});
}
function audittypebar(data){
  var chart = AmCharts.makeChart( chartdiv12, {
  "type": "serial",
  "hideCredits":true,
  "theme": "light",
  "dataProvider":data,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "count"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "audit_type",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 200
  },
  "categoryAxis":{
    "gridPosition" : "start",
    "labelRotation":15
  },

  "export": {
    "enabled": true
  }
});
}
});
          </script>
          <script>
            function previous(){
              window.location.replace("/freshgrc/view/audit/auditConfigurableDashboard.php");
            }
          </script>
   </body>
  </body>
</html>