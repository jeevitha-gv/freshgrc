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

.add{
    background-color: #85e185;
    color: white;
    position:absolute;
    right:50px;
    margin-right:50px;
    bottom:25px;
  }


  .rem{
    background-color: #f47673;
    color: white;
    position:absolute;
    margin-right:49px;
    right:20px;
    bottom:25px;
  }
.posts-wrapper {
  width: 50%;
  margin: 20px auto;
  border: 1px solid #eee;
}
.post {
  width: 90%;
  margin: 20px auto;
  padding: 10px 5px 0px 5px;
  border: 1px solid green;
}
.post-info {
  margin: 10px auto 0px;
  padding: 5px;
}
.fa {
  font-size: 1.2em;
}
.fa-thumbs-down, .fa-thumbs-o-down {
  transform:rotateY(180deg);
}
.logged_in_user {
  padding: 10px 30px 0px;
}
i {
  color: blue;
}
</style>
<body class="with-side-menu-compact">

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
 <body class="dataTables">
    <div class="container" style="width: 90%;">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary" style="border-color:#32c5d2;">
            <div class="panel-heading"  style="background-color: #32c5d2;font-size: 18px !important;">PUBLISH</div>
              <div class="panel-body">
              <div class="clearfix"></div>
<div class="col-md-12" >
  <form action="" method="post">
  <div>
   <div class="panel panel-default">
     <div class="panel-heading">TOR</div>
    <?php
    $var = $_GET['userid'];
$sql = "SELECT * FROM boardminutes as bm, boardindex as bi, boardagenda as ba WHERE bm.m_no=bi.m_no AND bi.m_no=ba.m_no AND ba.m_no=".$var;
$result = mysqli_query($link, $sql);
$row = $result->fetch_assoc();
?>
      <div class="container" style="margin-top: 30px;">          
        <table id="userdetails" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"style="border:1px solid black;">
            <thead>
                <tr style="border:1px solid black;">
                    <th style="border:1px solid black; width: 17%;">Meeting Title</th> 
                    <th style="border:1px solid black;">Date</th>
                    <th style="border:1px solid black;">Author</th>                       
                    <th style="border:1px solid black;background-color: #4CAF50; width: 17%;">Agenda</th>
                    <th style="border:1px solid black;background-color: #4CAF50;">Synopsis</th>
                    <th style="border:1px solid black;background-color: #4CAF50;">Action Item</th>
                    <th style="border:1px solid black;">Owner</th>
                    <th style="border:1px solid black; width: 10%;">Deadline</th>
                </tr>
            </thead>

            <tbody>
              <tr>
                <input type="hidden" class="form-control" value="<?php echo $row['m_no'];?>">
                <td style="border:1px solid black;"><input type="text" class="form-control" value="<?php echo $row['title']; ?>" disabled></td>
                <td style="border:1px solid black;"><input type="text" class="form-control" value="<?php echo $row['date']; ?>" disabled></td>
                <td style="border:1px solid black;"><?php $array = explode(',',$row['user']);?><input type="text" class="form-control" value="<?php foreach ($array as $member){
                          $membername=getusernamefromid($member);
                          echo $membername . ", "; } ?>"disabled> </td>
                <td style="border:1px solid black;"><input type="text" class="form-control" value="<?php echo $row['topic']; ?>" disabled></td>
                <td style="border:1px solid black;"><input type="text" class="form-control" value="<?php echo $row['synopsis']; ?>" disabled></td>
                <td style="border:1px solid black;"><input type="text" class="form-control" value="<?php echo $row['action_item']; ?>" disabled></td>
                <td style="border:1px solid black;"><?php $array = explode(',',$row['user']);?><input type="text" class="form-control" value="<?php foreach ($array as $member){
                          $membername=getusernamefromid($member);
                          echo $membername . " ";} ?>" disabled> </td>
                <td style="border:1px solid black;"><input type="text" class="form-control" value="<?php echo $row['deadline']; ?>" disabled></td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>


             <div class="panel panel-default">
                    <div class="panel-heading">Topic</div>
                    <div class="panel-body">
                      
                      <div class="row">
                    <div class="col-md-8">
                      <label>Topic</label>
                    <?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <form method="post"action="voting.php"> 
  <input type="text" class="form-control" id="votetopic" name="votetopic" value="<?php echo $row['votetopic'];?>"><br>
   <input class="submit" name="submit" type="submit" value="Create" style="background-color:red;margin-left:250px;width: 100px;height: 30px; "> 
  <?php
