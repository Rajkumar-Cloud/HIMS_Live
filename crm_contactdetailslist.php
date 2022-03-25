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
$crm_contactdetails_list = new crm_contactdetails_list();

// Run the page
$crm_contactdetails_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactdetails_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_contactdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_contactdetailslist = currentForm = new ew.Form("fcrm_contactdetailslist", "list");
fcrm_contactdetailslist.formKeyCountName = '<?php echo $crm_contactdetails_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_contactdetailslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactdetailslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_contactdetailslistsrch = currentSearchForm = new ew.Form("fcrm_contactdetailslistsrch");

// Filters
fcrm_contactdetailslistsrch.filterList = <?php echo $crm_contactdetails_list->getFilterList() ?>;
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
<?php if (!$crm_contactdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_contactdetails_list->TotalRecs > 0 && $crm_contactdetails_list->ExportOptions->visible()) { ?>
<?php $crm_contactdetails_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_contactdetails_list->ImportOptions->visible()) { ?>
<?php $crm_contactdetails_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_contactdetails_list->SearchOptions->visible()) { ?>
<?php $crm_contactdetails_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_contactdetails_list->FilterOptions->visible()) { ?>
<?php $crm_contactdetails_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_contactdetails_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_contactdetails->isExport() && !$crm_contactdetails->CurrentAction) { ?>
<form name="fcrm_contactdetailslistsrch" id="fcrm_contactdetailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_contactdetails_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_contactdetailslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_contactdetails">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_contactdetails_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_contactdetails_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_contactdetails_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_contactdetails_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_contactdetails_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_contactdetails_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_contactdetails_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_contactdetails_list->showPageHeader(); ?>
<?php
$crm_contactdetails_list->showMessage();
?>
<?php if ($crm_contactdetails_list->TotalRecs > 0 || $crm_contactdetails->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_contactdetails_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_contactdetails">
<?php if (!$crm_contactdetails->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_contactdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_contactdetails_list->Pager)) $crm_contactdetails_list->Pager = new NumericPager($crm_contactdetails_list->StartRec, $crm_contactdetails_list->DisplayRecs, $crm_contactdetails_list->TotalRecs, $crm_contactdetails_list->RecRange, $crm_contactdetails_list->AutoHidePager) ?>
<?php if ($crm_contactdetails_list->Pager->RecordCount > 0 && $crm_contactdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_contactdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_contactdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_contactdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_contactdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_contactdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_contactdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_contactdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_contactdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_contactdetails_list->TotalRecs > 0 && (!$crm_contactdetails_list->AutoHidePageSizeSelector || $crm_contactdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_contactdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_contactdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_contactdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_contactdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_contactdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_contactdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_contactdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_contactdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_contactdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_contactdetailslist" id="fcrm_contactdetailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactdetails_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactdetails_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<div id="gmp_crm_contactdetails" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_contactdetails_list->TotalRecs > 0 || $crm_contactdetails->isGridEdit()) { ?>
<table id="tbl_crm_contactdetailslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_contactdetails_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_contactdetails_list->renderListOptions();

// Render list options (header, left)
$crm_contactdetails_list->ListOptions->render("header", "left");
?>
<?php if ($crm_contactdetails->contactid->Visible) { // contactid ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->contactid) == "") { ?>
		<th data-name="contactid" class="<?php echo $crm_contactdetails->contactid->headerCellClass() ?>"><div id="elh_crm_contactdetails_contactid" class="crm_contactdetails_contactid"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->contactid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contactid" class="<?php echo $crm_contactdetails->contactid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->contactid) ?>',1);"><div id="elh_crm_contactdetails_contactid" class="crm_contactdetails_contactid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->contactid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->contactid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->contactid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->contact_no->Visible) { // contact_no ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->contact_no) == "") { ?>
		<th data-name="contact_no" class="<?php echo $crm_contactdetails->contact_no->headerCellClass() ?>"><div id="elh_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->contact_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contact_no" class="<?php echo $crm_contactdetails->contact_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->contact_no) ?>',1);"><div id="elh_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->contact_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->contact_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->contact_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->parentid->Visible) { // parentid ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->parentid) == "") { ?>
		<th data-name="parentid" class="<?php echo $crm_contactdetails->parentid->headerCellClass() ?>"><div id="elh_crm_contactdetails_parentid" class="crm_contactdetails_parentid"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->parentid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="parentid" class="<?php echo $crm_contactdetails->parentid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->parentid) ?>',1);"><div id="elh_crm_contactdetails_parentid" class="crm_contactdetails_parentid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->parentid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->parentid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->parentid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->salutation->Visible) { // salutation ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->salutation) == "") { ?>
		<th data-name="salutation" class="<?php echo $crm_contactdetails->salutation->headerCellClass() ?>"><div id="elh_crm_contactdetails_salutation" class="crm_contactdetails_salutation"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->salutation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="salutation" class="<?php echo $crm_contactdetails->salutation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->salutation) ?>',1);"><div id="elh_crm_contactdetails_salutation" class="crm_contactdetails_salutation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->salutation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->salutation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->salutation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->firstname->Visible) { // firstname ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->firstname) == "") { ?>
		<th data-name="firstname" class="<?php echo $crm_contactdetails->firstname->headerCellClass() ?>"><div id="elh_crm_contactdetails_firstname" class="crm_contactdetails_firstname"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->firstname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="firstname" class="<?php echo $crm_contactdetails->firstname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->firstname) ?>',1);"><div id="elh_crm_contactdetails_firstname" class="crm_contactdetails_firstname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->firstname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->firstname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->firstname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->lastname->Visible) { // lastname ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->lastname) == "") { ?>
		<th data-name="lastname" class="<?php echo $crm_contactdetails->lastname->headerCellClass() ?>"><div id="elh_crm_contactdetails_lastname" class="crm_contactdetails_lastname"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->lastname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="lastname" class="<?php echo $crm_contactdetails->lastname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->lastname) ?>',1);"><div id="elh_crm_contactdetails_lastname" class="crm_contactdetails_lastname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->lastname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->lastname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->lastname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->_email->Visible) { // email ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $crm_contactdetails->_email->headerCellClass() ?>"><div id="elh_crm_contactdetails__email" class="crm_contactdetails__email"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $crm_contactdetails->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->_email) ?>',1);"><div id="elh_crm_contactdetails__email" class="crm_contactdetails__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->phone->Visible) { // phone ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->phone) == "") { ?>
		<th data-name="phone" class="<?php echo $crm_contactdetails->phone->headerCellClass() ?>"><div id="elh_crm_contactdetails_phone" class="crm_contactdetails_phone"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone" class="<?php echo $crm_contactdetails->phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->phone) ?>',1);"><div id="elh_crm_contactdetails_phone" class="crm_contactdetails_phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->mobile->Visible) { // mobile ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->mobile) == "") { ?>
		<th data-name="mobile" class="<?php echo $crm_contactdetails->mobile->headerCellClass() ?>"><div id="elh_crm_contactdetails_mobile" class="crm_contactdetails_mobile"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile" class="<?php echo $crm_contactdetails->mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->mobile) ?>',1);"><div id="elh_crm_contactdetails_mobile" class="crm_contactdetails_mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->reportsto->Visible) { // reportsto ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->reportsto) == "") { ?>
		<th data-name="reportsto" class="<?php echo $crm_contactdetails->reportsto->headerCellClass() ?>"><div id="elh_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->reportsto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reportsto" class="<?php echo $crm_contactdetails->reportsto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->reportsto) ?>',1);"><div id="elh_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->reportsto->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->reportsto->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->reportsto->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->training->Visible) { // training ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->training) == "") { ?>
		<th data-name="training" class="<?php echo $crm_contactdetails->training->headerCellClass() ?>"><div id="elh_crm_contactdetails_training" class="crm_contactdetails_training"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->training->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="training" class="<?php echo $crm_contactdetails->training->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->training) ?>',1);"><div id="elh_crm_contactdetails_training" class="crm_contactdetails_training">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->training->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->training->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->training->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->usertype->Visible) { // usertype ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->usertype) == "") { ?>
		<th data-name="usertype" class="<?php echo $crm_contactdetails->usertype->headerCellClass() ?>"><div id="elh_crm_contactdetails_usertype" class="crm_contactdetails_usertype"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->usertype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="usertype" class="<?php echo $crm_contactdetails->usertype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->usertype) ?>',1);"><div id="elh_crm_contactdetails_usertype" class="crm_contactdetails_usertype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->usertype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->usertype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->usertype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->contacttype->Visible) { // contacttype ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->contacttype) == "") { ?>
		<th data-name="contacttype" class="<?php echo $crm_contactdetails->contacttype->headerCellClass() ?>"><div id="elh_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->contacttype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contacttype" class="<?php echo $crm_contactdetails->contacttype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->contacttype) ?>',1);"><div id="elh_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->contacttype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->contacttype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->contacttype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->otheremail->Visible) { // otheremail ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->otheremail) == "") { ?>
		<th data-name="otheremail" class="<?php echo $crm_contactdetails->otheremail->headerCellClass() ?>"><div id="elh_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->otheremail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="otheremail" class="<?php echo $crm_contactdetails->otheremail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->otheremail) ?>',1);"><div id="elh_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->otheremail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->otheremail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->otheremail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->donotcall->Visible) { // donotcall ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->donotcall) == "") { ?>
		<th data-name="donotcall" class="<?php echo $crm_contactdetails->donotcall->headerCellClass() ?>"><div id="elh_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->donotcall->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="donotcall" class="<?php echo $crm_contactdetails->donotcall->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->donotcall) ?>',1);"><div id="elh_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->donotcall->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->donotcall->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->donotcall->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->emailoptout->Visible) { // emailoptout ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->emailoptout) == "") { ?>
		<th data-name="emailoptout" class="<?php echo $crm_contactdetails->emailoptout->headerCellClass() ?>"><div id="elh_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->emailoptout->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="emailoptout" class="<?php echo $crm_contactdetails->emailoptout->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->emailoptout) ?>',1);"><div id="elh_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->emailoptout->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->emailoptout->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->emailoptout->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->isconvertedfromlead) == "") { ?>
		<th data-name="isconvertedfromlead" class="<?php echo $crm_contactdetails->isconvertedfromlead->headerCellClass() ?>"><div id="elh_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->isconvertedfromlead->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isconvertedfromlead" class="<?php echo $crm_contactdetails->isconvertedfromlead->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->isconvertedfromlead) ?>',1);"><div id="elh_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->isconvertedfromlead->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->isconvertedfromlead->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->isconvertedfromlead->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->secondary_email->Visible) { // secondary_email ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->secondary_email) == "") { ?>
		<th data-name="secondary_email" class="<?php echo $crm_contactdetails->secondary_email->headerCellClass() ?>"><div id="elh_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->secondary_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="secondary_email" class="<?php echo $crm_contactdetails->secondary_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->secondary_email) ?>',1);"><div id="elh_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->secondary_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->secondary_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->secondary_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->notifilanguage->Visible) { // notifilanguage ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->notifilanguage) == "") { ?>
		<th data-name="notifilanguage" class="<?php echo $crm_contactdetails->notifilanguage->headerCellClass() ?>"><div id="elh_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->notifilanguage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="notifilanguage" class="<?php echo $crm_contactdetails->notifilanguage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->notifilanguage) ?>',1);"><div id="elh_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->notifilanguage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->notifilanguage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->notifilanguage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->contactstatus->Visible) { // contactstatus ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->contactstatus) == "") { ?>
		<th data-name="contactstatus" class="<?php echo $crm_contactdetails->contactstatus->headerCellClass() ?>"><div id="elh_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->contactstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="contactstatus" class="<?php echo $crm_contactdetails->contactstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->contactstatus) ?>',1);"><div id="elh_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->contactstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->contactstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->contactstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->dav_status->Visible) { // dav_status ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->dav_status) == "") { ?>
		<th data-name="dav_status" class="<?php echo $crm_contactdetails->dav_status->headerCellClass() ?>"><div id="elh_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->dav_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dav_status" class="<?php echo $crm_contactdetails->dav_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->dav_status) ?>',1);"><div id="elh_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->dav_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->dav_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->dav_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->jobtitle->Visible) { // jobtitle ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->jobtitle) == "") { ?>
		<th data-name="jobtitle" class="<?php echo $crm_contactdetails->jobtitle->headerCellClass() ?>"><div id="elh_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->jobtitle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobtitle" class="<?php echo $crm_contactdetails->jobtitle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->jobtitle) ?>',1);"><div id="elh_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->jobtitle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->jobtitle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->jobtitle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->decision_maker->Visible) { // decision_maker ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->decision_maker) == "") { ?>
		<th data-name="decision_maker" class="<?php echo $crm_contactdetails->decision_maker->headerCellClass() ?>"><div id="elh_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->decision_maker->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="decision_maker" class="<?php echo $crm_contactdetails->decision_maker->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->decision_maker) ?>',1);"><div id="elh_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->decision_maker->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->decision_maker->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->decision_maker->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->sum_time->Visible) { // sum_time ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->sum_time) == "") { ?>
		<th data-name="sum_time" class="<?php echo $crm_contactdetails->sum_time->headerCellClass() ?>"><div id="elh_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->sum_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum_time" class="<?php echo $crm_contactdetails->sum_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->sum_time) ?>',1);"><div id="elh_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->sum_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->sum_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->sum_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->phone_extra->Visible) { // phone_extra ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->phone_extra) == "") { ?>
		<th data-name="phone_extra" class="<?php echo $crm_contactdetails->phone_extra->headerCellClass() ?>"><div id="elh_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->phone_extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_extra" class="<?php echo $crm_contactdetails->phone_extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->phone_extra) ?>',1);"><div id="elh_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->phone_extra->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->phone_extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->phone_extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->mobile_extra->Visible) { // mobile_extra ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->mobile_extra) == "") { ?>
		<th data-name="mobile_extra" class="<?php echo $crm_contactdetails->mobile_extra->headerCellClass() ?>"><div id="elh_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->mobile_extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_extra" class="<?php echo $crm_contactdetails->mobile_extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->mobile_extra) ?>',1);"><div id="elh_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->mobile_extra->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->mobile_extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->mobile_extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_contactdetails->gender->Visible) { // gender ?>
	<?php if ($crm_contactdetails->sortUrl($crm_contactdetails->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $crm_contactdetails->gender->headerCellClass() ?>"><div id="elh_crm_contactdetails_gender" class="crm_contactdetails_gender"><div class="ew-table-header-caption"><?php echo $crm_contactdetails->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $crm_contactdetails->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_contactdetails->SortUrl($crm_contactdetails->gender) ?>',1);"><div id="elh_crm_contactdetails_gender" class="crm_contactdetails_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_contactdetails->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_contactdetails->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_contactdetails->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_contactdetails_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_contactdetails->ExportAll && $crm_contactdetails->isExport()) {
	$crm_contactdetails_list->StopRec = $crm_contactdetails_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_contactdetails_list->TotalRecs > $crm_contactdetails_list->StartRec + $crm_contactdetails_list->DisplayRecs - 1)
		$crm_contactdetails_list->StopRec = $crm_contactdetails_list->StartRec + $crm_contactdetails_list->DisplayRecs - 1;
	else
		$crm_contactdetails_list->StopRec = $crm_contactdetails_list->TotalRecs;
}
$crm_contactdetails_list->RecCnt = $crm_contactdetails_list->StartRec - 1;
if ($crm_contactdetails_list->Recordset && !$crm_contactdetails_list->Recordset->EOF) {
	$crm_contactdetails_list->Recordset->moveFirst();
	$selectLimit = $crm_contactdetails_list->UseSelectLimit;
	if (!$selectLimit && $crm_contactdetails_list->StartRec > 1)
		$crm_contactdetails_list->Recordset->move($crm_contactdetails_list->StartRec - 1);
} elseif (!$crm_contactdetails->AllowAddDeleteRow && $crm_contactdetails_list->StopRec == 0) {
	$crm_contactdetails_list->StopRec = $crm_contactdetails->GridAddRowCount;
}

