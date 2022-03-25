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
$view_pharmacy_pharled_return_list = new view_pharmacy_pharled_return_list();

// Run the page
$view_pharmacy_pharled_return_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_return_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_pharled_return_list->isExport()) { ?>
<script>
var fview_pharmacy_pharled_returnlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_pharled_returnlist = currentForm = new ew.Form("fview_pharmacy_pharled_returnlist", "list");
	fview_pharmacy_pharled_returnlist.formKeyCountName = '<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>';

	// Validate form
	fview_pharmacy_pharled_returnlist.validate = function() {
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
			<?php if ($view_pharmacy_pharled_return_list->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->BRCODE->caption(), $view_pharmacy_pharled_return_list->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->PRC->caption(), $view_pharmacy_pharled_return_list->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->SiNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->SiNo->caption(), $view_pharmacy_pharled_return_list->SiNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SiNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->SiNo->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->Product->Required) { ?>
				elm = this.getElements("x" + infix + "_Product");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->Product->caption(), $view_pharmacy_pharled_return_list->Product->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->RT->Required) { ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->RT->caption(), $view_pharmacy_pharled_return_list->RT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->RT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->MRQ->Required) { ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->MRQ->caption(), $view_pharmacy_pharled_return_list->MRQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_MRQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->MRQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->IQ->Required) { ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->IQ->caption(), $view_pharmacy_pharled_return_list->IQ->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IQ");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->IQ->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->DAMT->Required) { ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->DAMT->caption(), $view_pharmacy_pharled_return_list->DAMT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DAMT");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->DAMT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->BATCHNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BATCHNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->BATCHNO->caption(), $view_pharmacy_pharled_return_list->BATCHNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->EXPDT->Required) { ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->EXPDT->caption(), $view_pharmacy_pharled_return_list->EXPDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EXPDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->EXPDT->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->Mfg->Required) { ?>
				elm = this.getElements("x" + infix + "_Mfg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->Mfg->caption(), $view_pharmacy_pharled_return_list->Mfg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->UR->Required) { ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->UR->caption(), $view_pharmacy_pharled_return_list->UR->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UR");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_pharmacy_pharled_return_list->UR->errorMessage()) ?>");
			<?php if ($view_pharmacy_pharled_return_list->_USERID->Required) { ?>
				elm = this.getElements("x" + infix + "__USERID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->_USERID->caption(), $view_pharmacy_pharled_return_list->_USERID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->id->caption(), $view_pharmacy_pharled_return_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->HosoID->Required) { ?>
				elm = this.getElements("x" + infix + "_HosoID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->HosoID->caption(), $view_pharmacy_pharled_return_list->HosoID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->createdby->caption(), $view_pharmacy_pharled_return_list->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->createddatetime->caption(), $view_pharmacy_pharled_return_list->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->modifiedby->caption(), $view_pharmacy_pharled_return_list->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->modifieddatetime->caption(), $view_pharmacy_pharled_return_list->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_pharmacy_pharled_return_list->BRNAME->Required) { ?>
				elm = this.getElements("x" + infix + "_BRNAME");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_pharled_return_list->BRNAME->caption(), $view_pharmacy_pharled_return_list->BRNAME->RequiredErrorMessage)) ?>");
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
	fview_pharmacy_pharled_returnlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "SiNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "Product", false)) return false;
		if (ew.valueChanged(fobj, infix, "RT", false)) return false;
		if (ew.valueChanged(fobj, infix, "MRQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "IQ", false)) return false;
		if (ew.valueChanged(fobj, infix, "DAMT", false)) return false;
		if (ew.valueChanged(fobj, infix, "BATCHNO", false)) return false;
		if (ew.valueChanged(fobj, infix, "EXPDT", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mfg", false)) return false;
		if (ew.valueChanged(fobj, infix, "UR", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_pharled_returnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_pharled_returnlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_pharmacy_pharled_returnlist.lists["x_Product"] = <?php echo $view_pharmacy_pharled_return_list->Product->Lookup->toClientList($view_pharmacy_pharled_return_list) ?>;
	fview_pharmacy_pharled_returnlist.lists["x_Product"].options = <?php echo JsonEncode($view_pharmacy_pharled_return_list->Product->lookupOptions()) ?>;
	fview_pharmacy_pharled_returnlist.autoSuggests["x_Product"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_pharmacy_pharled_returnlist");
});
var fview_pharmacy_pharled_returnlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_pharled_returnlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_pharled_returnlistsrch");

	// Dynamic selection lists
	// Filters

	fview_pharmacy_pharled_returnlistsrch.filterList = <?php echo $view_pharmacy_pharled_return_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_pharled_returnlistsrch");
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
<?php if (!$view_pharmacy_pharled_return_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_pharled_return_list->TotalRecords > 0 && $view_pharmacy_pharled_return_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_pharled_return_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_pharmacy_pharled_return_list->isExport("print")) { ?>
<?php
if ($view_pharmacy_pharled_return_list->DbMasterFilter != "" && $view_pharmacy_pharled_return->getCurrentMasterTable() == "pharmacy_billing_return") {
	if ($view_pharmacy_pharled_return_list->MasterRecordExists) {
		include_once "pharmacy_billing_returnmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacy_pharled_return_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_pharled_return_list->isExport() && !$view_pharmacy_pharled_return->CurrentAction) { ?>
<form name="fview_pharmacy_pharled_returnlistsrch" id="fview_pharmacy_pharled_returnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_pharled_returnlistsrch-search-panel" class="<?php echo $view_pharmacy_pharled_return_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_pharmacy_pharled_return_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_pharled_return_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_pharled_return_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_pharled_return_list->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_return_list->showMessage();
?>
<?php if ($view_pharmacy_pharled_return_list->TotalRecords > 0 || $view_pharmacy_pharled_return->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_pharled_return_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
<?php if (!$view_pharmacy_pharled_return_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_pharled_return_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_pharled_return_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_pharled_returnlist" id="fview_pharmacy_pharled_returnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<?php if ($view_pharmacy_pharled_return->getCurrentMasterTable() == "pharmacy_billing_return" && $view_pharmacy_pharled_return->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_return">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->pbt->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacy_pharled_return" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_pharled_return_list->TotalRecords > 0 || $view_pharmacy_pharled_return_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_pharled_returnlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_pharled_return->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_pharled_return_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_return_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled_return_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled_return_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_pharled_return_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->PRC) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return_list->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_pharled_return_list->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->SiNo) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->SiNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->SiNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return_list->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_pharled_return_list->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->Product) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->Product->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->Product->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return_list->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_pharled_return_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->RT) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return_list->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_pharled_return_list->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->MRQ) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return_list->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_pharled_return_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->IQ) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return_list->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_pharled_return_list->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->DAMT) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->DAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->DAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return_list->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_pharled_return_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->BATCHNO) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return_list->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_pharled_return_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->EXPDT) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return_list->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_pharled_return_list->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->Mfg) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->Mfg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->Mfg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->UR->Visible) { // UR ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->UR) == "") { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return_list->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->UR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UR" class="<?php echo $view_pharmacy_pharled_return_list->UR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->UR) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->UR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->UR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->_USERID->Visible) { // USERID ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->_USERID) == "") { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return_list->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->_USERID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_USERID" class="<?php echo $view_pharmacy_pharled_return_list->_USERID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->_USERID) ?>', 1);"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->_USERID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->_USERID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->_USERID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->id->Visible) { // id ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return_list->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_pharled_return_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->id) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return_list->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_pharled_return_list->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->HosoID) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return_list->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_pharled_return_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->createdby) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return_list->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_pharled_return_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->createddatetime) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return_list->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_pharled_return_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->modifiedby) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_pharled_return_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->modifieddatetime) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->BRNAME->Visible) { // BRNAME ?>
	<?php if ($view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return_list->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $view_pharmacy_pharled_return_list->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_pharled_return_list->SortUrl($view_pharmacy_pharled_return_list->BRNAME) ?>', 1);"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled_return_list->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled_return_list->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled_return_list->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_pharled_return_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_pharled_return_list->ExportAll && $view_pharmacy_pharled_return_list->isExport()) {
	$view_pharmacy_pharled_return_list->StopRecord = $view_pharmacy_pharled_return_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_pharled_return_list->TotalRecords > $view_pharmacy_pharled_return_list->StartRecord + $view_pharmacy_pharled_return_list->DisplayRecords - 1)
		$view_pharmacy_pharled_return_list->StopRecord = $view_pharmacy_pharled_return_list->StartRecord + $view_pharmacy_pharled_return_list->DisplayRecords - 1;
	else
		$view_pharmacy_pharled_return_list->StopRecord = $view_pharmacy_pharled_return_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_pharmacy_pharled_return->isConfirm() || $view_pharmacy_pharled_return_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_pharled_return_list->FormKeyCountName) && ($view_pharmacy_pharled_return_list->isGridAdd() || $view_pharmacy_pharled_return_list->isGridEdit() || $view_pharmacy_pharled_return->isConfirm())) {
		$view_pharmacy_pharled_return_list->KeyCount = $CurrentForm->getValue($view_pharmacy_pharled_return_list->FormKeyCountName);
		$view_pharmacy_pharled_return_list->StopRecord = $view_pharmacy_pharled_return_list->StartRecord + $view_pharmacy_pharled_return_list->KeyCount - 1;
	}
}
$view_pharmacy_pharled_return_list->RecordCount = $view_pharmacy_pharled_return_list->StartRecord - 1;
if ($view_pharmacy_pharled_return_list->Recordset && !$view_pharmacy_pharled_return_list->Recordset->EOF) {
	$view_pharmacy_pharled_return_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_pharled_return_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_pharled_return_list->StartRecord > 1)
		$view_pharmacy_pharled_return_list->Recordset->move($view_pharmacy_pharled_return_list->StartRecord - 1);
} elseif (!$view_pharmacy_pharled_return->AllowAddDeleteRow && $view_pharmacy_pharled_return_list->StopRecord == 0) {
	$view_pharmacy_pharled_return_list->StopRecord = $view_pharmacy_pharled_return->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_pharled_return->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_pharled_return->resetAttributes();
$view_pharmacy_pharled_return_list->renderRow();
if ($view_pharmacy_pharled_return_list->isGridAdd())
	$view_pharmacy_pharled_return_list->RowIndex = 0;
if ($view_pharmacy_pharled_return_list->isGridEdit())
	$view_pharmacy_pharled_return_list->RowIndex = 0;
while ($view_pharmacy_pharled_return_list->RecordCount < $view_pharmacy_pharled_return_list->StopRecord) {
	$view_pharmacy_pharled_return_list->RecordCount++;
	if ($view_pharmacy_pharled_return_list->RecordCount >= $view_pharmacy_pharled_return_list->StartRecord) {
		$view_pharmacy_pharled_return_list->RowCount++;
		if ($view_pharmacy_pharled_return_list->isGridAdd() || $view_pharmacy_pharled_return_list->isGridEdit() || $view_pharmacy_pharled_return->isConfirm()) {
			$view_pharmacy_pharled_return_list->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_pharled_return_list->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_pharled_return_list->FormActionName) && ($view_pharmacy_pharled_return->isConfirm() || $view_pharmacy_pharled_return_list->EventCancelled))
				$view_pharmacy_pharled_return_list->RowAction = strval($CurrentForm->getValue($view_pharmacy_pharled_return_list->FormActionName));
			elseif ($view_pharmacy_pharled_return_list->isGridAdd())
				$view_pharmacy_pharled_return_list->RowAction = "insert";
			else
				$view_pharmacy_pharled_return_list->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_pharled_return_list->KeyCount = $view_pharmacy_pharled_return_list->RowIndex;

		// Init row class and style
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->CssClass = "";
		if ($view_pharmacy_pharled_return_list->isGridAdd()) {
			$view_pharmacy_pharled_return_list->loadRowValues(); // Load default values
		} else {
			$view_pharmacy_pharled_return_list->loadRowValues($view_pharmacy_pharled_return_list->Recordset); // Load row values
		}
		$view_pharmacy_pharled_return->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_pharled_return_list->isGridAdd()) // Grid add
			$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
		if ($view_pharmacy_pharled_return_list->isGridAdd() && $view_pharmacy_pharled_return->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_pharmacy_pharled_return_list->restoreCurrentRowFormValues($view_pharmacy_pharled_return_list->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return_list->isGridEdit()) { // Grid edit
			if ($view_pharmacy_pharled_return->EventCancelled)
				$view_pharmacy_pharled_return_list->restoreCurrentRowFormValues($view_pharmacy_pharled_return_list->RowIndex); // Restore form values
			if ($view_pharmacy_pharled_return_list->RowAction == "insert")
				$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_pharled_return->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_pharled_return_list->isGridEdit() && ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT || $view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) && $view_pharmacy_pharled_return->EventCancelled) // Update failed
			$view_pharmacy_pharled_return_list->restoreCurrentRowFormValues($view_pharmacy_pharled_return_list->RowIndex); // Restore form values
		if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_pharled_return_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_pharmacy_pharled_return->RowAttrs->merge(["data-rowindex" => $view_pharmacy_pharled_return_list->RowCount, "id" => "r" . $view_pharmacy_pharled_return_list->RowCount . "_view_pharmacy_pharled_return", "data-rowtype" => $view_pharmacy_pharled_return->RowType]);

		// Render row
		$view_pharmacy_pharled_return_list->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_pharled_return_list->RowAction != "delete" && $view_pharmacy_pharled_return_list->RowAction != "insertdelete" && !($view_pharmacy_pharled_return_list->RowAction == "insert" && $view_pharmacy_pharled_return->isConfirm() && $view_pharmacy_pharled_return_list->emptyRow())) {
?>
	<tr <?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "left", $view_pharmacy_pharled_return_list->RowCount);
