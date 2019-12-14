<?php

function boardschedule(){
if($_POST){
	// print_r($_POST);
	GLOBAL $link;
	$m_no=$_GET['m_no'];
	// $title = $_POST['title'];
$titleErr = $dateErr = $purposeErr = $responsibilitiesErr = $outputErr = $userErr = $adminErr = "";
$title = $date = $purpose = $responsibilities = $output = $use = $admin = "";
	if (empty($_POST["title"])) {
               $titleErr = "Title is required";
               print_r("<p style=color:red;>".$titleErr."</span></p>");
               return false;
             }
  if (empty($_POST["date"])) {
               $dateErr = "Date is required";
               print_r("<p style=color:red;>".$dateErr."</span></p>"); 
               return false;
            }
  if (empty($_POST["purpose"])) {
               $purposeErr = "Purpose is required";
               print_r("<p style=color:red;>".$purposeErr."</span></p>"); 
               return false;
            }   
   if (empty($_POST["responsibities"])) {
               $responsibilitiesErr = "Responsibities is required";
               print_r("<p style=color:red;>".$responsibilitiesErr."</span></p>");
               return false;
            }  
  if (empty($_POST["output"])) {
               $outputErr = "Output is required";
               print_r("<p style=color:red;>".$outputErr."</span></p>");
               return false;
            }
            // if(isset($_POST["user"]) && ($_POST["user"]) === '0'){
            //    $userErr = "User is required";
            //    print_r("<p style=color:red;>".$userErr."</span></p>"); 
            //    return false;
            // }
            // if(($_POST["admin"] == "None Selected") || ($_POST["admin"] == "")){
            //    $userErr = "Admin is required";
            //    print_r("<p style=color:red;>".$adminErr."</span></p>"); 
            //    return false;
            // }
            if (!empty($_POST["title"])) {
    $title = test_input($_POST["title"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9\s]*$/",$title)) {
      $titleErr = "Title:Only letters,numbers and white space allowed "; 
       print_r("<p style=color:red;>".$titleErr."</span></p>");
       $_POST["title"] = "";
       return false;
    }
  }  
  if (!empty($_POST["date"])) {
    $date = test_input($_POST["date"]);
  }  
  if (!empty($_POST["purpose"])) {
    $purpose = test_input($_POST["purpose"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9\s]*$/",$purpose)) {
      $purposeErr = "Purpose:Only letters,numbers and white space allowed "; 
       print_r("<p style=color:red;>".$purposeErr."</span></p>");
       $_POST["purpose"] = "";
       return false;
    }
  }  
  if (!empty($_POST["responsibities"])) {
    $responsibities = test_input($_POST["responsibities"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9\s]*$/",$responsibities)) {
      $responsibitiesErr = "Responsibities:Only letters,numbers and white space allowed "; 
       print_r("<p style=color:red;>".$responsibitiesErr."</span></p>");
       $_POST["responsibities"] = "";
       return false;
    }
  }
  if (!empty($_POST["output"])) {
    $output = test_input($_POST["output"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9\s]*$/",$output)) {
      $outputErr = "Output:Only letters,numbers and white space allowed "; 
       print_r("<p style=color:red;>".$outputErr."</span></p>");
       $_POST["output"] = "";
       return false;
    }
  }
  if (!empty($_POST["user"])) {
    $member = $_POST['user'];
    $users = implode(',', $member);
    $use = test_input($users);
  }
  if (!empty($_POST["admin"])) {
    $admin = test_input($_POST["admin"]);
  }

  if (!empty($_POST["frequency"])) {
    $frequency = test_input($_POST["frequency"]);
  }    
$status1="Scheduled";
	$sql3="INSERT INTO `boardindex`(`title`,`date`,`frequency`,`purpose`,`responsibities`,`output`,`user`,`admin`,`status`) VALUES ('$title','$date','$frequency','$purpose','$responsibities','$output','$use','$admin','$status1')";

 $result=mysqli_query($link, $sql3);  
	if($result) {
    header("Location: boardmeetingtable.php");
    }
    else{
        echo "";
        
    }
}
return TRUE;
}    
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// 	$date = $_POST['date'];
// 	$frequency = $_POST['frequency'];
// 	$purpose = $_POST['purpose'];
// 	$responsibities = $_POST['responsibities'];
// 	$output = $_POST['output'];
// $user = $_POST['user'];
// $use = implode(',', $user);
// // $use = implode("",$user);
// 	$admin = $_POST['admin'];

// 	// $sql1="SELECT title FROM boardindex WHERE m_no='".$m_no."'";
// 	// $result1=mysqli_query($link, $sql1);
// 	// if(mysqli_num_rows($result1) == 1){
// 	// 		$row = mysqli_fetch_array($result1);
// 	// 		$title=$row['title'];
// 			// $flag=0;

