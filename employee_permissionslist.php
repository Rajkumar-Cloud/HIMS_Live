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
$employee_permissions_list = new employee_permissions_list();

// Run the page
$employee_permissions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_permissions_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_permissions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_permissionslist = currentForm = new ew.Form("femployee_permissionslist", "list");
femployee_permissionslist.formKeyCountName = '<?php echo $employee_permissions_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_permissionslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_permissionslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_permissionslist.lists["x_user_level"] = <?php echo $employee_permissions_list->user_level->Lookup->toClientList() ?>;
femployee_permissionslist.lists["x_user_level"].options = <?php echo JsonEncode($employee_permissions_list->user_level->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_permissionslistsrch = currentSearchForm = new ew.Form("femployee_permissionslistsrch");

// Validate function for search
femployee_permissionslistsrch.validate = function(fobj) {
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
femployee_permissionslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_permissionslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_permissionslistsrch.lists["x_user_level"] = <?php echo $employee_permissions_list->user_level->Lookup->toClientList() ?>;
femployee_permissionslistsrch.lists["x_user_level"].options = <?php echo JsonEncode($employee_permissions_list->user_level->options(FALSE, TRUE)) ?>;

// Filters
femployee_permissionslistsrch.filterList = <?php echo $employee_permissions_list->getFilterList() ?>;
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
<?php if (!$employee_permissions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_permissions_list->TotalRecs > 0 && $employee_permissions_list->ExportOptions->visible()) { ?>
<?php $employee_permissions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_permissions_list->ImportOptions->visible()) { ?>
<?php $employee_permissions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_permissions_list->SearchOptions->visible()) { ?>
<?php $employee_permissions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_permissions_list->FilterOptions->visible()) { ?>
<?php $employee_permissions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_permissions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_permissions->isExport() && !$employee_permissions->CurrentAction) { ?>
<form name="femployee_permissionslistsrch" id="femployee_permissionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_permissions_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_permissionslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_permissions">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_permissions_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_permissions->RowType = ROWTYPE_SEARCH;

// Render row
$employee_permissions->resetAttributes();
$employee_permissions_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
	<div id="xsc_user_level" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_permissions->user_level->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_user_level" id="z_user_level" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_user_level" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_permissions" data-field="x_user_level" data-value-separator="<?php echo $employee_permissions->user_level->displayValueSeparatorAttribute() ?>" name="x_user_level" id="x_user_level" value="{value}"<?php echo $employee_permissions->user_level->editAttributes() ?>></div>
<div id="dsl_x_user_level" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_permissions->user_level->radioButtonListHtml(FALSE, "x_user_level") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_permissions_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_permissions_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_permissions_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_permissions_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_permissions_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_permissions_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_permissions_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_permissions_list->showPageHeader(); ?>
<?php
$employee_permissions_list->showMessage();
?>
<?php if ($employee_permissions_list->TotalRecs > 0 || $employee_permissions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_permissions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_permissions">
<?php if (!$employee_permissions->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_permissions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_permissions_list->Pager)) $employee_permissions_list->Pager = new NumericPager($employee_permissions_list->StartRec, $employee_permissions_list->DisplayRecs, $employee_permissions_list->TotalRecs, $employee_permissions_list->RecRange, $employee_permissions_list->AutoHidePager) ?>
<?php if ($employee_permissions_list->Pager->RecordCount > 0 && $employee_permissions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_permissions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_permissions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_permissions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_permissions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_permissions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_permissions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_permissions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_permissions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_permissions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_permissions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_permissions_list->TotalRecs > 0 && (!$employee_permissions_list->AutoHidePageSizeSelector || $employee_permissions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_permissions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_permissions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_permissions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_permissions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_permissions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_permissions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_permissions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_permissions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_permissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_permissionslist" id="femployee_permissionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_permissions_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_permissions_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
<div id="gmp_employee_permissions" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_permissions_list->TotalRecs > 0 || $employee_permissions->isGridEdit()) { ?>
<table id="tbl_employee_permissionslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_permissions_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_permissions_list->renderListOptions();

// Render list options (header, left)
$employee_permissions_list->ListOptions->render("header", "left");
?>
<?php if ($employee_permissions->id->Visible) { // id ?>
	<?php if ($employee_permissions->sortUrl($employee_permissions->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_permissions->id->headerCellClass() ?>"><div id="elh_employee_permissions_id" class="employee_permissions_id"><div class="ew-table-header-caption"><?php echo $employee_permissions->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_permissions->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_permissions->SortUrl($employee_permissions->id) ?>',1);"><div id="elh_employee_permissions_id" class="employee_permissions_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_permissions->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_permissions->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_permissions->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
	<?php if ($employee_permissions->sortUrl($employee_permissions->user_level) == "") { ?>
		<th data-name="user_level" class="<?php echo $employee_permissions->user_level->headerCellClass() ?>"><div id="elh_employee_permissions_user_level" class="employee_permissions_user_level"><div class="ew-table-header-caption"><?php echo $employee_permissions->user_level->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user_level" class="<?php echo $employee_permissions->user_level->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_permissions->SortUrl($employee_permissions->user_level) ?>',1);"><div id="elh_employee_permissions_user_level" class="employee_permissions_user_level">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_permissions->user_level->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_permissions->user_level->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_permissions->user_level->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_permissions->module_id->Visible) { // module_id ?>
	<?php if ($employee_permissions->sortUrl($employee_permissions->module_id) == "") { ?>
		<th data-name="module_id" class="<?php echo $employee_permissions->module_id->headerCellClass() ?>"><div id="elh_employee_permissions_module_id" class="employee_permissions_module_id"><div class="ew-table-header-caption"><?php echo $employee_permissions->module_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="module_id" class="<?php echo $employee_permissions->module_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_permissions->SortUrl($employee_permissions->module_id) ?>',1);"><div id="elh_employee_permissions_module_id" class="employee_permissions_module_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_permissions->module_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_permissions->module_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_permissions->module_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_permissions->permission->Visible) { // permission ?>
	<?php if ($employee_permissions->sortUrl($employee_permissions->permission) == "") { ?>
		<th data-name="permission" class="<?php echo $employee_permissions->permission->headerCellClass() ?>"><div id="elh_employee_permissions_permission" class="employee_permissions_permission"><div class="ew-table-header-caption"><?php echo $employee_permissions->permission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="permission" class="<?php echo $employee_permissions->permission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_permissions->SortUrl($employee_permissions->permission) ?>',1);"><div id="elh_employee_permissions_permission" class="employee_permissions_permission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_permissions->permission->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_permissions->permission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_permissions->permission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_permissions->value->Visible) { // value ?>
	<?php if ($employee_permissions->sortUrl($employee_permissions->value) == "") { ?>
		<th data-name="value" class="<?php echo $employee_permissions->value->headerCellClass() ?>"><div id="elh_employee_permissions_value" class="employee_permissions_value"><div class="ew-table-header-caption"><?php echo $employee_permissions->value->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="value" class="<?php echo $employee_permissions->value->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_permissions->SortUrl($employee_permissions->value) ?>',1);"><div id="elh_employee_permissions_value" class="employee_permissions_value">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_permissions->value->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_permissions->value->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_permissions->value->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_permissions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_permissions->ExportAll && $employee_permissions->isExport()) {
	$employee_permissions_list->StopRec = $employee_permissions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_permissions_list->TotalRecs > $employee_permissions_list->StartRec + $employee_permissions_list->DisplayRecs - 1)
		$employee_permissions_list->StopRec = $employee_permissions_list->StartRec + $employee_permissions_list->DisplayRecs - 1;
	else
		$employee_permissions_list->StopRec = $employee_permissions_list->TotalRecs;
}
$employee_permissions_list->RecCnt = $employee_permissions_list->StartRec - 1;
if ($employee_permissions_list->Recordset && !$employee_permissions_list->Recordset->EOF) {
	$employee_permissions_list->Recordset->moveFirst();
	$selectLimit = $employee_permissions_list->UseSelectLimit;
	if (!$selectLimit && $employee_permissions_list->StartRec > 1)
		$employee_permissions_list->Recordset->move($employee_permissions_list->StartRec - 1);
} elseif (!$employee_permissions->AllowAddDeleteRow && $employee_permissions_list->StopRec == 0) {
	$employee_permissions_list->StopRec = $employee_permissions->GridAddRowCount;
}

// Initialize aggregate
$employee_permissions->RowType = ROWTYPE_AGGREGATEINIT;
$employee_permissions->resetAttributes();
$employee_permissions_list->renderRow();
while ($employee_permissions_list->RecCnt < $employee_permissions_list->StopRec) {
	$employee_permissions_list->RecCnt++;
	if ($employee_permissions_list->RecCnt >= $employee_permissions_list->StartRec) {
		$employee_permissions_list->RowCnt++;

		// Set up key count
		$employee_permissions_list->KeyCount = $employee_permissions_list->RowIndex;

		// Init row class and style
		$employee_permissions->resetAttributes();
		$employee_permissions->CssClass = "";
		if ($employee_permissions->isGridAdd()) {
		} else {
			$employee_permissions_list->loadRowValues($employee_permissions_list->Recordset); // Load row values
		}
		$employee_permissions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_permissions->RowAttrs = array_merge($employee_permissions->RowAttrs, array('data-rowindex'=>$employee_permissions_list->RowCnt, 'id'=>'r' . $employee_permissions_list->RowCnt . '_employee_permissions', 'data-rowtype'=>$employee_permissions->RowType));

		// Render row
		$employee_permissions_list->renderRow();

		// Render list options
		$employee_permissions_list->renderListOptions();
?>
	<tr<?php echo $employee_permissions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_permissions_list->ListOptions->render("body", "left", $employee_permissions_list->RowCnt);
?>
	<?php if ($employee_permissions->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_permissions->id->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_list->RowCnt ?>_employee_permissions_id" class="employee_permissions_id">
<span<?php echo $employee_permissions->id->viewAttributes() ?>>
<?php echo $employee_permissions->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
		<td data-name="user_level"<?php echo $employee_permissions->user_level->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_list->RowCnt ?>_employee_permissions_user_level" class="employee_permissions_user_level">
<span<?php echo $employee_permissions->user_level->viewAttributes() ?>>
<?php echo $employee_permissions->user_level->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_permissions->module_id->Visible) { // module_id ?>
		<td data-name="module_id"<?php echo $employee_permissions->module_id->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_list->RowCnt ?>_employee_permissions_module_id" class="employee_permissions_module_id">
<span<?php echo $employee_permissions->module_id->viewAttributes() ?>>
<?php echo $employee_permissions->module_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_permissions->permission->Visible) { // permission ?>
		<td data-name="permission"<?php echo $employee_permissions->permission->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_list->RowCnt ?>_employee_permissions_permission" class="employee_permissions_permission">
<span<?php echo $employee_permissions->permission->viewAttributes() ?>>
<?php echo $employee_permissions->permission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_permissions->value->Visible) { // value ?>
		<td data-name="value"<?php echo $employee_permissions->value->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_list->RowCnt ?>_employee_permissions_value" class="employee_permissions_value">
<span<?php echo $employee_permissions->value->viewAttributes() ?>>
<?php echo $employee_permissions->value->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_permissions_list->ListOptions->render("body", "right", $employee_permissions_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_permissions->isGridAdd())
		$employee_permissions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_permissions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_permissions_list->Recordset)
	$employee_permissions_list->Recordset->Close();
?>
<?php if (!$employee_permissions->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_permissions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_permissions_list->Pager)) $employee_permissions_list->Pager = new NumericPager($employee_permissions_list->StartRec, $employee_permissions_list->DisplayRecs, $employee_permissions_list->TotalRecs, $employee_permissions_list->RecRange, $employee_permissions_list->AutoHidePager) ?>
<?php if ($employee_permissions_list->Pager->RecordCount > 0 && $employee_permissions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_permissions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_permissions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_permissions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_permissions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_permissions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_permissions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_permissions_list->pageUrl() ?>start=<?php echo $employee_permissions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_permissions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_permissions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_permissions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_permissions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_permissions_list->TotalRecs > 0 && (!$employee_permissions_list->AutoHidePageSizeSelector || $employee_permissions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_permissions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_permissions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_permissions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_permissions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_permissions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_permissions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_permissions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_permissions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_permissions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_permissions_list->TotalRecs == 0 && !$employee_permissions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_permissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_permissions_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_permissions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_permissions->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_permissions", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_permissions_list->terminate();
?>