<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_dashboard_collection_details_grid))
	$view_dashboard_collection_details_grid = new view_dashboard_collection_details_grid();

// Run the page
$view_dashboard_collection_details_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_collection_details_grid->Page_Render();
?>
<?php if (!$view_dashboard_collection_details_grid->isExport()) { ?>
<script>
var fview_dashboard_collection_detailsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_dashboard_collection_detailsgrid = new ew.Form("fview_dashboard_collection_detailsgrid", "grid");
	fview_dashboard_collection_detailsgrid.formKeyCountName = '<?php echo $view_dashboard_collection_details_grid->FormKeyCountName ?>';

	// Validate form
	fview_dashboard_collection_detailsgrid.validate = function() {
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
			<?php if ($view_dashboard_collection_details_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->id->caption(), $view_dashboard_collection_details_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_grid->id->errorMessage()) ?>");
			<?php if ($view_dashboard_collection_details_grid->createddate->Required) { ?>
				elm = this.getElements("x" + infix + "_createddate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->createddate->caption(), $view_dashboard_collection_details_grid->createddate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_grid->createddate->errorMessage()) ?>");
			<?php if ($view_dashboard_collection_details_grid->UserName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->UserName->caption(), $view_dashboard_collection_details_grid->UserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->BillNumber->caption(), $view_dashboard_collection_details_grid->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->PatientID->caption(), $view_dashboard_collection_details_grid->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->PatientName->caption(), $view_dashboard_collection_details_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->Mobile->caption(), $view_dashboard_collection_details_grid->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->voucher_type->caption(), $view_dashboard_collection_details_grid->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->Details->caption(), $view_dashboard_collection_details_grid->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->ModeofPayment->caption(), $view_dashboard_collection_details_grid->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->Amount->caption(), $view_dashboard_collection_details_grid->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_grid->Amount->errorMessage()) ?>");
			<?php if ($view_dashboard_collection_details_grid->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->AnyDues->caption(), $view_dashboard_collection_details_grid->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->createdby->caption(), $view_dashboard_collection_details_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->createddatetime->caption(), $view_dashboard_collection_details_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_grid->createddatetime->errorMessage()) ?>");
			<?php if ($view_dashboard_collection_details_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->modifiedby->caption(), $view_dashboard_collection_details_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->modifieddatetime->caption(), $view_dashboard_collection_details_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_grid->modifieddatetime->errorMessage()) ?>");
			<?php if ($view_dashboard_collection_details_grid->BillType->Required) { ?>
				elm = this.getElements("x" + infix + "_BillType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->BillType->caption(), $view_dashboard_collection_details_grid->BillType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_dashboard_collection_details_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_dashboard_collection_details_grid->HospID->caption(), $view_dashboard_collection_details_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_grid->HospID->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_dashboard_collection_detailsgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "id", false)) return false;
		if (ew.valueChanged(fobj, infix, "createddate", false)) return false;
		if (ew.valueChanged(fobj, infix, "UserName", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientID", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
		if (ew.valueChanged(fobj, infix, "voucher_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "Details", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
		if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "AnyDues", false)) return false;
		if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
		if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "modifiedby", false)) return false;
		if (ew.valueChanged(fobj, infix, "modifieddatetime", false)) return false;
		if (ew.valueChanged(fobj, infix, "BillType", false)) return false;
		if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_collection_detailsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_collection_detailsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_dashboard_collection_detailsgrid.lists["x_HospID"] = <?php echo $view_dashboard_collection_details_grid->HospID->Lookup->toClientList($view_dashboard_collection_details_grid) ?>;
	fview_dashboard_collection_detailsgrid.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_collection_details_grid->HospID->lookupOptions()) ?>;
	fview_dashboard_collection_detailsgrid.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_dashboard_collection_detailsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_dashboard_collection_details_grid->renderOtherOptions();
?>
<?php if ($view_dashboard_collection_details_grid->TotalRecords > 0 || $view_dashboard_collection_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_collection_details_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_collection_details">
<?php if ($view_dashboard_collection_details_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_dashboard_collection_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_collection_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_collection_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_collection_detailsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_collection_details->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_collection_details_grid->renderListOptions();

// Render list options (header, left)
$view_dashboard_collection_details_grid->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_collection_details_grid->id->Visible) { // id ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_dashboard_collection_details_grid->id->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_dashboard_collection_details_grid->id->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->createddate->Visible) { // createddate ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_collection_details_grid->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_dashboard_collection_details_grid->createddate->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->createddate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->createddate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->UserName->Visible) { // UserName ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_collection_details_grid->UserName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_dashboard_collection_details_grid->UserName->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->UserName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_dashboard_collection_details_grid->BillNumber->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_dashboard_collection_details_grid->BillNumber->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->BillNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_collection_details_grid->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_dashboard_collection_details_grid->PatientID->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_collection_details_grid->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_collection_details_grid->PatientName->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->Mobile->Visible) { // Mobile ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_dashboard_collection_details_grid->Mobile->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_dashboard_collection_details_grid->Mobile->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_dashboard_collection_details_grid->voucher_type->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_dashboard_collection_details_grid->voucher_type->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->Details->Visible) { // Details ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_dashboard_collection_details_grid->Details->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_dashboard_collection_details_grid->Details->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details_grid->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details_grid->ModeofPayment->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->Amount->Visible) { // Amount ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_dashboard_collection_details_grid->Amount->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_dashboard_collection_details_grid->Amount->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_dashboard_collection_details_grid->AnyDues->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_dashboard_collection_details_grid->AnyDues->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_collection_details_grid->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_collection_details_grid->createdby->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_collection_details_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_collection_details_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_dashboard_collection_details_grid->modifiedby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_dashboard_collection_details_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->BillType->Visible) { // BillType ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_collection_details_grid->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_dashboard_collection_details_grid->BillType->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_collection_details_grid->SortUrl($view_dashboard_collection_details_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_collection_details_grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_collection_details_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_collection_details_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_collection_details_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_collection_details_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_collection_details_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_dashboard_collection_details_grid->StartRecord = 1;
$view_dashboard_collection_details_grid->StopRecord = $view_dashboard_collection_details_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_dashboard_collection_details->isConfirm() || $view_dashboard_collection_details_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_dashboard_collection_details_grid->FormKeyCountName) && ($view_dashboard_collection_details_grid->isGridAdd() || $view_dashboard_collection_details_grid->isGridEdit() || $view_dashboard_collection_details->isConfirm())) {
		$view_dashboard_collection_details_grid->KeyCount = $CurrentForm->getValue($view_dashboard_collection_details_grid->FormKeyCountName);
		$view_dashboard_collection_details_grid->StopRecord = $view_dashboard_collection_details_grid->StartRecord + $view_dashboard_collection_details_grid->KeyCount - 1;
	}
}
$view_dashboard_collection_details_grid->RecordCount = $view_dashboard_collection_details_grid->StartRecord - 1;
if ($view_dashboard_collection_details_grid->Recordset && !$view_dashboard_collection_details_grid->Recordset->EOF) {
	$view_dashboard_collection_details_grid->Recordset->moveFirst();
	$selectLimit = $view_dashboard_collection_details_grid->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_collection_details_grid->StartRecord > 1)
		$view_dashboard_collection_details_grid->Recordset->move($view_dashboard_collection_details_grid->StartRecord - 1);
} elseif (!$view_dashboard_collection_details->AllowAddDeleteRow && $view_dashboard_collection_details_grid->StopRecord == 0) {
	$view_dashboard_collection_details_grid->StopRecord = $view_dashboard_collection_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_grid->renderRow();
if ($view_dashboard_collection_details_grid->isGridAdd())
	$view_dashboard_collection_details_grid->RowIndex = 0;
if ($view_dashboard_collection_details_grid->isGridEdit())
	$view_dashboard_collection_details_grid->RowIndex = 0;
while ($view_dashboard_collection_details_grid->RecordCount < $view_dashboard_collection_details_grid->StopRecord) {
	$view_dashboard_collection_details_grid->RecordCount++;
	if ($view_dashboard_collection_details_grid->RecordCount >= $view_dashboard_collection_details_grid->StartRecord) {
		$view_dashboard_collection_details_grid->RowCount++;
		if ($view_dashboard_collection_details_grid->isGridAdd() || $view_dashboard_collection_details_grid->isGridEdit() || $view_dashboard_collection_details->isConfirm()) {
			$view_dashboard_collection_details_grid->RowIndex++;
			$CurrentForm->Index = $view_dashboard_collection_details_grid->RowIndex;
			if ($CurrentForm->hasValue($view_dashboard_collection_details_grid->FormActionName) && ($view_dashboard_collection_details->isConfirm() || $view_dashboard_collection_details_grid->EventCancelled))
				$view_dashboard_collection_details_grid->RowAction = strval($CurrentForm->getValue($view_dashboard_collection_details_grid->FormActionName));
			elseif ($view_dashboard_collection_details_grid->isGridAdd())
				$view_dashboard_collection_details_grid->RowAction = "insert";
			else
				$view_dashboard_collection_details_grid->RowAction = "";
		}

		// Set up key count
		$view_dashboard_collection_details_grid->KeyCount = $view_dashboard_collection_details_grid->RowIndex;

		// Init row class and style
		$view_dashboard_collection_details->resetAttributes();
		$view_dashboard_collection_details->CssClass = "";
		if ($view_dashboard_collection_details_grid->isGridAdd()) {
			if ($view_dashboard_collection_details->CurrentMode == "copy") {
				$view_dashboard_collection_details_grid->loadRowValues($view_dashboard_collection_details_grid->Recordset); // Load row values
				$view_dashboard_collection_details_grid->setRecordKey($view_dashboard_collection_details_grid->RowOldKey, $view_dashboard_collection_details_grid->Recordset); // Set old record key
			} else {
				$view_dashboard_collection_details_grid->loadRowValues(); // Load default values
				$view_dashboard_collection_details_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_dashboard_collection_details_grid->loadRowValues($view_dashboard_collection_details_grid->Recordset); // Load row values
		}
		$view_dashboard_collection_details->RowType = ROWTYPE_VIEW; // Render view
		if ($view_dashboard_collection_details_grid->isGridAdd()) // Grid add
			$view_dashboard_collection_details->RowType = ROWTYPE_ADD; // Render add
		if ($view_dashboard_collection_details_grid->isGridAdd() && $view_dashboard_collection_details->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_dashboard_collection_details_grid->restoreCurrentRowFormValues($view_dashboard_collection_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_collection_details_grid->isGridEdit()) { // Grid edit
			if ($view_dashboard_collection_details->EventCancelled)
				$view_dashboard_collection_details_grid->restoreCurrentRowFormValues($view_dashboard_collection_details_grid->RowIndex); // Restore form values
			if ($view_dashboard_collection_details_grid->RowAction == "insert")
				$view_dashboard_collection_details->RowType = ROWTYPE_ADD; // Render add
			else
				$view_dashboard_collection_details->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_dashboard_collection_details_grid->isGridEdit() && ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT || $view_dashboard_collection_details->RowType == ROWTYPE_ADD) && $view_dashboard_collection_details->EventCancelled) // Update failed
			$view_dashboard_collection_details_grid->restoreCurrentRowFormValues($view_dashboard_collection_details_grid->RowIndex); // Restore form values
		if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) // Edit row
			$view_dashboard_collection_details_grid->EditRowCount++;
		if ($view_dashboard_collection_details->isConfirm()) // Confirm row
			$view_dashboard_collection_details_grid->restoreCurrentRowFormValues($view_dashboard_collection_details_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_dashboard_collection_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_collection_details_grid->RowCount, "id" => "r" . $view_dashboard_collection_details_grid->RowCount . "_view_dashboard_collection_details", "data-rowtype" => $view_dashboard_collection_details->RowType]);

		// Render row
		$view_dashboard_collection_details_grid->renderRow();

		// Render list options
		$view_dashboard_collection_details_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_dashboard_collection_details_grid->RowAction != "delete" && $view_dashboard_collection_details_grid->RowAction != "insertdelete" && !($view_dashboard_collection_details_grid->RowAction == "insert" && $view_dashboard_collection_details->isConfirm() && $view_dashboard_collection_details_grid->emptyRow())) {
?>
	<tr <?php echo $view_dashboard_collection_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_collection_details_grid->ListOptions->render("body", "left", $view_dashboard_collection_details_grid->RowCount);
?>
	<?php if ($view_dashboard_collection_details_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_dashboard_collection_details_grid->id->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_id" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->id->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->id->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_id" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->id->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_id">
<span<?php echo $view_dashboard_collection_details_grid->id->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->id->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createddate->Visible) { // createddate ?>
		<td data-name="createddate" <?php echo $view_dashboard_collection_details_grid->createddate->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_collection_details_grid->createddate->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_collection_details_grid->createddate->CurrentValue, 0)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createddate->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->createddate->ReadOnly && !$view_dashboard_collection_details_grid->createddate->Disabled && !isset($view_dashboard_collection_details_grid->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_collection_details_grid->createddate->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_collection_details_grid->createddate->CurrentValue, 0)) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createddate->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->createddate->ReadOnly && !$view_dashboard_collection_details_grid->createddate->Disabled && !isset($view_dashboard_collection_details_grid->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddate">
<span<?php echo $view_dashboard_collection_details_grid->createddate->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->createddate->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_dashboard_collection_details_grid->UserName->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_collection_details_grid->UserName->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_UserName" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_UserName" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->UserName->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->UserName->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_collection_details_grid->UserName->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_UserName" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_UserName" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->UserName->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->UserName->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_UserName">
<span<?php echo $view_dashboard_collection_details_grid->UserName->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->UserName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_dashboard_collection_details_grid->BillNumber->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_BillNumber" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->BillNumber->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_BillNumber" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->BillNumber->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->BillNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_BillNumber">
<span<?php echo $view_dashboard_collection_details_grid->BillNumber->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->BillNumber->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_dashboard_collection_details_grid->PatientID->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_PatientID" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->PatientID->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_PatientID" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->PatientID->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->PatientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_PatientID">
<span<?php echo $view_dashboard_collection_details_grid->PatientID->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->PatientID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_dashboard_collection_details_grid->PatientName->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_PatientName" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->PatientName->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_PatientName" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->PatientName->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_PatientName">
<span<?php echo $view_dashboard_collection_details_grid->PatientName->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_dashboard_collection_details_grid->Mobile->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Mobile" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Mobile->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Mobile" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Mobile->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Mobile">
<span<?php echo $view_dashboard_collection_details_grid->Mobile->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->Mobile->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $view_dashboard_collection_details_grid->voucher_type->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_voucher_type" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->voucher_type->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_voucher_type" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->voucher_type->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->voucher_type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_voucher_type">
<span<?php echo $view_dashboard_collection_details_grid->voucher_type->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->voucher_type->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_dashboard_collection_details_grid->Details->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Details" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Details->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Details->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Details" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Details->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Details->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Details">
<span<?php echo $view_dashboard_collection_details_grid->Details->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->Details->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_dashboard_collection_details_grid->ModeofPayment->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_collection_details_grid->ModeofPayment->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->ModeofPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->ModeofPayment->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_collection_details_grid->ModeofPayment->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->ModeofPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->ModeofPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment">
<span<?php echo $view_dashboard_collection_details_grid->ModeofPayment->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->ModeofPayment->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_dashboard_collection_details_grid->Amount->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Amount" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Amount->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Amount" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Amount->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_Amount">
<span<?php echo $view_dashboard_collection_details_grid->Amount->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->Amount->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_dashboard_collection_details_grid->AnyDues->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_AnyDues" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->AnyDues->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_AnyDues" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->AnyDues->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_AnyDues">
<span<?php echo $view_dashboard_collection_details_grid->AnyDues->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->AnyDues->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_dashboard_collection_details_grid->createdby->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createdby" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createdby->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createdby" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createdby->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createdby">
<span<?php echo $view_dashboard_collection_details_grid->createdby->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_dashboard_collection_details_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddatetime" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->createddatetime->ReadOnly && !$view_dashboard_collection_details_grid->createddatetime->Disabled && !isset($view_dashboard_collection_details_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddatetime" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->createddatetime->ReadOnly && !$view_dashboard_collection_details_grid->createddatetime->Disabled && !isset($view_dashboard_collection_details_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_createddatetime">
<span<?php echo $view_dashboard_collection_details_grid->createddatetime->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_dashboard_collection_details_grid->modifiedby->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_modifiedby" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->modifiedby->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_modifiedby" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->modifiedby->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_modifiedby">
<span<?php echo $view_dashboard_collection_details_grid->modifiedby->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_dashboard_collection_details_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_modifieddatetime" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->modifieddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->modifieddatetime->ReadOnly && !$view_dashboard_collection_details_grid->modifieddatetime->Disabled && !isset($view_dashboard_collection_details_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_modifieddatetime" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->modifieddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->modifieddatetime->ReadOnly && !$view_dashboard_collection_details_grid->modifieddatetime->Disabled && !isset($view_dashboard_collection_details_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_modifieddatetime">
<span<?php echo $view_dashboard_collection_details_grid->modifieddatetime->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_dashboard_collection_details_grid->BillType->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_BillType" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->BillType->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->BillType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_BillType" class="form-group">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->BillType->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->BillType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_BillType">
<span<?php echo $view_dashboard_collection_details_grid->BillType->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->BillType->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_collection_details_grid->HospID->cellAttributes() ?>>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_dashboard_collection_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<?php
$onchange = $view_dashboard_collection_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_collection_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_collection_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_collection_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_collection_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid"], function() {
	fview_dashboard_collection_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_collection_details_grid->HospID->Lookup->getParamTag($view_dashboard_collection_details_grid, "p_x" . $view_dashboard_collection_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($view_dashboard_collection_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<span<?php echo $view_dashboard_collection_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<?php
$onchange = $view_dashboard_collection_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_collection_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_collection_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_collection_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_collection_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid"], function() {
	fview_dashboard_collection_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_collection_details_grid->HospID->Lookup->getParamTag($view_dashboard_collection_details_grid, "p_x" . $view_dashboard_collection_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_dashboard_collection_details_grid->RowCount ?>_view_dashboard_collection_details_HospID">
<span<?php echo $view_dashboard_collection_details_grid->HospID->viewAttributes() ?>><?php echo $view_dashboard_collection_details_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="fview_dashboard_collection_detailsgrid$x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="fview_dashboard_collection_detailsgrid$o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_collection_details_grid->ListOptions->render("body", "right", $view_dashboard_collection_details_grid->RowCount);
?>
	</tr>
<?php if ($view_dashboard_collection_details->RowType == ROWTYPE_ADD || $view_dashboard_collection_details->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "load"], function() {
	fview_dashboard_collection_detailsgrid.updateLists(<?php echo $view_dashboard_collection_details_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_dashboard_collection_details_grid->isGridAdd() || $view_dashboard_collection_details->CurrentMode == "copy")
		if (!$view_dashboard_collection_details_grid->Recordset->EOF)
			$view_dashboard_collection_details_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_dashboard_collection_details->CurrentMode == "add" || $view_dashboard_collection_details->CurrentMode == "copy" || $view_dashboard_collection_details->CurrentMode == "edit") {
		$view_dashboard_collection_details_grid->RowIndex = '$rowindex$';
		$view_dashboard_collection_details_grid->loadRowValues();

		// Set row properties
		$view_dashboard_collection_details->resetAttributes();
		$view_dashboard_collection_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_collection_details_grid->RowIndex, "id" => "r0_view_dashboard_collection_details", "data-rowtype" => ROWTYPE_ADD]);
		$view_dashboard_collection_details->RowAttrs->appendClass("ew-template");
		$view_dashboard_collection_details->RowType = ROWTYPE_ADD;

		// Render row
		$view_dashboard_collection_details_grid->renderRow();

		// Render list options
		$view_dashboard_collection_details_grid->renderListOptions();
		$view_dashboard_collection_details_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_dashboard_collection_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_collection_details_grid->ListOptions->render("body", "left", $view_dashboard_collection_details_grid->RowIndex);
?>
	<?php if ($view_dashboard_collection_details_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_id" class="form-group view_dashboard_collection_details_id">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->id->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_id" class="form-group view_dashboard_collection_details_id">
<span<?php echo $view_dashboard_collection_details_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createddate->Visible) { // createddate ?>
		<td data-name="createddate">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<?php if ($view_dashboard_collection_details_grid->createddate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddate" class="form-group view_dashboard_collection_details_createddate">
<span<?php echo $view_dashboard_collection_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode(FormatDateTime($view_dashboard_collection_details_grid->createddate->CurrentValue, 0)) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddate" class="form-group view_dashboard_collection_details_createddate">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createddate->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->createddate->ReadOnly && !$view_dashboard_collection_details_grid->createddate->Disabled && !isset($view_dashboard_collection_details_grid->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddate" class="form-group view_dashboard_collection_details_createddate">
<span<?php echo $view_dashboard_collection_details_grid->createddate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->createddate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddate" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<?php if ($view_dashboard_collection_details_grid->UserName->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_UserName" class="form-group view_dashboard_collection_details_UserName">
<span<?php echo $view_dashboard_collection_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_UserName" class="form-group view_dashboard_collection_details_UserName">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->UserName->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->UserName->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_UserName" class="form-group view_dashboard_collection_details_UserName">
<span<?php echo $view_dashboard_collection_details_grid->UserName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->UserName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_UserName" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->UserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillNumber" class="form-group view_dashboard_collection_details_BillNumber">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->BillNumber->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->BillNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillNumber" class="form-group view_dashboard_collection_details_BillNumber">
<span<?php echo $view_dashboard_collection_details_grid->BillNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->BillNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientID" class="form-group view_dashboard_collection_details_PatientID">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->PatientID->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->PatientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientID" class="form-group view_dashboard_collection_details_PatientID">
<span<?php echo $view_dashboard_collection_details_grid->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->PatientID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientName" class="form-group view_dashboard_collection_details_PatientName">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->PatientName->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientName" class="form-group view_dashboard_collection_details_PatientName">
<span<?php echo $view_dashboard_collection_details_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Mobile" class="form-group view_dashboard_collection_details_Mobile">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Mobile->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Mobile" class="form-group view_dashboard_collection_details_Mobile">
<span<?php echo $view_dashboard_collection_details_grid->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->Mobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_voucher_type" class="form-group view_dashboard_collection_details_voucher_type">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->voucher_type->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->voucher_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_voucher_type" class="form-group view_dashboard_collection_details_voucher_type">
<span<?php echo $view_dashboard_collection_details_grid->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->voucher_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->voucher_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Details->Visible) { // Details ?>
		<td data-name="Details">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Details" class="form-group view_dashboard_collection_details_Details">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Details->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Details->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Details" class="form-group view_dashboard_collection_details_Details">
<span<?php echo $view_dashboard_collection_details_grid->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->Details->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Details->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<?php if ($view_dashboard_collection_details_grid->ModeofPayment->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_ModeofPayment" class="form-group view_dashboard_collection_details_ModeofPayment">
<span<?php echo $view_dashboard_collection_details_grid->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->ModeofPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_ModeofPayment" class="form-group view_dashboard_collection_details_ModeofPayment">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->ModeofPayment->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_ModeofPayment" class="form-group view_dashboard_collection_details_ModeofPayment">
<span<?php echo $view_dashboard_collection_details_grid->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->ModeofPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Amount" class="form-group view_dashboard_collection_details_Amount">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->Amount->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->Amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Amount" class="form-group view_dashboard_collection_details_Amount">
<span<?php echo $view_dashboard_collection_details_grid->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->Amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_AnyDues" class="form-group view_dashboard_collection_details_AnyDues">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->AnyDues->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->AnyDues->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_AnyDues" class="form-group view_dashboard_collection_details_AnyDues">
<span<?php echo $view_dashboard_collection_details_grid->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->AnyDues->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createdby" class="form-group view_dashboard_collection_details_createdby">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createdby->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createdby" class="form-group view_dashboard_collection_details_createdby">
<span<?php echo $view_dashboard_collection_details_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddatetime" class="form-group view_dashboard_collection_details_createddatetime">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->createddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->createddatetime->ReadOnly && !$view_dashboard_collection_details_grid->createddatetime->Disabled && !isset($view_dashboard_collection_details_grid->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddatetime" class="form-group view_dashboard_collection_details_createddatetime">
<span<?php echo $view_dashboard_collection_details_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifiedby" class="form-group view_dashboard_collection_details_modifiedby">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->modifiedby->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifiedby" class="form-group view_dashboard_collection_details_modifiedby">
<span<?php echo $view_dashboard_collection_details_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifieddatetime" class="form-group view_dashboard_collection_details_modifieddatetime">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->modifieddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->modifieddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_grid->modifieddatetime->ReadOnly && !$view_dashboard_collection_details_grid->modifieddatetime->Disabled && !isset($view_dashboard_collection_details_grid->modifieddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifieddatetime" class="form-group view_dashboard_collection_details_modifieddatetime">
<span<?php echo $view_dashboard_collection_details_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->BillType->Visible) { // BillType ?>
		<td data-name="BillType">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillType" class="form-group view_dashboard_collection_details_BillType">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_grid->BillType->EditValue ?>"<?php echo $view_dashboard_collection_details_grid->BillType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillType" class="form-group view_dashboard_collection_details_BillType">
<span<?php echo $view_dashboard_collection_details_grid->BillType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->BillType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->BillType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_dashboard_collection_details->isConfirm()) { ?>
<?php if ($view_dashboard_collection_details_grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_HospID" class="form-group view_dashboard_collection_details_HospID">
<span<?php echo $view_dashboard_collection_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_HospID" class="form-group view_dashboard_collection_details_HospID">
<?php
$onchange = $view_dashboard_collection_details_grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_collection_details_grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID">
	<input type="text" class="form-control" name="sv_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="sv_x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo RemoveHtml($view_dashboard_collection_details_grid->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_collection_details_grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_collection_details_grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid"], function() {
	fview_dashboard_collection_detailsgrid.createAutoSuggest({"id":"x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_collection_details_grid->HospID->Lookup->getParamTag($view_dashboard_collection_details_grid, "p_x" . $view_dashboard_collection_details_grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_HospID" class="form-group view_dashboard_collection_details_HospID">
<span<?php echo $view_dashboard_collection_details_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_dashboard_collection_details_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="x<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" name="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" id="o<?php echo $view_dashboard_collection_details_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_collection_details_grid->ListOptions->render("body", "right", $view_dashboard_collection_details_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "load"], function() {
	fview_dashboard_collection_detailsgrid.updateLists(<?php echo $view_dashboard_collection_details_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_collection_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_collection_details->resetAttributes();
$view_dashboard_collection_details_grid->renderRow();
?>
<?php if ($view_dashboard_collection_details_grid->TotalRecords > 0 && $view_dashboard_collection_details->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_collection_details_grid->renderListOptions();

// Render list options (footer, left)
$view_dashboard_collection_details_grid->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_collection_details_grid->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $view_dashboard_collection_details_grid->id->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createddate->Visible) { // createddate ?>
		<td data-name="createddate" class="<?php echo $view_dashboard_collection_details_grid->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $view_dashboard_collection_details_grid->UserName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_UserName" class="view_dashboard_collection_details_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" class="<?php echo $view_dashboard_collection_details_grid->BillNumber->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" class="<?php echo $view_dashboard_collection_details_grid->PatientID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_collection_details_grid->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $view_dashboard_collection_details_grid->Mobile->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" class="<?php echo $view_dashboard_collection_details_grid->voucher_type->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Details->Visible) { // Details ?>
		<td data-name="Details" class="<?php echo $view_dashboard_collection_details_grid->Details->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $view_dashboard_collection_details_grid->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $view_dashboard_collection_details_grid->Amount->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_collection_details_grid->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" class="<?php echo $view_dashboard_collection_details_grid->AnyDues->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_collection_details_grid->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_collection_details_grid->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $view_dashboard_collection_details_grid->modifiedby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $view_dashboard_collection_details_grid->modifieddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $view_dashboard_collection_details_grid->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_collection_details_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_collection_details_grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_collection_details_grid->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_dashboard_collection_details->CurrentMode == "add" || $view_dashboard_collection_details->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_dashboard_collection_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_collection_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_collection_details_grid->KeyCount ?>">
<?php echo $view_dashboard_collection_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_dashboard_collection_details_grid->FormKeyCountName ?>" id="<?php echo $view_dashboard_collection_details_grid->FormKeyCountName ?>" value="<?php echo $view_dashboard_collection_details_grid->KeyCount ?>">
<?php echo $view_dashboard_collection_details_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_dashboard_collection_details->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_dashboard_collection_detailsgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_collection_details_grid->Recordset)
	$view_dashboard_collection_details_grid->Recordset->Close();
?>
<?php if ($view_dashboard_collection_details_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_dashboard_collection_details_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_collection_details_grid->TotalRecords == 0 && !$view_dashboard_collection_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_collection_details_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_dashboard_collection_details_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_collection_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_collection_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_dashboard_collection_details_grid->terminate();
?>