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
$view_pharmacy_purchase_request_items_purchased_list = new view_pharmacy_purchase_request_items_purchased_list();

// Run the page
$view_pharmacy_purchase_request_items_purchased_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_purchased_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_purchase_request_items_purchasedlist = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasedlist", "list");
fview_pharmacy_purchase_request_items_purchasedlist.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_items_purchased_list->FormKeyCountName ?>';

// Validate form
fview_pharmacy_purchase_request_items_purchasedlist.validate = function() {
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
		<?php if ($view_pharmacy_purchase_request_items_purchased_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->id->caption(), $view_pharmacy_purchase_request_items_purchased->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PRC->caption(), $view_pharmacy_purchase_request_items_purchased->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_list->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PrName->caption(), $view_pharmacy_purchase_request_items_purchased->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_list->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->Quantity->caption(), $view_pharmacy_purchase_request_items_purchased->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_pharmacy_purchase_request_items_purchased->Quantity->errorMessage()) ?>");
		<?php if ($view_pharmacy_purchase_request_items_purchased_list->ApprovedStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovedStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption(), $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_pharmacy_purchase_request_items_purchased_list->PurchaseStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PurchaseStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption(), $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_pharmacy_purchase_request_items_purchasedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_purchasedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_purchasedlist.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_list->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_purchasedlist.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_list->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_pharmacy_purchase_request_items_purchasedlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasedlistsrch");

// Filters
fview_pharmacy_purchase_request_items_purchasedlistsrch.filterList = <?php echo $view_pharmacy_purchase_request_items_purchased_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs > 0 && $view_pharmacy_purchase_request_items_purchased_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_purchased_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_purchased_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_purchased_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_items_purchased_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport() || EXPORT_MASTER_RECORD && $view_pharmacy_purchase_request_items_purchased->isExport("print")) { ?>
<?php
if ($view_pharmacy_purchase_request_items_purchased_list->DbMasterFilter <> "" && $view_pharmacy_purchase_request_items_purchased->getCurrentMasterTable() == "view_pharmacy_purchase_request_purchased") {
	if ($view_pharmacy_purchase_request_items_purchased_list->MasterRecordExists) {
		include_once "view_pharmacy_purchase_request_purchasedmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_purchased_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport() && !$view_pharmacy_purchase_request_items_purchased->CurrentAction) { ?>
<form name="fview_pharmacy_purchase_request_items_purchasedlistsrch" id="fview_pharmacy_purchase_request_items_purchasedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_purchase_request_items_purchased_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_purchase_request_items_purchasedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_items_purchased_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_purchase_request_items_purchased_list->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_purchased_list->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs > 0 || $view_pharmacy_purchase_request_items_purchased->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_items_purchased_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_purchased">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_purchase_request_items_purchased_list->Pager)) $view_pharmacy_purchase_request_items_purchased_list->Pager = new NumericPager($view_pharmacy_purchase_request_items_purchased_list->StartRec, $view_pharmacy_purchase_request_items_purchased_list->DisplayRecs, $view_pharmacy_purchase_request_items_purchased_list->TotalRecs, $view_pharmacy_purchase_request_items_purchased_list->RecRange, $view_pharmacy_purchase_request_items_purchased_list->AutoHidePager) ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_items_purchased_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_purchase_request_items_purchased_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs > 0 && (!$view_pharmacy_purchase_request_items_purchased_list->AutoHidePageSizeSelector || $view_pharmacy_purchase_request_items_purchased_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_purchase_request_items_purchased->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_purchased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_purchase_request_items_purchasedlist" id="fview_pharmacy_purchase_request_items_purchasedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_items_purchased_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<?php if ($view_pharmacy_purchase_request_items_purchased->getCurrentMasterTable() == "view_pharmacy_purchase_request_purchased" && $view_pharmacy_purchase_request_items_purchased->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_pharmacy_purchase_request_purchased">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacy_purchase_request_items_purchased->prid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_pharmacy_purchase_request_items_purchased" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs > 0 || $view_pharmacy_purchase_request_items_purchased->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchase_request_items_purchasedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_items_purchased_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_items_purchased_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_items_purchased_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_purchased->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_items_purchased->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_items_purchased->SortUrl($view_pharmacy_purchase_request_items_purchased->id) ?>',1);"><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_items_purchased->SortUrl($view_pharmacy_purchase_request_items_purchased->PRC) ?>',1);"><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_items_purchased->SortUrl($view_pharmacy_purchase_request_items_purchased->PrName) ?>',1);"><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_items_purchased->SortUrl($view_pharmacy_purchase_request_items_purchased->Quantity) ?>',1);"><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_items_purchased->SortUrl($view_pharmacy_purchase_request_items_purchased->ApprovedStatus) ?>',1);"><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->sortUrl($view_pharmacy_purchase_request_items_purchased->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_items_purchased->SortUrl($view_pharmacy_purchase_request_items_purchased->PurchaseStatus) ?>',1);"><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_items_purchased_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_purchase_request_items_purchased->ExportAll && $view_pharmacy_purchase_request_items_purchased->isExport()) {
	$view_pharmacy_purchase_request_items_purchased_list->StopRec = $view_pharmacy_purchase_request_items_purchased_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs > $view_pharmacy_purchase_request_items_purchased_list->StartRec + $view_pharmacy_purchase_request_items_purchased_list->DisplayRecs - 1)
		$view_pharmacy_purchase_request_items_purchased_list->StopRec = $view_pharmacy_purchase_request_items_purchased_list->StartRec + $view_pharmacy_purchase_request_items_purchased_list->DisplayRecs - 1;
	else
		$view_pharmacy_purchase_request_items_purchased_list->StopRec = $view_pharmacy_purchase_request_items_purchased_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_pharmacy_purchase_request_items_purchased_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_purchased_list->FormKeyCountName) && ($view_pharmacy_purchase_request_items_purchased->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->isGridEdit() || $view_pharmacy_purchase_request_items_purchased->isConfirm())) {
		$view_pharmacy_purchase_request_items_purchased_list->KeyCount = $CurrentForm->getValue($view_pharmacy_purchase_request_items_purchased_list->FormKeyCountName);
		$view_pharmacy_purchase_request_items_purchased_list->StopRec = $view_pharmacy_purchase_request_items_purchased_list->StartRec + $view_pharmacy_purchase_request_items_purchased_list->KeyCount - 1;
	}
}
$view_pharmacy_purchase_request_items_purchased_list->RecCnt = $view_pharmacy_purchase_request_items_purchased_list->StartRec - 1;
if ($view_pharmacy_purchase_request_items_purchased_list->Recordset && !$view_pharmacy_purchase_request_items_purchased_list->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_purchased_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_items_purchased_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_items_purchased_list->StartRec > 1)
		$view_pharmacy_purchase_request_items_purchased_list->Recordset->move($view_pharmacy_purchase_request_items_purchased_list->StartRec - 1);
} elseif (!$view_pharmacy_purchase_request_items_purchased->AllowAddDeleteRow && $view_pharmacy_purchase_request_items_purchased_list->StopRec == 0) {
	$view_pharmacy_purchase_request_items_purchased_list->StopRec = $view_pharmacy_purchase_request_items_purchased->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_items_purchased->resetAttributes();
$view_pharmacy_purchase_request_items_purchased_list->renderRow();
if ($view_pharmacy_purchase_request_items_purchased->isGridEdit())
	$view_pharmacy_purchase_request_items_purchased_list->RowIndex = 0;
while ($view_pharmacy_purchase_request_items_purchased_list->RecCnt < $view_pharmacy_purchase_request_items_purchased_list->StopRec) {
	$view_pharmacy_purchase_request_items_purchased_list->RecCnt++;
	if ($view_pharmacy_purchase_request_items_purchased_list->RecCnt >= $view_pharmacy_purchase_request_items_purchased_list->StartRec) {
		$view_pharmacy_purchase_request_items_purchased_list->RowCnt++;
		if ($view_pharmacy_purchase_request_items_purchased->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->isGridEdit() || $view_pharmacy_purchase_request_items_purchased->isConfirm()) {
			$view_pharmacy_purchase_request_items_purchased_list->RowIndex++;
			$CurrentForm->Index = $view_pharmacy_purchase_request_items_purchased_list->RowIndex;
			if ($CurrentForm->hasValue($view_pharmacy_purchase_request_items_purchased_list->FormActionName) && $view_pharmacy_purchase_request_items_purchased_list->EventCancelled)
				$view_pharmacy_purchase_request_items_purchased_list->RowAction = strval($CurrentForm->getValue($view_pharmacy_purchase_request_items_purchased_list->FormActionName));
			elseif ($view_pharmacy_purchase_request_items_purchased->isGridAdd())
				$view_pharmacy_purchase_request_items_purchased_list->RowAction = "insert";
			else
				$view_pharmacy_purchase_request_items_purchased_list->RowAction = "";
		}

		// Set up key count
		$view_pharmacy_purchase_request_items_purchased_list->KeyCount = $view_pharmacy_purchase_request_items_purchased_list->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_items_purchased->resetAttributes();
		$view_pharmacy_purchase_request_items_purchased->CssClass = "";
		if ($view_pharmacy_purchase_request_items_purchased->isGridAdd()) {
			$view_pharmacy_purchase_request_items_purchased_list->loadRowValues(); // Load default values
		} else {
			$view_pharmacy_purchase_request_items_purchased_list->loadRowValues($view_pharmacy_purchase_request_items_purchased_list->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_VIEW; // Render view
		if ($view_pharmacy_purchase_request_items_purchased->isGridEdit()) { // Grid edit
			if ($view_pharmacy_purchase_request_items_purchased->EventCancelled)
				$view_pharmacy_purchase_request_items_purchased_list->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_list->RowIndex); // Restore form values
			if ($view_pharmacy_purchase_request_items_purchased_list->RowAction == "insert")
				$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD; // Render add
			else
				$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_pharmacy_purchase_request_items_purchased->isGridEdit() && ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT || $view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) && $view_pharmacy_purchase_request_items_purchased->EventCancelled) // Update failed
			$view_pharmacy_purchase_request_items_purchased_list->restoreCurrentRowFormValues($view_pharmacy_purchase_request_items_purchased_list->RowIndex); // Restore form values
		if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) // Edit row
			$view_pharmacy_purchase_request_items_purchased_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_items_purchased->RowAttrs = array_merge($view_pharmacy_purchase_request_items_purchased->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_items_purchased_list->RowCnt, 'id'=>'r' . $view_pharmacy_purchase_request_items_purchased_list->RowCnt . '_view_pharmacy_purchase_request_items_purchased', 'data-rowtype'=>$view_pharmacy_purchase_request_items_purchased->RowType));

		// Render row
		$view_pharmacy_purchase_request_items_purchased_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_purchased_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_pharmacy_purchase_request_items_purchased_list->RowAction <> "delete" && $view_pharmacy_purchase_request_items_purchased_list->RowAction <> "insertdelete" && !($view_pharmacy_purchase_request_items_purchased_list->RowAction == "insert" && $view_pharmacy_purchase_request_items_purchased->isConfirm() && $view_pharmacy_purchase_request_items_purchased_list->emptyRow())) {
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_purchased_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_purchased_list->RowCnt);
?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_items_purchased->id->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_id" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PRC->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->PrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->CurrentValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->cellAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->OldValue) ?>">
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_purchased_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_purchased_list->RowCnt);
?>
	</tr>
