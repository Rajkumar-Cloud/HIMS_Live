<?php
namespace PHPMaker2020\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($view_ip_advance_grid))
	$view_ip_advance_grid = new view_ip_advance_grid();

// Run the page
$view_ip_advance_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_grid->Page_Render();
?>
<?php if (!$view_ip_advance_grid->isExport()) { ?>
<script>
var fview_ip_advancegrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fview_ip_advancegrid = new ew.Form("fview_ip_advancegrid", "grid");
	fview_ip_advancegrid.formKeyCountName = '<?php echo $view_ip_advance_grid->FormKeyCountName ?>';

	// Validate form
	fview_ip_advancegrid.validate = function() {
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
			<?php if ($view_ip_advance_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->id->caption(), $view_ip_advance_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Name->caption(), $view_ip_advance_grid->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Mobile->caption(), $view_ip_advance_grid->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->voucher_type->caption(), $view_ip_advance_grid->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Details->caption(), $view_ip_advance_grid->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->ModeofPayment->caption(), $view_ip_advance_grid->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Amount->caption(), $view_ip_advance_grid->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_grid->Amount->errorMessage()) ?>");
			<?php if ($view_ip_advance_grid->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->AnyDues->caption(), $view_ip_advance_grid->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->createdby->caption(), $view_ip_advance_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->createddatetime->caption(), $view_ip_advance_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->modifiedby->caption(), $view_ip_advance_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->modifieddatetime->caption(), $view_ip_advance_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->PatID->caption(), $view_ip_advance_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->PatientID->caption(), $view_ip_advance_grid->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->PatientName->caption(), $view_ip_advance_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->VisiteType->Required) { ?>
				elm = this.getElements("x" + infix + "_VisiteType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->VisiteType->caption(), $view_ip_advance_grid->VisiteType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->VisitDate->Required) { ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->VisitDate->caption(), $view_ip_advance_grid->VisitDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_VisitDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_grid->VisitDate->errorMessage()) ?>");
			<?php if ($view_ip_advance_grid->AdvanceNo->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->AdvanceNo->caption(), $view_ip_advance_grid->AdvanceNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Status->caption(), $view_ip_advance_grid->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Date->caption(), $view_ip_advance_grid->Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_grid->Date->errorMessage()) ?>");
			<?php if ($view_ip_advance_grid->AdvanceValidityDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->AdvanceValidityDate->caption(), $view_ip_advance_grid->AdvanceValidityDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AdvanceValidityDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ip_advance_grid->AdvanceValidityDate->errorMessage()) ?>");
			<?php if ($view_ip_advance_grid->TotalRemainingAdvance->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->TotalRemainingAdvance->caption(), $view_ip_advance_grid->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Remarks->caption(), $view_ip_advance_grid->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->SeectPaymentMode->Required) { ?>
				elm = this.getElements("x" + infix + "_SeectPaymentMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->SeectPaymentMode->caption(), $view_ip_advance_grid->SeectPaymentMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->PaidAmount->caption(), $view_ip_advance_grid->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Currency->caption(), $view_ip_advance_grid->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->CardNumber->caption(), $view_ip_advance_grid->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->BankName->caption(), $view_ip_advance_grid->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->HospID->caption(), $view_ip_advance_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->Reception->caption(), $view_ip_advance_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ip_advance_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance_grid->mrnno->caption(), $view_ip_advance_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fview_ip_advancegrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Name", false)) return false;
		if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
		if (ew.valueChanged(fobj, infix, "voucher_type", false)) return false;
		if (ew.valueChanged(fobj, infix, "Details", false)) return false;
		if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
		if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
		if (ew.valueChanged(fobj, infix, "AnyDues", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientID", false)) return false;
		if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
		if (ew.valueChanged(fobj, infix, "VisiteType", false)) return false;
		if (ew.valueChanged(fobj, infix, "VisitDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "AdvanceNo", false)) return false;
		if (ew.valueChanged(fobj, infix, "Status", false)) return false;
		if (ew.valueChanged(fobj, infix, "Date", false)) return false;
		if (ew.valueChanged(fobj, infix, "AdvanceValidityDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "TotalRemainingAdvance", false)) return false;
		if (ew.valueChanged(fobj, infix, "Remarks", false)) return false;
		if (ew.valueChanged(fobj, infix, "SeectPaymentMode", false)) return false;
		if (ew.valueChanged(fobj, infix, "PaidAmount", false)) return false;
		if (ew.valueChanged(fobj, infix, "Currency", false)) return false;
		if (ew.valueChanged(fobj, infix, "CardNumber", false)) return false;
		if (ew.valueChanged(fobj, infix, "BankName", false)) return false;
		if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
		if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fview_ip_advancegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_advancegrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ip_advancegrid.lists["x_ModeofPayment"] = <?php echo $view_ip_advance_grid->ModeofPayment->Lookup->toClientList($view_ip_advance_grid) ?>;
	fview_ip_advancegrid.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_ip_advance_grid->ModeofPayment->lookupOptions()) ?>;
	fview_ip_advancegrid.lists["x_Reception"] = <?php echo $view_ip_advance_grid->Reception->Lookup->toClientList($view_ip_advance_grid) ?>;
	fview_ip_advancegrid.lists["x_Reception"].options = <?php echo JsonEncode($view_ip_advance_grid->Reception->lookupOptions()) ?>;
	loadjs.done("fview_ip_advancegrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$view_ip_advance_grid->renderOtherOptions();
?>
<?php if ($view_ip_advance_grid->TotalRecords > 0 || $view_ip_advance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_advance_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_advance">
<?php if ($view_ip_advance_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_ip_advance_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_ip_advancegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_ip_advance" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_ip_advancegrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_advance->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_advance_grid->renderListOptions();

// Render list options (header, left)
$view_ip_advance_grid->ListOptions->render("header", "left");
?>
<?php if ($view_ip_advance_grid->id->Visible) { // id ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_advance_grid->id->headerCellClass() ?>"><div id="elh_view_ip_advance_id" class="view_ip_advance_id"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_advance_grid->id->headerCellClass() ?>"><div><div id="elh_view_ip_advance_id" class="view_ip_advance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Name->Visible) { // Name ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance_grid->Name->headerCellClass() ?>"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance_grid->Name->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance_grid->Mobile->headerCellClass() ?>"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance_grid->Mobile->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance_grid->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance_grid->voucher_type->headerCellClass() ?>"><div><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Details->Visible) { // Details ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance_grid->Details->headerCellClass() ?>"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance_grid->Details->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance_grid->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance_grid->ModeofPayment->headerCellClass() ?>"><div><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance_grid->Amount->headerCellClass() ?>"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance_grid->Amount->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance_grid->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance_grid->AnyDues->headerCellClass() ?>"><div><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance_grid->createdby->headerCellClass() ?>"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance_grid->createdby->headerCellClass() ?>"><div><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance_grid->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance_grid->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->PatID->Visible) { // PatID ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance_grid->PatID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance_grid->PatID->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance_grid->PatientID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance_grid->PatientID->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance_grid->PatientName->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance_grid->PatientName->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->VisiteType) == "") { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance_grid->VisiteType->headerCellClass() ?>"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->VisiteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance_grid->VisiteType->headerCellClass() ?>"><div><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->VisiteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->VisiteType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->VisiteType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->VisitDate) == "") { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance_grid->VisitDate->headerCellClass() ?>"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->VisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance_grid->VisitDate->headerCellClass() ?>"><div><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->VisitDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->VisitDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance_grid->AdvanceNo->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance_grid->AdvanceNo->headerCellClass() ?>"><div><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->AdvanceNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->AdvanceNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->AdvanceNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Status->Visible) { // Status ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance_grid->Status->headerCellClass() ?>"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance_grid->Status->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Date->Visible) { // Date ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance_grid->Date->headerCellClass() ?>"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance_grid->Date->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->AdvanceValidityDate) == "") { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance_grid->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->AdvanceValidityDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance_grid->AdvanceValidityDate->headerCellClass() ?>"><div><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->AdvanceValidityDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->AdvanceValidityDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->TotalRemainingAdvance) == "") { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance_grid->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->TotalRemainingAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance_grid->TotalRemainingAdvance->headerCellClass() ?>"><div><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->TotalRemainingAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->TotalRemainingAdvance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->TotalRemainingAdvance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance_grid->Remarks->headerCellClass() ?>"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance_grid->Remarks->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance_grid->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance_grid->SeectPaymentMode->headerCellClass() ?>"><div><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->SeectPaymentMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->SeectPaymentMode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->SeectPaymentMode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance_grid->PaidAmount->headerCellClass() ?>"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance_grid->PaidAmount->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->PaidAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->PaidAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance_grid->Currency->headerCellClass() ?>"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance_grid->Currency->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Currency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Currency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance_grid->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance_grid->CardNumber->headerCellClass() ?>"><div><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->CardNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance_grid->BankName->headerCellClass() ?>"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance_grid->BankName->headerCellClass() ?>"><div><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->BankName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance_grid->HospID->headerCellClass() ?>"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance_grid->HospID->headerCellClass() ?>"><div><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance_grid->Reception->headerCellClass() ?>"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance_grid->Reception->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_advance_grid->SortUrl($view_ip_advance_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance_grid->mrnno->headerCellClass() ?>"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno"><div class="ew-table-header-caption"><?php echo $view_ip_advance_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance_grid->mrnno->headerCellClass() ?>"><div><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ip_advance_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_advance_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$view_ip_advance_grid->StartRecord = 1;
$view_ip_advance_grid->StopRecord = $view_ip_advance_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($view_ip_advance->isConfirm() || $view_ip_advance_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_ip_advance_grid->FormKeyCountName) && ($view_ip_advance_grid->isGridAdd() || $view_ip_advance_grid->isGridEdit() || $view_ip_advance->isConfirm())) {
		$view_ip_advance_grid->KeyCount = $CurrentForm->getValue($view_ip_advance_grid->FormKeyCountName);
		$view_ip_advance_grid->StopRecord = $view_ip_advance_grid->StartRecord + $view_ip_advance_grid->KeyCount - 1;
	}
}
$view_ip_advance_grid->RecordCount = $view_ip_advance_grid->StartRecord - 1;
if ($view_ip_advance_grid->Recordset && !$view_ip_advance_grid->Recordset->EOF) {
	$view_ip_advance_grid->Recordset->moveFirst();
	$selectLimit = $view_ip_advance_grid->UseSelectLimit;
	if (!$selectLimit && $view_ip_advance_grid->StartRecord > 1)
		$view_ip_advance_grid->Recordset->move($view_ip_advance_grid->StartRecord - 1);
} elseif (!$view_ip_advance->AllowAddDeleteRow && $view_ip_advance_grid->StopRecord == 0) {
	$view_ip_advance_grid->StopRecord = $view_ip_advance->GridAddRowCount;
}

// Initialize aggregate
$view_ip_advance->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_advance->resetAttributes();
$view_ip_advance_grid->renderRow();
if ($view_ip_advance_grid->isGridAdd())
	$view_ip_advance_grid->RowIndex = 0;
if ($view_ip_advance_grid->isGridEdit())
	$view_ip_advance_grid->RowIndex = 0;
while ($view_ip_advance_grid->RecordCount < $view_ip_advance_grid->StopRecord) {
	$view_ip_advance_grid->RecordCount++;
	if ($view_ip_advance_grid->RecordCount >= $view_ip_advance_grid->StartRecord) {
		$view_ip_advance_grid->RowCount++;
		if ($view_ip_advance_grid->isGridAdd() || $view_ip_advance_grid->isGridEdit() || $view_ip_advance->isConfirm()) {
			$view_ip_advance_grid->RowIndex++;
			$CurrentForm->Index = $view_ip_advance_grid->RowIndex;
			if ($CurrentForm->hasValue($view_ip_advance_grid->FormActionName) && ($view_ip_advance->isConfirm() || $view_ip_advance_grid->EventCancelled))
				$view_ip_advance_grid->RowAction = strval($CurrentForm->getValue($view_ip_advance_grid->FormActionName));
			elseif ($view_ip_advance_grid->isGridAdd())
				$view_ip_advance_grid->RowAction = "insert";
			else
				$view_ip_advance_grid->RowAction = "";
		}

		// Set up key count
		$view_ip_advance_grid->KeyCount = $view_ip_advance_grid->RowIndex;

		// Init row class and style
		$view_ip_advance->resetAttributes();
		$view_ip_advance->CssClass = "";
		if ($view_ip_advance_grid->isGridAdd()) {
			if ($view_ip_advance->CurrentMode == "copy") {
				$view_ip_advance_grid->loadRowValues($view_ip_advance_grid->Recordset); // Load row values
				$view_ip_advance_grid->setRecordKey($view_ip_advance_grid->RowOldKey, $view_ip_advance_grid->Recordset); // Set old record key
			} else {
				$view_ip_advance_grid->loadRowValues(); // Load default values
				$view_ip_advance_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$view_ip_advance_grid->loadRowValues($view_ip_advance_grid->Recordset); // Load row values
		}
		$view_ip_advance->RowType = ROWTYPE_VIEW; // Render view
		if ($view_ip_advance_grid->isGridAdd()) // Grid add
			$view_ip_advance->RowType = ROWTYPE_ADD; // Render add
		if ($view_ip_advance_grid->isGridAdd() && $view_ip_advance->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values
		if ($view_ip_advance_grid->isGridEdit()) { // Grid edit
			if ($view_ip_advance->EventCancelled)
				$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values
			if ($view_ip_advance_grid->RowAction == "insert")
				$view_ip_advance->RowType = ROWTYPE_ADD; // Render add
			else
				$view_ip_advance->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_ip_advance_grid->isGridEdit() && ($view_ip_advance->RowType == ROWTYPE_EDIT || $view_ip_advance->RowType == ROWTYPE_ADD) && $view_ip_advance->EventCancelled) // Update failed
			$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values
		if ($view_ip_advance->RowType == ROWTYPE_EDIT) // Edit row
			$view_ip_advance_grid->EditRowCount++;
		if ($view_ip_advance->isConfirm()) // Confirm row
			$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_ip_advance->RowAttrs->merge(["data-rowindex" => $view_ip_advance_grid->RowCount, "id" => "r" . $view_ip_advance_grid->RowCount . "_view_ip_advance", "data-rowtype" => $view_ip_advance->RowType]);

		// Render row
		$view_ip_advance_grid->renderRow();

		// Render list options
		$view_ip_advance_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_ip_advance_grid->RowAction != "delete" && $view_ip_advance_grid->RowAction != "insertdelete" && !($view_ip_advance_grid->RowAction == "insert" && $view_ip_advance->isConfirm() && $view_ip_advance_grid->emptyRow())) {
?>
	<tr <?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_grid->ListOptions->render("body", "left", $view_ip_advance_grid->RowCount);
?>
	<?php if ($view_ip_advance_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ip_advance_grid->id->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_id" class="form-group"></span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_id" class="form-group">
<span<?php echo $view_ip_advance_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_id">
<span<?php echo $view_ip_advance_grid->id->viewAttributes() ?>><?php echo $view_ip_advance_grid->id->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $view_ip_advance_grid->Name->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Name" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Name->EditValue ?>"<?php echo $view_ip_advance_grid->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Name" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Name->EditValue ?>"<?php echo $view_ip_advance_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Name">
<span<?php echo $view_ip_advance_grid->Name->viewAttributes() ?>><?php echo $view_ip_advance_grid->Name->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_ip_advance_grid->Mobile->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Mobile" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Mobile->EditValue ?>"<?php echo $view_ip_advance_grid->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Mobile" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Mobile->EditValue ?>"<?php echo $view_ip_advance_grid->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Mobile">
<span<?php echo $view_ip_advance_grid->Mobile->viewAttributes() ?>><?php echo $view_ip_advance_grid->Mobile->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $view_ip_advance_grid->voucher_type->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_voucher_type" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->voucher_type->EditValue ?>"<?php echo $view_ip_advance_grid->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_voucher_type" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->voucher_type->EditValue ?>"<?php echo $view_ip_advance_grid->voucher_type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance_grid->voucher_type->viewAttributes() ?>><?php echo $view_ip_advance_grid->voucher_type->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_ip_advance_grid->Details->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Details" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Details->EditValue ?>"<?php echo $view_ip_advance_grid->Details->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Details" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Details->EditValue ?>"<?php echo $view_ip_advance_grid->Details->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Details">
<span<?php echo $view_ip_advance_grid->Details->viewAttributes() ?>><?php echo $view_ip_advance_grid->Details->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_ip_advance_grid->ModeofPayment->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_ModeofPayment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance_grid->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment"<?php echo $view_ip_advance_grid->ModeofPayment->editAttributes() ?>>
			<?php echo $view_ip_advance_grid->ModeofPayment->selectOptionListHtml("x{$view_ip_advance_grid->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_ip_advance_grid->ModeofPayment->Lookup->getParamTag($view_ip_advance_grid, "p_x" . $view_ip_advance_grid->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_ModeofPayment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance_grid->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment"<?php echo $view_ip_advance_grid->ModeofPayment->editAttributes() ?>>
			<?php echo $view_ip_advance_grid->ModeofPayment->selectOptionListHtml("x{$view_ip_advance_grid->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_ip_advance_grid->ModeofPayment->Lookup->getParamTag($view_ip_advance_grid, "p_x" . $view_ip_advance_grid->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance_grid->ModeofPayment->viewAttributes() ?>><?php echo $view_ip_advance_grid->ModeofPayment->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_ip_advance_grid->Amount->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Amount" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Amount->EditValue ?>"<?php echo $view_ip_advance_grid->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Amount" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Amount->EditValue ?>"<?php echo $view_ip_advance_grid->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Amount">
<span<?php echo $view_ip_advance_grid->Amount->viewAttributes() ?>><?php echo $view_ip_advance_grid->Amount->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_ip_advance_grid->AnyDues->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AnyDues" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AnyDues->EditValue ?>"<?php echo $view_ip_advance_grid->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AnyDues" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AnyDues->EditValue ?>"<?php echo $view_ip_advance_grid->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance_grid->AnyDues->viewAttributes() ?>><?php echo $view_ip_advance_grid->AnyDues->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ip_advance_grid->createdby->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_createdby">
<span<?php echo $view_ip_advance_grid->createdby->viewAttributes() ?>><?php echo $view_ip_advance_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ip_advance_grid->createddatetime->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance_grid->createddatetime->viewAttributes() ?>><?php echo $view_ip_advance_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ip_advance_grid->modifiedby->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance_grid->modifiedby->viewAttributes() ?>><?php echo $view_ip_advance_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ip_advance_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance_grid->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_advance_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $view_ip_advance_grid->PatID->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_ip_advance_grid->PatID->getSessionValue() != "") { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatID" class="form-group">
<span<?php echo $view_ip_advance_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatID" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatID->EditValue ?>"<?php echo $view_ip_advance_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatID" class="form-group">
<span<?php echo $view_ip_advance_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PatID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatID">
<span<?php echo $view_ip_advance_grid->PatID->viewAttributes() ?>><?php echo $view_ip_advance_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ip_advance_grid->PatientID->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatientID" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatientID->EditValue ?>"<?php echo $view_ip_advance_grid->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatientID" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatientID->EditValue ?>"<?php echo $view_ip_advance_grid->PatientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatientID">
<span<?php echo $view_ip_advance_grid->PatientID->viewAttributes() ?>><?php echo $view_ip_advance_grid->PatientID->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_ip_advance_grid->PatientName->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatientName" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatientName->EditValue ?>"<?php echo $view_ip_advance_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatientName" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatientName->EditValue ?>"<?php echo $view_ip_advance_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PatientName">
<span<?php echo $view_ip_advance_grid->PatientName->viewAttributes() ?>><?php echo $view_ip_advance_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType" <?php echo $view_ip_advance_grid->VisiteType->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_VisiteType" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->VisiteType->EditValue ?>"<?php echo $view_ip_advance_grid->VisiteType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_VisiteType" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->VisiteType->EditValue ?>"<?php echo $view_ip_advance_grid->VisiteType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance_grid->VisiteType->viewAttributes() ?>><?php echo $view_ip_advance_grid->VisiteType->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate" <?php echo $view_ip_advance_grid->VisitDate->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_VisitDate" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->VisitDate->EditValue ?>"<?php echo $view_ip_advance_grid->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->VisitDate->ReadOnly && !$view_ip_advance_grid->VisitDate->Disabled && !isset($view_ip_advance_grid->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_VisitDate" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->VisitDate->EditValue ?>"<?php echo $view_ip_advance_grid->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->VisitDate->ReadOnly && !$view_ip_advance_grid->VisitDate->Disabled && !isset($view_ip_advance_grid->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance_grid->VisitDate->viewAttributes() ?>><?php echo $view_ip_advance_grid->VisitDate->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo" <?php echo $view_ip_advance_grid->AdvanceNo->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AdvanceNo" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance_grid->AdvanceNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AdvanceNo" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance_grid->AdvanceNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance_grid->AdvanceNo->viewAttributes() ?>><?php echo $view_ip_advance_grid->AdvanceNo->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $view_ip_advance_grid->Status->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Status" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Status->EditValue ?>"<?php echo $view_ip_advance_grid->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Status" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Status->EditValue ?>"<?php echo $view_ip_advance_grid->Status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Status">
<span<?php echo $view_ip_advance_grid->Status->viewAttributes() ?>><?php echo $view_ip_advance_grid->Status->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Date->Visible) { // Date ?>
		<td data-name="Date" <?php echo $view_ip_advance_grid->Date->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Date" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Date->EditValue ?>"<?php echo $view_ip_advance_grid->Date->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->Date->ReadOnly && !$view_ip_advance_grid->Date->Disabled && !isset($view_ip_advance_grid->Date->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Date" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Date->EditValue ?>"<?php echo $view_ip_advance_grid->Date->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->Date->ReadOnly && !$view_ip_advance_grid->Date->Disabled && !isset($view_ip_advance_grid->Date->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Date">
<span<?php echo $view_ip_advance_grid->Date->viewAttributes() ?>><?php echo $view_ip_advance_grid->Date->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate" <?php echo $view_ip_advance_grid->AdvanceValidityDate->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AdvanceValidityDate" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance_grid->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->AdvanceValidityDate->ReadOnly && !$view_ip_advance_grid->AdvanceValidityDate->Disabled && !isset($view_ip_advance_grid->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AdvanceValidityDate" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance_grid->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->AdvanceValidityDate->ReadOnly && !$view_ip_advance_grid->AdvanceValidityDate->Disabled && !isset($view_ip_advance_grid->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance_grid->AdvanceValidityDate->viewAttributes() ?>><?php echo $view_ip_advance_grid->AdvanceValidityDate->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance" <?php echo $view_ip_advance_grid->TotalRemainingAdvance->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_TotalRemainingAdvance" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance_grid->TotalRemainingAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_TotalRemainingAdvance" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance_grid->TotalRemainingAdvance->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance_grid->TotalRemainingAdvance->viewAttributes() ?>><?php echo $view_ip_advance_grid->TotalRemainingAdvance->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $view_ip_advance_grid->Remarks->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Remarks" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Remarks->EditValue ?>"<?php echo $view_ip_advance_grid->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Remarks" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Remarks->EditValue ?>"<?php echo $view_ip_advance_grid->Remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Remarks">
<span<?php echo $view_ip_advance_grid->Remarks->viewAttributes() ?>><?php echo $view_ip_advance_grid->Remarks->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode" <?php echo $view_ip_advance_grid->SeectPaymentMode->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_SeectPaymentMode" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance_grid->SeectPaymentMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_SeectPaymentMode" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance_grid->SeectPaymentMode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance_grid->SeectPaymentMode->viewAttributes() ?>><?php echo $view_ip_advance_grid->SeectPaymentMode->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" <?php echo $view_ip_advance_grid->PaidAmount->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PaidAmount" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PaidAmount->EditValue ?>"<?php echo $view_ip_advance_grid->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PaidAmount" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PaidAmount->EditValue ?>"<?php echo $view_ip_advance_grid->PaidAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance_grid->PaidAmount->viewAttributes() ?>><?php echo $view_ip_advance_grid->PaidAmount->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Currency->Visible) { // Currency ?>
		<td data-name="Currency" <?php echo $view_ip_advance_grid->Currency->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Currency" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Currency->EditValue ?>"<?php echo $view_ip_advance_grid->Currency->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Currency" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Currency->EditValue ?>"<?php echo $view_ip_advance_grid->Currency->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Currency">
<span<?php echo $view_ip_advance_grid->Currency->viewAttributes() ?>><?php echo $view_ip_advance_grid->Currency->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $view_ip_advance_grid->CardNumber->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_CardNumber" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->CardNumber->EditValue ?>"<?php echo $view_ip_advance_grid->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_CardNumber" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->CardNumber->EditValue ?>"<?php echo $view_ip_advance_grid->CardNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance_grid->CardNumber->viewAttributes() ?>><?php echo $view_ip_advance_grid->CardNumber->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $view_ip_advance_grid->BankName->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_BankName" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->BankName->EditValue ?>"<?php echo $view_ip_advance_grid->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_BankName" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->BankName->EditValue ?>"<?php echo $view_ip_advance_grid->BankName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_BankName">
<span<?php echo $view_ip_advance_grid->BankName->viewAttributes() ?>><?php echo $view_ip_advance_grid->BankName->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ip_advance_grid->HospID->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_HospID">
<span<?php echo $view_ip_advance_grid->HospID->viewAttributes() ?>><?php echo $view_ip_advance_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_ip_advance_grid->Reception->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_ip_advance_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Reception" class="form-group">
<span<?php echo $view_ip_advance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Reception" class="form-group">
<?php $view_ip_advance_grid->Reception->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception"><?php echo EmptyValue(strval($view_ip_advance_grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_advance_grid->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_advance_grid->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_advance_grid->Reception->ReadOnly || $view_ip_advance_grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_advance_grid->Reception->Lookup->getParamTag($view_ip_advance_grid, "p_x" . $view_ip_advance_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_advance_grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo $view_ip_advance_grid->Reception->CurrentValue ?>"<?php echo $view_ip_advance_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Reception" class="form-group">
<span<?php echo $view_ip_advance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_Reception">
<span<?php echo $view_ip_advance_grid->Reception->viewAttributes() ?>><?php echo $view_ip_advance_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_ip_advance_grid->mrnno->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_ip_advance_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_mrnno" class="form-group">
<span<?php echo $view_ip_advance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_mrnno" class="form-group">
<input type="text" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->mrnno->EditValue ?>"<?php echo $view_ip_advance_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_mrnno" class="form-group">
<span<?php echo $view_ip_advance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCount ?>_view_ip_advance_mrnno">
<span<?php echo $view_ip_advance_grid->mrnno->viewAttributes() ?>><?php echo $view_ip_advance_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_grid->ListOptions->render("body", "right", $view_ip_advance_grid->RowCount);
?>
	</tr>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD || $view_ip_advance->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "load"], function() {
	fview_ip_advancegrid.updateLists(<?php echo $view_ip_advance_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_ip_advance_grid->isGridAdd() || $view_ip_advance->CurrentMode == "copy")
		if (!$view_ip_advance_grid->Recordset->EOF)
			$view_ip_advance_grid->Recordset->moveNext();
}
?>
<?php
	if ($view_ip_advance->CurrentMode == "add" || $view_ip_advance->CurrentMode == "copy" || $view_ip_advance->CurrentMode == "edit") {
		$view_ip_advance_grid->RowIndex = '$rowindex$';
		$view_ip_advance_grid->loadRowValues();

		// Set row properties
		$view_ip_advance->resetAttributes();
		$view_ip_advance->RowAttrs->merge(["data-rowindex" => $view_ip_advance_grid->RowIndex, "id" => "r0_view_ip_advance", "data-rowtype" => ROWTYPE_ADD]);
		$view_ip_advance->RowAttrs->appendClass("ew-template");
		$view_ip_advance->RowType = ROWTYPE_ADD;

		// Render row
		$view_ip_advance_grid->renderRow();

		// Render list options
		$view_ip_advance_grid->renderListOptions();
		$view_ip_advance_grid->StartRowCount = 0;
?>
	<tr <?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_grid->ListOptions->render("body", "left", $view_ip_advance_grid->RowIndex);
?>
	<?php if ($view_ip_advance_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_id" class="form-group view_ip_advance_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_id" class="form-group view_ip_advance_id">
<span<?php echo $view_ip_advance_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Name->EditValue ?>"<?php echo $view_ip_advance_grid->Name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<span<?php echo $view_ip_advance_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance_grid->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Mobile->EditValue ?>"<?php echo $view_ip_advance_grid->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<span<?php echo $view_ip_advance_grid->Mobile->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Mobile->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance_grid->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->voucher_type->EditValue ?>"<?php echo $view_ip_advance_grid->voucher_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance_grid->voucher_type->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->voucher_type->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance_grid->voucher_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Details->Visible) { // Details ?>
		<td data-name="Details">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Details->EditValue ?>"<?php echo $view_ip_advance_grid->Details->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<span<?php echo $view_ip_advance_grid->Details->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Details->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance_grid->Details->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance_grid->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment"<?php echo $view_ip_advance_grid->ModeofPayment->editAttributes() ?>>
			<?php echo $view_ip_advance_grid->ModeofPayment->selectOptionListHtml("x{$view_ip_advance_grid->RowIndex}_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_ip_advance_grid->ModeofPayment->Lookup->getParamTag($view_ip_advance_grid, "p_x" . $view_ip_advance_grid->RowIndex . "_ModeofPayment") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance_grid->ModeofPayment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->ModeofPayment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance_grid->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Amount->EditValue ?>"<?php echo $view_ip_advance_grid->Amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<span<?php echo $view_ip_advance_grid->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance_grid->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AnyDues->EditValue ?>"<?php echo $view_ip_advance_grid->AnyDues->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance_grid->AnyDues->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->AnyDues->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance_grid->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_createdby" class="form-group view_ip_advance_createdby">
<span<?php echo $view_ip_advance_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_createddatetime" class="form-group view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_modifiedby" class="form-group view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_modifieddatetime" class="form-group view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php if ($view_ip_advance_grid->PatID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?php echo $view_ip_advance_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<input type="text" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatID->EditValue ?>"<?php echo $view_ip_advance_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?php echo $view_ip_advance_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatientID->EditValue ?>"<?php echo $view_ip_advance_grid->PatientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<span<?php echo $view_ip_advance_grid->PatientID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PatientID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PatientName->EditValue ?>"<?php echo $view_ip_advance_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<span<?php echo $view_ip_advance_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->VisiteType->EditValue ?>"<?php echo $view_ip_advance_grid->VisiteType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance_grid->VisiteType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->VisiteType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance_grid->VisiteType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->VisitDate->EditValue ?>"<?php echo $view_ip_advance_grid->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->VisitDate->ReadOnly && !$view_ip_advance_grid->VisitDate->Disabled && !isset($view_ip_advance_grid->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance_grid->VisitDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->VisitDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance_grid->VisitDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance_grid->AdvanceNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance_grid->AdvanceNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->AdvanceNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Status->Visible) { // Status ?>
		<td data-name="Status">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Status->EditValue ?>"<?php echo $view_ip_advance_grid->Status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<span<?php echo $view_ip_advance_grid->Status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance_grid->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Date->Visible) { // Date ?>
		<td data-name="Date">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Date->EditValue ?>"<?php echo $view_ip_advance_grid->Date->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->Date->ReadOnly && !$view_ip_advance_grid->Date->Disabled && !isset($view_ip_advance_grid->Date->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<span<?php echo $view_ip_advance_grid->Date->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Date->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance_grid->Date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance_grid->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance_grid->AdvanceValidityDate->ReadOnly && !$view_ip_advance_grid->AdvanceValidityDate->Disabled && !isset($view_ip_advance_grid->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance_grid->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance_grid->AdvanceValidityDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->AdvanceValidityDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance_grid->AdvanceValidityDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance_grid->TotalRemainingAdvance->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance_grid->TotalRemainingAdvance->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->TotalRemainingAdvance->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance_grid->TotalRemainingAdvance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Remarks->EditValue ?>"<?php echo $view_ip_advance_grid->Remarks->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<span<?php echo $view_ip_advance_grid->Remarks->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Remarks->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance_grid->Remarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance_grid->SeectPaymentMode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance_grid->SeectPaymentMode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->SeectPaymentMode->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance_grid->SeectPaymentMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->PaidAmount->EditValue ?>"<?php echo $view_ip_advance_grid->PaidAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance_grid->PaidAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->PaidAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance_grid->PaidAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Currency->Visible) { // Currency ?>
		<td data-name="Currency">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->Currency->EditValue ?>"<?php echo $view_ip_advance_grid->Currency->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<span<?php echo $view_ip_advance_grid->Currency->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Currency->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance_grid->Currency->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->CardNumber->EditValue ?>"<?php echo $view_ip_advance_grid->CardNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance_grid->CardNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->CardNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance_grid->CardNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->BankName->Visible) { // BankName ?>
		<td data-name="BankName">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->BankName->EditValue ?>"<?php echo $view_ip_advance_grid->BankName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<span<?php echo $view_ip_advance_grid->BankName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->BankName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance_grid->BankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_HospID" class="form-group view_ip_advance_HospID">
<span<?php echo $view_ip_advance_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php if ($view_ip_advance_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?php echo $view_ip_advance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<?php $view_ip_advance_grid->Reception->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception"><?php echo EmptyValue(strval($view_ip_advance_grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_advance_grid->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_advance_grid->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_advance_grid->Reception->ReadOnly || $view_ip_advance_grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_advance_grid->Reception->Lookup->getParamTag($view_ip_advance_grid, "p_x" . $view_ip_advance_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_advance_grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo $view_ip_advance_grid->Reception->CurrentValue ?>"<?php echo $view_ip_advance_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?php echo $view_ip_advance_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php if ($view_ip_advance_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?php echo $view_ip_advance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<input type="text" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance_grid->mrnno->EditValue ?>"<?php echo $view_ip_advance_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?php echo $view_ip_advance_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ip_advance_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_grid->ListOptions->render("body", "right", $view_ip_advance_grid->RowIndex);
?>
<script>
loadjs.ready(["fview_ip_advancegrid", "load"], function() {
	fview_ip_advancegrid.updateLists(<?php echo $view_ip_advance_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_ip_advance->CurrentMode == "add" || $view_ip_advance->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $view_ip_advance_grid->FormKeyCountName ?>" id="<?php echo $view_ip_advance_grid->FormKeyCountName ?>" value="<?php echo $view_ip_advance_grid->KeyCount ?>">
<?php echo $view_ip_advance_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_ip_advance->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $view_ip_advance_grid->FormKeyCountName ?>" id="<?php echo $view_ip_advance_grid->FormKeyCountName ?>" value="<?php echo $view_ip_advance_grid->KeyCount ?>">
<?php echo $view_ip_advance_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_ip_advance->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fview_ip_advancegrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_advance_grid->Recordset)
	$view_ip_advance_grid->Recordset->Close();
?>
<?php if ($view_ip_advance_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_ip_advance_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_advance_grid->TotalRecords == 0 && !$view_ip_advance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$view_ip_advance_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_ip_advance",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$view_ip_advance_grid->terminate();
?>