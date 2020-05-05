<?php require_once __DIR__.'/../header.php';
?>
<!DOCTYPE html>
<html>
<head>
<title> Side Menu</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<base href="/freshgrc/">
</head>
<body>

<div class="kt-grid kt-grid--hor kt-grid--root" >
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                       
<div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
	<div class="kt-aside__brand-logo">
		<?php if($_SESSION['user_role']=='auditor'||$_SESSION['user_role']=='auditees1') {?>
			<a href="view/audit/auditDashboard.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='auditee') {?>
			<a href="view/audit/auditDashboard.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='super_admin'||$_SESSION['user_role']=='demo') {?>
			<a href="view/common/overview.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='policy_owner' ||$_SESSION['user_role']=='policy_approver' ||$_SESSION['user_role']=='policy_reviewer')  {?>
			<a href="view/policy/policyDashboard.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='board_user'||$_SESSION['user_role']=='board_reviewer') {?>
			<a href="view/board/board_dashboard.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='risk_owner'||$_SESSION['user_role']=='risk_mitigator'||$_SESSION['user_role']=='risk_reviewer') {?>
			<a href="view/common/riskDashboard.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='compliance_author'||$_SESSION['user_role']=='compliance_reviewer') {?>
			<a href="view/compliance/complianceDashboardAdmin.php">
			<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='disaster_owner'||$_SESSION['user_role']=='disaster_tester'||$_SESSION['user_role']=='disaster_trainer') {?>
		<a href="view/disaster/disasterDashboard.php">
		<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='bcpm_planner' || $_SESSION['user_role']=='bcpm_maintainer' || $_SESSION['user_role']=='bcpm_tester' || $_SESSION['user_role']=='bcpm_implementer') {?>
		<a href="view/common/overview.php">
		<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="80px" />
		</a>
		<?php } ?>
		<?php if($_SESSION['user_role']=='asset_owner' || $_SESSION['user_role']=='asset_custodian' || $_SESSION['user_role']=='asset_reviewer') {?>
		<a href="view/asset/assetDashboard.php">
		<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
		</a>
		<?php } ?>

	                        <?php if($_SESSION['user_role']=='incident_analyst' || $_SESSION['user_role']=='incident_resolver'|| $_SESSION['user_role']=='incident_manager' || $_SESSION['user_role']=='incident_reviewer') {?>
	<a href="view/incident/incidentDashboard.php">
	<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
	</a>
	<?php } ?>

	                        <?php if($_SESSION['user_role']=='employee' || $_SESSION['user_role']=='ethics_reviewer'|| $_SESSION['user_role']=='ethics_approver') {?>
	<a href="view/ethics/ethics_dashboard.php">
	<img src=" ./assets/media/logos/fixnix.png" alt="" width="100px" height="100px" />
	</a>
	<?php } ?>

	</div>
</div>

<!-- end:: Aside -->

<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

<div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
<?php if($_SESSION['user_role']=='auditor'){?>
<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Audit</span></a></li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/plan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditCreateAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Kickoff</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPerformAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Review</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPublished.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Reports</span></a></li>


</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='auditee') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Audit</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPrepareAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Respond</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditReturnAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Followup</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPublished.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Reports</span></a></li>


</ul>
<?php } ?>
<?php if($_SESSION['user_role']=='auditee1'){?>
<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Audit</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPrepareAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Respond</span></a>
</li>
</ul>

<?php } ?>
<?php
if($_SESSION['user_role']=='employee') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Ethics</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/ethics/employeelist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Policy</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/ethics/employeeReportlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Exception</span></a></li>



</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='ethics_reviewer') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Ethics</span></a></li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/ethics/reviewlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Exception</span></a></li>



</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='ethics_approver') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Ethics</span></a></li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/ethics/approverList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Exception</span></a></li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/ethics/EthicsReport.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Report</span></a></li>




</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='risk_owner') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/common/riskDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Risk</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskplan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/incidentList.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Incident as Risk</span></a></li>


</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='risk_mitigator') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/common/riskDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Risk</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskcreatedlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Mitigate</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/registerRisk.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text">Risk Register</span></a></li>


</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='risk_reviewer') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/common/riskDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Risk</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskmitigatedlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Review</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskreviewedlist.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text">Risk Register</span></a></li>


</ul>
<?php } ?>


