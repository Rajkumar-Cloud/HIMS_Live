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
$pharmacy_customers_list = new pharmacy_customers_list();

// Run the page
$pharmacy_customers_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_customers_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_customers->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_customerslist = currentForm = new ew.Form("fpharmacy_customerslist", "list");
fpharmacy_customerslist.formKeyCountName = '<?php echo $pharmacy_customers_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_customerslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_customerslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_customerslistsrch = currentSearchForm = new ew.Form("fpharmacy_customerslistsrch");

// Filters
fpharmacy_customerslistsrch.filterList = <?php echo $pharmacy_customers_list->getFilterList() ?>;
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
<?php if (!$pharmacy_customers->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_customers_list->TotalRecs > 0 && $pharmacy_customers_list->ExportOptions->visible()) { ?>
<?php $pharmacy_customers_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_customers_list->ImportOptions->visible()) { ?>
<?php $pharmacy_customers_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_customers_list->SearchOptions->visible()) { ?>
<?php $pharmacy_customers_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_customers_list->FilterOptions->visible()) { ?>
<?php $pharmacy_customers_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_customers_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_customers->isExport() && !$pharmacy_customers->CurrentAction) { ?>
<form name="fpharmacy_customerslistsrch" id="fpharmacy_customerslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_customers_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_customerslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_customers">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_customers_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_customers_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_customers_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_customers_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_customers_list->showPageHeader(); ?>
<?php
$pharmacy_customers_list->showMessage();
?>
<?php if ($pharmacy_customers_list->TotalRecs > 0 || $pharmacy_customers->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_customers_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_customers">
<?php if (!$pharmacy_customers->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_customers->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_customers_list->Pager)) $pharmacy_customers_list->Pager = new NumericPager($pharmacy_customers_list->StartRec, $pharmacy_customers_list->DisplayRecs, $pharmacy_customers_list->TotalRecs, $pharmacy_customers_list->RecRange, $pharmacy_customers_list->AutoHidePager) ?>
<?php if ($pharmacy_customers_list->Pager->RecordCount > 0 && $pharmacy_customers_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_customers_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_customers_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_customers_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_customers_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_customers_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_customers_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_customers_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_customers_list->TotalRecs > 0 && (!$pharmacy_customers_list->AutoHidePageSizeSelector || $pharmacy_customers_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_customers">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_customers_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_customers_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_customers_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_customers_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_customers_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_customers_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_customers->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_customers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_customerslist" id="fpharmacy_customerslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_customers_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_customers_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<div id="gmp_pharmacy_customers" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_customers_list->TotalRecs > 0 || $pharmacy_customers->isGridEdit()) { ?>
<table id="tbl_pharmacy_customerslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_customers_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_customers_list->renderListOptions();

// Render list options (header, left)
$pharmacy_customers_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_customers->Customercode->Visible) { // Customercode ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_customers->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_customers->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Customercode) ?>',1);"><div id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Customercode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Customercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Customercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Address1->Visible) { // Address1 ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_customers->Address1->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_customers->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Address1) ?>',1);"><div id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Address2->Visible) { // Address2 ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_customers->Address2->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_customers->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Address2) ?>',1);"><div id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Address3->Visible) { // Address3 ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_customers->Address3->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_customers->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Address3) ?>',1);"><div id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->State->Visible) { // State ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_customers->State->headerCellClass() ?>"><div id="elh_pharmacy_customers_State" class="pharmacy_customers_State"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_customers->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->State) ?>',1);"><div id="elh_pharmacy_customers_State" class="pharmacy_customers_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_customers->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_customers->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Pincode) ?>',1);"><div id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_customers->Phone->headerCellClass() ?>"><div id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_customers->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Phone) ?>',1);"><div id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_customers->Fax->headerCellClass() ?>"><div id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_customers->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Fax) ?>',1);"><div id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->_Email->Visible) { // Email ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_customers->_Email->headerCellClass() ?>"><div id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_customers->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->_Email) ?>',1);"><div id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->_Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->_Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Ratetype->Visible) { // Ratetype ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Ratetype) == "") { ?>
		<th data-name="Ratetype" class="<?php echo $pharmacy_customers->Ratetype->headerCellClass() ?>"><div id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Ratetype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ratetype" class="<?php echo $pharmacy_customers->Ratetype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Ratetype) ?>',1);"><div id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Ratetype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Ratetype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Ratetype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->Creationdate->Visible) { // Creationdate ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->Creationdate) == "") { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_customers->Creationdate->headerCellClass() ?>"><div id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->Creationdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_customers->Creationdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->Creationdate) ?>',1);"><div id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->Creationdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->Creationdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->Creationdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->ContactPerson->Visible) { // ContactPerson ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->ContactPerson) == "") { ?>
		<th data-name="ContactPerson" class="<?php echo $pharmacy_customers->ContactPerson->headerCellClass() ?>"><div id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->ContactPerson->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactPerson" class="<?php echo $pharmacy_customers->ContactPerson->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->ContactPerson) ?>',1);"><div id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->ContactPerson->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->ContactPerson->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->ContactPerson->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->CPPhone->Visible) { // CPPhone ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->CPPhone) == "") { ?>
		<th data-name="CPPhone" class="<?php echo $pharmacy_customers->CPPhone->headerCellClass() ?>"><div id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->CPPhone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CPPhone" class="<?php echo $pharmacy_customers->CPPhone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->CPPhone) ?>',1);"><div id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->CPPhone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->CPPhone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->CPPhone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_customers->id->Visible) { // id ?>
	<?php if ($pharmacy_customers->sortUrl($pharmacy_customers->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_customers->id->headerCellClass() ?>"><div id="elh_pharmacy_customers_id" class="pharmacy_customers_id"><div class="ew-table-header-caption"><?php echo $pharmacy_customers->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_customers->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_customers->SortUrl($pharmacy_customers->id) ?>',1);"><div id="elh_pharmacy_customers_id" class="pharmacy_customers_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_customers->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_customers->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_customers->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_customers_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_customers->ExportAll && $pharmacy_customers->isExport()) {
	$pharmacy_customers_list->StopRec = $pharmacy_customers_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_customers_list->TotalRecs > $pharmacy_customers_list->StartRec + $pharmacy_customers_list->DisplayRecs - 1)
		$pharmacy_customers_list->StopRec = $pharmacy_customers_list->StartRec + $pharmacy_customers_list->DisplayRecs - 1;
	else
		$pharmacy_customers_list->StopRec = $pharmacy_customers_list->TotalRecs;
}
$pharmacy_customers_list->RecCnt = $pharmacy_customers_list->StartRec - 1;
if ($pharmacy_customers_list->Recordset && !$pharmacy_customers_list->Recordset->EOF) {
	$pharmacy_customers_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_customers_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_customers_list->StartRec > 1)
		$pharmacy_customers_list->Recordset->move($pharmacy_customers_list->StartRec - 1);
} elseif (!$pharmacy_customers->AllowAddDeleteRow && $pharmacy_customers_list->StopRec == 0) {
	$pharmacy_customers_list->StopRec = $pharmacy_customers->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_customers->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_customers->resetAttributes();
$pharmacy_customers_list->renderRow();
while ($pharmacy_customers_list->RecCnt < $pharmacy_customers_list->StopRec) {
	$pharmacy_customers_list->RecCnt++;
	if ($pharmacy_customers_list->RecCnt >= $pharmacy_customers_list->StartRec) {
		$pharmacy_customers_list->RowCnt++;

		// Set up key count
		$pharmacy_customers_list->KeyCount = $pharmacy_customers_list->RowIndex;

		// Init row class and style
		$pharmacy_customers->resetAttributes();
		$pharmacy_customers->CssClass = "";
		if ($pharmacy_customers->isGridAdd()) {
		} else {
			$pharmacy_customers_list->loadRowValues($pharmacy_customers_list->Recordset); // Load row values
		}
		$pharmacy_customers->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_customers->RowAttrs = array_merge($pharmacy_customers->RowAttrs, array('data-rowindex'=>$pharmacy_customers_list->RowCnt, 'id'=>'r' . $pharmacy_customers_list->RowCnt . '_pharmacy_customers', 'data-rowtype'=>$pharmacy_customers->RowType));

		// Render row
		$pharmacy_customers_list->renderRow();

		// Render list options
		$pharmacy_customers_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_customers->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_customers_list->ListOptions->render("body", "left", $pharmacy_customers_list->RowCnt);
?>
	<?php if ($pharmacy_customers->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode"<?php echo $pharmacy_customers->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode">
<span<?php echo $pharmacy_customers->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_customers->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Address1->Visible) { // Address1 ?>
		<td data-name="Address1"<?php echo $pharmacy_customers->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Address1" class="pharmacy_customers_Address1">
<span<?php echo $pharmacy_customers->Address1->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Address2->Visible) { // Address2 ?>
		<td data-name="Address2"<?php echo $pharmacy_customers->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Address2" class="pharmacy_customers_Address2">
<span<?php echo $pharmacy_customers->Address2->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Address3->Visible) { // Address3 ?>
		<td data-name="Address3"<?php echo $pharmacy_customers->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Address3" class="pharmacy_customers_Address3">
<span<?php echo $pharmacy_customers->Address3->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->State->Visible) { // State ?>
		<td data-name="State"<?php echo $pharmacy_customers->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_State" class="pharmacy_customers_State">
<span<?php echo $pharmacy_customers->State->viewAttributes() ?>>
<?php echo $pharmacy_customers->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $pharmacy_customers->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode">
<span<?php echo $pharmacy_customers->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_customers->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $pharmacy_customers->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Phone" class="pharmacy_customers_Phone">
<span<?php echo $pharmacy_customers->Phone->viewAttributes() ?>>
<?php echo $pharmacy_customers->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Fax->Visible) { // Fax ?>
		<td data-name="Fax"<?php echo $pharmacy_customers->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Fax" class="pharmacy_customers_Fax">
<span<?php echo $pharmacy_customers->Fax->viewAttributes() ?>>
<?php echo $pharmacy_customers->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->_Email->Visible) { // Email ?>
		<td data-name="_Email"<?php echo $pharmacy_customers->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers__Email" class="pharmacy_customers__Email">
<span<?php echo $pharmacy_customers->_Email->viewAttributes() ?>>
<?php echo $pharmacy_customers->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Ratetype->Visible) { // Ratetype ?>
		<td data-name="Ratetype"<?php echo $pharmacy_customers->Ratetype->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype">
<span<?php echo $pharmacy_customers->Ratetype->viewAttributes() ?>>
<?php echo $pharmacy_customers->Ratetype->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->Creationdate->Visible) { // Creationdate ?>
		<td data-name="Creationdate"<?php echo $pharmacy_customers->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate">
<span<?php echo $pharmacy_customers->Creationdate->viewAttributes() ?>>
<?php echo $pharmacy_customers->Creationdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->ContactPerson->Visible) { // ContactPerson ?>
		<td data-name="ContactPerson"<?php echo $pharmacy_customers->ContactPerson->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson">
<span<?php echo $pharmacy_customers->ContactPerson->viewAttributes() ?>>
<?php echo $pharmacy_customers->ContactPerson->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->CPPhone->Visible) { // CPPhone ?>
		<td data-name="CPPhone"<?php echo $pharmacy_customers->CPPhone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone">
<span<?php echo $pharmacy_customers->CPPhone->viewAttributes() ?>>
<?php echo $pharmacy_customers->CPPhone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_customers->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_customers->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_list->RowCnt ?>_pharmacy_customers_id" class="pharmacy_customers_id">
<span<?php echo $pharmacy_customers->id->viewAttributes() ?>>
<?php echo $pharmacy_customers->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_customers_list->ListOptions->render("body", "right", $pharmacy_customers_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_customers->isGridAdd())
		$pharmacy_customers_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_customers->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_customers_list->Recordset)
	$pharmacy_customers_list->Recordset->Close();
?>
<?php if (!$pharmacy_customers->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_customers->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_customers_list->Pager)) $pharmacy_customers_list->Pager = new NumericPager($pharmacy_customers_list->StartRec, $pharmacy_customers_list->DisplayRecs, $pharmacy_customers_list->TotalRecs, $pharmacy_customers_list->RecRange, $pharmacy_customers_list->AutoHidePager) ?>
<?php if ($pharmacy_customers_list->Pager->RecordCount > 0 && $pharmacy_customers_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_customers_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_customers_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_customers_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_customers_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_customers_list->pageUrl() ?>start=<?php echo $pharmacy_customers_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_customers_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_customers_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_customers_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_customers_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_customers_list->TotalRecs > 0 && (!$pharmacy_customers_list->AutoHidePageSizeSelector || $pharmacy_customers_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_customers">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_customers_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_customers_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_customers_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_customers_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_customers_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_customers_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_customers->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_customers_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_customers_list->TotalRecs == 0 && !$pharmacy_customers->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_customers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_customers_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_customers->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_customers->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_customers", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_customers_list->terminate();
?>