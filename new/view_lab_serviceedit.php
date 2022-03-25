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
$view_lab_service_edit = new view_lab_service_edit();

// Run the page
$view_lab_service_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_lab_serviceedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_lab_serviceedit = currentForm = new ew.Form("fview_lab_serviceedit", "edit");

	// Validate form
	fview_lab_serviceedit.validate = function() {
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
			<?php if ($view_lab_service_edit->Id->Required) { ?>
				elm = this.getElements("x" + infix + "_Id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Id->caption(), $view_lab_service_edit->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->CODE->caption(), $view_lab_service_edit->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->SERVICE->caption(), $view_lab_service_edit->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->UNITS->caption(), $view_lab_service_edit->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->AMOUNT->caption(), $view_lab_service_edit->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->SERVICE_TYPE->caption(), $view_lab_service_edit->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->DEPARTMENT->caption(), $view_lab_service_edit->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Modified->caption(), $view_lab_service_edit->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->ModifiedDateTime->caption(), $view_lab_service_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->mas_services_billingcol->caption(), $view_lab_service_edit->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->DrShareAmount->caption(), $view_lab_service_edit->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->HospShareAmount->caption(), $view_lab_service_edit->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->DrSharePer->caption(), $view_lab_service_edit->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->DrSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->HospSharePer->caption(), $view_lab_service_edit->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->HospSharePer->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->HospID->caption(), $view_lab_service_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->TestSubCd->caption(), $view_lab_service_edit->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Method->caption(), $view_lab_service_edit->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Order->caption(), $view_lab_service_edit->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->Order->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Form->caption(), $view_lab_service_edit->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->ResType->caption(), $view_lab_service_edit->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->UnitCD->caption(), $view_lab_service_edit->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->RefValue->caption(), $view_lab_service_edit->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Sample->caption(), $view_lab_service_edit->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->NoD->caption(), $view_lab_service_edit->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->NoD->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->BillOrder->caption(), $view_lab_service_edit->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_service_edit->BillOrder->errorMessage()) ?>");
			<?php if ($view_lab_service_edit->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Formula->caption(), $view_lab_service_edit->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Inactive->caption(), $view_lab_service_edit->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Outsource->caption(), $view_lab_service_edit->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->CollSample->caption(), $view_lab_service_edit->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->TestType->caption(), $view_lab_service_edit->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->NoHeading->caption(), $view_lab_service_edit->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->ChemicalCode->caption(), $view_lab_service_edit->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->ChemicalName->caption(), $view_lab_service_edit->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Utilaization->caption(), $view_lab_service_edit->Utilaization->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_service_edit->Interpretation->Required) { ?>
				elm = this.getElements("x" + infix + "_Interpretation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_service_edit->Interpretation->caption(), $view_lab_service_edit->Interpretation->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fview_lab_serviceedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_serviceedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_serviceedit.lists["x_UNITS"] = <?php echo $view_lab_service_edit->UNITS->Lookup->toClientList($view_lab_service_edit) ?>;
	fview_lab_serviceedit.lists["x_UNITS"].options = <?php echo JsonEncode($view_lab_service_edit->UNITS->lookupOptions()) ?>;
	fview_lab_serviceedit.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_service_edit->SERVICE_TYPE->Lookup->toClientList($view_lab_service_edit) ?>;
	fview_lab_serviceedit.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_service_edit->SERVICE_TYPE->lookupOptions()) ?>;
	fview_lab_serviceedit.lists["x_DEPARTMENT"] = <?php echo $view_lab_service_edit->DEPARTMENT->Lookup->toClientList($view_lab_service_edit) ?>;
	fview_lab_serviceedit.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_service_edit->DEPARTMENT->options(FALSE, TRUE)) ?>;
	fview_lab_serviceedit.lists["x_Inactive[]"] = <?php echo $view_lab_service_edit->Inactive->Lookup->toClientList($view_lab_service_edit) ?>;
	fview_lab_serviceedit.lists["x_Inactive[]"].options = <?php echo JsonEncode($view_lab_service_edit->Inactive->options(FALSE, TRUE)) ?>;
	fview_lab_serviceedit.lists["x_TestType"] = <?php echo $view_lab_service_edit->TestType->Lookup->toClientList($view_lab_service_edit) ?>;
	fview_lab_serviceedit.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_service_edit->TestType->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_serviceedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_service_edit->showPageHeader(); ?>
<?php
$view_lab_service_edit->showMessage();
?>
<form name="fview_lab_serviceedit" id="fview_lab_serviceedit" class="<?php echo $view_lab_service_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_service_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_lab_service_edit->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_view_lab_service_Id" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Id" type="text/html"><?php echo $view_lab_service_edit->Id->caption() ?><?php echo $view_lab_service_edit->Id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Id->cellAttributes() ?>>
<script id="tpx_view_lab_service_Id" type="text/html"><span id="el_view_lab_service_Id">
<span<?php echo $view_lab_service_edit->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_service_edit->Id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_lab_service" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($view_lab_service_edit->Id->CurrentValue) ?>">
<?php echo $view_lab_service_edit->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_view_lab_service_CODE" for="x_CODE" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_CODE" type="text/html"><?php echo $view_lab_service_edit->CODE->caption() ?><?php echo $view_lab_service_edit->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_service_CODE" type="text/html"><span id="el_view_lab_service_CODE">
<input type="text" data-table="view_lab_service" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_edit->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->CODE->EditValue ?>"<?php echo $view_lab_service_edit->CODE->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_view_lab_service_SERVICE" for="x_SERVICE" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_SERVICE" type="text/html"><?php echo $view_lab_service_edit->SERVICE->caption() ?><?php echo $view_lab_service_edit->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_service_SERVICE" type="text/html"><span id="el_view_lab_service_SERVICE">
<input type="text" data-table="view_lab_service" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_edit->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->SERVICE->EditValue ?>"<?php echo $view_lab_service_edit->SERVICE->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_view_lab_service_UNITS" for="x_UNITS" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_UNITS" type="text/html"><?php echo $view_lab_service_edit->UNITS->caption() ?><?php echo $view_lab_service_edit->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_service_UNITS" type="text/html"><span id="el_view_lab_service_UNITS">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_UNITS"><?php echo EmptyValue(strval($view_lab_service_edit->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_lab_service_edit->UNITS->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_lab_service_edit->UNITS->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_lab_service_edit->UNITS->ReadOnly || $view_lab_service_edit->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$view_lab_service_edit->UNITS->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_UNITS" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_edit->UNITS->caption() ?>" data-title="<?php echo $view_lab_service_edit->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_UNITS',url:'lab_unit_mastaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $view_lab_service_edit->UNITS->Lookup->getParamTag($view_lab_service_edit, "p_x_UNITS") ?>
<input type="hidden" data-table="view_lab_service" data-field="x_UNITS" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_lab_service_edit->UNITS->displayValueSeparatorAttribute() ?>" name="x_UNITS" id="x_UNITS" value="<?php echo $view_lab_service_edit->UNITS->CurrentValue ?>"<?php echo $view_lab_service_edit->UNITS->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_view_lab_service_AMOUNT" for="x_AMOUNT" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_AMOUNT" type="text/html"><?php echo $view_lab_service_edit->AMOUNT->caption() ?><?php echo $view_lab_service_edit->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_service_AMOUNT" type="text/html"><span id="el_view_lab_service_AMOUNT">
<input type="text" data-table="view_lab_service" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_edit->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->AMOUNT->EditValue ?>"<?php echo $view_lab_service_edit->AMOUNT->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_view_lab_service_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_SERVICE_TYPE" type="text/html"><?php echo $view_lab_service_edit->SERVICE_TYPE->caption() ?><?php echo $view_lab_service_edit->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_service_SERVICE_TYPE" type="text/html"><span id="el_view_lab_service_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_service_edit->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_service_edit->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_service_edit->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_lab_services_type") && !$view_lab_service_edit->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_service_edit->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_service_edit->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_lab_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_service_edit->SERVICE_TYPE->Lookup->getParamTag($view_lab_service_edit, "p_x_SERVICE_TYPE") ?>
</span></script>
<?php echo $view_lab_service_edit->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_view_lab_service_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_DEPARTMENT" type="text/html"><?php echo $view_lab_service_edit->DEPARTMENT->caption() ?><?php echo $view_lab_service_edit->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_service_DEPARTMENT" type="text/html"><span id="el_view_lab_service_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_service_edit->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_service_edit->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_service_edit->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
</div>
</span></script>
<?php echo $view_lab_service_edit->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_view_lab_service_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_mas_services_billingcol" type="text/html"><?php echo $view_lab_service_edit->mas_services_billingcol->caption() ?><?php echo $view_lab_service_edit->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_service_mas_services_billingcol" type="text/html"><span id="el_view_lab_service_mas_services_billingcol">
<input type="text" data-table="view_lab_service" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_service_edit->mas_services_billingcol->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_lab_service_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_DrShareAmount" type="text/html"><?php echo $view_lab_service_edit->DrShareAmount->caption() ?><?php echo $view_lab_service_edit->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_service_DrShareAmount" type="text/html"><span id="el_view_lab_service_DrShareAmount">
<input type="text" data-table="view_lab_service" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->DrShareAmount->EditValue ?>"<?php echo $view_lab_service_edit->DrShareAmount->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_lab_service_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_HospShareAmount" type="text/html"><?php echo $view_lab_service_edit->HospShareAmount->caption() ?><?php echo $view_lab_service_edit->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_service_HospShareAmount" type="text/html"><span id="el_view_lab_service_HospShareAmount">
<input type="text" data-table="view_lab_service" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->HospShareAmount->EditValue ?>"<?php echo $view_lab_service_edit->HospShareAmount->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_view_lab_service_DrSharePer" for="x_DrSharePer" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_DrSharePer" type="text/html"><?php echo $view_lab_service_edit->DrSharePer->caption() ?><?php echo $view_lab_service_edit->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_service_DrSharePer" type="text/html"><span id="el_view_lab_service_DrSharePer">
<input type="text" data-table="view_lab_service" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->DrSharePer->EditValue ?>"<?php echo $view_lab_service_edit->DrSharePer->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_view_lab_service_HospSharePer" for="x_HospSharePer" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_HospSharePer" type="text/html"><?php echo $view_lab_service_edit->HospSharePer->caption() ?><?php echo $view_lab_service_edit->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_service_HospSharePer" type="text/html"><span id="el_view_lab_service_HospSharePer">
<input type="text" data-table="view_lab_service" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->HospSharePer->EditValue ?>"<?php echo $view_lab_service_edit->HospSharePer->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_lab_service_TestSubCd" for="x_TestSubCd" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_TestSubCd" type="text/html"><?php echo $view_lab_service_edit->TestSubCd->caption() ?><?php echo $view_lab_service_edit->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_service_TestSubCd" type="text/html"><span id="el_view_lab_service_TestSubCd">
<input type="text" data-table="view_lab_service" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->TestSubCd->EditValue ?>"<?php echo $view_lab_service_edit->TestSubCd->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_lab_service_Method" for="x_Method" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Method" type="text/html"><?php echo $view_lab_service_edit->Method->caption() ?><?php echo $view_lab_service_edit->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Method->cellAttributes() ?>>
<script id="tpx_view_lab_service_Method" type="text/html"><span id="el_view_lab_service_Method">
<input type="text" data-table="view_lab_service" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->Method->EditValue ?>"<?php echo $view_lab_service_edit->Method->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_service_Order" for="x_Order" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Order" type="text/html"><?php echo $view_lab_service_edit->Order->caption() ?><?php echo $view_lab_service_edit->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Order->cellAttributes() ?>>
<script id="tpx_view_lab_service_Order" type="text/html"><span id="el_view_lab_service_Order">
<input type="text" data-table="view_lab_service" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->Order->EditValue ?>"<?php echo $view_lab_service_edit->Order->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_lab_service_Form" for="x_Form" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Form" type="text/html"><?php echo $view_lab_service_edit->Form->caption() ?><?php echo $view_lab_service_edit->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Form->cellAttributes() ?>>
<script id="tpx_view_lab_service_Form" type="text/html"><span id="el_view_lab_service_Form">
<textarea data-table="view_lab_service" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Form->getPlaceHolder()) ?>"<?php echo $view_lab_service_edit->Form->editAttributes() ?>><?php echo $view_lab_service_edit->Form->EditValue ?></textarea>
</span></script>
<?php echo $view_lab_service_edit->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_lab_service_ResType" for="x_ResType" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_ResType" type="text/html"><?php echo $view_lab_service_edit->ResType->caption() ?><?php echo $view_lab_service_edit->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_service_ResType" type="text/html"><span id="el_view_lab_service_ResType">
<input type="text" data-table="view_lab_service" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->ResType->EditValue ?>"<?php echo $view_lab_service_edit->ResType->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_view_lab_service_UnitCD" for="x_UnitCD" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_UnitCD" type="text/html"><?php echo $view_lab_service_edit->UnitCD->caption() ?><?php echo $view_lab_service_edit->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_service_UnitCD" type="text/html"><span id="el_view_lab_service_UnitCD">
<input type="text" data-table="view_lab_service" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->UnitCD->EditValue ?>"<?php echo $view_lab_service_edit->UnitCD->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_service_RefValue" for="x_RefValue" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_RefValue" type="text/html"><?php echo $view_lab_service_edit->RefValue->caption() ?><?php echo $view_lab_service_edit->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->RefValue->cellAttributes() ?>>
<script id="tpx_view_lab_service_RefValue" type="text/html"><span id="el_view_lab_service_RefValue">
<textarea data-table="view_lab_service" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_edit->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_service_edit->RefValue->editAttributes() ?>><?php echo $view_lab_service_edit->RefValue->EditValue ?></textarea>
</span></script>
<?php echo $view_lab_service_edit->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_lab_service_Sample" for="x_Sample" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Sample" type="text/html"><?php echo $view_lab_service_edit->Sample->caption() ?><?php echo $view_lab_service_edit->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_service_Sample" type="text/html"><span id="el_view_lab_service_Sample">
<input type="text" data-table="view_lab_service" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->Sample->EditValue ?>"<?php echo $view_lab_service_edit->Sample->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_lab_service_NoD" for="x_NoD" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_NoD" type="text/html"><?php echo $view_lab_service_edit->NoD->caption() ?><?php echo $view_lab_service_edit->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_service_NoD" type="text/html"><span id="el_view_lab_service_NoD">
<input type="text" data-table="view_lab_service" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->NoD->EditValue ?>"<?php echo $view_lab_service_edit->NoD->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_lab_service_BillOrder" for="x_BillOrder" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_BillOrder" type="text/html"><?php echo $view_lab_service_edit->BillOrder->caption() ?><?php echo $view_lab_service_edit->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_service_BillOrder" type="text/html"><span id="el_view_lab_service_BillOrder">
<input type="text" data-table="view_lab_service" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_service_edit->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->BillOrder->EditValue ?>"<?php echo $view_lab_service_edit->BillOrder->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_lab_service_Formula" for="x_Formula" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Formula" type="text/html"><?php echo $view_lab_service_edit->Formula->caption() ?><?php echo $view_lab_service_edit->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Formula->cellAttributes() ?>>
<script id="tpx_view_lab_service_Formula" type="text/html"><span id="el_view_lab_service_Formula">
<textarea data-table="view_lab_service" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_service_edit->Formula->editAttributes() ?>><?php echo $view_lab_service_edit->Formula->EditValue ?></textarea>
</span></script>
<?php echo $view_lab_service_edit->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_lab_service_Inactive" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Inactive" type="text/html"><?php echo $view_lab_service_edit->Inactive->caption() ?><?php echo $view_lab_service_edit->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_service_Inactive" type="text/html"><span id="el_view_lab_service_Inactive">
<div id="tp_x_Inactive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_lab_service" data-field="x_Inactive" data-value-separator="<?php echo $view_lab_service_edit->Inactive->displayValueSeparatorAttribute() ?>" name="x_Inactive[]" id="x_Inactive[]" value="{value}"<?php echo $view_lab_service_edit->Inactive->editAttributes() ?>></div>
<div id="dsl_x_Inactive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_lab_service_edit->Inactive->checkBoxListHtml(FALSE, "x_Inactive[]") ?>
</div></div>
</span></script>
<?php echo $view_lab_service_edit->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_view_lab_service_Outsource" for="x_Outsource" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Outsource" type="text/html"><?php echo $view_lab_service_edit->Outsource->caption() ?><?php echo $view_lab_service_edit->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_service_Outsource" type="text/html"><span id="el_view_lab_service_Outsource">
<input type="text" data-table="view_lab_service" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->Outsource->EditValue ?>"<?php echo $view_lab_service_edit->Outsource->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_lab_service_CollSample" for="x_CollSample" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_CollSample" type="text/html"><?php echo $view_lab_service_edit->CollSample->caption() ?><?php echo $view_lab_service_edit->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_service_CollSample" type="text/html"><span id="el_view_lab_service_CollSample">
<input type="text" data-table="view_lab_service" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->CollSample->EditValue ?>"<?php echo $view_lab_service_edit->CollSample->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_service_TestType" for="x_TestType" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_TestType" type="text/html"><?php echo $view_lab_service_edit->TestType->caption() ?><?php echo $view_lab_service_edit->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_service_TestType" type="text/html"><span id="el_view_lab_service_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_service" data-field="x_TestType" data-value-separator="<?php echo $view_lab_service_edit->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_service_edit->TestType->editAttributes() ?>>
			<?php echo $view_lab_service_edit->TestType->selectOptionListHtml("x_TestType") ?>
		</select>
</div>
</span></script>
<?php echo $view_lab_service_edit->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_view_lab_service_NoHeading" for="x_NoHeading" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_NoHeading" type="text/html"><?php echo $view_lab_service_edit->NoHeading->caption() ?><?php echo $view_lab_service_edit->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_service_NoHeading" type="text/html"><span id="el_view_lab_service_NoHeading">
<input type="text" data-table="view_lab_service" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->NoHeading->EditValue ?>"<?php echo $view_lab_service_edit->NoHeading->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_view_lab_service_ChemicalCode" for="x_ChemicalCode" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_ChemicalCode" type="text/html"><?php echo $view_lab_service_edit->ChemicalCode->caption() ?><?php echo $view_lab_service_edit->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_service_ChemicalCode" type="text/html"><span id="el_view_lab_service_ChemicalCode">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->ChemicalCode->EditValue ?>"<?php echo $view_lab_service_edit->ChemicalCode->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_view_lab_service_ChemicalName" for="x_ChemicalName" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_ChemicalName" type="text/html"><?php echo $view_lab_service_edit->ChemicalName->caption() ?><?php echo $view_lab_service_edit->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_service_ChemicalName" type="text/html"><span id="el_view_lab_service_ChemicalName">
<input type="text" data-table="view_lab_service" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->ChemicalName->EditValue ?>"<?php echo $view_lab_service_edit->ChemicalName->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_view_lab_service_Utilaization" for="x_Utilaization" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Utilaization" type="text/html"><?php echo $view_lab_service_edit->Utilaization->caption() ?><?php echo $view_lab_service_edit->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_service_Utilaization" type="text/html"><span id="el_view_lab_service_Utilaization">
<input type="text" data-table="view_lab_service" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_edit->Utilaization->EditValue ?>"<?php echo $view_lab_service_edit->Utilaization->editAttributes() ?>>
</span></script>
<?php echo $view_lab_service_edit->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_service_edit->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_view_lab_service_Interpretation" class="<?php echo $view_lab_service_edit->LeftColumnClass ?>"><script id="tpc_view_lab_service_Interpretation" type="text/html"><?php echo $view_lab_service_edit->Interpretation->caption() ?><?php echo $view_lab_service_edit->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_service_edit->RightColumnClass ?>"><div <?php echo $view_lab_service_edit->Interpretation->cellAttributes() ?>>
<script id="tpx_view_lab_service_Interpretation" type="text/html"><span id="el_view_lab_service_Interpretation">
<?php $view_lab_service_edit->Interpretation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_lab_service" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_service_edit->Interpretation->getPlaceHolder()) ?>"<?php echo $view_lab_service_edit->Interpretation->editAttributes() ?>><?php echo $view_lab_service_edit->Interpretation->EditValue ?></textarea>
</span></script>
<script type="text/html" class="view_lab_serviceedit_js">
loadjs.ready(["fview_lab_serviceedit", "editor"], function() {
	ew.createEditor("fview_lab_serviceedit", "x_Interpretation", 35, 4, <?php echo $view_lab_service_edit->Interpretation->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $view_lab_service_edit->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_lab_serviceedit" class="ew-custom-template"></div>
<script id="tpm_view_lab_serviceedit" type="text/html">
<div id="ct_view_lab_service_edit"><style>
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
.view_lab_service_sub_UNITS{
  position: initial; 
}
.input-group>.form-control.ew-lookup-text {
	 width: 8em; 
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_CODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_CODE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_SERVICE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_SERVICE")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_UNITS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_UNITS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_AMOUNT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_AMOUNT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_SERVICE_TYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_SERVICE_TYPE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_DEPARTMENT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_DEPARTMENT")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_mas_services_billingcol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_mas_services_billingcol")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_DrShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_DrShareAmount")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_HospShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_HospShareAmount")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_DrSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_DrSharePer")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_HospSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_HospSharePer")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_TestSubCd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_TestSubCd")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Method")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Order"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Order")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Form"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Form")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_ResType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_ResType")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_UnitCD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_UnitCD")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Inactive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Inactive")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Outsource"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Outsource")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_CollSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_CollSample")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_RefValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_RefValue")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Sample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Sample")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_NoD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_NoD")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_BillOrder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_BillOrder")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Formula"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Formula")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_TestType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_TestType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_NoHeading"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_NoHeading")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_ChemicalCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_ChemicalCode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_ChemicalName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_ChemicalName")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_service_Utilaization"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Utilaization")/}}</span>
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
{{include tmpl="#tpc_view_lab_service_Interpretation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_service_Interpretation")/}}
</div>
</div>
</script>

