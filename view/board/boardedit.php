
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
    <title>Minutes Edit</title>
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
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
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
        <div style="margin-top: 40px !important;">
       <?php
       include 'boardleft.php';
       ?>

      </div>
      <?php
      $userRole = $_SESSION['user_role'];
    ?>   

  <body class="dataTables">
    <div class="container" id="myModal">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary" style="border-color:#32c5d2;">
            <div class="panel-heading"  style="background-color: #32c5d2;font-size: 18px !important;">PUBLISH</div>
              <div class="panel-body">
              <div class="clearfix"></div>  
                      <?php
                        $var=$_GET['userid'];
                            $sql = "SELECT * from boardindex WHERE m_no=$var LIMIT 1";
                        $result = mysqli_query($link, $sql);


                        if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_array($result))
                        {
                        $m_no = $row['m_no']; 
                          
                      ?>      


                <form id="form1" action="" method="POST">
               

                 
                
            
          
             
                  <div class="panel panel-default">
                    <div class="panel-heading">General</div>
                    <div class="panel-body">
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
        </div>
      </div>
                                           
                           
<?php

}
  }else {
    echo "0 results";
}

?>
             
                  

                                      <?php
                    $var=$_GET['userid'];
    $sql = "SELECT * from boardminutes as bm, boardindex as bi WHERE bi.m_no=$var LIMIT 1";
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
{
  
  
  ?>  
                    <div class="panel panel-default">
                    <div class="panel-heading">Minutes
                      <!-- <button class="btn btn-warning" style="float: right; height: 30px; margin-top: -5px;"><a href="view/board/disapprove.php?userid=<?php echo $row['m_no']; ?>">Edit</a></button> -->
                    </div>
                     
                    <div class="panel-body">
                      <form class="" method="post">
                      <div class="row">
                    <div class="col-md-2">
               <input type="hidden" class="form-control" id="title" name="m_no" value="<?php echo $m_no;?>">

                       <label >Author</label>
                      <?php $array = explode(',',$row['user']);?>
            <input type="text" class="form-control" value=
            "<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " ";
            }
            ?>"
            disabled>  
                    </div>
                    <?php
$var=$_GET['userid'];
    $sql = "SELECT * from boardagenda as ba,boardminutes as bm WHERE ba.m_no=bm.m_no AND ba.m_no=$var LIMIT 1";
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
{
$m_no = $row['m_no']; 
  
  ?>  
                    <div class="col-md-2">
                       <label >Agenda</label>
                      <input type="text" class="form-control" id="agenda" name="agenda" value="<?php echo $row['topic'];?>" disabled>  
                    </div>
                    <div class="col-md-2">
                       <label >synopsis</label>
                      <input type="text" class="form-control" id="synopsis" name="synopsis" value="<?php echo $row['synopsis'];?>" disabled>  
                    </div>
                    <div class="col-md-2">
                       <label >Action Items:</label>
                      <input type="text" class="form-control" id="synopsis" name="action_item" value="<?php echo $row['action_item'];?>">  
                    </div>
                    <div class="col-md-2">
                       <label >owner:</label>
                      <?php include '../common/boarduserdropdown.php';?> 
                    </div>
                    <div class="col-md-2">
                       <label >Deadline</label>
                      <input type="Date" class="form-control" id="synopsis" name="deadline" value="<?php echo $row['deadline'];?>">  
                    </div>
                    </div>
                    </div>
            </div>
            <?php } } else { echo "0 results"; } ?>
                         <?php
              if($_POST)
              {
                boardedits();
              }
              ?>        
                    
          
               
          <input type="submit" class="btn btn-primary" name="submit">

                      <!-- <div class="row">
                        <div class="col-md-4">
                               <input type="hidden" class="form-control" id="title" name="m_no" value="<?php echo $m_no;?>">
                      <label>Artifacts</label>
                  <i class="fa fa-paperclip" type="file" onclick="openfileDialog(10200);" name="files" title="Load File" aria-hidden="true" style="color: #337ab7; font-size: 25px; margin-top: 20px;"></i>
                </div>
                      </div> -->
                    <div>
              
            </div>
              </div>
          </form>

          
 <!--  <div class="footer">
<button class="btn btn-danger"><a href="view/board/boardapprove.php?userid=<?php echo $row['m_no']; ?>">Approve</a></button>
 <button class="btn btn-success"><a href="view/board/disapprove.php?userid=<?php echo $row['m_no']; ?>">DisApprove</a></button>
             

<button type="button"  class="btn btn-info" style="background-color: #1CA08A;" data-toggle="modal" data-target="#exampleModal">Vote
</button>
<form action="" method="post">
<?php
if($_POST['save'])
{
boardtopic();
}
?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Topics</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="title" name="m_no" value="<?php echo $m_no;?>">
       <input type="text" name="topic" class="form-control" placeholder="Type topics here....">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" value="save" name="save"><a href="view/board/voteall.php?userid=<?php echo $row['m_no'];?>">Save</a></button>
      </div>
    </div>
  </div>
</div> -->
</form>
<?php
}
  }else {
    echo "0 results";
}
?>
</div>
</div>
</div>
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

    

   

