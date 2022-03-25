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
$patient_opd_follow_up_list = new patient_opd_follow_up_list();

// Run the page
$patient_opd_follow_up_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_opd_follow_up_list->isExport()) { ?>
<script>
var fpatient_opd_follow_uplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_opd_follow_uplist = currentForm = new ew.Form("fpatient_opd_follow_uplist", "list");
	fpatient_opd_follow_uplist.formKeyCountName = '<?php echo $patient_opd_follow_up_list->FormKeyCountName ?>';
	loadjs.done("fpatient_opd_follow_uplist");
});
var fpatient_opd_follow_uplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_opd_follow_uplistsrch = currentSearchForm = new ew.Form("fpatient_opd_follow_uplistsrch");

	// Validate function for search
	fpatient_opd_follow_uplistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_opd_follow_uplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_opd_follow_uplistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fpatient_opd_follow_uplistsrch.filterList = <?php echo $patient_opd_follow_up_list->getFilterList() ?>;
	loadjs.done("fpatient_opd_follow_uplistsrch");
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
<?php if (!$patient_opd_follow_up_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_opd_follow_up_list->TotalRecords > 0 && $patient_opd_follow_up_list->ExportOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->ImportOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->SearchOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->FilterOptions->visible()) { ?>
<?php $patient_opd_follow_up_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$patient_opd_follow_up_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_opd_follow_up_list->isExport() && !$patient_opd_follow_up->CurrentAction) { ?>
<form name="fpatient_opd_follow_uplistsrch" id="fpatient_opd_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_opd_follow_uplistsrch-search-panel" class="<?php echo $patient_opd_follow_up_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_opd_follow_up">
	<div class="ew-extended-search">
<?php

// Render search row
$patient_opd_follow_up->RowType = ROWTYPE_SEARCH;
$patient_opd_follow_up->resetAttributes();
$patient_opd_follow_up_list->renderRow();
?>
<?php if ($patient_opd_follow_up_list->PatID->Visible) { // PatID ?>
	<?php
		$patient_opd_follow_up_list->SearchColumnCount++;
		if (($patient_opd_follow_up_list->SearchColumnCount - 1) % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) {
			$patient_opd_follow_up_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_opd_follow_up_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatID" class="ew-cell form-group">
		<label for="x_PatID" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up_list->PatID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
		<span id="el_patient_opd_follow_up_PatID" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_list->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_list->PatID->EditValue ?>"<?php echo $patient_opd_follow_up_list->PatID->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_opd_follow_up_list->SearchColumnCount % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->PatientName->Visible) { // PatientName ?>
	<?php
		$patient_opd_follow_up_list->SearchColumnCount++;
		if (($patient_opd_follow_up_list->SearchColumnCount - 1) % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) {
			$patient_opd_follow_up_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_opd_follow_up_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_patient_opd_follow_up_PatientName" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_list->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_opd_follow_up_list->SearchColumnCount % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$patient_opd_follow_up_list->SearchColumnCount++;
		if (($patient_opd_follow_up_list->SearchColumnCount - 1) % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) {
			$patient_opd_follow_up_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_opd_follow_up_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up_list->MobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		<span id="el_patient_opd_follow_up_MobileNumber" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_list->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_list->MobileNumber->EditValue ?>"<?php echo $patient_opd_follow_up_list->MobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_opd_follow_up_list->SearchColumnCount % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$patient_opd_follow_up_list->SearchColumnCount++;
		if (($patient_opd_follow_up_list->SearchColumnCount - 1) % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) {
			$patient_opd_follow_up_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_opd_follow_up_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $patient_opd_follow_up_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		<span id="el_patient_opd_follow_up_createddatetime" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_list->createddatetime->EditValue ?>"<?php echo $patient_opd_follow_up_list->createddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_list->createddatetime->ReadOnly && !$patient_opd_follow_up_list->createddatetime->Disabled && !isset($patient_opd_follow_up_list->createddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_uplistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_uplistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($patient_opd_follow_up_list->SearchColumnCount % $patient_opd_follow_up_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($patient_opd_follow_up_list->SearchColumnCount % $patient_opd_follow_up_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $patient_opd_follow_up_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_opd_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_opd_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_opd_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_opd_follow_up_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_opd_follow_up_list->showPageHeader(); ?>
<?php
$patient_opd_follow_up_list->showMessage();
?>
<?php if ($patient_opd_follow_up_list->TotalRecords > 0 || $patient_opd_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_opd_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_opd_follow_up">
<?php if (!$patient_opd_follow_up_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_opd_follow_up_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_opd_follow_up_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_opd_follow_uplist" id="fpatient_opd_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<div id="gmp_patient_opd_follow_up" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_opd_follow_up_list->TotalRecords > 0 || $patient_opd_follow_up_list->isGridEdit()) { ?>
<table id="tbl_patient_opd_follow_uplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_opd_follow_up->RowType = ROWTYPE_HEADER;

// Render list options
$patient_opd_follow_up_list->renderListOptions();

// Render list options (header, left)
$patient_opd_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($patient_opd_follow_up_list->id->Visible) { // id ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_opd_follow_up_list->id->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_opd_follow_up_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->id) ?>', 1);"><div id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_opd_follow_up_list->PatID->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_opd_follow_up_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->PatID) ?>', 1);"><div id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_opd_follow_up_list->PatientName->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_opd_follow_up_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->PatientName) ?>', 1);"><div id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_opd_follow_up_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_opd_follow_up_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->MobileNumber) ?>', 1);"><div id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_opd_follow_up_list->Gender->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_opd_follow_up_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->Gender) ?>', 1);"><div id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_opd_follow_up_list->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_opd_follow_up_list->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->NextReviewDate) ?>', 1);"><div id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->NextReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->NextReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $patient_opd_follow_up_list->ICSIAdvised->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $patient_opd_follow_up_list->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->ICSIAdvised) ?>', 1);"><div id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->ICSIAdvised->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->ICSIAdvised->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->ICSIAdvised->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->DeliveryRegistered) == "") { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $patient_opd_follow_up_list->DeliveryRegistered->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->DeliveryRegistered->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $patient_opd_follow_up_list->DeliveryRegistered->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->DeliveryRegistered) ?>', 1);"><div id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->DeliveryRegistered->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->DeliveryRegistered->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->DeliveryRegistered->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->EDD->Visible) { // EDD ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->EDD) == "") { ?>
		<th data-name="EDD" class="<?php echo $patient_opd_follow_up_list->EDD->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->EDD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD" class="<?php echo $patient_opd_follow_up_list->EDD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->EDD) ?>', 1);"><div id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->EDD->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->EDD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->EDD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->SerologyPositive->Visible) { // SerologyPositive ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->SerologyPositive) == "") { ?>
		<th data-name="SerologyPositive" class="<?php echo $patient_opd_follow_up_list->SerologyPositive->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->SerologyPositive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerologyPositive" class="<?php echo $patient_opd_follow_up_list->SerologyPositive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->SerologyPositive) ?>', 1);"><div id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->SerologyPositive->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->SerologyPositive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->SerologyPositive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->Allergy->Visible) { // Allergy ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->Allergy) == "") { ?>
		<th data-name="Allergy" class="<?php echo $patient_opd_follow_up_list->Allergy->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->Allergy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Allergy" class="<?php echo $patient_opd_follow_up_list->Allergy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->Allergy) ?>', 1);"><div id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->Allergy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->Allergy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->Allergy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->status->Visible) { // status ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_opd_follow_up_list->status->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_opd_follow_up_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->status) ?>', 1);"><div id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->createdby->Visible) { // createdby ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_opd_follow_up_list->createdby->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_opd_follow_up_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->createdby) ?>', 1);"><div id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_opd_follow_up_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_opd_follow_up_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->createddatetime) ?>', 1);"><div id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_opd_follow_up_list->modifiedby->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_opd_follow_up_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->modifiedby) ?>', 1);"><div id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_opd_follow_up_list->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_opd_follow_up_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->modifieddatetime) ?>', 1);"><div id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->LMP->Visible) { // LMP ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_opd_follow_up_list->LMP->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_opd_follow_up_list->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->LMP) ?>', 1);"><div id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->LMP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->LMP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->ProcedureDateTime) == "") { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $patient_opd_follow_up_list->ProcedureDateTime->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->ProcedureDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $patient_opd_follow_up_list->ProcedureDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->ProcedureDateTime) ?>', 1);"><div id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->ProcedureDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->ProcedureDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->ProcedureDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $patient_opd_follow_up_list->ICSIDate->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $patient_opd_follow_up_list->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->ICSIDate) ?>', 1);"><div id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->ICSIDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->ICSIDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_opd_follow_up_list->HospID->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_opd_follow_up_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->HospID) ?>', 1);"><div id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->createdUserName->Visible) { // createdUserName ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $patient_opd_follow_up_list->createdUserName->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $patient_opd_follow_up_list->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->createdUserName) ?>', 1);"><div id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->createdUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->createdUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_opd_follow_up_list->reportheader->Visible) { // reportheader ?>
	<?php if ($patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->reportheader) == "") { ?>
		<th data-name="reportheader" class="<?php echo $patient_opd_follow_up_list->reportheader->headerCellClass() ?>"><div id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader"><div class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->reportheader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reportheader" class="<?php echo $patient_opd_follow_up_list->reportheader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_opd_follow_up_list->SortUrl($patient_opd_follow_up_list->reportheader) ?>', 1);"><div id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_opd_follow_up_list->reportheader->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_opd_follow_up_list->reportheader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_opd_follow_up_list->reportheader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_opd_follow_up_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_opd_follow_up_list->ExportAll && $patient_opd_follow_up_list->isExport()) {
	$patient_opd_follow_up_list->StopRecord = $patient_opd_follow_up_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_opd_follow_up_list->TotalRecords > $patient_opd_follow_up_list->StartRecord + $patient_opd_follow_up_list->DisplayRecords - 1)
		$patient_opd_follow_up_list->StopRecord = $patient_opd_follow_up_list->StartRecord + $patient_opd_follow_up_list->DisplayRecords - 1;
	else
		$patient_opd_follow_up_list->StopRecord = $patient_opd_follow_up_list->TotalRecords;
}
$patient_opd_follow_up_list->RecordCount = $patient_opd_follow_up_list->StartRecord - 1;
if ($patient_opd_follow_up_list->Recordset && !$patient_opd_follow_up_list->Recordset->EOF) {
	$patient_opd_follow_up_list->Recordset->moveFirst();
	$selectLimit = $patient_opd_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $patient_opd_follow_up_list->StartRecord > 1)
		$patient_opd_follow_up_list->Recordset->move($patient_opd_follow_up_list->StartRecord - 1);
} elseif (!$patient_opd_follow_up->AllowAddDeleteRow && $patient_opd_follow_up_list->StopRecord == 0) {
	$patient_opd_follow_up_list->StopRecord = $patient_opd_follow_up->GridAddRowCount;
}

// Initialize aggregate
$patient_opd_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$patient_opd_follow_up->resetAttributes();
$patient_opd_follow_up_list->renderRow();
while ($patient_opd_follow_up_list->RecordCount < $patient_opd_follow_up_list->StopRecord) {
	$patient_opd_follow_up_list->RecordCount++;
	if ($patient_opd_follow_up_list->RecordCount >= $patient_opd_follow_up_list->StartRecord) {
		$patient_opd_follow_up_list->RowCount++;

		// Set up key count
		$patient_opd_follow_up_list->KeyCount = $patient_opd_follow_up_list->RowIndex;

		// Init row class and style
		$patient_opd_follow_up->resetAttributes();
		$patient_opd_follow_up->CssClass = "";
		if ($patient_opd_follow_up_list->isGridAdd()) {
		} else {
			$patient_opd_follow_up_list->loadRowValues($patient_opd_follow_up_list->Recordset); // Load row values
		}
		$patient_opd_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_opd_follow_up->RowAttrs->merge(["data-rowindex" => $patient_opd_follow_up_list->RowCount, "id" => "r" . $patient_opd_follow_up_list->RowCount . "_patient_opd_follow_up", "data-rowtype" => $patient_opd_follow_up->RowType]);

		// Render row
		$patient_opd_follow_up_list->renderRow();

		// Render list options
		$patient_opd_follow_up_list->renderListOptions();
?>
	<tr <?php echo $patient_opd_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_opd_follow_up_list->ListOptions->render("body", "left", $patient_opd_follow_up_list->RowCount);
?>
	<?php if ($patient_opd_follow_up_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_opd_follow_up_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up_list->id->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_opd_follow_up_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_PatID">
<span<?php echo $patient_opd_follow_up_list->PatID->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_opd_follow_up_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up_list->PatientName->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_opd_follow_up_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_MobileNumber">
<span<?php echo $patient_opd_follow_up_list->MobileNumber->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_opd_follow_up_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up_list->Gender->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate" <?php echo $patient_opd_follow_up_list->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up_list->NextReviewDate->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised" <?php echo $patient_opd_follow_up_list->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up_list->ICSIAdvised->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered" <?php echo $patient_opd_follow_up_list->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up_list->DeliveryRegistered->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->EDD->Visible) { // EDD ?>
		<td data-name="EDD" <?php echo $patient_opd_follow_up_list->EDD->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up_list->EDD->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->EDD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->SerologyPositive->Visible) { // SerologyPositive ?>
		<td data-name="SerologyPositive" <?php echo $patient_opd_follow_up_list->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up_list->SerologyPositive->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->SerologyPositive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->Allergy->Visible) { // Allergy ?>
		<td data-name="Allergy" <?php echo $patient_opd_follow_up_list->Allergy->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up_list->Allergy->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->Allergy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_opd_follow_up_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up_list->status->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_opd_follow_up_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up_list->createdby->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_opd_follow_up_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up_list->createddatetime->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_opd_follow_up_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up_list->modifiedby->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_opd_follow_up_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up_list->modifieddatetime->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->LMP->Visible) { // LMP ?>
		<td data-name="LMP" <?php echo $patient_opd_follow_up_list->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up_list->LMP->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime" <?php echo $patient_opd_follow_up_list->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up_list->ProcedureDateTime->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate" <?php echo $patient_opd_follow_up_list->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up_list->ICSIDate->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->ICSIDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_opd_follow_up_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_HospID">
<span<?php echo $patient_opd_follow_up_list->HospID->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName" <?php echo $patient_opd_follow_up_list->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_createdUserName">
<span<?php echo $patient_opd_follow_up_list->createdUserName->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_opd_follow_up_list->reportheader->Visible) { // reportheader ?>
		<td data-name="reportheader" <?php echo $patient_opd_follow_up_list->reportheader->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_list->RowCount ?>_patient_opd_follow_up_reportheader">
<span<?php echo $patient_opd_follow_up_list->reportheader->viewAttributes() ?>><?php echo $patient_opd_follow_up_list->reportheader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_opd_follow_up_list->ListOptions->render("body", "right", $patient_opd_follow_up_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_opd_follow_up_list->isGridAdd())
		$patient_opd_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_opd_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_opd_follow_up_list->Recordset)
	$patient_opd_follow_up_list->Recordset->Close();
?>
<?php if (!$patient_opd_follow_up_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_opd_follow_up_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_opd_follow_up_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_opd_follow_up_list->TotalRecords == 0 && !$patient_opd_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_opd_follow_up_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_opd_follow_up_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_opd_follow_up",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_opd_follow_up_list->terminate();
?>