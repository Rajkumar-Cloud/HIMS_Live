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
$view_gst_output_list = new view_gst_output_list();

// Run the page
$view_gst_output_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_gst_output_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_gst_output->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_gst_outputlist = currentForm = new ew.Form("fview_gst_outputlist", "list");
fview_gst_outputlist.formKeyCountName = '<?php echo $view_gst_output_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_gst_outputlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_gst_outputlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_gst_outputlistsrch = currentSearchForm = new ew.Form("fview_gst_outputlistsrch");

// Validate function for search
fview_gst_outputlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_BillDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_gst_output->BillDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_gst_outputlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_gst_outputlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_gst_outputlistsrch.filterList = <?php echo $view_gst_output_list->getFilterList() ?>;
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
<?php if (!$view_gst_output->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_gst_output_list->TotalRecs > 0 && $view_gst_output_list->ExportOptions->visible()) { ?>
<?php $view_gst_output_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_gst_output_list->ImportOptions->visible()) { ?>
<?php $view_gst_output_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_gst_output_list->SearchOptions->visible()) { ?>
<?php $view_gst_output_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_gst_output_list->FilterOptions->visible()) { ?>
<?php $view_gst_output_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_gst_output_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_gst_output->isExport() && !$view_gst_output->CurrentAction) { ?>
<form name="fview_gst_outputlistsrch" id="fview_gst_outputlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_gst_output_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_gst_outputlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_gst_output">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_gst_output_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_gst_output->RowType = ROWTYPE_SEARCH;

// Render row
$view_gst_output->resetAttributes();
$view_gst_output_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_gst_output->BillDate->Visible) { // BillDate ?>
	<div id="xsc_BillDate" class="ew-cell form-group">
		<label for="x_BillDate" class="ew-search-caption ew-label"><?php echo $view_gst_output->BillDate->caption() ?></label>
		<span class="ew-search-operator"><select name="z_BillDate" id="z_BillDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_gst_output->BillDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_gst_output" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_gst_output->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_gst_output->BillDate->EditValue ?>"<?php echo $view_gst_output->BillDate->editAttributes() ?>>
<?php if (!$view_gst_output->BillDate->ReadOnly && !$view_gst_output->BillDate->Disabled && !isset($view_gst_output->BillDate->EditAttrs["readonly"]) && !isset($view_gst_output->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_gst_outputlistsrch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_BillDate style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_BillDate style="d-none"">
<input type="text" data-table="view_gst_output" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?php echo HtmlEncode($view_gst_output->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_gst_output->BillDate->EditValue2 ?>"<?php echo $view_gst_output->BillDate->editAttributes() ?>>
<?php if (!$view_gst_output->BillDate->ReadOnly && !$view_gst_output->BillDate->Disabled && !isset($view_gst_output->BillDate->EditAttrs["readonly"]) && !isset($view_gst_output->BillDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_gst_outputlistsrch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_gst_output_list->showPageHeader(); ?>
<?php
$view_gst_output_list->showMessage();
?>
<?php if ($view_gst_output_list->TotalRecs > 0 || $view_gst_output->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_gst_output_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_gst_output">
<?php if (!$view_gst_output->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_gst_output->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_gst_output_list->Pager)) $view_gst_output_list->Pager = new NumericPager($view_gst_output_list->StartRec, $view_gst_output_list->DisplayRecs, $view_gst_output_list->TotalRecs, $view_gst_output_list->RecRange, $view_gst_output_list->AutoHidePager) ?>
<?php if ($view_gst_output_list->Pager->RecordCount > 0 && $view_gst_output_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_gst_output_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_gst_output_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_gst_output_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_gst_output_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_gst_output_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_gst_output_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_gst_output_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_gst_output_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_gst_output_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_gst_output_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_gst_output_list->TotalRecs > 0 && (!$view_gst_output_list->AutoHidePageSizeSelector || $view_gst_output_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_gst_output">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_gst_output_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_gst_output_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_gst_output_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_gst_output_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_gst_output_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_gst_output_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_gst_output->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_gst_output_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_gst_outputlist" id="fview_gst_outputlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_gst_output_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_gst_output_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_gst_output">
<div id="gmp_view_gst_output" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_gst_output_list->TotalRecs > 0 || $view_gst_output->isGridEdit()) { ?>
<table id="tbl_view_gst_outputlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_gst_output_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_gst_output_list->renderListOptions();

// Render list options (header, left)
$view_gst_output_list->ListOptions->render("header", "left");
?>
<?php if ($view_gst_output->BillDate->Visible) { // BillDate ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_gst_output->BillDate->headerCellClass() ?>"><div id="elh_view_gst_output_BillDate" class="view_gst_output_BillDate"><div class="ew-table-header-caption"><?php echo $view_gst_output->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_gst_output->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->BillDate) ?>',1);"><div id="elh_view_gst_output_BillDate" class="view_gst_output_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_2_525_SGST->Visible) { // IP 2.5% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_2_525_SGST) == "") { ?>
		<th data-name="IP_2_525_SGST" class="<?php echo $view_gst_output->IP_2_525_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_2_525_SGST" class="view_gst_output_IP_2_525_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_2_525_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_2_525_SGST" class="<?php echo $view_gst_output->IP_2_525_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_2_525_SGST) ?>',1);"><div id="elh_view_gst_output_IP_2_525_SGST" class="view_gst_output_IP_2_525_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_2_525_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_2_525_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_2_525_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_2_525_CGST->Visible) { // IP 2.5% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_2_525_CGST) == "") { ?>
		<th data-name="IP_2_525_CGST" class="<?php echo $view_gst_output->IP_2_525_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_2_525_CGST" class="view_gst_output_IP_2_525_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_2_525_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_2_525_CGST" class="<?php echo $view_gst_output->IP_2_525_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_2_525_CGST) ?>',1);"><div id="elh_view_gst_output_IP_2_525_CGST" class="view_gst_output_IP_2_525_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_2_525_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_2_525_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_2_525_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_6_025_SGST->Visible) { // IP 6.0% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_6_025_SGST) == "") { ?>
		<th data-name="IP_6_025_SGST" class="<?php echo $view_gst_output->IP_6_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_6_025_SGST" class="view_gst_output_IP_6_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_6_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_6_025_SGST" class="<?php echo $view_gst_output->IP_6_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_6_025_SGST) ?>',1);"><div id="elh_view_gst_output_IP_6_025_SGST" class="view_gst_output_IP_6_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_6_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_6_025_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_6_025_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_6_025_CGST->Visible) { // IP 6.0% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_6_025_CGST) == "") { ?>
		<th data-name="IP_6_025_CGST" class="<?php echo $view_gst_output->IP_6_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_6_025_CGST" class="view_gst_output_IP_6_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_6_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_6_025_CGST" class="<?php echo $view_gst_output->IP_6_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_6_025_CGST) ?>',1);"><div id="elh_view_gst_output_IP_6_025_CGST" class="view_gst_output_IP_6_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_6_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_6_025_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_6_025_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_9_025_SGST->Visible) { // IP 9.0% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_9_025_SGST) == "") { ?>
		<th data-name="IP_9_025_SGST" class="<?php echo $view_gst_output->IP_9_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_9_025_SGST" class="view_gst_output_IP_9_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_9_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_9_025_SGST" class="<?php echo $view_gst_output->IP_9_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_9_025_SGST) ?>',1);"><div id="elh_view_gst_output_IP_9_025_SGST" class="view_gst_output_IP_9_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_9_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_9_025_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_9_025_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_9_025_CGST->Visible) { // IP 9.0% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_9_025_CGST) == "") { ?>
		<th data-name="IP_9_025_CGST" class="<?php echo $view_gst_output->IP_9_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_9_025_CGST" class="view_gst_output_IP_9_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_9_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_9_025_CGST" class="<?php echo $view_gst_output->IP_9_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_9_025_CGST) ?>',1);"><div id="elh_view_gst_output_IP_9_025_CGST" class="view_gst_output_IP_9_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_9_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_9_025_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_9_025_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_14_025_SGST->Visible) { // IP 14.0% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_14_025_SGST) == "") { ?>
		<th data-name="IP_14_025_SGST" class="<?php echo $view_gst_output->IP_14_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_14_025_SGST" class="view_gst_output_IP_14_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_14_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_14_025_SGST" class="<?php echo $view_gst_output->IP_14_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_14_025_SGST) ?>',1);"><div id="elh_view_gst_output_IP_14_025_SGST" class="view_gst_output_IP_14_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_14_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_14_025_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_14_025_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->IP_14_025_CGST->Visible) { // IP 14.0% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->IP_14_025_CGST) == "") { ?>
		<th data-name="IP_14_025_CGST" class="<?php echo $view_gst_output->IP_14_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_14_025_CGST" class="view_gst_output_IP_14_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->IP_14_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_14_025_CGST" class="<?php echo $view_gst_output->IP_14_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->IP_14_025_CGST) ?>',1);"><div id="elh_view_gst_output_IP_14_025_CGST" class="view_gst_output_IP_14_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->IP_14_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->IP_14_025_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->IP_14_025_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_2_525_SGST->Visible) { // OP 2.5% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_2_525_SGST) == "") { ?>
		<th data-name="OP_2_525_SGST" class="<?php echo $view_gst_output->OP_2_525_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_2_525_SGST" class="view_gst_output_OP_2_525_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_2_525_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_2_525_SGST" class="<?php echo $view_gst_output->OP_2_525_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_2_525_SGST) ?>',1);"><div id="elh_view_gst_output_OP_2_525_SGST" class="view_gst_output_OP_2_525_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_2_525_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_2_525_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_2_525_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_2_525_CGST->Visible) { // OP 2.5% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_2_525_CGST) == "") { ?>
		<th data-name="OP_2_525_CGST" class="<?php echo $view_gst_output->OP_2_525_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_2_525_CGST" class="view_gst_output_OP_2_525_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_2_525_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_2_525_CGST" class="<?php echo $view_gst_output->OP_2_525_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_2_525_CGST) ?>',1);"><div id="elh_view_gst_output_OP_2_525_CGST" class="view_gst_output_OP_2_525_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_2_525_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_2_525_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_2_525_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_6_025_SGST->Visible) { // OP 6.0% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_6_025_SGST) == "") { ?>
		<th data-name="OP_6_025_SGST" class="<?php echo $view_gst_output->OP_6_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_6_025_SGST" class="view_gst_output_OP_6_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_6_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_6_025_SGST" class="<?php echo $view_gst_output->OP_6_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_6_025_SGST) ?>',1);"><div id="elh_view_gst_output_OP_6_025_SGST" class="view_gst_output_OP_6_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_6_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_6_025_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_6_025_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_6_025_CGST->Visible) { // OP 6.0% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_6_025_CGST) == "") { ?>
		<th data-name="OP_6_025_CGST" class="<?php echo $view_gst_output->OP_6_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_6_025_CGST" class="view_gst_output_OP_6_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_6_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_6_025_CGST" class="<?php echo $view_gst_output->OP_6_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_6_025_CGST) ?>',1);"><div id="elh_view_gst_output_OP_6_025_CGST" class="view_gst_output_OP_6_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_6_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_6_025_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_6_025_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_9_025_SGST->Visible) { // OP 9.0% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_9_025_SGST) == "") { ?>
		<th data-name="OP_9_025_SGST" class="<?php echo $view_gst_output->OP_9_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_9_025_SGST" class="view_gst_output_OP_9_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_9_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_9_025_SGST" class="<?php echo $view_gst_output->OP_9_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_9_025_SGST) ?>',1);"><div id="elh_view_gst_output_OP_9_025_SGST" class="view_gst_output_OP_9_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_9_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_9_025_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_9_025_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_9_025_CGST->Visible) { // OP 9.0% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_9_025_CGST) == "") { ?>
		<th data-name="OP_9_025_CGST" class="<?php echo $view_gst_output->OP_9_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_9_025_CGST" class="view_gst_output_OP_9_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_9_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_9_025_CGST" class="<?php echo $view_gst_output->OP_9_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_9_025_CGST) ?>',1);"><div id="elh_view_gst_output_OP_9_025_CGST" class="view_gst_output_OP_9_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_9_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_9_025_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_9_025_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_14_025_SGST->Visible) { // OP 14.0% SGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_14_025_SGST) == "") { ?>
		<th data-name="OP_14_025_SGST" class="<?php echo $view_gst_output->OP_14_025_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_14_025_SGST" class="view_gst_output_OP_14_025_SGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_14_025_SGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_14_025_SGST" class="<?php echo $view_gst_output->OP_14_025_SGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_14_025_SGST) ?>',1);"><div id="elh_view_gst_output_OP_14_025_SGST" class="view_gst_output_OP_14_025_SGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_14_025_SGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_14_025_SGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_14_025_SGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->OP_14_025_CGST->Visible) { // OP 14.0% CGST ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->OP_14_025_CGST) == "") { ?>
		<th data-name="OP_14_025_CGST" class="<?php echo $view_gst_output->OP_14_025_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_14_025_CGST" class="view_gst_output_OP_14_025_CGST"><div class="ew-table-header-caption"><?php echo $view_gst_output->OP_14_025_CGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OP_14_025_CGST" class="<?php echo $view_gst_output->OP_14_025_CGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->OP_14_025_CGST) ?>',1);"><div id="elh_view_gst_output_OP_14_025_CGST" class="view_gst_output_OP_14_025_CGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->OP_14_025_CGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->OP_14_025_CGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->OP_14_025_CGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_gst_output->HosoID->Visible) { // HosoID ?>
	<?php if ($view_gst_output->sortUrl($view_gst_output->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_gst_output->HosoID->headerCellClass() ?>"><div id="elh_view_gst_output_HosoID" class="view_gst_output_HosoID"><div class="ew-table-header-caption"><?php echo $view_gst_output->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_gst_output->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_gst_output->SortUrl($view_gst_output->HosoID) ?>',1);"><div id="elh_view_gst_output_HosoID" class="view_gst_output_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_gst_output->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_gst_output->HosoID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_gst_output->HosoID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_gst_output_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_gst_output->ExportAll && $view_gst_output->isExport()) {
	$view_gst_output_list->StopRec = $view_gst_output_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_gst_output_list->TotalRecs > $view_gst_output_list->StartRec + $view_gst_output_list->DisplayRecs - 1)
		$view_gst_output_list->StopRec = $view_gst_output_list->StartRec + $view_gst_output_list->DisplayRecs - 1;
	else
		$view_gst_output_list->StopRec = $view_gst_output_list->TotalRecs;
}
$view_gst_output_list->RecCnt = $view_gst_output_list->StartRec - 1;
if ($view_gst_output_list->Recordset && !$view_gst_output_list->Recordset->EOF) {
	$view_gst_output_list->Recordset->moveFirst();
	$selectLimit = $view_gst_output_list->UseSelectLimit;
	if (!$selectLimit && $view_gst_output_list->StartRec > 1)
		$view_gst_output_list->Recordset->move($view_gst_output_list->StartRec - 1);
} elseif (!$view_gst_output->AllowAddDeleteRow && $view_gst_output_list->StopRec == 0) {
	$view_gst_output_list->StopRec = $view_gst_output->GridAddRowCount;
}

// Initialize aggregate
$view_gst_output->RowType = ROWTYPE_AGGREGATEINIT;
$view_gst_output->resetAttributes();
$view_gst_output_list->renderRow();
while ($view_gst_output_list->RecCnt < $view_gst_output_list->StopRec) {
	$view_gst_output_list->RecCnt++;
	if ($view_gst_output_list->RecCnt >= $view_gst_output_list->StartRec) {
		$view_gst_output_list->RowCnt++;

		// Set up key count
		$view_gst_output_list->KeyCount = $view_gst_output_list->RowIndex;

		// Init row class and style
		$view_gst_output->resetAttributes();
		$view_gst_output->CssClass = "";
		if ($view_gst_output->isGridAdd()) {
		} else {
			$view_gst_output_list->loadRowValues($view_gst_output_list->Recordset); // Load row values
		}
		$view_gst_output->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_gst_output->RowAttrs = array_merge($view_gst_output->RowAttrs, array('data-rowindex'=>$view_gst_output_list->RowCnt, 'id'=>'r' . $view_gst_output_list->RowCnt . '_view_gst_output', 'data-rowtype'=>$view_gst_output->RowType));

		// Render row
		$view_gst_output_list->renderRow();

		// Render list options
		$view_gst_output_list->renderListOptions();
?>
	<tr<?php echo $view_gst_output->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_gst_output_list->ListOptions->render("body", "left", $view_gst_output_list->RowCnt);
?>
	<?php if ($view_gst_output->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_gst_output->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_BillDate" class="view_gst_output_BillDate">
<span<?php echo $view_gst_output->BillDate->viewAttributes() ?>>
<?php echo $view_gst_output->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_2_525_SGST->Visible) { // IP 2.5% SGST ?>
		<td data-name="IP_2_525_SGST"<?php echo $view_gst_output->IP_2_525_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_2_525_SGST" class="view_gst_output_IP_2_525_SGST">
<span<?php echo $view_gst_output->IP_2_525_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_2_525_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_2_525_CGST->Visible) { // IP 2.5% CGST ?>
		<td data-name="IP_2_525_CGST"<?php echo $view_gst_output->IP_2_525_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_2_525_CGST" class="view_gst_output_IP_2_525_CGST">
<span<?php echo $view_gst_output->IP_2_525_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_2_525_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_6_025_SGST->Visible) { // IP 6.0% SGST ?>
		<td data-name="IP_6_025_SGST"<?php echo $view_gst_output->IP_6_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_6_025_SGST" class="view_gst_output_IP_6_025_SGST">
<span<?php echo $view_gst_output->IP_6_025_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_6_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_6_025_CGST->Visible) { // IP 6.0% CGST ?>
		<td data-name="IP_6_025_CGST"<?php echo $view_gst_output->IP_6_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_6_025_CGST" class="view_gst_output_IP_6_025_CGST">
<span<?php echo $view_gst_output->IP_6_025_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_6_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_9_025_SGST->Visible) { // IP 9.0% SGST ?>
		<td data-name="IP_9_025_SGST"<?php echo $view_gst_output->IP_9_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_9_025_SGST" class="view_gst_output_IP_9_025_SGST">
<span<?php echo $view_gst_output->IP_9_025_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_9_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_9_025_CGST->Visible) { // IP 9.0% CGST ?>
		<td data-name="IP_9_025_CGST"<?php echo $view_gst_output->IP_9_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_9_025_CGST" class="view_gst_output_IP_9_025_CGST">
<span<?php echo $view_gst_output->IP_9_025_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_9_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_14_025_SGST->Visible) { // IP 14.0% SGST ?>
		<td data-name="IP_14_025_SGST"<?php echo $view_gst_output->IP_14_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_14_025_SGST" class="view_gst_output_IP_14_025_SGST">
<span<?php echo $view_gst_output->IP_14_025_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_14_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->IP_14_025_CGST->Visible) { // IP 14.0% CGST ?>
		<td data-name="IP_14_025_CGST"<?php echo $view_gst_output->IP_14_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_IP_14_025_CGST" class="view_gst_output_IP_14_025_CGST">
<span<?php echo $view_gst_output->IP_14_025_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->IP_14_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_2_525_SGST->Visible) { // OP 2.5% SGST ?>
		<td data-name="OP_2_525_SGST"<?php echo $view_gst_output->OP_2_525_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_2_525_SGST" class="view_gst_output_OP_2_525_SGST">
<span<?php echo $view_gst_output->OP_2_525_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_2_525_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_2_525_CGST->Visible) { // OP 2.5% CGST ?>
		<td data-name="OP_2_525_CGST"<?php echo $view_gst_output->OP_2_525_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_2_525_CGST" class="view_gst_output_OP_2_525_CGST">
<span<?php echo $view_gst_output->OP_2_525_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_2_525_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_6_025_SGST->Visible) { // OP 6.0% SGST ?>
		<td data-name="OP_6_025_SGST"<?php echo $view_gst_output->OP_6_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_6_025_SGST" class="view_gst_output_OP_6_025_SGST">
<span<?php echo $view_gst_output->OP_6_025_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_6_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_6_025_CGST->Visible) { // OP 6.0% CGST ?>
		<td data-name="OP_6_025_CGST"<?php echo $view_gst_output->OP_6_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_6_025_CGST" class="view_gst_output_OP_6_025_CGST">
<span<?php echo $view_gst_output->OP_6_025_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_6_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_9_025_SGST->Visible) { // OP 9.0% SGST ?>
		<td data-name="OP_9_025_SGST"<?php echo $view_gst_output->OP_9_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_9_025_SGST" class="view_gst_output_OP_9_025_SGST">
<span<?php echo $view_gst_output->OP_9_025_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_9_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_9_025_CGST->Visible) { // OP 9.0% CGST ?>
		<td data-name="OP_9_025_CGST"<?php echo $view_gst_output->OP_9_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_9_025_CGST" class="view_gst_output_OP_9_025_CGST">
<span<?php echo $view_gst_output->OP_9_025_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_9_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_14_025_SGST->Visible) { // OP 14.0% SGST ?>
		<td data-name="OP_14_025_SGST"<?php echo $view_gst_output->OP_14_025_SGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_14_025_SGST" class="view_gst_output_OP_14_025_SGST">
<span<?php echo $view_gst_output->OP_14_025_SGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_14_025_SGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->OP_14_025_CGST->Visible) { // OP 14.0% CGST ?>
		<td data-name="OP_14_025_CGST"<?php echo $view_gst_output->OP_14_025_CGST->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_OP_14_025_CGST" class="view_gst_output_OP_14_025_CGST">
<span<?php echo $view_gst_output->OP_14_025_CGST->viewAttributes() ?>>
<?php echo $view_gst_output->OP_14_025_CGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_gst_output->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID"<?php echo $view_gst_output->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_gst_output_list->RowCnt ?>_view_gst_output_HosoID" class="view_gst_output_HosoID">
<span<?php echo $view_gst_output->HosoID->viewAttributes() ?>>
<?php echo $view_gst_output->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_gst_output_list->ListOptions->render("body", "right", $view_gst_output_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_gst_output->isGridAdd())
		$view_gst_output_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_gst_output->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_gst_output_list->Recordset)
	$view_gst_output_list->Recordset->Close();
?>
<?php if (!$view_gst_output->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_gst_output->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_gst_output_list->Pager)) $view_gst_output_list->Pager = new NumericPager($view_gst_output_list->StartRec, $view_gst_output_list->DisplayRecs, $view_gst_output_list->TotalRecs, $view_gst_output_list->RecRange, $view_gst_output_list->AutoHidePager) ?>
<?php if ($view_gst_output_list->Pager->RecordCount > 0 && $view_gst_output_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_gst_output_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_gst_output_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_gst_output_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_gst_output_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_gst_output_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_gst_output_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_gst_output_list->pageUrl() ?>start=<?php echo $view_gst_output_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_gst_output_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_gst_output_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_gst_output_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_gst_output_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_gst_output_list->TotalRecs > 0 && (!$view_gst_output_list->AutoHidePageSizeSelector || $view_gst_output_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_gst_output">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_gst_output_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_gst_output_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_gst_output_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_gst_output_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_gst_output_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_gst_output_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_gst_output->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_gst_output_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_gst_output_list->TotalRecs == 0 && !$view_gst_output->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_gst_output_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_gst_output_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_gst_output->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_gst_output->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_gst_output", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_gst_output_list->terminate();
?>