<?php
if($_SESSION['user_role']=='super_admin') { ?>
                             
<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="700" data-mobile-height="200">
<ul class="kt-menu__nav ">

<li class="kt-menu__item toggle" aria-haspopup="true"><span class="kt-menu__link text-center"><a href="view/compliance/complianceCreateAdmin.php"><i class="kt-menu__link-icon flaticon2-graph kt-menu__link text-center"></i></a><span class="kt-menu__link-text">Regulatory Engine<i class="la la-angle-down" style="margin-top: 20px; margin-left: -7px;"></i></span></span>

<!-- <li class="kt-menu__item shw" aria-haspopup="true" style="display: none;"><a  href="view/compliance/newcompliance.php" class="kt-menu__link  text-center" ><i class="fas fa-dot-circle"></i><span class="kt-menu__link-text ">New</span></a></li> -->



<li class="kt-menu__item shw" aria-haspopup="true" style="display: none;" ><a href="view/policy/Regulatoryengine.php" class="kt-menu__link text-center"><i class="fas fa-dot-circle"></i><span class="kt-menu__link-text">Enable Standard</span></a>
</li>

<!-- <li class="kt-menu__item shw" aria-haspopup="true" style="display: none;"><a href="view/policy/uploadStandard.php" class="kt-menu__link text-center"><i class="fas fa-dot-circle"></i><span class="kt-menu__link-text">Upload Standard</span></a> -->

<!-- <li class="kt-menu__item shw" aria-haspopup="true" style="display: none;"><a href="view/policy/Regulatoryengine.php" class="kt-menu__link text-center"><i class="fas fa-dot-circle"></i><span class="kt-menu__link-text">Mapping</span></a>
</li> -->
</li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-files-and-folders"></i><span class="kt-menu__link-text">Audit</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/common/riskDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-warning"></i><span class="kt-menu__link-text">Risk</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceDashboardAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-checking "></i><span class="kt-menu__link-text"> Compliance</span></a></li>

          <li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Policy</span></a></li>
          <li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-shelter"></i><span class="kt-menu__link-text">Asset</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-hourglass"></i><span class="kt-menu__link-text">Incident</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/disaster/disasterDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph-2"></i><span class="kt-menu__link-text">Disaster</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-rotate"></i><span class="kt-menu__link-text">Bcpm</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/board_dashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-notepad"></i><span class="kt-menu__link-text">Board</span></a>
</li>
</ul>
</div>

<?php } ?>

<?php if($_SESSION['user_role']=="board_user"){?>
<ul class="kt-menu__nav ">

<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/board_dashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Board</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/boardindex.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Schedule</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/boardmeetingtable.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Agenda</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/boardagendatable.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Review</span></a>
</li>
</ul>
<?php } ?>
<?php if($_SESSION['user_role']=="board_reviewer"){?>
<ul class="kt-menu__nav ">

<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/board_dashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Board</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/boardagendatableforminutes.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Minutes</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/boardpublishtable.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Puplish</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/board/boardreport.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Report</span></a>
</li>
</ul>
<?php } ?>
<?php if($_SESSION['user_role']=="compliance_author"){?>
<ul class="kt-menu__nav ">

<li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceDashboardAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">compliance</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/common/complianceTemplate.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Template</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceCreateAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Plan</span></a></li>


</ul>
<?php } ?>
<<<<<<< refs/remotes/origin/jeevi/comp
<?php if($_SESSION['user_role']=="compliance_reviewer"){?>
<ul class="kt-menu__nav ">

<li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceDashboardList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Compliance</span></a>
</li>

=======
<?php if($_SESSION['user_role']=="compliance_reviewer"||$_SESSION['user_role']=="compliance_author"){?>
<ul class="kt-menu__nav ">
>>>>>>> local
<li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceReviewAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Review</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceAnalyzeAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Analyze</span></a></li>

          <li class="kt-menu__item " aria-haspopup="true"><a href="view/compliance/complianceReportAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Report</span></a></li>

</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='disaster_owner') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/disaster/disasterDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Disaster</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/disaster/disasterPlan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/disaster/disasterlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> List</span></a></li>

</ul>
<?php } ?>

<?php
if($_SESSION['user_role']=='disaster_tester') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/disaster/disasterDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Disaster</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/disaster/disasterTestList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Stratergy</span></a>
</li>

</ul>
<?php } ?>

<?php
if($_SESSION['user_role']=='disaster_trainer') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/disaster/disasterDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Disaster</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/disaster/disasterTrainingList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Training</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/disaster/disasterReportlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Report</span></a></li>

</ul>
<?php } ?>

<?php if($_SESSION['user_role']=='policy_owner'){?>
<ul class="kt-menu__nav">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/policy/policyDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Policy</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyPlan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyExpired.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Expired Policies</span></a></li>

</ul>
<?php } ?>
<?php if($_SESSION['user_role']=='policy_reviewer' || $_SESSION['user_role']=='policy_approver'){?>
<ul class="kt-menu__nav">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/policy/policyDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Policy</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>

</ul>
<?php } ?>


<?php
if($_SESSION['user_role']=='bcpm_planner') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/bcpm/bcpmDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">BCPM</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/prePlan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">pre Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmCreateAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>

