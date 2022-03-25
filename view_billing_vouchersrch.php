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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_billing_voucher_search->IsModal) { ?>
var fview_billing_vouchersearch = currentAdvancedSearchForm = new ew.Form("fview_billing_vouchersearch", "search");
<?php } else { ?>
var fview_billing_vouchersearch = currentForm = new ew.Form("fview_billing_vouchersearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_billing_vouchersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_vouchersearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_vouchersearch.lists["x_Reception"] = <?php echo $view_billing_voucher_search->Reception->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_Reception"].options = <?php echo JsonEncode($view_billing_voucher_search->Reception->lookupOptions()) ?>;
fview_billing_vouchersearch.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_search->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_search->ModeofPayment->lookupOptions()) ?>;
fview_billing_vouchersearch.lists["x_CId"] = <?php echo $view_billing_voucher_search->CId->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_CId"].options = <?php echo JsonEncode($view_billing_voucher_search->CId->lookupOptions()) ?>;
fview_billing_vouchersearch.lists["x_PatId"] = <?php echo $view_billing_voucher_search->PatId->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_PatId"].options = <?php echo JsonEncode($view_billing_voucher_search->PatId->lookupOptions()) ?>;
fview_billing_vouchersearch.lists["x_RefferedBy"] = <?php echo $view_billing_voucher_search->RefferedBy->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_RefferedBy"].options = <?php echo JsonEncode($view_billing_voucher_search->RefferedBy->lookupOptions()) ?>;
fview_billing_vouchersearch.lists["x_DrID"] = <?php echo $view_billing_voucher_search->DrID->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_DrID"].options = <?php echo JsonEncode($view_billing_voucher_search->DrID->lookupOptions()) ?>;
fview_billing_vouchersearch.lists["x_ReportHeader[]"] = <?php echo $view_billing_voucher_search->ReportHeader->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_billing_voucher_search->ReportHeader->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_AdjustmentAdvance[]"] = <?php echo $view_billing_voucher_search->AdjustmentAdvance->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_AdjustmentAdvance[]"].options = <?php echo JsonEncode($view_billing_voucher_search->AdjustmentAdvance->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_BillType"] = <?php echo $view_billing_voucher_search->BillType->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_BillType"].options = <?php echo JsonEncode($view_billing_voucher_search->BillType->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_IncludePackage[]"] = <?php echo $view_billing_voucher_search->IncludePackage->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_IncludePackage[]"].options = <?php echo JsonEncode($view_billing_voucher_search->IncludePackage->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_CancelBill"] = <?php echo $view_billing_voucher_search->CancelBill->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_search->CancelBill->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_BillClosing[]"] = <?php echo $view_billing_voucher_search->BillClosing->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_billing_voucher_search->BillClosing->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_GoogleReviewID[]"] = <?php echo $view_billing_voucher_search->GoogleReviewID->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_GoogleReviewID[]"].options = <?php echo JsonEncode($view_billing_voucher_search->GoogleReviewID->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_CardType"] = <?php echo $view_billing_voucher_search->CardType->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_CardType"].options = <?php echo JsonEncode($view_billing_voucher_search->CardType->options(FALSE, TRUE)) ?>;
fview_billing_vouchersearch.lists["x_PharmacyBill[]"] = <?php echo $view_billing_voucher_search->PharmacyBill->Lookup->toClientList() ?>;
fview_billing_vouchersearch.lists["x_PharmacyBill[]"].options = <?php echo JsonEncode($view_billing_voucher_search->PharmacyBill->options(FALSE, TRUE)) ?>;

// Form object for search
// Validate function for search

fview_billing_vouchersearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->Amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DiscountAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->DiscountAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RealizationAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->RealizationAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillStatus");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->BillStatus->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ProcedureAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->ProcedureAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_sid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->sid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdDatettime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->createdDatettime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_cash");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->cash->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Card");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_billing_voucher->Card->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_billing_voucher_search->showPageHeader(); ?>
<?php
$view_billing_voucher_search->showMessage();
?>
<form name="fview_billing_vouchersearch" id="fview_billing_vouchersearch" class="<?php echo $view_billing_voucher_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_billing_voucher->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_id"><?php echo $view_billing_voucher->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->id->cellAttributes() ?>>
			<span id="el_view_billing_voucher_id">