if(isset($_POST['submit'])){
 // Establishing Connection with Server
$votetopic = $_POST['votetopic'];


if($votetopic== ""){
    echo "";
  }
  else
  {
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "freshgrc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `post`(`text`) VALUES ('$votetopic')";

if (mysqli_query($conn,$sql)) {
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}

mysqli_close($conn);
?>
  <div class="posts-wrapper">
   <?php foreach ($posts as $post): ?>
    <div class="post">
      <?php echo $post['text']; ?>
      <div class="post-info">
      <!-- if user likes post, style button differently -->
        <i <?php if (userLiked($post['id'])): ?>
            class="fa fa-thumbs-up like-btn"
          <?php else: ?>
            class="fa fa-thumbs-o-up like-btn"
          <?php endif ?>
          data-id="<?php echo $post['id'] ?>"></i>
        <span class="likes"><?php echo getLikes($post['id']); ?></span>
         
        &nbsp;&nbsp;&nbsp;&nbsp;

      <!-- if user dislikes post, style button differently -->
        <i 
          <?php if (userDisliked($post['id'])): ?>
            class="fa fa-thumbs-down dislike-btn"
          <?php else: ?>
            class="fa fa-thumbs-o-down dislike-btn"
          <?php endif ?>
          data-id="<?php echo $post['id'] ?>"></i>
        <span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
      </div>
    </div>
   <?php endforeach ?>
  </div>
  <script>
    $(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
    action = 'like';
  } else if($clicked_btn.hasClass('fa-thumbs-up')){
    action = 'unlike';
  }
  $.ajax({
    url: 'voting.php',
    type: 'post',
    data: {
      'action': action,
      'post_id': post_id
    },
    success: function(data){
      res = JSON.parse(data);
      if (action == "like") {
        $clicked_btn.removeClass('fa-thumbs-o-up');
        $clicked_btn.addClass('fa-thumbs-up');
      } else if(action == "unlike") {
        $clicked_btn.removeClass('fa-thumbs-up');
        $clicked_btn.addClass('fa-thumbs-o-up');
      }
      // display the number of likes and dislikes
      $clicked_btn.siblings('span.likes').text(res.likes);
      $clicked_btn.siblings('span.dislikes').text(res.dislikes);

      // change button styling of the other button if user is reacting the second time to post
      $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
    }
  });   

});

// if the user clicks on the dislike button ...
$('.dislike-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
    action = 'dislike';
  } else if($clicked_btn.hasClass('fa-thumbs-down')){
    action = 'undislike';
  }
  $.ajax({
    url: 'voting.php',
    type: 'post',
    data: {
      'action': action,
      'post_id': post_id
    },
    success: function(data){
      res = JSON.parse(data);
      if (action == "dislike") {
        $clicked_btn.removeClass('fa-thumbs-o-down');
        $clicked_btn.addClass('fa-thumbs-down');
      } else if(action == "undislike") {
        $clicked_btn.removeClass('fa-thumbs-down');
        $clicked_btn.addClass('fa-thumbs-o-down');
      }
      // display the number of likes and dislikes
      $clicked_btn.siblings('span.likes').text(res.likes);
      $clicked_btn.siblings('span.dislikes').text(res.dislikes);
      
      // change button styling of the other button if user is reacting the second time to post
      $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
    }
  }); 

});

});
  </script>

<!-- <label>Topic</label>
  <input type="text" class="form-control" id="topic" name="topic" value="<?php echo $row['vote_topic'];?>"><br>
</div> -->
<!-- <div style="margin-left: 50%">
<div class="col-md-2">
               <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
  .like, .dislike {    
    display: inline-block;
    margin-bottom: 0;
    font-weight: normal;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background: blue;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    border-radius: 4px;
    color:white;
}

.qty {border: none;}
.qtyy {border: none;}
</style>

<div>
<button class="like" name="like"><span class="glyphicon glyphicon-thumbs-up"></span>
</button>
<input class="qty" name="qty" readonly="readonly" type="text" value="0" /></div>
 <?php
$sql = "SELECT COUNT(yes) FROM `boardvote` WHERE yes=1";
$result=mysqli_query($link, $sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "like:" . $row["COUNT(yes)"];
    }
}
?>
<div>
<button class="dislike" name="dislike"><span class="glyphicon glyphicon-thumbs-down"></span> </button>
<input class="qtyy" name="qtyy" readonly="readonly" type="text" value="0"/></div>
<?php
$sql = "SELECT COUNT(no) FROM `boardvote` WHERE no=1";
$result=mysqli_query($link, $sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "unlike:" . $row["COUNT(no)"];
    }
}
?>

<?php
if(isset($_POST['qty']) || isset($_POST['qtyy']))
{
$like= $_POST['qty'];
$dislike = $_POST['qtyy'];

if( $like !="" || $dislike !=""){
$sql = "INSERT INTO `boardvote`(`yes`,`no`)
VALUES ('$like','$dislike')";
$result=mysqli_query($link, $sql);

}
}


?>
       
 -->
<!-- <a href="view/board/voteall.php"><input type="submit" value="Submit" class="btn btn-primary" name="submit" style="margin-left: 93%"></a> -->
</form>

</div>
</body>
</body>
</html>

<!-- <script >
   $(function(){
    $(".like").click(function(){
        var input = $(this).siblings('.qty');
        input.val(parseFloat(input.val()) + 1);
        
    });
    $(".dislike").click(function(){
        var input = $(this).siblings('.qtyy');
        input.val(parseFloat(input.val()) + 1);
    });
  });
</script> -->