?>
	<?php if ($view_pharmacy_pharled_return_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_pharled_return_list->BRCODE->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_BRCODE">
<span<?php echo $view_pharmacy_pharled_return_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_pharled_return_list->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_PRC">
<span<?php echo $view_pharmacy_pharled_return_list->PRC->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo" <?php echo $view_pharmacy_pharled_return_list->SiNo->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->SiNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_SiNo">
<span<?php echo $view_pharmacy_pharled_return_list->SiNo->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Product->Visible) { // Product ?>
		<td data-name="Product" <?php echo $view_pharmacy_pharled_return_list->Product->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<?php
$onchange = $view_pharmacy_pharled_return_list->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_list->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_list->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_list->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_list->Product->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist"], function() {
	fview_pharmacy_pharled_returnlist.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_list->Product->Lookup->getParamTag($view_pharmacy_pharled_return_list, "p_x" . $view_pharmacy_pharled_return_list->RowIndex . "_Product") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<?php
$onchange = $view_pharmacy_pharled_return_list->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_list->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_list->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_list->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_list->Product->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist"], function() {
	fview_pharmacy_pharled_returnlist.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_list->Product->Lookup->getParamTag($view_pharmacy_pharled_return_list, "p_x" . $view_pharmacy_pharled_return_list->RowIndex . "_Product") ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_Product">
<span<?php echo $view_pharmacy_pharled_return_list->Product->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->Product->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $view_pharmacy_pharled_return_list->RT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->RT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->RT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_RT">
<span<?php echo $view_pharmacy_pharled_return_list->RT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $view_pharmacy_pharled_return_list->MRQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->MRQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_MRQ">
<span<?php echo $view_pharmacy_pharled_return_list->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->MRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $view_pharmacy_pharled_return_list->IQ->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->IQ->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->IQ->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_IQ">
<span<?php echo $view_pharmacy_pharled_return_list->IQ->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" <?php echo $view_pharmacy_pharled_return_list->DAMT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->DAMT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_DAMT">
<span<?php echo $view_pharmacy_pharled_return_list->DAMT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->DAMT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $view_pharmacy_pharled_return_list->BATCHNO->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->BATCHNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_BATCHNO">
<span<?php echo $view_pharmacy_pharled_return_list->BATCHNO->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $view_pharmacy_pharled_return_list->EXPDT->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_list->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_list->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_list->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_list->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_EXPDT">
<span<?php echo $view_pharmacy_pharled_return_list->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg" <?php echo $view_pharmacy_pharled_return_list->Mfg->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->Mfg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_Mfg">
<span<?php echo $view_pharmacy_pharled_return_list->Mfg->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->Mfg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->UR->Visible) { // UR ?>
		<td data-name="UR" <?php echo $view_pharmacy_pharled_return_list->UR->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->UR->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->UR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_UR">
<span<?php echo $view_pharmacy_pharled_return_list->UR->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID" <?php echo $view_pharmacy_pharled_return_list->_USERID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return__USERID">
<span<?php echo $view_pharmacy_pharled_return_list->_USERID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->_USERID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_pharled_return_list->id->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group">
<span<?php echo $view_pharmacy_pharled_return_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_pharmacy_pharled_return_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_id">
<span<?php echo $view_pharmacy_pharled_return_list->id->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $view_pharmacy_pharled_return_list->HosoID->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_HosoID">
<span<?php echo $view_pharmacy_pharled_return_list->HosoID->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->HosoID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_pharmacy_pharled_return_list->createdby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_createdby">
<span<?php echo $view_pharmacy_pharled_return_list->createdby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_pharmacy_pharled_return_list->createddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_createddatetime">
<span<?php echo $view_pharmacy_pharled_return_list->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_pharmacy_pharled_return_list->modifiedby->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_modifiedby">
<span<?php echo $view_pharmacy_pharled_return_list->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_pharled_return_list->modifieddatetime->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime">
<span<?php echo $view_pharmacy_pharled_return_list->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $view_pharmacy_pharled_return_list->BRNAME->cellAttributes() ?>>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_pharled_return_list->RowCount ?>_view_pharmacy_pharled_return_BRNAME">
<span<?php echo $view_pharmacy_pharled_return_list->BRNAME->viewAttributes() ?>><?php echo $view_pharmacy_pharled_return_list->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "right", $view_pharmacy_pharled_return_list->RowCount);
?>
	</tr>
