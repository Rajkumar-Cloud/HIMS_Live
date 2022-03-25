<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$patient_ot_delivery_register_list = new patient_ot_delivery_register_list();

// Run the page
$patient_ot_delivery_register_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_ot_delivery_register_list->isExport()) { ?>
<script>
var fpatient_ot_delivery_registerlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_ot_delivery_registerlist = currentForm = new ew.Form("fpatient_ot_delivery_registerlist", "list");
	fpatient_ot_delivery_registerlist.formKeyCountName = '<?php echo $patient_ot_delivery_register_list->FormKeyCountName ?>';
	loadjs.done("fpatient_ot_delivery_registerlist");
});
var fpatient_ot_delivery_registerlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_ot_delivery_registerlistsrch = currentSearchForm = new ew.Form("fpatient_ot_delivery_registerlistsrch");

	// Validate function for search
	fpatient_ot_delivery_registerlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_dte");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_ot_delivery_register_list->dte->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_ot_delivery_registerlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_ot_delivery_registerlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fpatient_ot_delivery_registerlistsrch.filterList = <?php echo $patient_ot_delivery_register_list->getFilterList() ?>;
	loadjs.done("fpatient_ot_delivery_registerlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_ot_delivery_register_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_ot_delivery_register_list->TotalRecords > 0 && $patient_ot_delivery_register_list->ExportOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ImportOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->SearchOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->FilterOptions->visible()) { ?>
<?php $patient_ot_delivery_register_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_ot_delivery_register_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_ot_delivery_register_list->isExport("print")) { ?>
<?php
if ($patient_ot_delivery_register_list->DbMasterFilter != "" && $patient_ot_delivery_register->getCurrentMasterTable() == "ip_admission") {
	if ($patient_ot_delivery_register_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_ot_delivery_register_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_ot_delivery_register_list->isExport() && !$patient_ot_delivery_register->CurrentAction) { ?>
<form name="fpatient_ot_delivery_registerlistsrch" id="fpatient_ot_delivery_registerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_ot_delivery_registerlistsrch-search-panel" class="<?php echo $patient_ot_delivery_register_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_ot_delivery_register">
	<div class="ew-extended-search">
<?php

// Render search row
$patient_ot_delivery_register->RowType = ROWTYPE_SEARCH;
$patient_ot_delivery_register->resetAttributes();
$patient_ot_delivery_register_list->renderRow();
?>
<?php if ($patient_ot_delivery_register_list->mrnno->Visible) { // mrnno ?>
	<?php
		$patient_ot_delivery_register_list->SearchColumnCount++;
		if (($patient_ot_delivery_register_list->SearchColumnCount - 1) % $patient_ot_delivery_register_list->SearchFieldsPerRow == 0) {
			$patient_ot_delivery_register_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_ot_delivery_register_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mrnno" class="ew-cell form-group">
		<label for="x_mrnno" class="ew-search-caption ew-label"><?php echo $patient_ot_delivery_register_list->mrnno->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		<span id="el_patient_ot_delivery_register_mrnno" class="ew-search-field">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_list->mrnno->EditValue ?>"<?php echo $patient_ot_delivery_register_list->mrnno->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_ot_delivery_register_list->SearchColumnCount % $patient_ot_delivery_register_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->dte->Visible) { // dte ?>
	<?php
		$patient_ot_delivery_register_list->SearchColumnCount++;
		if (($patient_ot_delivery_register_list->SearchColumnCount - 1) % $patient_ot_delivery_register_list->SearchFieldsPerRow == 0) {
			$patient_ot_delivery_register_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_ot_delivery_register_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_dte" class="ew-cell form-group">
		<label for="x_dte" class="ew-search-caption ew-label"><?php echo $patient_ot_delivery_register_list->dte->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_dte" id="z_dte" value="BETWEEN">
</span>
		<span id="el_patient_ot_delivery_register_dte" class="ew-search-field">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_list->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_list->dte->EditValue ?>"<?php echo $patient_ot_delivery_register_list->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_list->dte->ReadOnly && !$patient_ot_delivery_register_list->dte->Disabled && !isset($patient_ot_delivery_register_list->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_list->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registerlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registerlistsrch", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_patient_ot_delivery_register_dte" class="ew-search-field2">
<input type="text" data-table="patient_ot_delivery_register" data-field="x_dte" name="y_dte" id="y_dte" placeholder="<?php echo HtmlEncode($patient_ot_delivery_register_list->dte->getPlaceHolder()) ?>" value="<?php echo $patient_ot_delivery_register_list->dte->EditValue2 ?>"<?php echo $patient_ot_delivery_register_list->dte->editAttributes() ?>>
<?php if (!$patient_ot_delivery_register_list->dte->ReadOnly && !$patient_ot_delivery_register_list->dte->Disabled && !isset($patient_ot_delivery_register_list->dte->EditAttrs["readonly"]) && !isset($patient_ot_delivery_register_list->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registerlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_ot_delivery_registerlistsrch", "y_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($patient_ot_delivery_register_list->SearchColumnCount % $patient_ot_delivery_register_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($patient_ot_delivery_register_list->SearchColumnCount % $patient_ot_delivery_register_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $patient_ot_delivery_register_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_ot_delivery_register_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_ot_delivery_register_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_ot_delivery_register_list->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_list->showMessage();
?>
<?php if ($patient_ot_delivery_register_list->TotalRecords > 0 || $patient_ot_delivery_register->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_ot_delivery_register_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_delivery_register">
<?php if (!$patient_ot_delivery_register_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_ot_delivery_register_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_ot_delivery_register_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_ot_delivery_registerlist" id="fpatient_ot_delivery_registerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<?php if ($patient_ot_delivery_register->getCurrentMasterTable() == "ip_admission" && $patient_ot_delivery_register->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_ot_delivery_register_list->PId->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_ot_delivery_register" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_ot_delivery_register_list->TotalRecords > 0 || $patient_ot_delivery_register_list->isGridEdit()) { ?>
<table id="tbl_patient_ot_delivery_registerlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_ot_delivery_register->RowType = ROWTYPE_HEADER;

// Render list options
$patient_ot_delivery_register_list->renderListOptions();

// Render list options (header, left)
$patient_ot_delivery_register_list->ListOptions->render("header", "left");
?>
<?php if ($patient_ot_delivery_register_list->id->Visible) { // id ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register_list->id->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_ot_delivery_register_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->id) ?>', 1);"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register_list->PatID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_ot_delivery_register_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PatID) ?>', 1);"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register_list->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_ot_delivery_register_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PatientName) ?>', 1);"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register_list->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_ot_delivery_register_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->mrnno) ?>', 1);"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_ot_delivery_register_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->MobileNumber) ?>', 1);"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Age->Visible) { // Age ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register_list->Age->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_ot_delivery_register_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Age) ?>', 1);"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register_list->Gender->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_ot_delivery_register_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Gender) ?>', 1);"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ObstetricsHistryFeMale) == "") { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricsHistryFeMale" class="<?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ObstetricsHistryFeMale) ?>', 1);"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ObstetricsHistryFeMale->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ObstetricsHistryFeMale->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Abortion->Visible) { // Abortion ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Abortion) == "") { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register_list->Abortion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Abortion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abortion" class="<?php echo $patient_ot_delivery_register_list->Abortion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Abortion) ?>', 1);"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Abortion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Abortion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Abortion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthDate) == "") { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register_list->ChildBirthDate->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate" class="<?php echo $patient_ot_delivery_register_list->ChildBirthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthDate) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildBirthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildBirthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthTime) == "") { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register_list->ChildBirthTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime" class="<?php echo $patient_ot_delivery_register_list->ChildBirthTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthTime) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildBirthTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildBirthTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildSex->Visible) { // ChildSex ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildSex) == "") { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register_list->ChildSex->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildSex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex" class="<?php echo $patient_ot_delivery_register_list->ChildSex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildSex) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildSex->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildSex->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildSex->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildWt->Visible) { // ChildWt ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildWt) == "") { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register_list->ChildWt->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildWt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt" class="<?php echo $patient_ot_delivery_register_list->ChildWt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildWt) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildWt->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildWt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildWt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildDay->Visible) { // ChildDay ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildDay) == "") { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register_list->ChildDay->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay" class="<?php echo $patient_ot_delivery_register_list->ChildDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildDay) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildDay->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildDay->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildDay->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildOE->Visible) { // ChildOE ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildOE) == "") { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register_list->ChildOE->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildOE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE" class="<?php echo $patient_ot_delivery_register_list->ChildOE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildOE) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildOE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildOE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildOE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBlGrp) == "") { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register_list->ChildBlGrp->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBlGrp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp" class="<?php echo $patient_ot_delivery_register_list->ChildBlGrp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBlGrp) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBlGrp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildBlGrp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildBlGrp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ApgarScore->Visible) { // ApgarScore ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ApgarScore) == "") { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register_list->ApgarScore->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ApgarScore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore" class="<?php echo $patient_ot_delivery_register_list->ApgarScore->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ApgarScore) ?>', 1);"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ApgarScore->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ApgarScore->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ApgarScore->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->birthnotification->Visible) { // birthnotification ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->birthnotification) == "") { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register_list->birthnotification->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->birthnotification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification" class="<?php echo $patient_ot_delivery_register_list->birthnotification->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->birthnotification) ?>', 1);"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->birthnotification->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->birthnotification->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->birthnotification->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->formno->Visible) { // formno ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->formno) == "") { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register_list->formno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->formno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno" class="<?php echo $patient_ot_delivery_register_list->formno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->formno) ?>', 1);"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->formno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->formno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->formno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->dte->Visible) { // dte ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->dte) == "") { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register_list->dte->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->dte->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dte" class="<?php echo $patient_ot_delivery_register_list->dte->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->dte) ?>', 1);"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->dte->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->dte->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->dte->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->motherReligion->Visible) { // motherReligion ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->motherReligion) == "") { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register_list->motherReligion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->motherReligion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="motherReligion" class="<?php echo $patient_ot_delivery_register_list->motherReligion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->motherReligion) ?>', 1);"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->motherReligion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->motherReligion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->motherReligion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->bloodgroup->Visible) { // bloodgroup ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->bloodgroup) == "") { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register_list->bloodgroup->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->bloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodgroup" class="<?php echo $patient_ot_delivery_register_list->bloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->bloodgroup) ?>', 1);"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->bloodgroup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->bloodgroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->bloodgroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->status->Visible) { // status ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register_list->status->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_ot_delivery_register_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->status) ?>', 1);"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->createdby->Visible) { // createdby ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register_list->createdby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_ot_delivery_register_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->createdby) ?>', 1);"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_ot_delivery_register_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->createddatetime) ?>', 1);"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register_list->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_ot_delivery_register_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->modifiedby) ?>', 1);"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register_list->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_ot_delivery_register_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->modifieddatetime) ?>', 1);"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register_list->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient_ot_delivery_register_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PatientID) ?>', 1);"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register_list->HospID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_ot_delivery_register_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->HospID) ?>', 1);"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthDate1) == "") { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register_list->ChildBirthDate1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthDate1" class="<?php echo $patient_ot_delivery_register_list->ChildBirthDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthDate1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildBirthDate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildBirthDate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthTime1) == "") { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register_list->ChildBirthTime1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthTime1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBirthTime1" class="<?php echo $patient_ot_delivery_register_list->ChildBirthTime1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBirthTime1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBirthTime1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildBirthTime1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildBirthTime1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildSex1->Visible) { // ChildSex1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildSex1) == "") { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register_list->ChildSex1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildSex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildSex1" class="<?php echo $patient_ot_delivery_register_list->ChildSex1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildSex1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildSex1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildSex1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildSex1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildWt1->Visible) { // ChildWt1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildWt1) == "") { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register_list->ChildWt1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildWt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildWt1" class="<?php echo $patient_ot_delivery_register_list->ChildWt1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildWt1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildWt1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildWt1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildWt1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildDay1->Visible) { // ChildDay1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildDay1) == "") { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register_list->ChildDay1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildDay1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildDay1" class="<?php echo $patient_ot_delivery_register_list->ChildDay1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildDay1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildDay1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildDay1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildDay1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildOE1->Visible) { // ChildOE1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildOE1) == "") { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register_list->ChildOE1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildOE1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildOE1" class="<?php echo $patient_ot_delivery_register_list->ChildOE1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildOE1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildOE1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildOE1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildOE1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBlGrp1) == "") { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register_list->ChildBlGrp1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBlGrp1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ChildBlGrp1" class="<?php echo $patient_ot_delivery_register_list->ChildBlGrp1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ChildBlGrp1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ChildBlGrp1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ChildBlGrp1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ChildBlGrp1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ApgarScore1->Visible) { // ApgarScore1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ApgarScore1) == "") { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register_list->ApgarScore1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ApgarScore1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApgarScore1" class="<?php echo $patient_ot_delivery_register_list->ApgarScore1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ApgarScore1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ApgarScore1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ApgarScore1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ApgarScore1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->birthnotification1->Visible) { // birthnotification1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->birthnotification1) == "") { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register_list->birthnotification1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->birthnotification1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="birthnotification1" class="<?php echo $patient_ot_delivery_register_list->birthnotification1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->birthnotification1) ?>', 1);"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->birthnotification1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->birthnotification1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->birthnotification1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->formno1->Visible) { // formno1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->formno1) == "") { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register_list->formno1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->formno1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="formno1" class="<?php echo $patient_ot_delivery_register_list->formno1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->formno1) ?>', 1);"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->formno1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->formno1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->formno1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->RecievedTime->Visible) { // RecievedTime ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->RecievedTime) == "") { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register_list->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->RecievedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecievedTime" class="<?php echo $patient_ot_delivery_register_list->RecievedTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->RecievedTime) ?>', 1);"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->RecievedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->RecievedTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->RecievedTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AnaesthesiaStarted) == "") { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaStarted" class="<?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AnaesthesiaStarted) ?>', 1);"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->AnaesthesiaStarted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->AnaesthesiaStarted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AnaesthesiaEnded) == "") { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaesthesiaEnded" class="<?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AnaesthesiaEnded) ?>', 1);"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->AnaesthesiaEnded->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->AnaesthesiaEnded->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->surgeryStarted->Visible) { // surgeryStarted ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->surgeryStarted) == "") { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register_list->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->surgeryStarted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryStarted" class="<?php echo $patient_ot_delivery_register_list->surgeryStarted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->surgeryStarted) ?>', 1);"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->surgeryStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->surgeryStarted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->surgeryStarted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->surgeryEnded->Visible) { // surgeryEnded ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->surgeryEnded) == "") { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register_list->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->surgeryEnded->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="surgeryEnded" class="<?php echo $patient_ot_delivery_register_list->surgeryEnded->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->surgeryEnded) ?>', 1);"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->surgeryEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->surgeryEnded->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->surgeryEnded->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->RecoveryTime->Visible) { // RecoveryTime ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->RecoveryTime) == "") { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register_list->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->RecoveryTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecoveryTime" class="<?php echo $patient_ot_delivery_register_list->RecoveryTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->RecoveryTime) ?>', 1);"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->RecoveryTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->RecoveryTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->RecoveryTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ShiftedTime->Visible) { // ShiftedTime ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ShiftedTime) == "") { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register_list->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ShiftedTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShiftedTime" class="<?php echo $patient_ot_delivery_register_list->ShiftedTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ShiftedTime) ?>', 1);"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ShiftedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ShiftedTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ShiftedTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Duration->Visible) { // Duration ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register_list->Duration->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $patient_ot_delivery_register_list->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Duration) ?>', 1);"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Duration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Duration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Duration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Surgeon->Visible) { // Surgeon ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register_list->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $patient_ot_delivery_register_list->Surgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Surgeon) ?>', 1);"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Surgeon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Surgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Surgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register_list->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $patient_ot_delivery_register_list->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Anaesthetist) ?>', 1);"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Anaesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Anaesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Anaesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AsstSurgeon1) == "") { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register_list->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AsstSurgeon1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon1" class="<?php echo $patient_ot_delivery_register_list->AsstSurgeon1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AsstSurgeon1) ?>', 1);"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AsstSurgeon1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->AsstSurgeon1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->AsstSurgeon1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AsstSurgeon2) == "") { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register_list->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AsstSurgeon2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon2" class="<?php echo $patient_ot_delivery_register_list->AsstSurgeon2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->AsstSurgeon2) ?>', 1);"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->AsstSurgeon2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->AsstSurgeon2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->AsstSurgeon2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->paediatric->Visible) { // paediatric ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->paediatric) == "") { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register_list->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->paediatric->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paediatric" class="<?php echo $patient_ot_delivery_register_list->paediatric->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->paediatric) ?>', 1);"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->paediatric->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->paediatric->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->paediatric->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ScrubNurse1) == "") { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register_list->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ScrubNurse1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse1" class="<?php echo $patient_ot_delivery_register_list->ScrubNurse1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ScrubNurse1) ?>', 1);"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ScrubNurse1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ScrubNurse1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ScrubNurse1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ScrubNurse2) == "") { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register_list->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ScrubNurse2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScrubNurse2" class="<?php echo $patient_ot_delivery_register_list->ScrubNurse2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->ScrubNurse2) ?>', 1);"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->ScrubNurse2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->ScrubNurse2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->ScrubNurse2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->FloorNurse->Visible) { // FloorNurse ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->FloorNurse) == "") { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register_list->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->FloorNurse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FloorNurse" class="<?php echo $patient_ot_delivery_register_list->FloorNurse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->FloorNurse) ?>', 1);"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->FloorNurse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->FloorNurse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->FloorNurse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Technician->Visible) { // Technician ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Technician) == "") { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register_list->Technician->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Technician->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technician" class="<?php echo $patient_ot_delivery_register_list->Technician->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Technician) ?>', 1);"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Technician->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Technician->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Technician->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->HouseKeeping->Visible) { // HouseKeeping ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->HouseKeeping) == "") { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register_list->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->HouseKeeping->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HouseKeeping" class="<?php echo $patient_ot_delivery_register_list->HouseKeeping->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->HouseKeeping) ?>', 1);"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->HouseKeeping->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->HouseKeeping->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->HouseKeeping->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->countsCheckedMops) == "") { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register_list->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->countsCheckedMops->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="countsCheckedMops" class="<?php echo $patient_ot_delivery_register_list->countsCheckedMops->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->countsCheckedMops) ?>', 1);"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->countsCheckedMops->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->countsCheckedMops->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->countsCheckedMops->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->gauze->Visible) { // gauze ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->gauze) == "") { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register_list->gauze->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->gauze->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gauze" class="<?php echo $patient_ot_delivery_register_list->gauze->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->gauze) ?>', 1);"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->gauze->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->gauze->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->gauze->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->needles->Visible) { // needles ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->needles) == "") { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register_list->needles->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->needles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="needles" class="<?php echo $patient_ot_delivery_register_list->needles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->needles) ?>', 1);"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->needles->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->needles->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->needles->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->bloodloss->Visible) { // bloodloss ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->bloodloss) == "") { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register_list->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->bloodloss->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodloss" class="<?php echo $patient_ot_delivery_register_list->bloodloss->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->bloodloss) ?>', 1);"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->bloodloss->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->bloodloss->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->bloodloss->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->bloodtransfusion) == "") { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register_list->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->bloodtransfusion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bloodtransfusion" class="<?php echo $patient_ot_delivery_register_list->bloodtransfusion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->bloodtransfusion) ?>', 1);"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->bloodtransfusion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->bloodtransfusion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->bloodtransfusion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register_list->Reception->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_ot_delivery_register_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->Reception) ?>', 1);"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_ot_delivery_register_list->PId->Visible) { // PId ?>
	<?php if ($patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register_list->PId->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><div class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $patient_ot_delivery_register_list->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_ot_delivery_register_list->SortUrl($patient_ot_delivery_register_list->PId) ?>', 1);"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_ot_delivery_register_list->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_ot_delivery_register_list->PId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_ot_delivery_register_list->PId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_ot_delivery_register_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_ot_delivery_register_list->ExportAll && $patient_ot_delivery_register_list->isExport()) {
	$patient_ot_delivery_register_list->StopRecord = $patient_ot_delivery_register_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_ot_delivery_register_list->TotalRecords > $patient_ot_delivery_register_list->StartRecord + $patient_ot_delivery_register_list->DisplayRecords - 1)
		$patient_ot_delivery_register_list->StopRecord = $patient_ot_delivery_register_list->StartRecord + $patient_ot_delivery_register_list->DisplayRecords - 1;
	else
		$patient_ot_delivery_register_list->StopRecord = $patient_ot_delivery_register_list->TotalRecords;
}
$patient_ot_delivery_register_list->RecordCount = $patient_ot_delivery_register_list->StartRecord - 1;
if ($patient_ot_delivery_register_list->Recordset && !$patient_ot_delivery_register_list->Recordset->EOF) {
	$patient_ot_delivery_register_list->Recordset->moveFirst();
	$selectLimit = $patient_ot_delivery_register_list->UseSelectLimit;
	if (!$selectLimit && $patient_ot_delivery_register_list->StartRecord > 1)
		$patient_ot_delivery_register_list->Recordset->move($patient_ot_delivery_register_list->StartRecord - 1);
} elseif (!$patient_ot_delivery_register->AllowAddDeleteRow && $patient_ot_delivery_register_list->StopRecord == 0) {
	$patient_ot_delivery_register_list->StopRecord = $patient_ot_delivery_register->GridAddRowCount;
}

// Initialize aggregate
$patient_ot_delivery_register->RowType = ROWTYPE_AGGREGATEINIT;
$patient_ot_delivery_register->resetAttributes();
$patient_ot_delivery_register_list->renderRow();
while ($patient_ot_delivery_register_list->RecordCount < $patient_ot_delivery_register_list->StopRecord) {
	$patient_ot_delivery_register_list->RecordCount++;
	if ($patient_ot_delivery_register_list->RecordCount >= $patient_ot_delivery_register_list->StartRecord) {
		$patient_ot_delivery_register_list->RowCount++;

		// Set up key count
		$patient_ot_delivery_register_list->KeyCount = $patient_ot_delivery_register_list->RowIndex;

		// Init row class and style
		$patient_ot_delivery_register->resetAttributes();
		$patient_ot_delivery_register->CssClass = "";
		if ($patient_ot_delivery_register_list->isGridAdd()) {
		} else {
			$patient_ot_delivery_register_list->loadRowValues($patient_ot_delivery_register_list->Recordset); // Load row values
		}
		$patient_ot_delivery_register->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_ot_delivery_register->RowAttrs->merge(["data-rowindex" => $patient_ot_delivery_register_list->RowCount, "id" => "r" . $patient_ot_delivery_register_list->RowCount . "_patient_ot_delivery_register", "data-rowtype" => $patient_ot_delivery_register->RowType]);

		// Render row
		$patient_ot_delivery_register_list->renderRow();

		// Render list options
		$patient_ot_delivery_register_list->renderListOptions();
?>
	<tr <?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_ot_delivery_register_list->ListOptions->render("body", "left", $patient_ot_delivery_register_list->RowCount);
?>
	<?php if ($patient_ot_delivery_register_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_ot_delivery_register_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register_list->id->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_ot_delivery_register_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register_list->PatID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_ot_delivery_register_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register_list->PatientName->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_ot_delivery_register_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register_list->mrnno->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_ot_delivery_register_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register_list->MobileNumber->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_ot_delivery_register_list->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register_list->Age->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_ot_delivery_register_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register_list->Gender->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td data-name="ObstetricsHistryFeMale" <?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Abortion->Visible) { // Abortion ?>
		<td data-name="Abortion" <?php echo $patient_ot_delivery_register_list->Abortion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register_list->Abortion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Abortion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td data-name="ChildBirthDate" <?php echo $patient_ot_delivery_register_list->ChildBirthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register_list->ChildBirthDate->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildBirthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td data-name="ChildBirthTime" <?php echo $patient_ot_delivery_register_list->ChildBirthTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register_list->ChildBirthTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildBirthTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildSex->Visible) { // ChildSex ?>
		<td data-name="ChildSex" <?php echo $patient_ot_delivery_register_list->ChildSex->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register_list->ChildSex->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildSex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildWt->Visible) { // ChildWt ?>
		<td data-name="ChildWt" <?php echo $patient_ot_delivery_register_list->ChildWt->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register_list->ChildWt->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildWt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildDay->Visible) { // ChildDay ?>
		<td data-name="ChildDay" <?php echo $patient_ot_delivery_register_list->ChildDay->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register_list->ChildDay->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildDay->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildOE->Visible) { // ChildOE ?>
		<td data-name="ChildOE" <?php echo $patient_ot_delivery_register_list->ChildOE->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register_list->ChildOE->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildOE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td data-name="ChildBlGrp" <?php echo $patient_ot_delivery_register_list->ChildBlGrp->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register_list->ChildBlGrp->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildBlGrp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ApgarScore->Visible) { // ApgarScore ?>
		<td data-name="ApgarScore" <?php echo $patient_ot_delivery_register_list->ApgarScore->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register_list->ApgarScore->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ApgarScore->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->birthnotification->Visible) { // birthnotification ?>
		<td data-name="birthnotification" <?php echo $patient_ot_delivery_register_list->birthnotification->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register_list->birthnotification->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->birthnotification->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->formno->Visible) { // formno ?>
		<td data-name="formno" <?php echo $patient_ot_delivery_register_list->formno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register_list->formno->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->formno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->dte->Visible) { // dte ?>
		<td data-name="dte" <?php echo $patient_ot_delivery_register_list->dte->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register_list->dte->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->dte->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->motherReligion->Visible) { // motherReligion ?>
		<td data-name="motherReligion" <?php echo $patient_ot_delivery_register_list->motherReligion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register_list->motherReligion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->motherReligion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->bloodgroup->Visible) { // bloodgroup ?>
		<td data-name="bloodgroup" <?php echo $patient_ot_delivery_register_list->bloodgroup->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register_list->bloodgroup->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->bloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_ot_delivery_register_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register_list->status->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_ot_delivery_register_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register_list->createdby->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_ot_delivery_register_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register_list->createddatetime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_ot_delivery_register_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register_list->modifiedby->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_ot_delivery_register_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register_list->modifieddatetime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $patient_ot_delivery_register_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register_list->PatientID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_ot_delivery_register_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register_list->HospID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td data-name="ChildBirthDate1" <?php echo $patient_ot_delivery_register_list->ChildBirthDate1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register_list->ChildBirthDate1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildBirthDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td data-name="ChildBirthTime1" <?php echo $patient_ot_delivery_register_list->ChildBirthTime1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register_list->ChildBirthTime1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildBirthTime1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildSex1->Visible) { // ChildSex1 ?>
		<td data-name="ChildSex1" <?php echo $patient_ot_delivery_register_list->ChildSex1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register_list->ChildSex1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildSex1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildWt1->Visible) { // ChildWt1 ?>
		<td data-name="ChildWt1" <?php echo $patient_ot_delivery_register_list->ChildWt1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register_list->ChildWt1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildWt1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildDay1->Visible) { // ChildDay1 ?>
		<td data-name="ChildDay1" <?php echo $patient_ot_delivery_register_list->ChildDay1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register_list->ChildDay1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildDay1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildOE1->Visible) { // ChildOE1 ?>
		<td data-name="ChildOE1" <?php echo $patient_ot_delivery_register_list->ChildOE1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register_list->ChildOE1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildOE1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td data-name="ChildBlGrp1" <?php echo $patient_ot_delivery_register_list->ChildBlGrp1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register_list->ChildBlGrp1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ChildBlGrp1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td data-name="ApgarScore1" <?php echo $patient_ot_delivery_register_list->ApgarScore1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register_list->ApgarScore1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ApgarScore1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->birthnotification1->Visible) { // birthnotification1 ?>
		<td data-name="birthnotification1" <?php echo $patient_ot_delivery_register_list->birthnotification1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register_list->birthnotification1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->birthnotification1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->formno1->Visible) { // formno1 ?>
		<td data-name="formno1" <?php echo $patient_ot_delivery_register_list->formno1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register_list->formno1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->formno1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->RecievedTime->Visible) { // RecievedTime ?>
		<td data-name="RecievedTime" <?php echo $patient_ot_delivery_register_list->RecievedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register_list->RecievedTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->RecievedTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td data-name="AnaesthesiaStarted" <?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td data-name="AnaesthesiaEnded" <?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->surgeryStarted->Visible) { // surgeryStarted ?>
		<td data-name="surgeryStarted" <?php echo $patient_ot_delivery_register_list->surgeryStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register_list->surgeryStarted->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->surgeryStarted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->surgeryEnded->Visible) { // surgeryEnded ?>
		<td data-name="surgeryEnded" <?php echo $patient_ot_delivery_register_list->surgeryEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register_list->surgeryEnded->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->surgeryEnded->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->RecoveryTime->Visible) { // RecoveryTime ?>
		<td data-name="RecoveryTime" <?php echo $patient_ot_delivery_register_list->RecoveryTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register_list->RecoveryTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->RecoveryTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ShiftedTime->Visible) { // ShiftedTime ?>
		<td data-name="ShiftedTime" <?php echo $patient_ot_delivery_register_list->ShiftedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register_list->ShiftedTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ShiftedTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Duration->Visible) { // Duration ?>
		<td data-name="Duration" <?php echo $patient_ot_delivery_register_list->Duration->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register_list->Duration->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon" <?php echo $patient_ot_delivery_register_list->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register_list->Surgeon->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Surgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist" <?php echo $patient_ot_delivery_register_list->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register_list->Anaesthetist->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Anaesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td data-name="AsstSurgeon1" <?php echo $patient_ot_delivery_register_list->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register_list->AsstSurgeon1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td data-name="AsstSurgeon2" <?php echo $patient_ot_delivery_register_list->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register_list->AsstSurgeon2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->paediatric->Visible) { // paediatric ?>
		<td data-name="paediatric" <?php echo $patient_ot_delivery_register_list->paediatric->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register_list->paediatric->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->paediatric->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td data-name="ScrubNurse1" <?php echo $patient_ot_delivery_register_list->ScrubNurse1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register_list->ScrubNurse1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td data-name="ScrubNurse2" <?php echo $patient_ot_delivery_register_list->ScrubNurse2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register_list->ScrubNurse2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->FloorNurse->Visible) { // FloorNurse ?>
		<td data-name="FloorNurse" <?php echo $patient_ot_delivery_register_list->FloorNurse->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register_list->FloorNurse->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->FloorNurse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Technician->Visible) { // Technician ?>
		<td data-name="Technician" <?php echo $patient_ot_delivery_register_list->Technician->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register_list->Technician->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Technician->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->HouseKeeping->Visible) { // HouseKeeping ?>
		<td data-name="HouseKeeping" <?php echo $patient_ot_delivery_register_list->HouseKeeping->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register_list->HouseKeeping->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->HouseKeeping->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td data-name="countsCheckedMops" <?php echo $patient_ot_delivery_register_list->countsCheckedMops->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register_list->countsCheckedMops->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->gauze->Visible) { // gauze ?>
		<td data-name="gauze" <?php echo $patient_ot_delivery_register_list->gauze->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register_list->gauze->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->gauze->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->needles->Visible) { // needles ?>
		<td data-name="needles" <?php echo $patient_ot_delivery_register_list->needles->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register_list->needles->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->needles->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->bloodloss->Visible) { // bloodloss ?>
		<td data-name="bloodloss" <?php echo $patient_ot_delivery_register_list->bloodloss->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register_list->bloodloss->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->bloodloss->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td data-name="bloodtransfusion" <?php echo $patient_ot_delivery_register_list->bloodtransfusion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register_list->bloodtransfusion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_ot_delivery_register_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register_list->Reception->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_ot_delivery_register_list->PId->Visible) { // PId ?>
		<td data-name="PId" <?php echo $patient_ot_delivery_register_list->PId->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_list->RowCount ?>_patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register_list->PId->viewAttributes() ?>><?php echo $patient_ot_delivery_register_list->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_ot_delivery_register_list->ListOptions->render("body", "right", $patient_ot_delivery_register_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_ot_delivery_register_list->isGridAdd())
		$patient_ot_delivery_register_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_ot_delivery_register->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_ot_delivery_register_list->Recordset)
	$patient_ot_delivery_register_list->Recordset->Close();
?>
<?php if (!$patient_ot_delivery_register_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_ot_delivery_register_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_ot_delivery_register_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_ot_delivery_register_list->TotalRecords == 0 && !$patient_ot_delivery_register->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_ot_delivery_register_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_ot_delivery_register_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_ot_delivery_register_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_ot_delivery_register->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_ot_delivery_register",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_ot_delivery_register_list->terminate();
?>