</ul>
<?php } ?>

<?php
if($_SESSION['user_role']=='bcpm_maintainer') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/bcpm/bcpmDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">BCPM</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmMaintainenceAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Maintenance</span></a>
</li>


</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='bcpm_tester') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/bcpm/bcpmDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">BCPM</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmExerciseAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Exercise</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmReport.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Reports</span></a></li>


</ul>
<?php } ?>


<?php
if($_SESSION['user_role']=='bcpm_implementer') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/bcpm/bcpmDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">BCPM</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmImplementAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>


</ul>
<?php } ?>
<?php
if($_SESSION['user_role']=='asset_owner') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/asset/assetDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Asset</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetPlanCreate.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Create</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>

</ul>
<?php } ?>

<?php
if($_SESSION['user_role']=='asset_custodian') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/asset/assetDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Asset</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetAdmin1.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetAssessmentReturned.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Assesment Returned</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetReviewReturned.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-layers-1"></i><span class="kt-menu__link-text">Review Returned</span></a></li>

</ul>
<?php } ?>
<?php if($_SESSION['user_role']=="asset_reviewer"){?>
<ul class="kt-menu__nav ">

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Asset</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetReviewAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Review</span></a></li>

  <li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetReportAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-layers-1"></i><span class="kt-menu__link-text">Report</span></a></li>


</ul>
<?php } ?>

<?php
if($_SESSION['user_role']=='incident_analyst') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/incident/incidentDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Incident</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/plan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incident_list.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>

</ul>
<?php } ?>
 
                           



<?php
if($_SESSION['user_role']=='incident_resolver') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/incident/incidentDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Incident</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentResolverList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Resolver</span></a>
</li>



</ul>
<?php } ?>

<?php if($_SESSION['user_role']=='incident_reviewer') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/incident/incidentDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Incident</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentReviewerList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Closure</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentReportList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Report</span></a>
</li>

</ul>
<?php } ?>
<?php if($_SESSION['user_role']=='incident_manager') { ?>

<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/incident/incidentDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Incident</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Diagnosis</span></a>
</li>
</ul>
<?php } ?>


<?php if($_SESSION['user_role']=='demo'){?>

<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="700" data-mobile-height="200">
<ul class="kt-menu__nav">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/audit/auditDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Audit</span></a></li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/plan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditCreateAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Kickoff</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPrepareAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Respond</span></a>

</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPerformAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Review</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditReturnAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Followup</span></a></li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/audit/auditPublished.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Reports</span></a></li>



</ul>

<?php } ?>
<?php
if($_SESSION['user_role']=='demo') { ?>
                         
<ul class="kt-menu__nav ">
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/common/riskDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Risk</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskplan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskcreatedlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Mitigate</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/registerRisk.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text">Risk Register</span></a></li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskmitigatedlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Review</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/risk/riskreviewedlist.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text">Report</span></a></li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/Regulatoryengine.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Regulatory Engine</span></a>
</li>


<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/asset/assetDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Asset</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetPlanCreate.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Create</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetAdmin1.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetAssessmentReturned.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Assesment Returned</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetReviewReturned.php" class="kt-menu__link text-center"><i class="kt-menu__link-icon flaticon2-layers-1"></i><span class="kt-menu__link-text">Review Returned</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetReviewAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Review</span></a></li>

  <li class="kt-menu__item " aria-haspopup="true"><a href="view/asset/assetReportAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-layers-1"></i><span class="kt-menu__link-text">Report</span></a></li>
       
<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/policy/policyPlan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">PolicyPlan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/policy/policyExpired.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">Expired Policies</span></a></li>


<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/bcpm/bcpmDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">BCPM</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/prePlan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">pre Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmCreateAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-drop"></i><span class="kt-menu__link-text">List</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmMaintainenceAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Maintenance</span></a>
</li>



<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmExerciseAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Exercise</span></a>
</li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmImplementAdmin.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="view/bcpm/bcpmReport.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-analytics-2"></i><span class="kt-menu__link-text"> Reports</span></a></li>

<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="view/incident/incidentDashboard.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Incident</span></a></li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/plan.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Plan</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incident_list.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">List</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentResolverList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Resolver</span></a>
</li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentReviewerList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Closure</span></a>
</li>

<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentReportList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Report</span></a>
</li>


<li class="kt-menu__item " aria-haspopup="true"><a href="view/incident/incidentList.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-graph"></i><span class="kt-menu__link-text">Diagnosis</span></a>
</li>

</ul>
               </div>



<?php } ?>


</div>
</body>
</html>
<script>
$(document).ready(function(){
  $(".toggle").click(function(){
    $(".shw").toggle(200);
  });
});
</script>