<?php
require_once "../../php/common/config.php";
require_once 'functions/boardfunctions.php';
session_start();
ob_start();
?>
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
       include 'boardleft.php';
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
            <div class="panel-heading"  style="background-color: #32c5d2;font-size: 18px !important;">MINUTES</div>
              <div class="panel-body">
              <div class="clearfix"></div>  
                          <?php
              if($_POST)
              {
                boardminutes();
              }
              ?>        
                    
              <?php

    
$var=$_GET['userid'];
    $sql = "SELECT * from boardindex WHERE m_no=".$var;
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
{
$m_no = $row['m_no']; 
  
  ?>         
                <form id="form1" action="" method="POST">
               

                 
                <div class="row">
                  <div class="form-group">
                  <div class="col-md-6">
                    <label>Meeting Title</label>
        
                     <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>" disabled>
                  </div>
                  
                 <div class="form-group">
                 <div class="col-md-4">
                 
                    <label >Date</label>
                      <input type="text" class="form-control" id="Date" name="date" value="<?php echo $row['date'];?>" disabled>        
                </div>
              </div>
                 </div>
              </div><br />
            
          
             
                  <div class="panel panel-default">
                    <div class="panel-heading">General</div>
                    <div class="panel-body">
                      <div class="row">
                      <div class="col-md-4">
                        <label for="usr">purpose:</label>
                        <input type="text" class="form-control" value="<?php echo $row['purpose'];?>" disabled>
            </div>
             <div class="col-md-4">
                        <label for="usr">Responibities:</label>
                        <input class="form-control" value="<?php echo $row['responsibities'];?>" disabled> 
            </div>
             <div class="col-md-4">
                        <label for="usr">Output:</label>
                        <input class="form-control" value="<?php echo $row['output'];?>" disabled> 
            </div>
          </div>
        </div>
      </div>
                                           
                           <div class="row">
             <div class="col-md-4">
                          <div class="form-group" id="user">
                            <div class="form-group">
        <label for="multi-append" class="control-label" style="font-size: 13px;">Members</label>        
       <div class="input-group select2-bootstrap-append col-md-12">
            

            <?php $array = explode(',',$row['user']);?>
            <input type="text" class="form-control" value=
            "<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . ", ";
            }
            ?>"
            disabled>
        </div>
        </div>
                          </div>
                        </div>
             <div class="col-md-4">
                          <div class="form-group" id="user">
                            <label>Admin</label>
                                                        
                            <?php $array = explode(',',$row['admin']);?>
            <input type="text" class="form-control" value=
            "<?php
            foreach ($array as $member){
              $membername=getadminnamefromid($member);
              echo $membername . ", ";
            }
            ?>"
            disabled>
                            
                          </div>
                        </div>
                      </div>
<?php

}
  }else {
    echo "0 results";
}

?>
             
                  
                    <div class="panel panel-default">
                    <div class="panel-heading">Minutes</div>
                    <div class="panel-body">
                      <div class="row">
                    <div class="col-md-4">
               <input type="hidden" class="form-control" id="title" name="m_no" value="<?php echo $m_no;?>">

                       <label >Author</label>
                      <input type="text" class="form-control" id="author" name="author">  
                    </div>
                    <div class="col-md-4">
                       <label >Agenda</label>
                      <input type="text" class="form-control" id="agenda" name="agenda">  
                    </div>
                    <div class="col-md-4">
                       <label >synopsis</label>
                      <input type="text" class="form-control" id="synopsis" name="synopsis">  
                    </div>
                    </div><br />
                    <?php
                    $var=$_GET['userid'];
    $sql = "SELECT * from boardagenda WHERE m_no=".$var;
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
{
  
  
  ?>  
                      <div class="row">
                      <div class="col-md-4">
                        <label for="usr">Action Items:</label>
                        <input type="text" class="form-control" value="<?php echo $row['action_items'];?>" disabled>
                        </div>
                        <div class="col-md-4">
                        <label for="usr">Owner:</label>
                        <?php $array = explode(',',$row['owner']);?>
                        <input type="text" class="form-control" value=
                        "<?php
                        foreach ($array as $member){
                          $membername=getusernamefromid($member);
                          echo $membername . ", ";
                        }
                        ?>"
                        disabled>
                        </div>
                        <div class="col-md-4">
                        <label for="usr">Deadline:</label>
                        <input type="text" class="form-control" value="<?php echo $row['deadline'];?>" disabled>
                        </div>
                      </div>
                      <?php

}
  }else {
    echo "0 results";
}

?>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <label>Reason for disapproval</label>
                      <input tyep="text" name="reason" class="form-control"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Artifacts</label>
                  <i class="fa fa-paperclip" type="file" onclick="openfileDialog(10200);" name="files" title="Load File" aria-hidden="true" style="color: #337ab7; font-size: 25px; margin-top: 20px;"></i>
                </div>
              </div>

  
                    
                    <button type="submit" id="submit" class="btn btn-primary">submit</button>
               
              </div>
          </form>
  
      </div>
    </div>
  </div>
</div>
</body>
</body>
</html>
<script>
        var allClauses=<?php echo json_encode($GLOBALS['allClausesArray'])?>;
        
function openfileDialog(checklistId) {
    $("#userFile"+checklistId).click();
}
    </script> 

