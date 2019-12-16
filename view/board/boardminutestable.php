<?php
require_once "../../php/common/config.php";
include 'functions/boardfunctions.php';
session_start();
ob_start();
?>

<?php
if($_SESSION['user_id'] != 1){
  header("Location: boardminutes.php?blocked=1");
}
?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>meeting</title>
    <base href="/freshgrc/">

  <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  -->
      
    <!-- <script type="text/javascript" src="assets/DataTables/DataTables-1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
           <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
        <script type="text/javascript" src="assets/DataTables/pdfmake.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>    
      

    <link href="assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="assets/img/favicon.png" rel="icon" type="image/png">
    <link href="assets/img/favicon.ico" rel="shortcut icon">



    <link rel="stylesheet" href="assets/css/lib/font-awesome/font-awesome.min.css">
   

    <style>
        #viewdata {
          /*margin-left: 242px;
          margin-top: -185px;
          margin-right: 135px;
          margin-bottom: 40px;*/
          margin-left: 22%;
          margin-top: -10%;
        }

        table,
        th,
        td {
            border: 1% solid black;
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
          .btn.btn-outline.dark {
            border-color: #2f353b;
            color: #2f353b;
            background: 0 0;
            border: 1px solid #2f353b !important;
            margin-left: 7px !important;
           
        }
        .btn.btn-outline.red {
            border-color: #e7505a;
            color: #e7505a;
            background: 0 0;
            border: 1px solid #e7505a !important;
             margin-left: 7px !important;
        }
        .btn.btn-outline.green {
            border-color: #32c5d2;
            color: #32c5d2;
            background: 0 0;
             border: 1px solid #32c5d2 !important;
              margin-left: 7px !important;
        }
        .btn.btn-outline.purple {
            border-color: #8E44AD;
            color: #8E44AD;
            background: 0 0;
            border: 1px solid #8E44AD !important;
             margin-left: 7px !important;
        }
          div.dataTables_wrapper div.dataTables_length label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
        display: none !important;
        }
        div.dataTables_wrapper div.dataTables_filter label {
            font-weight: normal;
            white-space: nowrap;
            text-align: left;
            display: none !important;

       }
     
    </style>
</head>


<body>

   <?php
    
                    include "../siteHeader.php";
                     ?>
          <div style="margin-top: 30px !important;">
        <?php 
        include 'boardleft.php';
        
        ?>

      </div>
</body>


  
    <body>


       <div class="page-content-wrapper" style="margin-top: 50px !important;">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                     <div class="col-md-12">
                         <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">MINUTES LIST</div>
                                  
                                </div>
    
      
          <div class="portlet-body ">
          
          
            <div class="table-responsive">
 <?php
      $sql = "SELECT b.m_no as ID,b.title as Title,b.date as Date,b.frequency as Frequency FROM boardindex as b,boardminutes as a WHERE b.m_no=a.m_no ORDER BY b.m_no DESC";
  $result = mysqli_query($link, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
        // echo "<h2>Booking Table</h2>";
        echo "<table id='modaldetails' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='1.5'><tr><th>M.NO</th><th>Meeting Title</th><th>Date</th><th>Frequency</th><th>Action</th></tr>";

  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  
  //  id='value' onclick="fnselect();"
echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "<td>" . $row['Date'] . "</td>";
  echo "<td>" . $row['Frequency'] . "</td>";
  echo "<td><a href='view/board/boardagenda.php?userid=".($row['ID'])."'><insert type='submit' class='btn btn-success' name='min' disabled>Agenda</a><a href='view/board/boardminutes.php?userid=".($row['ID'])."'><insert type='submit' class='btn btn-primary' name='min' disabled>Minutes</a><a href='view/board/boardpublish.php?userid=".($row['ID'])."'><insert type='submit' class='btn btn-primary' style='background: #8e44ad' name='min'>Publish</a></td>";
  echo "</tr>";
  
  }
  echo "</table>";
  } else {
      echo "0 results";
  }
      ?>



        
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </body>
                 </html>

