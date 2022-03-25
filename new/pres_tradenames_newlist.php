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
$pres_tradenames_new_list = new pres_tradenames_new_list();

// Run the page
$pres_tradenames_new_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_tradenames_new_list->isExport()) { ?>
<script>
var fpres_tradenames_newlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_tradenames_newlist = currentForm = new ew.Form("fpres_tradenames_newlist", "list");
	fpres_tradenames_newlist.formKeyCountName = '<?php echo $pres_tradenames_new_list->FormKeyCountName ?>';
	loadjs.done("fpres_tradenames_newlist");
});
var fpres_tradenames_newlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_tradenames_newlistsrch = currentSearchForm = new ew.Form("fpres_tradenames_newlistsrch");

	// Validate function for search
	fpres_tradenames_newlistsrch.validate = function(fobj) {
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
	fpres_tradenames_newlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_tradenames_newlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpres_tradenames_newlistsrch.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_list->Generic_Name->Lookup->toClientList($pres_tradenames_new_list) ?>;
	fpres_tradenames_newlistsrch.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_list->Generic_Name->lookupOptions()) ?>;
	fpres_tradenames_newlistsrch.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_list->TypeOfDrug->Lookup->toClientList($pres_tradenames_new_list) ?>;
	fpres_tradenames_newlistsrch.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_list->TypeOfDrug->options(FALSE, TRUE)) ?>;

	// Filters
	fpres_tradenames_newlistsrch.filterList = <?php echo $pres_tradenames_new_list->getFilterList() ?>;
	loadjs.done("fpres_tradenames_newlistsrch");
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
<?php if (!$pres_tradenames_new_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_tradenames_new_list->TotalRecords > 0 && $pres_tradenames_new_list->ExportOptions->visible()) { ?>
<?php $pres_tradenames_new_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->ImportOptions->visible()) { ?>
<?php $pres_tradenames_new_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->SearchOptions->visible()) { ?>
<?php $pres_tradenames_new_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->FilterOptions->visible()) { ?>
<?php $pres_tradenames_new_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_tradenames_new_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_tradenames_new_list->isExport() && !$pres_tradenames_new->CurrentAction) { ?>
<form name="fpres_tradenames_newlistsrch" id="fpres_tradenames_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_tradenames_newlistsrch-search-panel" class="<?php echo $pres_tradenames_new_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_tradenames_new">
	<div class="ew-extended-search">
<?php

// Render search row
$pres_tradenames_new->RowType = ROWTYPE_SEARCH;
$pres_tradenames_new->resetAttributes();
$pres_tradenames_new_list->renderRow();
?>
<?php if ($pres_tradenames_new_list->Drug_Name->Visible) { // Drug_Name ?>
	<?php
		$pres_tradenames_new_list->SearchColumnCount++;
		if (($pres_tradenames_new_list->SearchColumnCount - 1) % $pres_tradenames_new_list->SearchFieldsPerRow == 0) {
			$pres_tradenames_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pres_tradenames_new_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Drug_Name" class="ew-cell form-group">
		<label for="x_Drug_Name" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new_list->Drug_Name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Drug_Name" id="z_Drug_Name" value="LIKE">
</span>
		<span id="el_pres_tradenames_new_Drug_Name" class="ew-search-field">
<input type="text" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new_list->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new_list->Drug_Name->EditValue ?>"<?php echo $pres_tradenames_new_list->Drug_Name->editAttributes() ?>>
</span>
	</div>
	<?php if ($pres_tradenames_new_list->SearchColumnCount % $pres_tradenames_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name->Visible) { // Generic_Name ?>
	<?php
		$pres_tradenames_new_list->SearchColumnCount++;
		if (($pres_tradenames_new_list->SearchColumnCount - 1) % $pres_tradenames_new_list->SearchFieldsPerRow == 0) {
			$pres_tradenames_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pres_tradenames_new_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Generic_Name" class="ew-cell form-group">
		<label for="x_Generic_Name" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new_list->Generic_Name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Generic_Name" id="z_Generic_Name" value="LIKE">
</span>
		<span id="el_pres_tradenames_new_Generic_Name" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?php echo EmptyValue(strval($pres_tradenames_new_list->Generic_Name->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $pres_tradenames_new_list->Generic_Name->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new_list->Generic_Name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pres_tradenames_new_list->Generic_Name->ReadOnly || $pres_tradenames_new_list->Generic_Name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new_list->Generic_Name->Lookup->getParamTag($pres_tradenames_new_list, "p_x_Generic_Name") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new_list->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?php echo $pres_tradenames_new_list->Generic_Name->AdvancedSearch->SearchValue ?>"<?php echo $pres_tradenames_new_list->Generic_Name->editAttributes() ?>>
</span>
	</div>
	<?php if ($pres_tradenames_new_list->SearchColumnCount % $pres_tradenames_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Trade_Name->Visible) { // Trade_Name ?>
	<?php
		$pres_tradenames_new_list->SearchColumnCount++;
		if (($pres_tradenames_new_list->SearchColumnCount - 1) % $pres_tradenames_new_list->SearchFieldsPerRow == 0) {
			$pres_tradenames_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pres_tradenames_new_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Trade_Name" class="ew-cell form-group">
		<label for="x_Trade_Name" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new_list->Trade_Name->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Trade_Name" id="z_Trade_Name" value="LIKE">
</span>
		<span id="el_pres_tradenames_new_Trade_Name" class="ew-search-field">
<input type="text" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new_list->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new_list->Trade_Name->EditValue ?>"<?php echo $pres_tradenames_new_list->Trade_Name->editAttributes() ?>>
</span>
	</div>
	<?php if ($pres_tradenames_new_list->SearchColumnCount % $pres_tradenames_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php
		$pres_tradenames_new_list->SearchColumnCount++;
		if (($pres_tradenames_new_list->SearchColumnCount - 1) % $pres_tradenames_new_list->SearchFieldsPerRow == 0) {
			$pres_tradenames_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $pres_tradenames_new_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_TypeOfDrug" class="ew-cell form-group">
		<label for="x_TypeOfDrug" class="ew-search-caption ew-label"><?php echo $pres_tradenames_new_list->TypeOfDrug->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TypeOfDrug" id="z_TypeOfDrug" value="LIKE">
</span>
		<span id="el_pres_tradenames_new_TypeOfDrug" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_tradenames_new_list->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x_TypeOfDrug" name="x_TypeOfDrug"<?php echo $pres_tradenames_new_list->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_tradenames_new_list->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
		</select>
</div>
</span>
	</div>
	<?php if ($pres_tradenames_new_list->SearchColumnCount % $pres_tradenames_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($pres_tradenames_new_list->SearchColumnCount % $pres_tradenames_new_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $pres_tradenames_new_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_tradenames_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_tradenames_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_tradenames_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_new_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_tradenames_new_list->showPageHeader(); ?>
<?php
$pres_tradenames_new_list->showMessage();
?>
<?php if ($pres_tradenames_new_list->TotalRecords > 0 || $pres_tradenames_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_tradenames_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_tradenames_new">
<?php if (!$pres_tradenames_new_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_tradenames_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_tradenames_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_tradenames_newlist" id="fpres_tradenames_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<div id="gmp_pres_tradenames_new" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_tradenames_new_list->TotalRecords > 0 || $pres_tradenames_new_list->isGridEdit()) { ?>
<table id="tbl_pres_tradenames_newlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_tradenames_new->RowType = ROWTYPE_HEADER;

// Render list options
$pres_tradenames_new_list->renderListOptions();

// Render list options (header, left)
$pres_tradenames_new_list->ListOptions->render("header", "left");
?>
<?php if ($pres_tradenames_new_list->ID->Visible) { // ID ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $pres_tradenames_new_list->ID->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $pres_tradenames_new_list->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->ID) ?>', 1);"><div id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Drug_Name->Visible) { // Drug_Name ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Drug_Name) == "") { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_tradenames_new_list->Drug_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Drug_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_tradenames_new_list->Drug_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Drug_Name) ?>', 1);"><div id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Drug_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Drug_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Drug_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name->Visible) { // Generic_Name ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name) == "") { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_tradenames_new_list->Generic_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_tradenames_new_list->Generic_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name) ?>', 1);"><div id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Generic_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Generic_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Trade_Name->Visible) { // Trade_Name ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Trade_Name) == "") { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_tradenames_new_list->Trade_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Trade_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_tradenames_new_list->Trade_Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Trade_Name) ?>', 1);"><div id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Trade_Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Trade_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Trade_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames_new_list->PR_CODE->headerCellClass() ?>"><div id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames_new_list->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->PR_CODE) ?>', 1);"><div id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->PR_CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->PR_CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Form->Visible) { // Form ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $pres_tradenames_new_list->Form->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $pres_tradenames_new_list->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Form) ?>', 1);"><div id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Form->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Form->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Form->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Strength->Visible) { // Strength ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength) == "") { ?>
		<th data-name="Strength" class="<?php echo $pres_tradenames_new_list->Strength->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength" class="<?php echo $pres_tradenames_new_list->Strength->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength) ?>', 1);"><div id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Strength->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Strength->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Unit->Visible) { // Unit ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $pres_tradenames_new_list->Unit->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $pres_tradenames_new_list->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit) ?>', 1);"><div id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->TypeOfDrug) == "") { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_tradenames_new_list->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->TypeOfDrug->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_tradenames_new_list->TypeOfDrug->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->TypeOfDrug) ?>', 1);"><div id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->TypeOfDrug->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->TypeOfDrug->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->TypeOfDrug->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->ProductType->Visible) { // ProductType ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->ProductType) == "") { ?>
		<th data-name="ProductType" class="<?php echo $pres_tradenames_new_list->ProductType->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->ProductType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductType" class="<?php echo $pres_tradenames_new_list->ProductType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->ProductType) ?>', 1);"><div id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->ProductType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->ProductType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->ProductType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name1->Visible) { // Generic_Name1 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name1) == "") { ?>
		<th data-name="Generic_Name1" class="<?php echo $pres_tradenames_new_list->Generic_Name1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name1" class="<?php echo $pres_tradenames_new_list->Generic_Name1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name1) ?>', 1);"><div id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Generic_Name1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Generic_Name1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Strength1->Visible) { // Strength1 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength1) == "") { ?>
		<th data-name="Strength1" class="<?php echo $pres_tradenames_new_list->Strength1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength1" class="<?php echo $pres_tradenames_new_list->Strength1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength1) ?>', 1);"><div id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Strength1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Strength1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Unit1->Visible) { // Unit1 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit1) == "") { ?>
		<th data-name="Unit1" class="<?php echo $pres_tradenames_new_list->Unit1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit1" class="<?php echo $pres_tradenames_new_list->Unit1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit1) ?>', 1);"><div id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Unit1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Unit1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name2->Visible) { // Generic_Name2 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name2) == "") { ?>
		<th data-name="Generic_Name2" class="<?php echo $pres_tradenames_new_list->Generic_Name2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name2" class="<?php echo $pres_tradenames_new_list->Generic_Name2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name2) ?>', 1);"><div id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Generic_Name2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Generic_Name2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Strength2->Visible) { // Strength2 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength2) == "") { ?>
		<th data-name="Strength2" class="<?php echo $pres_tradenames_new_list->Strength2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength2" class="<?php echo $pres_tradenames_new_list->Strength2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength2) ?>', 1);"><div id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Strength2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Strength2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Unit2->Visible) { // Unit2 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit2) == "") { ?>
		<th data-name="Unit2" class="<?php echo $pres_tradenames_new_list->Unit2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit2" class="<?php echo $pres_tradenames_new_list->Unit2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit2) ?>', 1);"><div id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Unit2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Unit2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name3->Visible) { // Generic_Name3 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name3) == "") { ?>
		<th data-name="Generic_Name3" class="<?php echo $pres_tradenames_new_list->Generic_Name3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name3" class="<?php echo $pres_tradenames_new_list->Generic_Name3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name3) ?>', 1);"><div id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Generic_Name3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Generic_Name3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Strength3->Visible) { // Strength3 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength3) == "") { ?>
		<th data-name="Strength3" class="<?php echo $pres_tradenames_new_list->Strength3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength3" class="<?php echo $pres_tradenames_new_list->Strength3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength3) ?>', 1);"><div id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Strength3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Strength3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Unit3->Visible) { // Unit3 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit3) == "") { ?>
		<th data-name="Unit3" class="<?php echo $pres_tradenames_new_list->Unit3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit3" class="<?php echo $pres_tradenames_new_list->Unit3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit3) ?>', 1);"><div id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Unit3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Unit3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name4->Visible) { // Generic_Name4 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name4) == "") { ?>
		<th data-name="Generic_Name4" class="<?php echo $pres_tradenames_new_list->Generic_Name4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name4" class="<?php echo $pres_tradenames_new_list->Generic_Name4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name4) ?>', 1);"><div id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Generic_Name4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Generic_Name4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Generic_Name5->Visible) { // Generic_Name5 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name5) == "") { ?>
		<th data-name="Generic_Name5" class="<?php echo $pres_tradenames_new_list->Generic_Name5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name5" class="<?php echo $pres_tradenames_new_list->Generic_Name5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Generic_Name5) ?>', 1);"><div id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Generic_Name5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Generic_Name5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Generic_Name5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Strength4->Visible) { // Strength4 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength4) == "") { ?>
		<th data-name="Strength4" class="<?php echo $pres_tradenames_new_list->Strength4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength4" class="<?php echo $pres_tradenames_new_list->Strength4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength4) ?>', 1);"><div id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Strength4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Strength4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Strength5->Visible) { // Strength5 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength5) == "") { ?>
		<th data-name="Strength5" class="<?php echo $pres_tradenames_new_list->Strength5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength5" class="<?php echo $pres_tradenames_new_list->Strength5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Strength5) ?>', 1);"><div id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Strength5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Strength5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Strength5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Unit4->Visible) { // Unit4 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit4) == "") { ?>
		<th data-name="Unit4" class="<?php echo $pres_tradenames_new_list->Unit4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit4" class="<?php echo $pres_tradenames_new_list->Unit4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit4) ?>', 1);"><div id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Unit4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Unit4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->Unit5->Visible) { // Unit5 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit5) == "") { ?>
		<th data-name="Unit5" class="<?php echo $pres_tradenames_new_list->Unit5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit5" class="<?php echo $pres_tradenames_new_list->Unit5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->Unit5) ?>', 1);"><div id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->Unit5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->Unit5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->Unit5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->AlterNative1->Visible) { // AlterNative1 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative1) == "") { ?>
		<th data-name="AlterNative1" class="<?php echo $pres_tradenames_new_list->AlterNative1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative1" class="<?php echo $pres_tradenames_new_list->AlterNative1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative1) ?>', 1);"><div id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->AlterNative1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->AlterNative1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->AlterNative2->Visible) { // AlterNative2 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative2) == "") { ?>
		<th data-name="AlterNative2" class="<?php echo $pres_tradenames_new_list->AlterNative2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative2" class="<?php echo $pres_tradenames_new_list->AlterNative2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative2) ?>', 1);"><div id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->AlterNative2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->AlterNative2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->AlterNative3->Visible) { // AlterNative3 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative3) == "") { ?>
		<th data-name="AlterNative3" class="<?php echo $pres_tradenames_new_list->AlterNative3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative3" class="<?php echo $pres_tradenames_new_list->AlterNative3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative3) ?>', 1);"><div id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->AlterNative3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->AlterNative3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames_new_list->AlterNative4->Visible) { // AlterNative4 ?>
	<?php if ($pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative4) == "") { ?>
		<th data-name="AlterNative4" class="<?php echo $pres_tradenames_new_list->AlterNative4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><div class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlterNative4" class="<?php echo $pres_tradenames_new_list->AlterNative4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_tradenames_new_list->SortUrl($pres_tradenames_new_list->AlterNative4) ?>', 1);"><div id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames_new_list->AlterNative4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames_new_list->AlterNative4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_tradenames_new_list->AlterNative4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_tradenames_new_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_tradenames_new_list->ExportAll && $pres_tradenames_new_list->isExport()) {
	$pres_tradenames_new_list->StopRecord = $pres_tradenames_new_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_tradenames_new_list->TotalRecords > $pres_tradenames_new_list->StartRecord + $pres_tradenames_new_list->DisplayRecords - 1)
		$pres_tradenames_new_list->StopRecord = $pres_tradenames_new_list->StartRecord + $pres_tradenames_new_list->DisplayRecords - 1;
	else
		$pres_tradenames_new_list->StopRecord = $pres_tradenames_new_list->TotalRecords;
}
$pres_tradenames_new_list->RecordCount = $pres_tradenames_new_list->StartRecord - 1;
if ($pres_tradenames_new_list->Recordset && !$pres_tradenames_new_list->Recordset->EOF) {
	$pres_tradenames_new_list->Recordset->moveFirst();
	$selectLimit = $pres_tradenames_new_list->UseSelectLimit;
	if (!$selectLimit && $pres_tradenames_new_list->StartRecord > 1)
		$pres_tradenames_new_list->Recordset->move($pres_tradenames_new_list->StartRecord - 1);
} elseif (!$pres_tradenames_new->AllowAddDeleteRow && $pres_tradenames_new_list->StopRecord == 0) {
	$pres_tradenames_new_list->StopRecord = $pres_tradenames_new->GridAddRowCount;
}

// Initialize aggregate
$pres_tradenames_new->RowType = ROWTYPE_AGGREGATEINIT;
$pres_tradenames_new->resetAttributes();
$pres_tradenames_new_list->renderRow();
while ($pres_tradenames_new_list->RecordCount < $pres_tradenames_new_list->StopRecord) {
	$pres_tradenames_new_list->RecordCount++;
	if ($pres_tradenames_new_list->RecordCount >= $pres_tradenames_new_list->StartRecord) {
		$pres_tradenames_new_list->RowCount++;

		// Set up key count
		$pres_tradenames_new_list->KeyCount = $pres_tradenames_new_list->RowIndex;

		// Init row class and style
		$pres_tradenames_new->resetAttributes();
		$pres_tradenames_new->CssClass = "";
		if ($pres_tradenames_new_list->isGridAdd()) {
		} else {
			$pres_tradenames_new_list->loadRowValues($pres_tradenames_new_list->Recordset); // Load row values
		}
		$pres_tradenames_new->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_tradenames_new->RowAttrs->merge(["data-rowindex" => $pres_tradenames_new_list->RowCount, "id" => "r" . $pres_tradenames_new_list->RowCount . "_pres_tradenames_new", "data-rowtype" => $pres_tradenames_new->RowType]);

		// Render row
		$pres_tradenames_new_list->renderRow();

		// Render list options
		$pres_tradenames_new_list->renderListOptions();
?>
	<tr <?php echo $pres_tradenames_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_tradenames_new_list->ListOptions->render("body", "left", $pres_tradenames_new_list->RowCount);
?>
	<?php if ($pres_tradenames_new_list->ID->Visible) { // ID ?>
		<td data-name="ID" <?php echo $pres_tradenames_new_list->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_ID">
<span<?php echo $pres_tradenames_new_list->ID->viewAttributes() ?>><?php echo $pres_tradenames_new_list->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name" <?php echo $pres_tradenames_new_list->Drug_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Drug_Name">
<span<?php echo $pres_tradenames_new_list->Drug_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Drug_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name" <?php echo $pres_tradenames_new_list->Generic_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Generic_Name">
<span<?php echo $pres_tradenames_new_list->Generic_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Generic_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name" <?php echo $pres_tradenames_new_list->Trade_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Trade_Name">
<span<?php echo $pres_tradenames_new_list->Trade_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Trade_Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE" <?php echo $pres_tradenames_new_list->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_PR_CODE">
<span<?php echo $pres_tradenames_new_list->PR_CODE->viewAttributes() ?>><?php echo $pres_tradenames_new_list->PR_CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Form->Visible) { // Form ?>
		<td data-name="Form" <?php echo $pres_tradenames_new_list->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Form">
<span<?php echo $pres_tradenames_new_list->Form->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Strength->Visible) { // Strength ?>
		<td data-name="Strength" <?php echo $pres_tradenames_new_list->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Strength">
<span<?php echo $pres_tradenames_new_list->Strength->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Strength->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $pres_tradenames_new_list->Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Unit">
<span<?php echo $pres_tradenames_new_list->Unit->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug" <?php echo $pres_tradenames_new_list->TypeOfDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_TypeOfDrug">
<span<?php echo $pres_tradenames_new_list->TypeOfDrug->viewAttributes() ?>><?php echo $pres_tradenames_new_list->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->ProductType->Visible) { // ProductType ?>
		<td data-name="ProductType" <?php echo $pres_tradenames_new_list->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_ProductType">
<span<?php echo $pres_tradenames_new_list->ProductType->viewAttributes() ?>><?php echo $pres_tradenames_new_list->ProductType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Generic_Name1->Visible) { // Generic_Name1 ?>
		<td data-name="Generic_Name1" <?php echo $pres_tradenames_new_list->Generic_Name1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Generic_Name1">
<span<?php echo $pres_tradenames_new_list->Generic_Name1->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Generic_Name1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Strength1->Visible) { // Strength1 ?>
		<td data-name="Strength1" <?php echo $pres_tradenames_new_list->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Strength1">
<span<?php echo $pres_tradenames_new_list->Strength1->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Strength1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Unit1->Visible) { // Unit1 ?>
		<td data-name="Unit1" <?php echo $pres_tradenames_new_list->Unit1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Unit1">
<span<?php echo $pres_tradenames_new_list->Unit1->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Unit1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Generic_Name2->Visible) { // Generic_Name2 ?>
		<td data-name="Generic_Name2" <?php echo $pres_tradenames_new_list->Generic_Name2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Generic_Name2">
<span<?php echo $pres_tradenames_new_list->Generic_Name2->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Generic_Name2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Strength2->Visible) { // Strength2 ?>
		<td data-name="Strength2" <?php echo $pres_tradenames_new_list->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Strength2">
<span<?php echo $pres_tradenames_new_list->Strength2->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Strength2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Unit2->Visible) { // Unit2 ?>
		<td data-name="Unit2" <?php echo $pres_tradenames_new_list->Unit2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Unit2">
<span<?php echo $pres_tradenames_new_list->Unit2->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Unit2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Generic_Name3->Visible) { // Generic_Name3 ?>
		<td data-name="Generic_Name3" <?php echo $pres_tradenames_new_list->Generic_Name3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Generic_Name3">
<span<?php echo $pres_tradenames_new_list->Generic_Name3->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Generic_Name3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Strength3->Visible) { // Strength3 ?>
		<td data-name="Strength3" <?php echo $pres_tradenames_new_list->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Strength3">
<span<?php echo $pres_tradenames_new_list->Strength3->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Strength3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Unit3->Visible) { // Unit3 ?>
		<td data-name="Unit3" <?php echo $pres_tradenames_new_list->Unit3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Unit3">
<span<?php echo $pres_tradenames_new_list->Unit3->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Unit3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Generic_Name4->Visible) { // Generic_Name4 ?>
		<td data-name="Generic_Name4" <?php echo $pres_tradenames_new_list->Generic_Name4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Generic_Name4">
<span<?php echo $pres_tradenames_new_list->Generic_Name4->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Generic_Name4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Generic_Name5->Visible) { // Generic_Name5 ?>
		<td data-name="Generic_Name5" <?php echo $pres_tradenames_new_list->Generic_Name5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Generic_Name5">
<span<?php echo $pres_tradenames_new_list->Generic_Name5->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Generic_Name5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Strength4->Visible) { // Strength4 ?>
		<td data-name="Strength4" <?php echo $pres_tradenames_new_list->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Strength4">
<span<?php echo $pres_tradenames_new_list->Strength4->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Strength4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Strength5->Visible) { // Strength5 ?>
		<td data-name="Strength5" <?php echo $pres_tradenames_new_list->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Strength5">
<span<?php echo $pres_tradenames_new_list->Strength5->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Strength5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Unit4->Visible) { // Unit4 ?>
		<td data-name="Unit4" <?php echo $pres_tradenames_new_list->Unit4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Unit4">
<span<?php echo $pres_tradenames_new_list->Unit4->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Unit4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->Unit5->Visible) { // Unit5 ?>
		<td data-name="Unit5" <?php echo $pres_tradenames_new_list->Unit5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_Unit5">
<span<?php echo $pres_tradenames_new_list->Unit5->viewAttributes() ?>><?php echo $pres_tradenames_new_list->Unit5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->AlterNative1->Visible) { // AlterNative1 ?>
		<td data-name="AlterNative1" <?php echo $pres_tradenames_new_list->AlterNative1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_AlterNative1">
<span<?php echo $pres_tradenames_new_list->AlterNative1->viewAttributes() ?>><?php echo $pres_tradenames_new_list->AlterNative1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->AlterNative2->Visible) { // AlterNative2 ?>
		<td data-name="AlterNative2" <?php echo $pres_tradenames_new_list->AlterNative2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_AlterNative2">
<span<?php echo $pres_tradenames_new_list->AlterNative2->viewAttributes() ?>><?php echo $pres_tradenames_new_list->AlterNative2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->AlterNative3->Visible) { // AlterNative3 ?>
		<td data-name="AlterNative3" <?php echo $pres_tradenames_new_list->AlterNative3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_AlterNative3">
<span<?php echo $pres_tradenames_new_list->AlterNative3->viewAttributes() ?>><?php echo $pres_tradenames_new_list->AlterNative3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames_new_list->AlterNative4->Visible) { // AlterNative4 ?>
		<td data-name="AlterNative4" <?php echo $pres_tradenames_new_list->AlterNative4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_list->RowCount ?>_pres_tradenames_new_AlterNative4">
<span<?php echo $pres_tradenames_new_list->AlterNative4->viewAttributes() ?>><?php echo $pres_tradenames_new_list->AlterNative4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_tradenames_new_list->ListOptions->render("body", "right", $pres_tradenames_new_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_tradenames_new_list->isGridAdd())
		$pres_tradenames_new_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_tradenames_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_tradenames_new_list->Recordset)
	$pres_tradenames_new_list->Recordset->Close();
?>
<?php if (!$pres_tradenames_new_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_tradenames_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_tradenames_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_new_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_tradenames_new_list->TotalRecords == 0 && !$pres_tradenames_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_tradenames_new_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames_new_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_tradenames_new",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_tradenames_new_list->terminate();
?>