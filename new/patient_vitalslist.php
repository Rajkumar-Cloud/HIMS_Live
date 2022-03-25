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
$patient_vitals_list = new patient_vitals_list();

// Run the page
$patient_vitals_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_vitals_list->isExport()) { ?>
<script>
var fpatient_vitalslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_vitalslist = currentForm = new ew.Form("fpatient_vitalslist", "list");
	fpatient_vitalslist.formKeyCountName = '<?php echo $patient_vitals_list->FormKeyCountName ?>';
	loadjs.done("fpatient_vitalslist");
});
var fpatient_vitalslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_vitalslistsrch = currentSearchForm = new ew.Form("fpatient_vitalslistsrch");

	// Validate function for search
	fpatient_vitalslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_vitalslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_vitalslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fpatient_vitalslistsrch.filterList = <?php echo $patient_vitals_list->getFilterList() ?>;
	loadjs.done("fpatient_vitalslistsrch");
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
<?php if (!$patient_vitals_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_vitals_list->TotalRecords > 0 && $patient_vitals_list->ExportOptions->visible()) { ?>
<?php $patient_vitals_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_vitals_list->ImportOptions->visible()) { ?>
<?php $patient_vitals_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_vitals_list->SearchOptions->visible()) { ?>
<?php $patient_vitals_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_vitals_list->FilterOptions->visible()) { ?>
<?php $patient_vitals_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_vitals_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_vitals_list->isExport("print")) { ?>
<?php
if ($patient_vitals_list->DbMasterFilter != "" && $patient_vitals->getCurrentMasterTable() == "ip_admission") {
	if ($patient_vitals_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_vitals_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_vitals_list->isExport() && !$patient_vitals->CurrentAction) { ?>
<form name="fpatient_vitalslistsrch" id="fpatient_vitalslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_vitalslistsrch-search-panel" class="<?php echo $patient_vitals_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_vitals">
	<div class="ew-extended-search">
<?php

// Render search row
$patient_vitals->RowType = ROWTYPE_SEARCH;
$patient_vitals->resetAttributes();
$patient_vitals_list->renderRow();
?>
<?php if ($patient_vitals_list->mrnno->Visible) { // mrnno ?>
	<?php
		$patient_vitals_list->SearchColumnCount++;
		if (($patient_vitals_list->SearchColumnCount - 1) % $patient_vitals_list->SearchFieldsPerRow == 0) {
			$patient_vitals_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_vitals_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mrnno" class="ew-cell form-group">
		<label for="x_mrnno" class="ew-search-caption ew-label"><?php echo $patient_vitals_list->mrnno->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		<span id="el_patient_vitals_mrnno" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_list->mrnno->EditValue ?>"<?php echo $patient_vitals_list->mrnno->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_vitals_list->SearchColumnCount % $patient_vitals_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PatientName->Visible) { // PatientName ?>
	<?php
		$patient_vitals_list->SearchColumnCount++;
		if (($patient_vitals_list->SearchColumnCount - 1) % $patient_vitals_list->SearchFieldsPerRow == 0) {
			$patient_vitals_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_vitals_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $patient_vitals_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_patient_vitals_PatientName" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_list->PatientName->EditValue ?>"<?php echo $patient_vitals_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_vitals_list->SearchColumnCount % $patient_vitals_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PatID->Visible) { // PatID ?>
	<?php
		$patient_vitals_list->SearchColumnCount++;
		if (($patient_vitals_list->SearchColumnCount - 1) % $patient_vitals_list->SearchFieldsPerRow == 0) {
			$patient_vitals_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_vitals_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatID" class="ew-cell form-group">
		<label for="x_PatID" class="ew-search-caption ew-label"><?php echo $patient_vitals_list->PatID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
		<span id="el_patient_vitals_PatID" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_list->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_list->PatID->EditValue ?>"<?php echo $patient_vitals_list->PatID->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_vitals_list->SearchColumnCount % $patient_vitals_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$patient_vitals_list->SearchColumnCount++;
		if (($patient_vitals_list->SearchColumnCount - 1) % $patient_vitals_list->SearchFieldsPerRow == 0) {
			$patient_vitals_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_vitals_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $patient_vitals_list->MobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		<span id="el_patient_vitals_MobileNumber" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_list->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_list->MobileNumber->EditValue ?>"<?php echo $patient_vitals_list->MobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_vitals_list->SearchColumnCount % $patient_vitals_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($patient_vitals_list->SearchColumnCount % $patient_vitals_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $patient_vitals_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_vitals_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_vitals_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_vitals_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_vitals_list->showPageHeader(); ?>
<?php
$patient_vitals_list->showMessage();
?>
<?php if ($patient_vitals_list->TotalRecords > 0 || $patient_vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_vitals_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_vitals">
<?php if (!$patient_vitals_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_vitals_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_vitals_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_vitalslist" id="fpatient_vitalslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<?php if ($patient_vitals->getCurrentMasterTable() == "ip_admission" && $patient_vitals->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_vitals_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_vitals_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_vitals_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_vitals" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_vitals_list->TotalRecords > 0 || $patient_vitals_list->isGridEdit()) { ?>
<table id="tbl_patient_vitalslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_vitals->RowType = ROWTYPE_HEADER;

// Render list options
$patient_vitals_list->renderListOptions();

// Render list options (header, left)
$patient_vitals_list->ListOptions->render("header", "left");
?>
<?php if ($patient_vitals_list->id->Visible) { // id ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_vitals_list->id->headerCellClass() ?>"><div id="elh_patient_vitals_id" class="patient_vitals_id"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_vitals_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->id) ?>', 1);"><div id="elh_patient_vitals_id" class="patient_vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals_list->mrnno->headerCellClass() ?>"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->mrnno) ?>', 1);"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals_list->PatientName->headerCellClass() ?>"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PatientName) ?>', 1);"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals_list->PatID->headerCellClass() ?>"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PatID) ?>', 1);"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->MobileNumber) ?>', 1);"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->HT->Visible) { // HT ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->HT) == "") { ?>
		<th data-name="HT" class="<?php echo $patient_vitals_list->HT->headerCellClass() ?>"><div id="elh_patient_vitals_HT" class="patient_vitals_HT"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->HT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HT" class="<?php echo $patient_vitals_list->HT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->HT) ?>', 1);"><div id="elh_patient_vitals_HT" class="patient_vitals_HT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->HT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->HT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->HT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->WT->Visible) { // WT ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->WT) == "") { ?>
		<th data-name="WT" class="<?php echo $patient_vitals_list->WT->headerCellClass() ?>"><div id="elh_patient_vitals_WT" class="patient_vitals_WT"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->WT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WT" class="<?php echo $patient_vitals_list->WT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->WT) ?>', 1);"><div id="elh_patient_vitals_WT" class="patient_vitals_WT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->WT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->WT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->WT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->SurfaceArea->Visible) { // SurfaceArea ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->SurfaceArea) == "") { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals_list->SurfaceArea->headerCellClass() ?>"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->SurfaceArea->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals_list->SurfaceArea->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->SurfaceArea) ?>', 1);"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->SurfaceArea->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->SurfaceArea->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->SurfaceArea->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->BodyMassIndex) == "") { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals_list->BodyMassIndex->headerCellClass() ?>"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->BodyMassIndex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals_list->BodyMassIndex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->BodyMassIndex) ?>', 1);"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->BodyMassIndex->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->BodyMassIndex->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->BodyMassIndex->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->AnticoagulantifAny) == "") { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals_list->AnticoagulantifAny->headerCellClass() ?>"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->AnticoagulantifAny->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals_list->AnticoagulantifAny->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->AnticoagulantifAny) ?>', 1);"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->AnticoagulantifAny->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->AnticoagulantifAny->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->AnticoagulantifAny->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->FoodAllergies->Visible) { // FoodAllergies ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->FoodAllergies) == "") { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals_list->FoodAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->FoodAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals_list->FoodAllergies->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->FoodAllergies) ?>', 1);"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->FoodAllergies->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->FoodAllergies->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->FoodAllergies->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->GenericAllergies->Visible) { // GenericAllergies ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->GenericAllergies) == "") { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals_list->GenericAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->GenericAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals_list->GenericAllergies->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->GenericAllergies) ?>', 1);"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->GenericAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->GenericAllergies->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->GenericAllergies->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->GroupAllergies->Visible) { // GroupAllergies ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->GroupAllergies) == "") { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals_list->GroupAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->GroupAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals_list->GroupAllergies->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->GroupAllergies) ?>', 1);"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->GroupAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->GroupAllergies->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->GroupAllergies->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->Temp->Visible) { // Temp ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals_list->Temp->headerCellClass() ?>"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals_list->Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->Temp) ?>', 1);"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->Temp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->Temp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->Temp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals_list->Pulse->headerCellClass() ?>"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals_list->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->Pulse) ?>', 1);"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->Pulse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->Pulse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->BP->Visible) { // BP ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_vitals_list->BP->headerCellClass() ?>"><div id="elh_patient_vitals_BP" class="patient_vitals_BP"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_vitals_list->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->BP) ?>', 1);"><div id="elh_patient_vitals_BP" class="patient_vitals_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->BP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->BP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PR->Visible) { // PR ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $patient_vitals_list->PR->headerCellClass() ?>"><div id="elh_patient_vitals_PR" class="patient_vitals_PR"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $patient_vitals_list->PR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PR) ?>', 1);"><div id="elh_patient_vitals_PR" class="patient_vitals_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->CNS->Visible) { // CNS ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals_list->CNS->headerCellClass() ?>"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals_list->CNS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->CNS) ?>', 1);"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->CNS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->CNS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->CNS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->RSA->Visible) { // RSA ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->RSA) == "") { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals_list->RSA->headerCellClass() ?>"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->RSA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals_list->RSA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->RSA) ?>', 1);"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->RSA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->RSA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->RSA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->CVS->Visible) { // CVS ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals_list->CVS->headerCellClass() ?>"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals_list->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->CVS) ?>', 1);"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->CVS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->CVS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PA->Visible) { // PA ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $patient_vitals_list->PA->headerCellClass() ?>"><div id="elh_patient_vitals_PA" class="patient_vitals_PA"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $patient_vitals_list->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PA) ?>', 1);"><div id="elh_patient_vitals_PA" class="patient_vitals_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PS->Visible) { // PS ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PS) == "") { ?>
		<th data-name="PS" class="<?php echo $patient_vitals_list->PS->headerCellClass() ?>"><div id="elh_patient_vitals_PS" class="patient_vitals_PS"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PS" class="<?php echo $patient_vitals_list->PS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PS) ?>', 1);"><div id="elh_patient_vitals_PS" class="patient_vitals_PS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PV->Visible) { // PV ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PV) == "") { ?>
		<th data-name="PV" class="<?php echo $patient_vitals_list->PV->headerCellClass() ?>"><div id="elh_patient_vitals_PV" class="patient_vitals_PV"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PV" class="<?php echo $patient_vitals_list->PV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PV) ?>', 1);"><div id="elh_patient_vitals_PV" class="patient_vitals_PV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PV->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PV->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->clinicaldetails->Visible) { // clinicaldetails ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->clinicaldetails) == "") { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals_list->clinicaldetails->headerCellClass() ?>"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->clinicaldetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals_list->clinicaldetails->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->clinicaldetails) ?>', 1);"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->clinicaldetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->clinicaldetails->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->clinicaldetails->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->status->Visible) { // status ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_vitals_list->status->headerCellClass() ?>"><div id="elh_patient_vitals_status" class="patient_vitals_status"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_vitals_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->status) ?>', 1);"><div id="elh_patient_vitals_status" class="patient_vitals_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->createdby->Visible) { // createdby ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals_list->createdby->headerCellClass() ?>"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->createdby) ?>', 1);"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals_list->createddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->createddatetime) ?>', 1);"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals_list->modifiedby->headerCellClass() ?>"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->modifiedby) ?>', 1);"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals_list->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->modifieddatetime) ?>', 1);"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->Age->Visible) { // Age ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_vitals_list->Age->headerCellClass() ?>"><div id="elh_patient_vitals_Age" class="patient_vitals_Age"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_vitals_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->Age) ?>', 1);"><div id="elh_patient_vitals_Age" class="patient_vitals_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals_list->Gender->headerCellClass() ?>"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->Gender) ?>', 1);"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals_list->PatientId->headerCellClass() ?>"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->PatientId) ?>', 1);"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals_list->Reception->headerCellClass() ?>"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->Reception) ?>', 1);"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_vitals_list->SortUrl($patient_vitals_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals_list->HospID->headerCellClass() ?>"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><div class="ew-table-header-caption"><?php echo $patient_vitals_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_vitals_list->SortUrl($patient_vitals_list->HospID) ?>', 1);"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_vitals_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_vitals_list->ExportAll && $patient_vitals_list->isExport()) {
	$patient_vitals_list->StopRecord = $patient_vitals_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_vitals_list->TotalRecords > $patient_vitals_list->StartRecord + $patient_vitals_list->DisplayRecords - 1)
		$patient_vitals_list->StopRecord = $patient_vitals_list->StartRecord + $patient_vitals_list->DisplayRecords - 1;
	else
		$patient_vitals_list->StopRecord = $patient_vitals_list->TotalRecords;
}
$patient_vitals_list->RecordCount = $patient_vitals_list->StartRecord - 1;
if ($patient_vitals_list->Recordset && !$patient_vitals_list->Recordset->EOF) {
	$patient_vitals_list->Recordset->moveFirst();
	$selectLimit = $patient_vitals_list->UseSelectLimit;
	if (!$selectLimit && $patient_vitals_list->StartRecord > 1)
		$patient_vitals_list->Recordset->move($patient_vitals_list->StartRecord - 1);
} elseif (!$patient_vitals->AllowAddDeleteRow && $patient_vitals_list->StopRecord == 0) {
	$patient_vitals_list->StopRecord = $patient_vitals->GridAddRowCount;
}

