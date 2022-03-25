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
$report_revenue_list = new report_revenue_list();

// Run the page
$report_revenue_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$report_revenue_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$report_revenue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var freport_revenuelist = currentForm = new ew.Form("freport_revenuelist", "list");
freport_revenuelist.formKeyCountName = '<?php echo $report_revenue_list->FormKeyCountName ?>';

// Form_CustomValidate event
freport_revenuelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freport_revenuelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var freport_revenuelistsrch = currentSearchForm = new ew.Form("freport_revenuelistsrch");

// Validate function for search
freport_revenuelistsrch.validate = function(fobj) {
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
freport_revenuelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freport_revenuelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

freport_revenuelistsrch.filterList = <?php echo $report_revenue_list->getFilterList() ?>;
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
<?php if (!$report_revenue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($report_revenue_list->TotalRecs > 0 && $report_revenue_list->ExportOptions->visible()) { ?>
<?php $report_revenue_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($report_revenue_list->ImportOptions->visible()) { ?>
<?php $report_revenue_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($report_revenue_list->SearchOptions->visible()) { ?>
<?php $report_revenue_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($report_revenue_list->FilterOptions->visible()) { ?>
<?php $report_revenue_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$report_revenue_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$report_revenue->isExport() && !$report_revenue->CurrentAction) { ?>
<form name="freport_revenuelistsrch" id="freport_revenuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($report_revenue_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="freport_revenuelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="report_revenue">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$report_revenue_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$report_revenue->RowType = ROWTYPE_SEARCH;

// Render row
$report_revenue->resetAttributes();
$report_revenue_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($report_revenue->Date->Visible) { // Date ?>
	<div id="xsc_Date" class="ew-cell form-group">
		<label for="x_Date" class="ew-search-caption ew-label"><?php echo $report_revenue->Date->caption() ?></label>
		<span class="ew-search-operator"><select name="z_Date" id="z_Date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($report_revenue->Date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="report_revenue" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($report_revenue->Date->getPlaceHolder()) ?>" value="<?php echo $report_revenue->Date->EditValue ?>"<?php echo $report_revenue->Date->editAttributes() ?>>
<?php if (!$report_revenue->Date->ReadOnly && !$report_revenue->Date->Disabled && !isset($report_revenue->Date->EditAttrs["readonly"]) && !isset($report_revenue->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("freport_revenuelistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_Date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_Date style="d-none"">
<input type="text" data-table="report_revenue" data-field="x_Date" data-format="7" name="y_Date" id="y_Date" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($report_revenue->Date->getPlaceHolder()) ?>" value="<?php echo $report_revenue->Date->EditValue2 ?>"<?php echo $report_revenue->Date->editAttributes() ?>>
<?php if (!$report_revenue->Date->ReadOnly && !$report_revenue->Date->Disabled && !isset($report_revenue->Date->EditAttrs["readonly"]) && !isset($report_revenue->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("freport_revenuelistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($report_revenue_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($report_revenue_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $report_revenue_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($report_revenue_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($report_revenue_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($report_revenue_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($report_revenue_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $report_revenue_list->showPageHeader(); ?>
<?php
$report_revenue_list->showMessage();
?>
<?php if ($report_revenue_list->TotalRecs > 0 || $report_revenue->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($report_revenue_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> report_revenue">
<?php if (!$report_revenue->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$report_revenue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($report_revenue_list->Pager)) $report_revenue_list->Pager = new NumericPager($report_revenue_list->StartRec, $report_revenue_list->DisplayRecs, $report_revenue_list->TotalRecs, $report_revenue_list->RecRange, $report_revenue_list->AutoHidePager) ?>
<?php if ($report_revenue_list->Pager->RecordCount > 0 && $report_revenue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($report_revenue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($report_revenue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($report_revenue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $report_revenue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($report_revenue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($report_revenue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($report_revenue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $report_revenue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $report_revenue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $report_revenue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($report_revenue_list->TotalRecs > 0 && (!$report_revenue_list->AutoHidePageSizeSelector || $report_revenue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="report_revenue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($report_revenue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($report_revenue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($report_revenue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($report_revenue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($report_revenue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($report_revenue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($report_revenue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $report_revenue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="freport_revenuelist" id="freport_revenuelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($report_revenue_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $report_revenue_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="report_revenue">
<div id="gmp_report_revenue" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($report_revenue_list->TotalRecs > 0 || $report_revenue->isGridEdit()) { ?>
<table id="tbl_report_revenuelist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$report_revenue_list->RowType = ROWTYPE_HEADER;

// Render list options
$report_revenue_list->renderListOptions();

// Render list options (header, left)
$report_revenue_list->ListOptions->render("header", "left", "", "block", $report_revenue->TableVar, "report_revenuelist");
?>
<?php if ($report_revenue->id->Visible) { // id ?>
	<?php if ($report_revenue->sortUrl($report_revenue->id) == "") { ?>
		<th data-name="id" class="<?php echo $report_revenue->id->headerCellClass() ?>"><div id="elh_report_revenue_id" class="report_revenue_id"><div class="ew-table-header-caption"><script id="tpc_report_revenue_id" class="report_revenuelist" type="text/html"><span><?php echo $report_revenue->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $report_revenue->id->headerCellClass() ?>"><script id="tpc_report_revenue_id" class="report_revenuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $report_revenue->SortUrl($report_revenue->id) ?>',1);"><div id="elh_report_revenue_id" class="report_revenue_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $report_revenue->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($report_revenue->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($report_revenue->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($report_revenue->Date->Visible) { // Date ?>
	<?php if ($report_revenue->sortUrl($report_revenue->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $report_revenue->Date->headerCellClass() ?>"><div id="elh_report_revenue_Date" class="report_revenue_Date"><div class="ew-table-header-caption"><script id="tpc_report_revenue_Date" class="report_revenuelist" type="text/html"><span><?php echo $report_revenue->Date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $report_revenue->Date->headerCellClass() ?>"><script id="tpc_report_revenue_Date" class="report_revenuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $report_revenue->SortUrl($report_revenue->Date) ?>',1);"><div id="elh_report_revenue_Date" class="report_revenue_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $report_revenue->Date->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($report_revenue->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($report_revenue->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($report_revenue->Amount->Visible) { // Amount ?>
	<?php if ($report_revenue->sortUrl($report_revenue->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $report_revenue->Amount->headerCellClass() ?>"><div id="elh_report_revenue_Amount" class="report_revenue_Amount"><div class="ew-table-header-caption"><script id="tpc_report_revenue_Amount" class="report_revenuelist" type="text/html"><span><?php echo $report_revenue->Amount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $report_revenue->Amount->headerCellClass() ?>"><script id="tpc_report_revenue_Amount" class="report_revenuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $report_revenue->SortUrl($report_revenue->Amount) ?>',1);"><div id="elh_report_revenue_Amount" class="report_revenue_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $report_revenue->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($report_revenue->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($report_revenue->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($report_revenue->HospID->Visible) { // HospID ?>
	<?php if ($report_revenue->sortUrl($report_revenue->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $report_revenue->HospID->headerCellClass() ?>"><div id="elh_report_revenue_HospID" class="report_revenue_HospID"><div class="ew-table-header-caption"><script id="tpc_report_revenue_HospID" class="report_revenuelist" type="text/html"><span><?php echo $report_revenue->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $report_revenue->HospID->headerCellClass() ?>"><script id="tpc_report_revenue_HospID" class="report_revenuelist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $report_revenue->SortUrl($report_revenue->HospID) ?>',1);"><div id="elh_report_revenue_HospID" class="report_revenue_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $report_revenue->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($report_revenue->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($report_revenue->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$report_revenue_list->ListOptions->render("header", "right", "", "block", $report_revenue->TableVar, "report_revenuelist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($report_revenue->ExportAll && $report_revenue->isExport()) {
	$report_revenue_list->StopRec = $report_revenue_list->TotalRecs;
} else {

	// Set the last record to display
	if ($report_revenue_list->TotalRecs > $report_revenue_list->StartRec + $report_revenue_list->DisplayRecs - 1)
		$report_revenue_list->StopRec = $report_revenue_list->StartRec + $report_revenue_list->DisplayRecs - 1;
	else
		$report_revenue_list->StopRec = $report_revenue_list->TotalRecs;
}
$report_revenue_list->RecCnt = $report_revenue_list->StartRec - 1;
if ($report_revenue_list->Recordset && !$report_revenue_list->Recordset->EOF) {
	$report_revenue_list->Recordset->moveFirst();
	$selectLimit = $report_revenue_list->UseSelectLimit;
	if (!$selectLimit && $report_revenue_list->StartRec > 1)
		$report_revenue_list->Recordset->move($report_revenue_list->StartRec - 1);
} elseif (!$report_revenue->AllowAddDeleteRow && $report_revenue_list->StopRec == 0) {
	$report_revenue_list->StopRec = $report_revenue->GridAddRowCount;
}

// Initialize aggregate
$report_revenue->RowType = ROWTYPE_AGGREGATEINIT;
$report_revenue->resetAttributes();
$report_revenue_list->renderRow();
while ($report_revenue_list->RecCnt < $report_revenue_list->StopRec) {
	$report_revenue_list->RecCnt++;
	if ($report_revenue_list->RecCnt >= $report_revenue_list->StartRec) {
		$report_revenue_list->RowCnt++;

		// Set up key count
		$report_revenue_list->KeyCount = $report_revenue_list->RowIndex;

		// Init row class and style
		$report_revenue->resetAttributes();
		$report_revenue->CssClass = "";
		if ($report_revenue->isGridAdd()) {
		} else {
			$report_revenue_list->loadRowValues($report_revenue_list->Recordset); // Load row values
		}
		$report_revenue->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$report_revenue->RowAttrs = array_merge($report_revenue->RowAttrs, array('data-rowindex'=>$report_revenue_list->RowCnt, 'id'=>'r' . $report_revenue_list->RowCnt . '_report_revenue', 'data-rowtype'=>$report_revenue->RowType));

		// Render row
		$report_revenue_list->renderRow();

		// Render list options
		$report_revenue_list->renderListOptions();

		// Save row and cell attributes
		$report_revenue_list->Attrs[$report_revenue_list->RowCnt] = array("row_attrs" => $report_revenue->rowAttributes(), "cell_attrs" => array());
		$report_revenue_list->Attrs[$report_revenue_list->RowCnt]["cell_attrs"] = $report_revenue->fieldCellAttributes();
?>
	<tr<?php echo $report_revenue->rowAttributes() ?>>
<?php

// Render list options (body, left)
$report_revenue_list->ListOptions->render("body", "left", $report_revenue_list->RowCnt, "block", $report_revenue->TableVar, "report_revenuelist");
?>
	<?php if ($report_revenue->id->Visible) { // id ?>
		<td data-name="id"<?php echo $report_revenue->id->cellAttributes() ?>>
<script id="tpx<?php echo $report_revenue_list->RowCnt ?>_report_revenue_id" class="report_revenuelist" type="text/html">
<span id="el<?php echo $report_revenue_list->RowCnt ?>_report_revenue_id" class="report_revenue_id">
<span<?php echo $report_revenue->id->viewAttributes() ?>>
<?php echo $report_revenue->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($report_revenue->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $report_revenue->Date->cellAttributes() ?>>
<script id="tpx<?php echo $report_revenue_list->RowCnt ?>_report_revenue_Date" class="report_revenuelist" type="text/html">
<span id="el<?php echo $report_revenue_list->RowCnt ?>_report_revenue_Date" class="report_revenue_Date">
<span<?php echo $report_revenue->Date->viewAttributes() ?>>
<?php echo $report_revenue->Date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($report_revenue->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $report_revenue->Amount->cellAttributes() ?>>
<script id="tpx<?php echo $report_revenue_list->RowCnt ?>_report_revenue_Amount" class="report_revenuelist" type="text/html">
<span id="el<?php echo $report_revenue_list->RowCnt ?>_report_revenue_Amount" class="report_revenue_Amount">
<span<?php echo $report_revenue->Amount->viewAttributes() ?>>
<?php echo $report_revenue->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($report_revenue->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $report_revenue->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $report_revenue_list->RowCnt ?>_report_revenue_HospID" class="report_revenuelist" type="text/html">
<span id="el<?php echo $report_revenue_list->RowCnt ?>_report_revenue_HospID" class="report_revenue_HospID">
<span<?php echo $report_revenue->HospID->viewAttributes() ?>>
<?php echo $report_revenue->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$report_revenue_list->ListOptions->render("body", "right", $report_revenue_list->RowCnt, "block", $report_revenue->TableVar, "report_revenuelist");
?>
	</tr>
<?php
	}
	if (!$report_revenue->isGridAdd())
		$report_revenue_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$report_revenue->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_report_revenuelist" class="ew-custom-template"></div>
<script id="tpm_report_revenuelist" type="text/html">
<div id="ct_report_revenue_list"><?php if ($report_revenue_list->RowCnt > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $report_revenue_list->StartRowCnt; $i <= $report_revenue_list->RowCnt; $i++) { ?>
  <tr>
	 	<h3 class="card-title">Deptment Wise</h3>
	</tr>
<?php } ?>
</tbody>
  <?php if ($report_revenue_list->TotalRecs > 0 && !$report_revenue->isGridAdd() && !$report_revenue->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
	</div>
</div>	
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($report_revenue_list->Recordset)
	$report_revenue_list->Recordset->Close();
?>
<?php if (!$report_revenue->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$report_revenue->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($report_revenue_list->Pager)) $report_revenue_list->Pager = new NumericPager($report_revenue_list->StartRec, $report_revenue_list->DisplayRecs, $report_revenue_list->TotalRecs, $report_revenue_list->RecRange, $report_revenue_list->AutoHidePager) ?>
<?php if ($report_revenue_list->Pager->RecordCount > 0 && $report_revenue_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($report_revenue_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($report_revenue_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($report_revenue_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $report_revenue_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($report_revenue_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($report_revenue_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $report_revenue_list->pageUrl() ?>start=<?php echo $report_revenue_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($report_revenue_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $report_revenue_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $report_revenue_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $report_revenue_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($report_revenue_list->TotalRecs > 0 && (!$report_revenue_list->AutoHidePageSizeSelector || $report_revenue_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="report_revenue">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($report_revenue_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($report_revenue_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($report_revenue_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($report_revenue_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($report_revenue_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($report_revenue_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($report_revenue->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $report_revenue_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($report_revenue_list->TotalRecs == 0 && !$report_revenue->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $report_revenue_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($report_revenue->Rows) ?> };
ew.applyTemplate("tpd_report_revenuelist", "tpm_report_revenuelist", "report_revenuelist", "<?php echo $report_revenue->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_report_revenuelist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_report_revenuelist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.report_revenuelist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$report_revenue_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$report_revenue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$report_revenue->isExport()) { ?>
<script>
ew.scrollableTable("gmp_report_revenue", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$report_revenue_list->terminate();
?>