<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pharmacy_purchase_request_items_grid))
	$pharmacy_purchase_request_items_grid = new pharmacy_purchase_request_items_grid();

// Run the page
$pharmacy_purchase_request_items_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_grid->Page_Render();
?>
<?php if (!$pharmacy_purchase_request_items_grid->isExport()) { ?>
<script>
var fpharmacy_purchase_request_itemsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpharmacy_purchase_request_itemsgrid = new ew.Form("fpharmacy_purchase_request_itemsgrid", "grid");
	fpharmacy_purchase_request_itemsgrid.formKeyCountName = '<?php echo $pharmacy_purchase_request_items_grid->FormKeyCountName ?>';

	// Validate form
	fpharmacy_purchase_request_itemsgrid.validate = function() {
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
			<?php if ($pharmacy_purchase_request_items_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->id->caption(), $pharmacy_purchase_request_items_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->PRC->Required) { ?>
				elm = this.getElements("x" + infix + "_PRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->PRC->caption(), $pharmacy_purchase_request_items_grid->PRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->PrName->Required) { ?>
				elm = this.getElements("x" + infix + "_PrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->PrName->caption(), $pharmacy_purchase_request_items_grid->PrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->Quantity->Required) { ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->Quantity->caption(), $pharmacy_purchase_request_items_grid->Quantity->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Quantity");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_grid->Quantity->errorMessage()) ?>");
			<?php if ($pharmacy_purchase_request_items_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->HospID->caption(), $pharmacy_purchase_request_items_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->createdby->caption(), $pharmacy_purchase_request_items_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->createddatetime->caption(), $pharmacy_purchase_request_items_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->modifiedby->caption(), $pharmacy_purchase_request_items_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->modifieddatetime->caption(), $pharmacy_purchase_request_items_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->BRCODE->caption(), $pharmacy_purchase_request_items_grid->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_purchase_request_items_grid->prid->Required) { ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_purchase_request_items_grid->prid->caption(), $pharmacy_purchase_request_items_grid->prid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_prid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_purchase_request_items_grid->prid->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpharmacy_purchase_request_itemsgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "PRC", false)) return false;
		if (ew.valueChanged(fobj, infix, "PrName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Quantity", false)) return false;
		if (ew.valueChanged(fobj, infix, "prid", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpharmacy_purchase_request_itemsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_purchase_request_itemsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_purchase_request_itemsgrid.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_grid->PrName->Lookup->toClientList($pharmacy_purchase_request_items_grid) ?>;
	fpharmacy_purchase_request_itemsgrid.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_grid->PrName->lookupOptions()) ?>;
	fpharmacy_purchase_request_itemsgrid.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fpharmacy_purchase_request_itemsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$pharmacy_purchase_request_items_grid->renderOtherOptions();
?>
<?php if ($pharmacy_purchase_request_items_grid->TotalRecords > 0 || $pharmacy_purchase_request_items->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchase_request_items_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request_items">
<?php if ($pharmacy_purchase_request_items_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pharmacy_purchase_request_items_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_purchase_request_itemsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_purchase_request_items" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_purchase_request_itemsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchase_request_items->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchase_request_items_grid->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_items_grid->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request_items_grid->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_items_grid->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request_items_grid->id->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchase_request_items_grid->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_purchase_request_items_grid->PRC->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->PrName->Visible) { // PrName ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_purchase_request_items_grid->PrName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $pharmacy_purchase_request_items_grid->PrName->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->Quantity->Visible) { // Quantity ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $pharmacy_purchase_request_items_grid->Quantity->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $pharmacy_purchase_request_items_grid->Quantity->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_items_grid->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request_items_grid->HospID->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_items_grid->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request_items_grid->createdby->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_items_grid->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request_items_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_items_grid->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request_items_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_items_grid->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request_items_grid->BRCODE->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->prid->Visible) { // prid ?>
	<?php if ($pharmacy_purchase_request_items_grid->SortUrl($pharmacy_purchase_request_items_grid->prid) == "") { ?>
		<th data-name="prid" class="<?php echo $pharmacy_purchase_request_items_grid->prid->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->prid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prid" class="<?php echo $pharmacy_purchase_request_items_grid->prid->headerCellClass() ?>"><div><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request_items_grid->prid->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request_items_grid->prid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request_items_grid->prid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchase_request_items_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pharmacy_purchase_request_items_grid->StartRecord = 1;
$pharmacy_purchase_request_items_grid->StopRecord = $pharmacy_purchase_request_items_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($pharmacy_purchase_request_items->isConfirm() || $pharmacy_purchase_request_items_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_purchase_request_items_grid->FormKeyCountName) && ($pharmacy_purchase_request_items_grid->isGridAdd() || $pharmacy_purchase_request_items_grid->isGridEdit() || $pharmacy_purchase_request_items->isConfirm())) {
		$pharmacy_purchase_request_items_grid->KeyCount = $CurrentForm->getValue($pharmacy_purchase_request_items_grid->FormKeyCountName);
		$pharmacy_purchase_request_items_grid->StopRecord = $pharmacy_purchase_request_items_grid->StartRecord + $pharmacy_purchase_request_items_grid->KeyCount - 1;
	}
}
$pharmacy_purchase_request_items_grid->RecordCount = $pharmacy_purchase_request_items_grid->StartRecord - 1;
if ($pharmacy_purchase_request_items_grid->Recordset && !$pharmacy_purchase_request_items_grid->Recordset->EOF) {
	$pharmacy_purchase_request_items_grid->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchase_request_items_grid->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchase_request_items_grid->StartRecord > 1)
		$pharmacy_purchase_request_items_grid->Recordset->move($pharmacy_purchase_request_items_grid->StartRecord - 1);
} elseif (!$pharmacy_purchase_request_items->AllowAddDeleteRow && $pharmacy_purchase_request_items_grid->StopRecord == 0) {
	$pharmacy_purchase_request_items_grid->StopRecord = $pharmacy_purchase_request_items->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchase_request_items->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchase_request_items->resetAttributes();
$pharmacy_purchase_request_items_grid->renderRow();
if ($pharmacy_purchase_request_items_grid->isGridAdd())
	$pharmacy_purchase_request_items_grid->RowIndex = 0;
if ($pharmacy_purchase_request_items_grid->isGridEdit())
	$pharmacy_purchase_request_items_grid->RowIndex = 0;
while ($pharmacy_purchase_request_items_grid->RecordCount < $pharmacy_purchase_request_items_grid->StopRecord) {
	$pharmacy_purchase_request_items_grid->RecordCount++;
	if ($pharmacy_purchase_request_items_grid->RecordCount >= $pharmacy_purchase_request_items_grid->StartRecord) {
		$pharmacy_purchase_request_items_grid->RowCount++;
		if ($pharmacy_purchase_request_items_grid->isGridAdd() || $pharmacy_purchase_request_items_grid->isGridEdit() || $pharmacy_purchase_request_items->isConfirm()) {
			$pharmacy_purchase_request_items_grid->RowIndex++;
			$CurrentForm->Index = $pharmacy_purchase_request_items_grid->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_purchase_request_items_grid->FormActionName) && ($pharmacy_purchase_request_items->isConfirm() || $pharmacy_purchase_request_items_grid->EventCancelled))
				$pharmacy_purchase_request_items_grid->RowAction = strval($CurrentForm->getValue($pharmacy_purchase_request_items_grid->FormActionName));
			elseif ($pharmacy_purchase_request_items_grid->isGridAdd())
				$pharmacy_purchase_request_items_grid->RowAction = "insert";
			else
				$pharmacy_purchase_request_items_grid->RowAction = "";
		}

		// Set up key count
		$pharmacy_purchase_request_items_grid->KeyCount = $pharmacy_purchase_request_items_grid->RowIndex;

		// Init row class and style
		$pharmacy_purchase_request_items->resetAttributes();
		$pharmacy_purchase_request_items->CssClass = "";
		if ($pharmacy_purchase_request_items_grid->isGridAdd()) {
			if ($pharmacy_purchase_request_items->CurrentMode == "copy") {
				$pharmacy_purchase_request_items_grid->loadRowValues($pharmacy_purchase_request_items_grid->Recordset); // Load row values
				$pharmacy_purchase_request_items_grid->setRecordKey($pharmacy_purchase_request_items_grid->RowOldKey, $pharmacy_purchase_request_items_grid->Recordset); // Set old record key
			} else {
				$pharmacy_purchase_request_items_grid->loadRowValues(); // Load default values
				$pharmacy_purchase_request_items_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pharmacy_purchase_request_items_grid->loadRowValues($pharmacy_purchase_request_items_grid->Recordset); // Load row values
		}
		$pharmacy_purchase_request_items->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_purchase_request_items_grid->isGridAdd()) // Grid add
			$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_purchase_request_items_grid->isGridAdd() && $pharmacy_purchase_request_items->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_purchase_request_items_grid->restoreCurrentRowFormValues($pharmacy_purchase_request_items_grid->RowIndex); // Restore form values
		if ($pharmacy_purchase_request_items_grid->isGridEdit()) { // Grid edit
			if ($pharmacy_purchase_request_items->EventCancelled)
				$pharmacy_purchase_request_items_grid->restoreCurrentRowFormValues($pharmacy_purchase_request_items_grid->RowIndex); // Restore form values
			if ($pharmacy_purchase_request_items_grid->RowAction == "insert")
				$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_purchase_request_items->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_purchase_request_items_grid->isGridEdit() && ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT || $pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) && $pharmacy_purchase_request_items->EventCancelled) // Update failed
			$pharmacy_purchase_request_items_grid->restoreCurrentRowFormValues($pharmacy_purchase_request_items_grid->RowIndex); // Restore form values
		if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_purchase_request_items_grid->EditRowCount++;
		if ($pharmacy_purchase_request_items->isConfirm()) // Confirm row
			$pharmacy_purchase_request_items_grid->restoreCurrentRowFormValues($pharmacy_purchase_request_items_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pharmacy_purchase_request_items->RowAttrs->merge(["data-rowindex" => $pharmacy_purchase_request_items_grid->RowCount, "id" => "r" . $pharmacy_purchase_request_items_grid->RowCount . "_pharmacy_purchase_request_items", "data-rowtype" => $pharmacy_purchase_request_items->RowType]);

		// Render row
		$pharmacy_purchase_request_items_grid->renderRow();

		// Render list options
		$pharmacy_purchase_request_items_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_purchase_request_items_grid->RowAction != "delete" && $pharmacy_purchase_request_items_grid->RowAction != "insertdelete" && !($pharmacy_purchase_request_items_grid->RowAction == "insert" && $pharmacy_purchase_request_items->isConfirm() && $pharmacy_purchase_request_items_grid->emptyRow())) {
?>
	<tr <?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_grid->ListOptions->render("body", "left", $pharmacy_purchase_request_items_grid->RowCount);
?>
	<?php if ($pharmacy_purchase_request_items_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_purchase_request_items_grid->id->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group">
<span<?php echo $pharmacy_purchase_request_items_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items_grid->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->id->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $pharmacy_purchase_request_items_grid->PRC->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->PRC->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items_grid->PRC->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->PRC->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $pharmacy_purchase_request_items_grid->PrName->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $pharmacy_purchase_request_items_grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_grid->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid"], function() {
	fpharmacy_purchase_request_itemsgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_grid->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_grid, "p_x" . $pharmacy_purchase_request_items_grid->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $pharmacy_purchase_request_items_grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_grid->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid"], function() {
	fpharmacy_purchase_request_itemsgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_grid->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_grid, "p_x" . $pharmacy_purchase_request_items_grid->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items_grid->PrName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->PrName->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $pharmacy_purchase_request_items_grid->Quantity->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->Quantity->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->Quantity->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items_grid->Quantity->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->Quantity->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $pharmacy_purchase_request_items_grid->HospID->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items_grid->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $pharmacy_purchase_request_items_grid->createdby->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items_grid->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $pharmacy_purchase_request_items_grid->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items_grid->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $pharmacy_purchase_request_items_grid->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items_grid->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $pharmacy_purchase_request_items_grid->BRCODE->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items_grid->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->BRCODE->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->prid->Visible) { // prid ?>
		<td data-name="prid" <?php echo $pharmacy_purchase_request_items_grid->prid->cellAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pharmacy_purchase_request_items_grid->prid->getSessionValue() != "") { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?php echo $pharmacy_purchase_request_items_grid->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->prid->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pharmacy_purchase_request_items_grid->prid->getSessionValue() != "") { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?php echo $pharmacy_purchase_request_items_grid->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_purchase_request_items_grid->RowCount ?>_pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_grid->prid->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_grid->prid->getViewValue() ?></span>
</span>
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="fpharmacy_purchase_request_itemsgrid$x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="fpharmacy_purchase_request_itemsgrid$o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_grid->ListOptions->render("body", "right", $pharmacy_purchase_request_items_grid->RowCount);
?>
	</tr>
<?php if ($pharmacy_purchase_request_items->RowType == ROWTYPE_ADD || $pharmacy_purchase_request_items->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid", "load"], function() {
	fpharmacy_purchase_request_itemsgrid.updateLists(<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_purchase_request_items_grid->isGridAdd() || $pharmacy_purchase_request_items->CurrentMode == "copy")
		if (!$pharmacy_purchase_request_items_grid->Recordset->EOF)
			$pharmacy_purchase_request_items_grid->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_purchase_request_items->CurrentMode == "add" || $pharmacy_purchase_request_items->CurrentMode == "copy" || $pharmacy_purchase_request_items->CurrentMode == "edit") {
		$pharmacy_purchase_request_items_grid->RowIndex = '$rowindex$';
		$pharmacy_purchase_request_items_grid->loadRowValues();

		// Set row properties
		$pharmacy_purchase_request_items->resetAttributes();
		$pharmacy_purchase_request_items->RowAttrs->merge(["data-rowindex" => $pharmacy_purchase_request_items_grid->RowIndex, "id" => "r0_pharmacy_purchase_request_items", "data-rowtype" => ROWTYPE_ADD]);
		$pharmacy_purchase_request_items->RowAttrs->appendClass("ew-template");
		$pharmacy_purchase_request_items->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_purchase_request_items_grid->renderRow();

		// Render list options
		$pharmacy_purchase_request_items_grid->renderListOptions();
		$pharmacy_purchase_request_items_grid->StartRowCount = 0;
?>
	<tr <?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_items_grid->ListOptions->render("body", "left", $pharmacy_purchase_request_items_grid->RowIndex);
?>
	<?php if ($pharmacy_purchase_request_items_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->PRC->Visible) { // PRC ?>
		<td data-name="PRC">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->PRC->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->PRC->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items_grid->PRC->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->PRC->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PRC" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->PrName->Visible) { // PrName ?>
		<td data-name="PrName">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$onchange = $pharmacy_purchase_request_items_grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$pharmacy_purchase_request_items_grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName">
	<input type="text" class="form-control" name="sv_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="sv_x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo RemoveHtml($pharmacy_purchase_request_items_grid->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->getPlaceHolder()) ?>"<?php echo $pharmacy_purchase_request_items_grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-value-separator="<?php echo $pharmacy_purchase_request_items_grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid"], function() {
	fpharmacy_purchase_request_itemsgrid.createAutoSuggest({"id":"x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName","forceSelect":true});
});
</script>
<?php echo $pharmacy_purchase_request_items_grid->PrName->Lookup->getParamTag($pharmacy_purchase_request_items_grid, "p_x" . $pharmacy_purchase_request_items_grid->RowIndex . "_PrName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items_grid->PrName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->PrName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_PrName" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->PrName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->Quantity->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->Quantity->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items_grid->Quantity->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->Quantity->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_Quantity" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->Quantity->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_HospID" class="form-group pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_createdby" class="form-group pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_createddatetime" class="form-group pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_modifiedby" class="form-group pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_modifieddatetime" class="form-group pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_BRCODE" class="form-group pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items_grid->BRCODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->BRCODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_BRCODE" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->BRCODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_items_grid->prid->Visible) { // prid ?>
		<td data-name="prid">
<?php if (!$pharmacy_purchase_request_items->isConfirm()) { ?>
<?php if ($pharmacy_purchase_request_items_grid->prid->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_grid->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="text" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_purchase_request_items_grid->prid->EditValue ?>"<?php echo $pharmacy_purchase_request_items_grid->prid->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_grid->prid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_purchase_request_items_grid->prid->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="x<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" id="o<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>_prid" value="<?php echo HtmlEncode($pharmacy_purchase_request_items_grid->prid->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_items_grid->ListOptions->render("body", "right", $pharmacy_purchase_request_items_grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid", "load"], function() {
	fpharmacy_purchase_request_itemsgrid.updateLists(<?php echo $pharmacy_purchase_request_items_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($pharmacy_purchase_request_items->CurrentMode == "add" || $pharmacy_purchase_request_items->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pharmacy_purchase_request_items_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_purchase_request_items_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_purchase_request_items_grid->KeyCount ?>">
<?php echo $pharmacy_purchase_request_items_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pharmacy_purchase_request_items_grid->FormKeyCountName ?>" id="<?php echo $pharmacy_purchase_request_items_grid->FormKeyCountName ?>" value="<?php echo $pharmacy_purchase_request_items_grid->KeyCount ?>">
<?php echo $pharmacy_purchase_request_items_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpharmacy_purchase_request_itemsgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchase_request_items_grid->Recordset)
	$pharmacy_purchase_request_items_grid->Recordset->Close();
?>
<?php if ($pharmacy_purchase_request_items_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pharmacy_purchase_request_items_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchase_request_items_grid->TotalRecords == 0 && !$pharmacy_purchase_request_items->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_items_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$pharmacy_purchase_request_items_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_purchase_request_items->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_purchase_request_items",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$pharmacy_purchase_request_items_grid->terminate();
?>