// Initialize aggregate
$crm_contactdetails->RowType = ROWTYPE_AGGREGATEINIT;
$crm_contactdetails->resetAttributes();
$crm_contactdetails_list->renderRow();
while ($crm_contactdetails_list->RecCnt < $crm_contactdetails_list->StopRec) {
	$crm_contactdetails_list->RecCnt++;
	if ($crm_contactdetails_list->RecCnt >= $crm_contactdetails_list->StartRec) {
		$crm_contactdetails_list->RowCnt++;

		// Set up key count
		$crm_contactdetails_list->KeyCount = $crm_contactdetails_list->RowIndex;

		// Init row class and style
		$crm_contactdetails->resetAttributes();
		$crm_contactdetails->CssClass = "";
		if ($crm_contactdetails->isGridAdd()) {
		} else {
			$crm_contactdetails_list->loadRowValues($crm_contactdetails_list->Recordset); // Load row values
		}
		$crm_contactdetails->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_contactdetails->RowAttrs = array_merge($crm_contactdetails->RowAttrs, array('data-rowindex'=>$crm_contactdetails_list->RowCnt, 'id'=>'r' . $crm_contactdetails_list->RowCnt . '_crm_contactdetails', 'data-rowtype'=>$crm_contactdetails->RowType));

		// Render row
		$crm_contactdetails_list->renderRow();

		// Render list options
		$crm_contactdetails_list->renderListOptions();
?>
	<tr<?php echo $crm_contactdetails->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_contactdetails_list->ListOptions->render("body", "left", $crm_contactdetails_list->RowCnt);
?>
	<?php if ($crm_contactdetails->contactid->Visible) { // contactid ?>
		<td data-name="contactid"<?php echo $crm_contactdetails->contactid->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_contactid" class="crm_contactdetails_contactid">
<span<?php echo $crm_contactdetails->contactid->viewAttributes() ?>>
<?php echo $crm_contactdetails->contactid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->contact_no->Visible) { // contact_no ?>
		<td data-name="contact_no"<?php echo $crm_contactdetails->contact_no->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no">
<span<?php echo $crm_contactdetails->contact_no->viewAttributes() ?>>
<?php echo $crm_contactdetails->contact_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->parentid->Visible) { // parentid ?>
		<td data-name="parentid"<?php echo $crm_contactdetails->parentid->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_parentid" class="crm_contactdetails_parentid">
<span<?php echo $crm_contactdetails->parentid->viewAttributes() ?>>
<?php echo $crm_contactdetails->parentid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->salutation->Visible) { // salutation ?>
		<td data-name="salutation"<?php echo $crm_contactdetails->salutation->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_salutation" class="crm_contactdetails_salutation">
<span<?php echo $crm_contactdetails->salutation->viewAttributes() ?>>
<?php echo $crm_contactdetails->salutation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->firstname->Visible) { // firstname ?>
		<td data-name="firstname"<?php echo $crm_contactdetails->firstname->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_firstname" class="crm_contactdetails_firstname">
<span<?php echo $crm_contactdetails->firstname->viewAttributes() ?>>
<?php echo $crm_contactdetails->firstname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->lastname->Visible) { // lastname ?>
		<td data-name="lastname"<?php echo $crm_contactdetails->lastname->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_lastname" class="crm_contactdetails_lastname">
<span<?php echo $crm_contactdetails->lastname->viewAttributes() ?>>
<?php echo $crm_contactdetails->lastname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $crm_contactdetails->_email->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails__email" class="crm_contactdetails__email">
<span<?php echo $crm_contactdetails->_email->viewAttributes() ?>>
<?php echo $crm_contactdetails->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->phone->Visible) { // phone ?>
		<td data-name="phone"<?php echo $crm_contactdetails->phone->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_phone" class="crm_contactdetails_phone">
<span<?php echo $crm_contactdetails->phone->viewAttributes() ?>>
<?php echo $crm_contactdetails->phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->mobile->Visible) { // mobile ?>
		<td data-name="mobile"<?php echo $crm_contactdetails->mobile->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_mobile" class="crm_contactdetails_mobile">
<span<?php echo $crm_contactdetails->mobile->viewAttributes() ?>>
<?php echo $crm_contactdetails->mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->reportsto->Visible) { // reportsto ?>
		<td data-name="reportsto"<?php echo $crm_contactdetails->reportsto->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto">
<span<?php echo $crm_contactdetails->reportsto->viewAttributes() ?>>
<?php echo $crm_contactdetails->reportsto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->training->Visible) { // training ?>
		<td data-name="training"<?php echo $crm_contactdetails->training->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_training" class="crm_contactdetails_training">
<span<?php echo $crm_contactdetails->training->viewAttributes() ?>>
<?php echo $crm_contactdetails->training->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->usertype->Visible) { // usertype ?>
		<td data-name="usertype"<?php echo $crm_contactdetails->usertype->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_usertype" class="crm_contactdetails_usertype">
<span<?php echo $crm_contactdetails->usertype->viewAttributes() ?>>
<?php echo $crm_contactdetails->usertype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->contacttype->Visible) { // contacttype ?>
		<td data-name="contacttype"<?php echo $crm_contactdetails->contacttype->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype">
<span<?php echo $crm_contactdetails->contacttype->viewAttributes() ?>>
<?php echo $crm_contactdetails->contacttype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->otheremail->Visible) { // otheremail ?>
		<td data-name="otheremail"<?php echo $crm_contactdetails->otheremail->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail">
<span<?php echo $crm_contactdetails->otheremail->viewAttributes() ?>>
<?php echo $crm_contactdetails->otheremail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->donotcall->Visible) { // donotcall ?>
		<td data-name="donotcall"<?php echo $crm_contactdetails->donotcall->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall">
<span<?php echo $crm_contactdetails->donotcall->viewAttributes() ?>>
<?php echo $crm_contactdetails->donotcall->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->emailoptout->Visible) { // emailoptout ?>
		<td data-name="emailoptout"<?php echo $crm_contactdetails->emailoptout->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout">
<span<?php echo $crm_contactdetails->emailoptout->viewAttributes() ?>>
<?php echo $crm_contactdetails->emailoptout->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
		<td data-name="isconvertedfromlead"<?php echo $crm_contactdetails->isconvertedfromlead->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead">
<span<?php echo $crm_contactdetails->isconvertedfromlead->viewAttributes() ?>>
<?php echo $crm_contactdetails->isconvertedfromlead->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->secondary_email->Visible) { // secondary_email ?>
		<td data-name="secondary_email"<?php echo $crm_contactdetails->secondary_email->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email">
<span<?php echo $crm_contactdetails->secondary_email->viewAttributes() ?>>
<?php echo $crm_contactdetails->secondary_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->notifilanguage->Visible) { // notifilanguage ?>
		<td data-name="notifilanguage"<?php echo $crm_contactdetails->notifilanguage->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage">
<span<?php echo $crm_contactdetails->notifilanguage->viewAttributes() ?>>
<?php echo $crm_contactdetails->notifilanguage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->contactstatus->Visible) { // contactstatus ?>
		<td data-name="contactstatus"<?php echo $crm_contactdetails->contactstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus">
<span<?php echo $crm_contactdetails->contactstatus->viewAttributes() ?>>
<?php echo $crm_contactdetails->contactstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->dav_status->Visible) { // dav_status ?>
		<td data-name="dav_status"<?php echo $crm_contactdetails->dav_status->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status">
<span<?php echo $crm_contactdetails->dav_status->viewAttributes() ?>>
<?php echo $crm_contactdetails->dav_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->jobtitle->Visible) { // jobtitle ?>
		<td data-name="jobtitle"<?php echo $crm_contactdetails->jobtitle->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle">
<span<?php echo $crm_contactdetails->jobtitle->viewAttributes() ?>>
<?php echo $crm_contactdetails->jobtitle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->decision_maker->Visible) { // decision_maker ?>
		<td data-name="decision_maker"<?php echo $crm_contactdetails->decision_maker->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker">
<span<?php echo $crm_contactdetails->decision_maker->viewAttributes() ?>>
<?php echo $crm_contactdetails->decision_maker->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->sum_time->Visible) { // sum_time ?>
		<td data-name="sum_time"<?php echo $crm_contactdetails->sum_time->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time">
<span<?php echo $crm_contactdetails->sum_time->viewAttributes() ?>>
<?php echo $crm_contactdetails->sum_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->phone_extra->Visible) { // phone_extra ?>
		<td data-name="phone_extra"<?php echo $crm_contactdetails->phone_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra">
<span<?php echo $crm_contactdetails->phone_extra->viewAttributes() ?>>
<?php echo $crm_contactdetails->phone_extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->mobile_extra->Visible) { // mobile_extra ?>
		<td data-name="mobile_extra"<?php echo $crm_contactdetails->mobile_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra">
<span<?php echo $crm_contactdetails->mobile_extra->viewAttributes() ?>>
<?php echo $crm_contactdetails->mobile_extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_contactdetails->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $crm_contactdetails->gender->cellAttributes() ?>>
<span id="el<?php echo $crm_contactdetails_list->RowCnt ?>_crm_contactdetails_gender" class="crm_contactdetails_gender">
<span<?php echo $crm_contactdetails->gender->viewAttributes() ?>>
<?php echo $crm_contactdetails->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_contactdetails_list->ListOptions->render("body", "right", $crm_contactdetails_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_contactdetails->isGridAdd())
		$crm_contactdetails_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_contactdetails->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_contactdetails_list->Recordset)
	$crm_contactdetails_list->Recordset->Close();
?>
<?php if (!$crm_contactdetails->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_contactdetails->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_contactdetails_list->Pager)) $crm_contactdetails_list->Pager = new NumericPager($crm_contactdetails_list->StartRec, $crm_contactdetails_list->DisplayRecs, $crm_contactdetails_list->TotalRecs, $crm_contactdetails_list->RecRange, $crm_contactdetails_list->AutoHidePager) ?>
<?php if ($crm_contactdetails_list->Pager->RecordCount > 0 && $crm_contactdetails_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_contactdetails_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactdetails_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_contactdetails_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_contactdetails_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_contactdetails_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_contactdetails_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_contactdetails_list->pageUrl() ?>start=<?php echo $crm_contactdetails_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_contactdetails_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_contactdetails_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_contactdetails_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_contactdetails_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_contactdetails_list->TotalRecs > 0 && (!$crm_contactdetails_list->AutoHidePageSizeSelector || $crm_contactdetails_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_contactdetails">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_contactdetails_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_contactdetails_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_contactdetails_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_contactdetails_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_contactdetails_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_contactdetails_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_contactdetails->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_contactdetails_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_contactdetails_list->TotalRecs == 0 && !$crm_contactdetails->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_contactdetails_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_contactdetails_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_contactdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_contactdetails->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_contactdetails", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_contactdetails_list->terminate();
?>