<?php
namespace PHPReportMaker12\HIMS___2019;

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
if (!isset($view_dashboard_service_details_rpt))
	$view_dashboard_service_details_rpt = new view_dashboard_service_details_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$view_dashboard_service_details_rpt;

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
<?php include_once "rheader.php" ?>
<?php } ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
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
<div id="ew-center" class="<?php echo $view_dashboard_service_details_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<div id="report_summary">
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
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_view_dashboard_service_details" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->PatientId->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PatientId"><div class="view_dashboard_service_details_PatientId"><span class="ew-table-header-caption"><?php echo $Page->PatientId->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PatientId">
<?php if ($Page->sortUrl($Page->PatientId) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_PatientId">
			<span class="ew-table-header-caption"><?php echo $Page->PatientId->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_PatientId" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PatientId) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PatientId->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PatientName"><div class="view_dashboard_service_details_PatientName"><span class="ew-table-header-caption"><?php echo $Page->PatientName->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PatientName">
<?php if ($Page->sortUrl($Page->PatientName) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_PatientName">
			<span class="ew-table-header-caption"><?php echo $Page->PatientName->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_PatientName" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PatientName) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PatientName->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Services->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Services"><div class="view_dashboard_service_details_Services"><span class="ew-table-header-caption"><?php echo $Page->Services->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Services">
<?php if ($Page->sortUrl($Page->Services) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_Services">
			<span class="ew-table-header-caption"><?php echo $Page->Services->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_Services" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Services) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Services->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->amount->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="amount"><div class="view_dashboard_service_details_amount"><span class="ew-table-header-caption"><?php echo $Page->amount->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="amount">
<?php if ($Page->sortUrl($Page->amount) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_amount">
			<span class="ew-table-header-caption"><?php echo $Page->amount->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_amount" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->amount) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->amount->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="SubTotal"><div class="view_dashboard_service_details_SubTotal"><span class="ew-table-header-caption"><?php echo $Page->SubTotal->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="SubTotal">
<?php if ($Page->sortUrl($Page->SubTotal) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_SubTotal">
			<span class="ew-table-header-caption"><?php echo $Page->SubTotal->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_SubTotal" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->SubTotal) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->SubTotal->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createdby->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createdby"><div class="view_dashboard_service_details_createdby"><span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createdby">
<?php if ($Page->sortUrl($Page->createdby) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_createdby">
			<span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_createdby" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createdby) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createddatetime"><div class="view_dashboard_service_details_createddatetime"><span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createddatetime">
<?php if ($Page->sortUrl($Page->createddatetime) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_createddatetime">
			<span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_createddatetime" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createddatetime) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createdDate"><div class="view_dashboard_service_details_createdDate"><span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createdDate">
<?php if ($Page->sortUrl($Page->createdDate) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_createdDate">
			<span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_createdDate" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createdDate) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->DrName->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="DrName"><div class="view_dashboard_service_details_DrName"><span class="ew-table-header-caption"><?php echo $Page->DrName->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="DrName">
<?php if ($Page->sortUrl($Page->DrName) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_DrName">
			<span class="ew-table-header-caption"><?php echo $Page->DrName->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_DrName" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DrName) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->DrName->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="DRDepartment"><div class="view_dashboard_service_details_DRDepartment"><span class="ew-table-header-caption"><?php echo $Page->DRDepartment->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="DRDepartment">
<?php if ($Page->sortUrl($Page->DRDepartment) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_DRDepartment">
			<span class="ew-table-header-caption"><?php echo $Page->DRDepartment->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_DRDepartment" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DRDepartment) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->DRDepartment->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DRDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DRDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ItemCode"><div class="view_dashboard_service_details_ItemCode"><span class="ew-table-header-caption"><?php echo $Page->ItemCode->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ItemCode">
<?php if ($Page->sortUrl($Page->ItemCode) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_ItemCode">
			<span class="ew-table-header-caption"><?php echo $Page->ItemCode->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_ItemCode" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ItemCode) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ItemCode->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="DEptCd"><div class="view_dashboard_service_details_DEptCd"><span class="ew-table-header-caption"><?php echo $Page->DEptCd->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="DEptCd">
<?php if ($Page->sortUrl($Page->DEptCd) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_DEptCd">
			<span class="ew-table-header-caption"><?php echo $Page->DEptCd->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_DEptCd" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DEptCd) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->DEptCd->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->CODE->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="CODE"><div class="view_dashboard_service_details_CODE"><span class="ew-table-header-caption"><?php echo $Page->CODE->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="CODE">
<?php if ($Page->sortUrl($Page->CODE) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_CODE">
			<span class="ew-table-header-caption"><?php echo $Page->CODE->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_CODE" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->CODE) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->CODE->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="SERVICE"><div class="view_dashboard_service_details_SERVICE"><span class="ew-table-header-caption"><?php echo $Page->SERVICE->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="SERVICE">
<?php if ($Page->sortUrl($Page->SERVICE) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_SERVICE">
			<span class="ew-table-header-caption"><?php echo $Page->SERVICE->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_SERVICE" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->SERVICE) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->SERVICE->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="SERVICE_TYPE"><div class="view_dashboard_service_details_SERVICE_TYPE"><span class="ew-table-header-caption"><?php echo $Page->SERVICE_TYPE->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="SERVICE_TYPE">
<?php if ($Page->sortUrl($Page->SERVICE_TYPE) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_SERVICE_TYPE">
			<span class="ew-table-header-caption"><?php echo $Page->SERVICE_TYPE->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_SERVICE_TYPE" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->SERVICE_TYPE) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->SERVICE_TYPE->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="DEPARTMENT"><div class="view_dashboard_service_details_DEPARTMENT"><span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="DEPARTMENT">
<?php if ($Page->sortUrl($Page->DEPARTMENT) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_DEPARTMENT">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_DEPARTMENT" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DEPARTMENT) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="HospID"><div class="view_dashboard_service_details_HospID"><span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="HospID">
<?php if ($Page->sortUrl($Page->HospID) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_details_HospID">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_details_HospID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->HospID) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->PatientId->Visible) { ?>
		<td data-field="PatientId"<?php echo $Page->PatientId->cellAttributes() ?>>
<span<?php echo $Page->PatientId->viewAttributes() ?>><?php echo $Page->PatientId->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { ?>
		<td data-field="PatientName"<?php echo $Page->PatientName->cellAttributes() ?>>
<span<?php echo $Page->PatientName->viewAttributes() ?>><?php echo $Page->PatientName->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Services->Visible) { ?>
		<td data-field="Services"<?php echo $Page->Services->cellAttributes() ?>>
<span<?php echo $Page->Services->viewAttributes() ?>><?php echo $Page->Services->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->amount->Visible) { ?>
		<td data-field="amount"<?php echo $Page->amount->cellAttributes() ?>>
<span<?php echo $Page->amount->viewAttributes() ?>><?php echo $Page->amount->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { ?>
		<td data-field="SubTotal"<?php echo $Page->SubTotal->cellAttributes() ?>>
<span<?php echo $Page->SubTotal->viewAttributes() ?>><?php echo $Page->SubTotal->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createdby->Visible) { ?>
		<td data-field="createdby"<?php echo $Page->createdby->cellAttributes() ?>>
<span<?php echo $Page->createdby->viewAttributes() ?>><?php echo $Page->createdby->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { ?>
		<td data-field="createddatetime"<?php echo $Page->createddatetime->cellAttributes() ?>>
<span<?php echo $Page->createddatetime->viewAttributes() ?>><?php echo $Page->createddatetime->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
		<td data-field="createdDate"<?php echo $Page->createdDate->cellAttributes() ?>>
<span<?php echo $Page->createdDate->viewAttributes() ?>><?php echo $Page->createdDate->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->DrName->Visible) { ?>
		<td data-field="DrName"<?php echo $Page->DrName->cellAttributes() ?>>
<span<?php echo $Page->DrName->viewAttributes() ?>><?php echo $Page->DrName->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { ?>
		<td data-field="DRDepartment"<?php echo $Page->DRDepartment->cellAttributes() ?>>
<span<?php echo $Page->DRDepartment->viewAttributes() ?>><?php echo $Page->DRDepartment->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { ?>
		<td data-field="ItemCode"<?php echo $Page->ItemCode->cellAttributes() ?>>
<span<?php echo $Page->ItemCode->viewAttributes() ?>><?php echo $Page->ItemCode->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { ?>
		<td data-field="DEptCd"<?php echo $Page->DEptCd->cellAttributes() ?>>
<span<?php echo $Page->DEptCd->viewAttributes() ?>><?php echo $Page->DEptCd->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->CODE->Visible) { ?>
		<td data-field="CODE"<?php echo $Page->CODE->cellAttributes() ?>>
<span<?php echo $Page->CODE->viewAttributes() ?>><?php echo $Page->CODE->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { ?>
		<td data-field="SERVICE"<?php echo $Page->SERVICE->cellAttributes() ?>>
<span<?php echo $Page->SERVICE->viewAttributes() ?>><?php echo $Page->SERVICE->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { ?>
		<td data-field="SERVICE_TYPE"<?php echo $Page->SERVICE_TYPE->cellAttributes() ?>>
<span<?php echo $Page->SERVICE_TYPE->viewAttributes() ?>><?php echo $Page->SERVICE_TYPE->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { ?>
		<td data-field="DEPARTMENT"<?php echo $Page->DEPARTMENT->cellAttributes() ?>>
<span<?php echo $Page->DEPARTMENT->viewAttributes() ?>><?php echo $Page->DEPARTMENT->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>
<span<?php echo $Page->HospID->viewAttributes() ?>><?php echo $Page->HospID->getViewValue() ?></span></td>
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
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_view_dashboard_service_details" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "view_dashboard_service_details_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
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
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>