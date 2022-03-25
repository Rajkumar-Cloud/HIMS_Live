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
if (!isset($view_bill_collection_report_rpt))
	$view_bill_collection_report_rpt = new view_bill_collection_report_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$view_bill_collection_report_rpt;

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
<script>

// Form object
var fview_bill_collection_reportrpt = currentForm = new ew.Form("fview_bill_collection_reportrpt");

// Validate method
fview_bill_collection_reportrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_createddate");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createddate->errorMessage()) ?>"))
				return false;
		}
		elm = this.getElements("y_createddate");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createddate->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fview_bill_collection_reportrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fview_bill_collection_reportrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fview_bill_collection_reportrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
</script>
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
<div id="ew-center" class="<?php echo $view_bill_collection_report_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<div id="report_summary">
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fview_bill_collection_reportrpt" id="fview_bill_collection_reportrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fview_bill_collection_reportrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_createddate" class="ew-cell form-group">
	<label for="x_createddate" class="ew-search-caption ew-label"><?php echo $Page->createddate->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("BETWEEN"); ?><input type="hidden" name="z_createddate" id="z_createddate" value="BETWEEN"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->createddate->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="view_bill_collection_report" data-field="x_createddate" id="x_createddate" name="x_createddate" maxlength="10" placeholder="<?php echo HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createddate->AdvancedSearch->SearchValue) ?>"<?php echo $Page->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_report_base->createddate->ReadOnly && !$view_bill_collection_report_base->createddate->Disabled && !isset($view_bill_collection_report_base->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_report_base->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_bill_collection_reportrpt", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	<span class="ew-search-cond btw1_createddate"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_createddate">
<?php PrependClass($Page->createddate->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="view_bill_collection_report" data-field="x_createddate" id="y_createddate" name="y_createddate" maxlength="10" placeholder="<?php echo HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createddate->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->createddate->editAttributes() ?>>
<?php if (!$view_bill_collection_report_base->createddate->ReadOnly && !$view_bill_collection_report_base->createddate->Disabled && !isset($view_bill_collection_report_base->createddate->EditAttrs["readonly"]) && !isset($view_bill_collection_report_base->createddate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_bill_collection_reportrpt", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
fview_bill_collection_reportrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_view_bill_collection_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->createddate->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createddate"><div class="view_bill_collection_report_createddate"><span class="ew-table-header-caption"><?php echo $Page->createddate->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createddate">
<?php if ($Page->sortUrl($Page->createddate) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_createddate">
			<span class="ew-table-header-caption"><?php echo $Page->createddate->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_createddate" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createddate) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createddate->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->UserName->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="UserName"><div class="view_bill_collection_report_UserName"><span class="ew-table-header-caption"><?php echo $Page->UserName->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="UserName">
<?php if ($Page->sortUrl($Page->UserName) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_UserName">
			<span class="ew-table-header-caption"><?php echo $Page->UserName->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_UserName" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->UserName) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->UserName->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->CARD->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="CARD"><div class="view_bill_collection_report_CARD"><span class="ew-table-header-caption"><?php echo $Page->CARD->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="CARD">
<?php if ($Page->sortUrl($Page->CARD) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_CARD">
			<span class="ew-table-header-caption"><?php echo $Page->CARD->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_CARD" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->CARD) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->CARD->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->CARD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->CARD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->CASH->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="CASH"><div class="view_bill_collection_report_CASH"><span class="ew-table-header-caption"><?php echo $Page->CASH->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="CASH">
<?php if ($Page->sortUrl($Page->CASH) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_CASH">
			<span class="ew-table-header-caption"><?php echo $Page->CASH->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_CASH" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->CASH) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->CASH->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->CASH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->CASH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->NEFT->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="NEFT"><div class="view_bill_collection_report_NEFT"><span class="ew-table-header-caption"><?php echo $Page->NEFT->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="NEFT">
<?php if ($Page->sortUrl($Page->NEFT) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_NEFT">
			<span class="ew-table-header-caption"><?php echo $Page->NEFT->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_NEFT" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NEFT) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->NEFT->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NEFT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NEFT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PAYTM"><div class="view_bill_collection_report_PAYTM"><span class="ew-table-header-caption"><?php echo $Page->PAYTM->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PAYTM">
<?php if ($Page->sortUrl($Page->PAYTM) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_PAYTM">
			<span class="ew-table-header-caption"><?php echo $Page->PAYTM->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_PAYTM" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PAYTM) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PAYTM->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PAYTM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PAYTM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->CHEQUE->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="CHEQUE"><div class="view_bill_collection_report_CHEQUE"><span class="ew-table-header-caption"><?php echo $Page->CHEQUE->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="CHEQUE">
<?php if ($Page->sortUrl($Page->CHEQUE) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_CHEQUE">
			<span class="ew-table-header-caption"><?php echo $Page->CHEQUE->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_CHEQUE" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->CHEQUE) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->CHEQUE->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->CHEQUE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->CHEQUE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->RTGS->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="RTGS"><div class="view_bill_collection_report_RTGS"><span class="ew-table-header-caption"><?php echo $Page->RTGS->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="RTGS">
<?php if ($Page->sortUrl($Page->RTGS) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_RTGS">
			<span class="ew-table-header-caption"><?php echo $Page->RTGS->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_RTGS" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->RTGS) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->RTGS->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->RTGS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->RTGS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->NotSelected->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="NotSelected"><div class="view_bill_collection_report_NotSelected"><span class="ew-table-header-caption"><?php echo $Page->NotSelected->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="NotSelected">
<?php if ($Page->sortUrl($Page->NotSelected) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_NotSelected">
			<span class="ew-table-header-caption"><?php echo $Page->NotSelected->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_NotSelected" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NotSelected) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->NotSelected->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NotSelected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NotSelected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->REFUND->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="REFUND"><div class="view_bill_collection_report_REFUND"><span class="ew-table-header-caption"><?php echo $Page->REFUND->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="REFUND">
<?php if ($Page->sortUrl($Page->REFUND) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_REFUND">
			<span class="ew-table-header-caption"><?php echo $Page->REFUND->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_REFUND" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->REFUND) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->REFUND->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->REFUND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->REFUND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->CANCEL->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="CANCEL"><div class="view_bill_collection_report_CANCEL"><span class="ew-table-header-caption"><?php echo $Page->CANCEL->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="CANCEL">
<?php if ($Page->sortUrl($Page->CANCEL) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_CANCEL">
			<span class="ew-table-header-caption"><?php echo $Page->CANCEL->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_CANCEL" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->CANCEL) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->CANCEL->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->CANCEL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->CANCEL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Total->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Total"><div class="view_bill_collection_report_Total"><span class="ew-table-header-caption"><?php echo $Page->Total->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Total">
<?php if ($Page->sortUrl($Page->Total) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_Total">
			<span class="ew-table-header-caption"><?php echo $Page->Total->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_Total" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Total) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Total->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="HospID"><div class="view_bill_collection_report_HospID"><span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="HospID">
<?php if ($Page->sortUrl($Page->HospID) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_HospID">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_HospID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->HospID) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->BillType->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="BillType"><div class="view_bill_collection_report_BillType"><span class="ew-table-header-caption"><?php echo $Page->BillType->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="BillType">
<?php if ($Page->sortUrl($Page->BillType) == "") { ?>
		<div class="ew-table-header-btn view_bill_collection_report_BillType">
			<span class="ew-table-header-caption"><?php echo $Page->BillType->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer view_bill_collection_report_BillType" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->BillType) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->BillType->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->createddate->Visible) { ?>
		<td data-field="createddate"<?php echo $Page->createddate->cellAttributes() ?>>
<span<?php echo $Page->createddate->viewAttributes() ?>><?php echo $Page->createddate->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->UserName->Visible) { ?>
		<td data-field="UserName"<?php echo $Page->UserName->cellAttributes() ?>>
<span<?php echo $Page->UserName->viewAttributes() ?>><?php echo $Page->UserName->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->CARD->Visible) { ?>
		<td data-field="CARD"<?php echo $Page->CARD->cellAttributes() ?>>
<span<?php echo $Page->CARD->viewAttributes() ?>><?php echo $Page->CARD->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->CASH->Visible) { ?>
		<td data-field="CASH"<?php echo $Page->CASH->cellAttributes() ?>>
<span<?php echo $Page->CASH->viewAttributes() ?>><?php echo $Page->CASH->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->NEFT->Visible) { ?>
		<td data-field="NEFT"<?php echo $Page->NEFT->cellAttributes() ?>>
<span<?php echo $Page->NEFT->viewAttributes() ?>><?php echo $Page->NEFT->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { ?>
		<td data-field="PAYTM"<?php echo $Page->PAYTM->cellAttributes() ?>>
<span<?php echo $Page->PAYTM->viewAttributes() ?>><?php echo $Page->PAYTM->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->CHEQUE->Visible) { ?>
		<td data-field="CHEQUE"<?php echo $Page->CHEQUE->cellAttributes() ?>>
<span<?php echo $Page->CHEQUE->viewAttributes() ?>><?php echo $Page->CHEQUE->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->RTGS->Visible) { ?>
		<td data-field="RTGS"<?php echo $Page->RTGS->cellAttributes() ?>>
<span<?php echo $Page->RTGS->viewAttributes() ?>><?php echo $Page->RTGS->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->NotSelected->Visible) { ?>
		<td data-field="NotSelected"<?php echo $Page->NotSelected->cellAttributes() ?>>
<span<?php echo $Page->NotSelected->viewAttributes() ?>><?php echo $Page->NotSelected->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->REFUND->Visible) { ?>
		<td data-field="REFUND"<?php echo $Page->REFUND->cellAttributes() ?>>
<span<?php echo $Page->REFUND->viewAttributes() ?>><?php echo $Page->REFUND->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->CANCEL->Visible) { ?>
		<td data-field="CANCEL"<?php echo $Page->CANCEL->cellAttributes() ?>>
<span<?php echo $Page->CANCEL->viewAttributes() ?>><?php echo $Page->CANCEL->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Total->Visible) { ?>
		<td data-field="Total"<?php echo $Page->Total->cellAttributes() ?>>
<span<?php echo $Page->Total->viewAttributes() ?>><?php echo $Page->Total->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>
<span<?php echo $Page->HospID->viewAttributes() ?>><?php echo $Page->HospID->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->BillType->Visible) { ?>
		<td data-field="BillType"<?php echo $Page->BillType->cellAttributes() ?>>
<span<?php echo $Page->BillType->viewAttributes() ?>><?php echo $Page->BillType->getViewValue() ?></span></td>
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
<div id="gmp_view_bill_collection_report" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "view_bill_collection_report_pager.php" ?>
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