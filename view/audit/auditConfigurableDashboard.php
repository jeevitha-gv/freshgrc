<?php require_once __DIR__.'/../header.php';
$complianceWiseStatusGraph=false;
require_once __DIR__.'/../../php/common/dashboard.php';
$manager=new dashboard();
$chartTypes=$manager->chartTypes($_SESSION['company']);
$chartDataTypes=$manager->chartDataType($_SESSION['company']);
$chartDatas=$manager->chartData($_SESSION['company']);
error_log("chartdata".print_r($chartDatas,true));

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
   <script src="js/audit/auditConfigurableDashboardManagement.js"></script>
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
     
      .chartDiv{
        height: 350px;
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
       // include '../audit/sidemenu.php';
     ?>
        <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"style="margin-top:-2%;">
       <div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="conainer text-center">
            <div class="row form-group text-center mx-auto">
              <input type="hidden" id="company" value="<?php echo $_SESSION['company'] ?>">
              <input type="hidden" id="user" value="<?php echo $_SESSION['user_id'] ?>">
            <label for="chartType form-control-label col-md-1"><strong><h5>Data:</h5></strong></label> &nbsp; &nbsp;
            
            <select onchange="getData()" class="form-control col-lg-11 col-md-11 col-xl-11" id="chartData"> 
              <option>Select</option>
              <?php foreach ($chartDataTypes as $chartData) {
                ?>
                <option value="<?php echo $chartData['id'] ?>"><?php echo $chartData['name'] ?> </option>
                <?php }?>
              <!-- <?php foreach ($chartTypes as $chartData) {
                ?>
                <option value="<?php echo $chartData['id'] ?>"><?php echo $chartData['name'] ?> </option>
                <?php }?> -->
            </select>     
            
            </div>
            <div class="row">
            <?php foreach($chartDatas as $chartData){ ?>
            

              <div class="col-md-6">                  
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-bar-chart font-dark hide"></i>
                      <span class="caption-subject font-dark bold uppercase"><?php echo $chartData['data'] ?></span>            
                    </div>                 
                  </div>
                  <div class="portlet-body">                  
                    <div id="chartdiv<?php echo $chartData['id'] ?>" class="display-none chartDiv" style="display: block;">                   
                    </div>
                  </div>
                </div>                  
              </div>
         
            <?php } ?>
            </div>
                  <div class="modal" tabindex="-1" role="dialog" id="dataModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label>Chart type</label>
              <select class="form-control" id="chartType">
                 <option>Select</option>
                <?php foreach ($chartTypes as $chartData) {
                ?>
                <option value="<?php echo $chartData['id'] ?>"><?php echo $chartData['name'] ?> </option>
                <?php }?>
               <!--  <?php foreach ($chartDataTypes as $chartData) {
                ?>
                <option value="<?php echo $chartData['id'] ?>"><?php echo $chartData['name'] ?> </option>
                <?php }?> -->
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="saveChartData()">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
          </div>  
          </div>
          </div> 
        </div>
         <div>
</div>
</div>
</div>
</div>
</div>
<?php include "../audit/sidemenu.php"; ?>
</body>


</html>