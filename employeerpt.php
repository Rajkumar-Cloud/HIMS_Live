<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($employee_rpt))
	$employee_rpt = new employee_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$employee_rpt;

// Run the page
$Page->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $employee_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-header ew-grid-upper-panel">
<?php include "employee_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_employee" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="id"><div class="employee_id"><span class="ew-table-header-caption"><?php echo $Page->id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="id">
<?php if ($Page->sortUrl($Page->id) == "") { ?>
		<div class="ew-table-header-btn employee_id">
			<span class="ew-table-header-caption"><?php echo $Page->id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->empNo->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="empNo"><div class="employee_empNo"><span class="ew-table-header-caption"><?php echo $Page->empNo->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="empNo">
<?php if ($Page->sortUrl($Page->empNo) == "") { ?>
		<div class="ew-table-header-btn employee_empNo">
			<span class="ew-table-header-caption"><?php echo $Page->empNo->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_empNo" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->empNo) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->empNo->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->empNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->empNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->tittle->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="tittle"><div class="employee_tittle"><span class="ew-table-header-caption"><?php echo $Page->tittle->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="tittle">
<?php if ($Page->sortUrl($Page->tittle) == "") { ?>
		<div class="ew-table-header-btn employee_tittle">
			<span class="ew-table-header-caption"><?php echo $Page->tittle->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_tittle" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->tittle) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->tittle->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->tittle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->tittle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_name"><div class="employee_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_name">
<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<div class="ew-table-header-btn employee_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->middle_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="middle_name"><div class="employee_middle_name"><span class="ew-table-header-caption"><?php echo $Page->middle_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="middle_name">
<?php if ($Page->sortUrl($Page->middle_name) == "") { ?>
		<div class="ew-table-header-btn employee_middle_name">
			<span class="ew-table-header-caption"><?php echo $Page->middle_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_middle_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->middle_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->middle_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->last_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="last_name"><div class="employee_last_name"><span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="last_name">
<?php if ($Page->sortUrl($Page->last_name) == "") { ?>
		<div class="ew-table-header-btn employee_last_name">
			<span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_last_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->last_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->_gender->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="_gender"><div class="employee__gender"><span class="ew-table-header-caption"><?php echo $Page->_gender->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="_gender">
<?php if ($Page->sortUrl($Page->_gender) == "") { ?>
		<div class="ew-table-header-btn employee__gender">
			<span class="ew-table-header-caption"><?php echo $Page->_gender->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee__gender" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->_gender) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->_gender->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->_gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->_gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->dob->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="dob"><div class="employee_dob"><span class="ew-table-header-caption"><?php echo $Page->dob->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="dob">
<?php if ($Page->sortUrl($Page->dob) == "") { ?>
		<div class="ew-table-header-btn employee_dob">
			<span class="ew-table-header-caption"><?php echo $Page->dob->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_dob" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->dob) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->dob->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->start_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="start_date"><div class="employee_start_date"><span class="ew-table-header-caption"><?php echo $Page->start_date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="start_date">
<?php if ($Page->sortUrl($Page->start_date) == "") { ?>
		<div class="ew-table-header-btn employee_start_date">
			<span class="ew-table-header-caption"><?php echo $Page->start_date->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_start_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->start_date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->start_date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->end_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="end_date"><div class="employee_end_date"><span class="ew-table-header-caption"><?php echo $Page->end_date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="end_date">
<?php if ($Page->sortUrl($Page->end_date) == "") { ?>
		<div class="ew-table-header-btn employee_end_date">
			<span class="ew-table-header-caption"><?php echo $Page->end_date->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_end_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->end_date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->end_date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="employee_role_id"><div class="employee_employee_role_id"><span class="ew-table-header-caption"><?php echo $Page->employee_role_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="employee_role_id">
<?php if ($Page->sortUrl($Page->employee_role_id) == "") { ?>
		<div class="ew-table-header-btn employee_employee_role_id">
			<span class="ew-table-header-caption"><?php echo $Page->employee_role_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_employee_role_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->employee_role_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->employee_role_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->employee_role_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->employee_role_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->default_shift_start->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="default_shift_start"><div class="employee_default_shift_start"><span class="ew-table-header-caption"><?php echo $Page->default_shift_start->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="default_shift_start">
<?php if ($Page->sortUrl($Page->default_shift_start) == "") { ?>
		<div class="ew-table-header-btn employee_default_shift_start">
			<span class="ew-table-header-caption"><?php echo $Page->default_shift_start->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_default_shift_start" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->default_shift_start) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->default_shift_start->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->default_shift_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->default_shift_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->default_shift_end->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="default_shift_end"><div class="employee_default_shift_end"><span class="ew-table-header-caption"><?php echo $Page->default_shift_end->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="default_shift_end">
<?php if ($Page->sortUrl($Page->default_shift_end) == "") { ?>
		<div class="ew-table-header-btn employee_default_shift_end">
			<span class="ew-table-header-caption"><?php echo $Page->default_shift_end->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_default_shift_end" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->default_shift_end) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->default_shift_end->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->default_shift_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->default_shift_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->working_days->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="working_days"><div class="employee_working_days"><span class="ew-table-header-caption"><?php echo $Page->working_days->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="working_days">
<?php if ($Page->sortUrl($Page->working_days) == "") { ?>
		<div class="ew-table-header-btn employee_working_days">
			<span class="ew-table-header-caption"><?php echo $Page->working_days->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_working_days" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->working_days) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->working_days->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->working_days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->working_days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->_working_location->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="_working_location"><div class="employee__working_location"><span class="ew-table-header-caption"><?php echo $Page->_working_location->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="_working_location">
<?php if ($Page->sortUrl($Page->_working_location) == "") { ?>
		<div class="ew-table-header-btn employee__working_location">
			<span class="ew-table-header-caption"><?php echo $Page->_working_location->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee__working_location" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->_working_location) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->_working_location->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->_working_location->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->_working_location->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->profilePic->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="profilePic"><div class="employee_profilePic"><span class="ew-table-header-caption"><?php echo $Page->profilePic->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="profilePic">
<?php if ($Page->sortUrl($Page->profilePic) == "") { ?>
		<div class="ew-table-header-btn employee_profilePic">
			<span class="ew-table-header-caption"><?php echo $Page->profilePic->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_profilePic" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->profilePic) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->profilePic->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->status->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="status"><div class="employee_status"><span class="ew-table-header-caption"><?php echo $Page->status->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="status">
<?php if ($Page->sortUrl($Page->status) == "") { ?>
		<div class="ew-table-header-btn employee_status">
			<span class="ew-table-header-caption"><?php echo $Page->status->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_status" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->status) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->status->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createdby->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createdby"><div class="employee_createdby"><span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createdby">
<?php if ($Page->sortUrl($Page->createdby) == "") { ?>
		<div class="ew-table-header-btn employee_createdby">
			<span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_createdby" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createdby) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createddatetime"><div class="employee_createddatetime"><span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createddatetime">
<?php if ($Page->sortUrl($Page->createddatetime) == "") { ?>
		<div class="ew-table-header-btn employee_createddatetime">
			<span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_createddatetime" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createddatetime) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="modifiedby"><div class="employee_modifiedby"><span class="ew-table-header-caption"><?php echo $Page->modifiedby->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="modifiedby">
<?php if ($Page->sortUrl($Page->modifiedby) == "") { ?>
		<div class="ew-table-header-btn employee_modifiedby">
			<span class="ew-table-header-caption"><?php echo $Page->modifiedby->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_modifiedby" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->modifiedby) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->modifiedby->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="modifieddatetime"><div class="employee_modifieddatetime"><span class="ew-table-header-caption"><?php echo $Page->modifieddatetime->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="modifieddatetime">
<?php if ($Page->sortUrl($Page->modifieddatetime) == "") { ?>
		<div class="ew-table-header-btn employee_modifieddatetime">
			<span class="ew-table-header-caption"><?php echo $Page->modifieddatetime->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer employee_modifieddatetime" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->modifieddatetime) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->modifieddatetime->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->id->Visible) { ?>
		<td data-field="id"<?php echo $Page->id->cellAttributes() ?>>
<span<?php echo $Page->id->viewAttributes() ?>><?php echo $Page->id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->empNo->Visible) { ?>
		<td data-field="empNo"<?php echo $Page->empNo->cellAttributes() ?>>
<span<?php echo $Page->empNo->viewAttributes() ?>><?php echo $Page->empNo->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->tittle->Visible) { ?>
		<td data-field="tittle"<?php echo $Page->tittle->cellAttributes() ?>>
<span<?php echo $Page->tittle->viewAttributes() ?>><?php echo $Page->tittle->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes() ?>>
<span<?php echo $Page->first_name->viewAttributes() ?>><?php echo $Page->first_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->middle_name->Visible) { ?>
		<td data-field="middle_name"<?php echo $Page->middle_name->cellAttributes() ?>>
<span<?php echo $Page->middle_name->viewAttributes() ?>><?php echo $Page->middle_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->last_name->Visible) { ?>
		<td data-field="last_name"<?php echo $Page->last_name->cellAttributes() ?>>
<span<?php echo $Page->last_name->viewAttributes() ?>><?php echo $Page->last_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->_gender->Visible) { ?>
		<td data-field="_gender"<?php echo $Page->_gender->cellAttributes() ?>>
<span<?php echo $Page->_gender->viewAttributes() ?>><?php echo $Page->_gender->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->dob->Visible) { ?>
		<td data-field="dob"<?php echo $Page->dob->cellAttributes() ?>>
<span<?php echo $Page->dob->viewAttributes() ?>><?php echo $Page->dob->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->start_date->Visible) { ?>
		<td data-field="start_date"<?php echo $Page->start_date->cellAttributes() ?>>
<span<?php echo $Page->start_date->viewAttributes() ?>><?php echo $Page->start_date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->end_date->Visible) { ?>
		<td data-field="end_date"<?php echo $Page->end_date->cellAttributes() ?>>
<span<?php echo $Page->end_date->viewAttributes() ?>><?php echo $Page->end_date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { ?>
		<td data-field="employee_role_id"<?php echo $Page->employee_role_id->cellAttributes() ?>>
<span<?php echo $Page->employee_role_id->viewAttributes() ?>><?php echo $Page->employee_role_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->default_shift_start->Visible) { ?>
		<td data-field="default_shift_start"<?php echo $Page->default_shift_start->cellAttributes() ?>>
<span<?php echo $Page->default_shift_start->viewAttributes() ?>><?php echo $Page->default_shift_start->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->default_shift_end->Visible) { ?>
		<td data-field="default_shift_end"<?php echo $Page->default_shift_end->cellAttributes() ?>>
<span<?php echo $Page->default_shift_end->viewAttributes() ?>><?php echo $Page->default_shift_end->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->working_days->Visible) { ?>
		<td data-field="working_days"<?php echo $Page->working_days->cellAttributes() ?>>
<span<?php echo $Page->working_days->viewAttributes() ?>><?php echo $Page->working_days->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->_working_location->Visible) { ?>
		<td data-field="_working_location"<?php echo $Page->_working_location->cellAttributes() ?>>
<span<?php echo $Page->_working_location->viewAttributes() ?>><?php echo $Page->_working_location->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { ?>
		<td data-field="profilePic"<?php echo $Page->profilePic->cellAttributes() ?>>
<span<?php echo $Page->profilePic->viewAttributes() ?>><?php echo $Page->profilePic->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->status->Visible) { ?>
		<td data-field="status"<?php echo $Page->status->cellAttributes() ?>>
<span<?php echo $Page->status->viewAttributes() ?>><?php echo $Page->status->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createdby->Visible) { ?>
		<td data-field="createdby"<?php echo $Page->createdby->cellAttributes() ?>>
<span<?php echo $Page->createdby->viewAttributes() ?>><?php echo $Page->createdby->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { ?>
		<td data-field="createddatetime"<?php echo $Page->createddatetime->cellAttributes() ?>>
<span<?php echo $Page->createddatetime->viewAttributes() ?>><?php echo $Page->createddatetime->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { ?>
		<td data-field="modifiedby"<?php echo $Page->modifiedby->cellAttributes() ?>>
<span<?php echo $Page->modifiedby->viewAttributes() ?>><?php echo $Page->modifiedby->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { ?>
		<td data-field="modifieddatetime"<?php echo $Page->modifieddatetime->cellAttributes() ?>>
<span<?php echo $Page->modifieddatetime->viewAttributes() ?>><?php echo $Page->modifieddatetime->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-header ew-grid-upper-panel">
<?php include "employee_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_employee" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->TotalGroups > 0) { ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "employee_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Bottom Container -->
<div class="row">
<div id="ew-bottom" class="<?php echo $employee_rpt->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$employee_base->working_location->PageBreakType = "before"; // Page break type
	$employee_base->working_location->PageBreak = $Table->ExportChartPageBreak;
	$employee_base->working_location->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$employee_base->working_location->DrillDownInPanel = $Page->DrillDownInPanel;
$employee_base->working_location->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $ReportLanguage->Phrase("Top") ?></a>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$employee_base->gender->PageBreakType = "before"; // Page break type
	$employee_base->gender->PageBreak = $Table->ExportChartPageBreak;
	$employee_base->gender->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$employee_base->gender->DrillDownInPanel = $Page->DrillDownInPanel;
$employee_base->gender->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $ReportLanguage->Phrase("Top") ?></a>
<?php } ?>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
</div>
<!-- /#ew-bottom -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>