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
$ivf_vitrification_list = new ivf_vitrification_list();

// Run the page
$ivf_vitrification_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_vitrification_list->isExport()) { ?>
<script>
var fivf_vitrificationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_vitrificationlist = currentForm = new ew.Form("fivf_vitrificationlist", "list");
	fivf_vitrificationlist.formKeyCountName = '<?php echo $ivf_vitrification_list->FormKeyCountName ?>';

	// Validate form
	fivf_vitrificationlist.validate = function() {
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
			<?php if ($ivf_vitrification_list->vitrificationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->vitrificationDate->caption(), $ivf_vitrification_list->vitrificationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_list->vitrificationDate->errorMessage()) ?>");
			<?php if ($ivf_vitrification_list->PrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->PrimaryEmbryologist->caption(), $ivf_vitrification_list->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->SecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->SecondaryEmbryologist->caption(), $ivf_vitrification_list->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->EmbryoNo->caption(), $ivf_vitrification_list->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->FertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->FertilisationDate->caption(), $ivf_vitrification_list->FertilisationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_vitrification_list->FertilisationDate->errorMessage()) ?>");
			<?php if ($ivf_vitrification_list->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Day->caption(), $ivf_vitrification_list->Day->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Grade->caption(), $ivf_vitrification_list->Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Incubator->caption(), $ivf_vitrification_list->Incubator->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Tank->caption(), $ivf_vitrification_list->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Canister->caption(), $ivf_vitrification_list->Canister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->Gobiet->Required) { ?>
				elm = this.getElements("x" + infix + "_Gobiet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Gobiet->caption(), $ivf_vitrification_list->Gobiet->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->CryolockNo->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->CryolockNo->caption(), $ivf_vitrification_list->CryolockNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->CryolockColour->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockColour");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->CryolockColour->caption(), $ivf_vitrification_list->CryolockColour->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_vitrification_list->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification_list->Stage->caption(), $ivf_vitrification_list->Stage->RequiredErrorMessage)) ?>");
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
	fivf_vitrificationlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "vitrificationDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrimaryEmbryologist", false)) return false;
		if (ew.valueChanged(fobj, infix, "SecondaryEmbryologist", false)) return false;
		if (ew.valueChanged(fobj, infix, "EmbryoNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "FertilisationDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "Day", false)) return false;
		if (ew.valueChanged(fobj, infix, "Grade", false)) return false;
		if (ew.valueChanged(fobj, infix, "Incubator", false)) return false;
		if (ew.valueChanged(fobj, infix, "Tank", false)) return false;
		if (ew.valueChanged(fobj, infix, "Canister", false)) return false;
		if (ew.valueChanged(fobj, infix, "Gobiet", false)) return false;
		if (ew.valueChanged(fobj, infix, "CryolockNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "CryolockColour", false)) return false;
		if (ew.valueChanged(fobj, infix, "Stage", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fivf_vitrificationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_vitrificationlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_vitrificationlist.lists["x_Day"] = <?php echo $ivf_vitrification_list->Day->Lookup->toClientList($ivf_vitrification_list) ?>;
	fivf_vitrificationlist.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_list->Day->options(FALSE, TRUE)) ?>;
	fivf_vitrificationlist.lists["x_Grade"] = <?php echo $ivf_vitrification_list->Grade->Lookup->toClientList($ivf_vitrification_list) ?>;
	fivf_vitrificationlist.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_list->Grade->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_vitrificationlist");
});
var fivf_vitrificationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_vitrificationlistsrch = currentSearchForm = new ew.Form("fivf_vitrificationlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_vitrificationlistsrch.filterList = <?php echo $ivf_vitrification_list->getFilterList() ?>;
	loadjs.done("fivf_vitrificationlistsrch");
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
<?php if (!$ivf_vitrification_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_vitrification_list->TotalRecords > 0 && $ivf_vitrification_list->ExportOptions->visible()) { ?>
<?php $ivf_vitrification_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitrification_list->ImportOptions->visible()) { ?>
<?php $ivf_vitrification_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitrification_list->SearchOptions->visible()) { ?>
<?php $ivf_vitrification_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitrification_list->FilterOptions->visible()) { ?>
<?php $ivf_vitrification_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_vitrification_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_vitrification_list->isExport() && !$ivf_vitrification->CurrentAction) { ?>
<form name="fivf_vitrificationlistsrch" id="fivf_vitrificationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_vitrificationlistsrch-search-panel" class="<?php echo $ivf_vitrification_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_vitrification">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_vitrification_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_vitrification_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_vitrification_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_vitrification_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitrification_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_vitrification_list->showPageHeader(); ?>
<?php
$ivf_vitrification_list->showMessage();
?>
<?php if ($ivf_vitrification_list->TotalRecords > 0 || $ivf_vitrification->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_vitrification_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitrification">
<?php if (!$ivf_vitrification_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_vitrification_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_vitrification_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_vitrificationlist" id="fivf_vitrificationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<div id="gmp_ivf_vitrification" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_vitrification_list->TotalRecords > 0 || $ivf_vitrification_list->isGridEdit()) { ?>
<table id="tbl_ivf_vitrificationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_vitrification->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_vitrification_list->renderListOptions();

// Render list options (header, left)
$ivf_vitrification_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitrification_list->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->vitrificationDate) == "") { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_vitrification_list->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->vitrificationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_vitrification_list->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->vitrificationDate) ?>', 1);"><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->vitrificationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->vitrificationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_vitrification_list->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_vitrification_list->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->PrimaryEmbryologist) ?>', 1);"><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->PrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_vitrification_list->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_vitrification_list->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->SecondaryEmbryologist) ?>', 1);"><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->SecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_vitrification_list->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_vitrification_list->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->EmbryoNo) ?>', 1);"><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->EmbryoNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->EmbryoNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->FertilisationDate->Visible) { // FertilisationDate ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->FertilisationDate) == "") { ?>
		<th data-name="FertilisationDate" class="<?php echo $ivf_vitrification_list->FertilisationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->FertilisationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FertilisationDate" class="<?php echo $ivf_vitrification_list->FertilisationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->FertilisationDate) ?>', 1);"><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->FertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->FertilisationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->FertilisationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Day->Visible) { // Day ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $ivf_vitrification_list->Day->headerCellClass() ?>"><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $ivf_vitrification_list->Day->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Day) ?>', 1);"><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Day->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Day->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Grade->Visible) { // Grade ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $ivf_vitrification_list->Grade->headerCellClass() ?>"><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $ivf_vitrification_list->Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Grade) ?>', 1);"><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Grade->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Grade->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Incubator) == "") { ?>
		<th data-name="Incubator" class="<?php echo $ivf_vitrification_list->Incubator->headerCellClass() ?>"><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Incubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator" class="<?php echo $ivf_vitrification_list->Incubator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Incubator) ?>', 1);"><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Incubator->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Incubator->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Incubator->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Tank->Visible) { // Tank ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_vitrification_list->Tank->headerCellClass() ?>"><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_vitrification_list->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Tank) ?>', 1);"><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Tank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Tank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Canister->Visible) { // Canister ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Canister) == "") { ?>
		<th data-name="Canister" class="<?php echo $ivf_vitrification_list->Canister->headerCellClass() ?>"><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Canister->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Canister" class="<?php echo $ivf_vitrification_list->Canister->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Canister) ?>', 1);"><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Canister->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Canister->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Canister->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Gobiet->Visible) { // Gobiet ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Gobiet) == "") { ?>
		<th data-name="Gobiet" class="<?php echo $ivf_vitrification_list->Gobiet->headerCellClass() ?>"><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Gobiet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gobiet" class="<?php echo $ivf_vitrification_list->Gobiet->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Gobiet) ?>', 1);"><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Gobiet->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Gobiet->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Gobiet->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->CryolockNo->Visible) { // CryolockNo ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->CryolockNo) == "") { ?>
		<th data-name="CryolockNo" class="<?php echo $ivf_vitrification_list->CryolockNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->CryolockNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CryolockNo" class="<?php echo $ivf_vitrification_list->CryolockNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->CryolockNo) ?>', 1);"><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->CryolockNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->CryolockNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->CryolockNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->CryolockColour->Visible) { // CryolockColour ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->CryolockColour) == "") { ?>
		<th data-name="CryolockColour" class="<?php echo $ivf_vitrification_list->CryolockColour->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->CryolockColour->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CryolockColour" class="<?php echo $ivf_vitrification_list->CryolockColour->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->CryolockColour) ?>', 1);"><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->CryolockColour->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->CryolockColour->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->CryolockColour->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification_list->Stage->Visible) { // Stage ?>
	<?php if ($ivf_vitrification_list->SortUrl($ivf_vitrification_list->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $ivf_vitrification_list->Stage->headerCellClass() ?>"><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><div class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $ivf_vitrification_list->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitrification_list->SortUrl($ivf_vitrification_list->Stage) ?>', 1);"><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification_list->Stage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification_list->Stage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitrification_list->Stage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitrification_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_vitrification_list->ExportAll && $ivf_vitrification_list->isExport()) {
	$ivf_vitrification_list->StopRecord = $ivf_vitrification_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_vitrification_list->TotalRecords > $ivf_vitrification_list->StartRecord + $ivf_vitrification_list->DisplayRecords - 1)
		$ivf_vitrification_list->StopRecord = $ivf_vitrification_list->StartRecord + $ivf_vitrification_list->DisplayRecords - 1;
	else
		$ivf_vitrification_list->StopRecord = $ivf_vitrification_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($ivf_vitrification->isConfirm() || $ivf_vitrification_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_vitrification_list->FormKeyCountName) && ($ivf_vitrification_list->isGridAdd() || $ivf_vitrification_list->isGridEdit() || $ivf_vitrification->isConfirm())) {
		$ivf_vitrification_list->KeyCount = $CurrentForm->getValue($ivf_vitrification_list->FormKeyCountName);
		$ivf_vitrification_list->StopRecord = $ivf_vitrification_list->StartRecord + $ivf_vitrification_list->KeyCount - 1;
	}
}
$ivf_vitrification_list->RecordCount = $ivf_vitrification_list->StartRecord - 1;
if ($ivf_vitrification_list->Recordset && !$ivf_vitrification_list->Recordset->EOF) {
	$ivf_vitrification_list->Recordset->moveFirst();
	$selectLimit = $ivf_vitrification_list->UseSelectLimit;
	if (!$selectLimit && $ivf_vitrification_list->StartRecord > 1)
		$ivf_vitrification_list->Recordset->move($ivf_vitrification_list->StartRecord - 1);
} elseif (!$ivf_vitrification->AllowAddDeleteRow && $ivf_vitrification_list->StopRecord == 0) {
	$ivf_vitrification_list->StopRecord = $ivf_vitrification->GridAddRowCount;
}

