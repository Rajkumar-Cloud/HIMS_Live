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
$userlevelpermissions_list = new userlevelpermissions_list();

// Run the page
$userlevelpermissions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevelpermissions_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$userlevelpermissions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fuserlevelpermissionslist = currentForm = new ew.Form("fuserlevelpermissionslist", "list");
fuserlevelpermissionslist.formKeyCountName = '<?php echo $userlevelpermissions_list->FormKeyCountName ?>';

// Form_CustomValidate event
fuserlevelpermissionslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuserlevelpermissionslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fuserlevelpermissionslist.lists["x_id"] = <?php echo $userlevelpermissions_list->id->Lookup->toClientList() ?>;
fuserlevelpermissionslist.lists["x_id"].options = <?php echo JsonEncode($userlevelpermissions_list->id->lookupOptions()) ?>;

// Form object for search
var fuserlevelpermissionslistsrch = currentSearchForm = new ew.Form("fuserlevelpermissionslistsrch");

// Validate function for search
fuserlevelpermissionslistsrch.validate = function(fobj) {
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
fuserlevelpermissionslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuserlevelpermissionslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fuserlevelpermissionslistsrch.lists["x_id"] = <?php echo $userlevelpermissions_list->id->Lookup->toClientList() ?>;
fuserlevelpermissionslistsrch.lists["x_id"].options = <?php echo JsonEncode($userlevelpermissions_list->id->lookupOptions()) ?>;

// Filters
fuserlevelpermissionslistsrch.filterList = <?php echo $userlevelpermissions_list->getFilterList() ?>;
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
<?php if (!$userlevelpermissions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($userlevelpermissions_list->TotalRecs > 0 && $userlevelpermissions_list->ExportOptions->visible()) { ?>
<?php $userlevelpermissions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($userlevelpermissions_list->ImportOptions->visible()) { ?>
<?php $userlevelpermissions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($userlevelpermissions_list->SearchOptions->visible()) { ?>
<?php $userlevelpermissions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($userlevelpermissions_list->FilterOptions->visible()) { ?>
<?php $userlevelpermissions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$userlevelpermissions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$userlevelpermissions->isExport() && !$userlevelpermissions->CurrentAction) { ?>
<form name="fuserlevelpermissionslistsrch" id="fuserlevelpermissionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($userlevelpermissions_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fuserlevelpermissionslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="userlevelpermissions">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$userlevelpermissions_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$userlevelpermissions->RowType = ROWTYPE_SEARCH;

// Render row
$userlevelpermissions->resetAttributes();
$userlevelpermissions_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($userlevelpermissions->id->Visible) { // id ?>
	<div id="xsc_id" class="ew-cell form-group">
		<label for="x_id" class="ew-search-caption ew-label"><?php echo $userlevelpermissions->id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="userlevelpermissions" data-field="x_id" data-value-separator="<?php echo $userlevelpermissions->id->displayValueSeparatorAttribute() ?>" id="x_id" name="x_id"<?php echo $userlevelpermissions->id->editAttributes() ?>>
		<?php echo $userlevelpermissions->id->selectOptionListHtml("x_id") ?>
	</select>
</div>
<?php echo $userlevelpermissions->id->Lookup->getParamTag("p_x_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($userlevelpermissions->_tableName->Visible) { // tableName ?>
	<div id="xsc__tableName" class="ew-cell form-group">
		<label for="x__tableName" class="ew-search-caption ew-label"><?php echo $userlevelpermissions->_tableName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z__tableName" id="z__tableName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="userlevelpermissions" data-field="x__tableName" name="x__tableName" id="x__tableName" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($userlevelpermissions->_tableName->getPlaceHolder()) ?>" value="<?php echo $userlevelpermissions->_tableName->EditValue ?>"<?php echo $userlevelpermissions->_tableName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($userlevelpermissions_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($userlevelpermissions_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $userlevelpermissions_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($userlevelpermissions_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $userlevelpermissions_list->showPageHeader(); ?>
<?php
$userlevelpermissions_list->showMessage();
?>
<?php if ($userlevelpermissions_list->TotalRecs > 0 || $userlevelpermissions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($userlevelpermissions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> userlevelpermissions">
<?php if (!$userlevelpermissions->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$userlevelpermissions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($userlevelpermissions_list->Pager)) $userlevelpermissions_list->Pager = new NumericPager($userlevelpermissions_list->StartRec, $userlevelpermissions_list->DisplayRecs, $userlevelpermissions_list->TotalRecs, $userlevelpermissions_list->RecRange, $userlevelpermissions_list->AutoHidePager) ?>
<?php if ($userlevelpermissions_list->Pager->RecordCount > 0 && $userlevelpermissions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($userlevelpermissions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($userlevelpermissions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $userlevelpermissions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($userlevelpermissions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $userlevelpermissions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $userlevelpermissions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $userlevelpermissions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($userlevelpermissions_list->TotalRecs > 0 && (!$userlevelpermissions_list->AutoHidePageSizeSelector || $userlevelpermissions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="userlevelpermissions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($userlevelpermissions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($userlevelpermissions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($userlevelpermissions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($userlevelpermissions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($userlevelpermissions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($userlevelpermissions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($userlevelpermissions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $userlevelpermissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fuserlevelpermissionslist" id="fuserlevelpermissionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($userlevelpermissions_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $userlevelpermissions_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevelpermissions">
<div id="gmp_userlevelpermissions" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($userlevelpermissions_list->TotalRecs > 0 || $userlevelpermissions->isGridEdit()) { ?>
<table id="tbl_userlevelpermissionslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$userlevelpermissions_list->RowType = ROWTYPE_HEADER;

// Render list options
$userlevelpermissions_list->renderListOptions();

// Render list options (header, left)
$userlevelpermissions_list->ListOptions->render("header", "left");
?>
<?php if ($userlevelpermissions->id->Visible) { // id ?>
	<?php if ($userlevelpermissions->sortUrl($userlevelpermissions->id) == "") { ?>
		<th data-name="id" class="<?php echo $userlevelpermissions->id->headerCellClass() ?>"><div id="elh_userlevelpermissions_id" class="userlevelpermissions_id"><div class="ew-table-header-caption"><?php echo $userlevelpermissions->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $userlevelpermissions->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $userlevelpermissions->SortUrl($userlevelpermissions->id) ?>',1);"><div id="elh_userlevelpermissions_id" class="userlevelpermissions_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevelpermissions->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($userlevelpermissions->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($userlevelpermissions->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($userlevelpermissions->_tableName->Visible) { // tableName ?>
	<?php if ($userlevelpermissions->sortUrl($userlevelpermissions->_tableName) == "") { ?>
		<th data-name="_tableName" class="<?php echo $userlevelpermissions->_tableName->headerCellClass() ?>"><div id="elh_userlevelpermissions__tableName" class="userlevelpermissions__tableName"><div class="ew-table-header-caption"><?php echo $userlevelpermissions->_tableName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_tableName" class="<?php echo $userlevelpermissions->_tableName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $userlevelpermissions->SortUrl($userlevelpermissions->_tableName) ?>',1);"><div id="elh_userlevelpermissions__tableName" class="userlevelpermissions__tableName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevelpermissions->_tableName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($userlevelpermissions->_tableName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($userlevelpermissions->_tableName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($userlevelpermissions->Permissions->Visible) { // Permissions ?>
	<?php if ($userlevelpermissions->sortUrl($userlevelpermissions->Permissions) == "") { ?>
		<th data-name="Permissions" class="<?php echo $userlevelpermissions->Permissions->headerCellClass() ?>"><div id="elh_userlevelpermissions_Permissions" class="userlevelpermissions_Permissions"><div class="ew-table-header-caption"><?php echo $userlevelpermissions->Permissions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Permissions" class="<?php echo $userlevelpermissions->Permissions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $userlevelpermissions->SortUrl($userlevelpermissions->Permissions) ?>',1);"><div id="elh_userlevelpermissions_Permissions" class="userlevelpermissions_Permissions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $userlevelpermissions->Permissions->caption() ?></span><span class="ew-table-header-sort"><?php if ($userlevelpermissions->Permissions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($userlevelpermissions->Permissions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$userlevelpermissions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($userlevelpermissions->ExportAll && $userlevelpermissions->isExport()) {
	$userlevelpermissions_list->StopRec = $userlevelpermissions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($userlevelpermissions_list->TotalRecs > $userlevelpermissions_list->StartRec + $userlevelpermissions_list->DisplayRecs - 1)
		$userlevelpermissions_list->StopRec = $userlevelpermissions_list->StartRec + $userlevelpermissions_list->DisplayRecs - 1;
	else
		$userlevelpermissions_list->StopRec = $userlevelpermissions_list->TotalRecs;
}
$userlevelpermissions_list->RecCnt = $userlevelpermissions_list->StartRec - 1;
if ($userlevelpermissions_list->Recordset && !$userlevelpermissions_list->Recordset->EOF) {
	$userlevelpermissions_list->Recordset->moveFirst();
	$selectLimit = $userlevelpermissions_list->UseSelectLimit;
	if (!$selectLimit && $userlevelpermissions_list->StartRec > 1)
		$userlevelpermissions_list->Recordset->move($userlevelpermissions_list->StartRec - 1);
} elseif (!$userlevelpermissions->AllowAddDeleteRow && $userlevelpermissions_list->StopRec == 0) {
	$userlevelpermissions_list->StopRec = $userlevelpermissions->GridAddRowCount;
}

// Initialize aggregate
$userlevelpermissions->RowType = ROWTYPE_AGGREGATEINIT;
$userlevelpermissions->resetAttributes();
$userlevelpermissions_list->renderRow();
while ($userlevelpermissions_list->RecCnt < $userlevelpermissions_list->StopRec) {
	$userlevelpermissions_list->RecCnt++;
	if ($userlevelpermissions_list->RecCnt >= $userlevelpermissions_list->StartRec) {
		$userlevelpermissions_list->RowCnt++;

		// Set up key count
		$userlevelpermissions_list->KeyCount = $userlevelpermissions_list->RowIndex;

		// Init row class and style
		$userlevelpermissions->resetAttributes();
		$userlevelpermissions->CssClass = "";
		if ($userlevelpermissions->isGridAdd()) {
		} else {
			$userlevelpermissions_list->loadRowValues($userlevelpermissions_list->Recordset); // Load row values
		}
		$userlevelpermissions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$userlevelpermissions->RowAttrs = array_merge($userlevelpermissions->RowAttrs, array('data-rowindex'=>$userlevelpermissions_list->RowCnt, 'id'=>'r' . $userlevelpermissions_list->RowCnt . '_userlevelpermissions', 'data-rowtype'=>$userlevelpermissions->RowType));

		// Render row
		$userlevelpermissions_list->renderRow();

		// Render list options
		$userlevelpermissions_list->renderListOptions();
?>
	<tr<?php echo $userlevelpermissions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$userlevelpermissions_list->ListOptions->render("body", "left", $userlevelpermissions_list->RowCnt);
?>
	<?php if ($userlevelpermissions->id->Visible) { // id ?>
		<td data-name="id"<?php echo $userlevelpermissions->id->cellAttributes() ?>>
<span id="el<?php echo $userlevelpermissions_list->RowCnt ?>_userlevelpermissions_id" class="userlevelpermissions_id">
<span<?php echo $userlevelpermissions->id->viewAttributes() ?>>
<?php echo $userlevelpermissions->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($userlevelpermissions->_tableName->Visible) { // tableName ?>
		<td data-name="_tableName"<?php echo $userlevelpermissions->_tableName->cellAttributes() ?>>
<span id="el<?php echo $userlevelpermissions_list->RowCnt ?>_userlevelpermissions__tableName" class="userlevelpermissions__tableName">
<span<?php echo $userlevelpermissions->_tableName->viewAttributes() ?>>
<?php echo $userlevelpermissions->_tableName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($userlevelpermissions->Permissions->Visible) { // Permissions ?>
		<td data-name="Permissions"<?php echo $userlevelpermissions->Permissions->cellAttributes() ?>>
<span id="el<?php echo $userlevelpermissions_list->RowCnt ?>_userlevelpermissions_Permissions" class="userlevelpermissions_Permissions">
<span<?php echo $userlevelpermissions->Permissions->viewAttributes() ?>>
<?php echo $userlevelpermissions->Permissions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$userlevelpermissions_list->ListOptions->render("body", "right", $userlevelpermissions_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$userlevelpermissions->isGridAdd())
		$userlevelpermissions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$userlevelpermissions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($userlevelpermissions_list->Recordset)
	$userlevelpermissions_list->Recordset->Close();
?>
<?php if (!$userlevelpermissions->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$userlevelpermissions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($userlevelpermissions_list->Pager)) $userlevelpermissions_list->Pager = new NumericPager($userlevelpermissions_list->StartRec, $userlevelpermissions_list->DisplayRecs, $userlevelpermissions_list->TotalRecs, $userlevelpermissions_list->RecRange, $userlevelpermissions_list->AutoHidePager) ?>
<?php if ($userlevelpermissions_list->Pager->RecordCount > 0 && $userlevelpermissions_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($userlevelpermissions_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($userlevelpermissions_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $userlevelpermissions_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($userlevelpermissions_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $userlevelpermissions_list->pageUrl() ?>start=<?php echo $userlevelpermissions_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($userlevelpermissions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $userlevelpermissions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $userlevelpermissions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $userlevelpermissions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($userlevelpermissions_list->TotalRecs > 0 && (!$userlevelpermissions_list->AutoHidePageSizeSelector || $userlevelpermissions_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="userlevelpermissions">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($userlevelpermissions_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($userlevelpermissions_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($userlevelpermissions_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($userlevelpermissions_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($userlevelpermissions_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($userlevelpermissions_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($userlevelpermissions->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $userlevelpermissions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($userlevelpermissions_list->TotalRecs == 0 && !$userlevelpermissions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $userlevelpermissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$userlevelpermissions_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$userlevelpermissions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$userlevelpermissions->isExport()) { ?>
<script>
ew.scrollableTable("gmp_userlevelpermissions", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$userlevelpermissions_list->terminate();
?>