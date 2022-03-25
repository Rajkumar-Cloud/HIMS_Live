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
$billing_discount_list = new billing_discount_list();

// Run the page
$billing_discount_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$billing_discount->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fbilling_discountlist = currentForm = new ew.Form("fbilling_discountlist", "list");
fbilling_discountlist.formKeyCountName = '<?php echo $billing_discount_list->FormKeyCountName ?>';

// Validate form
fbilling_discountlist.validate = function() {
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
		<?php if ($billing_discount_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount->id->caption(), $billing_discount->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_discount_list->Particulars->Required) { ?>
			elm = this.getElements("x" + infix + "_Particulars");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount->Particulars->caption(), $billing_discount->Particulars->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($billing_discount_list->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount->Procedure->caption(), $billing_discount->Procedure->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_discount->Procedure->errorMessage()) ?>");
		<?php if ($billing_discount_list->Pharmacy->Required) { ?>
			elm = this.getElements("x" + infix + "_Pharmacy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount->Pharmacy->caption(), $billing_discount->Pharmacy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Pharmacy");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_discount->Pharmacy->errorMessage()) ?>");
		<?php if ($billing_discount_list->Investication->Required) { ?>
			elm = this.getElements("x" + infix + "_Investication");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount->Investication->caption(), $billing_discount->Investication->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Investication");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($billing_discount->Investication->errorMessage()) ?>");

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
fbilling_discountlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Particulars", false)) return false;
	if (ew.valueChanged(fobj, infix, "Procedure", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pharmacy", false)) return false;
	if (ew.valueChanged(fobj, infix, "Investication", false)) return false;
	return true;
}

// Form_CustomValidate event
fbilling_discountlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_discountlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fbilling_discountlistsrch = currentSearchForm = new ew.Form("fbilling_discountlistsrch");

// Filters
fbilling_discountlistsrch.filterList = <?php echo $billing_discount_list->getFilterList() ?>;
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
<?php if (!$billing_discount->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_discount_list->TotalRecs > 0 && $billing_discount_list->ExportOptions->visible()) { ?>
<?php $billing_discount_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_discount_list->ImportOptions->visible()) { ?>
<?php $billing_discount_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_discount_list->SearchOptions->visible()) { ?>
<?php $billing_discount_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_discount_list->FilterOptions->visible()) { ?>
<?php $billing_discount_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_discount_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_discount->isExport() && !$billing_discount->CurrentAction) { ?>
<form name="fbilling_discountlistsrch" id="fbilling_discountlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($billing_discount_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fbilling_discountlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_discount">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($billing_discount_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($billing_discount_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_discount_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $billing_discount_list->showPageHeader(); ?>
<?php
$billing_discount_list->showMessage();
?>
<?php if ($billing_discount_list->TotalRecs > 0 || $billing_discount->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_discount_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_discount">
<?php if (!$billing_discount->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_discount->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_discount_list->Pager)) $billing_discount_list->Pager = new NumericPager($billing_discount_list->StartRec, $billing_discount_list->DisplayRecs, $billing_discount_list->TotalRecs, $billing_discount_list->RecRange, $billing_discount_list->AutoHidePager) ?>
<?php if ($billing_discount_list->Pager->RecordCount > 0 && $billing_discount_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_discount_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_discount_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_discount_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_discount_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_discount_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_discount_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_discount_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_discount_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_discount_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_discount_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_discount_list->TotalRecs > 0 && (!$billing_discount_list->AutoHidePageSizeSelector || $billing_discount_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_discount">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_discount_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_discount_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_discount_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_discount_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_discount_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_discount_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_discount->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_discount_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_discountlist" id="fbilling_discountlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_discount_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_discount_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<div id="gmp_billing_discount" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($billing_discount_list->TotalRecs > 0 || $billing_discount->isGridEdit()) { ?>
<table id="tbl_billing_discountlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_discount_list->RowType = ROWTYPE_HEADER;

// Render list options
$billing_discount_list->renderListOptions();

// Render list options (header, left)
$billing_discount_list->ListOptions->render("header", "left");
?>
<?php if ($billing_discount->id->Visible) { // id ?>
	<?php if ($billing_discount->sortUrl($billing_discount->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_discount->id->headerCellClass() ?>"><div id="elh_billing_discount_id" class="billing_discount_id"><div class="ew-table-header-caption"><?php echo $billing_discount->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_discount->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_discount->SortUrl($billing_discount->id) ?>',1);"><div id="elh_billing_discount_id" class="billing_discount_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_discount->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount->Particulars->Visible) { // Particulars ?>
	<?php if ($billing_discount->sortUrl($billing_discount->Particulars) == "") { ?>
		<th data-name="Particulars" class="<?php echo $billing_discount->Particulars->headerCellClass() ?>"><div id="elh_billing_discount_Particulars" class="billing_discount_Particulars"><div class="ew-table-header-caption"><?php echo $billing_discount->Particulars->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Particulars" class="<?php echo $billing_discount->Particulars->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_discount->SortUrl($billing_discount->Particulars) ?>',1);"><div id="elh_billing_discount_Particulars" class="billing_discount_Particulars">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount->Particulars->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_discount->Particulars->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_discount->Particulars->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount->Procedure->Visible) { // Procedure ?>
	<?php if ($billing_discount->sortUrl($billing_discount->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $billing_discount->Procedure->headerCellClass() ?>"><div id="elh_billing_discount_Procedure" class="billing_discount_Procedure"><div class="ew-table-header-caption"><?php echo $billing_discount->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $billing_discount->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_discount->SortUrl($billing_discount->Procedure) ?>',1);"><div id="elh_billing_discount_Procedure" class="billing_discount_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount->Procedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_discount->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount->Pharmacy->Visible) { // Pharmacy ?>
	<?php if ($billing_discount->sortUrl($billing_discount->Pharmacy) == "") { ?>
		<th data-name="Pharmacy" class="<?php echo $billing_discount->Pharmacy->headerCellClass() ?>"><div id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy"><div class="ew-table-header-caption"><?php echo $billing_discount->Pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pharmacy" class="<?php echo $billing_discount->Pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_discount->SortUrl($billing_discount->Pharmacy) ?>',1);"><div id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount->Pharmacy->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount->Pharmacy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_discount->Pharmacy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount->Investication->Visible) { // Investication ?>
	<?php if ($billing_discount->sortUrl($billing_discount->Investication) == "") { ?>
		<th data-name="Investication" class="<?php echo $billing_discount->Investication->headerCellClass() ?>"><div id="elh_billing_discount_Investication" class="billing_discount_Investication"><div class="ew-table-header-caption"><?php echo $billing_discount->Investication->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investication" class="<?php echo $billing_discount->Investication->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $billing_discount->SortUrl($billing_discount->Investication) ?>',1);"><div id="elh_billing_discount_Investication" class="billing_discount_Investication">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount->Investication->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount->Investication->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($billing_discount->Investication->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_discount_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_discount->ExportAll && $billing_discount->isExport()) {
	$billing_discount_list->StopRec = $billing_discount_list->TotalRecs;
} else {

	// Set the last record to display
	if ($billing_discount_list->TotalRecs > $billing_discount_list->StartRec + $billing_discount_list->DisplayRecs - 1)
		$billing_discount_list->StopRec = $billing_discount_list->StartRec + $billing_discount_list->DisplayRecs - 1;
	else
		$billing_discount_list->StopRec = $billing_discount_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $billing_discount_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($billing_discount_list->FormKeyCountName) && ($billing_discount->isGridAdd() || $billing_discount->isGridEdit() || $billing_discount->isConfirm())) {
		$billing_discount_list->KeyCount = $CurrentForm->getValue($billing_discount_list->FormKeyCountName);
		$billing_discount_list->StopRec = $billing_discount_list->StartRec + $billing_discount_list->KeyCount - 1;
	}
}
$billing_discount_list->RecCnt = $billing_discount_list->StartRec - 1;
if ($billing_discount_list->Recordset && !$billing_discount_list->Recordset->EOF) {
	$billing_discount_list->Recordset->moveFirst();
	$selectLimit = $billing_discount_list->UseSelectLimit;
	if (!$selectLimit && $billing_discount_list->StartRec > 1)
		$billing_discount_list->Recordset->move($billing_discount_list->StartRec - 1);
} elseif (!$billing_discount->AllowAddDeleteRow && $billing_discount_list->StopRec == 0) {
	$billing_discount_list->StopRec = $billing_discount->GridAddRowCount;
}

// Initialize aggregate
$billing_discount->RowType = ROWTYPE_AGGREGATEINIT;
$billing_discount->resetAttributes();
$billing_discount_list->renderRow();
if ($billing_discount->isGridAdd())
	$billing_discount_list->RowIndex = 0;
if ($billing_discount->isGridEdit())
	$billing_discount_list->RowIndex = 0;
while ($billing_discount_list->RecCnt < $billing_discount_list->StopRec) {
	$billing_discount_list->RecCnt++;
	if ($billing_discount_list->RecCnt >= $billing_discount_list->StartRec) {
		$billing_discount_list->RowCnt++;
		if ($billing_discount->isGridAdd() || $billing_discount->isGridEdit() || $billing_discount->isConfirm()) {
			$billing_discount_list->RowIndex++;
			$CurrentForm->Index = $billing_discount_list->RowIndex;
			if ($CurrentForm->hasValue($billing_discount_list->FormActionName) && $billing_discount_list->EventCancelled)
				$billing_discount_list->RowAction = strval($CurrentForm->getValue($billing_discount_list->FormActionName));
			elseif ($billing_discount->isGridAdd())
				$billing_discount_list->RowAction = "insert";
			else
				$billing_discount_list->RowAction = "";
		}

		// Set up key count
		$billing_discount_list->KeyCount = $billing_discount_list->RowIndex;

		// Init row class and style
		$billing_discount->resetAttributes();
		$billing_discount->CssClass = "";
		if ($billing_discount->isGridAdd()) {
			$billing_discount_list->loadRowValues(); // Load default values
		} else {
			$billing_discount_list->loadRowValues($billing_discount_list->Recordset); // Load row values
		}
		$billing_discount->RowType = ROWTYPE_VIEW; // Render view
		if ($billing_discount->isGridAdd()) // Grid add
			$billing_discount->RowType = ROWTYPE_ADD; // Render add
		if ($billing_discount->isGridAdd() && $billing_discount->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$billing_discount_list->restoreCurrentRowFormValues($billing_discount_list->RowIndex); // Restore form values
		if ($billing_discount->isGridEdit()) { // Grid edit
			if ($billing_discount->EventCancelled)
				$billing_discount_list->restoreCurrentRowFormValues($billing_discount_list->RowIndex); // Restore form values
			if ($billing_discount_list->RowAction == "insert")
				$billing_discount->RowType = ROWTYPE_ADD; // Render add
			else
				$billing_discount->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($billing_discount->isGridEdit() && ($billing_discount->RowType == ROWTYPE_EDIT || $billing_discount->RowType == ROWTYPE_ADD) && $billing_discount->EventCancelled) // Update failed
			$billing_discount_list->restoreCurrentRowFormValues($billing_discount_list->RowIndex); // Restore form values
		if ($billing_discount->RowType == ROWTYPE_EDIT) // Edit row
			$billing_discount_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$billing_discount->RowAttrs = array_merge($billing_discount->RowAttrs, array('data-rowindex'=>$billing_discount_list->RowCnt, 'id'=>'r' . $billing_discount_list->RowCnt . '_billing_discount', 'data-rowtype'=>$billing_discount->RowType));

		// Render row
		$billing_discount_list->renderRow();

		// Render list options
		$billing_discount_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($billing_discount_list->RowAction <> "delete" && $billing_discount_list->RowAction <> "insertdelete" && !($billing_discount_list->RowAction == "insert" && $billing_discount->isConfirm() && $billing_discount_list->emptyRow())) {
?>
	<tr<?php echo $billing_discount->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_discount_list->ListOptions->render("body", "left", $billing_discount_list->RowCnt);
?>
	<?php if ($billing_discount->id->Visible) { // id ?>
		<td data-name="id"<?php echo $billing_discount->id->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="billing_discount" data-field="x_id" name="o<?php echo $billing_discount_list->RowIndex ?>_id" id="o<?php echo $billing_discount_list->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_discount->id->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_id" class="form-group billing_discount_id">
<span<?php echo $billing_discount->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($billing_discount->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_id" name="x<?php echo $billing_discount_list->RowIndex ?>_id" id="x<?php echo $billing_discount_list->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_discount->id->CurrentValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_id" class="billing_discount_id">
<span<?php echo $billing_discount->id->viewAttributes() ?>>
<?php echo $billing_discount->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount->Particulars->Visible) { // Particulars ?>
		<td data-name="Particulars"<?php echo $billing_discount->Particulars->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Particulars" class="form-group billing_discount_Particulars">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Particulars->EditValue ?>"<?php echo $billing_discount->Particulars->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Particulars" name="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" value="<?php echo HtmlEncode($billing_discount->Particulars->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Particulars" class="form-group billing_discount_Particulars">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Particulars->EditValue ?>"<?php echo $billing_discount->Particulars->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Particulars" class="billing_discount_Particulars">
<span<?php echo $billing_discount->Particulars->viewAttributes() ?>>
<?php echo $billing_discount->Particulars->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $billing_discount->Procedure->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Procedure" class="form-group billing_discount_Procedure">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Procedure->EditValue ?>"<?php echo $billing_discount->Procedure->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Procedure" name="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" value="<?php echo HtmlEncode($billing_discount->Procedure->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Procedure" class="form-group billing_discount_Procedure">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Procedure->EditValue ?>"<?php echo $billing_discount->Procedure->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Procedure" class="billing_discount_Procedure">
<span<?php echo $billing_discount->Procedure->viewAttributes() ?>>
<?php echo $billing_discount->Procedure->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount->Pharmacy->Visible) { // Pharmacy ?>
		<td data-name="Pharmacy"<?php echo $billing_discount->Pharmacy->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Pharmacy" class="form-group billing_discount_Pharmacy">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Pharmacy->EditValue ?>"<?php echo $billing_discount->Pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Pharmacy" name="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" value="<?php echo HtmlEncode($billing_discount->Pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Pharmacy" class="form-group billing_discount_Pharmacy">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Pharmacy->EditValue ?>"<?php echo $billing_discount->Pharmacy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Pharmacy" class="billing_discount_Pharmacy">
<span<?php echo $billing_discount->Pharmacy->viewAttributes() ?>>
<?php echo $billing_discount->Pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount->Investication->Visible) { // Investication ?>
		<td data-name="Investication"<?php echo $billing_discount->Investication->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Investication" class="form-group billing_discount_Investication">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x<?php echo $billing_discount_list->RowIndex ?>_Investication" id="x<?php echo $billing_discount_list->RowIndex ?>_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Investication->EditValue ?>"<?php echo $billing_discount->Investication->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Investication" name="o<?php echo $billing_discount_list->RowIndex ?>_Investication" id="o<?php echo $billing_discount_list->RowIndex ?>_Investication" value="<?php echo HtmlEncode($billing_discount->Investication->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Investication" class="form-group billing_discount_Investication">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x<?php echo $billing_discount_list->RowIndex ?>_Investication" id="x<?php echo $billing_discount_list->RowIndex ?>_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Investication->EditValue ?>"<?php echo $billing_discount->Investication->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCnt ?>_billing_discount_Investication" class="billing_discount_Investication">
<span<?php echo $billing_discount->Investication->viewAttributes() ?>>
<?php echo $billing_discount->Investication->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_discount_list->ListOptions->render("body", "right", $billing_discount_list->RowCnt);
?>
	</tr>
<?php if ($billing_discount->RowType == ROWTYPE_ADD || $billing_discount->RowType == ROWTYPE_EDIT) { ?>
<script>
fbilling_discountlist.updateLists(<?php echo $billing_discount_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$billing_discount->isGridAdd())
		if (!$billing_discount_list->Recordset->EOF)
			$billing_discount_list->Recordset->moveNext();
}
?>
<?php
	if ($billing_discount->isGridAdd() || $billing_discount->isGridEdit()) {
		$billing_discount_list->RowIndex = '$rowindex$';
		$billing_discount_list->loadRowValues();

		// Set row properties
		$billing_discount->resetAttributes();
		$billing_discount->RowAttrs = array_merge($billing_discount->RowAttrs, array('data-rowindex'=>$billing_discount_list->RowIndex, 'id'=>'r0_billing_discount', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($billing_discount->RowAttrs["class"], "ew-template");
		$billing_discount->RowType = ROWTYPE_ADD;

		// Render row
		$billing_discount_list->renderRow();

		// Render list options
		$billing_discount_list->renderListOptions();
		$billing_discount_list->StartRowCnt = 0;
?>
	<tr<?php echo $billing_discount->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_discount_list->ListOptions->render("body", "left", $billing_discount_list->RowIndex);
?>
	<?php if ($billing_discount->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="billing_discount" data-field="x_id" name="o<?php echo $billing_discount_list->RowIndex ?>_id" id="o<?php echo $billing_discount_list->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_discount->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount->Particulars->Visible) { // Particulars ?>
		<td data-name="Particulars">
<span id="el$rowindex$_billing_discount_Particulars" class="form-group billing_discount_Particulars">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Particulars->EditValue ?>"<?php echo $billing_discount->Particulars->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Particulars" name="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" value="<?php echo HtmlEncode($billing_discount->Particulars->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure">
<span id="el$rowindex$_billing_discount_Procedure" class="form-group billing_discount_Procedure">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Procedure->EditValue ?>"<?php echo $billing_discount->Procedure->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Procedure" name="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" value="<?php echo HtmlEncode($billing_discount->Procedure->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount->Pharmacy->Visible) { // Pharmacy ?>
		<td data-name="Pharmacy">
<span id="el$rowindex$_billing_discount_Pharmacy" class="form-group billing_discount_Pharmacy">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Pharmacy->EditValue ?>"<?php echo $billing_discount->Pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Pharmacy" name="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" value="<?php echo HtmlEncode($billing_discount->Pharmacy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount->Investication->Visible) { // Investication ?>
		<td data-name="Investication">
<span id="el$rowindex$_billing_discount_Investication" class="form-group billing_discount_Investication">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x<?php echo $billing_discount_list->RowIndex ?>_Investication" id="x<?php echo $billing_discount_list->RowIndex ?>_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount->Investication->EditValue ?>"<?php echo $billing_discount->Investication->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Investication" name="o<?php echo $billing_discount_list->RowIndex ?>_Investication" id="o<?php echo $billing_discount_list->RowIndex ?>_Investication" value="<?php echo HtmlEncode($billing_discount->Investication->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_discount_list->ListOptions->render("body", "right", $billing_discount_list->RowIndex);
?>
<script>
fbilling_discountlist.updateLists(<?php echo $billing_discount_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($billing_discount->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $billing_discount_list->FormKeyCountName ?>" id="<?php echo $billing_discount_list->FormKeyCountName ?>" value="<?php echo $billing_discount_list->KeyCount ?>">
<?php echo $billing_discount_list->MultiSelectKey ?>
<?php } ?>
<?php if ($billing_discount->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $billing_discount_list->FormKeyCountName ?>" id="<?php echo $billing_discount_list->FormKeyCountName ?>" value="<?php echo $billing_discount_list->KeyCount ?>">
<?php echo $billing_discount_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$billing_discount->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_discount_list->Recordset)
	$billing_discount_list->Recordset->Close();
?>
<?php if (!$billing_discount->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_discount->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($billing_discount_list->Pager)) $billing_discount_list->Pager = new NumericPager($billing_discount_list->StartRec, $billing_discount_list->DisplayRecs, $billing_discount_list->TotalRecs, $billing_discount_list->RecRange, $billing_discount_list->AutoHidePager) ?>
<?php if ($billing_discount_list->Pager->RecordCount > 0 && $billing_discount_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($billing_discount_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($billing_discount_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($billing_discount_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $billing_discount_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($billing_discount_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($billing_discount_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $billing_discount_list->pageUrl() ?>start=<?php echo $billing_discount_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($billing_discount_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $billing_discount_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $billing_discount_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $billing_discount_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($billing_discount_list->TotalRecs > 0 && (!$billing_discount_list->AutoHidePageSizeSelector || $billing_discount_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="billing_discount">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($billing_discount_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($billing_discount_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($billing_discount_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($billing_discount_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($billing_discount_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($billing_discount_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($billing_discount->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_discount_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_discount_list->TotalRecs == 0 && !$billing_discount->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_discount_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_discount_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$billing_discount->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$billing_discount->isExport()) { ?>
<script>
ew.scrollableTable("gmp_billing_discount", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$billing_discount_list->terminate();
?>