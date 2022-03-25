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
if (!isset($DischargeSummary_summary))
	$DischargeSummary_summary = new DischargeSummary_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$DischargeSummary_summary;

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
<script>

// Form object
var fDischargeSummarysummary = currentForm = new ew.Form("fDischargeSummarysummary");

// Validate method
fDischargeSummarysummary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fDischargeSummarysummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fDischargeSummarysummary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fDischargeSummarysummary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fDischargeSummarysummary.lists["x_patient_id"] = <?php echo $DischargeSummary_summary->patient_id->Lookup->toClientList() ?>;
fDischargeSummarysummary.lists["x_patient_id"].options = <?php echo JsonEncode($DischargeSummary_summary->patient_id->lookupOptions()) ?>;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown || $Page->Export <> "" && $Page->CustomExport <> "") { ?>
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
<div id="ew-center" class="<?php echo $DischargeSummary_summary->CenterContentClass ?>">
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
<form name="fDischargeSummarysummary" id="fDischargeSummarysummary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fDischargeSummarysummary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_patient_id" class="ew-cell form-group">
	<label for="x_patient_id" class="ew-search-caption ew-label"><?php echo $Page->patient_id->caption() ?></label>
	<span class="ew-search-field">
<?php $Page->patient_id->EditAttrs["onchange"] = "ew.forms(this).submit(); " . @$Page->patient_id->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?php echo strval(GetFilterDropDownValue($Page->patient_id)) == "" ? $Language->phrase("PleaseSelect") : GetFilterDropDownValue($Page->patient_id) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($Page->patient_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($Page->patient_id->ReadOnly || $Page->patient_id->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<input type="hidden" data-table="DischargeSummary" data-field="x_patient_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $Page->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?php echo GetFilterCurrentValue($Page->patient_id, ",") ?>"<?php echo $Page->patient_id->editAttributes() ?>>
<?php echo $Page->patient_id->Lookup->getParamTag("p_x_patient_id") ?>
</span>
</div>
</div>
</div>
</form>
<script>
fDischargeSummarysummary.filterList = <?php echo $Page->getFilterList() ?>;
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
	$Page->loadGroupRowValues(TRUE);
	$Page->GroupCounter[0] = 1;
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray($Page->StopGroup - $Page->StartGroup + 1, -1);
while ($Page->GroupRecordset && !$Page->GroupRecordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->GroupCount > 1) { ?>
</tbody>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->TotalGroups > 0) { ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "DischargeSummary_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<span data-class="tpb<?php echo $Page->GroupCount - 1 ?>_DischargeSummary"><?php echo $Page->PageBreakContent ?></span>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-header ew-grid-upper-panel">
<?php include "DischargeSummary_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_DischargeSummary" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->patient_id->Visible) { ?>
	<?php if ($Page->patient_id->ShowGroupHeaderAsRow) { ?>
	<td data-field="patient_id">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="patient_id"><div class="DischargeSummary_patient_id"><span class="ew-table-header-caption"><?php echo $Page->patient_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="patient_id">
<?php if ($Page->sortUrl($Page->patient_id) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_patient_id">
			<span class="ew-table-header-caption"><?php echo $Page->patient_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_patient_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->patient_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->patient_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { ?>
	<?php if ($Page->mrnNo->ShowGroupHeaderAsRow) { ?>
	<td data-field="mrnNo">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="mrnNo"><div class="DischargeSummary_mrnNo"><span class="ew-table-header-caption"><?php echo $Page->mrnNo->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="mrnNo">
<?php if ($Page->sortUrl($Page->mrnNo) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_mrnNo">
			<span class="ew-table-header-caption"><?php echo $Page->mrnNo->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_mrnNo" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->mrnNo) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->mrnNo->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->patient_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="patient_name"><div class="DischargeSummary_patient_name"><span class="ew-table-header-caption"><?php echo $Page->patient_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="patient_name">
<?php if ($Page->sortUrl($Page->patient_name) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_patient_name">
			<span class="ew-table-header-caption"><?php echo $Page->patient_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_patient_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->patient_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->patient_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->profilePic->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="profilePic"><div class="DischargeSummary_profilePic"><span class="ew-table-header-caption"><?php echo $Page->profilePic->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="profilePic">
<?php if ($Page->sortUrl($Page->profilePic) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_profilePic">
			<span class="ew-table-header-caption"><?php echo $Page->profilePic->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_profilePic" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->profilePic) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->profilePic->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->gender->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="gender"><div class="DischargeSummary_gender"><span class="ew-table-header-caption"><?php echo $Page->gender->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="gender">
<?php if ($Page->sortUrl($Page->gender) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_gender">
			<span class="ew-table-header-caption"><?php echo $Page->gender->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_gender" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->gender) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->gender->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->age->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="age"><div class="DischargeSummary_age"><span class="ew-table-header-caption"><?php echo $Page->age->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="age">
<?php if ($Page->sortUrl($Page->age) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_age">
			<span class="ew-table-header-caption"><?php echo $Page->age->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_age" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->age) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->age->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->physician_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="physician_id"><div class="DischargeSummary_physician_id"><span class="ew-table-header-caption"><?php echo $Page->physician_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="physician_id">
<?php if ($Page->sortUrl($Page->physician_id) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_physician_id">
			<span class="ew-table-header-caption"><?php echo $Page->physician_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_physician_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->physician_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->physician_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->provisional_diagnosis->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="provisional_diagnosis"><div class="DischargeSummary_provisional_diagnosis"><span class="ew-table-header-caption"><?php echo $Page->provisional_diagnosis->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="provisional_diagnosis">
<?php if ($Page->sortUrl($Page->provisional_diagnosis) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_provisional_diagnosis">
			<span class="ew-table-header-caption"><?php echo $Page->provisional_diagnosis->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_provisional_diagnosis" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->provisional_diagnosis) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->provisional_diagnosis->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->provisional_diagnosis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->provisional_diagnosis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Treatments->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Treatments"><div class="DischargeSummary_Treatments"><span class="ew-table-header-caption"><?php echo $Page->Treatments->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Treatments">
<?php if ($Page->sortUrl($Page->Treatments) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_Treatments">
			<span class="ew-table-header-caption"><?php echo $Page->Treatments->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_Treatments" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Treatments) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Treatments->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Treatments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Treatments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="FinalDiagnosis"><div class="DischargeSummary_FinalDiagnosis"><span class="ew-table-header-caption"><?php echo $Page->FinalDiagnosis->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="FinalDiagnosis">
<?php if ($Page->sortUrl($Page->FinalDiagnosis) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_FinalDiagnosis">
			<span class="ew-table-header-caption"><?php echo $Page->FinalDiagnosis->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_FinalDiagnosis" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->FinalDiagnosis) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->FinalDiagnosis->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->FinalDiagnosis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->FinalDiagnosis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->BP->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="BP"><div class="DischargeSummary_BP"><span class="ew-table-header-caption"><?php echo $Page->BP->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="BP">
<?php if ($Page->sortUrl($Page->BP) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_BP">
			<span class="ew-table-header-caption"><?php echo $Page->BP->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_BP" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->BP) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->BP->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Pulse->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Pulse"><div class="DischargeSummary_Pulse"><span class="ew-table-header-caption"><?php echo $Page->Pulse->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Pulse">
<?php if ($Page->sortUrl($Page->Pulse) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_Pulse">
			<span class="ew-table-header-caption"><?php echo $Page->Pulse->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_Pulse" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Pulse) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Pulse->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Resp->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Resp"><div class="DischargeSummary_Resp"><span class="ew-table-header-caption"><?php echo $Page->Resp->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Resp">
<?php if ($Page->sortUrl($Page->Resp) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_Resp">
			<span class="ew-table-header-caption"><?php echo $Page->Resp->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_Resp" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Resp) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Resp->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Resp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Resp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->SPO2->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="SPO2"><div class="DischargeSummary_SPO2"><span class="ew-table-header-caption"><?php echo $Page->SPO2->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="SPO2">
<?php if ($Page->sortUrl($Page->SPO2) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_SPO2">
			<span class="ew-table-header-caption"><?php echo $Page->SPO2->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_SPO2" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->SPO2) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->SPO2->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->SPO2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->SPO2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="FollowupAdvice"><div class="DischargeSummary_FollowupAdvice"><span class="ew-table-header-caption"><?php echo $Page->FollowupAdvice->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="FollowupAdvice">
<?php if ($Page->sortUrl($Page->FollowupAdvice) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_FollowupAdvice">
			<span class="ew-table-header-caption"><?php echo $Page->FollowupAdvice->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_FollowupAdvice" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->FollowupAdvice) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->FollowupAdvice->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->FollowupAdvice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->FollowupAdvice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="NextReviewDate"><div class="DischargeSummary_NextReviewDate"><span class="ew-table-header-caption"><?php echo $Page->NextReviewDate->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="NextReviewDate">
<?php if ($Page->sortUrl($Page->NextReviewDate) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_NextReviewDate">
			<span class="ew-table-header-caption"><?php echo $Page->NextReviewDate->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_NextReviewDate" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NextReviewDate) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->NextReviewDate->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Medicine->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Medicine"><div class="DischargeSummary_Medicine"><span class="ew-table-header-caption"><?php echo $Page->Medicine->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Medicine">
<?php if ($Page->sortUrl($Page->Medicine) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_Medicine">
			<span class="ew-table-header-caption"><?php echo $Page->Medicine->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_Medicine" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Medicine) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Medicine->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Medicine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Medicine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->M->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="M"><div class="DischargeSummary_M"><span class="ew-table-header-caption"><?php echo $Page->M->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="M">
<?php if ($Page->sortUrl($Page->M) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_M">
			<span class="ew-table-header-caption"><?php echo $Page->M->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_M" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->M) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->M->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->M->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->M->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->A->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="A"><div class="DischargeSummary_A"><span class="ew-table-header-caption"><?php echo $Page->A->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="A">
<?php if ($Page->sortUrl($Page->A) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_A">
			<span class="ew-table-header-caption"><?php echo $Page->A->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_A" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->A) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->A->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->N->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="N"><div class="DischargeSummary_N"><span class="ew-table-header-caption"><?php echo $Page->N->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="N">
<?php if ($Page->sortUrl($Page->N) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_N">
			<span class="ew-table-header-caption"><?php echo $Page->N->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_N" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->N) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->N->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="NoOfDays"><div class="DischargeSummary_NoOfDays"><span class="ew-table-header-caption"><?php echo $Page->NoOfDays->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="NoOfDays">
<?php if ($Page->sortUrl($Page->NoOfDays) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_NoOfDays">
			<span class="ew-table-header-caption"><?php echo $Page->NoOfDays->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_NoOfDays" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NoOfDays) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->NoOfDays->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NoOfDays->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NoOfDays->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PreRoute"><div class="DischargeSummary_PreRoute"><span class="ew-table-header-caption"><?php echo $Page->PreRoute->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PreRoute">
<?php if ($Page->sortUrl($Page->PreRoute) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_PreRoute">
			<span class="ew-table-header-caption"><?php echo $Page->PreRoute->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_PreRoute" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PreRoute) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PreRoute->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PreRoute->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PreRoute->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TimeOfTaking"><div class="DischargeSummary_TimeOfTaking"><span class="ew-table-header-caption"><?php echo $Page->TimeOfTaking->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TimeOfTaking">
<?php if ($Page->sortUrl($Page->TimeOfTaking) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_TimeOfTaking">
			<span class="ew-table-header-caption"><?php echo $Page->TimeOfTaking->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_TimeOfTaking" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TimeOfTaking) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->TimeOfTaking->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TimeOfTaking->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TimeOfTaking->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->History->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="History"><div class="DischargeSummary_History"><span class="ew-table-header-caption"><?php echo $Page->History->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="History">
<?php if ($Page->sortUrl($Page->History) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_History">
			<span class="ew-table-header-caption"><?php echo $Page->History->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_History" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->History) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->History->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->History->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->History->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->vitals->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="vitals"><div class="DischargeSummary_vitals"><span class="ew-table-header-caption"><?php echo $Page->vitals->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="vitals">
<?php if ($Page->sortUrl($Page->vitals) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_vitals">
			<span class="ew-table-header-caption"><?php echo $Page->vitals->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_vitals" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->vitals) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->vitals->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->vitals->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->vitals->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PatientID"><div class="DischargeSummary_PatientID"><span class="ew-table-header-caption"><?php echo $Page->PatientID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PatientID">
<?php if ($Page->sortUrl($Page->PatientID) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_PatientID">
			<span class="ew-table-header-caption"><?php echo $Page->PatientID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_PatientID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PatientID) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PatientID->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="HospID"><div class="DischargeSummary_HospID"><span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="HospID">
<?php if ($Page->sortUrl($Page->HospID) == "") { ?>
		<div class="ew-table-header-btn DischargeSummary_HospID">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer DischargeSummary_HospID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->HospID) ?>',0);">
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

	// Build detail SQL
	$where = DetailFilterSql($Page->patient_id, $Page->getSqlFirstGroupField(), $Page->patient_id->groupValue(), $Page->Dbid);
	if ($Page->PageFirstGroupFilter <> "") $Page->PageFirstGroupFilter .= " OR ";
	$Page->PageFirstGroupFilter .= $where;
	if ($Page->Filter != "")
		$where = "($Page->Filter) AND ($where)";
	$sql = BuildReportSql($Page->getSqlSelect(), $Page->getSqlWhere(), $Page->getSqlGroupBy(), $Page->getSqlHaving(), $Page->getSqlOrderBy(), $where, $Page->Sort);
	$Page->DetailRecordCount = 0;
	if ($Page->Recordset = $Page->getRecordset($sql)) {
		$Page->DetailRecordCount = $Page->Recordset->recordCount();
		if (GetConnectionType($Page->Dbid) == "ORACLE") { // Oracle, cannot moveFirst, use another recordset
			$rswrk = $Page->getRecordset($sql);
			$Page->DetailRows = $rswrk ? $rswrk->getRows() : [];
			$rswrk->close();
		} else {
			$Page->DetailRows = $Page->Recordset ? $Page->Recordset->getRows() : [];
		}
	}
	if ($Page->DetailRecordCount > 0)
		$Page->loadRowValues(TRUE);
	$Page->GroupIndexes[$Page->GroupCount] = [-1];
	while ($Page->Recordset && !$Page->Recordset->EOF) { // Loop detail records
		$Page->RecordCount++;
		$Page->RecordIndex++;
?>
<?php if ($Page->patient_id->Visible && $Page->checkLevelBreak(1) && $Page->patient_id->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 1;
		$Page->patient_id->Count = $Page->getSummaryCount(1);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->patient_id->Visible) { ?>
		<td data-field="patient_id"<?php echo $Page->patient_id->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="patient_id" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $Page->patient_id->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption DischargeSummary_patient_id"><span class="ew-table-header-caption"><?php echo $Page->patient_id->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->patient_id) == "") { ?>
		<span class="ew-summary-caption DischargeSummary_patient_id">
			<span class="ew-table-header-caption"><?php echo $Page->patient_id->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption DischargeSummary_patient_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->patient_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->patient_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_DischargeSummary_patient_id"<?php echo $Page->patient_id->viewAttributes() ?>><?php echo $Page->patient_id->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->patient_id->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php if ($Page->mrnNo->Visible && $Page->checkLevelBreak(2) && $Page->mrnNo->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 2;
		$Page->mrnNo->Count = $Page->getSummaryCount(2);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->patient_id->Visible) { ?>
		<td data-field="patient_id"<?php echo $Page->patient_id->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { ?>
		<td data-field="mrnNo"<?php echo $Page->mrnNo->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="mrnNo" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 2) ?>"<?php echo $Page->mrnNo->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption DischargeSummary_mrnNo"><span class="ew-table-header-caption"><?php echo $Page->mrnNo->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->mrnNo) == "") { ?>
		<span class="ew-summary-caption DischargeSummary_mrnNo">
			<span class="ew-table-header-caption"><?php echo $Page->mrnNo->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption DischargeSummary_mrnNo" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->mrnNo) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->mrnNo->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_DischargeSummary_mrnNo"<?php echo $Page->mrnNo->viewAttributes() ?>><?php echo $Page->mrnNo->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->mrnNo->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->patient_id->Visible) { ?>
	<?php if ($Page->patient_id->ShowGroupHeaderAsRow) { ?>
		<td data-field="patient_id"<?php echo $Page->patient_id->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="patient_id"<?php echo $Page->patient_id->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_DischargeSummary_patient_id"<?php echo $Page->patient_id->viewAttributes() ?>><?php echo $Page->patient_id->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { ?>
	<?php if ($Page->mrnNo->ShowGroupHeaderAsRow) { ?>
		<td data-field="mrnNo"<?php echo $Page->mrnNo->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="mrnNo"<?php echo $Page->mrnNo->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_DischargeSummary_mrnNo"<?php echo $Page->mrnNo->viewAttributes() ?>><?php echo $Page->mrnNo->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->patient_name->Visible) { ?>
		<td data-field="patient_name"<?php echo $Page->patient_name->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_patient_name"><span<?php echo $Page->patient_name->viewAttributes() ?>><?php echo $Page->patient_name->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { ?>
		<td data-field="profilePic"<?php echo $Page->profilePic->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_profilePic"><span<?php echo $Page->profilePic->viewAttributes() ?>><?php echo $Page->profilePic->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->gender->Visible) { ?>
		<td data-field="gender"<?php echo $Page->gender->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_gender"><span<?php echo $Page->gender->viewAttributes() ?>><?php echo $Page->gender->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->age->Visible) { ?>
		<td data-field="age"<?php echo $Page->age->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_age"><span<?php echo $Page->age->viewAttributes() ?>><?php echo $Page->age->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->physician_id->Visible) { ?>
		<td data-field="physician_id"<?php echo $Page->physician_id->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_physician_id"><span<?php echo $Page->physician_id->viewAttributes() ?>><?php echo $Page->physician_id->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->provisional_diagnosis->Visible) { ?>
		<td data-field="provisional_diagnosis"<?php echo $Page->provisional_diagnosis->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_provisional_diagnosis"><span<?php echo $Page->provisional_diagnosis->viewAttributes() ?>><?php echo $Page->provisional_diagnosis->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Treatments->Visible) { ?>
		<td data-field="Treatments"<?php echo $Page->Treatments->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_Treatments"><span<?php echo $Page->Treatments->viewAttributes() ?>><?php echo $Page->Treatments->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { ?>
		<td data-field="FinalDiagnosis"<?php echo $Page->FinalDiagnosis->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_FinalDiagnosis"><span<?php echo $Page->FinalDiagnosis->viewAttributes() ?>><?php echo $Page->FinalDiagnosis->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->BP->Visible) { ?>
		<td data-field="BP"<?php echo $Page->BP->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_BP"><span<?php echo $Page->BP->viewAttributes() ?>><?php echo $Page->BP->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { ?>
		<td data-field="Pulse"<?php echo $Page->Pulse->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_Pulse"><span<?php echo $Page->Pulse->viewAttributes() ?>><?php echo $Page->Pulse->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Resp->Visible) { ?>
		<td data-field="Resp"<?php echo $Page->Resp->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_Resp"><span<?php echo $Page->Resp->viewAttributes() ?>><?php echo $Page->Resp->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->SPO2->Visible) { ?>
		<td data-field="SPO2"<?php echo $Page->SPO2->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_SPO2"><span<?php echo $Page->SPO2->viewAttributes() ?>><?php echo $Page->SPO2->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { ?>
		<td data-field="FollowupAdvice"<?php echo $Page->FollowupAdvice->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_FollowupAdvice"><span<?php echo $Page->FollowupAdvice->viewAttributes() ?>><?php echo $Page->FollowupAdvice->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { ?>
		<td data-field="NextReviewDate"<?php echo $Page->NextReviewDate->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_NextReviewDate"><span<?php echo $Page->NextReviewDate->viewAttributes() ?>><?php echo $Page->NextReviewDate->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Medicine->Visible) { ?>
		<td data-field="Medicine"<?php echo $Page->Medicine->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_Medicine"><span<?php echo $Page->Medicine->viewAttributes() ?>><?php echo $Page->Medicine->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->M->Visible) { ?>
		<td data-field="M"<?php echo $Page->M->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_M"><span<?php echo $Page->M->viewAttributes() ?>><?php echo $Page->M->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->A->Visible) { ?>
		<td data-field="A"<?php echo $Page->A->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_A"><span<?php echo $Page->A->viewAttributes() ?>><?php echo $Page->A->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->N->Visible) { ?>
		<td data-field="N"<?php echo $Page->N->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_N"><span<?php echo $Page->N->viewAttributes() ?>><?php echo $Page->N->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { ?>
		<td data-field="NoOfDays"<?php echo $Page->NoOfDays->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_NoOfDays"><span<?php echo $Page->NoOfDays->viewAttributes() ?>><?php echo $Page->NoOfDays->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { ?>
		<td data-field="PreRoute"<?php echo $Page->PreRoute->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_PreRoute"><span<?php echo $Page->PreRoute->viewAttributes() ?>><?php echo $Page->PreRoute->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { ?>
		<td data-field="TimeOfTaking"<?php echo $Page->TimeOfTaking->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_TimeOfTaking"><span<?php echo $Page->TimeOfTaking->viewAttributes() ?>><?php echo $Page->TimeOfTaking->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->History->Visible) { ?>
		<td data-field="History"<?php echo $Page->History->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_History"><span<?php echo $Page->History->viewAttributes() ?>><?php echo $Page->History->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->vitals->Visible) { ?>
		<td data-field="vitals"<?php echo $Page->vitals->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_vitals"><span<?php echo $Page->vitals->viewAttributes() ?>><?php echo $Page->vitals->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { ?>
		<td data-field="PatientID"<?php echo $Page->PatientID->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_PatientID"><span<?php echo $Page->PatientID->viewAttributes() ?>><?php echo $Page->PatientID->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->RecordCount ?>_DischargeSummary_HospID"><span<?php echo $Page->HospID->viewAttributes() ?>><?php echo $Page->HospID->getViewValue() ?></span></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();

		// Show Footers
?>
<?php
		if ($Page->checkLevelBreak(2)) {
			$groupIndex = &$Page->GroupIndexes[$Page->GroupCount];
			if (isset($groupIndex)) {
				$cnt = count($groupIndex);
			} else {
				$groupIndex = [-1];
				$cnt = 1;
			}
			$groupIndex[$cnt] = $Page->RecordCount;
		}
		if ($Page->checkLevelBreak(2) && $Page->mrnNo->Visible) {
?>
<?php
			$Page->patient_id->Count = $Page->getSummaryCount(1, FALSE);
			$Page->mrnNo->Count = $Page->getSummaryCount(2, FALSE);
			$Page->resetAttributes();
			$Page->RowType = ROWTYPE_TOTAL;
			$Page->RowTotalType = ROWTOTAL_GROUP;
			$Page->RowTotalSubType = ROWTOTAL_FOOTER;
			$Page->RowGroupLevel = 2;
			$Page->renderRow();
?>
<?php if ($Page->mrnNo->ShowCompactSummaryFooter) { ?>
	<?php if (!$Page->mrnNo->ShowGroupHeaderAsRow) { ?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->patient_id->Visible) { ?>
		<td data-field="patient_id"<?php echo $Page->patient_id->cellAttributes() ?>>
	<?php if ($Page->patient_id->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 1) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->patient_id->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { ?>
		<td data-field="mrnNo"<?php echo $Page->mrnNo->cellAttributes() ?>>
	<?php if ($Page->mrnNo->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 2) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->mrnNo->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->patient_name->Visible) { ?>
		<td data-field="patient_name"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { ?>
		<td data-field="profilePic"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->gender->Visible) { ?>
		<td data-field="gender"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->age->Visible) { ?>
		<td data-field="age"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->physician_id->Visible) { ?>
		<td data-field="physician_id"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->provisional_diagnosis->Visible) { ?>
		<td data-field="provisional_diagnosis"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Treatments->Visible) { ?>
		<td data-field="Treatments"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { ?>
		<td data-field="FinalDiagnosis"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->BP->Visible) { ?>
		<td data-field="BP"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { ?>
		<td data-field="Pulse"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Resp->Visible) { ?>
		<td data-field="Resp"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->SPO2->Visible) { ?>
		<td data-field="SPO2"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { ?>
		<td data-field="FollowupAdvice"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { ?>
		<td data-field="NextReviewDate"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Medicine->Visible) { ?>
		<td data-field="Medicine"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->M->Visible) { ?>
		<td data-field="M"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->A->Visible) { ?>
		<td data-field="A"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->N->Visible) { ?>
		<td data-field="N"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { ?>
		<td data-field="NoOfDays"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { ?>
		<td data-field="PreRoute"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { ?>
		<td data-field="TimeOfTaking"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->History->Visible) { ?>
		<td data-field="History"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->vitals->Visible) { ?>
		<td data-field="vitals"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { ?>
		<td data-field="PatientID"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->mrnNo->cellAttributes() ?>></td>
<?php } ?>
	</tr>
	<?php } ?>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->patient_id->Visible) { ?>
		<td data-field="patient_id"<?php echo $Page->patient_id->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->SubGroupColumnCount + $Page->DetailColumnCount > 0) { ?>
		<td colspan="<?php echo ($Page->SubGroupColumnCount + $Page->DetailColumnCount) ?>"<?php echo $Page->HospID->cellAttributes() ?>><?php echo str_replace(["%v", "%c"], [$Page->mrnNo->GroupViewValue, $Page->mrnNo->caption()], $ReportLanguage->phrase("RptSumHead")) ?> <span class="ew-dir-ltr">(<?php echo FormatNumber($Page->Counts[2][0],0,-2,-2,-2) ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td>
<?php } ?>
	</tr>
<?php } ?>
<?php

			// Reset level 2 summary
			$Page->resetLevelSummary(2);
		} // End show footer check
		if ($Page->checkLevelBreak(2)) {
			$Page->GroupCounter[0]++;
		}
?>
<?php
	} // End detail records loop
?>
<?php

	// Next group
	$Page->loadGroupRowValues();

	// Show header if page break
	if ($Page->Export <> "")
		$Page->ShowHeader = ($Page->ExportPageBreakCount == 0) ? FALSE : ($Page->GroupCount % $Page->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($Page->ShowHeader)
		$Page->Page_Breaking($Page->ShowHeader, $Page->PageBreakContent);
	$Page->GroupCount++;
	$Page->GroupCounter[0] = 1;

	// Handle EOF
	if (!$Page->GroupRecordset || $Page->GroupRecordset->EOF)
		$Page->ShowHeader = FALSE;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->mrnNo->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
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
<?php include "DischargeSummary_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_DischargeSummary" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "DischargeSummary_pager.php" ?>
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
<?php if ($Page->Export <> "" || $Page->UseCustomTemplate) { ?>
<div id="tpd_DischargeSummarysummary"></div>
<script id="tpm_DischargeSummarysummary" type="text/html">
<div id="ct_DischargeSummary_summary"><h2 align="center">DISCHARGE SUMMARY</h2>
<font size="4" style="font-weight: bold;">
<p align="right"><?php echo date("F j, Y"); ?><p>
<p>
Patient ID: {{:PatientID}}<br>  
Patient Name: {{:patient_name}}<br>
Gender: {{:gender}}<br>
Age: {{:age}} 
</p>
</font>
<font size="3">
	<p>
Address			:	No: 5 Madel House , Annanagar, Madurai-625020 <br>
Contact No.			:           9487519945/9443165073 <br>
Date of Admission		:	{{:admission_date}}	Time of Admission	:	09.15 PM <br>
Date of Procedure		:	2.10.2018	Time of Procedure	:	06.00 PM <br>
Date of Discharge		:	{{:release_date}}	Time of Discharge	:	00.00 PM <br>	
Surgeon			:	Dr.Aruna Ashok   Dr.Kavirajan Shiva <br>
Anaesthetist			:	Dr. Ashok Kumar <br>
Identification Mark	:          A  Scar  on the  left eyebrow <br>
		<br>
Procedure done 		:          Lap Cholecystectomy 		<br>		
Anaesthesia			:	General  Anaesthesia <br>
</p>
		</font>
<p><?php echo $Page->Values[23] ?><br></p>
<p><?php echo $Page->Values[22] ?><br></p>
<p><?php echo $Page->Values[6] ?><br></p>
<p><?php echo $Page->Values[7] ?><br></p>
<p><?php echo $Page->Values[8] ?><br></p>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>BP : {{:BP}} mm of Hg</b></td>
<td><b>Pulse : {{:Pulse}} mints</b></td>
<td><b>Resp : {{:Resp}} mints</b></td>
<td><b>SPO2 : {{:SPO2}} %</b></td>
</tr>
</table> 
<?php
$cnt = count($Page->GroupIndexes) - 1;
for ($i = 1; $i <= $cnt; $i++) {
?>
<?php
$cnt1 = count($Page->GroupIndexes[$i]) - 1;
for ($i1 = 1; $i1 <= $cnt1; $i1++) {
?>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b><?php echo $DischargeSummary->Medicine->caption() ?></b></td>
<td><b><?php echo $DischargeSummary->M->caption() ?></b></td>
<td><b><?php echo $DischargeSummary->A->caption() ?></b></td>
<td><b><?php echo $DischargeSummary->N->caption() ?></b></td>
<td><b><?php echo $DischargeSummary->NoOfDays->caption() ?></b></td>
<td><b><?php echo $DischargeSummary->PreRoute->caption() ?></b></td>
<td><b><?php echo $DischargeSummary->TimeOfTaking->caption() ?></b></td>
</tr>
<?php
for ($j = 1; $j <= @$Page->GroupIndexes[$i][$i1]; $j++) {
?>
<tr>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_Medicine"/}}</td>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_M"/}}</td>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_A"/}}</td>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_N"/}}</td>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_NoOfDays"/}}</td>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_PreRoute"/}}</td>
<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $i1 ?>_<?php echo $j ?>_DischargeSummary_TimeOfTaking"/}}</td>
</tr>  
<?php
}
?>
</table> 
<?php
}
?>
<?php
if ($Page->ExportPageBreakCount > 0) {
if ($i % $Page->ExportPageBreakCount == 0 && $i < $cnt) {
?>
{{include tmpl="#tpb<?php echo $i ?>_DischargeSummary"/}}
<?php
}
}
}
?>
<p><?php echo $Page->Values[13] ?><br></p>
<br>
<b>Next Review Date : {{:NextReviewDate}} </b>
</div>
</script>
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
<?php if ($Page->Export == "" && !$Page->DrillDown || $Page->Export <> "" && $Page->CustomExport <> "") { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if ($Page->Export <> "" || $Page->UseCustomTemplate) { ?>
<script>
ew.applyTemplate("tpd_DischargeSummarysummary", "tpm_DischargeSummarysummary", "DischargeSummarysummary", "<?php echo $Page->CustomExport ?>", <?php echo ArrayToJson([$Page->FirstRowData]) ?>);
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