<?php if ($view_pharmacy_pharled_return->RowType == ROWTYPE_ADD || $view_pharmacy_pharled_return->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "load"], function() {
	fview_pharmacy_pharled_returnlist.updateLists(<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_pharled_return_list->isGridAdd())
		if (!$view_pharmacy_pharled_return_list->Recordset->EOF)
			$view_pharmacy_pharled_return_list->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_pharled_return_list->isGridAdd() || $view_pharmacy_pharled_return_list->isGridEdit()) {
		$view_pharmacy_pharled_return_list->RowIndex = '$rowindex$';
		$view_pharmacy_pharled_return_list->loadRowValues();

		// Set row properties
		$view_pharmacy_pharled_return->resetAttributes();
		$view_pharmacy_pharled_return->RowAttrs->merge(["data-rowindex" => $view_pharmacy_pharled_return_list->RowIndex, "id" => "r0_view_pharmacy_pharled_return", "data-rowtype" => ROWTYPE_ADD]);
		$view_pharmacy_pharled_return->RowAttrs->appendClass("ew-template");
		$view_pharmacy_pharled_return->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_pharled_return_list->renderRow();

		// Render list options
		$view_pharmacy_pharled_return_list->renderListOptions();
		$view_pharmacy_pharled_return_list->StartRowCount = 0;
?>
	<tr <?php echo $view_pharmacy_pharled_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "left", $view_pharmacy_pharled_return_list->RowIndex);
