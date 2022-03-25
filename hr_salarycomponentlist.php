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
$hr_salarycomponent_list = new hr_salarycomponent_list();

// Run the page
$hr_salarycomponent_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_salarycomponent_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_salarycomponentlist = currentForm = new ew.Form("fhr_salarycomponentlist", "list");
fhr_salarycomponentlist.formKeyCountName = '<?php echo $hr_salarycomponent_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_salarycomponentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_salarycomponentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhr_salarycomponentlistsrch = currentSearchForm = new ew.Form("fhr_salarycomponentlistsrch");

// Filters
fhr_salarycomponentlistsrch.filterList = <?php echo $hr_salarycomponent_list->getFilterList() ?>;
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
<?php if (!$hr_salarycomponent->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_salarycomponent_list->TotalRecs > 0 && $hr_salarycomponent_list->ExportOptions->visible()) { ?>
<?php $hr_salarycomponent_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_salarycomponent_list->ImportOptions->visible()) { ?>
<?php $hr_salarycomponent_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_salarycomponent_list->SearchOptions->visible()) { ?>
<?php $hr_salarycomponent_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_salarycomponent_list->FilterOptions->visible()) { ?>
<?php $hr_salarycomponent_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_salarycomponent_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_salarycomponent->isExport() && !$hr_salarycomponent->CurrentAction) { ?>
<form name="fhr_salarycomponentlistsrch" id="fhr_salarycomponentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_salarycomponent_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_salarycomponentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_salarycomponent">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_salarycomponent_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_salarycomponent_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_salarycomponent_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_salarycomponent_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_salarycomponent_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_salarycomponent_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_salarycomponent_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_salarycomponent_list->showPageHeader(); ?>
<?php
$hr_salarycomponent_list->showMessage();
?>
<?php if ($hr_salarycomponent_list->TotalRecs > 0 || $hr_salarycomponent->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_salarycomponent_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_salarycomponent">
<?php if (!$hr_salarycomponent->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_salarycomponent->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_salarycomponent_list->Pager)) $hr_salarycomponent_list->Pager = new NumericPager($hr_salarycomponent_list->StartRec, $hr_salarycomponent_list->DisplayRecs, $hr_salarycomponent_list->TotalRecs, $hr_salarycomponent_list->RecRange, $hr_salarycomponent_list->AutoHidePager) ?>
<?php if ($hr_salarycomponent_list->Pager->RecordCount > 0 && $hr_salarycomponent_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_salarycomponent_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_salarycomponent_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_salarycomponent_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_salarycomponent_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_salarycomponent_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_salarycomponent_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_salarycomponent_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_salarycomponent_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_salarycomponent_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_salarycomponent_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_salarycomponent_list->TotalRecs > 0 && (!$hr_salarycomponent_list->AutoHidePageSizeSelector || $hr_salarycomponent_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_salarycomponent">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_salarycomponent_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_salarycomponent_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_salarycomponent_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_salarycomponent_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_salarycomponent_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_salarycomponent_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_salarycomponent->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_salarycomponent_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_salarycomponentlist" id="fhr_salarycomponentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_salarycomponent_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_salarycomponent_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponent">
<div id="gmp_hr_salarycomponent" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_salarycomponent_list->TotalRecs > 0 || $hr_salarycomponent->isGridEdit()) { ?>
<table id="tbl_hr_salarycomponentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_salarycomponent_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_salarycomponent_list->renderListOptions();

// Render list options (header, left)
$hr_salarycomponent_list->ListOptions->render("header", "left");
?>
<?php if ($hr_salarycomponent->id->Visible) { // id ?>
	<?php if ($hr_salarycomponent->sortUrl($hr_salarycomponent->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_salarycomponent->id->headerCellClass() ?>"><div id="elh_hr_salarycomponent_id" class="hr_salarycomponent_id"><div class="ew-table-header-caption"><?php echo $hr_salarycomponent->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_salarycomponent->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_salarycomponent->SortUrl($hr_salarycomponent->id) ?>',1);"><div id="elh_hr_salarycomponent_id" class="hr_salarycomponent_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_salarycomponent->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_salarycomponent->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_salarycomponent->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_salarycomponent->name->Visible) { // name ?>
	<?php if ($hr_salarycomponent->sortUrl($hr_salarycomponent->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_salarycomponent->name->headerCellClass() ?>"><div id="elh_hr_salarycomponent_name" class="hr_salarycomponent_name"><div class="ew-table-header-caption"><?php echo $hr_salarycomponent->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_salarycomponent->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_salarycomponent->SortUrl($hr_salarycomponent->name) ?>',1);"><div id="elh_hr_salarycomponent_name" class="hr_salarycomponent_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_salarycomponent->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_salarycomponent->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_salarycomponent->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_salarycomponent->componentType->Visible) { // componentType ?>
	<?php if ($hr_salarycomponent->sortUrl($hr_salarycomponent->componentType) == "") { ?>
		<th data-name="componentType" class="<?php echo $hr_salarycomponent->componentType->headerCellClass() ?>"><div id="elh_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType"><div class="ew-table-header-caption"><?php echo $hr_salarycomponent->componentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="componentType" class="<?php echo $hr_salarycomponent->componentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_salarycomponent->SortUrl($hr_salarycomponent->componentType) ?>',1);"><div id="elh_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_salarycomponent->componentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_salarycomponent->componentType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_salarycomponent->componentType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_salarycomponent->details->Visible) { // details ?>
	<?php if ($hr_salarycomponent->sortUrl($hr_salarycomponent->details) == "") { ?>
		<th data-name="details" class="<?php echo $hr_salarycomponent->details->headerCellClass() ?>"><div id="elh_hr_salarycomponent_details" class="hr_salarycomponent_details"><div class="ew-table-header-caption"><?php echo $hr_salarycomponent->details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="details" class="<?php echo $hr_salarycomponent->details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_salarycomponent->SortUrl($hr_salarycomponent->details) ?>',1);"><div id="elh_hr_salarycomponent_details" class="hr_salarycomponent_details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_salarycomponent->details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_salarycomponent->details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_salarycomponent->details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_salarycomponent->HospID->Visible) { // HospID ?>
	<?php if ($hr_salarycomponent->sortUrl($hr_salarycomponent->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_salarycomponent->HospID->headerCellClass() ?>"><div id="elh_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID"><div class="ew-table-header-caption"><?php echo $hr_salarycomponent->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_salarycomponent->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_salarycomponent->SortUrl($hr_salarycomponent->HospID) ?>',1);"><div id="elh_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_salarycomponent->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_salarycomponent->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_salarycomponent->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_salarycomponent_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_salarycomponent->ExportAll && $hr_salarycomponent->isExport()) {
	$hr_salarycomponent_list->StopRec = $hr_salarycomponent_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_salarycomponent_list->TotalRecs > $hr_salarycomponent_list->StartRec + $hr_salarycomponent_list->DisplayRecs - 1)
		$hr_salarycomponent_list->StopRec = $hr_salarycomponent_list->StartRec + $hr_salarycomponent_list->DisplayRecs - 1;
	else
		$hr_salarycomponent_list->StopRec = $hr_salarycomponent_list->TotalRecs;
}
$hr_salarycomponent_list->RecCnt = $hr_salarycomponent_list->StartRec - 1;
if ($hr_salarycomponent_list->Recordset && !$hr_salarycomponent_list->Recordset->EOF) {
	$hr_salarycomponent_list->Recordset->moveFirst();
	$selectLimit = $hr_salarycomponent_list->UseSelectLimit;
	if (!$selectLimit && $hr_salarycomponent_list->StartRec > 1)
		$hr_salarycomponent_list->Recordset->move($hr_salarycomponent_list->StartRec - 1);
} elseif (!$hr_salarycomponent->AllowAddDeleteRow && $hr_salarycomponent_list->StopRec == 0) {
	$hr_salarycomponent_list->StopRec = $hr_salarycomponent->GridAddRowCount;
}

// Initialize aggregate
$hr_salarycomponent->RowType = ROWTYPE_AGGREGATEINIT;
$hr_salarycomponent->resetAttributes();
$hr_salarycomponent_list->renderRow();
while ($hr_salarycomponent_list->RecCnt < $hr_salarycomponent_list->StopRec) {
	$hr_salarycomponent_list->RecCnt++;
	if ($hr_salarycomponent_list->RecCnt >= $hr_salarycomponent_list->StartRec) {
		$hr_salarycomponent_list->RowCnt++;

		// Set up key count
		$hr_salarycomponent_list->KeyCount = $hr_salarycomponent_list->RowIndex;

		// Init row class and style
		$hr_salarycomponent->resetAttributes();
		$hr_salarycomponent->CssClass = "";
		if ($hr_salarycomponent->isGridAdd()) {
		} else {
			$hr_salarycomponent_list->loadRowValues($hr_salarycomponent_list->Recordset); // Load row values
		}
		$hr_salarycomponent->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_salarycomponent->RowAttrs = array_merge($hr_salarycomponent->RowAttrs, array('data-rowindex'=>$hr_salarycomponent_list->RowCnt, 'id'=>'r' . $hr_salarycomponent_list->RowCnt . '_hr_salarycomponent', 'data-rowtype'=>$hr_salarycomponent->RowType));

		// Render row
		$hr_salarycomponent_list->renderRow();

		// Render list options
		$hr_salarycomponent_list->renderListOptions();
?>
	<tr<?php echo $hr_salarycomponent->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_salarycomponent_list->ListOptions->render("body", "left", $hr_salarycomponent_list->RowCnt);
?>
	<?php if ($hr_salarycomponent->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_salarycomponent->id->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_list->RowCnt ?>_hr_salarycomponent_id" class="hr_salarycomponent_id">
<span<?php echo $hr_salarycomponent->id->viewAttributes() ?>>
<?php echo $hr_salarycomponent->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_salarycomponent->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_salarycomponent->name->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_list->RowCnt ?>_hr_salarycomponent_name" class="hr_salarycomponent_name">
<span<?php echo $hr_salarycomponent->name->viewAttributes() ?>>
<?php echo $hr_salarycomponent->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_salarycomponent->componentType->Visible) { // componentType ?>
		<td data-name="componentType"<?php echo $hr_salarycomponent->componentType->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_list->RowCnt ?>_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType">
<span<?php echo $hr_salarycomponent->componentType->viewAttributes() ?>>
<?php echo $hr_salarycomponent->componentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_salarycomponent->details->Visible) { // details ?>
		<td data-name="details"<?php echo $hr_salarycomponent->details->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_list->RowCnt ?>_hr_salarycomponent_details" class="hr_salarycomponent_details">
<span<?php echo $hr_salarycomponent->details->viewAttributes() ?>>
<?php echo $hr_salarycomponent->details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_salarycomponent->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_salarycomponent->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_list->RowCnt ?>_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID">
<span<?php echo $hr_salarycomponent->HospID->viewAttributes() ?>>
<?php echo $hr_salarycomponent->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_salarycomponent_list->ListOptions->render("body", "right", $hr_salarycomponent_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_salarycomponent->isGridAdd())
		$hr_salarycomponent_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_salarycomponent->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_salarycomponent_list->Recordset)
	$hr_salarycomponent_list->Recordset->Close();
?>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_salarycomponent->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_salarycomponent_list->Pager)) $hr_salarycomponent_list->Pager = new NumericPager($hr_salarycomponent_list->StartRec, $hr_salarycomponent_list->DisplayRecs, $hr_salarycomponent_list->TotalRecs, $hr_salarycomponent_list->RecRange, $hr_salarycomponent_list->AutoHidePager) ?>
<?php if ($hr_salarycomponent_list->Pager->RecordCount > 0 && $hr_salarycomponent_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_salarycomponent_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_salarycomponent_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_salarycomponent_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_salarycomponent_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_salarycomponent_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_salarycomponent_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_salarycomponent_list->pageUrl() ?>start=<?php echo $hr_salarycomponent_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_salarycomponent_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_salarycomponent_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_salarycomponent_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_salarycomponent_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_salarycomponent_list->TotalRecs > 0 && (!$hr_salarycomponent_list->AutoHidePageSizeSelector || $hr_salarycomponent_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_salarycomponent">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_salarycomponent_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_salarycomponent_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_salarycomponent_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_salarycomponent_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_salarycomponent_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_salarycomponent_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_salarycomponent->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_salarycomponent_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_salarycomponent_list->TotalRecs == 0 && !$hr_salarycomponent->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_salarycomponent_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_salarycomponent_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_salarycomponent->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_salarycomponent", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_salarycomponent_list->terminate();
?>