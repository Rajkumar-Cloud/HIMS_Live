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
if (!isset($patient_rpt))
	$patient_rpt = new patient_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$patient_rpt;

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
<script>

// Form object
var fpatientrpt = currentForm = new ew.Form("fpatientrpt");

// Validate method
fpatientrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_createddatetime");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->createddatetime->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fpatientrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fpatientrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fpatientrpt.validateRequired = false; // No JavaScript validation
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
<div id="ew-center" class="<?php echo $patient_rpt->CenterContentClass ?>">
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
<form name="fpatientrpt" id="fpatientrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fpatientrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_createddatetime" class="ew-cell form-group">
	<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $Page->createddatetime->caption() ?></label>
	<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "=") echo " selected" ?>><?php echo $ReportLanguage->phrase("EQUAL"); ?></option><option value="<>"<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "<>") echo " selected" ?>><?php echo $ReportLanguage->phrase("<>"); ?></option><option value="<"<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "<") echo " selected" ?>><?php echo $ReportLanguage->phrase("<"); ?></option><option value="<="<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "<=") echo " selected" ?>><?php echo $ReportLanguage->phrase("<="); ?></option><option value=">"<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == ">") echo " selected" ?>><?php echo $ReportLanguage->phrase(">"); ?></option><option value=">="<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == ">=") echo " selected" ?>><?php echo $ReportLanguage->phrase(">="); ?></option><option value="IS NULL"<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") echo " selected" ?>><?php echo $ReportLanguage->phrase("IS NULL"); ?></option><option value="IS NOT NULL"<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") echo " selected" ?>><?php echo $ReportLanguage->phrase("IS NOT NULL"); ?></option><option value="BETWEEN"<?php if ($Page->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") echo " selected" ?>><?php echo $ReportLanguage->phrase("BETWEEN"); ?></option></select></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->createddatetime->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="patient" data-field="x_createddatetime" id="x_createddatetime" name="x_createddatetime" maxlength="19" placeholder="<?php echo HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createddatetime->AdvancedSearch->SearchValue) ?>"<?php echo $Page->createddatetime->editAttributes() ?>>
