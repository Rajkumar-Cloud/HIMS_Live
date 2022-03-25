<?php
namespace PHPMaker2019\HIMS;

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
<?php if (!$view_ip_advance->isExport()) { ?>
<script>

// Form object
var fview_ip_advancegrid = new ew.Form("fview_ip_advancegrid", "grid");
fview_ip_advancegrid.formKeyCountName = '<?php echo $view_ip_advance_grid->FormKeyCountName ?>';

// Validate form
fview_ip_advancegrid.validate = function() {
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
		<?php if ($view_ip_advance_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->id->caption(), $view_ip_advance->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Name->caption(), $view_ip_advance->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Mobile->caption(), $view_ip_advance->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->voucher_type->caption(), $view_ip_advance->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Details->caption(), $view_ip_advance->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->ModeofPayment->caption(), $view_ip_advance->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Amount->caption(), $view_ip_advance->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->Amount->errorMessage()) ?>");
		<?php if ($view_ip_advance_grid->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->AnyDues->caption(), $view_ip_advance->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->createdby->caption(), $view_ip_advance->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->createddatetime->caption(), $view_ip_advance->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->modifiedby->caption(), $view_ip_advance->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->modifieddatetime->caption(), $view_ip_advance->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PatID->caption(), $view_ip_advance->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PatientID->caption(), $view_ip_advance->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PatientName->caption(), $view_ip_advance->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->VisiteType->Required) { ?>
			elm = this.getElements("x" + infix + "_VisiteType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->VisiteType->caption(), $view_ip_advance->VisiteType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->VisitDate->Required) { ?>
			elm = this.getElements("x" + infix + "_VisitDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->VisitDate->caption(), $view_ip_advance->VisitDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_VisitDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->VisitDate->errorMessage()) ?>");
		<?php if ($view_ip_advance_grid->AdvanceNo->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->AdvanceNo->caption(), $view_ip_advance->AdvanceNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Status->caption(), $view_ip_advance->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Date->caption(), $view_ip_advance->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->Date->errorMessage()) ?>");
		<?php if ($view_ip_advance_grid->AdvanceValidityDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AdvanceValidityDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->AdvanceValidityDate->caption(), $view_ip_advance->AdvanceValidityDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AdvanceValidityDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_advance->AdvanceValidityDate->errorMessage()) ?>");
		<?php if ($view_ip_advance_grid->TotalRemainingAdvance->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalRemainingAdvance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->TotalRemainingAdvance->caption(), $view_ip_advance->TotalRemainingAdvance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Remarks->caption(), $view_ip_advance->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->SeectPaymentMode->Required) { ?>
			elm = this.getElements("x" + infix + "_SeectPaymentMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->SeectPaymentMode->caption(), $view_ip_advance->SeectPaymentMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->PaidAmount->caption(), $view_ip_advance->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Currency->caption(), $view_ip_advance->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->CardNumber->caption(), $view_ip_advance->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->BankName->caption(), $view_ip_advance->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->HospID->caption(), $view_ip_advance->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->Reception->caption(), $view_ip_advance->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_advance_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_advance->mrnno->caption(), $view_ip_advance->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
fview_ip_advancegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_advancegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_advancegrid.lists["x_ModeofPayment"] = <?php echo $view_ip_advance_grid->ModeofPayment->Lookup->toClientList() ?>;
fview_ip_advancegrid.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_ip_advance_grid->ModeofPayment->lookupOptions()) ?>;
fview_ip_advancegrid.lists["x_Reception"] = <?php echo $view_ip_advance_grid->Reception->Lookup->toClientList() ?>;
fview_ip_advancegrid.lists["x_Reception"].options = <?php echo JsonEncode($view_ip_advance_grid->Reception->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$view_ip_advance_grid->renderOtherOptions();
?>
<?php $view_ip_advance_grid->showPageHeader(); ?>
<?php
$view_ip_advance_grid->showMessage();
?>
<?php if ($view_ip_advance_grid->TotalRecs > 0 || $view_ip_advance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_advance_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_advance">
<?php if ($view_ip_advance_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $view_ip_advance_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_ip_advancegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_ip_advance" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_view_ip_advancegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_advance_grid->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_advance_grid->renderListOptions();

// Render list options (header, left)
$view_ip_advance_grid->ListOptions->render("header", "left");
?>
<?php if ($view_ip_advance->id->Visible) { // id ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_advance->id->headerCellClass() ?>"><div id="elh_view_ip_advance_id" class="view_ip_advance_id"><div class="ew-table-header-caption"><?php echo $view_ip_advance->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_advance->id->headerCellClass() ?>"><div><div id="elh_view_ip_advance_id" class="view_ip_advance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Name->Visible) { // Name ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance->Name->headerCellClass() ?>"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ip_advance->Name->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance->Mobile->headerCellClass() ?>"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_advance->Mobile->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type"><div class="ew-table-header-caption"><?php echo $view_ip_advance->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_advance->voucher_type->headerCellClass() ?>"><div><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Details->Visible) { // Details ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance->Details->headerCellClass() ?>"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_ip_advance->Details->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_ip_advance->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_advance->ModeofPayment->headerCellClass() ?>"><div><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance->Amount->headerCellClass() ?>"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_ip_advance->Amount->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues"><div class="ew-table-header-caption"><?php echo $view_ip_advance->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_advance->AnyDues->headerCellClass() ?>"><div><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance->createdby->headerCellClass() ?>"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_advance->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_advance->createdby->headerCellClass() ?>"><div><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_advance->createddatetime->headerCellClass() ?>"><div><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_advance->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_advance->modifiedby->headerCellClass() ?>"><div><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_advance->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_advance->modifieddatetime->headerCellClass() ?>"><div><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance->PatID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_ip_advance->PatID->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance->PatientID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_advance->PatientID->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance->PatientName->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_advance->PatientName->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->VisiteType) == "") { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance->VisiteType->headerCellClass() ?>"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType"><div class="ew-table-header-caption"><?php echo $view_ip_advance->VisiteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisiteType" class="<?php echo $view_ip_advance->VisiteType->headerCellClass() ?>"><div><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->VisiteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->VisiteType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->VisiteType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->VisitDate) == "") { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance->VisitDate->headerCellClass() ?>"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance->VisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisitDate" class="<?php echo $view_ip_advance->VisitDate->headerCellClass() ?>"><div><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->VisitDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->VisitDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->AdvanceNo) == "") { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance->AdvanceNo->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo"><div class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceNo" class="<?php echo $view_ip_advance->AdvanceNo->headerCellClass() ?>"><div><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->AdvanceNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->AdvanceNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Status->Visible) { // Status ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance->Status->headerCellClass() ?>"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $view_ip_advance->Status->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Date->Visible) { // Date ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Date) == "") { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance->Date->headerCellClass() ?>"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Date" class="<?php echo $view_ip_advance->Date->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->AdvanceValidityDate) == "") { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate"><div class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdvanceValidityDate" class="<?php echo $view_ip_advance->AdvanceValidityDate->headerCellClass() ?>"><div><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->AdvanceValidityDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->AdvanceValidityDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->TotalRemainingAdvance) == "") { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance"><div class="ew-table-header-caption"><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalRemainingAdvance" class="<?php echo $view_ip_advance->TotalRemainingAdvance->headerCellClass() ?>"><div><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->TotalRemainingAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->TotalRemainingAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance->Remarks->headerCellClass() ?>"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_ip_advance->Remarks->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $view_ip_advance->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $view_ip_advance->SeectPaymentMode->headerCellClass() ?>"><div><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->SeectPaymentMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->SeectPaymentMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->SeectPaymentMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance->PaidAmount->headerCellClass() ?>"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount"><div class="ew-table-header-caption"><?php echo $view_ip_advance->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $view_ip_advance->PaidAmount->headerCellClass() ?>"><div><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance->Currency->headerCellClass() ?>"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_ip_advance->Currency->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber"><div class="ew-table-header-caption"><?php echo $view_ip_advance->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_advance->CardNumber->headerCellClass() ?>"><div><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->CardNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance->BankName->headerCellClass() ?>"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName"><div class="ew-table-header-caption"><?php echo $view_ip_advance->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_ip_advance->BankName->headerCellClass() ?>"><div><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->BankName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance->HospID->headerCellClass() ?>"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_advance->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_advance->HospID->headerCellClass() ?>"><div><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance->Reception->headerCellClass() ?>"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception"><div class="ew-table-header-caption"><?php echo $view_ip_advance->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_ip_advance->Reception->headerCellClass() ?>"><div><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_advance->sortUrl($view_ip_advance->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance->mrnno->headerCellClass() ?>"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno"><div class="ew-table-header-caption"><?php echo $view_ip_advance->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_advance->mrnno->headerCellClass() ?>"><div><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_advance->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_advance->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_advance->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
$view_ip_advance_grid->StartRec = 1;
$view_ip_advance_grid->StopRec = $view_ip_advance_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $view_ip_advance_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_ip_advance_grid->FormKeyCountName) && ($view_ip_advance->isGridAdd() || $view_ip_advance->isGridEdit() || $view_ip_advance->isConfirm())) {
		$view_ip_advance_grid->KeyCount = $CurrentForm->getValue($view_ip_advance_grid->FormKeyCountName);
		$view_ip_advance_grid->StopRec = $view_ip_advance_grid->StartRec + $view_ip_advance_grid->KeyCount - 1;
	}
}
$view_ip_advance_grid->RecCnt = $view_ip_advance_grid->StartRec - 1;
if ($view_ip_advance_grid->Recordset && !$view_ip_advance_grid->Recordset->EOF) {
	$view_ip_advance_grid->Recordset->moveFirst();
	$selectLimit = $view_ip_advance_grid->UseSelectLimit;
	if (!$selectLimit && $view_ip_advance_grid->StartRec > 1)
		$view_ip_advance_grid->Recordset->move($view_ip_advance_grid->StartRec - 1);
} elseif (!$view_ip_advance->AllowAddDeleteRow && $view_ip_advance_grid->StopRec == 0) {
	$view_ip_advance_grid->StopRec = $view_ip_advance->GridAddRowCount;
}

// Initialize aggregate
$view_ip_advance->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_advance->resetAttributes();
$view_ip_advance_grid->renderRow();
if ($view_ip_advance->isGridAdd())
	$view_ip_advance_grid->RowIndex = 0;
if ($view_ip_advance->isGridEdit())
	$view_ip_advance_grid->RowIndex = 0;
while ($view_ip_advance_grid->RecCnt < $view_ip_advance_grid->StopRec) {
	$view_ip_advance_grid->RecCnt++;
	if ($view_ip_advance_grid->RecCnt >= $view_ip_advance_grid->StartRec) {
		$view_ip_advance_grid->RowCnt++;
		if ($view_ip_advance->isGridAdd() || $view_ip_advance->isGridEdit() || $view_ip_advance->isConfirm()) {
			$view_ip_advance_grid->RowIndex++;
			$CurrentForm->Index = $view_ip_advance_grid->RowIndex;
			if ($CurrentForm->hasValue($view_ip_advance_grid->FormActionName) && $view_ip_advance_grid->EventCancelled)
				$view_ip_advance_grid->RowAction = strval($CurrentForm->getValue($view_ip_advance_grid->FormActionName));
			elseif ($view_ip_advance->isGridAdd())
				$view_ip_advance_grid->RowAction = "insert";
			else
				$view_ip_advance_grid->RowAction = "";
		}

		// Set up key count
		$view_ip_advance_grid->KeyCount = $view_ip_advance_grid->RowIndex;

		// Init row class and style
		$view_ip_advance->resetAttributes();
		$view_ip_advance->CssClass = "";
		if ($view_ip_advance->isGridAdd()) {
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
		if ($view_ip_advance->isGridAdd()) // Grid add
			$view_ip_advance->RowType = ROWTYPE_ADD; // Render add
		if ($view_ip_advance->isGridAdd() && $view_ip_advance->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values
		if ($view_ip_advance->isGridEdit()) { // Grid edit
			if ($view_ip_advance->EventCancelled)
				$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values
			if ($view_ip_advance_grid->RowAction == "insert")
				$view_ip_advance->RowType = ROWTYPE_ADD; // Render add
			else
				$view_ip_advance->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_ip_advance->isGridEdit() && ($view_ip_advance->RowType == ROWTYPE_EDIT || $view_ip_advance->RowType == ROWTYPE_ADD) && $view_ip_advance->EventCancelled) // Update failed
			$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values
		if ($view_ip_advance->RowType == ROWTYPE_EDIT) // Edit row
			$view_ip_advance_grid->EditRowCnt++;
		if ($view_ip_advance->isConfirm()) // Confirm row
			$view_ip_advance_grid->restoreCurrentRowFormValues($view_ip_advance_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$view_ip_advance->RowAttrs = array_merge($view_ip_advance->RowAttrs, array('data-rowindex'=>$view_ip_advance_grid->RowCnt, 'id'=>'r' . $view_ip_advance_grid->RowCnt . '_view_ip_advance', 'data-rowtype'=>$view_ip_advance->RowType));

		// Render row
		$view_ip_advance_grid->renderRow();

		// Render list options
		$view_ip_advance_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_ip_advance_grid->RowAction <> "delete" && $view_ip_advance_grid->RowAction <> "insertdelete" && !($view_ip_advance_grid->RowAction == "insert" && $view_ip_advance->isConfirm() && $view_ip_advance_grid->emptyRow())) {
?>
	<tr<?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_grid->ListOptions->render("body", "left", $view_ip_advance_grid->RowCnt);
?>
	<?php if ($view_ip_advance->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_advance->id->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_id" class="form-group view_ip_advance_id">
<span<?php echo $view_ip_advance->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_id" class="view_ip_advance_id">
<span<?php echo $view_ip_advance->id->viewAttributes() ?>>
<?php echo $view_ip_advance->id->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $view_ip_advance->Name->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Name->EditValue ?>"<?php echo $view_ip_advance->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Name->EditValue ?>"<?php echo $view_ip_advance->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Name" class="view_ip_advance_Name">
<span<?php echo $view_ip_advance->Name->viewAttributes() ?>>
<?php echo $view_ip_advance->Name->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_ip_advance->Mobile->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Mobile->EditValue ?>"<?php echo $view_ip_advance->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Mobile->EditValue ?>"<?php echo $view_ip_advance->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Mobile" class="view_ip_advance_Mobile">
<span<?php echo $view_ip_advance->Mobile->viewAttributes() ?>>
<?php echo $view_ip_advance->Mobile->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_ip_advance->voucher_type->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->voucher_type->EditValue ?>"<?php echo $view_ip_advance->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->voucher_type->EditValue ?>"<?php echo $view_ip_advance->voucher_type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance->voucher_type->viewAttributes() ?>>
<?php echo $view_ip_advance->voucher_type->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_ip_advance->Details->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Details->EditValue ?>"<?php echo $view_ip_advance->Details->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Details->EditValue ?>"<?php echo $view_ip_advance->Details->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Details" class="view_ip_advance_Details">
<span<?php echo $view_ip_advance->Details->viewAttributes() ?>>
<?php echo $view_ip_advance->Details->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->editAttributes() ?>>
		<?php echo $view_ip_advance->ModeofPayment->selectOptionListHtml("x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_ip_advance->ModeofPayment->Lookup->getParamTag("p_x" . $view_ip_advance_grid->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->editAttributes() ?>>
		<?php echo $view_ip_advance->ModeofPayment->selectOptionListHtml("x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_ip_advance->ModeofPayment->Lookup->getParamTag("p_x" . $view_ip_advance_grid->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance->ModeofPayment->viewAttributes() ?>>
<?php echo $view_ip_advance->ModeofPayment->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_ip_advance->Amount->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Amount->EditValue ?>"<?php echo $view_ip_advance->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Amount->EditValue ?>"<?php echo $view_ip_advance->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Amount" class="view_ip_advance_Amount">
<span<?php echo $view_ip_advance->Amount->viewAttributes() ?>>
<?php echo $view_ip_advance->Amount->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_ip_advance->AnyDues->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AnyDues->EditValue ?>"<?php echo $view_ip_advance->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AnyDues->EditValue ?>"<?php echo $view_ip_advance->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance->AnyDues->viewAttributes() ?>>
<?php echo $view_ip_advance->AnyDues->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_advance->createdby->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_createdby" class="view_ip_advance_createdby">
<span<?php echo $view_ip_advance->createdby->viewAttributes() ?>>
<?php echo $view_ip_advance->createdby->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_advance->createddatetime->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_advance->modifiedby->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_advance->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_advance->modifieddatetime->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_ip_advance->PatID->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_ip_advance->PatID->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<input type="text" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->PatID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatID->EditValue ?>"<?php echo $view_ip_advance->PatID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatID->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatID" class="view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatID->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_advance->PatientID->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientID->EditValue ?>"<?php echo $view_ip_advance->PatientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientID->EditValue ?>"<?php echo $view_ip_advance->PatientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatientID" class="view_ip_advance_PatientID">
<span<?php echo $view_ip_advance->PatientID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientID->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_ip_advance->PatientName->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientName->EditValue ?>"<?php echo $view_ip_advance->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientName->EditValue ?>"<?php echo $view_ip_advance->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PatientName" class="view_ip_advance_PatientName">
<span<?php echo $view_ip_advance->PatientName->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientName->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType"<?php echo $view_ip_advance->VisiteType->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisiteType->EditValue ?>"<?php echo $view_ip_advance->VisiteType->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisiteType->EditValue ?>"<?php echo $view_ip_advance->VisiteType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance->VisiteType->viewAttributes() ?>>
<?php echo $view_ip_advance->VisiteType->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate"<?php echo $view_ip_advance->VisitDate->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisitDate->EditValue ?>"<?php echo $view_ip_advance->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance->VisitDate->ReadOnly && !$view_ip_advance->VisitDate->Disabled && !isset($view_ip_advance->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance->VisitDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisitDate->EditValue ?>"<?php echo $view_ip_advance->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance->VisitDate->ReadOnly && !$view_ip_advance->VisitDate->Disabled && !isset($view_ip_advance->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance->VisitDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance->VisitDate->viewAttributes() ?>>
<?php echo $view_ip_advance->VisitDate->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo"<?php echo $view_ip_advance->AdvanceNo->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance->AdvanceNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance->AdvanceNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance->AdvanceNo->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceNo->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $view_ip_advance->Status->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Status->EditValue ?>"<?php echo $view_ip_advance->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Status->EditValue ?>"<?php echo $view_ip_advance->Status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Status" class="view_ip_advance_Status">
<span<?php echo $view_ip_advance->Status->viewAttributes() ?>>
<?php echo $view_ip_advance->Status->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Date->Visible) { // Date ?>
		<td data-name="Date"<?php echo $view_ip_advance->Date->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_ip_advance->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Date->EditValue ?>"<?php echo $view_ip_advance->Date->editAttributes() ?>>
<?php if (!$view_ip_advance->Date->ReadOnly && !$view_ip_advance->Date->Disabled && !isset($view_ip_advance->Date->EditAttrs["readonly"]) && !isset($view_ip_advance->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_ip_advance->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Date->EditValue ?>"<?php echo $view_ip_advance->Date->editAttributes() ?>>
<?php if (!$view_ip_advance->Date->ReadOnly && !$view_ip_advance->Date->Disabled && !isset($view_ip_advance->Date->EditAttrs["readonly"]) && !isset($view_ip_advance->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Date" class="view_ip_advance_Date">
<span<?php echo $view_ip_advance->Date->viewAttributes() ?>>
<?php echo $view_ip_advance->Date->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate"<?php echo $view_ip_advance->AdvanceValidityDate->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance->AdvanceValidityDate->ReadOnly && !$view_ip_advance->AdvanceValidityDate->Disabled && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance->AdvanceValidityDate->ReadOnly && !$view_ip_advance->AdvanceValidityDate->Disabled && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceValidityDate->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance"<?php echo $view_ip_advance->TotalRemainingAdvance->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance->TotalRemainingAdvance->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance->TotalRemainingAdvance->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $view_ip_advance->TotalRemainingAdvance->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_ip_advance->Remarks->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Remarks->EditValue ?>"<?php echo $view_ip_advance->Remarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Remarks->EditValue ?>"<?php echo $view_ip_advance->Remarks->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Remarks" class="view_ip_advance_Remarks">
<span<?php echo $view_ip_advance->Remarks->viewAttributes() ?>>
<?php echo $view_ip_advance->Remarks->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode"<?php echo $view_ip_advance->SeectPaymentMode->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance->SeectPaymentMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance->SeectPaymentMode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance->SeectPaymentMode->viewAttributes() ?>>
<?php echo $view_ip_advance->SeectPaymentMode->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $view_ip_advance->PaidAmount->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PaidAmount->EditValue ?>"<?php echo $view_ip_advance->PaidAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PaidAmount->EditValue ?>"<?php echo $view_ip_advance->PaidAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance->PaidAmount->viewAttributes() ?>>
<?php echo $view_ip_advance->PaidAmount->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $view_ip_advance->Currency->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Currency->EditValue ?>"<?php echo $view_ip_advance->Currency->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Currency->EditValue ?>"<?php echo $view_ip_advance->Currency->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Currency" class="view_ip_advance_Currency">
<span<?php echo $view_ip_advance->Currency->viewAttributes() ?>>
<?php echo $view_ip_advance->Currency->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $view_ip_advance->CardNumber->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->CardNumber->EditValue ?>"<?php echo $view_ip_advance->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->CardNumber->EditValue ?>"<?php echo $view_ip_advance->CardNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance->CardNumber->viewAttributes() ?>>
<?php echo $view_ip_advance->CardNumber->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_ip_advance->BankName->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->BankName->EditValue ?>"<?php echo $view_ip_advance->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->BankName->EditValue ?>"<?php echo $view_ip_advance->BankName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_BankName" class="view_ip_advance_BankName">
<span<?php echo $view_ip_advance->BankName->viewAttributes() ?>>
<?php echo $view_ip_advance->BankName->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_advance->HospID->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_HospID" class="view_ip_advance_HospID">
<span<?php echo $view_ip_advance->HospID->viewAttributes() ?>>
<?php echo $view_ip_advance->HospID->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_ip_advance->Reception->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_ip_advance->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<?php $view_ip_advance->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_advance->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception"><?php echo strval($view_ip_advance->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_advance->Reception->ViewValue) : $view_ip_advance->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_advance->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_advance->Reception->ReadOnly || $view_ip_advance->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_advance->Reception->Lookup->getParamTag("p_x" . $view_ip_advance_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_advance->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo $view_ip_advance->Reception->CurrentValue ?>"<?php echo $view_ip_advance->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_Reception" class="view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<?php echo $view_ip_advance->Reception->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_ip_advance->mrnno->cellAttributes() ?>>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($view_ip_advance->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<input type="text" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->mrnno->EditValue ?>"<?php echo $view_ip_advance->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($view_ip_advance->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_ip_advance_grid->RowCnt ?>_view_ip_advance_mrnno" class="view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<?php echo $view_ip_advance->mrnno->getViewValue() ?></span>
</span>
<?php if (!$view_ip_advance->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="fview_ip_advancegrid$x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="fview_ip_advancegrid$o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_grid->ListOptions->render("body", "right", $view_ip_advance_grid->RowCnt);
?>
	</tr>
<?php if ($view_ip_advance->RowType == ROWTYPE_ADD || $view_ip_advance->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_ip_advancegrid.updateLists(<?php echo $view_ip_advance_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_ip_advance->isGridAdd() || $view_ip_advance->CurrentMode == "copy")
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
		$view_ip_advance->RowAttrs = array_merge($view_ip_advance->RowAttrs, array('data-rowindex'=>$view_ip_advance_grid->RowIndex, 'id'=>'r0_view_ip_advance', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_ip_advance->RowAttrs["class"], "ew-template");
		$view_ip_advance->RowType = ROWTYPE_ADD;

		// Render row
		$view_ip_advance_grid->renderRow();

		// Render list options
		$view_ip_advance_grid->renderListOptions();
		$view_ip_advance_grid->StartRowCnt = 0;
?>
	<tr<?php echo $view_ip_advance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_advance_grid->ListOptions->render("body", "left", $view_ip_advance_grid->RowIndex);
?>
	<?php if ($view_ip_advance->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_id" class="form-group view_ip_advance_id">
<span<?php echo $view_ip_advance->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($view_ip_advance->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<input type="text" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Name->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Name->EditValue ?>"<?php echo $view_ip_advance->Name->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<span<?php echo $view_ip_advance->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($view_ip_advance->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<input type="text" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Mobile->EditValue ?>"<?php echo $view_ip_advance->Mobile->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<span<?php echo $view_ip_advance->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Mobile->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_ip_advance->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<input type="text" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->voucher_type->EditValue ?>"<?php echo $view_ip_advance->voucher_type->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->voucher_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($view_ip_advance->voucher_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Details->Visible) { // Details ?>
		<td data-name="Details">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<input type="text" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Details->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Details->EditValue ?>"<?php echo $view_ip_advance->Details->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<span<?php echo $view_ip_advance->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Details->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Details" value="<?php echo HtmlEncode($view_ip_advance->Details->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_advance" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_ip_advance->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->editAttributes() ?>>
		<?php echo $view_ip_advance->ModeofPayment->selectOptionListHtml("x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_ip_advance->ModeofPayment->Lookup->getParamTag("p_x" . $view_ip_advance_grid->RowIndex . "_ModeofPayment") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->ModeofPayment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_ip_advance->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<input type="text" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->Amount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Amount->EditValue ?>"<?php echo $view_ip_advance->Amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<span<?php echo $view_ip_advance->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_ip_advance->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<input type="text" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AnyDues->EditValue ?>"<?php echo $view_ip_advance->AnyDues->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->AnyDues->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($view_ip_advance->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_createdby" class="form-group view_ip_advance_createdby">
<span<?php echo $view_ip_advance->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($view_ip_advance->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_createddatetime" class="form-group view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_ip_advance->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_modifiedby" class="form-group view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($view_ip_advance->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_modifieddatetime" class="form-group view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($view_ip_advance->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php if ($view_ip_advance->PatID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<input type="text" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" size="30" placeholder="<?php echo HtmlEncode($view_ip_advance->PatID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatID->EditValue ?>"<?php echo $view_ip_advance->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($view_ip_advance->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<input type="text" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientID->EditValue ?>"<?php echo $view_ip_advance->PatientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<span<?php echo $view_ip_advance->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatientID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientID" value="<?php echo HtmlEncode($view_ip_advance->PatientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<input type="text" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PatientName->EditValue ?>"<?php echo $view_ip_advance->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<span<?php echo $view_ip_advance->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_ip_advance->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
		<td data-name="VisiteType">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<input type="text" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->VisiteType->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisiteType->EditValue ?>"<?php echo $view_ip_advance->VisiteType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->VisiteType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisiteType" value="<?php echo HtmlEncode($view_ip_advance->VisiteType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
		<td data-name="VisitDate">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<input type="text" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" placeholder="<?php echo HtmlEncode($view_ip_advance->VisitDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->VisitDate->EditValue ?>"<?php echo $view_ip_advance->VisitDate->editAttributes() ?>>
<?php if (!$view_ip_advance->VisitDate->ReadOnly && !$view_ip_advance->VisitDate->Disabled && !isset($view_ip_advance->VisitDate->EditAttrs["readonly"]) && !isset($view_ip_advance->VisitDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->VisitDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_VisitDate" value="<?php echo HtmlEncode($view_ip_advance->VisitDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
		<td data-name="AdvanceNo">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceNo->EditValue ?>"<?php echo $view_ip_advance->AdvanceNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->AdvanceNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceNo" value="<?php echo HtmlEncode($view_ip_advance->AdvanceNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Status->Visible) { // Status ?>
		<td data-name="Status">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<input type="text" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Status->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Status->EditValue ?>"<?php echo $view_ip_advance->Status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<span<?php echo $view_ip_advance->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($view_ip_advance->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Date->Visible) { // Date ?>
		<td data-name="Date">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<input type="text" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" placeholder="<?php echo HtmlEncode($view_ip_advance->Date->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Date->EditValue ?>"<?php echo $view_ip_advance->Date->editAttributes() ?>>
<?php if (!$view_ip_advance->Date->ReadOnly && !$view_ip_advance->Date->Disabled && !isset($view_ip_advance->Date->EditAttrs["readonly"]) && !isset($view_ip_advance->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<span<?php echo $view_ip_advance->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Date" value="<?php echo HtmlEncode($view_ip_advance->Date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td data-name="AdvanceValidityDate">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<input type="text" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->AdvanceValidityDate->EditValue ?>"<?php echo $view_ip_advance->AdvanceValidityDate->editAttributes() ?>>
<?php if (!$view_ip_advance->AdvanceValidityDate->ReadOnly && !$view_ip_advance->AdvanceValidityDate->Disabled && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($view_ip_advance->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_advancegrid", "x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->AdvanceValidityDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_AdvanceValidityDate" value="<?php echo HtmlEncode($view_ip_advance->AdvanceValidityDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td data-name="TotalRemainingAdvance">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<input type="text" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->TotalRemainingAdvance->EditValue ?>"<?php echo $view_ip_advance->TotalRemainingAdvance->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->TotalRemainingAdvance->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_TotalRemainingAdvance" value="<?php echo HtmlEncode($view_ip_advance->TotalRemainingAdvance->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<input type="text" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Remarks->EditValue ?>"<?php echo $view_ip_advance->Remarks->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<span<?php echo $view_ip_advance->Remarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Remarks->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($view_ip_advance->Remarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<input type="text" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->SeectPaymentMode->EditValue ?>"<?php echo $view_ip_advance->SeectPaymentMode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->SeectPaymentMode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_SeectPaymentMode" value="<?php echo HtmlEncode($view_ip_advance->SeectPaymentMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<input type="text" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->PaidAmount->EditValue ?>"<?php echo $view_ip_advance->PaidAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->PaidAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_PaidAmount" value="<?php echo HtmlEncode($view_ip_advance->PaidAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
		<td data-name="Currency">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<input type="text" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->Currency->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->Currency->EditValue ?>"<?php echo $view_ip_advance->Currency->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<span<?php echo $view_ip_advance->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Currency->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Currency" value="<?php echo HtmlEncode($view_ip_advance->Currency->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<input type="text" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->CardNumber->EditValue ?>"<?php echo $view_ip_advance->CardNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->CardNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($view_ip_advance->CardNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
		<td data-name="BankName">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<input type="text" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->BankName->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->BankName->EditValue ?>"<?php echo $view_ip_advance->BankName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<span<?php echo $view_ip_advance->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->BankName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_ip_advance->BankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_HospID" class="form-group view_ip_advance_HospID">
<span<?php echo $view_ip_advance->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_ip_advance->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php if ($view_ip_advance->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<?php $view_ip_advance->Reception->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ip_advance->Reception->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception"><?php echo strval($view_ip_advance->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_advance->Reception->ViewValue) : $view_ip_advance->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_advance->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_advance->Reception->ReadOnly || $view_ip_advance->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_advance->Reception->Lookup->getParamTag("p_x" . $view_ip_advance_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_advance->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo $view_ip_advance->Reception->CurrentValue ?>"<?php echo $view_ip_advance->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($view_ip_advance->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$view_ip_advance->isConfirm()) { ?>
<?php if ($view_ip_advance->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<input type="text" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_advance->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_ip_advance->mrnno->EditValue ?>"<?php echo $view_ip_advance->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_advance->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="x<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" name="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" id="o<?php echo $view_ip_advance_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($view_ip_advance->mrnno->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_advance_grid->ListOptions->render("body", "right", $view_ip_advance_grid->RowIndex);
?>
<script>
fview_ip_advancegrid.updateLists(<?php echo $view_ip_advance_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
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
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($view_ip_advance_grid->Recordset)
	$view_ip_advance_grid->Recordset->Close();
?>
</div>
<?php if ($view_ip_advance_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $view_ip_advance_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_advance_grid->TotalRecs == 0 && !$view_ip_advance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_advance_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_advance_grid->terminate();
?>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_advance", "95%", "");
</script>
<?php } ?>