<?php include('server.php'); ?>
<?php
require_once "../../php/common/config.php";
require_once 'functions/boardfunctions.php';
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Voting system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
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
                    <div class="panel-heading">Voting</div>
                    <div class="panel-body">
                     
                      <div class="row">
                    <div class="col-md-8">
                      <label>Topic</label>
  <form method="post"action="index.php?userid=<?php echo $row['m_no']; ?>"> 
  <input type="text" class="form-control" id="topic" name="topic" value="<?php echo $row['title'];?>" >
  <br>
   <input class="btn btn-primary"  name="submit" type="submit" value="Create" style="background-color:red;margin-left:250px;width: 100px;height: 30px; ">
    <a href="boardedit.php?userid=<?php echo $row['m_no']; ?>"> <button type="button"class="btn btn-primary" data style="background:#992065;width:100px;height:30px;margin-left: 10px;">Back</button></a> 
  </form>

</div>
</div>
</form></div>
</div>
  <?php
if(isset($_POST['submit'])){
 // Establishing Connection with Server
$topic = $_POST['topic'];
if($topic== ""){
    echo "";
  }
  else
  {
$servername = "localhost";
$username = "root";
$password = "WRxsW6!Lox!WuWiKCd8w!qW#";
$dbname = "freshgrc";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO `post`(`text`)
VALUES ('$topic')";
if (mysqli_query($conn,$sql)) {
    
} else {
    echo "Error: ?userid=62" . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT * FROM post order by id desc";
$result = mysqli_query($conn, $sql);
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
  <script src="scripts.js"></script>
</body>
</html>