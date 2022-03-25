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
$pharmacy_services_list = new pharmacy_services_list();

// Run the page
$pharmacy_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_serviceslist = currentForm = new ew.Form("fpharmacy_serviceslist", "list");
fpharmacy_serviceslist.formKeyCountName = '<?php echo $pharmacy_services_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_serviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_serviceslist.lists["x_pharmacy_id"] = <?php echo $pharmacy_services_list->pharmacy_id->Lookup->toClientList() ?>;
fpharmacy_serviceslist.lists["x_pharmacy_id"].options = <?php echo JsonEncode($pharmacy_services_list->pharmacy_id->lookupOptions()) ?>;
fpharmacy_serviceslist.lists["x_name"] = <?php echo $pharmacy_services_list->name->Lookup->toClientList() ?>;
fpharmacy_serviceslist.lists["x_name"].options = <?php echo JsonEncode($pharmacy_services_list->name->lookupOptions()) ?>;
fpharmacy_serviceslist.lists["x_status"] = <?php echo $pharmacy_services_list->status->Lookup->toClientList() ?>;
fpharmacy_serviceslist.lists["x_status"].options = <?php echo JsonEncode($pharmacy_services_list->status->lookupOptions()) ?>;

// Form object for search
var fpharmacy_serviceslistsrch = currentSearchForm = new ew.Form("fpharmacy_serviceslistsrch");

