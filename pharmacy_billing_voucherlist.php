<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pharmacy_billing_voucher_list = new pharmacy_billing_voucher_list();

// Run the page
$pharmacy_billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_voucher_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_billing_voucherlist = currentForm = new ew.Form("fpharmacy_billing_voucherlist", "list");
fpharmacy_billing_voucherlist.formKeyCountName = '<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>';

// Validate form
fpharmacy_billing_voucherlist.validate = function() {
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
		<?php if ($pharmacy_billing_voucher_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->id->caption(), $pharmacy_billing_voucher->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BillNumber->caption(), $pharmacy_billing_voucher->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatientId->caption(), $pharmacy_billing_voucher->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatientName->caption(), $pharmacy_billing_voucher->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Mobile->caption(), $pharmacy_billing_voucher->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->mrnno->caption(), $pharmacy_billing_voucher->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->IP_OP->caption(), $pharmacy_billing_voucher->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Doctor->caption(), $pharmacy_billing_voucher->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->ModeofPayment->caption(), $pharmacy_billing_voucher->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Amount->caption(), $pharmacy_billing_voucher->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->Amount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_list->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->AnyDues->caption(), $pharmacy_billing_voucher->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->createdby->caption(), $pharmacy_billing_voucher->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->createddatetime->caption(), $pharmacy_billing_voucher->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->modifiedby->caption(), $pharmacy_billing_voucher->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->modifieddatetime->caption(), $pharmacy_billing_voucher->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->RealizationAmount->caption(), $pharmacy_billing_voucher->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->RealizationAmount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_list->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->CId->caption(), $pharmacy_billing_voucher->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PartnerName->caption(), $pharmacy_billing_voucher->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->CardNumber->caption(), $pharmacy_billing_voucher->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BillStatus->caption(), $pharmacy_billing_voucher->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->BillStatus->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_list->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->ReportHeader->caption(), $pharmacy_billing_voucher->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PharID->caption(), $pharmacy_billing_voucher->PharID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->UserName->caption(), $pharmacy_billing_voucher->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->CardType->Required) { ?>
			elm = this.getElements("x" + infix + "_CardType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->CardType->caption(), $pharmacy_billing_voucher->CardType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->DiscountAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->DiscountAmount->caption(), $pharmacy_billing_voucher->DiscountAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->ApprovalNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_ApprovalNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->ApprovalNumber->caption(), $pharmacy_billing_voucher->ApprovalNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->Cash->Required) { ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Cash->caption(), $pharmacy_billing_voucher->Cash->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Cash");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->Cash->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_list->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->Card->caption(), $pharmacy_billing_voucher->Card->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->Card->errorMessage()) ?>");
		<?php if ($pharmacy_billing_voucher_list->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->BillType->caption(), $pharmacy_billing_voucher->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->PartialSave->Required) { ?>
			elm = this.getElements("x" + infix + "_PartialSave[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PartialSave->caption(), $pharmacy_billing_voucher->PartialSave->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_voucher_list->PatientGST->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientGST");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_voucher->PatientGST->caption(), $pharmacy_billing_voucher->PatientGST->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
fpharmacy_billing_voucherlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "IP_OP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnyDues", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "CId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PartnerName", false)) return false;
	if (ew.valueChanged(fobj, infix, "CardNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReportHeader[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "CardType", false)) return false;
	if (ew.valueChanged(fobj, infix, "DiscountAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "ApprovalNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "Cash", false)) return false;
	if (ew.valueChanged(fobj, infix, "Card", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillType", false)) return false;
	if (ew.valueChanged(fobj, infix, "PartialSave[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientGST", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_billing_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_voucherlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_voucherlist.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_voucher_list->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->ModeofPayment->lookupOptions()) ?>;
fpharmacy_billing_voucherlist.lists["x_CId"] = <?php echo $pharmacy_billing_voucher_list->CId->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlist.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->CId->lookupOptions()) ?>;
fpharmacy_billing_voucherlist.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_voucher_list->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlist.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->ReportHeader->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucherlist.lists["x_CardType"] = <?php echo $pharmacy_billing_voucher_list->CardType->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlist.lists["x_CardType"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->CardType->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucherlist.lists["x_BillType"] = <?php echo $pharmacy_billing_voucher_list->BillType->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlist.lists["x_BillType"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->BillType->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucherlist.lists["x_PartialSave[]"] = <?php echo $pharmacy_billing_voucher_list->PartialSave->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlist.lists["x_PartialSave[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->PartialSave->options(FALSE, TRUE)) ?>;

// Form object for search
var fpharmacy_billing_voucherlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_voucherlistsrch");

// Validate function for search
fpharmacy_billing_voucherlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_voucher->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_billing_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_voucherlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_voucherlistsrch.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_voucher_list->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_voucherlistsrch.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_voucher_list->ModeofPayment->lookupOptions()) ?>;

// Filters
fpharmacy_billing_voucherlistsrch.filterList = <?php echo $pharmacy_billing_voucher_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_billing_voucher_list->TotalRecs > 0 && $pharmacy_billing_voucher_list->ExportOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->ImportOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->SearchOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->FilterOptions->visible()) { ?>
<?php $pharmacy_billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_billing_voucher->isExport() && !$pharmacy_billing_voucher->CurrentAction) { ?>
<form name="fpharmacy_billing_voucherlistsrch" id="fpharmacy_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_billing_voucher_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_billing_voucherlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_voucher">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pharmacy_billing_voucher_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pharmacy_billing_voucher->RowType = ROWTYPE_SEARCH;

// Render row
$pharmacy_billing_voucher->resetAttributes();
$pharmacy_billing_voucher_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_voucher->BillNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_voucher->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_voucher->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_voucher->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="xsc_ModeofPayment" class="ew-cell form-group">
		<label for="x_ModeofPayment" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_voucher->ModeofPayment->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_voucher->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_voucher->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->createddatetime->EditValue ?>"<?php echo $pharmacy_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$pharmacy_billing_voucher->createddatetime->ReadOnly && !$pharmacy_billing_voucher->createddatetime->Disabled && !isset($pharmacy_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($pharmacy_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_billing_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->createddatetime->EditValue2 ?>"<?php echo $pharmacy_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$pharmacy_billing_voucher->createddatetime->ReadOnly && !$pharmacy_billing_voucher->createddatetime->Disabled && !isset($pharmacy_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($pharmacy_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_billing_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_voucher_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_billing_voucher_list->showPageHeader(); ?>
<?php
$pharmacy_billing_voucher_list->showMessage();
?>
<?php if ($pharmacy_billing_voucher_list->TotalRecs > 0 || $pharmacy_billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_voucher">
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_billing_voucher_list->Pager)) $pharmacy_billing_voucher_list->Pager = new NumericPager($pharmacy_billing_voucher_list->StartRec, $pharmacy_billing_voucher_list->DisplayRecs, $pharmacy_billing_voucher_list->TotalRecs, $pharmacy_billing_voucher_list->RecRange, $pharmacy_billing_voucher_list->AutoHidePager) ?>
<?php if ($pharmacy_billing_voucher_list->Pager->RecordCount > 0 && $pharmacy_billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->TotalRecs > 0 && (!$pharmacy_billing_voucher_list->AutoHidePageSizeSelector || $pharmacy_billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_billing_voucherlist" id="fpharmacy_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_voucher_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_voucher_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<div id="gmp_pharmacy_billing_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_billing_voucher_list->TotalRecs > 0 || $pharmacy_billing_voucher->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_voucherlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_billing_voucher_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_billing_voucher_list->renderListOptions();

// Render list options (header, left)
$pharmacy_billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_voucher->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_voucher->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->id) ?>',1);"><div id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $pharmacy_billing_voucher->BillNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $pharmacy_billing_voucher->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->BillNumber) ?>',1);"><div id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $pharmacy_billing_voucher->PatientId->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $pharmacy_billing_voucher->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->PatientId) ?>',1);"><div id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $pharmacy_billing_voucher->PatientName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $pharmacy_billing_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->PatientName) ?>',1);"><div id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $pharmacy_billing_voucher->Mobile->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $pharmacy_billing_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->Mobile) ?>',1);"><div id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $pharmacy_billing_voucher->mrnno->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $pharmacy_billing_voucher->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->mrnno) ?>',1);"><div id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $pharmacy_billing_voucher->IP_OP->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $pharmacy_billing_voucher->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->IP_OP) ?>',1);"><div id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $pharmacy_billing_voucher->Doctor->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $pharmacy_billing_voucher->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->Doctor) ?>',1);"><div id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_billing_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_billing_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->ModeofPayment) ?>',1);"><div id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_billing_voucher->Amount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_billing_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->Amount) ?>',1);"><div id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $pharmacy_billing_voucher->AnyDues->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $pharmacy_billing_voucher->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->AnyDues) ?>',1);"><div id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_voucher->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_voucher->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->createdby) ?>',1);"><div id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_voucher->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_voucher->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->createddatetime) ?>',1);"><div id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_voucher->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_voucher->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->modifiedby) ?>',1);"><div id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_voucher->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_voucher->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->modifieddatetime) ?>',1);"><div id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $pharmacy_billing_voucher->RealizationAmount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $pharmacy_billing_voucher->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->RealizationAmount) ?>',1);"><div id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $pharmacy_billing_voucher->CId->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $pharmacy_billing_voucher->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->CId) ?>',1);"><div id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $pharmacy_billing_voucher->PartnerName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $pharmacy_billing_voucher->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->PartnerName) ?>',1);"><div id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_billing_voucher->CardNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_billing_voucher->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->CardNumber) ?>',1);"><div id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $pharmacy_billing_voucher->BillStatus->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $pharmacy_billing_voucher->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->BillStatus) ?>',1);"><div id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->BillStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->BillStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $pharmacy_billing_voucher->ReportHeader->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $pharmacy_billing_voucher->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->ReportHeader) ?>',1);"><div id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_voucher->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_voucher->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->PharID) ?>',1);"><div id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->PharID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->PharID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $pharmacy_billing_voucher->UserName->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $pharmacy_billing_voucher->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->UserName) ?>',1);"><div id="elh_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->CardType) == "") { ?>
		<th data-name="CardType" class="<?php echo $pharmacy_billing_voucher->CardType->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->CardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardType" class="<?php echo $pharmacy_billing_voucher->CardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->CardType) ?>',1);"><div id="elh_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->CardType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->CardType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->CardType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->DiscountAmount) == "") { ?>
		<th data-name="DiscountAmount" class="<?php echo $pharmacy_billing_voucher->DiscountAmount->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->DiscountAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountAmount" class="<?php echo $pharmacy_billing_voucher->DiscountAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->DiscountAmount) ?>',1);"><div id="elh_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->DiscountAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->DiscountAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->DiscountAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->ApprovalNumber) == "") { ?>
		<th data-name="ApprovalNumber" class="<?php echo $pharmacy_billing_voucher->ApprovalNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->ApprovalNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovalNumber" class="<?php echo $pharmacy_billing_voucher->ApprovalNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->ApprovalNumber) ?>',1);"><div id="elh_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->ApprovalNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->ApprovalNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->ApprovalNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $pharmacy_billing_voucher->Cash->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $pharmacy_billing_voucher->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->Cash) ?>',1);"><div id="elh_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $pharmacy_billing_voucher->Card->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $pharmacy_billing_voucher->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->Card) ?>',1);"><div id="elh_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $pharmacy_billing_voucher->BillType->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $pharmacy_billing_voucher->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->BillType) ?>',1);"><div id="elh_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->PartialSave) == "") { ?>
		<th data-name="PartialSave" class="<?php echo $pharmacy_billing_voucher->PartialSave->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PartialSave->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartialSave" class="<?php echo $pharmacy_billing_voucher->PartialSave->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->PartialSave) ?>',1);"><div id="elh_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PartialSave->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->PartialSave->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->PartialSave->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
	<?php if ($pharmacy_billing_voucher->sortUrl($pharmacy_billing_voucher->PatientGST) == "") { ?>
		<th data-name="PatientGST" class="<?php echo $pharmacy_billing_voucher->PatientGST->headerCellClass() ?>"><div id="elh_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PatientGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientGST" class="<?php echo $pharmacy_billing_voucher->PatientGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_voucher->SortUrl($pharmacy_billing_voucher->PatientGST) ?>',1);"><div id="elh_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_voucher->PatientGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_voucher->PatientGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_voucher->PatientGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_billing_voucher->ExportAll && $pharmacy_billing_voucher->isExport()) {
	$pharmacy_billing_voucher_list->StopRec = $pharmacy_billing_voucher_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_billing_voucher_list->TotalRecs > $pharmacy_billing_voucher_list->StartRec + $pharmacy_billing_voucher_list->DisplayRecs - 1)
		$pharmacy_billing_voucher_list->StopRec = $pharmacy_billing_voucher_list->StartRec + $pharmacy_billing_voucher_list->DisplayRecs - 1;
	else
		$pharmacy_billing_voucher_list->StopRec = $pharmacy_billing_voucher_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_billing_voucher_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_billing_voucher_list->FormKeyCountName) && ($pharmacy_billing_voucher->isGridAdd() || $pharmacy_billing_voucher->isGridEdit() || $pharmacy_billing_voucher->isConfirm())) {
		$pharmacy_billing_voucher_list->KeyCount = $CurrentForm->getValue($pharmacy_billing_voucher_list->FormKeyCountName);
		$pharmacy_billing_voucher_list->StopRec = $pharmacy_billing_voucher_list->StartRec + $pharmacy_billing_voucher_list->KeyCount - 1;
	}
}
$pharmacy_billing_voucher_list->RecCnt = $pharmacy_billing_voucher_list->StartRec - 1;
if ($pharmacy_billing_voucher_list->Recordset && !$pharmacy_billing_voucher_list->Recordset->EOF) {
	$pharmacy_billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_billing_voucher_list->StartRec > 1)
		$pharmacy_billing_voucher_list->Recordset->move($pharmacy_billing_voucher_list->StartRec - 1);
} elseif (!$pharmacy_billing_voucher->AllowAddDeleteRow && $pharmacy_billing_voucher_list->StopRec == 0) {
	$pharmacy_billing_voucher_list->StopRec = $pharmacy_billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_billing_voucher->resetAttributes();
$pharmacy_billing_voucher_list->renderRow();
if ($pharmacy_billing_voucher->isGridAdd())
	$pharmacy_billing_voucher_list->RowIndex = 0;
if ($pharmacy_billing_voucher->isGridEdit())
	$pharmacy_billing_voucher_list->RowIndex = 0;
while ($pharmacy_billing_voucher_list->RecCnt < $pharmacy_billing_voucher_list->StopRec) {
	$pharmacy_billing_voucher_list->RecCnt++;
	if ($pharmacy_billing_voucher_list->RecCnt >= $pharmacy_billing_voucher_list->StartRec) {
		$pharmacy_billing_voucher_list->RowCnt++;
		if ($pharmacy_billing_voucher->isGridAdd() || $pharmacy_billing_voucher->isGridEdit() || $pharmacy_billing_voucher->isConfirm()) {
			$pharmacy_billing_voucher_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_billing_voucher_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_billing_voucher_list->FormActionName) && $pharmacy_billing_voucher_list->EventCancelled)
				$pharmacy_billing_voucher_list->RowAction = strval($CurrentForm->getValue($pharmacy_billing_voucher_list->FormActionName));
			elseif ($pharmacy_billing_voucher->isGridAdd())
				$pharmacy_billing_voucher_list->RowAction = "insert";
			else
				$pharmacy_billing_voucher_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_billing_voucher_list->KeyCount = $pharmacy_billing_voucher_list->RowIndex;

		// Init row class and style
		$pharmacy_billing_voucher->resetAttributes();
		$pharmacy_billing_voucher->CssClass = "";
		if ($pharmacy_billing_voucher->isGridAdd()) {
			$pharmacy_billing_voucher_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_billing_voucher_list->loadRowValues($pharmacy_billing_voucher_list->Recordset); // Load row values
		}
		$pharmacy_billing_voucher->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_billing_voucher->isGridAdd()) // Grid add
			$pharmacy_billing_voucher->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_billing_voucher->isGridAdd() && $pharmacy_billing_voucher->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_billing_voucher_list->restoreCurrentRowFormValues($pharmacy_billing_voucher_list->RowIndex); // Restore form values
		if ($pharmacy_billing_voucher->isGridEdit()) { // Grid edit
			if ($pharmacy_billing_voucher->EventCancelled)
				$pharmacy_billing_voucher_list->restoreCurrentRowFormValues($pharmacy_billing_voucher_list->RowIndex); // Restore form values
			if ($pharmacy_billing_voucher_list->RowAction == "insert")
				$pharmacy_billing_voucher->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_billing_voucher->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_billing_voucher->isGridEdit() && ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT || $pharmacy_billing_voucher->RowType == ROWTYPE_ADD) && $pharmacy_billing_voucher->EventCancelled) // Update failed
			$pharmacy_billing_voucher_list->restoreCurrentRowFormValues($pharmacy_billing_voucher_list->RowIndex); // Restore form values
		if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_billing_voucher_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_billing_voucher->RowAttrs = array_merge($pharmacy_billing_voucher->RowAttrs, array('data-rowindex'=>$pharmacy_billing_voucher_list->RowCnt, 'id'=>'r' . $pharmacy_billing_voucher_list->RowCnt . '_pharmacy_billing_voucher', 'data-rowtype'=>$pharmacy_billing_voucher->RowType));

		// Render row
		$pharmacy_billing_voucher_list->renderRow();

		// Render list options
		$pharmacy_billing_voucher_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_billing_voucher_list->RowAction <> "delete" && $pharmacy_billing_voucher_list->RowAction <> "insertdelete" && !($pharmacy_billing_voucher_list->RowAction == "insert" && $pharmacy_billing_voucher->isConfirm() && $pharmacy_billing_voucher_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_voucher_list->ListOptions->render("body", "left", $pharmacy_billing_voucher_list->RowCnt);
?>
	<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_billing_voucher->id->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_id" class="form-group pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_voucher->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $pharmacy_billing_voucher->BillNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillNumber" class="form-group pharmacy_billing_voucher_BillNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillNumber" class="form-group pharmacy_billing_voucher_BillNumber">
<span<?php echo $pharmacy_billing_voucher->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_voucher->BillNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
<span<?php echo $pharmacy_billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $pharmacy_billing_voucher->PatientId->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientId" class="form-group pharmacy_billing_voucher_PatientId">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientId" class="form-group pharmacy_billing_voucher_PatientId">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
<span<?php echo $pharmacy_billing_voucher->PatientId->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $pharmacy_billing_voucher->PatientName->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientName" class="form-group pharmacy_billing_voucher_PatientName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientName" class="form-group pharmacy_billing_voucher_PatientName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
<span<?php echo $pharmacy_billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $pharmacy_billing_voucher->Mobile->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Mobile" class="form-group pharmacy_billing_voucher_Mobile">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Mobile" class="form-group pharmacy_billing_voucher_Mobile">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
<span<?php echo $pharmacy_billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $pharmacy_billing_voucher->mrnno->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_mrnno" class="form-group pharmacy_billing_voucher_mrnno">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_voucher->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_mrnno" class="form-group pharmacy_billing_voucher_mrnno">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
<span<?php echo $pharmacy_billing_voucher->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $pharmacy_billing_voucher->IP_OP->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_IP_OP" class="form-group pharmacy_billing_voucher_IP_OP">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_voucher->IP_OP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_IP_OP" class="form-group pharmacy_billing_voucher_IP_OP">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher->IP_OP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
<span<?php echo $pharmacy_billing_voucher->IP_OP->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->IP_OP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $pharmacy_billing_voucher->Doctor->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Doctor" class="form-group pharmacy_billing_voucher_Doctor">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Doctor" class="form-group pharmacy_billing_voucher_Doctor">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
<span<?php echo $pharmacy_billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $pharmacy_billing_voucher->ModeofPayment->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ModeofPayment" class="form-group pharmacy_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $pharmacy_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_voucher->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ModeofPayment" class="form-group pharmacy_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $pharmacy_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
<span<?php echo $pharmacy_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $pharmacy_billing_voucher->Amount->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Amount" class="form-group pharmacy_billing_voucher_Amount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Amount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Amount" class="form-group pharmacy_billing_voucher_Amount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
<span<?php echo $pharmacy_billing_voucher->Amount->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $pharmacy_billing_voucher->AnyDues->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_AnyDues" class="form-group pharmacy_billing_voucher_AnyDues">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_voucher->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_AnyDues" class="form-group pharmacy_billing_voucher_AnyDues">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
<span<?php echo $pharmacy_billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->AnyDues->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_billing_voucher->createdby->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createdby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_voucher->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
<span<?php echo $pharmacy_billing_voucher->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_billing_voucher->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
<span<?php echo $pharmacy_billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_billing_voucher->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_voucher->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
<span<?php echo $pharmacy_billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_billing_voucher->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
<span<?php echo $pharmacy_billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $pharmacy_billing_voucher->RealizationAmount->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_RealizationAmount" class="form-group pharmacy_billing_voucher_RealizationAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationAmount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_RealizationAmount" class="form-group pharmacy_billing_voucher_RealizationAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
<span<?php echo $pharmacy_billing_voucher->RealizationAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->RealizationAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $pharmacy_billing_voucher->CId->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CId" class="form-group pharmacy_billing_voucher_CId">
<?php $pharmacy_billing_voucher->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_voucher->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId"><?php echo strval($pharmacy_billing_voucher->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->CId->ViewValue) : $pharmacy_billing_voucher->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->CId->ReadOnly || $pharmacy_billing_voucher->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->CId->Lookup->getParamTag("p_x" . $pharmacy_billing_voucher_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_voucher->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($pharmacy_billing_voucher->CId->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CId" class="form-group pharmacy_billing_voucher_CId">
<?php $pharmacy_billing_voucher->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_voucher->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId"><?php echo strval($pharmacy_billing_voucher->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->CId->ViewValue) : $pharmacy_billing_voucher->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->CId->ReadOnly || $pharmacy_billing_voucher->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->CId->Lookup->getParamTag("p_x" . $pharmacy_billing_voucher_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_voucher->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
<span<?php echo $pharmacy_billing_voucher->CId->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->CId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $pharmacy_billing_voucher->PartnerName->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PartnerName" class="form-group pharmacy_billing_voucher_PartnerName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PartnerName" class="form-group pharmacy_billing_voucher_PartnerName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PartnerName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
<span<?php echo $pharmacy_billing_voucher->PartnerName->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PartnerName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $pharmacy_billing_voucher->CardNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CardNumber" class="form-group pharmacy_billing_voucher_CardNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CardNumber" class="form-group pharmacy_billing_voucher_CardNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->CardNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
<span<?php echo $pharmacy_billing_voucher->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->CardNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus"<?php echo $pharmacy_billing_voucher->BillStatus->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillStatus" class="form-group pharmacy_billing_voucher_BillStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillStatus->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillStatus" class="form-group pharmacy_billing_voucher_BillStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
<span<?php echo $pharmacy_billing_voucher->BillStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->BillStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $pharmacy_billing_voucher->ReportHeader->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ReportHeader" class="form-group pharmacy_billing_voucher_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="<?php echo HtmlEncode($pharmacy_billing_voucher->ReportHeader->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ReportHeader" class="form-group pharmacy_billing_voucher_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
<span<?php echo $pharmacy_billing_voucher->ReportHeader->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->ReportHeader->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<td data-name="PharID"<?php echo $pharmacy_billing_voucher->PharID->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PharID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
<span<?php echo $pharmacy_billing_voucher->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $pharmacy_billing_voucher->UserName->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_UserName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($pharmacy_billing_voucher->UserName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName">
<span<?php echo $pharmacy_billing_voucher->UserName->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType"<?php echo $pharmacy_billing_voucher->CardType->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CardType" class="form-group pharmacy_billing_voucher_CardType">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $pharmacy_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" value="{value}"<?php echo $pharmacy_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->CardType->radioButtonListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_CardType") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardType" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" value="<?php echo HtmlEncode($pharmacy_billing_voucher->CardType->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CardType" class="form-group pharmacy_billing_voucher_CardType">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $pharmacy_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" value="{value}"<?php echo $pharmacy_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->CardType->radioButtonListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_CardType") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType">
<span<?php echo $pharmacy_billing_voucher->CardType->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->CardType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount"<?php echo $pharmacy_billing_voucher->DiscountAmount->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_DiscountAmount" class="form-group pharmacy_billing_voucher_DiscountAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" value="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountAmount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_DiscountAmount" class="form-group pharmacy_billing_voucher_DiscountAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount">
<span<?php echo $pharmacy_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
		<td data-name="ApprovalNumber"<?php echo $pharmacy_billing_voucher->ApprovalNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ApprovalNumber" class="form-group pharmacy_billing_voucher_ApprovalNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->ApprovalNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->ApprovalNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->ApprovalNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->ApprovalNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ApprovalNumber" class="form-group pharmacy_billing_voucher_ApprovalNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->ApprovalNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->ApprovalNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->ApprovalNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber">
