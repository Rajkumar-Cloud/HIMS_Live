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
if (!isset($view_dashboard_service_summary_rpt))
	$view_dashboard_service_summary_rpt = new view_dashboard_service_summary_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$view_dashboard_service_summary_rpt;

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
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fview_dashboard_service_summaryrpt = currentForm = new ew.Form("fview_dashboard_service_summaryrpt");

// Validate method
fview_dashboard_service_summaryrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_createdDate");
		if (elm && typeof(EURODATE) == "function" && !EURODATE(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createdDate->errorMessage()) ?>"))
				return false;
		}
		elm = this.getElements("y_createdDate");
		if (elm && typeof(EURODATE) == "function" && !EURODATE(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createdDate->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fview_dashboard_service_summaryrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fview_dashboard_service_summaryrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fview_dashboard_service_summaryrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
</script>
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
<div id="ew-center" class="<?php echo $view_dashboard_service_summary_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fview_dashboard_service_summaryrpt" id="fview_dashboard_service_summaryrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fview_dashboard_service_summaryrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_createdDate" class="ew-cell form-group">
	<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $Page->createdDate->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("BETWEEN"); ?><input type="hidden" name="z_createdDate" id="z_createdDate" value="BETWEEN"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->createdDate->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="view_dashboard_service_summary" data-field="x_createdDate" id="x_createdDate" name="x_createdDate" maxlength="10" placeholder="<?php echo HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createdDate->AdvancedSearch->SearchValue) ?>"<?php echo $Page->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_summary_base->createdDate->ReadOnly && !$view_dashboard_service_summary_base->createdDate->Disabled && !isset($view_dashboard_service_summary_base->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_summary_base->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_summaryrpt", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	<span class="ew-search-cond btw1_createdDate"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_createdDate">
<?php PrependClass($Page->createdDate->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="view_dashboard_service_summary" data-field="x_createdDate" id="y_createdDate" name="y_createdDate" maxlength="10" placeholder="<?php echo HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createdDate->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_summary_base->createdDate->ReadOnly && !$view_dashboard_service_summary_base->createdDate->Disabled && !isset($view_dashboard_service_summary_base->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_summary_base->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_summaryrpt", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fview_dashboard_service_summaryrpt.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
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
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_view_dashboard_service_summary" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->DEPARTMENT->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="DEPARTMENT"><div class="view_dashboard_service_summary_DEPARTMENT"><span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="DEPARTMENT">
<?php if ($Page->sortUrl($Page->DEPARTMENT) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_summary_DEPARTMENT">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_summary_DEPARTMENT" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->DEPARTMENT) ?>',1);">
			<span class="ew-table-header-caption"><?php echo $Page->DEPARTMENT->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->sum28SubTotal29->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="sum28SubTotal29"><div class="view_dashboard_service_summary_sum28SubTotal29"><span class="ew-table-header-caption"><?php echo $Page->sum28SubTotal29->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="sum28SubTotal29">
<?php if ($Page->sortUrl($Page->sum28SubTotal29) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_summary_sum28SubTotal29">
			<span class="ew-table-header-caption"><?php echo $Page->sum28SubTotal29->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_summary_sum28SubTotal29" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->sum28SubTotal29) ?>',1);">
			<span class="ew-table-header-caption"><?php echo $Page->sum28SubTotal29->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->sum28SubTotal29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->sum28SubTotal29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createdDate"><div class="view_dashboard_service_summary_createdDate"><span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createdDate">
<?php if ($Page->sortUrl($Page->createdDate) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_summary_createdDate">
			<span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_summary_createdDate" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createdDate) ?>',1);">
			<span class="ew-table-header-caption"><?php echo $Page->createdDate->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="HospID"><div class="view_dashboard_service_summary_HospID"><span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="HospID">
<?php if ($Page->sortUrl($Page->HospID) == "") { ?>
		<div class="ew-table-header-btn view_dashboard_service_summary_HospID">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_dashboard_service_summary_HospID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->HospID) ?>',1);">
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
<?php if ($Page->DEPARTMENT->Visible) { ?>
		<td data-field="DEPARTMENT"<?php echo $Page->DEPARTMENT->cellAttributes() ?>>
<span<?php echo $Page->DEPARTMENT->viewAttributes() ?>><?php echo $Page->DEPARTMENT->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->sum28SubTotal29->Visible) { ?>
		<td data-field="sum28SubTotal29"<?php echo $Page->sum28SubTotal29->cellAttributes() ?>>
<span<?php echo $Page->sum28SubTotal29->viewAttributes() ?>><?php echo $Page->sum28SubTotal29->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { ?>
		<td data-field="createdDate"<?php echo $Page->createdDate->cellAttributes() ?>>
<span<?php echo $Page->createdDate->viewAttributes() ?>><?php echo $Page->createdDate->getViewValue() ?></span></td>
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
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_view_dashboard_service_summary" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "view_dashboard_service_summary_pager.php" ?>
<div class="clearfix"></div>
</div>
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
<div id="ew-bottom" class="<?php echo $view_dashboard_service_summary_rpt->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$view_dashboard_service_summary_base->Chart1->PageBreakType = "before"; // Page break type
	$view_dashboard_service_summary_base->Chart1->PageBreak = $Table->ExportChartPageBreak;
	$view_dashboard_service_summary_base->Chart1->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$view_dashboard_service_summary_base->Chart1->DrillDownInPanel = $Page->DrillDownInPanel;
$view_dashboard_service_summary_base->Chart1->render("ew-chart-bottom");
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
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>