<input type="text" data-table="view_billing_voucher" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_billing_voucher->id->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->id->EditValue ?>"<?php echo $view_billing_voucher->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createddatetime"><?php echo $view_billing_voucher->createddatetime->caption() ?></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->createddatetime->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_billing_voucher->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_billing_voucher_createddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_vouchersearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_createddatetime d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_billing_voucher_createddatetime" class="btw1_createddatetime d-none">
<input type="text" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createddatetime->EditValue2 ?>"<?php echo $view_billing_voucher->createddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createddatetime->ReadOnly && !$view_billing_voucher->createddatetime->Disabled && !isset($view_billing_voucher->createddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_vouchersearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillNumber"><?php echo $view_billing_voucher->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillNumber->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillNumber->EditValue ?>"<?php echo $view_billing_voucher->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Reception"><?php echo $view_billing_voucher->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Reception->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($view_billing_voucher->Reception->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->Reception->AdvancedSearch->ViewValue) : $view_billing_voucher->Reception->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->Reception->ReadOnly || $view_billing_voucher->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $view_billing_voucher->Reception->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatientId"><?php echo $view_billing_voucher->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PatientId->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PatientId">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientId->EditValue ?>"<?php echo $view_billing_voucher->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_mrnno"><?php echo $view_billing_voucher->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->mrnno->cellAttributes() ?>>
			<span id="el_view_billing_voucher_mrnno">
<input type="text" data-table="view_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->mrnno->EditValue ?>"<?php echo $view_billing_voucher->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatientName"><?php echo $view_billing_voucher->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PatientName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PatientName">
<input type="text" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PatientName->EditValue ?>"<?php echo $view_billing_voucher->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Age"><?php echo $view_billing_voucher->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Age->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Age">
<input type="text" data-table="view_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Age->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Age->EditValue ?>"<?php echo $view_billing_voucher->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Gender"><?php echo $view_billing_voucher->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Gender->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Gender">
<input type="text" data-table="view_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Gender->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Gender->EditValue ?>"<?php echo $view_billing_voucher->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_profilePic"><?php echo $view_billing_voucher->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->profilePic->cellAttributes() ?>>
			<span id="el_view_billing_voucher_profilePic">
<input type="text" data-table="view_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_billing_voucher->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->profilePic->EditValue ?>"<?php echo $view_billing_voucher->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Mobile"><?php echo $view_billing_voucher->Mobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Mobile->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Mobile">
<input type="text" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Mobile->EditValue ?>"<?php echo $view_billing_voucher->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_IP_OP"><?php echo $view_billing_voucher->IP_OP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->IP_OP->cellAttributes() ?>>
			<span id="el_view_billing_voucher_IP_OP">
<input type="text" data-table="view_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->IP_OP->EditValue ?>"<?php echo $view_billing_voucher->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Doctor"><?php echo $view_billing_voucher->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Doctor->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Doctor">
<input type="text" data-table="view_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Doctor->EditValue ?>"<?php echo $view_billing_voucher->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_type"><?php echo $view_billing_voucher->voucher_type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->voucher_type->cellAttributes() ?>>
			<span id="el_view_billing_voucher_voucher_type">
<input type="text" data-table="view_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->voucher_type->EditValue ?>"<?php echo $view_billing_voucher->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Details"><?php echo $view_billing_voucher->Details->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Details" id="z_Details" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Details->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Details">
<input type="text" data-table="view_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Details->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Details->EditValue ?>"<?php echo $view_billing_voucher->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ModeofPayment"><?php echo $view_billing_voucher->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_ModeofPayment" data-value-separator="<?php echo $view_billing_voucher->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $view_billing_voucher->ModeofPayment->editAttributes() ?>>
		<?php echo $view_billing_voucher->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $view_billing_voucher->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Amount"><?php echo $view_billing_voucher->Amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amount" id="z_Amount" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Amount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Amount">
