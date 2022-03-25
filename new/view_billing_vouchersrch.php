<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$view_billing_voucher_search = new view_billing_voucher_search();

// Run the page
$view_billing_voucher_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_billing_vouchersearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_billing_voucher_search->IsModal) { ?>
	fview_billing_vouchersearch = currentAdvancedSearchForm = new ew.Form("fview_billing_vouchersearch", "search");
	<?php } else { ?>
	fview_billing_vouchersearch = currentForm = new ew.Form("fview_billing_vouchersearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_billing_vouchersearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->Amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RealizationAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->RealizationAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TidNo");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->TidNo->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BillStatus");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->BillStatus->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ProcedureAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->ProcedureAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_sid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->sid->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdDatettime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_billing_voucher_search->createdDatettime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_billing_vouchersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_billing_vouchersearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_billing_vouchersearch.lists["x_Reception"] = <?php echo $view_billing_voucher_search->Reception->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_Reception"].options = <?php echo JsonEncode($view_billing_voucher_search->Reception->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_search->ModeofPayment->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_search->ModeofPayment->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_RIDNO"] = <?php echo $view_billing_voucher_search->RIDNO->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_RIDNO"].options = <?php echo JsonEncode($view_billing_voucher_search->RIDNO->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_CId"] = <?php echo $view_billing_voucher_search->CId->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_CId"].options = <?php echo JsonEncode($view_billing_voucher_search->CId->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_PatId"] = <?php echo $view_billing_voucher_search->PatId->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_PatId"].options = <?php echo JsonEncode($view_billing_voucher_search->PatId->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_RefferedBy"] = <?php echo $view_billing_voucher_search->RefferedBy->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_RefferedBy"].options = <?php echo JsonEncode($view_billing_voucher_search->RefferedBy->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_DrID"] = <?php echo $view_billing_voucher_search->DrID->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_DrID"].options = <?php echo JsonEncode($view_billing_voucher_search->DrID->lookupOptions()) ?>;
	fview_billing_vouchersearch.lists["x_ReportHeader[]"] = <?php echo $view_billing_voucher_search->ReportHeader->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_billing_voucher_search->ReportHeader->options(FALSE, TRUE)) ?>;
	fview_billing_vouchersearch.lists["x_AdjustmentAdvance[]"] = <?php echo $view_billing_voucher_search->AdjustmentAdvance->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_AdjustmentAdvance[]"].options = <?php echo JsonEncode($view_billing_voucher_search->AdjustmentAdvance->options(FALSE, TRUE)) ?>;
	fview_billing_vouchersearch.lists["x_IncludePackage[]"] = <?php echo $view_billing_voucher_search->IncludePackage->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_IncludePackage[]"].options = <?php echo JsonEncode($view_billing_voucher_search->IncludePackage->options(FALSE, TRUE)) ?>;
	fview_billing_vouchersearch.lists["x_CancelBill"] = <?php echo $view_billing_voucher_search->CancelBill->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_search->CancelBill->options(FALSE, TRUE)) ?>;
	fview_billing_vouchersearch.lists["x_BillClosing[]"] = <?php echo $view_billing_voucher_search->BillClosing->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_billing_voucher_search->BillClosing->options(FALSE, TRUE)) ?>;
	fview_billing_vouchersearch.lists["x_GoogleReviewID[]"] = <?php echo $view_billing_voucher_search->GoogleReviewID->Lookup->toClientList($view_billing_voucher_search) ?>;
	fview_billing_vouchersearch.lists["x_GoogleReviewID[]"].options = <?php echo JsonEncode($view_billing_voucher_search->GoogleReviewID->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_billing_vouchersearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_billing_voucher_search->showPageHeader(); ?>
<?php
$view_billing_voucher_search->showMessage();
?>
<form name="fview_billing_vouchersearch" id="fview_billing_vouchersearch" class="<?php echo $view_billing_voucher_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_billing_voucher_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_id"><?php echo $view_billing_voucher_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->id->cellAttributes() ?>>
			<span id="el_view_billing_voucher_id" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->id->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->id->EditValue ?>"<?php echo $view_billing_voucher_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createddatetime"><?php echo $view_billing_voucher_search->createddatetime->caption() ?></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->createddatetime->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_billing_voucher_search->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_billing_voucher_createddatetime" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->createddatetime->EditValue ?>"<?php echo $view_billing_voucher_search->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_search->createddatetime->ReadOnly && !$view_billing_voucher_search->createddatetime->Disabled && !isset($view_billing_voucher_search->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_vouchersearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->createddatetime->EditValue2 ?>"<?php echo $view_billing_voucher_search->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_search->createddatetime->ReadOnly && !$view_billing_voucher_search->createddatetime->Disabled && !isset($view_billing_voucher_search->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_vouchersearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillNumber"><?php echo $view_billing_voucher_search->BillNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->BillNumber->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillNumber" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->BillNumber->EditValue ?>"<?php echo $view_billing_voucher_search->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Reception"><?php echo $view_billing_voucher_search->Reception->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Reception->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Reception" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo EmptyValue(strval($view_billing_voucher_search->Reception->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_search->Reception->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_search->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_search->Reception->ReadOnly || $view_billing_voucher_search->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_search->Reception->Lookup->getParamTag($view_billing_voucher_search, "p_x_Reception") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_search->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $view_billing_voucher_search->Reception->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher_search->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatientId"><?php echo $view_billing_voucher_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->PatientId->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PatientId" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->PatientId->EditValue ?>"<?php echo $view_billing_voucher_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_mrnno"><?php echo $view_billing_voucher_search->mrnno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->mrnno->cellAttributes() ?>>
			<span id="el_view_billing_voucher_mrnno" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->mrnno->EditValue ?>"<?php echo $view_billing_voucher_search->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatientName"><?php echo $view_billing_voucher_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->PatientName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PatientName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->PatientName->EditValue ?>"<?php echo $view_billing_voucher_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Age"><?php echo $view_billing_voucher_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Age->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Age" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Age->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Age->EditValue ?>"<?php echo $view_billing_voucher_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Gender"><?php echo $view_billing_voucher_search->Gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Gender->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Gender" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Gender->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Gender->EditValue ?>"<?php echo $view_billing_voucher_search->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_profilePic"><?php echo $view_billing_voucher_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->profilePic->cellAttributes() ?>>
			<span id="el_view_billing_voucher_profilePic" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->profilePic->EditValue ?>"<?php echo $view_billing_voucher_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Mobile"><?php echo $view_billing_voucher_search->Mobile->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Mobile->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Mobile" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Mobile->EditValue ?>"<?php echo $view_billing_voucher_search->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_IP_OP"><?php echo $view_billing_voucher_search->IP_OP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->IP_OP->cellAttributes() ?>>
			<span id="el_view_billing_voucher_IP_OP" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->IP_OP->EditValue ?>"<?php echo $view_billing_voucher_search->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Doctor"><?php echo $view_billing_voucher_search->Doctor->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Doctor->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Doctor" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Doctor->EditValue ?>"<?php echo $view_billing_voucher_search->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_type"><?php echo $view_billing_voucher_search->voucher_type->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->voucher_type->cellAttributes() ?>>
			<span id="el_view_billing_voucher_voucher_type" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->voucher_type->EditValue ?>"<?php echo $view_billing_voucher_search->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Details"><?php echo $view_billing_voucher_search->Details->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Details" id="z_Details" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Details->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Details" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Details->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Details->EditValue ?>"<?php echo $view_billing_voucher_search->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ModeofPayment"><?php echo $view_billing_voucher_search->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ModeofPayment" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher_search->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $view_billing_voucher_search->ModeofPayment->editAttributes() ?>>
			<?php echo $view_billing_voucher_search->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $view_billing_voucher_search->ModeofPayment->Lookup->getParamTag($view_billing_voucher_search, "p_x_ModeofPayment") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Amount"><?php echo $view_billing_voucher_search->Amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Amount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Amount" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Amount->EditValue ?>"<?php echo $view_billing_voucher_search->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_AnyDues"><?php echo $view_billing_voucher_search->AnyDues->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->AnyDues->cellAttributes() ?>>
			<span id="el_view_billing_voucher_AnyDues" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->AnyDues->EditValue ?>"<?php echo $view_billing_voucher_search->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createdby"><?php echo $view_billing_voucher_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->createdby->cellAttributes() ?>>
			<span id="el_view_billing_voucher_createdby" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->createdby->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->createdby->EditValue ?>"<?php echo $view_billing_voucher_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_modifiedby"><?php echo $view_billing_voucher_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->modifiedby->cellAttributes() ?>>
			<span id="el_view_billing_voucher_modifiedby" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->modifiedby->EditValue ?>"<?php echo $view_billing_voucher_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_modifieddatetime"><?php echo $view_billing_voucher_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_billing_voucher_modifieddatetime" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->modifieddatetime->EditValue ?>"<?php echo $view_billing_voucher_search->modifieddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher_search->modifieddatetime->ReadOnly && !$view_billing_voucher_search->modifieddatetime->Disabled && !isset($view_billing_voucher_search->modifieddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_vouchersearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationAmount"><?php echo $view_billing_voucher_search->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationAmount" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->RealizationAmount->EditValue ?>"<?php echo $view_billing_voucher_search->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationStatus"><?php echo $view_billing_voucher_search->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationStatus" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->RealizationStatus->EditValue ?>"<?php echo $view_billing_voucher_search->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationRemarks"><?php echo $view_billing_voucher_search->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationRemarks" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->RealizationRemarks->EditValue ?>"<?php echo $view_billing_voucher_search->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationBatchNo"><?php echo $view_billing_voucher_search->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationBatchNo" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->RealizationBatchNo->EditValue ?>"<?php echo $view_billing_voucher_search->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationDate"><?php echo $view_billing_voucher_search->RealizationDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RealizationDate->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationDate" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->RealizationDate->EditValue ?>"<?php echo $view_billing_voucher_search->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_HospID"><?php echo $view_billing_voucher_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->HospID->cellAttributes() ?>>
			<span id="el_view_billing_voucher_HospID" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->HospID->EditValue ?>"<?php echo $view_billing_voucher_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RIDNO"><?php echo $view_billing_voucher_search->RIDNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNO" id="z_RIDNO" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RIDNO->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RIDNO" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo EmptyValue(strval($view_billing_voucher_search->RIDNO->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_search->RIDNO->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_search->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_search->RIDNO->ReadOnly || $view_billing_voucher_search->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_search->RIDNO->Lookup->getParamTag($view_billing_voucher_search, "p_x_RIDNO") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_search->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $view_billing_voucher_search->RIDNO->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher_search->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_TidNo"><?php echo $view_billing_voucher_search->TidNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->TidNo->cellAttributes() ?>>
			<span id="el_view_billing_voucher_TidNo" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->TidNo->EditValue ?>"<?php echo $view_billing_voucher_search->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CId"><?php echo $view_billing_voucher_search->CId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CId" id="z_CId" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CId->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CId" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo EmptyValue(strval($view_billing_voucher_search->CId->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_search->CId->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_search->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_search->CId->ReadOnly || $view_billing_voucher_search->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_search->CId->Lookup->getParamTag($view_billing_voucher_search, "p_x_CId") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_search->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $view_billing_voucher_search->CId->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher_search->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PartnerName"><?php echo $view_billing_voucher_search->PartnerName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->PartnerName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PartnerName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->PartnerName->EditValue ?>"<?php echo $view_billing_voucher_search->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PayerType"><?php echo $view_billing_voucher_search->PayerType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->PayerType->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PayerType" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->PayerType->EditValue ?>"<?php echo $view_billing_voucher_search->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Dob"><?php echo $view_billing_voucher_search->Dob->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dob" id="z_Dob" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Dob->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Dob" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Dob->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Dob->EditValue ?>"<?php echo $view_billing_voucher_search->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Currency"><?php echo $view_billing_voucher_search->Currency->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Currency" id="z_Currency" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Currency->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Currency" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Currency->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Currency->EditValue ?>"<?php echo $view_billing_voucher_search->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DiscountRemarks"><?php echo $view_billing_voucher_search->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DiscountRemarks" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->DiscountRemarks->EditValue ?>"<?php echo $view_billing_voucher_search->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Remarks"><?php echo $view_billing_voucher_search->Remarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->Remarks->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Remarks" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->Remarks->EditValue ?>"<?php echo $view_billing_voucher_search->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatId"><?php echo $view_billing_voucher_search->PatId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PatId" id="z_PatId" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->PatId->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PatId" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo EmptyValue(strval($view_billing_voucher_search->PatId->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_search->PatId->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_search->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_search->PatId->ReadOnly || $view_billing_voucher_search->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_search->PatId->Lookup->getParamTag($view_billing_voucher_search, "p_x_PatId") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_search->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $view_billing_voucher_search->PatId->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher_search->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DrDepartment"><?php echo $view_billing_voucher_search->DrDepartment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->DrDepartment->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DrDepartment" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->DrDepartment->EditValue ?>"<?php echo $view_billing_voucher_search->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RefferedBy"><?php echo $view_billing_voucher_search->RefferedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->RefferedBy->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RefferedBy" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo EmptyValue(strval($view_billing_voucher_search->RefferedBy->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_search->RefferedBy->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_search->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_search->RefferedBy->ReadOnly || $view_billing_voucher_search->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_search->RefferedBy->Lookup->getParamTag($view_billing_voucher_search, "p_x_RefferedBy") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_search->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $view_billing_voucher_search->RefferedBy->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher_search->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CardNumber"><?php echo $view_billing_voucher_search->CardNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CardNumber->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CardNumber" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->CardNumber->EditValue ?>"<?php echo $view_billing_voucher_search->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BankName"><?php echo $view_billing_voucher_search->BankName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BankName" id="z_BankName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->BankName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BankName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->BankName->EditValue ?>"<?php echo $view_billing_voucher_search->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DrID"><?php echo $view_billing_voucher_search->DrID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->DrID->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DrID" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($view_billing_voucher_search->DrID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_billing_voucher_search->DrID->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher_search->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_billing_voucher_search->DrID->ReadOnly || $view_billing_voucher_search->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher_search->DrID->Lookup->getParamTag($view_billing_voucher_search, "p_x_DrID") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher_search->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $view_billing_voucher_search->DrID->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher_search->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillStatus"><?php echo $view_billing_voucher_search->BillStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillStatus" id="z_BillStatus" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->BillStatus->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillStatus" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->BillStatus->EditValue ?>"<?php echo $view_billing_voucher_search->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ReportHeader"><?php echo $view_billing_voucher_search->ReportHeader->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->ReportHeader->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ReportHeader" class="ew-search-field">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $view_billing_voucher_search->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_billing_voucher_search->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_search->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->UserName->Visible) { // UserName ?>
	<div id="r_UserName" class="form-group row">
		<label for="x_UserName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_UserName"><?php echo $view_billing_voucher_search->UserName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UserName" id="z_UserName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->UserName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_UserName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_UserName" name="x_UserName" id="x_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->UserName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->UserName->EditValue ?>"<?php echo $view_billing_voucher_search->UserName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_AdjustmentAdvance"><?php echo $view_billing_voucher_search->AdjustmentAdvance->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AdjustmentAdvance" id="z_AdjustmentAdvance" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->AdjustmentAdvance->cellAttributes() ?>>
			<span id="el_view_billing_voucher_AdjustmentAdvance" class="ew-search-field">
<div id="tp_x_AdjustmentAdvance" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_AdjustmentAdvance" data-value-separator="<?php echo $view_billing_voucher_search->AdjustmentAdvance->displayValueSeparatorAttribute() ?>" name="x_AdjustmentAdvance[]" id="x_AdjustmentAdvance[]" value="{value}"<?php echo $view_billing_voucher_search->AdjustmentAdvance->editAttributes() ?>></div>
<div id="dsl_x_AdjustmentAdvance" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_search->AdjustmentAdvance->checkBoxListHtml(FALSE, "x_AdjustmentAdvance[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label for="x_billing_vouchercol" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_billing_vouchercol"><?php echo $view_billing_voucher_search->billing_vouchercol->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_billing_vouchercol" id="z_billing_vouchercol" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->billing_vouchercol->cellAttributes() ?>>
			<span id="el_view_billing_voucher_billing_vouchercol" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->billing_vouchercol->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->billing_vouchercol->EditValue ?>"<?php echo $view_billing_voucher_search->billing_vouchercol->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label for="x_BillType" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillType"><?php echo $view_billing_voucher_search->BillType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillType" id="z_BillType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->BillType->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillType" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->BillType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->BillType->EditValue ?>"<?php echo $view_billing_voucher_search->BillType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label for="x_ProcedureName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ProcedureName"><?php echo $view_billing_voucher_search->ProcedureName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProcedureName" id="z_ProcedureName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->ProcedureName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ProcedureName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->ProcedureName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->ProcedureName->EditValue ?>"<?php echo $view_billing_voucher_search->ProcedureName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label for="x_ProcedureAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ProcedureAmount"><?php echo $view_billing_voucher_search->ProcedureAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ProcedureAmount" id="z_ProcedureAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->ProcedureAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ProcedureAmount" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->ProcedureAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->ProcedureAmount->EditValue ?>"<?php echo $view_billing_voucher_search->ProcedureAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_IncludePackage"><?php echo $view_billing_voucher_search->IncludePackage->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IncludePackage" id="z_IncludePackage" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->IncludePackage->cellAttributes() ?>>
			<span id="el_view_billing_voucher_IncludePackage" class="ew-search-field">
<div id="tp_x_IncludePackage" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_IncludePackage" data-value-separator="<?php echo $view_billing_voucher_search->IncludePackage->displayValueSeparatorAttribute() ?>" name="x_IncludePackage[]" id="x_IncludePackage[]" value="{value}"<?php echo $view_billing_voucher_search->IncludePackage->editAttributes() ?>></div>
<div id="dsl_x_IncludePackage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_search->IncludePackage->checkBoxListHtml(FALSE, "x_IncludePackage[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label for="x_CancelBill" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelBill"><?php echo $view_billing_voucher_search->CancelBill->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelBill" id="z_CancelBill" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CancelBill->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelBill" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher_search->CancelBill->displayValueSeparatorAttribute() ?>" id="x_CancelBill" name="x_CancelBill"<?php echo $view_billing_voucher_search->CancelBill->editAttributes() ?>>
			<?php echo $view_billing_voucher_search->CancelBill->selectOptionListHtml("x_CancelBill") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label for="x_CancelReason" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelReason"><?php echo $view_billing_voucher_search->CancelReason->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelReason" id="z_CancelReason" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CancelReason->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelReason" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->CancelReason->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->CancelReason->EditValue ?>"<?php echo $view_billing_voucher_search->CancelReason->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label for="x_CancelModeOfPayment" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelModeOfPayment"><?php echo $view_billing_voucher_search->CancelModeOfPayment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelModeOfPayment" id="z_CancelModeOfPayment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CancelModeOfPayment->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelModeOfPayment" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher_search->CancelModeOfPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label for="x_CancelAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelAmount"><?php echo $view_billing_voucher_search->CancelAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelAmount" id="z_CancelAmount" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CancelAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelAmount" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher_search->CancelAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label for="x_CancelBankName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelBankName"><?php echo $view_billing_voucher_search->CancelBankName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelBankName" id="z_CancelBankName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CancelBankName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelBankName" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher_search->CancelBankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label for="x_CancelTransactionNumber" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelTransactionNumber"><?php echo $view_billing_voucher_search->CancelTransactionNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelTransactionNumber" id="z_CancelTransactionNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->CancelTransactionNumber->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelTransactionNumber" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher_search->CancelTransactionNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label for="x_LabTest" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_LabTest"><?php echo $view_billing_voucher_search->LabTest->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabTest" id="z_LabTest" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->LabTest->cellAttributes() ?>>
			<span id="el_view_billing_voucher_LabTest" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->LabTest->EditValue ?>"<?php echo $view_billing_voucher_search->LabTest->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label for="x_sid" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_sid"><?php echo $view_billing_voucher_search->sid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_sid" id="z_sid" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->sid->cellAttributes() ?>>
			<span id="el_view_billing_voucher_sid" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->sid->EditValue ?>"<?php echo $view_billing_voucher_search->sid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label for="x_SidNo" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_SidNo"><?php echo $view_billing_voucher_search->SidNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->SidNo->cellAttributes() ?>>
			<span id="el_view_billing_voucher_SidNo" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->SidNo->EditValue ?>"<?php echo $view_billing_voucher_search->SidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->createdDatettime->Visible) { // createdDatettime ?>
	<div id="r_createdDatettime" class="form-group row">
		<label for="x_createdDatettime" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createdDatettime"><?php echo $view_billing_voucher_search->createdDatettime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdDatettime" id="z_createdDatettime" value="=">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->createdDatettime->cellAttributes() ?>>
			<span id="el_view_billing_voucher_createdDatettime" class="ew-search-field">
<input type="text" data-table="view_billing_voucher" data-field="x_createdDatettime" name="x_createdDatettime" id="x_createdDatettime" placeholder="<?php echo HtmlEncode($view_billing_voucher_search->createdDatettime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher_search->createdDatettime->EditValue ?>"<?php echo $view_billing_voucher_search->createdDatettime->editAttributes() ?>>
<?php if (!$view_billing_voucher_search->createdDatettime->ReadOnly && !$view_billing_voucher_search->createdDatettime->Disabled && !isset($view_billing_voucher_search->createdDatettime->EditAttrs["readonly"]) && !isset($view_billing_voucher_search->createdDatettime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_billing_vouchersearch", "x_createdDatettime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillClosing"><?php echo $view_billing_voucher_search->BillClosing->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->BillClosing->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillClosing" class="ew-search-field">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_BillClosing" data-value-separator="<?php echo $view_billing_voucher_search->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_billing_voucher_search->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_search->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher_search->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<div id="r_GoogleReviewID" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_GoogleReviewID"><?php echo $view_billing_voucher_search->GoogleReviewID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GoogleReviewID" id="z_GoogleReviewID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div <?php echo $view_billing_voucher_search->GoogleReviewID->cellAttributes() ?>>
			<span id="el_view_billing_voucher_GoogleReviewID" class="ew-search-field">
<div id="tp_x_GoogleReviewID" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher_search->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x_GoogleReviewID[]" id="x_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher_search->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher_search->GoogleReviewID->checkBoxListHtml(FALSE, "x_GoogleReviewID[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_billing_voucher_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_billing_voucher_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_billing_voucher_search->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_billing_voucher_search->terminate();
?>