<?php
require_once '../../php/common/dashboard.php';


$manager = new dashboard();
$allUsers = $manager->getAllUsersForTicket();


?>
    <div class="col-md-13">
    <select id="assignedto" name="assignedtoDropDown" class="form-control" >
    <option>--Select User--</option>    
    <?php foreach($allUsers as $users){ ?>
    <option value="<?php echo $users['id'] ?>"><?php echo htmlspecialchars($users['last_name']) ?></option>
   <?php } ?>
</select>
</div>