<?php if ($view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_ADD || $view_pharmacy_purchase_request_items_purchased->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_pharmacy_purchase_request_items_purchasedlist.updateLists(<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_pharmacy_purchase_request_items_purchased->isGridAdd())
		if (!$view_pharmacy_purchase_request_items_purchased_list->Recordset->EOF)
			$view_pharmacy_purchase_request_items_purchased_list->Recordset->moveNext();
}
?>
<?php
	if ($view_pharmacy_purchase_request_items_purchased->isGridAdd() || $view_pharmacy_purchase_request_items_purchased->isGridEdit()) {
		$view_pharmacy_purchase_request_items_purchased_list->RowIndex = '$rowindex$';
		$view_pharmacy_purchase_request_items_purchased_list->loadRowValues();

		// Set row properties
		$view_pharmacy_purchase_request_items_purchased->resetAttributes();
		$view_pharmacy_purchase_request_items_purchased->RowAttrs = array_merge($view_pharmacy_purchase_request_items_purchased->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_items_purchased_list->RowIndex, 'id'=>'r0_view_pharmacy_purchase_request_items_purchased', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_pharmacy_purchase_request_items_purchased->RowAttrs["class"], "ew-template");
		$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_ADD;

		// Render row
		$view_pharmacy_purchase_request_items_purchased_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_items_purchased_list->renderListOptions();
		$view_pharmacy_purchase_request_items_purchased_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_items_purchased_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_items_purchased_list->RowIndex);
