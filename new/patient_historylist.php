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
$patient_history_list = new patient_history_list();

// Run the page
$patient_history_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_history_list->isExport()) { ?>
<script>
var fpatient_historylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_historylist = currentForm = new ew.Form("fpatient_historylist", "list");
	fpatient_historylist.formKeyCountName = '<?php echo $patient_history_list->FormKeyCountName ?>';
	loadjs.done("fpatient_historylist");
});
var fpatient_historylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_historylistsrch = currentSearchForm = new ew.Form("fpatient_historylistsrch");

	// Validate function for search
	fpatient_historylistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_PatientId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_history_list->PatientId->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_historylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_historylistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fpatient_historylistsrch.filterList = <?php echo $patient_history_list->getFilterList() ?>;
	loadjs.done("fpatient_historylistsrch");
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
<?php if (!$patient_history_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_history_list->TotalRecords > 0 && $patient_history_list->ExportOptions->visible()) { ?>
<?php $patient_history_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_history_list->ImportOptions->visible()) { ?>
<?php $patient_history_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_history_list->SearchOptions->visible()) { ?>
<?php $patient_history_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_history_list->FilterOptions->visible()) { ?>
<?php $patient_history_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_history_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_history_list->isExport("print")) { ?>
<?php
if ($patient_history_list->DbMasterFilter != "" && $patient_history->getCurrentMasterTable() == "ip_admission") {
	if ($patient_history_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_history_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_history_list->isExport() && !$patient_history->CurrentAction) { ?>
<form name="fpatient_historylistsrch" id="fpatient_historylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_historylistsrch-search-panel" class="<?php echo $patient_history_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_history">
	<div class="ew-extended-search">
<?php

// Render search row
$patient_history->RowType = ROWTYPE_SEARCH;
$patient_history->resetAttributes();
$patient_history_list->renderRow();
?>
<?php if ($patient_history_list->mrnno->Visible) { // mrnno ?>
	<?php
		$patient_history_list->SearchColumnCount++;
		if (($patient_history_list->SearchColumnCount - 1) % $patient_history_list->SearchFieldsPerRow == 0) {
			$patient_history_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_history_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mrnno" class="ew-cell form-group">
		<label for="x_mrnno" class="ew-search-caption ew-label"><?php echo $patient_history_list->mrnno->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		<span id="el_patient_history_mrnno" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history_list->mrnno->EditValue ?>"<?php echo $patient_history_list->mrnno->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_history_list->SearchColumnCount % $patient_history_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->PatientName->Visible) { // PatientName ?>
	<?php
		$patient_history_list->SearchColumnCount++;
		if (($patient_history_list->SearchColumnCount - 1) % $patient_history_list->SearchFieldsPerRow == 0) {
			$patient_history_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_history_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $patient_history_list->PatientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		<span id="el_patient_history_PatientName" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history_list->PatientName->EditValue ?>"<?php echo $patient_history_list->PatientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_history_list->SearchColumnCount % $patient_history_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->PatientId->Visible) { // PatientId ?>
	<?php
		$patient_history_list->SearchColumnCount++;
		if (($patient_history_list->SearchColumnCount - 1) % $patient_history_list->SearchFieldsPerRow == 0) {
			$patient_history_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_history_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $patient_history_list->PatientId->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="=">
</span>
		<span id="el_patient_history_PatientId" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history_list->PatientId->EditValue ?>"<?php echo $patient_history_list->PatientId->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_history_list->SearchColumnCount % $patient_history_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$patient_history_list->SearchColumnCount++;
		if (($patient_history_list->SearchColumnCount - 1) % $patient_history_list->SearchFieldsPerRow == 0) {
			$patient_history_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $patient_history_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $patient_history_list->MobileNumber->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		<span id="el_patient_history_MobileNumber" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_list->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history_list->MobileNumber->EditValue ?>"<?php echo $patient_history_list->MobileNumber->editAttributes() ?>>
</span>
	</div>
	<?php if ($patient_history_list->SearchColumnCount % $patient_history_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($patient_history_list->SearchColumnCount % $patient_history_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $patient_history_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_history_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_history_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_history_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_history_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_history_list->showPageHeader(); ?>
<?php
$patient_history_list->showMessage();
?>
<?php if ($patient_history_list->TotalRecords > 0 || $patient_history->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_history_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_history">
<?php if (!$patient_history_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_history_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_history_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_historylist" id="fpatient_historylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<?php if ($patient_history->getCurrentMasterTable() == "ip_admission" && $patient_history->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_history_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_history_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_history_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_history" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_history_list->TotalRecords > 0 || $patient_history_list->isGridEdit()) { ?>
<table id="tbl_patient_historylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_history->RowType = ROWTYPE_HEADER;

// Render list options
$patient_history_list->renderListOptions();

// Render list options (header, left)
$patient_history_list->ListOptions->render("header", "left");
?>
<?php if ($patient_history_list->id->Visible) { // id ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_history_list->id->headerCellClass() ?>"><div id="elh_patient_history_id" class="patient_history_id"><div class="ew-table-header-caption"><?php echo $patient_history_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_history_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->id) ?>', 1);"><div id="elh_patient_history_id" class="patient_history_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_history_list->mrnno->headerCellClass() ?>"><div id="elh_patient_history_mrnno" class="patient_history_mrnno"><div class="ew-table-header-caption"><?php echo $patient_history_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_history_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->mrnno) ?>', 1);"><div id="elh_patient_history_mrnno" class="patient_history_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_history_list->PatientName->headerCellClass() ?>"><div id="elh_patient_history_PatientName" class="patient_history_PatientName"><div class="ew-table-header-caption"><?php echo $patient_history_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_history_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->PatientName) ?>', 1);"><div id="elh_patient_history_PatientName" class="patient_history_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_history_list->PatientId->headerCellClass() ?>"><div id="elh_patient_history_PatientId" class="patient_history_PatientId"><div class="ew-table-header-caption"><?php echo $patient_history_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_history_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->PatientId) ?>', 1);"><div id="elh_patient_history_PatientId" class="patient_history_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_history_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_history_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_history_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->MobileNumber) ?>', 1);"><div id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_history_list->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_history_list->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_history_list->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->MaritalHistory) ?>', 1);"><div id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->MaritalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->MaritalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->MaritalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_history_list->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_history_list->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_history_list->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->MenstrualHistory) ?>', 1);"><div id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->MenstrualHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->MenstrualHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->MenstrualHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_history_list->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_history_list->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_history_list->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->ObstetricHistory) ?>', 1);"><div id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->ObstetricHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->ObstetricHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->ObstetricHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->Age->Visible) { // Age ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_history_list->Age->headerCellClass() ?>"><div id="elh_patient_history_Age" class="patient_history_Age"><div class="ew-table-header-caption"><?php echo $patient_history_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_history_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->Age) ?>', 1);"><div id="elh_patient_history_Age" class="patient_history_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_history_list->Gender->headerCellClass() ?>"><div id="elh_patient_history_Gender" class="patient_history_Gender"><div class="ew-table-header-caption"><?php echo $patient_history_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_history_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->Gender) ?>', 1);"><div id="elh_patient_history_Gender" class="patient_history_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_history_list->PatID->headerCellClass() ?>"><div id="elh_patient_history_PatID" class="patient_history_PatID"><div class="ew-table-header-caption"><?php echo $patient_history_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_history_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->PatID) ?>', 1);"><div id="elh_patient_history_PatID" class="patient_history_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_history_list->Reception->headerCellClass() ?>"><div id="elh_patient_history_Reception" class="patient_history_Reception"><div class="ew-table-header-caption"><?php echo $patient_history_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_history_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->Reception) ?>', 1);"><div id="elh_patient_history_Reception" class="patient_history_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_history_list->SortUrl($patient_history_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_history_list->HospID->headerCellClass() ?>"><div id="elh_patient_history_HospID" class="patient_history_HospID"><div class="ew-table-header-caption"><?php echo $patient_history_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_history_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_history_list->SortUrl($patient_history_list->HospID) ?>', 1);"><div id="elh_patient_history_HospID" class="patient_history_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_history_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_history_list->ExportAll && $patient_history_list->isExport()) {
	$patient_history_list->StopRecord = $patient_history_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_history_list->TotalRecords > $patient_history_list->StartRecord + $patient_history_list->DisplayRecords - 1)
		$patient_history_list->StopRecord = $patient_history_list->StartRecord + $patient_history_list->DisplayRecords - 1;
	else
		$patient_history_list->StopRecord = $patient_history_list->TotalRecords;
}
$patient_history_list->RecordCount = $patient_history_list->StartRecord - 1;
if ($patient_history_list->Recordset && !$patient_history_list->Recordset->EOF) {
	$patient_history_list->Recordset->moveFirst();
	$selectLimit = $patient_history_list->UseSelectLimit;
	if (!$selectLimit && $patient_history_list->StartRecord > 1)
		$patient_history_list->Recordset->move($patient_history_list->StartRecord - 1);
} elseif (!$patient_history->AllowAddDeleteRow && $patient_history_list->StopRecord == 0) {
	$patient_history_list->StopRecord = $patient_history->GridAddRowCount;
}

// Initialize aggregate
$patient_history->RowType = ROWTYPE_AGGREGATEINIT;
$patient_history->resetAttributes();
$patient_history_list->renderRow();
while ($patient_history_list->RecordCount < $patient_history_list->StopRecord) {
	$patient_history_list->RecordCount++;
	if ($patient_history_list->RecordCount >= $patient_history_list->StartRecord) {
		$patient_history_list->RowCount++;

		// Set up key count
		$patient_history_list->KeyCount = $patient_history_list->RowIndex;

		// Init row class and style
		$patient_history->resetAttributes();
		$patient_history->CssClass = "";
		if ($patient_history_list->isGridAdd()) {
		} else {
			$patient_history_list->loadRowValues($patient_history_list->Recordset); // Load row values
		}
		$patient_history->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_history->RowAttrs->merge(["data-rowindex" => $patient_history_list->RowCount, "id" => "r" . $patient_history_list->RowCount . "_patient_history", "data-rowtype" => $patient_history->RowType]);

		// Render row
		$patient_history_list->renderRow();

		// Render list options
		$patient_history_list->renderListOptions();
?>
	<tr <?php echo $patient_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_history_list->ListOptions->render("body", "left", $patient_history_list->RowCount);
?>
	<?php if ($patient_history_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_history_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_id">
<span<?php echo $patient_history_list->id->viewAttributes() ?>><?php echo $patient_history_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_history_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_mrnno">
<span<?php echo $patient_history_list->mrnno->viewAttributes() ?>><?php echo $patient_history_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_history_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_PatientName">
<span<?php echo $patient_history_list->PatientName->viewAttributes() ?>><?php echo $patient_history_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_history_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_PatientId">
<span<?php echo $patient_history_list->PatientId->viewAttributes() ?>><?php echo $patient_history_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_history_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_MobileNumber">
<span<?php echo $patient_history_list->MobileNumber->viewAttributes() ?>><?php echo $patient_history_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory" <?php echo $patient_history_list->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_MaritalHistory">
<span<?php echo $patient_history_list->MaritalHistory->viewAttributes() ?>><?php echo $patient_history_list->MaritalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory" <?php echo $patient_history_list->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_MenstrualHistory">
<span<?php echo $patient_history_list->MenstrualHistory->viewAttributes() ?>><?php echo $patient_history_list->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory" <?php echo $patient_history_list->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_ObstetricHistory">
<span<?php echo $patient_history_list->ObstetricHistory->viewAttributes() ?>><?php echo $patient_history_list->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_history_list->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_Age">
<span<?php echo $patient_history_list->Age->viewAttributes() ?>><?php echo $patient_history_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_history_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_Gender">
<span<?php echo $patient_history_list->Gender->viewAttributes() ?>><?php echo $patient_history_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_history_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_PatID">
<span<?php echo $patient_history_list->PatID->viewAttributes() ?>><?php echo $patient_history_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_history_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_Reception">
<span<?php echo $patient_history_list->Reception->viewAttributes() ?>><?php echo $patient_history_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_history_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_history_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_list->RowCount ?>_patient_history_HospID">
<span<?php echo $patient_history_list->HospID->viewAttributes() ?>><?php echo $patient_history_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_history_list->ListOptions->render("body", "right", $patient_history_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_history_list->isGridAdd())
		$patient_history_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_history->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_history_list->Recordset)
	$patient_history_list->Recordset->Close();
?>
<?php if (!$patient_history_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_history_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_history_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_history_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_history_list->TotalRecords == 0 && !$patient_history->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_history_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_history_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_history->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_history",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_history_list->terminate();
?>