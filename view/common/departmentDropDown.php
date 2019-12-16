<?php
require_once '../../php/company/companyDepartmentManager.php';
$manager = new CompnayDepartmentManager();
$allDepartments=$manager->getAllCompaniesDepartment();

?>
      
 <div class="input-group">
  <select id="department" class="form-control">
      <option>...select...</option>          
<?php foreach($allDepartments as $department){
                          
                ?>
                <option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>

                <?php  } ?>
              </select>

             
            </div>
   