<?php if (!$patient_base->createddatetime->ReadOnly && !$patient_base->createddatetime->Disabled && !isset($patient_base->createddatetime->EditAttrs["readonly"]) && !isset($patient_base->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatientrpt", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	<span class="ew-search-cond btw1_createddatetime d-none"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_createddatetime d-none">
<?php PrependClass($Page->createddatetime->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="patient" data-field="x_createddatetime" id="y_createddatetime" name="y_createddatetime" maxlength="19" placeholder="<?php echo HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->createddatetime->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->createddatetime->editAttributes() ?>>
<?php if (!$patient_base->createddatetime->ReadOnly && !$patient_base->createddatetime->Disabled && !isset($patient_base->createddatetime->EditAttrs["readonly"]) && !isset($patient_base->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatientrpt", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
fpatientrpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-header ew-grid-upper-panel">
<?php include "patient_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_patient" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="id"><div class="patient_id"><span class="ew-table-header-caption"><?php echo $Page->id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="id">
<?php if ($Page->sortUrl($Page->id) == "") { ?>
		<div class="ew-table-header-btn patient_id">
			<span class="ew-table-header-caption"><?php echo $Page->id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->title->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="title"><div class="patient_title"><span class="ew-table-header-caption"><?php echo $Page->title->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="title">
<?php if ($Page->sortUrl($Page->title) == "") { ?>
		<div class="ew-table-header-btn patient_title">
			<span class="ew-table-header-caption"><?php echo $Page->title->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_title" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->title) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->title->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->first_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_name"><div class="patient_first_name"><span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_name">
<?php if ($Page->sortUrl($Page->first_name) == "") { ?>
		<div class="ew-table-header-btn patient_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->middle_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="middle_name"><div class="patient_middle_name"><span class="ew-table-header-caption"><?php echo $Page->middle_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="middle_name">
<?php if ($Page->sortUrl($Page->middle_name) == "") { ?>
		<div class="ew-table-header-btn patient_middle_name">
			<span class="ew-table-header-caption"><?php echo $Page->middle_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_middle_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->middle_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->middle_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->last_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="last_name"><div class="patient_last_name"><span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="last_name">
<?php if ($Page->sortUrl($Page->last_name) == "") { ?>
		<div class="ew-table-header-btn patient_last_name">
			<span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_last_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->last_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->last_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->gender->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="gender"><div class="patient_gender"><span class="ew-table-header-caption"><?php echo $Page->gender->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="gender">
<?php if ($Page->sortUrl($Page->gender) == "") { ?>
		<div class="ew-table-header-btn patient_gender">
			<span class="ew-table-header-caption"><?php echo $Page->gender->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_gender" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->gender) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->gender->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->dob->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="dob"><div class="patient_dob"><span class="ew-table-header-caption"><?php echo $Page->dob->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="dob">
<?php if ($Page->sortUrl($Page->dob) == "") { ?>
		<div class="ew-table-header-btn patient_dob">
			<span class="ew-table-header-caption"><?php echo $Page->dob->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_dob" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->dob) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->dob->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Age->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Age"><div class="patient_Age"><span class="ew-table-header-caption"><?php echo $Page->Age->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Age">
<?php if ($Page->sortUrl($Page->Age) == "") { ?>
		<div class="ew-table-header-btn patient_Age">
			<span class="ew-table-header-caption"><?php echo $Page->Age->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_Age" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Age) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Age->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->blood_group->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="blood_group"><div class="patient_blood_group"><span class="ew-table-header-caption"><?php echo $Page->blood_group->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="blood_group">
<?php if ($Page->sortUrl($Page->blood_group) == "") { ?>
		<div class="ew-table-header-btn patient_blood_group">
			<span class="ew-table-header-caption"><?php echo $Page->blood_group->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_blood_group" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->blood_group) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->blood_group->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="mobile_no"><div class="patient_mobile_no"><span class="ew-table-header-caption"><?php echo $Page->mobile_no->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="mobile_no">
<?php if ($Page->sortUrl($Page->mobile_no) == "") { ?>
		<div class="ew-table-header-btn patient_mobile_no">
			<span class="ew-table-header-caption"><?php echo $Page->mobile_no->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_mobile_no" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->mobile_no) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->mobile_no->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="IdentificationMark"><div class="patient_IdentificationMark"><span class="ew-table-header-caption"><?php echo $Page->IdentificationMark->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="IdentificationMark">
<?php if ($Page->sortUrl($Page->IdentificationMark) == "") { ?>
		<div class="ew-table-header-btn patient_IdentificationMark">
			<span class="ew-table-header-caption"><?php echo $Page->IdentificationMark->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_IdentificationMark" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->IdentificationMark) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->IdentificationMark->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Religion->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Religion"><div class="patient_Religion"><span class="ew-table-header-caption"><?php echo $Page->Religion->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Religion">
<?php if ($Page->sortUrl($Page->Religion) == "") { ?>
		<div class="ew-table-header-btn patient_Religion">
			<span class="ew-table-header-caption"><?php echo $Page->Religion->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_Religion" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Religion) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Religion->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Religion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Religion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->_Nationality->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="_Nationality"><div class="patient__Nationality"><span class="ew-table-header-caption"><?php echo $Page->_Nationality->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="_Nationality">
<?php if ($Page->sortUrl($Page->_Nationality) == "") { ?>
		<div class="ew-table-header-btn patient__Nationality">
			<span class="ew-table-header-caption"><?php echo $Page->_Nationality->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient__Nationality" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->_Nationality) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->_Nationality->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->_Nationality->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->_Nationality->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->status->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="status"><div class="patient_status"><span class="ew-table-header-caption"><?php echo $Page->status->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="status">
<?php if ($Page->sortUrl($Page->status) == "") { ?>
		<div class="ew-table-header-btn patient_status">
			<span class="ew-table-header-caption"><?php echo $Page->status->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_status" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->status) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->status->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createdby->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createdby"><div class="patient_createdby"><span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createdby">
<?php if ($Page->sortUrl($Page->createdby) == "") { ?>
		<div class="ew-table-header-btn patient_createdby">
			<span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_createdby" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createdby) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createdby->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="createddatetime"><div class="patient_createddatetime"><span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="createddatetime">
<?php if ($Page->sortUrl($Page->createddatetime) == "") { ?>
		<div class="ew-table-header-btn patient_createddatetime">
			<span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_createddatetime" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->createddatetime) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->createddatetime->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="modifiedby"><div class="patient_modifiedby"><span class="ew-table-header-caption"><?php echo $Page->modifiedby->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="modifiedby">
<?php if ($Page->sortUrl($Page->modifiedby) == "") { ?>
		<div class="ew-table-header-btn patient_modifiedby">
			<span class="ew-table-header-caption"><?php echo $Page->modifiedby->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_modifiedby" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->modifiedby) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->modifiedby->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="modifieddatetime"><div class="patient_modifieddatetime"><span class="ew-table-header-caption"><?php echo $Page->modifieddatetime->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="modifieddatetime">
<?php if ($Page->sortUrl($Page->modifieddatetime) == "") { ?>
		<div class="ew-table-header-btn patient_modifieddatetime">
			<span class="ew-table-header-caption"><?php echo $Page->modifieddatetime->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_modifieddatetime" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->modifieddatetime) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->modifieddatetime->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ReferedByDr"><div class="patient_ReferedByDr"><span class="ew-table-header-caption"><?php echo $Page->ReferedByDr->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ReferedByDr">
<?php if ($Page->sortUrl($Page->ReferedByDr) == "") { ?>
		<div class="ew-table-header-btn patient_ReferedByDr">
			<span class="ew-table-header-caption"><?php echo $Page->ReferedByDr->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_ReferedByDr" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ReferedByDr) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ReferedByDr->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ReferClinicname"><div class="patient_ReferClinicname"><span class="ew-table-header-caption"><?php echo $Page->ReferClinicname->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ReferClinicname">
<?php if ($Page->sortUrl($Page->ReferClinicname) == "") { ?>
		<div class="ew-table-header-btn patient_ReferClinicname">
			<span class="ew-table-header-caption"><?php echo $Page->ReferClinicname->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_ReferClinicname" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ReferClinicname) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ReferClinicname->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ReferCity"><div class="patient_ReferCity"><span class="ew-table-header-caption"><?php echo $Page->ReferCity->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ReferCity">
<?php if ($Page->sortUrl($Page->ReferCity) == "") { ?>
		<div class="ew-table-header-btn patient_ReferCity">
			<span class="ew-table-header-caption"><?php echo $Page->ReferCity->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_ReferCity" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ReferCity) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ReferCity->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ReferMobileNo"><div class="patient_ReferMobileNo"><span class="ew-table-header-caption"><?php echo $Page->ReferMobileNo->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ReferMobileNo">
<?php if ($Page->sortUrl($Page->ReferMobileNo) == "") { ?>
		<div class="ew-table-header-btn patient_ReferMobileNo">
			<span class="ew-table-header-caption"><?php echo $Page->ReferMobileNo->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_ReferMobileNo" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ReferMobileNo) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ReferMobileNo->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ReferA4TreatingConsultant"><div class="patient_ReferA4TreatingConsultant"><span class="ew-table-header-caption"><?php echo $Page->ReferA4TreatingConsultant->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ReferA4TreatingConsultant">
<?php if ($Page->sortUrl($Page->ReferA4TreatingConsultant) == "") { ?>
		<div class="ew-table-header-btn patient_ReferA4TreatingConsultant">
			<span class="ew-table-header-caption"><?php echo $Page->ReferA4TreatingConsultant->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_ReferA4TreatingConsultant" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ReferA4TreatingConsultant) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ReferA4TreatingConsultant->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PurposreReferredfor"><div class="patient_PurposreReferredfor"><span class="ew-table-header-caption"><?php echo $Page->PurposreReferredfor->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PurposreReferredfor">
<?php if ($Page->sortUrl($Page->PurposreReferredfor) == "") { ?>
		<div class="ew-table-header-btn patient_PurposreReferredfor">
			<span class="ew-table-header-caption"><?php echo $Page->PurposreReferredfor->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_PurposreReferredfor" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PurposreReferredfor) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PurposreReferredfor->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_title"><div class="patient_spouse_title"><span class="ew-table-header-caption"><?php echo $Page->spouse_title->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_title">
<?php if ($Page->sortUrl($Page->spouse_title) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_title">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_title->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_title" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_title) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_title->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_title->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_title->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_first_name"><div class="patient_spouse_first_name"><span class="ew-table-header-caption"><?php echo $Page->spouse_first_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_first_name">
<?php if ($Page->sortUrl($Page->spouse_first_name) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_first_name">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_first_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_first_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_first_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_first_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_middle_name"><div class="patient_spouse_middle_name"><span class="ew-table-header-caption"><?php echo $Page->spouse_middle_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_middle_name">
<?php if ($Page->sortUrl($Page->spouse_middle_name) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_middle_name">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_middle_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_middle_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_middle_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_middle_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_middle_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_middle_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_last_name"><div class="patient_spouse_last_name"><span class="ew-table-header-caption"><?php echo $Page->spouse_last_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_last_name">
<?php if ($Page->sortUrl($Page->spouse_last_name) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_last_name">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_last_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_last_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_last_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_last_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_last_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_last_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_gender"><div class="patient_spouse_gender"><span class="ew-table-header-caption"><?php echo $Page->spouse_gender->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_gender">
<?php if ($Page->sortUrl($Page->spouse_gender) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_gender">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_gender->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_gender" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_gender) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_gender->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_dob"><div class="patient_spouse_dob"><span class="ew-table-header-caption"><?php echo $Page->spouse_dob->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_dob">
<?php if ($Page->sortUrl($Page->spouse_dob) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_dob">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_dob->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_dob" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_dob) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_dob->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_Age"><div class="patient_spouse_Age"><span class="ew-table-header-caption"><?php echo $Page->spouse_Age->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_Age">
<?php if ($Page->sortUrl($Page->spouse_Age) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_Age">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_Age->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_Age" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_Age) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_Age->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_blood_group"><div class="patient_spouse_blood_group"><span class="ew-table-header-caption"><?php echo $Page->spouse_blood_group->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_blood_group">
<?php if ($Page->sortUrl($Page->spouse_blood_group) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_blood_group">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_blood_group->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_blood_group" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_blood_group) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_blood_group->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_blood_group->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_blood_group->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="spouse_mobile_no"><div class="patient_spouse_mobile_no"><span class="ew-table-header-caption"><?php echo $Page->spouse_mobile_no->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="spouse_mobile_no">
<?php if ($Page->sortUrl($Page->spouse_mobile_no) == "") { ?>
		<div class="ew-table-header-btn patient_spouse_mobile_no">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_mobile_no->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_spouse_mobile_no" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->spouse_mobile_no) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->spouse_mobile_no->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->spouse_mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->spouse_mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Maritalstatus"><div class="patient_Maritalstatus"><span class="ew-table-header-caption"><?php echo $Page->Maritalstatus->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Maritalstatus">
<?php if ($Page->sortUrl($Page->Maritalstatus) == "") { ?>
		<div class="ew-table-header-btn patient_Maritalstatus">
			<span class="ew-table-header-caption"><?php echo $Page->Maritalstatus->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_Maritalstatus" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Maritalstatus) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Maritalstatus->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Maritalstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Maritalstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->_Business->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="_Business"><div class="patient__Business"><span class="ew-table-header-caption"><?php echo $Page->_Business->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="_Business">
<?php if ($Page->sortUrl($Page->_Business) == "") { ?>
		<div class="ew-table-header-btn patient__Business">
			<span class="ew-table-header-caption"><?php echo $Page->_Business->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient__Business" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->_Business) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->_Business->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->_Business->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->_Business->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->_Patient_Language->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="_Patient_Language"><div class="patient__Patient_Language"><span class="ew-table-header-caption"><?php echo $Page->_Patient_Language->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="_Patient_Language">
<?php if ($Page->sortUrl($Page->_Patient_Language) == "") { ?>
		<div class="ew-table-header-btn patient__Patient_Language">
			<span class="ew-table-header-caption"><?php echo $Page->_Patient_Language->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient__Patient_Language" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->_Patient_Language) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->_Patient_Language->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->_Patient_Language->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->_Patient_Language->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Passport->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Passport"><div class="patient_Passport"><span class="ew-table-header-caption"><?php echo $Page->Passport->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Passport">
<?php if ($Page->sortUrl($Page->Passport) == "") { ?>
		<div class="ew-table-header-btn patient_Passport">
			<span class="ew-table-header-caption"><?php echo $Page->Passport->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_Passport" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Passport) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Passport->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Passport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Passport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="VisaNo"><div class="patient_VisaNo"><span class="ew-table-header-caption"><?php echo $Page->VisaNo->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="VisaNo">
<?php if ($Page->sortUrl($Page->VisaNo) == "") { ?>
		<div class="ew-table-header-btn patient_VisaNo">
			<span class="ew-table-header-caption"><?php echo $Page->VisaNo->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_VisaNo" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->VisaNo) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->VisaNo->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->VisaNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->VisaNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ValidityOfVisa"><div class="patient_ValidityOfVisa"><span class="ew-table-header-caption"><?php echo $Page->ValidityOfVisa->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ValidityOfVisa">
<?php if ($Page->sortUrl($Page->ValidityOfVisa) == "") { ?>
		<div class="ew-table-header-btn patient_ValidityOfVisa">
			<span class="ew-table-header-caption"><?php echo $Page->ValidityOfVisa->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_ValidityOfVisa" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ValidityOfVisa) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ValidityOfVisa->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ValidityOfVisa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ValidityOfVisa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="WhereDidYouHear"><div class="patient_WhereDidYouHear"><span class="ew-table-header-caption"><?php echo $Page->WhereDidYouHear->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="WhereDidYouHear">
<?php if ($Page->sortUrl($Page->WhereDidYouHear) == "") { ?>
		<div class="ew-table-header-btn patient_WhereDidYouHear">
			<span class="ew-table-header-caption"><?php echo $Page->WhereDidYouHear->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_WhereDidYouHear" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->WhereDidYouHear) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->WhereDidYouHear->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PatientID"><div class="patient_PatientID"><span class="ew-table-header-caption"><?php echo $Page->PatientID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PatientID">
<?php if ($Page->sortUrl($Page->PatientID) == "") { ?>
		<div class="ew-table-header-btn patient_PatientID">
			<span class="ew-table-header-caption"><?php echo $Page->PatientID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_PatientID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PatientID) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PatientID->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="HospID"><div class="patient_HospID"><span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="HospID">
<?php if ($Page->sortUrl($Page->HospID) == "") { ?>
		<div class="ew-table-header-btn patient_HospID">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_HospID" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->HospID) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->HospID->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->street->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="street"><div class="patient_street"><span class="ew-table-header-caption"><?php echo $Page->street->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="street">
<?php if ($Page->sortUrl($Page->street) == "") { ?>
		<div class="ew-table-header-btn patient_street">
			<span class="ew-table-header-caption"><?php echo $Page->street->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_street" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->street) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->street->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->town->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="town"><div class="patient_town"><span class="ew-table-header-caption"><?php echo $Page->town->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="town">
<?php if ($Page->sortUrl($Page->town) == "") { ?>
		<div class="ew-table-header-btn patient_town">
			<span class="ew-table-header-caption"><?php echo $Page->town->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_town" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->town) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->town->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->province->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="province"><div class="patient_province"><span class="ew-table-header-caption"><?php echo $Page->province->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="province">
<?php if ($Page->sortUrl($Page->province) == "") { ?>
		<div class="ew-table-header-btn patient_province">
			<span class="ew-table-header-caption"><?php echo $Page->province->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_province" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->province) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->province->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->country->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="country"><div class="patient_country"><span class="ew-table-header-caption"><?php echo $Page->country->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="country">
<?php if ($Page->sortUrl($Page->country) == "") { ?>
		<div class="ew-table-header-btn patient_country">
			<span class="ew-table-header-caption"><?php echo $Page->country->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_country" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->country) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->country->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->postal_code->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="postal_code"><div class="patient_postal_code"><span class="ew-table-header-caption"><?php echo $Page->postal_code->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="postal_code">
<?php if ($Page->sortUrl($Page->postal_code) == "") { ?>
		<div class="ew-table-header-btn patient_postal_code">
			<span class="ew-table-header-caption"><?php echo $Page->postal_code->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_postal_code" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->postal_code) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->postal_code->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PEmail->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PEmail"><div class="patient_PEmail"><span class="ew-table-header-caption"><?php echo $Page->PEmail->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PEmail">
<?php if ($Page->sortUrl($Page->PEmail) == "") { ?>
		<div class="ew-table-header-btn patient_PEmail">
			<span class="ew-table-header-caption"><?php echo $Page->PEmail->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_PEmail" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PEmail) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PEmail->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PEmergencyContact"><div class="patient_PEmergencyContact"><span class="ew-table-header-caption"><?php echo $Page->PEmergencyContact->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PEmergencyContact">
<?php if ($Page->sortUrl($Page->PEmergencyContact) == "") { ?>
		<div class="ew-table-header-btn patient_PEmergencyContact">
			<span class="ew-table-header-caption"><?php echo $Page->PEmergencyContact->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer patient_PEmergencyContact" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->PEmergencyContact) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->PEmergencyContact->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->PEmergencyContact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->PEmergencyContact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->title->Visible) { ?>
		<td data-field="title"<?php echo $Page->title->cellAttributes() ?>>
<span<?php echo $Page->title->viewAttributes() ?>><?php echo $Page->title->getViewValue() ?></span></td>
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
<?php if ($Page->gender->Visible) { ?>
		<td data-field="gender"<?php echo $Page->gender->cellAttributes() ?>>
<span<?php echo $Page->gender->viewAttributes() ?>><?php echo $Page->gender->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->dob->Visible) { ?>
		<td data-field="dob"<?php echo $Page->dob->cellAttributes() ?>>
<span<?php echo $Page->dob->viewAttributes() ?>><?php echo $Page->dob->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Age->Visible) { ?>
		<td data-field="Age"<?php echo $Page->Age->cellAttributes() ?>>
<span<?php echo $Page->Age->viewAttributes() ?>><?php echo $Page->Age->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->blood_group->Visible) { ?>
		<td data-field="blood_group"<?php echo $Page->blood_group->cellAttributes() ?>>
<span<?php echo $Page->blood_group->viewAttributes() ?>><?php echo $Page->blood_group->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { ?>
		<td data-field="mobile_no"<?php echo $Page->mobile_no->cellAttributes() ?>>
<span<?php echo $Page->mobile_no->viewAttributes() ?>><?php echo $Page->mobile_no->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { ?>
		<td data-field="IdentificationMark"<?php echo $Page->IdentificationMark->cellAttributes() ?>>
<span<?php echo $Page->IdentificationMark->viewAttributes() ?>><?php echo $Page->IdentificationMark->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Religion->Visible) { ?>
		<td data-field="Religion"<?php echo $Page->Religion->cellAttributes() ?>>
<span<?php echo $Page->Religion->viewAttributes() ?>><?php echo $Page->Religion->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->_Nationality->Visible) { ?>
		<td data-field="_Nationality"<?php echo $Page->_Nationality->cellAttributes() ?>>
<span<?php echo $Page->_Nationality->viewAttributes() ?>><?php echo $Page->_Nationality->getViewValue() ?></span></td>
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
<?php if ($Page->ReferedByDr->Visible) { ?>
		<td data-field="ReferedByDr"<?php echo $Page->ReferedByDr->cellAttributes() ?>>
<span<?php echo $Page->ReferedByDr->viewAttributes() ?>><?php echo $Page->ReferedByDr->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { ?>
		<td data-field="ReferClinicname"<?php echo $Page->ReferClinicname->cellAttributes() ?>>
<span<?php echo $Page->ReferClinicname->viewAttributes() ?>><?php echo $Page->ReferClinicname->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { ?>
		<td data-field="ReferCity"<?php echo $Page->ReferCity->cellAttributes() ?>>
<span<?php echo $Page->ReferCity->viewAttributes() ?>><?php echo $Page->ReferCity->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { ?>
		<td data-field="ReferMobileNo"<?php echo $Page->ReferMobileNo->cellAttributes() ?>>
<span<?php echo $Page->ReferMobileNo->viewAttributes() ?>><?php echo $Page->ReferMobileNo->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { ?>
		<td data-field="ReferA4TreatingConsultant"<?php echo $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span<?php echo $Page->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $Page->ReferA4TreatingConsultant->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { ?>
		<td data-field="PurposreReferredfor"<?php echo $Page->PurposreReferredfor->cellAttributes() ?>>
<span<?php echo $Page->PurposreReferredfor->viewAttributes() ?>><?php echo $Page->PurposreReferredfor->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { ?>
		<td data-field="spouse_title"<?php echo $Page->spouse_title->cellAttributes() ?>>
<span<?php echo $Page->spouse_title->viewAttributes() ?>><?php echo $Page->spouse_title->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { ?>
		<td data-field="spouse_first_name"<?php echo $Page->spouse_first_name->cellAttributes() ?>>
<span<?php echo $Page->spouse_first_name->viewAttributes() ?>><?php echo $Page->spouse_first_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { ?>
		<td data-field="spouse_middle_name"<?php echo $Page->spouse_middle_name->cellAttributes() ?>>
<span<?php echo $Page->spouse_middle_name->viewAttributes() ?>><?php echo $Page->spouse_middle_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { ?>
		<td data-field="spouse_last_name"<?php echo $Page->spouse_last_name->cellAttributes() ?>>
<span<?php echo $Page->spouse_last_name->viewAttributes() ?>><?php echo $Page->spouse_last_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { ?>
		<td data-field="spouse_gender"<?php echo $Page->spouse_gender->cellAttributes() ?>>
<span<?php echo $Page->spouse_gender->viewAttributes() ?>><?php echo $Page->spouse_gender->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { ?>
		<td data-field="spouse_dob"<?php echo $Page->spouse_dob->cellAttributes() ?>>
<span<?php echo $Page->spouse_dob->viewAttributes() ?>><?php echo $Page->spouse_dob->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { ?>
		<td data-field="spouse_Age"<?php echo $Page->spouse_Age->cellAttributes() ?>>
<span<?php echo $Page->spouse_Age->viewAttributes() ?>><?php echo $Page->spouse_Age->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { ?>
		<td data-field="spouse_blood_group"<?php echo $Page->spouse_blood_group->cellAttributes() ?>>
<span<?php echo $Page->spouse_blood_group->viewAttributes() ?>><?php echo $Page->spouse_blood_group->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { ?>
		<td data-field="spouse_mobile_no"<?php echo $Page->spouse_mobile_no->cellAttributes() ?>>
<span<?php echo $Page->spouse_mobile_no->viewAttributes() ?>><?php echo $Page->spouse_mobile_no->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { ?>
		<td data-field="Maritalstatus"<?php echo $Page->Maritalstatus->cellAttributes() ?>>
<span<?php echo $Page->Maritalstatus->viewAttributes() ?>><?php echo $Page->Maritalstatus->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->_Business->Visible) { ?>
		<td data-field="_Business"<?php echo $Page->_Business->cellAttributes() ?>>
<span<?php echo $Page->_Business->viewAttributes() ?>><?php echo $Page->_Business->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->_Patient_Language->Visible) { ?>
		<td data-field="_Patient_Language"<?php echo $Page->_Patient_Language->cellAttributes() ?>>
<span<?php echo $Page->_Patient_Language->viewAttributes() ?>><?php echo $Page->_Patient_Language->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Passport->Visible) { ?>
		<td data-field="Passport"<?php echo $Page->Passport->cellAttributes() ?>>
<span<?php echo $Page->Passport->viewAttributes() ?>><?php echo $Page->Passport->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { ?>
		<td data-field="VisaNo"<?php echo $Page->VisaNo->cellAttributes() ?>>
<span<?php echo $Page->VisaNo->viewAttributes() ?>><?php echo $Page->VisaNo->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { ?>
		<td data-field="ValidityOfVisa"<?php echo $Page->ValidityOfVisa->cellAttributes() ?>>
<span<?php echo $Page->ValidityOfVisa->viewAttributes() ?>><?php echo $Page->ValidityOfVisa->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { ?>
		<td data-field="WhereDidYouHear"<?php echo $Page->WhereDidYouHear->cellAttributes() ?>>
<span<?php echo $Page->WhereDidYouHear->viewAttributes() ?>><?php echo $Page->WhereDidYouHear->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { ?>
		<td data-field="PatientID"<?php echo $Page->PatientID->cellAttributes() ?>>
<span<?php echo $Page->PatientID->viewAttributes() ?>><?php echo $Page->PatientID->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->HospID->Visible) { ?>
		<td data-field="HospID"<?php echo $Page->HospID->cellAttributes() ?>>
<span<?php echo $Page->HospID->viewAttributes() ?>><?php echo $Page->HospID->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->street->Visible) { ?>
		<td data-field="street"<?php echo $Page->street->cellAttributes() ?>>
<span<?php echo $Page->street->viewAttributes() ?>><?php echo $Page->street->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->town->Visible) { ?>
		<td data-field="town"<?php echo $Page->town->cellAttributes() ?>>
<span<?php echo $Page->town->viewAttributes() ?>><?php echo $Page->town->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->province->Visible) { ?>
		<td data-field="province"<?php echo $Page->province->cellAttributes() ?>>
<span<?php echo $Page->province->viewAttributes() ?>><?php echo $Page->province->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->country->Visible) { ?>
		<td data-field="country"<?php echo $Page->country->cellAttributes() ?>>
<span<?php echo $Page->country->viewAttributes() ?>><?php echo $Page->country->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { ?>
		<td data-field="postal_code"<?php echo $Page->postal_code->cellAttributes() ?>>
<span<?php echo $Page->postal_code->viewAttributes() ?>><?php echo $Page->postal_code->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PEmail->Visible) { ?>
		<td data-field="PEmail"<?php echo $Page->PEmail->cellAttributes() ?>>
<span<?php echo $Page->PEmail->viewAttributes() ?>><?php echo $Page->PEmail->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { ?>
		<td data-field="PEmergencyContact"<?php echo $Page->PEmergencyContact->cellAttributes() ?>>
<span<?php echo $Page->PEmergencyContact->viewAttributes() ?>><?php echo $Page->PEmergencyContact->getViewValue() ?></span></td>
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
<?php if (($Page->StopGroup - $Page->StartGroup + 1) <> $Page->TotalGroups) { ?>
<?php
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_PAGE;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-page-summary";
	$Page->renderRow();
?>
<?php if ($Page->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes(); ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptPageSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Counts[0][0],0,-2,-2,-2) ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes(); ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptPageSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->Counts[0][0],0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
<?php } ?>
<?php
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->ShowCompactSummaryFooter) { ?>
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
<?php include "patient_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_patient" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "patient_pager.php" ?>
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
<div id="ew-bottom" class="<?php echo $patient_rpt->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$patient_base->BloodGroup->PageBreakType = "before"; // Page break type
	$patient_base->BloodGroup->PageBreak = $Table->ExportChartPageBreak;
	$patient_base->BloodGroup->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$patient_base->BloodGroup->DrillDownInPanel = $Page->DrillDownInPanel;
$patient_base->BloodGroup->render("ew-chart-bottom");
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
	$patient_base->Nationality->PageBreakType = "before"; // Page break type
	$patient_base->Nationality->PageBreak = $Table->ExportChartPageBreak;
	$patient_base->Nationality->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$patient_base->Nationality->DrillDownInPanel = $Page->DrillDownInPanel;
$patient_base->Nationality->render("ew-chart-bottom");
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
	$patient_base->Patient_Language->PageBreakType = "before"; // Page break type
	$patient_base->Patient_Language->PageBreak = $Table->ExportChartPageBreak;
	$patient_base->Patient_Language->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$patient_base->Patient_Language->DrillDownInPanel = $Page->DrillDownInPanel;
$patient_base->Patient_Language->render("ew-chart-bottom");
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
	$patient_base->Business->PageBreakType = "before"; // Page break type
	$patient_base->Business->PageBreak = $Table->ExportChartPageBreak;
	$patient_base->Business->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$patient_base->Business->DrillDownInPanel = $Page->DrillDownInPanel;
$patient_base->Business->render("ew-chart-bottom");
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