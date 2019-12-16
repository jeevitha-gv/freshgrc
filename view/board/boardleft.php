<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 16px;
  color: black;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */


/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: white;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav" style="margin-top: 76px; height: 42%; width: 240px;">
  <button class="dropdown-btn"> <i style="color: #e5e5e5; background-color: #2D7876; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-briefcase"></i>&nbsp;&nbsp;&nbsp; <span > Board</span>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="view/board/board_dashboard.php"> <i style="color: #e5e5e5; background-color: #34eb7a; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-list-alt"></i> &nbsp;&nbsp;&nbsp;<span> DashBoard</span></a>
    <a href="view/board/calender.php"> <i style="color: #e5e5e5; background-color:#6e626e; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-calendar"></i><span class="">&nbsp;&nbsp;&nbsp; Calender</span></a>
  </div>
  <a href="view/board/boardindex.php" style="color:black;margin-top: 5px;"> <i style="color: #e5e5e5; background-color:#5834eb; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-edit"></i><span >&nbsp;&nbsp;&nbsp; Schedule</span></a>
  <a href="view/board/boardmeetingtable.php" style="color:black; margin-top: 5px;"> <i style="color: #e5e5e5; background-color: #ba34eb; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-copy"></i><span class="">&nbsp;&nbsp;&nbsp; Agenda</span></a>
  <a href="view/board/boardagendatable.php" style="color:black; margin-top: 5px;"><i style="color: #e5e5e5; background-color: #34ebeb; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-time"></i> <span class="">&nbsp;&nbsp;&nbsp; Minutes</span></a>
  <?php 
  if ($_SESSION['user_id'] == 1) 
      {
   ?>

   <a href="view/board/boardpublishtable.php" style="color:black; margin-top: 5px;"><i style="color: #e5e5e5; background-color:#eb3468; border-radius: 50%;padding: 0.4em;height: 1.7em; width: 1.7em;" class="glyphicon glyphicon-saved"></i><span >&nbsp;&nbsp;&nbsp; Publish</span></a>

   <?php
      }
   ?>
  
</div>

<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html>