// Filters
fpharmacy_serviceslistsrch.filterList = <?php echo $pharmacy_services_list->getFilterList() ?>;
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
<?php if (!$pharmacy_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_services_list->TotalRecs > 0 && $pharmacy_services_list->ExportOptions->visible()) { ?>
<?php $pharmacy_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_services_list->ImportOptions->visible()) { ?>
<?php $pharmacy_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_services_list->SearchOptions->visible()) { ?>
<?php $pharmacy_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_services_list->FilterOptions->visible()) { ?>
<?php $pharmacy_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$pharmacy_services->isExport() || EXPORT_MASTER_RECORD && $pharmacy_services->isExport("print")) { ?>
<?php
if ($pharmacy_services_list->DbMasterFilter <> "" && $pharmacy_services->getCurrentMasterTable() == "pharmacy") {
	if ($pharmacy_services_list->MasterRecordExists) {
		include_once "pharmacymaster.php";
	}
}
?>
<?php
if ($pharmacy_services_list->DbMasterFilter <> "" && $pharmacy_services->getCurrentMasterTable() == "mas_pharmacy") {
	if ($pharmacy_services_list->MasterRecordExists) {
		include_once "mas_pharmacymaster.php";
	}
}
?>
<?php } ?>
<?php
$pharmacy_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_services->isExport() && !$pharmacy_services->CurrentAction) { ?>
<form name="fpharmacy_serviceslistsrch" id="fpharmacy_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_serviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_services">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_services_list->showPageHeader(); ?>
<?php
$pharmacy_services_list->showMessage();
?>
<?php if ($pharmacy_services_list->TotalRecs > 0 || $pharmacy_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_services">
<?php if (!$pharmacy_services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_services_list->Pager)) $pharmacy_services_list->Pager = new NumericPager($pharmacy_services_list->StartRec, $pharmacy_services_list->DisplayRecs, $pharmacy_services_list->TotalRecs, $pharmacy_services_list->RecRange, $pharmacy_services_list->AutoHidePager) ?>
<?php if ($pharmacy_services_list->Pager->RecordCount > 0 && $pharmacy_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_services_list->TotalRecs > 0 && (!$pharmacy_services_list->AutoHidePageSizeSelector || $pharmacy_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_serviceslist" id="fpharmacy_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<?php if ($pharmacy_services->getCurrentMasterTable() == "pharmacy" && $pharmacy_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy">
<input type="hidden" name="fk_id" value="<?php echo $pharmacy_services->pharmacy_id->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $pharmacy_services->patient_id->getSessionValue() ?>">
<?php } ?>
<?php if ($pharmacy_services->getCurrentMasterTable() == "mas_pharmacy" && $pharmacy_services->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="mas_pharmacy">
<input type="hidden" name="fk_name" value="<?php echo $pharmacy_services->name->getSessionValue() ?>">
<input type="hidden" name="fk_amount" value="<?php echo $pharmacy_services->amount->getSessionValue() ?>">
<input type="hidden" name="fk_description" value="<?php echo $pharmacy_services->description->getSessionValue() ?>">
<?php } ?>
<div id="gmp_pharmacy_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_services_list->TotalRecs > 0 || $pharmacy_services->isGridEdit()) { ?>
<table id="tbl_pharmacy_serviceslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_services_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_services_list->renderListOptions();

// Render list options (header, left)
$pharmacy_services_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_services->id->Visible) { // id ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><div id="elh_pharmacy_services_id" class="pharmacy_services_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_services->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->id) ?>',1);"><div id="elh_pharmacy_services_id" class="pharmacy_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->pharmacy_id) == "") { ?>
		<th data-name="pharmacy_id" class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services->pharmacy_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_id" class="<?php echo $pharmacy_services->pharmacy_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->pharmacy_id) ?>',1);"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->pharmacy_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->pharmacy_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->pharmacy_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id"><div class="ew-table-header-caption"><?php echo $pharmacy_services->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy_services->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->patient_id) ?>',1);"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->name->Visible) { // name ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->name) == "") { ?>
		<th data-name="name" class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><div id="elh_pharmacy_services_name" class="pharmacy_services_name"><div class="ew-table-header-caption"><?php echo $pharmacy_services->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $pharmacy_services->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->name) ?>',1);"><div id="elh_pharmacy_services_name" class="pharmacy_services_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->amount->Visible) { // amount ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount"><div class="ew-table-header-caption"><?php echo $pharmacy_services->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $pharmacy_services->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->amount) ?>',1);"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date"><div class="ew-table-header-caption"><?php echo $pharmacy_services->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy_services->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->charged_date) ?>',1);"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_services->status->Visible) { // status ?>
	<?php if ($pharmacy_services->sortUrl($pharmacy_services->status) == "") { ?>
		<th data-name="status" class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><div id="elh_pharmacy_services_status" class="pharmacy_services_status"><div class="ew-table-header-caption"><?php echo $pharmacy_services->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $pharmacy_services->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_services->SortUrl($pharmacy_services->status) ?>',1);"><div id="elh_pharmacy_services_status" class="pharmacy_services_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_services->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_services->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_services->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_services->ExportAll && $pharmacy_services->isExport()) {
	$pharmacy_services_list->StopRec = $pharmacy_services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_services_list->TotalRecs > $pharmacy_services_list->StartRec + $pharmacy_services_list->DisplayRecs - 1)
		$pharmacy_services_list->StopRec = $pharmacy_services_list->StartRec + $pharmacy_services_list->DisplayRecs - 1;
	else
		$pharmacy_services_list->StopRec = $pharmacy_services_list->TotalRecs;
}
$pharmacy_services_list->RecCnt = $pharmacy_services_list->StartRec - 1;
if ($pharmacy_services_list->Recordset && !$pharmacy_services_list->Recordset->EOF) {
	$pharmacy_services_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_services_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_services_list->StartRec > 1)
		$pharmacy_services_list->Recordset->move($pharmacy_services_list->StartRec - 1);
} elseif (!$pharmacy_services->AllowAddDeleteRow && $pharmacy_services_list->StopRec == 0) {
	$pharmacy_services_list->StopRec = $pharmacy_services->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_services->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_services->resetAttributes();
$pharmacy_services_list->renderRow();
while ($pharmacy_services_list->RecCnt < $pharmacy_services_list->StopRec) {
	$pharmacy_services_list->RecCnt++;
	if ($pharmacy_services_list->RecCnt >= $pharmacy_services_list->StartRec) {
		$pharmacy_services_list->RowCnt++;

		// Set up key count
		$pharmacy_services_list->KeyCount = $pharmacy_services_list->RowIndex;

		// Init row class and style
		$pharmacy_services->resetAttributes();
		$pharmacy_services->CssClass = "";
		if ($pharmacy_services->isGridAdd()) {
		} else {
			$pharmacy_services_list->loadRowValues($pharmacy_services_list->Recordset); // Load row values
		}
		$pharmacy_services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_services->RowAttrs = array_merge($pharmacy_services->RowAttrs, array('data-rowindex'=>$pharmacy_services_list->RowCnt, 'id'=>'r' . $pharmacy_services_list->RowCnt . '_pharmacy_services', 'data-rowtype'=>$pharmacy_services->RowType));

		// Render row
		$pharmacy_services_list->renderRow();

		// Render list options
		$pharmacy_services_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_services_list->ListOptions->render("body", "left", $pharmacy_services_list->RowCnt);
?>
	<?php if ($pharmacy_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_services->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_id" class="pharmacy_services_id">
<span<?php echo $pharmacy_services->id->viewAttributes() ?>>
<?php echo $pharmacy_services->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->pharmacy_id->Visible) { // pharmacy_id ?>
		<td data-name="pharmacy_id"<?php echo $pharmacy_services->pharmacy_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id">
<span<?php echo $pharmacy_services->pharmacy_id->viewAttributes() ?>>
<?php echo $pharmacy_services->pharmacy_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $pharmacy_services->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_patient_id" class="pharmacy_services_patient_id">
<span<?php echo $pharmacy_services->patient_id->viewAttributes() ?>>
<?php echo $pharmacy_services->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->name->Visible) { // name ?>
		<td data-name="name"<?php echo $pharmacy_services->name->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_name" class="pharmacy_services_name">
<span<?php echo $pharmacy_services->name->viewAttributes() ?>>
<?php echo $pharmacy_services->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $pharmacy_services->amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_amount" class="pharmacy_services_amount">
<span<?php echo $pharmacy_services->amount->viewAttributes() ?>>
<?php echo $pharmacy_services->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $pharmacy_services->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_charged_date" class="pharmacy_services_charged_date">
<span<?php echo $pharmacy_services->charged_date->viewAttributes() ?>>
<?php echo $pharmacy_services->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_services->status->Visible) { // status ?>
		<td data-name="status"<?php echo $pharmacy_services->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_services_list->RowCnt ?>_pharmacy_services_status" class="pharmacy_services_status">
<span<?php echo $pharmacy_services->status->viewAttributes() ?>>
<?php echo $pharmacy_services->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_services_list->ListOptions->render("body", "right", $pharmacy_services_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_services->isGridAdd())
		$pharmacy_services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_services_list->Recordset)
	$pharmacy_services_list->Recordset->Close();
?>
<?php if (!$pharmacy_services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_services_list->Pager)) $pharmacy_services_list->Pager = new NumericPager($pharmacy_services_list->StartRec, $pharmacy_services_list->DisplayRecs, $pharmacy_services_list->TotalRecs, $pharmacy_services_list->RecRange, $pharmacy_services_list->AutoHidePager) ?>
<?php if ($pharmacy_services_list->Pager->RecordCount > 0 && $pharmacy_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_services_list->pageUrl() ?>start=<?php echo $pharmacy_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_services_list->TotalRecs > 0 && (!$pharmacy_services_list->AutoHidePageSizeSelector || $pharmacy_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_services_list->TotalRecs == 0 && !$pharmacy_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_services", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_services_list->terminate();
?>