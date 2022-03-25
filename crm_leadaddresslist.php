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
$crm_leadaddress_list = new crm_leadaddress_list();

// Run the page
$crm_leadaddress_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadaddress_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadaddress->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_leadaddresslist = currentForm = new ew.Form("fcrm_leadaddresslist", "list");
fcrm_leadaddresslist.formKeyCountName = '<?php echo $crm_leadaddress_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_leadaddresslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadaddresslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_leadaddresslistsrch = currentSearchForm = new ew.Form("fcrm_leadaddresslistsrch");

// Filters
fcrm_leadaddresslistsrch.filterList = <?php echo $crm_leadaddress_list->getFilterList() ?>;
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
<?php if (!$crm_leadaddress->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_leadaddress_list->TotalRecs > 0 && $crm_leadaddress_list->ExportOptions->visible()) { ?>
<?php $crm_leadaddress_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadaddress_list->ImportOptions->visible()) { ?>
<?php $crm_leadaddress_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadaddress_list->SearchOptions->visible()) { ?>
<?php $crm_leadaddress_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadaddress_list->FilterOptions->visible()) { ?>
<?php $crm_leadaddress_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_leadaddress_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_leadaddress->isExport() && !$crm_leadaddress->CurrentAction) { ?>
<form name="fcrm_leadaddresslistsrch" id="fcrm_leadaddresslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_leadaddress_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_leadaddresslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leadaddress">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_leadaddress_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_leadaddress_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_leadaddress_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_leadaddress_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_leadaddress_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_leadaddress_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_leadaddress_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_leadaddress_list->showPageHeader(); ?>
<?php
$crm_leadaddress_list->showMessage();
?>
<?php if ($crm_leadaddress_list->TotalRecs > 0 || $crm_leadaddress->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_leadaddress_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leadaddress">
<?php if (!$crm_leadaddress->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_leadaddress->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadaddress_list->Pager)) $crm_leadaddress_list->Pager = new NumericPager($crm_leadaddress_list->StartRec, $crm_leadaddress_list->DisplayRecs, $crm_leadaddress_list->TotalRecs, $crm_leadaddress_list->RecRange, $crm_leadaddress_list->AutoHidePager) ?>
<?php if ($crm_leadaddress_list->Pager->RecordCount > 0 && $crm_leadaddress_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadaddress_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadaddress_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadaddress_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadaddress_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadaddress_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadaddress_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadaddress_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadaddress_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadaddress_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadaddress_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadaddress_list->TotalRecs > 0 && (!$crm_leadaddress_list->AutoHidePageSizeSelector || $crm_leadaddress_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadaddress">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadaddress_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadaddress_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadaddress_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadaddress_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadaddress_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadaddress_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadaddress->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadaddress_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leadaddresslist" id="fcrm_leadaddresslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadaddress_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadaddress_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<div id="gmp_crm_leadaddress" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_leadaddress_list->TotalRecs > 0 || $crm_leadaddress->isGridEdit()) { ?>
<table id="tbl_crm_leadaddresslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_leadaddress_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_leadaddress_list->renderListOptions();

// Render list options (header, left)
$crm_leadaddress_list->ListOptions->render("header", "left");
?>
<?php if ($crm_leadaddress->leadaddressid->Visible) { // leadaddressid ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->leadaddressid) == "") { ?>
		<th data-name="leadaddressid" class="<?php echo $crm_leadaddress->leadaddressid->headerCellClass() ?>"><div id="elh_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->leadaddressid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadaddressid" class="<?php echo $crm_leadaddress->leadaddressid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->leadaddressid) ?>',1);"><div id="elh_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->leadaddressid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->leadaddressid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->leadaddressid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->phone->Visible) { // phone ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->phone) == "") { ?>
		<th data-name="phone" class="<?php echo $crm_leadaddress->phone->headerCellClass() ?>"><div id="elh_crm_leadaddress_phone" class="crm_leadaddress_phone"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone" class="<?php echo $crm_leadaddress->phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->phone) ?>',1);"><div id="elh_crm_leadaddress_phone" class="crm_leadaddress_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->mobile->Visible) { // mobile ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->mobile) == "") { ?>
		<th data-name="mobile" class="<?php echo $crm_leadaddress->mobile->headerCellClass() ?>"><div id="elh_crm_leadaddress_mobile" class="crm_leadaddress_mobile"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile" class="<?php echo $crm_leadaddress->mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->mobile) ?>',1);"><div id="elh_crm_leadaddress_mobile" class="crm_leadaddress_mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->fax->Visible) { // fax ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->fax) == "") { ?>
		<th data-name="fax" class="<?php echo $crm_leadaddress->fax->headerCellClass() ?>"><div id="elh_crm_leadaddress_fax" class="crm_leadaddress_fax"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fax" class="<?php echo $crm_leadaddress->fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->fax) ?>',1);"><div id="elh_crm_leadaddress_fax" class="crm_leadaddress_fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel1a->Visible) { // addresslevel1a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel1a) == "") { ?>
		<th data-name="addresslevel1a" class="<?php echo $crm_leadaddress->addresslevel1a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel1a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel1a" class="<?php echo $crm_leadaddress->addresslevel1a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel1a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel1a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel1a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel1a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel2a->Visible) { // addresslevel2a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel2a) == "") { ?>
		<th data-name="addresslevel2a" class="<?php echo $crm_leadaddress->addresslevel2a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel2a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel2a" class="<?php echo $crm_leadaddress->addresslevel2a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel2a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel2a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel2a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel2a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel3a->Visible) { // addresslevel3a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel3a) == "") { ?>
		<th data-name="addresslevel3a" class="<?php echo $crm_leadaddress->addresslevel3a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel3a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel3a" class="<?php echo $crm_leadaddress->addresslevel3a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel3a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel3a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel3a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel3a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel4a->Visible) { // addresslevel4a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel4a) == "") { ?>
		<th data-name="addresslevel4a" class="<?php echo $crm_leadaddress->addresslevel4a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel4a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel4a" class="<?php echo $crm_leadaddress->addresslevel4a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel4a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel4a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel4a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel4a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel5a->Visible) { // addresslevel5a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel5a) == "") { ?>
		<th data-name="addresslevel5a" class="<?php echo $crm_leadaddress->addresslevel5a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel5a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel5a" class="<?php echo $crm_leadaddress->addresslevel5a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel5a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel5a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel5a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel5a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel6a->Visible) { // addresslevel6a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel6a) == "") { ?>
		<th data-name="addresslevel6a" class="<?php echo $crm_leadaddress->addresslevel6a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel6a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel6a" class="<?php echo $crm_leadaddress->addresslevel6a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel6a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel6a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel6a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel6a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel7a->Visible) { // addresslevel7a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel7a) == "") { ?>
		<th data-name="addresslevel7a" class="<?php echo $crm_leadaddress->addresslevel7a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel7a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel7a" class="<?php echo $crm_leadaddress->addresslevel7a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel7a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel7a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel7a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel7a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel8a->Visible) { // addresslevel8a ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->addresslevel8a) == "") { ?>
		<th data-name="addresslevel8a" class="<?php echo $crm_leadaddress->addresslevel8a->headerCellClass() ?>"><div id="elh_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel8a->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="addresslevel8a" class="<?php echo $crm_leadaddress->addresslevel8a->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->addresslevel8a) ?>',1);"><div id="elh_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->addresslevel8a->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->addresslevel8a->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->addresslevel8a->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->buildingnumbera->Visible) { // buildingnumbera ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->buildingnumbera) == "") { ?>
		<th data-name="buildingnumbera" class="<?php echo $crm_leadaddress->buildingnumbera->headerCellClass() ?>"><div id="elh_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->buildingnumbera->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="buildingnumbera" class="<?php echo $crm_leadaddress->buildingnumbera->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->buildingnumbera) ?>',1);"><div id="elh_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->buildingnumbera->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->buildingnumbera->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->buildingnumbera->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->localnumbera->Visible) { // localnumbera ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->localnumbera) == "") { ?>
		<th data-name="localnumbera" class="<?php echo $crm_leadaddress->localnumbera->headerCellClass() ?>"><div id="elh_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->localnumbera->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="localnumbera" class="<?php echo $crm_leadaddress->localnumbera->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->localnumbera) ?>',1);"><div id="elh_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->localnumbera->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->localnumbera->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->localnumbera->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->poboxa->Visible) { // poboxa ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->poboxa) == "") { ?>
		<th data-name="poboxa" class="<?php echo $crm_leadaddress->poboxa->headerCellClass() ?>"><div id="elh_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->poboxa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="poboxa" class="<?php echo $crm_leadaddress->poboxa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->poboxa) ?>',1);"><div id="elh_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->poboxa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->poboxa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->poboxa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->phone_extra->Visible) { // phone_extra ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->phone_extra) == "") { ?>
		<th data-name="phone_extra" class="<?php echo $crm_leadaddress->phone_extra->headerCellClass() ?>"><div id="elh_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->phone_extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_extra" class="<?php echo $crm_leadaddress->phone_extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->phone_extra) ?>',1);"><div id="elh_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->phone_extra->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->phone_extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->phone_extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->mobile_extra->Visible) { // mobile_extra ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->mobile_extra) == "") { ?>
		<th data-name="mobile_extra" class="<?php echo $crm_leadaddress->mobile_extra->headerCellClass() ?>"><div id="elh_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->mobile_extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_extra" class="<?php echo $crm_leadaddress->mobile_extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->mobile_extra) ?>',1);"><div id="elh_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->mobile_extra->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->mobile_extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->mobile_extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadaddress->fax_extra->Visible) { // fax_extra ?>
	<?php if ($crm_leadaddress->sortUrl($crm_leadaddress->fax_extra) == "") { ?>
		<th data-name="fax_extra" class="<?php echo $crm_leadaddress->fax_extra->headerCellClass() ?>"><div id="elh_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra"><div class="ew-table-header-caption"><?php echo $crm_leadaddress->fax_extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fax_extra" class="<?php echo $crm_leadaddress->fax_extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadaddress->SortUrl($crm_leadaddress->fax_extra) ?>',1);"><div id="elh_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadaddress->fax_extra->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadaddress->fax_extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadaddress->fax_extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_leadaddress_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_leadaddress->ExportAll && $crm_leadaddress->isExport()) {
	$crm_leadaddress_list->StopRec = $crm_leadaddress_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_leadaddress_list->TotalRecs > $crm_leadaddress_list->StartRec + $crm_leadaddress_list->DisplayRecs - 1)
		$crm_leadaddress_list->StopRec = $crm_leadaddress_list->StartRec + $crm_leadaddress_list->DisplayRecs - 1;
	else
		$crm_leadaddress_list->StopRec = $crm_leadaddress_list->TotalRecs;
}
$crm_leadaddress_list->RecCnt = $crm_leadaddress_list->StartRec - 1;
if ($crm_leadaddress_list->Recordset && !$crm_leadaddress_list->Recordset->EOF) {
	$crm_leadaddress_list->Recordset->moveFirst();
	$selectLimit = $crm_leadaddress_list->UseSelectLimit;
	if (!$selectLimit && $crm_leadaddress_list->StartRec > 1)
		$crm_leadaddress_list->Recordset->move($crm_leadaddress_list->StartRec - 1);
} elseif (!$crm_leadaddress->AllowAddDeleteRow && $crm_leadaddress_list->StopRec == 0) {
	$crm_leadaddress_list->StopRec = $crm_leadaddress->GridAddRowCount;
}

