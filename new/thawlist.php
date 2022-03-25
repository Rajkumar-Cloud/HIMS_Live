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
$thaw_list = new thaw_list();

// Run the page
$thaw_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$thaw_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$thaw_list->isExport()) { ?>
<script>
var fthawlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fthawlist = currentForm = new ew.Form("fthawlist", "list");
	fthawlist.formKeyCountName = '<?php echo $thaw_list->FormKeyCountName ?>';

	// Validate form
	fthawlist.validate = function() {
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
			<?php if ($thaw_list->thawDate->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawDate->caption(), $thaw_list->thawDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($thaw_list->thawDate->errorMessage()) ?>");
			<?php if ($thaw_list->thawPrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawPrimaryEmbryologist->caption(), $thaw_list->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->thawSecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawSecondaryEmbryologist->caption(), $thaw_list->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->thawET->Required) { ?>
				elm = this.getElements("x" + infix + "_thawET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawET->caption(), $thaw_list->thawET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->thawReFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_thawReFrozen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawReFrozen->caption(), $thaw_list->thawReFrozen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->thawAbserve->Required) { ?>
				elm = this.getElements("x" + infix + "_thawAbserve");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawAbserve->caption(), $thaw_list->thawAbserve->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->thawDiscard->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDiscard");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->thawDiscard->caption(), $thaw_list->thawDiscard->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->vitrificationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->vitrificationDate->caption(), $thaw_list->vitrificationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->EmbryoNo->caption(), $thaw_list->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->Day->caption(), $thaw_list->Day->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_list->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_list->Grade->caption(), $thaw_list->Grade->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fthawlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fthawlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fthawlist.lists["x_thawReFrozen"] = <?php echo $thaw_list->thawReFrozen->Lookup->toClientList($thaw_list) ?>;
	fthawlist.lists["x_thawReFrozen"].options = <?php echo JsonEncode($thaw_list->thawReFrozen->options(FALSE, TRUE)) ?>;
	fthawlist.lists["x_Day"] = <?php echo $thaw_list->Day->Lookup->toClientList($thaw_list) ?>;
	fthawlist.lists["x_Day"].options = <?php echo JsonEncode($thaw_list->Day->options(FALSE, TRUE)) ?>;
	fthawlist.lists["x_Grade"] = <?php echo $thaw_list->Grade->Lookup->toClientList($thaw_list) ?>;
	fthawlist.lists["x_Grade"].options = <?php echo JsonEncode($thaw_list->Grade->options(FALSE, TRUE)) ?>;
	loadjs.done("fthawlist");
});
var fthawlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fthawlistsrch = currentSearchForm = new ew.Form("fthawlistsrch");

	// Dynamic selection lists
	// Filters

	fthawlistsrch.filterList = <?php echo $thaw_list->getFilterList() ?>;
	loadjs.done("fthawlistsrch");
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
<?php if (!$thaw_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($thaw_list->TotalRecords > 0 && $thaw_list->ExportOptions->visible()) { ?>
<?php $thaw_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($thaw_list->ImportOptions->visible()) { ?>
<?php $thaw_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($thaw_list->SearchOptions->visible()) { ?>
<?php $thaw_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($thaw_list->FilterOptions->visible()) { ?>
<?php $thaw_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$thaw_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$thaw_list->isExport() && !$thaw->CurrentAction) { ?>
<form name="fthawlistsrch" id="fthawlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fthawlistsrch-search-panel" class="<?php echo $thaw_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="thaw">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $thaw_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($thaw_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($thaw_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $thaw_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $thaw_list->showPageHeader(); ?>
<?php
$thaw_list->showMessage();
?>
<?php if ($thaw_list->TotalRecords > 0 || $thaw->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($thaw_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> thaw">
<?php if (!$thaw_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$thaw_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $thaw_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $thaw_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fthawlist" id="fthawlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="thaw">
<div id="gmp_thaw" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($thaw_list->TotalRecords > 0 || $thaw_list->isGridEdit()) { ?>
<table id="tbl_thawlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$thaw->RowType = ROWTYPE_HEADER;

// Render list options
$thaw_list->renderListOptions();

// Render list options (header, left)
$thaw_list->ListOptions->render("header", "left");
?>
<?php if ($thaw_list->thawDate->Visible) { // thawDate ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawDate) == "") { ?>
		<th data-name="thawDate" class="<?php echo $thaw_list->thawDate->headerCellClass() ?>"><div id="elh_thaw_thawDate" class="thaw_thawDate"><div class="ew-table-header-caption"><?php echo $thaw_list->thawDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawDate" class="<?php echo $thaw_list->thawDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawDate) ?>', 1);"><div id="elh_thaw_thawDate" class="thaw_thawDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawPrimaryEmbryologist) == "") { ?>
		<th data-name="thawPrimaryEmbryologist" class="<?php echo $thaw_list->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $thaw_list->thawPrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawPrimaryEmbryologist" class="<?php echo $thaw_list->thawPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawPrimaryEmbryologist) ?>', 1);"><div id="elh_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawPrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawPrimaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawPrimaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawSecondaryEmbryologist) == "") { ?>
		<th data-name="thawSecondaryEmbryologist" class="<?php echo $thaw_list->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $thaw_list->thawSecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawSecondaryEmbryologist" class="<?php echo $thaw_list->thawSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawSecondaryEmbryologist) ?>', 1);"><div id="elh_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawSecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawSecondaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawSecondaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->thawET->Visible) { // thawET ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawET) == "") { ?>
		<th data-name="thawET" class="<?php echo $thaw_list->thawET->headerCellClass() ?>"><div id="elh_thaw_thawET" class="thaw_thawET"><div class="ew-table-header-caption"><?php echo $thaw_list->thawET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawET" class="<?php echo $thaw_list->thawET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawET) ?>', 1);"><div id="elh_thaw_thawET" class="thaw_thawET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawET->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawET->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawET->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->thawReFrozen->Visible) { // thawReFrozen ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawReFrozen) == "") { ?>
		<th data-name="thawReFrozen" class="<?php echo $thaw_list->thawReFrozen->headerCellClass() ?>"><div id="elh_thaw_thawReFrozen" class="thaw_thawReFrozen"><div class="ew-table-header-caption"><?php echo $thaw_list->thawReFrozen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawReFrozen" class="<?php echo $thaw_list->thawReFrozen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawReFrozen) ?>', 1);"><div id="elh_thaw_thawReFrozen" class="thaw_thawReFrozen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawReFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawReFrozen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawReFrozen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->thawAbserve->Visible) { // thawAbserve ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawAbserve) == "") { ?>
		<th data-name="thawAbserve" class="<?php echo $thaw_list->thawAbserve->headerCellClass() ?>"><div id="elh_thaw_thawAbserve" class="thaw_thawAbserve"><div class="ew-table-header-caption"><?php echo $thaw_list->thawAbserve->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawAbserve" class="<?php echo $thaw_list->thawAbserve->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawAbserve) ?>', 1);"><div id="elh_thaw_thawAbserve" class="thaw_thawAbserve">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawAbserve->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawAbserve->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawAbserve->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->thawDiscard->Visible) { // thawDiscard ?>
	<?php if ($thaw_list->SortUrl($thaw_list->thawDiscard) == "") { ?>
		<th data-name="thawDiscard" class="<?php echo $thaw_list->thawDiscard->headerCellClass() ?>"><div id="elh_thaw_thawDiscard" class="thaw_thawDiscard"><div class="ew-table-header-caption"><?php echo $thaw_list->thawDiscard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawDiscard" class="<?php echo $thaw_list->thawDiscard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->thawDiscard) ?>', 1);"><div id="elh_thaw_thawDiscard" class="thaw_thawDiscard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->thawDiscard->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->thawDiscard->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->thawDiscard->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($thaw_list->SortUrl($thaw_list->vitrificationDate) == "") { ?>
		<th data-name="vitrificationDate" class="<?php echo $thaw_list->vitrificationDate->headerCellClass() ?>"><div id="elh_thaw_vitrificationDate" class="thaw_vitrificationDate"><div class="ew-table-header-caption"><?php echo $thaw_list->vitrificationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitrificationDate" class="<?php echo $thaw_list->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->vitrificationDate) ?>', 1);"><div id="elh_thaw_vitrificationDate" class="thaw_vitrificationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->vitrificationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->vitrificationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($thaw_list->SortUrl($thaw_list->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $thaw_list->EmbryoNo->headerCellClass() ?>"><div id="elh_thaw_EmbryoNo" class="thaw_EmbryoNo"><div class="ew-table-header-caption"><?php echo $thaw_list->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $thaw_list->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->EmbryoNo) ?>', 1);"><div id="elh_thaw_EmbryoNo" class="thaw_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->EmbryoNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->EmbryoNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->Day->Visible) { // Day ?>
	<?php if ($thaw_list->SortUrl($thaw_list->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $thaw_list->Day->headerCellClass() ?>"><div id="elh_thaw_Day" class="thaw_Day"><div class="ew-table-header-caption"><?php echo $thaw_list->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $thaw_list->Day->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->Day) ?>', 1);"><div id="elh_thaw_Day" class="thaw_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->Day->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->Day->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw_list->Grade->Visible) { // Grade ?>
	<?php if ($thaw_list->SortUrl($thaw_list->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $thaw_list->Grade->headerCellClass() ?>"><div id="elh_thaw_Grade" class="thaw_Grade"><div class="ew-table-header-caption"><?php echo $thaw_list->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $thaw_list->Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $thaw_list->SortUrl($thaw_list->Grade) ?>', 1);"><div id="elh_thaw_Grade" class="thaw_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw_list->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw_list->Grade->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($thaw_list->Grade->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$thaw_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($thaw_list->ExportAll && $thaw_list->isExport()) {
	$thaw_list->StopRecord = $thaw_list->TotalRecords;
} else {

	// Set the last record to display
	if ($thaw_list->TotalRecords > $thaw_list->StartRecord + $thaw_list->DisplayRecords - 1)
		$thaw_list->StopRecord = $thaw_list->StartRecord + $thaw_list->DisplayRecords - 1;
	else
		$thaw_list->StopRecord = $thaw_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($thaw->isConfirm() || $thaw_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($thaw_list->FormKeyCountName) && ($thaw_list->isGridAdd() || $thaw_list->isGridEdit() || $thaw->isConfirm())) {
		$thaw_list->KeyCount = $CurrentForm->getValue($thaw_list->FormKeyCountName);
		$thaw_list->StopRecord = $thaw_list->StartRecord + $thaw_list->KeyCount - 1;
	}
}
$thaw_list->RecordCount = $thaw_list->StartRecord - 1;
if ($thaw_list->Recordset && !$thaw_list->Recordset->EOF) {
	$thaw_list->Recordset->moveFirst();
	$selectLimit = $thaw_list->UseSelectLimit;
	if (!$selectLimit && $thaw_list->StartRecord > 1)
		$thaw_list->Recordset->move($thaw_list->StartRecord - 1);
} elseif (!$thaw->AllowAddDeleteRow && $thaw_list->StopRecord == 0) {
	$thaw_list->StopRecord = $thaw->GridAddRowCount;
}

// Initialize aggregate
$thaw->RowType = ROWTYPE_AGGREGATEINIT;
$thaw->resetAttributes();
$thaw_list->renderRow();
$thaw_list->EditRowCount = 0;
if ($thaw_list->isEdit())
	$thaw_list->RowIndex = 1;
if ($thaw_list->isGridEdit())
	$thaw_list->RowIndex = 0;
while ($thaw_list->RecordCount < $thaw_list->StopRecord) {
	$thaw_list->RecordCount++;
	if ($thaw_list->RecordCount >= $thaw_list->StartRecord) {
		$thaw_list->RowCount++;
		if ($thaw_list->isGridAdd() || $thaw_list->isGridEdit() || $thaw->isConfirm()) {
			$thaw_list->RowIndex++;
			$CurrentForm->Index = $thaw_list->RowIndex;
			if ($CurrentForm->hasValue($thaw_list->FormActionName) && ($thaw->isConfirm() || $thaw_list->EventCancelled))
				$thaw_list->RowAction = strval($CurrentForm->getValue($thaw_list->FormActionName));
			elseif ($thaw_list->isGridAdd())
				$thaw_list->RowAction = "insert";
			else
				$thaw_list->RowAction = "";
		}

		// Set up key count
		$thaw_list->KeyCount = $thaw_list->RowIndex;

		// Init row class and style
		$thaw->resetAttributes();
		$thaw->CssClass = "";
		if ($thaw_list->isGridAdd()) {
			$thaw_list->loadRowValues(); // Load default values
		} else {
			$thaw_list->loadRowValues($thaw_list->Recordset); // Load row values
		}
		$thaw->RowType = ROWTYPE_VIEW; // Render view
		if ($thaw_list->isEdit()) {
			if ($thaw_list->checkInlineEditKey() && $thaw_list->EditRowCount == 0) { // Inline edit
				$thaw->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($thaw_list->isGridEdit()) { // Grid edit
			if ($thaw->EventCancelled)
				$thaw_list->restoreCurrentRowFormValues($thaw_list->RowIndex); // Restore form values
			if ($thaw_list->RowAction == "insert")
				$thaw->RowType = ROWTYPE_ADD; // Render add
			else
				$thaw->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($thaw_list->isEdit() && $thaw->RowType == ROWTYPE_EDIT && $thaw->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$thaw_list->restoreFormValues(); // Restore form values
		}
		if ($thaw_list->isGridEdit() && ($thaw->RowType == ROWTYPE_EDIT || $thaw->RowType == ROWTYPE_ADD) && $thaw->EventCancelled) // Update failed
			$thaw_list->restoreCurrentRowFormValues($thaw_list->RowIndex); // Restore form values
		if ($thaw->RowType == ROWTYPE_EDIT) // Edit row
			$thaw_list->EditRowCount++;

		// Set up row id / data-rowindex
		$thaw->RowAttrs->merge(["data-rowindex" => $thaw_list->RowCount, "id" => "r" . $thaw_list->RowCount . "_thaw", "data-rowtype" => $thaw->RowType]);

		// Render row
		$thaw_list->renderRow();

		// Render list options
		$thaw_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($thaw_list->RowAction != "delete" && $thaw_list->RowAction != "insertdelete" && !($thaw_list->RowAction == "insert" && $thaw->isConfirm() && $thaw_list->emptyRow())) {
?>
	<tr <?php echo $thaw->rowAttributes() ?>>
<?php

// Render list options (body, left)
$thaw_list->ListOptions->render("body", "left", $thaw_list->RowCount);
?>
	<?php if ($thaw_list->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate" <?php echo $thaw_list->thawDate->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawDate" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x<?php echo $thaw_list->RowIndex ?>_thawDate" id="x<?php echo $thaw_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($thaw_list->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawDate->EditValue ?>"<?php echo $thaw_list->thawDate->editAttributes() ?>>
<?php if (!$thaw_list->thawDate->ReadOnly && !$thaw_list->thawDate->Disabled && !isset($thaw_list->thawDate->EditAttrs["readonly"]) && !isset($thaw_list->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDate" name="o<?php echo $thaw_list->RowIndex ?>_thawDate" id="o<?php echo $thaw_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($thaw_list->thawDate->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawDate" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x<?php echo $thaw_list->RowIndex ?>_thawDate" id="x<?php echo $thaw_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($thaw_list->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawDate->EditValue ?>"<?php echo $thaw_list->thawDate->editAttributes() ?>>
<?php if (!$thaw_list->thawDate->ReadOnly && !$thaw_list->thawDate->Disabled && !isset($thaw_list->thawDate->EditAttrs["readonly"]) && !isset($thaw_list->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawDate">
<span<?php echo $thaw_list->thawDate->viewAttributes() ?>><?php echo $thaw_list->thawDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="thaw" data-field="x_id" name="x<?php echo $thaw_list->RowIndex ?>_id" id="x<?php echo $thaw_list->RowIndex ?>_id" value="<?php echo HtmlEncode($thaw_list->id->CurrentValue) ?>">
<input type="hidden" data-table="thaw" data-field="x_id" name="o<?php echo $thaw_list->RowIndex ?>_id" id="o<?php echo $thaw_list->RowIndex ?>_id" value="<?php echo HtmlEncode($thaw_list->id->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT || $thaw->CurrentMode == "edit") { ?>
<input type="hidden" data-table="thaw" data-field="x_id" name="x<?php echo $thaw_list->RowIndex ?>_id" id="x<?php echo $thaw_list->RowIndex ?>_id" value="<?php echo HtmlEncode($thaw_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($thaw_list->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist" <?php echo $thaw_list->thawPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawPrimaryEmbryologist" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw_list->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($thaw_list->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawPrimaryEmbryologist" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw_list->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawPrimaryEmbryologist">
<span<?php echo $thaw_list->thawPrimaryEmbryologist->viewAttributes() ?>><?php echo $thaw_list->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist" <?php echo $thaw_list->thawSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawSecondaryEmbryologist" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw_list->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($thaw_list->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawSecondaryEmbryologist" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw_list->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawSecondaryEmbryologist">
<span<?php echo $thaw_list->thawSecondaryEmbryologist->viewAttributes() ?>><?php echo $thaw_list->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->thawET->Visible) { // thawET ?>
		<td data-name="thawET" <?php echo $thaw_list->thawET->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawET" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawET" name="x<?php echo $thaw_list->RowIndex ?>_thawET" id="x<?php echo $thaw_list->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawET->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawET->EditValue ?>"<?php echo $thaw_list->thawET->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawET" name="o<?php echo $thaw_list->RowIndex ?>_thawET" id="o<?php echo $thaw_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($thaw_list->thawET->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawET" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawET" name="x<?php echo $thaw_list->RowIndex ?>_thawET" id="x<?php echo $thaw_list->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawET->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawET->EditValue ?>"<?php echo $thaw_list->thawET->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawET">
<span<?php echo $thaw_list->thawET->viewAttributes() ?>><?php echo $thaw_list->thawET->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen" <?php echo $thaw_list->thawReFrozen->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawReFrozen" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw_list->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen" name="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen"<?php echo $thaw_list->thawReFrozen->editAttributes() ?>>
			<?php echo $thaw_list->thawReFrozen->selectOptionListHtml("x{$thaw_list->RowIndex}_thawReFrozen") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawReFrozen" name="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" id="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" value="<?php echo HtmlEncode($thaw_list->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawReFrozen" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw_list->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen" name="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen"<?php echo $thaw_list->thawReFrozen->editAttributes() ?>>
			<?php echo $thaw_list->thawReFrozen->selectOptionListHtml("x{$thaw_list->RowIndex}_thawReFrozen") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawReFrozen">
<span<?php echo $thaw_list->thawReFrozen->viewAttributes() ?>><?php echo $thaw_list->thawReFrozen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve" <?php echo $thaw_list->thawAbserve->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawAbserve" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawAbserve" name="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawAbserve->EditValue ?>"<?php echo $thaw_list->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawAbserve" name="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($thaw_list->thawAbserve->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawAbserve" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawAbserve" name="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawAbserve->EditValue ?>"<?php echo $thaw_list->thawAbserve->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawAbserve">
<span<?php echo $thaw_list->thawAbserve->viewAttributes() ?>><?php echo $thaw_list->thawAbserve->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard" <?php echo $thaw_list->thawDiscard->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawDiscard" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawDiscard" name="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawDiscard->EditValue ?>"<?php echo $thaw_list->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDiscard" name="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($thaw_list->thawDiscard->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawDiscard" class="form-group">
<input type="text" data-table="thaw" data-field="x_thawDiscard" name="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawDiscard->EditValue ?>"<?php echo $thaw_list->thawDiscard->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_thawDiscard">
<span<?php echo $thaw_list->thawDiscard->viewAttributes() ?>><?php echo $thaw_list->thawDiscard->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate" <?php echo $thaw_list->vitrificationDate->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_vitrificationDate" class="form-group">
<input type="text" data-table="thaw" data-field="x_vitrificationDate" name="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($thaw_list->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $thaw_list->vitrificationDate->EditValue ?>"<?php echo $thaw_list->vitrificationDate->editAttributes() ?>>
<?php if (!$thaw_list->vitrificationDate->ReadOnly && !$thaw_list->vitrificationDate->Disabled && !isset($thaw_list->vitrificationDate->EditAttrs["readonly"]) && !isset($thaw_list->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($thaw_list->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_vitrificationDate" class="form-group">
<span<?php echo $thaw_list->vitrificationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_list->vitrificationDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($thaw_list->vitrificationDate->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_vitrificationDate">
<span<?php echo $thaw_list->vitrificationDate->viewAttributes() ?>><?php echo $thaw_list->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo" <?php echo $thaw_list->EmbryoNo->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_EmbryoNo" class="form-group">
<input type="text" data-table="thaw" data-field="x_EmbryoNo" name="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $thaw_list->EmbryoNo->EditValue ?>"<?php echo $thaw_list->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($thaw_list->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_EmbryoNo" class="form-group">
<span<?php echo $thaw_list->EmbryoNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_list->EmbryoNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($thaw_list->EmbryoNo->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_EmbryoNo">
<span<?php echo $thaw_list->EmbryoNo->viewAttributes() ?>><?php echo $thaw_list->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->Day->Visible) { // Day ?>
		<td data-name="Day" <?php echo $thaw_list->Day->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_Day" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Day" data-value-separator="<?php echo $thaw_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Day" name="x<?php echo $thaw_list->RowIndex ?>_Day"<?php echo $thaw_list->Day->editAttributes() ?>>
			<?php echo $thaw_list->Day->selectOptionListHtml("x{$thaw_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="o<?php echo $thaw_list->RowIndex ?>_Day" id="o<?php echo $thaw_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($thaw_list->Day->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_Day" class="form-group">
<span<?php echo $thaw_list->Day->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_list->Day->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="x<?php echo $thaw_list->RowIndex ?>_Day" id="x<?php echo $thaw_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($thaw_list->Day->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_Day">
<span<?php echo $thaw_list->Day->viewAttributes() ?>><?php echo $thaw_list->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw_list->Grade->Visible) { // Grade ?>
		<td data-name="Grade" <?php echo $thaw_list->Grade->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_Grade" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Grade" data-value-separator="<?php echo $thaw_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Grade" name="x<?php echo $thaw_list->RowIndex ?>_Grade"<?php echo $thaw_list->Grade->editAttributes() ?>>
			<?php echo $thaw_list->Grade->selectOptionListHtml("x{$thaw_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="o<?php echo $thaw_list->RowIndex ?>_Grade" id="o<?php echo $thaw_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($thaw_list->Grade->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_Grade" class="form-group">
<span<?php echo $thaw_list->Grade->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_list->Grade->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="x<?php echo $thaw_list->RowIndex ?>_Grade" id="x<?php echo $thaw_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($thaw_list->Grade->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCount ?>_thaw_Grade">
<span<?php echo $thaw_list->Grade->viewAttributes() ?>><?php echo $thaw_list->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$thaw_list->ListOptions->render("body", "right", $thaw_list->RowCount);
?>
	</tr>
<?php if ($thaw->RowType == ROWTYPE_ADD || $thaw->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fthawlist", "load"], function() {
	fthawlist.updateLists(<?php echo $thaw_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$thaw_list->isGridAdd())
		if (!$thaw_list->Recordset->EOF)
			$thaw_list->Recordset->moveNext();
}
?>
<?php
	if ($thaw_list->isGridAdd() || $thaw_list->isGridEdit()) {
		$thaw_list->RowIndex = '$rowindex$';
		$thaw_list->loadRowValues();

		// Set row properties
		$thaw->resetAttributes();
		$thaw->RowAttrs->merge(["data-rowindex" => $thaw_list->RowIndex, "id" => "r0_thaw", "data-rowtype" => ROWTYPE_ADD]);
		$thaw->RowAttrs->appendClass("ew-template");
		$thaw->RowType = ROWTYPE_ADD;

		// Render row
		$thaw_list->renderRow();

		// Render list options
		$thaw_list->renderListOptions();
		$thaw_list->StartRowCount = 0;
?>
	<tr <?php echo $thaw->rowAttributes() ?>>
<?php

// Render list options (body, left)
$thaw_list->ListOptions->render("body", "left", $thaw_list->RowIndex);
?>
	<?php if ($thaw_list->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate">
<span id="el$rowindex$_thaw_thawDate" class="form-group thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x<?php echo $thaw_list->RowIndex ?>_thawDate" id="x<?php echo $thaw_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($thaw_list->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawDate->EditValue ?>"<?php echo $thaw_list->thawDate->editAttributes() ?>>
<?php if (!$thaw_list->thawDate->ReadOnly && !$thaw_list->thawDate->Disabled && !isset($thaw_list->thawDate->EditAttrs["readonly"]) && !isset($thaw_list->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDate" name="o<?php echo $thaw_list->RowIndex ?>_thawDate" id="o<?php echo $thaw_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($thaw_list->thawDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist">
<span id="el$rowindex$_thaw_thawPrimaryEmbryologist" class="form-group thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw_list->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($thaw_list->thawPrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist">
<span id="el$rowindex$_thaw_thawSecondaryEmbryologist" class="form-group thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw_list->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($thaw_list->thawSecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->thawET->Visible) { // thawET ?>
		<td data-name="thawET">
<span id="el$rowindex$_thaw_thawET" class="form-group thaw_thawET">
<input type="text" data-table="thaw" data-field="x_thawET" name="x<?php echo $thaw_list->RowIndex ?>_thawET" id="x<?php echo $thaw_list->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawET->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawET->EditValue ?>"<?php echo $thaw_list->thawET->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawET" name="o<?php echo $thaw_list->RowIndex ?>_thawET" id="o<?php echo $thaw_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($thaw_list->thawET->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen">
<span id="el$rowindex$_thaw_thawReFrozen" class="form-group thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw_list->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen" name="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen"<?php echo $thaw_list->thawReFrozen->editAttributes() ?>>
			<?php echo $thaw_list->thawReFrozen->selectOptionListHtml("x{$thaw_list->RowIndex}_thawReFrozen") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawReFrozen" name="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" id="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" value="<?php echo HtmlEncode($thaw_list->thawReFrozen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve">
<span id="el$rowindex$_thaw_thawAbserve" class="form-group thaw_thawAbserve">
<input type="text" data-table="thaw" data-field="x_thawAbserve" name="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawAbserve->EditValue ?>"<?php echo $thaw_list->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawAbserve" name="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($thaw_list->thawAbserve->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard">
<span id="el$rowindex$_thaw_thawDiscard" class="form-group thaw_thawDiscard">
<input type="text" data-table="thaw" data-field="x_thawDiscard" name="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $thaw_list->thawDiscard->EditValue ?>"<?php echo $thaw_list->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDiscard" name="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($thaw_list->thawDiscard->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<span id="el$rowindex$_thaw_vitrificationDate" class="form-group thaw_vitrificationDate">
<input type="text" data-table="thaw" data-field="x_vitrificationDate" name="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($thaw_list->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $thaw_list->vitrificationDate->EditValue ?>"<?php echo $thaw_list->vitrificationDate->editAttributes() ?>>
<?php if (!$thaw_list->vitrificationDate->ReadOnly && !$thaw_list->vitrificationDate->Disabled && !isset($thaw_list->vitrificationDate->EditAttrs["readonly"]) && !isset($thaw_list->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($thaw_list->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<span id="el$rowindex$_thaw_EmbryoNo" class="form-group thaw_EmbryoNo">
<input type="text" data-table="thaw" data-field="x_EmbryoNo" name="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_list->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $thaw_list->EmbryoNo->EditValue ?>"<?php echo $thaw_list->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($thaw_list->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->Day->Visible) { // Day ?>
		<td data-name="Day">
<span id="el$rowindex$_thaw_Day" class="form-group thaw_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Day" data-value-separator="<?php echo $thaw_list->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Day" name="x<?php echo $thaw_list->RowIndex ?>_Day"<?php echo $thaw_list->Day->editAttributes() ?>>
			<?php echo $thaw_list->Day->selectOptionListHtml("x{$thaw_list->RowIndex}_Day") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="o<?php echo $thaw_list->RowIndex ?>_Day" id="o<?php echo $thaw_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($thaw_list->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw_list->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<span id="el$rowindex$_thaw_Grade" class="form-group thaw_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Grade" data-value-separator="<?php echo $thaw_list->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Grade" name="x<?php echo $thaw_list->RowIndex ?>_Grade"<?php echo $thaw_list->Grade->editAttributes() ?>>
			<?php echo $thaw_list->Grade->selectOptionListHtml("x{$thaw_list->RowIndex}_Grade") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="o<?php echo $thaw_list->RowIndex ?>_Grade" id="o<?php echo $thaw_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($thaw_list->Grade->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$thaw_list->ListOptions->render("body", "right", $thaw_list->RowIndex);
?>
<script>
loadjs.ready(["fthawlist", "load"], function() {
	fthawlist.updateLists(<?php echo $thaw_list->RowIndex ?>);
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
<?php if ($thaw_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $thaw_list->FormKeyCountName ?>" id="<?php echo $thaw_list->FormKeyCountName ?>" value="<?php echo $thaw_list->KeyCount ?>">
<?php } ?>
<?php if ($thaw_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $thaw_list->FormKeyCountName ?>" id="<?php echo $thaw_list->FormKeyCountName ?>" value="<?php echo $thaw_list->KeyCount ?>">
<?php echo $thaw_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$thaw->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($thaw_list->Recordset)
	$thaw_list->Recordset->Close();
?>
<?php if (!$thaw_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$thaw_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $thaw_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $thaw_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($thaw_list->TotalRecords == 0 && !$thaw->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $thaw_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$thaw_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$thaw_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$thaw->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_thaw",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$thaw_list->terminate();
?>