<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/audit/auditManager.php';
$GLOBALS['auditId'] = $_GET['auditId'];
$GLOBALS['loggedInUserRole'] = $_SESSION['user_role'];
$GLOBALS['loggedInUserId'] = $_SESSION['user_id'];
$GLOBALS['scoreAuditChecklist']=0;
$GLOBALS['checklistWeight']=0;
$GLOBALS['allClausesArray']=array();
$GLOBALS['auditStatus']="approved";
$checklists=array();
$score=0;
$auditId = $_GET['auditId'];
$complianceId=array();
$auditManager = new AuditManager();
$auditdetails = $auditManager->getAuditDetails($auditId);
$workingDetailsOfAudit = $auditManager->getWorkingDetails($auditId, $loggedInUserRole);
$complianceId = explode(",",$workingDetailsOfAudit['complianceId']);
$auditStatus = $workingDetailsOfAudit['status'];
$auditTitle = $workingDetailsOfAudit['title'];
$complianceName = $workingDetailsOfAudit['complianceName'];
$version = $workingDetailsOfAudit['version'];
$workingStatus = $workingDetailsOfAudit['workingStatus'];
$isViewOnly = $workingDetailsOfAudit['isViewOnly'];
$clauseManager = new AuditClauseManager();
for($i=0;$i<count($complianceId);$i++)
{
$allClauses[$i] = $clauseManager->getAll($complianceId[$i], $workingDetailsOfAudit);
}
error_log("complianceId".print_r($complianceId,true));
$accordionId = $complianceId;  
$GLOBALS['capa']="false";
function capaCheck($clause){
if($clause['subClauses']!=null){
    foreach($clause['subClauses'] as $subClause){
        capaCheck($subClause);
        }
}
else{
    foreach ($clause['checklists'] as $checklist) {
        if($checklist['auditChecklistForThisCklId']['corrective_action']!=null || $checklist['auditChecklistForThisCklId']['corrective_action']!=null){
            $GLOBALS['capa']="true";
    }
        }
}
}
function tabledata($clause){ 
     error_log("clause: ".print_r($clause,true));
     ?>     


    
    
       <?php  
        if($clause['subClauses']!=null){
            ?>
             <tr>
                <td><?php echo $clause['orderNumber'] ?></td>
                <td><?php echo htmlspecialchars($clause['clauseDesc']) ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               <td></td>
               
            </tr>
            
           
            
            
        
        <?php 
            foreach($clause['subClauses'] as $subClause)
            {
        tabledata($subClause);            
        } }
        else{
            if($clause['auditClauseForThisClauseId']['priority']!="" && $clause['auditClauseForThisClauseId']['severity']!="")
            {
            $cklIdsForClause=array();
            array_push($GLOBALS['allClausesArray'],$clause['clauseId']);
         
            ?>
                <tr>
                <td><?php echo $clause['orderNumber'] ?></td>
                <td><?php echo htmlspecialchars($clause['clauseDesc'])?>
                    <input type="hidden" id="loggedInUser" value="<?php echo $GLOBALS['loggedInUserId'] ?>">
                    <input type="hidden" id="auditStatus" value="performed">
                    <input type="hidden" id="auditId" value="<?php echo $GLOBALS['auditId'] ?>">
                    <input type="hidden" id="action" value="saveClause">
                    <input type="hidden" id="auditor_comments<?php echo $clause['clauseId'] ?>" value="">
                 <!--    <input type="hidden" id="auditorStatus<?php echo $clause['clauseId'] ?>" value=""> -->
                    <input type="hidden" id="isCklsUpdateReqd<?php echo $clause['clauseId'] ?>" value="">
                    <input type="hidden" id="auditCklIdsForClause<?php echo $clause['clauseId'] ?>" value="">
                    <input type="hidden" id="score<?php echo $clause['clauseId'] ?>" value="0">

                     
                </td>
                <td></td>
                <td>
                   <?php echo $clause['auditClauseForThisClauseId']['priority']?>
                    </td>
                <td> 
                    <?php echo $clause['auditClauseForThisClauseId']['severity']?>
                    </td>
                    <td>  <?php echo $clause['auditClauseForThisClauseId']['target_date']?>  </td>
                    <td></td>
                    <td></td>
                    <td style="width:180px">


                       <?php
                       if($GLOBALS['workingStatus']=='approval pending'){
                            require_once __DIR__.'/../../php/common/appConfig.php';
                            $allAuditClauseStatus =AppConfig::getAllConfigValues('audit_clause_status');
                        ?> 
                        <input id="auditClauseStatusToggle<?php echo $clause['clauseId'] ?>" type="checkbox" data-toggle="toggle" data-on="<i class='fa fa-thumbs-up'></i>" data-off="<i class='fa fa-thumbs-down'>" onchange="toggleEventClause(<?php echo $clause['clauseId']?>)" <?php if($clause['auditClauseForThisClauseId']['status']=='accepted'){ echo 'checked' ;} ?> data-onstyle="success" data-offstyle="danger">

                      <!--   <input id="auditClauseStatusToggle<?php echo $clause['clauseId'] ?>" type="checkbox" data-toggle="toggle" data-on="accepted" data-off="rejected" onchange="toggleEventClause(<?php echo $clause['clauseId']?>)" <?php if($clause['auditClauseForThisClauseId']['status']=='accepted'){ echo 'checked' ;} ?>> -->
                        <input type="hidden" id="auditorStatus<?php echo $clause['clauseId'] ?>" value="<?php if($clause['auditClauseForThisClauseId']['status']=='accepted'||$clause['auditClauseForThisClauseId']['status']=='rejected'){echo $clause['auditClauseForThisClauseId']['status']; } else{ echo 'rejected';}?>">
             <i id="myBtn<?php echo $clause['clauseId'] ?>" class="fa fa-comment"onclick="scoreClauseComment(<?php echo $clause['clauseId'] ?>)" style="color: #337ab7;font-size: 20px;" data-toggle="tooltip" title="comment"></i>

<div id="scoringModal<?php echo $clause['clauseId'] ?>" class="modal">

  <div class="modal-content" style="margin-top: 20%;width: 20%;margin-left: 55%;">
    <span class="close"  onclick="hideclauseComment(<?php echo $clause['clauseId'] ?>)">&times;</span>   
                
                  <textarea class="form-control" cols="2" rows="2" id="<?php echo 'auditor_comments'.$clause['clauseId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($auditor_comments); ?></textarea>
                  </div>
                  </div>
                     
                            
                <!-- 
                  <textarea placeholder="Comments" class="form-control" maxlength="5000" rows="1" id="<?php echo 'auditor_comments'.$clause['clauseId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($auditor_comments); ?></textarea> -->
                 
                        <?php $auditClauseScore=array("1","2","3","4","5","6","7","8","9","10"); ?>
                        <h6 style="margin-top: -40px; margin-left: 116px;">Score:</h6>
                   <div class="slidecontainer">
                      <input type="range" style="display: block;width: 41%;margin-top: -6px;margin-left: 98px;"  min="1" max="10"  value="5" class="slider" id="<?php echo 'auditorScore'.$clause['clauseId']?>" name="auditorScoreDropDown" class="form-control" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> onchange="<?php echo 'updateCklScore('.$clause['clauseId'].')'?>">
                    <p id="scoreClause<?php echo $clause['clauseId'] ?>" <?php echo $score ?>" style="margin-top: -7px;margin-left: 108px;"></p>
                   </div> 
                       
                       
                       </div>
                       <?php } ?>
                    </td>
            
               
                    
    </tr>
            <?php foreach($clause['checklists'] as $checklist){
                    $cklIdsForClause[]=$checklist['checklistId'];
                ?>
                   <tr>
                <td><input type="hidden" id="auditee_comments<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_response'] ?>">
                    <input type="hidden" id="auditee_response<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_comment']?>">
                    <input type="hidden" id="userFileName<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['auditChecklistForThisCklId']['file_name']?>">
                    <input type="hidden" id="checklistScore<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['checklistScore']?>">
                     <input type="hidden" id="clauseId<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['clauseId']?>">
                </td>
                <td></td>
                <td><?php echo $checklist['checklistDesc']?> </td>
                 <td></td>
                <td></td>
                <td></td>
                <td>
                    
                    <?php
                    switch($checklist['formFieldType']){  
                        case 1:
                       
                        echo $checklist['auditChecklistForThisCklId']['auditee_response'];
                        ?>
                        <input type="hidden" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_response'] ?>" id="auditee_response.<?php $checklist['checklistId']?>">
                    
                <?php
                break;
                        case 2:
                     foreach($checklist['cklOptions'] as $cklOpt){ ?>
                    <div id="<?php echo 'cklOptsModal'.$checklist['checklistId'] ?>">
                        <input type="hidden" class="form-control" id="<?php echo 'auditee_response'.$checklist['checklistId']?>" value="">
                          
                               <ul id="<?php echo 'cklOpts'.$checklist['checklistId'] ?>">
                                <li>
                                    <div class="panel-default">
                                <input type="<?php echo MetaData::getMlChoiceControl($checklist['formFieldType']) ?>" name="cklOptionResp[]" value="<?php echo $cklOpt['cklOptId'] ?>" disabled="disabled"
                                <?php if(strpos($checklist['auditChecklistForThisCklId']['auditee_response'], ''.$cklOpt['cklOptId']) !== false) echo 'checked' ?>>
                                <?php echo $cklOpt['cklOptData'] ?>
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptId-'.$cklOpt['cklOptId']?>" value="<?php echo $cklOpt['cklOptId'] ?>">
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptData'.$cklOpt['cklOptId'] ?>" value="<?php echo $cklOpt['cklOptData'] ?>">
                            </div>
                        </li>
                        </ul>
                        
                      </div>
            <?php
           
        }
                     break;
                        case 3:
                          foreach($checklist['cklOptions'] as $cklOpt){ ?>
                          <div id="<?php echo 'cklOptsModal'.$checklist['checklistId'] ?>">
                          <li>
                          <ul id="<?php echo 'cklOpts'.$checklist['checklistId'] ?>">
                               
                                <input type="<?php echo MetaData::getMlChoiceControl($checklist['formFieldType']) ?>" name="cklOptionResp[]" value="<?php echo $cklOpt['cklOptId'] ?>" <?php if($isViewOnly) echo 'disabled="disabled"'?>
                                <?php if(strpos($auditee_response, ''.$cklOpt['cklOptId']) !== false) echo 'checked' ?>>
                                <?php echo $cklOpt['cklOptData'] ?>
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptId-'.$cklOpt['cklOptId']?>" value="<?php echo $cklOpt['cklOptId'] ?>">
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptData'.$cklOpt['cklOptId'] ?>" value="<?php echo $cklOpt['cklOptData'] ?>">
                                <?php }
                                break;
                        
            }
                ?>
                    </ul>
                    </li>
                  </div>
                  <?php if($checklist['auditChecklistForThisCklId']['file_name']!=""){ ?>
                            <a class="btn btn-primary" href="uploadedFiles/auditeeFiles/<?php  echo $checklist['auditChecklistForThisCklId']['file_name'] ?>" download>File</a>
                        <?php }?>
                    </td>
               
                <td><input type="hidden" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_comment'] ?>" id="auditee_comments.<?php $checklist['checklistId']?>"><?php echo $checklist['auditChecklistForThisCklId']['auditee_comment'] ?></td>
                <td>
 
                <?php
                            require_once __DIR__.'/../../php/common/appConfig.php';
                            $allAuditClauseStatus = AppConfig::getAllConfigValues('audit_clause_status');
                        ?>
                      <!--   <input id="auditStatusToggle<?php echo $checklist['checklistId'] ?>" type="checkbox" data-toggle="toggle" data-on="accepted" data-off="rejected" onchange="toggleEventCkl(<?php echo $checklist['checklistId']?>)" <?php if($checklist['auditChecklistForThisCklId']['status']=='accepted'){ echo 'checked';} ?>  <?php if($GLOBALS['workingStatus']!="approval pending") echo 'class="checkbox disabled"'?>> -->
                         <input id="auditStatusToggle<?php echo $checklist['checklistId'] ?>" type="checkbox" data-toggle="toggle" data-on="<i class='fa fa-thumbs-up'></i>" data-off="<i class='fa fa-thumbs-down'>" onchange="toggleEventCkl(<?php echo $checklist['checklistId']?>)" <?php if($checklist['auditChecklistForThisCklId']['status']=='accepted'){ echo 'checked';} ?>  <?php if($GLOBALS['workingStatus']!="approval pending") echo 'class="checkbox disabled"'?> data-onstyle="success" data-offstyle="danger">
                        <input type="hidden" id="<?php echo 'auditorStatusCkl'.$checklist['checklistId']?>" value="<?php if($checklist['auditChecklistForThisCklId']['status']=='accepted'||$checklist['auditChecklistForThisCklId']['status']=='rejected'){
                            echo $checklist['auditChecklistForThisCklId']['status'];
                        } 
                        else{
                                echo 'rejected';    }?>">
                                <!-- <button id="myBtn<?php echo $checklist['checklistId'] ?>" class="fa fa-comment-o"onclick="scoreChlkComment(<?php echo $checklist['checklistId'] ?>)" style="border-radius: 18%;width: 60px;height: 35px;background: #337ab7;color: white;font-size: 15px;" data-toggle="tooltip" title="comment"></button> -->
                        <!--   <div id="console-event"></div> -->
                            
                       

                    <i id="myBtn<?php echo $checklist['checklistId'] ?>" class="fa fa-comment" onclick="scoreChlkComment(<?php echo $checklist['checklistId'] ?>)" style="color:  #337ab7;font-size: 20px;" data-toggle="tooltip" title="comment"></i>

                    <div id="chlkComment<?php echo $checklist['checklistId'] ?>" class="modal">

                    <div class="modal-content">
                    <span class="close" style="width: 25px;margin-top: -12px;margin-right: -12px;height: 23px;" onclick="hidechlkComment(<?php echo $checklist['checklistId'] ?>)">&times;</span> <textarea  class="form-control" cols="2" rows="2" id="<?php echo 'observation'.$checklist['checklistId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($checklist['auditChecklistForThisCklId']['auditor_comment']); ?></textarea>
                    </div>
                    </div>

                <!--  <textarea placeholder="Comments" class="form-control" maxlength="5000" rows="1" id="<?php echo 'observation'.$checklist['checklistId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($checklist['auditChecklistForThisCklId']['auditor_comment']); ?></textarea> -->
                
                    <?php 
                    $checklistScore=array("1","2","3","4","5","6","7","8","9","10");
                    ?>

                  
                    
                   <h6 style="margin-top: -40px; margin-left: 116px;">Score:</h6>
                   <div class="slidecontainer">
                      <input type="range" style="display: block;width: 41%;margin-top: -6px;margin-left: 98px;" min="1" max="10"  value="<?php if($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']==""){ echo 5; } else{ echo round($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']/$checklist['checklistScore']*10);} ?>" class="slider" id="<?php echo 'auditorScoreCkl'.$checklist['checklistId']?>"  name="auditorScoreDropDown" class="form-control"  <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> onchange="displayScore(<?php echo $checklist['checklistId'] ?>)">
                    <p id="Score<?php echo $checklist['checklistId'] ?>" style="margin-top: -7px;margin-left: 108px;" ><?php if($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']==""){ echo 5; } else{ echo round($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']/$checklist['checklistScore']*10);} ?></p>
                   </div>
                           

                          
                        </td>
            </tr>
           

<?php  
            }
            
