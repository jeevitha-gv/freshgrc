<!-- <?php require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
?> -->
<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plan Creation</title>
    <base href="/freshgrc/">


    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />

    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>      
    <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css" />    
    <script src="boardmeetingsample.js"></script>


    <link href="assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="assets/img/favicon.png" rel="icon" type="image/png">
    <link href="assets/img/favicon.ico" rel="shortcut icon">
    <!-- metronic link for multiselect -->
    <link href="metronic/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <!-- end -->
<!-- script link  multi select-->
        <script src="metronic/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="metronic/theme/assets/global/scripts/app.min.js" type="text/javascript"></script>
         <script src="metronic/theme/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="assets/css/lib/font-awesome/font-awesome.min.css"> 
  </head>
  <style type="text/css">
  .page-sidebar{
         margin-top: 3%;
      }
      .page-container {
    margin: 0;
    padding: 20px 20px 0;
    position: relative;
}
.page-sidebar.navbar-collapse {
    max-height: none!important;
    position: fixed;
}
.panel-primary {
    border-color: #32c5d2;
  /*margin-top: 20px;*/
    width: 90%;
    margin:auto;
    background-color: #32c5d2;
    margin: 50px 0px 0px 150px;
}
.panel-success
{
background-color: #32c5d2; 
color:white; 
}
.button
{
  margin-left: 46%;
  color:white;
  background-color:#32c5d2;
  border:none; 
  margin-top: 8px;
  border-radius: 24px;
  height:35px;
  width: 95px;
}
label
{
  font-family: "Open Sans",sans-serif;
  font-size: 14px;
  font-weight: 500px;
}
.form-group {
    margin-bottom: 18px;
}
/*#Single_Loss_Expectancy_Before_Safeguard,#Anualized_Loss_Expection_Before_Safeguard,#Single_Loss_Expectancy_After_Safeguard,#Anualized_Loss_Expection_After_Safeguard 
*/{
  border:none;
  /*cursor:text;*/
}
.modal-footer
{
  margin-top: 20px;
}
</style>
<body class="with-side-menu-compact" onload="getAction()">

    <?php 
        include '../siteHeader.php';
        $currentMenu = 'riskAdmin';
        ?>
        <div style="margin-top: 30px !important;">
        <?php 
        include '../common/leftMenu.php';
        
        ?>

      </div>
      <?php
      $userRole = $_SESSION['user_role'];
    ?>   

  <body class="dataTables">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary" style="border-color:#32c5d2;">
            <div class="panel-heading"  style="background-color: #32c5d2;font-size: 18px !important;">TERMS OF REFERENCE</div>
              <div class="panel-body">
              <div class="clearfix"></div>          
                         
                <form id="form1">
               

                 
                <div class="row">
                  <div class="col-md-4">
                    <label>username</label>
                     <input type="text" class="form-control" id="username" name="username">
                  </div>
                </div>
                  
                <div class="row">
                 <div class="col-md-4">
                 
                    <label >Email</label>
                      <input type="email" class="form-control" id="email" name="email">        
                </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                 
                    <label >user Role</label>
                      <input type="text" class="form-control" id="role" name="role">        
                </div>
                   </div>
              
              <div>
              <input type="submit" name="submit" value="Adduser">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</body>
</html>
             
 