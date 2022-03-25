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
$view_billing_voucher_list = new view_billing_voucher_list();

// Run the page
$view_billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_billing_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_billing_voucherlist = currentForm = new ew.Form("fview_billing_voucherlist", "list");
fview_billing_voucherlist.formKeyCountName = '<?php echo $view_billing_voucher_list->FormKeyCountName ?>';

// Validate form
fview_billing_voucherlist.validate = function() {
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
		<?php if ($view_billing_voucher_list->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->createddatetime->caption(), $view_billing_voucher->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->createddatetime->errorMessage()) ?>");
		<?php if ($view_billing_voucher_list->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BillNumber->caption(), $view_billing_voucher->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PatientId->caption(), $view_billing_voucher->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PatientName->caption(), $view_billing_voucher->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Mobile->caption(), $view_billing_voucher->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Doctor->caption(), $view_billing_voucher->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->ModeofPayment->caption(), $view_billing_voucher->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Amount->caption(), $view_billing_voucher->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->Amount->errorMessage()) ?>");
		<?php if ($view_billing_voucher_list->DiscountAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->DiscountAmount->caption(), $view_billing_voucher->DiscountAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DiscountAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->DiscountAmount->errorMessage()) ?>");
		<?php if ($view_billing_voucher_list->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BankName->caption(), $view_billing_voucher->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->UserName->caption(), $view_billing_voucher->UserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->BillType->Required) { ?>
			elm = this.getElements("x" + infix + "_BillType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->BillType->caption(), $view_billing_voucher->BillType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->CancelBill->Required) { ?>
			elm = this.getElements("x" + infix + "_CancelBill");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CancelBill->caption(), $view_billing_voucher->CancelBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->LabTest->Required) { ?>
			elm = this.getElements("x" + infix + "_LabTest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->LabTest->caption(), $view_billing_voucher->LabTest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->sid->caption(), $view_billing_voucher->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->SidNo->caption(), $view_billing_voucher->SidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->createdDatettime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDatettime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->createdDatettime->caption(), $view_billing_voucher->createdDatettime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->GoogleReviewID->Required) { ?>
			elm = this.getElements("x" + infix + "_GoogleReviewID[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->GoogleReviewID->caption(), $view_billing_voucher->GoogleReviewID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->CardType->Required) { ?>
			elm = this.getElements("x" + infix + "_CardType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->CardType->caption(), $view_billing_voucher->CardType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->PharmacyBill->Required) { ?>
			elm = this.getElements("x" + infix + "_PharmacyBill[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->PharmacyBill->caption(), $view_billing_voucher->PharmacyBill->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_billing_voucher_list->cash->Required) { ?>
			elm = this.getElements("x" + infix + "_cash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->cash->caption(), $view_billing_voucher->cash->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_cash");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->cash->errorMessage()) ?>");
		<?php if ($view_billing_voucher_list->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_billing_voucher->Card->caption(), $view_billing_voucher->Card->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->Card->errorMessage()) ?>");

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
fview_billing_voucherlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mobile", false)) return false;
	if (ew.valueChanged(fobj, infix, "Doctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "ModeofPayment", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "DiscountAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "BankName", false)) return false;
	if (ew.valueChanged(fobj, infix, "BillType", false)) return false;
	if (ew.valueChanged(fobj, infix, "CancelBill", false)) return false;
	if (ew.valueChanged(fobj, infix, "LabTest", false)) return false;
	if (ew.valueChanged(fobj, infix, "sid", false)) return false;
	if (ew.valueChanged(fobj, infix, "SidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "GoogleReviewID[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "CardType", false)) return false;
	if (ew.valueChanged(fobj, infix, "PharmacyBill[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "cash", false)) return false;
	if (ew.valueChanged(fobj, infix, "Card", false)) return false;
	return true;
}

// Form_CustomValidate event
fview_billing_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucherlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_voucherlist.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_list->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_voucherlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_list->ModeofPayment->lookupOptions()) ?>;
fview_billing_voucherlist.lists["x_BillType"] = <?php echo $view_billing_voucher_list->BillType->Lookup->toClientList() ?>;
fview_billing_voucherlist.lists["x_BillType"].options = <?php echo JsonEncode($view_billing_voucher_list->BillType->options(FALSE, TRUE)) ?>;
fview_billing_voucherlist.lists["x_CancelBill"] = <?php echo $view_billing_voucher_list->CancelBill->Lookup->toClientList() ?>;
fview_billing_voucherlist.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_list->CancelBill->options(FALSE, TRUE)) ?>;
fview_billing_voucherlist.lists["x_GoogleReviewID[]"] = <?php echo $view_billing_voucher_list->GoogleReviewID->Lookup->toClientList() ?>;
fview_billing_voucherlist.lists["x_GoogleReviewID[]"].options = <?php echo JsonEncode($view_billing_voucher_list->GoogleReviewID->options(FALSE, TRUE)) ?>;
fview_billing_voucherlist.lists["x_CardType"] = <?php echo $view_billing_voucher_list->CardType->Lookup->toClientList() ?>;
fview_billing_voucherlist.lists["x_CardType"].options = <?php echo JsonEncode($view_billing_voucher_list->CardType->options(FALSE, TRUE)) ?>;
fview_billing_voucherlist.lists["x_PharmacyBill[]"] = <?php echo $view_billing_voucher_list->PharmacyBill->Lookup->toClientList() ?>;
fview_billing_voucherlist.lists["x_PharmacyBill[]"].options = <?php echo JsonEncode($view_billing_voucher_list->PharmacyBill->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_billing_voucherlistsrch = currentSearchForm = new ew.Form("fview_billing_voucherlistsrch");

// Validate function for search
fview_billing_voucherlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->createddatetime->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_billing_voucherlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucherlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_billing_voucherlistsrch.filterList = <?php echo $view_billing_voucher_list->getFilterList() ?>;
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
<?php if (!$view_billing_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_billing_voucher_list->TotalRecs > 0 && $view_billing_voucher_list->ExportOptions->visible()) { ?>
<?php $view_billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_list->ImportOptions->visible()) { ?>
<?php $view_billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_list->SearchOptions->visible()) { ?>
<?php $view_billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_list->FilterOptions->visible()) { ?>
<?php $view_billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_billing_voucher->isExport() && !$view_billing_voucher->CurrentAction) { ?>
<form name="fview_billing_voucherlistsrch" id="fview_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_billing_voucher_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_billing_voucherlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_voucher">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_billing_voucher_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_billing_voucher->RowType = ROWTYPE_SEARCH;

// Render row
$view_billing_voucher->resetAttributes();
$view_billing_voucher_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_billing_voucher->createddatetime->caption() ?></label>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_voucherlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		<span class="ew-search-cond btw1_createddatetime style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		<span class="ew-search-field btw1_createddatetime style="d-none"">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue2 ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_voucherlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<div id="xsc_BillNumber" class="ew-cell form-group">
		<label for="x_BillNumber" class="ew-search-caption ew-label"><?php echo $view_billing_voucher->BillNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillNumber->EditValue ?>"<?php echo $view_billing_voucher->BillNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_billing_voucher->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientId->EditValue ?>"<?php echo $view_billing_voucher->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_billing_voucher->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientName->EditValue ?>"<?php echo $view_billing_voucher->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="xsc_Mobile" class="ew-cell form-group">
		<label for="x_Mobile" class="ew-search-caption ew-label"><?php echo $view_billing_voucher->Mobile->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Mobile->EditValue ?>"<?php echo $view_billing_voucher->Mobile->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_billing_voucher_list->showPageHeader(); ?>
<?php
$view_billing_voucher_list->showMessage();
?>
<?php if ($view_billing_voucher_list->TotalRecs > 0 || $view_billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_voucher">
<?php if (!$view_billing_voucher->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_billing_voucher_list->Pager)) $view_billing_voucher_list->Pager = new NumericPager($view_billing_voucher_list->StartRec, $view_billing_voucher_list->DisplayRecs, $view_billing_voucher_list->TotalRecs, $view_billing_voucher_list->RecRange, $view_billing_voucher_list->AutoHidePager) ?>
<?php if ($view_billing_voucher_list->Pager->RecordCount > 0 && $view_billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_billing_voucher_list->TotalRecs > 0 && (!$view_billing_voucher_list->AutoHidePageSizeSelector || $view_billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_billing_voucherlist" id="fview_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<div id="gmp_view_billing_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_billing_voucher_list->TotalRecs > 0 || $view_billing_voucher->isGridEdit()) { ?>
<table id="tbl_view_billing_voucherlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_billing_voucher_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_billing_voucher_list->renderListOptions();

// Render list options (header, left)
$view_billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->createddatetime) ?>',1);"><div id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->BillNumber) ?>',1);"><div id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher->PatientId->headerCellClass() ?>"><div id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->PatientId) ?>',1);"><div id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher->PatientName->headerCellClass() ?>"><div id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->PatientName) ?>',1);"><div id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher->Mobile->headerCellClass() ?>"><div id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->Mobile) ?>',1);"><div id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher->Doctor->headerCellClass() ?>"><div id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->Doctor) ?>',1);"><div id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->ModeofPayment) ?>',1);"><div id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher->Amount->headerCellClass() ?>"><div id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->Amount) ?>',1);"><div id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->DiscountAmount) == "") { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_billing_voucher->DiscountAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_DiscountAmount" class="view_billing_voucher_DiscountAmount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->DiscountAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_billing_voucher->DiscountAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->DiscountAmount) ?>',1);"><div id="elh_view_billing_voucher_DiscountAmount" class="view_billing_voucher_DiscountAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->DiscountAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->DiscountAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->DiscountAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher->BankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->BankName) ?>',1);"><div id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->UserName->Visible) { // UserName ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher->UserName->headerCellClass() ?>"><div id="elh_view_billing_voucher_UserName" class="view_billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->UserName) ?>',1);"><div id="elh_view_billing_voucher_UserName" class="view_billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher->BillType->headerCellClass() ?>"><div id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->BillType) ?>',1);"><div id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->CancelBill) == "") { ?>
		<th data-name="CancelBill" class="<?php echo $view_billing_voucher->CancelBill->headerCellClass() ?>"><div id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->CancelBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBill" class="<?php echo $view_billing_voucher->CancelBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->CancelBill) ?>',1);"><div id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->CancelBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->CancelBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->CancelBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher->LabTest->headerCellClass() ?>"><div id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->LabTest) ?>',1);"><div id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->LabTest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->LabTest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher->sid->headerCellClass() ?>"><div id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->sid) ?>',1);"><div id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher->SidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->SidNo) ?>',1);"><div id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->SidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->SidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->createdDatettime) == "") { ?>
		<th data-name="createdDatettime" class="<?php echo $view_billing_voucher->createdDatettime->headerCellClass() ?>"><div id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->createdDatettime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatettime" class="<?php echo $view_billing_voucher->createdDatettime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->createdDatettime) ?>',1);"><div id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->createdDatettime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->createdDatettime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->createdDatettime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->GoogleReviewID) == "") { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_billing_voucher->GoogleReviewID->headerCellClass() ?>"><div id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->GoogleReviewID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_billing_voucher->GoogleReviewID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->GoogleReviewID) ?>',1);"><div id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->GoogleReviewID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->GoogleReviewID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->GoogleReviewID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->CardType) == "") { ?>
		<th data-name="CardType" class="<?php echo $view_billing_voucher->CardType->headerCellClass() ?>"><div id="elh_view_billing_voucher_CardType" class="view_billing_voucher_CardType"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->CardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardType" class="<?php echo $view_billing_voucher->CardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->CardType) ?>',1);"><div id="elh_view_billing_voucher_CardType" class="view_billing_voucher_CardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->CardType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->CardType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->CardType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->PharmacyBill) == "") { ?>
		<th data-name="PharmacyBill" class="<?php echo $view_billing_voucher->PharmacyBill->headerCellClass() ?>"><div id="elh_view_billing_voucher_PharmacyBill" class="view_billing_voucher_PharmacyBill"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->PharmacyBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharmacyBill" class="<?php echo $view_billing_voucher->PharmacyBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->PharmacyBill) ?>',1);"><div id="elh_view_billing_voucher_PharmacyBill" class="view_billing_voucher_PharmacyBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->PharmacyBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->PharmacyBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->PharmacyBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->cash) == "") { ?>
		<th data-name="cash" class="<?php echo $view_billing_voucher->cash->headerCellClass() ?>"><div id="elh_view_billing_voucher_cash" class="view_billing_voucher_cash"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cash" class="<?php echo $view_billing_voucher->cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->cash) ?>',1);"><div id="elh_view_billing_voucher_cash" class="view_billing_voucher_cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
	<?php if ($view_billing_voucher->sortUrl($view_billing_voucher->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_billing_voucher->Card->headerCellClass() ?>"><div id="elh_view_billing_voucher_Card" class="view_billing_voucher_Card"><div class="ew-table-header-caption"><?php echo $view_billing_voucher->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_billing_voucher->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_billing_voucher->SortUrl($view_billing_voucher->Card) ?>',1);"><div id="elh_view_billing_voucher_Card" class="view_billing_voucher_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_billing_voucher->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_billing_voucher->ExportAll && $view_billing_voucher->isExport()) {
	$view_billing_voucher_list->StopRec = $view_billing_voucher_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_billing_voucher_list->TotalRecs > $view_billing_voucher_list->StartRec + $view_billing_voucher_list->DisplayRecs - 1)
		$view_billing_voucher_list->StopRec = $view_billing_voucher_list->StartRec + $view_billing_voucher_list->DisplayRecs - 1;
	else
		$view_billing_voucher_list->StopRec = $view_billing_voucher_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_billing_voucher_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_billing_voucher_list->FormKeyCountName) && ($view_billing_voucher->isGridAdd() || $view_billing_voucher->isGridEdit() || $view_billing_voucher->isConfirm())) {
		$view_billing_voucher_list->KeyCount = $CurrentForm->getValue($view_billing_voucher_list->FormKeyCountName);
		$view_billing_voucher_list->StopRec = $view_billing_voucher_list->StartRec + $view_billing_voucher_list->KeyCount - 1;
	}
}
$view_billing_voucher_list->RecCnt = $view_billing_voucher_list->StartRec - 1;
if ($view_billing_voucher_list->Recordset && !$view_billing_voucher_list->Recordset->EOF) {
	$view_billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $view_billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $view_billing_voucher_list->StartRec > 1)
		$view_billing_voucher_list->Recordset->move($view_billing_voucher_list->StartRec - 1);
} elseif (!$view_billing_voucher->AllowAddDeleteRow && $view_billing_voucher_list->StopRec == 0) {
	$view_billing_voucher_list->StopRec = $view_billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$view_billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$view_billing_voucher->resetAttributes();
$view_billing_voucher_list->renderRow();
if ($view_billing_voucher->isGridAdd())
	$view_billing_voucher_list->RowIndex = 0;
if ($view_billing_voucher->isGridEdit())
	$view_billing_voucher_list->RowIndex = 0;
while ($view_billing_voucher_list->RecCnt < $view_billing_voucher_list->StopRec) {
	$view_billing_voucher_list->RecCnt++;
	if ($view_billing_voucher_list->RecCnt >= $view_billing_voucher_list->StartRec) {
		$view_billing_voucher_list->RowCnt++;
		if ($view_billing_voucher->isGridAdd() || $view_billing_voucher->isGridEdit() || $view_billing_voucher->isConfirm()) {
			$view_billing_voucher_list->RowIndex++;
			$CurrentForm->Index = $view_billing_voucher_list->RowIndex;
			if ($CurrentForm->hasValue($view_billing_voucher_list->FormActionName) && $view_billing_voucher_list->EventCancelled)
				$view_billing_voucher_list->RowAction = strval($CurrentForm->getValue($view_billing_voucher_list->FormActionName));
			elseif ($view_billing_voucher->isGridAdd())
				$view_billing_voucher_list->RowAction = "insert";
			else
				$view_billing_voucher_list->RowAction = "";
		}

		// Set up key count
		$view_billing_voucher_list->KeyCount = $view_billing_voucher_list->RowIndex;

		// Init row class and style
		$view_billing_voucher->resetAttributes();
		$view_billing_voucher->CssClass = "";
		if ($view_billing_voucher->isGridAdd()) {
			$view_billing_voucher_list->loadRowValues(); // Load default values
		} else {
			$view_billing_voucher_list->loadRowValues($view_billing_voucher_list->Recordset); // Load row values
		}
		$view_billing_voucher->RowType = ROWTYPE_VIEW; // Render view
		if ($view_billing_voucher->isGridAdd()) // Grid add
			$view_billing_voucher->RowType = ROWTYPE_ADD; // Render add
		if ($view_billing_voucher->isGridAdd() && $view_billing_voucher->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$view_billing_voucher_list->restoreCurrentRowFormValues($view_billing_voucher_list->RowIndex); // Restore form values
		if ($view_billing_voucher->isGridEdit()) { // Grid edit
			if ($view_billing_voucher->EventCancelled)
				$view_billing_voucher_list->restoreCurrentRowFormValues($view_billing_voucher_list->RowIndex); // Restore form values
			if ($view_billing_voucher_list->RowAction == "insert")
				$view_billing_voucher->RowType = ROWTYPE_ADD; // Render add
			else
				$view_billing_voucher->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($view_billing_voucher->isGridEdit() && ($view_billing_voucher->RowType == ROWTYPE_EDIT || $view_billing_voucher->RowType == ROWTYPE_ADD) && $view_billing_voucher->EventCancelled) // Update failed
			$view_billing_voucher_list->restoreCurrentRowFormValues($view_billing_voucher_list->RowIndex); // Restore form values
		if ($view_billing_voucher->RowType == ROWTYPE_EDIT) // Edit row
			$view_billing_voucher_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_billing_voucher->RowAttrs = array_merge($view_billing_voucher->RowAttrs, array('data-rowindex'=>$view_billing_voucher_list->RowCnt, 'id'=>'r' . $view_billing_voucher_list->RowCnt . '_view_billing_voucher', 'data-rowtype'=>$view_billing_voucher->RowType));

		// Render row
		$view_billing_voucher_list->renderRow();

		// Render list options
		$view_billing_voucher_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_billing_voucher_list->RowAction <> "delete" && $view_billing_voucher_list->RowAction <> "insertdelete" && !($view_billing_voucher_list->RowAction == "insert" && $view_billing_voucher->isConfirm() && $view_billing_voucher_list->emptyRow())) {
?>
	<tr<?php echo $view_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_list->ListOptions->render("body", "left", $view_billing_voucher_list->RowCnt);
?>
	<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_billing_voucher->createddatetime->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_createddatetime" class="form-group view_billing_voucher_createddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_voucherlist", "x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createddatetime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_billing_voucher->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_createddatetime" class="form-group view_billing_voucher_createddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_voucherlist", "x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime">
<span<?php echo $view_billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $view_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_id" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher->id->CurrentValue) ?>">
<input type="hidden" data-table="view_billing_voucher" data-field="x_id" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_id" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher->id->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT || $view_billing_voucher->CurrentMode == "edit") { ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_id" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_id" value="<?php echo HtmlEncode($view_billing_voucher->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_billing_voucher->BillNumber->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BillNumber" class="form-group view_billing_voucher_BillNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillNumber->EditValue ?>"<?php echo $view_billing_voucher->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BillNumber" class="form-group view_billing_voucher_BillNumber">
<span<?php echo $view_billing_voucher->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher->BillNumber->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher->BillNumber->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber">
<span<?php echo $view_billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_billing_voucher->PatientId->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PatientId" class="form-group view_billing_voucher_PatientId">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientId->EditValue ?>"<?php echo $view_billing_voucher->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientId" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PatientId" class="form-group view_billing_voucher_PatientId">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientId->EditValue ?>"<?php echo $view_billing_voucher->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId">
<span<?php echo $view_billing_voucher->PatientId->viewAttributes() ?>>
<?php echo $view_billing_voucher->PatientId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_billing_voucher->PatientName->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PatientName" class="form-group view_billing_voucher_PatientName">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientName->EditValue ?>"<?php echo $view_billing_voucher->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PatientName" class="form-group view_billing_voucher_PatientName">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientName->EditValue ?>"<?php echo $view_billing_voucher->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName">
<span<?php echo $view_billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $view_billing_voucher->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_billing_voucher->Mobile->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Mobile" class="form-group view_billing_voucher_Mobile">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Mobile->EditValue ?>"<?php echo $view_billing_voucher->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Mobile" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Mobile" class="form-group view_billing_voucher_Mobile">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Mobile->EditValue ?>"<?php echo $view_billing_voucher->Mobile->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile">
<span<?php echo $view_billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $view_billing_voucher->Mobile->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_billing_voucher->Doctor->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Doctor" class="form-group view_billing_voucher_Doctor">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Doctor->EditValue ?>"<?php echo $view_billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Doctor" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher->Doctor->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Doctor" class="form-group view_billing_voucher_Doctor">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Doctor->EditValue ?>"<?php echo $view_billing_voucher->Doctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor">
<span<?php echo $view_billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $view_billing_voucher->Doctor->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_billing_voucher->ModeofPayment->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_ModeofPayment" class="form-group view_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $view_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_ModeofPayment" class="form-group view_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $view_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment">
<span<?php echo $view_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_billing_voucher->Amount->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Amount" class="form-group view_billing_voucher_Amount">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Amount->EditValue ?>"<?php echo $view_billing_voucher->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Amount" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher->Amount->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Amount" class="form-group view_billing_voucher_Amount">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Amount->EditValue ?>"<?php echo $view_billing_voucher->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Amount" class="view_billing_voucher_Amount">
<span<?php echo $view_billing_voucher->Amount->viewAttributes() ?>>
<?php echo $view_billing_voucher->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount"<?php echo $view_billing_voucher->DiscountAmount->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_DiscountAmount" class="form-group view_billing_voucher_DiscountAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $view_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" value="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_DiscountAmount" class="form-group view_billing_voucher_DiscountAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $view_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_DiscountAmount" class="view_billing_voucher_DiscountAmount">
<span<?php echo $view_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_billing_voucher->BankName->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BankName" class="form-group view_billing_voucher_BankName">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BankName->EditValue ?>"<?php echo $view_billing_voucher->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BankName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher->BankName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BankName" class="form-group view_billing_voucher_BankName">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BankName->EditValue ?>"<?php echo $view_billing_voucher->BankName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BankName" class="view_billing_voucher_BankName">
<span<?php echo $view_billing_voucher->BankName->viewAttributes() ?>>
<?php echo $view_billing_voucher->BankName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_billing_voucher->UserName->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_UserName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_billing_voucher->UserName->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_UserName" class="view_billing_voucher_UserName">
<span<?php echo $view_billing_voucher->UserName->viewAttributes() ?>>
<?php echo $view_billing_voucher->UserName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_billing_voucher->BillType->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BillType" class="form-group view_billing_voucher_BillType">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $view_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="{value}"<?php echo $view_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillType->radioButtonListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_BillType") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillType" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher->BillType->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BillType" class="form-group view_billing_voucher_BillType">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $view_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="{value}"<?php echo $view_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillType->radioButtonListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_BillType") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_BillType" class="view_billing_voucher_BillType">
<span<?php echo $view_billing_voucher->BillType->viewAttributes() ?>>
<?php echo $view_billing_voucher->BillType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill"<?php echo $view_billing_voucher->CancelBill->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_CancelBill" class="form-group view_billing_voucher_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher->CancelBill->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill"<?php echo $view_billing_voucher->CancelBill->editAttributes() ?>>
		<?php echo $view_billing_voucher->CancelBill->selectOptionListHtml("x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CancelBill" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" value="<?php echo HtmlEncode($view_billing_voucher->CancelBill->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_CancelBill" class="form-group view_billing_voucher_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher->CancelBill->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill"<?php echo $view_billing_voucher->CancelBill->editAttributes() ?>>
		<?php echo $view_billing_voucher->CancelBill->selectOptionListHtml("x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill">
<span<?php echo $view_billing_voucher->CancelBill->viewAttributes() ?>>
<?php echo $view_billing_voucher->CancelBill->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest"<?php echo $view_billing_voucher->LabTest->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_LabTest" class="form-group view_billing_voucher_LabTest">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->LabTest->EditValue ?>"<?php echo $view_billing_voucher->LabTest->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_LabTest" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" value="<?php echo HtmlEncode($view_billing_voucher->LabTest->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_LabTest" class="form-group view_billing_voucher_LabTest">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->LabTest->EditValue ?>"<?php echo $view_billing_voucher->LabTest->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest">
<span<?php echo $view_billing_voucher->LabTest->viewAttributes() ?>>
<?php echo $view_billing_voucher->LabTest->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_billing_voucher->sid->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_sid" class="form-group view_billing_voucher_sid">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->sid->EditValue ?>"<?php echo $view_billing_voucher->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher->sid->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_sid" class="form-group view_billing_voucher_sid">
<span<?php echo $view_billing_voucher->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher->sid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher->sid->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_sid" class="view_billing_voucher_sid">
<span<?php echo $view_billing_voucher->sid->viewAttributes() ?>>
<?php echo $view_billing_voucher->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo"<?php echo $view_billing_voucher->SidNo->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_SidNo" class="form-group view_billing_voucher_SidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->SidNo->EditValue ?>"<?php echo $view_billing_voucher->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_SidNo" class="form-group view_billing_voucher_SidNo">
<span<?php echo $view_billing_voucher->SidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_billing_voucher->SidNo->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher->SidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo">
<span<?php echo $view_billing_voucher->SidNo->viewAttributes() ?>>
<?php echo $view_billing_voucher->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime"<?php echo $view_billing_voucher->createdDatettime->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createdDatettime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" value="<?php echo HtmlEncode($view_billing_voucher->createdDatettime->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime">
<span<?php echo $view_billing_voucher->createdDatettime->viewAttributes() ?>>
<?php echo $view_billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID"<?php echo $view_billing_voucher->GoogleReviewID->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_GoogleReviewID" class="form-group view_billing_voucher_GoogleReviewID">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->GoogleReviewID->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_GoogleReviewID[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="<?php echo HtmlEncode($view_billing_voucher->GoogleReviewID->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_GoogleReviewID" class="form-group view_billing_voucher_GoogleReviewID">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->GoogleReviewID->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_GoogleReviewID[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID">
<span<?php echo $view_billing_voucher->GoogleReviewID->viewAttributes() ?>>
<?php echo $view_billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType"<?php echo $view_billing_voucher->CardType->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_CardType" class="form-group view_billing_voucher_CardType">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $view_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" value="{value}"<?php echo $view_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->CardType->radioButtonListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_CardType") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CardType" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" value="<?php echo HtmlEncode($view_billing_voucher->CardType->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_CardType" class="form-group view_billing_voucher_CardType">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $view_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" value="{value}"<?php echo $view_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->CardType->radioButtonListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_CardType") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_CardType" class="view_billing_voucher_CardType">
<span<?php echo $view_billing_voucher->CardType->viewAttributes() ?>>
<?php echo $view_billing_voucher->CardType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<td data-name="PharmacyBill"<?php echo $view_billing_voucher->PharmacyBill->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PharmacyBill" class="form-group view_billing_voucher_PharmacyBill">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-value-separator="<?php echo $view_billing_voucher->PharmacyBill->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" value="{value}"<?php echo $view_billing_voucher->PharmacyBill->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->PharmacyBill->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_PharmacyBill[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PharmacyBill" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" value="<?php echo HtmlEncode($view_billing_voucher->PharmacyBill->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PharmacyBill" class="form-group view_billing_voucher_PharmacyBill">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-value-separator="<?php echo $view_billing_voucher->PharmacyBill->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" value="{value}"<?php echo $view_billing_voucher->PharmacyBill->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->PharmacyBill->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_PharmacyBill[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_PharmacyBill" class="view_billing_voucher_PharmacyBill">
<span<?php echo $view_billing_voucher->PharmacyBill->viewAttributes() ?>>
<?php echo $view_billing_voucher->PharmacyBill->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
		<td data-name="cash"<?php echo $view_billing_voucher->cash->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_cash" class="form-group view_billing_voucher_cash">
<input type="text" data-table="view_billing_voucher" data-field="x_cash" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_cash" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_cash" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->cash->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->cash->EditValue ?>"<?php echo $view_billing_voucher->cash->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_cash" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_cash" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_cash" value="<?php echo HtmlEncode($view_billing_voucher->cash->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_cash" class="form-group view_billing_voucher_cash">
<input type="text" data-table="view_billing_voucher" data-field="x_cash" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_cash" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_cash" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->cash->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->cash->EditValue ?>"<?php echo $view_billing_voucher->cash->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_cash" class="view_billing_voucher_cash">
<span<?php echo $view_billing_voucher->cash->viewAttributes() ?>>
<?php echo $view_billing_voucher->cash->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_billing_voucher->Card->cellAttributes() ?>>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Card" class="form-group view_billing_voucher_Card">
<input type="text" data-table="view_billing_voucher" data-field="x_Card" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Card" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Card->EditValue ?>"<?php echo $view_billing_voucher->Card->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Card" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Card" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($view_billing_voucher->Card->OldValue) ?>">
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Card" class="form-group view_billing_voucher_Card">
<input type="text" data-table="view_billing_voucher" data-field="x_Card" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Card" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Card->EditValue ?>"<?php echo $view_billing_voucher->Card->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_billing_voucher->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_billing_voucher_list->RowCnt ?>_view_billing_voucher_Card" class="view_billing_voucher_Card">
<span<?php echo $view_billing_voucher->Card->viewAttributes() ?>>
<?php echo $view_billing_voucher->Card->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_list->ListOptions->render("body", "right", $view_billing_voucher_list->RowCnt);
?>
	</tr>
<?php if ($view_billing_voucher->RowType == ROWTYPE_ADD || $view_billing_voucher->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_billing_voucherlist.updateLists(<?php echo $view_billing_voucher_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$view_billing_voucher->isGridAdd())
		if (!$view_billing_voucher_list->Recordset->EOF)
			$view_billing_voucher_list->Recordset->moveNext();
}
?>
<?php
	if ($view_billing_voucher->isGridAdd() || $view_billing_voucher->isGridEdit()) {
		$view_billing_voucher_list->RowIndex = '$rowindex$';
		$view_billing_voucher_list->loadRowValues();

		// Set row properties
		$view_billing_voucher->resetAttributes();
		$view_billing_voucher->RowAttrs = array_merge($view_billing_voucher->RowAttrs, array('data-rowindex'=>$view_billing_voucher_list->RowIndex, 'id'=>'r0_view_billing_voucher', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($view_billing_voucher->RowAttrs["class"], "ew-template");
		$view_billing_voucher->RowType = ROWTYPE_ADD;

		// Render row
		$view_billing_voucher_list->renderRow();

		// Render list options
		$view_billing_voucher_list->renderListOptions();
		$view_billing_voucher_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_list->ListOptions->render("body", "left", $view_billing_voucher_list->RowIndex);
?>
	<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<span id="el$rowindex$_view_billing_voucher_createddatetime" class="form-group view_billing_voucher_createddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_voucherlist", "x<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_createddatetime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($view_billing_voucher->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber">
<span id="el$rowindex$_view_billing_voucher_BillNumber" class="form-group view_billing_voucher_BillNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillNumber->EditValue ?>"<?php echo $view_billing_voucher->BillNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillNumber" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillNumber" value="<?php echo HtmlEncode($view_billing_voucher->BillNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<span id="el$rowindex$_view_billing_voucher_PatientId" class="form-group view_billing_voucher_PatientId">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientId->EditValue ?>"<?php echo $view_billing_voucher->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientId" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($view_billing_voucher->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<span id="el$rowindex$_view_billing_voucher_PatientName" class="form-group view_billing_voucher_PatientName">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientName->EditValue ?>"<?php echo $view_billing_voucher->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatientName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($view_billing_voucher->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile">
<span id="el$rowindex$_view_billing_voucher_Mobile" class="form-group view_billing_voucher_Mobile">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Mobile->EditValue ?>"<?php echo $view_billing_voucher->Mobile->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Mobile" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Mobile" value="<?php echo HtmlEncode($view_billing_voucher->Mobile->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor">
<span id="el$rowindex$_view_billing_voucher_Doctor" class="form-group view_billing_voucher_Doctor">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Doctor->EditValue ?>"<?php echo $view_billing_voucher->Doctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Doctor" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Doctor" value="<?php echo HtmlEncode($view_billing_voucher->Doctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment">
<span id="el$rowindex$_view_billing_voucher_ModeofPayment" class="form-group view_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment"<?php echo $view_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher->ModeofPayment->selectOptionListHtml("x<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x" . $view_billing_voucher_list->RowIndex . "_ModeofPayment") ?>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_ModeofPayment" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_ModeofPayment" value="<?php echo HtmlEncode($view_billing_voucher->ModeofPayment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_view_billing_voucher_Amount" class="form-group view_billing_voucher_Amount">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Amount->EditValue ?>"<?php echo $view_billing_voucher->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Amount" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($view_billing_voucher->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount">
<span id="el$rowindex$_view_billing_voucher_DiscountAmount" class="form-group view_billing_voucher_DiscountAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $view_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_DiscountAmount" value="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
		<td data-name="BankName">
<span id="el$rowindex$_view_billing_voucher_BankName" class="form-group view_billing_voucher_BankName">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BankName->EditValue ?>"<?php echo $view_billing_voucher->BankName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BankName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BankName" value="<?php echo HtmlEncode($view_billing_voucher->BankName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName">
<input type="hidden" data-table="view_billing_voucher" data-field="x_UserName" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_UserName" value="<?php echo HtmlEncode($view_billing_voucher->UserName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
		<td data-name="BillType">
<span id="el$rowindex$_view_billing_voucher_BillType" class="form-group view_billing_voucher_BillType">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $view_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="{value}"<?php echo $view_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillType->radioButtonListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_BillType") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_BillType" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_BillType" value="<?php echo HtmlEncode($view_billing_voucher->BillType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill">
<span id="el$rowindex$_view_billing_voucher_CancelBill" class="form-group view_billing_voucher_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher->CancelBill->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill"<?php echo $view_billing_voucher->CancelBill->editAttributes() ?>>
		<?php echo $view_billing_voucher->CancelBill->selectOptionListHtml("x<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CancelBill" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_CancelBill" value="<?php echo HtmlEncode($view_billing_voucher->CancelBill->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest">
<span id="el$rowindex$_view_billing_voucher_LabTest" class="form-group view_billing_voucher_LabTest">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->LabTest->EditValue ?>"<?php echo $view_billing_voucher->LabTest->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_LabTest" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_LabTest" value="<?php echo HtmlEncode($view_billing_voucher->LabTest->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
		<td data-name="sid">
<span id="el$rowindex$_view_billing_voucher_sid" class="form-group view_billing_voucher_sid">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->sid->EditValue ?>"<?php echo $view_billing_voucher->sid->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_sid" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_sid" value="<?php echo HtmlEncode($view_billing_voucher->sid->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo">
<span id="el$rowindex$_view_billing_voucher_SidNo" class="form-group view_billing_voucher_SidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->SidNo->EditValue ?>"<?php echo $view_billing_voucher->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_SidNo" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($view_billing_voucher->SidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime">
<input type="hidden" data-table="view_billing_voucher" data-field="x_createdDatettime" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_createdDatettime" value="<?php echo HtmlEncode($view_billing_voucher->createdDatettime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID">
<span id="el$rowindex$_view_billing_voucher_GoogleReviewID" class="form-group view_billing_voucher_GoogleReviewID">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->GoogleReviewID->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_GoogleReviewID[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_GoogleReviewID[]" value="<?php echo HtmlEncode($view_billing_voucher->GoogleReviewID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType">
<span id="el$rowindex$_view_billing_voucher_CardType" class="form-group view_billing_voucher_CardType">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $view_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" value="{value}"<?php echo $view_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->CardType->radioButtonListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_CardType") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CardType" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_CardType" value="<?php echo HtmlEncode($view_billing_voucher->CardType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<td data-name="PharmacyBill">
<span id="el$rowindex$_view_billing_voucher_PharmacyBill" class="form-group view_billing_voucher_PharmacyBill">
<div id="tp_x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-value-separator="<?php echo $view_billing_voucher->PharmacyBill->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" value="{value}"<?php echo $view_billing_voucher->PharmacyBill->editAttributes() ?>></div>
<div id="dsl_x<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->PharmacyBill->checkBoxListHtml(FALSE, "x{$view_billing_voucher_list->RowIndex}_PharmacyBill[]") ?>
</div></div>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PharmacyBill" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_PharmacyBill[]" value="<?php echo HtmlEncode($view_billing_voucher->PharmacyBill->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
		<td data-name="cash">
<span id="el$rowindex$_view_billing_voucher_cash" class="form-group view_billing_voucher_cash">
<input type="text" data-table="view_billing_voucher" data-field="x_cash" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_cash" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_cash" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->cash->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->cash->EditValue ?>"<?php echo $view_billing_voucher->cash->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_cash" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_cash" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_cash" value="<?php echo HtmlEncode($view_billing_voucher->cash->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card">
<span id="el$rowindex$_view_billing_voucher_Card" class="form-group view_billing_voucher_Card">
<input type="text" data-table="view_billing_voucher" data-field="x_Card" name="x<?php echo $view_billing_voucher_list->RowIndex ?>_Card" id="x<?php echo $view_billing_voucher_list->RowIndex ?>_Card" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Card->EditValue ?>"<?php echo $view_billing_voucher->Card->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Card" name="o<?php echo $view_billing_voucher_list->RowIndex ?>_Card" id="o<?php echo $view_billing_voucher_list->RowIndex ?>_Card" value="<?php echo HtmlEncode($view_billing_voucher->Card->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_list->ListOptions->render("body", "right", $view_billing_voucher_list->RowIndex);
?>
<script>
fview_billing_voucherlist.updateLists(<?php echo $view_billing_voucher_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_billing_voucher->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $view_billing_voucher_list->KeyCount ?>">
<?php echo $view_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if ($view_billing_voucher->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" id="<?php echo $view_billing_voucher_list->FormKeyCountName ?>" value="<?php echo $view_billing_voucher_list->KeyCount ?>">
<?php echo $view_billing_voucher_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$view_billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_billing_voucher_list->Recordset)
	$view_billing_voucher_list->Recordset->Close();
?>
<?php if (!$view_billing_voucher->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_billing_voucher_list->Pager)) $view_billing_voucher_list->Pager = new NumericPager($view_billing_voucher_list->StartRec, $view_billing_voucher_list->DisplayRecs, $view_billing_voucher_list->TotalRecs, $view_billing_voucher_list->RecRange, $view_billing_voucher_list->AutoHidePager) ?>
<?php if ($view_billing_voucher_list->Pager->RecordCount > 0 && $view_billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_billing_voucher_list->pageUrl() ?>start=<?php echo $view_billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_billing_voucher_list->TotalRecs > 0 && (!$view_billing_voucher_list->AutoHidePageSizeSelector || $view_billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_billing_voucher_list->TotalRecs == 0 && !$view_billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_billing_voucher_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_billing_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

  $("[data-caption='Edit']").hide();
</script>
<?php if (!$view_billing_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_billing_voucher", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_list->terminate();
?>