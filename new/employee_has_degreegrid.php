<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($employee_has_degree_grid))
	$employee_has_degree_grid = new employee_has_degree_grid();

// Run the page
$employee_has_degree_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_grid->Page_Render();
?>
<?php if (!$employee_has_degree_grid->isExport()) { ?>
<script>
var femployee_has_degreegrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	femployee_has_degreegrid = new ew.Form("femployee_has_degreegrid", "grid");
	femployee_has_degreegrid.formKeyCountName = '<?php echo $employee_has_degree_grid->FormKeyCountName ?>';

	// Validate form
	femployee_has_degreegrid.validate = function() {
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
			<?php if ($employee_has_degree_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->id->caption(), $employee_has_degree_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->employee_id->Required) { ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->employee_id->caption(), $employee_has_degree_grid->employee_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_employee_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($employee_has_degree_grid->employee_id->errorMessage()) ?>");
			<?php if ($employee_has_degree_grid->degree_id->Required) { ?>
				elm = this.getElements("x" + infix + "_degree_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->degree_id->caption(), $employee_has_degree_grid->degree_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->college_or_school->Required) { ?>
				elm = this.getElements("x" + infix + "_college_or_school");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->college_or_school->caption(), $employee_has_degree_grid->college_or_school->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->university_or_board->Required) { ?>
				elm = this.getElements("x" + infix + "_university_or_board");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->university_or_board->caption(), $employee_has_degree_grid->university_or_board->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->year_of_passing->Required) { ?>
				elm = this.getElements("x" + infix + "_year_of_passing");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->year_of_passing->caption(), $employee_has_degree_grid->year_of_passing->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->scoring_marks->Required) { ?>
				elm = this.getElements("x" + infix + "_scoring_marks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->scoring_marks->caption(), $employee_has_degree_grid->scoring_marks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->certificates->Required) { ?>
				felm = this.getElements("x" + infix + "_certificates");
				elm = this.getElements("fn_x" + infix + "_certificates");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->certificates->caption(), $employee_has_degree_grid->certificates->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->others->Required) { ?>
				felm = this.getElements("x" + infix + "_others");
				elm = this.getElements("fn_x" + infix + "_others");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->others->caption(), $employee_has_degree_grid->others->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($employee_has_degree_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_degree_grid->status->caption(), $employee_has_degree_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	femployee_has_degreegrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "degree_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "college_or_school", false)) return false;
		if (ew.valueChanged(fobj, infix, "university_or_board", false)) return false;
		if (ew.valueChanged(fobj, infix, "year_of_passing", false)) return false;
		if (ew.valueChanged(fobj, infix, "scoring_marks", false)) return false;
		if (ew.valueChanged(fobj, infix, "certificates", false)) return false;
		if (ew.valueChanged(fobj, infix, "others", false)) return false;
		if (ew.valueChanged(fobj, infix, "status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	femployee_has_degreegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	femployee_has_degreegrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	femployee_has_degreegrid.lists["x_degree_id"] = <?php echo $employee_has_degree_grid->degree_id->Lookup->toClientList($employee_has_degree_grid) ?>;
	femployee_has_degreegrid.lists["x_degree_id"].options = <?php echo JsonEncode($employee_has_degree_grid->degree_id->lookupOptions()) ?>;
	femployee_has_degreegrid.lists["x_status"] = <?php echo $employee_has_degree_grid->status->Lookup->toClientList($employee_has_degree_grid) ?>;
	femployee_has_degreegrid.lists["x_status"].options = <?php echo JsonEncode($employee_has_degree_grid->status->lookupOptions()) ?>;
	loadjs.done("femployee_has_degreegrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$employee_has_degree_grid->renderOtherOptions();
?>
<?php if ($employee_has_degree_grid->TotalRecords > 0 || $employee_has_degree->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_has_degree_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_degree">
<?php if ($employee_has_degree_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_has_degree_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_has_degreegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_has_degree" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_has_degreegrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_has_degree->RowType = ROWTYPE_HEADER;

// Render list options
$employee_has_degree_grid->renderListOptions();

// Render list options (header, left)
$employee_has_degree_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_has_degree_grid->id->Visible) { // id ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_has_degree_grid->id->headerCellClass() ?>"><div id="elh_employee_has_degree_id" class="employee_has_degree_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_has_degree_grid->id->headerCellClass() ?>"><div><div id="elh_employee_has_degree_id" class="employee_has_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_degree_grid->employee_id->headerCellClass() ?>"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_degree_grid->employee_id->headerCellClass() ?>"><div><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->employee_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->employee_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->degree_id->Visible) { // degree_id ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->degree_id) == "") { ?>
		<th data-name="degree_id" class="<?php echo $employee_has_degree_grid->degree_id->headerCellClass() ?>"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->degree_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="degree_id" class="<?php echo $employee_has_degree_grid->degree_id->headerCellClass() ?>"><div><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->degree_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->degree_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->degree_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->college_or_school->Visible) { // college_or_school ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->college_or_school) == "") { ?>
		<th data-name="college_or_school" class="<?php echo $employee_has_degree_grid->college_or_school->headerCellClass() ?>"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->college_or_school->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="college_or_school" class="<?php echo $employee_has_degree_grid->college_or_school->headerCellClass() ?>"><div><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->college_or_school->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->college_or_school->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->college_or_school->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->university_or_board->Visible) { // university_or_board ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->university_or_board) == "") { ?>
		<th data-name="university_or_board" class="<?php echo $employee_has_degree_grid->university_or_board->headerCellClass() ?>"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->university_or_board->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="university_or_board" class="<?php echo $employee_has_degree_grid->university_or_board->headerCellClass() ?>"><div><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->university_or_board->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->university_or_board->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->university_or_board->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->year_of_passing->Visible) { // year_of_passing ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->year_of_passing) == "") { ?>
		<th data-name="year_of_passing" class="<?php echo $employee_has_degree_grid->year_of_passing->headerCellClass() ?>"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->year_of_passing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="year_of_passing" class="<?php echo $employee_has_degree_grid->year_of_passing->headerCellClass() ?>"><div><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->year_of_passing->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->year_of_passing->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->year_of_passing->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->scoring_marks->Visible) { // scoring_marks ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->scoring_marks) == "") { ?>
		<th data-name="scoring_marks" class="<?php echo $employee_has_degree_grid->scoring_marks->headerCellClass() ?>"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->scoring_marks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scoring_marks" class="<?php echo $employee_has_degree_grid->scoring_marks->headerCellClass() ?>"><div><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->scoring_marks->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->scoring_marks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->scoring_marks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->certificates) == "") { ?>
		<th data-name="certificates" class="<?php echo $employee_has_degree_grid->certificates->headerCellClass() ?>"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->certificates->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certificates" class="<?php echo $employee_has_degree_grid->certificates->headerCellClass() ?>"><div><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->certificates->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->certificates->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->certificates->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->others->Visible) { // others ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->others) == "") { ?>
		<th data-name="others" class="<?php echo $employee_has_degree_grid->others->headerCellClass() ?>"><div id="elh_employee_has_degree_others" class="employee_has_degree_others"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="others" class="<?php echo $employee_has_degree_grid->others->headerCellClass() ?>"><div><div id="elh_employee_has_degree_others" class="employee_has_degree_others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->others->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->others->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->others->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_degree_grid->status->Visible) { // status ?>
	<?php if ($employee_has_degree_grid->SortUrl($employee_has_degree_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_has_degree_grid->status->headerCellClass() ?>"><div id="elh_employee_has_degree_status" class="employee_has_degree_status"><div class="ew-table-header-caption"><?php echo $employee_has_degree_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_has_degree_grid->status->headerCellClass() ?>"><div><div id="elh_employee_has_degree_status" class="employee_has_degree_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_degree_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_degree_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($employee_has_degree_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_degree_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$employee_has_degree_grid->StartRecord = 1;
$employee_has_degree_grid->StopRecord = $employee_has_degree_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($employee_has_degree->isConfirm() || $employee_has_degree_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_has_degree_grid->FormKeyCountName) && ($employee_has_degree_grid->isGridAdd() || $employee_has_degree_grid->isGridEdit() || $employee_has_degree->isConfirm())) {
		$employee_has_degree_grid->KeyCount = $CurrentForm->getValue($employee_has_degree_grid->FormKeyCountName);
		$employee_has_degree_grid->StopRecord = $employee_has_degree_grid->StartRecord + $employee_has_degree_grid->KeyCount - 1;
	}
}
$employee_has_degree_grid->RecordCount = $employee_has_degree_grid->StartRecord - 1;
if ($employee_has_degree_grid->Recordset && !$employee_has_degree_grid->Recordset->EOF) {
	$employee_has_degree_grid->Recordset->moveFirst();
	$selectLimit = $employee_has_degree_grid->UseSelectLimit;
	if (!$selectLimit && $employee_has_degree_grid->StartRecord > 1)
		$employee_has_degree_grid->Recordset->move($employee_has_degree_grid->StartRecord - 1);
} elseif (!$employee_has_degree->AllowAddDeleteRow && $employee_has_degree_grid->StopRecord == 0) {
	$employee_has_degree_grid->StopRecord = $employee_has_degree->GridAddRowCount;
}

// Initialize aggregate
$employee_has_degree->RowType = ROWTYPE_AGGREGATEINIT;
$employee_has_degree->resetAttributes();
$employee_has_degree_grid->renderRow();
if ($employee_has_degree_grid->isGridAdd())
	$employee_has_degree_grid->RowIndex = 0;
if ($employee_has_degree_grid->isGridEdit())
	$employee_has_degree_grid->RowIndex = 0;
while ($employee_has_degree_grid->RecordCount < $employee_has_degree_grid->StopRecord) {
	$employee_has_degree_grid->RecordCount++;
	if ($employee_has_degree_grid->RecordCount >= $employee_has_degree_grid->StartRecord) {
		$employee_has_degree_grid->RowCount++;
		if ($employee_has_degree_grid->isGridAdd() || $employee_has_degree_grid->isGridEdit() || $employee_has_degree->isConfirm()) {
			$employee_has_degree_grid->RowIndex++;
			$CurrentForm->Index = $employee_has_degree_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_has_degree_grid->FormActionName) && ($employee_has_degree->isConfirm() || $employee_has_degree_grid->EventCancelled))
				$employee_has_degree_grid->RowAction = strval($CurrentForm->getValue($employee_has_degree_grid->FormActionName));
			elseif ($employee_has_degree_grid->isGridAdd())
				$employee_has_degree_grid->RowAction = "insert";
			else
				$employee_has_degree_grid->RowAction = "";
		}

		// Set up key count
		$employee_has_degree_grid->KeyCount = $employee_has_degree_grid->RowIndex;

		// Init row class and style
		$employee_has_degree->resetAttributes();
		$employee_has_degree->CssClass = "";
		if ($employee_has_degree_grid->isGridAdd()) {
			if ($employee_has_degree->CurrentMode == "copy") {
				$employee_has_degree_grid->loadRowValues($employee_has_degree_grid->Recordset); // Load row values
				$employee_has_degree_grid->setRecordKey($employee_has_degree_grid->RowOldKey, $employee_has_degree_grid->Recordset); // Set old record key
			} else {
				$employee_has_degree_grid->loadRowValues(); // Load default values
				$employee_has_degree_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$employee_has_degree_grid->loadRowValues($employee_has_degree_grid->Recordset); // Load row values
		}
		$employee_has_degree->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_has_degree_grid->isGridAdd()) // Grid add
			$employee_has_degree->RowType = ROWTYPE_ADD; // Render add
		if ($employee_has_degree_grid->isGridAdd() && $employee_has_degree->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_has_degree_grid->restoreCurrentRowFormValues($employee_has_degree_grid->RowIndex); // Restore form values
		if ($employee_has_degree_grid->isGridEdit()) { // Grid edit
			if ($employee_has_degree->EventCancelled)
				$employee_has_degree_grid->restoreCurrentRowFormValues($employee_has_degree_grid->RowIndex); // Restore form values
			if ($employee_has_degree_grid->RowAction == "insert")
				$employee_has_degree->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_has_degree->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_has_degree_grid->isGridEdit() && ($employee_has_degree->RowType == ROWTYPE_EDIT || $employee_has_degree->RowType == ROWTYPE_ADD) && $employee_has_degree->EventCancelled) // Update failed
			$employee_has_degree_grid->restoreCurrentRowFormValues($employee_has_degree_grid->RowIndex); // Restore form values
		if ($employee_has_degree->RowType == ROWTYPE_EDIT) // Edit row
			$employee_has_degree_grid->EditRowCount++;
		if ($employee_has_degree->isConfirm()) // Confirm row
			$employee_has_degree_grid->restoreCurrentRowFormValues($employee_has_degree_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_has_degree->RowAttrs->merge(["data-rowindex" => $employee_has_degree_grid->RowCount, "id" => "r" . $employee_has_degree_grid->RowCount . "_employee_has_degree", "data-rowtype" => $employee_has_degree->RowType]);

		// Render row
		$employee_has_degree_grid->renderRow();

		// Render list options
		$employee_has_degree_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_has_degree_grid->RowAction != "delete" && $employee_has_degree_grid->RowAction != "insertdelete" && !($employee_has_degree_grid->RowAction == "insert" && $employee_has_degree->isConfirm() && $employee_has_degree_grid->emptyRow())) {
?>
	<tr <?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_grid->ListOptions->render("body", "left", $employee_has_degree_grid->RowCount);
?>
	<?php if ($employee_has_degree_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $employee_has_degree_grid->id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_id" class="form-group">
<span<?php echo $employee_has_degree_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_id">
<span<?php echo $employee_has_degree_grid->id->viewAttributes() ?>><?php echo $employee_has_degree_grid->id->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id" <?php echo $employee_has_degree_grid->employee_id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_has_degree_grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?php echo $employee_has_degree_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->employee_id->EditValue ?>"<?php echo $employee_has_degree_grid->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_has_degree_grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?php echo $employee_has_degree_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->employee_id->EditValue ?>"<?php echo $employee_has_degree_grid->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_employee_id">
<span<?php echo $employee_has_degree_grid->employee_id->viewAttributes() ?>><?php echo $employee_has_degree_grid->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->degree_id->Visible) { // degree_id ?>
		<td data-name="degree_id" <?php echo $employee_has_degree_grid->degree_id->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree_grid->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id"<?php echo $employee_has_degree_grid->degree_id->editAttributes() ?>>
			<?php echo $employee_has_degree_grid->degree_id->selectOptionListHtml("x{$employee_has_degree_grid->RowIndex}_degree_id") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree_grid->degree_id->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree_grid->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree_grid->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_has_degree_grid->degree_id->Lookup->getParamTag($employee_has_degree_grid, "p_x" . $employee_has_degree_grid->RowIndex . "_degree_id") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree_grid->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id"<?php echo $employee_has_degree_grid->degree_id->editAttributes() ?>>
			<?php echo $employee_has_degree_grid->degree_id->selectOptionListHtml("x{$employee_has_degree_grid->RowIndex}_degree_id") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree_grid->degree_id->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree_grid->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree_grid->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_has_degree_grid->degree_id->Lookup->getParamTag($employee_has_degree_grid, "p_x" . $employee_has_degree_grid->RowIndex . "_degree_id") ?>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_degree_id">
<span<?php echo $employee_has_degree_grid->degree_id->viewAttributes() ?>><?php echo $employee_has_degree_grid->degree_id->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->college_or_school->Visible) { // college_or_school ?>
		<td data-name="college_or_school" <?php echo $employee_has_degree_grid->college_or_school->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->college_or_school->EditValue ?>"<?php echo $employee_has_degree_grid->college_or_school->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->college_or_school->EditValue ?>"<?php echo $employee_has_degree_grid->college_or_school->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree_grid->college_or_school->viewAttributes() ?>><?php echo $employee_has_degree_grid->college_or_school->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->university_or_board->Visible) { // university_or_board ?>
		<td data-name="university_or_board" <?php echo $employee_has_degree_grid->university_or_board->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->university_or_board->EditValue ?>"<?php echo $employee_has_degree_grid->university_or_board->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->university_or_board->EditValue ?>"<?php echo $employee_has_degree_grid->university_or_board->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree_grid->university_or_board->viewAttributes() ?>><?php echo $employee_has_degree_grid->university_or_board->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->year_of_passing->Visible) { // year_of_passing ?>
		<td data-name="year_of_passing" <?php echo $employee_has_degree_grid->year_of_passing->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->year_of_passing->EditValue ?>"<?php echo $employee_has_degree_grid->year_of_passing->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->year_of_passing->EditValue ?>"<?php echo $employee_has_degree_grid->year_of_passing->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree_grid->year_of_passing->viewAttributes() ?>><?php echo $employee_has_degree_grid->year_of_passing->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->scoring_marks->Visible) { // scoring_marks ?>
		<td data-name="scoring_marks" <?php echo $employee_has_degree_grid->scoring_marks->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->scoring_marks->EditValue ?>"<?php echo $employee_has_degree_grid->scoring_marks->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->scoring_marks->EditValue ?>"<?php echo $employee_has_degree_grid->scoring_marks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree_grid->scoring_marks->viewAttributes() ?>><?php echo $employee_has_degree_grid->scoring_marks->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->certificates->Visible) { // certificates ?>
		<td data-name="certificates" <?php echo $employee_has_degree_grid->certificates->cellAttributes() ?>>
<?php if ($employee_has_degree_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_grid->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_grid->certificates->editAttributes() ?><?php if ($employee_has_degree_grid->certificates->ReadOnly || $employee_has_degree_grid->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_degree_grid->certificates->OldValue) ?>">
<?php } elseif ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_certificates">
<span><?php echo GetFileViewTag($employee_has_degree_grid->certificates, $employee_has_degree_grid->certificates->getViewValue(), FALSE) ?></span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_grid->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_grid->certificates->editAttributes() ?><?php if ($employee_has_degree_grid->certificates->ReadOnly || $employee_has_degree_grid->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo (Post("fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->others->Visible) { // others ?>
		<td data-name="others" <?php echo $employee_has_degree_grid->others->cellAttributes() ?>>
<?php if ($employee_has_degree_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_grid->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_grid->others->title() ?>" data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_grid->others->editAttributes() ?><?php if ($employee_has_degree_grid->others->ReadOnly || $employee_has_degree_grid->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_grid->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_others" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_others" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_degree_grid->others->OldValue) ?>">
<?php } elseif ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_others">
<span<?php echo $employee_has_degree_grid->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_degree_grid->others, $employee_has_degree_grid->others->getViewValue(), FALSE) ?></span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_grid->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_grid->others->title() ?>" data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_grid->others->editAttributes() ?><?php if ($employee_has_degree_grid->others->ReadOnly || $employee_has_degree_grid->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_grid->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo (Post("fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $employee_has_degree_grid->status->cellAttributes() ?>>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_status"<?php echo $employee_has_degree_grid->status->editAttributes() ?>>
			<?php echo $employee_has_degree_grid->status->selectOptionListHtml("x{$employee_has_degree_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_degree_grid->status->Lookup->getParamTag($employee_has_degree_grid, "p_x" . $employee_has_degree_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_status"<?php echo $employee_has_degree_grid->status->editAttributes() ?>>
			<?php echo $employee_has_degree_grid->status->selectOptionListHtml("x{$employee_has_degree_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_degree_grid->status->Lookup->getParamTag($employee_has_degree_grid, "p_x" . $employee_has_degree_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_has_degree->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_degree_grid->RowCount ?>_employee_has_degree_status">
<span<?php echo $employee_has_degree_grid->status->viewAttributes() ?>><?php echo $employee_has_degree_grid->status->getViewValue() ?></span>
</span>
<?php if (!$employee_has_degree->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="femployee_has_degreegrid$x<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="femployee_has_degreegrid$o<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_grid->ListOptions->render("body", "right", $employee_has_degree_grid->RowCount);
?>
	</tr>
<?php if ($employee_has_degree->RowType == ROWTYPE_ADD || $employee_has_degree->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["femployee_has_degreegrid", "load"], function() {
	femployee_has_degreegrid.updateLists(<?php echo $employee_has_degree_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_has_degree_grid->isGridAdd() || $employee_has_degree->CurrentMode == "copy")
		if (!$employee_has_degree_grid->Recordset->EOF)
			$employee_has_degree_grid->Recordset->moveNext();
}
?>
<?php
	if ($employee_has_degree->CurrentMode == "add" || $employee_has_degree->CurrentMode == "copy" || $employee_has_degree->CurrentMode == "edit") {
		$employee_has_degree_grid->RowIndex = '$rowindex$';
		$employee_has_degree_grid->loadRowValues();

		// Set row properties
		$employee_has_degree->resetAttributes();
		$employee_has_degree->RowAttrs->merge(["data-rowindex" => $employee_has_degree_grid->RowIndex, "id" => "r0_employee_has_degree", "data-rowtype" => ROWTYPE_ADD]);
		$employee_has_degree->RowAttrs->appendClass("ew-template");
		$employee_has_degree->RowType = ROWTYPE_ADD;

		// Render row
		$employee_has_degree_grid->renderRow();

		// Render list options
		$employee_has_degree_grid->renderListOptions();
		$employee_has_degree_grid->StartRowCount = 0;
?>
	<tr <?php echo $employee_has_degree->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_degree_grid->ListOptions->render("body", "left", $employee_has_degree_grid->RowIndex);
?>
	<?php if ($employee_has_degree_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_id" class="form-group employee_has_degree_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_id" class="form-group employee_has_degree_id">
<span<?php echo $employee_has_degree_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_degree_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<?php if ($employee_has_degree_grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?php echo $employee_has_degree_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="text" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->employee_id->EditValue ?>"<?php echo $employee_has_degree_grid->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?php echo $employee_has_degree_grid->employee_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->employee_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_degree_grid->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->degree_id->Visible) { // degree_id ?>
		<td data-name="degree_id">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_degree_id" data-value-separator="<?php echo $employee_has_degree_grid->degree_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id"<?php echo $employee_has_degree_grid->degree_id->editAttributes() ?>>
			<?php echo $employee_has_degree_grid->degree_id->selectOptionListHtml("x{$employee_has_degree_grid->RowIndex}_degree_id") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$employee_has_degree_grid->degree_id->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $employee_has_degree_grid->degree_id->caption() ?>" data-title="<?php echo $employee_has_degree_grid->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id',url:'mas_degreeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $employee_has_degree_grid->degree_id->Lookup->getParamTag($employee_has_degree_grid, "p_x" . $employee_has_degree_grid->RowIndex . "_degree_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<span<?php echo $employee_has_degree_grid->degree_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->degree_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_degree_id" value="<?php echo HtmlEncode($employee_has_degree_grid->degree_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->college_or_school->Visible) { // college_or_school ?>
		<td data-name="college_or_school">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="text" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->college_or_school->EditValue ?>"<?php echo $employee_has_degree_grid->college_or_school->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree_grid->college_or_school->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->college_or_school->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_college_or_school" value="<?php echo HtmlEncode($employee_has_degree_grid->college_or_school->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->university_or_board->Visible) { // university_or_board ?>
		<td data-name="university_or_board">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="text" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->university_or_board->EditValue ?>"<?php echo $employee_has_degree_grid->university_or_board->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree_grid->university_or_board->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->university_or_board->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_university_or_board" value="<?php echo HtmlEncode($employee_has_degree_grid->university_or_board->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->year_of_passing->Visible) { // year_of_passing ?>
		<td data-name="year_of_passing">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="text" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->year_of_passing->EditValue ?>"<?php echo $employee_has_degree_grid->year_of_passing->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree_grid->year_of_passing->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->year_of_passing->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_year_of_passing" value="<?php echo HtmlEncode($employee_has_degree_grid->year_of_passing->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->scoring_marks->Visible) { // scoring_marks ?>
		<td data-name="scoring_marks">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="text" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->getPlaceHolder()) ?>" value="<?php echo $employee_has_degree_grid->scoring_marks->EditValue ?>"<?php echo $employee_has_degree_grid->scoring_marks->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree_grid->scoring_marks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->scoring_marks->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_scoring_marks" value="<?php echo HtmlEncode($employee_has_degree_grid->scoring_marks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->certificates->Visible) { // certificates ?>
		<td data-name="certificates">
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_grid->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_grid->certificates->editAttributes() ?><?php if ($employee_has_degree_grid->certificates->ReadOnly || $employee_has_degree_grid->certificates->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_degree_grid->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_degree_grid->certificates->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->others->Visible) { // others ?>
		<td data-name="others">
<span id="el$rowindex$_employee_has_degree_others" class="form-group employee_has_degree_others">
<div id="fd_x<?php echo $employee_has_degree_grid->RowIndex ?>_others">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $employee_has_degree_grid->others->title() ?>" data-table="employee_has_degree" data-field="x_others" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_others" lang="<?php echo CurrentLanguageID() ?>" multiple="multiple"<?php echo $employee_has_degree_grid->others->editAttributes() ?><?php if ($employee_has_degree_grid->others->ReadOnly || $employee_has_degree_grid->others->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x<?php echo $employee_has_degree_grid->RowIndex ?>_others"><?php echo $Language->phrase("ChooseFiles") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo $employee_has_degree_grid->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_degree_grid->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_others" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_others" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_degree_grid->others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_degree_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_has_degree->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_degree" data-field="x_status" data-value-separator="<?php echo $employee_has_degree_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_status"<?php echo $employee_has_degree_grid->status->editAttributes() ?>>
			<?php echo $employee_has_degree_grid->status->selectOptionListHtml("x{$employee_has_degree_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $employee_has_degree_grid->status->Lookup->getParamTag($employee_has_degree_grid, "p_x" . $employee_has_degree_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
<span<?php echo $employee_has_degree_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($employee_has_degree_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="x<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" name="o<?php echo $employee_has_degree_grid->RowIndex ?>_status" id="o<?php echo $employee_has_degree_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_degree_grid->status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_degree_grid->ListOptions->render("body", "right", $employee_has_degree_grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_degreegrid", "load"], function() {
	femployee_has_degreegrid.updateLists(<?php echo $employee_has_degree_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($employee_has_degree->CurrentMode == "add" || $employee_has_degree->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $employee_has_degree_grid->FormKeyCountName ?>" id="<?php echo $employee_has_degree_grid->FormKeyCountName ?>" value="<?php echo $employee_has_degree_grid->KeyCount ?>">
<?php echo $employee_has_degree_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_degree->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $employee_has_degree_grid->FormKeyCountName ?>" id="<?php echo $employee_has_degree_grid->FormKeyCountName ?>" value="<?php echo $employee_has_degree_grid->KeyCount ?>">
<?php echo $employee_has_degree_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_degree->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="femployee_has_degreegrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_has_degree_grid->Recordset)
	$employee_has_degree_grid->Recordset->Close();
?>
<?php if ($employee_has_degree_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_has_degree_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_has_degree_grid->TotalRecords == 0 && !$employee_has_degree->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_has_degree_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$employee_has_degree_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$employee_has_degree->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_employee_has_degree",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$employee_has_degree_grid->terminate();
?>