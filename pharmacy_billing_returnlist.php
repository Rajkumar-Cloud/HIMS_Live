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
$pharmacy_billing_return_list = new pharmacy_billing_return_list();

// Run the page
$pharmacy_billing_return_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_billing_return->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_billing_returnlist = currentForm = new ew.Form("fpharmacy_billing_returnlist", "list");
fpharmacy_billing_returnlist.formKeyCountName = '<?php echo $pharmacy_billing_return_list->FormKeyCountName ?>';

// Validate form
fpharmacy_billing_returnlist.validate = function() {
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
		<?php if ($pharmacy_billing_return_list->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->id->caption(), $pharmacy_billing_return->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PatientId->caption(), $pharmacy_billing_return->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->mrnno->caption(), $pharmacy_billing_return->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PatientName->caption(), $pharmacy_billing_return->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Mobile->caption(), $pharmacy_billing_return->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->IP_OP->caption(), $pharmacy_billing_return->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Doctor->caption(), $pharmacy_billing_return->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->voucher_type->caption(), $pharmacy_billing_return->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->ModeofPayment->caption(), $pharmacy_billing_return->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Amount->caption(), $pharmacy_billing_return->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->Amount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_list->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->AnyDues->caption(), $pharmacy_billing_return->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->createdby->caption(), $pharmacy_billing_return->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->createddatetime->caption(), $pharmacy_billing_return->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->modifiedby->caption(), $pharmacy_billing_return->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->modifieddatetime->caption(), $pharmacy_billing_return->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RealizationAmount->caption(), $pharmacy_billing_return->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->RealizationAmount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_list->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->CId->caption(), $pharmacy_billing_return->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PartnerName->caption(), $pharmacy_billing_return->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->BillNumber->caption(), $pharmacy_billing_return->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->CardNumber->caption(), $pharmacy_billing_return->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->BillStatus->caption(), $pharmacy_billing_return->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->BillStatus->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_list->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->ReportHeader->caption(), $pharmacy_billing_return->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_list->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PharID->caption(), $pharmacy_billing_return->PharID->RequiredErrorMessage)) ?>");
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
fpharmacy_billing_returnlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "IP_OP", false)) return false;
	if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "voucher_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnyDues", false)) return false;
	if (ew.valueChanged(fobj, infix, "RealizationAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "CId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PartnerName", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "CardNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReportHeader[]", false)) return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_billing_returnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_returnlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_returnlist.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_return_list->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_returnlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_return_list->ModeofPayment->lookupOptions()) ?>;
fpharmacy_billing_returnlist.lists["x_CId"] = <?php echo $pharmacy_billing_return_list->CId->Lookup->toClientList() ?>;
fpharmacy_billing_returnlist.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_return_list->CId->lookupOptions()) ?>;
fpharmacy_billing_returnlist.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_return_list->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_returnlist.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_return_list->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
var fpharmacy_billing_returnlistsrch = currentSearchForm = new ew.Form("fpharmacy_billing_returnlistsrch");

// Validate function for search
fpharmacy_billing_returnlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fpharmacy_billing_returnlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_returnlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpharmacy_billing_returnlistsrch.filterList = <?php echo $pharmacy_billing_return_list->getFilterList() ?>;
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
<?php if (!$pharmacy_billing_return->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_billing_return_list->TotalRecs > 0 && $pharmacy_billing_return_list->ExportOptions->visible()) { ?>
<?php $pharmacy_billing_return_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_return_list->ImportOptions->visible()) { ?>
<?php $pharmacy_billing_return_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_return_list->SearchOptions->visible()) { ?>
<?php $pharmacy_billing_return_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_billing_return_list->FilterOptions->visible()) { ?>
<?php $pharmacy_billing_return_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_billing_return_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_billing_return->isExport() && !$pharmacy_billing_return->CurrentAction) { ?>
<form name="fpharmacy_billing_returnlistsrch" id="fpharmacy_billing_returnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_billing_return_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_billing_returnlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_billing_return">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$pharmacy_billing_return_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$pharmacy_billing_return->RowType = ROWTYPE_SEARCH;

// Render row
$pharmacy_billing_return->resetAttributes();
$pharmacy_billing_return_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_return->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_return->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_return->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $pharmacy_billing_return->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($pharmacy_billing_return->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="pharmacy_billing_return" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->createddatetime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->createddatetime->EditValue ?>"<?php echo $pharmacy_billing_return->createddatetime->editAttributes() ?>>
<?php if (!$pharmacy_billing_return->createddatetime->ReadOnly && !$pharmacy_billing_return->createddatetime->Disabled && !isset($pharmacy_billing_return->createddatetime->EditAttrs["readonly"]) && !isset($pharmacy_billing_return->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_billing_returnlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="pharmacy_billing_return" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->createddatetime->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->createddatetime->EditValue2 ?>"<?php echo $pharmacy_billing_return->createddatetime->editAttributes() ?>>
<?php if (!$pharmacy_billing_return->createddatetime->ReadOnly && !$pharmacy_billing_return->createddatetime->Disabled && !isset($pharmacy_billing_return->createddatetime->EditAttrs["readonly"]) && !isset($pharmacy_billing_return->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_billing_returnlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_billing_return_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_billing_return_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_billing_return_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_billing_return_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_return_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_return_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_billing_return_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_billing_return_list->showPageHeader(); ?>
<?php
$pharmacy_billing_return_list->showMessage();
?>
<?php if ($pharmacy_billing_return_list->TotalRecs > 0 || $pharmacy_billing_return->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_billing_return_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_billing_return">
<?php if (!$pharmacy_billing_return->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_billing_return->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_billing_return_list->Pager)) $pharmacy_billing_return_list->Pager = new NumericPager($pharmacy_billing_return_list->StartRec, $pharmacy_billing_return_list->DisplayRecs, $pharmacy_billing_return_list->TotalRecs, $pharmacy_billing_return_list->RecRange, $pharmacy_billing_return_list->AutoHidePager) ?>
<?php if ($pharmacy_billing_return_list->Pager->RecordCount > 0 && $pharmacy_billing_return_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_billing_return_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_return_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_billing_return_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_billing_return_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_return_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_return_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_billing_return_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_billing_return_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_billing_return_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_billing_return_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_billing_return_list->TotalRecs > 0 && (!$pharmacy_billing_return_list->AutoHidePageSizeSelector || $pharmacy_billing_return_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_billing_return">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_billing_return_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_billing_return_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_billing_return_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_billing_return_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_billing_return_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_billing_return_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_billing_return->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_return_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_billing_returnlist" id="fpharmacy_billing_returnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_return_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_return_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<div id="gmp_pharmacy_billing_return" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_billing_return_list->TotalRecs > 0 || $pharmacy_billing_return->isGridEdit()) { ?>
<table id="tbl_pharmacy_billing_returnlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_billing_return_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_billing_return_list->renderListOptions();

// Render list options (header, left)
$pharmacy_billing_return_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_return->id->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_id" class="pharmacy_billing_return_id"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_billing_return->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->id) ?>',1);"><div id="elh_pharmacy_billing_return_id" class="pharmacy_billing_return_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $pharmacy_billing_return->PatientId->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $pharmacy_billing_return->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->PatientId) ?>',1);"><div id="elh_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $pharmacy_billing_return->mrnno->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $pharmacy_billing_return->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->mrnno) ?>',1);"><div id="elh_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $pharmacy_billing_return->PatientName->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $pharmacy_billing_return->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->PatientName) ?>',1);"><div id="elh_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $pharmacy_billing_return->Mobile->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $pharmacy_billing_return->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->Mobile) ?>',1);"><div id="elh_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $pharmacy_billing_return->IP_OP->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $pharmacy_billing_return->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->IP_OP) ?>',1);"><div id="elh_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $pharmacy_billing_return->Doctor->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $pharmacy_billing_return->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->Doctor) ?>',1);"><div id="elh_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $pharmacy_billing_return->voucher_type->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $pharmacy_billing_return->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->voucher_type) ?>',1);"><div id="elh_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_billing_return->ModeofPayment->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_billing_return->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->ModeofPayment) ?>',1);"><div id="elh_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_billing_return->Amount->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_billing_return->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->Amount) ?>',1);"><div id="elh_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $pharmacy_billing_return->AnyDues->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $pharmacy_billing_return->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->AnyDues) ?>',1);"><div id="elh_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_return->createdby->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_billing_return->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->createdby) ?>',1);"><div id="elh_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_return->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_billing_return->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->createddatetime) ?>',1);"><div id="elh_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_return->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_billing_return->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->modifiedby) ?>',1);"><div id="elh_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_return->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_billing_return->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->modifieddatetime) ?>',1);"><div id="elh_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $pharmacy_billing_return->RealizationAmount->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $pharmacy_billing_return->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->RealizationAmount) ?>',1);"><div id="elh_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $pharmacy_billing_return->CId->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $pharmacy_billing_return->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->CId) ?>',1);"><div id="elh_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $pharmacy_billing_return->PartnerName->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $pharmacy_billing_return->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->PartnerName) ?>',1);"><div id="elh_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $pharmacy_billing_return->BillNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $pharmacy_billing_return->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->BillNumber) ?>',1);"><div id="elh_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_billing_return->CardNumber->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_billing_return->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->CardNumber) ?>',1);"><div id="elh_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $pharmacy_billing_return->BillStatus->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $pharmacy_billing_return->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->BillStatus) ?>',1);"><div id="elh_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->BillStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->BillStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $pharmacy_billing_return->ReportHeader->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $pharmacy_billing_return->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->ReportHeader) ?>',1);"><div id="elh_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->ReportHeader->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_billing_return->PharID->Visible) { // PharID ?>
	<?php if ($pharmacy_billing_return->sortUrl($pharmacy_billing_return->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_return->PharID->headerCellClass() ?>"><div id="elh_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID"><div class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $pharmacy_billing_return->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_billing_return->SortUrl($pharmacy_billing_return->PharID) ?>',1);"><div id="elh_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_billing_return->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_billing_return->PharID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_billing_return->PharID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_billing_return_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_billing_return->ExportAll && $pharmacy_billing_return->isExport()) {
	$pharmacy_billing_return_list->StopRec = $pharmacy_billing_return_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_billing_return_list->TotalRecs > $pharmacy_billing_return_list->StartRec + $pharmacy_billing_return_list->DisplayRecs - 1)
		$pharmacy_billing_return_list->StopRec = $pharmacy_billing_return_list->StartRec + $pharmacy_billing_return_list->DisplayRecs - 1;
	else
		$pharmacy_billing_return_list->StopRec = $pharmacy_billing_return_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $pharmacy_billing_return_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($pharmacy_billing_return_list->FormKeyCountName) && ($pharmacy_billing_return->isGridAdd() || $pharmacy_billing_return->isGridEdit() || $pharmacy_billing_return->isConfirm())) {
		$pharmacy_billing_return_list->KeyCount = $CurrentForm->getValue($pharmacy_billing_return_list->FormKeyCountName);
		$pharmacy_billing_return_list->StopRec = $pharmacy_billing_return_list->StartRec + $pharmacy_billing_return_list->KeyCount - 1;
	}
}
$pharmacy_billing_return_list->RecCnt = $pharmacy_billing_return_list->StartRec - 1;
if ($pharmacy_billing_return_list->Recordset && !$pharmacy_billing_return_list->Recordset->EOF) {
	$pharmacy_billing_return_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_billing_return_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_billing_return_list->StartRec > 1)
		$pharmacy_billing_return_list->Recordset->move($pharmacy_billing_return_list->StartRec - 1);
} elseif (!$pharmacy_billing_return->AllowAddDeleteRow && $pharmacy_billing_return_list->StopRec == 0) {
	$pharmacy_billing_return_list->StopRec = $pharmacy_billing_return->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_billing_return->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_billing_return->resetAttributes();
$pharmacy_billing_return_list->renderRow();
if ($pharmacy_billing_return->isGridAdd())
	$pharmacy_billing_return_list->RowIndex = 0;
if ($pharmacy_billing_return->isGridEdit())
	$pharmacy_billing_return_list->RowIndex = 0;
while ($pharmacy_billing_return_list->RecCnt < $pharmacy_billing_return_list->StopRec) {
	$pharmacy_billing_return_list->RecCnt++;
	if ($pharmacy_billing_return_list->RecCnt >= $pharmacy_billing_return_list->StartRec) {
		$pharmacy_billing_return_list->RowCnt++;
		if ($pharmacy_billing_return->isGridAdd() || $pharmacy_billing_return->isGridEdit() || $pharmacy_billing_return->isConfirm()) {
			$pharmacy_billing_return_list->RowIndex++;
			$CurrentForm->Index = $pharmacy_billing_return_list->RowIndex;
			if ($CurrentForm->hasValue($pharmacy_billing_return_list->FormActionName) && $pharmacy_billing_return_list->EventCancelled)
				$pharmacy_billing_return_list->RowAction = strval($CurrentForm->getValue($pharmacy_billing_return_list->FormActionName));
			elseif ($pharmacy_billing_return->isGridAdd())
				$pharmacy_billing_return_list->RowAction = "insert";
			else
				$pharmacy_billing_return_list->RowAction = "";
		}

		// Set up key count
		$pharmacy_billing_return_list->KeyCount = $pharmacy_billing_return_list->RowIndex;

		// Init row class and style
		$pharmacy_billing_return->resetAttributes();
		$pharmacy_billing_return->CssClass = "";
		if ($pharmacy_billing_return->isGridAdd()) {
			$pharmacy_billing_return_list->loadRowValues(); // Load default values
		} else {
			$pharmacy_billing_return_list->loadRowValues($pharmacy_billing_return_list->Recordset); // Load row values
		}
		$pharmacy_billing_return->RowType = ROWTYPE_VIEW; // Render view
		if ($pharmacy_billing_return->isGridAdd()) // Grid add
			$pharmacy_billing_return->RowType = ROWTYPE_ADD; // Render add
		if ($pharmacy_billing_return->isGridAdd() && $pharmacy_billing_return->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$pharmacy_billing_return_list->restoreCurrentRowFormValues($pharmacy_billing_return_list->RowIndex); // Restore form values
		if ($pharmacy_billing_return->isGridEdit()) { // Grid edit
			if ($pharmacy_billing_return->EventCancelled)
				$pharmacy_billing_return_list->restoreCurrentRowFormValues($pharmacy_billing_return_list->RowIndex); // Restore form values
			if ($pharmacy_billing_return_list->RowAction == "insert")
				$pharmacy_billing_return->RowType = ROWTYPE_ADD; // Render add
			else
				$pharmacy_billing_return->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($pharmacy_billing_return->isGridEdit() && ($pharmacy_billing_return->RowType == ROWTYPE_EDIT || $pharmacy_billing_return->RowType == ROWTYPE_ADD) && $pharmacy_billing_return->EventCancelled) // Update failed
			$pharmacy_billing_return_list->restoreCurrentRowFormValues($pharmacy_billing_return_list->RowIndex); // Restore form values
		if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) // Edit row
			$pharmacy_billing_return_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$pharmacy_billing_return->RowAttrs = array_merge($pharmacy_billing_return->RowAttrs, array('data-rowindex'=>$pharmacy_billing_return_list->RowCnt, 'id'=>'r' . $pharmacy_billing_return_list->RowCnt . '_pharmacy_billing_return', 'data-rowtype'=>$pharmacy_billing_return->RowType));

		// Render row
		$pharmacy_billing_return_list->renderRow();

		// Render list options
		$pharmacy_billing_return_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($pharmacy_billing_return_list->RowAction <> "delete" && $pharmacy_billing_return_list->RowAction <> "insertdelete" && !($pharmacy_billing_return_list->RowAction == "insert" && $pharmacy_billing_return->isConfirm() && $pharmacy_billing_return_list->emptyRow())) {
?>
	<tr<?php echo $pharmacy_billing_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_return_list->ListOptions->render("body", "left", $pharmacy_billing_return_list->RowCnt);
?>
	<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_billing_return->id->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_id" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_return->id->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_id" class="form-group pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_return->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_id" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_id" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_return->id->CurrentValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_id" class="pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $pharmacy_billing_return->PatientId->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PatientId" class="form-group pharmacy_billing_return_PatientId">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientId" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PatientId" class="form-group pharmacy_billing_return_PatientId">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId">
<span<?php echo $pharmacy_billing_return->PatientId->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $pharmacy_billing_return->mrnno->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_mrnno" class="form-group pharmacy_billing_return_mrnno">
<input type="text" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->mrnno->EditValue ?>"<?php echo $pharmacy_billing_return->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_mrnno" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_return->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_mrnno" class="form-group pharmacy_billing_return_mrnno">
<input type="text" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->mrnno->EditValue ?>"<?php echo $pharmacy_billing_return->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno">
<span<?php echo $pharmacy_billing_return->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->mrnno->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $pharmacy_billing_return->PatientName->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PatientName" class="form-group pharmacy_billing_return_PatientName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientName" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PatientName" class="form-group pharmacy_billing_return_PatientName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName">
<span<?php echo $pharmacy_billing_return->PatientName->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $pharmacy_billing_return->Mobile->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Mobile" class="form-group pharmacy_billing_return_Mobile">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Mobile" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Mobile" class="form-group pharmacy_billing_return_Mobile">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile">
<span<?php echo $pharmacy_billing_return->Mobile->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $pharmacy_billing_return->IP_OP->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_IP_OP" class="form-group pharmacy_billing_return_IP_OP">
<input type="text" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_return->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_return->IP_OP->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_IP_OP" class="form-group pharmacy_billing_return_IP_OP">
<input type="text" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_return->IP_OP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP">
<span<?php echo $pharmacy_billing_return->IP_OP->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->IP_OP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $pharmacy_billing_return->Doctor->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Doctor" class="form-group pharmacy_billing_return_Doctor">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Doctor->EditValue ?>"<?php echo $pharmacy_billing_return->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Doctor" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_return->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Doctor" class="form-group pharmacy_billing_return_Doctor">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Doctor->EditValue ?>"<?php echo $pharmacy_billing_return->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor">
<span<?php echo $pharmacy_billing_return->Doctor->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $pharmacy_billing_return->voucher_type->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_voucher_type" class="form-group pharmacy_billing_return_voucher_type">
<input type="text" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_return->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($pharmacy_billing_return->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_voucher_type" class="form-group pharmacy_billing_return_voucher_type">
<input type="text" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_return->voucher_type->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type">
<span<?php echo $pharmacy_billing_return->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->voucher_type->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $pharmacy_billing_return->ModeofPayment->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_ModeofPayment" class="form-group pharmacy_billing_return_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_return->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_return->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_return->ModeofPayment->selectOptionListHtml("x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_return->ModeofPayment->Lookup->getParamTag("p_x" . $pharmacy_billing_return_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_return->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_ModeofPayment" class="form-group pharmacy_billing_return_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_return->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_return->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_return->ModeofPayment->selectOptionListHtml("x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_return->ModeofPayment->Lookup->getParamTag("p_x" . $pharmacy_billing_return_list->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment">
<span<?php echo $pharmacy_billing_return->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $pharmacy_billing_return->Amount->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Amount" class="form-group pharmacy_billing_return_Amount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Amount" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Amount->EditValue ?>"<?php echo $pharmacy_billing_return->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Amount" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($pharmacy_billing_return->Amount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Amount" class="form-group pharmacy_billing_return_Amount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Amount" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Amount->EditValue ?>"<?php echo $pharmacy_billing_return->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount">
<span<?php echo $pharmacy_billing_return->Amount->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $pharmacy_billing_return->AnyDues->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_AnyDues" class="form-group pharmacy_billing_return_AnyDues">
<input type="text" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_return->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_return->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_AnyDues" class="form-group pharmacy_billing_return_AnyDues">
<input type="text" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_return->AnyDues->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues">
<span<?php echo $pharmacy_billing_return->AnyDues->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->AnyDues->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_billing_return->createdby->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_createdby" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_return->createdby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby">
<span<?php echo $pharmacy_billing_return->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_billing_return->createddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_return->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime">
<span<?php echo $pharmacy_billing_return->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_billing_return->modifiedby->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_return->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby">
<span<?php echo $pharmacy_billing_return->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_billing_return->modifieddatetime->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_return->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime">
<span<?php echo $pharmacy_billing_return->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $pharmacy_billing_return->RealizationAmount->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_RealizationAmount" class="form-group pharmacy_billing_return_RealizationAmount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_return->RealizationAmount->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_RealizationAmount" class="form-group pharmacy_billing_return_RealizationAmount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount">
<span<?php echo $pharmacy_billing_return->RealizationAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->RealizationAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $pharmacy_billing_return->CId->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_CId" class="form-group pharmacy_billing_return_CId">
<?php $pharmacy_billing_return->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_return->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId"><?php echo strval($pharmacy_billing_return->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->CId->ViewValue) : $pharmacy_billing_return->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->CId->ReadOnly || $pharmacy_billing_return->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->CId->Lookup->getParamTag("p_x" . $pharmacy_billing_return_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_return->CId->CurrentValue ?>"<?php echo $pharmacy_billing_return->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($pharmacy_billing_return->CId->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_CId" class="form-group pharmacy_billing_return_CId">
<?php $pharmacy_billing_return->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_return->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId"><?php echo strval($pharmacy_billing_return->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->CId->ViewValue) : $pharmacy_billing_return->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->CId->ReadOnly || $pharmacy_billing_return->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->CId->Lookup->getParamTag("p_x" . $pharmacy_billing_return_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_return->CId->CurrentValue ?>"<?php echo $pharmacy_billing_return->CId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId">
<span<?php echo $pharmacy_billing_return->CId->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->CId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $pharmacy_billing_return->PartnerName->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PartnerName" class="form-group pharmacy_billing_return_PartnerName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_return->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_return->PartnerName->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PartnerName" class="form-group pharmacy_billing_return_PartnerName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_return->PartnerName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName">
<span<?php echo $pharmacy_billing_return->PartnerName->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PartnerName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $pharmacy_billing_return->BillNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_BillNumber" class="form-group pharmacy_billing_return_BillNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_return->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_return->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_BillNumber" class="form-group pharmacy_billing_return_BillNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_return->BillNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber">
<span<?php echo $pharmacy_billing_return->BillNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $pharmacy_billing_return->CardNumber->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_CardNumber" class="form-group pharmacy_billing_return_CardNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_return->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_return->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_CardNumber" class="form-group pharmacy_billing_return_CardNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_return->CardNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber">
<span<?php echo $pharmacy_billing_return->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->CardNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus"<?php echo $pharmacy_billing_return->BillStatus->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_BillStatus" class="form-group pharmacy_billing_return_BillStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_return->BillStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_return->BillStatus->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_BillStatus" class="form-group pharmacy_billing_return_BillStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_return->BillStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus">
<span<?php echo $pharmacy_billing_return->BillStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->BillStatus->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $pharmacy_billing_return->ReportHeader->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_ReportHeader" class="form-group pharmacy_billing_return_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_return" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_return->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_return->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_return->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_return_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ReportHeader" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" value="<?php echo HtmlEncode($pharmacy_billing_return->ReportHeader->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_ReportHeader" class="form-group pharmacy_billing_return_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_return" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_return->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_return->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_return->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_return_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader">
<span<?php echo $pharmacy_billing_return->ReportHeader->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->ReportHeader->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PharID->Visible) { // PharID ?>
		<td data-name="PharID"<?php echo $pharmacy_billing_return->PharID->cellAttributes() ?>>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PharID" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_return->PharID->OldValue) ?>">
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $pharmacy_billing_return_list->RowCnt ?>_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID">
<span<?php echo $pharmacy_billing_return->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PharID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_return_list->ListOptions->render("body", "right", $pharmacy_billing_return_list->RowCnt);
?>
	</tr>
<?php if ($pharmacy_billing_return->RowType == ROWTYPE_ADD || $pharmacy_billing_return->RowType == ROWTYPE_EDIT) { ?>
<script>
fpharmacy_billing_returnlist.updateLists(<?php echo $pharmacy_billing_return_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$pharmacy_billing_return->isGridAdd())
		if (!$pharmacy_billing_return_list->Recordset->EOF)
			$pharmacy_billing_return_list->Recordset->moveNext();
}
?>
<?php
	if ($pharmacy_billing_return->isGridAdd() || $pharmacy_billing_return->isGridEdit()) {
		$pharmacy_billing_return_list->RowIndex = '$rowindex$';
		$pharmacy_billing_return_list->loadRowValues();

		// Set row properties
		$pharmacy_billing_return->resetAttributes();
		$pharmacy_billing_return->RowAttrs = array_merge($pharmacy_billing_return->RowAttrs, array('data-rowindex'=>$pharmacy_billing_return_list->RowIndex, 'id'=>'r0_pharmacy_billing_return', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($pharmacy_billing_return->RowAttrs["class"], "ew-template");
		$pharmacy_billing_return->RowType = ROWTYPE_ADD;

		// Render row
		$pharmacy_billing_return_list->renderRow();

		// Render list options
		$pharmacy_billing_return_list->renderListOptions();
		$pharmacy_billing_return_list->StartRowCnt = 0;
?>
	<tr<?php echo $pharmacy_billing_return->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_billing_return_list->ListOptions->render("body", "left", $pharmacy_billing_return_list->RowIndex);
?>
	<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
		<td data-name="id">
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_id" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_id" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_id" value="<?php echo HtmlEncode($pharmacy_billing_return->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_pharmacy_billing_return_PatientId" class="form-group pharmacy_billing_return_PatientId">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientId" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<span id="el$rowindex$_pharmacy_billing_return_mrnno" class="form-group pharmacy_billing_return_mrnno">
<input type="text" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->mrnno->EditValue ?>"<?php echo $pharmacy_billing_return->mrnno->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_mrnno" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($pharmacy_billing_return->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_pharmacy_billing_return_PatientName" class="form-group pharmacy_billing_return_PatientName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatientName" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_pharmacy_billing_return_Mobile" class="form-group pharmacy_billing_return_Mobile">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Mobile" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP">
<span id="el$rowindex$_pharmacy_billing_return_IP_OP" class="form-group pharmacy_billing_return_IP_OP">
<input type="text" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_return->IP_OP->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_IP_OP" value="<?php echo HtmlEncode($pharmacy_billing_return->IP_OP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_pharmacy_billing_return_Doctor" class="form-group pharmacy_billing_return_Doctor">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Doctor->EditValue ?>"<?php echo $pharmacy_billing_return->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Doctor" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($pharmacy_billing_return->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type">
<span id="el$rowindex$_pharmacy_billing_return_voucher_type" class="form-group pharmacy_billing_return_voucher_type">
<input type="text" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_return->voucher_type->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_voucher_type" value="<?php echo HtmlEncode($pharmacy_billing_return->voucher_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_pharmacy_billing_return_ModeofPayment" class="form-group pharmacy_billing_return_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_return->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment"<?php echo $pharmacy_billing_return->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_return->ModeofPayment->selectOptionListHtml("x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_return->ModeofPayment->Lookup->getParamTag("p_x" . $pharmacy_billing_return_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($pharmacy_billing_return->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_pharmacy_billing_return_Amount" class="form-group pharmacy_billing_return_Amount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Amount" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Amount->EditValue ?>"<?php echo $pharmacy_billing_return->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Amount" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($pharmacy_billing_return->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues">
<span id="el$rowindex$_pharmacy_billing_return_AnyDues" class="form-group pharmacy_billing_return_AnyDues">
<input type="text" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_return->AnyDues->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_AnyDues" value="<?php echo HtmlEncode($pharmacy_billing_return->AnyDues->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_createdby" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createdby" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createdby" value="<?php echo HtmlEncode($pharmacy_billing_return->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_createddatetime" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createddatetime" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($pharmacy_billing_return->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_modifiedby" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifiedby" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($pharmacy_billing_return->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_modifieddatetime" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifieddatetime" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($pharmacy_billing_return->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount">
<span id="el$rowindex$_pharmacy_billing_return_RealizationAmount" class="form-group pharmacy_billing_return_RealizationAmount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_RealizationAmount" value="<?php echo HtmlEncode($pharmacy_billing_return->RealizationAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
		<td data-name="CId">
<span id="el$rowindex$_pharmacy_billing_return_CId" class="form-group pharmacy_billing_return_CId">
<?php $pharmacy_billing_return->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_return->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId"><?php echo strval($pharmacy_billing_return->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->CId->ViewValue) : $pharmacy_billing_return->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->CId->ReadOnly || $pharmacy_billing_return->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->CId->Lookup->getParamTag("p_x" . $pharmacy_billing_return_list->RowIndex . "_CId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->CId->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" value="<?php echo $pharmacy_billing_return->CId->CurrentValue ?>"<?php echo $pharmacy_billing_return->CId->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CId" value="<?php echo HtmlEncode($pharmacy_billing_return->CId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName">
<span id="el$rowindex$_pharmacy_billing_return_PartnerName" class="form-group pharmacy_billing_return_PartnerName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_return->PartnerName->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PartnerName" value="<?php echo HtmlEncode($pharmacy_billing_return->PartnerName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<span id="el$rowindex$_pharmacy_billing_return_BillNumber" class="form-group pharmacy_billing_return_BillNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_return->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($pharmacy_billing_return->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber">
<span id="el$rowindex$_pharmacy_billing_return_CardNumber" class="form-group pharmacy_billing_return_CardNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_return->CardNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_CardNumber" value="<?php echo HtmlEncode($pharmacy_billing_return->CardNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus">
<span id="el$rowindex$_pharmacy_billing_return_BillStatus" class="form-group pharmacy_billing_return_BillStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_return->BillStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_BillStatus" value="<?php echo HtmlEncode($pharmacy_billing_return->BillStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader">
<span id="el$rowindex$_pharmacy_billing_return_ReportHeader" class="form-group pharmacy_billing_return_ReportHeader">
<div id="tp_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_return" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_return->ReportHeader->displayValueSeparatorAttribute() ?>" name="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" id="x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_return->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_return->ReportHeader->checkBoxListHtml(FALSE, "x{$pharmacy_billing_return_list->RowIndex}_ReportHeader[]") ?>
</div></div>
</span>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_ReportHeader" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_ReportHeader[]" value="<?php echo HtmlEncode($pharmacy_billing_return->ReportHeader->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($pharmacy_billing_return->PharID->Visible) { // PharID ?>
		<td data-name="PharID">
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PharID" name="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PharID" id="o<?php echo $pharmacy_billing_return_list->RowIndex ?>_PharID" value="<?php echo HtmlEncode($pharmacy_billing_return->PharID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_billing_return_list->ListOptions->render("body", "right", $pharmacy_billing_return_list->RowIndex);
?>
<script>
fpharmacy_billing_returnlist.updateLists(<?php echo $pharmacy_billing_return_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($pharmacy_billing_return->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $pharmacy_billing_return_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_return_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_return_list->KeyCount ?>">
<?php echo $pharmacy_billing_return_list->MultiSelectKey ?>
<?php } ?>
<?php if ($pharmacy_billing_return->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $pharmacy_billing_return_list->FormKeyCountName ?>" id="<?php echo $pharmacy_billing_return_list->FormKeyCountName ?>" value="<?php echo $pharmacy_billing_return_list->KeyCount ?>">
<?php echo $pharmacy_billing_return_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$pharmacy_billing_return->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_billing_return_list->Recordset)
	$pharmacy_billing_return_list->Recordset->Close();
?>
<?php if (!$pharmacy_billing_return->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_billing_return->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_billing_return_list->Pager)) $pharmacy_billing_return_list->Pager = new NumericPager($pharmacy_billing_return_list->StartRec, $pharmacy_billing_return_list->DisplayRecs, $pharmacy_billing_return_list->TotalRecs, $pharmacy_billing_return_list->RecRange, $pharmacy_billing_return_list->AutoHidePager) ?>
<?php if ($pharmacy_billing_return_list->Pager->RecordCount > 0 && $pharmacy_billing_return_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_billing_return_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_return_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_billing_return_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_billing_return_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_return_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_billing_return_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_billing_return_list->pageUrl() ?>start=<?php echo $pharmacy_billing_return_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_billing_return_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_billing_return_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_billing_return_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_billing_return_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_billing_return_list->TotalRecs > 0 && (!$pharmacy_billing_return_list->AutoHidePageSizeSelector || $pharmacy_billing_return_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_billing_return">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_billing_return_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_billing_return_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_billing_return_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_billing_return_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_billing_return_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_billing_return_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_billing_return->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_return_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_billing_return_list->TotalRecs == 0 && !$pharmacy_billing_return->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_billing_return_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_billing_return_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_return->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_billing_return->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_billing_return", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_return_list->terminate();
?>