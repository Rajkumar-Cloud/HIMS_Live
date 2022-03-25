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
$mas_activity_card_list = new mas_activity_card_list();

// Run the page
$mas_activity_card_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_activity_card->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_activity_cardlist = currentForm = new ew.Form("fmas_activity_cardlist", "list");
fmas_activity_cardlist.formKeyCountName = '<?php echo $mas_activity_card_list->FormKeyCountName ?>';

// Validate form
fmas_activity_cardlist.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($mas_activity_card_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card->id->caption(), $mas_activity_card->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_activity_card_list->Activity->Required) { ?>
			elm = this.getElements("x" + infix + "_Activity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card->Activity->caption(), $mas_activity_card->Activity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_activity_card_list->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card->Type->caption(), $mas_activity_card->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_activity_card_list->Units->Required) { ?>
			elm = this.getElements("x" + infix + "_Units");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card->Units->caption(), $mas_activity_card->Units->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_activity_card_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card->Amount->caption(), $mas_activity_card->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_activity_card->Amount->errorMessage()) ?>");
		<?php if ($mas_activity_card_list->Selected->Required) { ?>
			elm = this.getElements("x" + infix + "_Selected[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_activity_card->Selected->caption(), $mas_activity_card->Selected->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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
fmas_activity_cardlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Activity", false)) return false;
	if (ew.valueChanged(fobj, infix, "Type", false)) return false;
	if (ew.valueChanged(fobj, infix, "Units", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "Selected[]", false)) return false;
	return true;
}

// Form_CustomValidate event
fmas_activity_cardlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_activity_cardlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_activity_cardlist.lists["x_Selected[]"] = <?php echo $mas_activity_card_list->Selected->Lookup->toClientList() ?>;
fmas_activity_cardlist.lists["x_Selected[]"].options = <?php echo JsonEncode($mas_activity_card_list->Selected->options(FALSE, TRUE)) ?>;

// Form object for search
var fmas_activity_cardlistsrch = currentSearchForm = new ew.Form("fmas_activity_cardlistsrch");

// Filters
fmas_activity_cardlistsrch.filterList = <?php echo $mas_activity_card_list->getFilterList() ?>;
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
<?php if (!$mas_activity_card->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_activity_card_list->TotalRecs > 0 && $mas_activity_card_list->ExportOptions->visible()) { ?>
<?php $mas_activity_card_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_activity_card_list->ImportOptions->visible()) { ?>
<?php $mas_activity_card_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_activity_card_list->SearchOptions->visible()) { ?>
<?php $mas_activity_card_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_activity_card_list->FilterOptions->visible()) { ?>
<?php $mas_activity_card_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_activity_card_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_activity_card->isExport() && !$mas_activity_card->CurrentAction) { ?>
<form name="fmas_activity_cardlistsrch" id="fmas_activity_cardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_activity_card_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_activity_cardlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_activity_card">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_activity_card_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_activity_card_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_activity_card_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_activity_card_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_activity_card_list->showPageHeader(); ?>
<?php
$mas_activity_card_list->showMessage();
?>
<?php if ($mas_activity_card_list->TotalRecs > 0 || $mas_activity_card->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_activity_card_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_activity_card">
<?php if (!$mas_activity_card->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_activity_card->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_activity_card_list->Pager)) $mas_activity_card_list->Pager = new NumericPager($mas_activity_card_list->StartRec, $mas_activity_card_list->DisplayRecs, $mas_activity_card_list->TotalRecs, $mas_activity_card_list->RecRange, $mas_activity_card_list->AutoHidePager) ?>
<?php if ($mas_activity_card_list->Pager->RecordCount > 0 && $mas_activity_card_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_activity_card_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_activity_card_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_activity_card_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_activity_card_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_activity_card_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_activity_card_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_activity_card_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_activity_card_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_activity_card_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_activity_card_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_activity_card_list->TotalRecs > 0 && (!$mas_activity_card_list->AutoHidePageSizeSelector || $mas_activity_card_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_activity_card">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_activity_card_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_activity_card_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_activity_card_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_activity_card_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_activity_card_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_activity_card_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_activity_card->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_activity_cardlist" id="fmas_activity_cardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_activity_card_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_activity_card_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<div id="gmp_mas_activity_card" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_activity_card_list->TotalRecs > 0 || $mas_activity_card->isAdd() || $mas_activity_card->isCopy() || $mas_activity_card->isGridEdit()) { ?>
<table id="tbl_mas_activity_cardlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_activity_card_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_activity_card_list->renderListOptions();

// Render list options (header, left)
$mas_activity_card_list->ListOptions->render("header", "left");
?>
<?php if ($mas_activity_card->id->Visible) { // id ?>
	<?php if ($mas_activity_card->sortUrl($mas_activity_card->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_activity_card->id->headerCellClass() ?>"><div id="elh_mas_activity_card_id" class="mas_activity_card_id"><div class="ew-table-header-caption"><?php echo $mas_activity_card->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_activity_card->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_activity_card->SortUrl($mas_activity_card->id) ?>',1);"><div id="elh_mas_activity_card_id" class="mas_activity_card_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_activity_card->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
	<?php if ($mas_activity_card->sortUrl($mas_activity_card->Activity) == "") { ?>
		<th data-name="Activity" class="<?php echo $mas_activity_card->Activity->headerCellClass() ?>"><div id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity"><div class="ew-table-header-caption"><?php echo $mas_activity_card->Activity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Activity" class="<?php echo $mas_activity_card->Activity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_activity_card->SortUrl($mas_activity_card->Activity) ?>',1);"><div id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card->Activity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card->Activity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_activity_card->Activity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card->Type->Visible) { // Type ?>
	<?php if ($mas_activity_card->sortUrl($mas_activity_card->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $mas_activity_card->Type->headerCellClass() ?>"><div id="elh_mas_activity_card_Type" class="mas_activity_card_Type"><div class="ew-table-header-caption"><?php echo $mas_activity_card->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $mas_activity_card->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_activity_card->SortUrl($mas_activity_card->Type) ?>',1);"><div id="elh_mas_activity_card_Type" class="mas_activity_card_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card->Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_activity_card->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card->Units->Visible) { // Units ?>
	<?php if ($mas_activity_card->sortUrl($mas_activity_card->Units) == "") { ?>
		<th data-name="Units" class="<?php echo $mas_activity_card->Units->headerCellClass() ?>"><div id="elh_mas_activity_card_Units" class="mas_activity_card_Units"><div class="ew-table-header-caption"><?php echo $mas_activity_card->Units->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Units" class="<?php echo $mas_activity_card->Units->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_activity_card->SortUrl($mas_activity_card->Units) ?>',1);"><div id="elh_mas_activity_card_Units" class="mas_activity_card_Units">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card->Units->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card->Units->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_activity_card->Units->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
	<?php if ($mas_activity_card->sortUrl($mas_activity_card->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $mas_activity_card->Amount->headerCellClass() ?>"><div id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount"><div class="ew-table-header-caption"><?php echo $mas_activity_card->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $mas_activity_card->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_activity_card->SortUrl($mas_activity_card->Amount) ?>',1);"><div id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_activity_card->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
	<?php if ($mas_activity_card->sortUrl($mas_activity_card->Selected) == "") { ?>
		<th data-name="Selected" class="<?php echo $mas_activity_card->Selected->headerCellClass() ?>"><div id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected"><div class="ew-table-header-caption"><?php echo $mas_activity_card->Selected->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Selected" class="<?php echo $mas_activity_card->Selected->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_activity_card->SortUrl($mas_activity_card->Selected) ?>',1);"><div id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_activity_card->Selected->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_activity_card->Selected->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_activity_card->Selected->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_activity_card_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($mas_activity_card->isAdd() || $mas_activity_card->isCopy()) {
		$mas_activity_card_list->RowIndex = 0;
		$mas_activity_card_list->KeyCount = $mas_activity_card_list->RowIndex;
		if ($mas_activity_card->isCopy() && !$mas_activity_card_list->loadRow())
			$mas_activity_card->CurrentAction = "add";
		if ($mas_activity_card->isAdd())
			$mas_activity_card_list->loadRowValues();
		if ($mas_activity_card->EventCancelled) // Insert failed
			$mas_activity_card_list->restoreFormValues(); // Restore form values

		// Set row properties
		$mas_activity_card->resetAttributes();
		$mas_activity_card->RowAttrs = array_merge($mas_activity_card->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_mas_activity_card', 'data-rowtype'=>ROWTYPE_ADD));
		$mas_activity_card->RowType = ROWTYPE_ADD;

		// Render row
		$mas_activity_card_list->renderRow();

		// Render list options
		$mas_activity_card_list->renderListOptions();
		$mas_activity_card_list->StartRowCnt = 0;
?>
	<tr<?php echo $mas_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_activity_card_list->ListOptions->render("body", "left", $mas_activity_card_list->RowCnt);
?>
	<?php if ($mas_activity_card->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="o<?php echo $mas_activity_card_list->RowIndex ?>_id" id="o<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
		<td data-name="Activity">
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Activity" class="form-group mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Activity->EditValue ?>"<?php echo $mas_activity_card->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Activity" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($mas_activity_card->Activity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Type->Visible) { // Type ?>
		<td data-name="Type">
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Type" class="form-group mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Type->EditValue ?>"<?php echo $mas_activity_card->Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Type" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($mas_activity_card->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Units->Visible) { // Units ?>
		<td data-name="Units">
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Units" class="form-group mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Units->EditValue ?>"<?php echo $mas_activity_card->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Units" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($mas_activity_card->Units->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Amount" class="form-group mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Amount->EditValue ?>"<?php echo $mas_activity_card->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Amount" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($mas_activity_card->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
		<td data-name="Selected">
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Selected" class="form-group mas_activity_card_Selected">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Selected" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($mas_activity_card->Selected->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_activity_card_list->ListOptions->render("body", "right", $mas_activity_card_list->RowCnt);
?>
<script>
fmas_activity_cardlist.updateLists(<?php echo $mas_activity_card_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($mas_activity_card->ExportAll && $mas_activity_card->isExport()) {
	$mas_activity_card_list->StopRec = $mas_activity_card_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_activity_card_list->TotalRecs > $mas_activity_card_list->StartRec + $mas_activity_card_list->DisplayRecs - 1)
		$mas_activity_card_list->StopRec = $mas_activity_card_list->StartRec + $mas_activity_card_list->DisplayRecs - 1;
	else
		$mas_activity_card_list->StopRec = $mas_activity_card_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $mas_activity_card_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($mas_activity_card_list->FormKeyCountName) && ($mas_activity_card->isGridAdd() || $mas_activity_card->isGridEdit() || $mas_activity_card->isConfirm())) {
		$mas_activity_card_list->KeyCount = $CurrentForm->getValue($mas_activity_card_list->FormKeyCountName);
		$mas_activity_card_list->StopRec = $mas_activity_card_list->StartRec + $mas_activity_card_list->KeyCount - 1;
	}
}
$mas_activity_card_list->RecCnt = $mas_activity_card_list->StartRec - 1;
if ($mas_activity_card_list->Recordset && !$mas_activity_card_list->Recordset->EOF) {
	$mas_activity_card_list->Recordset->moveFirst();
	$selectLimit = $mas_activity_card_list->UseSelectLimit;
	if (!$selectLimit && $mas_activity_card_list->StartRec > 1)
		$mas_activity_card_list->Recordset->move($mas_activity_card_list->StartRec - 1);
} elseif (!$mas_activity_card->AllowAddDeleteRow && $mas_activity_card_list->StopRec == 0) {
	$mas_activity_card_list->StopRec = $mas_activity_card->GridAddRowCount;
}

// Initialize aggregate
$mas_activity_card->RowType = ROWTYPE_AGGREGATEINIT;
$mas_activity_card->resetAttributes();
$mas_activity_card_list->renderRow();
if ($mas_activity_card->isGridAdd())
	$mas_activity_card_list->RowIndex = 0;
if ($mas_activity_card->isGridEdit())
	$mas_activity_card_list->RowIndex = 0;
while ($mas_activity_card_list->RecCnt < $mas_activity_card_list->StopRec) {
	$mas_activity_card_list->RecCnt++;
	if ($mas_activity_card_list->RecCnt >= $mas_activity_card_list->StartRec) {
		$mas_activity_card_list->RowCnt++;
		if ($mas_activity_card->isGridAdd() || $mas_activity_card->isGridEdit() || $mas_activity_card->isConfirm()) {
			$mas_activity_card_list->RowIndex++;
			$CurrentForm->Index = $mas_activity_card_list->RowIndex;
			if ($CurrentForm->hasValue($mas_activity_card_list->FormActionName) && $mas_activity_card_list->EventCancelled)
				$mas_activity_card_list->RowAction = strval($CurrentForm->getValue($mas_activity_card_list->FormActionName));
			elseif ($mas_activity_card->isGridAdd())
				$mas_activity_card_list->RowAction = "insert";
			else
				$mas_activity_card_list->RowAction = "";
		}

		// Set up key count
		$mas_activity_card_list->KeyCount = $mas_activity_card_list->RowIndex;

		// Init row class and style
		$mas_activity_card->resetAttributes();
		$mas_activity_card->CssClass = "";
		if ($mas_activity_card->isGridAdd()) {
			$mas_activity_card_list->loadRowValues(); // Load default values
		} else {
			$mas_activity_card_list->loadRowValues($mas_activity_card_list->Recordset); // Load row values
		}
		$mas_activity_card->RowType = ROWTYPE_VIEW; // Render view
		if ($mas_activity_card->isGridAdd()) // Grid add
			$mas_activity_card->RowType = ROWTYPE_ADD; // Render add
		if ($mas_activity_card->isGridAdd() && $mas_activity_card->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$mas_activity_card_list->restoreCurrentRowFormValues($mas_activity_card_list->RowIndex); // Restore form values
		if ($mas_activity_card->isGridEdit()) { // Grid edit
			if ($mas_activity_card->EventCancelled)
				$mas_activity_card_list->restoreCurrentRowFormValues($mas_activity_card_list->RowIndex); // Restore form values
			if ($mas_activity_card_list->RowAction == "insert")
				$mas_activity_card->RowType = ROWTYPE_ADD; // Render add
			else
				$mas_activity_card->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($mas_activity_card->isGridEdit() && ($mas_activity_card->RowType == ROWTYPE_EDIT || $mas_activity_card->RowType == ROWTYPE_ADD) && $mas_activity_card->EventCancelled) // Update failed
			$mas_activity_card_list->restoreCurrentRowFormValues($mas_activity_card_list->RowIndex); // Restore form values
		if ($mas_activity_card->RowType == ROWTYPE_EDIT) // Edit row
			$mas_activity_card_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$mas_activity_card->RowAttrs = array_merge($mas_activity_card->RowAttrs, array('data-rowindex'=>$mas_activity_card_list->RowCnt, 'id'=>'r' . $mas_activity_card_list->RowCnt . '_mas_activity_card', 'data-rowtype'=>$mas_activity_card->RowType));

		// Render row
		$mas_activity_card_list->renderRow();

		// Render list options
		$mas_activity_card_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($mas_activity_card_list->RowAction <> "delete" && $mas_activity_card_list->RowAction <> "insertdelete" && !($mas_activity_card_list->RowAction == "insert" && $mas_activity_card->isConfirm() && $mas_activity_card_list->emptyRow())) {
?>
	<tr<?php echo $mas_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_activity_card_list->ListOptions->render("body", "left", $mas_activity_card_list->RowCnt);
?>
	<?php if ($mas_activity_card->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_activity_card->id->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="o<?php echo $mas_activity_card_list->RowIndex ?>_id" id="o<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card->id->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_id" class="form-group mas_activity_card_id">
<span<?php echo $mas_activity_card->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_activity_card->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="x<?php echo $mas_activity_card_list->RowIndex ?>_id" id="x<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card->id->CurrentValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_id" class="mas_activity_card_id">
<span<?php echo $mas_activity_card->id->viewAttributes() ?>>
<?php echo $mas_activity_card->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
		<td data-name="Activity"<?php echo $mas_activity_card->Activity->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Activity" class="form-group mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Activity->EditValue ?>"<?php echo $mas_activity_card->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Activity" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($mas_activity_card->Activity->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Activity" class="form-group mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Activity->EditValue ?>"<?php echo $mas_activity_card->Activity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Activity" class="mas_activity_card_Activity">
<span<?php echo $mas_activity_card->Activity->viewAttributes() ?>>
<?php echo $mas_activity_card->Activity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $mas_activity_card->Type->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Type" class="form-group mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Type->EditValue ?>"<?php echo $mas_activity_card->Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Type" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($mas_activity_card->Type->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Type" class="form-group mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Type->EditValue ?>"<?php echo $mas_activity_card->Type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Type" class="mas_activity_card_Type">
<span<?php echo $mas_activity_card->Type->viewAttributes() ?>>
<?php echo $mas_activity_card->Type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Units->Visible) { // Units ?>
		<td data-name="Units"<?php echo $mas_activity_card->Units->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Units" class="form-group mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Units->EditValue ?>"<?php echo $mas_activity_card->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Units" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($mas_activity_card->Units->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Units" class="form-group mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Units->EditValue ?>"<?php echo $mas_activity_card->Units->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Units" class="mas_activity_card_Units">
<span<?php echo $mas_activity_card->Units->viewAttributes() ?>>
<?php echo $mas_activity_card->Units->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $mas_activity_card->Amount->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Amount" class="form-group mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Amount->EditValue ?>"<?php echo $mas_activity_card->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Amount" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($mas_activity_card->Amount->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Amount" class="form-group mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Amount->EditValue ?>"<?php echo $mas_activity_card->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Amount" class="mas_activity_card_Amount">
<span<?php echo $mas_activity_card->Amount->viewAttributes() ?>>
<?php echo $mas_activity_card->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
		<td data-name="Selected"<?php echo $mas_activity_card->Selected->cellAttributes() ?>>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Selected" class="form-group mas_activity_card_Selected">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Selected" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($mas_activity_card->Selected->OldValue) ?>">
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Selected" class="form-group mas_activity_card_Selected">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($mas_activity_card->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $mas_activity_card_list->RowCnt ?>_mas_activity_card_Selected" class="mas_activity_card_Selected">
<span<?php echo $mas_activity_card->Selected->viewAttributes() ?>>
<?php echo $mas_activity_card->Selected->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_activity_card_list->ListOptions->render("body", "right", $mas_activity_card_list->RowCnt);
?>
	</tr>
<?php if ($mas_activity_card->RowType == ROWTYPE_ADD || $mas_activity_card->RowType == ROWTYPE_EDIT) { ?>
<script>
fmas_activity_cardlist.updateLists(<?php echo $mas_activity_card_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$mas_activity_card->isGridAdd())
		if (!$mas_activity_card_list->Recordset->EOF)
			$mas_activity_card_list->Recordset->moveNext();
}
?>
<?php
	if ($mas_activity_card->isGridAdd() || $mas_activity_card->isGridEdit()) {
		$mas_activity_card_list->RowIndex = '$rowindex$';
		$mas_activity_card_list->loadRowValues();

		// Set row properties
		$mas_activity_card->resetAttributes();
		$mas_activity_card->RowAttrs = array_merge($mas_activity_card->RowAttrs, array('data-rowindex'=>$mas_activity_card_list->RowIndex, 'id'=>'r0_mas_activity_card', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($mas_activity_card->RowAttrs["class"], "ew-template");
		$mas_activity_card->RowType = ROWTYPE_ADD;

		// Render row
		$mas_activity_card_list->renderRow();

		// Render list options
		$mas_activity_card_list->renderListOptions();
		$mas_activity_card_list->StartRowCnt = 0;
?>
	<tr<?php echo $mas_activity_card->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_activity_card_list->ListOptions->render("body", "left", $mas_activity_card_list->RowIndex);
?>
	<?php if ($mas_activity_card->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="mas_activity_card" data-field="x_id" name="o<?php echo $mas_activity_card_list->RowIndex ?>_id" id="o<?php echo $mas_activity_card_list->RowIndex ?>_id" value="<?php echo HtmlEncode($mas_activity_card->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
		<td data-name="Activity">
<span id="el$rowindex$_mas_activity_card_Activity" class="form-group mas_activity_card_Activity">
<input type="text" data-table="mas_activity_card" data-field="x_Activity" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Activity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Activity->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Activity->EditValue ?>"<?php echo $mas_activity_card->Activity->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Activity" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Activity" value="<?php echo HtmlEncode($mas_activity_card->Activity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Type->Visible) { // Type ?>
		<td data-name="Type">
<span id="el$rowindex$_mas_activity_card_Type" class="form-group mas_activity_card_Type">
<input type="text" data-table="mas_activity_card" data-field="x_Type" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Type->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Type->EditValue ?>"<?php echo $mas_activity_card->Type->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Type" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Type" value="<?php echo HtmlEncode($mas_activity_card->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Units->Visible) { // Units ?>
		<td data-name="Units">
<span id="el$rowindex$_mas_activity_card_Units" class="form-group mas_activity_card_Units">
<input type="text" data-table="mas_activity_card" data-field="x_Units" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Units" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_activity_card->Units->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Units->EditValue ?>"<?php echo $mas_activity_card->Units->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Units" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Units" value="<?php echo HtmlEncode($mas_activity_card->Units->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_mas_activity_card_Amount" class="form-group mas_activity_card_Amount">
<input type="text" data-table="mas_activity_card" data-field="x_Amount" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($mas_activity_card->Amount->getPlaceHolder()) ?>" value="<?php echo $mas_activity_card->Amount->EditValue ?>"<?php echo $mas_activity_card->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Amount" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($mas_activity_card->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
		<td data-name="Selected">
<span id="el$rowindex$_mas_activity_card_Selected" class="form-group mas_activity_card_Selected">
<div id="tp_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" class="ew-template"><input type="checkbox" class="form-check-input" data-table="mas_activity_card" data-field="x_Selected" data-value-separator="<?php echo $mas_activity_card->Selected->displayValueSeparatorAttribute() ?>" name="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="x<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="{value}"<?php echo $mas_activity_card->Selected->editAttributes() ?>></div>
<div id="dsl_x<?php echo $mas_activity_card_list->RowIndex ?>_Selected" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $mas_activity_card->Selected->checkBoxListHtml(FALSE, "x{$mas_activity_card_list->RowIndex}_Selected[]") ?>
</div></div>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_Selected" name="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" id="o<?php echo $mas_activity_card_list->RowIndex ?>_Selected[]" value="<?php echo HtmlEncode($mas_activity_card->Selected->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_activity_card_list->ListOptions->render("body", "right", $mas_activity_card_list->RowIndex);
?>
<script>
fmas_activity_cardlist.updateLists(<?php echo $mas_activity_card_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($mas_activity_card->isAdd() || $mas_activity_card->isCopy()) { ?>
<input type="hidden" name="<?php echo $mas_activity_card_list->FormKeyCountName ?>" id="<?php echo $mas_activity_card_list->FormKeyCountName ?>" value="<?php echo $mas_activity_card_list->KeyCount ?>">
<?php } ?>
<?php if ($mas_activity_card->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $mas_activity_card_list->FormKeyCountName ?>" id="<?php echo $mas_activity_card_list->FormKeyCountName ?>" value="<?php echo $mas_activity_card_list->KeyCount ?>">
<?php echo $mas_activity_card_list->MultiSelectKey ?>
<?php } ?>
<?php if ($mas_activity_card->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $mas_activity_card_list->FormKeyCountName ?>" id="<?php echo $mas_activity_card_list->FormKeyCountName ?>" value="<?php echo $mas_activity_card_list->KeyCount ?>">
<?php echo $mas_activity_card_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$mas_activity_card->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_activity_card_list->Recordset)
	$mas_activity_card_list->Recordset->Close();
?>
<?php if (!$mas_activity_card->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_activity_card->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_activity_card_list->Pager)) $mas_activity_card_list->Pager = new NumericPager($mas_activity_card_list->StartRec, $mas_activity_card_list->DisplayRecs, $mas_activity_card_list->TotalRecs, $mas_activity_card_list->RecRange, $mas_activity_card_list->AutoHidePager) ?>
<?php if ($mas_activity_card_list->Pager->RecordCount > 0 && $mas_activity_card_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_activity_card_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_activity_card_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_activity_card_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_activity_card_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_activity_card_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_activity_card_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_activity_card_list->pageUrl() ?>start=<?php echo $mas_activity_card_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_activity_card_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_activity_card_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_activity_card_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_activity_card_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_activity_card_list->TotalRecs > 0 && (!$mas_activity_card_list->AutoHidePageSizeSelector || $mas_activity_card_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_activity_card">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_activity_card_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_activity_card_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_activity_card_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_activity_card_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_activity_card_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_activity_card_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_activity_card->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_activity_card_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_activity_card_list->TotalRecs == 0 && !$mas_activity_card->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_activity_card_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_activity_card_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_activity_card->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_activity_card->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_activity_card", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_activity_card_list->terminate();
?>