<?php
	if (in_array("view_lab_service_sub", explode(",", $view_lab_service->getCurrentDetailTable())) && $view_lab_service_sub->DetailEdit) {
?>
<?php if ($view_lab_service->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_lab_service_sub", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_lab_service_subgrid.php" ?>
<?php } ?>
<?php if (!$view_lab_service_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_service_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_service_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_lab_service->Rows) ?> };
	ew.applyTemplate("tpd_view_lab_serviceedit", "tpm_view_lab_serviceedit", "view_lab_serviceedit", "<?php echo $view_lab_service->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_lab_serviceedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_lab_service_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='Id']").hide(),$("[data-name='Id']").width("8px"),$("[data-name='UNITS']").width("8px"),$("[data-name='TestSubCd']").width("8px"),$("[data-name='Method']").width("8px"),$("[data-name='Order']").width("8px"),$("[data-name='ResType']").width("8px"),$("[data-name='UnitCD']").width("8px"),$("[data-name='Sample']").width("8px"),$("[data-name='NoD']").width("8px"),$("[data-name='BillOrder']").width("8px"),$("[data-name='Formula']").width("8px"),$("[data-name='Inactive']").width("8px"),$("[data-name='Outsource']").width("8px"),$("[data-name='CollSample']").width("8px"),document.getElementById("gmp_view_lab_service_sub").style.overflowX="scroll";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_lab_service_edit->terminate();
?>