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
$crm_leaddetails_list = new crm_leaddetails_list();

// Run the page
$crm_leaddetails_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leaddetails_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leaddetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_leaddetailslist = currentForm = new ew.Form("fcrm_leaddetailslist", "list");
fcrm_leaddetailslist.formKeyCountName = '<?php echo $crm_leaddetails_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_leaddetailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leaddetailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_leaddetailslistsrch = currentSearchForm = new ew.Form("fcrm_leaddetailslistsrch");

// Filters
fcrm_leaddetailslistsrch.filterList = <?php echo $crm_leaddetails_list->getFilterList() ?>;
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
<?php if (!$crm_leaddetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_leaddetails_list->TotalRecs > 0 && $crm_leaddetails_list->ExportOptions->visible()) { ?>
<?php $crm_leaddetails_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leaddetails_list->ImportOptions->visible()) { ?>
<?php $crm_leaddetails_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leaddetails_list->SearchOptions->visible()) { ?>
<?php $crm_leaddetails_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leaddetails_list->FilterOptions->visible()) { ?>
<?php $crm_leaddetails_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_leaddetails_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_leaddetails->isExport() && !$crm_leaddetails->CurrentAction) { ?>
<form name="fcrm_leaddetailslistsrch" id="fcrm_leaddetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_leaddetails_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_leaddetailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leaddetails">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_leaddetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_leaddetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_leaddetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_leaddetails_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_leaddetails_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_leaddetails_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_leaddetails_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_leaddetails_list->showPageHeader(); ?>
<?php
$crm_leaddetails_list->showMessage();
?>
<?php if ($crm_leaddetails_list->TotalRecs > 0 || $crm_leaddetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_leaddetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leaddetails">
<?php if (!$crm_leaddetails->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_leaddetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leaddetails_list->Pager)) $crm_leaddetails_list->Pager = new NumericPager($crm_leaddetails_list->StartRec, $crm_leaddetails_list->DisplayRecs, $crm_leaddetails_list->TotalRecs, $crm_leaddetails_list->RecRange, $crm_leaddetails_list->AutoHidePager) ?>
<?php if ($crm_leaddetails_list->Pager->RecordCount > 0 && $crm_leaddetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leaddetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leaddetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leaddetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leaddetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leaddetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leaddetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leaddetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leaddetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leaddetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leaddetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leaddetails_list->TotalRecs > 0 && (!$crm_leaddetails_list->AutoHidePageSizeSelector || $crm_leaddetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leaddetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leaddetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leaddetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leaddetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leaddetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leaddetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leaddetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leaddetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leaddetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leaddetailslist" id="fcrm_leaddetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leaddetails_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leaddetails_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<div id="gmp_crm_leaddetails" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_leaddetails_list->TotalRecs > 0 || $crm_leaddetails->isGridEdit()) { ?>
<table id="tbl_crm_leaddetailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_leaddetails_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_leaddetails_list->renderListOptions();

// Render list options (header, left)
$crm_leaddetails_list->ListOptions->render("header", "left");
?>
<?php if ($crm_leaddetails->leadid->Visible) { // leadid ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->leadid) == "") { ?>
		<th data-name="leadid" class="<?php echo $crm_leaddetails->leadid->headerCellClass() ?>"><div id="elh_crm_leaddetails_leadid" class="crm_leaddetails_leadid"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->leadid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadid" class="<?php echo $crm_leaddetails->leadid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->leadid) ?>',1);"><div id="elh_crm_leaddetails_leadid" class="crm_leaddetails_leadid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->leadid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->leadid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->leadid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->lead_no->Visible) { // lead_no ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->lead_no) == "") { ?>
		<th data-name="lead_no" class="<?php echo $crm_leaddetails->lead_no->headerCellClass() ?>"><div id="elh_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->lead_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lead_no" class="<?php echo $crm_leaddetails->lead_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->lead_no) ?>',1);"><div id="elh_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->lead_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->lead_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->lead_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->_email->Visible) { // email ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $crm_leaddetails->_email->headerCellClass() ?>"><div id="elh_crm_leaddetails__email" class="crm_leaddetails__email"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $crm_leaddetails->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->_email) ?>',1);"><div id="elh_crm_leaddetails__email" class="crm_leaddetails__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->interest->Visible) { // interest ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->interest) == "") { ?>
		<th data-name="interest" class="<?php echo $crm_leaddetails->interest->headerCellClass() ?>"><div id="elh_crm_leaddetails_interest" class="crm_leaddetails_interest"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->interest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="interest" class="<?php echo $crm_leaddetails->interest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->interest) ?>',1);"><div id="elh_crm_leaddetails_interest" class="crm_leaddetails_interest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->interest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->interest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->interest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->firstname->Visible) { // firstname ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->firstname) == "") { ?>
		<th data-name="firstname" class="<?php echo $crm_leaddetails->firstname->headerCellClass() ?>"><div id="elh_crm_leaddetails_firstname" class="crm_leaddetails_firstname"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->firstname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="firstname" class="<?php echo $crm_leaddetails->firstname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->firstname) ?>',1);"><div id="elh_crm_leaddetails_firstname" class="crm_leaddetails_firstname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->firstname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->firstname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->firstname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->salutation->Visible) { // salutation ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->salutation) == "") { ?>
		<th data-name="salutation" class="<?php echo $crm_leaddetails->salutation->headerCellClass() ?>"><div id="elh_crm_leaddetails_salutation" class="crm_leaddetails_salutation"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->salutation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="salutation" class="<?php echo $crm_leaddetails->salutation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->salutation) ?>',1);"><div id="elh_crm_leaddetails_salutation" class="crm_leaddetails_salutation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->salutation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->salutation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->salutation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->lastname->Visible) { // lastname ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->lastname) == "") { ?>
		<th data-name="lastname" class="<?php echo $crm_leaddetails->lastname->headerCellClass() ?>"><div id="elh_crm_leaddetails_lastname" class="crm_leaddetails_lastname"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->lastname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lastname" class="<?php echo $crm_leaddetails->lastname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->lastname) ?>',1);"><div id="elh_crm_leaddetails_lastname" class="crm_leaddetails_lastname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->lastname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->lastname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->lastname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->company->Visible) { // company ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->company) == "") { ?>
		<th data-name="company" class="<?php echo $crm_leaddetails->company->headerCellClass() ?>"><div id="elh_crm_leaddetails_company" class="crm_leaddetails_company"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->company->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="company" class="<?php echo $crm_leaddetails->company->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->company) ?>',1);"><div id="elh_crm_leaddetails_company" class="crm_leaddetails_company">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->company->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->company->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->company->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->annualrevenue->Visible) { // annualrevenue ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->annualrevenue) == "") { ?>
		<th data-name="annualrevenue" class="<?php echo $crm_leaddetails->annualrevenue->headerCellClass() ?>"><div id="elh_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->annualrevenue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="annualrevenue" class="<?php echo $crm_leaddetails->annualrevenue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->annualrevenue) ?>',1);"><div id="elh_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->annualrevenue->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->annualrevenue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->annualrevenue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->industry->Visible) { // industry ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->industry) == "") { ?>
		<th data-name="industry" class="<?php echo $crm_leaddetails->industry->headerCellClass() ?>"><div id="elh_crm_leaddetails_industry" class="crm_leaddetails_industry"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->industry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="industry" class="<?php echo $crm_leaddetails->industry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->industry) ?>',1);"><div id="elh_crm_leaddetails_industry" class="crm_leaddetails_industry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->industry->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->industry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->industry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->campaign->Visible) { // campaign ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->campaign) == "") { ?>
		<th data-name="campaign" class="<?php echo $crm_leaddetails->campaign->headerCellClass() ?>"><div id="elh_crm_leaddetails_campaign" class="crm_leaddetails_campaign"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->campaign->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="campaign" class="<?php echo $crm_leaddetails->campaign->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->campaign) ?>',1);"><div id="elh_crm_leaddetails_campaign" class="crm_leaddetails_campaign">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->campaign->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->campaign->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->campaign->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->leadstatus->Visible) { // leadstatus ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->leadstatus) == "") { ?>
		<th data-name="leadstatus" class="<?php echo $crm_leaddetails->leadstatus->headerCellClass() ?>"><div id="elh_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->leadstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadstatus" class="<?php echo $crm_leaddetails->leadstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->leadstatus) ?>',1);"><div id="elh_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->leadstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->leadstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->leadstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->leadsource->Visible) { // leadsource ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->leadsource) == "") { ?>
		<th data-name="leadsource" class="<?php echo $crm_leaddetails->leadsource->headerCellClass() ?>"><div id="elh_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->leadsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadsource" class="<?php echo $crm_leaddetails->leadsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->leadsource) ?>',1);"><div id="elh_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->leadsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->leadsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->leadsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->converted->Visible) { // converted ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->converted) == "") { ?>
		<th data-name="converted" class="<?php echo $crm_leaddetails->converted->headerCellClass() ?>"><div id="elh_crm_leaddetails_converted" class="crm_leaddetails_converted"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->converted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="converted" class="<?php echo $crm_leaddetails->converted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->converted) ?>',1);"><div id="elh_crm_leaddetails_converted" class="crm_leaddetails_converted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->converted->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->converted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->converted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->licencekeystatus->Visible) { // licencekeystatus ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->licencekeystatus) == "") { ?>
		<th data-name="licencekeystatus" class="<?php echo $crm_leaddetails->licencekeystatus->headerCellClass() ?>"><div id="elh_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->licencekeystatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="licencekeystatus" class="<?php echo $crm_leaddetails->licencekeystatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->licencekeystatus) ?>',1);"><div id="elh_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->licencekeystatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->licencekeystatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->licencekeystatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->space->Visible) { // space ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->space) == "") { ?>
		<th data-name="space" class="<?php echo $crm_leaddetails->space->headerCellClass() ?>"><div id="elh_crm_leaddetails_space" class="crm_leaddetails_space"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->space->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="space" class="<?php echo $crm_leaddetails->space->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->space) ?>',1);"><div id="elh_crm_leaddetails_space" class="crm_leaddetails_space">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->space->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->space->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->space->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->priority->Visible) { // priority ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->priority) == "") { ?>
		<th data-name="priority" class="<?php echo $crm_leaddetails->priority->headerCellClass() ?>"><div id="elh_crm_leaddetails_priority" class="crm_leaddetails_priority"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->priority->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="priority" class="<?php echo $crm_leaddetails->priority->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->priority) ?>',1);"><div id="elh_crm_leaddetails_priority" class="crm_leaddetails_priority">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->priority->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->priority->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->priority->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->demorequest->Visible) { // demorequest ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->demorequest) == "") { ?>
		<th data-name="demorequest" class="<?php echo $crm_leaddetails->demorequest->headerCellClass() ?>"><div id="elh_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->demorequest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="demorequest" class="<?php echo $crm_leaddetails->demorequest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->demorequest) ?>',1);"><div id="elh_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->demorequest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->demorequest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->demorequest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->partnercontact->Visible) { // partnercontact ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->partnercontact) == "") { ?>
		<th data-name="partnercontact" class="<?php echo $crm_leaddetails->partnercontact->headerCellClass() ?>"><div id="elh_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->partnercontact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="partnercontact" class="<?php echo $crm_leaddetails->partnercontact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->partnercontact) ?>',1);"><div id="elh_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->partnercontact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->partnercontact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->partnercontact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->productversion->Visible) { // productversion ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->productversion) == "") { ?>
		<th data-name="productversion" class="<?php echo $crm_leaddetails->productversion->headerCellClass() ?>"><div id="elh_crm_leaddetails_productversion" class="crm_leaddetails_productversion"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->productversion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="productversion" class="<?php echo $crm_leaddetails->productversion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->productversion) ?>',1);"><div id="elh_crm_leaddetails_productversion" class="crm_leaddetails_productversion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->productversion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->productversion->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->productversion->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->product->Visible) { // product ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->product) == "") { ?>
		<th data-name="product" class="<?php echo $crm_leaddetails->product->headerCellClass() ?>"><div id="elh_crm_leaddetails_product" class="crm_leaddetails_product"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="product" class="<?php echo $crm_leaddetails->product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->product) ?>',1);"><div id="elh_crm_leaddetails_product" class="crm_leaddetails_product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->product->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->product->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->maildate->Visible) { // maildate ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->maildate) == "") { ?>
		<th data-name="maildate" class="<?php echo $crm_leaddetails->maildate->headerCellClass() ?>"><div id="elh_crm_leaddetails_maildate" class="crm_leaddetails_maildate"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->maildate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="maildate" class="<?php echo $crm_leaddetails->maildate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->maildate) ?>',1);"><div id="elh_crm_leaddetails_maildate" class="crm_leaddetails_maildate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->maildate->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->maildate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->maildate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->nextstepdate->Visible) { // nextstepdate ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->nextstepdate) == "") { ?>
		<th data-name="nextstepdate" class="<?php echo $crm_leaddetails->nextstepdate->headerCellClass() ?>"><div id="elh_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->nextstepdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nextstepdate" class="<?php echo $crm_leaddetails->nextstepdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->nextstepdate) ?>',1);"><div id="elh_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->nextstepdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->nextstepdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->nextstepdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->fundingsituation->Visible) { // fundingsituation ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->fundingsituation) == "") { ?>
		<th data-name="fundingsituation" class="<?php echo $crm_leaddetails->fundingsituation->headerCellClass() ?>"><div id="elh_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->fundingsituation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fundingsituation" class="<?php echo $crm_leaddetails->fundingsituation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->fundingsituation) ?>',1);"><div id="elh_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->fundingsituation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->fundingsituation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->fundingsituation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->purpose->Visible) { // purpose ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->purpose) == "") { ?>
		<th data-name="purpose" class="<?php echo $crm_leaddetails->purpose->headerCellClass() ?>"><div id="elh_crm_leaddetails_purpose" class="crm_leaddetails_purpose"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="purpose" class="<?php echo $crm_leaddetails->purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->purpose) ?>',1);"><div id="elh_crm_leaddetails_purpose" class="crm_leaddetails_purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->purpose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->purpose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->evaluationstatus->Visible) { // evaluationstatus ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->evaluationstatus) == "") { ?>
		<th data-name="evaluationstatus" class="<?php echo $crm_leaddetails->evaluationstatus->headerCellClass() ?>"><div id="elh_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->evaluationstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="evaluationstatus" class="<?php echo $crm_leaddetails->evaluationstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->evaluationstatus) ?>',1);"><div id="elh_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->evaluationstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->evaluationstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->evaluationstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->transferdate->Visible) { // transferdate ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->transferdate) == "") { ?>
		<th data-name="transferdate" class="<?php echo $crm_leaddetails->transferdate->headerCellClass() ?>"><div id="elh_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->transferdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transferdate" class="<?php echo $crm_leaddetails->transferdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->transferdate) ?>',1);"><div id="elh_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->transferdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->transferdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->transferdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->revenuetype->Visible) { // revenuetype ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->revenuetype) == "") { ?>
		<th data-name="revenuetype" class="<?php echo $crm_leaddetails->revenuetype->headerCellClass() ?>"><div id="elh_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->revenuetype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="revenuetype" class="<?php echo $crm_leaddetails->revenuetype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->revenuetype) ?>',1);"><div id="elh_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->revenuetype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->revenuetype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->revenuetype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->noofemployees->Visible) { // noofemployees ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->noofemployees) == "") { ?>
		<th data-name="noofemployees" class="<?php echo $crm_leaddetails->noofemployees->headerCellClass() ?>"><div id="elh_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->noofemployees->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="noofemployees" class="<?php echo $crm_leaddetails->noofemployees->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->noofemployees) ?>',1);"><div id="elh_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->noofemployees->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->noofemployees->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->noofemployees->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->secondaryemail->Visible) { // secondaryemail ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->secondaryemail) == "") { ?>
		<th data-name="secondaryemail" class="<?php echo $crm_leaddetails->secondaryemail->headerCellClass() ?>"><div id="elh_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->secondaryemail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="secondaryemail" class="<?php echo $crm_leaddetails->secondaryemail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->secondaryemail) ?>',1);"><div id="elh_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->secondaryemail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->secondaryemail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->secondaryemail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalcalls->Visible) { // noapprovalcalls ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->noapprovalcalls) == "") { ?>
		<th data-name="noapprovalcalls" class="<?php echo $crm_leaddetails->noapprovalcalls->headerCellClass() ?>"><div id="elh_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->noapprovalcalls->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="noapprovalcalls" class="<?php echo $crm_leaddetails->noapprovalcalls->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->noapprovalcalls) ?>',1);"><div id="elh_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->noapprovalcalls->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->noapprovalcalls->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->noapprovalcalls->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalemails->Visible) { // noapprovalemails ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->noapprovalemails) == "") { ?>
		<th data-name="noapprovalemails" class="<?php echo $crm_leaddetails->noapprovalemails->headerCellClass() ?>"><div id="elh_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->noapprovalemails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="noapprovalemails" class="<?php echo $crm_leaddetails->noapprovalemails->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->noapprovalemails) ?>',1);"><div id="elh_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->noapprovalemails->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->noapprovalemails->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->noapprovalemails->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->vat_id->Visible) { // vat_id ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->vat_id) == "") { ?>
		<th data-name="vat_id" class="<?php echo $crm_leaddetails->vat_id->headerCellClass() ?>"><div id="elh_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->vat_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vat_id" class="<?php echo $crm_leaddetails->vat_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->vat_id) ?>',1);"><div id="elh_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->vat_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->vat_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->vat_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_1->Visible) { // registration_number_1 ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->registration_number_1) == "") { ?>
		<th data-name="registration_number_1" class="<?php echo $crm_leaddetails->registration_number_1->headerCellClass() ?>"><div id="elh_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->registration_number_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="registration_number_1" class="<?php echo $crm_leaddetails->registration_number_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->registration_number_1) ?>',1);"><div id="elh_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->registration_number_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->registration_number_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->registration_number_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_2->Visible) { // registration_number_2 ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->registration_number_2) == "") { ?>
		<th data-name="registration_number_2" class="<?php echo $crm_leaddetails->registration_number_2->headerCellClass() ?>"><div id="elh_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->registration_number_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="registration_number_2" class="<?php echo $crm_leaddetails->registration_number_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->registration_number_2) ?>',1);"><div id="elh_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->registration_number_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->registration_number_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->registration_number_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->subindustry->Visible) { // subindustry ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->subindustry) == "") { ?>
		<th data-name="subindustry" class="<?php echo $crm_leaddetails->subindustry->headerCellClass() ?>"><div id="elh_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->subindustry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="subindustry" class="<?php echo $crm_leaddetails->subindustry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->subindustry) ?>',1);"><div id="elh_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->subindustry->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->subindustry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->subindustry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->leads_relation->Visible) { // leads_relation ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->leads_relation) == "") { ?>
		<th data-name="leads_relation" class="<?php echo $crm_leaddetails->leads_relation->headerCellClass() ?>"><div id="elh_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->leads_relation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leads_relation" class="<?php echo $crm_leaddetails->leads_relation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->leads_relation) ?>',1);"><div id="elh_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->leads_relation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->leads_relation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->leads_relation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->legal_form->Visible) { // legal_form ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->legal_form) == "") { ?>
		<th data-name="legal_form" class="<?php echo $crm_leaddetails->legal_form->headerCellClass() ?>"><div id="elh_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->legal_form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="legal_form" class="<?php echo $crm_leaddetails->legal_form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->legal_form) ?>',1);"><div id="elh_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->legal_form->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->legal_form->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->legal_form->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->sum_time->Visible) { // sum_time ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->sum_time) == "") { ?>
		<th data-name="sum_time" class="<?php echo $crm_leaddetails->sum_time->headerCellClass() ?>"><div id="elh_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->sum_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum_time" class="<?php echo $crm_leaddetails->sum_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->sum_time) ?>',1);"><div id="elh_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->sum_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->sum_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->sum_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leaddetails->active->Visible) { // active ?>
	<?php if ($crm_leaddetails->sortUrl($crm_leaddetails->active) == "") { ?>
		<th data-name="active" class="<?php echo $crm_leaddetails->active->headerCellClass() ?>"><div id="elh_crm_leaddetails_active" class="crm_leaddetails_active"><div class="ew-table-header-caption"><?php echo $crm_leaddetails->active->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="active" class="<?php echo $crm_leaddetails->active->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leaddetails->SortUrl($crm_leaddetails->active) ?>',1);"><div id="elh_crm_leaddetails_active" class="crm_leaddetails_active">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leaddetails->active->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leaddetails->active->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leaddetails->active->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_leaddetails_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_leaddetails->ExportAll && $crm_leaddetails->isExport()) {
	$crm_leaddetails_list->StopRec = $crm_leaddetails_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_leaddetails_list->TotalRecs > $crm_leaddetails_list->StartRec + $crm_leaddetails_list->DisplayRecs - 1)
		$crm_leaddetails_list->StopRec = $crm_leaddetails_list->StartRec + $crm_leaddetails_list->DisplayRecs - 1;
	else
		$crm_leaddetails_list->StopRec = $crm_leaddetails_list->TotalRecs;
}
$crm_leaddetails_list->RecCnt = $crm_leaddetails_list->StartRec - 1;
if ($crm_leaddetails_list->Recordset && !$crm_leaddetails_list->Recordset->EOF) {
	$crm_leaddetails_list->Recordset->moveFirst();
	$selectLimit = $crm_leaddetails_list->UseSelectLimit;
	if (!$selectLimit && $crm_leaddetails_list->StartRec > 1)
		$crm_leaddetails_list->Recordset->move($crm_leaddetails_list->StartRec - 1);
} elseif (!$crm_leaddetails->AllowAddDeleteRow && $crm_leaddetails_list->StopRec == 0) {
	$crm_leaddetails_list->StopRec = $crm_leaddetails->GridAddRowCount;
}

