<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$view_lab_service_sub_grid->isExport()) { ?>
<script>
var fview_lab_service_subgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_lab_service_subgrid = new ew.Form("fview_lab_service_subgrid", "grid");
	fview_lab_service_subgrid.formKeyCountName = '<?php echo $view_lab_service_sub_grid->FormKeyCountName ?>';

	// Validate form
	fview_lab_service_subgrid.validate = function() {
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
			<?php if ($view_lab_service_sub_grid->Id->Required) { ?>
				elm = this.getElements("x" + infix + "_Id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Id->caption(), $view_lab_service_sub_grid->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->CODE->caption(), $view_lab_service_sub_grid->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->SERVICE->caption(), $view_lab_service_sub_grid->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->UNITS->caption(), $view_lab_service_sub_grid->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->HospID->caption(), $view_lab_service_sub_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->TestSubCd->caption(), $view_lab_service_sub_grid->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Method->caption(), $view_lab_service_sub_grid->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Order->caption(), $view_lab_service_sub_grid->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_grid->Order->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_grid->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->ResType->caption(), $view_lab_service_sub_grid->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->UnitCD->caption(), $view_lab_service_sub_grid->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Sample->caption(), $view_lab_service_sub_grid->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->NoD->caption(), $view_lab_service_sub_grid->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_grid->NoD->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_grid->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->BillOrder->caption(), $view_lab_service_sub_grid->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub_grid->BillOrder->errorMessage()) ?>");
			<?php if ($view_lab_service_sub_grid->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Formula->caption(), $view_lab_service_sub_grid->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Inactive->caption(), $view_lab_service_sub_grid->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->Outsource->caption(), $view_lab_service_sub_grid->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_sub_grid->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub_grid->CollSample->caption(), $view_lab_service_sub_grid->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fview_lab_service_subgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_service_subgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_service_subgrid.lists["x_UNITS"] = <?php echo $view_lab_service_sub_grid->UNITS->Lookup->toClientList($view_lab_service_sub_grid) ?>;
	fview_lab_service_subgrid.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_grid->UNITS->lookupOptions()) ?>;
	fview_lab_service_subgrid.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_grid->Inactive->Lookup->toClientList($view_lab_service_sub_grid) ?>;
	fview_lab_service_subgrid.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_grid->Inactive->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_service_subgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_lab_service_sub_grid->renderOtherOptions();
?>
<?php if ($view_lab_service_sub_grid->TotalRecords > 0 || $view_lab_service_sub->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_service_sub_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service_sub">
<?php if ($view_lab_service_sub_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_lab_service_sub_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_lab_service_subgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_lab_service_sub" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_lab_service_subgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_service_sub->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_service_sub_grid->renderListOptions();

// Render list options (header, left)
$view_lab_service_sub_grid->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_sub_grid->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub_grid->Id->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub_grid->Id->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub_grid->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub_grid->CODE->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub_grid->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub_grid->SERVICE->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->SERVICE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->SERVICE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub_grid->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub_grid->UNITS->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->UNITS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->UNITS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub_grid->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub_grid->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub_grid->TestSubCd->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub_grid->Method->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub_grid->Method->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub_grid->Order->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub_grid->Order->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub_grid->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub_grid->ResType->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub_grid->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub_grid->UnitCD->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->UnitCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->UnitCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->UnitCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub_grid->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub_grid->Sample->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub_grid->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub_grid->NoD->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub_grid->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub_grid->BillOrder->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->Formula->Visible) { // Formula ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Formula) == "") { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub_grid->Formula->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Formula->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub_grid->Formula->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Formula->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Formula->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Formula->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub_grid->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub_grid->Inactive->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub_grid->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub_grid->Outsource->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->Outsource->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->Outsource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->Outsource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_grid->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_sub_grid->SortUrl($view_lab_service_sub_grid->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub_grid->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub_grid->CollSample->headerCellClass() ?>"><div><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_grid->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_grid->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_grid->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$view_lab_service_sub_grid->StartRecord = 1;
$view_lab_service_sub_grid->StopRecord = $view_lab_service_sub_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_lab_service_sub->isConfirm() || $view_lab_service_sub_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_lab_service_sub_grid->FormKeyCountName) && ($view_lab_service_sub_grid->isGridAdd() || $view_lab_service_sub_grid->isGridEdit() || $view_lab_service_sub->isConfirm())) {
		$view_lab_service_sub_grid->KeyCount = $CurrentForm->getValue($view_lab_service_sub_grid->FormKeyCountName);
		$view_lab_service_sub_grid->StopRecord = $view_lab_service_sub_grid->StartRecord + $view_lab_service_sub_grid->KeyCount - 1;
	}
}
$view_lab_service_sub_grid->RecordCount = $view_lab_service_sub_grid->StartRecord - 1;
if ($view_lab_service_sub_grid->Recordset && !$view_lab_service_sub_grid->Recordset->EOF) {
	$view_lab_service_sub_grid->Recordset->moveFirst();
	$selectLimit = $view_lab_service_sub_grid->UseSelectLimit;
	if (!$selectLimit && $view_lab_service_sub_grid->StartRecord > 1)
		$view_lab_service_sub_grid->Recordset->move($view_lab_service_sub_grid->StartRecord - 1);
} elseif (!$view_lab_service_sub->AllowAddDeleteRow && $view_lab_service_sub_grid->StopRecord == 0) {
	$view_lab_service_sub_grid->StopRecord = $view_lab_service_sub->GridAddRowCount;
}

// Initialize aggregate
$view_lab_service_sub->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_service_sub->resetAttributes();
$view_lab_service_sub_grid->renderRow();
if ($view_lab_service_sub_grid->isGridAdd())
	$view_lab_service_sub_grid->RowIndex = 0;
if ($view_lab_service_sub_grid->isGridEdit())
	$view_lab_service_sub_grid->RowIndex = 0;
while ($view_lab_service_sub_grid->RecordCount < $view_lab_service_sub_grid->StopRecord) {
	$view_lab_service_sub_grid->RecordCount++;
	if ($view_lab_service_sub_grid->RecordCount >= $view_lab_service_sub_grid->StartRecord) {
		$view_lab_service_sub_grid->RowCount++;
		if ($view_lab_service_sub_grid->isGridAdd() || $view_lab_service_sub_grid->isGridEdit() || $view_lab_service_sub->isConfirm()) {
			$view_lab_service_sub_grid->RowIndex++;
			$CurrentForm->Index = $view_lab_service_sub_grid->RowIndex;
			if ($CurrentForm->hasValue($view_lab_service_sub_grid->FormActionName) && ($view_lab_service_sub->isConfirm() || $view_lab_service_sub_grid->EventCancelled))
				$view_lab_service_sub_grid->RowAction = strval($CurrentForm->getValue($view_lab_service_sub_grid->FormActionName));
			elseif ($view_lab_service_sub_grid->isGridAdd())
				$view_lab_service_sub_grid->RowAction = "insert";
			else
				$view_lab_service_sub_grid->RowAction = "";
		}

		// Set up key count
		$view_lab_service_sub_grid->KeyCount = $view_lab_service_sub_grid->RowIndex;

		// Init row class and style
		$view_lab_service_sub->resetAttributes();
		$view_lab_service_sub->CssClass = "";
		if ($view_lab_service_sub_grid->isGridAdd()) {
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
		if ($view_lab_service_sub_grid->isGridAdd()) // Grid add
			$view_lab_service_sub->RowType = ROWTYPE_ADD; // Render add
		if ($view_lab_service_sub_grid->isGridAdd() && $view_lab_service_sub->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values
		if ($view_lab_service_sub_grid->isGridEdit()) { // Grid edit
			if ($view_lab_service_sub->EventCancelled)
				$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values
			if ($view_lab_service_sub_grid->RowAction == "insert")
				$view_lab_service_sub->RowType = ROWTYPE_ADD; // Render add
			else
				$view_lab_service_sub->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_lab_service_sub_grid->isGridEdit() && ($view_lab_service_sub->RowType == ROWTYPE_EDIT || $view_lab_service_sub->RowType == ROWTYPE_ADD) && $view_lab_service_sub->EventCancelled) // Update failed
			$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values
		if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) // Edit row
			$view_lab_service_sub_grid->EditRowCount++;
		if ($view_lab_service_sub->isConfirm()) // Confirm row
			$view_lab_service_sub_grid->restoreCurrentRowFormValues($view_lab_service_sub_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_lab_service_sub->RowAttrs->merge(["data-rowindex" => $view_lab_service_sub_grid->RowCount, "id" => "r" . $view_lab_service_sub_grid->RowCount . "_view_lab_service_sub", "data-rowtype" => $view_lab_service_sub->RowType]);

		// Render row
		$view_lab_service_sub_grid->renderRow();

		// Render list options
		$view_lab_service_sub_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_lab_service_sub_grid->RowAction != "delete" && $view_lab_service_sub_grid->RowAction != "insertdelete" && !($view_lab_service_sub_grid->RowAction == "insert" && $view_lab_service_sub->isConfirm() && $view_lab_service_sub_grid->emptyRow())) {
?>
	<tr <?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_grid->ListOptions->render("body", "left", $view_lab_service_sub_grid->RowCount);
?>
	<?php if ($view_lab_service_sub_grid->Id->Visible) { // Id ?>
		<td data-name="Id" <?php echo $view_lab_service_sub_grid->Id->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Id" class="form-group"></span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Id" class="form-group">
<span<?php echo $view_lab_service_sub_grid->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub_grid->Id->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Id->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $view_lab_service_sub_grid->CODE->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_lab_service_sub_grid->CODE->getSessionValue() != "") { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<span<?php echo $view_lab_service_sub_grid->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->CODE->EditValue ?>"<?php echo $view_lab_service_sub_grid->CODE->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_lab_service_sub_grid->CODE->getSessionValue() != "") { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<span<?php echo $view_lab_service_sub_grid->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->CODE->EditValue ?>"<?php echo $view_lab_service_sub_grid->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_grid->CODE->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->CODE->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" <?php echo $view_lab_service_sub_grid->SERVICE->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_SERVICE" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub_grid->SERVICE->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_SERVICE" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub_grid->SERVICE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub_grid->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->SERVICE->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS" <?php echo $view_lab_service_sub_grid->UNITS->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_UNITS" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_sub_grid->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_sub_grid->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub_grid->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_sub_grid->UNITS->ReadOnly || $view_lab_service_sub_grid->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub_grid->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_grid->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub_grid->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub_grid->UNITS->Lookup->getParamTag($view_lab_service_sub_grid, "p_x" . $view_lab_service_sub_grid->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub_grid->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_sub_grid->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub_grid->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_UNITS" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_sub_grid->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_sub_grid->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub_grid->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_sub_grid->UNITS->ReadOnly || $view_lab_service_sub_grid->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub_grid->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_grid->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub_grid->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub_grid->UNITS->Lookup->getParamTag($view_lab_service_sub_grid, "p_x" . $view_lab_service_sub_grid->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub_grid->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_sub_grid->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub_grid->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub_grid->UNITS->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->UNITS->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_service_sub_grid->HospID->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub_grid->HospID->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $view_lab_service_sub_grid->TestSubCd->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_TestSubCd" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub_grid->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_TestSubCd" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub_grid->TestSubCd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub_grid->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->TestSubCd->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $view_lab_service_sub_grid->Method->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Method" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Method->EditValue ?>"<?php echo $view_lab_service_sub_grid->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Method" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Method->EditValue ?>"<?php echo $view_lab_service_sub_grid->Method->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub_grid->Method->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Method->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_lab_service_sub_grid->Order->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Order" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Order->EditValue ?>"<?php echo $view_lab_service_sub_grid->Order->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Order" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Order->EditValue ?>"<?php echo $view_lab_service_sub_grid->Order->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub_grid->Order->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Order->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $view_lab_service_sub_grid->ResType->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_ResType" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->ResType->EditValue ?>"<?php echo $view_lab_service_sub_grid->ResType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_ResType" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->ResType->EditValue ?>"<?php echo $view_lab_service_sub_grid->ResType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub_grid->ResType->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->ResType->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD" <?php echo $view_lab_service_sub_grid->UnitCD->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_UnitCD" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub_grid->UnitCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_UnitCD" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub_grid->UnitCD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub_grid->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->UnitCD->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $view_lab_service_sub_grid->Sample->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Sample" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Sample->EditValue ?>"<?php echo $view_lab_service_sub_grid->Sample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Sample" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Sample->EditValue ?>"<?php echo $view_lab_service_sub_grid->Sample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub_grid->Sample->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Sample->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $view_lab_service_sub_grid->NoD->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_NoD" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->NoD->EditValue ?>"<?php echo $view_lab_service_sub_grid->NoD->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_NoD" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->NoD->EditValue ?>"<?php echo $view_lab_service_sub_grid->NoD->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub_grid->NoD->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->NoD->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $view_lab_service_sub_grid->BillOrder->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_BillOrder" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub_grid->BillOrder->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_BillOrder" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub_grid->BillOrder->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub_grid->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->BillOrder->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Formula->Visible) { // Formula ?>
		<td data-name="Formula" <?php echo $view_lab_service_sub_grid->Formula->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Formula" class="form-group">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_grid->Formula->editAttributes() ?>><?php echo $view_lab_service_sub_grid->Formula->EditValue ?></textarea>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Formula" class="form-group">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_grid->Formula->editAttributes() ?>><?php echo $view_lab_service_sub_grid->Formula->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub_grid->Formula->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Formula->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $view_lab_service_sub_grid->Inactive->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Inactive" class="form-group">
<div id="tp_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub_grid->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_sub_grid->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub_grid->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_sub_grid->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Inactive" class="form-group">
<div id="tp_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub_grid->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_sub_grid->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub_grid->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_sub_grid->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub_grid->Inactive->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Inactive->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource" <?php echo $view_lab_service_sub_grid->Outsource->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Outsource" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Outsource->EditValue ?>"<?php echo $view_lab_service_sub_grid->Outsource->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Outsource" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Outsource->EditValue ?>"<?php echo $view_lab_service_sub_grid->Outsource->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub_grid->Outsource->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Outsource->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $view_lab_service_sub_grid->CollSample->cellAttributes() ?>>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CollSample" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->CollSample->EditValue ?>"<?php echo $view_lab_service_sub_grid->CollSample->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CollSample" class="form-group">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->CollSample->EditValue ?>"<?php echo $view_lab_service_sub_grid->CollSample->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_lab_service_sub_grid->RowCount ?>_view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub_grid->CollSample->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->CollSample->getViewValue() ?></span>
</span>
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="fview_lab_service_subgrid$x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="fview_lab_service_subgrid$o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_grid->ListOptions->render("body", "right", $view_lab_service_sub_grid->RowCount);
?>
	</tr>
<?php if ($view_lab_service_sub->RowType == ROWTYPE_ADD || $view_lab_service_sub->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_lab_service_subgrid", "load"], function() {
	fview_lab_service_subgrid.updateLists(<?php echo $view_lab_service_sub_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_lab_service_sub_grid->isGridAdd() || $view_lab_service_sub->CurrentMode == "copy")
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
		$view_lab_service_sub->RowAttrs->merge(["data-rowindex" => $view_lab_service_sub_grid->RowIndex, "id" => "r0_view_lab_service_sub", "data-rowtype" => ROWTYPE_ADD]);
		$view_lab_service_sub->RowAttrs->appendClass("ew-template");
		$view_lab_service_sub->RowType = ROWTYPE_ADD;

		// Render row
		$view_lab_service_sub_grid->renderRow();

		// Render list options
		$view_lab_service_sub_grid->renderListOptions();
		$view_lab_service_sub_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_grid->ListOptions->render("body", "left", $view_lab_service_sub_grid->RowIndex);
?>
	<?php if ($view_lab_service_sub_grid->Id->Visible) { // Id ?>
		<td data-name="Id">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Id" class="form-group view_lab_service_sub_Id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Id" class="form-group view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub_grid->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->CODE->Visible) { // CODE ?>
		<td data-name="CODE">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<?php if ($view_lab_service_sub_grid->CODE->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_grid->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->CODE->EditValue ?>"<?php echo $view_lab_service_sub_grid->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_grid->CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub_grid->SERVICE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub_grid->SERVICE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->SERVICE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_SERVICE" value="<?php echo HtmlEncode($view_lab_service_sub_grid->SERVICE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS"><?php echo EmptyValue(strval($view_lab_service_sub_grid->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_sub_grid->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub_grid->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_sub_grid->UNITS->ReadOnly || $view_lab_service_sub_grid->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub_grid->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub_grid->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub_grid->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub_grid->UNITS->Lookup->getParamTag($view_lab_service_sub_grid, "p_x" . $view_lab_service_sub_grid->RowIndex . "_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub_grid->UNITS->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo $view_lab_service_sub_grid->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub_grid->UNITS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub_grid->UNITS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->UNITS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UNITS" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UNITS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_HospID" class="form-group view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_lab_service_sub_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub_grid->TestSubCd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub_grid->TestSubCd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->TestSubCd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($view_lab_service_sub_grid->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Method->EditValue ?>"<?php echo $view_lab_service_sub_grid->Method->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub_grid->Method->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Method->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Order->Visible) { // Order ?>
		<td data-name="Order">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Order->EditValue ?>"<?php echo $view_lab_service_sub_grid->Order->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub_grid->Order->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Order->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Order" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Order->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->ResType->Visible) { // ResType ?>
		<td data-name="ResType">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->ResType->EditValue ?>"<?php echo $view_lab_service_sub_grid->ResType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub_grid->ResType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->ResType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_ResType" value="<?php echo HtmlEncode($view_lab_service_sub_grid->ResType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub_grid->UnitCD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub_grid->UnitCD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->UnitCD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_UnitCD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->UnitCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Sample->Visible) { // Sample ?>
		<td data-name="Sample">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Sample->EditValue ?>"<?php echo $view_lab_service_sub_grid->Sample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub_grid->Sample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Sample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Sample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Sample->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->NoD->Visible) { // NoD ?>
		<td data-name="NoD">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->NoD->EditValue ?>"<?php echo $view_lab_service_sub_grid->NoD->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub_grid->NoD->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->NoD->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_NoD" value="<?php echo HtmlEncode($view_lab_service_sub_grid->NoD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub_grid->BillOrder->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub_grid->BillOrder->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->BillOrder->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_BillOrder" value="<?php echo HtmlEncode($view_lab_service_sub_grid->BillOrder->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Formula->Visible) { // Formula ?>
		<td data-name="Formula">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub_grid->Formula->editAttributes() ?>><?php echo $view_lab_service_sub_grid->Formula->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub_grid->Formula->viewAttributes() ?>><?php echo $view_lab_service_sub_grid->Formula->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Formula" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Formula->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<div id="tp_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub_grid->Inactive->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="{value}"<?php echo $view_lab_service_sub_grid->Inactive->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub_grid->Inactive->checkBoxListHtml(FALSE, "x{$view_lab_service_sub_grid->RowIndex}_Inactive[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub_grid->Inactive->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Inactive->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Inactive[]" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Inactive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->Outsource->EditValue ?>"<?php echo $view_lab_service_sub_grid->Outsource->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub_grid->Outsource->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->Outsource->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_Outsource" value="<?php echo HtmlEncode($view_lab_service_sub_grid->Outsource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_grid->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample">
<?php if (!$view_lab_service_sub->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_grid->CollSample->EditValue ?>"<?php echo $view_lab_service_sub_grid->CollSample->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub_grid->CollSample->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_sub_grid->CollSample->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="x<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" name="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" id="o<?php echo $view_lab_service_sub_grid->RowIndex ?>_CollSample" value="<?php echo HtmlEncode($view_lab_service_sub_grid->CollSample->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_grid->ListOptions->render("body", "right", $view_lab_service_sub_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_service_subgrid", "load"], function() {
	fview_lab_service_subgrid.updateLists(<?php echo $view_lab_service_sub_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_service_sub_grid->Recordset)
	$view_lab_service_sub_grid->Recordset->Close();
?>
<?php if ($view_lab_service_sub_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_lab_service_sub_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_service_sub_grid->TotalRecords == 0 && !$view_lab_service_sub->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_lab_service_sub_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='id']").hide(),$("[data-name='id']").width("8px"),$("[data-name='UNITS']").width("8px"),$("[data-name='TestSubCd']").width("8px"),$("[data-name='Method']").width("8px"),$("[data-name='Order']").width("8px"),$("[data-name='ResType']").width("8px"),$("[data-name='UnitCD']").width("8px"),$("[data-name='Sample']").width("8px"),$("[data-name='NoD']").width("8px"),$("[data-name='BillOrder']").width("8px"),$("[data-name='Formula']").width("8px"),$("[data-name='Inactive']").width("8px"),$("[data-name='Outsource']").width("8px"),$("[data-name='CollSample']").width("8px");
});
</script>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_service_sub",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_lab_service_sub_grid->terminate();
?>