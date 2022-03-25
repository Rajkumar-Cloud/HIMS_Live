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
$billing_discount_list = new billing_discount_list();

// Run the page
$billing_discount_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$billing_discount_list->isExport()) { ?>
<script>
var fbilling_discountlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbilling_discountlist = currentForm = new ew.Form("fbilling_discountlist", "list");
	fbilling_discountlist.formKeyCountName = '<?php echo $billing_discount_list->FormKeyCountName ?>';

	// Validate form
	fbilling_discountlist.validate = function() {
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
			<?php if ($billing_discount_list->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_list->id->caption(), $billing_discount_list->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_discount_list->Particulars->Required) { ?>
				elm = this.getElements("x" + infix + "_Particulars");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_list->Particulars->caption(), $billing_discount_list->Particulars->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($billing_discount_list->Procedure->Required) { ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_list->Procedure->caption(), $billing_discount_list->Procedure->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Procedure");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_discount_list->Procedure->errorMessage()) ?>");
			<?php if ($billing_discount_list->Pharmacy->Required) { ?>
				elm = this.getElements("x" + infix + "_Pharmacy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_list->Pharmacy->caption(), $billing_discount_list->Pharmacy->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Pharmacy");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_discount_list->Pharmacy->errorMessage()) ?>");
			<?php if ($billing_discount_list->Investication->Required) { ?>
				elm = this.getElements("x" + infix + "_Investication");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $billing_discount_list->Investication->caption(), $billing_discount_list->Investication->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Investication");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($billing_discount_list->Investication->errorMessage()) ?>");

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
	fbilling_discountlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Particulars", false)) return false;
		if (ew.valueChanged(fobj, infix, "Procedure", false)) return false;
		if (ew.valueChanged(fobj, infix, "Pharmacy", false)) return false;
		if (ew.valueChanged(fobj, infix, "Investication", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fbilling_discountlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbilling_discountlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbilling_discountlist");
});
var fbilling_discountlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbilling_discountlistsrch = currentSearchForm = new ew.Form("fbilling_discountlistsrch");

	// Dynamic selection lists
	// Filters

	fbilling_discountlistsrch.filterList = <?php echo $billing_discount_list->getFilterList() ?>;
	loadjs.done("fbilling_discountlistsrch");
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
<?php if (!$billing_discount_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($billing_discount_list->TotalRecords > 0 && $billing_discount_list->ExportOptions->visible()) { ?>
<?php $billing_discount_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_discount_list->ImportOptions->visible()) { ?>
<?php $billing_discount_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($billing_discount_list->SearchOptions->visible()) { ?>
<?php $billing_discount_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($billing_discount_list->FilterOptions->visible()) { ?>
<?php $billing_discount_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$billing_discount_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$billing_discount_list->isExport() && !$billing_discount->CurrentAction) { ?>
<form name="fbilling_discountlistsrch" id="fbilling_discountlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbilling_discountlistsrch-search-panel" class="<?php echo $billing_discount_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="billing_discount">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $billing_discount_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($billing_discount_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($billing_discount_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $billing_discount_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($billing_discount_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $billing_discount_list->showPageHeader(); ?>
<?php
$billing_discount_list->showMessage();
?>
<?php if ($billing_discount_list->TotalRecords > 0 || $billing_discount->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($billing_discount_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> billing_discount">
<?php if (!$billing_discount_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$billing_discount_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $billing_discount_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_discount_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbilling_discountlist" id="fbilling_discountlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<div id="gmp_billing_discount" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($billing_discount_list->TotalRecords > 0 || $billing_discount_list->isGridEdit()) { ?>
<table id="tbl_billing_discountlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$billing_discount->RowType = ROWTYPE_HEADER;

// Render list options
$billing_discount_list->renderListOptions();

// Render list options (header, left)
$billing_discount_list->ListOptions->render("header", "left");
?>
<?php if ($billing_discount_list->id->Visible) { // id ?>
	<?php if ($billing_discount_list->SortUrl($billing_discount_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $billing_discount_list->id->headerCellClass() ?>"><div id="elh_billing_discount_id" class="billing_discount_id"><div class="ew-table-header-caption"><?php echo $billing_discount_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $billing_discount_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_discount_list->SortUrl($billing_discount_list->id) ?>', 1);"><div id="elh_billing_discount_id" class="billing_discount_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_discount_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount_list->Particulars->Visible) { // Particulars ?>
	<?php if ($billing_discount_list->SortUrl($billing_discount_list->Particulars) == "") { ?>
		<th data-name="Particulars" class="<?php echo $billing_discount_list->Particulars->headerCellClass() ?>"><div id="elh_billing_discount_Particulars" class="billing_discount_Particulars"><div class="ew-table-header-caption"><?php echo $billing_discount_list->Particulars->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Particulars" class="<?php echo $billing_discount_list->Particulars->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_discount_list->SortUrl($billing_discount_list->Particulars) ?>', 1);"><div id="elh_billing_discount_Particulars" class="billing_discount_Particulars">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount_list->Particulars->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($billing_discount_list->Particulars->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_discount_list->Particulars->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount_list->Procedure->Visible) { // Procedure ?>
	<?php if ($billing_discount_list->SortUrl($billing_discount_list->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $billing_discount_list->Procedure->headerCellClass() ?>"><div id="elh_billing_discount_Procedure" class="billing_discount_Procedure"><div class="ew-table-header-caption"><?php echo $billing_discount_list->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $billing_discount_list->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_discount_list->SortUrl($billing_discount_list->Procedure) ?>', 1);"><div id="elh_billing_discount_Procedure" class="billing_discount_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount_list->Procedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount_list->Procedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_discount_list->Procedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount_list->Pharmacy->Visible) { // Pharmacy ?>
	<?php if ($billing_discount_list->SortUrl($billing_discount_list->Pharmacy) == "") { ?>
		<th data-name="Pharmacy" class="<?php echo $billing_discount_list->Pharmacy->headerCellClass() ?>"><div id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy"><div class="ew-table-header-caption"><?php echo $billing_discount_list->Pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pharmacy" class="<?php echo $billing_discount_list->Pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_discount_list->SortUrl($billing_discount_list->Pharmacy) ?>', 1);"><div id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount_list->Pharmacy->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount_list->Pharmacy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_discount_list->Pharmacy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($billing_discount_list->Investication->Visible) { // Investication ?>
	<?php if ($billing_discount_list->SortUrl($billing_discount_list->Investication) == "") { ?>
		<th data-name="Investication" class="<?php echo $billing_discount_list->Investication->headerCellClass() ?>"><div id="elh_billing_discount_Investication" class="billing_discount_Investication"><div class="ew-table-header-caption"><?php echo $billing_discount_list->Investication->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investication" class="<?php echo $billing_discount_list->Investication->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $billing_discount_list->SortUrl($billing_discount_list->Investication) ?>', 1);"><div id="elh_billing_discount_Investication" class="billing_discount_Investication">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $billing_discount_list->Investication->caption() ?></span><span class="ew-table-header-sort"><?php if ($billing_discount_list->Investication->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($billing_discount_list->Investication->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$billing_discount_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($billing_discount_list->ExportAll && $billing_discount_list->isExport()) {
	$billing_discount_list->StopRecord = $billing_discount_list->TotalRecords;
} else {

	// Set the last record to display
	if ($billing_discount_list->TotalRecords > $billing_discount_list->StartRecord + $billing_discount_list->DisplayRecords - 1)
		$billing_discount_list->StopRecord = $billing_discount_list->StartRecord + $billing_discount_list->DisplayRecords - 1;
	else
		$billing_discount_list->StopRecord = $billing_discount_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($billing_discount->isConfirm() || $billing_discount_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($billing_discount_list->FormKeyCountName) && ($billing_discount_list->isGridAdd() || $billing_discount_list->isGridEdit() || $billing_discount->isConfirm())) {
		$billing_discount_list->KeyCount = $CurrentForm->getValue($billing_discount_list->FormKeyCountName);
		$billing_discount_list->StopRecord = $billing_discount_list->StartRecord + $billing_discount_list->KeyCount - 1;
	}
}
$billing_discount_list->RecordCount = $billing_discount_list->StartRecord - 1;
if ($billing_discount_list->Recordset && !$billing_discount_list->Recordset->EOF) {
	$billing_discount_list->Recordset->moveFirst();
	$selectLimit = $billing_discount_list->UseSelectLimit;
	if (!$selectLimit && $billing_discount_list->StartRecord > 1)
		$billing_discount_list->Recordset->move($billing_discount_list->StartRecord - 1);
} elseif (!$billing_discount->AllowAddDeleteRow && $billing_discount_list->StopRecord == 0) {
	$billing_discount_list->StopRecord = $billing_discount->GridAddRowCount;
}

// Initialize aggregate
$billing_discount->RowType = ROWTYPE_AGGREGATEINIT;
$billing_discount->resetAttributes();
$billing_discount_list->renderRow();
if ($billing_discount_list->isGridAdd())
	$billing_discount_list->RowIndex = 0;
if ($billing_discount_list->isGridEdit())
	$billing_discount_list->RowIndex = 0;
while ($billing_discount_list->RecordCount < $billing_discount_list->StopRecord) {
	$billing_discount_list->RecordCount++;
	if ($billing_discount_list->RecordCount >= $billing_discount_list->StartRecord) {
		$billing_discount_list->RowCount++;
		if ($billing_discount_list->isGridAdd() || $billing_discount_list->isGridEdit() || $billing_discount->isConfirm()) {
			$billing_discount_list->RowIndex++;
			$CurrentForm->Index = $billing_discount_list->RowIndex;
			if ($CurrentForm->hasValue($billing_discount_list->FormActionName) && ($billing_discount->isConfirm() || $billing_discount_list->EventCancelled))
				$billing_discount_list->RowAction = strval($CurrentForm->getValue($billing_discount_list->FormActionName));
			elseif ($billing_discount_list->isGridAdd())
				$billing_discount_list->RowAction = "insert";
			else
				$billing_discount_list->RowAction = "";
		}

		// Set up key count
		$billing_discount_list->KeyCount = $billing_discount_list->RowIndex;

		// Init row class and style
		$billing_discount->resetAttributes();
		$billing_discount->CssClass = "";
		if ($billing_discount_list->isGridAdd()) {
			$billing_discount_list->loadRowValues(); // Load default values
		} else {
			$billing_discount_list->loadRowValues($billing_discount_list->Recordset); // Load row values
		}
		$billing_discount->RowType = ROWTYPE_VIEW; // Render view
		if ($billing_discount_list->isGridAdd()) // Grid add
			$billing_discount->RowType = ROWTYPE_ADD; // Render add
		if ($billing_discount_list->isGridAdd() && $billing_discount->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$billing_discount_list->restoreCurrentRowFormValues($billing_discount_list->RowIndex); // Restore form values
		if ($billing_discount_list->isGridEdit()) { // Grid edit
			if ($billing_discount->EventCancelled)
				$billing_discount_list->restoreCurrentRowFormValues($billing_discount_list->RowIndex); // Restore form values
			if ($billing_discount_list->RowAction == "insert")
				$billing_discount->RowType = ROWTYPE_ADD; // Render add
			else
				$billing_discount->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($billing_discount_list->isGridEdit() && ($billing_discount->RowType == ROWTYPE_EDIT || $billing_discount->RowType == ROWTYPE_ADD) && $billing_discount->EventCancelled) // Update failed
			$billing_discount_list->restoreCurrentRowFormValues($billing_discount_list->RowIndex); // Restore form values
		if ($billing_discount->RowType == ROWTYPE_EDIT) // Edit row
			$billing_discount_list->EditRowCount++;

		// Set up row id / data-rowindex
		$billing_discount->RowAttrs->merge(["data-rowindex" => $billing_discount_list->RowCount, "id" => "r" . $billing_discount_list->RowCount . "_billing_discount", "data-rowtype" => $billing_discount->RowType]);

		// Render row
		$billing_discount_list->renderRow();

		// Render list options
		$billing_discount_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($billing_discount_list->RowAction != "delete" && $billing_discount_list->RowAction != "insertdelete" && !($billing_discount_list->RowAction == "insert" && $billing_discount->isConfirm() && $billing_discount_list->emptyRow())) {
?>
	<tr <?php echo $billing_discount->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_discount_list->ListOptions->render("body", "left", $billing_discount_list->RowCount);
?>
	<?php if ($billing_discount_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $billing_discount_list->id->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_id" class="form-group"></span>
<input type="hidden" data-table="billing_discount" data-field="x_id" name="o<?php echo $billing_discount_list->RowIndex ?>_id" id="o<?php echo $billing_discount_list->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_discount_list->id->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_id" class="form-group">
<span<?php echo $billing_discount_list->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($billing_discount_list->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_id" name="x<?php echo $billing_discount_list->RowIndex ?>_id" id="x<?php echo $billing_discount_list->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_discount_list->id->CurrentValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_id">
<span<?php echo $billing_discount_list->id->viewAttributes() ?>><?php echo $billing_discount_list->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Particulars->Visible) { // Particulars ?>
		<td data-name="Particulars" <?php echo $billing_discount_list->Particulars->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Particulars" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount_list->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Particulars->EditValue ?>"<?php echo $billing_discount_list->Particulars->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Particulars" name="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" value="<?php echo HtmlEncode($billing_discount_list->Particulars->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Particulars" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount_list->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Particulars->EditValue ?>"<?php echo $billing_discount_list->Particulars->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Particulars">
<span<?php echo $billing_discount_list->Particulars->viewAttributes() ?>><?php echo $billing_discount_list->Particulars->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure" <?php echo $billing_discount_list->Procedure->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Procedure" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Procedure->EditValue ?>"<?php echo $billing_discount_list->Procedure->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Procedure" name="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" value="<?php echo HtmlEncode($billing_discount_list->Procedure->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Procedure" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Procedure->EditValue ?>"<?php echo $billing_discount_list->Procedure->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Procedure">
<span<?php echo $billing_discount_list->Procedure->viewAttributes() ?>><?php echo $billing_discount_list->Procedure->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Pharmacy->Visible) { // Pharmacy ?>
		<td data-name="Pharmacy" <?php echo $billing_discount_list->Pharmacy->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Pharmacy" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Pharmacy->EditValue ?>"<?php echo $billing_discount_list->Pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Pharmacy" name="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" value="<?php echo HtmlEncode($billing_discount_list->Pharmacy->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Pharmacy" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Pharmacy->EditValue ?>"<?php echo $billing_discount_list->Pharmacy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Pharmacy">
<span<?php echo $billing_discount_list->Pharmacy->viewAttributes() ?>><?php echo $billing_discount_list->Pharmacy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Investication->Visible) { // Investication ?>
		<td data-name="Investication" <?php echo $billing_discount_list->Investication->cellAttributes() ?>>
<?php if ($billing_discount->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Investication" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x<?php echo $billing_discount_list->RowIndex ?>_Investication" id="x<?php echo $billing_discount_list->RowIndex ?>_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Investication->EditValue ?>"<?php echo $billing_discount_list->Investication->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Investication" name="o<?php echo $billing_discount_list->RowIndex ?>_Investication" id="o<?php echo $billing_discount_list->RowIndex ?>_Investication" value="<?php echo HtmlEncode($billing_discount_list->Investication->OldValue) ?>">
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Investication" class="form-group">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x<?php echo $billing_discount_list->RowIndex ?>_Investication" id="x<?php echo $billing_discount_list->RowIndex ?>_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Investication->EditValue ?>"<?php echo $billing_discount_list->Investication->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($billing_discount->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $billing_discount_list->RowCount ?>_billing_discount_Investication">
<span<?php echo $billing_discount_list->Investication->viewAttributes() ?>><?php echo $billing_discount_list->Investication->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_discount_list->ListOptions->render("body", "right", $billing_discount_list->RowCount);
?>
	</tr>
<?php if ($billing_discount->RowType == ROWTYPE_ADD || $billing_discount->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fbilling_discountlist", "load"], function() {
	fbilling_discountlist.updateLists(<?php echo $billing_discount_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$billing_discount_list->isGridAdd())
		if (!$billing_discount_list->Recordset->EOF)
			$billing_discount_list->Recordset->moveNext();
}
?>
<?php
	if ($billing_discount_list->isGridAdd() || $billing_discount_list->isGridEdit()) {
		$billing_discount_list->RowIndex = '$rowindex$';
		$billing_discount_list->loadRowValues();

		// Set row properties
		$billing_discount->resetAttributes();
		$billing_discount->RowAttrs->merge(["data-rowindex" => $billing_discount_list->RowIndex, "id" => "r0_billing_discount", "data-rowtype" => ROWTYPE_ADD]);
		$billing_discount->RowAttrs->appendClass("ew-template");
		$billing_discount->RowType = ROWTYPE_ADD;

		// Render row
		$billing_discount_list->renderRow();

		// Render list options
		$billing_discount_list->renderListOptions();
		$billing_discount_list->StartRowCount = 0;
?>
	<tr <?php echo $billing_discount->rowAttributes() ?>>
<?php

// Render list options (body, left)
$billing_discount_list->ListOptions->render("body", "left", $billing_discount_list->RowIndex);
?>
	<?php if ($billing_discount_list->id->Visible) { // id ?>
		<td data-name="id">
<span id="el$rowindex$_billing_discount_id" class="form-group billing_discount_id"></span>
<input type="hidden" data-table="billing_discount" data-field="x_id" name="o<?php echo $billing_discount_list->RowIndex ?>_id" id="o<?php echo $billing_discount_list->RowIndex ?>_id" value="<?php echo HtmlEncode($billing_discount_list->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Particulars->Visible) { // Particulars ?>
		<td data-name="Particulars">
<span id="el$rowindex$_billing_discount_Particulars" class="form-group billing_discount_Particulars">
<input type="text" data-table="billing_discount" data-field="x_Particulars" name="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="x<?php echo $billing_discount_list->RowIndex ?>_Particulars" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($billing_discount_list->Particulars->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Particulars->EditValue ?>"<?php echo $billing_discount_list->Particulars->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Particulars" name="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" id="o<?php echo $billing_discount_list->RowIndex ?>_Particulars" value="<?php echo HtmlEncode($billing_discount_list->Particulars->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure">
<span id="el$rowindex$_billing_discount_Procedure" class="form-group billing_discount_Procedure">
<input type="text" data-table="billing_discount" data-field="x_Procedure" name="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="x<?php echo $billing_discount_list->RowIndex ?>_Procedure" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Procedure->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Procedure->EditValue ?>"<?php echo $billing_discount_list->Procedure->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Procedure" name="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" id="o<?php echo $billing_discount_list->RowIndex ?>_Procedure" value="<?php echo HtmlEncode($billing_discount_list->Procedure->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Pharmacy->Visible) { // Pharmacy ?>
		<td data-name="Pharmacy">
<span id="el$rowindex$_billing_discount_Pharmacy" class="form-group billing_discount_Pharmacy">
<input type="text" data-table="billing_discount" data-field="x_Pharmacy" name="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="x<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Pharmacy->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Pharmacy->EditValue ?>"<?php echo $billing_discount_list->Pharmacy->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Pharmacy" name="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" id="o<?php echo $billing_discount_list->RowIndex ?>_Pharmacy" value="<?php echo HtmlEncode($billing_discount_list->Pharmacy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($billing_discount_list->Investication->Visible) { // Investication ?>
		<td data-name="Investication">
<span id="el$rowindex$_billing_discount_Investication" class="form-group billing_discount_Investication">
<input type="text" data-table="billing_discount" data-field="x_Investication" name="x<?php echo $billing_discount_list->RowIndex ?>_Investication" id="x<?php echo $billing_discount_list->RowIndex ?>_Investication" size="30" placeholder="<?php echo HtmlEncode($billing_discount_list->Investication->getPlaceHolder()) ?>" value="<?php echo $billing_discount_list->Investication->EditValue ?>"<?php echo $billing_discount_list->Investication->editAttributes() ?>>
</span>
<input type="hidden" data-table="billing_discount" data-field="x_Investication" name="o<?php echo $billing_discount_list->RowIndex ?>_Investication" id="o<?php echo $billing_discount_list->RowIndex ?>_Investication" value="<?php echo HtmlEncode($billing_discount_list->Investication->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$billing_discount_list->ListOptions->render("body", "right", $billing_discount_list->RowIndex);
?>
<script>
loadjs.ready(["fbilling_discountlist", "load"], function() {
	fbilling_discountlist.updateLists(<?php echo $billing_discount_list->RowIndex ?>);
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
<?php if ($billing_discount_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $billing_discount_list->FormKeyCountName ?>" id="<?php echo $billing_discount_list->FormKeyCountName ?>" value="<?php echo $billing_discount_list->KeyCount ?>">
<?php echo $billing_discount_list->MultiSelectKey ?>
<?php } ?>
<?php if ($billing_discount_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $billing_discount_list->FormKeyCountName ?>" id="<?php echo $billing_discount_list->FormKeyCountName ?>" value="<?php echo $billing_discount_list->KeyCount ?>">
<?php echo $billing_discount_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$billing_discount->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($billing_discount_list->Recordset)
	$billing_discount_list->Recordset->Close();
?>
<?php if (!$billing_discount_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$billing_discount_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $billing_discount_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $billing_discount_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($billing_discount_list->TotalRecords == 0 && !$billing_discount->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $billing_discount_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$billing_discount_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$billing_discount_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$billing_discount->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_billing_discount",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$billing_discount_list->terminate();
?>