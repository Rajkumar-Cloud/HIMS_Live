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
$view_item_received_list = new view_item_received_list();

// Run the page
$view_item_received_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_item_received_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_item_received->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_item_receivedlist = currentForm = new ew.Form("fview_item_receivedlist", "list");
fview_item_receivedlist.formKeyCountName = '<?php echo $view_item_received_list->FormKeyCountName ?>';

// Validate form
fview_item_receivedlist.validate = function() {
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
		<?php if ($view_item_received_list->ORDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_ORDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ORDNO->caption(), $view_item_received->ORDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->BRCODE->caption(), $view_item_received->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->PRC->Required) { ?>
			elm = this.getElements("x" + infix + "_PRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PRC->caption(), $view_item_received->PRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->PrName->Required) { ?>
			elm = this.getElements("x" + infix + "_PrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->PrName->caption(), $view_item_received->PrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->MFRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_MFRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->MFRCODE->caption(), $view_item_received->MFRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->BatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->BatchNo->caption(), $view_item_received->BatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->BillDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->BillDate->caption(), $view_item_received->BillDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->ExpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ExpDate->caption(), $view_item_received->ExpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->Quantity->Required) { ?>
			elm = this.getElements("x" + infix + "_Quantity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Quantity->caption(), $view_item_received->Quantity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->FreeQty->Required) { ?>
			elm = this.getElements("x" + infix + "_FreeQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->FreeQty->caption(), $view_item_received->FreeQty->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->ItemValue->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->ItemValue->caption(), $view_item_received->ItemValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->Received->Required) { ?>
			elm = this.getElements("x" + infix + "_Received[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->Received->caption(), $view_item_received->Received->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_item_received_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_item_received->id->caption(), $view_item_received->id->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_item_receivedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_item_receivedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_item_receivedlist.lists["x_ORDNO"] = <?php echo $view_item_received_list->ORDNO->Lookup->toClientList() ?>;
fview_item_receivedlist.lists["x_ORDNO"].options = <?php echo JsonEncode($view_item_received_list->ORDNO->lookupOptions()) ?>;
fview_item_receivedlist.lists["x_BRCODE"] = <?php echo $view_item_received_list->BRCODE->Lookup->toClientList() ?>;
fview_item_receivedlist.lists["x_BRCODE"].options = <?php echo JsonEncode($view_item_received_list->BRCODE->lookupOptions()) ?>;
fview_item_receivedlist.lists["x_Received[]"] = <?php echo $view_item_received_list->Received->Lookup->toClientList() ?>;
fview_item_receivedlist.lists["x_Received[]"].options = <?php echo JsonEncode($view_item_received_list->Received->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_item_receivedlistsrch = currentSearchForm = new ew.Form("fview_item_receivedlistsrch");

// Filters
fview_item_receivedlistsrch.filterList = <?php echo $view_item_received_list->getFilterList() ?>;
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
<?php if (!$view_item_received->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_item_received_list->TotalRecs > 0 && $view_item_received_list->ExportOptions->visible()) { ?>
<?php $view_item_received_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_item_received_list->ImportOptions->visible()) { ?>
<?php $view_item_received_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_item_received_list->SearchOptions->visible()) { ?>
<?php $view_item_received_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_item_received_list->FilterOptions->visible()) { ?>
<?php $view_item_received_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_item_received_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_item_received->isExport() && !$view_item_received->CurrentAction) { ?>
<form name="fview_item_receivedlistsrch" id="fview_item_receivedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_item_received_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_item_receivedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_item_received">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_item_received_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_item_received_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_item_received_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_item_received_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_item_received_list->showPageHeader(); ?>
<?php
$view_item_received_list->showMessage();
?>
<?php if ($view_item_received_list->TotalRecs > 0 || $view_item_received->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_item_received_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_item_received">
<?php if (!$view_item_received->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_item_received->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_item_received_list->Pager)) $view_item_received_list->Pager = new NumericPager($view_item_received_list->StartRec, $view_item_received_list->DisplayRecs, $view_item_received_list->TotalRecs, $view_item_received_list->RecRange, $view_item_received_list->AutoHidePager) ?>
<?php if ($view_item_received_list->Pager->RecordCount > 0 && $view_item_received_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_item_received_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_item_received_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_item_received_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_item_received_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_item_received_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_item_received_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_item_received_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_item_received_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_item_received_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_item_received_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_item_received_list->TotalRecs > 0 && (!$view_item_received_list->AutoHidePageSizeSelector || $view_item_received_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_item_received">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_item_received_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_item_received_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_item_received_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_item_received_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_item_received_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_item_received_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_item_received->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_item_received_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_item_receivedlist" id="fview_item_receivedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_item_received_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_item_received_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_item_received">
<div id="gmp_view_item_received" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_item_received_list->TotalRecs > 0 || $view_item_received->isGridEdit()) { ?>
<table id="tbl_view_item_receivedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_item_received_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_item_received_list->renderListOptions();

// Render list options (header, left)
$view_item_received_list->ListOptions->render("header", "left");
?>
<?php if ($view_item_received->ORDNO->Visible) { // ORDNO ?>
	<?php if ($view_item_received->sortUrl($view_item_received->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $view_item_received->ORDNO->headerCellClass() ?>"><div id="elh_view_item_received_ORDNO" class="view_item_received_ORDNO"><div class="ew-table-header-caption"><?php echo $view_item_received->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $view_item_received->ORDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->ORDNO) ?>',1);"><div id="elh_view_item_received_ORDNO" class="view_item_received_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->ORDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->ORDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->ORDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_item_received->sortUrl($view_item_received->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_item_received->BRCODE->headerCellClass() ?>"><div id="elh_view_item_received_BRCODE" class="view_item_received_BRCODE"><div class="ew-table-header-caption"><?php echo $view_item_received->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_item_received->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->BRCODE) ?>',1);"><div id="elh_view_item_received_BRCODE" class="view_item_received_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->PRC->Visible) { // PRC ?>
	<?php if ($view_item_received->sortUrl($view_item_received->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_item_received->PRC->headerCellClass() ?>"><div id="elh_view_item_received_PRC" class="view_item_received_PRC"><div class="ew-table-header-caption"><?php echo $view_item_received->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_item_received->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->PRC) ?>',1);"><div id="elh_view_item_received_PRC" class="view_item_received_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->PrName->Visible) { // PrName ?>
	<?php if ($view_item_received->sortUrl($view_item_received->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_item_received->PrName->headerCellClass() ?>"><div id="elh_view_item_received_PrName" class="view_item_received_PrName"><div class="ew-table-header-caption"><?php echo $view_item_received->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_item_received->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->PrName) ?>',1);"><div id="elh_view_item_received_PrName" class="view_item_received_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_item_received->sortUrl($view_item_received->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_item_received->MFRCODE->headerCellClass() ?>"><div id="elh_view_item_received_MFRCODE" class="view_item_received_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_item_received->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_item_received->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->MFRCODE) ?>',1);"><div id="elh_view_item_received_MFRCODE" class="view_item_received_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_item_received->sortUrl($view_item_received->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_item_received->BatchNo->headerCellClass() ?>"><div id="elh_view_item_received_BatchNo" class="view_item_received_BatchNo"><div class="ew-table-header-caption"><?php echo $view_item_received->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_item_received->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->BatchNo) ?>',1);"><div id="elh_view_item_received_BatchNo" class="view_item_received_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->BillDate->Visible) { // BillDate ?>
	<?php if ($view_item_received->sortUrl($view_item_received->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_item_received->BillDate->headerCellClass() ?>"><div id="elh_view_item_received_BillDate" class="view_item_received_BillDate"><div class="ew-table-header-caption"><?php echo $view_item_received->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_item_received->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->BillDate) ?>',1);"><div id="elh_view_item_received_BillDate" class="view_item_received_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_item_received->sortUrl($view_item_received->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_item_received->ExpDate->headerCellClass() ?>"><div id="elh_view_item_received_ExpDate" class="view_item_received_ExpDate"><div class="ew-table-header-caption"><?php echo $view_item_received->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_item_received->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->ExpDate) ?>',1);"><div id="elh_view_item_received_ExpDate" class="view_item_received_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->Quantity->Visible) { // Quantity ?>
	<?php if ($view_item_received->sortUrl($view_item_received->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_item_received->Quantity->headerCellClass() ?>"><div id="elh_view_item_received_Quantity" class="view_item_received_Quantity"><div class="ew-table-header-caption"><?php echo $view_item_received->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_item_received->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->Quantity) ?>',1);"><div id="elh_view_item_received_Quantity" class="view_item_received_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_item_received->sortUrl($view_item_received->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_item_received->FreeQty->headerCellClass() ?>"><div id="elh_view_item_received_FreeQty" class="view_item_received_FreeQty"><div class="ew-table-header-caption"><?php echo $view_item_received->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_item_received->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->FreeQty) ?>',1);"><div id="elh_view_item_received_FreeQty" class="view_item_received_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_item_received->sortUrl($view_item_received->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_item_received->ItemValue->headerCellClass() ?>"><div id="elh_view_item_received_ItemValue" class="view_item_received_ItemValue"><div class="ew-table-header-caption"><?php echo $view_item_received->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_item_received->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->ItemValue) ?>',1);"><div id="elh_view_item_received_ItemValue" class="view_item_received_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->Received->Visible) { // Received ?>
	<?php if ($view_item_received->sortUrl($view_item_received->Received) == "") { ?>
		<th data-name="Received" class="<?php echo $view_item_received->Received->headerCellClass() ?>"><div id="elh_view_item_received_Received" class="view_item_received_Received"><div class="ew-table-header-caption"><?php echo $view_item_received->Received->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Received" class="<?php echo $view_item_received->Received->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->Received) ?>',1);"><div id="elh_view_item_received_Received" class="view_item_received_Received">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->Received->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->Received->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->Received->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_item_received->id->Visible) { // id ?>
	<?php if ($view_item_received->sortUrl($view_item_received->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_item_received->id->headerCellClass() ?>"><div id="elh_view_item_received_id" class="view_item_received_id"><div class="ew-table-header-caption"><?php echo $view_item_received->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_item_received->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_item_received->SortUrl($view_item_received->id) ?>',1);"><div id="elh_view_item_received_id" class="view_item_received_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_item_received->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_item_received->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_item_received->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_item_received_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_item_received->ExportAll && $view_item_received->isExport()) {
	$view_item_received_list->StopRec = $view_item_received_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_item_received_list->TotalRecs > $view_item_received_list->StartRec + $view_item_received_list->DisplayRecs - 1)
		$view_item_received_list->StopRec = $view_item_received_list->StartRec + $view_item_received_list->DisplayRecs - 1;
	else
		$view_item_received_list->StopRec = $view_item_received_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_item_received_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_item_received_list->FormKeyCountName) && ($view_item_received->isGridAdd() || $view_item_received->isGridEdit() || $view_item_received->isConfirm())) {
		$view_item_received_list->KeyCount = $CurrentForm->getValue($view_item_received_list->FormKeyCountName);
		$view_item_received_list->StopRec = $view_item_received_list->StartRec + $view_item_received_list->KeyCount - 1;
	}
}
$view_item_received_list->RecCnt = $view_item_received_list->StartRec - 1;
if ($view_item_received_list->Recordset && !$view_item_received_list->Recordset->EOF) {
	$view_item_received_list->Recordset->moveFirst();
	$selectLimit = $view_item_received_list->UseSelectLimit;
	if (!$selectLimit && $view_item_received_list->StartRec > 1)
		$view_item_received_list->Recordset->move($view_item_received_list->StartRec - 1);
} elseif (!$view_item_received->AllowAddDeleteRow && $view_item_received_list->StopRec == 0) {
	$view_item_received_list->StopRec = $view_item_received->GridAddRowCount;
}

// Initialize aggregate
$view_item_received->RowType = ROWTYPE_AGGREGATEINIT;
$view_item_received->resetAttributes();
$view_item_received_list->renderRow();
if ($view_item_received->isGridEdit())
	$view_item_received_list->RowIndex = 0;
while ($view_item_received_list->RecCnt < $view_item_received_list->StopRec) {
	$view_item_received_list->RecCnt++;
	if ($view_item_received_list->RecCnt >= $view_item_received_list->StartRec) {
		$view_item_received_list->RowCnt++;
		if ($view_item_received->isGridAdd() || $view_item_received->isGridEdit() || $view_item_received->isConfirm()) {
			$view_item_received_list->RowIndex++;
			$CurrentForm->Index = $view_item_received_list->RowIndex;
			if ($CurrentForm->hasValue($view_item_received_list->FormActionName) && $view_item_received_list->EventCancelled)
				$view_item_received_list->RowAction = strval($CurrentForm->getValue($view_item_received_list->FormActionName));
			elseif ($view_item_received->isGridAdd())
				$view_item_received_list->RowAction = "insert";
			else
				$view_item_received_list->RowAction = "";
		}

		// Set up key count
		$view_item_received_list->KeyCount = $view_item_received_list->RowIndex;

		// Init row class and style
		$view_item_received->resetAttributes();
		$view_item_received->CssClass = "";
		if ($view_item_received->isGridAdd()) {
			$view_item_received_list->loadRowValues(); // Load default values
		} else {
			$view_item_received_list->loadRowValues($view_item_received_list->Recordset); // Load row values
		}
		$view_item_received->RowType = ROWTYPE_VIEW; // Render view
		if ($view_item_received->isGridEdit()) { // Grid edit
			if ($view_item_received->EventCancelled)
				$view_item_received_list->restoreCurrentRowFormValues($view_item_received_list->RowIndex); // Restore form values
			if ($view_item_received_list->RowAction == "insert")
				$view_item_received->RowType = ROWTYPE_ADD; // Render add
			else
				$view_item_received->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_item_received->isGridEdit() && ($view_item_received->RowType == ROWTYPE_EDIT || $view_item_received->RowType == ROWTYPE_ADD) && $view_item_received->EventCancelled) // Update failed
			$view_item_received_list->restoreCurrentRowFormValues($view_item_received_list->RowIndex); // Restore form values
		if ($view_item_received->RowType == ROWTYPE_EDIT) // Edit row
			$view_item_received_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_item_received->RowAttrs = array_merge($view_item_received->RowAttrs, array('data-rowindex'=>$view_item_received_list->RowCnt, 'id'=>'r' . $view_item_received_list->RowCnt . '_view_item_received', 'data-rowtype'=>$view_item_received->RowType));

		// Render row
		$view_item_received_list->renderRow();

		// Render list options
		$view_item_received_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_item_received_list->RowAction <> "delete" && $view_item_received_list->RowAction <> "insertdelete" && !($view_item_received_list->RowAction == "insert" && $view_item_received->isConfirm() && $view_item_received_list->emptyRow())) {
?>
	<tr<?php echo $view_item_received->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_item_received_list->ListOptions->render("body", "left", $view_item_received_list->RowCnt);
?>
	<?php if ($view_item_received->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO"<?php echo $view_item_received->ORDNO->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ORDNO" class="form-group view_item_received_ORDNO">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_ORDNO" data-value-separator="<?php echo $view_item_received->ORDNO->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" name="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO"<?php echo $view_item_received->ORDNO->editAttributes() ?>>
		<?php echo $view_item_received->ORDNO->selectOptionListHtml("x<?php echo $view_item_received_list->RowIndex ?>_ORDNO") ?>
	</select>
</div>
<?php echo $view_item_received->ORDNO->Lookup->getParamTag("p_x" . $view_item_received_list->RowIndex . "_ORDNO") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" id="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_item_received->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ORDNO" class="form-group view_item_received_ORDNO">
<span<?php echo $view_item_received->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->ORDNO->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" id="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_item_received->ORDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ORDNO" class="view_item_received_ORDNO">
<span<?php echo $view_item_received->ORDNO->viewAttributes() ?>>
<?php echo $view_item_received->ORDNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_item_received->BRCODE->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BRCODE" class="form-group view_item_received_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_BRCODE" data-value-separator="<?php echo $view_item_received->BRCODE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE"<?php echo $view_item_received->BRCODE->editAttributes() ?>>
		<?php echo $view_item_received->BRCODE->selectOptionListHtml("x<?php echo $view_item_received_list->RowIndex ?>_BRCODE") ?>
	</select>
</div>
<?php echo $view_item_received->BRCODE->Lookup->getParamTag("p_x" . $view_item_received_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_item_received->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BRCODE" class="form-group view_item_received_BRCODE">
<span<?php echo $view_item_received->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->BRCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_item_received->BRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BRCODE" class="view_item_received_BRCODE">
<span<?php echo $view_item_received->BRCODE->viewAttributes() ?>>
<?php echo $view_item_received->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_item_received->PRC->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_PRC" class="form-group view_item_received_PRC">
<input type="text" data-table="view_item_received" data-field="x_PRC" name="x<?php echo $view_item_received_list->RowIndex ?>_PRC" id="x<?php echo $view_item_received_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_item_received->PRC->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PRC->EditValue ?>"<?php echo $view_item_received->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="o<?php echo $view_item_received_list->RowIndex ?>_PRC" id="o<?php echo $view_item_received_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_item_received->PRC->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_PRC" class="form-group view_item_received_PRC">
<span<?php echo $view_item_received->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->PRC->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="x<?php echo $view_item_received_list->RowIndex ?>_PRC" id="x<?php echo $view_item_received_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_item_received->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_PRC" class="view_item_received_PRC">
<span<?php echo $view_item_received->PRC->viewAttributes() ?>>
<?php echo $view_item_received->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_item_received->PrName->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_PrName" class="form-group view_item_received_PrName">
<input type="text" data-table="view_item_received" data-field="x_PrName" name="x<?php echo $view_item_received_list->RowIndex ?>_PrName" id="x<?php echo $view_item_received_list->RowIndex ?>_PrName" size="200" maxlength="200" placeholder="<?php echo HtmlEncode($view_item_received->PrName->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PrName->EditValue ?>"<?php echo $view_item_received->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="o<?php echo $view_item_received_list->RowIndex ?>_PrName" id="o<?php echo $view_item_received_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_item_received->PrName->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_PrName" class="form-group view_item_received_PrName">
<span<?php echo $view_item_received->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->PrName->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="x<?php echo $view_item_received_list->RowIndex ?>_PrName" id="x<?php echo $view_item_received_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_item_received->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_PrName" class="view_item_received_PrName">
<span<?php echo $view_item_received->PrName->viewAttributes() ?>>
<?php echo $view_item_received->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_item_received->MFRCODE->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_MFRCODE" class="form-group view_item_received_MFRCODE">
<input type="text" data-table="view_item_received" data-field="x_MFRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_item_received->MFRCODE->EditValue ?>"<?php echo $view_item_received->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_item_received->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_MFRCODE" class="form-group view_item_received_MFRCODE">
<span<?php echo $view_item_received->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->MFRCODE->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_item_received->MFRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_MFRCODE" class="view_item_received_MFRCODE">
<span<?php echo $view_item_received->MFRCODE->viewAttributes() ?>>
<?php echo $view_item_received->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_item_received->BatchNo->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BatchNo" class="form-group view_item_received_BatchNo">
<input type="text" data-table="view_item_received" data-field="x_BatchNo" name="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_item_received->BatchNo->EditValue ?>"<?php echo $view_item_received->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_item_received->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BatchNo" class="form-group view_item_received_BatchNo">
<span<?php echo $view_item_received->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->BatchNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_item_received->BatchNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BatchNo" class="view_item_received_BatchNo">
<span<?php echo $view_item_received->BatchNo->viewAttributes() ?>>
<?php echo $view_item_received->BatchNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_item_received->BillDate->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BillDate" class="form-group view_item_received_BillDate">
<input type="text" data-table="view_item_received" data-field="x_BillDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_item_received->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received->BillDate->EditValue ?>"<?php echo $view_item_received->BillDate->editAttributes() ?>>
<?php if (!$view_item_received->BillDate->ReadOnly && !$view_item_received->BillDate->Disabled && !isset($view_item_received->BillDate->EditAttrs["readonly"]) && !isset($view_item_received->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" name="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_item_received->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BillDate" class="form-group view_item_received_BillDate">
<span<?php echo $view_item_received->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->BillDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" name="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_item_received->BillDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_BillDate" class="view_item_received_BillDate">
<span<?php echo $view_item_received->BillDate->viewAttributes() ?>>
<?php echo $view_item_received->BillDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_item_received->ExpDate->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ExpDate" class="form-group view_item_received_ExpDate">
<input type="text" data-table="view_item_received" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_item_received->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received->ExpDate->EditValue ?>"<?php echo $view_item_received->ExpDate->editAttributes() ?>>
<?php if (!$view_item_received->ExpDate->ReadOnly && !$view_item_received->ExpDate->Disabled && !isset($view_item_received->ExpDate->EditAttrs["readonly"]) && !isset($view_item_received->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_item_received->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ExpDate" class="form-group view_item_received_ExpDate">
<span<?php echo $view_item_received->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->ExpDate->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_item_received->ExpDate->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ExpDate" class="view_item_received_ExpDate">
<span<?php echo $view_item_received->ExpDate->viewAttributes() ?>>
<?php echo $view_item_received->ExpDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_item_received->Quantity->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_Quantity" class="form-group view_item_received_Quantity">
<input type="text" data-table="view_item_received" data-field="x_Quantity" name="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" size="30" placeholder="<?php echo HtmlEncode($view_item_received->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Quantity->EditValue ?>"<?php echo $view_item_received->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_item_received->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_Quantity" class="form-group view_item_received_Quantity">
<span<?php echo $view_item_received->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->Quantity->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_item_received->Quantity->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_Quantity" class="view_item_received_Quantity">
<span<?php echo $view_item_received->Quantity->viewAttributes() ?>>
<?php echo $view_item_received->Quantity->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_item_received->FreeQty->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_FreeQty" class="form-group view_item_received_FreeQty">
<input type="text" data-table="view_item_received" data-field="x_FreeQty" name="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" size="30" placeholder="<?php echo HtmlEncode($view_item_received->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_item_received->FreeQty->EditValue ?>"<?php echo $view_item_received->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_item_received->FreeQty->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_FreeQty" class="form-group view_item_received_FreeQty">
<span<?php echo $view_item_received->FreeQty->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->FreeQty->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_item_received->FreeQty->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_FreeQty" class="view_item_received_FreeQty">
<span<?php echo $view_item_received->FreeQty->viewAttributes() ?>>
<?php echo $view_item_received->FreeQty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_item_received->ItemValue->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ItemValue" class="form-group view_item_received_ItemValue">
<input type="text" data-table="view_item_received" data-field="x_ItemValue" name="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" size="30" placeholder="<?php echo HtmlEncode($view_item_received->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_item_received->ItemValue->EditValue ?>"<?php echo $view_item_received->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_item_received->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ItemValue" class="form-group view_item_received_ItemValue">
<span<?php echo $view_item_received->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->ItemValue->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_item_received->ItemValue->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_ItemValue" class="view_item_received_ItemValue">
<span<?php echo $view_item_received->ItemValue->viewAttributes() ?>>
<?php echo $view_item_received->ItemValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->Received->Visible) { // Received ?>
		<td data-name="Received"<?php echo $view_item_received->Received->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_Received" class="form-group view_item_received_Received">
<div id="tp_x<?php echo $view_item_received_list->RowIndex ?>_Received" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received->Received->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="{value}"<?php echo $view_item_received->Received->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_item_received_list->RowIndex ?>_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received->Received->checkBoxListHtml(FALSE, "x{$view_item_received_list->RowIndex}_Received[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Received" name="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="<?php echo HtmlEncode($view_item_received->Received->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_Received" class="form-group view_item_received_Received">
<div id="tp_x<?php echo $view_item_received_list->RowIndex ?>_Received" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received->Received->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="{value}"<?php echo $view_item_received->Received->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_item_received_list->RowIndex ?>_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received->Received->checkBoxListHtml(FALSE, "x{$view_item_received_list->RowIndex}_Received[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_Received" class="view_item_received_Received">
<span<?php echo $view_item_received->Received->viewAttributes() ?>>
<?php echo $view_item_received->Received->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_item_received->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_item_received->id->cellAttributes() ?>>
<?php if ($view_item_received->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_item_received" data-field="x_id" name="o<?php echo $view_item_received_list->RowIndex ?>_id" id="o<?php echo $view_item_received_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_item_received->id->OldValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_id" class="form-group view_item_received_id">
<span<?php echo $view_item_received->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_item_received->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_id" name="x<?php echo $view_item_received_list->RowIndex ?>_id" id="x<?php echo $view_item_received_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_item_received->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_item_received->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_item_received_list->RowCnt ?>_view_item_received_id" class="view_item_received_id">
<span<?php echo $view_item_received->id->viewAttributes() ?>>
<?php echo $view_item_received->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_item_received_list->ListOptions->render("body", "right", $view_item_received_list->RowCnt);
?>
	</tr>
<?php if ($view_item_received->RowType == ROWTYPE_ADD || $view_item_received->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_item_receivedlist.updateLists(<?php echo $view_item_received_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_item_received->isGridAdd())
		if (!$view_item_received_list->Recordset->EOF)
			$view_item_received_list->Recordset->moveNext();
}
?>
<?php
	if ($view_item_received->isGridAdd() || $view_item_received->isGridEdit()) {
		$view_item_received_list->RowIndex = '$rowindex$';
		$view_item_received_list->loadRowValues();

		// Set row properties
		$view_item_received->resetAttributes();
		$view_item_received->RowAttrs = array_merge($view_item_received->RowAttrs, array('data-rowindex'=>$view_item_received_list->RowIndex, 'id'=>'r0_view_item_received', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_item_received->RowAttrs["class"], "ew-template");
		$view_item_received->RowType = ROWTYPE_ADD;

		// Render row
		$view_item_received_list->renderRow();

		// Render list options
		$view_item_received_list->renderListOptions();
		$view_item_received_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_item_received->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_item_received_list->ListOptions->render("body", "left", $view_item_received_list->RowIndex);
?>
	<?php if ($view_item_received->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO">
<span id="el$rowindex$_view_item_received_ORDNO" class="form-group view_item_received_ORDNO">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_ORDNO" data-value-separator="<?php echo $view_item_received->ORDNO->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO" name="x<?php echo $view_item_received_list->RowIndex ?>_ORDNO"<?php echo $view_item_received->ORDNO->editAttributes() ?>>
		<?php echo $view_item_received->ORDNO->selectOptionListHtml("x<?php echo $view_item_received_list->RowIndex ?>_ORDNO") ?>
	</select>
</div>
<?php echo $view_item_received->ORDNO->Lookup->getParamTag("p_x" . $view_item_received_list->RowIndex . "_ORDNO") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ORDNO" name="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" id="o<?php echo $view_item_received_list->RowIndex ?>_ORDNO" value="<?php echo HtmlEncode($view_item_received->ORDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<span id="el$rowindex$_view_item_received_BRCODE" class="form-group view_item_received_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_item_received" data-field="x_BRCODE" data-value-separator="<?php echo $view_item_received->BRCODE->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_BRCODE"<?php echo $view_item_received->BRCODE->editAttributes() ?>>
		<?php echo $view_item_received->BRCODE->selectOptionListHtml("x<?php echo $view_item_received_list->RowIndex ?>_BRCODE") ?>
	</select>
</div>
<?php echo $view_item_received->BRCODE->Lookup->getParamTag("p_x" . $view_item_received_list->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($view_item_received->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<span id="el$rowindex$_view_item_received_PRC" class="form-group view_item_received_PRC">
<input type="text" data-table="view_item_received" data-field="x_PRC" name="x<?php echo $view_item_received_list->RowIndex ?>_PRC" id="x<?php echo $view_item_received_list->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_item_received->PRC->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PRC->EditValue ?>"<?php echo $view_item_received->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PRC" name="o<?php echo $view_item_received_list->RowIndex ?>_PRC" id="o<?php echo $view_item_received_list->RowIndex ?>_PRC" value="<?php echo HtmlEncode($view_item_received->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<span id="el$rowindex$_view_item_received_PrName" class="form-group view_item_received_PrName">
<input type="text" data-table="view_item_received" data-field="x_PrName" name="x<?php echo $view_item_received_list->RowIndex ?>_PrName" id="x<?php echo $view_item_received_list->RowIndex ?>_PrName" size="200" maxlength="200" placeholder="<?php echo HtmlEncode($view_item_received->PrName->getPlaceHolder()) ?>" value="<?php echo $view_item_received->PrName->EditValue ?>"<?php echo $view_item_received->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_PrName" name="o<?php echo $view_item_received_list->RowIndex ?>_PrName" id="o<?php echo $view_item_received_list->RowIndex ?>_PrName" value="<?php echo HtmlEncode($view_item_received->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE">
<span id="el$rowindex$_view_item_received_MFRCODE" class="form-group view_item_received_MFRCODE">
<input type="text" data-table="view_item_received" data-field="x_MFRCODE" name="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="x<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received->MFRCODE->getPlaceHolder()) ?>" value="<?php echo $view_item_received->MFRCODE->EditValue ?>"<?php echo $view_item_received->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_MFRCODE" name="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" id="o<?php echo $view_item_received_list->RowIndex ?>_MFRCODE" value="<?php echo HtmlEncode($view_item_received->MFRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo">
<span id="el$rowindex$_view_item_received_BatchNo" class="form-group view_item_received_BatchNo">
<input type="text" data-table="view_item_received" data-field="x_BatchNo" name="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="x<?php echo $view_item_received_list->RowIndex ?>_BatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_item_received->BatchNo->getPlaceHolder()) ?>" value="<?php echo $view_item_received->BatchNo->EditValue ?>"<?php echo $view_item_received->BatchNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BatchNo" name="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" id="o<?php echo $view_item_received_list->RowIndex ?>_BatchNo" value="<?php echo HtmlEncode($view_item_received->BatchNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate">
<span id="el$rowindex$_view_item_received_BillDate" class="form-group view_item_received_BillDate">
<input type="text" data-table="view_item_received" data-field="x_BillDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="x<?php echo $view_item_received_list->RowIndex ?>_BillDate" placeholder="<?php echo HtmlEncode($view_item_received->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received->BillDate->EditValue ?>"<?php echo $view_item_received->BillDate->editAttributes() ?>>
<?php if (!$view_item_received->BillDate->ReadOnly && !$view_item_received->BillDate->Disabled && !isset($view_item_received->BillDate->EditAttrs["readonly"]) && !isset($view_item_received->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_BillDate" name="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" id="o<?php echo $view_item_received_list->RowIndex ?>_BillDate" value="<?php echo HtmlEncode($view_item_received->BillDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate">
<span id="el$rowindex$_view_item_received_ExpDate" class="form-group view_item_received_ExpDate">
<input type="text" data-table="view_item_received" data-field="x_ExpDate" data-format="7" name="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="x<?php echo $view_item_received_list->RowIndex ?>_ExpDate" placeholder="<?php echo HtmlEncode($view_item_received->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_item_received->ExpDate->EditValue ?>"<?php echo $view_item_received->ExpDate->editAttributes() ?>>
<?php if (!$view_item_received->ExpDate->ReadOnly && !$view_item_received->ExpDate->Disabled && !isset($view_item_received->ExpDate->EditAttrs["readonly"]) && !isset($view_item_received->ExpDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_item_receivedlist", "x<?php echo $view_item_received_list->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ExpDate" name="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" id="o<?php echo $view_item_received_list->RowIndex ?>_ExpDate" value="<?php echo HtmlEncode($view_item_received->ExpDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<span id="el$rowindex$_view_item_received_Quantity" class="form-group view_item_received_Quantity">
<input type="text" data-table="view_item_received" data-field="x_Quantity" name="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="x<?php echo $view_item_received_list->RowIndex ?>_Quantity" size="30" placeholder="<?php echo HtmlEncode($view_item_received->Quantity->getPlaceHolder()) ?>" value="<?php echo $view_item_received->Quantity->EditValue ?>"<?php echo $view_item_received->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Quantity" name="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" id="o<?php echo $view_item_received_list->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($view_item_received->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty">
<span id="el$rowindex$_view_item_received_FreeQty" class="form-group view_item_received_FreeQty">
<input type="text" data-table="view_item_received" data-field="x_FreeQty" name="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="x<?php echo $view_item_received_list->RowIndex ?>_FreeQty" size="30" placeholder="<?php echo HtmlEncode($view_item_received->FreeQty->getPlaceHolder()) ?>" value="<?php echo $view_item_received->FreeQty->EditValue ?>"<?php echo $view_item_received->FreeQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_FreeQty" name="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" id="o<?php echo $view_item_received_list->RowIndex ?>_FreeQty" value="<?php echo HtmlEncode($view_item_received->FreeQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue">
<span id="el$rowindex$_view_item_received_ItemValue" class="form-group view_item_received_ItemValue">
<input type="text" data-table="view_item_received" data-field="x_ItemValue" name="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="x<?php echo $view_item_received_list->RowIndex ?>_ItemValue" size="30" placeholder="<?php echo HtmlEncode($view_item_received->ItemValue->getPlaceHolder()) ?>" value="<?php echo $view_item_received->ItemValue->EditValue ?>"<?php echo $view_item_received->ItemValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_ItemValue" name="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" id="o<?php echo $view_item_received_list->RowIndex ?>_ItemValue" value="<?php echo HtmlEncode($view_item_received->ItemValue->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->Received->Visible) { // Received ?>
		<td data-name="Received">
<span id="el$rowindex$_view_item_received_Received" class="form-group view_item_received_Received">
<div id="tp_x<?php echo $view_item_received_list->RowIndex ?>_Received" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_item_received" data-field="x_Received" data-value-separator="<?php echo $view_item_received->Received->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="x<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="{value}"<?php echo $view_item_received->Received->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_item_received_list->RowIndex ?>_Received" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_item_received->Received->checkBoxListHtml(FALSE, "x{$view_item_received_list->RowIndex}_Received[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_item_received" data-field="x_Received" name="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" id="o<?php echo $view_item_received_list->RowIndex ?>_Received[]" value="<?php echo HtmlEncode($view_item_received->Received->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_item_received->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="view_item_received" data-field="x_id" name="o<?php echo $view_item_received_list->RowIndex ?>_id" id="o<?php echo $view_item_received_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_item_received->id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_item_received_list->ListOptions->render("body", "right", $view_item_received_list->RowIndex);
?>
<script>
fview_item_receivedlist.updateLists(<?php echo $view_item_received_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$view_item_received->RowType = ROWTYPE_AGGREGATE;
$view_item_received->resetAttributes();
$view_item_received_list->renderRow();
?>
<?php if ($view_item_received_list->TotalRecs > 0 && !$view_item_received->isGridAdd() && !$view_item_received->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_item_received_list->renderListOptions();

// Render list options (footer, left)
$view_item_received_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_item_received->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO" class="<?php echo $view_item_received->ORDNO->footerCellClass() ?>"><span id="elf_view_item_received_ORDNO" class="view_item_received_ORDNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_item_received->BRCODE->footerCellClass() ?>"><span id="elf_view_item_received_BRCODE" class="view_item_received_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_item_received->PRC->footerCellClass() ?>"><span id="elf_view_item_received_PRC" class="view_item_received_PRC">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_item_received->PRC->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_item_received->PrName->footerCellClass() ?>"><span id="elf_view_item_received_PrName" class="view_item_received_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_item_received->MFRCODE->footerCellClass() ?>"><span id="elf_view_item_received_MFRCODE" class="view_item_received_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_item_received->BatchNo->footerCellClass() ?>"><span id="elf_view_item_received_BatchNo" class="view_item_received_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_item_received->BillDate->footerCellClass() ?>"><span id="elf_view_item_received_BillDate" class="view_item_received_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_item_received->ExpDate->footerCellClass() ?>"><span id="elf_view_item_received_ExpDate" class="view_item_received_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_item_received->Quantity->footerCellClass() ?>"><span id="elf_view_item_received_Quantity" class="view_item_received_Quantity">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_item_received->Quantity->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_item_received->FreeQty->footerCellClass() ?>"><span id="elf_view_item_received_FreeQty" class="view_item_received_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_item_received->ItemValue->footerCellClass() ?>"><span id="elf_view_item_received_ItemValue" class="view_item_received_ItemValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->Received->Visible) { // Received ?>
		<td data-name="Received" class="<?php echo $view_item_received->Received->footerCellClass() ?>"><span id="elf_view_item_received_Received" class="view_item_received_Received">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_item_received->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_item_received->id->footerCellClass() ?>"><span id="elf_view_item_received_id" class="view_item_received_id">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_item_received_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_item_received->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_item_received_list->FormKeyCountName ?>" id="<?php echo $view_item_received_list->FormKeyCountName ?>" value="<?php echo $view_item_received_list->KeyCount ?>">
<?php echo $view_item_received_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_item_received->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_item_received_list->Recordset)
	$view_item_received_list->Recordset->Close();
?>
<?php if (!$view_item_received->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_item_received->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_item_received_list->Pager)) $view_item_received_list->Pager = new NumericPager($view_item_received_list->StartRec, $view_item_received_list->DisplayRecs, $view_item_received_list->TotalRecs, $view_item_received_list->RecRange, $view_item_received_list->AutoHidePager) ?>
<?php if ($view_item_received_list->Pager->RecordCount > 0 && $view_item_received_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_item_received_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_item_received_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_item_received_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_item_received_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_item_received_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_item_received_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_item_received_list->pageUrl() ?>start=<?php echo $view_item_received_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_item_received_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_item_received_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_item_received_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_item_received_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_item_received_list->TotalRecs > 0 && (!$view_item_received_list->AutoHidePageSizeSelector || $view_item_received_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_item_received">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_item_received_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_item_received_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_item_received_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_item_received_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_item_received_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_item_received_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_item_received->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_item_received_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_item_received_list->TotalRecs == 0 && !$view_item_received->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_item_received_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_item_received_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_item_received->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

$("[data-name='PRC']").width('100px');
$("[data-name='PrName']").width('400px');
$("[data-name='BatchNo']").width('100px');
$("[data-name='BillDate']").width('100px');
$("[data-name='ExpDate']").width('100px');
$("[data-name='Quantity']").width('100px');
$("[data-name='ItemValue']").width('100px');
</script>
<?php if (!$view_item_received->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_item_received", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_item_received_list->terminate();
?>