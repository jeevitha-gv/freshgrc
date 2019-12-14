
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
        include 'boardleft.php';
        
        ?>

      </div>

    <body class="dataTables">
    <div class="container" style="width: 92%">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary" style="border-color:#32c5d2;">
            <div class="panel-heading"  style="background-color: #32c5d2;font-size: 18px !important;">VOTING</div>
              <div class="panel-body">
              <div class="clearfix"></div>          
                         
                <form id="form1" action="" method="post">

                        <?php
                        $var=$_GET['userid'];
                            $sql = "SELECT * from boardindex WHERE m_no=".$var;
                        $result = mysqli_query($link, $sql);


                        if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_array($result))
                        {
                        $m_no = $row['m_no']; 
                          
                      ?> 


<div class="row">
                 <div class="col-md-6">
                    <label >Meeting Title</label>
                    <input type="hidden" class="form-control" value="<?php echo $row['m_no'];?>">
                      <input type="text" class="form-control" value="<?php echo $row['title'];?>" disabled>        
                </div>
                <div class="col-md-4">
                    <label >Date</label>
                      <input type="text" class="form-control" value="<?php echo $row['date'];?>" disabled>        
                </div>
               </div><br>

               <div>          
        <table id="userdetails" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" >
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Agenda</th> 
                    <th>Synopsis</th>                       
                    <th>Action Item</th>
                    <th>Owner</th>
                    <th>Deadline</th> 
                    <th style="width: 300px;">Update</th>
                    <th>Status</th>
                    <th>Action</th>                       
                </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php $array = explode(',',$row['user']);?>
            <input type="text" class="form-control" value=
            "<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " ";
            }
            ?>"
            disabled></td>
            <?php
$var=$_GET['userid'];
    $sql = "SELECT * from boardagenda as ba,boardminutes as bm WHERE ba.m_no=bm.m_no AND ba.m_no=".$var;
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
{
$m_no = $row['m_no']; 
  
  ?>   
                    <td><input type="text" class="form-control" id="agenda" name="agenda" value="<?php echo $row['topic'];?>" disabled></td> 
                    <td><input type="text" class="form-control" id="synopsis" name="synopsis" value="<?php echo $row['synopsis'];?>" disabled></td>                       
                    <td><input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['action_item'];?>" disabled></td>
                    <td><?php $array = explode(',',$row['owner']);?>
            <input type="text" class="form-control" value="<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " "; } ?>" disabled></td>
                    <td><input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['deadline'];?>" disabled></td> 
                    <td><button type="submit" class="btn btn-success">Close</button>
                      <button type="submit" class="btn btn-success">Postpone</button>
                      <button type="submit" class="btn btn-success">Not Possible</button></td>
                    <td><input type="text" class="form-control" id="action_items" name="action_items" value="Status" disabled></td>  
                    <td><button type="submit" class="btn btn-success"> EDIT</button></td> 
                    
              </tr>
              <tr>
                <th><label>Artifacts</label>
                  <i class="fa fa-paperclip" type="file" name="files" title="Load File" aria-hidden="true" style="color: #337ab7; font-size: 25px; margin-top: 20px;"></i></th>
                  <td colspan="2"><label>comments</label><input type="text" name="comment" id="comments" class="form-control" value="<?php echo $row['action_item'];?>" disabled></td>
                  <td><input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['action_item'];?>" disabled></td>
                    <td><?php $array = explode(',',$row['owner']);?>
            <input type="text" class="form-control" value="<?php
            foreach ($array as $member){
              $membername=getusernamefromid($member);
              echo $membername . " "; } ?>" disabled></td>
                    <td><input type="text" class="form-control" id="action_items" name="action_items" value="<?php echo $row['deadline'];?>" disabled></td>
                    <td><button type="submit" class="btn btn-success">Close</button>
                      <button type="submit" class="btn btn-success">Postpone</button>
                      <button type="submit" class="btn btn-success">Not Possible</button></td>
                    <td><input type="text" class="form-control" id="action_items" name="action_items" value="Status" disabled></td>  
                    <td><button type="submit" class="btn btn-success"> EDIT</button></td>
              </tr>
            </tbody>
        </table>
      </div>
      <?php } } else { echo "0 results"; } ?>
              
                  <div class="panel panel-default">
                    <div class="panel-heading">Topic</div>
                    <div class="panel-body">
                      <div class="row">
                      <div class="col-md-6">
                        <label for="usr">Topic</label>
                        <input type="text" class="form-control" >
            </div>
            <div>
              <label>Vote</label><br>
              <button class="glyphicon glyphicon-thumbs-up col-md-1 btn btn-primary"></button>
              <button class="glyphicon glyphicon-thumbs-down col-md-1 btn btn-primary"></button>
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
if($_POST)
{
  boardvoting();

}
?>

            <div class="row">
                    <div>
                    <button type="submit" class="btn btn-primary col-sm-2" style="margin-left: 80%">Submit</button>
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