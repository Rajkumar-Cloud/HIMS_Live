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
$employee_email_list = new employee_email_list();

// Run the page
$employee_email_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$employee_email_list->isExport()) { ?>
<script>
var femployee_emaillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	femployee_emaillist = currentForm = new ew.Form("femployee_emaillist", "list");
	femployee_emaillist.formKeyCountName = '<?php echo $employee_email_list->FormKeyCountName ?>';

	// Validate form
	femployee_emaillist.validate = function() {
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
			<?php if ($employee_email_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_list->id->caption(), $employee_email_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_list->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_list->employee_id->caption(), $employee_email_list->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_list->_email->Required) { ?>
				elm = this.getElements("x" + infix + "__email");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_list->_email->caption(), $employee_email_list->_email->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_list->email_type->Required) { ?>
				elm = this.getElements("x" + infix + "_email_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_list->email_type->caption(), $employee_email_list->email_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_email_list->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_email_list->status->caption(), $employee_email_list->status->RequiredErrorMessage)) ?>");
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
	femployee_emaillist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "_email", false)) return false;
		if (ew.valueChanged(fobj, infix, "email_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_emaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_emaillist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_emaillist.lists["x_employee_id"] = <?php echo $employee_email_list->employee_id->Lookup->toClientList($employee_email_list) ?>;
	femployee_emaillist.lists["x_employee_id"].options = <?php echo JsonEncode($employee_email_list->employee_id->lookupOptions()) ?>;
	femployee_emaillist.lists["x_email_type"] = <?php echo $employee_email_list->email_type->Lookup->toClientList($employee_email_list) ?>;
	femployee_emaillist.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_list->email_type->lookupOptions()) ?>;
	femployee_emaillist.lists["x_status"] = <?php echo $employee_email_list->status->Lookup->toClientList($employee_email_list) ?>;
	femployee_emaillist.lists["x_status"].options = <?php echo JsonEncode($employee_email_list->status->lookupOptions()) ?>;
	loadjs.done("femployee_emaillist");
});
var femployee_emaillistsrch;
loadjs.ready("head", function() {

	// Form object for search
	femployee_emaillistsrch = currentSearchForm = new ew.Form("femployee_emaillistsrch");

	// Dynamic selection lists
	// Filters

	femployee_emaillistsrch.filterList = <?php echo $employee_email_list->getFilterList() ?>;
	loadjs.done("femployee_emaillistsrch");
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
<?php if (!$employee_email_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_email_list->TotalRecords > 0 && $employee_email_list->ExportOptions->visible()) { ?>
<?php $employee_email_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_email_list->ImportOptions->visible()) { ?>
<?php $employee_email_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_email_list->SearchOptions->visible()) { ?>
<?php $employee_email_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_email_list->FilterOptions->visible()) { ?>
<?php $employee_email_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$employee_email_list->isExport() || Config("EXPORT_MASTER_RECORD") && $employee_email_list->isExport("print")) { ?>
<?php
if ($employee_email_list->DbMasterFilter != "" && $employee_email->getCurrentMasterTable() == "employee") {
	if ($employee_email_list->MasterRecordExists) {
		include_once "employeemaster.php";
	}
}
?>
<?php } ?>
<?php
$employee_email_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_email_list->isExport() && !$employee_email->CurrentAction) { ?>
<form name="femployee_emaillistsrch" id="femployee_emaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="femployee_emaillistsrch-search-panel" class="<?php echo $employee_email_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_email">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $employee_email_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($employee_email_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($employee_email_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_email_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_email_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $employee_email_list->showPageHeader(); ?>
<?php
$employee_email_list->showMessage();
?>
<?php if ($employee_email_list->TotalRecords > 0 || $employee_email->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_email_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_email">
<?php if (!$employee_email_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_email_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_email_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_emaillist" id="femployee_emaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_email">
<?php if ($employee_email->getCurrentMasterTable() == "employee" && $employee_email->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($employee_email_list->employee_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_employee_email" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($employee_email_list->TotalRecords > 0 || $employee_email_list->isGridEdit()) { ?>
<table id="tbl_employee_emaillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_email->RowType = ROWTYPE_HEADER;

// Render list options
$employee_email_list->renderListOptions();

// Render list options (header, left)
$employee_email_list->ListOptions->render("header", "left");
?>
<?php if ($employee_email_list->id->Visible) { // id ?>
	<?php if ($employee_email_list->SortUrl($employee_email_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_email_list->id->headerCellClass() ?>"><div id="elh_employee_email_id" class="employee_email_id"><div class="ew-table-header-caption"><?php echo $employee_email_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_email_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_email_list->SortUrl($employee_email_list->id) ?>', 1);"><div id="elh_employee_email_id" class="employee_email_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_list->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_email_list->SortUrl($employee_email_list->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_email_list->employee_id->headerCellClass() ?>"><div id="elh_employee_email_employee_id" class="employee_email_employee_id"><div class="ew-table-header-caption"><?php echo $employee_email_list->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_email_list->employee_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_email_list->SortUrl($employee_email_list->employee_id) ?>', 1);"><div id="elh_employee_email_employee_id" class="employee_email_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_list->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_list->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_list->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_list->_email->Visible) { // email ?>
	<?php if ($employee_email_list->SortUrl($employee_email_list->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $employee_email_list->_email->headerCellClass() ?>"><div id="elh_employee_email__email" class="employee_email__email"><div class="ew-table-header-caption"><?php echo $employee_email_list->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $employee_email_list->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_email_list->SortUrl($employee_email_list->_email) ?>', 1);"><div id="elh_employee_email__email" class="employee_email__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_list->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_email_list->_email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_list->_email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_list->email_type->Visible) { // email_type ?>
	<?php if ($employee_email_list->SortUrl($employee_email_list->email_type) == "") { ?>
		<th data-name="email_type" class="<?php echo $employee_email_list->email_type->headerCellClass() ?>"><div id="elh_employee_email_email_type" class="employee_email_email_type"><div class="ew-table-header-caption"><?php echo $employee_email_list->email_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="email_type" class="<?php echo $employee_email_list->email_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_email_list->SortUrl($employee_email_list->email_type) ?>', 1);"><div id="elh_employee_email_email_type" class="employee_email_email_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_list->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_list->email_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_list->email_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_email_list->status->Visible) { // status ?>
	<?php if ($employee_email_list->SortUrl($employee_email_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_email_list->status->headerCellClass() ?>"><div id="elh_employee_email_status" class="employee_email_status"><div class="ew-table-header-caption"><?php echo $employee_email_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_email_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $employee_email_list->SortUrl($employee_email_list->status) ?>', 1);"><div id="elh_employee_email_status" class="employee_email_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_email_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_email_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_email_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_email_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_email_list->ExportAll && $employee_email_list->isExport()) {
	$employee_email_list->StopRecord = $employee_email_list->TotalRecords;
} else {

	// Set the last record to display
	if ($employee_email_list->TotalRecords > $employee_email_list->StartRecord + $employee_email_list->DisplayRecords - 1)
		$employee_email_list->StopRecord = $employee_email_list->StartRecord + $employee_email_list->DisplayRecords - 1;
	else
		$employee_email_list->StopRecord = $employee_email_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($employee_email->isConfirm() || $employee_email_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_email_list->FormKeyCountName) && ($employee_email_list->isGridAdd() || $employee_email_list->isGridEdit() || $employee_email->isConfirm())) {
		$employee_email_list->KeyCount = $CurrentForm->getValue($employee_email_list->FormKeyCountName);
		$employee_email_list->StopRecord = $employee_email_list->StartRecord + $employee_email_list->KeyCount - 1;
	}
}
$employee_email_list->RecordCount = $employee_email_list->StartRecord - 1;
if ($employee_email_list->Recordset && !$employee_email_list->Recordset->EOF) {
	$employee_email_list->Recordset->moveFirst();
	$selectLimit = $employee_email_list->UseSelectLimit;
	if (!$selectLimit && $employee_email_list->StartRecord > 1)
		$employee_email_list->Recordset->move($employee_email_list->StartRecord - 1);
} elseif (!$employee_email->AllowAddDeleteRow && $employee_email_list->StopRecord == 0) {
	$employee_email_list->StopRecord = $employee_email->GridAddRowCount;
}

// Initialize aggregate
$employee_email->RowType = ROWTYPE_AGGREGATEINIT;
$employee_email->resetAttributes();
$employee_email_list->renderRow();
if ($employee_email_list->isGridAdd())
	$employee_email_list->RowIndex = 0;
if ($employee_email_list->isGridEdit())
	$employee_email_list->RowIndex = 0;
while ($employee_email_list->RecordCount < $employee_email_list->StopRecord) {
	$employee_email_list->RecordCount++;
	if ($employee_email_list->RecordCount >= $employee_email_list->StartRecord) {
		$employee_email_list->RowCount++;
		if ($employee_email_list->isGridAdd() || $employee_email_list->isGridEdit() || $employee_email->isConfirm()) {
			$employee_email_list->RowIndex++;
			$CurrentForm->Index = $employee_email_list->RowIndex;
			if ($CurrentForm->hasValue($employee_email_list->FormActionName) && ($employee_email->isConfirm() || $employee_email_list->EventCancelled))
				$employee_email_list->RowAction = strval($CurrentForm->getValue($employee_email_list->FormActionName));
			elseif ($employee_email_list->isGridAdd())
				$employee_email_list->RowAction = "insert";
			else
				$employee_email_list->RowAction = "";
		}

		// Set up key count
		$employee_email_list->KeyCount = $employee_email_list->RowIndex;

		// Init row class and style
		$employee_email->resetAttributes();
		$employee_email->CssClass = "";
		if ($employee_email_list->isGridAdd()) {
			$employee_email_list->loadRowValues(); // Load default values
		} else {
			$employee_email_list->loadRowValues($employee_email_list->Recordset); // Load row values
		}
		$employee_email->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_email_list->isGridAdd()) // Grid add
			$employee_email->RowType = ROWTYPE_ADD; // Render add
		if ($employee_email_list->isGridAdd() && $employee_email->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_email_list->restoreCurrentRowFormValues($employee_email_list->RowIndex); // Restore form values
		if ($employee_email_list->isGridEdit()) { // Grid edit
			if ($employee_email->EventCancelled)
				$employee_email_list->restoreCurrentRowFormValues($employee_email_list->RowIndex); // Restore form values
			if ($employee_email_list->RowAction == "insert")
				$employee_email->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_email->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_email_list->isGridEdit() && ($employee_email->RowType == ROWTYPE_EDIT || $employee_email->RowType == ROWTYPE_ADD) && $employee_email->EventCancelled) // Update failed
			$employee_email_list->restoreCurrentRowFormValues($employee_email_list->RowIndex); // Restore form values
		if ($employee_email->RowType == ROWTYPE_EDIT) // Edit row
			$employee_email_list->EditRowCount++;

		// Set up row id / data-rowindex
		$employee_email->RowAttrs->merge(["data-rowindex" => $employee_email_list->RowCount, "id" => "r" . $employee_email_list->RowCount . "_employee_email", "data-rowtype" => $employee_email->RowType]);

		// Render row
		$employee_email_list->renderRow();

		// Render list options
		$employee_email_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_email_list->RowAction != "delete" && $employee_email_list->RowAction != "insertdelete" && !($employee_email_list->RowAction == "insert" && $employee_email->isConfirm() && $employee_email_list->emptyRow())) {
?>
	<tr <?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_list->ListOptions->render("body", "left", $employee_email_list->RowCount);
?>
	<?php if ($employee_email_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_email_list->id->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_id" class="form-group"></span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_list->RowIndex ?>_id" id="o<?php echo $employee_email_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email_list->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_id" class="form-group">
<span<?php echo $employee_email_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="x<?php echo $employee_email_list->RowIndex ?>_id" id="x<?php echo $employee_email_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_id">
<span<?php echo $employee_email_list->id->viewAttributes() ?>><?php echo $employee_email_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_email_list->employee_id->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_email_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_employee_id" class="form-group">
<span<?php echo $employee_email_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_employee_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_employee_id" data-value-separator="<?php echo $employee_email_list->employee_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id"<?php echo $employee_email_list->employee_id->editAttributes() ?>>
			<?php echo $employee_email_list->employee_id->selectOptionListHtml("x{$employee_email_list->RowIndex}_employee_id") ?>
		</select>
</div>
<?php echo $employee_email_list->employee_id->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_employee_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_list->RowIndex ?>_employee_id" id="o<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email_list->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_email_list->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_employee_id" class="form-group">
<span<?php echo $employee_email_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_employee_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_employee_id" data-value-separator="<?php echo $employee_email_list->employee_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id"<?php echo $employee_email_list->employee_id->editAttributes() ?>>
			<?php echo $employee_email_list->employee_id->selectOptionListHtml("x{$employee_email_list->RowIndex}_employee_id") ?>
		</select>
</div>
<?php echo $employee_email_list->employee_id->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_employee_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_employee_id">
<span<?php echo $employee_email_list->employee_id->viewAttributes() ?>><?php echo $employee_email_list->employee_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email_list->_email->Visible) { // email ?>
		<td data-name="_email" <?php echo $employee_email_list->_email->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email__email" class="form-group">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_list->RowIndex ?>__email" id="x<?php echo $employee_email_list->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email_list->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email_list->_email->EditValue ?>"<?php echo $employee_email_list->_email->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_list->RowIndex ?>__email" id="o<?php echo $employee_email_list->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email_list->_email->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email__email" class="form-group">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_list->RowIndex ?>__email" id="x<?php echo $employee_email_list->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email_list->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email_list->_email->EditValue ?>"<?php echo $employee_email_list->_email->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email__email">
<span<?php echo $employee_email_list->_email->viewAttributes() ?>><?php echo $employee_email_list->_email->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email_list->email_type->Visible) { // email_type ?>
		<td data-name="email_type" <?php echo $employee_email_list->email_type->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_email_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email_list->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_email_type" name="x<?php echo $employee_email_list->RowIndex ?>_email_type"<?php echo $employee_email_list->email_type->editAttributes() ?>>
			<?php echo $employee_email_list->email_type->selectOptionListHtml("x{$employee_email_list->RowIndex}_email_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email_list->email_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_list->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email_list->email_type->caption() ?>" data-title="<?php echo $employee_email_list->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_list->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_email_list->email_type->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_email_type") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_list->RowIndex ?>_email_type" id="o<?php echo $employee_email_list->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email_list->email_type->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_email_type" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email_list->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_email_type" name="x<?php echo $employee_email_list->RowIndex ?>_email_type"<?php echo $employee_email_list->email_type->editAttributes() ?>>
			<?php echo $employee_email_list->email_type->selectOptionListHtml("x{$employee_email_list->RowIndex}_email_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email_list->email_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_list->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email_list->email_type->caption() ?>" data-title="<?php echo $employee_email_list->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_list->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_email_list->email_type->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_email_type") ?>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_email_type">
<span<?php echo $employee_email_list->email_type->viewAttributes() ?>><?php echo $employee_email_list->email_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_email_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_email_list->status->cellAttributes() ?>>
<?php if ($employee_email->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_status" name="x<?php echo $employee_email_list->RowIndex ?>_status"<?php echo $employee_email_list->status->editAttributes() ?>>
			<?php echo $employee_email_list->status->selectOptionListHtml("x{$employee_email_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_email_list->status->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_list->RowIndex ?>_status" id="o<?php echo $employee_email_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email_list->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_status" name="x<?php echo $employee_email_list->RowIndex ?>_status"<?php echo $employee_email_list->status->editAttributes() ?>>
			<?php echo $employee_email_list->status->selectOptionListHtml("x{$employee_email_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_email_list->status->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_email->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_email_list->RowCount ?>_employee_email_status">
<span<?php echo $employee_email_list->status->viewAttributes() ?>><?php echo $employee_email_list->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_email_list->ListOptions->render("body", "right", $employee_email_list->RowCount);
?>
	</tr>
<?php if ($employee_email->RowType == ROWTYPE_ADD || $employee_email->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_emaillist", "load"], function() {
	femployee_emaillist.updateLists(<?php echo $employee_email_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_email_list->isGridAdd())
		if (!$employee_email_list->Recordset->EOF)
			$employee_email_list->Recordset->moveNext();
}
?>
<?php
	if ($employee_email_list->isGridAdd() || $employee_email_list->isGridEdit()) {
		$employee_email_list->RowIndex = '$rowindex$';
		$employee_email_list->loadRowValues();

		// Set row properties
		$employee_email->resetAttributes();
		$employee_email->RowAttrs->merge(["data-rowindex" => $employee_email_list->RowIndex, "id" => "r0_employee_email", "data-rowtype" => ROWTYPE_ADD]);
		$employee_email->RowAttrs->appendClass("ew-template");
		$employee_email->RowType = ROWTYPE_ADD;

		// Render row
		$employee_email_list->renderRow();

		// Render list options
		$employee_email_list->renderListOptions();
		$employee_email_list->StartRowCount = 0;
?>
	<tr <?php echo $employee_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_email_list->ListOptions->render("body", "left", $employee_email_list->RowIndex);
?>
	<?php if ($employee_email_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_employee_email_id" class="form-group employee_email_id"></span>
<input type="hidden" data-table="employee_email" data-field="x_id" name="o<?php echo $employee_email_list->RowIndex ?>_id" id="o<?php echo $employee_email_list->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_email_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email_list->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if ($employee_email_list->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<span<?php echo $employee_email_list->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_email_list->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email_list->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_email_employee_id" class="form-group employee_email_employee_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_employee_id" data-value-separator="<?php echo $employee_email_list->employee_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_employee_id" name="x<?php echo $employee_email_list->RowIndex ?>_employee_id"<?php echo $employee_email_list->employee_id->editAttributes() ?>>
			<?php echo $employee_email_list->employee_id->selectOptionListHtml("x{$employee_email_list->RowIndex}_employee_id") ?>
		</select>
</div>
<?php echo $employee_email_list->employee_id->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_employee_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="employee_email" data-field="x_employee_id" name="o<?php echo $employee_email_list->RowIndex ?>_employee_id" id="o<?php echo $employee_email_list->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_email_list->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email_list->_email->Visible) { // email ?>
		<td data-name="_email">
<span id="el$rowindex$_employee_email__email" class="form-group employee_email__email">
<input type="text" data-table="employee_email" data-field="x__email" name="x<?php echo $employee_email_list->RowIndex ?>__email" id="x<?php echo $employee_email_list->RowIndex ?>__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_email_list->_email->getPlaceHolder()) ?>" value="<?php echo $employee_email_list->_email->EditValue ?>"<?php echo $employee_email_list->_email->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_email" data-field="x__email" name="o<?php echo $employee_email_list->RowIndex ?>__email" id="o<?php echo $employee_email_list->RowIndex ?>__email" value="<?php echo HtmlEncode($employee_email_list->_email->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email_list->email_type->Visible) { // email_type ?>
		<td data-name="email_type">
<span id="el$rowindex$_employee_email_email_type" class="form-group employee_email_email_type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_email_type" data-value-separator="<?php echo $employee_email_list->email_type->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_email_type" name="x<?php echo $employee_email_list->RowIndex ?>_email_type"<?php echo $employee_email_list->email_type->editAttributes() ?>>
			<?php echo $employee_email_list->email_type->selectOptionListHtml("x{$employee_email_list->RowIndex}_email_type") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "sys_email_type") && !$employee_email_list->email_type->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_email_list->RowIndex ?>_email_type" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_email_list->email_type->caption() ?>" data-title="<?php echo $employee_email_list->email_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_email_list->RowIndex ?>_email_type',url:'sys_email_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_email_list->email_type->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_email_type") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_email_type" name="o<?php echo $employee_email_list->RowIndex ?>_email_type" id="o<?php echo $employee_email_list->RowIndex ?>_email_type" value="<?php echo HtmlEncode($employee_email_list->email_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_email_list->status->Visible) { // status ?>
		<td data-name="status">
<span id="el$rowindex$_employee_email_status" class="form-group employee_email_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_email" data-field="x_status" data-value-separator="<?php echo $employee_email_list->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_email_list->RowIndex ?>_status" name="x<?php echo $employee_email_list->RowIndex ?>_status"<?php echo $employee_email_list->status->editAttributes() ?>>
			<?php echo $employee_email_list->status->selectOptionListHtml("x{$employee_email_list->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_email_list->status->Lookup->getParamTag($employee_email_list, "p_x" . $employee_email_list->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_email" data-field="x_status" name="o<?php echo $employee_email_list->RowIndex ?>_status" id="o<?php echo $employee_email_list->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_email_list->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_email_list->ListOptions->render("body", "right", $employee_email_list->RowIndex);
?>
<script>
loadjs.ready(["femployee_emaillist", "load"], function() {
	femployee_emaillist.updateLists(<?php echo $employee_email_list->RowIndex ?>);
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
<?php if ($employee_email_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $employee_email_list->FormKeyCountName ?>" id="<?php echo $employee_email_list->FormKeyCountName ?>" value="<?php echo $employee_email_list->KeyCount ?>">
<?php echo $employee_email_list->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_email_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $employee_email_list->FormKeyCountName ?>" id="<?php echo $employee_email_list->FormKeyCountName ?>" value="<?php echo $employee_email_list->KeyCount ?>">
<?php echo $employee_email_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$employee_email->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_email_list->Recordset)
	$employee_email_list->Recordset->Close();
?>
<?php if (!$employee_email_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_email_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $employee_email_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_email_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_email_list->TotalRecords == 0 && !$employee_email->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_email_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_email_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$employee_email_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_email->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_email",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$employee_email_list->terminate();
?>