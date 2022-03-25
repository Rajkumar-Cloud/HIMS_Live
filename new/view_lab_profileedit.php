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
$view_lab_profile_edit = new view_lab_profile_edit();

// Run the page
$view_lab_profile_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_profile_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_lab_profileedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_lab_profileedit = currentForm = new ew.Form("fview_lab_profileedit", "edit");

	// Validate form
	fview_lab_profileedit.validate = function() {
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
			<?php if ($view_lab_profile_edit->Id->Required) { ?>
				elm = this.getElements("x" + infix + "_Id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Id->caption(), $view_lab_profile_edit->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->CODE->Required) { ?>
				elm = this.getElements("x" + infix + "_CODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->CODE->caption(), $view_lab_profile_edit->CODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->SERVICE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->SERVICE->caption(), $view_lab_profile_edit->SERVICE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->UNITS->Required) { ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->UNITS->caption(), $view_lab_profile_edit->UNITS->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_UNITS");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->UNITS->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->AMOUNT->Required) { ?>
				elm = this.getElements("x" + infix + "_AMOUNT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->AMOUNT->caption(), $view_lab_profile_edit->AMOUNT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->SERVICE_TYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_SERVICE_TYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->SERVICE_TYPE->caption(), $view_lab_profile_edit->SERVICE_TYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->DEPARTMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_DEPARTMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->DEPARTMENT->caption(), $view_lab_profile_edit->DEPARTMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Modified->Required) { ?>
				elm = this.getElements("x" + infix + "_Modified");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Modified->caption(), $view_lab_profile_edit->Modified->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->ModifiedDateTime->caption(), $view_lab_profile_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->mas_services_billingcol->Required) { ?>
				elm = this.getElements("x" + infix + "_mas_services_billingcol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->mas_services_billingcol->caption(), $view_lab_profile_edit->mas_services_billingcol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->DrShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->DrShareAmount->caption(), $view_lab_profile_edit->DrShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->DrShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->HospShareAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->HospShareAmount->caption(), $view_lab_profile_edit->HospShareAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospShareAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->HospShareAmount->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->DrSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->DrSharePer->caption(), $view_lab_profile_edit->DrSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->DrSharePer->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->HospSharePer->Required) { ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->HospSharePer->caption(), $view_lab_profile_edit->HospSharePer->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospSharePer");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->HospSharePer->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->HospID->caption(), $view_lab_profile_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->TestSubCd->caption(), $view_lab_profile_edit->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Method->caption(), $view_lab_profile_edit->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Order->caption(), $view_lab_profile_edit->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->Order->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Form->caption(), $view_lab_profile_edit->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->ResType->caption(), $view_lab_profile_edit->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->UnitCD->caption(), $view_lab_profile_edit->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->RefValue->caption(), $view_lab_profile_edit->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Sample->caption(), $view_lab_profile_edit->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->NoD->caption(), $view_lab_profile_edit->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->NoD->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->BillOrder->caption(), $view_lab_profile_edit->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_lab_profile_edit->BillOrder->errorMessage()) ?>");
			<?php if ($view_lab_profile_edit->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Formula->caption(), $view_lab_profile_edit->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Inactive->caption(), $view_lab_profile_edit->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Outsource->caption(), $view_lab_profile_edit->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->CollSample->caption(), $view_lab_profile_edit->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->TestType->Required) { ?>
				elm = this.getElements("x" + infix + "_TestType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->TestType->caption(), $view_lab_profile_edit->TestType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->NoHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_NoHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->NoHeading->caption(), $view_lab_profile_edit->NoHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->ChemicalCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->ChemicalCode->caption(), $view_lab_profile_edit->ChemicalCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->ChemicalName->Required) { ?>
				elm = this.getElements("x" + infix + "_ChemicalName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->ChemicalName->caption(), $view_lab_profile_edit->ChemicalName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Utilaization->Required) { ?>
				elm = this.getElements("x" + infix + "_Utilaization");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Utilaization->caption(), $view_lab_profile_edit->Utilaization->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_lab_profile_edit->Interpretation->Required) { ?>
				elm = this.getElements("x" + infix + "_Interpretation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_profile_edit->Interpretation->caption(), $view_lab_profile_edit->Interpretation->RequiredErrorMessage)) ?>");
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
	fview_lab_profileedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_profileedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_profileedit.lists["x_SERVICE_TYPE"] = <?php echo $view_lab_profile_edit->SERVICE_TYPE->Lookup->toClientList($view_lab_profile_edit) ?>;
	fview_lab_profileedit.lists["x_SERVICE_TYPE"].options = <?php echo JsonEncode($view_lab_profile_edit->SERVICE_TYPE->lookupOptions()) ?>;
	fview_lab_profileedit.lists["x_DEPARTMENT"] = <?php echo $view_lab_profile_edit->DEPARTMENT->Lookup->toClientList($view_lab_profile_edit) ?>;
	fview_lab_profileedit.lists["x_DEPARTMENT"].options = <?php echo JsonEncode($view_lab_profile_edit->DEPARTMENT->lookupOptions()) ?>;
	fview_lab_profileedit.lists["x_TestType"] = <?php echo $view_lab_profile_edit->TestType->Lookup->toClientList($view_lab_profile_edit) ?>;
	fview_lab_profileedit.lists["x_TestType"].options = <?php echo JsonEncode($view_lab_profile_edit->TestType->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_lab_profileedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_profile_edit->showPageHeader(); ?>
<?php
$view_lab_profile_edit->showMessage();
?>
<form name="fview_lab_profileedit" id="fview_lab_profileedit" class="<?php echo $view_lab_profile_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_profile_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_lab_profile_edit->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label id="elh_view_lab_profile_Id" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Id" type="text/html"><?php echo $view_lab_profile_edit->Id->caption() ?><?php echo $view_lab_profile_edit->Id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Id->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Id" type="text/html"><span id="el_view_lab_profile_Id">
<span<?php echo $view_lab_profile_edit->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_lab_profile_edit->Id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_lab_profile" data-field="x_Id" name="x_Id" id="x_Id" value="<?php echo HtmlEncode($view_lab_profile_edit->Id->CurrentValue) ?>">
<?php echo $view_lab_profile_edit->Id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label id="elh_view_lab_profile_CODE" for="x_CODE" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_CODE" type="text/html"><?php echo $view_lab_profile_edit->CODE->caption() ?><?php echo $view_lab_profile_edit->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->CODE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CODE" type="text/html"><span id="el_view_lab_profile_CODE">
<input type="text" data-table="view_lab_profile" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->CODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->CODE->EditValue ?>"<?php echo $view_lab_profile_edit->CODE->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label id="elh_view_lab_profile_SERVICE" for="x_SERVICE" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_SERVICE" type="text/html"><?php echo $view_lab_profile_edit->SERVICE->caption() ?><?php echo $view_lab_profile_edit->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->SERVICE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE" type="text/html"><span id="el_view_lab_profile_SERVICE">
<input type="text" data-table="view_lab_profile" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->SERVICE->EditValue ?>"<?php echo $view_lab_profile_edit->SERVICE->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->SERVICE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->UNITS->Visible) { // UNITS ?>
	<div id="r_UNITS" class="form-group row">
		<label id="elh_view_lab_profile_UNITS" for="x_UNITS" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_UNITS" type="text/html"><?php echo $view_lab_profile_edit->UNITS->caption() ?><?php echo $view_lab_profile_edit->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->UNITS->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UNITS" type="text/html"><span id="el_view_lab_profile_UNITS">
<input type="text" data-table="view_lab_profile" data-field="x_UNITS" name="x_UNITS" id="x_UNITS" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->UNITS->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->UNITS->EditValue ?>"<?php echo $view_lab_profile_edit->UNITS->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->UNITS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->AMOUNT->Visible) { // AMOUNT ?>
	<div id="r_AMOUNT" class="form-group row">
		<label id="elh_view_lab_profile_AMOUNT" for="x_AMOUNT" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_AMOUNT" type="text/html"><?php echo $view_lab_profile_edit->AMOUNT->caption() ?><?php echo $view_lab_profile_edit->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->AMOUNT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_AMOUNT" type="text/html"><span id="el_view_lab_profile_AMOUNT">
<input type="text" data-table="view_lab_profile" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->AMOUNT->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->AMOUNT->EditValue ?>"<?php echo $view_lab_profile_edit->AMOUNT->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->AMOUNT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label id="elh_view_lab_profile_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_SERVICE_TYPE" type="text/html"><?php echo $view_lab_profile_edit->SERVICE_TYPE->caption() ?><?php echo $view_lab_profile_edit->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->SERVICE_TYPE->cellAttributes() ?>>
<script id="tpx_view_lab_profile_SERVICE_TYPE" type="text/html"><span id="el_view_lab_profile_SERVICE_TYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_SERVICE_TYPE" data-value-separator="<?php echo $view_lab_profile_edit->SERVICE_TYPE->displayValueSeparatorAttribute() ?>" id="x_SERVICE_TYPE" name="x_SERVICE_TYPE"<?php echo $view_lab_profile_edit->SERVICE_TYPE->editAttributes() ?>>
			<?php echo $view_lab_profile_edit->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$view_lab_profile_edit->SERVICE_TYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SERVICE_TYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile_edit->SERVICE_TYPE->caption() ?>" data-title="<?php echo $view_lab_profile_edit->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SERVICE_TYPE',url:'mas_services_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_profile_edit->SERVICE_TYPE->Lookup->getParamTag($view_lab_profile_edit, "p_x_SERVICE_TYPE") ?>
</span></script>
<?php echo $view_lab_profile_edit->SERVICE_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label id="elh_view_lab_profile_DEPARTMENT" for="x_DEPARTMENT" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_DEPARTMENT" type="text/html"><?php echo $view_lab_profile_edit->DEPARTMENT->caption() ?><?php echo $view_lab_profile_edit->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->DEPARTMENT->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DEPARTMENT" type="text/html"><span id="el_view_lab_profile_DEPARTMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_DEPARTMENT" data-value-separator="<?php echo $view_lab_profile_edit->DEPARTMENT->displayValueSeparatorAttribute() ?>" id="x_DEPARTMENT" name="x_DEPARTMENT"<?php echo $view_lab_profile_edit->DEPARTMENT->editAttributes() ?>>
			<?php echo $view_lab_profile_edit->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$view_lab_profile_edit->DEPARTMENT->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DEPARTMENT" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_lab_profile_edit->DEPARTMENT->caption() ?>" data-title="<?php echo $view_lab_profile_edit->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DEPARTMENT',url:'mas_billing_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $view_lab_profile_edit->DEPARTMENT->Lookup->getParamTag($view_lab_profile_edit, "p_x_DEPARTMENT") ?>
</span></script>
<?php echo $view_lab_profile_edit->DEPARTMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
	<div id="r_mas_services_billingcol" class="form-group row">
		<label id="elh_view_lab_profile_mas_services_billingcol" for="x_mas_services_billingcol" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_mas_services_billingcol" type="text/html"><?php echo $view_lab_profile_edit->mas_services_billingcol->caption() ?><?php echo $view_lab_profile_edit->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->mas_services_billingcol->cellAttributes() ?>>
<script id="tpx_view_lab_profile_mas_services_billingcol" type="text/html"><span id="el_view_lab_profile_mas_services_billingcol">
<input type="text" data-table="view_lab_profile" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->mas_services_billingcol->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->mas_services_billingcol->EditValue ?>"<?php echo $view_lab_profile_edit->mas_services_billingcol->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->mas_services_billingcol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->DrShareAmount->Visible) { // DrShareAmount ?>
	<div id="r_DrShareAmount" class="form-group row">
		<label id="elh_view_lab_profile_DrShareAmount" for="x_DrShareAmount" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_DrShareAmount" type="text/html"><?php echo $view_lab_profile_edit->DrShareAmount->caption() ?><?php echo $view_lab_profile_edit->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->DrShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrShareAmount" type="text/html"><span id="el_view_lab_profile_DrShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->DrShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->DrShareAmount->EditValue ?>"<?php echo $view_lab_profile_edit->DrShareAmount->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->DrShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->HospShareAmount->Visible) { // HospShareAmount ?>
	<div id="r_HospShareAmount" class="form-group row">
		<label id="elh_view_lab_profile_HospShareAmount" for="x_HospShareAmount" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_HospShareAmount" type="text/html"><?php echo $view_lab_profile_edit->HospShareAmount->caption() ?><?php echo $view_lab_profile_edit->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->HospShareAmount->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospShareAmount" type="text/html"><span id="el_view_lab_profile_HospShareAmount">
<input type="text" data-table="view_lab_profile" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->HospShareAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->HospShareAmount->EditValue ?>"<?php echo $view_lab_profile_edit->HospShareAmount->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->HospShareAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->DrSharePer->Visible) { // DrSharePer ?>
	<div id="r_DrSharePer" class="form-group row">
		<label id="elh_view_lab_profile_DrSharePer" for="x_DrSharePer" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_DrSharePer" type="text/html"><?php echo $view_lab_profile_edit->DrSharePer->caption() ?><?php echo $view_lab_profile_edit->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->DrSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_DrSharePer" type="text/html"><span id="el_view_lab_profile_DrSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->DrSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->DrSharePer->EditValue ?>"<?php echo $view_lab_profile_edit->DrSharePer->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->DrSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->HospSharePer->Visible) { // HospSharePer ?>
	<div id="r_HospSharePer" class="form-group row">
		<label id="elh_view_lab_profile_HospSharePer" for="x_HospSharePer" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_HospSharePer" type="text/html"><?php echo $view_lab_profile_edit->HospSharePer->caption() ?><?php echo $view_lab_profile_edit->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->HospSharePer->cellAttributes() ?>>
<script id="tpx_view_lab_profile_HospSharePer" type="text/html"><span id="el_view_lab_profile_HospSharePer">
<input type="text" data-table="view_lab_profile" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->HospSharePer->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->HospSharePer->EditValue ?>"<?php echo $view_lab_profile_edit->HospSharePer->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->HospSharePer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_view_lab_profile_TestSubCd" for="x_TestSubCd" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_TestSubCd" type="text/html"><?php echo $view_lab_profile_edit->TestSubCd->caption() ?><?php echo $view_lab_profile_edit->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->TestSubCd->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestSubCd" type="text/html"><span id="el_view_lab_profile_TestSubCd">
<input type="text" data-table="view_lab_profile" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->TestSubCd->EditValue ?>"<?php echo $view_lab_profile_edit->TestSubCd->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_view_lab_profile_Method" for="x_Method" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Method" type="text/html"><?php echo $view_lab_profile_edit->Method->caption() ?><?php echo $view_lab_profile_edit->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Method->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Method" type="text/html"><span id="el_view_lab_profile_Method">
<input type="text" data-table="view_lab_profile" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Method->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->Method->EditValue ?>"<?php echo $view_lab_profile_edit->Method->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_profile_Order" for="x_Order" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Order" type="text/html"><?php echo $view_lab_profile_edit->Order->caption() ?><?php echo $view_lab_profile_edit->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Order->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Order" type="text/html"><span id="el_view_lab_profile_Order">
<input type="text" data-table="view_lab_profile" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->Order->EditValue ?>"<?php echo $view_lab_profile_edit->Order->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_view_lab_profile_Form" for="x_Form" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Form" type="text/html"><?php echo $view_lab_profile_edit->Form->caption() ?><?php echo $view_lab_profile_edit->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Form->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Form" type="text/html"><span id="el_view_lab_profile_Form">
<textarea data-table="view_lab_profile" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Form->getPlaceHolder()) ?>"<?php echo $view_lab_profile_edit->Form->editAttributes() ?>><?php echo $view_lab_profile_edit->Form->EditValue ?></textarea>
</span></script>
<?php echo $view_lab_profile_edit->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_view_lab_profile_ResType" for="x_ResType" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_ResType" type="text/html"><?php echo $view_lab_profile_edit->ResType->caption() ?><?php echo $view_lab_profile_edit->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->ResType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ResType" type="text/html"><span id="el_view_lab_profile_ResType">
<input type="text" data-table="view_lab_profile" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->ResType->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->ResType->EditValue ?>"<?php echo $view_lab_profile_edit->ResType->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_view_lab_profile_UnitCD" for="x_UnitCD" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_UnitCD" type="text/html"><?php echo $view_lab_profile_edit->UnitCD->caption() ?><?php echo $view_lab_profile_edit->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->UnitCD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_UnitCD" type="text/html"><span id="el_view_lab_profile_UnitCD">
<input type="text" data-table="view_lab_profile" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->UnitCD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->UnitCD->EditValue ?>"<?php echo $view_lab_profile_edit->UnitCD->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_profile_RefValue" for="x_RefValue" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_RefValue" type="text/html"><?php echo $view_lab_profile_edit->RefValue->caption() ?><?php echo $view_lab_profile_edit->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->RefValue->cellAttributes() ?>>
<script id="tpx_view_lab_profile_RefValue" type="text/html"><span id="el_view_lab_profile_RefValue">
<textarea data-table="view_lab_profile" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_profile_edit->RefValue->editAttributes() ?>><?php echo $view_lab_profile_edit->RefValue->EditValue ?></textarea>
</span></script>
<?php echo $view_lab_profile_edit->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_view_lab_profile_Sample" for="x_Sample" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Sample" type="text/html"><?php echo $view_lab_profile_edit->Sample->caption() ?><?php echo $view_lab_profile_edit->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Sample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Sample" type="text/html"><span id="el_view_lab_profile_Sample">
<input type="text" data-table="view_lab_profile" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Sample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->Sample->EditValue ?>"<?php echo $view_lab_profile_edit->Sample->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_view_lab_profile_NoD" for="x_NoD" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_NoD" type="text/html"><?php echo $view_lab_profile_edit->NoD->caption() ?><?php echo $view_lab_profile_edit->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->NoD->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoD" type="text/html"><span id="el_view_lab_profile_NoD">
<input type="text" data-table="view_lab_profile" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->NoD->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->NoD->EditValue ?>"<?php echo $view_lab_profile_edit->NoD->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_view_lab_profile_BillOrder" for="x_BillOrder" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_BillOrder" type="text/html"><?php echo $view_lab_profile_edit->BillOrder->caption() ?><?php echo $view_lab_profile_edit->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->BillOrder->cellAttributes() ?>>
<script id="tpx_view_lab_profile_BillOrder" type="text/html"><span id="el_view_lab_profile_BillOrder">
<input type="text" data-table="view_lab_profile" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->BillOrder->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->BillOrder->EditValue ?>"<?php echo $view_lab_profile_edit->BillOrder->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_view_lab_profile_Formula" for="x_Formula" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Formula" type="text/html"><?php echo $view_lab_profile_edit->Formula->caption() ?><?php echo $view_lab_profile_edit->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Formula->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Formula" type="text/html"><span id="el_view_lab_profile_Formula">
<textarea data-table="view_lab_profile" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Formula->getPlaceHolder()) ?>"<?php echo $view_lab_profile_edit->Formula->editAttributes() ?>><?php echo $view_lab_profile_edit->Formula->EditValue ?></textarea>
</span></script>
<?php echo $view_lab_profile_edit->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_view_lab_profile_Inactive" for="x_Inactive" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Inactive" type="text/html"><?php echo $view_lab_profile_edit->Inactive->caption() ?><?php echo $view_lab_profile_edit->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Inactive->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Inactive" type="text/html"><span id="el_view_lab_profile_Inactive">
<input type="text" data-table="view_lab_profile" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Inactive->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->Inactive->EditValue ?>"<?php echo $view_lab_profile_edit->Inactive->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_view_lab_profile_Outsource" for="x_Outsource" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Outsource" type="text/html"><?php echo $view_lab_profile_edit->Outsource->caption() ?><?php echo $view_lab_profile_edit->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Outsource->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Outsource" type="text/html"><span id="el_view_lab_profile_Outsource">
<input type="text" data-table="view_lab_profile" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Outsource->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->Outsource->EditValue ?>"<?php echo $view_lab_profile_edit->Outsource->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_view_lab_profile_CollSample" for="x_CollSample" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_CollSample" type="text/html"><?php echo $view_lab_profile_edit->CollSample->caption() ?><?php echo $view_lab_profile_edit->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->CollSample->cellAttributes() ?>>
<script id="tpx_view_lab_profile_CollSample" type="text/html"><span id="el_view_lab_profile_CollSample">
<input type="text" data-table="view_lab_profile" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->CollSample->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->CollSample->EditValue ?>"<?php echo $view_lab_profile_edit->CollSample->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_profile_TestType" for="x_TestType" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_TestType" type="text/html"><?php echo $view_lab_profile_edit->TestType->caption() ?><?php echo $view_lab_profile_edit->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->TestType->cellAttributes() ?>>
<script id="tpx_view_lab_profile_TestType" type="text/html"><span id="el_view_lab_profile_TestType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_profile" data-field="x_TestType" data-value-separator="<?php echo $view_lab_profile_edit->TestType->displayValueSeparatorAttribute() ?>" id="x_TestType" name="x_TestType"<?php echo $view_lab_profile_edit->TestType->editAttributes() ?>>
			<?php echo $view_lab_profile_edit->TestType->selectOptionListHtml("x_TestType") ?>
		</select>
</div>
</span></script>
<?php echo $view_lab_profile_edit->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->NoHeading->Visible) { // NoHeading ?>
	<div id="r_NoHeading" class="form-group row">
		<label id="elh_view_lab_profile_NoHeading" for="x_NoHeading" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_NoHeading" type="text/html"><?php echo $view_lab_profile_edit->NoHeading->caption() ?><?php echo $view_lab_profile_edit->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->NoHeading->cellAttributes() ?>>
<script id="tpx_view_lab_profile_NoHeading" type="text/html"><span id="el_view_lab_profile_NoHeading">
<input type="text" data-table="view_lab_profile" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->NoHeading->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->NoHeading->EditValue ?>"<?php echo $view_lab_profile_edit->NoHeading->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->NoHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->ChemicalCode->Visible) { // ChemicalCode ?>
	<div id="r_ChemicalCode" class="form-group row">
		<label id="elh_view_lab_profile_ChemicalCode" for="x_ChemicalCode" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_ChemicalCode" type="text/html"><?php echo $view_lab_profile_edit->ChemicalCode->caption() ?><?php echo $view_lab_profile_edit->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->ChemicalCode->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalCode" type="text/html"><span id="el_view_lab_profile_ChemicalCode">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->ChemicalCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->ChemicalCode->EditValue ?>"<?php echo $view_lab_profile_edit->ChemicalCode->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->ChemicalCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->ChemicalName->Visible) { // ChemicalName ?>
	<div id="r_ChemicalName" class="form-group row">
		<label id="elh_view_lab_profile_ChemicalName" for="x_ChemicalName" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_ChemicalName" type="text/html"><?php echo $view_lab_profile_edit->ChemicalName->caption() ?><?php echo $view_lab_profile_edit->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->ChemicalName->cellAttributes() ?>>
<script id="tpx_view_lab_profile_ChemicalName" type="text/html"><span id="el_view_lab_profile_ChemicalName">
<input type="text" data-table="view_lab_profile" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->ChemicalName->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->ChemicalName->EditValue ?>"<?php echo $view_lab_profile_edit->ChemicalName->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->ChemicalName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Utilaization->Visible) { // Utilaization ?>
	<div id="r_Utilaization" class="form-group row">
		<label id="elh_view_lab_profile_Utilaization" for="x_Utilaization" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Utilaization" type="text/html"><?php echo $view_lab_profile_edit->Utilaization->caption() ?><?php echo $view_lab_profile_edit->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Utilaization->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Utilaization" type="text/html"><span id="el_view_lab_profile_Utilaization">
<input type="text" data-table="view_lab_profile" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Utilaization->getPlaceHolder()) ?>" value="<?php echo $view_lab_profile_edit->Utilaization->EditValue ?>"<?php echo $view_lab_profile_edit->Utilaization->editAttributes() ?>>
</span></script>
<?php echo $view_lab_profile_edit->Utilaization->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_profile_edit->Interpretation->Visible) { // Interpretation ?>
	<div id="r_Interpretation" class="form-group row">
		<label id="elh_view_lab_profile_Interpretation" class="<?php echo $view_lab_profile_edit->LeftColumnClass ?>"><script id="tpc_view_lab_profile_Interpretation" type="text/html"><?php echo $view_lab_profile_edit->Interpretation->caption() ?><?php echo $view_lab_profile_edit->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_lab_profile_edit->RightColumnClass ?>"><div <?php echo $view_lab_profile_edit->Interpretation->cellAttributes() ?>>
<script id="tpx_view_lab_profile_Interpretation" type="text/html"><span id="el_view_lab_profile_Interpretation">
<?php $view_lab_profile_edit->Interpretation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_lab_profile" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_profile_edit->Interpretation->getPlaceHolder()) ?>"<?php echo $view_lab_profile_edit->Interpretation->editAttributes() ?>><?php echo $view_lab_profile_edit->Interpretation->EditValue ?></textarea>
</span></script>
<script type="text/html" class="view_lab_profileedit_js">
loadjs.ready(["fview_lab_profileedit", "editor"], function() {
	ew.createEditor("fview_lab_profileedit", "x_Interpretation", 35, 4, <?php echo $view_lab_profile_edit->Interpretation->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $view_lab_profile_edit->Interpretation->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_lab_profileedit" class="ew-custom-template"></div>
<script id="tpm_view_lab_profileedit" type="text/html">
<div id="ct_view_lab_profile_edit"><style>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_CODE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_SERVICE")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UNITS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_UNITS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_AMOUNT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_AMOUNT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_SERVICE_TYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_SERVICE_TYPE")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DEPARTMENT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_DEPARTMENT")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_mas_services_billingcol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_mas_services_billingcol")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_DrShareAmount")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospShareAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_HospShareAmount")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_DrSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_DrSharePer")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_HospSharePer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_HospSharePer")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestSubCd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_TestSubCd")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Method")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Order"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Order")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Form"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Form")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ResType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_ResType")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_UnitCD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_UnitCD")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Inactive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Inactive")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Outsource"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Outsource")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_CollSample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_CollSample")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_RefValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_RefValue")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Sample"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Sample")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_NoD")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_BillOrder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_BillOrder")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Formula"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Formula")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_TestType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_TestType")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_NoHeading"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_NoHeading")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalCode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_ChemicalCode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_ChemicalName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_ChemicalName")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_lab_profile_Utilaization"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Utilaization")/}}</span>
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
{{include tmpl="#tpc_view_lab_profile_Interpretation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_lab_profile_Interpretation")/}}
</div>
</div>
</script>

<?php
	if (in_array("lab_profile_details", explode(",", $view_lab_profile->getCurrentDetailTable())) && $lab_profile_details->DetailEdit) {
?>
<?php if ($view_lab_profile->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("lab_profile_details", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "lab_profile_detailsgrid.php" ?>
<?php } ?>
<?php if (!$view_lab_profile_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_profile_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_profile_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_lab_profile->Rows) ?> };
	ew.applyTemplate("tpd_view_lab_profileedit", "tpm_view_lab_profileedit", "view_lab_profileedit", "<?php echo $view_lab_profile->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_lab_profileedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_lab_profile_edit->showPageFooter();
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
$view_lab_profile_edit->terminate();
?>