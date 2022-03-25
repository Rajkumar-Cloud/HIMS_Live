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
$sys_country_list = new sys_country_list();

// Run the page
$sys_country_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_country_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_country->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fsys_countrylist = currentForm = new ew.Form("fsys_countrylist", "list");
fsys_countrylist.formKeyCountName = '<?php echo $sys_country_list->FormKeyCountName ?>';

// Form_CustomValidate event
fsys_countrylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_countrylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fsys_countrylistsrch = currentSearchForm = new ew.Form("fsys_countrylistsrch");

// Filters
fsys_countrylistsrch.filterList = <?php echo $sys_country_list->getFilterList() ?>;
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
<?php if (!$sys_country->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($sys_country_list->TotalRecs > 0 && $sys_country_list->ExportOptions->visible()) { ?>
<?php $sys_country_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_country_list->ImportOptions->visible()) { ?>
<?php $sys_country_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($sys_country_list->SearchOptions->visible()) { ?>
<?php $sys_country_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($sys_country_list->FilterOptions->visible()) { ?>
<?php $sys_country_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$sys_country_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$sys_country->isExport() && !$sys_country->CurrentAction) { ?>
<form name="fsys_countrylistsrch" id="fsys_countrylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($sys_country_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fsys_countrylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="sys_country">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($sys_country_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($sys_country_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $sys_country_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($sys_country_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($sys_country_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($sys_country_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($sys_country_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $sys_country_list->showPageHeader(); ?>
<?php
$sys_country_list->showMessage();
?>
<?php if ($sys_country_list->TotalRecs > 0 || $sys_country->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($sys_country_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> sys_country">
<?php if (!$sys_country->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$sys_country->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_country_list->Pager)) $sys_country_list->Pager = new NumericPager($sys_country_list->StartRec, $sys_country_list->DisplayRecs, $sys_country_list->TotalRecs, $sys_country_list->RecRange, $sys_country_list->AutoHidePager) ?>
<?php if ($sys_country_list->Pager->RecordCount > 0 && $sys_country_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_country_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_country_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_country_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_country_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_country_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_country_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_country_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_country_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_country_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_country_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_country_list->TotalRecs > 0 && (!$sys_country_list->AutoHidePageSizeSelector || $sys_country_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_country">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_country_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_country_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_country_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_country_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_country_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_country_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_country->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_country_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fsys_countrylist" id="fsys_countrylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_country_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_country_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_country">
<div id="gmp_sys_country" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($sys_country_list->TotalRecs > 0 || $sys_country->isGridEdit()) { ?>
<table id="tbl_sys_countrylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$sys_country_list->RowType = ROWTYPE_HEADER;

// Render list options
$sys_country_list->renderListOptions();

// Render list options (header, left)
$sys_country_list->ListOptions->render("header", "left");
?>
<?php if ($sys_country->id->Visible) { // id ?>
	<?php if ($sys_country->sortUrl($sys_country->id) == "") { ?>
		<th data-name="id" class="<?php echo $sys_country->id->headerCellClass() ?>"><div id="elh_sys_country_id" class="sys_country_id"><div class="ew-table-header-caption"><?php echo $sys_country->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $sys_country->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_country->SortUrl($sys_country->id) ?>',1);"><div id="elh_sys_country_id" class="sys_country_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_country->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_country->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_country->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_country->code->Visible) { // code ?>
	<?php if ($sys_country->sortUrl($sys_country->code) == "") { ?>
		<th data-name="code" class="<?php echo $sys_country->code->headerCellClass() ?>"><div id="elh_sys_country_code" class="sys_country_code"><div class="ew-table-header-caption"><?php echo $sys_country->code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="code" class="<?php echo $sys_country->code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_country->SortUrl($sys_country->code) ?>',1);"><div id="elh_sys_country_code" class="sys_country_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_country->code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_country->code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_country->code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_country->namecap->Visible) { // namecap ?>
	<?php if ($sys_country->sortUrl($sys_country->namecap) == "") { ?>
		<th data-name="namecap" class="<?php echo $sys_country->namecap->headerCellClass() ?>"><div id="elh_sys_country_namecap" class="sys_country_namecap"><div class="ew-table-header-caption"><?php echo $sys_country->namecap->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="namecap" class="<?php echo $sys_country->namecap->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_country->SortUrl($sys_country->namecap) ?>',1);"><div id="elh_sys_country_namecap" class="sys_country_namecap">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_country->namecap->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_country->namecap->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_country->namecap->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_country->name->Visible) { // name ?>
	<?php if ($sys_country->sortUrl($sys_country->name) == "") { ?>
		<th data-name="name" class="<?php echo $sys_country->name->headerCellClass() ?>"><div id="elh_sys_country_name" class="sys_country_name"><div class="ew-table-header-caption"><?php echo $sys_country->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $sys_country->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_country->SortUrl($sys_country->name) ?>',1);"><div id="elh_sys_country_name" class="sys_country_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_country->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_country->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_country->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_country->iso3->Visible) { // iso3 ?>
	<?php if ($sys_country->sortUrl($sys_country->iso3) == "") { ?>
		<th data-name="iso3" class="<?php echo $sys_country->iso3->headerCellClass() ?>"><div id="elh_sys_country_iso3" class="sys_country_iso3"><div class="ew-table-header-caption"><?php echo $sys_country->iso3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iso3" class="<?php echo $sys_country->iso3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_country->SortUrl($sys_country->iso3) ?>',1);"><div id="elh_sys_country_iso3" class="sys_country_iso3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_country->iso3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($sys_country->iso3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_country->iso3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($sys_country->numcode->Visible) { // numcode ?>
	<?php if ($sys_country->sortUrl($sys_country->numcode) == "") { ?>
		<th data-name="numcode" class="<?php echo $sys_country->numcode->headerCellClass() ?>"><div id="elh_sys_country_numcode" class="sys_country_numcode"><div class="ew-table-header-caption"><?php echo $sys_country->numcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="numcode" class="<?php echo $sys_country->numcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $sys_country->SortUrl($sys_country->numcode) ?>',1);"><div id="elh_sys_country_numcode" class="sys_country_numcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $sys_country->numcode->caption() ?></span><span class="ew-table-header-sort"><?php if ($sys_country->numcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($sys_country->numcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$sys_country_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($sys_country->ExportAll && $sys_country->isExport()) {
	$sys_country_list->StopRec = $sys_country_list->TotalRecs;
} else {

	// Set the last record to display
	if ($sys_country_list->TotalRecs > $sys_country_list->StartRec + $sys_country_list->DisplayRecs - 1)
		$sys_country_list->StopRec = $sys_country_list->StartRec + $sys_country_list->DisplayRecs - 1;
	else
		$sys_country_list->StopRec = $sys_country_list->TotalRecs;
}
$sys_country_list->RecCnt = $sys_country_list->StartRec - 1;
if ($sys_country_list->Recordset && !$sys_country_list->Recordset->EOF) {
	$sys_country_list->Recordset->moveFirst();
	$selectLimit = $sys_country_list->UseSelectLimit;
	if (!$selectLimit && $sys_country_list->StartRec > 1)
		$sys_country_list->Recordset->move($sys_country_list->StartRec - 1);
} elseif (!$sys_country->AllowAddDeleteRow && $sys_country_list->StopRec == 0) {
	$sys_country_list->StopRec = $sys_country->GridAddRowCount;
}

// Initialize aggregate
$sys_country->RowType = ROWTYPE_AGGREGATEINIT;
$sys_country->resetAttributes();
$sys_country_list->renderRow();
while ($sys_country_list->RecCnt < $sys_country_list->StopRec) {
	$sys_country_list->RecCnt++;
	if ($sys_country_list->RecCnt >= $sys_country_list->StartRec) {
		$sys_country_list->RowCnt++;

		// Set up key count
		$sys_country_list->KeyCount = $sys_country_list->RowIndex;

		// Init row class and style
		$sys_country->resetAttributes();
		$sys_country->CssClass = "";
		if ($sys_country->isGridAdd()) {
		} else {
			$sys_country_list->loadRowValues($sys_country_list->Recordset); // Load row values
		}
		$sys_country->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$sys_country->RowAttrs = array_merge($sys_country->RowAttrs, array('data-rowindex'=>$sys_country_list->RowCnt, 'id'=>'r' . $sys_country_list->RowCnt . '_sys_country', 'data-rowtype'=>$sys_country->RowType));

		// Render row
		$sys_country_list->renderRow();

		// Render list options
		$sys_country_list->renderListOptions();
?>
	<tr<?php echo $sys_country->rowAttributes() ?>>
<?php

// Render list options (body, left)
$sys_country_list->ListOptions->render("body", "left", $sys_country_list->RowCnt);
?>
	<?php if ($sys_country->id->Visible) { // id ?>
		<td data-name="id"<?php echo $sys_country->id->cellAttributes() ?>>
<span id="el<?php echo $sys_country_list->RowCnt ?>_sys_country_id" class="sys_country_id">
<span<?php echo $sys_country->id->viewAttributes() ?>>
<?php echo $sys_country->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_country->code->Visible) { // code ?>
		<td data-name="code"<?php echo $sys_country->code->cellAttributes() ?>>
<span id="el<?php echo $sys_country_list->RowCnt ?>_sys_country_code" class="sys_country_code">
<span<?php echo $sys_country->code->viewAttributes() ?>>
<?php echo $sys_country->code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_country->namecap->Visible) { // namecap ?>
		<td data-name="namecap"<?php echo $sys_country->namecap->cellAttributes() ?>>
<span id="el<?php echo $sys_country_list->RowCnt ?>_sys_country_namecap" class="sys_country_namecap">
<span<?php echo $sys_country->namecap->viewAttributes() ?>>
<?php echo $sys_country->namecap->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_country->name->Visible) { // name ?>
		<td data-name="name"<?php echo $sys_country->name->cellAttributes() ?>>
<span id="el<?php echo $sys_country_list->RowCnt ?>_sys_country_name" class="sys_country_name">
<span<?php echo $sys_country->name->viewAttributes() ?>>
<?php echo $sys_country->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_country->iso3->Visible) { // iso3 ?>
		<td data-name="iso3"<?php echo $sys_country->iso3->cellAttributes() ?>>
<span id="el<?php echo $sys_country_list->RowCnt ?>_sys_country_iso3" class="sys_country_iso3">
<span<?php echo $sys_country->iso3->viewAttributes() ?>>
<?php echo $sys_country->iso3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($sys_country->numcode->Visible) { // numcode ?>
		<td data-name="numcode"<?php echo $sys_country->numcode->cellAttributes() ?>>
<span id="el<?php echo $sys_country_list->RowCnt ?>_sys_country_numcode" class="sys_country_numcode">
<span<?php echo $sys_country->numcode->viewAttributes() ?>>
<?php echo $sys_country->numcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$sys_country_list->ListOptions->render("body", "right", $sys_country_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$sys_country->isGridAdd())
		$sys_country_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$sys_country->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($sys_country_list->Recordset)
	$sys_country_list->Recordset->Close();
?>
<?php if (!$sys_country->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$sys_country->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($sys_country_list->Pager)) $sys_country_list->Pager = new NumericPager($sys_country_list->StartRec, $sys_country_list->DisplayRecs, $sys_country_list->TotalRecs, $sys_country_list->RecRange, $sys_country_list->AutoHidePager) ?>
<?php if ($sys_country_list->Pager->RecordCount > 0 && $sys_country_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($sys_country_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($sys_country_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($sys_country_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $sys_country_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($sys_country_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($sys_country_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $sys_country_list->pageUrl() ?>start=<?php echo $sys_country_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($sys_country_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $sys_country_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $sys_country_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $sys_country_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($sys_country_list->TotalRecs > 0 && (!$sys_country_list->AutoHidePageSizeSelector || $sys_country_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="sys_country">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($sys_country_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($sys_country_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($sys_country_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($sys_country_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($sys_country_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($sys_country_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($sys_country->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $sys_country_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($sys_country_list->TotalRecs == 0 && !$sys_country->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $sys_country_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$sys_country_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_country->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$sys_country->isExport()) { ?>
<script>
ew.scrollableTable("gmp_sys_country", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_country_list->terminate();
?>