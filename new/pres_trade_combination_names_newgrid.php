<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($pres_trade_combination_names_new_grid))
	$pres_trade_combination_names_new_grid = new pres_trade_combination_names_new_grid();

// Run the page
$pres_trade_combination_names_new_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_grid->Page_Render();
?>
<?php if (!$pres_trade_combination_names_new_grid->isExport()) { ?>
<script>
var fpres_trade_combination_names_newgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpres_trade_combination_names_newgrid = new ew.Form("fpres_trade_combination_names_newgrid", "grid");
	fpres_trade_combination_names_newgrid.formKeyCountName = '<?php echo $pres_trade_combination_names_new_grid->FormKeyCountName ?>';

	// Validate form
	fpres_trade_combination_names_newgrid.validate = function() {
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
			<?php if ($pres_trade_combination_names_new_grid->ID->Required) { ?>
				elm = this.getElements("x" + infix + "_ID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->ID->caption(), $pres_trade_combination_names_new_grid->ID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->tradenames_id->Required) { ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->tradenames_id->caption(), $pres_trade_combination_names_new_grid->tradenames_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_tradenames_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_trade_combination_names_new_grid->tradenames_id->errorMessage()) ?>");
			<?php if ($pres_trade_combination_names_new_grid->Drug_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Drug_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->Drug_Name->caption(), $pres_trade_combination_names_new_grid->Drug_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->Generic_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Generic_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->Generic_Name->caption(), $pres_trade_combination_names_new_grid->Generic_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->Trade_Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Trade_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->Trade_Name->caption(), $pres_trade_combination_names_new_grid->Trade_Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->PR_CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_PR_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->PR_CODE->caption(), $pres_trade_combination_names_new_grid->PR_CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->Form->caption(), $pres_trade_combination_names_new_grid->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->Strength->Required) { ?>
				elm = this.getElements("x" + infix + "_Strength");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->Strength->caption(), $pres_trade_combination_names_new_grid->Strength->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->Unit->caption(), $pres_trade_combination_names_new_grid->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->CONTAINER_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->CONTAINER_TYPE->caption(), $pres_trade_combination_names_new_grid->CONTAINER_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->Required) { ?>
				elm = this.getElements("x" + infix + "_CONTAINER_STRENGTH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->caption(), $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_trade_combination_names_new_grid->TypeOfDrug->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfDrug");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_trade_combination_names_new_grid->TypeOfDrug->caption(), $pres_trade_combination_names_new_grid->TypeOfDrug->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fpres_trade_combination_names_newgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "tradenames_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Drug_Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "Generic_Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "Trade_Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "PR_CODE", false)) return false;
		if (ew.valueChanged(fobj, infix, "Form", false)) return false;
		if (ew.valueChanged(fobj, infix, "Strength", false)) return false;
		if (ew.valueChanged(fobj, infix, "Unit", false)) return false;
		if (ew.valueChanged(fobj, infix, "CONTAINER_TYPE", false)) return false;
		if (ew.valueChanged(fobj, infix, "CONTAINER_STRENGTH", false)) return false;
		if (ew.valueChanged(fobj, infix, "TypeOfDrug", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fpres_trade_combination_names_newgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_trade_combination_names_newgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpres_trade_combination_names_newgrid.lists["x_Generic_Name"] = <?php echo $pres_trade_combination_names_new_grid->Generic_Name->Lookup->toClientList($pres_trade_combination_names_new_grid) ?>;
	fpres_trade_combination_names_newgrid.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_trade_combination_names_new_grid->Generic_Name->lookupOptions()) ?>;
	fpres_trade_combination_names_newgrid.lists["x_Form"] = <?php echo $pres_trade_combination_names_new_grid->Form->Lookup->toClientList($pres_trade_combination_names_new_grid) ?>;
	fpres_trade_combination_names_newgrid.lists["x_Form"].options = <?php echo JsonEncode($pres_trade_combination_names_new_grid->Form->lookupOptions()) ?>;
	fpres_trade_combination_names_newgrid.lists["x_Unit"] = <?php echo $pres_trade_combination_names_new_grid->Unit->Lookup->toClientList($pres_trade_combination_names_new_grid) ?>;
	fpres_trade_combination_names_newgrid.lists["x_Unit"].options = <?php echo JsonEncode($pres_trade_combination_names_new_grid->Unit->lookupOptions()) ?>;
	fpres_trade_combination_names_newgrid.lists["x_TypeOfDrug"] = <?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->Lookup->toClientList($pres_trade_combination_names_new_grid) ?>;
	fpres_trade_combination_names_newgrid.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_trade_combination_names_new_grid->TypeOfDrug->options(FALSE, TRUE)) ?>;
	loadjs.done("fpres_trade_combination_names_newgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$pres_trade_combination_names_new_grid->renderOtherOptions();
?>
<?php if ($pres_trade_combination_names_new_grid->TotalRecords > 0 || $pres_trade_combination_names_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_trade_combination_names_new_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names_new">
<?php if ($pres_trade_combination_names_new_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $pres_trade_combination_names_new_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpres_trade_combination_names_newgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pres_trade_combination_names_new" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pres_trade_combination_names_newgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_trade_combination_names_new->RowType = ROWTYPE_HEADER;

// Render list options
$pres_trade_combination_names_new_grid->renderListOptions();

// Render list options (header, left)
$pres_trade_combination_names_new_grid->ListOptions->render("header", "left");
?>
<?php if ($pres_trade_combination_names_new_grid->ID->Visible) { // ID ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $pres_trade_combination_names_new_grid->ID->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $pres_trade_combination_names_new_grid->ID->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->ID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->ID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->tradenames_id->Visible) { // tradenames_id ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->tradenames_id) == "") { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names_new_grid->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->tradenames_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tradenames_id" class="<?php echo $pres_trade_combination_names_new_grid->tradenames_id->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->tradenames_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->tradenames_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->tradenames_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->Drug_Name->Visible) { // Drug_Name ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->Drug_Name) == "") { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_trade_combination_names_new_grid->Drug_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Drug_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Drug_Name" class="<?php echo $pres_trade_combination_names_new_grid->Drug_Name->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Drug_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->Drug_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->Drug_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->Generic_Name->Visible) { // Generic_Name ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->Generic_Name) == "") { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_trade_combination_names_new_grid->Generic_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Generic_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generic_Name" class="<?php echo $pres_trade_combination_names_new_grid->Generic_Name->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Generic_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->Generic_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->Generic_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->Trade_Name->Visible) { // Trade_Name ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->Trade_Name) == "") { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_trade_combination_names_new_grid->Trade_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Trade_Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Trade_Name" class="<?php echo $pres_trade_combination_names_new_grid->Trade_Name->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Trade_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->Trade_Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->Trade_Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names_new_grid->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_trade_combination_names_new_grid->PR_CODE->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->PR_CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->PR_CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->PR_CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->Form->Visible) { // Form ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $pres_trade_combination_names_new_grid->Form->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $pres_trade_combination_names_new_grid->Form->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Form->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->Form->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->Form->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->Strength->Visible) { // Strength ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->Strength) == "") { ?>
		<th data-name="Strength" class="<?php echo $pres_trade_combination_names_new_grid->Strength->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Strength->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength" class="<?php echo $pres_trade_combination_names_new_grid->Strength->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Strength->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->Strength->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->Strength->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->Unit->Visible) { // Unit ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $pres_trade_combination_names_new_grid->Unit->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $pres_trade_combination_names_new_grid->Unit->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->CONTAINER_TYPE) == "") { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->CONTAINER_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->CONTAINER_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH) == "") { ?>
		<th data-name="CONTAINER_STRENGTH" class="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_STRENGTH" class="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<?php if ($pres_trade_combination_names_new_grid->SortUrl($pres_trade_combination_names_new_grid->TypeOfDrug) == "") { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><div class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfDrug" class="<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->headerCellClass() ?>"><div><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_trade_combination_names_new_grid->TypeOfDrug->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_trade_combination_names_new_grid->TypeOfDrug->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_trade_combination_names_new_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$pres_trade_combination_names_new_grid->StartRecord = 1;
$pres_trade_combination_names_new_grid->StopRecord = $pres_trade_combination_names_new_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($pres_trade_combination_names_new->isConfirm() || $pres_trade_combination_names_new_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pres_trade_combination_names_new_grid->FormKeyCountName) && ($pres_trade_combination_names_new_grid->isGridAdd() || $pres_trade_combination_names_new_grid->isGridEdit() || $pres_trade_combination_names_new->isConfirm())) {
		$pres_trade_combination_names_new_grid->KeyCount = $CurrentForm->getValue($pres_trade_combination_names_new_grid->FormKeyCountName);
		$pres_trade_combination_names_new_grid->StopRecord = $pres_trade_combination_names_new_grid->StartRecord + $pres_trade_combination_names_new_grid->KeyCount - 1;
	}
}
$pres_trade_combination_names_new_grid->RecordCount = $pres_trade_combination_names_new_grid->StartRecord - 1;
if ($pres_trade_combination_names_new_grid->Recordset && !$pres_trade_combination_names_new_grid->Recordset->EOF) {
	$pres_trade_combination_names_new_grid->Recordset->moveFirst();
	$selectLimit = $pres_trade_combination_names_new_grid->UseSelectLimit;
	if (!$selectLimit && $pres_trade_combination_names_new_grid->StartRecord > 1)
		$pres_trade_combination_names_new_grid->Recordset->move($pres_trade_combination_names_new_grid->StartRecord - 1);
} elseif (!$pres_trade_combination_names_new->AllowAddDeleteRow && $pres_trade_combination_names_new_grid->StopRecord == 0) {
	$pres_trade_combination_names_new_grid->StopRecord = $pres_trade_combination_names_new->GridAddRowCount;
}

// Initialize aggregate
$pres_trade_combination_names_new->RowType = ROWTYPE_AGGREGATEINIT;
$pres_trade_combination_names_new->resetAttributes();
$pres_trade_combination_names_new_grid->renderRow();
if ($pres_trade_combination_names_new_grid->isGridAdd())
	$pres_trade_combination_names_new_grid->RowIndex = 0;
if ($pres_trade_combination_names_new_grid->isGridEdit())
	$pres_trade_combination_names_new_grid->RowIndex = 0;
while ($pres_trade_combination_names_new_grid->RecordCount < $pres_trade_combination_names_new_grid->StopRecord) {
	$pres_trade_combination_names_new_grid->RecordCount++;
	if ($pres_trade_combination_names_new_grid->RecordCount >= $pres_trade_combination_names_new_grid->StartRecord) {
		$pres_trade_combination_names_new_grid->RowCount++;
		if ($pres_trade_combination_names_new_grid->isGridAdd() || $pres_trade_combination_names_new_grid->isGridEdit() || $pres_trade_combination_names_new->isConfirm()) {
			$pres_trade_combination_names_new_grid->RowIndex++;
			$CurrentForm->Index = $pres_trade_combination_names_new_grid->RowIndex;
			if ($CurrentForm->hasValue($pres_trade_combination_names_new_grid->FormActionName) && ($pres_trade_combination_names_new->isConfirm() || $pres_trade_combination_names_new_grid->EventCancelled))
				$pres_trade_combination_names_new_grid->RowAction = strval($CurrentForm->getValue($pres_trade_combination_names_new_grid->FormActionName));
			elseif ($pres_trade_combination_names_new_grid->isGridAdd())
				$pres_trade_combination_names_new_grid->RowAction = "insert";
			else
				$pres_trade_combination_names_new_grid->RowAction = "";
		}

		// Set up key count
		$pres_trade_combination_names_new_grid->KeyCount = $pres_trade_combination_names_new_grid->RowIndex;

		// Init row class and style
		$pres_trade_combination_names_new->resetAttributes();
		$pres_trade_combination_names_new->CssClass = "";
		if ($pres_trade_combination_names_new_grid->isGridAdd()) {
			if ($pres_trade_combination_names_new->CurrentMode == "copy") {
				$pres_trade_combination_names_new_grid->loadRowValues($pres_trade_combination_names_new_grid->Recordset); // Load row values
				$pres_trade_combination_names_new_grid->setRecordKey($pres_trade_combination_names_new_grid->RowOldKey, $pres_trade_combination_names_new_grid->Recordset); // Set old record key
			} else {
				$pres_trade_combination_names_new_grid->loadRowValues(); // Load default values
				$pres_trade_combination_names_new_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$pres_trade_combination_names_new_grid->loadRowValues($pres_trade_combination_names_new_grid->Recordset); // Load row values
		}
		$pres_trade_combination_names_new->RowType = ROWTYPE_VIEW; // Render view
		if ($pres_trade_combination_names_new_grid->isGridAdd()) // Grid add
			$pres_trade_combination_names_new->RowType = ROWTYPE_ADD; // Render add
		if ($pres_trade_combination_names_new_grid->isGridAdd() && $pres_trade_combination_names_new->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pres_trade_combination_names_new_grid->restoreCurrentRowFormValues($pres_trade_combination_names_new_grid->RowIndex); // Restore form values
		if ($pres_trade_combination_names_new_grid->isGridEdit()) { // Grid edit
			if ($pres_trade_combination_names_new->EventCancelled)
				$pres_trade_combination_names_new_grid->restoreCurrentRowFormValues($pres_trade_combination_names_new_grid->RowIndex); // Restore form values
			if ($pres_trade_combination_names_new_grid->RowAction == "insert")
				$pres_trade_combination_names_new->RowType = ROWTYPE_ADD; // Render add
			else
				$pres_trade_combination_names_new->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pres_trade_combination_names_new_grid->isGridEdit() && ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT || $pres_trade_combination_names_new->RowType == ROWTYPE_ADD) && $pres_trade_combination_names_new->EventCancelled) // Update failed
			$pres_trade_combination_names_new_grid->restoreCurrentRowFormValues($pres_trade_combination_names_new_grid->RowIndex); // Restore form values
		if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) // Edit row
			$pres_trade_combination_names_new_grid->EditRowCount++;
		if ($pres_trade_combination_names_new->isConfirm()) // Confirm row
			$pres_trade_combination_names_new_grid->restoreCurrentRowFormValues($pres_trade_combination_names_new_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$pres_trade_combination_names_new->RowAttrs->merge(["data-rowindex" => $pres_trade_combination_names_new_grid->RowCount, "id" => "r" . $pres_trade_combination_names_new_grid->RowCount . "_pres_trade_combination_names_new", "data-rowtype" => $pres_trade_combination_names_new->RowType]);

		// Render row
		$pres_trade_combination_names_new_grid->renderRow();

		// Render list options
		$pres_trade_combination_names_new_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pres_trade_combination_names_new_grid->RowAction != "delete" && $pres_trade_combination_names_new_grid->RowAction != "insertdelete" && !($pres_trade_combination_names_new_grid->RowAction == "insert" && $pres_trade_combination_names_new->isConfirm() && $pres_trade_combination_names_new_grid->emptyRow())) {
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_grid->ListOptions->render("body", "left", $pres_trade_combination_names_new_grid->RowCount);
?>
	<?php if ($pres_trade_combination_names_new_grid->ID->Visible) { // ID ?>
		<td data-name="ID" <?php echo $pres_trade_combination_names_new_grid->ID->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group">
<span<?php echo $pres_trade_combination_names_new_grid->ID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->ID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->CurrentValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_ID">
<span<?php echo $pres_trade_combination_names_new_grid->ID->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->ID->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id" <?php echo $pres_trade_combination_names_new_grid->tradenames_id->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($pres_trade_combination_names_new_grid->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?php echo $pres_trade_combination_names_new_grid->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($pres_trade_combination_names_new_grid->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?php echo $pres_trade_combination_names_new_grid->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_grid->tradenames_id->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->tradenames_id->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name" <?php echo $pres_trade_combination_names_new_grid->Drug_Name->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Drug_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Drug_Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Drug_Name">
<span<?php echo $pres_trade_combination_names_new_grid->Drug_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->Drug_Name->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name" <?php echo $pres_trade_combination_names_new_grid->Generic_Name->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_grid->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Generic_Name") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_grid->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Generic_Name") ?>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Generic_Name">
<span<?php echo $pres_trade_combination_names_new_grid->Generic_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->Generic_Name->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name" <?php echo $pres_trade_combination_names_new_grid->Trade_Name->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Trade_Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Trade_Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Trade_Name">
<span<?php echo $pres_trade_combination_names_new_grid->Trade_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->Trade_Name->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE" <?php echo $pres_trade_combination_names_new_grid->PR_CODE->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->PR_CODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->PR_CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_PR_CODE">
<span<?php echo $pres_trade_combination_names_new_grid->PR_CODE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->PR_CODE->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Form->Visible) { // Form ?>
		<td data-name="Form" <?php echo $pres_trade_combination_names_new_grid->Form->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_grid->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Form->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Form") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_grid->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Form->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Form") ?>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Form">
<span<?php echo $pres_trade_combination_names_new_grid->Form->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->Form->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Strength->Visible) { // Strength ?>
		<td data-name="Strength" <?php echo $pres_trade_combination_names_new_grid->Strength->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Strength->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Strength->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Strength">
<span<?php echo $pres_trade_combination_names_new_grid->Strength->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->Strength->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $pres_trade_combination_names_new_grid->Unit->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_grid->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Unit->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Unit") ?>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_grid->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Unit->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Unit") ?>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_Unit">
<span<?php echo $pres_trade_combination_names_new_grid->Unit->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->Unit->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<td data-name="CONTAINER_STRENGTH" <?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug" <?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->cellAttributes() ?>>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->OldValue) ?>">
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pres_trade_combination_names_new_grid->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug">
<span<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->getViewValue() ?></span>
</span>
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="fpres_trade_combination_names_newgrid$x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="fpres_trade_combination_names_newgrid$o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_grid->ListOptions->render("body", "right", $pres_trade_combination_names_new_grid->RowCount);
?>
	</tr>
<?php if ($pres_trade_combination_names_new->RowType == ROWTYPE_ADD || $pres_trade_combination_names_new->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpres_trade_combination_names_newgrid", "load"], function() {
	fpres_trade_combination_names_newgrid.updateLists(<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pres_trade_combination_names_new_grid->isGridAdd() || $pres_trade_combination_names_new->CurrentMode == "copy")
		if (!$pres_trade_combination_names_new_grid->Recordset->EOF)
			$pres_trade_combination_names_new_grid->Recordset->moveNext();
}
?>
<?php
	if ($pres_trade_combination_names_new->CurrentMode == "add" || $pres_trade_combination_names_new->CurrentMode == "copy" || $pres_trade_combination_names_new->CurrentMode == "edit") {
		$pres_trade_combination_names_new_grid->RowIndex = '$rowindex$';
		$pres_trade_combination_names_new_grid->loadRowValues();

		// Set row properties
		$pres_trade_combination_names_new->resetAttributes();
		$pres_trade_combination_names_new->RowAttrs->merge(["data-rowindex" => $pres_trade_combination_names_new_grid->RowIndex, "id" => "r0_pres_trade_combination_names_new", "data-rowtype" => ROWTYPE_ADD]);
		$pres_trade_combination_names_new->RowAttrs->appendClass("ew-template");
		$pres_trade_combination_names_new->RowType = ROWTYPE_ADD;

		// Render row
		$pres_trade_combination_names_new_grid->renderRow();

		// Render list options
		$pres_trade_combination_names_new_grid->renderListOptions();
		$pres_trade_combination_names_new_grid->StartRowCount = 0;
?>
	<tr <?php echo $pres_trade_combination_names_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_trade_combination_names_new_grid->ListOptions->render("body", "left", $pres_trade_combination_names_new_grid->RowIndex);
?>
	<?php if ($pres_trade_combination_names_new_grid->ID->Visible) { // ID ?>
		<td data-name="ID">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID"></span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID">
<span<?php echo $pres_trade_combination_names_new_grid->ID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->ID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_ID" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->ID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->tradenames_id->Visible) { // tradenames_id ?>
		<td data-name="tradenames_id">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<?php if ($pres_trade_combination_names_new_grid->tradenames_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_grid->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" size="30" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->tradenames_id->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->tradenames_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_grid->tradenames_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->tradenames_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_tradenames_id" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->tradenames_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Drug_Name->Visible) { // Drug_Name ?>
		<td data-name="Drug_Name">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Drug_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Drug_Name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<span<?php echo $pres_trade_combination_names_new_grid->Drug_Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->Drug_Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Drug_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Drug_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Generic_Name->Visible) { // Generic_Name ?>
		<td data-name="Generic_Name">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Generic_Name->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name"<?php echo $pres_trade_combination_names_new_grid->Generic_Name->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Generic_Name->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Generic_Name") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Generic_Name->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Generic_Name") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
<span<?php echo $pres_trade_combination_names_new_grid->Generic_Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->Generic_Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Generic_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Generic_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Trade_Name->Visible) { // Trade_Name ?>
		<td data-name="Trade_Name">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Trade_Name->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Trade_Name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<span<?php echo $pres_trade_combination_names_new_grid->Trade_Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->Trade_Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Trade_Name" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Trade_Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->PR_CODE->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->PR_CODE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<span<?php echo $pres_trade_combination_names_new_grid->PR_CODE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->PR_CODE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_PR_CODE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->PR_CODE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Form->Visible) { // Form ?>
		<td data-name="Form">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Form" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Form->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form"<?php echo $pres_trade_combination_names_new_grid->Form->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Form->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Form") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Form->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Form") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
<span<?php echo $pres_trade_combination_names_new_grid->Form->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->Form->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Form" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Form->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Strength->Visible) { // Strength ?>
		<td data-name="Strength">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->Strength->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->Strength->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<span<?php echo $pres_trade_combination_names_new_grid->Strength->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->Strength->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Strength" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Strength->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->Unit->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit"<?php echo $pres_trade_combination_names_new_grid->Unit->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->Unit->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_Unit") ?>
		</select>
</div>
<?php echo $pres_trade_combination_names_new_grid->Unit->Lookup->getParamTag($pres_trade_combination_names_new_grid, "p_x" . $pres_trade_combination_names_new_grid->RowIndex . "_Unit") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
<span<?php echo $pres_trade_combination_names_new_grid->Unit->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->Unit->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_Unit" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_new_grid->CONTAINER_TYPE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->CONTAINER_TYPE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_TYPE" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_TYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
		<td data-name="CONTAINER_STRENGTH">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="text" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?php echo $pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->CONTAINER_STRENGTH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pres_trade_combination_names_new_grid->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td data-name="TypeOfDrug">
<?php if (!$pres_trade_combination_names_new->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug"<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->editAttributes() ?>>
			<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->selectOptionListHtml("x{$pres_trade_combination_names_new_grid->RowIndex}_TypeOfDrug") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
<span<?php echo $pres_trade_combination_names_new_grid->TypeOfDrug->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_trade_combination_names_new_grid->TypeOfDrug->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="x<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" name="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" id="o<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>_TypeOfDrug" value="<?php echo HtmlEncode($pres_trade_combination_names_new_grid->TypeOfDrug->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_trade_combination_names_new_grid->ListOptions->render("body", "right", $pres_trade_combination_names_new_grid->RowIndex);
?>
<script>
loadjs.ready(["fpres_trade_combination_names_newgrid", "load"], function() {
	fpres_trade_combination_names_newgrid.updateLists(<?php echo $pres_trade_combination_names_new_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($pres_trade_combination_names_new->CurrentMode == "add" || $pres_trade_combination_names_new->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $pres_trade_combination_names_new_grid->FormKeyCountName ?>" id="<?php echo $pres_trade_combination_names_new_grid->FormKeyCountName ?>" value="<?php echo $pres_trade_combination_names_new_grid->KeyCount ?>">
<?php echo $pres_trade_combination_names_new_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $pres_trade_combination_names_new_grid->FormKeyCountName ?>" id="<?php echo $pres_trade_combination_names_new_grid->FormKeyCountName ?>" value="<?php echo $pres_trade_combination_names_new_grid->KeyCount ?>">
<?php echo $pres_trade_combination_names_new_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($pres_trade_combination_names_new->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpres_trade_combination_names_newgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_trade_combination_names_new_grid->Recordset)
	$pres_trade_combination_names_new_grid->Recordset->Close();
?>
<?php if ($pres_trade_combination_names_new_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $pres_trade_combination_names_new_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_trade_combination_names_new_grid->TotalRecords == 0 && !$pres_trade_combination_names_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_trade_combination_names_new_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$pres_trade_combination_names_new_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_trade_combination_names_new->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_trade_combination_names_new",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$pres_trade_combination_names_new_grid->terminate();
?>