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
$patient_investigations_list = new patient_investigations_list();

// Run the page
$patient_investigations_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_investigations_list->isExport()) { ?>
<script>
var fpatient_investigationslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_investigationslist = currentForm = new ew.Form("fpatient_investigationslist", "list");
	fpatient_investigationslist.formKeyCountName = '<?php echo $patient_investigations_list->FormKeyCountName ?>';

	// Validate form
	fpatient_investigationslist.validate = function() {
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
			<?php if ($patient_investigations_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->id->caption(), $patient_investigations_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Investigation->Required) { ?>
				elm = this.getElements("x" + infix + "_Investigation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Investigation->caption(), $patient_investigations_list->Investigation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Value->Required) { ?>
				elm = this.getElements("x" + infix + "_Value");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Value->caption(), $patient_investigations_list->Value->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->NormalRange->Required) { ?>
				elm = this.getElements("x" + infix + "_NormalRange");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->NormalRange->caption(), $patient_investigations_list->NormalRange->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->mrnno->caption(), $patient_investigations_list->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Age->caption(), $patient_investigations_list->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Gender->caption(), $patient_investigations_list->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->SampleCollected->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->SampleCollected->caption(), $patient_investigations_list->SampleCollected->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleCollected");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_list->SampleCollected->errorMessage()) ?>");
			<?php if ($patient_investigations_list->SampleCollectedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleCollectedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->SampleCollectedBy->caption(), $patient_investigations_list->SampleCollectedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->ResultedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->ResultedDate->caption(), $patient_investigations_list->ResultedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_list->ResultedDate->errorMessage()) ?>");
			<?php if ($patient_investigations_list->ResultedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->ResultedBy->caption(), $patient_investigations_list->ResultedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Modified->caption(), $patient_investigations_list->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_list->Modified->errorMessage()) ?>");
			<?php if ($patient_investigations_list->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->ModifiedBy->caption(), $patient_investigations_list->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Created->Required) { ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Created->caption(), $patient_investigations_list->Created->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Created");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_list->Created->errorMessage()) ?>");
			<?php if ($patient_investigations_list->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->CreatedBy->caption(), $patient_investigations_list->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->GroupHead->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupHead");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->GroupHead->caption(), $patient_investigations_list->GroupHead->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->Cost->Required) { ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->Cost->caption(), $patient_investigations_list->Cost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Cost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_investigations_list->Cost->errorMessage()) ?>");
			<?php if ($patient_investigations_list->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->PaymentStatus->caption(), $patient_investigations_list->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->PayMode->Required) { ?>
				elm = this.getElements("x" + infix + "_PayMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->PayMode->caption(), $patient_investigations_list->PayMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_investigations_list->VoucherNo->Required) { ?>
				elm = this.getElements("x" + infix + "_VoucherNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_investigations_list->VoucherNo->caption(), $patient_investigations_list->VoucherNo->RequiredErrorMessage)) ?>");
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
	fpatient_investigationslist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Investigation", false)) return false;
		if (ew.valueChanged(fobj, infix, "Value", false)) return false;
		if (ew.valueChanged(fobj, infix, "NormalRange", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		if (ew.valueChanged(fobj, infix, "Age", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
		if (ew.valueChanged(fobj, infix, "SampleCollected", false)) return false;
		if (ew.valueChanged(fobj, infix, "SampleCollectedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "ResultedDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "ResultedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "Modified", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModifiedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "Created", false)) return false;
		if (ew.valueChanged(fobj, infix, "CreatedBy", false)) return false;
		if (ew.valueChanged(fobj, infix, "GroupHead", false)) return false;
		if (ew.valueChanged(fobj, infix, "Cost", false)) return false;
		if (ew.valueChanged(fobj, infix, "PaymentStatus", false)) return false;
		if (ew.valueChanged(fobj, infix, "PayMode", false)) return false;
		if (ew.valueChanged(fobj, infix, "VoucherNo", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_investigationslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_investigationslist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpatient_investigationslist");
});
var fpatient_investigationslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_investigationslistsrch = currentSearchForm = new ew.Form("fpatient_investigationslistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_investigationslistsrch.filterList = <?php echo $patient_investigations_list->getFilterList() ?>;
	loadjs.done("fpatient_investigationslistsrch");
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
<?php if (!$patient_investigations_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_investigations_list->TotalRecords > 0 && $patient_investigations_list->ExportOptions->visible()) { ?>
<?php $patient_investigations_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_investigations_list->ImportOptions->visible()) { ?>
<?php $patient_investigations_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_investigations_list->SearchOptions->visible()) { ?>
<?php $patient_investigations_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_investigations_list->FilterOptions->visible()) { ?>
<?php $patient_investigations_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_investigations_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_investigations_list->isExport("print")) { ?>
<?php
if ($patient_investigations_list->DbMasterFilter != "" && $patient_investigations->getCurrentMasterTable() == "ip_admission") {
	if ($patient_investigations_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_investigations_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_investigations_list->isExport() && !$patient_investigations->CurrentAction) { ?>
<form name="fpatient_investigationslistsrch" id="fpatient_investigationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_investigationslistsrch-search-panel" class="<?php echo $patient_investigations_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_investigations">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_investigations_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_investigations_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_investigations_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_investigations_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_investigations_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_investigations_list->showPageHeader(); ?>
<?php
$patient_investigations_list->showMessage();
?>
<?php if ($patient_investigations_list->TotalRecords > 0 || $patient_investigations->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_investigations_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_investigations">
<?php if (!$patient_investigations_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_investigations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_investigations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_investigations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_investigationslist" id="fpatient_investigationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<?php if ($patient_investigations->getCurrentMasterTable() == "ip_admission" && $patient_investigations->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_investigations_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_investigations_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_investigations_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_investigations" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_investigations_list->TotalRecords > 0 || $patient_investigations_list->isGridEdit()) { ?>
<table id="tbl_patient_investigationslist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_investigations->RowType = ROWTYPE_HEADER;

// Render list options
$patient_investigations_list->renderListOptions();

// Render list options (header, left)
$patient_investigations_list->ListOptions->render("header", "left", "", "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
<?php if ($patient_investigations_list->id->Visible) { // id ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_investigations_list->id->headerCellClass() ?>"><div id="elh_patient_investigations_id" class="patient_investigations_id"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_id" type="text/html"><?php echo $patient_investigations_list->id->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_investigations_list->id->headerCellClass() ?>"><script id="tpc_patient_investigations_id" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->id) ?>', 1);"><div id="elh_patient_investigations_id" class="patient_investigations_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Investigation->Visible) { // Investigation ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Investigation) == "") { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations_list->Investigation->headerCellClass() ?>"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Investigation" type="text/html"><?php echo $patient_investigations_list->Investigation->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Investigation" class="<?php echo $patient_investigations_list->Investigation->headerCellClass() ?>"><script id="tpc_patient_investigations_Investigation" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Investigation) ?>', 1);"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Investigation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Investigation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Investigation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Value->Visible) { // Value ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Value) == "") { ?>
		<th data-name="Value" class="<?php echo $patient_investigations_list->Value->headerCellClass() ?>"><div id="elh_patient_investigations_Value" class="patient_investigations_Value"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Value" type="text/html"><?php echo $patient_investigations_list->Value->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Value" class="<?php echo $patient_investigations_list->Value->headerCellClass() ?>"><script id="tpc_patient_investigations_Value" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Value) ?>', 1);"><div id="elh_patient_investigations_Value" class="patient_investigations_Value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Value->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Value->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Value->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->NormalRange->Visible) { // NormalRange ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->NormalRange) == "") { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations_list->NormalRange->headerCellClass() ?>"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_NormalRange" type="text/html"><?php echo $patient_investigations_list->NormalRange->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="NormalRange" class="<?php echo $patient_investigations_list->NormalRange->headerCellClass() ?>"><script id="tpc_patient_investigations_NormalRange" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->NormalRange) ?>', 1);"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->NormalRange->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->NormalRange->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->NormalRange->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations_list->mrnno->headerCellClass() ?>"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_mrnno" type="text/html"><?php echo $patient_investigations_list->mrnno->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_investigations_list->mrnno->headerCellClass() ?>"><script id="tpc_patient_investigations_mrnno" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->mrnno) ?>', 1);"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Age->Visible) { // Age ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_investigations_list->Age->headerCellClass() ?>"><div id="elh_patient_investigations_Age" class="patient_investigations_Age"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Age" type="text/html"><?php echo $patient_investigations_list->Age->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_investigations_list->Age->headerCellClass() ?>"><script id="tpc_patient_investigations_Age" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Age) ?>', 1);"><div id="elh_patient_investigations_Age" class="patient_investigations_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations_list->Gender->headerCellClass() ?>"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Gender" type="text/html"><?php echo $patient_investigations_list->Gender->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_investigations_list->Gender->headerCellClass() ?>"><script id="tpc_patient_investigations_Gender" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Gender) ?>', 1);"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->SampleCollected->Visible) { // SampleCollected ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->SampleCollected) == "") { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations_list->SampleCollected->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_SampleCollected" type="text/html"><?php echo $patient_investigations_list->SampleCollected->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollected" class="<?php echo $patient_investigations_list->SampleCollected->headerCellClass() ?>"><script id="tpc_patient_investigations_SampleCollected" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->SampleCollected) ?>', 1);"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->SampleCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->SampleCollected->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->SampleCollected->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->SampleCollectedBy) == "") { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations_list->SampleCollectedBy->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_SampleCollectedBy" type="text/html"><?php echo $patient_investigations_list->SampleCollectedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="SampleCollectedBy" class="<?php echo $patient_investigations_list->SampleCollectedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_SampleCollectedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->SampleCollectedBy) ?>', 1);"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->SampleCollectedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->SampleCollectedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->SampleCollectedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->ResultedDate->Visible) { // ResultedDate ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->ResultedDate) == "") { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations_list->ResultedDate->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_ResultedDate" type="text/html"><?php echo $patient_investigations_list->ResultedDate->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedDate" class="<?php echo $patient_investigations_list->ResultedDate->headerCellClass() ?>"><script id="tpc_patient_investigations_ResultedDate" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->ResultedDate) ?>', 1);"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->ResultedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->ResultedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->ResultedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations_list->ResultedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_ResultedBy" type="text/html"><?php echo $patient_investigations_list->ResultedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $patient_investigations_list->ResultedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_ResultedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->ResultedBy) ?>', 1);"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Modified->Visible) { // Modified ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations_list->Modified->headerCellClass() ?>"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Modified" type="text/html"><?php echo $patient_investigations_list->Modified->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $patient_investigations_list->Modified->headerCellClass() ?>"><script id="tpc_patient_investigations_Modified" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Modified) ?>', 1);"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Modified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Modified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations_list->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_ModifiedBy" type="text/html"><?php echo $patient_investigations_list->ModifiedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $patient_investigations_list->ModifiedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_ModifiedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->ModifiedBy) ?>', 1);"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->ModifiedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->ModifiedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->ModifiedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Created->Visible) { // Created ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $patient_investigations_list->Created->headerCellClass() ?>"><div id="elh_patient_investigations_Created" class="patient_investigations_Created"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Created" type="text/html"><?php echo $patient_investigations_list->Created->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $patient_investigations_list->Created->headerCellClass() ?>"><script id="tpc_patient_investigations_Created" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Created) ?>', 1);"><div id="elh_patient_investigations_Created" class="patient_investigations_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations_list->CreatedBy->headerCellClass() ?>"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_CreatedBy" type="text/html"><?php echo $patient_investigations_list->CreatedBy->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $patient_investigations_list->CreatedBy->headerCellClass() ?>"><script id="tpc_patient_investigations_CreatedBy" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->CreatedBy) ?>', 1);"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->CreatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->CreatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->CreatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->GroupHead->Visible) { // GroupHead ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->GroupHead) == "") { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations_list->GroupHead->headerCellClass() ?>"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_GroupHead" type="text/html"><?php echo $patient_investigations_list->GroupHead->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="GroupHead" class="<?php echo $patient_investigations_list->GroupHead->headerCellClass() ?>"><script id="tpc_patient_investigations_GroupHead" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->GroupHead) ?>', 1);"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->GroupHead->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->GroupHead->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->GroupHead->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->Cost->Visible) { // Cost ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->Cost) == "") { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations_list->Cost->headerCellClass() ?>"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_Cost" type="text/html"><?php echo $patient_investigations_list->Cost->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="Cost" class="<?php echo $patient_investigations_list->Cost->headerCellClass() ?>"><script id="tpc_patient_investigations_Cost" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->Cost) ?>', 1);"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->Cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->Cost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->Cost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations_list->PaymentStatus->headerCellClass() ?>"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_PaymentStatus" type="text/html"><?php echo $patient_investigations_list->PaymentStatus->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $patient_investigations_list->PaymentStatus->headerCellClass() ?>"><script id="tpc_patient_investigations_PaymentStatus" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->PaymentStatus) ?>', 1);"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->PaymentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->PaymentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->PaymentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->PayMode->Visible) { // PayMode ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->PayMode) == "") { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations_list->PayMode->headerCellClass() ?>"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_PayMode" type="text/html"><?php echo $patient_investigations_list->PayMode->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="PayMode" class="<?php echo $patient_investigations_list->PayMode->headerCellClass() ?>"><script id="tpc_patient_investigations_PayMode" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->PayMode) ?>', 1);"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->PayMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->PayMode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->PayMode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_investigations_list->VoucherNo->Visible) { // VoucherNo ?>
	<?php if ($patient_investigations_list->SortUrl($patient_investigations_list->VoucherNo) == "") { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations_list->VoucherNo->headerCellClass() ?>"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><div class="ew-table-header-caption"><script id="tpc_patient_investigations_VoucherNo" type="text/html"><?php echo $patient_investigations_list->VoucherNo->caption() ?></script></div></div></th>
	<?php } else { ?>
		<th data-name="VoucherNo" class="<?php echo $patient_investigations_list->VoucherNo->headerCellClass() ?>"><script id="tpc_patient_investigations_VoucherNo" type="text/html"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_investigations_list->SortUrl($patient_investigations_list->VoucherNo) ?>', 1);"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_investigations_list->VoucherNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_investigations_list->VoucherNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_investigations_list->VoucherNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_investigations_list->ListOptions->render("header", "right", "", "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_investigations_list->ExportAll && $patient_investigations_list->isExport()) {
	$patient_investigations_list->StopRecord = $patient_investigations_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_investigations_list->TotalRecords > $patient_investigations_list->StartRecord + $patient_investigations_list->DisplayRecords - 1)
		$patient_investigations_list->StopRecord = $patient_investigations_list->StartRecord + $patient_investigations_list->DisplayRecords - 1;
	else
		$patient_investigations_list->StopRecord = $patient_investigations_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($patient_investigations->isConfirm() || $patient_investigations_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_investigations_list->FormKeyCountName) && ($patient_investigations_list->isGridAdd() || $patient_investigations_list->isGridEdit() || $patient_investigations->isConfirm())) {
		$patient_investigations_list->KeyCount = $CurrentForm->getValue($patient_investigations_list->FormKeyCountName);
		$patient_investigations_list->StopRecord = $patient_investigations_list->StartRecord + $patient_investigations_list->KeyCount - 1;
	}
}
$patient_investigations_list->RecordCount = $patient_investigations_list->StartRecord - 1;
if ($patient_investigations_list->Recordset && !$patient_investigations_list->Recordset->EOF) {
	$patient_investigations_list->Recordset->moveFirst();
	$selectLimit = $patient_investigations_list->UseSelectLimit;
	if (!$selectLimit && $patient_investigations_list->StartRecord > 1)
		$patient_investigations_list->Recordset->move($patient_investigations_list->StartRecord - 1);
} elseif (!$patient_investigations->AllowAddDeleteRow && $patient_investigations_list->StopRecord == 0) {
	$patient_investigations_list->StopRecord = $patient_investigations->GridAddRowCount;
}

// Initialize aggregate
$patient_investigations->RowType = ROWTYPE_AGGREGATEINIT;
$patient_investigations->resetAttributes();
$patient_investigations_list->renderRow();
if ($patient_investigations_list->isGridAdd())
	$patient_investigations_list->RowIndex = 0;
if ($patient_investigations_list->isGridEdit())
	$patient_investigations_list->RowIndex = 0;
while ($patient_investigations_list->RecordCount < $patient_investigations_list->StopRecord) {
	$patient_investigations_list->RecordCount++;
	if ($patient_investigations_list->RecordCount >= $patient_investigations_list->StartRecord) {
		$patient_investigations_list->RowCount++;
		if ($patient_investigations_list->isGridAdd() || $patient_investigations_list->isGridEdit() || $patient_investigations->isConfirm()) {
			$patient_investigations_list->RowIndex++;
			$CurrentForm->Index = $patient_investigations_list->RowIndex;
			if ($CurrentForm->hasValue($patient_investigations_list->FormActionName) && ($patient_investigations->isConfirm() || $patient_investigations_list->EventCancelled))
				$patient_investigations_list->RowAction = strval($CurrentForm->getValue($patient_investigations_list->FormActionName));
			elseif ($patient_investigations_list->isGridAdd())
				$patient_investigations_list->RowAction = "insert";
			else
				$patient_investigations_list->RowAction = "";
		}

		// Set up key count
		$patient_investigations_list->KeyCount = $patient_investigations_list->RowIndex;

		// Init row class and style
		$patient_investigations->resetAttributes();
		$patient_investigations->CssClass = "";
		if ($patient_investigations_list->isGridAdd()) {
			$patient_investigations_list->loadRowValues(); // Load default values
		} else {
			$patient_investigations_list->loadRowValues($patient_investigations_list->Recordset); // Load row values
		}
		$patient_investigations->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_investigations_list->isGridAdd()) // Grid add
			$patient_investigations->RowType = ROWTYPE_ADD; // Render add
		if ($patient_investigations_list->isGridAdd() && $patient_investigations->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_investigations_list->restoreCurrentRowFormValues($patient_investigations_list->RowIndex); // Restore form values
		if ($patient_investigations_list->isGridEdit()) { // Grid edit
			if ($patient_investigations->EventCancelled)
				$patient_investigations_list->restoreCurrentRowFormValues($patient_investigations_list->RowIndex); // Restore form values
			if ($patient_investigations_list->RowAction == "insert")
				$patient_investigations->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_investigations->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_investigations_list->isGridEdit() && ($patient_investigations->RowType == ROWTYPE_EDIT || $patient_investigations->RowType == ROWTYPE_ADD) && $patient_investigations->EventCancelled) // Update failed
			$patient_investigations_list->restoreCurrentRowFormValues($patient_investigations_list->RowIndex); // Restore form values
		if ($patient_investigations->RowType == ROWTYPE_EDIT) // Edit row
			$patient_investigations_list->EditRowCount++;

		// Set up row id / data-rowindex
		$patient_investigations->RowAttrs->merge(["data-rowindex" => $patient_investigations_list->RowCount, "id" => "r" . $patient_investigations_list->RowCount . "_patient_investigations", "data-rowtype" => $patient_investigations->RowType]);

		// Render row
		$patient_investigations_list->renderRow();

		// Render list options
		$patient_investigations_list->renderListOptions();

		// Save row and cell attributes
		$patient_investigations_list->Attrs[$patient_investigations_list->RowCount] = ["row_attrs" => $patient_investigations->rowAttributes(), "cell_attrs" => []];
		$patient_investigations_list->Attrs[$patient_investigations_list->RowCount]["cell_attrs"] = $patient_investigations->fieldCellAttributes();

		// Skip delete row / empty row for confirm page
		if ($patient_investigations_list->RowAction != "delete" && $patient_investigations_list->RowAction != "insertdelete" && !($patient_investigations_list->RowAction == "insert" && $patient_investigations->isConfirm() && $patient_investigations_list->emptyRow())) {
?>
	<tr <?php echo $patient_investigations->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_investigations_list->ListOptions->render("body", "left", $patient_investigations_list->RowCount, "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
	<?php if ($patient_investigations_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_investigations_list->id->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_id" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_id" class="form-group"></span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="o<?php echo $patient_investigations_list->RowIndex ?>_id" id="o<?php echo $patient_investigations_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_list->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_id" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_id" class="form-group">
<span<?php echo $patient_investigations_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_list->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_id" name="x<?php echo $patient_investigations_list->RowIndex ?>_id" id="x<?php echo $patient_investigations_list->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_investigations_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_id" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_id">
<span<?php echo $patient_investigations_list->id->viewAttributes() ?>><?php echo $patient_investigations_list->id->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Investigation->Visible) { // Investigation ?>
		<td data-name="Investigation" <?php echo $patient_investigations_list->Investigation->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Investigation" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Investigation->EditValue ?>"<?php echo $patient_investigations_list->Investigation->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" name="o<?php echo $patient_investigations_list->RowIndex ?>_Investigation" id="o<?php echo $patient_investigations_list->RowIndex ?>_Investigation" value="<?php echo HtmlEncode($patient_investigations_list->Investigation->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Investigation" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Investigation" name="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" id="x<?php echo $patient_investigations_list->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Investigation->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Investigation->EditValue ?>"<?php echo $patient_investigations_list->Investigation->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Investigation" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Investigation">
<span<?php echo $patient_investigations_list->Investigation->viewAttributes() ?>><?php echo $patient_investigations_list->Investigation->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Value->Visible) { // Value ?>
		<td data-name="Value" <?php echo $patient_investigations_list->Value->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Value" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_list->RowIndex ?>_Value" id="x<?php echo $patient_investigations_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Value->EditValue ?>"<?php echo $patient_investigations_list->Value->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" name="o<?php echo $patient_investigations_list->RowIndex ?>_Value" id="o<?php echo $patient_investigations_list->RowIndex ?>_Value" value="<?php echo HtmlEncode($patient_investigations_list->Value->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Value" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Value" name="x<?php echo $patient_investigations_list->RowIndex ?>_Value" id="x<?php echo $patient_investigations_list->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Value->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Value->EditValue ?>"<?php echo $patient_investigations_list->Value->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Value" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Value">
<span<?php echo $patient_investigations_list->Value->viewAttributes() ?>><?php echo $patient_investigations_list->Value->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange" <?php echo $patient_investigations_list->NormalRange->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_NormalRange" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->NormalRange->EditValue ?>"<?php echo $patient_investigations_list->NormalRange->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" name="o<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" id="o<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($patient_investigations_list->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_NormalRange" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_NormalRange" name="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" id="x<?php echo $patient_investigations_list->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->NormalRange->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->NormalRange->EditValue ?>"<?php echo $patient_investigations_list->NormalRange->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_NormalRange" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_NormalRange">
<span<?php echo $patient_investigations_list->NormalRange->viewAttributes() ?>><?php echo $patient_investigations_list->NormalRange->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_investigations_list->mrnno->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_investigations_list->mrnno->getSessionValue() != "") { ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?php echo $patient_investigations_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_list->mrnno->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" name="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_list->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->mrnno->EditValue ?>"<?php echo $patient_investigations_list->mrnno->editAttributes() ?>>
</span></script>
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="o<?php echo $patient_investigations_list->RowIndex ?>_mrnno" id="o<?php echo $patient_investigations_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_list->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?php echo $patient_investigations_list->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_investigations_list->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" name="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" id="x<?php echo $patient_investigations_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_investigations_list->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_mrnno">
<span<?php echo $patient_investigations_list->mrnno->viewAttributes() ?>><?php echo $patient_investigations_list->mrnno->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_investigations_list->Age->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Age" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_list->RowIndex ?>_Age" id="x<?php echo $patient_investigations_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Age->EditValue ?>"<?php echo $patient_investigations_list->Age->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" name="o<?php echo $patient_investigations_list->RowIndex ?>_Age" id="o<?php echo $patient_investigations_list->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_investigations_list->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Age" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Age" name="x<?php echo $patient_investigations_list->RowIndex ?>_Age" id="x<?php echo $patient_investigations_list->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Age->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Age->EditValue ?>"<?php echo $patient_investigations_list->Age->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Age" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Age">
<span<?php echo $patient_investigations_list->Age->viewAttributes() ?>><?php echo $patient_investigations_list->Age->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_investigations_list->Gender->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Gender" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Gender->EditValue ?>"<?php echo $patient_investigations_list->Gender->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" name="o<?php echo $patient_investigations_list->RowIndex ?>_Gender" id="o<?php echo $patient_investigations_list->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_investigations_list->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Gender" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Gender" name="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" id="x<?php echo $patient_investigations_list->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Gender->EditValue ?>"<?php echo $patient_investigations_list->Gender->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Gender" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Gender">
<span<?php echo $patient_investigations_list->Gender->viewAttributes() ?>><?php echo $patient_investigations_list->Gender->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->SampleCollected->Visible) { // SampleCollected ?>
		<td data-name="SampleCollected" <?php echo $patient_investigations_list->SampleCollected->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollected" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_list->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->SampleCollected->EditValue ?>"<?php echo $patient_investigations_list->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_list->SampleCollected->ReadOnly && !$patient_investigations_list->SampleCollected->Disabled && !isset($patient_investigations_list->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_list->SampleCollected->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" name="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" id="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" value="<?php echo HtmlEncode($patient_investigations_list->SampleCollected->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollected" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected" placeholder="<?php echo HtmlEncode($patient_investigations_list->SampleCollected->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->SampleCollected->EditValue ?>"<?php echo $patient_investigations_list->SampleCollected->editAttributes() ?>>
<?php if (!$patient_investigations_list->SampleCollected->ReadOnly && !$patient_investigations_list->SampleCollected->Disabled && !isset($patient_investigations_list->SampleCollected->EditAttrs["readonly"]) && !isset($patient_investigations_list->SampleCollected->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollected" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollected">
<span<?php echo $patient_investigations_list->SampleCollected->viewAttributes() ?>><?php echo $patient_investigations_list->SampleCollected->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td data-name="SampleCollectedBy" <?php echo $patient_investigations_list->SampleCollectedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollectedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_list->SampleCollectedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" value="<?php echo HtmlEncode($patient_investigations_list->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollectedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->SampleCollectedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->SampleCollectedBy->EditValue ?>"<?php echo $patient_investigations_list->SampleCollectedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollectedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations_list->SampleCollectedBy->viewAttributes() ?>><?php echo $patient_investigations_list->SampleCollectedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->ResultedDate->Visible) { // ResultedDate ?>
		<td data-name="ResultedDate" <?php echo $patient_investigations_list->ResultedDate->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedDate" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_list->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->ResultedDate->EditValue ?>"<?php echo $patient_investigations_list->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_list->ResultedDate->ReadOnly && !$patient_investigations_list->ResultedDate->Disabled && !isset($patient_investigations_list->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_list->ResultedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" name="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" id="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" value="<?php echo HtmlEncode($patient_investigations_list->ResultedDate->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedDate" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate" placeholder="<?php echo HtmlEncode($patient_investigations_list->ResultedDate->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->ResultedDate->EditValue ?>"<?php echo $patient_investigations_list->ResultedDate->editAttributes() ?>>
<?php if (!$patient_investigations_list->ResultedDate->ReadOnly && !$patient_investigations_list->ResultedDate->Disabled && !isset($patient_investigations_list->ResultedDate->EditAttrs["readonly"]) && !isset($patient_investigations_list->ResultedDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedDate" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedDate">
<span<?php echo $patient_investigations_list->ResultedDate->viewAttributes() ?>><?php echo $patient_investigations_list->ResultedDate->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $patient_investigations_list->ResultedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->ResultedBy->EditValue ?>"<?php echo $patient_investigations_list->ResultedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" value="<?php echo HtmlEncode($patient_investigations_list->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->ResultedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->ResultedBy->EditValue ?>"<?php echo $patient_investigations_list->ResultedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ResultedBy">
<span<?php echo $patient_investigations_list->ResultedBy->viewAttributes() ?>><?php echo $patient_investigations_list->ResultedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Modified->Visible) { // Modified ?>
		<td data-name="Modified" <?php echo $patient_investigations_list->Modified->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Modified" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_list->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Modified->EditValue ?>"<?php echo $patient_investigations_list->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_list->Modified->ReadOnly && !$patient_investigations_list->Modified->Disabled && !isset($patient_investigations_list->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_list->Modified->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" name="o<?php echo $patient_investigations_list->RowIndex ?>_Modified" id="o<?php echo $patient_investigations_list->RowIndex ?>_Modified" value="<?php echo HtmlEncode($patient_investigations_list->Modified->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Modified" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Modified" name="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" id="x<?php echo $patient_investigations_list->RowIndex ?>_Modified" placeholder="<?php echo HtmlEncode($patient_investigations_list->Modified->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Modified->EditValue ?>"<?php echo $patient_investigations_list->Modified->editAttributes() ?>>
<?php if (!$patient_investigations_list->Modified->ReadOnly && !$patient_investigations_list->Modified->Disabled && !isset($patient_investigations_list->Modified->EditAttrs["readonly"]) && !isset($patient_investigations_list->Modified->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Modified" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Modified">
<span<?php echo $patient_investigations_list->Modified->viewAttributes() ?>><?php echo $patient_investigations_list->Modified->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy" <?php echo $patient_investigations_list->ModifiedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ModifiedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_list->ModifiedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($patient_investigations_list->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ModifiedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->ModifiedBy->EditValue ?>"<?php echo $patient_investigations_list->ModifiedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ModifiedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations_list->ModifiedBy->viewAttributes() ?>><?php echo $patient_investigations_list->ModifiedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Created->Visible) { // Created ?>
		<td data-name="Created" <?php echo $patient_investigations_list->Created->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Created" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_list->RowIndex ?>_Created" id="x<?php echo $patient_investigations_list->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations_list->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Created->EditValue ?>"<?php echo $patient_investigations_list->Created->editAttributes() ?>>
<?php if (!$patient_investigations_list->Created->ReadOnly && !$patient_investigations_list->Created->Disabled && !isset($patient_investigations_list->Created->EditAttrs["readonly"]) && !isset($patient_investigations_list->Created->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" name="o<?php echo $patient_investigations_list->RowIndex ?>_Created" id="o<?php echo $patient_investigations_list->RowIndex ?>_Created" value="<?php echo HtmlEncode($patient_investigations_list->Created->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Created" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Created" name="x<?php echo $patient_investigations_list->RowIndex ?>_Created" id="x<?php echo $patient_investigations_list->RowIndex ?>_Created" placeholder="<?php echo HtmlEncode($patient_investigations_list->Created->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Created->EditValue ?>"<?php echo $patient_investigations_list->Created->editAttributes() ?>>
<?php if (!$patient_investigations_list->Created->ReadOnly && !$patient_investigations_list->Created->Disabled && !isset($patient_investigations_list->Created->EditAttrs["readonly"]) && !isset($patient_investigations_list->Created->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_investigationslist_js">
loadjs.ready(["fpatient_investigationslist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_investigationslist", "x<?php echo $patient_investigations_list->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Created" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Created">
<span<?php echo $patient_investigations_list->Created->viewAttributes() ?>><?php echo $patient_investigations_list->Created->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy" <?php echo $patient_investigations_list->CreatedBy->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_CreatedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->CreatedBy->EditValue ?>"<?php echo $patient_investigations_list->CreatedBy->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" name="o<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" id="o<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($patient_investigations_list->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_CreatedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" id="x<?php echo $patient_investigations_list->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->CreatedBy->EditValue ?>"<?php echo $patient_investigations_list->CreatedBy->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_CreatedBy" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_CreatedBy">
<span<?php echo $patient_investigations_list->CreatedBy->viewAttributes() ?>><?php echo $patient_investigations_list->CreatedBy->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->GroupHead->Visible) { // GroupHead ?>
		<td data-name="GroupHead" <?php echo $patient_investigations_list->GroupHead->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_GroupHead" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_list->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->GroupHead->EditValue ?>"<?php echo $patient_investigations_list->GroupHead->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" name="o<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" id="o<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" value="<?php echo HtmlEncode($patient_investigations_list->GroupHead->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_GroupHead" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_GroupHead" name="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" id="x<?php echo $patient_investigations_list->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($patient_investigations_list->GroupHead->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->GroupHead->EditValue ?>"<?php echo $patient_investigations_list->GroupHead->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_GroupHead" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_GroupHead">
<span<?php echo $patient_investigations_list->GroupHead->viewAttributes() ?>><?php echo $patient_investigations_list->GroupHead->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->Cost->Visible) { // Cost ?>
		<td data-name="Cost" <?php echo $patient_investigations_list->Cost->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Cost" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_list->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Cost->EditValue ?>"<?php echo $patient_investigations_list->Cost->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" name="o<?php echo $patient_investigations_list->RowIndex ?>_Cost" id="o<?php echo $patient_investigations_list->RowIndex ?>_Cost" value="<?php echo HtmlEncode($patient_investigations_list->Cost->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Cost" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_Cost" name="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" id="x<?php echo $patient_investigations_list->RowIndex ?>_Cost" size="30" placeholder="<?php echo HtmlEncode($patient_investigations_list->Cost->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->Cost->EditValue ?>"<?php echo $patient_investigations_list->Cost->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Cost" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_Cost">
<span<?php echo $patient_investigations_list->Cost->viewAttributes() ?>><?php echo $patient_investigations_list->Cost->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" <?php echo $patient_investigations_list->PaymentStatus->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PaymentStatus" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_list->PaymentStatus->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" name="o<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" id="o<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" value="<?php echo HtmlEncode($patient_investigations_list->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PaymentStatus" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" id="x<?php echo $patient_investigations_list->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->PaymentStatus->EditValue ?>"<?php echo $patient_investigations_list->PaymentStatus->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PaymentStatus" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations_list->PaymentStatus->viewAttributes() ?>><?php echo $patient_investigations_list->PaymentStatus->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->PayMode->Visible) { // PayMode ?>
		<td data-name="PayMode" <?php echo $patient_investigations_list->PayMode->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PayMode" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->PayMode->EditValue ?>"<?php echo $patient_investigations_list->PayMode->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" name="o<?php echo $patient_investigations_list->RowIndex ?>_PayMode" id="o<?php echo $patient_investigations_list->RowIndex ?>_PayMode" value="<?php echo HtmlEncode($patient_investigations_list->PayMode->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PayMode" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_PayMode" name="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" id="x<?php echo $patient_investigations_list->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->PayMode->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->PayMode->EditValue ?>"<?php echo $patient_investigations_list->PayMode->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PayMode" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_PayMode">
<span<?php echo $patient_investigations_list->PayMode->viewAttributes() ?>><?php echo $patient_investigations_list->PayMode->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_investigations_list->VoucherNo->Visible) { // VoucherNo ?>
		<td data-name="VoucherNo" <?php echo $patient_investigations_list->VoucherNo->cellAttributes() ?>>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD) { // Add record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_VoucherNo" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->VoucherNo->EditValue ?>"<?php echo $patient_investigations_list->VoucherNo->editAttributes() ?>>
</span></script>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" name="o<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" id="o<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" value="<?php echo HtmlEncode($patient_investigations_list->VoucherNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_EDIT) { // Edit record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_VoucherNo" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="text" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" id="x<?php echo $patient_investigations_list->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_investigations_list->VoucherNo->getPlaceHolder()) ?>" value="<?php echo $patient_investigations_list->VoucherNo->EditValue ?>"<?php echo $patient_investigations_list->VoucherNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php if ($patient_investigations->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="tpx<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_VoucherNo" type="text/html"><span id="el<?php echo $patient_investigations_list->RowCount ?>_patient_investigations_VoucherNo">
<span<?php echo $patient_investigations_list->VoucherNo->viewAttributes() ?>><?php echo $patient_investigations_list->VoucherNo->getViewValue() ?></span>
</span></script>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_investigations_list->ListOptions->render("body", "right", $patient_investigations_list->RowCount, "block", $patient_investigations->TableVar, "patient_investigationslist");
?>
	</tr>
<?php if ($patient_investigations->RowType == ROWTYPE_ADD || $patient_investigations->RowType == ROWTYPE_EDIT) { ?>
<script class="patient_investigationslist_js" type="text/html">
loadjs.ready(["fpatient_investigationslist", "load"], function() {
	fpatient_investigationslist.updateLists(<?php echo $patient_investigations_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_investigations_list->isGridAdd())
		if (!$patient_investigations_list->Recordset->EOF)
			$patient_investigations_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_patient_investigationslist" class="ew-custom-template"></div>
<script id="tpm_patient_investigationslist" type="text/html">
<div id="ct_patient_investigations_list"><?php if ($patient_investigations_list->RowCount > 0) { ?>
<div style="overflow-x:auto;">
<table class="ew-table">
	<thead>
		<tr class="ew-table-header">
			<td class="text-center" >{{include tmpl=~getTemplate("#tpc_patient_investigations_Investigation")/}}</td>
		</tr>    
	</thead> 
<tbody>
<?php for ($i = $patient_investigations_list->StartRowCount; $i <= $patient_investigations_list->RowCount; $i++) { ?>
<tr<?php echo @$patient_investigations_list->Attrs[$i]['row_attrs'] ?>>
	 <td>{{include tmpl=~getTemplate("#tpx<?php echo $i ?>_patient_investigations_Investigation")/}}</td>
</tr>

<?php } ?>
<?php if ($patient_investigations_list->TotalRecords > 0 && !$patient_investigations->isGridAdd() && !$patient_investigations->isGridEdit()) { ?>
 </tbody>
</table>
</div>
<?php } ?>
<?php } ?>
</div>
</script>

</div><!-- /.ew-grid-middle-panel -->
<?php if ($patient_investigations_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $patient_investigations_list->FormKeyCountName ?>" id="<?php echo $patient_investigations_list->FormKeyCountName ?>" value="<?php echo $patient_investigations_list->KeyCount ?>">
<?php echo $patient_investigations_list->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_investigations_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $patient_investigations_list->FormKeyCountName ?>" id="<?php echo $patient_investigations_list->FormKeyCountName ?>" value="<?php echo $patient_investigations_list->KeyCount ?>">
<?php echo $patient_investigations_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$patient_investigations->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_investigations_list->Recordset)
	$patient_investigations_list->Recordset->Close();
?>
<?php if (!$patient_investigations_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_investigations_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_investigations_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_investigations_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_investigations_list->TotalRecords == 0 && !$patient_investigations->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_investigations_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_investigations->Rows) ?> };
	ew.applyTemplate("tpd_patient_investigationslist", "tpm_patient_investigationslist", "patient_investigationslist", "<?php echo $patient_investigations->CustomExport ?>", ew.templateData);
	$("#tpd_patient_investigationslist th.ew-list-option-header").each(function() {
		this.rowSpan = 2;
	});
	$("#tpd_patient_investigationslist td.ew-list-option-body").each(function() {
		this.rowSpan = 2;
	});
	$("script.patient_investigationslist_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_investigations_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_investigations_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_investigations->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_investigations",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_investigations_list->terminate();
?>