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
$pres_trade_combination_names_new_list = new pres_trade_combination_names_new_list();

// Run the page
$pres_trade_combination_names_new_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_trade_combination_names_new_list->isExport()) { ?>
<script>
var fpres_trade_combination_names_newlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_trade_combination_names_newlist = currentForm = new ew.Form("fpres_trade_combination_names_newlist", "list");
	fpres_trade_combination_names_newlist.formKeyCountName = '<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>';

	// Validate form
	fpres_trade_combination_names_newlist.validate = function() {
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
			<?php if ($pres_trade_combination_names_new_list->ID->Required) { ?>
				elm = this.getElements("x" + infix + "_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->ID->caption(), $pres_trade_combination_names_new_list->ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->tradenames_id->Required) { ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->tradenames_id->caption(), $pres_trade_combination_names_new_list->tradenames_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_trade_combination_names_new_list->tradenames_id->errorMessage()) ?>");
			<?php if ($pres_trade_combination_names_new_list->Drug_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Drug_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->Drug_Name->caption(), $pres_trade_combination_names_new_list->Drug_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->Generic_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Generic_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->Generic_Name->caption(), $pres_trade_combination_names_new_list->Generic_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->Trade_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Trade_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->Trade_Name->caption(), $pres_trade_combination_names_new_list->Trade_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->PR_CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PR_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->PR_CODE->caption(), $pres_trade_combination_names_new_list->PR_CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->Form->caption(), $pres_trade_combination_names_new_list->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->Strength->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->Strength->caption(), $pres_trade_combination_names_new_list->Strength->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->Unit->caption(), $pres_trade_combination_names_new_list->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->CONTAINER_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->CONTAINER_TYPE->caption(), $pres_trade_combination_names_new_list->CONTAINER_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->caption(), $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_list->TypeOfDrug->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfDrug");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_list->TypeOfDrug->caption(), $pres_trade_combination_names_new_list->TypeOfDrug->RequiredErrorMessage)) ?>");
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
	fpres_trade_combination_names_newlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "tradenames_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Drug_Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "Generic_Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "Trade_Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "PR_CODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "Form", false)) return false;
		if (ew.valueChanged(fobj, infix, "Strength", false)) return false;
		if (ew.valueChanged(fobj, infix, "Unit", false)) return false;
		if (ew.valueChanged(fobj, infix, "CONTAINER_TYPE", false)) return false;
		if (ew.valueChanged(fobj, infix, "CONTAINER_STRENGTH", false)) return false;
		if (ew.valueChanged(fobj, infix, "TypeOfDrug", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpres_trade_combination_names_newlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_trade_combination_names_newlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpres_trade_combination_names_newlist.lists["x_Generic_Name"] = <?php echo $pres_trade_combination_names_new_list->Generic_Name->Lookup->toClientList($pres_trade_combination_names_new_list) ?>;
	fpres_trade_combination_names_newlist.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_trade_combination_names_new_list->Generic_Name->lookupOptions()) ?>;
	fpres_trade_combination_names_newlist.lists["x_Form"] = <?php echo $pres_trade_combination_names_new_list->Form->Lookup->toClientList($pres_trade_combination_names_new_list) ?>;
	fpres_trade_combination_names_newlist.lists["x_Form"].options = <?php echo JsonEncode($pres_trade_combination_names_new_list->Form->lookupOptions()) ?>;
	fpres_trade_combination_names_newlist.lists["x_Unit"] = <?php echo $pres_trade_combination_names_new_list->Unit->Lookup->toClientList($pres_trade_combination_names_new_list) ?>;
	fpres_trade_combination_names_newlist.lists["x_Unit"].options = <?php echo JsonEncode($pres_trade_combination_names_new_list->Unit->lookupOptions()) ?>;
	fpres_trade_combination_names_newlist.lists["x_TypeOfDrug"] = <?php echo $pres_trade_combination_names_new_list->TypeOfDrug->Lookup->toClientList($pres_trade_combination_names_new_list) ?>;
	fpres_trade_combination_names_newlist.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_trade_combination_names_new_list->TypeOfDrug->options(FALSE, TRUE)) ?>;
	loadjs.done("fpres_trade_combination_names_newlist");
});
var fpres_trade_combination_names_newlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_trade_combination_names_newlistsrch = currentSearchForm = new ew.Form("fpres_trade_combination_names_newlistsrch");

	// Dynamic selection lists
	// Filters

	fpres_trade_combination_names_newlistsrch.filterList = <?php echo $pres_trade_combination_names_new_list->getFilterList() ?>;
	loadjs.done("fpres_trade_combination_names_newlistsrch");
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
<?php if (!$pres_trade_combination_names_new_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_trade_combination_names_new_list->TotalRecords > 0 && $pres_trade_combination_names_new_list->ExportOptions->visible()) { ?>
<?php $pres_trade_combination_names_new_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->ImportOptions->visible()) { ?>
<?php $pres_trade_combination_names_new_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->SearchOptions->visible()) { ?>
<?php $pres_trade_combination_names_new_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->FilterOptions->visible()) { ?>
<?php $pres_trade_combination_names_new_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pres_trade_combination_names_new_list->isExport() || Config("EXPORT_MASTER_RECORD") && $pres_trade_combination_names_new_list->isExport("print")) { ?>
<?php
if ($pres_trade_combination_names_new_list->DbMasterFilter != "" && $pres_trade_combination_names_new->getCurrentMasterTable() == "pres_tradenames_new") {
	if ($pres_trade_combination_names_new_list->MasterRecordExists) {
		include_once "pres_tradenames_newmaster.php";
	}
}
?>
<?php } ?>
<?php
$pres_trade_combination_names_new_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_trade_combination_names_new_list->isExport() && !$pres_trade_combination_names_new->CurrentAction) { ?>
<form name="fpres_trade_combination_names_newlistsrch" id="fpres_trade_combination_names_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_trade_combination_names_newlistsrch-search-panel" class="<?php echo $pres_trade_combination_names_new_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_trade_combination_names_new">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_trade_combination_names_new_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_trade_combination_names_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_trade_combination_names_new_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_new_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_new_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_trade_combination_names_new_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_trade_combination_names_new_list->showPageHeader(); ?>
<?php
$pres_trade_combination_names_new_list->showMessage();
?>
<?php if ($pres_trade_combination_names_new_list->TotalRecords > 0 || $pres_trade_combination_names_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_trade_combination_names_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names_new">
<?php if (!$pres_trade_combination_names_new_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_trade_combination_names_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_trade_combination_names_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_trade_combination_names_newlist" id="fpres_trade_combination_names_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<?php if ($pres_trade_combination_names_new->getCurrentMasterTable() == "pres_tradenames_new" && $pres_trade_combination_names_new->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pres_tradenames_new">
<input type="hidden" name="fk_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pres_trade_combination_names_new" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_trade_combination_names_new_list->TotalRecords > 0 || $pres_trade_combination_names_new_list->isAdd() || $pres_trade_combination_names_new_list->isCopy() || $pres_trade_combination_names_new_list->isGridEdit()) { ?>
<table id="tbl_pres_trade_combination_names_newlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_trade_combination_names_new->RowType = ROWTYPE_HEADER;

// Render list options
$pres_trade_combination_names_new_list->renderListOptions();

// Render list options (header, left)
$pres_trade_combination_names_new_list->ListOptions->render("header", "left");
?>
<?php if ($pres_trade_combination_names_new_list->ID->Visible) { // ID ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $pres_trade_combination_names_new_list->ID->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $pres_trade_combination_names_new_list->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->ID) ?>', 1);"><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->tradenames_id->Visible) { // tradenames_id ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->tradenames_id) == "") { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names_new_list->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->tradenames_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names_new_list->tradenames_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->tradenames_id) ?>', 1);"><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->tradenames_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->tradenames_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->tradenames_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->Drug_Name->Visible) { // Drug_Name ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Drug_Name) == "") { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_trade_combination_names_new_list->Drug_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Drug_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_trade_combination_names_new_list->Drug_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Drug_Name) ?>', 1);"><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Drug_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->Drug_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->Drug_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->Generic_Name->Visible) { // Generic_Name ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Generic_Name) == "") { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_trade_combination_names_new_list->Generic_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Generic_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_trade_combination_names_new_list->Generic_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Generic_Name) ?>', 1);"><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Generic_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->Generic_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->Generic_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->Trade_Name->Visible) { // Trade_Name ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Trade_Name) == "") { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_trade_combination_names_new_list->Trade_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Trade_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_trade_combination_names_new_list->Trade_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Trade_Name) ?>', 1);"><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Trade_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->Trade_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->Trade_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names_new_list->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names_new_list->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->PR_CODE) ?>', 1);"><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->PR_CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->PR_CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->Form->Visible) { // Form ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $pres_trade_combination_names_new_list->Form->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $pres_trade_combination_names_new_list->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Form) ?>', 1);"><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Form->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->Form->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->Form->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->Strength->Visible) { // Strength ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Strength) == "") { ?>
		<th data-name="Strength" class="<?php echo $pres_trade_combination_names_new_list->Strength->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Strength->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength" class="<?php echo $pres_trade_combination_names_new_list->Strength->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Strength) ?>', 1);"><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Strength->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->Strength->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->Strength->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->Unit->Visible) { // Unit ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $pres_trade_combination_names_new_list->Unit->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $pres_trade_combination_names_new_list->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->Unit) ?>', 1);"><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->CONTAINER_TYPE) == "") { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->CONTAINER_TYPE) ?>', 1);"><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->CONTAINER_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->CONTAINER_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->CONTAINER_STRENGTH) == "") { ?>
		<th data-name="CONTAINER_STRENGTH" class="<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_STRENGTH" class="<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->CONTAINER_STRENGTH) ?>', 1);"><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php if ($pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->TypeOfDrug) == "") { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->TypeOfDrug->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_trade_combination_names_new_list->SortUrl($pres_trade_combination_names_new_list->TypeOfDrug) ?>', 1);"><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_list->TypeOfDrug->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_list->TypeOfDrug->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_list->TypeOfDrug->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_trade_combination_names_new_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($pres_trade_combination_names_new_list->isAdd() || $pres_trade_combination_names_new_list->isCopy()) {
		$pres_trade_combination_names_new_list->RowIndex = 0;
		$pres_trade_combination_names_new_list->KeyCount = $pres_trade_combination_names_new_list->RowIndex;
		if ($pres_trade_combination_names_new_list->isCopy() && !$pres_trade_combination_names_new_list->loadRow())
			$pres_trade_combination_names_new->CurrentAction = "add";
		if ($pres_trade_combination_names_new_list->isAdd())
			$pres_trade_combination_names_new_list->loadRowValues();
		if ($pres_trade_combination_names_new->EventCancelled) // Insert failed
			$pres_trade_combination_names_new_list->restoreFormValues(); // Restore form values

		// Set row properties
		$pres_trade_combination_names_new->resetAttributes();
		$pres_trade_combination_names_new->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_pres_trade_combination_names_new", "data-rowtype" => ROWTYPE_ADD]);
		$pres_trade_combination_names_new->RowType = ROWTYPE_ADD;

		// Render row
		$pres_trade_combination_names_new_list->renderRow();

		// Render list options
		$pres_trade_combination_names_new_list->renderListOptions();
		$pres_trade_combination_names_new_list->StartRowCount = 0;
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_list->ListOptions->render("body", "left", $pres_trade_combination_names_new_list->RowCount);
?>
	<?php if ($pres_trade_combination_names_new_list->ID->Visible) { // ID ?>
		<td data-name="ID">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->ID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id">
<?php if ($pres_trade_combination_names_new_list->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_list->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_list->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Drug_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_list->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Generic_Name") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Generic_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Trade_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->PR_CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Form->Visible) { // Form ?>
		<td data-name="Form">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_list->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Form->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Form") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Form->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Strength->Visible) { // Strength ?>
		<td data-name="Strength">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Strength->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_list->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Unit->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Unit") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<td data-name="CONTAINER_STRENGTH">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug">
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->TypeOfDrug->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_list->ListOptions->render("body", "right", $pres_trade_combination_names_new_list->RowCount);
?>
<script>
loadjs.ready(["fpres_trade_combination_names_newlist", "load"], function() {
	fpres_trade_combination_names_newlist.updateLists(<?php echo $pres_trade_combination_names_new_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($pres_trade_combination_names_new_list->ExportAll && $pres_trade_combination_names_new_list->isExport()) {
	$pres_trade_combination_names_new_list->StopRecord = $pres_trade_combination_names_new_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_trade_combination_names_new_list->TotalRecords > $pres_trade_combination_names_new_list->StartRecord + $pres_trade_combination_names_new_list->DisplayRecords - 1)
		$pres_trade_combination_names_new_list->StopRecord = $pres_trade_combination_names_new_list->StartRecord + $pres_trade_combination_names_new_list->DisplayRecords - 1;
	else
		$pres_trade_combination_names_new_list->StopRecord = $pres_trade_combination_names_new_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($pres_trade_combination_names_new->isConfirm() || $pres_trade_combination_names_new_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pres_trade_combination_names_new_list->FormKeyCountName) && ($pres_trade_combination_names_new_list->isGridAdd() || $pres_trade_combination_names_new_list->isGridEdit() || $pres_trade_combination_names_new->isConfirm())) {
		$pres_trade_combination_names_new_list->KeyCount = $CurrentForm->getValue($pres_trade_combination_names_new_list->FormKeyCountName);
		$pres_trade_combination_names_new_list->StopRecord = $pres_trade_combination_names_new_list->StartRecord + $pres_trade_combination_names_new_list->KeyCount - 1;
	}
}
$pres_trade_combination_names_new_list->RecordCount = $pres_trade_combination_names_new_list->StartRecord - 1;
if ($pres_trade_combination_names_new_list->Recordset && !$pres_trade_combination_names_new_list->Recordset->EOF) {
	$pres_trade_combination_names_new_list->Recordset->moveFirst();
	$selectLimit = $pres_trade_combination_names_new_list->UseSelectLimit;
	if (!$selectLimit && $pres_trade_combination_names_new_list->StartRecord > 1)
		$pres_trade_combination_names_new_list->Recordset->move($pres_trade_combination_names_new_list->StartRecord - 1);
} elseif (!$pres_trade_combination_names_new->AllowAddDeleteRow && $pres_trade_combination_names_new_list->StopRecord == 0) {
	$pres_trade_combination_names_new_list->StopRecord = $pres_trade_combination_names_new->GridAddRowCount;
}

// Initialize aggregate
$pres_trade_combination_names_new->RowType = ROWTYPE_AGGREGATEINIT;
$pres_trade_combination_names_new->resetAttributes();
$pres_trade_combination_names_new_list->renderRow();
if ($pres_trade_combination_names_new_list->isGridAdd())
	$pres_trade_combination_names_new_list->RowIndex = 0;
if ($pres_trade_combination_names_new_list->isGridEdit())
	$pres_trade_combination_names_new_list->RowIndex = 0;
while ($pres_trade_combination_names_new_list->RecordCount < $pres_trade_combination_names_new_list->StopRecord) {
	$pres_trade_combination_names_new_list->RecordCount++;
	if ($pres_trade_combination_names_new_list->RecordCount >= $pres_trade_combination_names_new_list->StartRecord) {
		$pres_trade_combination_names_new_list->RowCount++;
		if ($pres_trade_combination_names_new_list->isGridAdd() || $pres_trade_combination_names_new_list->isGridEdit() || $pres_trade_combination_names_new->isConfirm()) {
			$pres_trade_combination_names_new_list->RowIndex++;
			$CurrentForm->Index = $pres_trade_combination_names_new_list->RowIndex;
			if ($CurrentForm->hasValue($pres_trade_combination_names_new_list->FormActionName) && ($pres_trade_combination_names_new->isConfirm() || $pres_trade_combination_names_new_list->EventCancelled))
				$pres_trade_combination_names_new_list->RowAction = strval($CurrentForm->getValue($pres_trade_combination_names_new_list->FormActionName));
			elseif ($pres_trade_combination_names_new_list->isGridAdd())
				$pres_trade_combination_names_new_list->RowAction = "insert";
			else
				$pres_trade_combination_names_new_list->RowAction = "";
		}

		// Set up key count
		$pres_trade_combination_names_new_list->KeyCount = $pres_trade_combination_names_new_list->RowIndex;

		// Init row class and style
		$pres_trade_combination_names_new->resetAttributes();
		$pres_trade_combination_names_new->CssClass = "";
		if ($pres_trade_combination_names_new_list->isGridAdd()) {
			$pres_trade_combination_names_new_list->loadRowValues(); // Load default values
		} else {
			$pres_trade_combination_names_new_list->loadRowValues($pres_trade_combination_names_new_list->Recordset); // Load row values
		}
		$pres_trade_combination_names_new->RowType = ROWTYPE_VIEW; // Render view
		if ($pres_trade_combination_names_new_list->isGridAdd()) // Grid add
			$pres_trade_combination_names_new->RowType = ROWTYPE_ADD; // Render add
		if ($pres_trade_combination_names_new_list->isGridAdd() && $pres_trade_combination_names_new->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pres_trade_combination_names_new_list->restoreCurrentRowFormValues($pres_trade_combination_names_new_list->RowIndex); // Restore form values
		if ($pres_trade_combination_names_new_list->isGridEdit()) { // Grid edit
			if ($pres_trade_combination_names_new->EventCancelled)
				$pres_trade_combination_names_new_list->restoreCurrentRowFormValues($pres_trade_combination_names_new_list->RowIndex); // Restore form values
			if ($pres_trade_combination_names_new_list->RowAction == "insert")
				$pres_trade_combination_names_new->RowType = ROWTYPE_ADD; // Render add
			else
				$pres_trade_combination_names_new->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pres_trade_combination_names_new_list->isGridEdit() && ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT || $pres_trade_combination_names_new->RowType == ROWTYPE_ADD) && $pres_trade_combination_names_new->EventCancelled) // Update failed
			$pres_trade_combination_names_new_list->restoreCurrentRowFormValues($pres_trade_combination_names_new_list->RowIndex); // Restore form values
		if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) // Edit row
			$pres_trade_combination_names_new_list->EditRowCount++;

		// Set up row id / data-rowindex
		$pres_trade_combination_names_new->RowAttrs->merge(["data-rowindex" => $pres_trade_combination_names_new_list->RowCount, "id" => "r" . $pres_trade_combination_names_new_list->RowCount . "_pres_trade_combination_names_new", "data-rowtype" => $pres_trade_combination_names_new->RowType]);

		// Render row
		$pres_trade_combination_names_new_list->renderRow();

		// Render list options
		$pres_trade_combination_names_new_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pres_trade_combination_names_new_list->RowAction != "delete" && $pres_trade_combination_names_new_list->RowAction != "insertdelete" && !($pres_trade_combination_names_new_list->RowAction == "insert" && $pres_trade_combination_names_new->isConfirm() && $pres_trade_combination_names_new_list->emptyRow())) {
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_list->ListOptions->render("body", "left", $pres_trade_combination_names_new_list->RowCount);
?>
	<?php if ($pres_trade_combination_names_new_list->ID->Visible) { // ID ?>
		<td data-name="ID" <?php echo $pres_trade_combination_names_new_list->ID->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->ID->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group">
<span<?php echo $pres_trade_combination_names_new_list->ID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_list->ID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->ID->CurrentValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_ID">
<span<?php echo $pres_trade_combination_names_new_list->ID->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->ID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id" <?php echo $pres_trade_combination_names_new_list->tradenames_id->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pres_trade_combination_names_new_list->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?php echo $pres_trade_combination_names_new_list->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_list->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pres_trade_combination_names_new_list->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?php echo $pres_trade_combination_names_new_list->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_list->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_list->tradenames_id->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->tradenames_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name" <?php echo $pres_trade_combination_names_new_list->Drug_Name->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Drug_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Drug_Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Drug_Name">
<span<?php echo $pres_trade_combination_names_new_list->Drug_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->Drug_Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name" <?php echo $pres_trade_combination_names_new_list->Generic_Name->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_list->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Generic_Name") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Generic_Name->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_list->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Generic_Name") ?>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Generic_Name">
<span<?php echo $pres_trade_combination_names_new_list->Generic_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->Generic_Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name" <?php echo $pres_trade_combination_names_new_list->Trade_Name->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Trade_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Trade_Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Trade_Name">
<span<?php echo $pres_trade_combination_names_new_list->Trade_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->Trade_Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE" <?php echo $pres_trade_combination_names_new_list->PR_CODE->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->PR_CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->PR_CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_PR_CODE">
<span<?php echo $pres_trade_combination_names_new_list->PR_CODE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->PR_CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Form->Visible) { // Form ?>
		<td data-name="Form" <?php echo $pres_trade_combination_names_new_list->Form->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_list->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Form->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Form") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Form->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_list->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Form->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Form") ?>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Form">
<span<?php echo $pres_trade_combination_names_new_list->Form->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->Form->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Strength->Visible) { // Strength ?>
		<td data-name="Strength" <?php echo $pres_trade_combination_names_new_list->Strength->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Strength->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Strength->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Strength">
<span<?php echo $pres_trade_combination_names_new_list->Strength->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->Strength->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $pres_trade_combination_names_new_list->Unit->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_list->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Unit->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Unit") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Unit->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_list->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Unit->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Unit") ?>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_Unit">
<span<?php echo $pres_trade_combination_names_new_list->Unit->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<td data-name="CONTAINER_STRENGTH" <?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug" <?php echo $pres_trade_combination_names_new_list->TypeOfDrug->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->TypeOfDrug->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_list->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug">
<span<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_list->TypeOfDrug->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_list->ListOptions->render("body", "right", $pres_trade_combination_names_new_list->RowCount);
?>
	</tr>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD || $pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpres_trade_combination_names_newlist", "load"], function() {
	fpres_trade_combination_names_newlist.updateLists(<?php echo $pres_trade_combination_names_new_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pres_trade_combination_names_new_list->isGridAdd())
		if (!$pres_trade_combination_names_new_list->Recordset->EOF)
			$pres_trade_combination_names_new_list->Recordset->moveNext();
}
?>
<?php
	if ($pres_trade_combination_names_new_list->isGridAdd() || $pres_trade_combination_names_new_list->isGridEdit()) {
		$pres_trade_combination_names_new_list->RowIndex = '$rowindex$';
		$pres_trade_combination_names_new_list->loadRowValues();

		// Set row properties
		$pres_trade_combination_names_new->resetAttributes();
		$pres_trade_combination_names_new->RowAttrs->merge(["data-rowindex" => $pres_trade_combination_names_new_list->RowIndex, "id" => "r0_pres_trade_combination_names_new", "data-rowtype" => ROWTYPE_ADD]);
		$pres_trade_combination_names_new->RowAttrs->appendClass("ew-template");
		$pres_trade_combination_names_new->RowType = ROWTYPE_ADD;

		// Render row
		$pres_trade_combination_names_new_list->renderRow();

		// Render list options
		$pres_trade_combination_names_new_list->renderListOptions();
		$pres_trade_combination_names_new_list->StartRowCount = 0;
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_list->ListOptions->render("body", "left", $pres_trade_combination_names_new_list->RowIndex);
?>
	<?php if ($pres_trade_combination_names_new_list->ID->Visible) { // ID ?>
		<td data-name="ID">
<span id="el$rowindex$_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->ID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id">
<?php if ($pres_trade_combination_names_new_list->tradenames_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_list->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_list->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->tradenames_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name">
<span id="el$rowindex$_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Drug_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Drug_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name">
<span id="el$rowindex$_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_list->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Generic_Name") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Generic_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name">
<span id="el$rowindex$_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Trade_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Trade_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE">
<span id="el$rowindex$_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->PR_CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->PR_CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Form->Visible) { // Form ?>
		<td data-name="Form">
<span id="el$rowindex$_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_list->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Form->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Form") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Form->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Strength->Visible) { // Strength ?>
		<td data-name="Strength">
<span id="el$rowindex$_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->Strength->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Strength->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<span id="el$rowindex$_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_list->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_list->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_list->Unit->Lookup->getParamTag($pres_trade_combination_names_new_list, "p_x" . $pres_trade_combination_names_new_list->RowIndex . "_Unit") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE">
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_TYPE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<td data-name="CONTAINER_STRENGTH">
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_list->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->CONTAINER_STRENGTH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug">
<span id="el$rowindex$_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_list->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_list->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" id="o<?php echo $pres_trade_combination_names_new_list->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_list->TypeOfDrug->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_list->ListOptions->render("body", "right", $pres_trade_combination_names_new_list->RowIndex);
?>
<script>
loadjs.ready(["fpres_trade_combination_names_newlist", "load"], function() {
	fpres_trade_combination_names_newlist.updateLists(<?php echo $pres_trade_combination_names_new_list->RowIndex ?>);
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
<?php if ($pres_trade_combination_names_new_list->isAdd() || $pres_trade_combination_names_new_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>" id="<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>" value="<?php echo $pres_trade_combination_names_new_list->KeyCount ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>" id="<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>" value="<?php echo $pres_trade_combination_names_new_list->KeyCount ?>">
<?php echo $pres_trade_combination_names_new_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>" id="<?php echo $pres_trade_combination_names_new_list->FormKeyCountName ?>" value="<?php echo $pres_trade_combination_names_new_list->KeyCount ?>">
<?php echo $pres_trade_combination_names_new_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pres_trade_combination_names_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_trade_combination_names_new_list->Recordset)
	$pres_trade_combination_names_new_list->Recordset->Close();
?>
<?php if (!$pres_trade_combination_names_new_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_trade_combination_names_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_trade_combination_names_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_new_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_trade_combination_names_new_list->TotalRecords == 0 && !$pres_trade_combination_names_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_trade_combination_names_new_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_trade_combination_names_new_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_trade_combination_names_new->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_trade_combination_names_new",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_trade_combination_names_new_list->terminate();
?>