// 	$status1="Scheduled";
// 	$sql3="INSERT INTO `boardindex`(`title`,`date`,`frequency`,`purpose`,`responsibities`,`output`,`user`,`admin`,`status`) VALUES ('$title','$date','$frequency','$purpose','$responsibities','$output','$use','$admin','$status1')";

//  $result=mysqli_query($link, $sql3);  
// 	if($result) {
//     header("Location: boardmeetingtable.php");
// // echo "hello";
//     }
//     else{
//         echo "";
        
//     }
//   //   	$sql2="UPDATE boardindex SET status = 'Scheduled' WHERE m_no='".$m_no."'";
// 		// $result2 = mysqli_query($link, $sql2);
// }
// return TRUE;
// }



function boardagenda(){
if($_POST['submit']){
	// print_r($_POST);
	GLOBAL $link;
	$m_no = $_POST['m_no'];
	$topic = $_POST['topic'];
	$synopsis = $_POST['synopsis'];
	$comment = $_POST['comment'];
  $attachment = $_POST['file1'];

	$sql="INSERT INTO `boardagenda`(`m_no`,`topic`,`synopsis`,`comment`,`attachment`) VALUES ('$m_no','$topic','$synopsis','$comment','$attachment')";

 $result=mysqli_query($link, $sql);  
	if($result) {
    header("Location: boardagendatable.php");
// echo "hello";
    }
    else{
        echo "Error:".$sql."<br>" . mysqli_error($link);
    }
}
}


function boardminutes(){
if($_POST){
	print_r($_POST);
	GLOBAL $link;
	$m_no = $_POST['m_no'];
	
	$action_item = $_POST['action_item'];
	$user = $_POST['user'];
	$owner = implode(',', $user);
	$deadline = $_POST['deadline'];
	
	$sql="INSERT INTO `boardminutes`(`m_no`,`action_item`,`owner`,`deadline`) VALUES ('$m_no','$action_item','$owner','$deadline')";

 $result=mysqli_query($link, $sql);  
	if($result) {
    header("Location: boardpublishtable.php");
// echo "hello";

    }
    else{
        echo "Error:".$sql."<br>" . mysqli_error($link);
    }
}
}



function getusernamefromid($member_id){
	GLOBAL $link;
	$sql="SELECT last_name from user where id = '$member_id'";
	$result=mysqli_query($link, $sql);
	$data=(mysqli_fetch_array($result));
	return $data['last_name'];
}

function getadminnamefromid($member_id){
	GLOBAL $link;
	$sql="SELECT last_name from boarduser_info where id = '$member_id'";
	$result=mysqli_query($link, $sql);
	$data=(mysqli_fetch_array($result));
	return $data['last_name'];
}



function boardtopic(){
if($_POST['save']){
	// print_r($_POST);
	GLOBAL $link;
	$m_no = $_POST['m_no'];
	$topic = $_POST['topic'];
	
	
	$sql="INSERT INTO `boardtopic`(`m_no`,`topic`) VALUES ('$m_no','$topic')";

 $result=mysqli_query($link, $sql);  
	if($result) {
   
// echo "hello";
    }
    else{
        echo "Error:".$sql."<br>" . mysqli_error($link);
    }
}
}


function boardedits(){
if($_POST){
	print_r($_POST);
	GLOBAL $link;
	$m_no = $_POST['m_no'];
	$action_item = $_POST['action_item'];
	$user = $_POST['user'];
	$owner = implode(',', $user);
	$deadline = $_POST['deadline'];
	
	$sql="UPDATE `boardminutes` SET action_item='$action_item', owner='$owner', deadline='$deadline' WHERE m_no=$m_no";

 $result=mysqli_query($link, $sql);  
	if($result) {
    header("Location: boardminutestable.php");
// echo "hello";
    }
    else{
        echo "Error:".$sql."<br>" . mysqli_error($link);
    }
}
}


function boardpublish(){
if($_POST['Approve']){
	GLOBAL $link;
	$m_no = $_POST['m_no'];
	$summary = $_POST['summary'];
	
	
	$sql="INSERT INTO `boardpublish`(`m_no`,`summary`) VALUES ('$m_no','$summary')";

 $result=mysqli_query($link, $sql);  
	if($result) {
    header("Location: boardreport.php?userid=$m_no");
// echo "hello";
    }
    else{
        echo "Error:".$sql."<br>" . mysqli_error($link);
    }
}
// function boardvote()
// {
// 	if($_POST['submit']){
//  GLOBAL $link;
// $topic = $_POST['topic'];

// $sql = "INSERT INTO `post`(`text`) VALUES ('$topic')";
// $result=mysqli_query($link, $sql);  
// 	if($result) {
//     header("Location: index.php?userid=$m_no");
// // echo "hello";
//     }
//     else{
//         echo "Error:".$sql."<br>" . mysqli_error($link);
//     }
// }
// }
//  include('server.php'); 
// }
}
?>