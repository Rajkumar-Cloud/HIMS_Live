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
$patient_prescription_list = new patient_prescription_list();

// Run the page
$patient_prescription_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_prescription_list->isExport()) { ?>
<script>
var fpatient_prescriptionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_prescriptionlist = currentForm = new ew.Form("fpatient_prescriptionlist", "list");
	fpatient_prescriptionlist.formKeyCountName = '<?php echo $patient_prescription_list->FormKeyCountName ?>';

	// Validate form
	fpatient_prescriptionlist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($patient_prescription_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->id->caption(), $patient_prescription_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->Reception->caption(), $patient_prescription_list->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->PatientId->caption(), $patient_prescription_list->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->PatientName->caption(), $patient_prescription_list->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->Medicine->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->Medicine->caption(), $patient_prescription_list->Medicine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->M->caption(), $patient_prescription_list->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->A->caption(), $patient_prescription_list->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->N->Required) { ?>
				elm = this.getElements("x" + infix + "_N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->N->caption(), $patient_prescription_list->N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->NoOfDays->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfDays");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->NoOfDays->caption(), $patient_prescription_list->NoOfDays->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->PreRoute->Required) { ?>
				elm = this.getElements("x" + infix + "_PreRoute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->PreRoute->caption(), $patient_prescription_list->PreRoute->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->TimeOfTaking->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeOfTaking");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->TimeOfTaking->caption(), $patient_prescription_list->TimeOfTaking->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->Type->caption(), $patient_prescription_list->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->mrnno->caption(), $patient_prescription_list->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->Age->caption(), $patient_prescription_list->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->Gender->caption(), $patient_prescription_list->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->profilePic->caption(), $patient_prescription_list->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->Status->caption(), $patient_prescription_list->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->CreatedBy->caption(), $patient_prescription_list->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->CreateDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreateDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->CreateDateTime->caption(), $patient_prescription_list->CreateDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->ModifiedBy->caption(), $patient_prescription_list->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_list->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_list->ModifiedDateTime->caption(), $patient_prescription_list->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	fpatient_prescriptionlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Medicine", false)) return false;
		if (ew.valueChanged(fobj, infix, "M", false)) return false;
		if (ew.valueChanged(fobj, infix, "A", false)) return false;
		if (ew.valueChanged(fobj, infix, "N", false)) return false;
		if (ew.valueChanged(fobj, infix, "NoOfDays", false)) return false;
		if (ew.valueChanged(fobj, infix, "PreRoute", false)) return false;
		if (ew.valueChanged(fobj, infix, "TimeOfTaking", false)) return false;
		if (ew.valueChanged(fobj, infix, "Type", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		if (ew.valueChanged(fobj, infix, "Age", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "profilePic", false)) return false;
		if (ew.valueChanged(fobj, infix, "Status", false)) return false;
		if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "CreateDateTime", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModifiedDateTime", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_prescriptionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_prescriptionlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_prescriptionlist.lists["x_Medicine"] = <?php echo $patient_prescription_list->Medicine->Lookup->toClientList($patient_prescription_list) ?>;
	fpatient_prescriptionlist.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_list->Medicine->lookupOptions()) ?>;
	fpatient_prescriptionlist.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptionlist.lists["x_PreRoute"] = <?php echo $patient_prescription_list->PreRoute->Lookup->toClientList($patient_prescription_list) ?>;
	fpatient_prescriptionlist.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_list->PreRoute->lookupOptions()) ?>;
	fpatient_prescriptionlist.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptionlist.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_list->TimeOfTaking->Lookup->toClientList($patient_prescription_list) ?>;
	fpatient_prescriptionlist.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_list->TimeOfTaking->lookupOptions()) ?>;
	fpatient_prescriptionlist.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptionlist.lists["x_Type"] = <?php echo $patient_prescription_list->Type->Lookup->toClientList($patient_prescription_list) ?>;
	fpatient_prescriptionlist.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_list->Type->options(FALSE, TRUE)) ?>;
	fpatient_prescriptionlist.lists["x_Status"] = <?php echo $patient_prescription_list->Status->Lookup->toClientList($patient_prescription_list) ?>;
	fpatient_prescriptionlist.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_list->Status->lookupOptions()) ?>;
	loadjs.done("fpatient_prescriptionlist");
});
var fpatient_prescriptionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_prescriptionlistsrch = currentSearchForm = new ew.Form("fpatient_prescriptionlistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_prescriptionlistsrch.filterList = <?php echo $patient_prescription_list->getFilterList() ?>;
	loadjs.done("fpatient_prescriptionlistsrch");
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
<?php if (!$patient_prescription_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_prescription_list->TotalRecords > 0 && $patient_prescription_list->ExportOptions->visible()) { ?>
<?php $patient_prescription_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_prescription_list->ImportOptions->visible()) { ?>
<?php $patient_prescription_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_prescription_list->SearchOptions->visible()) { ?>
<?php $patient_prescription_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_prescription_list->FilterOptions->visible()) { ?>
<?php $patient_prescription_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_prescription_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_prescription_list->isExport("print")) { ?>
<?php
if ($patient_prescription_list->DbMasterFilter != "" && $patient_prescription->getCurrentMasterTable() == "ip_admission") {
	if ($patient_prescription_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_prescription_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_prescription_list->isExport() && !$patient_prescription->CurrentAction) { ?>
<form name="fpatient_prescriptionlistsrch" id="fpatient_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_prescriptionlistsrch-search-panel" class="<?php echo $patient_prescription_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_prescription">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_prescription_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_prescription_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_prescription_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_prescription_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_prescription_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_prescription_list->showPageHeader(); ?>
<?php
$patient_prescription_list->showMessage();
?>
<?php if ($patient_prescription_list->TotalRecords > 0 || $patient_prescription->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_prescription_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_prescription">
<?php if (!$patient_prescription_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_prescription_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_prescription_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_prescriptionlist" id="fpatient_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<?php if ($patient_prescription->getCurrentMasterTable() == "ip_admission" && $patient_prescription->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_prescription_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_prescription_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_prescription_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_prescription" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_prescription_list->TotalRecords > 0 || $patient_prescription_list->isAdd() || $patient_prescription_list->isCopy() || $patient_prescription_list->isGridEdit()) { ?>
<table id="tbl_patient_prescriptionlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_prescription->RowType = ROWTYPE_HEADER;

// Render list options
$patient_prescription_list->renderListOptions();

// Render list options (header, left)
$patient_prescription_list->ListOptions->render("header", "left", "", "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
<?php if ($patient_prescription_list->id->Visible) { // id ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_prescription_list->id->headerCellClass() ?>"><div id="elh_patient_prescription_id" class="patient_prescription_id"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_id" type="text/html"><?php echo $patient_prescription_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_prescription_list->id->headerCellClass() ?>"><script id="tpc_patient_prescription_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->id) ?>', 1);"><div id="elh_patient_prescription_id" class="patient_prescription_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription_list->Reception->headerCellClass() ?>"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Reception" type="text/html"><?php echo $patient_prescription_list->Reception->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_prescription_list->Reception->headerCellClass() ?>"><script id="tpc_patient_prescription_Reception" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->Reception) ?>', 1);"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription_list->PatientId->headerCellClass() ?>"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_PatientId" type="text/html"><?php echo $patient_prescription_list->PatientId->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_prescription_list->PatientId->headerCellClass() ?>"><script id="tpc_patient_prescription_PatientId" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->PatientId) ?>', 1);"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription_list->PatientName->headerCellClass() ?>"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_PatientName" type="text/html"><?php echo $patient_prescription_list->PatientName->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_prescription_list->PatientName->headerCellClass() ?>"><script id="tpc_patient_prescription_PatientName" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->PatientName) ?>', 1);"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->Medicine->Visible) { // Medicine ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->Medicine) == "") { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription_list->Medicine->headerCellClass() ?>" style="width: 20px;"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Medicine" type="text/html"><?php echo $patient_prescription_list->Medicine->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Medicine" class="<?php echo $patient_prescription_list->Medicine->headerCellClass() ?>" style="width: 20px;"><script id="tpc_patient_prescription_Medicine" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->Medicine) ?>', 1);"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->Medicine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->Medicine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->Medicine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->M->Visible) { // M ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_prescription_list->M->headerCellClass() ?>"><div id="elh_patient_prescription_M" class="patient_prescription_M"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_M" type="text/html"><?php echo $patient_prescription_list->M->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_prescription_list->M->headerCellClass() ?>"><script id="tpc_patient_prescription_M" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->M) ?>', 1);"><div id="elh_patient_prescription_M" class="patient_prescription_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->M->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->M->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->M->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->A->Visible) { // A ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_prescription_list->A->headerCellClass() ?>"><div id="elh_patient_prescription_A" class="patient_prescription_A"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_A" type="text/html"><?php echo $patient_prescription_list->A->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_prescription_list->A->headerCellClass() ?>"><script id="tpc_patient_prescription_A" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->A) ?>', 1);"><div id="elh_patient_prescription_A" class="patient_prescription_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->A->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->A->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->A->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->N->Visible) { // N ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->N) == "") { ?>
		<th data-name="N" class="<?php echo $patient_prescription_list->N->headerCellClass() ?>"><div id="elh_patient_prescription_N" class="patient_prescription_N"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_N" type="text/html"><?php echo $patient_prescription_list->N->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="N" class="<?php echo $patient_prescription_list->N->headerCellClass() ?>"><script id="tpc_patient_prescription_N" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->N) ?>', 1);"><div id="elh_patient_prescription_N" class="patient_prescription_N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->N->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->N->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->NoOfDays->Visible) { // NoOfDays ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->NoOfDays) == "") { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription_list->NoOfDays->headerCellClass() ?>"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_NoOfDays" type="text/html"><?php echo $patient_prescription_list->NoOfDays->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfDays" class="<?php echo $patient_prescription_list->NoOfDays->headerCellClass() ?>"><script id="tpc_patient_prescription_NoOfDays" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->NoOfDays) ?>', 1);"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->NoOfDays->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->NoOfDays->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->NoOfDays->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->PreRoute->Visible) { // PreRoute ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->PreRoute) == "") { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription_list->PreRoute->headerCellClass() ?>"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_PreRoute" type="text/html"><?php echo $patient_prescription_list->PreRoute->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PreRoute" class="<?php echo $patient_prescription_list->PreRoute->headerCellClass() ?>"><script id="tpc_patient_prescription_PreRoute" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->PreRoute) ?>', 1);"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->PreRoute->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->PreRoute->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->PreRoute->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->TimeOfTaking) == "") { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription_list->TimeOfTaking->headerCellClass() ?>"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_TimeOfTaking" type="text/html"><?php echo $patient_prescription_list->TimeOfTaking->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="TimeOfTaking" class="<?php echo $patient_prescription_list->TimeOfTaking->headerCellClass() ?>"><script id="tpc_patient_prescription_TimeOfTaking" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->TimeOfTaking) ?>', 1);"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->TimeOfTaking->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->TimeOfTaking->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->TimeOfTaking->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->Type->Visible) { // Type ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $patient_prescription_list->Type->headerCellClass() ?>" style="width: 12px;"><div id="elh_patient_prescription_Type" class="patient_prescription_Type"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Type" type="text/html"><?php echo $patient_prescription_list->Type->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $patient_prescription_list->Type->headerCellClass() ?>" style="width: 12px;"><script id="tpc_patient_prescription_Type" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->Type) ?>', 1);"><div id="elh_patient_prescription_Type" class="patient_prescription_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription_list->mrnno->headerCellClass() ?>"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_mrnno" type="text/html"><?php echo $patient_prescription_list->mrnno->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_prescription_list->mrnno->headerCellClass() ?>"><script id="tpc_patient_prescription_mrnno" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->mrnno) ?>', 1);"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->Age->Visible) { // Age ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_prescription_list->Age->headerCellClass() ?>"><div id="elh_patient_prescription_Age" class="patient_prescription_Age"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Age" type="text/html"><?php echo $patient_prescription_list->Age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_prescription_list->Age->headerCellClass() ?>"><script id="tpc_patient_prescription_Age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->Age) ?>', 1);"><div id="elh_patient_prescription_Age" class="patient_prescription_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription_list->Gender->headerCellClass() ?>"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Gender" type="text/html"><?php echo $patient_prescription_list->Gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_prescription_list->Gender->headerCellClass() ?>"><script id="tpc_patient_prescription_Gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->Gender) ?>', 1);"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->profilePic->Visible) { // profilePic ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription_list->profilePic->headerCellClass() ?>"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_profilePic" type="text/html"><?php echo $patient_prescription_list->profilePic->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $patient_prescription_list->profilePic->headerCellClass() ?>"><script id="tpc_patient_prescription_profilePic" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->profilePic) ?>', 1);"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->Status->Visible) { // Status ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $patient_prescription_list->Status->headerCellClass() ?>"><div id="elh_patient_prescription_Status" class="patient_prescription_Status"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_Status" type="text/html"><?php echo $patient_prescription_list->Status->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $patient_prescription_list->Status->headerCellClass() ?>"><script id="tpc_patient_prescription_Status" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->Status) ?>', 1);"><div id="elh_patient_prescription_Status" class="patient_prescription_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription_list->CreatedBy->headerCellClass() ?>"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_CreatedBy" type="text/html"><?php echo $patient_prescription_list->CreatedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_prescription_list->CreatedBy->headerCellClass() ?>"><script id="tpc_patient_prescription_CreatedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->CreatedBy) ?>', 1);"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->CreateDateTime->Visible) { // CreateDateTime ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->CreateDateTime) == "") { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription_list->CreateDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_CreateDateTime" type="text/html"><?php echo $patient_prescription_list->CreateDateTime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreateDateTime" class="<?php echo $patient_prescription_list->CreateDateTime->headerCellClass() ?>"><script id="tpc_patient_prescription_CreateDateTime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->CreateDateTime) ?>', 1);"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->CreateDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->CreateDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->CreateDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription_list->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_ModifiedBy" type="text/html"><?php echo $patient_prescription_list->ModifiedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_prescription_list->ModifiedBy->headerCellClass() ?>"><script id="tpc_patient_prescription_ModifiedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->ModifiedBy) ?>', 1);"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_prescription_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<?php if ($patient_prescription_list->SortUrl($patient_prescription_list->ModifiedDateTime) == "") { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription_list->ModifiedDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><div class="ew-table-header-caption"><script id="tpc_patient_prescription_ModifiedDateTime" type="text/html"><?php echo $patient_prescription_list->ModifiedDateTime->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDateTime" class="<?php echo $patient_prescription_list->ModifiedDateTime->headerCellClass() ?>"><script id="tpc_patient_prescription_ModifiedDateTime" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_prescription_list->SortUrl($patient_prescription_list->ModifiedDateTime) ?>', 1);"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_prescription_list->ModifiedDateTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_prescription_list->ModifiedDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_prescription_list->ModifiedDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_prescription_list->ListOptions->render("header", "right", "", "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($patient_prescription_list->isAdd() || $patient_prescription_list->isCopy()) {
		$patient_prescription_list->RowIndex = 0;
		$patient_prescription_list->KeyCount = $patient_prescription_list->RowIndex;
		if ($patient_prescription_list->isCopy() && !$patient_prescription_list->loadRow())
			$patient_prescription->CurrentAction = "add";
		if ($patient_prescription_list->isAdd())
			$patient_prescription_list->loadRowValues();
		if ($patient_prescription->EventCancelled) // Insert failed
			$patient_prescription_list->restoreFormValues(); // Restore form values

		// Set row properties
		$patient_prescription->resetAttributes();
		$patient_prescription->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_patient_prescription", "data-rowtype" => ROWTYPE_ADD]);
		$patient_prescription->RowType = ROWTYPE_ADD;

		// Render row
		$patient_prescription_list->renderRow();

		// Render list options
		$patient_prescription_list->renderListOptions();
		$patient_prescription_list->StartRowCount = 0;
?>
	<tr <?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_list->ListOptions->render("body", "left", $patient_prescription_list->RowCount, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	<?php if ($patient_prescription_list->id->Visible) { // id ?>
		<td data-name="id">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" class="form-group patient_prescription_id"></span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_list->RowIndex ?>_id" id="o<?php echo $patient_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if ($patient_prescription_list->Reception->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?php echo $patient_prescription_list->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_list->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Reception->EditValue ?>"<?php echo $patient_prescription_list->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_list->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if ($patient_prescription_list->PatientId->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?php echo $patient_prescription_list->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->PatientId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_list->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->PatientId->EditValue ?>"<?php echo $patient_prescription_list->PatientId->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_list->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->PatientName->EditValue ?>"<?php echo $patient_prescription_list->PatientName->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_list->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$onchange = $patient_prescription_list->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription_list->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_list->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_list->Medicine->ReadOnly || $patient_prescription_list->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_list->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_list->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->Medicine->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_Medicine") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_Medicine","forceSelect":false});
});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_list->Medicine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->M->Visible) { // M ?>
		<td data-name="M">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_list->RowIndex ?>_M" id="x<?php echo $patient_prescription_list->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->M->EditValue ?>"<?php echo $patient_prescription_list->M->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_list->RowIndex ?>_M" id="o<?php echo $patient_prescription_list->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_list->M->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->A->Visible) { // A ?>
		<td data-name="A">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_list->RowIndex ?>_A" id="x<?php echo $patient_prescription_list->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->A->EditValue ?>"<?php echo $patient_prescription_list->A->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_list->RowIndex ?>_A" id="o<?php echo $patient_prescription_list->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_list->A->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->N->Visible) { // N ?>
		<td data-name="N">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_list->RowIndex ?>_N" id="x<?php echo $patient_prescription_list->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->N->EditValue ?>"<?php echo $patient_prescription_list->N->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_list->RowIndex ?>_N" id="o<?php echo $patient_prescription_list->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_list->N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->NoOfDays->EditValue ?>"<?php echo $patient_prescription_list->NoOfDays->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_list->NoOfDays->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$onchange = $patient_prescription_list->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription_list->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_list->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_list->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_list->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_list->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_list->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_list->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->PreRoute->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_PreRoute") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_list->PreRoute->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$onchange = $patient_prescription_list->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_list->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_list->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_list->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_list->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_list->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->TimeOfTaking->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Type->Visible) { // Type ?>
		<td data-name="Type">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_list->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Type" name="x<?php echo $patient_prescription_list->RowIndex ?>_Type"<?php echo $patient_prescription_list->Type->editAttributes() ?>>
			<?php echo $patient_prescription_list->Type->selectOptionListHtml("x{$patient_prescription_list->RowIndex}_Type") ?>
		</select>
</div>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_list->RowIndex ?>_Type" id="o<?php echo $patient_prescription_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_list->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if ($patient_prescription_list->mrnno->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?php echo $patient_prescription_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_list->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->mrnno->EditValue ?>"<?php echo $patient_prescription_list->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_list->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Age->Visible) { // Age ?>
		<td data-name="Age">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_list->RowIndex ?>_Age" id="x<?php echo $patient_prescription_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Age->EditValue ?>"<?php echo $patient_prescription_list->Age->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_list->RowIndex ?>_Age" id="o<?php echo $patient_prescription_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_list->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Gender->EditValue ?>"<?php echo $patient_prescription_list->Gender->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_list->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_list->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->profilePic->editAttributes() ?>><?php echo $patient_prescription_list->profilePic->EditValue ?></textarea>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_list->profilePic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Status->Visible) { // Status ?>
		<td data-name="Status">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Status" name="x<?php echo $patient_prescription_list->RowIndex ?>_Status"<?php echo $patient_prescription_list->Status->editAttributes() ?>>
			<?php echo $patient_prescription_list->Status->selectOptionListHtml("x{$patient_prescription_list->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_list->Status->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_Status") ?>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_list->RowIndex ?>_Status" id="o<?php echo $patient_prescription_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_list->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->CreatedBy->EditValue ?>"<?php echo $patient_prescription_list->CreatedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_list->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_list->CreateDateTime->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_list->CreateDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_list->ModifiedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_list->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime">
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_list->ModifiedDateTime->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_list->ModifiedDateTime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_list->ListOptions->render("body", "right", $patient_prescription_list->RowCount, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
<script class="patient_prescriptionlist_js" type="text/html">
loadjs.ready(["fpatient_prescriptionlist", "load"], function() {
	fpatient_prescriptionlist.updateLists(<?php echo $patient_prescription_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($patient_prescription_list->ExportAll && $patient_prescription_list->isExport()) {
	$patient_prescription_list->StopRecord = $patient_prescription_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_prescription_list->TotalRecords > $patient_prescription_list->StartRecord + $patient_prescription_list->DisplayRecords - 1)
		$patient_prescription_list->StopRecord = $patient_prescription_list->StartRecord + $patient_prescription_list->DisplayRecords - 1;
	else
		$patient_prescription_list->StopRecord = $patient_prescription_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($patient_prescription->isConfirm() || $patient_prescription_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_prescription_list->FormKeyCountName) && ($patient_prescription_list->isGridAdd() || $patient_prescription_list->isGridEdit() || $patient_prescription->isConfirm())) {
		$patient_prescription_list->KeyCount = $CurrentForm->getValue($patient_prescription_list->FormKeyCountName);
		$patient_prescription_list->StopRecord = $patient_prescription_list->StartRecord + $patient_prescription_list->KeyCount - 1;
	}
}
$patient_prescription_list->RecordCount = $patient_prescription_list->StartRecord - 1;
if ($patient_prescription_list->Recordset && !$patient_prescription_list->Recordset->EOF) {
	$patient_prescription_list->Recordset->moveFirst();
	$selectLimit = $patient_prescription_list->UseSelectLimit;
	if (!$selectLimit && $patient_prescription_list->StartRecord > 1)
		$patient_prescription_list->Recordset->move($patient_prescription_list->StartRecord - 1);
} elseif (!$patient_prescription->AllowAddDeleteRow && $patient_prescription_list->StopRecord == 0) {
	$patient_prescription_list->StopRecord = $patient_prescription->GridAddRowCount;
}

// Initialize aggregate
$patient_prescription->RowType = ROWTYPE_AGGREGATEINIT;
$patient_prescription->resetAttributes();
$patient_prescription_list->renderRow();
$patient_prescription_list->EditRowCount = 0;
if ($patient_prescription_list->isEdit())
	$patient_prescription_list->RowIndex = 1;
if ($patient_prescription_list->isGridAdd())
	$patient_prescription_list->RowIndex = 0;
if ($patient_prescription_list->isGridEdit())
	$patient_prescription_list->RowIndex = 0;
while ($patient_prescription_list->RecordCount < $patient_prescription_list->StopRecord) {
	$patient_prescription_list->RecordCount++;
	if ($patient_prescription_list->RecordCount >= $patient_prescription_list->StartRecord) {
		$patient_prescription_list->RowCount++;
		if ($patient_prescription_list->isGridAdd() || $patient_prescription_list->isGridEdit() || $patient_prescription->isConfirm()) {
			$patient_prescription_list->RowIndex++;
			$CurrentForm->Index = $patient_prescription_list->RowIndex;
			if ($CurrentForm->hasValue($patient_prescription_list->FormActionName) && ($patient_prescription->isConfirm() || $patient_prescription_list->EventCancelled))
				$patient_prescription_list->RowAction = strval($CurrentForm->getValue($patient_prescription_list->FormActionName));
			elseif ($patient_prescription_list->isGridAdd())
				$patient_prescription_list->RowAction = "insert";
			else
				$patient_prescription_list->RowAction = "";
		}

		// Set up key count
		$patient_prescription_list->KeyCount = $patient_prescription_list->RowIndex;

		// Init row class and style
		$patient_prescription->resetAttributes();
		$patient_prescription->CssClass = "";
		if ($patient_prescription_list->isGridAdd()) {
			$patient_prescription_list->loadRowValues(); // Load default values
		} else {
			$patient_prescription_list->loadRowValues($patient_prescription_list->Recordset); // Load row values
		}
		$patient_prescription->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_prescription_list->isGridAdd()) // Grid add
			$patient_prescription->RowType = ROWTYPE_ADD; // Render add
		if ($patient_prescription_list->isGridAdd() && $patient_prescription->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_prescription_list->restoreCurrentRowFormValues($patient_prescription_list->RowIndex); // Restore form values
		if ($patient_prescription_list->isEdit()) {
			if ($patient_prescription_list->checkInlineEditKey() && $patient_prescription_list->EditRowCount == 0) { // Inline edit
				$patient_prescription->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($patient_prescription_list->isGridEdit()) { // Grid edit
			if ($patient_prescription->EventCancelled)
				$patient_prescription_list->restoreCurrentRowFormValues($patient_prescription_list->RowIndex); // Restore form values
			if ($patient_prescription_list->RowAction == "insert")
				$patient_prescription->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_prescription->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_prescription_list->isEdit() && $patient_prescription->RowType == ROWTYPE_EDIT && $patient_prescription->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$patient_prescription_list->restoreFormValues(); // Restore form values
		}
		if ($patient_prescription_list->isGridEdit() && ($patient_prescription->RowType == ROWTYPE_EDIT || $patient_prescription->RowType == ROWTYPE_ADD) && $patient_prescription->EventCancelled) // Update failed
			$patient_prescription_list->restoreCurrentRowFormValues($patient_prescription_list->RowIndex); // Restore form values
		if ($patient_prescription->RowType == ROWTYPE_EDIT) // Edit row
			$patient_prescription_list->EditRowCount++;

		// Set up row id / data-rowindex
		$patient_prescription->RowAttrs->merge(["data-rowindex" => $patient_prescription_list->RowCount, "id" => "r" . $patient_prescription_list->RowCount . "_patient_prescription", "data-rowtype" => $patient_prescription->RowType]);

		// Render row
		$patient_prescription_list->renderRow();

		// Render list options
		$patient_prescription_list->renderListOptions();

		// Save row and cell attributes
		$patient_prescription_list->Attrs[$patient_prescription_list->RowCount] = ["row_attrs" => $patient_prescription->rowAttributes(), "cell_attrs" => []];
		$patient_prescription_list->Attrs[$patient_prescription_list->RowCount]["cell_attrs"] = $patient_prescription->fieldCellAttributes();

		// Skip delete row / empty row for confirm page
		if ($patient_prescription_list->RowAction != "delete" && $patient_prescription_list->RowAction != "insertdelete" && !($patient_prescription_list->RowAction == "insert" && $patient_prescription->isConfirm() && $patient_prescription_list->emptyRow())) {
?>
	<tr <?php echo $patient_prescription->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_prescription_list->ListOptions->render("body", "left", $patient_prescription_list->RowCount, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	<?php if ($patient_prescription_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_prescription_list->id->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" class="form-group"></span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="o<?php echo $patient_prescription_list->RowIndex ?>_id" id="o<?php echo $patient_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_list->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" class="form-group">
<span<?php echo $patient_prescription_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x<?php echo $patient_prescription_list->RowIndex ?>_id" id="x<?php echo $patient_prescription_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_prescription_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_id">
<span<?php echo $patient_prescription_list->id->viewAttributes() ?>><?php echo $patient_prescription_list->id->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_prescription_list->Reception->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription_list->Reception->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?php echo $patient_prescription_list->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->Reception->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_list->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Reception->EditValue ?>"<?php echo $patient_prescription_list->Reception->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="o<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_list->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?php echo $patient_prescription_list->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" id="x<?php echo $patient_prescription_list->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_prescription_list->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Reception">
<span<?php echo $patient_prescription_list->Reception->viewAttributes() ?>><?php echo $patient_prescription_list->Reception->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_prescription_list->PatientId->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription_list->PatientId->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?php echo $patient_prescription_list->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->PatientId->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_list->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->PatientId->EditValue ?>"<?php echo $patient_prescription_list->PatientId->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_list->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?php echo $patient_prescription_list->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->PatientId->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_prescription_list->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientId">
<span<?php echo $patient_prescription_list->PatientId->viewAttributes() ?>><?php echo $patient_prescription_list->PatientId->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_prescription_list->PatientName->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->PatientName->EditValue ?>"<?php echo $patient_prescription_list->PatientName->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" name="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="o<?php echo $patient_prescription_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_prescription_list->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" id="x<?php echo $patient_prescription_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->PatientName->EditValue ?>"<?php echo $patient_prescription_list->PatientName->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PatientName">
<span<?php echo $patient_prescription_list->PatientName->viewAttributes() ?>><?php echo $patient_prescription_list->PatientName->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Medicine->Visible) { // Medicine ?>
		<td data-name="Medicine" <?php echo $patient_prescription_list->Medicine->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $patient_prescription_list->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription_list->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_list->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_list->Medicine->ReadOnly || $patient_prescription_list->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_list->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_list->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->Medicine->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_Medicine") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_Medicine","forceSelect":false});
});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" name="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="o<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_list->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $patient_prescription_list->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo RemoveHtml($patient_prescription_list->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_list->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_list->Medicine->ReadOnly || $patient_prescription_list->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_list->Medicine->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" id="x<?php echo $patient_prescription_list->RowIndex ?>_Medicine" value="<?php echo HtmlEncode($patient_prescription_list->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->Medicine->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_Medicine") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_Medicine","forceSelect":false});
});
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Medicine">
<span<?php echo $patient_prescription_list->Medicine->viewAttributes() ?>><?php echo $patient_prescription_list->Medicine->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->M->Visible) { // M ?>
		<td data-name="M" <?php echo $patient_prescription_list->M->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_list->RowIndex ?>_M" id="x<?php echo $patient_prescription_list->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->M->EditValue ?>"<?php echo $patient_prescription_list->M->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_M" name="o<?php echo $patient_prescription_list->RowIndex ?>_M" id="o<?php echo $patient_prescription_list->RowIndex ?>_M" value="<?php echo HtmlEncode($patient_prescription_list->M->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x<?php echo $patient_prescription_list->RowIndex ?>_M" id="x<?php echo $patient_prescription_list->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->M->EditValue ?>"<?php echo $patient_prescription_list->M->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_M">
<span<?php echo $patient_prescription_list->M->viewAttributes() ?>><?php echo $patient_prescription_list->M->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->A->Visible) { // A ?>
		<td data-name="A" <?php echo $patient_prescription_list->A->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_list->RowIndex ?>_A" id="x<?php echo $patient_prescription_list->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->A->EditValue ?>"<?php echo $patient_prescription_list->A->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_A" name="o<?php echo $patient_prescription_list->RowIndex ?>_A" id="o<?php echo $patient_prescription_list->RowIndex ?>_A" value="<?php echo HtmlEncode($patient_prescription_list->A->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x<?php echo $patient_prescription_list->RowIndex ?>_A" id="x<?php echo $patient_prescription_list->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->A->EditValue ?>"<?php echo $patient_prescription_list->A->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_A">
<span<?php echo $patient_prescription_list->A->viewAttributes() ?>><?php echo $patient_prescription_list->A->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->N->Visible) { // N ?>
		<td data-name="N" <?php echo $patient_prescription_list->N->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_list->RowIndex ?>_N" id="x<?php echo $patient_prescription_list->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->N->EditValue ?>"<?php echo $patient_prescription_list->N->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_N" name="o<?php echo $patient_prescription_list->RowIndex ?>_N" id="o<?php echo $patient_prescription_list->RowIndex ?>_N" value="<?php echo HtmlEncode($patient_prescription_list->N->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x<?php echo $patient_prescription_list->RowIndex ?>_N" id="x<?php echo $patient_prescription_list->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_list->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->N->EditValue ?>"<?php echo $patient_prescription_list->N->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_N">
<span<?php echo $patient_prescription_list->N->viewAttributes() ?>><?php echo $patient_prescription_list->N->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->NoOfDays->Visible) { // NoOfDays ?>
		<td data-name="NoOfDays" <?php echo $patient_prescription_list->NoOfDays->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->NoOfDays->EditValue ?>"<?php echo $patient_prescription_list->NoOfDays->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" name="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="o<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" value="<?php echo HtmlEncode($patient_prescription_list->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" id="x<?php echo $patient_prescription_list->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->NoOfDays->EditValue ?>"<?php echo $patient_prescription_list->NoOfDays->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_NoOfDays">
<span<?php echo $patient_prescription_list->NoOfDays->viewAttributes() ?>><?php echo $patient_prescription_list->NoOfDays->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->PreRoute->Visible) { // PreRoute ?>
		<td data-name="PreRoute" <?php echo $patient_prescription_list->PreRoute->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $patient_prescription_list->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription_list->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_list->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_list->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_list->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_list->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_list->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_list->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->PreRoute->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_PreRoute") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" name="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="o<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_list->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $patient_prescription_list->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo RemoveHtml($patient_prescription_list->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_list->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_list->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_list->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_list->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_list->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" id="x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute" value="<?php echo HtmlEncode($patient_prescription_list->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->PreRoute->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_PreRoute") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_PreRoute">
<span<?php echo $patient_prescription_list->PreRoute->viewAttributes() ?>><?php echo $patient_prescription_list->PreRoute->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td data-name="TimeOfTaking" <?php echo $patient_prescription_list->TimeOfTaking->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $patient_prescription_list->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_list->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_list->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_list->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_list->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_list->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->TimeOfTaking->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" name="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="o<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $patient_prescription_list->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_list->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="sv_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_list->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_list->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_list->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_list->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_list->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" id="x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_list->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $patient_prescription_list->TimeOfTaking->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_TimeOfTaking") ?>
</span></script>
<script type="text/html" class="patient_prescriptionlist_js">
loadjs.ready(["fpatient_prescriptionlist"], function() {
	fpatient_prescriptionlist.createAutoSuggest({"id":"x<?php echo $patient_prescription_list->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription_list->TimeOfTaking->viewAttributes() ?>><?php echo $patient_prescription_list->TimeOfTaking->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $patient_prescription_list->Type->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_list->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Type" name="x<?php echo $patient_prescription_list->RowIndex ?>_Type"<?php echo $patient_prescription_list->Type->editAttributes() ?>>
			<?php echo $patient_prescription_list->Type->selectOptionListHtml("x{$patient_prescription_list->RowIndex}_Type") ?>
		</select>
</div>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" name="o<?php echo $patient_prescription_list->RowIndex ?>_Type" id="o<?php echo $patient_prescription_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($patient_prescription_list->Type->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_list->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Type" name="x<?php echo $patient_prescription_list->RowIndex ?>_Type"<?php echo $patient_prescription_list->Type->editAttributes() ?>>
			<?php echo $patient_prescription_list->Type->selectOptionListHtml("x{$patient_prescription_list->RowIndex}_Type") ?>
		</select>
</div>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Type">
<span<?php echo $patient_prescription_list->Type->viewAttributes() ?>><?php echo $patient_prescription_list->Type->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_prescription_list->mrnno->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_prescription_list->mrnno->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?php echo $patient_prescription_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_list->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->mrnno->EditValue ?>"<?php echo $patient_prescription_list->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="o<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_list->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?php echo $patient_prescription_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_list->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" id="x<?php echo $patient_prescription_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_prescription_list->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_mrnno">
<span<?php echo $patient_prescription_list->mrnno->viewAttributes() ?>><?php echo $patient_prescription_list->mrnno->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_prescription_list->Age->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_list->RowIndex ?>_Age" id="x<?php echo $patient_prescription_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Age->EditValue ?>"<?php echo $patient_prescription_list->Age->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" name="o<?php echo $patient_prescription_list->RowIndex ?>_Age" id="o<?php echo $patient_prescription_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_prescription_list->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x<?php echo $patient_prescription_list->RowIndex ?>_Age" id="x<?php echo $patient_prescription_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Age->EditValue ?>"<?php echo $patient_prescription_list->Age->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Age">
<span<?php echo $patient_prescription_list->Age->viewAttributes() ?>><?php echo $patient_prescription_list->Age->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_prescription_list->Gender->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Gender->EditValue ?>"<?php echo $patient_prescription_list->Gender->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" name="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="o<?php echo $patient_prescription_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_prescription_list->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" id="x<?php echo $patient_prescription_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->Gender->EditValue ?>"<?php echo $patient_prescription_list->Gender->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Gender">
<span<?php echo $patient_prescription_list->Gender->viewAttributes() ?>><?php echo $patient_prescription_list->Gender->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $patient_prescription_list->profilePic->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_list->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->profilePic->editAttributes() ?>><?php echo $patient_prescription_list->profilePic->EditValue ?></textarea>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" name="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="o<?php echo $patient_prescription_list->RowIndex ?>_profilePic" value="<?php echo HtmlEncode($patient_prescription_list->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" id="x<?php echo $patient_prescription_list->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_list->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_list->profilePic->editAttributes() ?>><?php echo $patient_prescription_list->profilePic->EditValue ?></textarea>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_profilePic">
<span<?php echo $patient_prescription_list->profilePic->viewAttributes() ?>><?php echo $patient_prescription_list->profilePic->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $patient_prescription_list->Status->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Status" name="x<?php echo $patient_prescription_list->RowIndex ?>_Status"<?php echo $patient_prescription_list->Status->editAttributes() ?>>
			<?php echo $patient_prescription_list->Status->selectOptionListHtml("x{$patient_prescription_list->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_list->Status->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_Status") ?>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" name="o<?php echo $patient_prescription_list->RowIndex ?>_Status" id="o<?php echo $patient_prescription_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($patient_prescription_list->Status->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_list->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_prescription_list->RowIndex ?>_Status" name="x<?php echo $patient_prescription_list->RowIndex ?>_Status"<?php echo $patient_prescription_list->Status->editAttributes() ?>>
			<?php echo $patient_prescription_list->Status->selectOptionListHtml("x{$patient_prescription_list->RowIndex}_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_list->Status->Lookup->getParamTag($patient_prescription_list, "p_x" . $patient_prescription_list->RowIndex . "_Status") ?>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_Status">
<span<?php echo $patient_prescription_list->Status->viewAttributes() ?>><?php echo $patient_prescription_list->Status->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $patient_prescription_list->CreatedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->CreatedBy->EditValue ?>"<?php echo $patient_prescription_list->CreatedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_prescription_list->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->CreatedBy->EditValue ?>"<?php echo $patient_prescription_list->CreatedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreatedBy">
<span<?php echo $patient_prescription_list->CreatedBy->viewAttributes() ?>><?php echo $patient_prescription_list->CreatedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->CreateDateTime->Visible) { // CreateDateTime ?>
		<td data-name="CreateDateTime" <?php echo $patient_prescription_list->CreateDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_list->CreateDateTime->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" value="<?php echo HtmlEncode($patient_prescription_list->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_list->CreateDateTime->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription_list->CreateDateTime->viewAttributes() ?>><?php echo $patient_prescription_list->CreateDateTime->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $patient_prescription_list->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_list->ModifiedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_prescription_list->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_list->ModifiedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription_list->ModifiedBy->viewAttributes() ?>><?php echo $patient_prescription_list->ModifiedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_prescription_list->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td data-name="ModifiedDateTime" <?php echo $patient_prescription_list->ModifiedDateTime->cellAttributes() ?>>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_list->ModifiedDateTime->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="o<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" value="<?php echo HtmlEncode($patient_prescription_list->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" id="x<?php echo $patient_prescription_list->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_list->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_list->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_list->ModifiedDateTime->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_prescription->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime" type="text/html"><span id="el<?php echo $patient_prescription_list->RowCount ?>_patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription_list->ModifiedDateTime->viewAttributes() ?>><?php echo $patient_prescription_list->ModifiedDateTime->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_prescription_list->ListOptions->render("body", "right", $patient_prescription_list->RowCount, "block", $patient_prescription->TableVar, "patient_prescriptionlist");
?>
	</tr>
<?php if ($patient_prescription->RowType == ROWTYPE_ADD || $patient_prescription->RowType == ROWTYPE_EDIT) { ?>
<script class="patient_prescriptionlist_js" type="text/html">
loadjs.ready(["fpatient_prescriptionlist", "load"], function() {
	fpatient_prescriptionlist.updateLists(<?php echo $patient_prescription_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_prescription_list->isGridAdd())
		if (!$patient_prescription_list->Recordset->EOF)
			$patient_prescription_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_patient_prescriptionlist" class="ew-custom-template"></div>
<script id="tpm_patient_prescriptionlist" type="text/html">
<div id="ct_patient_prescription_list"><?php if ($patient_prescription_list->RowCount > 0) { ?>
<div style="overflow-x:auto;">
<table class="ew-table">
	<thead>
	<col>
		<col>
		<colgroup span="3" style="background-color:#adff2f;"></colgroup>
		<col>
		<col>
		<col>
		<col>
		<col>
		<tr>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th class="text-center" colspan="3" scope="colgroup">Dose</th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
		</tr>
		<tr class="ew-table-header">
		<td class="text-center" >*</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_Medicine")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_M")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_A")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_N")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_NoOfDays")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_PreRoute")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_TimeOfTaking")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_Type")/}}</td>
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_prescription_Status")/}}</td>
		</tr>    
	</thead> 
<tbody>
<?php for ($i = $patient_prescription_list->StartRowCount; $i <= $patient_prescription_list->RowCount; $i++) { ?>
<tr<?php echo @$patient_prescription_list->Attrs[$i]['row_attrs'] ?>>
<td class="ew-list-option-body text-nowrap" data-name="button"><div style="width: 25px;"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ew.deleteGridRow(this, <?php echo $i ?>);" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fa-trash ew-icon" data-caption="Delete"></i></a></div></div></td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_Medicine")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_M")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_A")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_N")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_NoOfDays")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_PreRoute")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_TimeOfTaking")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_Type")/}}</td>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_prescription_Status")/}}</td>
</tr>

<?php } ?>
<?php if ($patient_prescription_list->TotalRecords > 0 && !$patient_prescription->isGridAdd() && !$patient_prescription->isGridEdit()) { ?>
 </tbody>
</table>
</div>
<?php } ?>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_prescription_list->isAdd() || $patient_prescription_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php } ?>
<?php if ($patient_prescription_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php echo $patient_prescription_list->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_prescription_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php } ?>
<?php if ($patient_prescription_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $patient_prescription_list->FormKeyCountName ?>" id="<?php echo $patient_prescription_list->FormKeyCountName ?>" value="<?php echo $patient_prescription_list->KeyCount ?>">
<?php echo $patient_prescription_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$patient_prescription->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_prescription_list->Recordset)
	$patient_prescription_list->Recordset->Close();
?>
<?php if (!$patient_prescription_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_prescription_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_prescription_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_prescription_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_prescription_list->TotalRecords == 0 && !$patient_prescription->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_prescription_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_prescription->Rows) ?> };
	ew.applyTemplate("tpd_patient_prescriptionlist", "tpm_patient_prescriptionlist", "patient_prescriptionlist", "<?php echo $patient_prescription->CustomExport ?>", ew.templateData);
	$("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.patient_prescriptionlist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_prescription_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_prescription_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	 var c = document.getElementById("el_ip_admission_profilePic").children;
	 var d = c[0].children;
	 var evalue = c[0].innerText;

	 //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
		var myParent =  document.getElementById("tpd_ip_admissionmaster");
		var t = document.createTextNode("Select Drug Template : ");
		myParent.appendChild(t);

	//Create array of options to be added
	var array = ["Volvo","Saab","Mercades","Audi"];

	//Create and append select list
	var selectList = document.createElement("select");
	selectList.id = "mySelect";
	myParent.appendChild(selectList);

	//Create and append the options
	//for (var i = 0; i < array.length; i++) {
	//    var option = document.createElement("option");
	//    option.value = array[i];
	//    option.text = array[i];
	//    selectList.appendChild(option);
	//}

		var btn = document.createElement("BUTTON");   // Create a <button> element
		btn.innerHTML = "Select";                   // Insert text
		btn.addEventListener("click", myScriptSelect);
	myParent.appendChild(btn);               // Append <button> to <body>
			var user = [{
				'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
			}];

		//v
			var jsonString = JSON.stringify(user);
				$.ajax({
					type: "POST",
					url: "ajaxinsert.php?control=selectTemplatePRE",
					data: { data: jsonString },
					cache: false,
					success: function (data) {
						let jsonObject = JSON.parse(data);
						var json = jsonObject["records"];
						for(var i = 0; i < json.length; i++) {
							var obj = json[i];
							console.log(obj.id);
							 var option = document.createElement("option");
		option.value = obj.TemplateName;
		option.text = obj.TemplateName;
		selectList.appendChild(option);
						  }

						//alert(data + "Saved Sucessfully...........");
						//swal({ text: "Saved Sucessfully......", icon: "success", });
					   // Receiptreset();
					  //  document.getElementById("VoucherAmt0").focus();

					}
				});
		for (var i = 0; i < 20; i++) {
			var kkk = $('*[data-caption="Add Blank Row"]')
			ew.addGridRow(kkk);
		}

		function myScriptSelect() {

		   // alert("hai");
	//n

			var hhhh = document.getElementById("mySelect");
					var user = [{
						'CustomerName': '<?php  echo CurrentUserName();  ?>',
						'TemplateName': hhhh.value
			}];

		//v
			var jsonString = JSON.stringify(user);
				$.ajax({
					type: "POST",
					url: "ajaxinsert.php?control=selectTemplatePREItem",
					data: { data: jsonString },
					cache: false,
					success: function (data) {
						let jsonObject = JSON.parse(data);
						var json = jsonObject["records"];
						for(var i = 0; i < json.length; i++) {
							var obj = json[i];
							console.log(obj.id);
							 var option = document.createElement("option");
		option.value = obj.TemplateName;
		option.text = obj.TemplateName;
							selectList.appendChild(option);
							var Medicine = document.getElementById("sv_x"+(i+1)+"_Medicine");
							Medicine.value = obj.Medicine;
							Medicine.innerHTML  = obj.Medicine;
							Medicine.selectedIndex = obj.Medicine;
							Medicine.value = obj.Medicine;
							Medicine.text = obj.Medicine;
							var Medicine = document.getElementById("x"+(i+1)+"_Medicine");
							Medicine.value = obj.Medicine;
							var M = document.getElementById("x"+(i+1)+"_M");
							M.value = obj.M;
							var A = document.getElementById("x"+(i+1)+"_A");
							A.value = obj.A;
							var N = document.getElementById("x"+(i+1)+"_N");
							N.value = obj.N;
							var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
							NoOfDays.value = obj.NoOfDays;
							var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
							PreRoute.value = obj.PreRoute;
							  var PreRoute = document.getElementById("x"+(i+1)+"_PreRoute");
							PreRoute.value = obj.PreRoute;
							var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
							TimeOfTaking.value = obj.TimeOfTaking;
								var TimeOfTaking = document.getElementById("x"+(i+1)+"_TimeOfTaking");
							TimeOfTaking.value = obj.TimeOfTaking;
							   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
							TimeOfTaking.value = 'Normal';
							var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
							TimeOfTaking.value = 'Live';
						  }

						//alert(data + "Saved Sucessfully...........");
						//swal({ text: "Saved Sucessfully......", icon: "success", });
					   // Receiptreset();
					  //  document.getElementById("VoucherAmt0").focus();

					}
				});
		}
	 </script>
	<style>
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: unset;
		align-items: stretch;
		width: 100%;
	}
	.ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
		padding: .0rem;
		border-bottom: 1px solid;
		border-top: 0;
		border-left: 0;
		border-right: 1px solid;
		border-color: silver;
	}
	.text-nowrap {
		white-space: nowrap !important;
		line-height: 1;
		height: 33px;
	}
	</style>
	<script>
	jQuery("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 1});
	jQuery("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 1});
});
</script>
<?php if (!$patient_prescription->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_prescription",
		width: "100%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_prescription_list->terminate();
?>