// Initialize aggregate
$patient_vitals->RowType = ROWTYPE_AGGREGATEINIT;
$patient_vitals->resetAttributes();
$patient_vitals_list->renderRow();
while ($patient_vitals_list->RecordCount < $patient_vitals_list->StopRecord) {
	$patient_vitals_list->RecordCount++;
	if ($patient_vitals_list->RecordCount >= $patient_vitals_list->StartRecord) {
		$patient_vitals_list->RowCount++;

		// Set up key count
		$patient_vitals_list->KeyCount = $patient_vitals_list->RowIndex;

		// Init row class and style
		$patient_vitals->resetAttributes();
		$patient_vitals->CssClass = "";
		if ($patient_vitals_list->isGridAdd()) {
		} else {
			$patient_vitals_list->loadRowValues($patient_vitals_list->Recordset); // Load row values
		}
		$patient_vitals->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_vitals->RowAttrs->merge(["data-rowindex" => $patient_vitals_list->RowCount, "id" => "r" . $patient_vitals_list->RowCount . "_patient_vitals", "data-rowtype" => $patient_vitals->RowType]);

		// Render row
		$patient_vitals_list->renderRow();

		// Render list options
		$patient_vitals_list->renderListOptions();
?>
	<tr <?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_list->ListOptions->render("body", "left", $patient_vitals_list->RowCount);
?>
	<?php if ($patient_vitals_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_vitals_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_id">
<span<?php echo $patient_vitals_list->id->viewAttributes() ?>><?php echo $patient_vitals_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_vitals_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_mrnno">
<span<?php echo $patient_vitals_list->mrnno->viewAttributes() ?>><?php echo $patient_vitals_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_vitals_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PatientName">
<span<?php echo $patient_vitals_list->PatientName->viewAttributes() ?>><?php echo $patient_vitals_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_vitals_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PatID">
<span<?php echo $patient_vitals_list->PatID->viewAttributes() ?>><?php echo $patient_vitals_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_vitals_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_MobileNumber">
<span<?php echo $patient_vitals_list->MobileNumber->viewAttributes() ?>><?php echo $patient_vitals_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->HT->Visible) { // HT ?>
		<td data-name="HT" <?php echo $patient_vitals_list->HT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_HT">
<span<?php echo $patient_vitals_list->HT->viewAttributes() ?>><?php echo $patient_vitals_list->HT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->WT->Visible) { // WT ?>
		<td data-name="WT" <?php echo $patient_vitals_list->WT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_WT">
<span<?php echo $patient_vitals_list->WT->viewAttributes() ?>><?php echo $patient_vitals_list->WT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->SurfaceArea->Visible) { // SurfaceArea ?>
		<td data-name="SurfaceArea" <?php echo $patient_vitals_list->SurfaceArea->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals_list->SurfaceArea->viewAttributes() ?>><?php echo $patient_vitals_list->SurfaceArea->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td data-name="BodyMassIndex" <?php echo $patient_vitals_list->BodyMassIndex->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals_list->BodyMassIndex->viewAttributes() ?>><?php echo $patient_vitals_list->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td data-name="AnticoagulantifAny" <?php echo $patient_vitals_list->AnticoagulantifAny->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals_list->AnticoagulantifAny->viewAttributes() ?>><?php echo $patient_vitals_list->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->FoodAllergies->Visible) { // FoodAllergies ?>
		<td data-name="FoodAllergies" <?php echo $patient_vitals_list->FoodAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals_list->FoodAllergies->viewAttributes() ?>><?php echo $patient_vitals_list->FoodAllergies->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->GenericAllergies->Visible) { // GenericAllergies ?>
		<td data-name="GenericAllergies" <?php echo $patient_vitals_list->GenericAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals_list->GenericAllergies->viewAttributes() ?>><?php echo $patient_vitals_list->GenericAllergies->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->GroupAllergies->Visible) { // GroupAllergies ?>
		<td data-name="GroupAllergies" <?php echo $patient_vitals_list->GroupAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals_list->GroupAllergies->viewAttributes() ?>><?php echo $patient_vitals_list->GroupAllergies->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->Temp->Visible) { // Temp ?>
		<td data-name="Temp" <?php echo $patient_vitals_list->Temp->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_Temp">
<span<?php echo $patient_vitals_list->Temp->viewAttributes() ?>><?php echo $patient_vitals_list->Temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse" <?php echo $patient_vitals_list->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_Pulse">
<span<?php echo $patient_vitals_list->Pulse->viewAttributes() ?>><?php echo $patient_vitals_list->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->BP->Visible) { // BP ?>
		<td data-name="BP" <?php echo $patient_vitals_list->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_BP">
<span<?php echo $patient_vitals_list->BP->viewAttributes() ?>><?php echo $patient_vitals_list->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PR->Visible) { // PR ?>
		<td data-name="PR" <?php echo $patient_vitals_list->PR->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PR">
<span<?php echo $patient_vitals_list->PR->viewAttributes() ?>><?php echo $patient_vitals_list->PR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->CNS->Visible) { // CNS ?>
		<td data-name="CNS" <?php echo $patient_vitals_list->CNS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_CNS">
<span<?php echo $patient_vitals_list->CNS->viewAttributes() ?>><?php echo $patient_vitals_list->CNS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->RSA->Visible) { // RSA ?>
		<td data-name="RSA" <?php echo $patient_vitals_list->RSA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_RSA">
<span<?php echo $patient_vitals_list->RSA->viewAttributes() ?>><?php echo $patient_vitals_list->RSA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->CVS->Visible) { // CVS ?>
		<td data-name="CVS" <?php echo $patient_vitals_list->CVS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_CVS">
<span<?php echo $patient_vitals_list->CVS->viewAttributes() ?>><?php echo $patient_vitals_list->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PA->Visible) { // PA ?>
		<td data-name="PA" <?php echo $patient_vitals_list->PA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PA">
<span<?php echo $patient_vitals_list->PA->viewAttributes() ?>><?php echo $patient_vitals_list->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PS->Visible) { // PS ?>
		<td data-name="PS" <?php echo $patient_vitals_list->PS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PS">
<span<?php echo $patient_vitals_list->PS->viewAttributes() ?>><?php echo $patient_vitals_list->PS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PV->Visible) { // PV ?>
		<td data-name="PV" <?php echo $patient_vitals_list->PV->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PV">
<span<?php echo $patient_vitals_list->PV->viewAttributes() ?>><?php echo $patient_vitals_list->PV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->clinicaldetails->Visible) { // clinicaldetails ?>
		<td data-name="clinicaldetails" <?php echo $patient_vitals_list->clinicaldetails->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals_list->clinicaldetails->viewAttributes() ?>><?php echo $patient_vitals_list->clinicaldetails->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_vitals_list->status->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_status">
<span<?php echo $patient_vitals_list->status->viewAttributes() ?>><?php echo $patient_vitals_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_vitals_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_createdby">
<span<?php echo $patient_vitals_list->createdby->viewAttributes() ?>><?php echo $patient_vitals_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_vitals_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_createddatetime">
<span<?php echo $patient_vitals_list->createddatetime->viewAttributes() ?>><?php echo $patient_vitals_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_vitals_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_modifiedby">
<span<?php echo $patient_vitals_list->modifiedby->viewAttributes() ?>><?php echo $patient_vitals_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_vitals_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals_list->modifieddatetime->viewAttributes() ?>><?php echo $patient_vitals_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_vitals_list->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_Age">
<span<?php echo $patient_vitals_list->Age->viewAttributes() ?>><?php echo $patient_vitals_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_vitals_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_Gender">
<span<?php echo $patient_vitals_list->Gender->viewAttributes() ?>><?php echo $patient_vitals_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_vitals_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_PatientId">
<span<?php echo $patient_vitals_list->PatientId->viewAttributes() ?>><?php echo $patient_vitals_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_vitals_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_Reception">
<span<?php echo $patient_vitals_list->Reception->viewAttributes() ?>><?php echo $patient_vitals_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_vitals_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCount ?>_patient_vitals_HospID">
<span<?php echo $patient_vitals_list->HospID->viewAttributes() ?>><?php echo $patient_vitals_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_list->ListOptions->render("body", "right", $patient_vitals_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_vitals_list->isGridAdd())
		$patient_vitals_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_vitals->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_vitals_list->Recordset)
	$patient_vitals_list->Recordset->Close();
?>
<?php if (!$patient_vitals_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_vitals_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_vitals_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_vitals_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_vitals_list->TotalRecords == 0 && !$patient_vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_vitals_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_vitals_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_vitals->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_vitals",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_vitals_list->terminate();
?>