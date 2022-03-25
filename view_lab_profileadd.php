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
$view_lab_profile_add = new view_lab_profile_add();

// Run the page
$view_lab_profile_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_profile_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_lab_profileadd = currentForm = new ew.Form("fview_lab_profileadd", "add");

// Validate form
fview_lab_profileadd.validate = function() {
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
		<?php if ($view_lab_profile_add->CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->CODE->caption(), $view_lab_profile->CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->SERVICE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->SERVICE->caption(), $view_lab_profile->SERVICE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->UNITS->Required) { ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->UNITS->caption(), $view_lab_profile->UNITS->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UNITS");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->UNITS->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->AMOUNT->Required) { ?>
			elm = this.getElements("x" + infix + "_AMOUNT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->AMOUNT->caption(), $view_lab_profile->AMOUNT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->SERVICE_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_SERVICE_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->SERVICE_TYPE->caption(), $view_lab_profile->SERVICE_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->DEPARTMENT->Required) { ?>
			elm = this.getElements("x" + infix + "_DEPARTMENT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->DEPARTMENT->caption(), $view_lab_profile->DEPARTMENT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Created->caption(), $view_lab_profile->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->CreatedDateTime->caption(), $view_lab_profile->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->mas_services_billingcol->Required) { ?>
			elm = this.getElements("x" + infix + "_mas_services_billingcol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->mas_services_billingcol->caption(), $view_lab_profile->mas_services_billingcol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->DrShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->DrShareAmount->caption(), $view_lab_profile->DrShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->DrShareAmount->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->HospShareAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->HospShareAmount->caption(), $view_lab_profile->HospShareAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospShareAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->HospShareAmount->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->DrSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->DrSharePer->caption(), $view_lab_profile->DrSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->DrSharePer->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->HospSharePer->Required) { ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->HospSharePer->caption(), $view_lab_profile->HospSharePer->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospSharePer");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->HospSharePer->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->HospID->caption(), $view_lab_profile->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->TestSubCd->caption(), $view_lab_profile->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Method->caption(), $view_lab_profile->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Order->caption(), $view_lab_profile->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->Order->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Form->caption(), $view_lab_profile->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->ResType->caption(), $view_lab_profile->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->UnitCD->caption(), $view_lab_profile->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->RefValue->caption(), $view_lab_profile->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Sample->caption(), $view_lab_profile->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->NoD->caption(), $view_lab_profile->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->NoD->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->BillOrder->caption(), $view_lab_profile->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_profile->BillOrder->errorMessage()) ?>");
		<?php if ($view_lab_profile_add->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Formula->caption(), $view_lab_profile->Formula->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Inactive->caption(), $view_lab_profile->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Outsource->caption(), $view_lab_profile->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->CollSample->caption(), $view_lab_profile->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->TestType->caption(), $view_lab_profile->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->NoHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->NoHeading->caption(), $view_lab_profile->NoHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->ChemicalCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->ChemicalCode->caption(), $view_lab_profile->ChemicalCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->ChemicalName->Required) { ?>
			elm = this.getElements("x" + infix + "_ChemicalName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->ChemicalName->caption(), $view_lab_profile->ChemicalName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Utilaization->Required) { ?>
			elm = this.getElements("x" + infix + "_Utilaization");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Utilaization->caption(), $view_lab_profile->Utilaization->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_profile_add->Interpretation->Required) { ?>
			elm = this.getElements("x" + infix + "_Interpretation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile->Interpretation->caption(), $view_lab_profile->Interpretation->RequiredErrorMessage)) ?>");
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
fview_lab_profileadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_profileadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_profileadd.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_profile_add->SERVICE_TYPE->Lookup->toClientList() ?>;
fview_lab_profileadd.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_profile_add->SERVICE_TYPE->lookupOptions()) ?>;
fview_lab_profileadd.lists["x_DEPARTMENT"] = <?php echo $view_lab_profile_add->DEPARTMENT->Lookup->toClientList() ?>;
fview_lab_profileadd.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_profile_add->DEPARTMENT->lookupOptions()) ?>;
fview_lab_profileadd.lists["x_TestType"] = <?php echo $view_lab_profile_add->TestType->Lookup->toClientList() ?>;
fview_lab_profileadd.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_profile_add->TestType->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_profile_add->showPageHeader(); ?>
<?php
$view_lab_profile_add->showMessage();
?>
<form name="fview_lab_profileadd" id="fview_lab_profileadd" class="<?php echo $view_lab_profile_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_profile_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_profile_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_profile_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_lab_profile->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_view_lab_profile_CODE" for="x_CODE" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_CODE" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->CODE->caption() ?><?php echo ($view_lab_profile->CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CODE" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_CODE">
<input type="text" data-table="view_lab_profile" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CODE->EditValue ?>"<?php echo $view_lab_profile->CODE->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_view_lab_profile_SERVICE" for="x_SERVICE" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_SERVICE" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->SERVICE->caption() ?><?php echo ($view_lab_profile->SERVICE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_SERVICE">
<input type="text" data-table="view_lab_profile" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->SERVICE->EditValue ?>"<?php echo $view_lab_profile->SERVICE->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_view_lab_profile_UNITS" for="x_UNITS" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_UNITS" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->UNITS->caption() ?><?php echo ($view_lab_profile->UNITS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UNITS" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_UNITS">
<input type="text" data-table="view_lab_profile" data-field="x_UNITS" name="x_UNITS" id="x_UNITS" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->UNITS->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UNITS->EditValue ?>"<?php echo $view_lab_profile->UNITS->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_view_lab_profile_AMOUNT" for="x_AMOUNT" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_AMOUNT" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->AMOUNT->caption() ?><?php echo ($view_lab_profile->AMOUNT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_AMOUNT" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_AMOUNT">
<input type="text" data-table="view_lab_profile" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->AMOUNT->EditValue ?>"<?php echo $view_lab_profile->AMOUNT->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_view_lab_profile_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_SERVICE_TYPE" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->SERVICE_TYPE->caption() ?><?php echo ($view_lab_profile->SERVICE_TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE_TYPE" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_profile->SERVICE_TYPE->editAttributes() ?>>
		<?php echo $view_lab_profile->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$view_lab_profile->SERVICE_TYPE->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_profile->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->SERVICE_TYPE->Lookup->getParamTag("p_x_SERVICE_TYPE") ?>
</span>
</script>
<?php echo $view_lab_profile->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_view_lab_profile_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_DEPARTMENT" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->DEPARTMENT->caption() ?><?php echo ($view_lab_profile->DEPARTMENT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DEPARTMENT" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_profile->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_profile->DEPARTMENT->editAttributes() ?>>
		<?php echo $view_lab_profile->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$view_lab_profile->DEPARTMENT->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile->DEPARTMENT->caption() ?>" data-title="<?php echo $view_lab_profile->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $view_lab_profile->DEPARTMENT->Lookup->getParamTag("p_x_DEPARTMENT") ?>
</span>
</script>
<?php echo $view_lab_profile->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_view_lab_profile_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_mas_services_billingcol" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->mas_services_billingcol->caption() ?><?php echo ($view_lab_profile->mas_services_billingcol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_profile_mas_services_billingcol" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_mas_services_billingcol">
<input type="text" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_profile->mas_services_billingcol->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_lab_profile_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_DrShareAmount" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->DrShareAmount->caption() ?><?php echo ($view_lab_profile->DrShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrShareAmount" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_DrShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrShareAmount->EditValue ?>"<?php echo $view_lab_profile->DrShareAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_lab_profile_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_HospShareAmount" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->HospShareAmount->caption() ?><?php echo ($view_lab_profile->HospShareAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospShareAmount" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_HospShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospShareAmount->EditValue ?>"<?php echo $view_lab_profile->HospShareAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_view_lab_profile_DrSharePer" for="x_DrSharePer" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_DrSharePer" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->DrSharePer->caption() ?><?php echo ($view_lab_profile->DrSharePer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrSharePer" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_DrSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->DrSharePer->EditValue ?>"<?php echo $view_lab_profile->DrSharePer->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_view_lab_profile_HospSharePer" for="x_HospSharePer" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_HospSharePer" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->HospSharePer->caption() ?><?php echo ($view_lab_profile->HospSharePer->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospSharePer" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_HospSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->HospSharePer->EditValue ?>"<?php echo $view_lab_profile->HospSharePer->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_lab_profile_TestSubCd" for="x_TestSubCd" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_TestSubCd" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->TestSubCd->caption() ?><?php echo ($view_lab_profile->TestSubCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestSubCd" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_TestSubCd">
<input type="text" data-table="view_lab_profile" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->TestSubCd->EditValue ?>"<?php echo $view_lab_profile->TestSubCd->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_lab_profile_Method" for="x_Method" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Method" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Method->caption() ?><?php echo ($view_lab_profile->Method->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Method->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Method" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Method">
<input type="text" data-table="view_lab_profile" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Method->EditValue ?>"<?php echo $view_lab_profile->Method->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_profile_Order" for="x_Order" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Order" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Order->caption() ?><?php echo ($view_lab_profile->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Order->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Order" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Order">
<input type="text" data-table="view_lab_profile" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Order->EditValue ?>"<?php echo $view_lab_profile->Order->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_lab_profile_Form" for="x_Form" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Form" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Form->caption() ?><?php echo ($view_lab_profile->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Form->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Form" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Form">
<textarea data-table="view_lab_profile" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile->Form->getPlaceHolder()) ?>"<?php echo $view_lab_profile->Form->editAttributes() ?>><?php echo $view_lab_profile->Form->EditValue ?></textarea>
</span>
</script>
<?php echo $view_lab_profile->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_lab_profile_ResType" for="x_ResType" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_ResType" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->ResType->caption() ?><?php echo ($view_lab_profile->ResType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ResType" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_ResType">
<input type="text" data-table="view_lab_profile" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ResType->EditValue ?>"<?php echo $view_lab_profile->ResType->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_view_lab_profile_UnitCD" for="x_UnitCD" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_UnitCD" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->UnitCD->caption() ?><?php echo ($view_lab_profile->UnitCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UnitCD" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_UnitCD">
<input type="text" data-table="view_lab_profile" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->UnitCD->EditValue ?>"<?php echo $view_lab_profile->UnitCD->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_profile_RefValue" for="x_RefValue" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_RefValue" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->RefValue->caption() ?><?php echo ($view_lab_profile->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->RefValue->cellAttributes() ?>>
<script id="tpx_view_lab_profile_RefValue" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_RefValue">
<textarea data-table="view_lab_profile" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_profile->RefValue->editAttributes() ?>><?php echo $view_lab_profile->RefValue->EditValue ?></textarea>
</span>
</script>
<?php echo $view_lab_profile->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_lab_profile_Sample" for="x_Sample" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Sample" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Sample->caption() ?><?php echo ($view_lab_profile->Sample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Sample" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Sample">
<input type="text" data-table="view_lab_profile" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_profile->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Sample->EditValue ?>"<?php echo $view_lab_profile->Sample->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_lab_profile_NoD" for="x_NoD" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_NoD" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->NoD->caption() ?><?php echo ($view_lab_profile->NoD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoD" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_NoD">
<input type="text" data-table="view_lab_profile" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoD->EditValue ?>"<?php echo $view_lab_profile->NoD->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_lab_profile_BillOrder" for="x_BillOrder" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_BillOrder" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->BillOrder->caption() ?><?php echo ($view_lab_profile->BillOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_profile_BillOrder" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_BillOrder">
<input type="text" data-table="view_lab_profile" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->BillOrder->EditValue ?>"<?php echo $view_lab_profile->BillOrder->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_lab_profile_Formula" for="x_Formula" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Formula" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Formula->caption() ?><?php echo ($view_lab_profile->Formula->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Formula->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Formula" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Formula">
<textarea data-table="view_lab_profile" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_profile->Formula->editAttributes() ?>><?php echo $view_lab_profile->Formula->EditValue ?></textarea>
</span>
</script>
<?php echo $view_lab_profile->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_lab_profile_Inactive" for="x_Inactive" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Inactive" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Inactive->caption() ?><?php echo ($view_lab_profile->Inactive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Inactive" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Inactive">
<input type="text" data-table="view_lab_profile" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Inactive->EditValue ?>"<?php echo $view_lab_profile->Inactive->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_view_lab_profile_Outsource" for="x_Outsource" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Outsource" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Outsource->caption() ?><?php echo ($view_lab_profile->Outsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Outsource" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Outsource">
<input type="text" data-table="view_lab_profile" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Outsource->EditValue ?>"<?php echo $view_lab_profile->Outsource->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_lab_profile_CollSample" for="x_CollSample" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_CollSample" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->CollSample->caption() ?><?php echo ($view_lab_profile->CollSample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CollSample" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_CollSample">
<input type="text" data-table="view_lab_profile" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->CollSample->EditValue ?>"<?php echo $view_lab_profile->CollSample->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_profile_TestType" for="x_TestType" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_TestType" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->TestType->caption() ?><?php echo ($view_lab_profile->TestType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestType" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_profile->TestType->editAttributes() ?>>
		<?php echo $view_lab_profile->TestType->selectOptionListHtml("x_TestType") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_lab_profile->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_view_lab_profile_NoHeading" for="x_NoHeading" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_NoHeading" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->NoHeading->caption() ?><?php echo ($view_lab_profile->NoHeading->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoHeading" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_NoHeading">
<input type="text" data-table="view_lab_profile" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->NoHeading->EditValue ?>"<?php echo $view_lab_profile->NoHeading->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_view_lab_profile_ChemicalCode" for="x_ChemicalCode" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_ChemicalCode" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->ChemicalCode->caption() ?><?php echo ($view_lab_profile->ChemicalCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalCode" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_ChemicalCode">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalCode->EditValue ?>"<?php echo $view_lab_profile->ChemicalCode->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_view_lab_profile_ChemicalName" for="x_ChemicalName" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_ChemicalName" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->ChemicalName->caption() ?><?php echo ($view_lab_profile->ChemicalName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalName" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_ChemicalName">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->ChemicalName->EditValue ?>"<?php echo $view_lab_profile->ChemicalName->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_view_lab_profile_Utilaization" for="x_Utilaization" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Utilaization" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Utilaization->caption() ?><?php echo ($view_lab_profile->Utilaization->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Utilaization" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Utilaization">
<input type="text" data-table="view_lab_profile" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile->Utilaization->EditValue ?>"<?php echo $view_lab_profile->Utilaization->editAttributes() ?>>
</span>
</script>
<?php echo $view_lab_profile->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_view_lab_profile_Interpretation" class="<?php echo $view_lab_profile_add->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Interpretation" class="view_lab_profileadd" type="text/html"><span><?php echo $view_lab_profile->Interpretation->caption() ?><?php echo ($view_lab_profile->Interpretation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_lab_profile_add->RightColumnClass ?>"><div<?php echo $view_lab_profile->Interpretation->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Interpretation" class="view_lab_profileadd" type="text/html">
<span id="el_view_lab_profile_Interpretation">
<?php AppendClass($view_lab_profile->Interpretation->EditAttrs["class"], "editor"); ?>
<textarea data-table="view_lab_profile" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile->Interpretation->getPlaceHolder()) ?>"<?php echo $view_lab_profile->Interpretation->editAttributes() ?>><?php echo $view_lab_profile->Interpretation->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="view_lab_profileadd_js">
ew.createEditor("fview_lab_profileadd", "x_Interpretation", 35, 4, <?php echo ($view_lab_profile->Interpretation->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $view_lab_profile->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_lab_profileadd" class="ew-custom-template"></div>
<script id="tpm_view_lab_profileadd" type="text/html">
<div id="ct_view_lab_profile_add"><style>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CODE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_CODE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_SERVICE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UNITS"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_UNITS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_AMOUNT"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_AMOUNT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE_TYPE"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_SERVICE_TYPE"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DEPARTMENT"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DEPARTMENT"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_mas_services_billingcol"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_mas_services_billingcol"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DrShareAmount"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospShareAmount"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_HospShareAmount"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_DrSharePer"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospSharePer"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_HospSharePer"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestSubCd"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_TestSubCd"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Method"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Method"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Order"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Order"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Form"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Form"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ResType"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_ResType"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UnitCD"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_UnitCD"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Inactive"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Inactive"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Outsource"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Outsource"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CollSample"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_CollSample"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_RefValue"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_RefValue"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Sample"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Sample"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoD"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_NoD"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_BillOrder"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_BillOrder"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Formula"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Formula"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestType"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_TestType"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoHeading"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_NoHeading"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalCode"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_ChemicalCode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalName"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_ChemicalName"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Utilaization"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Utilaization"/}}</span>
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
{{include tmpl="#tpc_view_lab_profile_Interpretation"/}}&nbsp;{{include tmpl="#tpx_view_lab_profile_Interpretation"/}}
</div>
</div>
</script>
<?php
	if (in_array("lab_profile_details", explode(",", $view_lab_profile->getCurrentDetailTable())) && $lab_profile_details->DetailAdd) {
?>
<?php if ($view_lab_profile->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("lab_profile_details", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "lab_profile_detailsgrid.php" ?>
<?php } ?>
<?php if (!$view_lab_profile_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_profile_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_profile_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_profile->Rows) ?> };
ew.applyTemplate("tpd_view_lab_profileadd", "tpm_view_lab_profileadd", "view_lab_profileadd", "<?php echo $view_lab_profile->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_profileadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_lab_profile_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_profile_add->terminate();
?>