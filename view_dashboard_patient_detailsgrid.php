<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_dashboard_patient_details_grid))
	$view_dashboard_patient_details_grid = new view_dashboard_patient_details_grid();

// Run the page
$view_dashboard_patient_details_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_patient_details_grid->Page_Render();
?>
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<script>

// Form object
var fview_dashboard_patient_detailsgrid = new ew.Form("fview_dashboard_patient_detailsgrid", "grid");
fview_dashboard_patient_detailsgrid.formKeyCountName = '<?php echo $view_dashboard_patient_details_grid->FormKeyCountName ?>';

// Validate form
fview_dashboard_patient_detailsgrid.validate = function() {
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
		<?php if ($view_dashboard_patient_details_grid->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->PatientID->caption(), $view_dashboard_patient_details->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->first_name->caption(), $view_dashboard_patient_details->first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->mobile_no->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->mobile_no->caption(), $view_dashboard_patient_details->mobile_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->ReferA4TreatingConsultant->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->ReferA4TreatingConsultant->caption(), $view_dashboard_patient_details->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->Patient_Language->Required) { ?>
			elm = this.getElements("x" + infix + "_Patient_Language");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->Patient_Language->caption(), $view_dashboard_patient_details->Patient_Language->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->WhereDidYouHear->caption(), $view_dashboard_patient_details->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->HospID->caption(), $view_dashboard_patient_details->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_dashboard_patient_details_grid->createdDate->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_patient_details->createdDate->caption(), $view_dashboard_patient_details->createdDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_dashboard_patient_details->createdDate->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_dashboard_patient_detailsgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PatientID", false)) return false;
	if (ew.valueChanged(fobj, infix, "first_name", false)) return false;
	if (ew.valueChanged(fobj, infix, "mobile_no", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReferA4TreatingConsultant", false)) return false;
	if (ew.valueChanged(fobj, infix, "Patient_Language", false)) return false;
	if (ew.valueChanged(fobj, infix, "WhereDidYouHear", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	if (ew.valueChanged(fobj, infix, "createdDate", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_dashboard_patient_detailsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_patient_detailsgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_patient_detailsgrid.lists["x_HospID"] = <?php echo $view_dashboard_patient_details_grid->HospID->Lookup->toClientList() ?>;
fview_dashboard_patient_detailsgrid.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_patient_details_grid->HospID->lookupOptions()) ?>;
fview_dashboard_patient_detailsgrid.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_dashboard_patient_details_grid->renderOtherOptions();
?>
<?php $view_dashboard_patient_details_grid->showPageHeader(); ?>
<?php
$view_dashboard_patient_details_grid->showMessage();
?>
<?php if ($view_dashboard_patient_details_grid->TotalRecs > 0 || $view_dashboard_patient_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_patient_details_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_patient_details">
<?php if ($view_dashboard_patient_details_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_dashboard_patient_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_patient_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_patient_details" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_patient_detailsgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_patient_details_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_patient_details_grid->renderListOptions();

// Render list options (header, left)
$view_dashboard_patient_details_grid->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_patient_details->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_patient_details->PatientID->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_dashboard_patient_details->first_name->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_dashboard_patient_details->first_name->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->first_name->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->first_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->first_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_dashboard_patient_details->mobile_no->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_dashboard_patient_details->mobile_no->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->mobile_no->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $view_dashboard_patient_details->Patient_Language->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->Patient_Language->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $view_dashboard_patient_details->Patient_Language->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->Patient_Language->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->Patient_Language->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->Patient_Language->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_dashboard_patient_details->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_dashboard_patient_details->WhereDidYouHear->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_patient_details->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_patient_details->HospID->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_patient_details->sortUrl($view_dashboard_patient_details->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_patient_details->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_patient_details->createdDate->headerCellClass() ?>"><div><div id="elh_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_patient_details_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_dashboard_patient_details_grid->StartRec = 1;
$view_dashboard_patient_details_grid->StopRec = $view_dashboard_patient_details_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_dashboard_patient_details_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_dashboard_patient_details_grid->FormKeyCountName) && ($view_dashboard_patient_details->isGridAdd() || $view_dashboard_patient_details->isGridEdit() || $view_dashboard_patient_details->isConfirm())) {
		$view_dashboard_patient_details_grid->KeyCount = $CurrentForm->getValue($view_dashboard_patient_details_grid->FormKeyCountName);
		$view_dashboard_patient_details_grid->StopRec = $view_dashboard_patient_details_grid->StartRec + $view_dashboard_patient_details_grid->KeyCount - 1;
	}
}
$view_dashboard_patient_details_grid->RecCnt = $view_dashboard_patient_details_grid->StartRec - 1;
if ($view_dashboard_patient_details_grid->Recordset && !$view_dashboard_patient_details_grid->Recordset->EOF) {
	$view_dashboard_patient_details_grid->Recordset->moveFirst();
	$selectLimit = $view_dashboard_patient_details_grid->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_patient_details_grid->StartRec > 1)
		$view_dashboard_patient_details_grid->Recordset->move($view_dashboard_patient_details_grid->StartRec - 1);
} elseif (!$view_dashboard_patient_details->AllowAddDeleteRow && $view_dashboard_patient_details_grid->StopRec == 0) {
	$view_dashboard_patient_details_grid->StopRec = $view_dashboard_patient_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_patient_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_patient_details->resetAttributes();
$view_dashboard_patient_details_grid->renderRow();
if ($view_dashboard_patient_details->isGridAdd())
	$view_dashboard_patient_details_grid->RowIndex = 0;
if ($view_dashboard_patient_details->isGridEdit())
	$view_dashboard_patient_details_grid->RowIndex = 0;
while ($view_dashboard_patient_details_grid->RecCnt < $view_dashboard_patient_details_grid->StopRec) {
	$view_dashboard_patient_details_grid->RecCnt++;
	if ($view_dashboard_patient_details_grid->RecCnt >= $view_dashboard_patient_details_grid->StartRec) {
		$view_dashboard_patient_details_grid->RowCnt++;
		if ($view_dashboard_patient_details->isGridAdd() || $view_dashboard_patient_details->isGridEdit() || $view_dashboard_patient_details->isConfirm()) {
			$view_dashboard_patient_details_grid->RowIndex++;
			$CurrentForm->Index = $view_dashboard_patient_details_grid->RowIndex;
			if ($CurrentForm->hasValue($view_dashboard_patient_details_grid->FormActionName) && $view_dashboard_patient_details_grid->EventCancelled)
				$view_dashboard_patient_details_grid->RowAction = strval($CurrentForm->getValue($view_dashboard_patient_details_grid->FormActionName));
			elseif ($view_dashboard_patient_details->isGridAdd())
				$view_dashboard_patient_details_grid->RowAction = "insert";
			else
				$view_dashboard_patient_details_grid->RowAction = "";
		}

		// Set up key count
		$view_dashboard_patient_details_grid->KeyCount = $view_dashboard_patient_details_grid->RowIndex;

		// Init row class and style
		$view_dashboard_patient_details->resetAttributes();
		$view_dashboard_patient_details->CssClass = "";
		if ($view_dashboard_patient_details->isGridAdd()) {
			if ($view_dashboard_patient_details->CurrentMode == "copy") {
				$view_dashboard_patient_details_grid->loadRowValues($view_dashboard_patient_details_grid->Recordset); // Load row values
				$view_dashboard_patient_details_grid->setRecordKey($view_dashboard_patient_details_grid->RowOldKey, $view_dashboard_patient_details_grid->Recordset); // Set old record key
			} else {
				$view_dashboard_patient_details_grid->loadRowValues(); // Load default values
				$view_dashboard_patient_details_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_dashboard_patient_details_grid->loadRowValues($view_dashboard_patient_details_grid->Recordset); // Load row values
		}
		$view_dashboard_patient_details->RowType = ROWTYPE_VIEW; // Render view
		if ($view_dashboard_patient_details->isGridAdd()) // Grid add
			$view_dashboard_patient_details->RowType = ROWTYPE_ADD; // Render add
		if ($view_dashboard_patient_details->isGridAdd() && $view_dashboard_patient_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_dashboard_patient_details_grid->restoreCurrentRowFormValues($view_dashboard_patient_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_patient_details->isGridEdit()) { // Grid edit
			if ($view_dashboard_patient_details->EventCancelled)
				$view_dashboard_patient_details_grid->restoreCurrentRowFormValues($view_dashboard_patient_details_grid->RowIndex); // Restore form values
			if ($view_dashboard_patient_details_grid->RowAction == "insert")
				$view_dashboard_patient_details->RowType = ROWTYPE_ADD; // Render add
			else
				$view_dashboard_patient_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_dashboard_patient_details->isGridEdit() && ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT || $view_dashboard_patient_details->RowType == ROWTYPE_ADD) && $view_dashboard_patient_details->EventCancelled) // Update failed
			$view_dashboard_patient_details_grid->restoreCurrentRowFormValues($view_dashboard_patient_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) // Edit row
			$view_dashboard_patient_details_grid->EditRowCnt++;
		if ($view_dashboard_patient_details->isConfirm()) // Confirm row
			$view_dashboard_patient_details_grid->restoreCurrentRowFormValues($view_dashboard_patient_details_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_dashboard_patient_details->RowAttrs = array_merge($view_dashboard_patient_details->RowAttrs, array('data-rowindex'=>$view_dashboard_patient_details_grid->RowCnt, 'id'=>'r' . $view_dashboard_patient_details_grid->RowCnt . '_view_dashboard_patient_details', 'data-rowtype'=>$view_dashboard_patient_details->RowType));

		// Render row
		$view_dashboard_patient_details_grid->renderRow();

		// Render list options
		$view_dashboard_patient_details_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_dashboard_patient_details_grid->RowAction <> "delete" && $view_dashboard_patient_details_grid->RowAction <> "insertdelete" && !($view_dashboard_patient_details_grid->RowAction == "insert" && $view_dashboard_patient_details->isConfirm() && $view_dashboard_patient_details_grid->emptyRow())) {
?>
	<tr<?php echo $view_dashboard_patient_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_patient_details_grid->ListOptions->render("body", "left", $view_dashboard_patient_details_grid->RowCnt);
?>
	<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_dashboard_patient_details->PatientID->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_PatientID" class="form-group view_dashboard_patient_details_PatientID">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->PatientID->EditValue ?>"<?php echo $view_dashboard_patient_details->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_PatientID" class="form-group view_dashboard_patient_details_PatientID">
<span<?php echo $view_dashboard_patient_details->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->PatientID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID">
<span<?php echo $view_dashboard_patient_details->PatientID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->PatientID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
		<td data-name="first_name"<?php echo $view_dashboard_patient_details->first_name->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_first_name" class="form-group view_dashboard_patient_details_first_name">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->first_name->EditValue ?>"<?php echo $view_dashboard_patient_details->first_name->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_first_name" class="form-group view_dashboard_patient_details_first_name">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->first_name->EditValue ?>"<?php echo $view_dashboard_patient_details->first_name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name">
<span<?php echo $view_dashboard_patient_details->first_name->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->first_name->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_dashboard_patient_details->mobile_no->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_mobile_no" class="form-group view_dashboard_patient_details_mobile_no">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->mobile_no->EditValue ?>"<?php echo $view_dashboard_patient_details->mobile_no->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_mobile_no" class="form-group view_dashboard_patient_details_mobile_no">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->mobile_no->EditValue ?>"<?php echo $view_dashboard_patient_details->mobile_no->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no">
<span<?php echo $view_dashboard_patient_details->mobile_no->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->mobile_no->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group view_dashboard_patient_details_ReferA4TreatingConsultant">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group view_dashboard_patient_details_ReferA4TreatingConsultant">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant">
<span<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language"<?php echo $view_dashboard_patient_details->Patient_Language->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_Patient_Language" class="form-group view_dashboard_patient_details_Patient_Language">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->Patient_Language->EditValue ?>"<?php echo $view_dashboard_patient_details->Patient_Language->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_Patient_Language" class="form-group view_dashboard_patient_details_Patient_Language">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->Patient_Language->EditValue ?>"<?php echo $view_dashboard_patient_details->Patient_Language->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language">
<span<?php echo $view_dashboard_patient_details->Patient_Language->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->Patient_Language->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $view_dashboard_patient_details->WhereDidYouHear->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->WhereDidYouHear->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->WhereDidYouHear->EditValue ?>"<?php echo $view_dashboard_patient_details->WhereDidYouHear->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->WhereDidYouHear->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->WhereDidYouHear->EditValue ?>"<?php echo $view_dashboard_patient_details->WhereDidYouHear->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->WhereDidYouHear->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_dashboard_patient_details->HospID->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_HospID" class="form-group view_dashboard_patient_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_patient_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_patient_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_patient_details_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_patient_details->HospID->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_patient_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_patient_details->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_patient_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_patient_details->HospID->Lookup->getParamTag("p_x" . $view_dashboard_patient_details_grid->RowIndex . "_HospID") ?>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_HospID" class="form-group view_dashboard_patient_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_patient_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_patient_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_patient_details_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_patient_details->HospID->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_patient_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_patient_details->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_patient_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_patient_details->HospID->Lookup->getParamTag("p_x" . $view_dashboard_patient_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID">
<span<?php echo $view_dashboard_patient_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_dashboard_patient_details->createdDate->cellAttributes() ?>>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_patient_details->createdDate->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_patient_details->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->createdDate->EditValue ?>"<?php echo $view_dashboard_patient_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_details->createdDate->ReadOnly && !$view_dashboard_patient_details->createdDate->Disabled && !isset($view_dashboard_patient_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_patient_detailsgrid", "x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_patient_details->createdDate->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_patient_details->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->createdDate->EditValue ?>"<?php echo $view_dashboard_patient_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_details->createdDate->ReadOnly && !$view_dashboard_patient_details->createdDate->Disabled && !isset($view_dashboard_patient_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_patient_detailsgrid", "x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_patient_details_grid->RowCnt ?>_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate">
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->createdDate->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="fview_dashboard_patient_detailsgrid$x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="fview_dashboard_patient_detailsgrid$o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_patient_details_grid->ListOptions->render("body", "right", $view_dashboard_patient_details_grid->RowCnt);
?>
	</tr>
<?php if ($view_dashboard_patient_details->RowType == ROWTYPE_ADD || $view_dashboard_patient_details->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_dashboard_patient_detailsgrid.updateLists(<?php echo $view_dashboard_patient_details_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_dashboard_patient_details->isGridAdd() || $view_dashboard_patient_details->CurrentMode == "copy")
		if (!$view_dashboard_patient_details_grid->Recordset->EOF)
			$view_dashboard_patient_details_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_dashboard_patient_details->CurrentMode == "add" || $view_dashboard_patient_details->CurrentMode == "copy" || $view_dashboard_patient_details->CurrentMode == "edit") {
		$view_dashboard_patient_details_grid->RowIndex = '$rowindex$';
		$view_dashboard_patient_details_grid->loadRowValues();

		// Set row properties
		$view_dashboard_patient_details->resetAttributes();
		$view_dashboard_patient_details->RowAttrs = array_merge($view_dashboard_patient_details->RowAttrs, array('data-rowindex'=>$view_dashboard_patient_details_grid->RowIndex, 'id'=>'r0_view_dashboard_patient_details', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_dashboard_patient_details->RowAttrs["class"], "ew-template");
		$view_dashboard_patient_details->RowType = ROWTYPE_ADD;

		// Render row
		$view_dashboard_patient_details_grid->renderRow();

		// Render list options
		$view_dashboard_patient_details_grid->renderListOptions();
		$view_dashboard_patient_details_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_dashboard_patient_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_patient_details_grid->ListOptions->render("body", "left", $view_dashboard_patient_details_grid->RowIndex);
?>
	<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_PatientID" class="form-group view_dashboard_patient_details_PatientID">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->PatientID->EditValue ?>"<?php echo $view_dashboard_patient_details->PatientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_PatientID" class="form-group view_dashboard_patient_details_PatientID">
<span<?php echo $view_dashboard_patient_details->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->PatientID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_patient_details->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
		<td data-name="first_name">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_first_name" class="form-group view_dashboard_patient_details_first_name">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->first_name->EditValue ?>"<?php echo $view_dashboard_patient_details->first_name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_first_name" class="form-group view_dashboard_patient_details_first_name">
<span<?php echo $view_dashboard_patient_details->first_name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->first_name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_first_name" value="<?php echo HtmlEncode($view_dashboard_patient_details->first_name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_mobile_no" class="form-group view_dashboard_patient_details_mobile_no">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->mobile_no->EditValue ?>"<?php echo $view_dashboard_patient_details->mobile_no->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_mobile_no" class="form-group view_dashboard_patient_details_mobile_no">
<span<?php echo $view_dashboard_patient_details->mobile_no->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->mobile_no->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_mobile_no" value="<?php echo HtmlEncode($view_dashboard_patient_details->mobile_no->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group view_dashboard_patient_details_ReferA4TreatingConsultant">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group view_dashboard_patient_details_ReferA4TreatingConsultant">
<span<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->ReferA4TreatingConsultant->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_dashboard_patient_details->ReferA4TreatingConsultant->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_Patient_Language" class="form-group view_dashboard_patient_details_Patient_Language">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->Patient_Language->EditValue ?>"<?php echo $view_dashboard_patient_details->Patient_Language->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_Patient_Language" class="form-group view_dashboard_patient_details_Patient_Language">
<span<?php echo $view_dashboard_patient_details->Patient_Language->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->Patient_Language->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_Patient_Language" value="<?php echo HtmlEncode($view_dashboard_patient_details->Patient_Language->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->WhereDidYouHear->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->WhereDidYouHear->EditValue ?>"<?php echo $view_dashboard_patient_details->WhereDidYouHear->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->WhereDidYouHear->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($view_dashboard_patient_details->WhereDidYouHear->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_HospID" class="form-group view_dashboard_patient_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_patient_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_patient_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" class="text-nowrap" style="z-index: <?php echo (9000 - $view_dashboard_patient_details_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_patient_details->HospID->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_patient_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_patient_details->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_patient_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_patient_details->HospID->Lookup->getParamTag("p_x" . $view_dashboard_patient_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_HospID" class="form-group view_dashboard_patient_details_HospID">
<span<?php echo $view_dashboard_patient_details->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_patient_details->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate">
<?php if (!$view_dashboard_patient_details->isConfirm()) { ?>
<?php if ($view_dashboard_patient_details->createdDate->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_patient_details->createdDate->CurrentValue, 7)) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<input type="text" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_details->createdDate->EditValue ?>"<?php echo $view_dashboard_patient_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_details->createdDate->ReadOnly && !$view_dashboard_patient_details->createdDate->Disabled && !isset($view_dashboard_patient_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_patient_detailsgrid", "x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_dashboard_patient_details->createdDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="x<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" name="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" id="o<?php echo $view_dashboard_patient_details_grid->RowIndex ?>_createdDate" value="<?php echo HtmlEncode($view_dashboard_patient_details->createdDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_patient_details_grid->ListOptions->render("body", "right", $view_dashboard_patient_details_grid->RowIndex);
?>
<script>
fview_dashboard_patient_detailsgrid.updateLists(<?php echo $view_dashboard_patient_details_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_dashboard_patient_details->CurrentMode == "add" || $view_dashboard_patient_details->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_dashboard_patient_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_patient_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_patient_details_grid->KeyCount ?>">
<?php echo $view_dashboard_patient_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_dashboard_patient_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_patient_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_patient_details_grid->KeyCount ?>">
<?php echo $view_dashboard_patient_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_dashboard_patient_detailsgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_dashboard_patient_details_grid->Recordset)
	$view_dashboard_patient_details_grid->Recordset->Close();
?>
</div>
<?php if ($view_dashboard_patient_details_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_dashboard_patient_details_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_patient_details_grid->TotalRecs == 0 && !$view_dashboard_patient_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_patient_details_grid->terminate();
?>
<?php if (!$view_dashboard_patient_details->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_dashboard_patient_details", "95%", "");
</script>
<?php } ?>