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
if (!isset($EmployeeDashboard_summary))
	$EmployeeDashboard_summary = new EmployeeDashboard_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$EmployeeDashboard_summary;

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
currentPageID = ew.PAGE_ID = "summary"; // Page ID
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
<div id="ew-center" class="<?php echo $EmployeeDashboard_summary->CenterContentClass ?>">
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
<?php include "EmployeeDashboard_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_EmployeeDashboard" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->first_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_name"><div class="EmployeeDashboard_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_name">
<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<div class="ew-table-header-btn EmployeeDashboard_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer EmployeeDashboard_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="employee_role_id"><div class="EmployeeDashboard_employee_role_id"><span class="ew-table-header-caption"><?php echo $Page->employee_role_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="employee_role_id">
<?php if ($Page->sortUrl($Page->employee_role_id) == "") { ?>
		<div class="ew-table-header-btn EmployeeDashboard_employee_role_id">
			<span class="ew-table-header-caption"><?php echo $Page->employee_role_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer EmployeeDashboard_employee_role_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->employee_role_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->employee_role_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->employee_role_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->employee_role_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes() ?>>
<span<?php echo $Page->first_name->viewAttributes() ?>><?php echo $Page->first_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { ?>
		<td data-field="employee_role_id"<?php echo $Page->employee_role_id->cellAttributes() ?>>
<span<?php echo $Page->employee_role_id->viewAttributes() ?>><?php echo $Page->employee_role_id->getViewValue() ?></span></td>
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
<?php
	$Page->employee_role_id->Count = $Page->GrandCounts[2];
	$Page->employee_role_id->CntValue = $Page->GrandCounts[2]; // Load CNT
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate">&nbsp;</td>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { ?>
		<td data-field="employee_role_id"<?php echo $Page->employee_role_id->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptCnt") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->employee_role_id->viewAttributes() ?>><?php echo $Page->employee_role_id->CntViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->first_name->Visible) { ?>
		<td data-field="first_name"<?php echo $Page->first_name->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->employee_role_id->Visible) { ?>
		<td data-field="employee_role_id"<?php echo $Page->employee_role_id->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->employee_role_id->viewAttributes() ?>><?php echo $Page->employee_role_id->CntViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } ?>
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
<?php include "EmployeeDashboard_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_EmployeeDashboard" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "EmployeeDashboard_pager.php" ?>
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
<div id="ew-bottom" class="<?php echo $EmployeeDashboard_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$EmployeeDashboard->Employee->PageBreakType = "before"; // Page break type
	$EmployeeDashboard->Employee->PageBreak = $Table->ExportChartPageBreak;
	$EmployeeDashboard->Employee->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$EmployeeDashboard->Employee->DrillDownInPanel = $Page->DrillDownInPanel;
$EmployeeDashboard->Employee->render("ew-chart-bottom");
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