?>
           <input type="hidden" class="form-control" id="<?php echo 'cklIdsForClause'.$clause['clauseId'] ?>" value="<?php echo join(',', $cklIdsForClause) ?>">
          
  <?php             
        
  }
}
    }
function tabledataCAPA($clause){ 
     error_log("clause: ".print_r($clause,true));
     ?>     


    
    
       <?php  
        if($clause['subClauses']!=null){
            ?>
             <tr>
                <td><?php echo $clause['orderNumber'] ?></td>
                <td><?php echo htmlspecialchars($clause['clauseDesc']) ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               <td></td>
               <td></td>
               
            </tr>
            
           
            
            
        
        <?php 
            foreach($clause['subClauses'] as $subClause)
            {
        tabledataCAPA($subClause);            
        } }
        else{
            if($clause['auditClauseForThisClauseId']['priority']!="" && $clause['auditClauseForThisClauseId']['severity']!="")
            {
            $cklIdsForClause=array();
            array_push($GLOBALS['allClausesArray'],$clause['clauseId']);
         
            ?>
                <tr>
                <td><?php echo $clause['orderNumber'] ?></td>
                <td><?php echo htmlspecialchars($clause['clauseDesc'])?>
                    <input type="hidden" id="loggedInUser" value="<?php echo $GLOBALS['loggedInUserId'] ?>">
                    <input type="hidden" id="auditStatus" value="performed">
                    <input type="hidden" id="auditId" value="<?php echo $GLOBALS['auditId'] ?>">
                    <input type="hidden" id="action" value="saveClause">
                    <input type="hidden" id="auditor_comments<?php echo $clause['clauseId'] ?>" value="">
                 <!--    <input type="hidden" id="auditorStatus<?php echo $clause['clauseId'] ?>" value=""> -->
                    <input type="hidden" id="isCklsUpdateReqd<?php echo $clause['clauseId'] ?>" value="">
                    <input type="hidden" id="auditCklIdsForClause<?php echo $clause['clauseId'] ?>" value="">
                    <input type="hidden" id="score<?php echo $clause['clauseId'] ?>" value="0">

                     
                </td>
                <td></td>
                <td>
                   <?php echo $clause['auditClauseForThisClauseId']['priority']?>
                    </td>
                <td> 
                    <?php echo $clause['auditClauseForThisClauseId']['severity']?>
                    </td>
                    <td>  <?php echo $clause['auditClauseForThisClauseId']['target_date']?>  </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="width:180px">


                       <?php
                       if($GLOBALS['workingStatus']=='approval pending'){
                            require_once __DIR__.'/../../php/common/appConfig.php';
                            $allAuditClauseStatus =AppConfig::getAllConfigValues('audit_clause_status');
                        ?> 
                        <input id="auditClauseStatusToggle<?php echo $clause['clauseId'] ?>" type="checkbox" data-toggle="toggle" data-on="<i class='fa fa-thumbs-up'></i>" data-off="<i class='fa fa-thumbs-down'>" onchange="toggleEventClause(<?php echo $clause['clauseId']?>)" <?php if($clause['auditClauseForThisClauseId']['status']=='accepted'){ echo 'checked' ;} ?> data-onstyle="success" data-offstyle="danger">

                      <!--   <input id="auditClauseStatusToggle<?php echo $clause['clauseId'] ?>" type="checkbox" data-toggle="toggle" data-on="accepted" data-off="rejected" onchange="toggleEventClause(<?php echo $clause['clauseId']?>)" <?php if($clause['auditClauseForThisClauseId']['status']=='accepted'){ echo 'checked' ;} ?>> -->
                        <input type="hidden" id="auditorStatus<?php echo $clause['clauseId'] ?>" value="<?php if($clause['auditClauseForThisClauseId']['status']=='accepted'||$clause['auditClauseForThisClauseId']['status']=='rejected'){echo $clause['auditClauseForThisClauseId']['status']; } else{ echo 'rejected';}?>">
             <i id="myBtn<?php echo $clause['clauseId'] ?>" class="fa fa-comment"onclick="scoreClauseComment(<?php echo $clause['clauseId'] ?>)" style="color: #337ab7;font-size: 25px;" data-toggle="tooltip" title="comment"></i>

<div id="scoringModal<?php echo $clause['clauseId'] ?>" class="modal">

  <div class="modal-content">
    <span class="close" style="width: 25px;margin-top: -12px;margin-right: -12px;height: 23px;" onclick="hideclauseComment(<?php echo $clause['clauseId'] ?>)">&times;</span>   
                
                  <textarea class="form-control" cols="2" rows="2" id="<?php echo 'auditor_comments'.$clause['clauseId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($auditor_comments); ?></textarea>
                  </div>
                  </div>
                     
                            
                <!-- 
                  <textarea placeholder="Comments" class="form-control" maxlength="5000" rows="1" id="<?php echo 'auditor_comments'.$clause['clauseId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($auditor_comments); ?></textarea> -->
                 
                        <?php $auditClauseScore=array("1","2","3","4","5","6","7","8","9","10"); ?>
                        <h6 style="margin-top: -25px; margin-left: 116px;">Score:</h6>
                   <div class="slidecontainer">
                      <input type="range" min="1" max="10"  value="5" style="display: block;width: 41%;margin-top: -6px;margin-left: 98px;" class="slider" id="<?php echo 'auditorScore'.$clause['clauseId']?>" name="auditorScoreDropDown" class="form-control" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> onchange="<?php echo 'updateCklScore('.$clause['clauseId'].')'?>">
                    <p id="scoreClause<?php echo $clause['clauseId'] ?>" style="margin-top: -7px;margin-left: 108px; <?php echo $score ?>"></p>
                   </div> 

                       
                       

                       </div>
                       <?php } ?>

                    </td>
                    
            
               
                    
    </tr>
            <?php foreach($clause['checklists'] as $checklist){
                    $cklIdsForClause[]=$checklist['checklistId'];
                ?>

                   <tr>
                <td><input type="hidden" id="auditee_comments<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_response'] ?>">
                    <input type="hidden" id="auditee_response<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_comment']?>">
                    <input type="hidden" id="userFileName<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['auditChecklistForThisCklId']['file_name']?>">
                    <input type="hidden" id="checklistScore<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['checklistScore']?>">
                     <input type="hidden" id="clauseId<?php echo $checklist['checklistId'] ?>" value="<?php echo $checklist['clauseId']?>">
                </td>
                <td></td>
                <td><?php echo $checklist['checklistDesc']?> </td>
                 <td></td>
                <td></td>
                <td></td>
                 <td><?php echo $checklist['auditChecklistForThisCklId']['corrective_action'] ?>
                   <input type="hidden" id="<?php echo 'ca'.$checklist['checklistId']?>" value="<?php echo $checklist['auditChecklistForThisCklId']['corrective_action'] ?>">
                 </td>
                <td>
                    
                    <?php
                    switch($checklist['formFieldType']){  
                        case 1:
                       
                        echo $checklist['auditChecklistForThisCklId']['auditee_response'];
                        ?>
                        <input type="hidden" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_response'] ?>" id="auditee_response.<?php $checklist['checklistId']?>">
                    
                <?php
                break;
                        case 2:
                     foreach($checklist['cklOptions'] as $cklOpt){ ?>
                    <div id="<?php echo 'cklOptsModal'.$checklist['checklistId'] ?>">
                        <input type="hidden" class="form-control" id="<?php echo 'auditee_response'.$checklist['checklistId']?>" value="">
                          
                               <ul id="<?php echo 'cklOpts'.$checklist['checklistId'] ?>">
                                <li>
                                    <div class="panel-default">
                                <input type="<?php echo MetaData::getMlChoiceControl($checklist['formFieldType']) ?>" name="cklOptionResp[]" value="<?php echo $cklOpt['cklOptId'] ?>" disabled="disabled"
                                <?php if(strpos($checklist['auditChecklistForThisCklId']['auditee_response'], ''.$cklOpt['cklOptId']) !== false) echo 'checked' ?>>
                                <?php echo $cklOpt['cklOptData'] ?>
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptId-'.$cklOpt['cklOptId']?>" value="<?php echo $cklOpt['cklOptId'] ?>">
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptData'.$cklOpt['cklOptId'] ?>" value="<?php echo $cklOpt['cklOptData'] ?>">
                            </div>
                        </li>
                        </ul>
                        

                      </div>
            <?php
           
        }
                     break;
                        case 3:
                          foreach($checklist['cklOptions'] as $cklOpt){ ?>
                          <div id="<?php echo 'cklOptsModal'.$checklist['checklistId'] ?>">
                          <li>
                          <ul id="<?php echo 'cklOpts'.$checklist['checklistId'] ?>">
                               
                                <input type="<?php echo MetaData::getMlChoiceControl($checklist['formFieldType']) ?>" name="cklOptionResp[]" value="<?php echo $cklOpt['cklOptId'] ?>" <?php if($isViewOnly) echo 'disabled="disabled"'?>
                                <?php if(strpos($auditee_response, ''.$cklOpt['cklOptId']) !== false) echo 'checked' ?>>
                                <?php echo $cklOpt['cklOptData'] ?>
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptId-'.$cklOpt['cklOptId']?>" value="<?php echo $cklOpt['cklOptId'] ?>">
                                <input type="hidden" class="form-control" id="<?php echo 'cklOptData'.$cklOpt['cklOptId'] ?>" value="<?php echo $cklOpt['cklOptData'] ?>">
                                <?php }
                                break;
                        
            }
                ?>
                    </ul>
                    </li>
                  </div>
                  <?php if($checklist['auditChecklistForThisCklId']['file_name']!=""){ ?>
                            <a class="btn btn-primary" href="uploadedFiles/auditeeFiles/<?php  echo $checklist['auditChecklistForThisCklId']['file_name'] ?>" download>File</a>
                        <?php }?>
                    </td>
               
                <td><input type="hidden" value="<?php echo $checklist['auditChecklistForThisCklId']['auditee_comment'] ?>" id="auditee_comments.<?php $checklist['checklistId']?>"><?php echo $checklist['auditChecklistForThisCklId']['auditee_comment'] ?></td>
                <td style="width:180px ">
                <?php
                            require_once __DIR__.'/../../php/common/appConfig.php';
                            $allAuditClauseStatus = AppConfig::getAllConfigValues('audit_clause_status');
                        ?>

                      <!--   <input id="auditStatusToggle<?php echo $checklist['checklistId'] ?>" type="checkbox" data-toggle="toggle" data-on="accepted" data-off="rejected" onchange="toggleEventCkl(<?php echo $checklist['checklistId']?>)" <?php if($checklist['auditChecklistForThisCklId']['status']=='accepted'){ echo 'checked';} ?>  <?php if($GLOBALS['workingStatus']!="approval pending") echo 'class="checkbox disabled"'?>> -->
                         <input id="auditStatusToggle<?php echo $checklist['checklistId'] ?>" type="checkbox" data-toggle="toggle" data-on="<i class='fa fa-thumbs-up'></i>" data-off="<i class='fa fa-thumbs-down'>" onchange="toggleEventCkl(<?php echo $checklist['checklistId']?>)" <?php if($checklist['auditChecklistForThisCklId']['status']=='accepted'){ echo 'checked';} ?>  <?php if($GLOBALS['workingStatus']!="approval pending") echo 'class="checkbox disabled"'?> data-onstyle="success" data-offstyle="danger">
                        <input type="hidden" id="<?php echo 'auditorStatusCkl'.$checklist['checklistId']?>" value="<?php if($checklist['auditChecklistForThisCklId']['status']=='accepted'||$checklist['auditChecklistForThisCklId']['status']=='rejected'){
                            echo $checklist['auditChecklistForThisCklId']['status'];
                        } 
                        else{
                                echo 'rejected';    }?>">
                                <!-- <button id="myBtn<?php echo $checklist['checklistId'] ?>" class="fa fa-comment-o"onclick="scoreChlkComment(<?php echo $checklist['checklistId'] ?>)" style="border-radius: 18%;width: 60px;height: 35px;background: #337ab7;color: white;font-size: 15px;" data-toggle="tooltip" title="comment"></button> -->
                        <!--   <div id="console-event"></div> -->
                            
                       

                    <button id="myBtn<?php echo $checklist['checklistId'] ?>" class="fa fa-comment-o"onclick="scoreChlkComment(<?php echo $checklist['checklistId'] ?>)" style="border-radius: 18%;width: 65px;height: 35px;background: #337ab7;color: white;font-size: 15px;" data-toggle="tooltip" title="comment"></button>

                    <div id="chlkComment<?php echo $checklist['checklistId'] ?>" class="modal">

                    <div class="modal-content">
                    <span class="close" style="width: 25px;margin-top: -12px;margin-right: -12px;height: 23px;" onclick="hidechlkComment(<?php echo $checklist['checklistId'] ?>)">&times;</span> <textarea  class="form-control" cols="2" rows="2" id="<?php echo 'observation'.$checklist['checklistId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($checklist['auditChecklistForThisCklId']['auditor_comment']); ?></textarea>
                    </div>
                    </div>

                <!--  <textarea placeholder="Comments" class="form-control" maxlength="5000" rows="1" id="<?php echo 'observation'.$checklist['checklistId']?>" <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> ><?php echo htmlspecialchars($checklist['auditChecklistForThisCklId']['auditor_comment']); ?></textarea> -->
                
                    <?php 
                    $checklistScore=array("1","2","3","4","5","6","7","8","9","10");
                    ?>

                  
                    
                   <h6 style="margin-top: -40px; margin-left: 116px;">Score:</h6>
                   <div class="slidecontainer">
                      <input type="range" min="1" max="10" style="display: block;width: 41%;margin-top: -6px;margin-left: 98px;" value="<?php if($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']==""){ echo 5; } else{ echo round($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']/$checklist['checklistScore']*10);} ?>" class="slider" id="<?php echo 'auditorScoreCkl'.$checklist['checklistId']?>"  name="auditorScoreDropDown" class="form-control"  <?php if($GLOBALS['workingStatus']!="approval pending") echo 'disabled="disabled"'?> onchange="displayScore(<?php echo $checklist['checklistId'] ?>)">
                    <p id="Score<?php echo $checklist['checklistId'] ?>" style="margin-top: -7px;margin-left: 108px; ><?php if($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']==""){ echo 5; } else{ echo round($checklist['auditChecklistForThisCklId']['audit_checklist_score_per']/$checklist['checklistScore']*10);} ?></p>
                   </div>
                           
                          
                        </td>
            </tr>
           
<?php  
            }
            
?>
           <input type="hidden" class="form-control" id="<?php echo 'cklIdsForClause'.$clause['clauseId'] ?>" value="<?php echo join(',', $cklIdsForClause) ?>">
          
  <?php             
        
  }
}
    }
    
 
