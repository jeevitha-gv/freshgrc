


<?php require_once __DIR__.'/../header.php';?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fresh GRC Admin</title>
    <base href="/freshgrc/">
     
    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>   -->
    <!-- <script type="text/javascript" src="assets/DataTables/DataTables-1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
           <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
        <script type="text/javascript" src="assets/DataTables/pdfmake.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>    
   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">
    <script src="js/asset/assetLocation.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


</head>

  <style>
        #viewdata {
          margin-left: 280px;
          margin-top: -198px;
          margin-right: 135px;
          margin-bottom: 40px;
        }
        i.fa-vibe {
            content: "";
            background-image: url('complaints.png');
            width: 50px;
            height: 50px;
            display: inline-block;
            background-position: center;
            background-size: cover;
        }
        label{
        font-weight: 600;
        }
        body{
          font-size: 14px;
        }
        body, h1, h2, h3, h4, h5, h6 {
          font-family: "Open Sans",sans-serif;
        }
        .hover{
          color:none;
        }
        .panel{
          background-color: #fff;
          border: 1px solid #32c5d2;
          margin-bottom: 20px;
          box-shadow: none!important;
          border-radius: 0!important;
          color: rgba(0,0,0,0.87);
          padding: 20px;
          width: 1150px;
        }
        .btn{
          border-radius: 0px !important;
          border: none !important;
        }
        .form-control{
              border-radius: 0px;
        }
        .label{
          font-size: bold;
        }
        .panel-heading{
          background-color: #32c5d2; color:#fff;
          width: 1150px;margin-left: -20px;margin-top: -21px;font-weight: 600
        }
        .split{
          width: 300px;padding-right: 15px
        }
        .split1{
          width: 290px;padding-left: 15px;padding-right: 15px
        }
        .split2{
          margin-left: 295px;margin-top: -69px;width: 290px;
        }
        .portlet.box .dataTables_wrapper .dt-buttons {
    margin-top: -6px !important;
}
       .portlet.box .dataTables_wrapper .dt-buttons {
    margin-top: -35px !important;
}

#chartdiv {
  width: 100%;
  height: 500px;
}					

#legend td:nth-child(odd) {
  cursor:pointer;
}

    </style>
<body >

    <?php
        include '../siteHeader.php'; 
        include '../common/leftMenu.php';
        $currentMenu = 'assetAdmin';
        
        $userRole = $_SESSION['user_role'];
    ?>
    
  
 <div class="page-content-wrapper">
    <div class="page-content">              

      <div class="row">
        <div class="col-md-12">
          <div class="portlet box green">
            <div class="portlet-title">
              <div class="caption">Location Of Assets</div>                          
            </div>

            <div class="portlet-body ">
              <div id="chartdiv"></div>    
            </div>
          </div>
        </div>
      </div>
          
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box green">
            <div class="portlet-title">
              <div class="caption">Assets</div>
            </div>
            <div class="portlet-body ">
          
              <table id = "legend" class="table">
                <thead>
                  <th>Name</th>
                  <th>Location</th>
                <thead>
                <tbody>
                  <tr>
                    <td>Asset 1</td>
                    <td>Location 1</td>
                  </tr>
                  <tr>
                    <td>Asset 2</td>
                    <td>Location 2</td>
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


</html>