// Initialize aggregate
$crm_leaddetails->RowType = ROWTYPE_AGGREGATEINIT;
$crm_leaddetails->resetAttributes();
$crm_leaddetails_list->renderRow();
while ($crm_leaddetails_list->RecCnt < $crm_leaddetails_list->StopRec) {
	$crm_leaddetails_list->RecCnt++;
	if ($crm_leaddetails_list->RecCnt >= $crm_leaddetails_list->StartRec) {
		$crm_leaddetails_list->RowCnt++;

		// Set up key count
		$crm_leaddetails_list->KeyCount = $crm_leaddetails_list->RowIndex;

		// Init row class and style
		$crm_leaddetails->resetAttributes();
		$crm_leaddetails->CssClass = "";
		if ($crm_leaddetails->isGridAdd()) {
		} else {
			$crm_leaddetails_list->loadRowValues($crm_leaddetails_list->Recordset); // Load row values
		}
		$crm_leaddetails->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_leaddetails->RowAttrs = array_merge($crm_leaddetails->RowAttrs, array('data-rowindex'=>$crm_leaddetails_list->RowCnt, 'id'=>'r' . $crm_leaddetails_list->RowCnt . '_crm_leaddetails', 'data-rowtype'=>$crm_leaddetails->RowType));

		// Render row
		$crm_leaddetails_list->renderRow();

		// Render list options
		$crm_leaddetails_list->renderListOptions();
?>
	<tr<?php echo $crm_leaddetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_leaddetails_list->ListOptions->render("body", "left", $crm_leaddetails_list->RowCnt);
?>
	<?php if ($crm_leaddetails->leadid->Visible) { // leadid ?>
		<td data-name="leadid"<?php echo $crm_leaddetails->leadid->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_leadid" class="crm_leaddetails_leadid">
<span<?php echo $crm_leaddetails->leadid->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->lead_no->Visible) { // lead_no ?>
		<td data-name="lead_no"<?php echo $crm_leaddetails->lead_no->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no">
<span<?php echo $crm_leaddetails->lead_no->viewAttributes() ?>>
<?php echo $crm_leaddetails->lead_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $crm_leaddetails->_email->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails__email" class="crm_leaddetails__email">
<span<?php echo $crm_leaddetails->_email->viewAttributes() ?>>
<?php echo $crm_leaddetails->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->interest->Visible) { // interest ?>
		<td data-name="interest"<?php echo $crm_leaddetails->interest->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_interest" class="crm_leaddetails_interest">
<span<?php echo $crm_leaddetails->interest->viewAttributes() ?>>
<?php echo $crm_leaddetails->interest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->firstname->Visible) { // firstname ?>
		<td data-name="firstname"<?php echo $crm_leaddetails->firstname->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_firstname" class="crm_leaddetails_firstname">
<span<?php echo $crm_leaddetails->firstname->viewAttributes() ?>>
<?php echo $crm_leaddetails->firstname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->salutation->Visible) { // salutation ?>
		<td data-name="salutation"<?php echo $crm_leaddetails->salutation->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_salutation" class="crm_leaddetails_salutation">
<span<?php echo $crm_leaddetails->salutation->viewAttributes() ?>>
<?php echo $crm_leaddetails->salutation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->lastname->Visible) { // lastname ?>
		<td data-name="lastname"<?php echo $crm_leaddetails->lastname->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_lastname" class="crm_leaddetails_lastname">
<span<?php echo $crm_leaddetails->lastname->viewAttributes() ?>>
<?php echo $crm_leaddetails->lastname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->company->Visible) { // company ?>
		<td data-name="company"<?php echo $crm_leaddetails->company->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_company" class="crm_leaddetails_company">
<span<?php echo $crm_leaddetails->company->viewAttributes() ?>>
<?php echo $crm_leaddetails->company->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->annualrevenue->Visible) { // annualrevenue ?>
		<td data-name="annualrevenue"<?php echo $crm_leaddetails->annualrevenue->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue">
<span<?php echo $crm_leaddetails->annualrevenue->viewAttributes() ?>>
<?php echo $crm_leaddetails->annualrevenue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->industry->Visible) { // industry ?>
		<td data-name="industry"<?php echo $crm_leaddetails->industry->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_industry" class="crm_leaddetails_industry">
<span<?php echo $crm_leaddetails->industry->viewAttributes() ?>>
<?php echo $crm_leaddetails->industry->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->campaign->Visible) { // campaign ?>
		<td data-name="campaign"<?php echo $crm_leaddetails->campaign->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_campaign" class="crm_leaddetails_campaign">
<span<?php echo $crm_leaddetails->campaign->viewAttributes() ?>>
<?php echo $crm_leaddetails->campaign->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->leadstatus->Visible) { // leadstatus ?>
		<td data-name="leadstatus"<?php echo $crm_leaddetails->leadstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus">
<span<?php echo $crm_leaddetails->leadstatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->leadsource->Visible) { // leadsource ?>
		<td data-name="leadsource"<?php echo $crm_leaddetails->leadsource->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource">
<span<?php echo $crm_leaddetails->leadsource->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->converted->Visible) { // converted ?>
		<td data-name="converted"<?php echo $crm_leaddetails->converted->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_converted" class="crm_leaddetails_converted">
<span<?php echo $crm_leaddetails->converted->viewAttributes() ?>>
<?php echo $crm_leaddetails->converted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->licencekeystatus->Visible) { // licencekeystatus ?>
		<td data-name="licencekeystatus"<?php echo $crm_leaddetails->licencekeystatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus">
<span<?php echo $crm_leaddetails->licencekeystatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->licencekeystatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->space->Visible) { // space ?>
		<td data-name="space"<?php echo $crm_leaddetails->space->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_space" class="crm_leaddetails_space">
<span<?php echo $crm_leaddetails->space->viewAttributes() ?>>
<?php echo $crm_leaddetails->space->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->priority->Visible) { // priority ?>
		<td data-name="priority"<?php echo $crm_leaddetails->priority->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_priority" class="crm_leaddetails_priority">
<span<?php echo $crm_leaddetails->priority->viewAttributes() ?>>
<?php echo $crm_leaddetails->priority->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->demorequest->Visible) { // demorequest ?>
		<td data-name="demorequest"<?php echo $crm_leaddetails->demorequest->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest">
<span<?php echo $crm_leaddetails->demorequest->viewAttributes() ?>>
<?php echo $crm_leaddetails->demorequest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->partnercontact->Visible) { // partnercontact ?>
		<td data-name="partnercontact"<?php echo $crm_leaddetails->partnercontact->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact">
<span<?php echo $crm_leaddetails->partnercontact->viewAttributes() ?>>
<?php echo $crm_leaddetails->partnercontact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->productversion->Visible) { // productversion ?>
		<td data-name="productversion"<?php echo $crm_leaddetails->productversion->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_productversion" class="crm_leaddetails_productversion">
<span<?php echo $crm_leaddetails->productversion->viewAttributes() ?>>
<?php echo $crm_leaddetails->productversion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->product->Visible) { // product ?>
		<td data-name="product"<?php echo $crm_leaddetails->product->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_product" class="crm_leaddetails_product">
<span<?php echo $crm_leaddetails->product->viewAttributes() ?>>
<?php echo $crm_leaddetails->product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->maildate->Visible) { // maildate ?>
		<td data-name="maildate"<?php echo $crm_leaddetails->maildate->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_maildate" class="crm_leaddetails_maildate">
<span<?php echo $crm_leaddetails->maildate->viewAttributes() ?>>
<?php echo $crm_leaddetails->maildate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->nextstepdate->Visible) { // nextstepdate ?>
		<td data-name="nextstepdate"<?php echo $crm_leaddetails->nextstepdate->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate">
<span<?php echo $crm_leaddetails->nextstepdate->viewAttributes() ?>>
<?php echo $crm_leaddetails->nextstepdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->fundingsituation->Visible) { // fundingsituation ?>
		<td data-name="fundingsituation"<?php echo $crm_leaddetails->fundingsituation->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation">
<span<?php echo $crm_leaddetails->fundingsituation->viewAttributes() ?>>
<?php echo $crm_leaddetails->fundingsituation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->purpose->Visible) { // purpose ?>
		<td data-name="purpose"<?php echo $crm_leaddetails->purpose->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_purpose" class="crm_leaddetails_purpose">
<span<?php echo $crm_leaddetails->purpose->viewAttributes() ?>>
<?php echo $crm_leaddetails->purpose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->evaluationstatus->Visible) { // evaluationstatus ?>
		<td data-name="evaluationstatus"<?php echo $crm_leaddetails->evaluationstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus">
<span<?php echo $crm_leaddetails->evaluationstatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->evaluationstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->transferdate->Visible) { // transferdate ?>
		<td data-name="transferdate"<?php echo $crm_leaddetails->transferdate->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate">
<span<?php echo $crm_leaddetails->transferdate->viewAttributes() ?>>
<?php echo $crm_leaddetails->transferdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->revenuetype->Visible) { // revenuetype ?>
		<td data-name="revenuetype"<?php echo $crm_leaddetails->revenuetype->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype">
<span<?php echo $crm_leaddetails->revenuetype->viewAttributes() ?>>
<?php echo $crm_leaddetails->revenuetype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->noofemployees->Visible) { // noofemployees ?>
		<td data-name="noofemployees"<?php echo $crm_leaddetails->noofemployees->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees">
<span<?php echo $crm_leaddetails->noofemployees->viewAttributes() ?>>
<?php echo $crm_leaddetails->noofemployees->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->secondaryemail->Visible) { // secondaryemail ?>
		<td data-name="secondaryemail"<?php echo $crm_leaddetails->secondaryemail->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail">
<span<?php echo $crm_leaddetails->secondaryemail->viewAttributes() ?>>
<?php echo $crm_leaddetails->secondaryemail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->noapprovalcalls->Visible) { // noapprovalcalls ?>
		<td data-name="noapprovalcalls"<?php echo $crm_leaddetails->noapprovalcalls->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls">
<span<?php echo $crm_leaddetails->noapprovalcalls->viewAttributes() ?>>
<?php echo $crm_leaddetails->noapprovalcalls->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->noapprovalemails->Visible) { // noapprovalemails ?>
		<td data-name="noapprovalemails"<?php echo $crm_leaddetails->noapprovalemails->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails">
<span<?php echo $crm_leaddetails->noapprovalemails->viewAttributes() ?>>
<?php echo $crm_leaddetails->noapprovalemails->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->vat_id->Visible) { // vat_id ?>
		<td data-name="vat_id"<?php echo $crm_leaddetails->vat_id->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id">
<span<?php echo $crm_leaddetails->vat_id->viewAttributes() ?>>
<?php echo $crm_leaddetails->vat_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->registration_number_1->Visible) { // registration_number_1 ?>
		<td data-name="registration_number_1"<?php echo $crm_leaddetails->registration_number_1->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1">
<span<?php echo $crm_leaddetails->registration_number_1->viewAttributes() ?>>
<?php echo $crm_leaddetails->registration_number_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->registration_number_2->Visible) { // registration_number_2 ?>
		<td data-name="registration_number_2"<?php echo $crm_leaddetails->registration_number_2->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2">
<span<?php echo $crm_leaddetails->registration_number_2->viewAttributes() ?>>
<?php echo $crm_leaddetails->registration_number_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->subindustry->Visible) { // subindustry ?>
		<td data-name="subindustry"<?php echo $crm_leaddetails->subindustry->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry">
<span<?php echo $crm_leaddetails->subindustry->viewAttributes() ?>>
<?php echo $crm_leaddetails->subindustry->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->leads_relation->Visible) { // leads_relation ?>
		<td data-name="leads_relation"<?php echo $crm_leaddetails->leads_relation->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation">
<span<?php echo $crm_leaddetails->leads_relation->viewAttributes() ?>>
<?php echo $crm_leaddetails->leads_relation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->legal_form->Visible) { // legal_form ?>
		<td data-name="legal_form"<?php echo $crm_leaddetails->legal_form->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form">
<span<?php echo $crm_leaddetails->legal_form->viewAttributes() ?>>
<?php echo $crm_leaddetails->legal_form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->sum_time->Visible) { // sum_time ?>
		<td data-name="sum_time"<?php echo $crm_leaddetails->sum_time->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time">
<span<?php echo $crm_leaddetails->sum_time->viewAttributes() ?>>
<?php echo $crm_leaddetails->sum_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leaddetails->active->Visible) { // active ?>
		<td data-name="active"<?php echo $crm_leaddetails->active->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_list->RowCnt ?>_crm_leaddetails_active" class="crm_leaddetails_active">
<span<?php echo $crm_leaddetails->active->viewAttributes() ?>>
<?php echo $crm_leaddetails->active->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_leaddetails_list->ListOptions->render("body", "right", $crm_leaddetails_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_leaddetails->isGridAdd())
		$crm_leaddetails_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_leaddetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_leaddetails_list->Recordset)
	$crm_leaddetails_list->Recordset->Close();
?>
<?php if (!$crm_leaddetails->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_leaddetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leaddetails_list->Pager)) $crm_leaddetails_list->Pager = new NumericPager($crm_leaddetails_list->StartRec, $crm_leaddetails_list->DisplayRecs, $crm_leaddetails_list->TotalRecs, $crm_leaddetails_list->RecRange, $crm_leaddetails_list->AutoHidePager) ?>
<?php if ($crm_leaddetails_list->Pager->RecordCount > 0 && $crm_leaddetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leaddetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leaddetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leaddetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leaddetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leaddetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leaddetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leaddetails_list->pageUrl() ?>start=<?php echo $crm_leaddetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leaddetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leaddetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leaddetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leaddetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leaddetails_list->TotalRecs > 0 && (!$crm_leaddetails_list->AutoHidePageSizeSelector || $crm_leaddetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leaddetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leaddetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leaddetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leaddetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leaddetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leaddetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leaddetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leaddetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leaddetails_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_leaddetails_list->TotalRecs == 0 && !$crm_leaddetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_leaddetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_leaddetails_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leaddetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_leaddetails->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_leaddetails", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leaddetails_list->terminate();
?>