$(document).ready(function () {     

$(".datepickerClass").each(function() {
        $(this).datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            yearRange: "2017:2099"  
        });
    }); 
});


function success(data) {
    buildHtmlTable(data);
    tableInit();
}
function buildHtmlTable(data) {
    var columns = addAllColumnHeaders(data);
    for (var i = 0; i < data.length; i++) {
        var row$ = $('<tr/>');
        for (var colIndex = 0; colIndex < columns.length; colIndex++) {
            var cellValue = data[i][columns[colIndex]];

            if (cellValue == null) {
                cellValue = "";
            }

            row$.append($('<td/>').html(cellValue));
        }
        $("#modaldetails").append(row$);
    }
}

function addAllColumnHeaders(data) {
    var columnSet = [];
    var headerTr$ = $('<tr/>');

    for (var i = 0; i < data.length; i++) {
        var rowHash = data[i];
        for (var key in rowHash) {
            if ($.inArray(key, columnSet) == -1) {
                columnSet.push(key);
                headerTr$.append($('<th/>').html(key));
            }
        }
    }
    return columnSet;
}
function showPolicyPlan() {
    window.location = "/freshgrc/view/policy/policyPlan.php";
}
function showPolicyReview() {
    var selectedData = table.rows('.selected').data();

    if (selectedData[0][6] == "to be reviewed") {
         window.location = "/freshgrc/view/policy/policyPublish.php?PolicyId=" + selectedData[0][0];
    }    
}
function showPolicyApprove() {
    var selectedData = table.rows('.selected').data();
    var length = selectedData.length;
    if (length>0) {
         window.location = "/freshgrc/view/policy/policyApprove.php?PolicyId=" + selectedData[0][0];
    }    
}
function policyClasification(id) {
    
       $('#policy_classification').val(id);
}

function policyprocedure(id){
    $('#policy_procedure').val(id);
}
function policyAudience(id) {
       $('#audience').val(id);         
}
 

function securityClasification(){
    
    if( $('#securityClassification').prop('checked'))
    {
        $('#security_classification').val("1");
      
    }
    else{
      $('#security_classification').val("2");  
    }

    
}

function getModalDetailsFromPlan() { 
    debugger

    
var action = "create"; 

    var modalDetails = {
        'loggedInUser': $('#loggedInUser').val(),
        'title': $('#title').val(),
        'policy_type': $('#policytype').val(),
        'security_classification': $('#security_classification').val(),
        'policy_classification': $('#policy_classification').val(),
        'audience': $('#audience').val(),
        'scope': $('#scope').val(),
        'purpose': $('#purpose').val(),
        'description': $('#description').val(),
        //'notes': $('#notes').val(),
        'owner': $('#policyowner').val(),
        'reviewer': $('#policyreviewer').val(),
        'approver': $('#policyapprover').val(),
        'effective_from': $('#effective_form').val(),
        'effective_till': $('#effective_till').val(),
        'expected_publish_date': $('#expected_publish_date').val(),
        'review_within_date': $('#review_within_date').val(),
        'policy_procedure': $('#policy_procedure').val(),
        'organization_type_id': $('#organization_type_id').val(),
        'subPolicy':$('#subPolicy').val(),
        'mainheading':$('#mainheading').val(),
        'subheading':$('#subheading').val(),
        'description1':$('#description1').val(),
        'action':action,       

    }
    
    return modalDetails;
}


function validate() {
    if($('#loggedInUser').val() == ""){
        return false;
    }
    if($('#title').val() == ""){
        return false;
    }
    if($('#policytype').val() == ""){
        return false;
    }
    if($('#scope').val() == ""){
        return false;
    }
    if($('#purpose').val() == ""){
        return false;
    }
    if($('#description').val() == ""){
        return false;
    }
    if($('#policyowner').val() == ""){
        return false;
    }
    if($('#policyreviewer').val() == ""){
        return false;
    }
    if($('#policyapprover').val() == ""){
        return false;
    }
    if($('#effective_from').val() == ""){
        return false;
    }
    if($('#effective_till').val() == ""){
        return false;
    }
   
    if($('#expected_publish_date').val() == ""){
        return false;
    }
    if($('#review_within_date').val() == ""){
        return false;
    }

    if($('#document_forward_reference').val() == ""){
        return false;
    }
    if($('#security_backward_reference').val() == ""){
        return false;
    }
    if($('#policy_procedure').val() == ""){
        return false;
    }
    return true;
}

