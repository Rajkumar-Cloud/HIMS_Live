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
$pharmacy_pharled_list = new pharmacy_pharled_list();

// Run the page
$pharmacy_pharled_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_pharled_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_pharled_list->isExport()) { ?>
<script>
var fpharmacy_pharledlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_pharledlist = currentForm = new ew.Form("fpharmacy_pharledlist", "list");
	fpharmacy_pharledlist.formKeyCountName = '<?php echo $pharmacy_pharled_list->FormKeyCountName ?>';

	// Validate form
	fpharmacy_pharledlist.validate = function() {
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
			<?php if ($pharmacy_pharled_list->SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->SiNo->caption(), $pharmacy_pharled_list->SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->SiNo->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->SLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->SLNO->caption(), $pharmacy_pharled_list->SLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->SLNO->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->Product->Required) { ?>
				elm = this.getElements("x" + infix + "_Product");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->Product->caption(), $pharmacy_pharled_list->Product->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->RT->caption(), $pharmacy_pharled_list->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->RT->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->IQ->caption(), $pharmacy_pharled_list->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->IQ->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->DAMT->Required) { ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->DAMT->caption(), $pharmacy_pharled_list->DAMT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->DAMT->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->Mfg->Required) { ?>
				elm = this.getElements("x" + infix + "_Mfg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->Mfg->caption(), $pharmacy_pharled_list->Mfg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->EXPDT->caption(), $pharmacy_pharled_list->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->EXPDT->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->BATCHNO->caption(), $pharmacy_pharled_list->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->BRCODE->caption(), $pharmacy_pharled_list->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->PRC->caption(), $pharmacy_pharled_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->UR->caption(), $pharmacy_pharled_list->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_pharled_list->UR->errorMessage()) ?>");
			<?php if ($pharmacy_pharled_list->_USERID->Required) { ?>
				elm = this.getElements("x" + infix + "__USERID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->_USERID->caption(), $pharmacy_pharled_list->_USERID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->id->caption(), $pharmacy_pharled_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->HosoID->Required) { ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->HosoID->caption(), $pharmacy_pharled_list->HosoID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->createdby->caption(), $pharmacy_pharled_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->createddatetime->caption(), $pharmacy_pharled_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->modifiedby->caption(), $pharmacy_pharled_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->modifieddatetime->caption(), $pharmacy_pharled_list->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_pharled_list->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_pharled_list->BRNAME->caption(), $pharmacy_pharled_list->BRNAME->RequiredErrorMessage)) ?>");
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
	fpharmacy_pharledlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "SiNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "SLNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "Product", false)) return false;
		if (ew.valueChanged(fobj, infix, "RT", false)) return false;
		if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "DAMT", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mfg", false)) return false;
		if (ew.valueChanged(fobj, infix, "EXPDT", false)) return false;
		if (ew.valueChanged(fobj, infix, "BATCHNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "UR", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_pharledlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_pharledlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_pharledlist.lists["x_SLNO"] = <?php echo $pharmacy_pharled_list->SLNO->Lookup->toClientList($pharmacy_pharled_list) ?>;
	fpharmacy_pharledlist.lists["x_SLNO"].options = <?php echo JsonEncode($pharmacy_pharled_list->SLNO->lookupOptions()) ?>;
	fpharmacy_pharledlist.autoSuggests["x_SLNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_pharledlist");
});
var fpharmacy_pharledlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_pharledlistsrch = currentSearchForm = new ew.Form("fpharmacy_pharledlistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_pharledlistsrch.filterList = <?php echo $pharmacy_pharled_list->getFilterList() ?>;
	loadjs.done("fpharmacy_pharledlistsrch");
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
<?php if (!$pharmacy_pharled_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_pharled_list->TotalRecords > 0 && $pharmacy_pharled_list->ExportOptions->visible()) { ?>
<?php $pharmacy_pharled_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->ImportOptions->visible()) { ?>
<?php $pharmacy_pharled_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->SearchOptions->visible()) { ?>
<?php $pharmacy_pharled_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->FilterOptions->visible()) { ?>
<?php $pharmacy_pharled_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_pharled_list->isExport() || Config("EXPORT_MASTER_RECORD") && $pharmacy_pharled_list->isExport("print")) { ?>
<?php
if ($pharmacy_pharled_list->DbMasterFilter != "" && $pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_voucher") {
	if ($pharmacy_pharled_list->MasterRecordExists) {
		include_once "pharmacy_billing_vouchermaster.php";
	}
}
?>
<?php
if ($pharmacy_pharled_list->DbMasterFilter != "" && $pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_issue") {
	if ($pharmacy_pharled_list->MasterRecordExists) {
		include_once "pharmacy_billing_issuemaster.php";
	}
}
?>
<?php
if ($pharmacy_pharled_list->DbMasterFilter != "" && $pharmacy_pharled->getCurrentMasterTable() == "ip_admission") {
	if ($pharmacy_pharled_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_pharled_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_pharled_list->isExport() && !$pharmacy_pharled->CurrentAction) { ?>
<form name="fpharmacy_pharledlistsrch" id="fpharmacy_pharledlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_pharledlistsrch-search-panel" class="<?php echo $pharmacy_pharled_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_pharled">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_pharled_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_pharled_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_pharled_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_pharled_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_pharled_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_pharled_list->showPageHeader(); ?>
<?php
$pharmacy_pharled_list->showMessage();
?>
<?php if ($pharmacy_pharled_list->TotalRecords > 0 || $pharmacy_pharled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_pharled_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_pharled">
<?php if (!$pharmacy_pharled_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_pharled_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_pharled_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_pharledlist" id="fpharmacy_pharledlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_voucher" && $pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_voucher">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->pbv->getSessionValue()) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "pharmacy_billing_issue" && $pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_issue">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->pbt->getSessionValue()) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->getCurrentMasterTable() == "ip_admission" && $pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($pharmacy_pharled_list->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->PatID->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->Reception->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_pharled" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_pharled_list->TotalRecords > 0 || $pharmacy_pharled_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_pharledlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_pharled->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_pharled_list->renderListOptions();

// Render list options (header, left)
$pharmacy_pharled_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_pharled_list->SiNo->Visible) { // SiNo ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled_list->SiNo->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $pharmacy_pharled_list->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->SiNo) ?>', 1);"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->SiNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->SiNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled_list->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_pharled_list->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->SLNO) ?>', 1);"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->SLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->SLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->Product->Visible) { // Product ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled_list->Product->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $pharmacy_pharled_list->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->Product) ?>', 1);"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->Product->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->Product->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->RT->Visible) { // RT ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled_list->RT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_pharled_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->RT) ?>', 1);"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->IQ->Visible) { // IQ ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled_list->IQ->headerCellClass() ?>"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $pharmacy_pharled_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->IQ) ?>', 1);"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->DAMT->Visible) { // DAMT ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled_list->DAMT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $pharmacy_pharled_list->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->DAMT) ?>', 1);"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->DAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->DAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->Mfg->Visible) { // Mfg ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled_list->Mfg->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $pharmacy_pharled_list->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->Mfg) ?>', 1);"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->Mfg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->Mfg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled_list->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_pharled_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->EXPDT) ?>', 1);"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled_list->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_pharled_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->BATCHNO) ?>', 1);"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled_list->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_pharled_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->BRCODE) ?>', 1);"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled_list->PRC->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_pharled_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->PRC) ?>', 1);"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->UR->Visible) { // UR ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled_list->UR->headerCellClass() ?>"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $pharmacy_pharled_list->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->UR) ?>', 1);"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->_USERID->Visible) { // USERID ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled_list->_USERID->headerCellClass() ?>"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $pharmacy_pharled_list->_USERID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->_USERID) ?>', 1);"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->_USERID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->_USERID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->_USERID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->id->Visible) { // id ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled_list->id->headerCellClass() ?>"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_pharled_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->id) ?>', 1);"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->HosoID->Visible) { // HosoID ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled_list->HosoID->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $pharmacy_pharled_list->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->HosoID) ?>', 1);"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled_list->createdby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_pharled_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->createdby) ?>', 1);"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled_list->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_pharled_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->createddatetime) ?>', 1);"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled_list->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_pharled_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->modifiedby) ?>', 1);"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled_list->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_pharled_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->modifieddatetime) ?>', 1);"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled_list->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_pharled_list->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_pharled_list->SortUrl($pharmacy_pharled_list->BRNAME) ?>', 1);"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_pharled_list->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_pharled_list->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_pharled_list->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_pharled_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_pharled_list->ExportAll && $pharmacy_pharled_list->isExport()) {
	$pharmacy_pharled_list->StopRecord = $pharmacy_pharled_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_pharled_list->TotalRecords > $pharmacy_pharled_list->StartRecord + $pharmacy_pharled_list->DisplayRecords - 1)
		$pharmacy_pharled_list->StopRecord = $pharmacy_pharled_list->StartRecord + $pharmacy_pharled_list->DisplayRecords - 1;
	else
		$pharmacy_pharled_list->StopRecord = $pharmacy_pharled_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pharmacy_pharled->isConfirm() || $pharmacy_pharled_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_pharled_list->FormKeyCountName) && ($pharmacy_pharled_list->isGridAdd() || $pharmacy_pharled_list->isGridEdit() || $pharmacy_pharled->isConfirm())) {
		$pharmacy_pharled_list->KeyCount = $CurrentForm->getValue($pharmacy_pharled_list->FormKeyCountName);
		$pharmacy_pharled_list->StopRecord = $pharmacy_pharled_list->StartRecord + $pharmacy_pharled_list->KeyCount - 1;
	}
}
$pharmacy_pharled_list->RecordCount = $pharmacy_pharled_list->StartRecord - 1;
if ($pharmacy_pharled_list->Recordset && !$pharmacy_pharled_list->Recordset->EOF) {
	$pharmacy_pharled_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_pharled_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_pharled_list->StartRecord > 1)
		$pharmacy_pharled_list->Recordset->move($pharmacy_pharled_list->StartRecord - 1);
} elseif (!$pharmacy_pharled->AllowAddDeleteRow && $pharmacy_pharled_list->StopRecord == 0) {
	$pharmacy_pharled_list->StopRecord = $pharmacy_pharled->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_pharled->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_pharled->resetAttributes();
$pharmacy_pharled_list->renderRow();
if ($pharmacy_pharled_list->isGridAdd())
	$pharmacy_pharled_list->RowIndex = 0;
if ($pharmacy_pharled_list->isGridEdit())
	$pharmacy_pharled_list->RowIndex = 0;
while ($pharmacy_pharled_list->RecordCount < $pharmacy_pharled_list->StopRecord) {
	$pharmacy_pharled_list->RecordCount++;
	if ($pharmacy_pharled_list->RecordCount >= $pharmacy_pharled_list->StartRecord) {
		$pharmacy_pharled_list->RowCount++;
		if ($pharmacy_pharled_list->isGridAdd() || $pharmacy_pharled_list->isGridEdit() || $pharmacy_pharled->isConfirm()) {
			$pharmacy_pharled_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_pharled_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_pharled_list->FormActionName) && ($pharmacy_pharled->isConfirm() || $pharmacy_pharled_list->EventCancelled))
				$pharmacy_pharled_list->RowAction = strval($CurrentForm->getValue($pharmacy_pharled_list->FormActionName));
			elseif ($pharmacy_pharled_list->isGridAdd())
				$pharmacy_pharled_list->RowAction = "insert";
			else
				$pharmacy_pharled_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_pharled_list->KeyCount = $pharmacy_pharled_list->RowIndex;

		// Init row class and style
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->CssClass = "";
		if ($pharmacy_pharled_list->isGridAdd()) {
			$pharmacy_pharled_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_pharled_list->loadRowValues($pharmacy_pharled_list->Recordset); // Load row values
		}
		$pharmacy_pharled->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_pharled_list->isGridAdd()) // Grid add
			$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_pharled_list->isGridAdd() && $pharmacy_pharled->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_pharled_list->restoreCurrentRowFormValues($pharmacy_pharled_list->RowIndex); // Restore form values
		if ($pharmacy_pharled_list->isGridEdit()) { // Grid edit
			if ($pharmacy_pharled->EventCancelled)
				$pharmacy_pharled_list->restoreCurrentRowFormValues($pharmacy_pharled_list->RowIndex); // Restore form values
			if ($pharmacy_pharled_list->RowAction == "insert")
				$pharmacy_pharled->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_pharled->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_pharled_list->isGridEdit() && ($pharmacy_pharled->RowType == ROWTYPE_EDIT || $pharmacy_pharled->RowType == ROWTYPE_ADD) && $pharmacy_pharled->EventCancelled) // Update failed
			$pharmacy_pharled_list->restoreCurrentRowFormValues($pharmacy_pharled_list->RowIndex); // Restore form values
		if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_pharled_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pharmacy_pharled->RowAttrs->merge(["data-rowindex" => $pharmacy_pharled_list->RowCount, "id" => "r" . $pharmacy_pharled_list->RowCount . "_pharmacy_pharled", "data-rowtype" => $pharmacy_pharled->RowType]);

		// Render row
		$pharmacy_pharled_list->renderRow();

		// Render list options
		$pharmacy_pharled_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_pharled_list->RowAction != "delete" && $pharmacy_pharled_list->RowAction != "insertdelete" && !($pharmacy_pharled_list->RowAction == "insert" && $pharmacy_pharled->isConfirm() && $pharmacy_pharled_list->emptyRow())) {
?>
	<tr <?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_list->ListOptions->render("body", "left", $pharmacy_pharled_list->RowCount);
?>
	<?php if ($pharmacy_pharled_list->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo" <?php echo $pharmacy_pharled_list->SiNo->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->SiNo->EditValue ?>"<?php echo $pharmacy_pharled_list->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_list->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->SiNo->EditValue ?>"<?php echo $pharmacy_pharled_list->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_SiNo">
<span<?php echo $pharmacy_pharled_list->SiNo->viewAttributes() ?>><?php echo $pharmacy_pharled_list->SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO" <?php echo $pharmacy_pharled_list->SLNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $pharmacy_pharled_list->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_pharled_list->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled_list->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled_list->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled_list->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_pharledlist"], function() {
	fpharmacy_pharledlist.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO","forceSelect":true});
});
</script>
<?php echo $pharmacy_pharled_list->SLNO->Lookup->getParamTag($pharmacy_pharled_list, "p_x" . $pharmacy_pharled_list->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $pharmacy_pharled_list->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_pharled_list->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled_list->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled_list->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled_list->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_pharledlist"], function() {
	fpharmacy_pharledlist.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO","forceSelect":true});
});
</script>
<?php echo $pharmacy_pharled_list->SLNO->Lookup->getParamTag($pharmacy_pharled_list, "p_x" . $pharmacy_pharled_list->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_SLNO">
<span<?php echo $pharmacy_pharled_list->SLNO->viewAttributes() ?>><?php echo $pharmacy_pharled_list->SLNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Product->Visible) { // Product ?>
		<td data-name="Product" <?php echo $pharmacy_pharled_list->Product->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->Product->EditValue ?>"<?php echo $pharmacy_pharled_list->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_list->Product->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->Product->EditValue ?>"<?php echo $pharmacy_pharled_list->Product->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_Product">
<span<?php echo $pharmacy_pharled_list->Product->viewAttributes() ?>><?php echo $pharmacy_pharled_list->Product->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $pharmacy_pharled_list->RT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->RT->EditValue ?>"<?php echo $pharmacy_pharled_list->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_list->RT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->RT->EditValue ?>"<?php echo $pharmacy_pharled_list->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_RT">
<span<?php echo $pharmacy_pharled_list->RT->viewAttributes() ?>><?php echo $pharmacy_pharled_list->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $pharmacy_pharled_list->IQ->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->IQ->EditValue ?>"<?php echo $pharmacy_pharled_list->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_list->IQ->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->IQ->EditValue ?>"<?php echo $pharmacy_pharled_list->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_IQ">
<span<?php echo $pharmacy_pharled_list->IQ->viewAttributes() ?>><?php echo $pharmacy_pharled_list->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" <?php echo $pharmacy_pharled_list->DAMT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->DAMT->EditValue ?>"<?php echo $pharmacy_pharled_list->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_list->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->DAMT->EditValue ?>"<?php echo $pharmacy_pharled_list->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_DAMT">
<span<?php echo $pharmacy_pharled_list->DAMT->viewAttributes() ?>><?php echo $pharmacy_pharled_list->DAMT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg" <?php echo $pharmacy_pharled_list->Mfg->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->Mfg->EditValue ?>"<?php echo $pharmacy_pharled_list->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_list->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->Mfg->EditValue ?>"<?php echo $pharmacy_pharled_list->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_Mfg">
<span<?php echo $pharmacy_pharled_list->Mfg->viewAttributes() ?>><?php echo $pharmacy_pharled_list->Mfg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $pharmacy_pharled_list->EXPDT->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled_list->EXPDT->ReadOnly && !$pharmacy_pharled_list->EXPDT->Disabled && !isset($pharmacy_pharled_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_pharledlist", "x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_list->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled_list->EXPDT->ReadOnly && !$pharmacy_pharled_list->EXPDT->Disabled && !isset($pharmacy_pharled_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_pharledlist", "x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_EXPDT">
<span<?php echo $pharmacy_pharled_list->EXPDT->viewAttributes() ?>><?php echo $pharmacy_pharled_list->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $pharmacy_pharled_list->BATCHNO->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled_list->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled_list->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_BATCHNO">
<span<?php echo $pharmacy_pharled_list->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_pharled_list->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_pharled_list->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_list->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_BRCODE">
<span<?php echo $pharmacy_pharled_list->BRCODE->viewAttributes() ?>><?php echo $pharmacy_pharled_list->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_pharled_list->PRC->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->PRC->EditValue ?>"<?php echo $pharmacy_pharled_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->PRC->EditValue ?>"<?php echo $pharmacy_pharled_list->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_PRC">
<span<?php echo $pharmacy_pharled_list->PRC->viewAttributes() ?>><?php echo $pharmacy_pharled_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $pharmacy_pharled_list->UR->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->UR->EditValue ?>"<?php echo $pharmacy_pharled_list->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_list->UR->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->UR->EditValue ?>"<?php echo $pharmacy_pharled_list->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_UR">
<span<?php echo $pharmacy_pharled_list->UR->viewAttributes() ?>><?php echo $pharmacy_pharled_list->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID" <?php echo $pharmacy_pharled_list->_USERID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_list->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled__USERID">
<span<?php echo $pharmacy_pharled_list->_USERID->viewAttributes() ?>><?php echo $pharmacy_pharled_list->_USERID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_pharled_list->id->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_id" class="form-group">
<span<?php echo $pharmacy_pharled_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_pharled_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_id" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_id">
<span<?php echo $pharmacy_pharled_list->id->viewAttributes() ?>><?php echo $pharmacy_pharled_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $pharmacy_pharled_list->HosoID->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_list->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_HosoID">
<span<?php echo $pharmacy_pharled_list->HosoID->viewAttributes() ?>><?php echo $pharmacy_pharled_list->HosoID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_pharled_list->createdby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_createdby">
<span<?php echo $pharmacy_pharled_list->createdby->viewAttributes() ?>><?php echo $pharmacy_pharled_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_pharled_list->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_createddatetime">
<span<?php echo $pharmacy_pharled_list->createddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_pharled_list->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_modifiedby">
<span<?php echo $pharmacy_pharled_list->modifiedby->viewAttributes() ?>><?php echo $pharmacy_pharled_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_pharled_list->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_modifieddatetime">
<span<?php echo $pharmacy_pharled_list->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_pharled_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $pharmacy_pharled_list->BRNAME->cellAttributes() ?>>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_list->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_pharled_list->RowCount ?>_pharmacy_pharled_BRNAME">
<span<?php echo $pharmacy_pharled_list->BRNAME->viewAttributes() ?>><?php echo $pharmacy_pharled_list->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_list->ListOptions->render("body", "right", $pharmacy_pharled_list->RowCount);
?>
	</tr>
<?php if ($pharmacy_pharled->RowType == ROWTYPE_ADD || $pharmacy_pharled->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "load"], function() {
	fpharmacy_pharledlist.updateLists(<?php echo $pharmacy_pharled_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_pharled_list->isGridAdd())
		if (!$pharmacy_pharled_list->Recordset->EOF)
			$pharmacy_pharled_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_pharled_list->isGridAdd() || $pharmacy_pharled_list->isGridEdit()) {
		$pharmacy_pharled_list->RowIndex = '$rowindex$';
		$pharmacy_pharled_list->loadRowValues();

		// Set row properties
		$pharmacy_pharled->resetAttributes();
		$pharmacy_pharled->RowAttrs->merge(["data-rowindex" => $pharmacy_pharled_list->RowIndex, "id" => "r0_pharmacy_pharled", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_pharled->RowAttrs->appendClass("ew-template");
		$pharmacy_pharled->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_pharled_list->renderRow();

		// Render list options
		$pharmacy_pharled_list->renderListOptions();
		$pharmacy_pharled_list->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_pharled_list->ListOptions->render("body", "left", $pharmacy_pharled_list->RowIndex);
?>
	<?php if ($pharmacy_pharled_list->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="text" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SiNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->SiNo->EditValue ?>"<?php echo $pharmacy_pharled_list->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($pharmacy_pharled_list->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO">
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$onchange = $pharmacy_pharled_list->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_pharled_list->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="sv_x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo RemoveHtml($pharmacy_pharled_list->SLNO->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->getPlaceHolder()) ?>"<?php echo $pharmacy_pharled_list->SLNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-value-separator="<?php echo $pharmacy_pharled_list->SLNO->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_pharledlist"], function() {
	fpharmacy_pharledlist.createAutoSuggest({"id":"x<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO","forceSelect":true});
});
</script>
<?php echo $pharmacy_pharled_list->SLNO->Lookup->getParamTag($pharmacy_pharled_list, "p_x" . $pharmacy_pharled_list->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_SLNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->SLNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Product->Visible) { // Product ?>
		<td data-name="Product">
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="text" data-table="pharmacy_pharled" data-field="x_Product" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->Product->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->Product->EditValue ?>"<?php echo $pharmacy_pharled_list->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($pharmacy_pharled_list->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="text" data-table="pharmacy_pharled" data-field="x_RT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->RT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->RT->EditValue ?>"<?php echo $pharmacy_pharled_list->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($pharmacy_pharled_list->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="text" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->IQ->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->IQ->EditValue ?>"<?php echo $pharmacy_pharled_list->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($pharmacy_pharled_list->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="text" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->DAMT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->DAMT->EditValue ?>"<?php echo $pharmacy_pharled_list->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($pharmacy_pharled_list->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="text" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->Mfg->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->Mfg->EditValue ?>"<?php echo $pharmacy_pharled_list->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($pharmacy_pharled_list->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="text" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->EXPDT->EditValue ?>"<?php echo $pharmacy_pharled_list->EXPDT->editAttributes() ?>>
<?php if (!$pharmacy_pharled_list->EXPDT->ReadOnly && !$pharmacy_pharled_list->EXPDT->Disabled && !isset($pharmacy_pharled_list->EXPDT->EditAttrs["readonly"]) && !isset($pharmacy_pharled_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_pharledlist", "x<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($pharmacy_pharled_list->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="text" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->BATCHNO->EditValue ?>"<?php echo $pharmacy_pharled_list->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($pharmacy_pharled_list->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_pharled_list->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="text" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->PRC->EditValue ?>"<?php echo $pharmacy_pharled_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_pharled_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->UR->Visible) { // UR ?>
		<td data-name="UR">
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="text" data-table="pharmacy_pharled" data-field="x_UR" name="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="x<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($pharmacy_pharled_list->UR->getPlaceHolder()) ?>" value="<?php echo $pharmacy_pharled_list->UR->EditValue ?>"<?php echo $pharmacy_pharled_list->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($pharmacy_pharled_list->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($pharmacy_pharled_list->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id"></span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_pharled_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($pharmacy_pharled_list->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_pharled_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_pharled_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_pharled_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_pharled_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" name="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" id="o<?php echo $pharmacy_pharled_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($pharmacy_pharled_list->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_pharled_list->ListOptions->render("body", "right", $pharmacy_pharled_list->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "load"], function() {
	fpharmacy_pharledlist.updateLists(<?php echo $pharmacy_pharled_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($pharmacy_pharled_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" id="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" value="<?php echo $pharmacy_pharled_list->KeyCount ?>">
<?php echo $pharmacy_pharled_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_pharled_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" id="<?php echo $pharmacy_pharled_list->FormKeyCountName ?>" value="<?php echo $pharmacy_pharled_list->KeyCount ?>">
<?php echo $pharmacy_pharled_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_pharled_list->Recordset)
	$pharmacy_pharled_list->Recordset->Close();
?>
<?php if (!$pharmacy_pharled_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_pharled_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_pharled_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_pharled_list->TotalRecords == 0 && !$pharmacy_pharled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_pharled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_pharled_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_pharled_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	//$("[data-name='SiNo']").hide();

	$("[data-name='Product']").hide();

	//$("[data-name='Mfg']").hide();
	 //$("[data-name='SLNO']").hide();

			  $("[data-name='BRCODE']").hide();
			  $("[data-name='TYPE']").hide();
			  $("[data-name='DN']").hide();
			  $("[data-name='RDN']").hide();
			  $("[data-name='DT']").hide();
			  $("[data-name='PRC']").hide();
			  $("[data-name='OQ']").hide();
			  $("[data-name='RQ']").hide();
			  $("[data-name='MRQ']").hide();

			//  $("[data-name='IQ']").hide();
		//	  $("[data-name='BATCHNO']").hide();
		//	  $("[data-name='EXPDT']").hide();

			  $("[data-name='BILLNO']").hide();
			  $("[data-name='BILLDT']").hide();

		//	  $("[data-name='RT']").hide();
			  $("[data-name='VALUE']").hide();
			  $("[data-name='DISC']").hide();
			  $("[data-name='TAXP']").hide();
			  $("[data-name='TAX']").hide();
			  $("[data-name='TAXR']").hide();

		//	  $("[data-name='DAMT']").hide();
			  $("[data-name='EMPNO']").hide();
			  $("[data-name='PC']").hide();
			  $("[data-name='DRNAME']").hide();
			  $("[data-name='BTIME']").hide();
			  $("[data-name='ONO']").hide();
			  $("[data-name='ODT']").hide();
			  $("[data-name='PURRT']").hide();
			  $("[data-name='GRP']").hide();
			  $("[data-name='IBATCH']").hide();
			  $("[data-name='IPNO']").hide();
			  $("[data-name='OPNO']").hide();
			  $("[data-name='RECID']").hide();
			  $("[data-name='FQTY']").hide();
			  $("[data-name='UR']").hide();		  
			  $("[data-name='DCID']").hide();
			  $("[data-name='USERID']").hide();
			  $("[data-name='MODDT']").hide();
			  $("[data-name='FYM']").hide();
			  $("[data-name='PRCBATCH']").hide();
			  $("[data-name='MRP']").hide();
			  $("[data-name='BILLYM']").hide();
			  $("[data-name='BILLGRP']").hide();
			  $("[data-name='STAFF']").hide();
			  $("[data-name='TEMPIPNO']").hide();
			  $("[data-name='PRNTED']").hide();
			  $("[data-name='PATNAME']").hide();
			  $("[data-name='PJVNO']").hide();
			  $("[data-name='PJVSLNO']").hide();
			  $("[data-name='OTHDISC']").hide();
			  $("[data-name='PJVYM']").hide();
			  $("[data-name='PURDISCPER']").hide();
			  $("[data-name='CASHIER']").hide();
			  $("[data-name='CASHTIME']").hide();
			  $("[data-name='CASHRECD']").hide();
			  $("[data-name='CASHREFNO']").hide();
			  $("[data-name='CASHIERSHIFT']").hide();
			  $("[data-name='PRCODE']").hide();
			  $("[data-name='RELEASEBY']").hide();
			  $("[data-name='CRAUTHOR']").hide();
			  $("[data-name='PAYMENT']").hide();
			  $("[data-name='DRID']").hide();
			  $("[data-name='WARD']").hide();
			  $("[data-name='STAXTYPE']").hide();
			  $("[data-name='PURDISCVAL']").hide();
			  $("[data-name='RNDOFF']").hide();
			  $("[data-name='DISCONMRP']").hide();
			  $("[data-name='DELVDT']").hide();
			  $("[data-name='DELVTIME']").hide();
			  $("[data-name='DELVBY']").hide();
			  $("[data-name='HOSPNO']").hide();
			  $("[data-name='pbv']").hide();
			  $("[data-name='pbt']").hide();
			  $("[data-name='Reception']").hide();
			  $("[data-name='PatID']").hide();
			  $("[data-name='mrnno']").hide();

	function addtotalSum()
	{	
		var totSum = 0;
		for (var i = 1; i < 40; i++) {
				try {
					var amount = document.getElementById("x" + i + "_DAMT");
					if (amount.value != '') {
						totSum = parseInt(totSum) + parseInt(amount.value);
					 var SiNo = document.getElementById("x" + i + "_SiNo");
					 SiNo.value = i;
					}
					var RT = document.getElementById("x" + i + "_RT");
					var Product = document.getElementById("sv_x" + i + "_Product").value;
					if(Product!= '')
					{
					 var SiNo = document.getElementById("x" + i + "_SiNo");
					 SiNo.value = i;
					 }
				}
				catch(err) {
				}
		}
			var BillAmount = document.getElementById("x_Amount");

		//	BillAmount.value = totSum;
	}
	</script>
	<style>
	.input-group>.form-control {
		width: 1%;
		flex-grow: 1;
	}
	</style>
	<script>
});
</script>
<?php if (!$pharmacy_pharled->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_pharled",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_pharled_list->terminate();
?>