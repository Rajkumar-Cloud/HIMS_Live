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
$patient_list = new patient_list();

// Run the page
$patient_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_list->isExport()) { ?>
<script>
var fpatientlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatientlist = currentForm = new ew.Form("fpatientlist", "list");
	fpatientlist.formKeyCountName = '<?php echo $patient_list->FormKeyCountName ?>';
	loadjs.done("fpatientlist");
});
var fpatientlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatientlistsrch = currentSearchForm = new ew.Form("fpatientlistsrch");

	// Validate function for search
	fpatientlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatientlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatientlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fpatientlistsrch.filterList = <?php echo $patient_list->getFilterList() ?>;
	loadjs.done("fpatientlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #27B647; /* preview row color */
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
	ew.PREVIEW_OVERLAY = true;
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
<?php if (!$patient_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_list->TotalRecords > 0 && $patient_list->ExportOptions->visible()) { ?>
<?php $patient_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_list->ImportOptions->visible()) { ?>
<?php $patient_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_list->SearchOptions->visible()) { ?>
<?php $patient_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_list->FilterOptions->visible()) { ?>
<?php $patient_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$patient_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_list->isExport() && !$patient->CurrentAction) { ?>
<form name="fpatientlistsrch" id="fpatientlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatientlistsrch-search-panel" class="<?php echo $patient_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient">
	<div class="ew-extended-search">
<?php

// Render search row
$patient->RowType = ROWTYPE_SEARCH;
$patient->resetAttributes();
$patient_list->renderRow();
?>
<?php if ($patient_list->PatientID->Visible) { // PatientID ?>
	<?php
		$patient_list->SearchColumnCount++;
		if (($patient_list->SearchColumnCount - 1) % $patient_list->SearchFieldsPerRow == 0) {
			$patient_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $patient_list->PatientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		<span id="el_patient_PatientID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_list->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_list->PatientID->EditValue ?>"<?php echo $patient_list->PatientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_list->SearchColumnCount % $patient_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->first_name->Visible) { // first_name ?>
	<?php
		$patient_list->SearchColumnCount++;
		if (($patient_list->SearchColumnCount - 1) % $patient_list->SearchFieldsPerRow == 0) {
			$patient_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_first_name" class="ew-cell form-group">
		<label for="x_first_name" class="ew-search-caption ew-label"><?php echo $patient_list->first_name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_first_name" id="z_first_name" value="LIKE">
</span>
		<span id="el_patient_first_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_list->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_list->first_name->EditValue ?>"<?php echo $patient_list->first_name->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_list->SearchColumnCount % $patient_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$patient_list->SearchColumnCount++;
		if (($patient_list->SearchColumnCount - 1) % $patient_list->SearchFieldsPerRow == 0) {
			$patient_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $patient_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $patient_list->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_patient_createddatetime" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_list->createddatetime->EditValue ?>"<?php echo $patient_list->createddatetime->editAttributes() ?>>
<?php if (!$patient_list->createddatetime->ReadOnly && !$patient_list->createddatetime->Disabled && !isset($patient_list->createddatetime->EditAttrs["readonly"]) && !isset($patient_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_patient_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="patient" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($patient_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_list->createddatetime->EditValue2 ?>"<?php echo $patient_list->createddatetime->editAttributes() ?>>
<?php if (!$patient_list->createddatetime->ReadOnly && !$patient_list->createddatetime->Disabled && !isset($patient_list->createddatetime->EditAttrs["readonly"]) && !isset($patient_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($patient_list->SearchColumnCount % $patient_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($patient_list->SearchColumnCount % $patient_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $patient_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_list->showPageHeader(); ?>
<?php
$patient_list->showMessage();
?>
<?php if ($patient_list->TotalRecords > 0 || $patient->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient">
<?php if (!$patient_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatientlist" id="fpatientlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<div id="gmp_patient" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_list->TotalRecords > 0 || $patient_list->isGridEdit()) { ?>
<table id="tbl_patientlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient->RowType = ROWTYPE_HEADER;

// Render list options
$patient_list->renderListOptions();

// Render list options (header, left)
$patient_list->ListOptions->render("header", "left");
?>
<?php if ($patient_list->id->Visible) { // id ?>
	<?php if ($patient_list->SortUrl($patient_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_list->id->headerCellClass() ?>"><div id="elh_patient_id" class="patient_id"><div class="ew-table-header-caption"><?php echo $patient_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->id) ?>', 1);"><div id="elh_patient_id" class="patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->PatientID->Visible) { // PatientID ?>
	<?php if ($patient_list->SortUrl($patient_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $patient_list->PatientID->headerCellClass() ?>"><div id="elh_patient_PatientID" class="patient_PatientID"><div class="ew-table-header-caption"><?php echo $patient_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $patient_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->PatientID) ?>', 1);"><div id="elh_patient_PatientID" class="patient_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->title->Visible) { // title ?>
	<?php if ($patient_list->SortUrl($patient_list->title) == "") { ?>
		<th data-name="title" class="<?php echo $patient_list->title->headerCellClass() ?>"><div id="elh_patient_title" class="patient_title"><div class="ew-table-header-caption"><?php echo $patient_list->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $patient_list->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->title) ?>', 1);"><div id="elh_patient_title" class="patient_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->first_name->Visible) { // first_name ?>
	<?php if ($patient_list->SortUrl($patient_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $patient_list->first_name->headerCellClass() ?>"><div id="elh_patient_first_name" class="patient_first_name"><div class="ew-table-header-caption"><?php echo $patient_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $patient_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->first_name) ?>', 1);"><div id="elh_patient_first_name" class="patient_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->gender->Visible) { // gender ?>
	<?php if ($patient_list->SortUrl($patient_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $patient_list->gender->headerCellClass() ?>"><div id="elh_patient_gender" class="patient_gender"><div class="ew-table-header-caption"><?php echo $patient_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $patient_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->gender) ?>', 1);"><div id="elh_patient_gender" class="patient_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->dob->Visible) { // dob ?>
	<?php if ($patient_list->SortUrl($patient_list->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $patient_list->dob->headerCellClass() ?>"><div id="elh_patient_dob" class="patient_dob"><div class="ew-table-header-caption"><?php echo $patient_list->dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $patient_list->dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->dob) ?>', 1);"><div id="elh_patient_dob" class="patient_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Age->Visible) { // Age ?>
	<?php if ($patient_list->SortUrl($patient_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_list->Age->headerCellClass() ?>"><div id="elh_patient_Age" class="patient_Age"><div class="ew-table-header-caption"><?php echo $patient_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Age) ?>', 1);"><div id="elh_patient_Age" class="patient_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->blood_group->Visible) { // blood_group ?>
	<?php if ($patient_list->SortUrl($patient_list->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $patient_list->blood_group->headerCellClass() ?>"><div id="elh_patient_blood_group" class="patient_blood_group"><div class="ew-table-header-caption"><?php echo $patient_list->blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $patient_list->blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->blood_group) ?>', 1);"><div id="elh_patient_blood_group" class="patient_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->blood_group->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->blood_group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->blood_group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($patient_list->SortUrl($patient_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $patient_list->mobile_no->headerCellClass() ?>"><div id="elh_patient_mobile_no" class="patient_mobile_no"><div class="ew-table-header-caption"><?php echo $patient_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $patient_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->mobile_no) ?>', 1);"><div id="elh_patient_mobile_no" class="patient_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->status->Visible) { // status ?>
	<?php if ($patient_list->SortUrl($patient_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_list->status->headerCellClass() ?>"><div id="elh_patient_status" class="patient_status"><div class="ew-table-header-caption"><?php echo $patient_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->status) ?>', 1);"><div id="elh_patient_status" class="patient_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_list->SortUrl($patient_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_createddatetime" class="patient_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->createddatetime) ?>', 1);"><div id="elh_patient_createddatetime" class="patient_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_list->SortUrl($patient_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient_list->profilePic->headerCellClass() ?>"><div id="elh_patient_profilePic" class="patient_profilePic"><div class="ew-table-header-caption"><?php echo $patient_list->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient_list->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->profilePic) ?>', 1);"><div id="elh_patient_profilePic" class="patient_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($patient_list->SortUrl($patient_list->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $patient_list->IdentificationMark->headerCellClass() ?>"><div id="elh_patient_IdentificationMark" class="patient_IdentificationMark"><div class="ew-table-header-caption"><?php echo $patient_list->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $patient_list->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->IdentificationMark) ?>', 1);"><div id="elh_patient_IdentificationMark" class="patient_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->IdentificationMark->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->IdentificationMark->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Religion->Visible) { // Religion ?>
	<?php if ($patient_list->SortUrl($patient_list->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $patient_list->Religion->headerCellClass() ?>"><div id="elh_patient_Religion" class="patient_Religion"><div class="ew-table-header-caption"><?php echo $patient_list->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $patient_list->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Religion) ?>', 1);"><div id="elh_patient_Religion" class="patient_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Religion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Religion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Nationality->Visible) { // Nationality ?>
	<?php if ($patient_list->SortUrl($patient_list->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $patient_list->Nationality->headerCellClass() ?>"><div id="elh_patient_Nationality" class="patient_Nationality"><div class="ew-table-header-caption"><?php echo $patient_list->Nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $patient_list->Nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Nationality) ?>', 1);"><div id="elh_patient_Nationality" class="patient_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Nationality->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Nationality->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($patient_list->SortUrl($patient_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $patient_list->ReferedByDr->headerCellClass() ?>"><div id="elh_patient_ReferedByDr" class="patient_ReferedByDr"><div class="ew-table-header-caption"><?php echo $patient_list->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $patient_list->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->ReferedByDr) ?>', 1);"><div id="elh_patient_ReferedByDr" class="patient_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->ReferedByDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($patient_list->SortUrl($patient_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $patient_list->ReferClinicname->headerCellClass() ?>"><div id="elh_patient_ReferClinicname" class="patient_ReferClinicname"><div class="ew-table-header-caption"><?php echo $patient_list->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $patient_list->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->ReferClinicname) ?>', 1);"><div id="elh_patient_ReferClinicname" class="patient_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($patient_list->SortUrl($patient_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $patient_list->ReferCity->headerCellClass() ?>"><div id="elh_patient_ReferCity" class="patient_ReferCity"><div class="ew-table-header-caption"><?php echo $patient_list->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $patient_list->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->ReferCity) ?>', 1);"><div id="elh_patient_ReferCity" class="patient_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($patient_list->SortUrl($patient_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $patient_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_patient_ReferMobileNo" class="patient_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $patient_list->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $patient_list->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->ReferMobileNo) ?>', 1);"><div id="elh_patient_ReferMobileNo" class="patient_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($patient_list->SortUrl($patient_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $patient_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $patient_list->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $patient_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($patient_list->SortUrl($patient_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $patient_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_patient_PurposreReferredfor" class="patient_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $patient_list->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $patient_list->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->PurposreReferredfor) ?>', 1);"><div id="elh_patient_PurposreReferredfor" class="patient_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_title->Visible) { // spouse_title ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $patient_list->spouse_title->headerCellClass() ?>"><div id="elh_patient_spouse_title" class="patient_spouse_title"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $patient_list->spouse_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_title) ?>', 1);"><div id="elh_patient_spouse_title" class="patient_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_title->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $patient_list->spouse_first_name->headerCellClass() ?>"><div id="elh_patient_spouse_first_name" class="patient_spouse_first_name"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $patient_list->spouse_first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_first_name) ?>', 1);"><div id="elh_patient_spouse_first_name" class="patient_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_middle_name) == "") { ?>
		<th data-name="spouse_middle_name" class="<?php echo $patient_list->spouse_middle_name->headerCellClass() ?>"><div id="elh_patient_spouse_middle_name" class="patient_spouse_middle_name"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_middle_name" class="<?php echo $patient_list->spouse_middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_middle_name) ?>', 1);"><div id="elh_patient_spouse_middle_name" class="patient_spouse_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_middle_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_middle_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_last_name->Visible) { // spouse_last_name ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_last_name) == "") { ?>
		<th data-name="spouse_last_name" class="<?php echo $patient_list->spouse_last_name->headerCellClass() ?>"><div id="elh_patient_spouse_last_name" class="patient_spouse_last_name"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_last_name" class="<?php echo $patient_list->spouse_last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_last_name) ?>', 1);"><div id="elh_patient_spouse_last_name" class="patient_spouse_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_last_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_last_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $patient_list->spouse_gender->headerCellClass() ?>"><div id="elh_patient_spouse_gender" class="patient_spouse_gender"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $patient_list->spouse_gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_gender) ?>', 1);"><div id="elh_patient_spouse_gender" class="patient_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_dob->Visible) { // spouse_dob ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_dob) == "") { ?>
		<th data-name="spouse_dob" class="<?php echo $patient_list->spouse_dob->headerCellClass() ?>"><div id="elh_patient_spouse_dob" class="patient_spouse_dob"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_dob" class="<?php echo $patient_list->spouse_dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_dob) ?>', 1);"><div id="elh_patient_spouse_dob" class="patient_spouse_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_Age->Visible) { // spouse_Age ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_Age) == "") { ?>
		<th data-name="spouse_Age" class="<?php echo $patient_list->spouse_Age->headerCellClass() ?>"><div id="elh_patient_spouse_Age" class="patient_spouse_Age"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_Age" class="<?php echo $patient_list->spouse_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_Age) ?>', 1);"><div id="elh_patient_spouse_Age" class="patient_spouse_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_blood_group) == "") { ?>
		<th data-name="spouse_blood_group" class="<?php echo $patient_list->spouse_blood_group->headerCellClass() ?>"><div id="elh_patient_spouse_blood_group" class="patient_spouse_blood_group"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_blood_group" class="<?php echo $patient_list->spouse_blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_blood_group) ?>', 1);"><div id="elh_patient_spouse_blood_group" class="patient_spouse_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_blood_group->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_blood_group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_blood_group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $patient_list->spouse_mobile_no->headerCellClass() ?>"><div id="elh_patient_spouse_mobile_no" class="patient_spouse_mobile_no"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $patient_list->spouse_mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_mobile_no) ?>', 1);"><div id="elh_patient_spouse_mobile_no" class="patient_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Maritalstatus->Visible) { // Maritalstatus ?>
	<?php if ($patient_list->SortUrl($patient_list->Maritalstatus) == "") { ?>
		<th data-name="Maritalstatus" class="<?php echo $patient_list->Maritalstatus->headerCellClass() ?>"><div id="elh_patient_Maritalstatus" class="patient_Maritalstatus"><div class="ew-table-header-caption"><?php echo $patient_list->Maritalstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maritalstatus" class="<?php echo $patient_list->Maritalstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Maritalstatus) ?>', 1);"><div id="elh_patient_Maritalstatus" class="patient_Maritalstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Maritalstatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Maritalstatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Maritalstatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Business->Visible) { // Business ?>
	<?php if ($patient_list->SortUrl($patient_list->Business) == "") { ?>
		<th data-name="Business" class="<?php echo $patient_list->Business->headerCellClass() ?>"><div id="elh_patient_Business" class="patient_Business"><div class="ew-table-header-caption"><?php echo $patient_list->Business->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Business" class="<?php echo $patient_list->Business->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Business) ?>', 1);"><div id="elh_patient_Business" class="patient_Business">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Business->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Business->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Business->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($patient_list->SortUrl($patient_list->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $patient_list->Patient_Language->headerCellClass() ?>"><div id="elh_patient_Patient_Language" class="patient_Patient_Language"><div class="ew-table-header-caption"><?php echo $patient_list->Patient_Language->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $patient_list->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Patient_Language) ?>', 1);"><div id="elh_patient_Patient_Language" class="patient_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Patient_Language->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Patient_Language->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Patient_Language->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Passport->Visible) { // Passport ?>
	<?php if ($patient_list->SortUrl($patient_list->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $patient_list->Passport->headerCellClass() ?>"><div id="elh_patient_Passport" class="patient_Passport"><div class="ew-table-header-caption"><?php echo $patient_list->Passport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $patient_list->Passport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Passport) ?>', 1);"><div id="elh_patient_Passport" class="patient_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Passport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Passport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->VisaNo->Visible) { // VisaNo ?>
	<?php if ($patient_list->SortUrl($patient_list->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $patient_list->VisaNo->headerCellClass() ?>"><div id="elh_patient_VisaNo" class="patient_VisaNo"><div class="ew-table-header-caption"><?php echo $patient_list->VisaNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $patient_list->VisaNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->VisaNo) ?>', 1);"><div id="elh_patient_VisaNo" class="patient_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->VisaNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->VisaNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<?php if ($patient_list->SortUrl($patient_list->ValidityOfVisa) == "") { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $patient_list->ValidityOfVisa->headerCellClass() ?>"><div id="elh_patient_ValidityOfVisa" class="patient_ValidityOfVisa"><div class="ew-table-header-caption"><?php echo $patient_list->ValidityOfVisa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $patient_list->ValidityOfVisa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->ValidityOfVisa) ?>', 1);"><div id="elh_patient_ValidityOfVisa" class="patient_ValidityOfVisa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->ValidityOfVisa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->ValidityOfVisa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->ValidityOfVisa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($patient_list->SortUrl($patient_list->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $patient_list->WhereDidYouHear->headerCellClass() ?>"><div id="elh_patient_WhereDidYouHear" class="patient_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $patient_list->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $patient_list->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->WhereDidYouHear) ?>', 1);"><div id="elh_patient_WhereDidYouHear" class="patient_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->WhereDidYouHear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->WhereDidYouHear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_list->SortUrl($patient_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_list->HospID->headerCellClass() ?>"><div id="elh_patient_HospID" class="patient_HospID"><div class="ew-table-header-caption"><?php echo $patient_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->HospID) ?>', 1);"><div id="elh_patient_HospID" class="patient_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->street->Visible) { // street ?>
	<?php if ($patient_list->SortUrl($patient_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $patient_list->street->headerCellClass() ?>"><div id="elh_patient_street" class="patient_street"><div class="ew-table-header-caption"><?php echo $patient_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $patient_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->street) ?>', 1);"><div id="elh_patient_street" class="patient_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->town->Visible) { // town ?>
	<?php if ($patient_list->SortUrl($patient_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $patient_list->town->headerCellClass() ?>"><div id="elh_patient_town" class="patient_town"><div class="ew-table-header-caption"><?php echo $patient_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $patient_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->town) ?>', 1);"><div id="elh_patient_town" class="patient_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->province->Visible) { // province ?>
	<?php if ($patient_list->SortUrl($patient_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $patient_list->province->headerCellClass() ?>"><div id="elh_patient_province" class="patient_province"><div class="ew-table-header-caption"><?php echo $patient_list->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $patient_list->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->province) ?>', 1);"><div id="elh_patient_province" class="patient_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->country->Visible) { // country ?>
	<?php if ($patient_list->SortUrl($patient_list->country) == "") { ?>
		<th data-name="country" class="<?php echo $patient_list->country->headerCellClass() ?>"><div id="elh_patient_country" class="patient_country"><div class="ew-table-header-caption"><?php echo $patient_list->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $patient_list->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->country) ?>', 1);"><div id="elh_patient_country" class="patient_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->country->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->country->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->postal_code->Visible) { // postal_code ?>
	<?php if ($patient_list->SortUrl($patient_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $patient_list->postal_code->headerCellClass() ?>"><div id="elh_patient_postal_code" class="patient_postal_code"><div class="ew-table-header-caption"><?php echo $patient_list->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $patient_list->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->postal_code) ?>', 1);"><div id="elh_patient_postal_code" class="patient_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->PEmail->Visible) { // PEmail ?>
	<?php if ($patient_list->SortUrl($patient_list->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $patient_list->PEmail->headerCellClass() ?>"><div id="elh_patient_PEmail" class="patient_PEmail"><div class="ew-table-header-caption"><?php echo $patient_list->PEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $patient_list->PEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->PEmail) ?>', 1);"><div id="elh_patient_PEmail" class="patient_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->PEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->PEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($patient_list->SortUrl($patient_list->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $patient_list->PEmergencyContact->headerCellClass() ?>"><div id="elh_patient_PEmergencyContact" class="patient_PEmergencyContact"><div class="ew-table-header-caption"><?php echo $patient_list->PEmergencyContact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $patient_list->PEmergencyContact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->PEmergencyContact) ?>', 1);"><div id="elh_patient_PEmergencyContact" class="patient_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->PEmergencyContact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->PEmergencyContact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->occupation->Visible) { // occupation ?>
	<?php if ($patient_list->SortUrl($patient_list->occupation) == "") { ?>
		<th data-name="occupation" class="<?php echo $patient_list->occupation->headerCellClass() ?>"><div id="elh_patient_occupation" class="patient_occupation"><div class="ew-table-header-caption"><?php echo $patient_list->occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="occupation" class="<?php echo $patient_list->occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->occupation) ?>', 1);"><div id="elh_patient_occupation" class="patient_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->occupation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->occupation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->spouse_occupation->Visible) { // spouse_occupation ?>
	<?php if ($patient_list->SortUrl($patient_list->spouse_occupation) == "") { ?>
		<th data-name="spouse_occupation" class="<?php echo $patient_list->spouse_occupation->headerCellClass() ?>"><div id="elh_patient_spouse_occupation" class="patient_spouse_occupation"><div class="ew-table-header-caption"><?php echo $patient_list->spouse_occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_occupation" class="<?php echo $patient_list->spouse_occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->spouse_occupation) ?>', 1);"><div id="elh_patient_spouse_occupation" class="patient_spouse_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->spouse_occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->spouse_occupation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->spouse_occupation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->WhatsApp->Visible) { // WhatsApp ?>
	<?php if ($patient_list->SortUrl($patient_list->WhatsApp) == "") { ?>
		<th data-name="WhatsApp" class="<?php echo $patient_list->WhatsApp->headerCellClass() ?>"><div id="elh_patient_WhatsApp" class="patient_WhatsApp"><div class="ew-table-header-caption"><?php echo $patient_list->WhatsApp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhatsApp" class="<?php echo $patient_list->WhatsApp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->WhatsApp) ?>', 1);"><div id="elh_patient_WhatsApp" class="patient_WhatsApp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->WhatsApp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->WhatsApp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->WhatsApp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->CouppleID->Visible) { // CouppleID ?>
	<?php if ($patient_list->SortUrl($patient_list->CouppleID) == "") { ?>
		<th data-name="CouppleID" class="<?php echo $patient_list->CouppleID->headerCellClass() ?>"><div id="elh_patient_CouppleID" class="patient_CouppleID"><div class="ew-table-header-caption"><?php echo $patient_list->CouppleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CouppleID" class="<?php echo $patient_list->CouppleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->CouppleID) ?>', 1);"><div id="elh_patient_CouppleID" class="patient_CouppleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->CouppleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->CouppleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->CouppleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->MaleID->Visible) { // MaleID ?>
	<?php if ($patient_list->SortUrl($patient_list->MaleID) == "") { ?>
		<th data-name="MaleID" class="<?php echo $patient_list->MaleID->headerCellClass() ?>"><div id="elh_patient_MaleID" class="patient_MaleID"><div class="ew-table-header-caption"><?php echo $patient_list->MaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleID" class="<?php echo $patient_list->MaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->MaleID) ?>', 1);"><div id="elh_patient_MaleID" class="patient_MaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->MaleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->MaleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->MaleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->FemaleID->Visible) { // FemaleID ?>
	<?php if ($patient_list->SortUrl($patient_list->FemaleID) == "") { ?>
		<th data-name="FemaleID" class="<?php echo $patient_list->FemaleID->headerCellClass() ?>"><div id="elh_patient_FemaleID" class="patient_FemaleID"><div class="ew-table-header-caption"><?php echo $patient_list->FemaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleID" class="<?php echo $patient_list->FemaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->FemaleID) ?>', 1);"><div id="elh_patient_FemaleID" class="patient_FemaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->FemaleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->FemaleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->FemaleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->GroupID->Visible) { // GroupID ?>
	<?php if ($patient_list->SortUrl($patient_list->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $patient_list->GroupID->headerCellClass() ?>"><div id="elh_patient_GroupID" class="patient_GroupID"><div class="ew-table-header-caption"><?php echo $patient_list->GroupID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $patient_list->GroupID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->GroupID) ?>', 1);"><div id="elh_patient_GroupID" class="patient_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->GroupID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->GroupID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->GroupID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->Relationship->Visible) { // Relationship ?>
	<?php if ($patient_list->SortUrl($patient_list->Relationship) == "") { ?>
		<th data-name="Relationship" class="<?php echo $patient_list->Relationship->headerCellClass() ?>"><div id="elh_patient_Relationship" class="patient_Relationship"><div class="ew-table-header-caption"><?php echo $patient_list->Relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Relationship" class="<?php echo $patient_list->Relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->Relationship) ?>', 1);"><div id="elh_patient_Relationship" class="patient_Relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->Relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->Relationship->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->Relationship->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_list->FacebookID->Visible) { // FacebookID ?>
	<?php if ($patient_list->SortUrl($patient_list->FacebookID) == "") { ?>
		<th data-name="FacebookID" class="<?php echo $patient_list->FacebookID->headerCellClass() ?>"><div id="elh_patient_FacebookID" class="patient_FacebookID"><div class="ew-table-header-caption"><?php echo $patient_list->FacebookID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FacebookID" class="<?php echo $patient_list->FacebookID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_list->SortUrl($patient_list->FacebookID) ?>', 1);"><div id="elh_patient_FacebookID" class="patient_FacebookID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_list->FacebookID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_list->FacebookID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_list->FacebookID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_list->ExportAll && $patient_list->isExport()) {
	$patient_list->StopRecord = $patient_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_list->TotalRecords > $patient_list->StartRecord + $patient_list->DisplayRecords - 1)
		$patient_list->StopRecord = $patient_list->StartRecord + $patient_list->DisplayRecords - 1;
	else
		$patient_list->StopRecord = $patient_list->TotalRecords;
}
$patient_list->RecordCount = $patient_list->StartRecord - 1;
if ($patient_list->Recordset && !$patient_list->Recordset->EOF) {
	$patient_list->Recordset->moveFirst();
	$selectLimit = $patient_list->UseSelectLimit;
	if (!$selectLimit && $patient_list->StartRecord > 1)
		$patient_list->Recordset->move($patient_list->StartRecord - 1);
} elseif (!$patient->AllowAddDeleteRow && $patient_list->StopRecord == 0) {
	$patient_list->StopRecord = $patient->GridAddRowCount;
}

// Initialize aggregate
$patient->RowType = ROWTYPE_AGGREGATEINIT;
$patient->resetAttributes();
$patient_list->renderRow();
while ($patient_list->RecordCount < $patient_list->StopRecord) {
	$patient_list->RecordCount++;
	if ($patient_list->RecordCount >= $patient_list->StartRecord) {
		$patient_list->RowCount++;

		// Set up key count
		$patient_list->KeyCount = $patient_list->RowIndex;

		// Init row class and style
		$patient->resetAttributes();
		$patient->CssClass = "";
		if ($patient_list->isGridAdd()) {
		} else {
			$patient_list->loadRowValues($patient_list->Recordset); // Load row values
		}
		$patient->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient->RowAttrs->merge(["data-rowindex" => $patient_list->RowCount, "id" => "r" . $patient_list->RowCount . "_patient", "data-rowtype" => $patient->RowType]);

		// Render row
		$patient_list->renderRow();

		// Render list options
		$patient_list->renderListOptions();
?>
	<tr <?php echo $patient->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_list->ListOptions->render("body", "left", $patient_list->RowCount);
?>
	<?php if ($patient_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_id">
<span<?php echo $patient_list->id->viewAttributes() ?>><?php echo $patient_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $patient_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_PatientID">
<span<?php echo $patient_list->PatientID->viewAttributes() ?>><?php echo $patient_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->title->Visible) { // title ?>
		<td data-name="title" <?php echo $patient_list->title->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_title">
<span<?php echo $patient_list->title->viewAttributes() ?>><?php echo $patient_list->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $patient_list->first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_first_name">
<span<?php echo $patient_list->first_name->viewAttributes() ?>><?php echo $patient_list->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $patient_list->gender->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_gender">
<span<?php echo $patient_list->gender->viewAttributes() ?>><?php echo $patient_list->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->dob->Visible) { // dob ?>
		<td data-name="dob" <?php echo $patient_list->dob->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_dob">
<span<?php echo $patient_list->dob->viewAttributes() ?>><?php echo $patient_list->dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_list->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Age">
<span<?php echo $patient_list->Age->viewAttributes() ?>><?php echo $patient_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group" <?php echo $patient_list->blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_blood_group">
<span<?php echo $patient_list->blood_group->viewAttributes() ?>><?php echo $patient_list->blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $patient_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_mobile_no">
<span<?php echo $patient_list->mobile_no->viewAttributes() ?>><?php echo $patient_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_status">
<span<?php echo $patient_list->status->viewAttributes() ?>><?php echo $patient_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_createddatetime">
<span<?php echo $patient_list->createddatetime->viewAttributes() ?>><?php echo $patient_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $patient_list->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_profilePic">
<span><?php echo GetFileViewTag($patient_list->profilePic, $patient_list->profilePic->getViewValue(), FALSE) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark" <?php echo $patient_list->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_IdentificationMark">
<span<?php echo $patient_list->IdentificationMark->viewAttributes() ?>><?php echo $patient_list->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Religion->Visible) { // Religion ?>
		<td data-name="Religion" <?php echo $patient_list->Religion->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Religion">
<span<?php echo $patient_list->Religion->viewAttributes() ?>><?php echo $patient_list->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality" <?php echo $patient_list->Nationality->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Nationality">
<span<?php echo $patient_list->Nationality->viewAttributes() ?>><?php echo $patient_list->Nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $patient_list->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_ReferedByDr">
<span<?php echo $patient_list->ReferedByDr->viewAttributes() ?>><?php echo $patient_list->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $patient_list->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_ReferClinicname">
<span<?php echo $patient_list->ReferClinicname->viewAttributes() ?>><?php echo $patient_list->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $patient_list->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_ReferCity">
<span<?php echo $patient_list->ReferCity->viewAttributes() ?>><?php echo $patient_list->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $patient_list->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_ReferMobileNo">
<span<?php echo $patient_list->ReferMobileNo->viewAttributes() ?>><?php echo $patient_list->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $patient_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_ReferA4TreatingConsultant">
<span<?php echo $patient_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $patient_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $patient_list->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_PurposreReferredfor">
<span<?php echo $patient_list->PurposreReferredfor->viewAttributes() ?>><?php echo $patient_list->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title" <?php echo $patient_list->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_title">
<span<?php echo $patient_list->spouse_title->viewAttributes() ?>><?php echo $patient_list->spouse_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name" <?php echo $patient_list->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_first_name">
<span<?php echo $patient_list->spouse_first_name->viewAttributes() ?>><?php echo $patient_list->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td data-name="spouse_middle_name" <?php echo $patient_list->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_middle_name">
<span<?php echo $patient_list->spouse_middle_name->viewAttributes() ?>><?php echo $patient_list->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_last_name->Visible) { // spouse_last_name ?>
		<td data-name="spouse_last_name" <?php echo $patient_list->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_last_name">
<span<?php echo $patient_list->spouse_last_name->viewAttributes() ?>><?php echo $patient_list->spouse_last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender" <?php echo $patient_list->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_gender">
<span<?php echo $patient_list->spouse_gender->viewAttributes() ?>><?php echo $patient_list->spouse_gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_dob->Visible) { // spouse_dob ?>
		<td data-name="spouse_dob" <?php echo $patient_list->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_dob">
<span<?php echo $patient_list->spouse_dob->viewAttributes() ?>><?php echo $patient_list->spouse_dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_Age->Visible) { // spouse_Age ?>
		<td data-name="spouse_Age" <?php echo $patient_list->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_Age">
<span<?php echo $patient_list->spouse_Age->viewAttributes() ?>><?php echo $patient_list->spouse_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td data-name="spouse_blood_group" <?php echo $patient_list->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_blood_group">
<span<?php echo $patient_list->spouse_blood_group->viewAttributes() ?>><?php echo $patient_list->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no" <?php echo $patient_list->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_mobile_no">
<span<?php echo $patient_list->spouse_mobile_no->viewAttributes() ?>><?php echo $patient_list->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Maritalstatus->Visible) { // Maritalstatus ?>
		<td data-name="Maritalstatus" <?php echo $patient_list->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Maritalstatus">
<span<?php echo $patient_list->Maritalstatus->viewAttributes() ?>><?php echo $patient_list->Maritalstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Business->Visible) { // Business ?>
		<td data-name="Business" <?php echo $patient_list->Business->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Business">
<span<?php echo $patient_list->Business->viewAttributes() ?>><?php echo $patient_list->Business->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language" <?php echo $patient_list->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Patient_Language">
<span<?php echo $patient_list->Patient_Language->viewAttributes() ?>><?php echo $patient_list->Patient_Language->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Passport->Visible) { // Passport ?>
		<td data-name="Passport" <?php echo $patient_list->Passport->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Passport">
<span<?php echo $patient_list->Passport->viewAttributes() ?>><?php echo $patient_list->Passport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo" <?php echo $patient_list->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_VisaNo">
<span<?php echo $patient_list->VisaNo->viewAttributes() ?>><?php echo $patient_list->VisaNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td data-name="ValidityOfVisa" <?php echo $patient_list->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_ValidityOfVisa">
<span<?php echo $patient_list->ValidityOfVisa->viewAttributes() ?>><?php echo $patient_list->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear" <?php echo $patient_list->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_WhereDidYouHear">
<span<?php echo $patient_list->WhereDidYouHear->viewAttributes() ?>><?php echo $patient_list->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_HospID">
<span<?php echo $patient_list->HospID->viewAttributes() ?>><?php echo $patient_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $patient_list->street->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_street">
<span<?php echo $patient_list->street->viewAttributes() ?>><?php echo $patient_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $patient_list->town->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_town">
<span<?php echo $patient_list->town->viewAttributes() ?>><?php echo $patient_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $patient_list->province->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_province">
<span<?php echo $patient_list->province->viewAttributes() ?>><?php echo $patient_list->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->country->Visible) { // country ?>
		<td data-name="country" <?php echo $patient_list->country->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_country">
<span<?php echo $patient_list->country->viewAttributes() ?>><?php echo $patient_list->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $patient_list->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_postal_code">
<span<?php echo $patient_list->postal_code->viewAttributes() ?>><?php echo $patient_list->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail" <?php echo $patient_list->PEmail->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_PEmail">
<span<?php echo $patient_list->PEmail->viewAttributes() ?>><?php echo $patient_list->PEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact" <?php echo $patient_list->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_PEmergencyContact">
<span<?php echo $patient_list->PEmergencyContact->viewAttributes() ?>><?php echo $patient_list->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->occupation->Visible) { // occupation ?>
		<td data-name="occupation" <?php echo $patient_list->occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_occupation">
<span<?php echo $patient_list->occupation->viewAttributes() ?>><?php echo $patient_list->occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->spouse_occupation->Visible) { // spouse_occupation ?>
		<td data-name="spouse_occupation" <?php echo $patient_list->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_spouse_occupation">
<span<?php echo $patient_list->spouse_occupation->viewAttributes() ?>><?php echo $patient_list->spouse_occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->WhatsApp->Visible) { // WhatsApp ?>
		<td data-name="WhatsApp" <?php echo $patient_list->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_WhatsApp">
<span<?php echo $patient_list->WhatsApp->viewAttributes() ?>><?php echo $patient_list->WhatsApp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->CouppleID->Visible) { // CouppleID ?>
		<td data-name="CouppleID" <?php echo $patient_list->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_CouppleID">
<span<?php echo $patient_list->CouppleID->viewAttributes() ?>><?php echo $patient_list->CouppleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->MaleID->Visible) { // MaleID ?>
		<td data-name="MaleID" <?php echo $patient_list->MaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_MaleID">
<span<?php echo $patient_list->MaleID->viewAttributes() ?>><?php echo $patient_list->MaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->FemaleID->Visible) { // FemaleID ?>
		<td data-name="FemaleID" <?php echo $patient_list->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_FemaleID">
<span<?php echo $patient_list->FemaleID->viewAttributes() ?>><?php echo $patient_list->FemaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID" <?php echo $patient_list->GroupID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_GroupID">
<span<?php echo $patient_list->GroupID->viewAttributes() ?>><?php echo $patient_list->GroupID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->Relationship->Visible) { // Relationship ?>
		<td data-name="Relationship" <?php echo $patient_list->Relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_Relationship">
<span<?php echo $patient_list->Relationship->viewAttributes() ?>><?php echo $patient_list->Relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_list->FacebookID->Visible) { // FacebookID ?>
		<td data-name="FacebookID" <?php echo $patient_list->FacebookID->cellAttributes() ?>>
<span id="el<?php echo $patient_list->RowCount ?>_patient_FacebookID">
<span<?php echo $patient_list->FacebookID->viewAttributes() ?>><?php echo $patient_list->FacebookID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_list->ListOptions->render("body", "right", $patient_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_list->isGridAdd())
		$patient_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_list->Recordset)
	$patient_list->Recordset->Close();
?>
<?php if (!$patient_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_list->TotalRecords == 0 && !$patient->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_list->terminate();
?>