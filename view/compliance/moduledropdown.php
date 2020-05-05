<?php
    require_once __DIR__.'/../../php/common/metaData.php';
    require_once __DIR__.'/../../php/audit/auditManager.php';

    $auditManager = new AuditManager();
   
    $allCompliance = $auditManager->getAllCompliance(7);
    $allregulatory = $auditManager->getAllRegulatory(7);

    $root=$moduleData[0]['c.name'];
$m=explode(',',  $root);
?>


<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
                    
                    <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
                <!--end::Layout Skins -->

 <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
       
    </head>
<label for="example-url-input" class="col-2 col-form-label" style="font-size: 16px;"></label>
         
           <div class="col-md-12">
<!-- <button style="height: 50px;width:50px;"><i class="flaticon2-rubbish-bin" title="delete" style="color: red;"></i></button> -->

<?php foreach($allCompliance as $compliance){ ?>

         <button class="btn btn-default"  style="text-align:center; height:200px; width:26.6%; margin-top: 10px; background-color:white ; color:black; font-size: 12px;" type="submit" id="<?php echo $compliance['id'] ?>" onclick="gotoproperpage(this.id);">
                <?php if($compliance['name']=='PCI-DSS') { ?><img src="/freshgrc/pic/pcidss.png" width="60%" height="110">
                <?php } ?>
               <?php if($compliance['name']=='Risk Management III, Market Operations and ALM') { ?><i class='fa fa-area-chart'></i>  &nbsp;&nbsp;&nbsp; <?php } ?>
                 <?php if($compliance['name']=='Policy') { ?><i class=' fa fa-globe'></i>  &nbsp;&nbsp;&nbsp; <?php echo $compliance['name']; ?> <?php } ?>
                <?php if($compliance['name']=='OHAS') { ?><img src="/freshgrc/pic/ohas.jpeg" width="60%" height="140">  &nbsp;&nbsp;&nbsp; <?php } ?>
                <?php if($compliance['name']=='ISO20022 - Payment Compliance') { ?><img src="/freshgrc/pic/iso20022.jpeg" width="60%" height="140">  &nbsp;&nbsp;&nbsp; <?php } ?>
                <?php if($compliance['name']=='New Startup Compliance') { ?><i class='  fa fa-edit'></i>  &nbsp;&nbsp;&nbsp;<?php } ?>
              <?php if($compliance['name']=='HR Policies') { ?><img src="/freshgrc/pic/hr.jpg" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
              <?php if($compliance['name']=='NIST_CSF_Cybersecurity') { ?><img src="/freshgrc/pic/nist.jpg" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
              <?php if($compliance['name']=='PA-DSS') { ?><img src="/freshgrc/pic/pa-dss.png" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
              <?php if($compliance['name']=='COBIT 5 Checklists') { ?><img src="/freshgrc/pic/COBIT5.png" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
                <?php if($compliance['name']=='Sarbanes-Oxley Compliance') { ?><i class='fa fa-space-shuttle'></i> &nbsp; <?php } ?>
                <?php if($compliance['name']=='COBIT 5') { ?><i class=' fa fa-sun-o'></i>  &nbsp; <?php } ?>
                <?php if($compliance['name']=='GDPR Checklists') { ?><img src="/freshgrc/pic/gdpr.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='Dubai Government - Information Security Regulation') { ?><img src="/freshgrc/pic/dub.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='ISO 27001') { ?><img src="/freshgrc/pic/iso.jpeg" style="margin-right: 0px;"  width="150" height="140">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='HIPPA') { ?><img src="/freshgrc/pic/hipaa.png" width="60%" height="140">  &nbsp; <?php } ?>
                 <?php if($compliance['name']=='HR Policy') { ?><img src="/freshgrc/pic/hr.jpg" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='ISMS') { ?><img src="/freshgrc/pic/isms.jpg" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='ISO18001(OHSAS)') { ?><img src="/freshgrc/pic/iso18001.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='ISO 27000 - Security Compliance') { ?><img src="/freshgrc/pic/iso27000.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='17 CFR 45 - Swap Trade Compliance') { ?><img src="/freshgrc/pic/17.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($compliance['name']=='ISO 9001:2015 Quality Management System') { ?><img src="/freshgrc/pic/iso9001.png" width="60%" height="110">  &nbsp; <?php } ?>


                <?php if($compliance['name']=='SOC') { ?><i class=' fa fa-photo'></i>  &nbsp;
                <?php } ?><br/><br/>
                 <?php echo $compliance['name'];?>

              </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-danger" style="margin-top: -180px;margin-left: -120px;height: 10px;width: 2px;background-color: white;color: black;font-size: 16px;border:none;" value="<?php echo $compliance['id'];?>" id="complianceId" onclick="deletestandard(this.value);">X</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="text" value="<?php echo $compliance['id'];?>"> -->
             
                  <?php } ?>




                          <?php foreach($allregulatory as $allreg){ ?>

                                    <button class="btn btn-default"  style="text-align:center; height:200px; width:26.6%; margin-top: 10px; background-color:white ; color:black; font-size: 12px;" type="submit" id="<?php echo $allreg['Comp_Id'] ?>" onclick="gotoproperpage(this.id);">

                <?php if($allreg['Compliance_Name']=='PCI-DSS') { ?><img src="/freshgrc/pic/pcidss.png" width="60%" height="110">
                <?php } ?>
               <?php if($allreg['Compliance_Name']=='Risk Management III, Market Operations and ALM') { ?><i class='fa fa-area-chart'></i>  &nbsp;&nbsp;&nbsp; <?php } ?>
                 <?php if($allreg['Compliance_Name']=='Policy') { ?><i class=' fa fa-globe'></i>  &nbsp;&nbsp;&nbsp; <?php echo $allreg['name']; ?> <?php } ?>
                <?php if($allreg['Compliance_Name']=='OHAS') { ?><img src="/freshgrc/pic/ohas.jpeg" width="60%" height="140">  &nbsp;&nbsp;&nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='ISO20022 - Payment Compliance') { ?><img src="/freshgrc/pic/iso20022.jpeg" width="60%" height="140">  &nbsp;&nbsp;&nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='New Startup Compliance') { ?><i class='  fa fa-edit'></i>  &nbsp;&nbsp;&nbsp;<?php } ?>
              <?php if($allreg['Compliance_Name']=='HR Policies') { ?><img src="/freshgrc/pic/hr.jpg" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
              <?php if($allreg['Compliance_Name']=='NIST_CSF_Cybersecurity') { ?><img src="/freshgrc/pic/nist.jpg" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
              <?php if($allreg['Compliance_Name']=='PA-DSS') { ?><img src="/freshgrc/pic/pa-dss.png" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
              <?php if($allreg['Compliance_Name']=='COBIT 5 Checklists') { ?><img src="/freshgrc/pic/COBIT5.png" width="60%" height="110">  &nbsp;&nbsp;&nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='Sarbanes-Oxley Compliance') { ?><i class='fa fa-space-shuttle'></i> &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='COBIT 5') { ?><i class=' fa fa-sun-o'></i>  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='GDPR Checklists') { ?><img src="/freshgrc/pic/gdpr.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='Dubai Government - Information Security Regulation') { ?><img src="/freshgrc/pic/dub.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='ISO 27001') { ?><img src="/freshgrc/pic/iso.jpeg" style="margin-right: 0px;"  width="150" height="140">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='HIPPA') { ?><img src="/freshgrc/pic/hipaa.png" width="60%" height="140">  &nbsp; <?php } ?>
                 <?php if($allreg['Compliance_Name']=='HR Policy') { ?><img src="/freshgrc/pic/hr.jpg" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='ISMS') { ?><img src="/freshgrc/pic/isms.jpg" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='ISO18001(OHSAS)') { ?><img src="/freshgrc/pic/iso18001.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='ISO 27000 - Security Compliance') { ?><img src="/freshgrc/pic/iso27000.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='17 CFR 45 - Swap Trade Compliance') { ?><img src="/freshgrc/pic/17.png" width="60%" height="110">  &nbsp; <?php } ?>
                <?php if($allreg['Compliance_Name']=='ISO 9001:2015 Quality Management System') { ?><img src="/freshgrc/pic/iso9001.png" width="60%" height="110">  &nbsp; <?php } ?>


                <?php if($allreg['Compliance_Name']=='SOC') { ?><i class=' fa fa-photo'></i>  &nbsp;
                <?php } ?><br/><br/>
                 <?php echo $allreg['Compliance_Name'];?>
             
             
               </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-danger" style="margin-top: -180px;margin-left: -120px;height: 10px;width: 2px;background-color: white;color: black;font-size: 16px;border:none;" value="<?php echo $allreg['Id'];?>" id="regId" onclick="deleteregstandard(this.value);">X</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php } ?>

       

</div>
<br>
       
 
            </body>
    <!-- end::Body -->
</html>