?>
<!DOCTYPE html>
<html>

<head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshgrc</title>
        <meta name="description" content="Buttons examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
        
        
        <!--begin:: Global Mandatory Vendors -->
<link href="./assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="./assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

   
 <link href="assets/toggleButton/bootstrap-toggle.min.css" rel="stylesheet" type="text/css" />
  
  
  
                    
   <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
           
        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
    </head>

<?php 
  include '../siteHeader.php';
  ?>
   <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

       
    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -12%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="" >
  <a class="flaticon2-arrow" data-toggle="collapse" data-target="#demo" style="font-size: 16px;">View Audit Summary</a><br><br>
  <div id="demo" class="collapse">
    <div class="kt-portlet">
<!-- <div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
AUDIT PLAN</h3>
</div>

</div> --> 
   <div class="panel-body">
      <!--     <div class="table-responsive"> -->
            <table class="table table-striped list-table table-bordered">
            <tr style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333">
                <th style="font-size: 15px;" colspan="6">Plan</th>
            </tr>
            <tr>
              <td><label  class="col-sm-4">Title:</label>
                <span><?php echo $auditdetails[0]['title'];?></span>
              </td>
              <td><label class="col-sm-4">ComplianceName:</label>
                <input type="hidden" name="RiskId" id="RiskId" value="<?php echo $RiskId;?>">
                <span><?php echo $auditdetails[0]['complianceName'];?></span>
              </td>
               <td><label  class="col-sm-4">Type :</label>
                <span><?php echo $auditdetails[0]['type'];?></span>
              </td>
              
            </tr>
            <tr> 
              <td><label  class="col-sm-4">AuditorName :</label>
                <span><?php echo $auditdetails[0]['auditorName'];?></span>
              </td>
            <td><label  class="col-sm-4">CompanyName:</label>
                <span><?php echo $auditdetails[0]['companyName'];?></span>
              </td>                        
              <td><label  class="col-sm-4">Status:</label>
                <span><?php echo $auditdetails[0]['status'];?></span>
              </td>
              
              
            </tr>
            <tr>
            <td><label  class="col-sm-4">Department:</label>
                <span><?php echo $auditdetails[0]['deptname '];?></span>
              </td> 
            <td><label class="col-sm-4">Location:</label>
                <span><?php echo $auditdetails[0]['lname'];?></span>
              </td>                         
              <td><label  class="col-sm-4">Version:</label>
                <span><?php echo $auditdetails[0]['version'];?></span>
              </td>
               
                                       
            </tr>
           
              
            
          </table>
          <br>

        </div>
  </div>
