
<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/asset/assetManager.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$assetId = $_GET['assetId'];
$user = new AssetManager();
$lastname = $user->getAlluser();
$classification = $user->getClassfication();
$asset_group = $user->getAssetGroup();
$assetDetails = $user->getAssetDetails($assetId);
$assetAssesmentDetails = $user->getAssetAssement($assetId);

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
    <title>Fresh GRC Admin</title>
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
    
    <script src="js/asset/assetManagement.js"></script>


        
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

    <style>
        #viewdata {
            margin-left: 285px;
            margin-top: 100px;
            margin-right: -20px;
            margin-bottom: 55px;
        }
        table,
        th,
        td {
            /*border: 1px solid black;*/
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
        
        .ui-datepicker { position: relative; z-index: 10000 !important; } 
        .note{
          margin-top:-20px;
        }
        .multiselect-selected-text{
          color:black;
        }
        
      </style>
</head>

<body  style="background-color: #f0f5f5">

    <?php 
        include '../siteHeader.php';
        $currentMenu = 'assetAdmin';
        include '../common/leftMenu.php';
    ?>
  


    <body>
 <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
              <input type="hidden" class="form-control" id="assetId">
              <input type="hidden" class="form-control" id="action" value="create">
               <input type="hidden" class="form-control" id="company" value="<?php echo $assetDetails[0]['complianceId']; ?>">
    <div class="page-content-wrapper" style="margin: 12px;margin-top: -5%;" >
      <!-- BEGIN CONTENT BODY -->
      <div class="page-content" >
        <div class="panel" style="border: 1px solid #32c5d2;">
          <div class="panel-heading" style="background-color: #32c5d2; color:#fff;">Action</div>
        <div class="panel-body">
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr">Display Name:</label>
                <p><?php echo $assetDetails[0]['name']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr">Asset Group:</label>
                <p><?php echo $assetDetails[0]['assetGroup']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr">Status:</label>
                <p><?php echo $assetDetails[0]['status']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <label for="usr">ComplianceName:</label>
                <p><?php echo $assetDetails[0]['complianceName']; ?></p>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table class="table table-striped table-bg">
                  <tbody><tr>
                    <th colspan="6" class="asset-th" style="background-color: #f5f5f5;font-weight:500;font-size:12px;color:#333"><h5><strong>Assignment / Security / CIA Information</strong></h5></th>
                  </tr>
                  <tr>
                    <td><label>Owner : </label>
                      <span><?php echo $assetDetails[0]['ownerName']; ?></span></td>
                    <td><label>Custodian : </label>
                      <span><?php echo $assetDetails[0]['custodianName']; ?></span></td>
                    <td><label>Identifier : </label>
                      <span><?php echo $assetDetails[0]['ReviewerName']; ?></span></td>
                  </tr>
                  <tr>
                    <td><label>Evaluator/CIO : </label>
                    <span><?php echo $assetDetails[0]['description']; ?></span></td>
                    <td><label>Location : </label>
                      <span><?php echo $assetDetails[0]['locationname']; ?></span></td>
                    <td><label>Department : </label>
                      <span> <?php echo $assetDetails[0]['departmentname']; ?></span></td>
                  </tr>
                  <tr>
                    <td><label>Confidentiality :</label>
                      <span><?php echo $assetDetails[0]['confidentiality']; ?></span></td>
                    <td><label>Integrity : </label>
                      <span><?php echo $assetDetails[0]['integrity']; ?></span></td>
                    <td><label>Availability : </label>
                      <span><?php echo $assetDetails[0]['availability']; ?></span></td>
                  </tr>
                  <tr>
                    <td><label>Personal Data :</label>
                      <span><?php echo $assetDetails[0]['personal_data']; ?></span></td>
                    <td><label>Sensitive Data : </label>
                      <span><?php echo $assetDetails[0]['sensitive_data']; ?></span></td>
                    <td><label>Customer Data : </label>
                      <span><?php echo $assetDetails[0]['customer_data']; ?></span></td>
                  </tr>
                  <tr>
                      <td><label>Classification : </label>
                      <span><?php echo $assetDetails[0]['name']; ?></span></td>
                      <!-- <td><label>Document: </label> -->
                      <!-- </td> -->
                    <td></td>
                  </tr>
                </tbody></table>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="form-group clearfix">
              <div class="col-sm-12" style="background-color: #f5f5f5;font-weight:500;font-size:12px;color:#333;padding:5px">
                <label for="usr">Assessment:</label>
                <span><?php echo $assetAssesmentDetails[0]['assessment']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group clearfix">
              <div class="col-sm-12" style="background-color: #f5f5f5;font-weight:500;font-size:12px;color:#333;padding:5px">
                <label for="usr">Conclusion:</label>
                <span><?php echo $assetAssesmentDetails[0]['conclusion']; ?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="tab-pane active asset-border" id="all">
              <div class="table-responsive">
                <table class="table table-striped table-bg">
                  <tbody><tr>
                    <th colspan="6" class="asset-th" style="background-color: #f5f5f5;font-weight:500;font-size:12px;color:#333"><h5><strong>Information Asset Properties</strong></h5></th>
                  </tr>
                  <tr>
                    <td><label>Current Level of Protection - When Information is in rest : </label>            
                        <span>
                          High
                        </span>              
                      <span>
                    </span></td>
                    <td><label>Current Level of Protection - When Information is moved : </label>
                      <span>
                        Low
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label>Data Retention Period (in Years) :</label>
                      <span> <?php echo $assetDetails[0]['retentionPeriod'];?></span>
                    </td>
                  </tr>
                </tbody></table>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-top">
            <div class="form-group clearfix">
              <div class="col-sm-12">
                <div class="panel panel-default">
                  <div class="panel-heading text-center"><h5><strong>Assessment Done</strong></h5></div>
                  <div class="panel-body">
                    <form name="userForm" id="assetActionForm" >
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr">Control for Labelling:</label>
                               <div class="form-group " id="labelling" >
                              <?php include '../common/controldropdown.php';?> 
                           </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr">Control for Disposal:</label>
                              <div class="form-group " id="disposal" >
                              <?php include '../common/controldropdisposal.php';?> 
                           </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr">Control for Storage:</label>
                                <?php include '../common/controlforStoragedropdown.php';?> 
                            <h6><strong>*Note:</strong>Multiple Select</h6>
                            </div>
                            </div>
                        </div>
                      <!-- </div> -->
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr">Control for Transport or Transmission:</label>
                                  <?php include '../common/controlfortransdropdown.php';?> 
                             <h6><strong>*Note:</strong>Multiple Select</h6>
                            </div>
                          </div>
                        </div>
                      <!-- </div> -->
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="usr">Control for Addressing:</label>
                              <?php include '../common/controlforaddressingdropdown.php';?> 
                              <h6><strong>*Note:</strong>Multiple Select</h6>
                          </div>
                        </div>
                      </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <label for="comment">Comment:</label>
                            <textarea name="description" class="form-control"  rows="3"></textarea>
                           </div>
                        </div>
                      </div>
                      <!-- </div> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="form-group clearfix">
                          <div class="col-sm-12">
                            <button type="button" class="btn btn-circle green" onclick="createAssetAction()">ADD ACTION</button>
                          </div>
                        </div>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        </body>
</html>