function expirydaterror(){
    var a=new Date($('#effective_form').val());
   var b=new Date($('#effective_till').val());
   var c=new Date($('#expected_publish_date').val());
   var d=new Date($('#review_within_date').val());
   
    if (a>b||a>c||a>d){
        notexpirydaterror();
        
       }

       
      
}

function notexpirydaterror(){
     Swal.fire({ 
            title:  'Expiry,Review,Expected Date should be ahead of Policy Creation',
            type: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText:'ok'
         });
}
function validatePopup(){
    if(!validate()){
        Swal.fire({ 
            title:  'Please fill all the fields',
            type: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText:'ok'
         });
         return;
    }else{
        
      viewPolicymodelDetails();
    }
    
}

function savePolicyPlan() {
debugger
    if(!validate()){
        Swal.fire({ 
            title:  'Please Fill all the form fields',
            confirmButtonColor: '#3085d6',
            confirmButtonText:'ok'
         });
         return;
    }
    var a=new Date($('#effective_form').val());
   var b=new Date($('#effective_till').val());
   var c=new Date($('#expected_publish_date').val());
   var d=new Date($('#review_within_date').val());
   
    if (a>b||a>c||a>d){
        notexpirydaterror();
        return;
       }
    

   

    var modalDetails = getModalDetailsFromPlan();
    $.ajax({
        type: "POST",
        url: "/freshgrc/php/policy/managePolicy.php",
        data: modalDetails,
        success: savePolicyControl
    });    
}
var modalDetails= getModalDetailsFromPlan();
function viewPolicymodelDetails(){


    var informationClassification={"1":"Restricted","2":"Confidential","3":"Public","4":"Secret","5":"TopSecret"};
    var audienceClassification={"1":"People","2":"Process","3":"Technology"};
    var policyClassification={"1":"Policy","2":"Procedure","3":"Standards","4":"Baselines","5":"Guidelines"};
    var securityClassification={"1":"Internal","2":"External"};
   var details = document.querySelectorAll('#myModal p');
   details[0].innerHTML  = $('#title').val();
   details[1].innerHTML  = $("#organization_type_id > [value="+$('#organization_type_id').val()+"] ").text();
   var d= $("#security_classification").val();
   details[2].innerHTML=securityClassification[d];
   details[3].innerHTML  =$("#policytype > [value="+$('#policytype').val()+"] ").text();
   details[4].innerHTML= $("#subPolicy > [value="+$('#subPolicy').val()+"] ").text();
   var a=$('#policy_classification').val();
   details[5].innerHTML  =informationClassification[a];
   var b=$('#audience').val();
   details[6].innerHTML  =audienceClassification[b];
   details[7].innerHTML  = $('#scope').val();
   details[8].innerHTML  = $('#purpose').val();
   details[9].innerHTML  = $('#description').val();
   details[10].innerHTML =$("#policyowner > [value="+$('#policyowner').val()+"] ").text();
   details[11].innerHTML =$("#policyreviewer > [value="+$('#policyreviewer').val()+"] ").text();
   details[12].innerHTML =$("#policyapprover > [value="+$('#policyapprover').val()+"] ").text();
   details[13].innerHTML =$('#effective_form').val();
   details[14].innerHTML = $('#effective_till').val();
   details[15].innerHTML = $('#expected_publish_date').val();
   details[16].innerHTML = $('#review_within_date').val();
   var c=$('#policy_procedure').val();
   details[17].innerHTML =policyClassification[c];
   details[18].innerHTML  = $('#mainheading').val();
   details[19].innerHTML  = $('#subheading').val();
   details[20].innerHTML  = $('#description1').val();


   $("#myBtn").click(function(){
       $("#myModal").modal();
   });
   
 }


 function savePolicyControl(data){
 var controls1 = []; 
 var controls2 = [];
 var controls3 = []; 
 var controls=[];
        
        $('.mainheading').each(function (index) {
                                        
            controls1.push($(this).val());     
        });
        $('.subheading').each(function (index)
        {
            
            controls2.push($(this).val());
        }) ;
         $('.description').each(function (index)
        {
            
            controls3.push($(this).val());
        });
         var i;
for( i=0;i<controls1.length;i++){
controls.push({
    'statement':i+1,
    'mainHeading':controls1[i],
    'subHeading':controls2[i],
    'description':controls3[i]
});

}
var controls4=controls;  
 
 var controlDetails = {
    'policy_id': data,
    'controls': controls4,
    'action': 'create', 
 } 

$.ajax({
    type: "POST",
    url: "/freshgrc/php/policy/managePolicy.php",
    data: controlDetails,
    success: function(data){
        Swal.fire({ 
            title:  'Successfully Created',
            type: "success",
            timer: 1000,
            showConfirmButton: false
        });
    setTimeout(function(){window.location = "/freshgrc/view/policy/policyAdmin.php"},1000);        
    }
}); 
   
    

 }

