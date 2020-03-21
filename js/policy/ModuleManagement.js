function allocatemodules() {
 
if(document.getElementById("demo").value==1)
{
       window.location="/freshgrc/view/common/overview.php";
  }
       else
       {

                 window.location="/freshgrc/view/common/subscription.php";

       }
 } 


function gotoproperpage(id)
{
  window.location = "/freshgrc/view/compliance/clauseAdmin.php?complianceId=" +id;
}
 
function addstand(value) {

    var modalDetails1 = {
          
          'company_id': $('#company_id').val(),
          'comp_id':value,
          'action':'in_draft'
    }
    $.ajax({
        type: "POST",
        url:  "/freshgrc/php/compliance/modulecompliance.php",
        data: modalDetails1
    });
  location.reload();
    }
  


  function deletestandard() {
    
    var modalDetails = {
       
          'company_id': $('#company_id').val(),
          'complianceId':$('#complianceId').val(),
          'action':'delete'
    }
    $.ajax({
        type: "POST",
        url: "/freshgrc/php/compliance/manageCompliance.php",
        data: modalDetails
    }).done(function (data) {
           Swal.fire({
              title: "Are you sure want to delete this record?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes",
              closeOnConfirm: true
            }, function () {
              Swal.fire("Checklist Deleted!", "Your Checklist Has Got Deleted.", "success");
              setTimeout(function (data) {
                window.location="/freshgrc/view/policy/Regulatoryengine.php";
              });
            });

 
    });

}


// function getdatafromplan() {
//     var modalDetails = {
//         'company': $('#company').val(),
//         'legalname': $('#legalname').val(),
//         'location': $('#location').val(),
//         'unit': $('#unit').val(),
//         'department': $('#department').val(),
//         'plan': $('#plan').val()        
 
//         // 'compliance':$('#compliance').val(),
//         // 'audit':$('#audit').val(),
//         // 'risk':$('#risk').val(),
//         // 'policy':$('#policy').val(),
//         // 'asset':$('#asset').val(),
//         // 'disaster':$('#disaster').val(),
//         // 'bcpm':$('#bcpm').val()                     
//     }
//        return modalDetails;    
// }

// function manage()
// {
//   event.preventDefault();
//  var modalDetails = getdatafromplan();
//  if(modalDetails.company==""||modalDetails.legalname==""||modalDetails.location==""|modalDetails.unit==""||modalDetails.department==""||modalDetails.plan=="")
//  {
//         swal({ 
//             title:  'Please Fill all the form fields',
//             type: 'warning',
//             confirmButtonColor: '#3085d6',
//              confirmButtonText:'ok',
//        });
//   }
// else
//   {
//      $.ajax({
//          type: "POST",
//          url: "/freshgrc/php/policy/policy_management.php",
//          data: modalDetails,
//          success:allocatemodules,
//      }).done(function (data) {
//            swal({
//                title: "Plan Created",
//                text: "Your Plan Has Been Created",
//               type: "success",
//               closeOnConfirm: false,
//               showLoaderOnConfirm: true
//               });
//            });                 
//      }

// }       



 // function manage()
 // {
 //      if(document.getElementById("compliance").checked == true)
 //        window.location.assign("/freshgrc/view/compliance/complianceDashboardAdmin.php");       
 //      else if(document.getElementById("audit").checked == true)
 //        window.location.assign("/freshgrc/view/audit/auditDashboard.php");       
 //      else if(document.getElementById("risk").checked == true)
 //        window.location.assign("/freshgrc/view/common/riskDashboard.php");         
 //     else if(document.getElementById("policy").checked == true)
 //        window.location.assign("/freshgrc/view/policy/policyDashboard.php");        
 //     else if(document.getElementById("asset").checked == true)
 //        window.location.assign("/freshgrc/view/asset/assetDashboard.php");        
 //     else if(document.getElementById("disaster").checked == true)
 //        window.location.assign("/freshgrc/view/disaster/disasterDashboard.php");        
 //     else if(document.getElementById("bcpm").checked == true)
 //        window.location.assign("/freshgrc/view/bcpm/bcpmDashboard.php");         
 //   else
 //   {
 //        event.preventDefault();
 //       var modalDetails = getdatafromplan();

 //     if(modalDetails.company==""||modalDetails.legalname==""||modalDetails.location==""|modalDetails.unit==""||modalDetails.department==""||modalDetails.plan==""){
 //        swal({ 
 //            title:  'Please Fill all the form fields',
 //           type: 'warning',
 //            confirmButtonColor: '#3085d6',
 //            confirmButtonText:'ok',
 //        });
 //      }   
 //     else
 //     {
 //   $.ajax({
 //         type: "POST",
 //         url: "/freshgrc/php/policy/policy_management.php",
 //         data: modalDetails,
 //     }).done(function (data) {
 //           swal({
 //              title: "Plan Created",
 //              text: "Your Plan Has Been Created",
 //              type: "success",
 //              closeOnConfirm: false,
 //             showLoaderOnConfirm: true
 //               });
 //             // , function () {
 //             //   setTimeout(function () {
 //             //     window.location="/freshgrc/view/audit/auditCreateAdmin.php";
 //             //   }, 2000);
 //             // } 
 //        });    
 //     }
 //  }

 // }
//  function getModalDetailsFromCheckbox() {
//       var modalDetails = {
//         'action': $('action').val(),
//         'compliance': $('#compliance').val()
//       }
//       return modalDetails;
//  }
//  function addstand() {
    
    
//     var modalDetails = getModalDetailsFromModal();
//     $.ajax({
//         type: "POST",
//         url: "/freshgrc/php/audit/manageAudit.php",
//         data: modalDetails
//   });
// }

 