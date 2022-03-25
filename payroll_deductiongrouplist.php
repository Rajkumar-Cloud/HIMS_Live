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
$payroll_deductiongroup_list = new payroll_deductiongroup_list();

// Run the page
$payroll_deductiongroup_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_deductiongroup_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpayroll_deductiongrouplist = currentForm = new ew.Form("fpayroll_deductiongrouplist", "list");
fpayroll_deductiongrouplist.formKeyCountName = '<?php echo $payroll_deductiongroup_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpayroll_deductiongrouplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_deductiongrouplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpayroll_deductiongrouplistsrch = currentSearchForm = new ew.Form("fpayroll_deductiongrouplistsrch");

// Filters
fpayroll_deductiongrouplistsrch.filterList = <?php echo $payroll_deductiongroup_list->getFilterList() ?>;
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
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($payroll_deductiongroup_list->TotalRecs > 0 && $payroll_deductiongroup_list->ExportOptions->visible()) { ?>
<?php $payroll_deductiongroup_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($payroll_deductiongroup_list->ImportOptions->visible()) { ?>
<?php $payroll_deductiongroup_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($payroll_deductiongroup_list->SearchOptions->visible()) { ?>
<?php $payroll_deductiongroup_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($payroll_deductiongroup_list->FilterOptions->visible()) { ?>
<?php $payroll_deductiongroup_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$payroll_deductiongroup_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$payroll_deductiongroup->isExport() && !$payroll_deductiongroup->CurrentAction) { ?>
<form name="fpayroll_deductiongrouplistsrch" id="fpayroll_deductiongrouplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($payroll_deductiongroup_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpayroll_deductiongrouplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="payroll_deductiongroup">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($payroll_deductiongroup_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($payroll_deductiongroup_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $payroll_deductiongroup_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($payroll_deductiongroup_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($payroll_deductiongroup_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($payroll_deductiongroup_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($payroll_deductiongroup_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $payroll_deductiongroup_list->showPageHeader(); ?>
<?php
$payroll_deductiongroup_list->showMessage();
?>
<?php if ($payroll_deductiongroup_list->TotalRecs > 0 || $payroll_deductiongroup->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($payroll_deductiongroup_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> payroll_deductiongroup">
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$payroll_deductiongroup->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($payroll_deductiongroup_list->Pager)) $payroll_deductiongroup_list->Pager = new NumericPager($payroll_deductiongroup_list->StartRec, $payroll_deductiongroup_list->DisplayRecs, $payroll_deductiongroup_list->TotalRecs, $payroll_deductiongroup_list->RecRange, $payroll_deductiongroup_list->AutoHidePager) ?>
<?php if ($payroll_deductiongroup_list->Pager->RecordCount > 0 && $payroll_deductiongroup_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($payroll_deductiongroup_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($payroll_deductiongroup_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($payroll_deductiongroup_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $payroll_deductiongroup_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($payroll_deductiongroup_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($payroll_deductiongroup_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($payroll_deductiongroup_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $payroll_deductiongroup_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $payroll_deductiongroup_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $payroll_deductiongroup_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($payroll_deductiongroup_list->TotalRecs > 0 && (!$payroll_deductiongroup_list->AutoHidePageSizeSelector || $payroll_deductiongroup_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="payroll_deductiongroup">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($payroll_deductiongroup_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($payroll_deductiongroup_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($payroll_deductiongroup_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($payroll_deductiongroup_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($payroll_deductiongroup_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($payroll_deductiongroup_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($payroll_deductiongroup->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $payroll_deductiongroup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpayroll_deductiongrouplist" id="fpayroll_deductiongrouplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_deductiongroup_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_deductiongroup_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_deductiongroup">
<div id="gmp_payroll_deductiongroup" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($payroll_deductiongroup_list->TotalRecs > 0 || $payroll_deductiongroup->isGridEdit()) { ?>
<table id="tbl_payroll_deductiongrouplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$payroll_deductiongroup_list->RowType = ROWTYPE_HEADER;

// Render list options
$payroll_deductiongroup_list->renderListOptions();

// Render list options (header, left)
$payroll_deductiongroup_list->ListOptions->render("header", "left");
?>
<?php if ($payroll_deductiongroup->id->Visible) { // id ?>
	<?php if ($payroll_deductiongroup->sortUrl($payroll_deductiongroup->id) == "") { ?>
		<th data-name="id" class="<?php echo $payroll_deductiongroup->id->headerCellClass() ?>"><div id="elh_payroll_deductiongroup_id" class="payroll_deductiongroup_id"><div class="ew-table-header-caption"><?php echo $payroll_deductiongroup->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $payroll_deductiongroup->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $payroll_deductiongroup->SortUrl($payroll_deductiongroup->id) ?>',1);"><div id="elh_payroll_deductiongroup_id" class="payroll_deductiongroup_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $payroll_deductiongroup->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($payroll_deductiongroup->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($payroll_deductiongroup->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($payroll_deductiongroup->name->Visible) { // name ?>
	<?php if ($payroll_deductiongroup->sortUrl($payroll_deductiongroup->name) == "") { ?>
		<th data-name="name" class="<?php echo $payroll_deductiongroup->name->headerCellClass() ?>"><div id="elh_payroll_deductiongroup_name" class="payroll_deductiongroup_name"><div class="ew-table-header-caption"><?php echo $payroll_deductiongroup->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $payroll_deductiongroup->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $payroll_deductiongroup->SortUrl($payroll_deductiongroup->name) ?>',1);"><div id="elh_payroll_deductiongroup_name" class="payroll_deductiongroup_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $payroll_deductiongroup->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($payroll_deductiongroup->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($payroll_deductiongroup->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($payroll_deductiongroup->description->Visible) { // description ?>
	<?php if ($payroll_deductiongroup->sortUrl($payroll_deductiongroup->description) == "") { ?>
		<th data-name="description" class="<?php echo $payroll_deductiongroup->description->headerCellClass() ?>"><div id="elh_payroll_deductiongroup_description" class="payroll_deductiongroup_description"><div class="ew-table-header-caption"><?php echo $payroll_deductiongroup->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $payroll_deductiongroup->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $payroll_deductiongroup->SortUrl($payroll_deductiongroup->description) ?>',1);"><div id="elh_payroll_deductiongroup_description" class="payroll_deductiongroup_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $payroll_deductiongroup->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($payroll_deductiongroup->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($payroll_deductiongroup->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$payroll_deductiongroup_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($payroll_deductiongroup->ExportAll && $payroll_deductiongroup->isExport()) {
	$payroll_deductiongroup_list->StopRec = $payroll_deductiongroup_list->TotalRecs;
} else {

	// Set the last record to display
	if ($payroll_deductiongroup_list->TotalRecs > $payroll_deductiongroup_list->StartRec + $payroll_deductiongroup_list->DisplayRecs - 1)
		$payroll_deductiongroup_list->StopRec = $payroll_deductiongroup_list->StartRec + $payroll_deductiongroup_list->DisplayRecs - 1;
	else
		$payroll_deductiongroup_list->StopRec = $payroll_deductiongroup_list->TotalRecs;
}
$payroll_deductiongroup_list->RecCnt = $payroll_deductiongroup_list->StartRec - 1;
if ($payroll_deductiongroup_list->Recordset && !$payroll_deductiongroup_list->Recordset->EOF) {
	$payroll_deductiongroup_list->Recordset->moveFirst();
	$selectLimit = $payroll_deductiongroup_list->UseSelectLimit;
	if (!$selectLimit && $payroll_deductiongroup_list->StartRec > 1)
		$payroll_deductiongroup_list->Recordset->move($payroll_deductiongroup_list->StartRec - 1);
} elseif (!$payroll_deductiongroup->AllowAddDeleteRow && $payroll_deductiongroup_list->StopRec == 0) {
	$payroll_deductiongroup_list->StopRec = $payroll_deductiongroup->GridAddRowCount;
}

// Initialize aggregate
$payroll_deductiongroup->RowType = ROWTYPE_AGGREGATEINIT;
$payroll_deductiongroup->resetAttributes();
$payroll_deductiongroup_list->renderRow();
while ($payroll_deductiongroup_list->RecCnt < $payroll_deductiongroup_list->StopRec) {
	$payroll_deductiongroup_list->RecCnt++;
	if ($payroll_deductiongroup_list->RecCnt >= $payroll_deductiongroup_list->StartRec) {
		$payroll_deductiongroup_list->RowCnt++;

		// Set up key count
		$payroll_deductiongroup_list->KeyCount = $payroll_deductiongroup_list->RowIndex;

		// Init row class and style
		$payroll_deductiongroup->resetAttributes();
		$payroll_deductiongroup->CssClass = "";
		if ($payroll_deductiongroup->isGridAdd()) {
		} else {
			$payroll_deductiongroup_list->loadRowValues($payroll_deductiongroup_list->Recordset); // Load row values
		}
		$payroll_deductiongroup->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$payroll_deductiongroup->RowAttrs = array_merge($payroll_deductiongroup->RowAttrs, array('data-rowindex'=>$payroll_deductiongroup_list->RowCnt, 'id'=>'r' . $payroll_deductiongroup_list->RowCnt . '_payroll_deductiongroup', 'data-rowtype'=>$payroll_deductiongroup->RowType));

		// Render row
		$payroll_deductiongroup_list->renderRow();

		// Render list options
		$payroll_deductiongroup_list->renderListOptions();
?>
	<tr<?php echo $payroll_deductiongroup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$payroll_deductiongroup_list->ListOptions->render("body", "left", $payroll_deductiongroup_list->RowCnt);
?>
	<?php if ($payroll_deductiongroup->id->Visible) { // id ?>
		<td data-name="id"<?php echo $payroll_deductiongroup->id->cellAttributes() ?>>
<span id="el<?php echo $payroll_deductiongroup_list->RowCnt ?>_payroll_deductiongroup_id" class="payroll_deductiongroup_id">
<span<?php echo $payroll_deductiongroup->id->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($payroll_deductiongroup->name->Visible) { // name ?>
		<td data-name="name"<?php echo $payroll_deductiongroup->name->cellAttributes() ?>>
<span id="el<?php echo $payroll_deductiongroup_list->RowCnt ?>_payroll_deductiongroup_name" class="payroll_deductiongroup_name">
<span<?php echo $payroll_deductiongroup->name->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($payroll_deductiongroup->description->Visible) { // description ?>
		<td data-name="description"<?php echo $payroll_deductiongroup->description->cellAttributes() ?>>
<span id="el<?php echo $payroll_deductiongroup_list->RowCnt ?>_payroll_deductiongroup_description" class="payroll_deductiongroup_description">
<span<?php echo $payroll_deductiongroup->description->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$payroll_deductiongroup_list->ListOptions->render("body", "right", $payroll_deductiongroup_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$payroll_deductiongroup->isGridAdd())
		$payroll_deductiongroup_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$payroll_deductiongroup->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($payroll_deductiongroup_list->Recordset)
	$payroll_deductiongroup_list->Recordset->Close();
?>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$payroll_deductiongroup->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($payroll_deductiongroup_list->Pager)) $payroll_deductiongroup_list->Pager = new NumericPager($payroll_deductiongroup_list->StartRec, $payroll_deductiongroup_list->DisplayRecs, $payroll_deductiongroup_list->TotalRecs, $payroll_deductiongroup_list->RecRange, $payroll_deductiongroup_list->AutoHidePager) ?>
<?php if ($payroll_deductiongroup_list->Pager->RecordCount > 0 && $payroll_deductiongroup_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($payroll_deductiongroup_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($payroll_deductiongroup_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($payroll_deductiongroup_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $payroll_deductiongroup_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($payroll_deductiongroup_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($payroll_deductiongroup_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_deductiongroup_list->pageUrl() ?>start=<?php echo $payroll_deductiongroup_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($payroll_deductiongroup_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $payroll_deductiongroup_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $payroll_deductiongroup_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $payroll_deductiongroup_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($payroll_deductiongroup_list->TotalRecs > 0 && (!$payroll_deductiongroup_list->AutoHidePageSizeSelector || $payroll_deductiongroup_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="payroll_deductiongroup">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($payroll_deductiongroup_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($payroll_deductiongroup_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($payroll_deductiongroup_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($payroll_deductiongroup_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($payroll_deductiongroup_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($payroll_deductiongroup_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($payroll_deductiongroup->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $payroll_deductiongroup_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($payroll_deductiongroup_list->TotalRecs == 0 && !$payroll_deductiongroup->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $payroll_deductiongroup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$payroll_deductiongroup_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$payroll_deductiongroup->isExport()) { ?>
<script>
ew.scrollableTable("gmp_payroll_deductiongroup", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$payroll_deductiongroup_list->terminate();
?>