?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_id" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<input type="text" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->EditValue ?>"<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_ApprovedStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus">
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-value-separator="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" name="x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus"<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->editAttributes() ?>>
		<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->selectOptionListHtml("x<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" name="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" id="o<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>_PurchaseStatus" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_items_purchased_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_items_purchased_list->RowIndex);
?>
<script>
fview_pharmacy_purchase_request_items_purchasedlist.updateLists(<?php echo $view_pharmacy_purchase_request_items_purchased_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_pharmacy_purchase_request_items_purchased_list->FormKeyCountName ?>" id="<?php echo $view_pharmacy_purchase_request_items_purchased_list->FormKeyCountName ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_list->KeyCount ?>">
<?php echo $view_pharmacy_purchase_request_items_purchased_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_items_purchased_list->Recordset)
	$view_pharmacy_purchase_request_items_purchased_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_purchase_request_items_purchased->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_purchase_request_items_purchased_list->Pager)) $view_pharmacy_purchase_request_items_purchased_list->Pager = new NumericPager($view_pharmacy_purchase_request_items_purchased_list->StartRec, $view_pharmacy_purchase_request_items_purchased_list->DisplayRecs, $view_pharmacy_purchase_request_items_purchased_list->TotalRecs, $view_pharmacy_purchase_request_items_purchased_list->RecRange, $view_pharmacy_purchase_request_items_purchased_list->AutoHidePager) ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_items_purchased_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_purchase_request_items_purchased_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_items_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_items_purchased_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs > 0 && (!$view_pharmacy_purchase_request_items_purchased_list->AutoHidePageSizeSelector || $view_pharmacy_purchase_request_items_purchased_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_purchase_request_items_purchased_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_purchase_request_items_purchased->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_purchased_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased_list->TotalRecs == 0 && !$view_pharmacy_purchase_request_items_purchased->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_items_purchased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_items_purchased_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_purchase_request_items_purchased->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_purchase_request_items_purchased", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_items_purchased_list->terminate();
?>