// Initialize aggregate
$crm_leadaddress->RowType = ROWTYPE_AGGREGATEINIT;
$crm_leadaddress->resetAttributes();
$crm_leadaddress_list->renderRow();
while ($crm_leadaddress_list->RecCnt < $crm_leadaddress_list->StopRec) {
	$crm_leadaddress_list->RecCnt++;
	if ($crm_leadaddress_list->RecCnt >= $crm_leadaddress_list->StartRec) {
		$crm_leadaddress_list->RowCnt++;

		// Set up key count
		$crm_leadaddress_list->KeyCount = $crm_leadaddress_list->RowIndex;

		// Init row class and style
		$crm_leadaddress->resetAttributes();
		$crm_leadaddress->CssClass = "";
		if ($crm_leadaddress->isGridAdd()) {
		} else {
			$crm_leadaddress_list->loadRowValues($crm_leadaddress_list->Recordset); // Load row values
		}
		$crm_leadaddress->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_leadaddress->RowAttrs = array_merge($crm_leadaddress->RowAttrs, array('data-rowindex'=>$crm_leadaddress_list->RowCnt, 'id'=>'r' . $crm_leadaddress_list->RowCnt . '_crm_leadaddress', 'data-rowtype'=>$crm_leadaddress->RowType));

		// Render row
		$crm_leadaddress_list->renderRow();

		// Render list options
		$crm_leadaddress_list->renderListOptions();
?>
	<tr<?php echo $crm_leadaddress->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_leadaddress_list->ListOptions->render("body", "left", $crm_leadaddress_list->RowCnt);
?>
	<?php if ($crm_leadaddress->leadaddressid->Visible) { // leadaddressid ?>
		<td data-name="leadaddressid"<?php echo $crm_leadaddress->leadaddressid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid">
<span<?php echo $crm_leadaddress->leadaddressid->viewAttributes() ?>>
<?php echo $crm_leadaddress->leadaddressid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->phone->Visible) { // phone ?>
		<td data-name="phone"<?php echo $crm_leadaddress->phone->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_phone" class="crm_leadaddress_phone">
<span<?php echo $crm_leadaddress->phone->viewAttributes() ?>>
<?php echo $crm_leadaddress->phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->mobile->Visible) { // mobile ?>
		<td data-name="mobile"<?php echo $crm_leadaddress->mobile->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_mobile" class="crm_leadaddress_mobile">
<span<?php echo $crm_leadaddress->mobile->viewAttributes() ?>>
<?php echo $crm_leadaddress->mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->fax->Visible) { // fax ?>
		<td data-name="fax"<?php echo $crm_leadaddress->fax->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_fax" class="crm_leadaddress_fax">
<span<?php echo $crm_leadaddress->fax->viewAttributes() ?>>
<?php echo $crm_leadaddress->fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel1a->Visible) { // addresslevel1a ?>
		<td data-name="addresslevel1a"<?php echo $crm_leadaddress->addresslevel1a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a">
<span<?php echo $crm_leadaddress->addresslevel1a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel1a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel2a->Visible) { // addresslevel2a ?>
		<td data-name="addresslevel2a"<?php echo $crm_leadaddress->addresslevel2a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a">
<span<?php echo $crm_leadaddress->addresslevel2a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel2a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel3a->Visible) { // addresslevel3a ?>
		<td data-name="addresslevel3a"<?php echo $crm_leadaddress->addresslevel3a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a">
<span<?php echo $crm_leadaddress->addresslevel3a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel3a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel4a->Visible) { // addresslevel4a ?>
		<td data-name="addresslevel4a"<?php echo $crm_leadaddress->addresslevel4a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a">
<span<?php echo $crm_leadaddress->addresslevel4a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel4a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel5a->Visible) { // addresslevel5a ?>
		<td data-name="addresslevel5a"<?php echo $crm_leadaddress->addresslevel5a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a">
<span<?php echo $crm_leadaddress->addresslevel5a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel5a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel6a->Visible) { // addresslevel6a ?>
		<td data-name="addresslevel6a"<?php echo $crm_leadaddress->addresslevel6a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a">
<span<?php echo $crm_leadaddress->addresslevel6a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel6a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel7a->Visible) { // addresslevel7a ?>
		<td data-name="addresslevel7a"<?php echo $crm_leadaddress->addresslevel7a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a">
<span<?php echo $crm_leadaddress->addresslevel7a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel7a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->addresslevel8a->Visible) { // addresslevel8a ?>
		<td data-name="addresslevel8a"<?php echo $crm_leadaddress->addresslevel8a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a">
<span<?php echo $crm_leadaddress->addresslevel8a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel8a->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->buildingnumbera->Visible) { // buildingnumbera ?>
		<td data-name="buildingnumbera"<?php echo $crm_leadaddress->buildingnumbera->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera">
<span<?php echo $crm_leadaddress->buildingnumbera->viewAttributes() ?>>
<?php echo $crm_leadaddress->buildingnumbera->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->localnumbera->Visible) { // localnumbera ?>
		<td data-name="localnumbera"<?php echo $crm_leadaddress->localnumbera->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera">
<span<?php echo $crm_leadaddress->localnumbera->viewAttributes() ?>>
<?php echo $crm_leadaddress->localnumbera->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->poboxa->Visible) { // poboxa ?>
		<td data-name="poboxa"<?php echo $crm_leadaddress->poboxa->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa">
<span<?php echo $crm_leadaddress->poboxa->viewAttributes() ?>>
<?php echo $crm_leadaddress->poboxa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->phone_extra->Visible) { // phone_extra ?>
		<td data-name="phone_extra"<?php echo $crm_leadaddress->phone_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra">
<span<?php echo $crm_leadaddress->phone_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->phone_extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->mobile_extra->Visible) { // mobile_extra ?>
		<td data-name="mobile_extra"<?php echo $crm_leadaddress->mobile_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra">
<span<?php echo $crm_leadaddress->mobile_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->mobile_extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadaddress->fax_extra->Visible) { // fax_extra ?>
		<td data-name="fax_extra"<?php echo $crm_leadaddress->fax_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_list->RowCnt ?>_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra">
<span<?php echo $crm_leadaddress->fax_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->fax_extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_leadaddress_list->ListOptions->render("body", "right", $crm_leadaddress_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_leadaddress->isGridAdd())
		$crm_leadaddress_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_leadaddress->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_leadaddress_list->Recordset)
	$crm_leadaddress_list->Recordset->Close();
?>
<?php if (!$crm_leadaddress->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_leadaddress->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadaddress_list->Pager)) $crm_leadaddress_list->Pager = new NumericPager($crm_leadaddress_list->StartRec, $crm_leadaddress_list->DisplayRecs, $crm_leadaddress_list->TotalRecs, $crm_leadaddress_list->RecRange, $crm_leadaddress_list->AutoHidePager) ?>
<?php if ($crm_leadaddress_list->Pager->RecordCount > 0 && $crm_leadaddress_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadaddress_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadaddress_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadaddress_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadaddress_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadaddress_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadaddress_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadaddress_list->pageUrl() ?>start=<?php echo $crm_leadaddress_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadaddress_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadaddress_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadaddress_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadaddress_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadaddress_list->TotalRecs > 0 && (!$crm_leadaddress_list->AutoHidePageSizeSelector || $crm_leadaddress_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadaddress">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadaddress_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadaddress_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadaddress_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadaddress_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadaddress_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadaddress_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadaddress->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadaddress_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_leadaddress_list->TotalRecs == 0 && !$crm_leadaddress->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_leadaddress_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_leadaddress_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadaddress->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_leadaddress->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_leadaddress", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadaddress_list->terminate();
?>