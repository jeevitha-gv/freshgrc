<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/asset/assetManager.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$assetId = $_GET['assetId'];
$user = new AssetManager();
$assetDetails = $user->getAssetDetails($assetId);
$assetAssesmentDetails = $user->getAssetAssement($assetId);
$assetReviewDetails = $user->getAssetReview($assetId);

$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asset History</title>
    <base href="/freshgrc/">

    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>      
    <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css"/>
    <link href="metronic/theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- <script type="text/javascript" src="assets/MDB Free/js/mdb.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/MDB Free/css/mdb.min.css">  -->

        <script src="metronic/theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        
        <!-- <script src="metronic/theme/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
 -->

   
    <script src="assets/multiselectDropdown/bootstrap-multiselect.js" type="text/javascript"></script>  
    <link rel="stylesheet" type="text/css" href="assets/multiselectDropdown/bootstrap-multiselect.css">
    
    <script src="js/asset/assetHistory.js"></script>
    <link href="metronic/theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    

        
    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/DataTables/Bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet"> -->
    <link href="assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="assets/img/favicon.png" rel="icon" type="image/png">
    <link href="assets/img/favicon.ico" rel="shortcut icon">
     <link rel="stylesheet" href="assets/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>

    <style>
        #viewdata {
            margin-left: 285px;
            margin-top: 100px;
            margin-right: -20px;
            margin-bottom: 55px;
        }

        table{
            width:50%;
        }

        #history td {
            width:50%;
        }

        #history a {
            display: block;
        }

        #history a:hover{
            background-color: rgb(220,220,220);
        }

        #history ul {
            list-style-type:disc;
        }

        table,
        th,
        td {
            border: 0px !important;
        }
        td {
            height: 50px;
            vertical-align: middle;
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
        .panel-heading h3 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: normal;
            width: 75%;
            padding-top: 8px;
        }
        
        .note{
          margin-top:-20px;
        }
        .multiselect-selected-text{
          color:black;
        }
        .event{
            display:none;
        }

        
      </style>
</head>

<body  style="background-color: #f0f5f5">
    <!-- List of events to be added here,format : <span class="event">date <p>subevent1</p><p>subevent2.....</p></span> -->
    <span class = "event"><?php echo $assetDetails[0]['created_date']; ?>
        <p>Created by <?php echo $assetDetails[0]['ownerName']; ?></p>
        <p><?php echo $assetDetails[0]['name']; ?> added to <?php echo $assetDetails[0]['assetGroup']; ?></p>
        <p>Classification : <?php echo $assetDetails[0]['classification']; ?></p></span>
    <span class = "event"><?php echo $assetDetails[0]['updated_date']; ?>
        <p>Modified by <?php echo $assetDetails[0]['updaterName']; ?></p></span>
                

    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
    <input type="hidden" class="form-control" id="assetId">
    <input type="hidden" class="form-control" id="action" value="create">
    

   
    <div class="page-content-wrapper" style="margin: 1%;margin-top: -2%;"  >
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content"  id="element-to-print">
            <div class="panel" style="border: 1px solid #32c5d2;">
                <div class="panel-heading" style="background-color: #32c5d2; color:#fff;">History of <?php echo $assetDetails[0]['name']; ?></div>
                <div class="panel-group" id="history"></div>
            </div>
           
    </div>
        </div>

 <button class="btn" style="margin-top: 1%; margin-left:1%;color: #fff;margin-bottom: 1%;background-color: #30c2d0; color:#fff;" onclick="goToPreviousPage()"><span class="glyphicon glyphicon-menu-left"></span></button>
</body>
</html>