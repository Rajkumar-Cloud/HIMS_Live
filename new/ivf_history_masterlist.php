<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_history_master_list = new ivf_history_master_list();

// Run the page
$ivf_history_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_history_master_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_history_master_list->isExport()) { ?>
<script>
var fivf_history_masterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_history_masterlist = currentForm = new ew.Form("fivf_history_masterlist", "list");
	fivf_history_masterlist.formKeyCountName = '<?php echo $ivf_history_master_list->FormKeyCountName ?>';

	// Validate form
	fivf_history_masterlist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($ivf_history_master_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_history_master_list->id->caption(), $ivf_history_master_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_history_master_list->History->Required) { ?>
				elm = this.getElements("x" + infix + "_History");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_history_master_list->History->caption(), $ivf_history_master_list->History->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_history_master_list->HistoryType->Required) { ?>
				elm = this.getElements("x" + infix + "_HistoryType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_history_master_list->HistoryType->caption(), $ivf_history_master_list->HistoryType->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	fivf_history_masterlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "History", false)) return false;
		if (ew.valueChanged(fobj, infix, "HistoryType", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fivf_history_masterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_history_masterlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fivf_history_masterlist");
});
var fivf_history_masterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_history_masterlistsrch = currentSearchForm = new ew.Form("fivf_history_masterlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_history_masterlistsrch.filterList = <?php echo $ivf_history_master_list->getFilterList() ?>;
	loadjs.done("fivf_history_masterlistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_history_master_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_history_master_list->TotalRecords > 0 && $ivf_history_master_list->ExportOptions->visible()) { ?>
<?php $ivf_history_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_history_master_list->ImportOptions->visible()) { ?>
<?php $ivf_history_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_history_master_list->SearchOptions->visible()) { ?>
<?php $ivf_history_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_history_master_list->FilterOptions->visible()) { ?>
<?php $ivf_history_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_history_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_history_master_list->isExport() && !$ivf_history_master->CurrentAction) { ?>
<form name="fivf_history_masterlistsrch" id="fivf_history_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_history_masterlistsrch-search-panel" class="<?php echo $ivf_history_master_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_history_master">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_history_master_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_history_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_history_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_history_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_history_master_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_history_master_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_history_master_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_history_master_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_history_master_list->showPageHeader(); ?>
<?php
$ivf_history_master_list->showMessage();
?>
<?php if ($ivf_history_master_list->TotalRecords > 0 || $ivf_history_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_history_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_history_master">
<?php if (!$ivf_history_master_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_history_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_history_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_history_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_history_masterlist" id="fivf_history_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<div id="gmp_ivf_history_master" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_history_master_list->TotalRecords > 0 || $ivf_history_master_list->isGridEdit()) { ?>
<table id="tbl_ivf_history_masterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_history_master->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_history_master_list->renderListOptions();

// Render list options (header, left)
$ivf_history_master_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_history_master_list->id->Visible) { // id ?>
	<?php if ($ivf_history_master_list->SortUrl($ivf_history_master_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_history_master_list->id->headerCellClass() ?>"><div id="elh_ivf_history_master_id" class="ivf_history_master_id"><div class="ew-table-header-caption"><?php echo $ivf_history_master_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_history_master_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_history_master_list->SortUrl($ivf_history_master_list->id) ?>', 1);"><div id="elh_ivf_history_master_id" class="ivf_history_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_history_master_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_history_master_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_history_master_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_history_master_list->History->Visible) { // History ?>
	<?php if ($ivf_history_master_list->SortUrl($ivf_history_master_list->History) == "") { ?>
		<th data-name="History" class="<?php echo $ivf_history_master_list->History->headerCellClass() ?>"><div id="elh_ivf_history_master_History" class="ivf_history_master_History"><div class="ew-table-header-caption"><?php echo $ivf_history_master_list->History->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="History" class="<?php echo $ivf_history_master_list->History->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_history_master_list->SortUrl($ivf_history_master_list->History) ?>', 1);"><div id="elh_ivf_history_master_History" class="ivf_history_master_History">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_history_master_list->History->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_history_master_list->History->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_history_master_list->History->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_history_master_list->HistoryType->Visible) { // HistoryType ?>
	<?php if ($ivf_history_master_list->SortUrl($ivf_history_master_list->HistoryType) == "") { ?>
		<th data-name="HistoryType" class="<?php echo $ivf_history_master_list->HistoryType->headerCellClass() ?>"><div id="elh_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType"><div class="ew-table-header-caption"><?php echo $ivf_history_master_list->HistoryType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HistoryType" class="<?php echo $ivf_history_master_list->HistoryType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_history_master_list->SortUrl($ivf_history_master_list->HistoryType) ?>', 1);"><div id="elh_ivf_history_master_HistoryType" class="ivf_history_master_HistoryType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_history_master_list->HistoryType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_history_master_list->HistoryType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_history_master_list->HistoryType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_history_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_history_master_list->ExportAll && $ivf_history_master_list->isExport()) {
	$ivf_history_master_list->StopRecord = $ivf_history_master_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_history_master_list->TotalRecords > $ivf_history_master_list->StartRecord + $ivf_history_master_list->DisplayRecords - 1)
		$ivf_history_master_list->StopRecord = $ivf_history_master_list->StartRecord + $ivf_history_master_list->DisplayRecords - 1;
	else
		$ivf_history_master_list->StopRecord = $ivf_history_master_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($ivf_history_master->isConfirm() || $ivf_history_master_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_history_master_list->FormKeyCountName) && ($ivf_history_master_list->isGridAdd() || $ivf_history_master_list->isGridEdit() || $ivf_history_master->isConfirm())) {
		$ivf_history_master_list->KeyCount = $CurrentForm->getValue($ivf_history_master_list->FormKeyCountName);
		$ivf_history_master_list->StopRecord = $ivf_history_master_list->StartRecord + $ivf_history_master_list->KeyCount - 1;
	}
}
$ivf_history_master_list->RecordCount = $ivf_history_master_list->StartRecord - 1;
if ($ivf_history_master_list->Recordset && !$ivf_history_master_list->Recordset->EOF) {
	$ivf_history_master_list->Recordset->moveFirst();
	$selectLimit = $ivf_history_master_list->UseSelectLimit;
	if (!$selectLimit && $ivf_history_master_list->StartRecord > 1)
		$ivf_history_master_list->Recordset->move($ivf_history_master_list->StartRecord - 1);
} elseif (!$ivf_history_master->AllowAddDeleteRow && $ivf_history_master_list->StopRecord == 0) {
	$ivf_history_master_list->StopRecord = $ivf_history_master->GridAddRowCount;
}

// Initialize aggregate
$ivf_history_master->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_history_master->resetAttributes();
$ivf_history_master_list->renderRow();
if ($ivf_history_master_list->isGridAdd())
	$ivf_history_master_list->RowIndex = 0;
if ($ivf_history_master_list->isGridEdit())
	$ivf_history_master_list->RowIndex = 0;
while ($ivf_history_master_list->RecordCount < $ivf_history_master_list->StopRecord) {
	$ivf_history_master_list->RecordCount++;
	if ($ivf_history_master_list->RecordCount >= $ivf_history_master_list->StartRecord) {
		$ivf_history_master_list->RowCount++;
		if ($ivf_history_master_list->isGridAdd() || $ivf_history_master_list->isGridEdit() || $ivf_history_master->isConfirm()) {
			$ivf_history_master_list->RowIndex++;
			$CurrentForm->Index = $ivf_history_master_list->RowIndex;
			if ($CurrentForm->hasValue($ivf_history_master_list->FormActionName) && ($ivf_history_master->isConfirm() || $ivf_history_master_list->EventCancelled))
				$ivf_history_master_list->RowAction = strval($CurrentForm->getValue($ivf_history_master_list->FormActionName));
			elseif ($ivf_history_master_list->isGridAdd())
				$ivf_history_master_list->RowAction = "insert";
			else
				$ivf_history_master_list->RowAction = "";
		}

		// Set up key count
		$ivf_history_master_list->KeyCount = $ivf_history_master_list->RowIndex;

		// Init row class and style
		$ivf_history_master->resetAttributes();
		$ivf_history_master->CssClass = "";
		if ($ivf_history_master_list->isGridAdd()) {
			$ivf_history_master_list->loadRowValues(); // Load default values
		} else {
			$ivf_history_master_list->loadRowValues($ivf_history_master_list->Recordset); // Load row values
		}
		$ivf_history_master->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_history_master_list->isGridAdd()) // Grid add
			$ivf_history_master->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_history_master_list->isGridAdd() && $ivf_history_master->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_history_master_list->restoreCurrentRowFormValues($ivf_history_master_list->RowIndex); // Restore form values
		if ($ivf_history_master_list->isGridEdit()) { // Grid edit
			if ($ivf_history_master->EventCancelled)
				$ivf_history_master_list->restoreCurrentRowFormValues($ivf_history_master_list->RowIndex); // Restore form values
			if ($ivf_history_master_list->RowAction == "insert")
				$ivf_history_master->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_history_master->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_history_master_list->isGridEdit() && ($ivf_history_master->RowType == ROWTYPE_EDIT || $ivf_history_master->RowType == ROWTYPE_ADD) && $ivf_history_master->EventCancelled) // Update failed
			$ivf_history_master_list->restoreCurrentRowFormValues($ivf_history_master_list->RowIndex); // Restore form values
		if ($ivf_history_master->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_history_master_list->EditRowCount++;

		// Set up row id / data-rowindex
		$ivf_history_master->RowAttrs->merge(["data-rowindex" => $ivf_history_master_list->RowCount, "id" => "r" . $ivf_history_master_list->RowCount . "_ivf_history_master", "data-rowtype" => $ivf_history_master->RowType]);

		// Render row
		$ivf_history_master_list->renderRow();

		// Render list options
		$ivf_history_master_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_history_master_list->RowAction != "delete" && $ivf_history_master_list->RowAction != "insertdelete" && !($ivf_history_master_list->RowAction == "insert" && $ivf_history_master->isConfirm() && $ivf_history_master_list->emptyRow())) {
?>
	<tr <?php echo $ivf_history_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_history_master_list->ListOptions->render("body", "left", $ivf_history_master_list->RowCount);
?>
	<?php if ($ivf_history_master_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_history_master_list->id->cellAttributes() ?>>
<?php if ($ivf_history_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_id" class="form-group"></span>
<input type="hidden" data-table="ivf_history_master" data-field="x_id" name="o<?php echo $ivf_history_master_list->RowIndex ?>_id" id="o<?php echo $ivf_history_master_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_history_master_list->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_history_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_id" class="form-group">
<span<?php echo $ivf_history_master_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_history_master_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_history_master" data-field="x_id" name="x<?php echo $ivf_history_master_list->RowIndex ?>_id" id="x<?php echo $ivf_history_master_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_history_master_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_history_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_id">
<span<?php echo $ivf_history_master_list->id->viewAttributes() ?>><?php echo $ivf_history_master_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_history_master_list->History->Visible) { // History ?>
		<td data-name="History" <?php echo $ivf_history_master_list->History->cellAttributes() ?>>
<?php if ($ivf_history_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_History" class="form-group">
<input type="text" data-table="ivf_history_master" data-field="x_History" name="x<?php echo $ivf_history_master_list->RowIndex ?>_History" id="x<?php echo $ivf_history_master_list->RowIndex ?>_History" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master_list->History->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master_list->History->EditValue ?>"<?php echo $ivf_history_master_list->History->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_history_master" data-field="x_History" name="o<?php echo $ivf_history_master_list->RowIndex ?>_History" id="o<?php echo $ivf_history_master_list->RowIndex ?>_History" value="<?php echo HtmlEncode($ivf_history_master_list->History->OldValue) ?>">
<?php } ?>
<?php if ($ivf_history_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_History" class="form-group">
<input type="text" data-table="ivf_history_master" data-field="x_History" name="x<?php echo $ivf_history_master_list->RowIndex ?>_History" id="x<?php echo $ivf_history_master_list->RowIndex ?>_History" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master_list->History->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master_list->History->EditValue ?>"<?php echo $ivf_history_master_list->History->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_history_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_History">
<span<?php echo $ivf_history_master_list->History->viewAttributes() ?>><?php echo $ivf_history_master_list->History->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_history_master_list->HistoryType->Visible) { // HistoryType ?>
		<td data-name="HistoryType" <?php echo $ivf_history_master_list->HistoryType->cellAttributes() ?>>
<?php if ($ivf_history_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_HistoryType" class="form-group">
<input type="text" data-table="ivf_history_master" data-field="x_HistoryType" name="x<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" id="x<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master_list->HistoryType->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master_list->HistoryType->EditValue ?>"<?php echo $ivf_history_master_list->HistoryType->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_history_master" data-field="x_HistoryType" name="o<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" id="o<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" value="<?php echo HtmlEncode($ivf_history_master_list->HistoryType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_history_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_HistoryType" class="form-group">
<input type="text" data-table="ivf_history_master" data-field="x_HistoryType" name="x<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" id="x<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master_list->HistoryType->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master_list->HistoryType->EditValue ?>"<?php echo $ivf_history_master_list->HistoryType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_history_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_history_master_list->RowCount ?>_ivf_history_master_HistoryType">
<span<?php echo $ivf_history_master_list->HistoryType->viewAttributes() ?>><?php echo $ivf_history_master_list->HistoryType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_history_master_list->ListOptions->render("body", "right", $ivf_history_master_list->RowCount);
?>
	</tr>
<?php if ($ivf_history_master->RowType == ROWTYPE_ADD || $ivf_history_master->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_history_masterlist", "load"], function() {
	fivf_history_masterlist.updateLists(<?php echo $ivf_history_master_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_history_master_list->isGridAdd())
		if (!$ivf_history_master_list->Recordset->EOF)
			$ivf_history_master_list->Recordset->moveNext();
}
?>
<?php
	if ($ivf_history_master_list->isGridAdd() || $ivf_history_master_list->isGridEdit()) {
		$ivf_history_master_list->RowIndex = '$rowindex$';
		$ivf_history_master_list->loadRowValues();

		// Set row properties
		$ivf_history_master->resetAttributes();
		$ivf_history_master->RowAttrs->merge(["data-rowindex" => $ivf_history_master_list->RowIndex, "id" => "r0_ivf_history_master", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_history_master->RowAttrs->appendClass("ew-template");
		$ivf_history_master->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_history_master_list->renderRow();

		// Render list options
		$ivf_history_master_list->renderListOptions();
		$ivf_history_master_list->StartRowCount = 0;
?>
	<tr <?php echo $ivf_history_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_history_master_list->ListOptions->render("body", "left", $ivf_history_master_list->RowIndex);
?>
	<?php if ($ivf_history_master_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_ivf_history_master_id" class="form-group ivf_history_master_id"></span>
<input type="hidden" data-table="ivf_history_master" data-field="x_id" name="o<?php echo $ivf_history_master_list->RowIndex ?>_id" id="o<?php echo $ivf_history_master_list->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_history_master_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_history_master_list->History->Visible) { // History ?>
		<td data-name="History">
<span id="el$rowindex$_ivf_history_master_History" class="form-group ivf_history_master_History">
<input type="text" data-table="ivf_history_master" data-field="x_History" name="x<?php echo $ivf_history_master_list->RowIndex ?>_History" id="x<?php echo $ivf_history_master_list->RowIndex ?>_History" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master_list->History->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master_list->History->EditValue ?>"<?php echo $ivf_history_master_list->History->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_history_master" data-field="x_History" name="o<?php echo $ivf_history_master_list->RowIndex ?>_History" id="o<?php echo $ivf_history_master_list->RowIndex ?>_History" value="<?php echo HtmlEncode($ivf_history_master_list->History->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_history_master_list->HistoryType->Visible) { // HistoryType ?>
		<td data-name="HistoryType">
<span id="el$rowindex$_ivf_history_master_HistoryType" class="form-group ivf_history_master_HistoryType">
<input type="text" data-table="ivf_history_master" data-field="x_HistoryType" name="x<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" id="x<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_history_master_list->HistoryType->getPlaceHolder()) ?>" value="<?php echo $ivf_history_master_list->HistoryType->EditValue ?>"<?php echo $ivf_history_master_list->HistoryType->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_history_master" data-field="x_HistoryType" name="o<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" id="o<?php echo $ivf_history_master_list->RowIndex ?>_HistoryType" value="<?php echo HtmlEncode($ivf_history_master_list->HistoryType->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_history_master_list->ListOptions->render("body", "right", $ivf_history_master_list->RowIndex);
?>
<script>
loadjs.ready(["fivf_history_masterlist", "load"], function() {
	fivf_history_masterlist.updateLists(<?php echo $ivf_history_master_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($ivf_history_master_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $ivf_history_master_list->FormKeyCountName ?>" id="<?php echo $ivf_history_master_list->FormKeyCountName ?>" value="<?php echo $ivf_history_master_list->KeyCount ?>">
<?php echo $ivf_history_master_list->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_history_master_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $ivf_history_master_list->FormKeyCountName ?>" id="<?php echo $ivf_history_master_list->FormKeyCountName ?>" value="<?php echo $ivf_history_master_list->KeyCount ?>">
<?php echo $ivf_history_master_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$ivf_history_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_history_master_list->Recordset)
	$ivf_history_master_list->Recordset->Close();
?>
<?php if (!$ivf_history_master_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_history_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_history_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_history_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_history_master_list->TotalRecords == 0 && !$ivf_history_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_history_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_history_master_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_history_master_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_history_master->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_history_master",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_history_master_list->terminate();
?>