?>
	<?php if ($view_pharmacy_pharled_return_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->PRC->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo">
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->SiNo->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->SiNo->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->SiNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_SiNo" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->SiNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Product->Visible) { // Product ?>
		<td data-name="Product">
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<?php
$onchange = $view_pharmacy_pharled_return_list->Product->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_pharmacy_pharled_return_list->Product->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product">
	<input type="text" class="form-control" name="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="sv_x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo RemoveHtml($view_pharmacy_pharled_return_list->Product->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->getPlaceHolder()) ?>"<?php echo $view_pharmacy_pharled_return_list->Product->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-value-separator="<?php echo $view_pharmacy_pharled_return_list->Product->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist"], function() {
	fview_pharmacy_pharled_returnlist.createAutoSuggest({"id":"x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product","forceSelect":true});
});
</script>
<?php echo $view_pharmacy_pharled_return_list->Product->Lookup->getParamTag($view_pharmacy_pharled_return_list, "p_x" . $view_pharmacy_pharled_return_list->RowIndex . "_Product") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Product" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Product->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->RT->Visible) { // RT ?>
		<td data-name="RT">
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->RT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->RT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->RT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_RT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->RT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ">
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->MRQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->MRQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->MRQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_MRQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->MRQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ">
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->IQ->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->IQ->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->IQ->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_IQ" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->IQ->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT">
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->DAMT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->DAMT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->DAMT->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_DAMT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->DAMT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO">
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->BATCHNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BATCHNO" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BATCHNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT">
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_pharled_return_list->EXPDT->ReadOnly && !$view_pharmacy_pharled_return_list->EXPDT->Disabled && !isset($view_pharmacy_pharled_return_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_pharled_return_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_EXPDT" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->EXPDT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg">
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Mfg->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->Mfg->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->Mfg->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_Mfg" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->Mfg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->UR->Visible) { // UR ?>
		<td data-name="UR">
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="text" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="x<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->UR->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_pharled_return_list->UR->EditValue ?>"<?php echo $view_pharmacy_pharled_return_list->UR->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_UR" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->UR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->_USERID->Visible) { // USERID ?>
		<td data-name="_USERID">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>__USERID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->_USERID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id"></span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_HosoID" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->HosoID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_return_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" name="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" id="o<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>_BRNAME" value="<?php echo HtmlEncode($view_pharmacy_pharled_return_list->BRNAME->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_return_list->ListOptions->render("body", "right", $view_pharmacy_pharled_return_list->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "load"], function() {
	fview_pharmacy_pharled_returnlist.updateLists(<?php echo $view_pharmacy_pharled_return_list->RowIndex ?>);
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
<?php if ($view_pharmacy_pharled_return_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_pharled_return_list->KeyCount ?>">
<?php echo $view_pharmacy_pharled_return_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_pharled_return_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_pharled_return_list->KeyCount ?>">
<?php echo $view_pharmacy_pharled_return_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_pharmacy_pharled_return->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_pharled_return_list->Recordset)
	$view_pharmacy_pharled_return_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_pharled_return_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_pharled_return_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_pharled_return_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_pharled_return_list->TotalRecords == 0 && !$view_pharmacy_pharled_return->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_return_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_pharled_return_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_pharled_return_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");
	//$("[data-name='SiNo']").hide();
	//$("[data-name='Product']").hide();
	//$("[data-name='Mfg']").hide();

			  $("[data-name='BRCODE']").hide();
			  $("[data-name='TYPE']").hide();
			  $("[data-name='DN']").hide();
			  $("[data-name='RDN']").hide();
			  $("[data-name='DT']").hide();
			  $("[data-name='UR']").hide();
			  $("[data-name='PRC']").hide();
			  $("[data-name='OQ']").hide();
			  $("[data-name='RQ']").hide();

			//  $("[data-name='MRQ']").hide();
			  $("[data-name='IQ']").hide();

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
			  $("[data-name='SLNO']").hide();
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
<?php if (!$view_pharmacy_pharled_return->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_pharled_return",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_pharled_return_list->terminate();
?>