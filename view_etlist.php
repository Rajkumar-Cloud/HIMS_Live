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
$view_et_list = new view_et_list();

// Run the page
$view_et_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_et_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_et->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_etlist = currentForm = new ew.Form("fview_etlist", "list");
fview_etlist.formKeyCountName = '<?php echo $view_et_list->FormKeyCountName ?>';

// Validate form
fview_etlist.validate = function() {
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
		<?php if ($view_et_list->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->EmbryoNo->caption(), $view_et->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Stage->caption(), $view_et->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->FertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->FertilisationDate->caption(), $view_et->FertilisationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Day->Required) { ?>
			elm = this.getElements("x" + infix + "_Day");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Day->caption(), $view_et->Day->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Grade->caption(), $view_et->Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Incubator->caption(), $view_et->Incubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Catheter->Required) { ?>
			elm = this.getElements("x" + infix + "_Catheter");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Catheter->caption(), $view_et->Catheter->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Difficulty->Required) { ?>
			elm = this.getElements("x" + infix + "_Difficulty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Difficulty->caption(), $view_et->Difficulty->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Easy->Required) { ?>
			elm = this.getElements("x" + infix + "_Easy[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Easy->caption(), $view_et->Easy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Comments->caption(), $view_et->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Doctor->caption(), $view_et->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_et_list->Embryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_Embryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et->Embryologist->caption(), $view_et->Embryologist->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_etlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_etlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_etlist.lists["x_Day"] = <?php echo $view_et_list->Day->Lookup->toClientList() ?>;
fview_etlist.lists["x_Day"].options = <?php echo JsonEncode($view_et_list->Day->options(FALSE, TRUE)) ?>;
fview_etlist.lists["x_Grade"] = <?php echo $view_et_list->Grade->Lookup->toClientList() ?>;
fview_etlist.lists["x_Grade"].options = <?php echo JsonEncode($view_et_list->Grade->options(FALSE, TRUE)) ?>;
fview_etlist.lists["x_Difficulty"] = <?php echo $view_et_list->Difficulty->Lookup->toClientList() ?>;
fview_etlist.lists["x_Difficulty"].options = <?php echo JsonEncode($view_et_list->Difficulty->options(FALSE, TRUE)) ?>;
fview_etlist.lists["x_Easy[]"] = <?php echo $view_et_list->Easy->Lookup->toClientList() ?>;
fview_etlist.lists["x_Easy[]"].options = <?php echo JsonEncode($view_et_list->Easy->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_etlistsrch = currentSearchForm = new ew.Form("fview_etlistsrch");

// Filters
fview_etlistsrch.filterList = <?php echo $view_et_list->getFilterList() ?>;
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
<?php if (!$view_et->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_et_list->TotalRecs > 0 && $view_et_list->ExportOptions->visible()) { ?>
<?php $view_et_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_et_list->ImportOptions->visible()) { ?>
<?php $view_et_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_et_list->SearchOptions->visible()) { ?>
<?php $view_et_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_et_list->FilterOptions->visible()) { ?>
<?php $view_et_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_et_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_et->isExport() && !$view_et->CurrentAction) { ?>
<form name="fview_etlistsrch" id="fview_etlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_et_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_etlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_et">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_et_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_et_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_et_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_et_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_et_list->showPageHeader(); ?>
<?php
$view_et_list->showMessage();
?>
<?php if ($view_et_list->TotalRecs > 0 || $view_et->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_et_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_et">
<?php if (!$view_et->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_et->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_et_list->Pager)) $view_et_list->Pager = new NumericPager($view_et_list->StartRec, $view_et_list->DisplayRecs, $view_et_list->TotalRecs, $view_et_list->RecRange, $view_et_list->AutoHidePager) ?>
<?php if ($view_et_list->Pager->RecordCount > 0 && $view_et_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_et_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_et_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_et_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_et_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_et_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_et_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_et_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_et_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_et_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_et_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_et_list->TotalRecs > 0 && (!$view_et_list->AutoHidePageSizeSelector || $view_et_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_et">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_et_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_et_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_et_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_et_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_et_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_et_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_et->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_et_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_etlist" id="fview_etlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_et_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_et_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_et">
<div id="gmp_view_et" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_et_list->TotalRecs > 0 || $view_et->isGridEdit()) { ?>
<table id="tbl_view_etlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_et_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_et_list->renderListOptions();

// Render list options (header, left)
$view_et_list->ListOptions->render("header", "left");
?>
<?php if ($view_et->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($view_et->sortUrl($view_et->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $view_et->EmbryoNo->headerCellClass() ?>"><div id="elh_view_et_EmbryoNo" class="view_et_EmbryoNo"><div class="ew-table-header-caption"><?php echo $view_et->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $view_et->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->EmbryoNo) ?>',1);"><div id="elh_view_et_EmbryoNo" class="view_et_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->EmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->EmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Stage->Visible) { // Stage ?>
	<?php if ($view_et->sortUrl($view_et->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $view_et->Stage->headerCellClass() ?>"><div id="elh_view_et_Stage" class="view_et_Stage"><div class="ew-table-header-caption"><?php echo $view_et->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $view_et->Stage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Stage) ?>',1);"><div id="elh_view_et_Stage" class="view_et_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Stage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->FertilisationDate->Visible) { // FertilisationDate ?>
	<?php if ($view_et->sortUrl($view_et->FertilisationDate) == "") { ?>
		<th data-name="FertilisationDate" class="<?php echo $view_et->FertilisationDate->headerCellClass() ?>"><div id="elh_view_et_FertilisationDate" class="view_et_FertilisationDate"><div class="ew-table-header-caption"><?php echo $view_et->FertilisationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FertilisationDate" class="<?php echo $view_et->FertilisationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->FertilisationDate) ?>',1);"><div id="elh_view_et_FertilisationDate" class="view_et_FertilisationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->FertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et->FertilisationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->FertilisationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Day->Visible) { // Day ?>
	<?php if ($view_et->sortUrl($view_et->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $view_et->Day->headerCellClass() ?>"><div id="elh_view_et_Day" class="view_et_Day"><div class="ew-table-header-caption"><?php echo $view_et->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $view_et->Day->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Day) ?>',1);"><div id="elh_view_et_Day" class="view_et_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et->Day->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Day->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Grade->Visible) { // Grade ?>
	<?php if ($view_et->sortUrl($view_et->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $view_et->Grade->headerCellClass() ?>"><div id="elh_view_et_Grade" class="view_et_Grade"><div class="ew-table-header-caption"><?php echo $view_et->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $view_et->Grade->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Grade) ?>',1);"><div id="elh_view_et_Grade" class="view_et_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et->Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Incubator->Visible) { // Incubator ?>
	<?php if ($view_et->sortUrl($view_et->Incubator) == "") { ?>
		<th data-name="Incubator" class="<?php echo $view_et->Incubator->headerCellClass() ?>"><div id="elh_view_et_Incubator" class="view_et_Incubator"><div class="ew-table-header-caption"><?php echo $view_et->Incubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator" class="<?php echo $view_et->Incubator->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Incubator) ?>',1);"><div id="elh_view_et_Incubator" class="view_et_Incubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Incubator->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->Incubator->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Incubator->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Catheter->Visible) { // Catheter ?>
	<?php if ($view_et->sortUrl($view_et->Catheter) == "") { ?>
		<th data-name="Catheter" class="<?php echo $view_et->Catheter->headerCellClass() ?>"><div id="elh_view_et_Catheter" class="view_et_Catheter"><div class="ew-table-header-caption"><?php echo $view_et->Catheter->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Catheter" class="<?php echo $view_et->Catheter->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Catheter) ?>',1);"><div id="elh_view_et_Catheter" class="view_et_Catheter">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Catheter->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->Catheter->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Catheter->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Difficulty->Visible) { // Difficulty ?>
	<?php if ($view_et->sortUrl($view_et->Difficulty) == "") { ?>
		<th data-name="Difficulty" class="<?php echo $view_et->Difficulty->headerCellClass() ?>"><div id="elh_view_et_Difficulty" class="view_et_Difficulty"><div class="ew-table-header-caption"><?php echo $view_et->Difficulty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Difficulty" class="<?php echo $view_et->Difficulty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Difficulty) ?>',1);"><div id="elh_view_et_Difficulty" class="view_et_Difficulty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Difficulty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et->Difficulty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Difficulty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Easy->Visible) { // Easy ?>
	<?php if ($view_et->sortUrl($view_et->Easy) == "") { ?>
		<th data-name="Easy" class="<?php echo $view_et->Easy->headerCellClass() ?>"><div id="elh_view_et_Easy" class="view_et_Easy"><div class="ew-table-header-caption"><?php echo $view_et->Easy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Easy" class="<?php echo $view_et->Easy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Easy) ?>',1);"><div id="elh_view_et_Easy" class="view_et_Easy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Easy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_et->Easy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Easy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Comments->Visible) { // Comments ?>
	<?php if ($view_et->sortUrl($view_et->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_et->Comments->headerCellClass() ?>"><div id="elh_view_et_Comments" class="view_et_Comments"><div class="ew-table-header-caption"><?php echo $view_et->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_et->Comments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Comments) ?>',1);"><div id="elh_view_et_Comments" class="view_et_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->Comments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Comments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Doctor->Visible) { // Doctor ?>
	<?php if ($view_et->sortUrl($view_et->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_et->Doctor->headerCellClass() ?>"><div id="elh_view_et_Doctor" class="view_et_Doctor"><div class="ew-table-header-caption"><?php echo $view_et->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_et->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Doctor) ?>',1);"><div id="elh_view_et_Doctor" class="view_et_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_et->Embryologist->Visible) { // Embryologist ?>
	<?php if ($view_et->sortUrl($view_et->Embryologist) == "") { ?>
		<th data-name="Embryologist" class="<?php echo $view_et->Embryologist->headerCellClass() ?>"><div id="elh_view_et_Embryologist" class="view_et_Embryologist"><div class="ew-table-header-caption"><?php echo $view_et->Embryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Embryologist" class="<?php echo $view_et->Embryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_et->SortUrl($view_et->Embryologist) ?>',1);"><div id="elh_view_et_Embryologist" class="view_et_Embryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_et->Embryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_et->Embryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_et->Embryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_et_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_et->ExportAll && $view_et->isExport()) {
	$view_et_list->StopRec = $view_et_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_et_list->TotalRecs > $view_et_list->StartRec + $view_et_list->DisplayRecs - 1)
		$view_et_list->StopRec = $view_et_list->StartRec + $view_et_list->DisplayRecs - 1;
	else
		$view_et_list->StopRec = $view_et_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_et_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_et_list->FormKeyCountName) && ($view_et->isGridAdd() || $view_et->isGridEdit() || $view_et->isConfirm())) {
		$view_et_list->KeyCount = $CurrentForm->getValue($view_et_list->FormKeyCountName);
		$view_et_list->StopRec = $view_et_list->StartRec + $view_et_list->KeyCount - 1;
	}
}
$view_et_list->RecCnt = $view_et_list->StartRec - 1;
if ($view_et_list->Recordset && !$view_et_list->Recordset->EOF) {
	$view_et_list->Recordset->moveFirst();
	$selectLimit = $view_et_list->UseSelectLimit;
	if (!$selectLimit && $view_et_list->StartRec > 1)
		$view_et_list->Recordset->move($view_et_list->StartRec - 1);
} elseif (!$view_et->AllowAddDeleteRow && $view_et_list->StopRec == 0) {
	$view_et_list->StopRec = $view_et->GridAddRowCount;
}

// Initialize aggregate
$view_et->RowType = ROWTYPE_AGGREGATEINIT;
$view_et->resetAttributes();
$view_et_list->renderRow();
$view_et_list->EditRowCnt = 0;
if ($view_et->isEdit())
	$view_et_list->RowIndex = 1;
if ($view_et->isGridEdit())
	$view_et_list->RowIndex = 0;
while ($view_et_list->RecCnt < $view_et_list->StopRec) {
	$view_et_list->RecCnt++;
	if ($view_et_list->RecCnt >= $view_et_list->StartRec) {
		$view_et_list->RowCnt++;
		if ($view_et->isGridAdd() || $view_et->isGridEdit() || $view_et->isConfirm()) {
			$view_et_list->RowIndex++;
			$CurrentForm->Index = $view_et_list->RowIndex;
			if ($CurrentForm->hasValue($view_et_list->FormActionName) && $view_et_list->EventCancelled)
				$view_et_list->RowAction = strval($CurrentForm->getValue($view_et_list->FormActionName));
			elseif ($view_et->isGridAdd())
				$view_et_list->RowAction = "insert";
			else
				$view_et_list->RowAction = "";
		}

		// Set up key count
		$view_et_list->KeyCount = $view_et_list->RowIndex;

		// Init row class and style
		$view_et->resetAttributes();
		$view_et->CssClass = "";
		if ($view_et->isGridAdd()) {
			$view_et_list->loadRowValues(); // Load default values
		} else {
			$view_et_list->loadRowValues($view_et_list->Recordset); // Load row values
		}
		$view_et->RowType = ROWTYPE_VIEW; // Render view
		if ($view_et->isEdit()) {
			if ($view_et_list->checkInlineEditKey() && $view_et_list->EditRowCnt == 0) { // Inline edit
				$view_et->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_et->isGridEdit()) { // Grid edit
			if ($view_et->EventCancelled)
				$view_et_list->restoreCurrentRowFormValues($view_et_list->RowIndex); // Restore form values
			if ($view_et_list->RowAction == "insert")
				$view_et->RowType = ROWTYPE_ADD; // Render add
			else
				$view_et->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_et->isEdit() && $view_et->RowType == ROWTYPE_EDIT && $view_et->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_et_list->restoreFormValues(); // Restore form values
		}
		if ($view_et->isGridEdit() && ($view_et->RowType == ROWTYPE_EDIT || $view_et->RowType == ROWTYPE_ADD) && $view_et->EventCancelled) // Update failed
			$view_et_list->restoreCurrentRowFormValues($view_et_list->RowIndex); // Restore form values
		if ($view_et->RowType == ROWTYPE_EDIT) // Edit row
			$view_et_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_et->RowAttrs = array_merge($view_et->RowAttrs, array('data-rowindex'=>$view_et_list->RowCnt, 'id'=>'r' . $view_et_list->RowCnt . '_view_et', 'data-rowtype'=>$view_et->RowType));

		// Render row
		$view_et_list->renderRow();

		// Render list options
		$view_et_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_et_list->RowAction <> "delete" && $view_et_list->RowAction <> "insertdelete" && !($view_et_list->RowAction == "insert" && $view_et->isConfirm() && $view_et_list->emptyRow())) {
?>
	<tr<?php echo $view_et->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_et_list->ListOptions->render("body", "left", $view_et_list->RowCnt);
?>
	<?php if ($view_et->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo"<?php echo $view_et->EmbryoNo->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_EmbryoNo" class="form-group view_et_EmbryoNo">
<input type="text" data-table="view_et" data-field="x_EmbryoNo" name="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $view_et->EmbryoNo->EditValue ?>"<?php echo $view_et->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" name="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($view_et->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_EmbryoNo" class="form-group view_et_EmbryoNo">
<span<?php echo $view_et->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_et->EmbryoNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" name="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($view_et->EmbryoNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_EmbryoNo" class="view_et_EmbryoNo">
<span<?php echo $view_et->EmbryoNo->viewAttributes() ?>>
<?php echo $view_et->EmbryoNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_et" data-field="x_id" name="x<?php echo $view_et_list->RowIndex ?>_id" id="x<?php echo $view_et_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_et->id->CurrentValue) ?>">
<input type="hidden" data-table="view_et" data-field="x_id" name="o<?php echo $view_et_list->RowIndex ?>_id" id="o<?php echo $view_et_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_et->id->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT || $view_et->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_et" data-field="x_id" name="x<?php echo $view_et_list->RowIndex ?>_id" id="x<?php echo $view_et_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_et->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_et->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $view_et->Stage->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Stage" class="form-group view_et_Stage">
<input type="text" data-table="view_et" data-field="x_Stage" name="x<?php echo $view_et_list->RowIndex ?>_Stage" id="x<?php echo $view_et_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Stage->getPlaceHolder()) ?>" value="<?php echo $view_et->Stage->EditValue ?>"<?php echo $view_et->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" name="o<?php echo $view_et_list->RowIndex ?>_Stage" id="o<?php echo $view_et_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_et->Stage->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Stage" class="form-group view_et_Stage">
<span<?php echo $view_et->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_et->Stage->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" name="x<?php echo $view_et_list->RowIndex ?>_Stage" id="x<?php echo $view_et_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_et->Stage->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Stage" class="view_et_Stage">
<span<?php echo $view_et->Stage->viewAttributes() ?>>
<?php echo $view_et->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate"<?php echo $view_et->FertilisationDate->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_FertilisationDate" class="form-group view_et_FertilisationDate">
<input type="text" data-table="view_et" data-field="x_FertilisationDate" name="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($view_et->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $view_et->FertilisationDate->EditValue ?>"<?php echo $view_et->FertilisationDate->editAttributes() ?>>
<?php if (!$view_et->FertilisationDate->ReadOnly && !$view_et->FertilisationDate->Disabled && !isset($view_et->FertilisationDate->EditAttrs["readonly"]) && !isset($view_et->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_etlist", "x<?php echo $view_et_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" name="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($view_et->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_FertilisationDate" class="form-group view_et_FertilisationDate">
<span<?php echo $view_et->FertilisationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_et->FertilisationDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" name="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($view_et->FertilisationDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_FertilisationDate" class="view_et_FertilisationDate">
<span<?php echo $view_et->FertilisationDate->viewAttributes() ?>>
<?php echo $view_et->FertilisationDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Day->Visible) { // Day ?>
		<td data-name="Day"<?php echo $view_et->Day->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Day" class="form-group view_et_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Day" data-value-separator="<?php echo $view_et->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Day" name="x<?php echo $view_et_list->RowIndex ?>_Day"<?php echo $view_et->Day->editAttributes() ?>>
		<?php echo $view_et->Day->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" name="o<?php echo $view_et_list->RowIndex ?>_Day" id="o<?php echo $view_et_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($view_et->Day->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Day" class="form-group view_et_Day">
<span<?php echo $view_et->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_et->Day->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" name="x<?php echo $view_et_list->RowIndex ?>_Day" id="x<?php echo $view_et_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($view_et->Day->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Day" class="view_et_Day">
<span<?php echo $view_et->Day->viewAttributes() ?>>
<?php echo $view_et->Day->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Grade->Visible) { // Grade ?>
		<td data-name="Grade"<?php echo $view_et->Grade->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Grade" class="form-group view_et_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Grade" data-value-separator="<?php echo $view_et->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Grade" name="x<?php echo $view_et_list->RowIndex ?>_Grade"<?php echo $view_et->Grade->editAttributes() ?>>
		<?php echo $view_et->Grade->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" name="o<?php echo $view_et_list->RowIndex ?>_Grade" id="o<?php echo $view_et_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($view_et->Grade->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Grade" class="form-group view_et_Grade">
<span<?php echo $view_et->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_et->Grade->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" name="x<?php echo $view_et_list->RowIndex ?>_Grade" id="x<?php echo $view_et_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($view_et->Grade->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Grade" class="view_et_Grade">
<span<?php echo $view_et->Grade->viewAttributes() ?>>
<?php echo $view_et->Grade->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator"<?php echo $view_et->Incubator->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Incubator" class="form-group view_et_Incubator">
<input type="text" data-table="view_et" data-field="x_Incubator" name="x<?php echo $view_et_list->RowIndex ?>_Incubator" id="x<?php echo $view_et_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Incubator->getPlaceHolder()) ?>" value="<?php echo $view_et->Incubator->EditValue ?>"<?php echo $view_et->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" name="o<?php echo $view_et_list->RowIndex ?>_Incubator" id="o<?php echo $view_et_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($view_et->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Incubator" class="form-group view_et_Incubator">
<span<?php echo $view_et->Incubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_et->Incubator->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" name="x<?php echo $view_et_list->RowIndex ?>_Incubator" id="x<?php echo $view_et_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($view_et->Incubator->CurrentValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Incubator" class="view_et_Incubator">
<span<?php echo $view_et->Incubator->viewAttributes() ?>>
<?php echo $view_et->Incubator->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Catheter->Visible) { // Catheter ?>
		<td data-name="Catheter"<?php echo $view_et->Catheter->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Catheter" class="form-group view_et_Catheter">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x<?php echo $view_et_list->RowIndex ?>_Catheter" id="x<?php echo $view_et_list->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et->Catheter->EditValue ?>"<?php echo $view_et->Catheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Catheter" name="o<?php echo $view_et_list->RowIndex ?>_Catheter" id="o<?php echo $view_et_list->RowIndex ?>_Catheter" value="<?php echo HtmlEncode($view_et->Catheter->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Catheter" class="form-group view_et_Catheter">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x<?php echo $view_et_list->RowIndex ?>_Catheter" id="x<?php echo $view_et_list->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et->Catheter->EditValue ?>"<?php echo $view_et->Catheter->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Catheter" class="view_et_Catheter">
<span<?php echo $view_et->Catheter->viewAttributes() ?>>
<?php echo $view_et->Catheter->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Difficulty->Visible) { // Difficulty ?>
		<td data-name="Difficulty"<?php echo $view_et->Difficulty->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Difficulty" class="form-group view_et_Difficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et->Difficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Difficulty" name="x<?php echo $view_et_list->RowIndex ?>_Difficulty"<?php echo $view_et->Difficulty->editAttributes() ?>>
		<?php echo $view_et->Difficulty->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Difficulty") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Difficulty" name="o<?php echo $view_et_list->RowIndex ?>_Difficulty" id="o<?php echo $view_et_list->RowIndex ?>_Difficulty" value="<?php echo HtmlEncode($view_et->Difficulty->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Difficulty" class="form-group view_et_Difficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et->Difficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Difficulty" name="x<?php echo $view_et_list->RowIndex ?>_Difficulty"<?php echo $view_et->Difficulty->editAttributes() ?>>
		<?php echo $view_et->Difficulty->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Difficulty") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Difficulty" class="view_et_Difficulty">
<span<?php echo $view_et->Difficulty->viewAttributes() ?>>
<?php echo $view_et->Difficulty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Easy->Visible) { // Easy ?>
		<td data-name="Easy"<?php echo $view_et->Easy->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Easy" class="form-group view_et_Easy">
<div id="tp_x<?php echo $view_et_list->RowIndex ?>_Easy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et->Easy->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_et_list->RowIndex ?>_Easy[]" id="x<?php echo $view_et_list->RowIndex ?>_Easy[]" value="{value}"<?php echo $view_et->Easy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_et_list->RowIndex ?>_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et->Easy->checkBoxListHtml(FALSE, "x{$view_et_list->RowIndex}_Easy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Easy" name="o<?php echo $view_et_list->RowIndex ?>_Easy[]" id="o<?php echo $view_et_list->RowIndex ?>_Easy[]" value="<?php echo HtmlEncode($view_et->Easy->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Easy" class="form-group view_et_Easy">
<div id="tp_x<?php echo $view_et_list->RowIndex ?>_Easy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et->Easy->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_et_list->RowIndex ?>_Easy[]" id="x<?php echo $view_et_list->RowIndex ?>_Easy[]" value="{value}"<?php echo $view_et->Easy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_et_list->RowIndex ?>_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et->Easy->checkBoxListHtml(FALSE, "x{$view_et_list->RowIndex}_Easy[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Easy" class="view_et_Easy">
<span<?php echo $view_et->Easy->viewAttributes() ?>>
<?php echo $view_et->Easy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Comments->Visible) { // Comments ?>
		<td data-name="Comments"<?php echo $view_et->Comments->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Comments" class="form-group view_et_Comments">
<input type="text" data-table="view_et" data-field="x_Comments" name="x<?php echo $view_et_list->RowIndex ?>_Comments" id="x<?php echo $view_et_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et->Comments->EditValue ?>"<?php echo $view_et->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Comments" name="o<?php echo $view_et_list->RowIndex ?>_Comments" id="o<?php echo $view_et_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_et->Comments->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Comments" class="form-group view_et_Comments">
<input type="text" data-table="view_et" data-field="x_Comments" name="x<?php echo $view_et_list->RowIndex ?>_Comments" id="x<?php echo $view_et_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et->Comments->EditValue ?>"<?php echo $view_et->Comments->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Comments" class="view_et_Comments">
<span<?php echo $view_et->Comments->viewAttributes() ?>>
<?php echo $view_et->Comments->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_et->Doctor->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Doctor" class="form-group view_et_Doctor">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x<?php echo $view_et_list->RowIndex ?>_Doctor" id="x<?php echo $view_et_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et->Doctor->EditValue ?>"<?php echo $view_et->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Doctor" name="o<?php echo $view_et_list->RowIndex ?>_Doctor" id="o<?php echo $view_et_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_et->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Doctor" class="form-group view_et_Doctor">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x<?php echo $view_et_list->RowIndex ?>_Doctor" id="x<?php echo $view_et_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et->Doctor->EditValue ?>"<?php echo $view_et->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Doctor" class="view_et_Doctor">
<span<?php echo $view_et->Doctor->viewAttributes() ?>>
<?php echo $view_et->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_et->Embryologist->Visible) { // Embryologist ?>
		<td data-name="Embryologist"<?php echo $view_et->Embryologist->cellAttributes() ?>>
<?php if ($view_et->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Embryologist" class="form-group view_et_Embryologist">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x<?php echo $view_et_list->RowIndex ?>_Embryologist" id="x<?php echo $view_et_list->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et->Embryologist->EditValue ?>"<?php echo $view_et->Embryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Embryologist" name="o<?php echo $view_et_list->RowIndex ?>_Embryologist" id="o<?php echo $view_et_list->RowIndex ?>_Embryologist" value="<?php echo HtmlEncode($view_et->Embryologist->OldValue) ?>">
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Embryologist" class="form-group view_et_Embryologist">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x<?php echo $view_et_list->RowIndex ?>_Embryologist" id="x<?php echo $view_et_list->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et->Embryologist->EditValue ?>"<?php echo $view_et->Embryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_et->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_et_list->RowCnt ?>_view_et_Embryologist" class="view_et_Embryologist">
<span<?php echo $view_et->Embryologist->viewAttributes() ?>>
<?php echo $view_et->Embryologist->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_et_list->ListOptions->render("body", "right", $view_et_list->RowCnt);
?>
	</tr>
<?php if ($view_et->RowType == ROWTYPE_ADD || $view_et->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_etlist.updateLists(<?php echo $view_et_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_et->isGridAdd())
		if (!$view_et_list->Recordset->EOF)
			$view_et_list->Recordset->moveNext();
}
?>
<?php
	if ($view_et->isGridAdd() || $view_et->isGridEdit()) {
		$view_et_list->RowIndex = '$rowindex$';
		$view_et_list->loadRowValues();

		// Set row properties
		$view_et->resetAttributes();
		$view_et->RowAttrs = array_merge($view_et->RowAttrs, array('data-rowindex'=>$view_et_list->RowIndex, 'id'=>'r0_view_et', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_et->RowAttrs["class"], "ew-template");
		$view_et->RowType = ROWTYPE_ADD;

		// Render row
		$view_et_list->renderRow();

		// Render list options
		$view_et_list->renderListOptions();
		$view_et_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_et->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_et_list->ListOptions->render("body", "left", $view_et_list->RowIndex);
?>
	<?php if ($view_et->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<span id="el$rowindex$_view_et_EmbryoNo" class="form-group view_et_EmbryoNo">
<input type="text" data-table="view_et" data-field="x_EmbryoNo" name="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="x<?php echo $view_et_list->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $view_et->EmbryoNo->EditValue ?>"<?php echo $view_et->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_EmbryoNo" name="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" id="o<?php echo $view_et_list->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($view_et->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<span id="el$rowindex$_view_et_Stage" class="form-group view_et_Stage">
<input type="text" data-table="view_et" data-field="x_Stage" name="x<?php echo $view_et_list->RowIndex ?>_Stage" id="x<?php echo $view_et_list->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Stage->getPlaceHolder()) ?>" value="<?php echo $view_et->Stage->EditValue ?>"<?php echo $view_et->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Stage" name="o<?php echo $view_et_list->RowIndex ?>_Stage" id="o<?php echo $view_et_list->RowIndex ?>_Stage" value="<?php echo HtmlEncode($view_et->Stage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate">
<span id="el$rowindex$_view_et_FertilisationDate" class="form-group view_et_FertilisationDate">
<input type="text" data-table="view_et" data-field="x_FertilisationDate" name="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="x<?php echo $view_et_list->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($view_et->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $view_et->FertilisationDate->EditValue ?>"<?php echo $view_et->FertilisationDate->editAttributes() ?>>
<?php if (!$view_et->FertilisationDate->ReadOnly && !$view_et->FertilisationDate->Disabled && !isset($view_et->FertilisationDate->EditAttrs["readonly"]) && !isset($view_et->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_etlist", "x<?php echo $view_et_list->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_et" data-field="x_FertilisationDate" name="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" id="o<?php echo $view_et_list->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($view_et->FertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Day->Visible) { // Day ?>
		<td data-name="Day">
<span id="el$rowindex$_view_et_Day" class="form-group view_et_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Day" data-value-separator="<?php echo $view_et->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Day" name="x<?php echo $view_et_list->RowIndex ?>_Day"<?php echo $view_et->Day->editAttributes() ?>>
		<?php echo $view_et->Day->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Day" name="o<?php echo $view_et_list->RowIndex ?>_Day" id="o<?php echo $view_et_list->RowIndex ?>_Day" value="<?php echo HtmlEncode($view_et->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<span id="el$rowindex$_view_et_Grade" class="form-group view_et_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Grade" data-value-separator="<?php echo $view_et->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Grade" name="x<?php echo $view_et_list->RowIndex ?>_Grade"<?php echo $view_et->Grade->editAttributes() ?>>
		<?php echo $view_et->Grade->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Grade" name="o<?php echo $view_et_list->RowIndex ?>_Grade" id="o<?php echo $view_et_list->RowIndex ?>_Grade" value="<?php echo HtmlEncode($view_et->Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<span id="el$rowindex$_view_et_Incubator" class="form-group view_et_Incubator">
<input type="text" data-table="view_et" data-field="x_Incubator" name="x<?php echo $view_et_list->RowIndex ?>_Incubator" id="x<?php echo $view_et_list->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Incubator->getPlaceHolder()) ?>" value="<?php echo $view_et->Incubator->EditValue ?>"<?php echo $view_et->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Incubator" name="o<?php echo $view_et_list->RowIndex ?>_Incubator" id="o<?php echo $view_et_list->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($view_et->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Catheter->Visible) { // Catheter ?>
		<td data-name="Catheter">
<span id="el$rowindex$_view_et_Catheter" class="form-group view_et_Catheter">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x<?php echo $view_et_list->RowIndex ?>_Catheter" id="x<?php echo $view_et_list->RowIndex ?>_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et->Catheter->EditValue ?>"<?php echo $view_et->Catheter->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Catheter" name="o<?php echo $view_et_list->RowIndex ?>_Catheter" id="o<?php echo $view_et_list->RowIndex ?>_Catheter" value="<?php echo HtmlEncode($view_et->Catheter->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Difficulty->Visible) { // Difficulty ?>
		<td data-name="Difficulty">
<span id="el$rowindex$_view_et_Difficulty" class="form-group view_et_Difficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et->Difficulty->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_et_list->RowIndex ?>_Difficulty" name="x<?php echo $view_et_list->RowIndex ?>_Difficulty"<?php echo $view_et->Difficulty->editAttributes() ?>>
		<?php echo $view_et->Difficulty->selectOptionListHtml("x<?php echo $view_et_list->RowIndex ?>_Difficulty") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Difficulty" name="o<?php echo $view_et_list->RowIndex ?>_Difficulty" id="o<?php echo $view_et_list->RowIndex ?>_Difficulty" value="<?php echo HtmlEncode($view_et->Difficulty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Easy->Visible) { // Easy ?>
		<td data-name="Easy">
<span id="el$rowindex$_view_et_Easy" class="form-group view_et_Easy">
<div id="tp_x<?php echo $view_et_list->RowIndex ?>_Easy" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et->Easy->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_et_list->RowIndex ?>_Easy[]" id="x<?php echo $view_et_list->RowIndex ?>_Easy[]" value="{value}"<?php echo $view_et->Easy->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_et_list->RowIndex ?>_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et->Easy->checkBoxListHtml(FALSE, "x{$view_et_list->RowIndex}_Easy[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_et" data-field="x_Easy" name="o<?php echo $view_et_list->RowIndex ?>_Easy[]" id="o<?php echo $view_et_list->RowIndex ?>_Easy[]" value="<?php echo HtmlEncode($view_et->Easy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Comments->Visible) { // Comments ?>
		<td data-name="Comments">
<span id="el$rowindex$_view_et_Comments" class="form-group view_et_Comments">
<input type="text" data-table="view_et" data-field="x_Comments" name="x<?php echo $view_et_list->RowIndex ?>_Comments" id="x<?php echo $view_et_list->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et->Comments->EditValue ?>"<?php echo $view_et->Comments->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Comments" name="o<?php echo $view_et_list->RowIndex ?>_Comments" id="o<?php echo $view_et_list->RowIndex ?>_Comments" value="<?php echo HtmlEncode($view_et->Comments->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_view_et_Doctor" class="form-group view_et_Doctor">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x<?php echo $view_et_list->RowIndex ?>_Doctor" id="x<?php echo $view_et_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et->Doctor->EditValue ?>"<?php echo $view_et->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Doctor" name="o<?php echo $view_et_list->RowIndex ?>_Doctor" id="o<?php echo $view_et_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_et->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_et->Embryologist->Visible) { // Embryologist ?>
		<td data-name="Embryologist">
<span id="el$rowindex$_view_et_Embryologist" class="form-group view_et_Embryologist">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x<?php echo $view_et_list->RowIndex ?>_Embryologist" id="x<?php echo $view_et_list->RowIndex ?>_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et->Embryologist->EditValue ?>"<?php echo $view_et->Embryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_et" data-field="x_Embryologist" name="o<?php echo $view_et_list->RowIndex ?>_Embryologist" id="o<?php echo $view_et_list->RowIndex ?>_Embryologist" value="<?php echo HtmlEncode($view_et->Embryologist->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_et_list->ListOptions->render("body", "right", $view_et_list->RowIndex);
?>
<script>
fview_etlist.updateLists(<?php echo $view_et_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_et->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_et_list->FormKeyCountName ?>" id="<?php echo $view_et_list->FormKeyCountName ?>" value="<?php echo $view_et_list->KeyCount ?>">
<?php } ?>
<?php if ($view_et->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_et_list->FormKeyCountName ?>" id="<?php echo $view_et_list->FormKeyCountName ?>" value="<?php echo $view_et_list->KeyCount ?>">
<?php echo $view_et_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_et->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_et_list->Recordset)
	$view_et_list->Recordset->Close();
?>
<?php if (!$view_et->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_et->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_et_list->Pager)) $view_et_list->Pager = new NumericPager($view_et_list->StartRec, $view_et_list->DisplayRecs, $view_et_list->TotalRecs, $view_et_list->RecRange, $view_et_list->AutoHidePager) ?>
<?php if ($view_et_list->Pager->RecordCount > 0 && $view_et_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_et_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_et_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_et_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_et_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_et_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_et_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_et_list->pageUrl() ?>start=<?php echo $view_et_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_et_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_et_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_et_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_et_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_et_list->TotalRecs > 0 && (!$view_et_list->AutoHidePageSizeSelector || $view_et_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_et">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_et_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_et_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_et_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_et_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_et_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_et_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_et->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_et_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_et_list->TotalRecs == 0 && !$view_et->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_et_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_et_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_et->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_et->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_et", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_et_list->terminate();
?>