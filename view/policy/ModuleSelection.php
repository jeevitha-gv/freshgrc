<?php 
require_once __DIR__.'/../header.php';
// require_once __DIR__.'/../../php/audit/auditClauseManager.php';
// require_once __DIR__.'/../../php/compliance/complianceManager.php';
// require_once __DIR__.'/../../php/audit/auditManager.php';
session_start();
$companyId=$_SESSION['company'];
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
$user_role=$_SESSION['user_role'];
// $companyname=$_SESSION['companyname'];
// echo $companyId;
// echo $user_id;
// echo $user_name;
// echo $user_role;
// echo $companyname;
?>
<!DOCTYPE html>
<html>
<head>

<title>onboarding</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <base href="/freshgrc/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Button trigger modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" 
            src="https://code.jquery.com/jquery-1.10.2.js"> 
    </script> 
  <script src="js/policy/ModuleManagement.js"></script>

</head>
<style type="text/css">
  #progressbar
  {
    width:100%;
  
  }
#bar
{
background-color: blue;
color: white;
font-size:18px;
}
 
</style>
<body style="background-color: #EEEEEE;">
<div class="">
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="https://www.fixnix.co">
    <img src="fixnix.png" width="70" height="30" class="d-inline-block align-top" alt="">Getting started with Fixnix
   
  </a>
</nav>
</div>
<div class="container" style="background-color:white; ">
<h4>Let's get started,user</h4>
<p>Complete these tasks at your own pace to get up and running with FixNix.</p>
<img src="new.png" class="rounded float-right" width="100" height="100" alt="" style="margin-top: -50px;">
<div class="progress" id="progressbar">
  <div id="bar">10%
  </div>
</div>
</div>


<div class="container" style="background-color: white;">
<div class="form-group row" style="margin-top: 10px;">
<label class="col-sm-2 col-form-label">Email Id:</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="email" placeholder="enter your email...">

</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Company Name:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="company" placeholder="Company Name...">

</div>
</div>
<div class="form-group row" style="float: right;">
<div class="col-sm-12">
<button type="submit" class="btn btn-success" id="start" onclick="start();">Lets start</button>
</div>
</div>

</div>
<br>
<div class="container" style="background-color: white;">
<div class="form-group row">
<div class="col-sm-10">
<h4>Just a few more details</h4>
</div>
<div class="col-sm-10">
      View the slide show to see what FixNix all about
</div>

<div class="col-sm-12">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="float: right;">
 view slide</button>
</div>
</div>
</div>
<div class="container" style="background-color: white;">
<h4>Create Contact</h4>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Name:</label>
<div class="col-sm-10">
<input type="text" id="name" placeholder="name" class="form-control">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Email:</label>
<div class="col-sm-10">
<input type="text" name="emailaddress" placeholder="emailaddress" class="form-control">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Phone:</label>
<div class="col-sm-10">
<input type="text"  id="phone" placeholder="phone" class="form-control">
</div>
</div>
<div class="form-group row">

<div class="col-sm-12">
<button type="button" class="btn btn-success" onclick="create();" style="float: right;">Create</button>
</div>
</div>
</div>
<div class="container" style="background-color: white;">
<h4>Read our FAQ</h4>
<div class="form-group row">
<div class="col-sm-10">
<pre>All the important stuff including what's free vs paid,how we secure your data, and which other tools FixNix works with.</pre>
</div>
</div>
<div class="form-group row">
<div class="col-sm-12">
<button type="button" class="btn btn-success" style="float: right;">Read</button>
</div>
</div>
 <div class="row" style="float: right;">
                  <div class="modal-footer">
                  <button type="button" value="1" class="btn btn-info" onclick="allocatemodules()" name="submit" data-dismiss="modal" style="font-size: 18px;" id="demo">Submit</button>
                  </div>
              </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <iframe width="480" height="300" src="https://www.youtube.com/embed/GRrE1aZgCLk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="second();">okay</button>
      </div>
    </div>
  </div>
</div>

</body>


</html>
<!-- <script type="text/javascript">
$(document).ready(function()
{
  $("#start").click(function()
  {
    $("#bar").progressbar({
        value:20
  });
});
});
    
 
</script> -->
             
             <script type="text/javascript">
               function start()
               {
                var name=document.getElementById('email').value;
                var pass=document.getElementById('company').value;
                var first=document.getElementById('bar');
                var width=20;
                if(email=='' || pass=='')
                {
                  alert("please fill all the form fields");
                }
                else if (width>=100) {
                  clearInterval(id);

                }
                else
                {
                  width++;
                  first.style.width=width+'%';
                  first.innerHTML=width+9 +'%';

                }
           }
           function second()
           {
            var second=document.getElementById('bar');
            var width=30;
            if(width>=100)
            {
              clearInterval(id);
            }
            else
            {
              width++;
              second.style.width=width+'%';
              second.innerHTML=width+19 +'%';

            }
          }
           function create()
          {
        
            var create = document.getElementById('bar');
            var width=50;
           if(width>=100)
            {
              clearInterval(id);
            }
            else
              {
              width++;
              create.style.width=width + '%';
              create.innerHTML=width+49 +'%';
             
        }
      }
        </script>