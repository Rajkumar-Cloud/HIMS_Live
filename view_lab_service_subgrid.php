<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_lab_service_sub_grid))
	$view_lab_service_sub_grid = new view_lab_service_sub_grid();

// Run the page
$view_lab_service_sub_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_grid->Page_Render();
?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>

// Form object
var fview_lab_service_subgrid = new ew.Form("fview_lab_service_subgrid", "grid");
fview_lab_service_subgrid.formKeyCountName = '<?php echo $view_lab_service_sub_grid->FormKeyCountName ?>';

// Validate form
fview_lab_service_subgrid.validate = function() {
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
		<?php if ($view_lab_service_sub_grid->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Id->caption(), $view_lab_service_sub->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->CODE->caption(), $view_lab_service_sub->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->SERVICE->caption(), $view_lab_service_sub->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->UNITS->Required) { ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->UNITS->caption(), $view_lab_service_sub->UNITS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->HospID->caption(), $view_lab_service_sub->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->TestSubCd->caption(), $view_lab_service_sub->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Method->caption(), $view_lab_service_sub->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Order->caption(), $view_lab_service_sub->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->Order->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_grid->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->ResType->caption(), $view_lab_service_sub->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->UnitCD->caption(), $view_lab_service_sub->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Sample->caption(), $view_lab_service_sub->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->NoD->caption(), $view_lab_service_sub->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->NoD->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_grid->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->BillOrder->caption(), $view_lab_service_sub->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->BillOrder->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_grid->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Formula->caption(), $view_lab_service_sub->Formula->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Inactive->caption(), $view_lab_service_sub->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Outsource->caption(), $view_lab_service_sub->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_grid->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->CollSample->caption(), $view_lab_service_sub->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fview_lab_service_subgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "CODE", false)) return false;
	if (ew.valueChanged(fobj, infix, "SERVICE", false)) return false;
	if (ew.valueChanged(fobj, infix, "UNITS", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestSubCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "Method", false)) return false;
	if (ew.valueChanged(fobj, infix, "Order", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResType", false)) return false;
	if (ew.valueChanged(fobj, infix, "UnitCD", false)) return false;
	if (ew.valueChanged(fobj, infix, "Sample", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoD", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillOrder", false)) return false;
	if (ew.valueChanged(fobj, infix, "Formula", false)) return false;
	if (ew.valueChanged(fobj, infix, "Inactive[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Outsource", false)) return false;
	if (ew.valueChanged(fobj, infix, "CollSample", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_lab_service_subgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_service_subgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_service_subgrid.lists["x_UNITS"] = <?php echo $view_lab_service_sub_grid->UNITS->Lookup->toClientList() ?>;
fview_lab_service_subgrid.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_grid->UNITS->lookupOptions()) ?>;
fview_lab_service_subgrid.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_grid->Inactive->Lookup->toClientList() ?>;
fview_lab_service_subgrid.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_grid->Inactive->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_lab_service_sub_grid->renderOtherOptions();
?>
<?php $view_lab_service_sub_grid->showPageHeader(); ?>
<?php
$view_lab_service_sub_grid->showMessage();
?>
<?php if ($view_lab_service_sub_grid->TotalRecs > 0 || $view_lab_service_sub->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_service_sub_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service_sub">
<?php if ($view_lab_service_sub_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_lab_service_sub_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_lab_service_subgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_lab_service_sub" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_lab_service_subgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_service_sub_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_service_sub_grid->renderListOptions();

// Render list options (header, left)
$view_lab_service_sub_grid->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub->Id->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub->CODE->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub->SERVICE->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->SERVICE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->SERVICE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub->UNITS->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->UNITS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->UNITS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub->HospID->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub->TestSubCd->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub->Method->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub->Order->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub->ResType->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub->UnitCD->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->UnitCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->UnitCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->UnitCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub->Sample->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub->NoD->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub->BillOrder->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Formula) == "") { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Formula->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub->Formula->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Formula->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Formula->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Formula->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub->Inactive->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub->Outsource->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->Outsource->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->Outsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->Outsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_sub->sortUrl($view_lab_service_sub->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub->CollSample->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_service_sub->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_service_sub_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_lab_service_sub_grid->StartRec = 1;
$view_lab_service_sub_grid->StopRec = $view_lab_service_sub_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_lab_service_sub_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_service_sub_grid->FormKeyCountName) && ($view_lab_service_sub->isGridAdd() || $view_lab_service_sub->isGridEdit() || $view_lab_service_sub->isConfirm())) {
		$view_lab_service_sub_grid->KeyCount = $CurrentForm->getValue($view_lab_service_sub_grid->FormKeyCountName);
		$view_lab_service_sub_grid->StopRec = $view_lab_service_sub_grid->StartRec + $view_lab_service_sub_grid->KeyCount - 1;
	}
}
$view_lab_service_sub_grid->RecCnt = $view_lab_service_sub_grid->StartRec - 1;
if ($view_lab_service_sub_grid->Recordset && !$view_lab_service_sub_grid->Recordset->EOF) {
	$view_lab_service_sub_grid->Recordset->moveFirst();
	$selectLimit = $view_lab_service_sub_grid->UseSelectLimit;
	if (!$selectLimit && $view_lab_service_sub_grid->StartRec > 1)
		$view_lab_service_sub_grid->Recordset->move($view_lab_service_sub_grid->StartRec - 1);
} elseif (!$view_lab_service_sub->AllowAddDeleteRow && $view_lab_service_sub_grid->StopRec == 0) {
	$view_lab_service_sub_grid->StopRec = $view_lab_service_sub->GridAddRowCount;
}

// Initialize aggregate
$view_lab_service_sub->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_service_sub->resetAttributes();
$view_lab_service_sub_grid->renderRow();
if ($view_lab_service_sub->isGridAdd())
	$view_lab_service_sub_grid->RowIndex = 0;
if ($view_lab_service_sub->isGridEdit())
	$view_lab_service_sub_grid->RowIndex = 0;
while ($view_lab_service_sub_grid->RecCnt < $view_lab_service_sub_grid->StopRec) {
	$view_lab_service_sub_grid->RecCnt++;
	if ($view_lab_service_sub_grid->RecCnt >= $view_lab_service_sub_grid->StartRec) {
		$view_lab_service_sub_grid->RowCnt++;
		if ($view_lab_service_sub->isGridAdd() || $view_lab_service_sub->isGridEdit() || $view_lab_service_sub->isConfirm()) {
			$view_lab_service_sub_grid->RowIndex++;
			$CurrentForm->Index = $view_lab_service_sub_grid->RowIndex;
			if ($CurrentForm->hasValue($view_lab_service_sub_grid->FormActionName) && $view_lab_service_sub_grid->EventCancelled)
				$view_lab_service_sub_grid->RowAction = strval($CurrentForm->getValue($view_lab_service_sub_grid->FormActionName));
			elseif ($view_lab_service_sub->isGridAdd())
				$view_lab_service_sub_grid->RowAction = "insert";
			else
				$view_lab_service_sub_grid->RowAction = "";
		}

		// Set up key count
		$view_lab_service_sub_grid->KeyCount = $view_lab_service_sub_grid->RowIndex;

		// Init row class and style
		$view_lab_service_sub->resetAttributes();
		$view_lab_service_sub->CssClass = "";
		if ($view_lab_service_sub->isGridAdd()) {
			if ($view_lab_service_sub->CurrentMode == "copy") {
				$view_lab_service_sub_grid->loadRowValues($view_lab_service_sub_grid->Recordset); // Load row values
				$view_lab_service_sub_grid->setRecordKey($view_lab_service_sub_grid->RowOldKey, $view_lab_service_sub_grid->Recordset); // Set old record key
			} else {
				$view_lab_service_sub_grid->loadRowValues(); // Load default values
				$view_lab_service_sub_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_lab_service_sub_grid->loadRowValues($view_lab_service_sub_grid->Recordset); // Load row values
		}
		$view_lab_service_sub->RowType = ROWTYPE_VIEW; // Render view
		if ($view_lab_service_sub->isGridAdd()) // Grid add
			$view_lab_service_sub->RowType = ROWTYPE_ADD; // Render add
		if ($view_lab_service_sub->isGridAdd() && $view_lab_service_sub->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values
		if ($view_lab_service_sub->isGridEdit()) { // Grid edit
			if ($view_lab_service_sub->EventCancelled)
				$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values
			if ($view_lab_service_sub_grid->RowAction == "insert")
				$view_lab_service_sub->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_service_sub->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_service_sub->isGridEdit() && ($view_lab_service_sub->RowType == ROWTYPE_EDIT || $view_lab_service_sub->RowType == ROWTYPE_ADD) && $view_lab_service_sub->EventCancelled) // Update failed
			$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values
		if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_service_sub_grid->EditRowCnt++;
		if ($view_lab_service_sub->isConfirm()) // Confirm row
			$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_lab_service_sub->RowAttrs = array_merge($view_lab_service_sub->RowAttrs, array('data-rowindex'=>$view_lab_service_sub_grid->RowCnt, 'id'=>'r' . $view_lab_service_sub_grid->RowCnt . '_view_lab_service_sub', 'data-rowtype'=>$view_lab_service_sub->RowType));

		// Render row
		$view_lab_service_sub_grid->renderRow();

		// Render list options
		$view_lab_service_sub_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_service_sub_grid->RowAction <> "delete" && $view_lab_service_sub_grid->RowAction <> "insertdelete" && !($view_lab_service_sub_grid->RowAction == "insert" && $view_lab_service_sub->isConfirm() && $view_lab_service_sub_grid->emptyRow())) {
?>
	<tr<?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_grid->ListOptions->render("body", "left", $view_lab_service_sub_grid->RowCnt);
?>
	<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $view_lab_service_sub->Id->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Id" class="form-group view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Id->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $view_lab_service_sub->CODE->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_service_sub->CODE->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->CODE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CODE->EditValue ?>"<?php echo $view_lab_service_sub->CODE->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_service_sub->CODE->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->CODE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CODE->EditValue ?>"<?php echo $view_lab_service_sub->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CODE->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE"<?php echo $view_lab_service_sub->SERVICE->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub->SERVICE->viewAttributes() ?>>
<?php echo $view_lab_service_sub->SERVICE->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS"<?php echo $view_lab_service_sub->UNITS->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS"><?php echo strval($view_lab_service_sub->UNITS->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_lab_service_sub->UNITS->ViewValue) : $view_lab_service_sub->UNITS->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_lab_service_sub->UNITS->ReadOnly || $view_lab_service_sub->UNITS->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub->UNITS->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub->UNITS->Lookup->getParamTag("p_x" . $view_lab_service_sub_grid->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_sub->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS"><?php echo strval($view_lab_service_sub->UNITS->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_lab_service_sub->UNITS->ViewValue) : $view_lab_service_sub->UNITS->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_lab_service_sub->UNITS->ReadOnly || $view_lab_service_sub->UNITS->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub->UNITS->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub->UNITS->Lookup->getParamTag("p_x" . $view_lab_service_sub_grid->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_sub->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub->UNITS->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UNITS->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_service_sub->HospID->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub->HospID->viewAttributes() ?>>
<?php echo $view_lab_service_sub->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $view_lab_service_sub->TestSubCd->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub->TestSubCd->viewAttributes() ?>>
<?php echo $view_lab_service_sub->TestSubCd->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $view_lab_service_sub->Method->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Method->EditValue ?>"<?php echo $view_lab_service_sub->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Method->EditValue ?>"<?php echo $view_lab_service_sub->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub->Method->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Method->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_lab_service_sub->Order->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Order->EditValue ?>"<?php echo $view_lab_service_sub->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Order->EditValue ?>"<?php echo $view_lab_service_sub->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub->Order->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Order->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $view_lab_service_sub->ResType->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->ResType->EditValue ?>"<?php echo $view_lab_service_sub->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->ResType->EditValue ?>"<?php echo $view_lab_service_sub->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub->ResType->viewAttributes() ?>>
<?php echo $view_lab_service_sub->ResType->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD"<?php echo $view_lab_service_sub->UnitCD->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub->UnitCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub->UnitCD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->UnitCD->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $view_lab_service_sub->Sample->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Sample->EditValue ?>"<?php echo $view_lab_service_sub->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Sample->EditValue ?>"<?php echo $view_lab_service_sub->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub->Sample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Sample->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $view_lab_service_sub->NoD->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->NoD->EditValue ?>"<?php echo $view_lab_service_sub->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->NoD->EditValue ?>"<?php echo $view_lab_service_sub->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub->NoD->viewAttributes() ?>>
<?php echo $view_lab_service_sub->NoD->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $view_lab_service_sub->BillOrder->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub->BillOrder->viewAttributes() ?>>
<?php echo $view_lab_service_sub->BillOrder->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
		<td data-name="Formula"<?php echo $view_lab_service_sub->Formula->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->Formula->editAttributes() ?>><?php echo $view_lab_service_sub->Formula->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->Formula->editAttributes() ?>><?php echo $view_lab_service_sub->Formula->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub->Formula->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Formula->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $view_lab_service_sub->Inactive->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<div id="tp_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_sub->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_sub_grid->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<div id="tp_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_sub->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_sub_grid->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub->Inactive->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Inactive->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource"<?php echo $view_lab_service_sub->Outsource->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Outsource->EditValue ?>"<?php echo $view_lab_service_sub->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Outsource->EditValue ?>"<?php echo $view_lab_service_sub->Outsource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub->Outsource->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Outsource->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $view_lab_service_sub->CollSample->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CollSample->EditValue ?>"<?php echo $view_lab_service_sub->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CollSample->EditValue ?>"<?php echo $view_lab_service_sub->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCnt ?>_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub->CollSample->viewAttributes() ?>>
<?php echo $view_lab_service_sub->CollSample->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_grid->ListOptions->render("body", "right", $view_lab_service_sub_grid->RowCnt);
?>
	</tr>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD || $view_lab_service_sub->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_lab_service_subgrid.updateLists(<?php echo $view_lab_service_sub_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_service_sub->isGridAdd() || $view_lab_service_sub->CurrentMode == "copy")
		if (!$view_lab_service_sub_grid->Recordset->EOF)
			$view_lab_service_sub_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_lab_service_sub->CurrentMode == "add" || $view_lab_service_sub->CurrentMode == "copy" || $view_lab_service_sub->CurrentMode == "edit") {
		$view_lab_service_sub_grid->RowIndex = '$rowindex$';
		$view_lab_service_sub_grid->loadRowValues();

		// Set row properties
		$view_lab_service_sub->resetAttributes();
		$view_lab_service_sub->RowAttrs = array_merge($view_lab_service_sub->RowAttrs, array('data-rowindex'=>$view_lab_service_sub_grid->RowIndex, 'id'=>'r0_view_lab_service_sub', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_lab_service_sub->RowAttrs["class"], "ew-template");
		$view_lab_service_sub->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_service_sub_grid->renderRow();

		// Render list options
		$view_lab_service_sub_grid->renderListOptions();
		$view_lab_service_sub_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_grid->ListOptions->render("body", "left", $view_lab_service_sub_grid->RowIndex);
?>
	<?php if ($view_lab_service_sub->Id->Visible) { // Id ?>
		<td data-name="Id">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Id" class="form-group view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<?php if ($view_lab_service_sub->CODE->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->CODE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CODE->EditValue ?>"<?php echo $view_lab_service_sub->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->CODE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub->SERVICE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub->SERVICE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->SERVICE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS"><?php echo strval($view_lab_service_sub->UNITS->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_lab_service_sub->UNITS->ViewValue) : $view_lab_service_sub->UNITS->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_lab_service_sub->UNITS->ReadOnly || $view_lab_service_sub->UNITS->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub->UNITS->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub->UNITS->Lookup->getParamTag("p_x" . $view_lab_service_sub_grid->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_sub->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub->UNITS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub->UNITS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->UNITS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_HospID" class="form-group view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub->TestSubCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub->TestSubCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->TestSubCd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Method->EditValue ?>"<?php echo $view_lab_service_sub->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Method->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Order->EditValue ?>"<?php echo $view_lab_service_sub->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Order->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->ResType->EditValue ?>"<?php echo $view_lab_service_sub->ResType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub->ResType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->ResType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub->UnitCD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub->UnitCD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->UnitCD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Sample->EditValue ?>"<?php echo $view_lab_service_sub->Sample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub->Sample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Sample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->NoD->EditValue ?>"<?php echo $view_lab_service_sub->NoD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub->NoD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->NoD->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub->BillOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub->BillOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->BillOrder->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
		<td data-name="Formula">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->Formula->editAttributes() ?>><?php echo $view_lab_service_sub->Formula->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub->Formula->viewAttributes() ?>>
<?php echo $view_lab_service_sub->Formula->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub->Formula->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<div id="tp_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_sub->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_sub_grid->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub->Inactive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Inactive->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Outsource->EditValue ?>"<?php echo $view_lab_service_sub->Outsource->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub->Outsource->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->Outsource->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CollSample->EditValue ?>"<?php echo $view_lab_service_sub->CollSample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub->CollSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->CollSample->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub->CollSample->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_grid->ListOptions->render("body", "right", $view_lab_service_sub_grid->RowIndex);
?>
<script>
fview_lab_service_subgrid.updateLists(<?php echo $view_lab_service_sub_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($view_lab_service_sub->CurrentMode == "add" || $view_lab_service_sub->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_lab_service_sub_grid->FormKeyCountName ?>" id="<?php echo $view_lab_service_sub_grid->FormKeyCountName ?>" value="<?php echo $view_lab_service_sub_grid->KeyCount ?>">
<?php echo $view_lab_service_sub_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_service_sub->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_lab_service_sub_grid->FormKeyCountName ?>" id="<?php echo $view_lab_service_sub_grid->FormKeyCountName ?>" value="<?php echo $view_lab_service_sub_grid->KeyCount ?>">
<?php echo $view_lab_service_sub_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_lab_service_sub->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_lab_service_subgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_lab_service_sub_grid->Recordset)
	$view_lab_service_sub_grid->Recordset->Close();
?>
</div>
<?php if ($view_lab_service_sub_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_lab_service_sub_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_service_sub_grid->TotalRecs == 0 && !$view_lab_service_sub->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_service_sub_grid->terminate();
?>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_service_sub", "95%", "");
</script>
<?php } ?>