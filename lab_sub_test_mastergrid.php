<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($lab_sub_test_master_grid))
	$lab_sub_test_master_grid = new lab_sub_test_master_grid();

// Run the page
$lab_sub_test_master_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sub_test_master_grid->Page_Render();
?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>

// Form object
var flab_sub_test_mastergrid = new ew.Form("flab_sub_test_mastergrid", "grid");
flab_sub_test_mastergrid.formKeyCountName = '<?php echo $lab_sub_test_master_grid->FormKeyCountName ?>';

// Validate form
flab_sub_test_mastergrid.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($lab_sub_test_master_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->id->caption(), $lab_sub_test_master->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_grid->TestMasterID->Required) { ?>
			elm = this.getElements("x" + infix + "_TestMasterID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->TestMasterID->caption(), $lab_sub_test_master->TestMasterID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestMasterID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_sub_test_master->TestMasterID->errorMessage()) ?>");
		<?php if ($lab_sub_test_master_grid->SubTestName->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTestName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->SubTestName->caption(), $lab_sub_test_master->SubTestName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_grid->TestOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->TestOrder->caption(), $lab_sub_test_master->TestOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_sub_test_master->TestOrder->errorMessage()) ?>");
		<?php if ($lab_sub_test_master_grid->NormalRange->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalRange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->NormalRange->caption(), $lab_sub_test_master->NormalRange->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_grid->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->Created->caption(), $lab_sub_test_master->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_grid->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->CreatedBy->caption(), $lab_sub_test_master->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_grid->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->Modified->caption(), $lab_sub_test_master->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_grid->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->ModifiedBy->caption(), $lab_sub_test_master->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
flab_sub_test_mastergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TestMasterID", false)) return false;
	if (ew.valueChanged(fobj, infix, "SubTestName", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestOrder", false)) return false;
	if (ew.valueChanged(fobj, infix, "NormalRange", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_sub_test_mastergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sub_test_mastergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_sub_test_mastergrid.lists["x_SubTestName"] = <?php echo $lab_sub_test_master_grid->SubTestName->Lookup->toClientList() ?>;
flab_sub_test_mastergrid.lists["x_SubTestName"].options = <?php echo JsonEncode($lab_sub_test_master_grid->SubTestName->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$lab_sub_test_master_grid->renderOtherOptions();
?>
<?php $lab_sub_test_master_grid->showPageHeader(); ?>
<?php
$lab_sub_test_master_grid->showMessage();
?>
<?php if ($lab_sub_test_master_grid->TotalRecs > 0 || $lab_sub_test_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_sub_test_master_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_sub_test_master">
<?php if ($lab_sub_test_master_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $lab_sub_test_master_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="flab_sub_test_mastergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_lab_sub_test_master" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_lab_sub_test_mastergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_sub_test_master_grid->RowType = ROWTYPE_HEADER;

// Render list options
$lab_sub_test_master_grid->renderListOptions();

// Render list options (header, left)
$lab_sub_test_master_grid->ListOptions->render("header", "left");
?>
<?php if ($lab_sub_test_master->id->Visible) { // id ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><div id="elh_lab_sub_test_master_id" class="lab_sub_test_master_id"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_sub_test_master->id->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_id" class="lab_sub_test_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->TestMasterID) == "") { ?>
		<th data-name="TestMasterID" class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><div id="elh_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestMasterID" class="<?php echo $lab_sub_test_master->TestMasterID->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestMasterID->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->TestMasterID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->TestMasterID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->SubTestName) == "") { ?>
		<th data-name="SubTestName" class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><div id="elh_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->SubTestName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTestName" class="<?php echo $lab_sub_test_master->SubTestName->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->SubTestName->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->SubTestName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->SubTestName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->TestOrder) == "") { ?>
		<th data-name="TestOrder" class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><div id="elh_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestOrder" class="<?php echo $lab_sub_test_master->TestOrder->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->TestOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->TestOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->TestOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->NormalRange) == "") { ?>
		<th data-name="NormalRange" class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><div id="elh_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->NormalRange->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalRange" class="<?php echo $lab_sub_test_master->NormalRange->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->NormalRange->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->NormalRange->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->NormalRange->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><div id="elh_lab_sub_test_master_Created" class="lab_sub_test_master_Created"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $lab_sub_test_master->Created->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_Created" class="lab_sub_test_master_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->Created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->Created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->CreatedBy) == "") { ?>
		<th data-name="CreatedBy" class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><div id="elh_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedBy" class="<?php echo $lab_sub_test_master->CreatedBy->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->CreatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->CreatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->Modified) == "") { ?>
		<th data-name="Modified" class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><div id="elh_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->Modified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Modified" class="<?php echo $lab_sub_test_master->Modified->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->Modified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->Modified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
	<?php if ($lab_sub_test_master->sortUrl($lab_sub_test_master->ModifiedBy) == "") { ?>
		<th data-name="ModifiedBy" class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><div id="elh_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy"><div class="ew-table-header-caption"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedBy" class="<?php echo $lab_sub_test_master->ModifiedBy->headerCellClass() ?>"><div><div id="elh_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_sub_test_master->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_sub_test_master->ModifiedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_sub_test_master->ModifiedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_sub_test_master_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$lab_sub_test_master_grid->StartRec = 1;
$lab_sub_test_master_grid->StopRec = $lab_sub_test_master_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $lab_sub_test_master_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_sub_test_master_grid->FormKeyCountName) && ($lab_sub_test_master->isGridAdd() || $lab_sub_test_master->isGridEdit() || $lab_sub_test_master->isConfirm())) {
		$lab_sub_test_master_grid->KeyCount = $CurrentForm->getValue($lab_sub_test_master_grid->FormKeyCountName);
		$lab_sub_test_master_grid->StopRec = $lab_sub_test_master_grid->StartRec + $lab_sub_test_master_grid->KeyCount - 1;
	}
}
$lab_sub_test_master_grid->RecCnt = $lab_sub_test_master_grid->StartRec - 1;
if ($lab_sub_test_master_grid->Recordset && !$lab_sub_test_master_grid->Recordset->EOF) {
	$lab_sub_test_master_grid->Recordset->moveFirst();
	$selectLimit = $lab_sub_test_master_grid->UseSelectLimit;
	if (!$selectLimit && $lab_sub_test_master_grid->StartRec > 1)
		$lab_sub_test_master_grid->Recordset->move($lab_sub_test_master_grid->StartRec - 1);
} elseif (!$lab_sub_test_master->AllowAddDeleteRow && $lab_sub_test_master_grid->StopRec == 0) {
	$lab_sub_test_master_grid->StopRec = $lab_sub_test_master->GridAddRowCount;
}

// Initialize aggregate
$lab_sub_test_master->RowType = ROWTYPE_AGGREGATEINIT;
$lab_sub_test_master->resetAttributes();
$lab_sub_test_master_grid->renderRow();
if ($lab_sub_test_master->isGridAdd())
	$lab_sub_test_master_grid->RowIndex = 0;
if ($lab_sub_test_master->isGridEdit())
	$lab_sub_test_master_grid->RowIndex = 0;
while ($lab_sub_test_master_grid->RecCnt < $lab_sub_test_master_grid->StopRec) {
	$lab_sub_test_master_grid->RecCnt++;
	if ($lab_sub_test_master_grid->RecCnt >= $lab_sub_test_master_grid->StartRec) {
		$lab_sub_test_master_grid->RowCnt++;
		if ($lab_sub_test_master->isGridAdd() || $lab_sub_test_master->isGridEdit() || $lab_sub_test_master->isConfirm()) {
			$lab_sub_test_master_grid->RowIndex++;
			$CurrentForm->Index = $lab_sub_test_master_grid->RowIndex;
			if ($CurrentForm->hasValue($lab_sub_test_master_grid->FormActionName) && $lab_sub_test_master_grid->EventCancelled)
				$lab_sub_test_master_grid->RowAction = strval($CurrentForm->getValue($lab_sub_test_master_grid->FormActionName));
			elseif ($lab_sub_test_master->isGridAdd())
				$lab_sub_test_master_grid->RowAction = "insert";
			else
				$lab_sub_test_master_grid->RowAction = "";
		}

		// Set up key count
		$lab_sub_test_master_grid->KeyCount = $lab_sub_test_master_grid->RowIndex;

		// Init row class and style
		$lab_sub_test_master->resetAttributes();
		$lab_sub_test_master->CssClass = "";
		if ($lab_sub_test_master->isGridAdd()) {
			if ($lab_sub_test_master->CurrentMode == "copy") {
				$lab_sub_test_master_grid->loadRowValues($lab_sub_test_master_grid->Recordset); // Load row values
				$lab_sub_test_master_grid->setRecordKey($lab_sub_test_master_grid->RowOldKey, $lab_sub_test_master_grid->Recordset); // Set old record key
			} else {
				$lab_sub_test_master_grid->loadRowValues(); // Load default values
				$lab_sub_test_master_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$lab_sub_test_master_grid->loadRowValues($lab_sub_test_master_grid->Recordset); // Load row values
		}
		$lab_sub_test_master->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_sub_test_master->isGridAdd()) // Grid add
			$lab_sub_test_master->RowType = ROWTYPE_ADD; // Render add
		if ($lab_sub_test_master->isGridAdd() && $lab_sub_test_master->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_sub_test_master_grid->restoreCurrentRowFormValues($lab_sub_test_master_grid->RowIndex); // Restore form values
		if ($lab_sub_test_master->isGridEdit()) { // Grid edit
			if ($lab_sub_test_master->EventCancelled)
				$lab_sub_test_master_grid->restoreCurrentRowFormValues($lab_sub_test_master_grid->RowIndex); // Restore form values
			if ($lab_sub_test_master_grid->RowAction == "insert")
				$lab_sub_test_master->RowType = ROWTYPE_ADD; // Render add
			else
				$lab_sub_test_master->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($lab_sub_test_master->isGridEdit() && ($lab_sub_test_master->RowType == ROWTYPE_EDIT || $lab_sub_test_master->RowType == ROWTYPE_ADD) && $lab_sub_test_master->EventCancelled) // Update failed
			$lab_sub_test_master_grid->restoreCurrentRowFormValues($lab_sub_test_master_grid->RowIndex); // Restore form values
		if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) // Edit row
			$lab_sub_test_master_grid->EditRowCnt++;
		if ($lab_sub_test_master->isConfirm()) // Confirm row
			$lab_sub_test_master_grid->restoreCurrentRowFormValues($lab_sub_test_master_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$lab_sub_test_master->RowAttrs = array_merge($lab_sub_test_master->RowAttrs, array('data-rowindex'=>$lab_sub_test_master_grid->RowCnt, 'id'=>'r' . $lab_sub_test_master_grid->RowCnt . '_lab_sub_test_master', 'data-rowtype'=>$lab_sub_test_master->RowType));

		// Render row
		$lab_sub_test_master_grid->renderRow();

		// Render list options
		$lab_sub_test_master_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_sub_test_master_grid->RowAction <> "delete" && $lab_sub_test_master_grid->RowAction <> "insertdelete" && !($lab_sub_test_master_grid->RowAction == "insert" && $lab_sub_test_master->isConfirm() && $lab_sub_test_master_grid->emptyRow())) {
?>
	<tr<?php echo $lab_sub_test_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sub_test_master_grid->ListOptions->render("body", "left", $lab_sub_test_master_grid->RowCnt);
?>
	<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_sub_test_master->id->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_id" class="form-group lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->CurrentValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_id" class="lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<?php echo $lab_sub_test_master->id->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<td data-name="TestMasterID"<?php echo $lab_sub_test_master->TestMasterID->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestMasterID" class="lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestMasterID->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<td data-name="SubTestName"<?php echo $lab_sub_test_master->SubTestName->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x" . $lab_sub_test_master_grid->RowIndex . "_SubTestName") ?>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x" . $lab_sub_test_master_grid->RowIndex . "_SubTestName") ?>
</span>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_SubTestName" class="lab_sub_test_master_SubTestName">
<span<?php echo $lab_sub_test_master->SubTestName->viewAttributes() ?>>
<?php echo $lab_sub_test_master->SubTestName->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder"<?php echo $lab_sub_test_master->TestOrder->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_TestOrder" class="lab_sub_test_master_TestOrder">
<span<?php echo $lab_sub_test_master->TestOrder->viewAttributes() ?>>
<?php echo $lab_sub_test_master->TestOrder->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange"<?php echo $lab_sub_test_master->NormalRange->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_NormalRange" class="lab_sub_test_master_NormalRange">
<span<?php echo $lab_sub_test_master->NormalRange->viewAttributes() ?>>
<?php echo $lab_sub_test_master->NormalRange->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<td data-name="Created"<?php echo $lab_sub_test_master->Created->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_Created" class="lab_sub_test_master_Created">
<span<?php echo $lab_sub_test_master->Created->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Created->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy"<?php echo $lab_sub_test_master->CreatedBy->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_CreatedBy" class="lab_sub_test_master_CreatedBy">
<span<?php echo $lab_sub_test_master->CreatedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->CreatedBy->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<td data-name="Modified"<?php echo $lab_sub_test_master->Modified->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_Modified" class="lab_sub_test_master_Modified">
<span<?php echo $lab_sub_test_master->Modified->viewAttributes() ?>>
<?php echo $lab_sub_test_master->Modified->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy"<?php echo $lab_sub_test_master->ModifiedBy->cellAttributes() ?>>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_sub_test_master_grid->RowCnt ?>_lab_sub_test_master_ModifiedBy" class="lab_sub_test_master_ModifiedBy">
<span<?php echo $lab_sub_test_master->ModifiedBy->viewAttributes() ?>>
<?php echo $lab_sub_test_master->ModifiedBy->getViewValue() ?></span>
</span>
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="flab_sub_test_mastergrid$x<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="flab_sub_test_mastergrid$o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_sub_test_master_grid->ListOptions->render("body", "right", $lab_sub_test_master_grid->RowCnt);
?>
	</tr>
<?php if ($lab_sub_test_master->RowType == ROWTYPE_ADD || $lab_sub_test_master->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_sub_test_mastergrid.updateLists(<?php echo $lab_sub_test_master_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_sub_test_master->isGridAdd() || $lab_sub_test_master->CurrentMode == "copy")
		if (!$lab_sub_test_master_grid->Recordset->EOF)
			$lab_sub_test_master_grid->Recordset->moveNext();
}
?>
<?php
	if ($lab_sub_test_master->CurrentMode == "add" || $lab_sub_test_master->CurrentMode == "copy" || $lab_sub_test_master->CurrentMode == "edit") {
		$lab_sub_test_master_grid->RowIndex = '$rowindex$';
		$lab_sub_test_master_grid->loadRowValues();

		// Set row properties
		$lab_sub_test_master->resetAttributes();
		$lab_sub_test_master->RowAttrs = array_merge($lab_sub_test_master->RowAttrs, array('data-rowindex'=>$lab_sub_test_master_grid->RowIndex, 'id'=>'r0_lab_sub_test_master', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_sub_test_master->RowAttrs["class"], "ew-template");
		$lab_sub_test_master->RowType = ROWTYPE_ADD;

		// Render row
		$lab_sub_test_master_grid->renderRow();

		// Render list options
		$lab_sub_test_master_grid->renderListOptions();
		$lab_sub_test_master_grid->StartRowCnt = 0;
?>
	<tr<?php echo $lab_sub_test_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_sub_test_master_grid->ListOptions->render("body", "left", $lab_sub_test_master_grid->RowIndex);
?>
	<?php if ($lab_sub_test_master->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_id" class="form-group lab_sub_test_master_id">
<span<?php echo $lab_sub_test_master->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_id" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($lab_sub_test_master->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
		<td data-name="TestMasterID">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_TestMasterID" class="form-group lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
		<td data-name="SubTestName">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<span id="el$rowindex$_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x" . $lab_sub_test_master_grid->RowIndex . "_SubTestName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_SubTestName" class="form-group lab_sub_test_master_SubTestName">
<span<?php echo $lab_sub_test_master->SubTestName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->SubTestName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_SubTestName" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_SubTestName" value="<?php echo HtmlEncode($lab_sub_test_master->SubTestName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
		<td data-name="TestOrder">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<span id="el$rowindex$_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_TestOrder" class="form-group lab_sub_test_master_TestOrder">
<span<?php echo $lab_sub_test_master->TestOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestOrder->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_TestOrder" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_TestOrder" value="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
		<td data-name="NormalRange">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<span id="el$rowindex$_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_NormalRange" class="form-group lab_sub_test_master_NormalRange">
<span<?php echo $lab_sub_test_master->NormalRange->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->NormalRange->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_NormalRange" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_NormalRange" value="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Created->Visible) { // Created ?>
		<td data-name="Created">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_Created" class="form-group lab_sub_test_master_Created">
<span<?php echo $lab_sub_test_master->Created->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->Created->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Created" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Created" value="<?php echo HtmlEncode($lab_sub_test_master->Created->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->CreatedBy->Visible) { // CreatedBy ?>
		<td data-name="CreatedBy">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_CreatedBy" class="form-group lab_sub_test_master_CreatedBy">
<span<?php echo $lab_sub_test_master->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->CreatedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_CreatedBy" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_CreatedBy" value="<?php echo HtmlEncode($lab_sub_test_master->CreatedBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->Modified->Visible) { // Modified ?>
		<td data-name="Modified">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_Modified" class="form-group lab_sub_test_master_Modified">
<span<?php echo $lab_sub_test_master->Modified->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->Modified->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_Modified" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_Modified" value="<?php echo HtmlEncode($lab_sub_test_master->Modified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_sub_test_master->ModifiedBy->Visible) { // ModifiedBy ?>
		<td data-name="ModifiedBy">
<?php if (!$lab_sub_test_master->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_lab_sub_test_master_ModifiedBy" class="form-group lab_sub_test_master_ModifiedBy">
<span<?php echo $lab_sub_test_master->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->ModifiedBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="x<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_sub_test_master" data-field="x_ModifiedBy" name="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" id="o<?php echo $lab_sub_test_master_grid->RowIndex ?>_ModifiedBy" value="<?php echo HtmlEncode($lab_sub_test_master->ModifiedBy->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_sub_test_master_grid->ListOptions->render("body", "right", $lab_sub_test_master_grid->RowIndex);
?>
<script>
flab_sub_test_mastergrid.updateLists(<?php echo $lab_sub_test_master_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($lab_sub_test_master->CurrentMode == "add" || $lab_sub_test_master->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $lab_sub_test_master_grid->FormKeyCountName ?>" id="<?php echo $lab_sub_test_master_grid->FormKeyCountName ?>" value="<?php echo $lab_sub_test_master_grid->KeyCount ?>">
<?php echo $lab_sub_test_master_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_sub_test_master->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $lab_sub_test_master_grid->FormKeyCountName ?>" id="<?php echo $lab_sub_test_master_grid->FormKeyCountName ?>" value="<?php echo $lab_sub_test_master_grid->KeyCount ?>">
<?php echo $lab_sub_test_master_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($lab_sub_test_master->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="flab_sub_test_mastergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($lab_sub_test_master_grid->Recordset)
	$lab_sub_test_master_grid->Recordset->Close();
?>
</div>
<?php if ($lab_sub_test_master_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $lab_sub_test_master_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_sub_test_master_grid->TotalRecs == 0 && !$lab_sub_test_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_sub_test_master_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_sub_test_master_grid->terminate();
?>
<?php if (!$lab_sub_test_master->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_sub_test_master", "95%", "");
</script>
<?php } ?>