function dropdownData() {
     var x = document.getElementById("demo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

 function savePublish(PolicyId){     
    var action = "publish";
    var publishDetails = {
        'policy_id': PolicyId,
        'loggedInUser': $('#loggedInUser').val(),
        'comments': $('#comment').val(),
        'status': $('#status').val(),
        'action': action,
    }
    $.ajax({
        type: "POST",
        url: "/freshgrc/php/policy/managePolicy.php",
        data: publishDetails        
    }).done(function(data){        
        Swal.fire({ 
            title:  messageForStatus($('#status').val()),
            confirmButtonColor: '#3085d6',
            confirmButtonText:'ok',
            type: "success",
                  });
         $('.swal2-confirm').click(function(){
                window.location.href = '/freshgrc/view/policy/policyAdmin.php';
          });
    });
 }
 function messageForStatus(StatusId){
     switch(StatusId){
         case '1':
            return "Policy Published";
        case '2':
            return "Policy Rejected";
        case '3':
            return "Policy Reviewed";
        case '4':
            return "Policy Returned";
        default:
            return "Done";
     }
 }

 function saveMailToUsers(){    
    var userCredentials = {
        'userId' : loggedInUser,
        'userRole' : loggedInUserRole
    } 
    
   $.ajax({
        dataType: "json",
        type: "POST",
        url: "/freshgrc/php/policy/sendingemail.php",
        data: userCredentials,
        success: sendMailToUser        
    });

 }
 function getSubPolicy(){
        
        var modalDetails= {'id':$('#policytype').val()};

        $.ajax({
        type: "POST",
        url: "/freshgrc/view/policy/policysubpolicy.php",
        data: modalDetails,
        success:function(data){
            $('#subPolicydropdown').html(data);
        
        }
    });
         
    }

 function sendMailToUser(data){    
     var mailDetails = {
        'sendFrom': data[0].email,
        'sendTo': $('#distributionuser').val(),
        'subject': $('#subject').val(),
        'content': $('#content').val(),
        }
        $.ajax({
        type: "POST",
       url: "/freshgrc/php/policy/policyMailCtrlManager.php",
        data: mailDetails,
        success: function(data){
            
        }       
    });

 }
 function show_more_menu(e) {
  if( !confirm(`Go to ${e.target.href} ?`) ) e.preventDefault();

  $('#kt_table_1 tbody').on( 'click', 'button', function () {
    var data = table.row( $(this).parents('tr') ).data();
    console.log(data);
    var length = data.length;
    if (length>0) {
         window.location = "/freshgrc/view/policy/policyReport.php?PolicyId=" + data[0];
    }    
  });
}
 function viewReport() {
    // alert("hello");
     
}
//  function viewReport() {
//     // alert("hello");
//     var selectedData = $("#kt_table_1 tr.selected td:first").html();
//     // alert(selectedData);
//     var length = selectedData.length;
//     if (length>0) {
//          window.location = "/freshgrc/view/policy/policyReport.php?PolicyId=" + selectedData;
//     }    
// }

function sendtoreviewer()
{
 
 $('#kt_table_1 tbody').on( 'click', 'button', function () {
  var data = table.row( $(this).parents('tr') ).data();
    var policyDetails = {
        'policyId' : data[0],
        'loggedInUser' : $('#loggedInUser').val()
    }
    $.ajax({
        type: "POST",
        data: policyDetails,
        url: "/freshgrc/php/policy/policysendtoreviewer.php",
        success: reloadPage("Reviewer")
    });
});
}

function sendtoapprover()
{
    $('#kt_table_1 tbody').on( 'click', 'button', function () {
    var data = table.row( $(this).parents('tr') ).data();    var policyDetails = {
        'policyId' : data[0],
        'loggedInUser' : $('#loggedInUser').val()
    }
    $.ajax({
        type: "POST",
        data: policyDetails,
        url: "/freshgrc/php/policy/policysendtoapprover.php",
        success: reloadPage("Approver")
    });
  });
}

function reloadPage($target)
{
     Swal.fire({ 
        title:  'Sent To ' + $target,
        confirmButtonColor: '#3085d6',
        confirmButtonText:'ok',
        type: "success",
              });
     $('.swal2-confirm').click(function(){
                location.reload();
          });
}

function viewPolicyData(data) {
     //window.alert(data);
    var heading = document.querySelector('#policyDetailsModal h4');
    heading.innerHTML = "<b>" + data[0].Title + "<b>";
    var details = document.querySelectorAll('#policyDetailsModal p');
    details[0].innerHTML  = data[0].policyType;
    details[1].innerHTML  = data[0].audience;
    details[2].innerHTML  = data[0].policyClassification;
    details[3].innerHTML  = data[0].securityClassification;
    details[4].innerHTML  = data[0].scope;
    details[5].innerHTML  = data[0].purpose;
    details[6].innerHTML  = data[0].description;
    details[7].innerHTML  = data[0].owner;
    details[8].innerHTML  = data[0].effective_from;
    details[9].innerHTML  = data[0].effective_till;
    details[10].innerHTML = data[0].expected_publish_date;
    details[11].innerHTML = data[0].review_within_date;
    $('#policyDetailsModal').modal('show');
 }

 function importPolicyCsv(){
    $('#policyCsv').click();
    var myFormData = new FormData();
    myFormData.append('policyCsv', policyCsv.files[0]);
    myFormData.append('policytype', $('#policytype').val());
    myFormData.append('subPolicy', $('#subPolicy').val());
    myFormData.append('policyowner', $('#policyowner').val());
    myFormData.append('policyreviewer', $('#policyreviewer').val());
    myFormData.append('policyapprover', $('#policyapprover').val());
    myFormData.append('loggedInUser', $('#loggedInUser').val());
          $.ajax({
        url: "/freshgrc/php/policy/importPolicies.php",
        type: "POST",
        processData: false, // important
        contentType: false, // important
        data: myFormData,
        success: function (data) {
            Swal.fire({
              title: "Plan Created",
              text: "Your Plan Has Been Created",
              type: "success",
              closeOnConfirm: false,
              showLoaderOnConfirm: true
            }, function () {
              setTimeout(function () {
                window.location="/freshgrc/view/policy/policyAdmin.php";
              }, 2000);
            });
            
        },
        error: function () {}
    });
 }


 function editPolicyData($PolicyId){
    if(!validate()){
        Swal.fire({ 
            title:  'Please Fill all the form fields',
            confirmButtonColor: '#3085d6',
            confirmButtonText:'ok'
         });
         return;
    }

    if(!expirydaterror()){
        Swal.fire({ 
            title:  'Expiry,Review,Expected Date should be ahead of Policy Creation',
            confirmButtonColor: '#3085d6',
            confirmButtonText:'ok'
         });
         return;
    }

    deletePolicyId($PolicyId);
    var modalDetails = getModalDetailsFromPlan();
    $.ajax({
        type: "POST",
        url: "/freshgrc/php/policy/managePolicy.php",
        data: modalDetails,
        success: savePolicyControl
    }); 
 }


 function goToPreviousPage(){
    window.history.back();
}


