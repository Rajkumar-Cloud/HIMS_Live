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
$pharmacy_storemast_list = new pharmacy_storemast_list();

// Run the page
$pharmacy_storemast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_storemast_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_storemast_list->isExport()) { ?>
<script>
var fpharmacy_storemastlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_storemastlist = currentForm = new ew.Form("fpharmacy_storemastlist", "list");
	fpharmacy_storemastlist.formKeyCountName = '<?php echo $pharmacy_storemast_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_storemastlist");
});
var fpharmacy_storemastlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_storemastlistsrch = currentSearchForm = new ew.Form("fpharmacy_storemastlistsrch");

	// Validate function for search
	fpharmacy_storemastlistsrch.validate = function(fobj) {
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
	fpharmacy_storemastlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_storemastlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_storemastlistsrch.lists["x_GENNAME"] = <?php echo $pharmacy_storemast_list->GENNAME->Lookup->toClientList($pharmacy_storemast_list) ?>;
	fpharmacy_storemastlistsrch.lists["x_GENNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENNAME->lookupOptions()) ?>;
	fpharmacy_storemastlistsrch.autoSuggests["x_GENNAME"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpharmacy_storemastlistsrch.lists["x_COMBNAME"] = <?php echo $pharmacy_storemast_list->COMBNAME->Lookup->toClientList($pharmacy_storemast_list) ?>;
	fpharmacy_storemastlistsrch.lists["x_COMBNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->COMBNAME->lookupOptions()) ?>;
	fpharmacy_storemastlistsrch.lists["x_GENERICNAME"] = <?php echo $pharmacy_storemast_list->GENERICNAME->Lookup->toClientList($pharmacy_storemast_list) ?>;
	fpharmacy_storemastlistsrch.lists["x_GENERICNAME"].options = <?php echo JsonEncode($pharmacy_storemast_list->GENERICNAME->lookupOptions()) ?>;

	// Filters
	fpharmacy_storemastlistsrch.filterList = <?php echo $pharmacy_storemast_list->getFilterList() ?>;
	loadjs.done("fpharmacy_storemastlistsrch");
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
<?php if (!$pharmacy_storemast_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_storemast_list->TotalRecords > 0 && $pharmacy_storemast_list->ExportOptions->visible()) { ?>
<?php $pharmacy_storemast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->ImportOptions->visible()) { ?>
<?php $pharmacy_storemast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->SearchOptions->visible()) { ?>
<?php $pharmacy_storemast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->FilterOptions->visible()) { ?>
<?php $pharmacy_storemast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_storemast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_storemast_list->isExport() && !$pharmacy_storemast->CurrentAction) { ?>
<form name="fpharmacy_storemastlistsrch" id="fpharmacy_storemastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_storemastlistsrch-search-panel" class="<?php echo $pharmacy_storemast_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_storemast">
	<div class="ew-extended-search">
<?php

// Render search row
$pharmacy_storemast->RowType = ROWTYPE_SEARCH;
$pharmacy_storemast->resetAttributes();
$pharmacy_storemast_list->renderRow();
?>
<?php if ($pharmacy_storemast_list->DES->Visible) { // DES ?>
	<?php
		$pharmacy_storemast_list->SearchColumnCount++;
		if (($pharmacy_storemast_list->SearchColumnCount - 1) % $pharmacy_storemast_list->SearchFieldsPerRow == 0) {
			$pharmacy_storemast_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_storemast_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $pharmacy_storemast_list->DES->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
		<span id="el_pharmacy_storemast_DES" class="ew-search-field">
<input type="text" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_storemast_list->DES->getPlaceHolder()) ?>" value="<?php echo $pharmacy_storemast_list->DES->EditValue ?>"<?php echo $pharmacy_storemast_list->DES->editAttributes() ?>>
</span>
	</div>
	<?php if ($pharmacy_storemast_list->SearchColumnCount % $pharmacy_storemast_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->GENNAME->Visible) { // GENNAME ?>
	<?php
		$pharmacy_storemast_list->SearchColumnCount++;
		if (($pharmacy_storemast_list->SearchColumnCount - 1) % $pharmacy_storemast_list->SearchFieldsPerRow == 0) {
			$pharmacy_storemast_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_storemast_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_GENNAME" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $pharmacy_storemast_list->GENNAME->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
		<span id="el_pharmacy_storemast_GENNAME" class="ew-search-field">
<?php
$onchange = $pharmacy_storemast_list->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_storemast_list->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?php echo RemoveHtml($pharmacy_storemast_list->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?php echo HtmlEncode($pharmacy_storemast_list->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_storemast_list->GENNAME->getPlaceHolder()) ?>"<?php echo $pharmacy_storemast_list->GENNAME->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_list->GENNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_list->GENNAME->ReadOnly || $pharmacy_storemast_list->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_list->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?php echo HtmlEncode($pharmacy_storemast_list->GENNAME->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_storemastlistsrch"], function() {
	fpharmacy_storemastlistsrch.createAutoSuggest({"id":"x_GENNAME","forceSelect":false});
});
</script>
<?php echo $pharmacy_storemast_list->GENNAME->Lookup->getParamTag($pharmacy_storemast_list, "p_x_GENNAME") ?>
</span>
	</div>
	<?php if ($pharmacy_storemast_list->SearchColumnCount % $pharmacy_storemast_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->COMBNAME->Visible) { // COMBNAME ?>
	<?php
		$pharmacy_storemast_list->SearchColumnCount++;
		if (($pharmacy_storemast_list->SearchColumnCount - 1) % $pharmacy_storemast_list->SearchFieldsPerRow == 0) {
			$pharmacy_storemast_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_storemast_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_COMBNAME" class="ew-cell form-group">
		<label for="x_COMBNAME" class="ew-search-caption ew-label"><?php echo $pharmacy_storemast_list->COMBNAME->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COMBNAME" id="z_COMBNAME" value="LIKE">
</span>
		<span id="el_pharmacy_storemast_COMBNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?php echo EmptyValue(strval($pharmacy_storemast_list->COMBNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_list->COMBNAME->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_list->COMBNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_list->COMBNAME->ReadOnly || $pharmacy_storemast_list->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_list->COMBNAME->Lookup->getParamTag($pharmacy_storemast_list, "p_x_COMBNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_list->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?php echo $pharmacy_storemast_list->COMBNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_list->COMBNAME->editAttributes() ?>>
</span>
	</div>
	<?php if ($pharmacy_storemast_list->SearchColumnCount % $pharmacy_storemast_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->GENERICNAME->Visible) { // GENERICNAME ?>
	<?php
		$pharmacy_storemast_list->SearchColumnCount++;
		if (($pharmacy_storemast_list->SearchColumnCount - 1) % $pharmacy_storemast_list->SearchFieldsPerRow == 0) {
			$pharmacy_storemast_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pharmacy_storemast_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_GENERICNAME" class="ew-cell form-group">
		<label for="x_GENERICNAME" class="ew-search-caption ew-label"><?php echo $pharmacy_storemast_list->GENERICNAME->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENERICNAME" id="z_GENERICNAME" value="LIKE">
</span>
		<span id="el_pharmacy_storemast_GENERICNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?php echo EmptyValue(strval($pharmacy_storemast_list->GENERICNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_storemast_list->GENERICNAME->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_storemast_list->GENERICNAME->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_storemast_list->GENERICNAME->ReadOnly || $pharmacy_storemast_list->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_storemast_list->GENERICNAME->Lookup->getParamTag($pharmacy_storemast_list, "p_x_GENERICNAME") ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_storemast_list->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?php echo $pharmacy_storemast_list->GENERICNAME->AdvancedSearch->SearchValue ?>"<?php echo $pharmacy_storemast_list->GENERICNAME->editAttributes() ?>>
</span>
	</div>
	<?php if ($pharmacy_storemast_list->SearchColumnCount % $pharmacy_storemast_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($pharmacy_storemast_list->SearchColumnCount % $pharmacy_storemast_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $pharmacy_storemast_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_storemast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_storemast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_storemast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_storemast_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_storemast_list->showPageHeader(); ?>
<?php
$pharmacy_storemast_list->showMessage();
?>
<?php if ($pharmacy_storemast_list->TotalRecords > 0 || $pharmacy_storemast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_storemast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_storemast">
<?php if (!$pharmacy_storemast_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_storemast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_storemast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_storemastlist" id="fpharmacy_storemastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<div id="gmp_pharmacy_storemast" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_storemast_list->TotalRecords > 0 || $pharmacy_storemast_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_storemastlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_storemast->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_storemast_list->renderListOptions();

// Render list options (header, left)
$pharmacy_storemast_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_storemast_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_storemast_list->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_storemast_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->BRCODE) ?>', 1);"><div id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_storemast_list->PRC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_storemast_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PRC) ?>', 1);"><div id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->TYPE->Visible) { // TYPE ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->TYPE) == "") { ?>
		<th data-name="TYPE" class="<?php echo $pharmacy_storemast_list->TYPE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TYPE" class="<?php echo $pharmacy_storemast_list->TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->TYPE) ?>', 1);"><div id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->DES->Visible) { // DES ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $pharmacy_storemast_list->DES->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $pharmacy_storemast_list->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->DES) ?>', 1);"><div id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->DES->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->DES->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->UM->Visible) { // UM ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->UM) == "") { ?>
		<th data-name="UM" class="<?php echo $pharmacy_storemast_list->UM->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->UM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UM" class="<?php echo $pharmacy_storemast_list->UM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->UM) ?>', 1);"><div id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->UM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->UM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->UM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->RT->Visible) { // RT ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $pharmacy_storemast_list->RT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $pharmacy_storemast_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->RT) ?>', 1);"><div id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_storemast_list->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $pharmacy_storemast_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->BATCHNO) ?>', 1);"><div id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_storemast_list->MRP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_storemast_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->MRP) ?>', 1);"><div id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_storemast_list->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $pharmacy_storemast_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->EXPDT) ?>', 1);"><div id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_storemast_list->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_storemast_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->GENNAME) ?>', 1);"><div id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->CREATEDDT->Visible) { // CREATEDDT ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->CREATEDDT) == "") { ?>
		<th data-name="CREATEDDT" class="<?php echo $pharmacy_storemast_list->CREATEDDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->CREATEDDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CREATEDDT" class="<?php echo $pharmacy_storemast_list->CREATEDDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->CREATEDDT) ?>', 1);"><div id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->CREATEDDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->CREATEDDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->CREATEDDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->DRID->Visible) { // DRID ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->DRID) == "") { ?>
		<th data-name="DRID" class="<?php echo $pharmacy_storemast_list->DRID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->DRID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRID" class="<?php echo $pharmacy_storemast_list->DRID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->DRID) ?>', 1);"><div id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->DRID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->DRID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->DRID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_storemast_list->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $pharmacy_storemast_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->MFRCODE) ?>', 1);"><div id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->COMBCODE->Visible) { // COMBCODE ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->COMBCODE) == "") { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_storemast_list->COMBCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->COMBCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_storemast_list->COMBCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->COMBCODE) ?>', 1);"><div id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->COMBCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->COMBCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->COMBCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->GENCODE->Visible) { // GENCODE ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->GENCODE) == "") { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_storemast_list->GENCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->GENCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_storemast_list->GENCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->GENCODE) ?>', 1);"><div id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->GENCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->GENCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->GENCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_storemast_list->STRENGTH->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_storemast_list->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->STRENGTH) ?>', 1);"><div id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->UNIT->Visible) { // UNIT ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $pharmacy_storemast_list->UNIT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $pharmacy_storemast_list->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->UNIT) ?>', 1);"><div id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->UNIT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->UNIT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->UNIT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->FORMULARY->Visible) { // FORMULARY ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->FORMULARY) == "") { ?>
		<th data-name="FORMULARY" class="<?php echo $pharmacy_storemast_list->FORMULARY->headerCellClass() ?>"><div id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->FORMULARY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORMULARY" class="<?php echo $pharmacy_storemast_list->FORMULARY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->FORMULARY) ?>', 1);"><div id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->FORMULARY->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->FORMULARY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->FORMULARY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->COMBNAME->Visible) { // COMBNAME ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->COMBNAME) == "") { ?>
		<th data-name="COMBNAME" class="<?php echo $pharmacy_storemast_list->COMBNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->COMBNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBNAME" class="<?php echo $pharmacy_storemast_list->COMBNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->COMBNAME) ?>', 1);"><div id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->COMBNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->COMBNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->COMBNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->GENERICNAME->Visible) { // GENERICNAME ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->GENERICNAME) == "") { ?>
		<th data-name="GENERICNAME" class="<?php echo $pharmacy_storemast_list->GENERICNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->GENERICNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENERICNAME" class="<?php echo $pharmacy_storemast_list->GENERICNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->GENERICNAME) ?>', 1);"><div id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->GENERICNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->GENERICNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->GENERICNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->REMARK->Visible) { // REMARK ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->REMARK) == "") { ?>
		<th data-name="REMARK" class="<?php echo $pharmacy_storemast_list->REMARK->headerCellClass() ?>"><div id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->REMARK->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="REMARK" class="<?php echo $pharmacy_storemast_list->REMARK->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->REMARK) ?>', 1);"><div id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->REMARK->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->REMARK->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->REMARK->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->TEMP->Visible) { // TEMP ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->TEMP) == "") { ?>
		<th data-name="TEMP" class="<?php echo $pharmacy_storemast_list->TEMP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->TEMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TEMP" class="<?php echo $pharmacy_storemast_list->TEMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->TEMP) ?>', 1);"><div id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->TEMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->TEMP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->TEMP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->id->Visible) { // id ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_storemast_list->id->headerCellClass() ?>"><div id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_storemast_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->id) ?>', 1);"><div id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->PurValue->Visible) { // PurValue ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_storemast_list->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $pharmacy_storemast_list->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PurValue) ?>', 1);"><div id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->PurValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->PurValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->PSGST->Visible) { // PSGST ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_storemast_list->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $pharmacy_storemast_list->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PSGST) ?>', 1);"><div id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->PSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->PSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->PCGST->Visible) { // PCGST ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_storemast_list->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $pharmacy_storemast_list->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->PCGST) ?>', 1);"><div id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->PCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->PCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->SaleValue->Visible) { // SaleValue ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SaleValue) == "") { ?>
		<th data-name="SaleValue" class="<?php echo $pharmacy_storemast_list->SaleValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleValue" class="<?php echo $pharmacy_storemast_list->SaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SaleValue) ?>', 1);"><div id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->SaleValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->SaleValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->SSGST->Visible) { // SSGST ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_storemast_list->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $pharmacy_storemast_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SSGST) ?>', 1);"><div id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->SCGST->Visible) { // SCGST ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_storemast_list->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $pharmacy_storemast_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SCGST) ?>', 1);"><div id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->SaleRate->Visible) { // SaleRate ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SaleRate) == "") { ?>
		<th data-name="SaleRate" class="<?php echo $pharmacy_storemast_list->SaleRate->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SaleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleRate" class="<?php echo $pharmacy_storemast_list->SaleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->SaleRate) ?>', 1);"><div id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->SaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->SaleRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->SaleRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_storemast_list->HospID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_storemast_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->HospID) ?>', 1);"><div id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_storemast_list->BRNAME->Visible) { // BRNAME ?>
	<?php if ($pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->BRNAME) == "") { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_storemast_list->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->BRNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRNAME" class="<?php echo $pharmacy_storemast_list->BRNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_storemast_list->SortUrl($pharmacy_storemast_list->BRNAME) ?>', 1);"><div id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_storemast_list->BRNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_storemast_list->BRNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_storemast_list->BRNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_storemast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_storemast_list->ExportAll && $pharmacy_storemast_list->isExport()) {
	$pharmacy_storemast_list->StopRecord = $pharmacy_storemast_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_storemast_list->TotalRecords > $pharmacy_storemast_list->StartRecord + $pharmacy_storemast_list->DisplayRecords - 1)
		$pharmacy_storemast_list->StopRecord = $pharmacy_storemast_list->StartRecord + $pharmacy_storemast_list->DisplayRecords - 1;
	else
		$pharmacy_storemast_list->StopRecord = $pharmacy_storemast_list->TotalRecords;
}
$pharmacy_storemast_list->RecordCount = $pharmacy_storemast_list->StartRecord - 1;
if ($pharmacy_storemast_list->Recordset && !$pharmacy_storemast_list->Recordset->EOF) {
	$pharmacy_storemast_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_storemast_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_storemast_list->StartRecord > 1)
		$pharmacy_storemast_list->Recordset->move($pharmacy_storemast_list->StartRecord - 1);
} elseif (!$pharmacy_storemast->AllowAddDeleteRow && $pharmacy_storemast_list->StopRecord == 0) {
	$pharmacy_storemast_list->StopRecord = $pharmacy_storemast->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_storemast->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_storemast->resetAttributes();
$pharmacy_storemast_list->renderRow();
while ($pharmacy_storemast_list->RecordCount < $pharmacy_storemast_list->StopRecord) {
	$pharmacy_storemast_list->RecordCount++;
	if ($pharmacy_storemast_list->RecordCount >= $pharmacy_storemast_list->StartRecord) {
		$pharmacy_storemast_list->RowCount++;

		// Set up key count
		$pharmacy_storemast_list->KeyCount = $pharmacy_storemast_list->RowIndex;

		// Init row class and style
		$pharmacy_storemast->resetAttributes();
		$pharmacy_storemast->CssClass = "";
		if ($pharmacy_storemast_list->isGridAdd()) {
		} else {
			$pharmacy_storemast_list->loadRowValues($pharmacy_storemast_list->Recordset); // Load row values
		}
		$pharmacy_storemast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_storemast->RowAttrs->merge(["data-rowindex" => $pharmacy_storemast_list->RowCount, "id" => "r" . $pharmacy_storemast_list->RowCount . "_pharmacy_storemast", "data-rowtype" => $pharmacy_storemast->RowType]);

		// Render row
		$pharmacy_storemast_list->renderRow();

		// Render list options
		$pharmacy_storemast_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_storemast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_storemast_list->ListOptions->render("body", "left", $pharmacy_storemast_list->RowCount);
?>
	<?php if ($pharmacy_storemast_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_storemast_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_BRCODE">
<span<?php echo $pharmacy_storemast_list->BRCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_storemast_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_PRC">
<span<?php echo $pharmacy_storemast_list->PRC->viewAttributes() ?>><?php echo $pharmacy_storemast_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->TYPE->Visible) { // TYPE ?>
		<td data-name="TYPE" <?php echo $pharmacy_storemast_list->TYPE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_TYPE">
<span<?php echo $pharmacy_storemast_list->TYPE->viewAttributes() ?>><?php echo $pharmacy_storemast_list->TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->DES->Visible) { // DES ?>
		<td data-name="DES" <?php echo $pharmacy_storemast_list->DES->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_DES">
<span<?php echo $pharmacy_storemast_list->DES->viewAttributes() ?>><?php echo $pharmacy_storemast_list->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->UM->Visible) { // UM ?>
		<td data-name="UM" <?php echo $pharmacy_storemast_list->UM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_UM">
<span<?php echo $pharmacy_storemast_list->UM->viewAttributes() ?>><?php echo $pharmacy_storemast_list->UM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $pharmacy_storemast_list->RT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_RT">
<span<?php echo $pharmacy_storemast_list->RT->viewAttributes() ?>><?php echo $pharmacy_storemast_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $pharmacy_storemast_list->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_BATCHNO">
<span<?php echo $pharmacy_storemast_list->BATCHNO->viewAttributes() ?>><?php echo $pharmacy_storemast_list->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $pharmacy_storemast_list->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_MRP">
<span<?php echo $pharmacy_storemast_list->MRP->viewAttributes() ?>><?php echo $pharmacy_storemast_list->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $pharmacy_storemast_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_EXPDT">
<span<?php echo $pharmacy_storemast_list->EXPDT->viewAttributes() ?>><?php echo $pharmacy_storemast_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $pharmacy_storemast_list->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_GENNAME">
<span<?php echo $pharmacy_storemast_list->GENNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_list->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->CREATEDDT->Visible) { // CREATEDDT ?>
		<td data-name="CREATEDDT" <?php echo $pharmacy_storemast_list->CREATEDDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_CREATEDDT">
<span<?php echo $pharmacy_storemast_list->CREATEDDT->viewAttributes() ?>><?php echo $pharmacy_storemast_list->CREATEDDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->DRID->Visible) { // DRID ?>
		<td data-name="DRID" <?php echo $pharmacy_storemast_list->DRID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_DRID">
<span<?php echo $pharmacy_storemast_list->DRID->viewAttributes() ?>><?php echo $pharmacy_storemast_list->DRID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $pharmacy_storemast_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_MFRCODE">
<span<?php echo $pharmacy_storemast_list->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE" <?php echo $pharmacy_storemast_list->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_COMBCODE">
<span<?php echo $pharmacy_storemast_list->COMBCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_list->COMBCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE" <?php echo $pharmacy_storemast_list->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_GENCODE">
<span<?php echo $pharmacy_storemast_list->GENCODE->viewAttributes() ?>><?php echo $pharmacy_storemast_list->GENCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH" <?php echo $pharmacy_storemast_list->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_STRENGTH">
<span<?php echo $pharmacy_storemast_list->STRENGTH->viewAttributes() ?>><?php echo $pharmacy_storemast_list->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT" <?php echo $pharmacy_storemast_list->UNIT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_UNIT">
<span<?php echo $pharmacy_storemast_list->UNIT->viewAttributes() ?>><?php echo $pharmacy_storemast_list->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->FORMULARY->Visible) { // FORMULARY ?>
		<td data-name="FORMULARY" <?php echo $pharmacy_storemast_list->FORMULARY->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_FORMULARY">
<span<?php echo $pharmacy_storemast_list->FORMULARY->viewAttributes() ?>><?php echo $pharmacy_storemast_list->FORMULARY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->COMBNAME->Visible) { // COMBNAME ?>
		<td data-name="COMBNAME" <?php echo $pharmacy_storemast_list->COMBNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_COMBNAME">
<span<?php echo $pharmacy_storemast_list->COMBNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_list->COMBNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->GENERICNAME->Visible) { // GENERICNAME ?>
		<td data-name="GENERICNAME" <?php echo $pharmacy_storemast_list->GENERICNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_GENERICNAME">
<span<?php echo $pharmacy_storemast_list->GENERICNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_list->GENERICNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->REMARK->Visible) { // REMARK ?>
		<td data-name="REMARK" <?php echo $pharmacy_storemast_list->REMARK->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_REMARK">
<span<?php echo $pharmacy_storemast_list->REMARK->viewAttributes() ?>><?php echo $pharmacy_storemast_list->REMARK->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->TEMP->Visible) { // TEMP ?>
		<td data-name="TEMP" <?php echo $pharmacy_storemast_list->TEMP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_TEMP">
<span<?php echo $pharmacy_storemast_list->TEMP->viewAttributes() ?>><?php echo $pharmacy_storemast_list->TEMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_storemast_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_id">
<span<?php echo $pharmacy_storemast_list->id->viewAttributes() ?>><?php echo $pharmacy_storemast_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" <?php echo $pharmacy_storemast_list->PurValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_PurValue">
<span<?php echo $pharmacy_storemast_list->PurValue->viewAttributes() ?>><?php echo $pharmacy_storemast_list->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" <?php echo $pharmacy_storemast_list->PSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_PSGST">
<span<?php echo $pharmacy_storemast_list->PSGST->viewAttributes() ?>><?php echo $pharmacy_storemast_list->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" <?php echo $pharmacy_storemast_list->PCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_PCGST">
<span<?php echo $pharmacy_storemast_list->PCGST->viewAttributes() ?>><?php echo $pharmacy_storemast_list->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->SaleValue->Visible) { // SaleValue ?>
		<td data-name="SaleValue" <?php echo $pharmacy_storemast_list->SaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_SaleValue">
<span<?php echo $pharmacy_storemast_list->SaleValue->viewAttributes() ?>><?php echo $pharmacy_storemast_list->SaleValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $pharmacy_storemast_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_SSGST">
<span<?php echo $pharmacy_storemast_list->SSGST->viewAttributes() ?>><?php echo $pharmacy_storemast_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $pharmacy_storemast_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_SCGST">
<span<?php echo $pharmacy_storemast_list->SCGST->viewAttributes() ?>><?php echo $pharmacy_storemast_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->SaleRate->Visible) { // SaleRate ?>
		<td data-name="SaleRate" <?php echo $pharmacy_storemast_list->SaleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_SaleRate">
<span<?php echo $pharmacy_storemast_list->SaleRate->viewAttributes() ?>><?php echo $pharmacy_storemast_list->SaleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_storemast_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_HospID">
<span<?php echo $pharmacy_storemast_list->HospID->viewAttributes() ?>><?php echo $pharmacy_storemast_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_storemast_list->BRNAME->Visible) { // BRNAME ?>
		<td data-name="BRNAME" <?php echo $pharmacy_storemast_list->BRNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_storemast_list->RowCount ?>_pharmacy_storemast_BRNAME">
<span<?php echo $pharmacy_storemast_list->BRNAME->viewAttributes() ?>><?php echo $pharmacy_storemast_list->BRNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_storemast_list->ListOptions->render("body", "right", $pharmacy_storemast_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_storemast_list->isGridAdd())
		$pharmacy_storemast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_storemast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_storemast_list->Recordset)
	$pharmacy_storemast_list->Recordset->Close();
?>
<?php if (!$pharmacy_storemast_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_storemast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_storemast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_storemast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_storemast_list->TotalRecords == 0 && !$pharmacy_storemast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_storemast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_storemast_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_storemast_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_storemast->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_storemast",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_storemast_list->terminate();
?>