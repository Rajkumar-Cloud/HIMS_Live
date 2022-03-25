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
$view_activity_card_list = new view_activity_card_list();

// Run the page
$view_activity_card_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_activity_card_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_activity_card->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_activity_cardlist = currentForm = new ew.Form("fview_activity_cardlist", "list");
fview_activity_cardlist.formKeyCountName = '<?php echo $view_activity_card_list->FormKeyCountName ?>';

// Validate form
fview_activity_cardlist.validate = function() {
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
		<?php if ($view_activity_card_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card->id->caption(), $view_activity_card->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_activity_card_list->Activity->Required) { ?>
			elm = this.getElements("x" + infix + "_Activity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card->Activity->caption(), $view_activity_card->Activity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_activity_card_list->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card->Type->caption(), $view_activity_card->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_activity_card_list->Selected->Required) { ?>
			elm = this.getElements("x" + infix + "_Selected[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card->Selected->caption(), $view_activity_card->Selected->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_activity_card_list->Units->Required) { ?>
			elm = this.getElements("x" + infix + "_Units");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card->Units->caption(), $view_activity_card->Units->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_activity_card_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_activity_card->Amount->caption(), $view_activity_card->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_activity_card->Amount->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_activity_cardlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_activity_cardlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_activity_cardlist.lists["x_Type"] = <?php echo $view_activity_card_list->Type->Lookup->toClientList() ?>;
fview_activity_cardlist.lists["x_Type"].options = <?php echo JsonEncode($view_activity_card_list->Type->options(FALSE, TRUE)) ?>;
fview_activity_cardlist.lists["x_Selected[]"] = <?php echo $view_activity_card_list->Selected->Lookup->toClientList() ?>;
fview_activity_cardlist.lists["x_Selected[]"].options = <?php echo JsonEncode($view_activity_card_list->Selected->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_activity_cardlistsrch = currentSearchForm = new ew.Form("fview_activity_cardlistsrch");

// Validate function for search
fview_activity_cardlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_activity_cardlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_activity_cardlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_activity_cardlistsrch.lists["x_Type"] = <?php echo $view_activity_card_list->Type->Lookup->toClientList() ?>;
fview_activity_cardlistsrch.lists["x_Type"].options = <?php echo JsonEncode($view_activity_card_list->Type->options(FALSE, TRUE)) ?>;

// Filters
fview_activity_cardlistsrch.filterList = <?php echo $view_activity_card_list->getFilterList() ?>;
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
<?php if (!$view_activity_card->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_activity_card_list->TotalRecs > 0 && $view_activity_card_list->ExportOptions->visible()) { ?>
<?php $view_activity_card_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_activity_card_list->ImportOptions->visible()) { ?>
<?php $view_activity_card_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_activity_card_list->SearchOptions->visible()) { ?>
<?php $view_activity_card_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_activity_card_list->FilterOptions->visible()) { ?>
<?php $view_activity_card_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_activity_card_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_activity_card->isExport() && !$view_activity_card->CurrentAction) { ?>
<form name="fview_activity_cardlistsrch" id="fview_activity_cardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_activity_card_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_activity_cardlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_activity_card">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_activity_card_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_activity_card->RowType = ROWTYPE_SEARCH;

// Render row
$view_activity_card->resetAttributes();
$view_activity_card_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_activity_card->Type->Visible) { // Type ?>
	<div id="xsc_Type" class="ew-cell form-group">
		<label for="x_Type" class="ew-search-caption ew-label"><?php echo $view_activity_card->Type->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Type" id="z_Type" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $view_activity_card->Type->editAttributes() ?>>
		<?php echo $view_activity_card->Type->selectOptionListHtml("x_Type") ?>
	</select>
</div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_activity_card_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_activity_card_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_activity_card_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_activity_card_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_activity_card_list->showPageHeader(); ?>
<?php
$view_activity_card_list->showMessage();
?>
<?php if ($view_activity_card_list->TotalRecs > 0 || $view_activity_card->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_activity_card_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_activity_card">
<?php if (!$view_activity_card->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_activity_card->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_activity_card_list->Pager)) $view_activity_card_list->Pager = new NumericPager($view_activity_card_list->StartRec, $view_activity_card_list->DisplayRecs, $view_activity_card_list->TotalRecs, $view_activity_card_list->RecRange, $view_activity_card_list->AutoHidePager) ?>
<?php if ($view_activity_card_list->Pager->RecordCount > 0 && $view_activity_card_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_activity_card_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_activity_card_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_activity_card_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_activity_card_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_activity_card_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_activity_card_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_activity_card_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_activity_card_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_activity_card_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_activity_card_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_activity_card_list->TotalRecs > 0 && (!$view_activity_card_list->AutoHidePageSizeSelector || $view_activity_card_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_activity_card">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_activity_card_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_activity_card_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_activity_card_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_activity_card_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_activity_card_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_activity_card_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_activity_card->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_activity_cardlist" id="fview_activity_cardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_activity_card_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_activity_card_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_activity_card">
<div id="gmp_view_activity_card" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_activity_card_list->TotalRecs > 0 || $view_activity_card->isGridEdit()) { ?>
<table id="tbl_view_activity_cardlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_activity_card_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_activity_card_list->renderListOptions();

// Render list options (header, left)
$view_activity_card_list->ListOptions->render("header", "left");
?>
<?php if ($view_activity_card->id->Visible) { // id ?>
	<?php if ($view_activity_card->sortUrl($view_activity_card->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_activity_card->id->headerCellClass() ?>"><div id="elh_view_activity_card_id" class="view_activity_card_id"><div class="ew-table-header-caption"><?php echo $view_activity_card->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_activity_card->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_activity_card->SortUrl($view_activity_card->id) ?>',1);"><div id="elh_view_activity_card_id" class="view_activity_card_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_activity_card->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card->Activity->Visible) { // Activity ?>
	<?php if ($view_activity_card->sortUrl($view_activity_card->Activity) == "") { ?>
		<th data-name="Activity" class="<?php echo $view_activity_card->Activity->headerCellClass() ?>"><div id="elh_view_activity_card_Activity" class="view_activity_card_Activity"><div class="ew-table-header-caption"><?php echo $view_activity_card->Activity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Activity" class="<?php echo $view_activity_card->Activity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_activity_card->SortUrl($view_activity_card->Activity) ?>',1);"><div id="elh_view_activity_card_Activity" class="view_activity_card_Activity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card->Activity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card->Activity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_activity_card->Activity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card->Type->Visible) { // Type ?>
	<?php if ($view_activity_card->sortUrl($view_activity_card->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $view_activity_card->Type->headerCellClass() ?>"><div id="elh_view_activity_card_Type" class="view_activity_card_Type"><div class="ew-table-header-caption"><?php echo $view_activity_card->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $view_activity_card->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_activity_card->SortUrl($view_activity_card->Type) ?>',1);"><div id="elh_view_activity_card_Type" class="view_activity_card_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_activity_card->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card->Selected->Visible) { // Selected ?>
	<?php if ($view_activity_card->sortUrl($view_activity_card->Selected) == "") { ?>
		<th data-name="Selected" class="<?php echo $view_activity_card->Selected->headerCellClass() ?>"><div id="elh_view_activity_card_Selected" class="view_activity_card_Selected"><div class="ew-table-header-caption"><?php echo $view_activity_card->Selected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Selected" class="<?php echo $view_activity_card->Selected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_activity_card->SortUrl($view_activity_card->Selected) ?>',1);"><div id="elh_view_activity_card_Selected" class="view_activity_card_Selected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card->Selected->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card->Selected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_activity_card->Selected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card->Units->Visible) { // Units ?>
	<?php if ($view_activity_card->sortUrl($view_activity_card->Units) == "") { ?>
		<th data-name="Units" class="<?php echo $view_activity_card->Units->headerCellClass() ?>"><div id="elh_view_activity_card_Units" class="view_activity_card_Units"><div class="ew-table-header-caption"><?php echo $view_activity_card->Units->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Units" class="<?php echo $view_activity_card->Units->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_activity_card->SortUrl($view_activity_card->Units) ?>',1);"><div id="elh_view_activity_card_Units" class="view_activity_card_Units">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card->Units->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card->Units->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_activity_card->Units->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_activity_card->Amount->Visible) { // Amount ?>
	<?php if ($view_activity_card->sortUrl($view_activity_card->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_activity_card->Amount->headerCellClass() ?>"><div id="elh_view_activity_card_Amount" class="view_activity_card_Amount"><div class="ew-table-header-caption"><?php echo $view_activity_card->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_activity_card->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_activity_card->SortUrl($view_activity_card->Amount) ?>',1);"><div id="elh_view_activity_card_Amount" class="view_activity_card_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_activity_card->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_activity_card->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_activity_card->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_activity_card_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_activity_card->ExportAll && $view_activity_card->isExport()) {
	$view_activity_card_list->StopRec = $view_activity_card_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_activity_card_list->TotalRecs > $view_activity_card_list->StartRec + $view_activity_card_list->DisplayRecs - 1)
		$view_activity_card_list->StopRec = $view_activity_card_list->StartRec + $view_activity_card_list->DisplayRecs - 1;
	else
		$view_activity_card_list->StopRec = $view_activity_card_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_activity_card_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_activity_card_list->FormKeyCountName) && ($view_activity_card->isGridAdd() || $view_activity_card->isGridEdit() || $view_activity_card->isConfirm())) {
		$view_activity_card_list->KeyCount = $CurrentForm->getValue($view_activity_card_list->FormKeyCountName);
		$view_activity_card_list->StopRec = $view_activity_card_list->StartRec + $view_activity_card_list->KeyCount - 1;
	}
}
$view_activity_card_list->RecCnt = $view_activity_card_list->StartRec - 1;
if ($view_activity_card_list->Recordset && !$view_activity_card_list->Recordset->EOF) {
	$view_activity_card_list->Recordset->moveFirst();
	$selectLimit = $view_activity_card_list->UseSelectLimit;
	if (!$selectLimit && $view_activity_card_list->StartRec > 1)
		$view_activity_card_list->Recordset->move($view_activity_card_list->StartRec - 1);
} elseif (!$view_activity_card->AllowAddDeleteRow && $view_activity_card_list->StopRec == 0) {
	$view_activity_card_list->StopRec = $view_activity_card->GridAddRowCount;
}

// Initialize aggregate
$view_activity_card->RowType = ROWTYPE_AGGREGATEINIT;
$view_activity_card->resetAttributes();
$view_activity_card_list->renderRow();
$view_activity_card_list->EditRowCnt = 0;
if ($view_activity_card->isEdit())
	$view_activity_card_list->RowIndex = 1;
if ($view_activity_card->isGridEdit())
	$view_activity_card_list->RowIndex = 0;
while ($view_activity_card_list->RecCnt < $view_activity_card_list->StopRec) {
	$view_activity_card_list->RecCnt++;
	if ($view_activity_card_list->RecCnt >= $view_activity_card_list->StartRec) {
		$view_activity_card_list->RowCnt++;
		if ($view_activity_card->isGridAdd() || $view_activity_card->isGridEdit() || $view_activity_card->isConfirm()) {
			$view_activity_card_list->RowIndex++;
			$CurrentForm->Index = $view_activity_card_list->RowIndex;
			if ($CurrentForm->hasValue($view_activity_card_list->FormActionName) && $view_activity_card_list->EventCancelled)
				$view_activity_card_list->RowAction = strval($CurrentForm->getValue($view_activity_card_list->FormActionName));
			elseif ($view_activity_card->isGridAdd())
				$view_activity_card_list->RowAction = "insert";
			else
				$view_activity_card_list->RowAction = "";
		}

		// Set up key count
		$view_activity_card_list->KeyCount = $view_activity_card_list->RowIndex;

		// Init row class and style
		$view_activity_card->resetAttributes();
		$view_activity_card->CssClass = "";
		if ($view_activity_card->isGridAdd()) {
			$view_activity_card_list->loadRowValues(); // Load default values
		} else {
			$view_activity_card_list->loadRowValues($view_activity_card_list->Recordset); // Load row values
		}
		$view_activity_card->RowType = ROWTYPE_VIEW; // Render view
		if ($view_activity_card->isEdit()) {
			if ($view_activity_card_list->checkInlineEditKey() && $view_activity_card_list->EditRowCnt == 0) { // Inline edit
				$view_activity_card->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_activity_card->isGridEdit()) { // Grid edit
			if ($view_activity_card->EventCancelled)
				$view_activity_card_list->restoreCurrentRowFormValues($view_activity_card_list->RowIndex); // Restore form values
			if ($view_activity_card_list->RowAction == "insert")
				$view_activity_card->RowType = ROWTYPE_ADD; // Render add
			else
				$view_activity_card->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_activity_card->isEdit() && $view_activity_card->RowType == ROWTYPE_EDIT && $view_activity_card->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_activity_card_list->restoreFormValues(); // Restore form values
		}
		if ($view_activity_card->isGridEdit() && ($view_activity_card->RowType == ROWTYPE_EDIT || $view_activity_card->RowType == ROWTYPE_ADD) && $view_activity_card->EventCancelled) // Update failed
			$view_activity_card_list->restoreCurrentRowFormValues($view_activity_card_list->RowIndex); // Restore form values
		if ($view_activity_card->RowType == ROWTYPE_EDIT) // Edit row
			$view_activity_card_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_activity_card->RowAttrs = array_merge($view_activity_card->RowAttrs, array('data-rowindex'=>$view_activity_card_list->RowCnt, 'id'=>'r' . $view_activity_card_list->RowCnt . '_view_activity_card', 'data-rowtype'=>$view_activity_card->RowType));

		// Render row
		$view_activity_card_list->renderRow();

		// Render list options
		$view_activity_card_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_activity_card_list->RowAction <> "delete" && $view_activity_card_list->RowAction <> "insertdelete" && !($view_activity_card_list->RowAction == "insert" && $view_activity_card->isConfirm() && $view_activity_card_list->emptyRow())) {
?>
	<tr<?php echo $view_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_activity_card_list->ListOptions->render("body", "left", $view_activity_card_list->RowCnt);
?>
	<?php if ($view_activity_card->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_activity_card->id->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_activity_card" data-field="x_id" name="o<?php echo $view_activity_card_list->RowIndex ?>_id" id="o<?php echo $view_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_activity_card->id->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_id" class="form-group view_activity_card_id">
<span<?php echo $view_activity_card->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_activity_card->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_id" name="x<?php echo $view_activity_card_list->RowIndex ?>_id" id="x<?php echo $view_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_activity_card->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_id" class="view_activity_card_id">
<span<?php echo $view_activity_card->id->viewAttributes() ?>>
<?php echo $view_activity_card->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card->Activity->Visible) { // Activity ?>
		<td data-name="Activity"<?php echo $view_activity_card->Activity->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Activity" class="form-group view_activity_card_Activity">
<input type="text" data-table="view_activity_card" data-field="x_Activity" name="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Activity->EditValue ?>"<?php echo $view_activity_card->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Activity" name="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($view_activity_card->Activity->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Activity" class="form-group view_activity_card_Activity">
<input type="text" data-table="view_activity_card" data-field="x_Activity" name="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Activity->EditValue ?>"<?php echo $view_activity_card->Activity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Activity" class="view_activity_card_Activity">
<span<?php echo $view_activity_card->Activity->viewAttributes() ?>>
<?php echo $view_activity_card->Activity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $view_activity_card->Type->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Type" class="form-group view_activity_card_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_activity_card_list->RowIndex ?>_Type" name="x<?php echo $view_activity_card_list->RowIndex ?>_Type"<?php echo $view_activity_card->Type->editAttributes() ?>>
		<?php echo $view_activity_card->Type->selectOptionListHtml("x<?php echo $view_activity_card_list->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Type" name="o<?php echo $view_activity_card_list->RowIndex ?>_Type" id="o<?php echo $view_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($view_activity_card->Type->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Type" class="form-group view_activity_card_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_activity_card_list->RowIndex ?>_Type" name="x<?php echo $view_activity_card_list->RowIndex ?>_Type"<?php echo $view_activity_card->Type->editAttributes() ?>>
		<?php echo $view_activity_card->Type->selectOptionListHtml("x<?php echo $view_activity_card_list->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Type" class="view_activity_card_Type">
<span<?php echo $view_activity_card->Type->viewAttributes() ?>>
<?php echo $view_activity_card->Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card->Selected->Visible) { // Selected ?>
		<td data-name="Selected"<?php echo $view_activity_card->Selected->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Selected" class="form-group view_activity_card_Selected">
<div id="tp_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_activity_card" data-field="x_Selected" data-value-separator="<?php echo $view_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $view_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_activity_card->Selected->checkBoxListHtml(FALSE, "x{$view_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Selected" name="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($view_activity_card->Selected->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Selected" class="form-group view_activity_card_Selected">
<div id="tp_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_activity_card" data-field="x_Selected" data-value-separator="<?php echo $view_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $view_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_activity_card->Selected->checkBoxListHtml(FALSE, "x{$view_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Selected" class="view_activity_card_Selected">
<span<?php echo $view_activity_card->Selected->viewAttributes() ?>>
<?php echo $view_activity_card->Selected->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card->Units->Visible) { // Units ?>
		<td data-name="Units"<?php echo $view_activity_card->Units->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Units" class="form-group view_activity_card_Units">
<input type="text" data-table="view_activity_card" data-field="x_Units" name="x<?php echo $view_activity_card_list->RowIndex ?>_Units" id="x<?php echo $view_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Units->EditValue ?>"<?php echo $view_activity_card->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Units" name="o<?php echo $view_activity_card_list->RowIndex ?>_Units" id="o<?php echo $view_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($view_activity_card->Units->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Units" class="form-group view_activity_card_Units">
<input type="text" data-table="view_activity_card" data-field="x_Units" name="x<?php echo $view_activity_card_list->RowIndex ?>_Units" id="x<?php echo $view_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Units->EditValue ?>"<?php echo $view_activity_card->Units->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Units" class="view_activity_card_Units">
<span<?php echo $view_activity_card->Units->viewAttributes() ?>>
<?php echo $view_activity_card->Units->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_activity_card->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_activity_card->Amount->cellAttributes() ?>>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Amount" class="form-group view_activity_card_Amount">
<input type="text" data-table="view_activity_card" data-field="x_Amount" name="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Amount->EditValue ?>"<?php echo $view_activity_card->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Amount" name="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_activity_card->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Amount" class="form-group view_activity_card_Amount">
<input type="text" data-table="view_activity_card" data-field="x_Amount" name="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Amount->EditValue ?>"<?php echo $view_activity_card->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_activity_card_list->RowCnt ?>_view_activity_card_Amount" class="view_activity_card_Amount">
<span<?php echo $view_activity_card->Amount->viewAttributes() ?>>
<?php echo $view_activity_card->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_activity_card_list->ListOptions->render("body", "right", $view_activity_card_list->RowCnt);
?>
	</tr>
<?php if ($view_activity_card->RowType == ROWTYPE_ADD || $view_activity_card->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_activity_cardlist.updateLists(<?php echo $view_activity_card_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_activity_card->isGridAdd())
		if (!$view_activity_card_list->Recordset->EOF)
			$view_activity_card_list->Recordset->moveNext();
}
?>
<?php
	if ($view_activity_card->isGridAdd() || $view_activity_card->isGridEdit()) {
		$view_activity_card_list->RowIndex = '$rowindex$';
		$view_activity_card_list->loadRowValues();

		// Set row properties
		$view_activity_card->resetAttributes();
		$view_activity_card->RowAttrs = array_merge($view_activity_card->RowAttrs, array('data-rowindex'=>$view_activity_card_list->RowIndex, 'id'=>'r0_view_activity_card', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_activity_card->RowAttrs["class"], "ew-template");
		$view_activity_card->RowType = ROWTYPE_ADD;

		// Render row
		$view_activity_card_list->renderRow();

		// Render list options
		$view_activity_card_list->renderListOptions();
		$view_activity_card_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_activity_card_list->ListOptions->render("body", "left", $view_activity_card_list->RowIndex);
?>
	<?php if ($view_activity_card->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_activity_card" data-field="x_id" name="o<?php echo $view_activity_card_list->RowIndex ?>_id" id="o<?php echo $view_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_activity_card->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card->Activity->Visible) { // Activity ?>
		<td data-name="Activity">
<span id="el$rowindex$_view_activity_card_Activity" class="form-group view_activity_card_Activity">
<input type="text" data-table="view_activity_card" data-field="x_Activity" name="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $view_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Activity->EditValue ?>"<?php echo $view_activity_card->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Activity" name="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $view_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($view_activity_card->Activity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card->Type->Visible) { // Type ?>
		<td data-name="Type">
<span id="el$rowindex$_view_activity_card_Type" class="form-group view_activity_card_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_activity_card" data-field="x_Type" data-value-separator="<?php echo $view_activity_card->Type->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_activity_card_list->RowIndex ?>_Type" name="x<?php echo $view_activity_card_list->RowIndex ?>_Type"<?php echo $view_activity_card->Type->editAttributes() ?>>
		<?php echo $view_activity_card->Type->selectOptionListHtml("x<?php echo $view_activity_card_list->RowIndex ?>_Type") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Type" name="o<?php echo $view_activity_card_list->RowIndex ?>_Type" id="o<?php echo $view_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($view_activity_card->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card->Selected->Visible) { // Selected ?>
		<td data-name="Selected">
<span id="el$rowindex$_view_activity_card_Selected" class="form-group view_activity_card_Selected">
<div id="tp_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_activity_card" data-field="x_Selected" data-value-separator="<?php echo $view_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $view_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_activity_card->Selected->checkBoxListHtml(FALSE, "x{$view_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Selected" name="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $view_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($view_activity_card->Selected->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card->Units->Visible) { // Units ?>
		<td data-name="Units">
<span id="el$rowindex$_view_activity_card_Units" class="form-group view_activity_card_Units">
<input type="text" data-table="view_activity_card" data-field="x_Units" name="x<?php echo $view_activity_card_list->RowIndex ?>_Units" id="x<?php echo $view_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Units->EditValue ?>"<?php echo $view_activity_card->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Units" name="o<?php echo $view_activity_card_list->RowIndex ?>_Units" id="o<?php echo $view_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($view_activity_card->Units->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_activity_card->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_view_activity_card_Amount" class="form-group view_activity_card_Amount">
<input type="text" data-table="view_activity_card" data-field="x_Amount" name="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $view_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $view_activity_card->Amount->EditValue ?>"<?php echo $view_activity_card->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_activity_card" data-field="x_Amount" name="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $view_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_activity_card->Amount->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_activity_card_list->ListOptions->render("body", "right", $view_activity_card_list->RowIndex);
?>
<script>
fview_activity_cardlist.updateLists(<?php echo $view_activity_card_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_activity_card->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_activity_card_list->FormKeyCountName ?>" id="<?php echo $view_activity_card_list->FormKeyCountName ?>" value="<?php echo $view_activity_card_list->KeyCount ?>">
<?php } ?>
<?php if ($view_activity_card->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_activity_card_list->FormKeyCountName ?>" id="<?php echo $view_activity_card_list->FormKeyCountName ?>" value="<?php echo $view_activity_card_list->KeyCount ?>">
<?php echo $view_activity_card_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_activity_card->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_activity_card_list->Recordset)
	$view_activity_card_list->Recordset->Close();
?>
<?php if (!$view_activity_card->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_activity_card->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_activity_card_list->Pager)) $view_activity_card_list->Pager = new NumericPager($view_activity_card_list->StartRec, $view_activity_card_list->DisplayRecs, $view_activity_card_list->TotalRecs, $view_activity_card_list->RecRange, $view_activity_card_list->AutoHidePager) ?>
<?php if ($view_activity_card_list->Pager->RecordCount > 0 && $view_activity_card_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_activity_card_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_activity_card_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_activity_card_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_activity_card_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_activity_card_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_activity_card_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_activity_card_list->pageUrl() ?>start=<?php echo $view_activity_card_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_activity_card_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_activity_card_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_activity_card_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_activity_card_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_activity_card_list->TotalRecs > 0 && (!$view_activity_card_list->AutoHidePageSizeSelector || $view_activity_card_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_activity_card">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_activity_card_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_activity_card_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_activity_card_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_activity_card_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_activity_card_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_activity_card_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_activity_card->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_activity_card_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_activity_card_list->TotalRecs == 0 && !$view_activity_card->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_activity_card_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_activity_card->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_activity_card->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_activity_card", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_activity_card_list->terminate();
?>