<span<?php echo $pharmacy_billing_voucher->ApprovalNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->ApprovalNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $pharmacy_billing_voucher->Cash->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Cash" class="form-group pharmacy_billing_voucher_Cash">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Cash->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Cash->EditValue ?>"<?php echo $pharmacy_billing_voucher->Cash->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Cash->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Cash" class="form-group pharmacy_billing_voucher_Cash">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Cash->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Cash->EditValue ?>"<?php echo $pharmacy_billing_voucher->Cash->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash">
<span<?php echo $pharmacy_billing_voucher->Cash->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Cash->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $pharmacy_billing_voucher->Card->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Card" class="form-group pharmacy_billing_voucher_Card">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Card->EditValue ?>"<?php echo $pharmacy_billing_voucher->Card->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Card" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Card->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Card" class="form-group pharmacy_billing_voucher_Card">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Card->EditValue ?>"<?php echo $pharmacy_billing_voucher->Card->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card">
<span<?php echo $pharmacy_billing_voucher->Card->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Card->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $pharmacy_billing_voucher->BillType->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillType" class="form-group pharmacy_billing_voucher_BillType">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $pharmacy_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" value="{value}"<?php echo $pharmacy_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->BillType->radioButtonListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_BillType") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillType" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillType->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillType" class="form-group pharmacy_billing_voucher_BillType">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $pharmacy_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" value="{value}"<?php echo $pharmacy_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->BillType->radioButtonListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_BillType") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType">
<span<?php echo $pharmacy_billing_voucher->BillType->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
		<td data-name="PartialSave"<?php echo $pharmacy_billing_voucher->PartialSave->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PartialSave" class="form-group pharmacy_billing_voucher_PartialSave">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" data-value-separator="<?php echo $pharmacy_billing_voucher->PartialSave->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" value="{value}"<?php echo $pharmacy_billing_voucher->PartialSave->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->PartialSave->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_PartialSave[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PartialSave->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PartialSave" class="form-group pharmacy_billing_voucher_PartialSave">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" data-value-separator="<?php echo $pharmacy_billing_voucher->PartialSave->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" value="{value}"<?php echo $pharmacy_billing_voucher->PartialSave->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->PartialSave->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_PartialSave[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave">
<span<?php echo $pharmacy_billing_voucher->PartialSave->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PartialSave->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
		<td data-name="PatientGST"<?php echo $pharmacy_billing_voucher->PatientGST->cellAttributes() ?>>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientGST" class="form-group pharmacy_billing_voucher_PatientGST">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientGST->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientGST->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientGST" class="form-group pharmacy_billing_voucher_PatientGST">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientGST->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientGST->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_voucher_list->RowCnt ?>_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST">
<span<?php echo $pharmacy_billing_voucher->PatientGST->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PatientGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_voucher_list->ListOptions->render("body", "right", $pharmacy_billing_voucher_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_billing_voucher->RowType == ROWTYPE_ADD || $pharmacy_billing_voucher->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_billing_voucherlist.updateLists(<?php echo $pharmacy_billing_voucher_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_billing_voucher->isGridAdd())
		if (!$pharmacy_billing_voucher_list->Recordset->EOF)
			$pharmacy_billing_voucher_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_billing_voucher->isGridAdd() || $pharmacy_billing_voucher->isGridEdit()) {
		$pharmacy_billing_voucher_list->RowIndex = '$rowindex$';
		$pharmacy_billing_voucher_list->loadRowValues();

		// Set row properties
		$pharmacy_billing_voucher->resetAttributes();
		$pharmacy_billing_voucher->RowAttrs = array_merge($pharmacy_billing_voucher->RowAttrs, array('data-rowindex'=>$pharmacy_billing_voucher_list->RowIndex, 'id'=>'r0_pharmacy_billing_voucher', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_billing_voucher->RowAttrs["class"], "ew-template");
		$pharmacy_billing_voucher->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_billing_voucher_list->renderRow();

		// Render list options
		$pharmacy_billing_voucher_list->renderListOptions();
		$pharmacy_billing_voucher_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_voucher_list->ListOptions->render("body", "left", $pharmacy_billing_voucher_list->RowIndex);
?>
	<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_voucher->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_BillNumber" class="form-group pharmacy_billing_voucher_BillNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientId" class="form-group pharmacy_billing_voucher_PatientId">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientId->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientName" class="form-group pharmacy_billing_voucher_PatientName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_pharmacy_billing_voucher_Mobile" class="form-group pharmacy_billing_voucher_Mobile">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Mobile->EditValue ?>"<?php echo $pharmacy_billing_voucher->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<span id="el$rowindex$_pharmacy_billing_voucher_mrnno" class="form-group pharmacy_billing_voucher_mrnno">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->mrnno->EditValue ?>"<?php echo $pharmacy_billing_voucher->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_voucher->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP">
<span id="el$rowindex$_pharmacy_billing_voucher_IP_OP" class="form-group pharmacy_billing_voucher_IP_OP">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_voucher->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_voucher->IP_OP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_pharmacy_billing_voucher_Doctor" class="form-group pharmacy_billing_voucher_Doctor">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Doctor->EditValue ?>"<?php echo $pharmacy_billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_pharmacy_billing_voucher_ModeofPayment" class="form-group pharmacy_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $pharmacy_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_voucher->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_pharmacy_billing_voucher_Amount" class="form-group pharmacy_billing_voucher_Amount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Amount->EditValue ?>"<?php echo $pharmacy_billing_voucher->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<span id="el$rowindex$_pharmacy_billing_voucher_AnyDues" class="form-group pharmacy_billing_voucher_AnyDues">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_voucher->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_voucher->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createdby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_voucher->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_voucher->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_voucher->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount">
<span id="el$rowindex$_pharmacy_billing_voucher_RealizationAmount" class="form-group pharmacy_billing_voucher_RealizationAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_voucher->RealizationAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<td data-name="CId">
<span id="el$rowindex$_pharmacy_billing_voucher_CId" class="form-group pharmacy_billing_voucher_CId">
<?php $pharmacy_billing_voucher->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_voucher->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId"><?php echo strval($pharmacy_billing_voucher->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_voucher->CId->ViewValue) : $pharmacy_billing_voucher->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_voucher->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_voucher->CId->ReadOnly || $pharmacy_billing_voucher->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_voucher->CId->Lookup->getParamTag("p_x" . $pharmacy_billing_voucher_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_voucher->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_voucher->CId->CurrentValue ?>"<?php echo $pharmacy_billing_voucher->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CId" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($pharmacy_billing_voucher->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName">
<span id="el$rowindex$_pharmacy_billing_voucher_PartnerName" class="form-group pharmacy_billing_voucher_PartnerName">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_voucher->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PartnerName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_CardNumber" class="form-group pharmacy_billing_voucher_CardNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->CardNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus">
<span id="el$rowindex$_pharmacy_billing_voucher_BillStatus" class="form-group pharmacy_billing_voucher_BillStatus">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_voucher->BillStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader">
<span id="el$rowindex$_pharmacy_billing_voucher_ReportHeader" class="form-group pharmacy_billing_voucher_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_voucher->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_voucher->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ReportHeader[]" value="<?php echo HtmlEncode($pharmacy_billing_voucher->ReportHeader->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<td data-name="PharID">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PharID" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PharID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_UserName" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($pharmacy_billing_voucher->UserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType">
<span id="el$rowindex$_pharmacy_billing_voucher_CardType" class="form-group pharmacy_billing_voucher_CardType">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $pharmacy_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" value="{value}"<?php echo $pharmacy_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->CardType->radioButtonListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_CardType") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_CardType" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_CardType" value="<?php echo HtmlEncode($pharmacy_billing_voucher->CardType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount">
<span id="el$rowindex$_pharmacy_billing_voucher_DiscountAmount" class="form-group pharmacy_billing_voucher_DiscountAmount">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $pharmacy_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_DiscountAmount" value="<?php echo HtmlEncode($pharmacy_billing_voucher->DiscountAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
		<td data-name="ApprovalNumber">
<span id="el$rowindex$_pharmacy_billing_voucher_ApprovalNumber" class="form-group pharmacy_billing_voucher_ApprovalNumber">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->ApprovalNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->ApprovalNumber->EditValue ?>"<?php echo $pharmacy_billing_voucher->ApprovalNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_ApprovalNumber" value="<?php echo HtmlEncode($pharmacy_billing_voucher->ApprovalNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
		<td data-name="Cash">
<span id="el$rowindex$_pharmacy_billing_voucher_Cash" class="form-group pharmacy_billing_voucher_Cash">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Cash->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Cash->EditValue ?>"<?php echo $pharmacy_billing_voucher->Cash->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Cash" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Cash->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card">
<span id="el$rowindex$_pharmacy_billing_voucher_Card" class="form-group pharmacy_billing_voucher_Card">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->Card->EditValue ?>"<?php echo $pharmacy_billing_voucher->Card->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_Card" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($pharmacy_billing_voucher->Card->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
		<td data-name="BillType">
<span id="el$rowindex$_pharmacy_billing_voucher_BillType" class="form-group pharmacy_billing_voucher_BillType">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $pharmacy_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" value="{value}"<?php echo $pharmacy_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->BillType->radioButtonListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_BillType") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillType" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($pharmacy_billing_voucher->BillType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
		<td data-name="PartialSave">
<span id="el$rowindex$_pharmacy_billing_voucher_PartialSave" class="form-group pharmacy_billing_voucher_PartialSave">
<div id="tp_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" data-value-separator="<?php echo $pharmacy_billing_voucher->PartialSave->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" value="{value}"<?php echo $pharmacy_billing_voucher->PartialSave->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_voucher->PartialSave->checkBoxListHtml(FALSE, "x{$pharmacy_billing_voucher_list->RowIndex}_PartialSave[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PartialSave[]" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PartialSave->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
		<td data-name="PatientGST">
<span id="el$rowindex$_pharmacy_billing_voucher_PatientGST" class="form-group pharmacy_billing_voucher_PatientGST">
<input type="text" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" id="x<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientGST->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_voucher->PatientGST->EditValue ?>"<?php echo $pharmacy_billing_voucher->PatientGST->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" id="o<?php echo $pharmacy_billing_voucher_list->RowIndex ?>_PatientGST" value="<?php echo HtmlEncode($pharmacy_billing_voucher->PatientGST->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_voucher_list->ListOptions->render("body", "right", $pharmacy_billing_voucher_list->RowIndex);
?>
<script>
fpharmacy_billing_voucherlist.updateLists(<?php echo $pharmacy_billing_voucher_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
<?php

// Render aggregate row
$pharmacy_billing_voucher->RowType = ROWTYPE_AGGREGATE;
$pharmacy_billing_voucher->resetAttributes();
$pharmacy_billing_voucher_list->renderRow();
?>
<?php if ($pharmacy_billing_voucher_list->TotalRecs > 0 && !$pharmacy_billing_voucher->isGridAdd() && !$pharmacy_billing_voucher->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$pharmacy_billing_voucher_list->renderListOptions();

// Render list options (footer, left)
$pharmacy_billing_voucher_list->ListOptions->render("footer", "left");
?>
	<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $pharmacy_billing_voucher->id->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" class="<?php echo $pharmacy_billing_voucher->BillNumber->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $pharmacy_billing_voucher->PatientId->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $pharmacy_billing_voucher->PatientName->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" class="<?php echo $pharmacy_billing_voucher->Mobile->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" class="<?php echo $pharmacy_billing_voucher->mrnno->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP" class="<?php echo $pharmacy_billing_voucher->IP_OP->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" class="<?php echo $pharmacy_billing_voucher->Doctor->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $pharmacy_billing_voucher->ModeofPayment->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $pharmacy_billing_voucher->Amount->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_billing_voucher->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" class="<?php echo $pharmacy_billing_voucher->AnyDues->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $pharmacy_billing_voucher->createdby->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $pharmacy_billing_voucher->createddatetime->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $pharmacy_billing_voucher->modifiedby->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $pharmacy_billing_voucher->modifieddatetime->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount" class="<?php echo $pharmacy_billing_voucher->RealizationAmount->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<td data-name="CId" class="<?php echo $pharmacy_billing_voucher->CId->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" class="<?php echo $pharmacy_billing_voucher->PartnerName->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" class="<?php echo $pharmacy_billing_voucher->CardNumber->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus" class="<?php echo $pharmacy_billing_voucher->BillStatus->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" class="<?php echo $pharmacy_billing_voucher->ReportHeader->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<td data-name="PharID" class="<?php echo $pharmacy_billing_voucher->PharID->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName" class="<?php echo $pharmacy_billing_voucher->UserName->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType" class="<?php echo $pharmacy_billing_voucher->CardType->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount" class="<?php echo $pharmacy_billing_voucher->DiscountAmount->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
		<td data-name="ApprovalNumber" class="<?php echo $pharmacy_billing_voucher->ApprovalNumber->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
		<td data-name="Cash" class="<?php echo $pharmacy_billing_voucher->Cash->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card" class="<?php echo $pharmacy_billing_voucher->Card->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
		<td data-name="BillType" class="<?php echo $pharmacy_billing_voucher->BillType->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
		<td data-name="PartialSave" class="<?php echo $pharmacy_billing_voucher->PartialSave->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
		<td data-name="PatientGST" class="<?php echo $pharmacy_billing_voucher->PatientGST->footerCellClass() ?>"><span id="elf_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$pharmacy_billing_voucher_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_billing_voucher->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_voucher_list->KeyCount ?>">
<?php echo $pharmacy_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_billing_voucher->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_voucher_list->KeyCount ?>">
<?php echo $pharmacy_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_billing_voucher_list->Recordset)
	$pharmacy_billing_voucher_list->Recordset->Close();
?>
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_billing_voucher_list->Pager)) $pharmacy_billing_voucher_list->Pager = new NumericPager($pharmacy_billing_voucher_list->StartRec, $pharmacy_billing_voucher_list->DisplayRecs, $pharmacy_billing_voucher_list->TotalRecs, $pharmacy_billing_voucher_list->RecRange, $pharmacy_billing_voucher_list->AutoHidePager) ?>
<?php if ($pharmacy_billing_voucher_list->Pager->RecordCount > 0 && $pharmacy_billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $pharmacy_billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->TotalRecs > 0 && (!$pharmacy_billing_voucher_list->AutoHidePageSizeSelector || $pharmacy_billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_billing_voucher_list->TotalRecs == 0 && !$pharmacy_billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_billing_voucher_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_billing_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_billing_voucher", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_voucher_list->terminate();
?>