</div>
</div>

<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
<?php echo $auditTitle?>
</h3>
</div>
 <?php if($_SESSION['user_role'] == 'auditor'||$_SESSION['user_role'] == 'demo') {?>
                <div class="row">
                  <div style="margin-top: 10px;">
                <button class="btn btn-info mt-ladda-btn ladda-button"  onclick="saveAllChecklists(allClauses)" <?php if($workingStatus!="approval pending") echo "style='display:none'" ?> title="Draft">
                <i class="fa fa-pencil-square"></i>Draft </button> 
                 <button  class="btn btn-danger mt-ladda-btn ladda-button" data-style="expand-right" onclick="saveAndChangeAuditCklStatus(allClauses,<?php echo $auditId ?>, 'returned', false, <?php echo $GLOBALS['capa'] ?>)" <?php if($workingStatus!="approval pending") echo "style='display:none'" ?> title="return"><i class="fa fa-undo"></i>Return </button> 
                  <button  class="btn btn-warning mt-ladda-btn ladda-button" data-style="expand-right" onclick="saveAndChangeAuditCklStatus(allClauses,<?php echo $auditId ?>, 'approved', false, <?php echo $GLOBALS['capa'] ?>)" <?php if($workingStatus!="approval pending") echo "style='display:none'" ?> title="Approve"><i class="fa fa-check"></i> Approve</button> 
               </div>
             </div>
            <?php }?>