// Initialize aggregate
$ivf_vitrification->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_vitrification->resetAttributes();
$ivf_vitrification_list->renderRow();
if ($ivf_vitrification_list->isGridAdd())
	$ivf_vitrification_list->RowIndex = 0;
if ($ivf_vitrification_list->isGridEdit())
	$ivf_vitrification_list->RowIndex = 0;
while ($ivf_vitrification_list->RecordCount < $ivf_vitrification_list->StopRecord) {
	$ivf_vitrification_list->RecordCount++;
	if ($ivf_vitrification_list->RecordCount >= $ivf_vitrification_list->StartRecord) {
		$ivf_vitrification_list->RowCount++;
		if ($ivf_vitrification_list->isGridAdd() || $ivf_vitrification_list->isGridEdit() || $ivf_vitrification->isConfirm()) {
			$ivf_vitrification_list->RowIndex++;
			$CurrentForm->Index = $ivf_vitrification_list->RowIndex;
			if ($CurrentForm->hasValue($ivf_vitrification_list->FormActionName) && ($ivf_vitrification->isConfirm() || $ivf_vitrification_list->EventCancelled))
				$ivf_vitrification_list->RowAction = strval($CurrentForm->getValue($ivf_vitrification_list->FormActionName));
			elseif ($ivf_vitrification_list->isGridAdd())
				$ivf_vitrification_list->RowAction = "insert";
			else
				$ivf_vitrification_list->RowAction = "";
		}

		// Set up key count
		$ivf_vitrification_list->KeyCount = $ivf_vitrification_list->RowIndex;

		// Init row class and style
		$ivf_vitrification->resetAttributes();
		$ivf_vitrification->CssClass = "";
		if ($ivf_vitrification_list->isGridAdd()) {
			$ivf_vitrification_list->loadRowValues(); // Load default values
		} else {
			$ivf_vitrification_list->loadRowValues($ivf_vitrification_list->Recordset); // Load row values
		}
		$ivf_vitrification->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_vitrification_list->isGridAdd()) // Grid add
			$ivf_vitrification->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_vitrification_list->isGridAdd() && $ivf_vitrification->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_vitrification_list->restoreCurrentRowFormValues($ivf_vitrification_list->RowIndex); // Restore form values
		if ($ivf_vitrification_list->isGridEdit()) { // Grid edit
			if ($ivf_vitrification->EventCancelled)
				$ivf_vitrification_list->restoreCurrentRowFormValues($ivf_vitrification_list->RowIndex); // Restore form values
			if ($ivf_vitrification_list->RowAction == "insert")
				$ivf_vitrification->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_vitrification->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_vitrification_list->isGridEdit() && ($ivf_vitrification->RowType == ROWTYPE_EDIT || $ivf_vitrification->RowType == ROWTYPE_ADD) && $ivf_vitrification->EventCancelled) // Update failed
			$ivf_vitrification_list->restoreCurrentRowFormValues($ivf_vitrification_list->RowIndex); // Restore form values
		if ($ivf_vitrification->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_vitrification_list->EditRowCount++;

		// Set up row id / data-rowindex
		$ivf_vitrification->RowAttrs->merge(["data-rowindex" => $ivf_vitrification_list->RowCount, "id" => "r" . $ivf_vitrification_list->RowCount . "_ivf_vitrification", "data-rowtype" => $ivf_vitrification->RowType]);

		// Render row
		$ivf_vitrification_list->renderRow();

		// Render list options
		$ivf_vitrification_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_vitrification_list->RowAction != "delete" && $ivf_vitrification_list->RowAction != "insertdelete" && !($ivf_vitrification_list->RowAction == "insert" && $ivf_vitrification->isConfirm() && $ivf_vitrification_list->emptyRow())) {
?>
	<tr <?php echo $ivf_vitrification->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_list->ListOptions->render("body", "left", $ivf_vitrification_list->RowCount);
?>
	<?php if ($ivf_vitrification_list->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate" <?php echo $ivf_vitrification_list->vitrificationDate->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_vitrificationDate" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification_list->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_list->vitrificationDate->ReadOnly && !$ivf_vitrification_list->vitrificationDate->Disabled && !isset($ivf_vitrification_list->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_list->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification_list->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_vitrificationDate" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification_list->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_list->vitrificationDate->ReadOnly && !$ivf_vitrification_list->vitrificationDate->Disabled && !isset($ivf_vitrification_list->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_list->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification_list->vitrificationDate->viewAttributes() ?>><?php echo $ivf_vitrification_list->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification_list->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_id" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification_list->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT || $ivf_vitrification->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_vitrification_list->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist" <?php echo $ivf_vitrification_list->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_list->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification_list->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_list->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification_list->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_list->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist" <?php echo $ivf_vitrification_list->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_list->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification_list->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_list->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification_list->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_list->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo" <?php echo $ivf_vitrification_list->EmbryoNo->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_EmbryoNo" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification_list->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification_list->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_EmbryoNo" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification_list->EmbryoNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification_list->EmbryoNo->viewAttributes() ?>><?php echo $ivf_vitrification_list->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate" <?php echo $ivf_vitrification_list->FertilisationDate->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_FertilisationDate" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification_list->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_list->FertilisationDate->ReadOnly && !$ivf_vitrification_list->FertilisationDate->Disabled && !isset($ivf_vitrification_list->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_list->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification_list->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_FertilisationDate" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification_list->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_list->FertilisationDate->ReadOnly && !$ivf_vitrification_list->FertilisationDate->Disabled && !isset($ivf_vitrification_list->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_list->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification_list->FertilisationDate->viewAttributes() ?>><?php echo $ivf_vitrification_list->FertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Day->Visible) { // Day ?>
		<td data-name="Day" <?php echo $ivf_vitrification_list->Day->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Day" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day"<?php echo $ivf_vitrification_list->Day->editAttributes() ?>>
			<?php echo $ivf_vitrification_list->Day->selectOptionListHtml("x{$ivf_vitrification_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification_list->Day->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Day" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day"<?php echo $ivf_vitrification_list->Day->editAttributes() ?>>
			<?php echo $ivf_vitrification_list->Day->selectOptionListHtml("x{$ivf_vitrification_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Day">
<span<?php echo $ivf_vitrification_list->Day->viewAttributes() ?>><?php echo $ivf_vitrification_list->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Grade->Visible) { // Grade ?>
		<td data-name="Grade" <?php echo $ivf_vitrification_list->Grade->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Grade" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade"<?php echo $ivf_vitrification_list->Grade->editAttributes() ?>>
			<?php echo $ivf_vitrification_list->Grade->selectOptionListHtml("x{$ivf_vitrification_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification_list->Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Grade" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade"<?php echo $ivf_vitrification_list->Grade->editAttributes() ?>>
			<?php echo $ivf_vitrification_list->Grade->selectOptionListHtml("x{$ivf_vitrification_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification_list->Grade->viewAttributes() ?>><?php echo $ivf_vitrification_list->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator" <?php echo $ivf_vitrification_list->Incubator->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Incubator" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Incubator->EditValue ?>"<?php echo $ivf_vitrification_list->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification_list->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Incubator" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Incubator->EditValue ?>"<?php echo $ivf_vitrification_list->Incubator->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification_list->Incubator->viewAttributes() ?>><?php echo $ivf_vitrification_list->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank" <?php echo $ivf_vitrification_list->Tank->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Tank" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Tank->EditValue ?>"<?php echo $ivf_vitrification_list->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification_list->Tank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Tank" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Tank->EditValue ?>"<?php echo $ivf_vitrification_list->Tank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification_list->Tank->viewAttributes() ?>><?php echo $ivf_vitrification_list->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Canister->Visible) { // Canister ?>
		<td data-name="Canister" <?php echo $ivf_vitrification_list->Canister->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Canister" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Canister->EditValue ?>"<?php echo $ivf_vitrification_list->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification_list->Canister->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Canister" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Canister->EditValue ?>"<?php echo $ivf_vitrification_list->Canister->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification_list->Canister->viewAttributes() ?>><?php echo $ivf_vitrification_list->Canister->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Gobiet->Visible) { // Gobiet ?>
		<td data-name="Gobiet" <?php echo $ivf_vitrification_list->Gobiet->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Gobiet" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Gobiet->EditValue ?>"<?php echo $ivf_vitrification_list->Gobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification_list->Gobiet->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Gobiet" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Gobiet->EditValue ?>"<?php echo $ivf_vitrification_list->Gobiet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification_list->Gobiet->viewAttributes() ?>><?php echo $ivf_vitrification_list->Gobiet->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->CryolockNo->Visible) { // CryolockNo ?>
		<td data-name="CryolockNo" <?php echo $ivf_vitrification_list->CryolockNo->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_CryolockNo" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification_list->CryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification_list->CryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_CryolockNo" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification_list->CryolockNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification_list->CryolockNo->viewAttributes() ?>><?php echo $ivf_vitrification_list->CryolockNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->CryolockColour->Visible) { // CryolockColour ?>
		<td data-name="CryolockColour" <?php echo $ivf_vitrification_list->CryolockColour->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_CryolockColour" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification_list->CryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification_list->CryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_CryolockColour" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification_list->CryolockColour->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification_list->CryolockColour->viewAttributes() ?>><?php echo $ivf_vitrification_list->CryolockColour->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Stage->Visible) { // Stage ?>
		<td data-name="Stage" <?php echo $ivf_vitrification_list->Stage->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Stage" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Stage->EditValue ?>"<?php echo $ivf_vitrification_list->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification_list->Stage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Stage" class="form-group">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Stage->EditValue ?>"<?php echo $ivf_vitrification_list->Stage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_list->RowCount ?>_ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification_list->Stage->viewAttributes() ?>><?php echo $ivf_vitrification_list->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_list->ListOptions->render("body", "right", $ivf_vitrification_list->RowCount);
?>
	</tr>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD || $ivf_vitrification->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "load"], function() {
	fivf_vitrificationlist.updateLists(<?php echo $ivf_vitrification_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_vitrification_list->isGridAdd())
		if (!$ivf_vitrification_list->Recordset->EOF)
			$ivf_vitrification_list->Recordset->moveNext();
}
?>
<?php
	if ($ivf_vitrification_list->isGridAdd() || $ivf_vitrification_list->isGridEdit()) {
		$ivf_vitrification_list->RowIndex = '$rowindex$';
		$ivf_vitrification_list->loadRowValues();

		// Set row properties
		$ivf_vitrification->resetAttributes();
		$ivf_vitrification->RowAttrs->merge(["data-rowindex" => $ivf_vitrification_list->RowIndex, "id" => "r0_ivf_vitrification", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_vitrification->RowAttrs->appendClass("ew-template");
		$ivf_vitrification->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_vitrification_list->renderRow();

		// Render list options
		$ivf_vitrification_list->renderListOptions();
		$ivf_vitrification_list->StartRowCount = 0;
?>
	<tr <?php echo $ivf_vitrification->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_list->ListOptions->render("body", "left", $ivf_vitrification_list->RowIndex);
?>
	<?php if ($ivf_vitrification_list->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<span id="el$rowindex$_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification_list->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_list->vitrificationDate->ReadOnly && !$ivf_vitrification_list->vitrificationDate->Disabled && !isset($ivf_vitrification_list->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_list->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification_list->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist">
<span id="el$rowindex$_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_list->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification_list->PrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist">
<span id="el$rowindex$_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification_list->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification_list->SecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<span id="el$rowindex$_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification_list->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification_list->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate">
<span id="el$rowindex$_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification_list->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification_list->FertilisationDate->ReadOnly && !$ivf_vitrification_list->FertilisationDate->Disabled && !isset($ivf_vitrification_list->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification_list->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_vitrificationlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_vitrificationlist", "x<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification_list->FertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Day->Visible) { // Day ?>
		<td data-name="Day">
<span id="el$rowindex$_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Day"<?php echo $ivf_vitrification_list->Day->editAttributes() ?>>
			<?php echo $ivf_vitrification_list->Day->selectOptionListHtml("x{$ivf_vitrification_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification_list->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<span id="el$rowindex$_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Grade"<?php echo $ivf_vitrification_list->Grade->editAttributes() ?>>
			<?php echo $ivf_vitrification_list->Grade->selectOptionListHtml("x{$ivf_vitrification_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification_list->Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<span id="el$rowindex$_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Incubator->EditValue ?>"<?php echo $ivf_vitrification_list->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification_list->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<span id="el$rowindex$_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Tank->EditValue ?>"<?php echo $ivf_vitrification_list->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification_list->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Canister->Visible) { // Canister ?>
		<td data-name="Canister">
<span id="el$rowindex$_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Canister->EditValue ?>"<?php echo $ivf_vitrification_list->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification_list->Canister->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Gobiet->Visible) { // Gobiet ?>
		<td data-name="Gobiet">
<span id="el$rowindex$_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Gobiet->EditValue ?>"<?php echo $ivf_vitrification_list->Gobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification_list->Gobiet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->CryolockNo->Visible) { // CryolockNo ?>
		<td data-name="CryolockNo">
<span id="el$rowindex$_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification_list->CryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification_list->CryolockNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->CryolockColour->Visible) { // CryolockColour ?>
		<td data-name="CryolockColour">
<span id="el$rowindex$_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification_list->CryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification_list->CryolockColour->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification_list->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el$rowindex$_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification_list->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification_list->Stage->EditValue ?>"<?php echo $ivf_vitrification_list->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification_list->Stage->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_list->ListOptions->render("body", "right", $ivf_vitrification_list->RowIndex);
?>
<script>
loadjs.ready(["fivf_vitrificationlist", "load"], function() {
	fivf_vitrificationlist.updateLists(<?php echo $ivf_vitrification_list->RowIndex ?>);
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
<?php if ($ivf_vitrification_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" id="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" value="<?php echo $ivf_vitrification_list->KeyCount ?>">
<?php echo $ivf_vitrification_list->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_vitrification_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" id="<?php echo $ivf_vitrification_list->FormKeyCountName ?>" value="<?php echo $ivf_vitrification_list->KeyCount ?>">
<?php echo $ivf_vitrification_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$ivf_vitrification->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_vitrification_list->Recordset)
	$ivf_vitrification_list->Recordset->Close();
?>
<?php if (!$ivf_vitrification_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_vitrification_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_vitrification_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_vitrification_list->TotalRecords == 0 && !$ivf_vitrification->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_vitrification_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitrification_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_vitrification",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_vitrification_list->terminate();
?>