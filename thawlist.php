<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$thaw->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fthawlist = currentForm = new ew.Form("fthawlist", "list");
fthawlist.formKeyCountName = '<?php echo $thaw_list->FormKeyCountName ?>';

// Validate form
fthawlist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
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
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawDate->caption(), $thaw->thawDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_thawDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($thaw->thawDate->errorMessage()) ?>");
		<?php if ($thaw_list->thawPrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawPrimaryEmbryologist->caption(), $thaw->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->thawSecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawSecondaryEmbryologist->caption(), $thaw->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->thawET->Required) { ?>
			elm = this.getElements("x" + infix + "_thawET");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawET->caption(), $thaw->thawET->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->thawReFrozen->Required) { ?>
			elm = this.getElements("x" + infix + "_thawReFrozen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawReFrozen->caption(), $thaw->thawReFrozen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->thawAbserve->Required) { ?>
			elm = this.getElements("x" + infix + "_thawAbserve");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawAbserve->caption(), $thaw->thawAbserve->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->thawDiscard->Required) { ?>
			elm = this.getElements("x" + infix + "_thawDiscard");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->thawDiscard->caption(), $thaw->thawDiscard->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->vitrificationDate->caption(), $thaw->vitrificationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->EmbryoNo->caption(), $thaw->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->Day->Required) { ?>
			elm = this.getElements("x" + infix + "_Day");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Day->caption(), $thaw->Day->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($thaw_list->Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw->Grade->caption(), $thaw->Grade->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fthawlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fthawlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fthawlist.lists["x_thawReFrozen"] = <?php echo $thaw_list->thawReFrozen->Lookup->toClientList() ?>;
fthawlist.lists["x_thawReFrozen"].options = <?php echo JsonEncode($thaw_list->thawReFrozen->options(FALSE, TRUE)) ?>;
fthawlist.lists["x_Day"] = <?php echo $thaw_list->Day->Lookup->toClientList() ?>;
fthawlist.lists["x_Day"].options = <?php echo JsonEncode($thaw_list->Day->options(FALSE, TRUE)) ?>;
fthawlist.lists["x_Grade"] = <?php echo $thaw_list->Grade->Lookup->toClientList() ?>;
fthawlist.lists["x_Grade"].options = <?php echo JsonEncode($thaw_list->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
var fthawlistsrch = currentSearchForm = new ew.Form("fthawlistsrch");

// Filters
fthawlistsrch.filterList = <?php echo $thaw_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$thaw->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($thaw_list->TotalRecs > 0 && $thaw_list->ExportOptions->visible()) { ?>
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
<?php if (!$thaw->isExport() && !$thaw->CurrentAction) { ?>
<form name="fthawlistsrch" id="fthawlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($thaw_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fthawlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="thaw">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($thaw_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($thaw_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $thaw_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($thaw_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $thaw_list->showPageHeader(); ?>
<?php
$thaw_list->showMessage();
?>
<?php if ($thaw_list->TotalRecs > 0 || $thaw->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($thaw_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> thaw">
<?php if (!$thaw->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$thaw->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($thaw_list->Pager)) $thaw_list->Pager = new NumericPager($thaw_list->StartRec, $thaw_list->DisplayRecs, $thaw_list->TotalRecs, $thaw_list->RecRange, $thaw_list->AutoHidePager) ?>
<?php if ($thaw_list->Pager->RecordCount > 0 && $thaw_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($thaw_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($thaw_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($thaw_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $thaw_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($thaw_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($thaw_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($thaw_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $thaw_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $thaw_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $thaw_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($thaw_list->TotalRecs > 0 && (!$thaw_list->AutoHidePageSizeSelector || $thaw_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="thaw">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($thaw_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($thaw_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($thaw_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($thaw_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($thaw_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($thaw_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($thaw->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $thaw_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fthawlist" id="fthawlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($thaw_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $thaw_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="thaw">
<div id="gmp_thaw" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($thaw_list->TotalRecs > 0 || $thaw->isGridEdit()) { ?>
<table id="tbl_thawlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$thaw_list->RowType = ROWTYPE_HEADER;

// Render list options
$thaw_list->renderListOptions();

// Render list options (header, left)
$thaw_list->ListOptions->render("header", "left");
?>
<?php if ($thaw->thawDate->Visible) { // thawDate ?>
	<?php if ($thaw->sortUrl($thaw->thawDate) == "") { ?>
		<th data-name="thawDate" class="<?php echo $thaw->thawDate->headerCellClass() ?>"><div id="elh_thaw_thawDate" class="thaw_thawDate"><div class="ew-table-header-caption"><?php echo $thaw->thawDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawDate" class="<?php echo $thaw->thawDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawDate) ?>',1);"><div id="elh_thaw_thawDate" class="thaw_thawDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<?php if ($thaw->sortUrl($thaw->thawPrimaryEmbryologist) == "") { ?>
		<th data-name="thawPrimaryEmbryologist" class="<?php echo $thaw->thawPrimaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $thaw->thawPrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawPrimaryEmbryologist" class="<?php echo $thaw->thawPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawPrimaryEmbryologist) ?>',1);"><div id="elh_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawPrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawPrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawPrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<?php if ($thaw->sortUrl($thaw->thawSecondaryEmbryologist) == "") { ?>
		<th data-name="thawSecondaryEmbryologist" class="<?php echo $thaw->thawSecondaryEmbryologist->headerCellClass() ?>"><div id="elh_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $thaw->thawSecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawSecondaryEmbryologist" class="<?php echo $thaw->thawSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawSecondaryEmbryologist) ?>',1);"><div id="elh_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawSecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawSecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawSecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->thawET->Visible) { // thawET ?>
	<?php if ($thaw->sortUrl($thaw->thawET) == "") { ?>
		<th data-name="thawET" class="<?php echo $thaw->thawET->headerCellClass() ?>"><div id="elh_thaw_thawET" class="thaw_thawET"><div class="ew-table-header-caption"><?php echo $thaw->thawET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawET" class="<?php echo $thaw->thawET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawET) ?>',1);"><div id="elh_thaw_thawET" class="thaw_thawET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawET->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->thawReFrozen->Visible) { // thawReFrozen ?>
	<?php if ($thaw->sortUrl($thaw->thawReFrozen) == "") { ?>
		<th data-name="thawReFrozen" class="<?php echo $thaw->thawReFrozen->headerCellClass() ?>"><div id="elh_thaw_thawReFrozen" class="thaw_thawReFrozen"><div class="ew-table-header-caption"><?php echo $thaw->thawReFrozen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawReFrozen" class="<?php echo $thaw->thawReFrozen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawReFrozen) ?>',1);"><div id="elh_thaw_thawReFrozen" class="thaw_thawReFrozen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawReFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawReFrozen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawReFrozen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->thawAbserve->Visible) { // thawAbserve ?>
	<?php if ($thaw->sortUrl($thaw->thawAbserve) == "") { ?>
		<th data-name="thawAbserve" class="<?php echo $thaw->thawAbserve->headerCellClass() ?>"><div id="elh_thaw_thawAbserve" class="thaw_thawAbserve"><div class="ew-table-header-caption"><?php echo $thaw->thawAbserve->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawAbserve" class="<?php echo $thaw->thawAbserve->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawAbserve) ?>',1);"><div id="elh_thaw_thawAbserve" class="thaw_thawAbserve">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawAbserve->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawAbserve->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawAbserve->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->thawDiscard->Visible) { // thawDiscard ?>
	<?php if ($thaw->sortUrl($thaw->thawDiscard) == "") { ?>
		<th data-name="thawDiscard" class="<?php echo $thaw->thawDiscard->headerCellClass() ?>"><div id="elh_thaw_thawDiscard" class="thaw_thawDiscard"><div class="ew-table-header-caption"><?php echo $thaw->thawDiscard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="thawDiscard" class="<?php echo $thaw->thawDiscard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->thawDiscard) ?>',1);"><div id="elh_thaw_thawDiscard" class="thaw_thawDiscard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->thawDiscard->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw->thawDiscard->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->thawDiscard->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($thaw->sortUrl($thaw->vitrificationDate) == "") { ?>
		<th data-name="vitrificationDate" class="<?php echo $thaw->vitrificationDate->headerCellClass() ?>"><div id="elh_thaw_vitrificationDate" class="thaw_vitrificationDate"><div class="ew-table-header-caption"><?php echo $thaw->vitrificationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitrificationDate" class="<?php echo $thaw->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->vitrificationDate) ?>',1);"><div id="elh_thaw_vitrificationDate" class="thaw_vitrificationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw->vitrificationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->vitrificationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($thaw->sortUrl($thaw->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $thaw->EmbryoNo->headerCellClass() ?>"><div id="elh_thaw_EmbryoNo" class="thaw_EmbryoNo"><div class="ew-table-header-caption"><?php echo $thaw->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $thaw->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->EmbryoNo) ?>',1);"><div id="elh_thaw_EmbryoNo" class="thaw_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($thaw->EmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->EmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->Day->Visible) { // Day ?>
	<?php if ($thaw->sortUrl($thaw->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $thaw->Day->headerCellClass() ?>"><div id="elh_thaw_Day" class="thaw_Day"><div class="ew-table-header-caption"><?php echo $thaw->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $thaw->Day->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->Day) ?>',1);"><div id="elh_thaw_Day" class="thaw_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw->Day->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->Day->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($thaw->Grade->Visible) { // Grade ?>
	<?php if ($thaw->sortUrl($thaw->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $thaw->Grade->headerCellClass() ?>"><div id="elh_thaw_Grade" class="thaw_Grade"><div class="ew-table-header-caption"><?php echo $thaw->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $thaw->Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $thaw->SortUrl($thaw->Grade) ?>',1);"><div id="elh_thaw_Grade" class="thaw_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $thaw->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($thaw->Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($thaw->Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
if ($thaw->ExportAll && $thaw->isExport()) {
	$thaw_list->StopRec = $thaw_list->TotalRecs;
} else {

	// Set the last record to display
	if ($thaw_list->TotalRecs > $thaw_list->StartRec + $thaw_list->DisplayRecs - 1)
		$thaw_list->StopRec = $thaw_list->StartRec + $thaw_list->DisplayRecs - 1;
	else
		$thaw_list->StopRec = $thaw_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $thaw_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($thaw_list->FormKeyCountName) && ($thaw->isGridAdd() || $thaw->isGridEdit() || $thaw->isConfirm())) {
		$thaw_list->KeyCount = $CurrentForm->getValue($thaw_list->FormKeyCountName);
		$thaw_list->StopRec = $thaw_list->StartRec + $thaw_list->KeyCount - 1;
	}
}
$thaw_list->RecCnt = $thaw_list->StartRec - 1;
if ($thaw_list->Recordset && !$thaw_list->Recordset->EOF) {
	$thaw_list->Recordset->moveFirst();
	$selectLimit = $thaw_list->UseSelectLimit;
	if (!$selectLimit && $thaw_list->StartRec > 1)
		$thaw_list->Recordset->move($thaw_list->StartRec - 1);
} elseif (!$thaw->AllowAddDeleteRow && $thaw_list->StopRec == 0) {
	$thaw_list->StopRec = $thaw->GridAddRowCount;
}

// Initialize aggregate
$thaw->RowType = ROWTYPE_AGGREGATEINIT;
$thaw->resetAttributes();
$thaw_list->renderRow();
$thaw_list->EditRowCnt = 0;
if ($thaw->isEdit())
	$thaw_list->RowIndex = 1;
if ($thaw->isGridEdit())
	$thaw_list->RowIndex = 0;
while ($thaw_list->RecCnt < $thaw_list->StopRec) {
	$thaw_list->RecCnt++;
	if ($thaw_list->RecCnt >= $thaw_list->StartRec) {
		$thaw_list->RowCnt++;
		if ($thaw->isGridAdd() || $thaw->isGridEdit() || $thaw->isConfirm()) {
			$thaw_list->RowIndex++;
			$CurrentForm->Index = $thaw_list->RowIndex;
			if ($CurrentForm->hasValue($thaw_list->FormActionName) && $thaw_list->EventCancelled)
				$thaw_list->RowAction = strval($CurrentForm->getValue($thaw_list->FormActionName));
			elseif ($thaw->isGridAdd())
				$thaw_list->RowAction = "insert";
			else
				$thaw_list->RowAction = "";
		}

		// Set up key count
		$thaw_list->KeyCount = $thaw_list->RowIndex;

		// Init row class and style
		$thaw->resetAttributes();
		$thaw->CssClass = "";
		if ($thaw->isGridAdd()) {
			$thaw_list->loadRowValues(); // Load default values
		} else {
			$thaw_list->loadRowValues($thaw_list->Recordset); // Load row values
		}
		$thaw->RowType = ROWTYPE_VIEW; // Render view
		if ($thaw->isEdit()) {
			if ($thaw_list->checkInlineEditKey() && $thaw_list->EditRowCnt == 0) { // Inline edit
				$thaw->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($thaw->isGridEdit()) { // Grid edit
			if ($thaw->EventCancelled)
				$thaw_list->restoreCurrentRowFormValues($thaw_list->RowIndex); // Restore form values
			if ($thaw_list->RowAction == "insert")
				$thaw->RowType = ROWTYPE_ADD; // Render add
			else
				$thaw->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($thaw->isEdit() && $thaw->RowType == ROWTYPE_EDIT && $thaw->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$thaw_list->restoreFormValues(); // Restore form values
		}
		if ($thaw->isGridEdit() && ($thaw->RowType == ROWTYPE_EDIT || $thaw->RowType == ROWTYPE_ADD) && $thaw->EventCancelled) // Update failed
			$thaw_list->restoreCurrentRowFormValues($thaw_list->RowIndex); // Restore form values
		if ($thaw->RowType == ROWTYPE_EDIT) // Edit row
			$thaw_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$thaw->RowAttrs = array_merge($thaw->RowAttrs, array('data-rowindex'=>$thaw_list->RowCnt, 'id'=>'r' . $thaw_list->RowCnt . '_thaw', 'data-rowtype'=>$thaw->RowType));

		// Render row
		$thaw_list->renderRow();

		// Render list options
		$thaw_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($thaw_list->RowAction <> "delete" && $thaw_list->RowAction <> "insertdelete" && !($thaw_list->RowAction == "insert" && $thaw->isConfirm() && $thaw_list->emptyRow())) {
?>
	<tr<?php echo $thaw->rowAttributes() ?>>
<?php

// Render list options (body, left)
$thaw_list->ListOptions->render("body", "left", $thaw_list->RowCnt);
?>
	<?php if ($thaw->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate"<?php echo $thaw->thawDate->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawDate" class="form-group thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x<?php echo $thaw_list->RowIndex ?>_thawDate" id="x<?php echo $thaw_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($thaw->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDate->EditValue ?>"<?php echo $thaw->thawDate->editAttributes() ?>>
<?php if (!$thaw->thawDate->ReadOnly && !$thaw->thawDate->Disabled && !isset($thaw->thawDate->EditAttrs["readonly"]) && !isset($thaw->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDate" name="o<?php echo $thaw_list->RowIndex ?>_thawDate" id="o<?php echo $thaw_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($thaw->thawDate->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawDate" class="form-group thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x<?php echo $thaw_list->RowIndex ?>_thawDate" id="x<?php echo $thaw_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($thaw->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDate->EditValue ?>"<?php echo $thaw->thawDate->editAttributes() ?>>
<?php if (!$thaw->thawDate->ReadOnly && !$thaw->thawDate->Disabled && !isset($thaw->thawDate->EditAttrs["readonly"]) && !isset($thaw->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawDate" class="thaw_thawDate">
<span<?php echo $thaw->thawDate->viewAttributes() ?>>
<?php echo $thaw->thawDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="thaw" data-field="x_id" name="x<?php echo $thaw_list->RowIndex ?>_id" id="x<?php echo $thaw_list->RowIndex ?>_id" value="<?php echo HtmlEncode($thaw->id->CurrentValue) ?>">
<input type="hidden" data-table="thaw" data-field="x_id" name="o<?php echo $thaw_list->RowIndex ?>_id" id="o<?php echo $thaw_list->RowIndex ?>_id" value="<?php echo HtmlEncode($thaw->id->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT || $thaw->CurrentMode == "edit") { ?>
<input type="hidden" data-table="thaw" data-field="x_id" name="x<?php echo $thaw_list->RowIndex ?>_id" id="x<?php echo $thaw_list->RowIndex ?>_id" value="<?php echo HtmlEncode($thaw->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($thaw->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist"<?php echo $thaw->thawPrimaryEmbryologist->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawPrimaryEmbryologist" class="form-group thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($thaw->thawPrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawPrimaryEmbryologist" class="form-group thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawPrimaryEmbryologist" class="thaw_thawPrimaryEmbryologist">
<span<?php echo $thaw->thawPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $thaw->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist"<?php echo $thaw->thawSecondaryEmbryologist->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawSecondaryEmbryologist" class="form-group thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($thaw->thawSecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawSecondaryEmbryologist" class="form-group thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawSecondaryEmbryologist" class="thaw_thawSecondaryEmbryologist">
<span<?php echo $thaw->thawSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $thaw->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->thawET->Visible) { // thawET ?>
		<td data-name="thawET"<?php echo $thaw->thawET->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawET" class="form-group thaw_thawET">
<input type="text" data-table="thaw" data-field="x_thawET" name="x<?php echo $thaw_list->RowIndex ?>_thawET" id="x<?php echo $thaw_list->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawET->getPlaceHolder()) ?>" value="<?php echo $thaw->thawET->EditValue ?>"<?php echo $thaw->thawET->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawET" name="o<?php echo $thaw_list->RowIndex ?>_thawET" id="o<?php echo $thaw_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($thaw->thawET->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawET" class="form-group thaw_thawET">
<input type="text" data-table="thaw" data-field="x_thawET" name="x<?php echo $thaw_list->RowIndex ?>_thawET" id="x<?php echo $thaw_list->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawET->getPlaceHolder()) ?>" value="<?php echo $thaw->thawET->EditValue ?>"<?php echo $thaw->thawET->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawET" class="thaw_thawET">
<span<?php echo $thaw->thawET->viewAttributes() ?>>
<?php echo $thaw->thawET->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen"<?php echo $thaw->thawReFrozen->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawReFrozen" class="form-group thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen" name="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen"<?php echo $thaw->thawReFrozen->editAttributes() ?>>
		<?php echo $thaw->thawReFrozen->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_thawReFrozen") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawReFrozen" name="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" id="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" value="<?php echo HtmlEncode($thaw->thawReFrozen->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawReFrozen" class="form-group thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen" name="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen"<?php echo $thaw->thawReFrozen->editAttributes() ?>>
		<?php echo $thaw->thawReFrozen->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_thawReFrozen") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawReFrozen" class="thaw_thawReFrozen">
<span<?php echo $thaw->thawReFrozen->viewAttributes() ?>>
<?php echo $thaw->thawReFrozen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve"<?php echo $thaw->thawAbserve->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawAbserve" class="form-group thaw_thawAbserve">
<input type="text" data-table="thaw" data-field="x_thawAbserve" name="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $thaw->thawAbserve->EditValue ?>"<?php echo $thaw->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawAbserve" name="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($thaw->thawAbserve->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawAbserve" class="form-group thaw_thawAbserve">
<input type="text" data-table="thaw" data-field="x_thawAbserve" name="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $thaw->thawAbserve->EditValue ?>"<?php echo $thaw->thawAbserve->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawAbserve" class="thaw_thawAbserve">
<span<?php echo $thaw->thawAbserve->viewAttributes() ?>>
<?php echo $thaw->thawAbserve->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard"<?php echo $thaw->thawDiscard->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawDiscard" class="form-group thaw_thawDiscard">
<input type="text" data-table="thaw" data-field="x_thawDiscard" name="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDiscard->EditValue ?>"<?php echo $thaw->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDiscard" name="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($thaw->thawDiscard->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawDiscard" class="form-group thaw_thawDiscard">
<input type="text" data-table="thaw" data-field="x_thawDiscard" name="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDiscard->EditValue ?>"<?php echo $thaw->thawDiscard->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_thawDiscard" class="thaw_thawDiscard">
<span<?php echo $thaw->thawDiscard->viewAttributes() ?>>
<?php echo $thaw->thawDiscard->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate"<?php echo $thaw->vitrificationDate->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_vitrificationDate" class="form-group thaw_vitrificationDate">
<input type="text" data-table="thaw" data-field="x_vitrificationDate" name="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($thaw->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $thaw->vitrificationDate->EditValue ?>"<?php echo $thaw->vitrificationDate->editAttributes() ?>>
<?php if (!$thaw->vitrificationDate->ReadOnly && !$thaw->vitrificationDate->Disabled && !isset($thaw->vitrificationDate->EditAttrs["readonly"]) && !isset($thaw->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($thaw->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_vitrificationDate" class="form-group thaw_vitrificationDate">
<span<?php echo $thaw->vitrificationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->vitrificationDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($thaw->vitrificationDate->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_vitrificationDate" class="thaw_vitrificationDate">
<span<?php echo $thaw->vitrificationDate->viewAttributes() ?>>
<?php echo $thaw->vitrificationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo"<?php echo $thaw->EmbryoNo->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_EmbryoNo" class="form-group thaw_EmbryoNo">
<input type="text" data-table="thaw" data-field="x_EmbryoNo" name="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $thaw->EmbryoNo->EditValue ?>"<?php echo $thaw->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($thaw->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_EmbryoNo" class="form-group thaw_EmbryoNo">
<span<?php echo $thaw->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->EmbryoNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($thaw->EmbryoNo->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_EmbryoNo" class="thaw_EmbryoNo">
<span<?php echo $thaw->EmbryoNo->viewAttributes() ?>>
<?php echo $thaw->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->Day->Visible) { // Day ?>
		<td data-name="Day"<?php echo $thaw->Day->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_Day" class="form-group thaw_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Day" data-value-separator="<?php echo $thaw->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Day" name="x<?php echo $thaw_list->RowIndex ?>_Day"<?php echo $thaw->Day->editAttributes() ?>>
		<?php echo $thaw->Day->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="o<?php echo $thaw_list->RowIndex ?>_Day" id="o<?php echo $thaw_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($thaw->Day->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_Day" class="form-group thaw_Day">
<span<?php echo $thaw->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Day->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="x<?php echo $thaw_list->RowIndex ?>_Day" id="x<?php echo $thaw_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($thaw->Day->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_Day" class="thaw_Day">
<span<?php echo $thaw->Day->viewAttributes() ?>>
<?php echo $thaw->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($thaw->Grade->Visible) { // Grade ?>
		<td data-name="Grade"<?php echo $thaw->Grade->cellAttributes() ?>>
<?php if ($thaw->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_Grade" class="form-group thaw_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Grade" data-value-separator="<?php echo $thaw->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Grade" name="x<?php echo $thaw_list->RowIndex ?>_Grade"<?php echo $thaw->Grade->editAttributes() ?>>
		<?php echo $thaw->Grade->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="o<?php echo $thaw_list->RowIndex ?>_Grade" id="o<?php echo $thaw_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($thaw->Grade->OldValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_Grade" class="form-group thaw_Grade">
<span<?php echo $thaw->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($thaw->Grade->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="x<?php echo $thaw_list->RowIndex ?>_Grade" id="x<?php echo $thaw_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($thaw->Grade->CurrentValue) ?>">
<?php } ?>
<?php if ($thaw->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $thaw_list->RowCnt ?>_thaw_Grade" class="thaw_Grade">
<span<?php echo $thaw->Grade->viewAttributes() ?>>
<?php echo $thaw->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$thaw_list->ListOptions->render("body", "right", $thaw_list->RowCnt);
?>
	</tr>
<?php if ($thaw->RowType == ROWTYPE_ADD || $thaw->RowType == ROWTYPE_EDIT) { ?>
<script>
fthawlist.updateLists(<?php echo $thaw_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$thaw->isGridAdd())
		if (!$thaw_list->Recordset->EOF)
			$thaw_list->Recordset->moveNext();
}
?>
<?php
	if ($thaw->isGridAdd() || $thaw->isGridEdit()) {
		$thaw_list->RowIndex = '$rowindex$';
		$thaw_list->loadRowValues();

		// Set row properties
		$thaw->resetAttributes();
		$thaw->RowAttrs = array_merge($thaw->RowAttrs, array('data-rowindex'=>$thaw_list->RowIndex, 'id'=>'r0_thaw', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($thaw->RowAttrs["class"], "ew-template");
		$thaw->RowType = ROWTYPE_ADD;

		// Render row
		$thaw_list->renderRow();

		// Render list options
		$thaw_list->renderListOptions();
		$thaw_list->StartRowCnt = 0;
?>
	<tr<?php echo $thaw->rowAttributes() ?>>
<?php

// Render list options (body, left)
$thaw_list->ListOptions->render("body", "left", $thaw_list->RowIndex);
?>
	<?php if ($thaw->thawDate->Visible) { // thawDate ?>
		<td data-name="thawDate">
<span id="el$rowindex$_thaw_thawDate" class="form-group thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x<?php echo $thaw_list->RowIndex ?>_thawDate" id="x<?php echo $thaw_list->RowIndex ?>_thawDate" placeholder="<?php echo HtmlEncode($thaw->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDate->EditValue ?>"<?php echo $thaw->thawDate->editAttributes() ?>>
<?php if (!$thaw->thawDate->ReadOnly && !$thaw->thawDate->Disabled && !isset($thaw->thawDate->EditAttrs["readonly"]) && !isset($thaw->thawDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDate" name="o<?php echo $thaw_list->RowIndex ?>_thawDate" id="o<?php echo $thaw_list->RowIndex ?>_thawDate" value="<?php echo HtmlEncode($thaw->thawDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
		<td data-name="thawPrimaryEmbryologist">
<span id="el$rowindex$_thaw_thawPrimaryEmbryologist" class="form-group thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawPrimaryEmbryologist" value="<?php echo HtmlEncode($thaw->thawPrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
		<td data-name="thawSecondaryEmbryologist">
<span id="el$rowindex$_thaw_thawSecondaryEmbryologist" class="form-group thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="x<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" id="o<?php echo $thaw_list->RowIndex ?>_thawSecondaryEmbryologist" value="<?php echo HtmlEncode($thaw->thawSecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->thawET->Visible) { // thawET ?>
		<td data-name="thawET">
<span id="el$rowindex$_thaw_thawET" class="form-group thaw_thawET">
<input type="text" data-table="thaw" data-field="x_thawET" name="x<?php echo $thaw_list->RowIndex ?>_thawET" id="x<?php echo $thaw_list->RowIndex ?>_thawET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawET->getPlaceHolder()) ?>" value="<?php echo $thaw->thawET->EditValue ?>"<?php echo $thaw->thawET->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawET" name="o<?php echo $thaw_list->RowIndex ?>_thawET" id="o<?php echo $thaw_list->RowIndex ?>_thawET" value="<?php echo HtmlEncode($thaw->thawET->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->thawReFrozen->Visible) { // thawReFrozen ?>
		<td data-name="thawReFrozen">
<span id="el$rowindex$_thaw_thawReFrozen" class="form-group thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen" name="x<?php echo $thaw_list->RowIndex ?>_thawReFrozen"<?php echo $thaw->thawReFrozen->editAttributes() ?>>
		<?php echo $thaw->thawReFrozen->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_thawReFrozen") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawReFrozen" name="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" id="o<?php echo $thaw_list->RowIndex ?>_thawReFrozen" value="<?php echo HtmlEncode($thaw->thawReFrozen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->thawAbserve->Visible) { // thawAbserve ?>
		<td data-name="thawAbserve">
<span id="el$rowindex$_thaw_thawAbserve" class="form-group thaw_thawAbserve">
<input type="text" data-table="thaw" data-field="x_thawAbserve" name="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="x<?php echo $thaw_list->RowIndex ?>_thawAbserve" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawAbserve->getPlaceHolder()) ?>" value="<?php echo $thaw->thawAbserve->EditValue ?>"<?php echo $thaw->thawAbserve->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawAbserve" name="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" id="o<?php echo $thaw_list->RowIndex ?>_thawAbserve" value="<?php echo HtmlEncode($thaw->thawAbserve->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->thawDiscard->Visible) { // thawDiscard ?>
		<td data-name="thawDiscard">
<span id="el$rowindex$_thaw_thawDiscard" class="form-group thaw_thawDiscard">
<input type="text" data-table="thaw" data-field="x_thawDiscard" name="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="x<?php echo $thaw_list->RowIndex ?>_thawDiscard" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->thawDiscard->getPlaceHolder()) ?>" value="<?php echo $thaw->thawDiscard->EditValue ?>"<?php echo $thaw->thawDiscard->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_thawDiscard" name="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" id="o<?php echo $thaw_list->RowIndex ?>_thawDiscard" value="<?php echo HtmlEncode($thaw->thawDiscard->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<span id="el$rowindex$_thaw_vitrificationDate" class="form-group thaw_vitrificationDate">
<input type="text" data-table="thaw" data-field="x_vitrificationDate" name="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="x<?php echo $thaw_list->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($thaw->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $thaw->vitrificationDate->EditValue ?>"<?php echo $thaw->vitrificationDate->editAttributes() ?>>
<?php if (!$thaw->vitrificationDate->ReadOnly && !$thaw->vitrificationDate->Disabled && !isset($thaw->vitrificationDate->EditAttrs["readonly"]) && !isset($thaw->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fthawlist", "x<?php echo $thaw_list->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" id="o<?php echo $thaw_list->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($thaw->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<span id="el$rowindex$_thaw_EmbryoNo" class="form-group thaw_EmbryoNo">
<input type="text" data-table="thaw" data-field="x_EmbryoNo" name="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="x<?php echo $thaw_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $thaw->EmbryoNo->EditValue ?>"<?php echo $thaw->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" id="o<?php echo $thaw_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($thaw->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->Day->Visible) { // Day ?>
		<td data-name="Day">
<span id="el$rowindex$_thaw_Day" class="form-group thaw_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Day" data-value-separator="<?php echo $thaw->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Day" name="x<?php echo $thaw_list->RowIndex ?>_Day"<?php echo $thaw->Day->editAttributes() ?>>
		<?php echo $thaw->Day->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="o<?php echo $thaw_list->RowIndex ?>_Day" id="o<?php echo $thaw_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($thaw->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($thaw->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<span id="el$rowindex$_thaw_Grade" class="form-group thaw_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_Grade" data-value-separator="<?php echo $thaw->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $thaw_list->RowIndex ?>_Grade" name="x<?php echo $thaw_list->RowIndex ?>_Grade"<?php echo $thaw->Grade->editAttributes() ?>>
		<?php echo $thaw->Grade->selectOptionListHtml("x<?php echo $thaw_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="o<?php echo $thaw_list->RowIndex ?>_Grade" id="o<?php echo $thaw_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($thaw->Grade->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$thaw_list->ListOptions->render("body", "right", $thaw_list->RowIndex);
?>
<script>
fthawlist.updateLists(<?php echo $thaw_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($thaw->isEdit()) { ?>
<input type="hidden" name="<?php echo $thaw_list->FormKeyCountName ?>" id="<?php echo $thaw_list->FormKeyCountName ?>" value="<?php echo $thaw_list->KeyCount ?>">
<?php } ?>
<?php if ($thaw->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $thaw_list->FormKeyCountName ?>" id="<?php echo $thaw_list->FormKeyCountName ?>" value="<?php echo $thaw_list->KeyCount ?>">
<?php echo $thaw_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$thaw->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($thaw_list->Recordset)
	$thaw_list->Recordset->Close();
?>
<?php if (!$thaw->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$thaw->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($thaw_list->Pager)) $thaw_list->Pager = new NumericPager($thaw_list->StartRec, $thaw_list->DisplayRecs, $thaw_list->TotalRecs, $thaw_list->RecRange, $thaw_list->AutoHidePager) ?>
<?php if ($thaw_list->Pager->RecordCount > 0 && $thaw_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($thaw_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($thaw_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($thaw_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $thaw_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($thaw_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($thaw_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $thaw_list->pageUrl() ?>start=<?php echo $thaw_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($thaw_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $thaw_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $thaw_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $thaw_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($thaw_list->TotalRecs > 0 && (!$thaw_list->AutoHidePageSizeSelector || $thaw_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="thaw">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($thaw_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($thaw_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($thaw_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($thaw_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($thaw_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($thaw_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($thaw->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
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
<?php if ($thaw_list->TotalRecs == 0 && !$thaw->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $thaw_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$thaw_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$thaw->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$thaw->isExport()) { ?>
<script>
ew.scrollableTable("gmp_thaw", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$thaw_list->terminate();
?>