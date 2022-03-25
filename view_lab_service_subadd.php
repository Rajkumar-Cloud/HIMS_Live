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
$view_lab_service_sub_add = new view_lab_service_sub_add();

// Run the page
$view_lab_service_sub_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_lab_service_subadd = currentForm = new ew.Form("fview_lab_service_subadd", "add");

// Validate form
fview_lab_service_subadd.validate = function() {
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
		<?php if ($view_lab_service_sub_add->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->CODE->caption(), $view_lab_service_sub->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->SERVICE->caption(), $view_lab_service_sub->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->UNITS->Required) { ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->UNITS->caption(), $view_lab_service_sub->UNITS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->AMOUNT->Required) { ?>
			elm = this.getElements("x" + infix + "_AMOUNT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->AMOUNT->caption(), $view_lab_service_sub->AMOUNT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->SERVICE_TYPE->caption(), $view_lab_service_sub->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->DEPARTMENT->caption(), $view_lab_service_sub->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Created->caption(), $view_lab_service_sub->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->CreatedDateTime->caption(), $view_lab_service_sub->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->mas_services_billingcol->Required) { ?>
			elm = this.getElements("x" + infix + "_mas_services_billingcol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->mas_services_billingcol->caption(), $view_lab_service_sub->mas_services_billingcol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->DrShareAmount->caption(), $view_lab_service_sub->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->DrShareAmount->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->HospShareAmount->caption(), $view_lab_service_sub->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->HospShareAmount->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->DrSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->DrSharePer->caption(), $view_lab_service_sub->DrSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->DrSharePer->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->HospSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->HospSharePer->caption(), $view_lab_service_sub->HospSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->HospSharePer->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->HospID->caption(), $view_lab_service_sub->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->TestSubCd->caption(), $view_lab_service_sub->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Method->caption(), $view_lab_service_sub->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Order->caption(), $view_lab_service_sub->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->Order->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Form->caption(), $view_lab_service_sub->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->ResType->caption(), $view_lab_service_sub->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->UnitCD->caption(), $view_lab_service_sub->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->RefValue->caption(), $view_lab_service_sub->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Sample->caption(), $view_lab_service_sub->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->NoD->caption(), $view_lab_service_sub->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->NoD->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->BillOrder->caption(), $view_lab_service_sub->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_service_sub->BillOrder->errorMessage()) ?>");
		<?php if ($view_lab_service_sub_add->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Formula->caption(), $view_lab_service_sub->Formula->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Inactive->caption(), $view_lab_service_sub->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Outsource->caption(), $view_lab_service_sub->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->CollSample->caption(), $view_lab_service_sub->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->TestType->caption(), $view_lab_service_sub->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->NoHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->NoHeading->caption(), $view_lab_service_sub->NoHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->ChemicalCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->ChemicalCode->caption(), $view_lab_service_sub->ChemicalCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->ChemicalName->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->ChemicalName->caption(), $view_lab_service_sub->ChemicalName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Utilaization->Required) { ?>
			elm = this.getElements("x" + infix + "_Utilaization");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Utilaization->caption(), $view_lab_service_sub->Utilaization->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_service_sub_add->Interpretation->Required) { ?>
			elm = this.getElements("x" + infix + "_Interpretation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_sub->Interpretation->caption(), $view_lab_service_sub->Interpretation->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_lab_service_subadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_service_subadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_service_subadd.lists["x_UNITS"] = <?php echo $view_lab_service_sub_add->UNITS->Lookup->toClientList() ?>;
fview_lab_service_subadd.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_sub_add->UNITS->lookupOptions()) ?>;
fview_lab_service_subadd.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_sub_add->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_service_subadd.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_sub_add->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_service_subadd.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_sub_add->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_service_subadd.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_sub_add->DEPARTMENT->options(FALSE, TRUE)) ?>;
fview_lab_service_subadd.lists["x_Inactive[]"] = <?php echo $view_lab_service_sub_add->Inactive->Lookup->toClientList() ?>;
fview_lab_service_subadd.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_sub_add->Inactive->options(FALSE, TRUE)) ?>;
fview_lab_service_subadd.lists["x_TestType"] = <?php echo $view_lab_service_sub_add->TestType->Lookup->toClientList() ?>;
fview_lab_service_subadd.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_sub_add->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_service_sub_add->showPageHeader(); ?>
<?php
$view_lab_service_sub_add->showMessage();
?>
<form name="fview_lab_service_subadd" id="fview_lab_service_subadd" class="<?php echo $view_lab_service_sub_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_service_sub_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_service_sub_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_sub_add->IsModal ?>">
<?php if ($view_lab_service_sub->getCurrentMasterTable() == "view_lab_service") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_service">
<input type="hidden" name="fk_CODE" value="<?php echo $view_lab_service_sub->CODE->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($view_lab_service_sub->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_view_lab_service_sub_CODE" for="x_CODE" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->CODE->caption() ?><?php echo ($view_lab_service_sub->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->CODE->cellAttributes() ?>>
<?php if ($view_lab_service_sub->CODE->getSessionValue() <> "") { ?>
<span id="el_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_service_sub->CODE->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_CODE" name="x_CODE" value="<?php echo HtmlEncode($view_lab_service_sub->CODE->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_lab_service_sub_CODE">
<input type="text" data-table="view_lab_service_sub" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CODE->EditValue ?>"<?php echo $view_lab_service_sub->CODE->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_lab_service_sub->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_view_lab_service_sub_SERVICE" for="x_SERVICE" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->SERVICE->caption() ?><?php echo ($view_lab_service_sub->SERVICE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub->SERVICE->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_view_lab_service_sub_UNITS" for="x_UNITS" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->UNITS->caption() ?><?php echo ($view_lab_service_sub->UNITS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_UNITS"><?php echo strval($view_lab_service_sub->UNITS->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_lab_service_sub->UNITS->ViewValue) : $view_lab_service_sub->UNITS->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_sub->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_lab_service_sub->UNITS->ReadOnly || $view_lab_service_sub->UNITS->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_UNITS',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_sub->UNITS->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_sub->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_sub->UNITS->Lookup->getParamTag("p_x_UNITS") ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_sub->UNITS->displayValueSeparatorAttribute() ?>" name="x_UNITS" id="x_UNITS" value="<?php echo $view_lab_service_sub->UNITS->CurrentValue ?>"<?php echo $view_lab_service_sub->UNITS->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_view_lab_service_sub_AMOUNT" for="x_AMOUNT" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->AMOUNT->caption() ?><?php echo ($view_lab_service_sub->AMOUNT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_AMOUNT">
<input type="text" data-table="view_lab_service_sub" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($view_lab_service_sub->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->AMOUNT->EditValue ?>"<?php echo $view_lab_service_sub->AMOUNT->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_view_lab_service_sub_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->SERVICE_TYPE->caption() ?><?php echo ($view_lab_service_sub->SERVICE_TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_sub->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_service_sub->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_service_sub->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_sub->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_sub->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_sub->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_service_sub->SERVICE_TYPE->Lookup->getParamTag("p_x_SERVICE_TYPE") ?>
</span>
<?php echo $view_lab_service_sub->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_view_lab_service_sub_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->DEPARTMENT->caption() ?><?php echo ($view_lab_service_sub->DEPARTMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_sub->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_service_sub->DEPARTMENT->editAttributes() ?>>
		<?php echo $view_lab_service_sub->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
	</select>
</div>
</span>
<?php echo $view_lab_service_sub->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_view_lab_service_sub_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->mas_services_billingcol->caption() ?><?php echo ($view_lab_service_sub->mas_services_billingcol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_sub_mas_services_billingcol">
<input type="text" data-table="view_lab_service_sub" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_sub->mas_services_billingcol->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_lab_service_sub_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->DrShareAmount->caption() ?><?php echo ($view_lab_service_sub->DrShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrShareAmount">
<input type="text" data-table="view_lab_service_sub" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_sub->DrShareAmount->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_lab_service_sub_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->HospShareAmount->caption() ?><?php echo ($view_lab_service_sub->HospShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospShareAmount">
<input type="text" data-table="view_lab_service_sub" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_sub->HospShareAmount->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_view_lab_service_sub_DrSharePer" for="x_DrSharePer" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->DrSharePer->caption() ?><?php echo ($view_lab_service_sub->DrSharePer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrSharePer">
<input type="text" data-table="view_lab_service_sub" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->DrSharePer->EditValue ?>"<?php echo $view_lab_service_sub->DrSharePer->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_view_lab_service_sub_HospSharePer" for="x_HospSharePer" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->HospSharePer->caption() ?><?php echo ($view_lab_service_sub->HospSharePer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospSharePer">
<input type="text" data-table="view_lab_service_sub" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_sub->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->HospSharePer->EditValue ?>"<?php echo $view_lab_service_sub->HospSharePer->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_lab_service_sub_TestSubCd" for="x_TestSubCd" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->TestSubCd->caption() ?><?php echo ($view_lab_service_sub->TestSubCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestSubCd">
<input type="text" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->TestSubCd->EditValue ?>"<?php echo $view_lab_service_sub->TestSubCd->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_lab_service_sub_Method" for="x_Method" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Method->caption() ?><?php echo ($view_lab_service_sub->Method->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Method->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Method">
<input type="text" data-table="view_lab_service_sub" data-field="x_Method" name="x_Method" id="x_Method" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Method->EditValue ?>"<?php echo $view_lab_service_sub->Method->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_service_sub_Order" for="x_Order" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Order->caption() ?><?php echo ($view_lab_service_sub->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Order->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Order">
<input type="text" data-table="view_lab_service_sub" data-field="x_Order" name="x_Order" id="x_Order" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Order->EditValue ?>"<?php echo $view_lab_service_sub->Order->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_lab_service_sub_Form" for="x_Form" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Form->caption() ?><?php echo ($view_lab_service_sub->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Form->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Form">
<textarea data-table="view_lab_service_sub" data-field="x_Form" name="x_Form" id="x_Form" cols="8" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Form->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->Form->editAttributes() ?>><?php echo $view_lab_service_sub->Form->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_lab_service_sub_ResType" for="x_ResType" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->ResType->caption() ?><?php echo ($view_lab_service_sub->ResType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ResType">
<input type="text" data-table="view_lab_service_sub" data-field="x_ResType" name="x_ResType" id="x_ResType" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->ResType->EditValue ?>"<?php echo $view_lab_service_sub->ResType->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_view_lab_service_sub_UnitCD" for="x_UnitCD" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->UnitCD->caption() ?><?php echo ($view_lab_service_sub->UnitCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UnitCD">
<input type="text" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="8" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->UnitCD->EditValue ?>"<?php echo $view_lab_service_sub->UnitCD->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_service_sub_RefValue" for="x_RefValue" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->RefValue->caption() ?><?php echo ($view_lab_service_sub->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->RefValue->cellAttributes() ?>>
<span id="el_view_lab_service_sub_RefValue">
<textarea data-table="view_lab_service_sub" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->RefValue->editAttributes() ?>><?php echo $view_lab_service_sub->RefValue->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_lab_service_sub_Sample" for="x_Sample" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Sample->caption() ?><?php echo ($view_lab_service_sub->Sample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Sample">
<input type="text" data-table="view_lab_service_sub" data-field="x_Sample" name="x_Sample" id="x_Sample" size="8" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Sample->EditValue ?>"<?php echo $view_lab_service_sub->Sample->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_lab_service_sub_NoD" for="x_NoD" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->NoD->caption() ?><?php echo ($view_lab_service_sub->NoD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoD">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoD" name="x_NoD" id="x_NoD" size="8" maxlength="20" placeholder="<?php echo HtmlEncode($view_lab_service_sub->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->NoD->EditValue ?>"<?php echo $view_lab_service_sub->NoD->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_lab_service_sub_BillOrder" for="x_BillOrder" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->BillOrder->caption() ?><?php echo ($view_lab_service_sub->BillOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_sub_BillOrder">
<input type="text" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="8" placeholder="<?php echo HtmlEncode($view_lab_service_sub->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->BillOrder->EditValue ?>"<?php echo $view_lab_service_sub->BillOrder->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_lab_service_sub_Formula" for="x_Formula" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Formula->caption() ?><?php echo ($view_lab_service_sub->Formula->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Formula->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->Formula->editAttributes() ?>><?php echo $view_lab_service_sub->Formula->EditValue ?></textarea>
</span>
<?php echo $view_lab_service_sub->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_lab_service_sub_Inactive" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Inactive->caption() ?><?php echo ($view_lab_service_sub->Inactive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Inactive">
<div id="tp_x_Inactive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_lab_service_sub" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_sub->Inactive->displayValueSeparatorAttribute() ?>" name="x_Inactive[]" id="x_Inactive[]" value="{value}"<?php echo $view_lab_service_sub->Inactive->editAttributes() ?>></div>
<div id="dsl_x_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_sub->Inactive->checkBoxListHtml(FALSE, "x_Inactive[]") ?>
</div></div>
</span>
<?php echo $view_lab_service_sub->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_view_lab_service_sub_Outsource" for="x_Outsource" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Outsource->caption() ?><?php echo ($view_lab_service_sub->Outsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Outsource">
<input type="text" data-table="view_lab_service_sub" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Outsource->EditValue ?>"<?php echo $view_lab_service_sub->Outsource->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_lab_service_sub_CollSample" for="x_CollSample" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->CollSample->caption() ?><?php echo ($view_lab_service_sub->CollSample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CollSample">
<input type="text" data-table="view_lab_service_sub" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->CollSample->EditValue ?>"<?php echo $view_lab_service_sub->CollSample->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_service_sub_TestType" for="x_TestType" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->TestType->caption() ?><?php echo ($view_lab_service_sub->TestType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service_sub" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_sub->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_service_sub->TestType->editAttributes() ?>>
		<?php echo $view_lab_service_sub->TestType->selectOptionListHtml("x_TestType") ?>
	</select>
</div>
</span>
<?php echo $view_lab_service_sub->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_view_lab_service_sub_NoHeading" for="x_NoHeading" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->NoHeading->caption() ?><?php echo ($view_lab_service_sub->NoHeading->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoHeading">
<input type="text" data-table="view_lab_service_sub" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->NoHeading->EditValue ?>"<?php echo $view_lab_service_sub->NoHeading->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_view_lab_service_sub_ChemicalCode" for="x_ChemicalCode" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->ChemicalCode->caption() ?><?php echo ($view_lab_service_sub->ChemicalCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalCode">
<input type="text" data-table="view_lab_service_sub" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_sub->ChemicalCode->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_view_lab_service_sub_ChemicalName" for="x_ChemicalName" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->ChemicalName->caption() ?><?php echo ($view_lab_service_sub->ChemicalName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalName">
<input type="text" data-table="view_lab_service_sub" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->ChemicalName->EditValue ?>"<?php echo $view_lab_service_sub->ChemicalName->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_view_lab_service_sub_Utilaization" for="x_Utilaization" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Utilaization->caption() ?><?php echo ($view_lab_service_sub->Utilaization->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Utilaization">
<input type="text" data-table="view_lab_service_sub" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub->Utilaization->EditValue ?>"<?php echo $view_lab_service_sub->Utilaization->editAttributes() ?>>
</span>
<?php echo $view_lab_service_sub->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_sub->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_view_lab_service_sub_Interpretation" class="<?php echo $view_lab_service_sub_add->LeftColumnClass ?>"><?php echo $view_lab_service_sub->Interpretation->caption() ?><?php echo ($view_lab_service_sub->Interpretation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_service_sub_add->RightColumnClass ?>"><div<?php echo $view_lab_service_sub->Interpretation->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Interpretation">
<?php AppendClass($view_lab_service_sub->Interpretation->EditAttrs["class"], "editor"); ?>
<textarea data-table="view_lab_service_sub" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_sub->Interpretation->getPlaceHolder()) ?>"<?php echo $view_lab_service_sub->Interpretation->editAttributes() ?>><?php echo $view_lab_service_sub->Interpretation->EditValue ?></textarea>
<script>
ew.createEditor("fview_lab_service_subadd", "x_Interpretation", 35, 4, <?php echo ($view_lab_service_sub->Interpretation->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
</span>
<?php echo $view_lab_service_sub->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_service_sub_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_service_sub_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_service_sub_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_service_sub_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_service_sub_add->terminate();
?>