<input type="text" data-table="view_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Amount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Amount->EditValue ?>"<?php echo $view_billing_voucher->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_AnyDues"><?php echo $view_billing_voucher->AnyDues->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->AnyDues->cellAttributes() ?>>
			<span id="el_view_billing_voucher_AnyDues">
<input type="text" data-table="view_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->AnyDues->EditValue ?>"<?php echo $view_billing_voucher->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<div id="r_DiscountAmount" class="form-group row">
		<label for="x_DiscountAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DiscountAmount"><?php echo $view_billing_voucher->DiscountAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DiscountAmount" id="z_DiscountAmount" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DiscountAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DiscountAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountAmount->EditValue ?>"<?php echo $view_billing_voucher->DiscountAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createdby"><?php echo $view_billing_voucher->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->createdby->cellAttributes() ?>>
			<span id="el_view_billing_voucher_createdby">
<input type="text" data-table="view_billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->createdby->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createdby->EditValue ?>"<?php echo $view_billing_voucher->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_modifiedby"><?php echo $view_billing_voucher->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->modifiedby->cellAttributes() ?>>
			<span id="el_view_billing_voucher_modifiedby">
<input type="text" data-table="view_billing_voucher" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->modifiedby->EditValue ?>"<?php echo $view_billing_voucher->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_modifieddatetime"><?php echo $view_billing_voucher->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_billing_voucher_modifieddatetime">
<input type="text" data-table="view_billing_voucher" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_billing_voucher->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->modifieddatetime->EditValue ?>"<?php echo $view_billing_voucher->modifieddatetime->editAttributes() ?>>
<?php if (!$view_billing_voucher->modifieddatetime->ReadOnly && !$view_billing_voucher->modifieddatetime->Disabled && !isset($view_billing_voucher->modifieddatetime->EditAttrs["readonly"]) && !isset($view_billing_voucher->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_vouchersearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationAmount"><?php echo $view_billing_voucher->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationAmount->EditValue ?>"<?php echo $view_billing_voucher->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationStatus"><?php echo $view_billing_voucher->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationStatus">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationStatus->EditValue ?>"<?php echo $view_billing_voucher->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationRemarks"><?php echo $view_billing_voucher->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationRemarks">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationRemarks->EditValue ?>"<?php echo $view_billing_voucher->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationBatchNo"><?php echo $view_billing_voucher->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationBatchNo">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationBatchNo->EditValue ?>"<?php echo $view_billing_voucher->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationDate"><?php echo $view_billing_voucher->RealizationDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RealizationDate->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RealizationDate">
<input type="text" data-table="view_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RealizationDate->EditValue ?>"<?php echo $view_billing_voucher->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_HospID"><?php echo $view_billing_voucher->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->HospID->cellAttributes() ?>>
			<span id="el_view_billing_voucher_HospID">
<input type="text" data-table="view_billing_voucher" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->HospID->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->HospID->EditValue ?>"<?php echo $view_billing_voucher->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RIDNO"><?php echo $view_billing_voucher->RIDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RIDNO->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RIDNO">
<input type="text" data-table="view_billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->RIDNO->EditValue ?>"<?php echo $view_billing_voucher->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_TidNo"><?php echo $view_billing_voucher->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->TidNo->cellAttributes() ?>>
			<span id="el_view_billing_voucher_TidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->TidNo->EditValue ?>"<?php echo $view_billing_voucher->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CId"><?php echo $view_billing_voucher->CId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CId" id="z_CId" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CId->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CId">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo strval($view_billing_voucher->CId->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->CId->AdvancedSearch->ViewValue) : $view_billing_voucher->CId->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->CId->ReadOnly || $view_billing_voucher->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->CId->Lookup->getParamTag("p_x_CId") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $view_billing_voucher->CId->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PartnerName"><?php echo $view_billing_voucher->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PartnerName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PartnerName">
<input type="text" data-table="view_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PartnerName->EditValue ?>"<?php echo $view_billing_voucher->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PayerType"><?php echo $view_billing_voucher->PayerType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PayerType->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PayerType">
<input type="text" data-table="view_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->PayerType->EditValue ?>"<?php echo $view_billing_voucher->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Dob"><?php echo $view_billing_voucher->Dob->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dob" id="z_Dob" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Dob->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Dob">
<input type="text" data-table="view_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Dob->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Dob->EditValue ?>"<?php echo $view_billing_voucher->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Currency"><?php echo $view_billing_voucher->Currency->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Currency" id="z_Currency" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Currency->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Currency">
<input type="text" data-table="view_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Currency->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Currency->EditValue ?>"<?php echo $view_billing_voucher->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DiscountRemarks"><?php echo $view_billing_voucher->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DiscountRemarks">
<input type="text" data-table="view_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DiscountRemarks->EditValue ?>"<?php echo $view_billing_voucher->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Remarks"><?php echo $view_billing_voucher->Remarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Remarks->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Remarks">
<input type="text" data-table="view_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Remarks->EditValue ?>"<?php echo $view_billing_voucher->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatId"><?php echo $view_billing_voucher->PatId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatId" id="z_PatId" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PatId->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PatId">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo strval($view_billing_voucher->PatId->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->PatId->AdvancedSearch->ViewValue) : $view_billing_voucher->PatId->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->PatId->ReadOnly || $view_billing_voucher->PatId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->PatId->Lookup->getParamTag("p_x_PatId") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $view_billing_voucher->PatId->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DrDepartment"><?php echo $view_billing_voucher->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DrDepartment->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DrDepartment">
<input type="text" data-table="view_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->DrDepartment->EditValue ?>"<?php echo $view_billing_voucher->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RefferedBy"><?php echo $view_billing_voucher->RefferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->RefferedBy->cellAttributes() ?>>
			<span id="el_view_billing_voucher_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo strval($view_billing_voucher->RefferedBy->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->RefferedBy->AdvancedSearch->ViewValue) : $view_billing_voucher->RefferedBy->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->RefferedBy->ReadOnly || $view_billing_voucher->RefferedBy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->RefferedBy->Lookup->getParamTag("p_x_RefferedBy") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $view_billing_voucher->RefferedBy->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CardNumber"><?php echo $view_billing_voucher->CardNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CardNumber->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CardNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CardNumber->EditValue ?>"<?php echo $view_billing_voucher->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BankName"><?php echo $view_billing_voucher->BankName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BankName" id="z_BankName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BankName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BankName">
<input type="text" data-table="view_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->BankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BankName->EditValue ?>"<?php echo $view_billing_voucher->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DrID"><?php echo $view_billing_voucher->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->DrID->cellAttributes() ?>>
			<span id="el_view_billing_voucher_DrID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($view_billing_voucher->DrID->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_billing_voucher->DrID->AdvancedSearch->ViewValue) : $view_billing_voucher->DrID->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_billing_voucher->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_billing_voucher->DrID->ReadOnly || $view_billing_voucher->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_billing_voucher->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="view_billing_voucher" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_billing_voucher->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $view_billing_voucher->DrID->AdvancedSearch->SearchValue ?>"<?php echo $view_billing_voucher->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillStatus"><?php echo $view_billing_voucher->BillStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillStatus" id="z_BillStatus" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillStatus->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillStatus">
<input type="text" data-table="view_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->BillStatus->EditValue ?>"<?php echo $view_billing_voucher->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ReportHeader"><?php echo $view_billing_voucher->ReportHeader->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ReportHeader->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_ReportHeader" data-value-separator="<?php echo $view_billing_voucher->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_billing_voucher->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->UserName->Visible) { // UserName ?>
	<div id="r_UserName" class="form-group row">
		<label for="x_UserName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_UserName"><?php echo $view_billing_voucher->UserName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UserName" id="z_UserName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->UserName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_UserName">
<input type="text" data-table="view_billing_voucher" data-field="x_UserName" name="x_UserName" id="x_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->UserName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->UserName->EditValue ?>"<?php echo $view_billing_voucher->UserName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<div id="r_AdjustmentAdvance" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_AdjustmentAdvance"><?php echo $view_billing_voucher->AdjustmentAdvance->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AdjustmentAdvance" id="z_AdjustmentAdvance" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
			<span id="el_view_billing_voucher_AdjustmentAdvance">
<div id="tp_x_AdjustmentAdvance" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_AdjustmentAdvance" data-value-separator="<?php echo $view_billing_voucher->AdjustmentAdvance->displayValueSeparatorAttribute() ?>" name="x_AdjustmentAdvance[]" id="x_AdjustmentAdvance[]" value="{value}"<?php echo $view_billing_voucher->AdjustmentAdvance->editAttributes() ?>></div>
<div id="dsl_x_AdjustmentAdvance" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->AdjustmentAdvance->checkBoxListHtml(FALSE, "x_AdjustmentAdvance[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<div id="r_billing_vouchercol" class="form-group row">
		<label for="x_billing_vouchercol" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_billing_vouchercol"><?php echo $view_billing_voucher->billing_vouchercol->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_billing_vouchercol" id="z_billing_vouchercol" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->billing_vouchercol->cellAttributes() ?>>
			<span id="el_view_billing_voucher_billing_vouchercol">
<input type="text" data-table="view_billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->billing_vouchercol->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->billing_vouchercol->EditValue ?>"<?php echo $view_billing_voucher->billing_vouchercol->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillType"><?php echo $view_billing_voucher->BillType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillType" id="z_BillType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillType->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillType">
<div id="tp_x_BillType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillType" data-value-separator="<?php echo $view_billing_voucher->BillType->displayValueSeparatorAttribute() ?>" name="x_BillType" id="x_BillType" value="{value}"<?php echo $view_billing_voucher->BillType->editAttributes() ?>></div>
<div id="dsl_x_BillType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillType->radioButtonListHtml(FALSE, "x_BillType") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
	<div id="r_ProcedureName" class="form-group row">
		<label for="x_ProcedureName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ProcedureName"><?php echo $view_billing_voucher->ProcedureName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProcedureName" id="z_ProcedureName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ProcedureName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ProcedureName">
<input type="text" data-table="view_billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->ProcedureName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->ProcedureName->EditValue ?>"<?php echo $view_billing_voucher->ProcedureName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<div id="r_ProcedureAmount" class="form-group row">
		<label for="x_ProcedureAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ProcedureAmount"><?php echo $view_billing_voucher->ProcedureAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ProcedureAmount" id="z_ProcedureAmount" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->ProcedureAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_ProcedureAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->ProcedureAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->ProcedureAmount->EditValue ?>"<?php echo $view_billing_voucher->ProcedureAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
	<div id="r_IncludePackage" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_IncludePackage"><?php echo $view_billing_voucher->IncludePackage->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IncludePackage" id="z_IncludePackage" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->IncludePackage->cellAttributes() ?>>
			<span id="el_view_billing_voucher_IncludePackage">
<div id="tp_x_IncludePackage" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_IncludePackage" data-value-separator="<?php echo $view_billing_voucher->IncludePackage->displayValueSeparatorAttribute() ?>" name="x_IncludePackage[]" id="x_IncludePackage[]" value="{value}"<?php echo $view_billing_voucher->IncludePackage->editAttributes() ?>></div>
<div id="dsl_x_IncludePackage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->IncludePackage->checkBoxListHtml(FALSE, "x_IncludePackage[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
	<div id="r_CancelBill" class="form-group row">
		<label for="x_CancelBill" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelBill"><?php echo $view_billing_voucher->CancelBill->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CancelBill" id="z_CancelBill" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelBill->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelBill">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_billing_voucher" data-field="x_CancelBill" data-value-separator="<?php echo $view_billing_voucher->CancelBill->displayValueSeparatorAttribute() ?>" id="x_CancelBill" name="x_CancelBill"<?php echo $view_billing_voucher->CancelBill->editAttributes() ?>>
		<?php echo $view_billing_voucher->CancelBill->selectOptionListHtml("x_CancelBill") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelReason->Visible) { // CancelReason ?>
	<div id="r_CancelReason" class="form-group row">
		<label for="x_CancelReason" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelReason"><?php echo $view_billing_voucher->CancelReason->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CancelReason" id="z_CancelReason" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelReason->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelReason">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelReason->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelReason->EditValue ?>"<?php echo $view_billing_voucher->CancelReason->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<div id="r_CancelModeOfPayment" class="form-group row">
		<label for="x_CancelModeOfPayment" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelModeOfPayment"><?php echo $view_billing_voucher->CancelModeOfPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CancelModeOfPayment" id="z_CancelModeOfPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelModeOfPayment">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelModeOfPayment->EditValue ?>"<?php echo $view_billing_voucher->CancelModeOfPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
	<div id="r_CancelAmount" class="form-group row">
		<label for="x_CancelAmount" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelAmount"><?php echo $view_billing_voucher->CancelAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CancelAmount" id="z_CancelAmount" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelAmount->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelAmount">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelAmount->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelAmount->EditValue ?>"<?php echo $view_billing_voucher->CancelAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
	<div id="r_CancelBankName" class="form-group row">
		<label for="x_CancelBankName" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelBankName"><?php echo $view_billing_voucher->CancelBankName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CancelBankName" id="z_CancelBankName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelBankName->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelBankName">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelBankName->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelBankName->EditValue ?>"<?php echo $view_billing_voucher->CancelBankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<div id="r_CancelTransactionNumber" class="form-group row">
		<label for="x_CancelTransactionNumber" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelTransactionNumber"><?php echo $view_billing_voucher->CancelTransactionNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CancelTransactionNumber" id="z_CancelTransactionNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CancelTransactionNumber">
<input type="text" data-table="view_billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->CancelTransactionNumber->EditValue ?>"<?php echo $view_billing_voucher->CancelTransactionNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
	<div id="r_LabTest" class="form-group row">
		<label for="x_LabTest" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_LabTest"><?php echo $view_billing_voucher->LabTest->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTest" id="z_LabTest" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->LabTest->cellAttributes() ?>>
			<span id="el_view_billing_voucher_LabTest">
<input type="text" data-table="view_billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->LabTest->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->LabTest->EditValue ?>"<?php echo $view_billing_voucher->LabTest->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label for="x_sid" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_sid"><?php echo $view_billing_voucher->sid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_sid" id="z_sid" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->sid->cellAttributes() ?>>
			<span id="el_view_billing_voucher_sid">
<input type="text" data-table="view_billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->sid->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->sid->EditValue ?>"<?php echo $view_billing_voucher->sid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label for="x_SidNo" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_SidNo"><?php echo $view_billing_voucher->SidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->SidNo->cellAttributes() ?>>
			<span id="el_view_billing_voucher_SidNo">
<input type="text" data-table="view_billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_billing_voucher->SidNo->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->SidNo->EditValue ?>"<?php echo $view_billing_voucher->SidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
	<div id="r_createdDatettime" class="form-group row">
		<label for="x_createdDatettime" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createdDatettime"><?php echo $view_billing_voucher->createdDatettime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdDatettime" id="z_createdDatettime" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->createdDatettime->cellAttributes() ?>>
			<span id="el_view_billing_voucher_createdDatettime">
<input type="text" data-table="view_billing_voucher" data-field="x_createdDatettime" name="x_createdDatettime" id="x_createdDatettime" placeholder="<?php echo HtmlEncode($view_billing_voucher->createdDatettime->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->createdDatettime->EditValue ?>"<?php echo $view_billing_voucher->createdDatettime->editAttributes() ?>>
<?php if (!$view_billing_voucher->createdDatettime->ReadOnly && !$view_billing_voucher->createdDatettime->Disabled && !isset($view_billing_voucher->createdDatettime->EditAttrs["readonly"]) && !isset($view_billing_voucher->createdDatettime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_billing_vouchersearch", "x_createdDatettime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillClosing"><?php echo $view_billing_voucher->BillClosing->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->BillClosing->cellAttributes() ?>>
			<span id="el_view_billing_voucher_BillClosing">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_BillClosing" data-value-separator="<?php echo $view_billing_voucher->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_billing_voucher->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<div id="r_GoogleReviewID" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_GoogleReviewID"><?php echo $view_billing_voucher->GoogleReviewID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GoogleReviewID" id="z_GoogleReviewID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->GoogleReviewID->cellAttributes() ?>>
			<span id="el_view_billing_voucher_GoogleReviewID">
<div id="tp_x_GoogleReviewID" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" data-value-separator="<?php echo $view_billing_voucher->GoogleReviewID->displayValueSeparatorAttribute() ?>" name="x_GoogleReviewID[]" id="x_GoogleReviewID[]" value="{value}"<?php echo $view_billing_voucher->GoogleReviewID->editAttributes() ?>></div>
<div id="dsl_x_GoogleReviewID" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->GoogleReviewID->checkBoxListHtml(FALSE, "x_GoogleReviewID[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
	<div id="r_CardType" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CardType"><?php echo $view_billing_voucher->CardType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CardType" id="z_CardType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->CardType->cellAttributes() ?>>
			<span id="el_view_billing_voucher_CardType">
<div id="tp_x_CardType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_billing_voucher" data-field="x_CardType" data-value-separator="<?php echo $view_billing_voucher->CardType->displayValueSeparatorAttribute() ?>" name="x_CardType" id="x_CardType" value="{value}"<?php echo $view_billing_voucher->CardType->editAttributes() ?>></div>
<div id="dsl_x_CardType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->CardType->radioButtonListHtml(FALSE, "x_CardType") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
	<div id="r_PharmacyBill" class="form-group row">
		<label class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PharmacyBill"><?php echo $view_billing_voucher->PharmacyBill->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PharmacyBill" id="z_PharmacyBill" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->PharmacyBill->cellAttributes() ?>>
			<span id="el_view_billing_voucher_PharmacyBill">
<div id="tp_x_PharmacyBill" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" data-value-separator="<?php echo $view_billing_voucher->PharmacyBill->displayValueSeparatorAttribute() ?>" name="x_PharmacyBill[]" id="x_PharmacyBill[]" value="{value}"<?php echo $view_billing_voucher->PharmacyBill->editAttributes() ?>></div>
<div id="dsl_x_PharmacyBill" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_billing_voucher->PharmacyBill->checkBoxListHtml(FALSE, "x_PharmacyBill[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
	<div id="r_cash" class="form-group row">
		<label for="x_cash" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_cash"><?php echo $view_billing_voucher->cash->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_cash" id="z_cash" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->cash->cellAttributes() ?>>
			<span id="el_view_billing_voucher_cash">
<input type="text" data-table="view_billing_voucher" data-field="x_cash" name="x_cash" id="x_cash" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->cash->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->cash->EditValue ?>"<?php echo $view_billing_voucher->cash->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label for="x_Card" class="<?php echo $view_billing_voucher_search->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Card"><?php echo $view_billing_voucher->Card->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Card" id="z_Card" value="="></span>
		</label>
		<div class="<?php echo $view_billing_voucher_search->RightColumnClass ?>"><div<?php echo $view_billing_voucher->Card->cellAttributes() ?>>
			<span id="el_view_billing_voucher_Card">
<input type="text" data-table="view_billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?php echo HtmlEncode($view_billing_voucher->Card->getPlaceHolder()) ?>" value="<?php echo $view_billing_voucher->Card->EditValue ?>"<?php echo $view_billing_voucher->Card->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_search->terminate();
?>