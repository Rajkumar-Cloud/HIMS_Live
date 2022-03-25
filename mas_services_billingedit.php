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
$mas_services_billing_edit = new mas_services_billing_edit();

// Run the page
$mas_services_billing_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_billing_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_services_billingedit = currentForm = new ew.Form("fmas_services_billingedit", "edit");

// Validate form
fmas_services_billingedit.validate = function() {
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
		<?php if ($mas_services_billing_edit->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Id->caption(), $mas_services_billing->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->CODE->caption(), $mas_services_billing->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->SERVICE->caption(), $mas_services_billing->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->UNITS->Required) { ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->UNITS->caption(), $mas_services_billing->UNITS->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->UNITS->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->AMOUNT->Required) { ?>
			elm = this.getElements("x" + infix + "_AMOUNT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->AMOUNT->caption(), $mas_services_billing->AMOUNT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->SERVICE_TYPE->caption(), $mas_services_billing->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->DEPARTMENT->caption(), $mas_services_billing->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Modified->caption(), $mas_services_billing->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ModifiedDateTime->caption(), $mas_services_billing->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->mas_services_billingcol->Required) { ?>
			elm = this.getElements("x" + infix + "_mas_services_billingcol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->mas_services_billingcol->caption(), $mas_services_billing->mas_services_billingcol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->DrShareAmount->caption(), $mas_services_billing->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->DrShareAmount->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->HospShareAmount->caption(), $mas_services_billing->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->HospShareAmount->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->DrSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->DrSharePer->caption(), $mas_services_billing->DrSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->DrSharePer->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->HospSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->HospSharePer->caption(), $mas_services_billing->HospSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->HospSharePer->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->HospID->caption(), $mas_services_billing->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->TestSubCd->caption(), $mas_services_billing->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Method->caption(), $mas_services_billing->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Order->caption(), $mas_services_billing->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->Order->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Form->caption(), $mas_services_billing->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ResType->caption(), $mas_services_billing->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->UnitCD->caption(), $mas_services_billing->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->RefValue->caption(), $mas_services_billing->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Sample->caption(), $mas_services_billing->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->NoD->caption(), $mas_services_billing->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->NoD->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->BillOrder->caption(), $mas_services_billing->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($mas_services_billing->BillOrder->errorMessage()) ?>");
		<?php if ($mas_services_billing_edit->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Formula->caption(), $mas_services_billing->Formula->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Inactive->caption(), $mas_services_billing->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Outsource->caption(), $mas_services_billing->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->CollSample->caption(), $mas_services_billing->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->TestType->caption(), $mas_services_billing->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->NoHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->NoHeading->caption(), $mas_services_billing->NoHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->ChemicalCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ChemicalCode->caption(), $mas_services_billing->ChemicalCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->ChemicalName->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->ChemicalName->caption(), $mas_services_billing->ChemicalName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Utilaization->Required) { ?>
			elm = this.getElements("x" + infix + "_Utilaization");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Utilaization->caption(), $mas_services_billing->Utilaization->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_services_billing_edit->Interpretation->Required) { ?>
			elm = this.getElements("x" + infix + "_Interpretation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_services_billing->Interpretation->caption(), $mas_services_billing->Interpretation->RequiredErrorMessage)) ?>");
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
fmas_services_billingedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_services_billingedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_services_billingedit.lists["x_SERVICE_TYPE"] = <?php echo $mas_services_billing_edit->SERVICE_TYPE->Lookup->toClientList() ?>;
fmas_services_billingedit.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($mas_services_billing_edit->SERVICE_TYPE->lookupOptions()) ?>;
fmas_services_billingedit.lists["x_DEPARTMENT"] = <?php echo $mas_services_billing_edit->DEPARTMENT->Lookup->toClientList() ?>;
fmas_services_billingedit.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($mas_services_billing_edit->DEPARTMENT->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_services_billing_edit->showPageHeader(); ?>
<?php
$mas_services_billing_edit->showMessage();
?>
<form name="fmas_services_billingedit" id="fmas_services_billingedit" class="<?php echo $mas_services_billing_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_services_billing_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_services_billing_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_services_billing_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($mas_services_billing->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_mas_services_billing_Id" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Id" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Id->caption() ?><?php echo ($mas_services_billing->Id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Id->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Id" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Id">
<span<?php echo $mas_services_billing->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_services_billing->Id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($mas_services_billing->Id->CurrentValue) ?>">
<?php echo $mas_services_billing->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_mas_services_billing_CODE" for="x_CODE" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_CODE" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->CODE->caption() ?><?php echo ($mas_services_billing->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->CODE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CODE" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_CODE">
<input type="text" data-table="mas_services_billing" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->CODE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CODE->EditValue ?>"<?php echo $mas_services_billing->CODE->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_mas_services_billing_SERVICE" for="x_SERVICE" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_SERVICE" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->SERVICE->caption() ?><?php echo ($mas_services_billing->SERVICE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->SERVICE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_SERVICE">
<input type="text" data-table="mas_services_billing" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->SERVICE->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->SERVICE->EditValue ?>"<?php echo $mas_services_billing->SERVICE->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_mas_services_billing_UNITS" for="x_UNITS" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_UNITS" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->UNITS->caption() ?><?php echo ($mas_services_billing->UNITS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->UNITS->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UNITS" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_UNITS">
<input type="text" data-table="mas_services_billing" data-field="x_UNITS" name="x_UNITS" id="x_UNITS" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->UNITS->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UNITS->EditValue ?>"<?php echo $mas_services_billing->UNITS->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_mas_services_billing_AMOUNT" for="x_AMOUNT" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_AMOUNT" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->AMOUNT->caption() ?><?php echo ($mas_services_billing->AMOUNT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->AMOUNT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_AMOUNT" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_AMOUNT">
<input type="text" data-table="mas_services_billing" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($mas_services_billing->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->AMOUNT->EditValue ?>"<?php echo $mas_services_billing->AMOUNT->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_mas_services_billing_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_SERVICE_TYPE" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->SERVICE_TYPE->caption() ?><?php echo ($mas_services_billing->SERVICE_TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_mas_services_billing_SERVICE_TYPE" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $mas_services_billing->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $mas_services_billing->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $mas_services_billing->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$mas_services_billing->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->SERVICE_TYPE->caption() ?>" data-title="<?php echo $mas_services_billing->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->SERVICE_TYPE->Lookup->getParamTag("p_x_SERVICE_TYPE") ?>
</span>
</script>
<?php echo $mas_services_billing->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_mas_services_billing_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_DEPARTMENT" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->DEPARTMENT->caption() ?><?php echo ($mas_services_billing->DEPARTMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DEPARTMENT" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-value-separator="<?php echo $mas_services_billing->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $mas_services_billing->DEPARTMENT->editAttributes() ?>>
		<?php echo $mas_services_billing->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$mas_services_billing->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_services_billing->DEPARTMENT->caption() ?>" data-title="<?php echo $mas_services_billing->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $mas_services_billing->DEPARTMENT->Lookup->getParamTag("p_x_DEPARTMENT") ?>
</span>
</script>
<?php echo $mas_services_billing->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_mas_services_billing_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_mas_services_billingcol" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->mas_services_billingcol->caption() ?><?php echo ($mas_services_billing->mas_services_billingcol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_mas_services_billing_mas_services_billingcol" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_mas_services_billingcol">
<input type="text" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->mas_services_billingcol->EditValue ?>"<?php echo $mas_services_billing->mas_services_billingcol->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_mas_services_billing_DrShareAmount" for="x_DrShareAmount" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_DrShareAmount" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->DrShareAmount->caption() ?><?php echo ($mas_services_billing->DrShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->DrShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrShareAmount" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_DrShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrShareAmount->EditValue ?>"<?php echo $mas_services_billing->DrShareAmount->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_mas_services_billing_HospShareAmount" for="x_HospShareAmount" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_HospShareAmount" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->HospShareAmount->caption() ?><?php echo ($mas_services_billing->HospShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->HospShareAmount->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospShareAmount" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_HospShareAmount">
<input type="text" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospShareAmount->EditValue ?>"<?php echo $mas_services_billing->HospShareAmount->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_mas_services_billing_DrSharePer" for="x_DrSharePer" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_DrSharePer" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->DrSharePer->caption() ?><?php echo ($mas_services_billing->DrSharePer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->DrSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_DrSharePer" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_DrSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->DrSharePer->EditValue ?>"<?php echo $mas_services_billing->DrSharePer->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_mas_services_billing_HospSharePer" for="x_HospSharePer" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_HospSharePer" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->HospSharePer->caption() ?><?php echo ($mas_services_billing->HospSharePer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->HospSharePer->cellAttributes() ?>>
<script id="tpx_mas_services_billing_HospSharePer" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_HospSharePer">
<input type="text" data-table="mas_services_billing" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->HospSharePer->EditValue ?>"<?php echo $mas_services_billing->HospSharePer->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_mas_services_billing_TestSubCd" for="x_TestSubCd" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_TestSubCd" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->TestSubCd->caption() ?><?php echo ($mas_services_billing->TestSubCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->TestSubCd->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestSubCd" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_TestSubCd">
<input type="text" data-table="mas_services_billing" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestSubCd->EditValue ?>"<?php echo $mas_services_billing->TestSubCd->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_mas_services_billing_Method" for="x_Method" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Method" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Method->caption() ?><?php echo ($mas_services_billing->Method->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Method->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Method" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Method">
<input type="text" data-table="mas_services_billing" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Method->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Method->EditValue ?>"<?php echo $mas_services_billing->Method->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_mas_services_billing_Order" for="x_Order" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Order" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Order->caption() ?><?php echo ($mas_services_billing->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Order->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Order" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Order">
<input type="text" data-table="mas_services_billing" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->Order->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Order->EditValue ?>"<?php echo $mas_services_billing->Order->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_mas_services_billing_Form" for="x_Form" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Form" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Form->caption() ?><?php echo ($mas_services_billing->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Form->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Form" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Form">
<textarea data-table="mas_services_billing" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing->Form->getPlaceHolder()) ?>"<?php echo $mas_services_billing->Form->editAttributes() ?>><?php echo $mas_services_billing->Form->EditValue ?></textarea>
</span>
</script>
<?php echo $mas_services_billing->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_mas_services_billing_ResType" for="x_ResType" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_ResType" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->ResType->caption() ?><?php echo ($mas_services_billing->ResType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->ResType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ResType" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_ResType">
<input type="text" data-table="mas_services_billing" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ResType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ResType->EditValue ?>"<?php echo $mas_services_billing->ResType->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_mas_services_billing_UnitCD" for="x_UnitCD" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_UnitCD" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->UnitCD->caption() ?><?php echo ($mas_services_billing->UnitCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->UnitCD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_UnitCD" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_UnitCD">
<input type="text" data-table="mas_services_billing" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->UnitCD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->UnitCD->EditValue ?>"<?php echo $mas_services_billing->UnitCD->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_mas_services_billing_RefValue" for="x_RefValue" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_RefValue" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->RefValue->caption() ?><?php echo ($mas_services_billing->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->RefValue->cellAttributes() ?>>
<script id="tpx_mas_services_billing_RefValue" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_RefValue">
<textarea data-table="mas_services_billing" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing->RefValue->getPlaceHolder()) ?>"<?php echo $mas_services_billing->RefValue->editAttributes() ?>><?php echo $mas_services_billing->RefValue->EditValue ?></textarea>
</span>
</script>
<?php echo $mas_services_billing->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_mas_services_billing_Sample" for="x_Sample" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Sample" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Sample->caption() ?><?php echo ($mas_services_billing->Sample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Sample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Sample" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Sample">
<input type="text" data-table="mas_services_billing" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($mas_services_billing->Sample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Sample->EditValue ?>"<?php echo $mas_services_billing->Sample->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_mas_services_billing_NoD" for="x_NoD" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_NoD" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->NoD->caption() ?><?php echo ($mas_services_billing->NoD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->NoD->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoD" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_NoD">
<input type="text" data-table="mas_services_billing" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->NoD->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoD->EditValue ?>"<?php echo $mas_services_billing->NoD->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_mas_services_billing_BillOrder" for="x_BillOrder" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_BillOrder" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->BillOrder->caption() ?><?php echo ($mas_services_billing->BillOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->BillOrder->cellAttributes() ?>>
<script id="tpx_mas_services_billing_BillOrder" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_BillOrder">
<input type="text" data-table="mas_services_billing" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($mas_services_billing->BillOrder->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->BillOrder->EditValue ?>"<?php echo $mas_services_billing->BillOrder->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_mas_services_billing_Formula" for="x_Formula" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Formula" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Formula->caption() ?><?php echo ($mas_services_billing->Formula->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Formula->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Formula" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Formula">
<textarea data-table="mas_services_billing" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing->Formula->getPlaceHolder()) ?>"<?php echo $mas_services_billing->Formula->editAttributes() ?>><?php echo $mas_services_billing->Formula->EditValue ?></textarea>
</span>
</script>
<?php echo $mas_services_billing->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_mas_services_billing_Inactive" for="x_Inactive" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Inactive" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Inactive->caption() ?><?php echo ($mas_services_billing->Inactive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Inactive->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Inactive" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Inactive">
<input type="text" data-table="mas_services_billing" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Inactive->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Inactive->EditValue ?>"<?php echo $mas_services_billing->Inactive->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_mas_services_billing_Outsource" for="x_Outsource" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Outsource" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Outsource->caption() ?><?php echo ($mas_services_billing->Outsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Outsource->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Outsource" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Outsource">
<input type="text" data-table="mas_services_billing" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Outsource->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Outsource->EditValue ?>"<?php echo $mas_services_billing->Outsource->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_mas_services_billing_CollSample" for="x_CollSample" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_CollSample" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->CollSample->caption() ?><?php echo ($mas_services_billing->CollSample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->CollSample->cellAttributes() ?>>
<script id="tpx_mas_services_billing_CollSample" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_CollSample">
<input type="text" data-table="mas_services_billing" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->CollSample->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->CollSample->EditValue ?>"<?php echo $mas_services_billing->CollSample->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_mas_services_billing_TestType" for="x_TestType" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_TestType" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->TestType->caption() ?><?php echo ($mas_services_billing->TestType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->TestType->cellAttributes() ?>>
<script id="tpx_mas_services_billing_TestType" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_TestType">
<input type="text" data-table="mas_services_billing" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->TestType->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->TestType->EditValue ?>"<?php echo $mas_services_billing->TestType->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_mas_services_billing_NoHeading" for="x_NoHeading" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_NoHeading" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->NoHeading->caption() ?><?php echo ($mas_services_billing->NoHeading->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->NoHeading->cellAttributes() ?>>
<script id="tpx_mas_services_billing_NoHeading" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_NoHeading">
<input type="text" data-table="mas_services_billing" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->NoHeading->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->NoHeading->EditValue ?>"<?php echo $mas_services_billing->NoHeading->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_mas_services_billing_ChemicalCode" for="x_ChemicalCode" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_ChemicalCode" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->ChemicalCode->caption() ?><?php echo ($mas_services_billing->ChemicalCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->ChemicalCode->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalCode" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_ChemicalCode">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalCode->EditValue ?>"<?php echo $mas_services_billing->ChemicalCode->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_mas_services_billing_ChemicalName" for="x_ChemicalName" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_ChemicalName" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->ChemicalName->caption() ?><?php echo ($mas_services_billing->ChemicalName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->ChemicalName->cellAttributes() ?>>
<script id="tpx_mas_services_billing_ChemicalName" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_ChemicalName">
<input type="text" data-table="mas_services_billing" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->ChemicalName->EditValue ?>"<?php echo $mas_services_billing->ChemicalName->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_mas_services_billing_Utilaization" for="x_Utilaization" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Utilaization" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Utilaization->caption() ?><?php echo ($mas_services_billing->Utilaization->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Utilaization->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Utilaization" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Utilaization">
<input type="text" data-table="mas_services_billing" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_services_billing->Utilaization->getPlaceHolder()) ?>" value="<?php echo $mas_services_billing->Utilaization->EditValue ?>"<?php echo $mas_services_billing->Utilaization->editAttributes() ?>>
</span>
</script>
<?php echo $mas_services_billing->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_services_billing->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_mas_services_billing_Interpretation" class="<?php echo $mas_services_billing_edit->LeftColumnClass ?>"><script id="tpc_mas_services_billing_Interpretation" class="mas_services_billingedit" type="text/html"><span><?php echo $mas_services_billing->Interpretation->caption() ?><?php echo ($mas_services_billing->Interpretation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $mas_services_billing_edit->RightColumnClass ?>"><div<?php echo $mas_services_billing->Interpretation->cellAttributes() ?>>
<script id="tpx_mas_services_billing_Interpretation" class="mas_services_billingedit" type="text/html">
<span id="el_mas_services_billing_Interpretation">
<?php AppendClass($mas_services_billing->Interpretation->EditAttrs["class"], "editor"); ?>
<textarea data-table="mas_services_billing" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($mas_services_billing->Interpretation->getPlaceHolder()) ?>"<?php echo $mas_services_billing->Interpretation->editAttributes() ?>><?php echo $mas_services_billing->Interpretation->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="mas_services_billingedit_js">
ew.createEditor("fmas_services_billingedit", "x_Interpretation", 35, 4, <?php echo ($mas_services_billing->Interpretation->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $mas_services_billing->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_mas_services_billingedit" class="ew-custom-template"></div>
<script id="tpm_mas_services_billingedit" type="text/html">
<div id="ct_mas_services_billing_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Service Details</h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CODE"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_CODE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_SERVICE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UNITS"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_UNITS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_AMOUNT"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_AMOUNT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_SERVICE_TYPE"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_SERVICE_TYPE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DEPARTMENT"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_DEPARTMENT"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_mas_services_billingcol"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_mas_services_billingcol"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrShareAmount"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_DrShareAmount"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospShareAmount"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_HospShareAmount"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_DrSharePer"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_DrSharePer"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_HospSharePer"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_HospSharePer"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Lab Details</h3>
			</div>
			<div class="card-body">
			<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestSubCd"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_TestSubCd"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Method"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Method"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Order"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Order"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Form"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Form"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ResType"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_ResType"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_UnitCD"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_UnitCD"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Inactive"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Inactive"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Outsource"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Outsource"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_CollSample"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_CollSample"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_RefValue"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_RefValue"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Sample"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Sample"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoD"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_NoD"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_BillOrder"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_BillOrder"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Formula"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Formula"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_TestType"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_TestType"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_NoHeading"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_NoHeading"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalCode"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_ChemicalCode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_ChemicalName"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_ChemicalName"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_mas_services_billing_Utilaization"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Utilaization"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
		</div>
		</div>
	</div>				
</div>
</div>
<div class="row">
{{include tmpl="#tpc_mas_services_billing_Interpretation"/}}&nbsp;{{include tmpl="#tpx_mas_services_billing_Interpretation"/}}
</div>
</div>
</script>
<?php if (!$mas_services_billing_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_services_billing_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_services_billing_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($mas_services_billing->Rows) ?> };
ew.applyTemplate("tpd_mas_services_billingedit", "tpm_mas_services_billingedit", "mas_services_billingedit", "<?php echo $mas_services_billing->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.mas_services_billingedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$mas_services_billing_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_services_billing_edit->terminate();
?>