</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
            <?php if($_SESSION['user_role'] == 'auditor') {?>
               <!--  <div class="col-xs-2" id="create1">
                    <button class="btn btn-warning btn-block" style="background-color: #aa66ce" 
                    onclick="window.location.href='/freshgrc/view/audit/auditPlanCreate.php'"><i class="fa fa-user"></i> Create Audit</button>
                </div>
                <div class="col-xs-2" id="publishAudit">
                    <button class="btn btn-warning btn-block " style="background-color: #aa66ce" 
                    onclick="publishAuditList()"><i class="fa fa-user"></i>Published Audits</button>
                </div> -->
            <?php }?>
            
               
      
            
<?php 
 foreach($allClauses as $clauses)
                {
                foreach ($clauses as $clause) {
                 capaCheck($clause);
                }
            }
?>
  <div class="table-responsive">
    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1" style="border-color: 1px solid red;">
<?php if($GLOBALS['capa']=="false"){
?>   
                <thead >
                    <tr>
                        <th>Control Number</th>
                        <th>Control Set</th>
                        <th>Controls</th>
                        <th>Priority</th>
                        <th>Severity</th>
                        <th>targetDate</th>
                        <th>Auditee Response</th>
                        <th>Auditee Comments</th>
                        <th>Auditor Response</th>
                       
                    </tr>
                </thead>
                <?php
                foreach($allClauses as $clauses)
                {
                foreach ($clauses as $clause) {
                 tabledata($clause);
                }
            }
                }
                else{
                    ?>
                   
                <thead>
                    <tr>
                        <th>Control Number</th>
                        <th>Control Set</th>
                        <th>Controls</th>
                        <th>Priority</th>
                        <th>Severity</th>
                        <th>targetDate</th>
                        <th>Auditee Action</th>
                        <th>Auditee Response</th>
                        <th>Auditee Comments</th>       
                        <th>Auditor Response</th>
                       
                    </tr>
                </thead>
           
<?php
                foreach($allClauses as $clauses)
                {
                foreach ($clauses as $clause) {
                 tabledataCAPA($clause);
                }
            }
                } 
                
                    
                ?>
            </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div>
  
</div>

<?php
include 'sidemenu.php';
 ?>
 <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->

     <script src="js/compliance/clauseManagement.js"></script>
    <script src="js/audit/auditClauseManagement.js"></script>
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="./assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="./assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="./assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="./assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="./assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="./assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="./assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="./assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="./assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script> 
      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

                    
            </body>
    <!-- end::Body -->
</html>
<script>
        var allClauses=<?php echo json_encode($GLOBALS['allClausesArray'])?>;
   /*     var slider = document.getElementById("auditorScoreCkl");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
}
         $(document).ready(function(){
    $("#show").click(function(){
        $("textarea").show();
        
    });
    
});*/
    </script> 
    
<?php
?>